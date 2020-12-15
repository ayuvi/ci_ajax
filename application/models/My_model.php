<?php 
defined('BASEPATH') OR exit();

class My_model extends CI_Model{

	function ambildata($table){
		return $this->db->get($table);
	}
}
