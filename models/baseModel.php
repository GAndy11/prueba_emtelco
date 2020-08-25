<?php
require_once 'config/database.php';

class baseModel{
	public $db;

	public function __construct() {
		$this->db = database::connect();
	}

}