<?php

defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

class Admin_Container_Controller extends Controller {

		public function index( &$view )
		{
		  //TODO: gros hack par flemme de chercher comment acceder à l'ORM.
		  //list_all devrait être static !
		  $c = new Container_Model();
		  $view->containers = $c->list_all();
		}

		public function save()
		{
		  $this->auto_render = false;

		  if( !request::is_ajax() )
			return false;

		  $id = $this->input->post('id_container');
		  $name = trim($this->input->post('container_name'));
		  $description = trim($this->input->post('container_description'));
		  $allow_get = $this->input->post('container_allow_get');
		  $allow_put = $this->input->post('container_allow_put');
		  $allow_get = $allow_get == "false" ? false : (bool) $allow_get;
		  $allow_put = $allow_put == "false" ? false : (bool) $allow_put;
		  $action = $this->input->post('container_action');
		  $spawn_model = $this->input->post('container_spawn_model');
		  $spawn_time = $this->input->post('container_spawn_time');
		  $spawn_max_item = $this->input->post('container_spawn_max_item');

		  if (!$id) {
			return false;
		  }

		  if (!$name) {
			echo json_encode(array(
								   'status' => 'error',
								   'message' => 'Le nom ne doit pas être vide.'
								   ));
			return false;
		  }

		  // [SAVE]
		  $c = new Container_Model($id == -1 ? false : $id);
		  $id = $c->save(array( 'name' => $name,
								'description' => $description,
								'allow_put' => $allow_put,
								'allow_get' => $allow_get,
								'action' => $action,
								'spawn_model' => $spawn_model,
								'spawn_time' => $spawn_time,
								'spawn_max_item' => $spawn_max_item
								));
		  

		  echo json_encode(array(
								 'status' => 'ok',
								 'id' => $id
								 ));
		}
}

?>