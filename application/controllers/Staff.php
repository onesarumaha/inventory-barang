<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_staff');
		$this->load->model('M_supplier');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Data Kepala Cabang'; 
		$data['staff'] = $this->M_staff->getStaff();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_staff/index', $data);
		$this->load->view('design/footer');
	}

	public function submit_staff()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Supplier';
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['staff'] = $this->M_staff->getStaff();

		
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('username', 'Usernama', 'trim|required');
		$this->form_validation->set_rules('level', 'Jenis Staff', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_staff/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_staff->tambahStaff();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Staff/'));
		}	
	}

	public function edit_staff($id)
	{
		$data['title'] = "Data Staff";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['staff'] = $this->M_staff->getStaff();
		$data['staff'] = $this->M_staff->idstaff($id);



		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_staff/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_staff->editStaff();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Staff/'));
		}
	}


	public function hapus_staff($id)
	{
		$this->M_staff->hapusStaff($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Staff/'));
	}

	public function pemesanan_barang()
	{
		$data['title'] = 'Data Pemesanan'; 
		$data['pemesanan'] = $this->M_supplier->getPemesanan();

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
		$data['pemesanan'] = $this->M_supplier->getPemesanan();

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
		$data['pemesanan'] = $this->M_supplier->getPemesanan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_supplier/selesai', $data);
		$this->load->view('design/footer');
	}







}
