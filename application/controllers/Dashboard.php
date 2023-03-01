<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_supplier');
		$this->load->model('M_karyawan');
		$this->load->model('M_permintaan');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['barang'] = $this->M_barang->getBarangNotif();
		$data['barangb'] = $this->M_barang->getSumBarang();
		$data['supplier'] = $this->M_supplier->getSumSupplier();
		$data['karyawan'] = $this->M_karyawan->getSumKaryawan();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('design/footer');
	}
}
