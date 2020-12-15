<?php
defined('BASEPATH') or exit();

class Page extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('My_model', 'm');
	}

	function index()
	{
		$data['title'] = "CRUD CI AJAX";
		$this->load->view('home', $data);
	}

	function ambildata()
	{
		// ambil data dari model & tb barang masukan ke var dataBarang
		$dataBarang = $this->m->ambildata('tb_barang')->result();
		// kirim data json
		echo json_encode($dataBarang);
	}

	function tambahdata()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		if ($kode_barang == '') {
			$result['pesan'] = "kode barang harus diisi";
		} elseif ($nama_barang == '') {
			$result['pesan'] = "Nama barang harus diisi";
		} elseif ($harga == '') {
			$result['pesan'] = "Harga barang harus diisi";
		} elseif ($stok == '') {
			$result['pesan'] = "Pesan barang harus diisi";
		} else {
			$result['pesan'] = "";

			$data = [
				'kode_barang' => $kode_barang,
				'nama_barang' => $nama_barang,
				'harga' => $harga,
				'stok' => $stok
			];

			$this->m->tambahdata($data, 'tb_barang');
		}

		echo json_encode($result);
	}
}
