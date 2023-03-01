<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_supplier');
		$this->load->model('M_baku');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Data Supplier'; 
		$data['supplier'] = $this->M_supplier->getSupplier();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_supplier/supplier', $data);
		$this->load->view('design/footer');
	}

	public function submit_supplier()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Supplier';
		$data['supplier'] = $this->M_supplier->getSupplier();

		
		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
		$this->form_validation->set_rules('nama_toko', 'nama_toko', 'trim|required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_supplier/supplier', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_supplier->tambahSupplier();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Supplier/'));
		}	
	}

	public function edit_supplier($id)
	{
		$data['title'] = "Data Supplier";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['supplier'] = $this->M_supplier->getSupplier();


		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_supplier/supplier', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_supplier->editSupplier();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Supplier/'));
		}
	}


	public function hapus_supplier($id)
	{
		$this->M_supplier->hapusSupplier($id);
       	$this->session->set_flashdata('notif', ' dihapus');
        redirect(base_url('Supplier/'));
	}

	public function pemesanan_barang()
	{
		$data['title'] = 'Data Pemesanan'; 
		// $data['pemesanan'] = $this->M_supplier->getPemesanan();
		$data['baku'] = $this->M_supplier->getBaku();


		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_supplier/pemesanan', $data);
		$this->load->view('design/footer');
	}

	public function submit_pemesanan()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Pemesanan';
		// $data['pemesanan'] = $this->M_supplier->getPemesanan();
		$data['baku'] = $this->M_supplier->getBaku();


		if(!$this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_supplier/pemesanan', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_supplier->prosesPemesanan();
			$this->session->set_flashdata('notif', ' Selesai');
            redirect(base_url('Supplier/pemesanan_barang'));
		}	
	}

	public function pemesanan_selesai()
	{
		$data['title'] = 'Orderan Selesai'; 
		// $data['pemesanan'] = $this->M_supplier->getPemesananSelesai();
		$data['pemesanan'] = $this->M_supplier->getBakuSelesai();


		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_supplier/selesai', $data);
		$this->load->view('design/footer');
	}







}
