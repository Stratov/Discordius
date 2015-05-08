<?php

defined('SYSPATH') or die('No direct access allowed.');

class Container_Controller extends Authentic_Controller {

  public function __construct() {
	parent::__construct();
  }

  public function get_objects() {

	if (!request::is_ajax())
	  return false;


	if ($this->input->post('code') && $this->input->post('code') === $this->input->post('expected_code')) {
	  Item_Model::instance()->user_insert($this->user->id, $this->input->post('id_object'));
	  echo 'Objet récupéré';
	} else {
	  echo 'Mauvais code !';
	}
  }
}