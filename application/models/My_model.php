<?php
defined('BASEPATH') or exit();

class My_model extends CI_Model
{

	function ambildata($table)
	{
		return $this->db->get($table);
	}

	function tambahdata($data, $table)
	{
		$this->db->insert($data, $table);
	}
}
