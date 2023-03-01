<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_permintaan');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Permintaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('permintaan_barang/permintaan', $data);
		$this->load->view('design/footer');
	}

	public function data_permintaan()
	{
		$data['title'] = 'Data Permintaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['permintaan'] = $this->M_permintaan->getPermintaandata();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('permintaan_barang/data_permintaan', $data);
		$this->load->view('design/footer');
	}

	public function pilih_barang($id)
	{
		$data['title'] = "Permintaan Barang";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Pbarang'] = $this->M_barang->idBarang($id);

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('permintaan_barang/pilih_barang', $data);
		$this->load->view('design/footer');
	}

	public function submit_permintaan($id)
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Permintaan Barang';
		$data['Pbarang'] = $this->M_barang->idBarang($id);


		
		$this->form_validation->set_rules('qty','Qty','required|trim|max_length[3]', [
				'max_length' => 'Max 3 Digit',
				'required' => 'Qty Harus Diisi']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('permintaan_barang/pilih_barang', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_permintaan->pilihBarang();
			$this->session->set_flashdata('notif', ' Menunggu Persetujuan');
            redirect(base_url('Permintaan/'));
		}	
	}

	public function edit_permintaan($id)
	{
		$data['title'] = "Edit Barang";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['Ebarang'] = $this->M_barang->idBarang($id);
		$data['permintaan'] = $this->M_permintaan->getPermintaan();
		

		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('permintaan_barang/permintaan', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_permintaan->editPermintaan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Permintaan/'));
		}
	}













}