<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_permintaan');
		$this->load->model('M_supplier');
		$this->load->model('M_pengadaan');
		$this->load->model('M_produksi');
		$this->load->helper('date');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Pengadaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['pengadaan'] = $this->M_pengadaan->getPengadaan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('pengadaan_barang/pengadaan', $data);
		$this->load->view('design/footer');
	}

	public function submit_pengadaan()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Pengadaan Barang';

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['pengadaan'] = $this->M_pengadaan->getPengadaan();
		
		
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		// $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		// $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('pengadaan_barang/pengadaan', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_pengadaan->tambahPengadaan();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('pengadaan/'));
		}	
	}

	public function edit_pengadaan($id)
	{
		$data['title'] = "Edit Pengadaan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Epengadaan'] = $this->M_pengadaan->idPengadaan($id);

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaan();
		$data['supplier'] = $this->M_supplier->getSupplier();

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('pengadaan_barang/pengadaan', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_pengadaan->editPengadaan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Pengadaan/'));
		}
	}

	public function hapus_pengadaan($id)
	{
		$this->M_pengadaan->hapusPengadaan($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Pengadaan/'));
	}

	public function cek_pengadaan($id)
	{
		$data['title'] = "Edit Pengadaan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Epengadaan'] = $this->M_pengadaan->idPengadaan($id);
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaan();
		$data['supplier'] = $this->M_supplier->getSupplier();


		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('pengadaan_barang/pengadaan', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_pengadaan->cekPengadaan();
			$this->session->set_flashdata('notif', ' Barang Sesuai');
            redirect(base_url('Produksi/pengadaan_produksi'));
		}
	}






}