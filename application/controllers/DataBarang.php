<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBarang extends CI_Controller {
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
		$data['title'] = 'Data Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_barang/data_barang', $data);
		$this->load->view('design/footer');
	}

	public function submit_barang()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Input Stok';
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('jenis_barang', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('stok','Stok','required|trim|max_length[3]', [
				'min_length' => 'Max 3 Digit',
				'required' => 'Stok Harus Diisi']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_barang/data_barang', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->tambahBarang();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('DataBarang/'));
		}	
	}

	public function edit_barang($id)
	{
		$data['title'] = "Edit Barang";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ebarang'] = $this->M_barang->idBarang($id);

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_barang/edit_barang', $data);
		$this->load->view('design/footer');
	}

	public function submit_edit($id)
	{
		$data['title'] = "Edit Barang";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ebarang'] = $this->M_barang->idBarang($id);

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_barang/edit_barang', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_barang->editBarang();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('DataBarang/'));
		}
	}

	public function hapus_barang($id)
	{
		$this->M_barang->hapusBarang($id);
		// $this->M_barang->hapusBaranga($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('DataBarang/'));
	}






}
