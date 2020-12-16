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
		$this->db->insert($table, $data);
	}

	function ambilId($table, $where){
		return $this->db->get_where($table,$where);
	}

	function updatedata($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapusdata($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
