<?php

defined( 'SYSPATH' ) or die( 'No direct access allowed.' );


class Plugin_Container_Controller extends Action_Controller {

    public function index() {
        $this->auto_render = false;

        if( !request::is_ajax() )
            return FALSE;

        $c = new Container_Model($this->data->id_container);

        $v = new View( 'container/plugin' );
        $v->admin = in_array( 'admin', $this->role->name );
        $v->data = $this->data;
        $v->name = $c->get_data()->name;
        $v->id = $c->get_data()->id;
        $v->description = $c->get_data()->description;
        $v->allow_put = $c->get_data()->allow_put;
        $v->render( TRUE );

    }

    public function show($message = false) {
        $this->auto_render = false;

        if( !request::is_ajax() )
            return false;

        echo html::stylesheet( 'index.php/css_'.base64_encode( implode( '--', array( 'item', 'coda' ) ) ) );

        $v = new View('container/show');
        $v->admin = in_array( 'admin', $this->role->name );
        $v->data = $this->data;

        if ($message && $message['status'] == 'ok')
            $v->message = $message['message'];
        else if ($message && $message['status'] == 'error')
            $v->error = $message['message'];


        $c = new Container_Model($this->data->id_container);

        $v->name = $c->get_data()->name;
        $v->id = $c->get_data()->id;
        $v->allow_put = $c->get_data()->allow_put;
        $v->allow_get = $c->get_data()->allow_get;

        $list = $c->list_items();
        $v->list_object = empty($list) ? array() : $list;// : Item_Model::instance()->in($list);

        $v->render(true);
    }

    public function show_user($message = false) {
        $this->auto_render = false;

        if( !request::is_ajax() )
            return false;

        echo html::stylesheet( 'index.php/css_'.base64_encode( implode( '--', array( 'item', 'coda' ) ) ) );

        $v = new View('container/show_user');
        $v->data = $this->data;
        $v->admin = in_array( 'admin', $this->role->name );

        if ($message && $message['status'] == 'ok')
            $v->message = $message['message'];
        else if ($message && $message['status'] == 'error')
            $v->error = $message['message'];

        $c = new Container_Model($this->data->id_container);
        $v->name = $c->get_data()->name;
        $v->id = $c->get_data()->id;

        $list = Item_Model::instance()->select($this->user->id);
        $v->list_object = empty($list) ? array() : $list;
        $v->render(true);
    }

    public function put() {
        $this->auto_render = false;

        if (!request::is_ajax())
            return false;

        if (!($id_item = $this->input->post('id_item')))
            return false;

        $id_container = $this->data->id_container;

        $container = new Container_Model($id_container);

        if (!$container->get_data()->allow_put) {
            return $this->show(array('status' => 'error',
                'message' => "Impossible de déposer d'objets dans ce conteneur."
            ));
        }

        if (!Item_Model::instance()->user_delete($this->user->id, $id_item)) {
            return $this->show(array('status' => 'error',
                'message' => "Vous n'avez pas cet objet"
            ));
        }

        $container->add_item($id_item);

        return $this->show_user(array(
            'status' => 'ok',
            'message' => "L'objet a bien été déposé"
        ));
    }

    public function take() {

        $this->auto_render = false;
        if (!request::is_ajax())
            return false;

        //TODO
        //BONUS: on check le verrou/code/autre

        if (!($id_item = $this->input->post('id_item')))
            return false;

        $id_container = $this->data->id_container;
        $container = new Container_Model($id_container);

        if (!$container->get_data()->allow_get) {
            return $this->show(array('status' => 'error',
                'message' => "Impossible de retirer d'objets de ce conteneur."
            ));
        }

        if (!$container->remove_item($id_item)) {
            return $this->show(array(
                'status' => 'error',
                'message' => "L'objet n'existe pas ou plus."
            ));
        }

        Item_Model::instance()->user_insert($this->user->id, $id_item);

        return $this->show(array(
            'status' => 'ok',
            'message' => "L'objet a bien été récupéré."
        ));
    }


}
