<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
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
		$data['title'] = 'Kategori'; 
		$data['kategori'] = $this->M_barang->getKategori();
		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('kategori/index', $data);
		$this->load->view('design/footer');
	}

	public function submit_kategori()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Kategori';
		
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('kategori/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->tambahKategori();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('kategori/'));
		}	
	}

	public function edit_barang($id)
	{
		$data['title'] = "Edit Kategori";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ekategori'] = $this->M_barang->idKategori($id);

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('kategori/edit_kategori', $data);
		$this->load->view('design/footer');
	}

	public function submit_edit($id)
	{
		$data['title'] = "Edit Kategori";
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
			$this->M_barang->editKategori();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('kategori/'));
		}
	}

	public function hapus_kategori($id)
	{
		$this->M_barang->hapusKategori($id);
       	$this->session->set_flashdata('notif', ' dihapus');
        redirect(base_url('Kategori/'));
	}






}
