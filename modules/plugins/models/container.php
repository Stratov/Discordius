<?php

defined( 'SYSPATH' ) OR die( 'No direct access allowed.' );

/**
 * Class Container_Model
 *
 * Represent a generic object container. It can be extended to support different behavior.
 */
class Container_Model extends Model {


    /** @var array used as temporary list when object is not yet created;
     */
    protected $list_item;

    /** @var int|null container ID, or NULL if it's not in database. */
    protected $id;

    /** @var array list key/value for each database field */
    protected $data;

    public function __construct($id = null) {
        parent::__construct();

        $this->id = $id;
        if ($id) {
            $this->data = parent::model_select('containers', array('id' => $id), 1);

            if ($this->data === false) {
                Kohana::log('alert', 'Try to load a bad container: '. $id);
                throw new Exception('Container not found: "' . $id . '"');
            }
        }

        $this->list_item = array();
    }

    /**
     * @return int|null
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Save item to database.
     *
     * @param array $set
     * @return int|null the id if success; null otherwise.
     */
    public function save(array $set) {
        if ($this->id) {
            parent::model_update('containers', $set, array('id' => $this->id));
        } else {
            $this->id = parent::model_insert('containers', $set);
            //TODO: inserts items from $this->list_items
        }

        if (!$this->id)
            return null;


        if (isset($set['action']) && $set['action'] != null) {
            switch ($set['action']) {
                case 'spawn':
                    $this->db->query('UPDATE containers SET spawn_last_update = NOW() WHERE id = ' . $this->id);
                    break;
            }
        }

        return $this->id;
    }

    /**
     * Delete this item.
     *
     * @return mixed
     */
    public function delete() {
        return parent::model_delete('containers', array ('id' => $this->id));
    }


    public function get_data() {
        return $this->data;
    }


    /**
     * Apply special actions.
     *
     * @param $hook string can be 'list' or 'remove'
     */
    protected function _apply_actions($hook) {
        switch ($this->data->action) {
            case 'spawn':
                //Object generation

                $q = $this->db->select('FLOOR(TIMESTAMPDIFF(SECOND, spawn_last_update, NOW()) / spawn_time) AS nb_spawn,'
                    .'SUM(quantity) as nb_items')
                    ->from('containers')
                    ->join('containers_items', 'containers_items.id_container', 'containers.id')
                    ->where('containers.id', $this->id)
                    ->get()->current();

                $nb_items = $q->nb_items;
                $nb_spawn = $q->nb_spawn;
                $max_item = $this->data->spawn_max_item;

                $c = NULL;
                $list_m = array();

                for (;$nb_items < $max_item && $nb_spawn > 0; $nb_spawn--) {

                    if ($c === null) {
                        $c = new Container_Model($this->data->spawn_model);
                        $list_m = $c->list_items();
                        if (!$list_m)
                            break;//ERROR happened: container_model doesn't exists ?
                    }

                    foreach ($list_m as $item) {
                        $this->add_item($item->id, $item->nbr);
                        $nb_items += $item->nbr;
                    }
                }

                if ($nb_items == $max_item) {
                    if ($hook == 'remove') {
                        $this->db->query('UPDATE containers SET spawn_last_update = NOW() WHERE id = ' . $this->id);
                        //container was full until now; We reset time to NOW();
                    }
                } else if ($q->nb_spawn !== $nb_spawn) {
                    $sec_to_add = $this->data->spawn_time * ($q->nb_spawn - $nb_spawn);
                    $this->db->query('UPDATE containers SET spawn_last_update = DATE_ADD(spawn_last_update,INTERVAL '
                        .$sec_to_add.' second) WHERE id = ' . $this->id);
                }
                break;
        }
    }


    public function list_items() {
        if (!$this->id) {
            return $this->list_item;
        }

        $this->_apply_actions('list');

        return $this->db
            ->select('*, quantity as nbr')
            ->from('items')
            ->join('containers_items', 'containers_items.id_item', 'items.id')
            ->where('containers_items.id_container', $this->id)
            ->get();
    }



    /**
     * Add an item to the container.
     *
     * @param $id_item int  item to add.
     * @param $qty int      quantity to add
     * @return bool         true if the operation is a success; otherwise false.
     */
    public function add_item($id_item, $qty = 1) {
        if ($this->id) {
            return $this->db->query('INSERT INTO containers_items (id_container, id_item, quantity) VALUES ('
                .$this->id . ', '. $id_item.', '.$qty.') ON DUPLICATE KEY UPDATE quantity = quantity + '
                . $qty);
        } else {
            if (!isset($this->list_item[$id_item])) {
                $this->list_item[$id_item] = $qty;
            } else {
                $this->list_item[$id_item] += $qty;
            }
            return true;
        }
    }

    /**
     * Removes an item from the container.
     *
     * @param $id_item int  id of type item to remove
     * @param $qty int      quantity of item to remove. default to 1.
     * @return int         quantity of item removed; 0 if failed or if item doesn't exist.
     */
    public function remove_item($id_item, $qty = 1) {
        if ($this->id) {

            $this->_apply_actions('remove');


            $q = $this->db->query('SELECT quantity FROM containers_items WHERE id_container = ' .
                $this->id . ' AND id_item = '. $id_item)->current();

            if (!$q)
                return 0;
            $actual_qty = $q->quantity;

            if ($actual_qty <= $qty) {
                return $this->db->query('DELETE FROM containers_items WHERE id_container = ' . $this->id
                    . ' AND id_item = ' . $id_item)->count() ? $actual_qty : 0;
            }

            return $this->db->query('UPDATE containers_items SET quantity = quantity - ' . $qty . ' WHERE id_container = '
                . $this->id . ' AND id_item = ' . $id_item)->count() ? $qty : 0;

        } else {
            if (isset($this->list_item[$id_item])) {
                 if ($this->list_item[$id_item] > $qty) {
                     $this->list_item[$id_item] -= $qty;
                     return $qty;
                 }

                $qty = $this->list_item[$id_item];
                unset($this->list_item[$id_item]);
                return $qty;
            }
            return 0;
        }
    }


    //TODO: should be static
    public function list_all() {
        return $this->db->from('containers')->get();
    }
}
