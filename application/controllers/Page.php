<?php 
defined('BASEPATH') OR exit();

class Page extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model('My_model','m');
	}

	function index(){
		$data['title'] = "CRUD CI AJAX";
		$this->load->view('home', $data);
	}

	function ambildata(){
		$dataBarang = $this->m->ambildata('tb_barang')->result();
		echo json_encode($dataBarang);
	}
}

