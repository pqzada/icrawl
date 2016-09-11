<?php

class Controller {

	public $_layout;
	public $_view;
	public $_viewFile;

	public function __construct() {
		$this->_view = new stdClass();
		$this->_layout = 'default';
		$this->__init();
	}

	public function __init() {

	} 

}

?>