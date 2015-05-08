<?php

defined( 'SYSPATH' ) OR die( 'No direct access allowed.' );

class Containers_Controller extends Template_Controller {

    public function __construct() {
        parent::__construct();
        parent::access('containers');
    }

    public function index() {
        $this->script = array(
            'jquery.dataTables',
            'listing'
        );

        $this->template->titre = "Tous les conteneurs";
        $this->template->contenu = new View('containers/list');
    }

    public function resultatAjax() {
        $this->auto_render = false;

        if (!request::is_ajax())
            return false;

        $fields = array('id', 'name', 'allow_put', 'allow_get', 'action');

        $search = Search_Model::instance();

        $result = $search->indexRecherche($fields, 'containers', $this->input);


        $content = '';
        foreach ($result as $row) {
            $url = 'containers/show/'.$row->id;

            $data = array(
                '<center>'.$row->id.'</center>',
                html::anchor($url, $row->name),
                ($row->allow_put ? '<strong class="vert" >YES</strong>' : '<strong class="rouge" >NO</strong>'),
                ($row->allow_get ? '<strong class="vert" >YES</strong>' : '<strong class="rouge" >NO</strong>'),
                $row->action === null ? '-' : $row->action,
                '<center>'.html::anchor($url, html::image('images/template/drawings.png',
                    array( 'title' => Kohana::lang( 'form.edit' ),
                        'class' => 'icon_list' ))).'</center>'
            );

            $content .= '[' . parent::json($data) . '],';
        }

        echo $search->displayRecherche($content, $this->input->get( 'sEcho' ) );
    }


    public function show($id = false) {
        $c = new Container_Model($id);
        $name = $c->getId() ? $c->get_data()->name : 'Nouveau container';

        $this->script = array(
            'jquery.validate',
            'jquery.facebox'
        );
        $this->css = array(
            'form',
            'facebox',
            'container'
        );

        $this->template->titre = array(
            'Tous les containers' => 'containers',
            'Détails de ' . $name => NULL
        );
        $this->template->button = true;
        if ($id)
            $this->template->navigation = parent::navigation($id, 'id', 'containers');
        $this->template->contenu = new View('formulaire/form');
        $this->template->contenu->action = 'containers/save';
        $this->template->contenu->id = $id;
        $this->template->contenu->formulaire = new View('containers/show');
        $this->template->contenu->formulaire->id = $id;
        $this->template->contenu->formulaire->row = $c->get_data();
        $list = $c->list_items();
        $this->template->contenu->formulaire->list_items = $list ? $list : array();
    }

    public function insert() {
        $this->show(false);
        return false;
    }

    public function save($type = false, $id = false) {

        if (($save = $this->input->post())) {

            $container = new Container_Model(isset($id) && is_numeric($id) ? $id : false);
            $error = false;

            switch ($type) {
                case 'trash':
                    if ($container->getId())
                        $container->delete();
                case 'sauve':
                case 'valid':

                    if (($name = trim($save['name'])) == false)
                        $error = 'Le nom ne doit pas être vide.';


                    if ($error) {
                        return url::redirect( 'containers/show/'.$id.'?msg='.urlencode($error));
                    }

                    if ($save['action'] === 'model') {
                        $save['allow_put'] = false;
                        $save['allow_get'] = false;
                    }

                    $set = array(
                        'name' => $name,
                        'description' => trim($save['description']),
                        'allow_put' => $save['allow_put'] == 'false' ? false : (bool) $save['allow_put'],
                        'allow_get' => $save['allow_get'] == 'false' ? false : (bool) $save['allow_get'],
                        'action' => $save['action']
                    );

                    $id = $container->save($set);
            }

        }


        $url = 'containers/show/'.$id;
        if( $type == 'annul' || $type == 'valid' || $type == 'trash' )
            $url = 'containers';

        return parent::redirect( $url, $type );
    }

    public function search_objects($search) {
        $this->auto_render = false;

        if (!request::is_ajax())
            return false;


        //On cherche 10 items max
        $results = Item_Model::instance()->search($search, 10);



        $list = array();
        foreach ($results as $row) {
            $list[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->comment,
                'image' => $row->image
            );
        }

        echo json_encode(array( 'items' => $list));
    }


    public function add_item($id = false) {
        $this->auto_render = false;

        if (!request::is_ajax())
            return false;

        if ($id == false || !is_numeric($id))
            return false;
        if (($post = $this->input->post()) && !$post['id'])
            return false;

        $id_item = $post['id'];

        $c = new Container_Model($id);

        $result = $c->add_item($id_item);
        $items = $c->list_items();
        $list = array();
        foreach ($items as $row) {
            $list[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->comment,
                'nbr' => $row->nbr,
                'image' => $row->image
            );
        }

        echo json_encode(array(
            'items' => $list,
            'status' => 'OK'
        ));
    }

    public function rm_item($id) {
        $this->auto_render = false;

        if (!request::is_ajax())
            return false;

        if ($id == false || !is_numeric($id))
            return false;
        if (($post = $this->input->post()) && !$post['id'])
            return false;

        $id_item = $post['id'];

        $c = new Container_Model($id);

        $result = $c->remove_item($id_item);
        $items = $c->list_items();
        $list = array();
        foreach ($items as $row) {
            $list[] = array(
                'id' => $row->id,
                'name' => $row->name,
                'description' => $row->comment,
                'nbr' => $row->nbr,
                'image' => $row->image
            );
        }

        echo json_encode(array(
            'items' => $list,
            'status' => 'OK'
        ));
    }
}

