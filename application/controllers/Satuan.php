<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Satuan'; 
		$data['satuan'] = $this->M_barang->getSatuan();
		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('satuan/index', $data);
		$this->load->view('design/footer');
	}

	public function submit_satuan()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Satuan';
		$data['satuan'] = $this->M_barang->getSatuan();

		
		$this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('satuan/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->tambahSatuan();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Satuan/'));
		}	
	}

	public function edit_satuan($id)
	{
		$data['title'] = "Edit Satuan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Esatuan'] = $this->M_barang->idSatuan($id);

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('satuan/edit_satuan', $data);
		$this->load->view('design/footer');
	}

	public function submit_edit($id)
	{
		$data['title'] = "Edit Satuan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Esatuan'] = $this->M_barang->idsatuan($id);

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('satuan/edit_satuan', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->editSatuan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('satuan/'));
		}
	}

	public function hapus_satuan($id)
	{
		$this->M_barang->hapusSatuan($id);
       	$this->session->set_flashdata('notif', ' dihapus');
        redirect(base_url('satuan/'));
	}






}
