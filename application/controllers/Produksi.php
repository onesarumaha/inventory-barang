<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_produksi');
		$this->load->model('M_pengadaan');
		$this->load->model('M_supplier');
		$this->load->model('M_baku');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Data Produksi'; 
		$data['barang'] = $this->M_produksi->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_produksi/index', $data);
		$this->load->view('design/footer');
	}

	public function submit_produksi()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Produksi';
		$data['barang'] = $this->M_produksi->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('jenis_barang', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('stok','Jumlah Produksi','required|trim|max_length[3]', [
				'min_length' => 'Max 3 Digit',
				'required' => 'Stok Harus Diisi']);
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_produksi/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_produksi->tambahBarang();
			$this->session->set_flashdata('notif', ' Diproduksi');
            redirect(base_url('Produksi/'));
		}	
	}

	public function edit_produksi($id)
	{
		$data['title'] = "Edit Produksi";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ebarang'] = $this->M_barang->idBarang($id);

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_produksi/edit_produksi', $data);
		$this->load->view('design/footer');
	}

	public function submit_edit($id)
	{
		$data['title'] = "Edit Produksi";
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
			$this->load->view('data_produksi/edit_produksi', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_produksi->editBarang();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Produksi/'));
		}
	}

	public function hapus_barang($id)
	{
		$this->M_produksi->hapusBarang($id);
       	$this->session->set_flashdata('notif', ' dihapus');
        redirect(base_url('Produksi/'));
	}

	public function pengadaan_produksi()
	{
		$data['title'] = 'Data Pengadaan'; 
		$data['barang'] = $this->M_produksi->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['pengadaan'] = $this->M_produksi->getPengadaan();
		

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_produksi/pengadaan_produksi', $data);
		$this->load->view('design/footer');
	}

	public function bahan_baku()
	{
		$data['title'] = 'Data Bahan Baku'; 
		$data['baku'] = $this->M_baku->getBaku();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		// $data['pengadaan'] = $this->M_pengadaan->getPengadaan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('data_produksi/bahan_baku', $data);
		$this->load->view('design/footer');
	}

	public function submit_baku()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Bahan Baku'; 
		$data['baku'] = $this->M_baku->getBaku();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['pengadaan'] = $this->M_pengadaan->getPengadaan();

		
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('qty', 'Qty', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga Satuan', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_produksi/bahan_baku', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_baku->tambahBaku();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Produksi/bahan_baku'));
		}	
	}

	public function edit_baku($id)
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		// $data['Ebarang'] = $this->M_barang->idBarang($id);

		$data['title'] = 'Data Bahan Baku'; 
		$data['baku'] = $this->M_baku->getBaku();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['pengadaan'] = $this->M_pengadaan->getPengadaan();

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_produksi/bahan_baku', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_baku->editBaku();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Produksi/bahan_baku'));
		}
	}

	public function hapus_baku($id)
	{
		$this->M_baku->hapusBaku($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Produksi/bahan_baku'));
	}

	public function cek_pengadaan($id)
	{
		$data['title'] = "Data Bahan Baku";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['baku'] = $this->M_baku->getBaku();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['supplier'] = $this->M_supplier->getSupplier();
		$data['pengadaan'] = $this->M_pengadaan->getPengadaan();


		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('data_produksi/bahan_baku', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_produksi->cekPengadaan();
			$this->session->set_flashdata('notif', ' Barang Sesuai');
            redirect(base_url('Produksi/bahan_baku'));
		}
	}






}
