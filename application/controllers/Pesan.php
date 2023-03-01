<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_pesan');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function index()
	{
		$data['title'] = 'Pesan Singkat'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['pesan'] = $this->M_pesan->getPesan();


		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('pesan/index', $data);
		$this->load->view('design/footer');
	}


	public function submit_pesan()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Jenis';
		$data['barang'] = $this->M_barang->getBarang();
		$data['pesan'] = $this->M_pesan->getPesan();
		
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('isi_pesan', 'Isi Pesan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('pesan/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_pesan->tambahPesan();
			$this->session->set_flashdata('notif', ' Dikirim ');
            redirect(base_url('Pesan/'));
		}	
	}

	public function edit_pesan($id)
	{
		$data['title'] = "Pesan Singkat";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['pesan'] = $this->M_pesan->idPesan($id);
		$data['barang'] = $this->M_barang->getBarang();
		$data['pesan'] = $this->M_pesan->getPesan();

		if(!$this->form_validation->run() == FALSE)
		{
			$this->load->view('design/header', $data);
			$this->load->view('design/topbar');
			$this->load->view('design/sidebar');
			$this->load->view('pesan/index', $data);
			$this->load->view('design/footer');
		}else{
			$this->M_pesan->editPesan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('Pesan/'));
		}
	}

	public function hapus_pesan($id)
	{
		$this->M_pesan->hapusPesan($id);
       	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Pesan/'));
	}

	public function Pesan_masuk()
	{
		$data['title'] = 'Pesan Masuk'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['pesan'] = $this->M_pesan->getPesanMasuk();


		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('pesan/pesan_masuk', $data);
		$this->load->view('design/footer');
	}

	public function pesan_terima($id)
	{
	      $data  = array(
	         'status_pesan'      =>  'Pesan Diterima',
	         
	      );

	      $res = $this->M_pesan->diterima_pesan($id, $data);

	      if($res >0){
	      $this->session->set_flashdata('notif', ' Diterima');	
	        redirect(base_url('Pesan/pesan_masuk'));
	      }else{
	       // kalau error 
	      }
	}










}