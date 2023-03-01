<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_permintaan');
		$this->load->model('M_approve');
		$this->load->model('M_supplier');
		$this->load->model('M_pengadaan');
		$this->load->model('M_baku');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Approve Permintaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaandua();
		
		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('approve/approve_permintaan_barang', $data);
		$this->load->view('design/footer');
	}

	public function approve_terima($id)
	{
	      $data  = array(
	         'status'      =>  'Diterima',
	      );

	      $res = $this->M_approve->diterima_app($id, $data);

	      if($res >0){
	      $this->session->set_flashdata('notif', ' Permintaan Barang Diterima');	
	        redirect(base_url('Approve'));
	      }else{
	       // kalau error 
	      }
	}

	public function approve_batal($id)
	{
	      $data  = array(
	         'status'      =>  'Ditolak',
	         'keterangan'      =>  $this->input->post('keterangan', true),

	      );

	      $res = $this->M_approve->ditolak_app($id, $data);

	      if($res >0){
	      $this->session->set_flashdata('notif', ' Permintaan Barang Ditolak');	
	        redirect(base_url('Approve'));
	      }else{
	       // kalau error 
	      }
	}

	public function approve_pengadaan()
	{
		$data['title'] = 'Approve Pengadaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		// $data['pengadaan'] = $this->M_approve->getPengadaan();
		$data['baku'] = $this->M_approve->getBaku();


		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('approve/approve_pengadaan_barang', $data);
		$this->load->view('design/footer');
	}

	public function approve_diterima_pengadaan($id)
	{
	      $data  = array(
	         'status'      =>  'Diapprove'
	      );

	      $res = $this->M_approve->pengadaan_app($id, $data);

	      if($res >0){
	      $this->session->set_flashdata('notif', ' Diapprove');	
	        redirect(base_url('Approve/approve_pengadaan'));
	      }else{
	       // kalau error 
	      }
	}

	public function approve_ditolak_pengadaan($id)
	{
	      $data  = array(
	         'status'      =>  'Ditolak'
	      );

	      $res = $this->M_approve->pengadaan_tolak($id, $data);

	      if($res >0){
	      $this->session->set_flashdata('notif', ' Ditolak');	
	        redirect(base_url('Approve/approve_pengadaan'));
	      }else{
	       // kalau error 
	      }
	}

	public function approve_minta($id)
	{
		

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('pesan/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_approve->approveya();
			$this->session->set_flashdata('notif', ' Permintaan Barang Diapprove');
            redirect(base_url('Approve/'));
		}
	}



}