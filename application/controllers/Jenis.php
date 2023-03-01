<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
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
		$data['title'] = 'Jenis'; 
		$data['jenis'] = $this->M_barang->getJenis();
		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('jenis/index', $data);
		$this->load->view('design/footer');
	}

	public function submit_jenis()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Jenis';
		
		$this->form_validation->set_rules('nama_jenis', 'Nama Kategori', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('jenis/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->tambahJenis();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('jenis/'));
		}	
	}

	public function edit_jenis($id)
	{
		$data['title'] = "Edit Jenis";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ejenis'] = $this->M_barang->idJenis($id);

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('jenis/edit_jenis', $data);
		$this->load->view('design/footer');
	}

	public function submit_edit($id)
	{
		$data['title'] = "Edit Jenis";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ekategori'] = $this->M_barang->idkategori($id);

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('kategori/edit_kategori', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->editJenis();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('jenis/'));
		}
	}

	public function hapus_jenis($id)
	{
		$this->M_barang->hapusJenis($id);
       	$this->session->set_flashdata('notif', ' dihapus');
        redirect(base_url('Jenis/'));
	}






}
