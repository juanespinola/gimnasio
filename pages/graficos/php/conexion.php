<?php
include('../../../dist/includes/dbcon.php');
class Model
{
	protected $db;
	public function __construct()
	{
		$this->db = new mysqli('127.0.0.1', 'root', 'root', 'gimnasio_cronos');
		if ($this->db->connect_errno) {
			exit();
		}
		$this->db->set_charset(DB_CHARSET);
	}
}
