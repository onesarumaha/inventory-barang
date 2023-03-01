<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		$this->load->library('form_validation');
		$this->load->model('M_barang');
		$this->load->model('M_permintaan');
		$this->load->model('M_pengadaan');
		if($this->session->userdata('level')!= "Staff Lapangan" & $this->session->userdata('level')!="Staff Gudang" & $this->session->userdata('level')!="Manager" & $this->session->userdata('level')!= "Staff Produksi" & $this->session->userdata('level')!= "Supplier" ) {
			redirect(base_url('Log'));
		}
		
	}

	public function permintaan_barang()
	{
		$data['title'] = 'Laporan Permintaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['lap_per'] = $this->M_permintaan->getPermintaanLap();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('laporan/permintaan_barang', $data);
		$this->load->view('design/footer');
	}


	public function cetak_periode()
	{
		$dompdf = new Dompdf();
		$data = array(
			'title' => 'Laporan Permintaan Barang'
		);
		$data['lap_per'] = $this->M_permintaan->getPermintaanLap();
		

		$html = $this->load->view('laporan/cetak_periode', $data,true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('Laporan_permintaan_barang_periode.pdf', array("Attachment" => false));
	}

	public function cetak_laporan()
	{
		$dompdf = new Dompdf();
		$data = array(
			'title' => 'Laporan Permintaan Barang'
		);
		$data['lap_per'] = $this->M_permintaan->getPermintaanLap();
		

		$html = $this->load->view('laporan/cetak_laporan', $data,true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'landscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('Laporan_permintaan_barang.pdf', array("Attachment" => false));
	}


	public function pengadaan_barang()
	{
		$data['title'] = 'Laporan Pengadaan Barang'; 
		$data['barang'] = $this->M_barang->getBarang();
		$data['kategori'] = $this->M_barang->getKategori();
		$data['jenis'] = $this->M_barang->getJenis();
		$data['satuan'] = $this->M_barang->getSatuan();
		$data['lap_peng'] = $this->M_pengadaan->getPengadaanLap();

		$this->load->view('design/header', $data);
		$this->load->view('design/topbar');
		$this->load->view('design/sidebar');
		$this->load->view('laporan/pengadaan_barang', $data);
		$this->load->view('design/footer');
	}

	// public function cetak_periode_pengadaan()
	// {
	// 	$dompdf = new Dompdf();
	// 	$data = array(
	// 		'title' => 'Laporan Pengadaan Barang'
	// 	);
	// 	$data['lap_peng'] = $this->M_pengadaan->getPengadaanLap();

	// 	$html = $this->load->view('laporan/cetak_periode_pengadaan', $data,true);
	// 	$dompdf->load_html($html);
	// 	$dompdf->set_paper('A4', 'landscape');
	// 	$dompdf->render();
	// 	$pdf = $dompdf->output();
	// 	$dompdf->stream('Laporan_pengadaan_barang_periode.pdf', array("Attachment" => false));
	// }

	// public function cetak_laporan_pengadaan()
	// {
	// 	$dompdf = new Dompdf();
	// 	$data = array(
	// 		'title' => 'Laporan Pengadaan Barang'
	// 	);
	// 	$data['lap_per'] = $this->M_pengadaan->getPengadaanLap();
		

	// 	$html = $this->load->view('laporan/cetak_laporan_pengadaan', $data,true);
	// 	$dompdf->load_html($html);
	// 	$dompdf->set_paper('A4', 'landscape');
	// 	$dompdf->render();
	// 	$pdf = $dompdf->output();
	// 	$dompdf->stream('Laporan_pengadaan_barang.pdf', array("Attachment" => false));
	// }

	public function cetak_periode_pengadaan()
	{
		$data = array(
			'title' => 'Laporan Pengadaan Barang'
		);
		$data['lap_peng'] = $this->M_pengadaan->getPengadaanLap();

		$this->load->view('laporan/cetak_periode_pengadaan', $data);
	}

	public function cetak_laporan_pengadaan()
	{
		$data = array(
			'title' => 'Laporan Pengadaan Barang'
		);
		$data['lap_per'] = $this->M_pengadaan->getPengadaanLap();
		

		$this->load->view('laporan/cetak_laporan_pengadaan', $data);
		// $this->load->view('laporan/pengadaan_barang', $data);

	}










}