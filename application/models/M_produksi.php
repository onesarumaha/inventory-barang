<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produksi extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idbarang($id)
	{
		return $this->db->get_where('data_barang', ['id_barang' => $id])->row_array();
	}

	public function getBarang()
	{
		$this->db->order_by('id_produksi', 'DESC');
		$this->db->select('*');
		$this->db->from('data_produksi');
		$this->db->join('data_barang', 'data_barang.id_barang = data_produksi.id_barang');
		$this->db->where('role', 'Produksi');

		return $query = $this->db->get()->result_array();  
	}

	public function getPengadaan()
	{
		$this->db->order_by('id_pengadaan', 'DESC');
		$this->db->select('*');
		$this->db->from('pengadaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = pengadaan_barang.id_barang');
		// $this->db->join('data_supplier', 'data_supplier.id_supplier = pengadaan_barang.id_supplier');

		$this->db->where('status_pengadaan', 'Menunggu Diproses');


		return $query = $this->db->get()->result_array();
	}

	public function tambahBarang()
	{
		$kode_barang = 'AIA' . random_int(1, 9) . date('dmy');
		$data = [
				'kode_barang' => $kode_barang,
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'stok' => htmlspecialchars($this->input->post('stok', true)),
				'jenis_barang' => htmlspecialchars($this->input->post('jenis_barang', true)),
				'satuan' => htmlspecialchars($this->input->post('satuan', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
				

			];

		$this->db->insert('data_barang', $data);

		$id_barang = $this->db->insert_id();

		$data_produksi = [
				'id_barang' => $id_barang,
				'tgl_produksi' => date('Ymd'),
				'role' => 'Produksi',

		];
		$this->db->insert('data_produksi', $data_produksi);

	}

	public function editBarang()
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'stok' => htmlspecialchars($this->input->post('stok', true)),
				'jenis_barang' => htmlspecialchars($this->input->post('jenis_barang', true)),
				'satuan' => htmlspecialchars($this->input->post('satuan', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
			];
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('data_barang', $data);
	}

	public function hapusBarang($id)
	{

		$this->db->delete('data_produksi', array('id_produksi' => $id));


	}

	public function tambahKategori()
	{
		$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
			];

		$this->db->insert('kategori', $data);
	}

	public function idkategori($id)
	{
		return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
	}

	public function getKategori()
	{
		return $this->db->get('kategori')->result_array();  
	}

	public function hapusKategori($id)
	{
		$this->db->delete('kategori', ['id_kategori' => $id] );

	}

	public function editKategori()
	{
		$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),
			];
		$this->db->where('id_kategori', $this->input->post('id_kategori'));
		$this->db->update('kategori', $data);
	}

	public function tambahJenis()
	{
		$data = [
				'nama_jenis' => htmlspecialchars($this->input->post('nama_jenis', true)),
			];

		$this->db->insert('jenis', $data);
	}

	public function idjenis($id)
	{
		return $this->db->get_where('jenis', ['id_jenis' => $id])->row_array();
	}

	public function getJenis()
	{
		return $this->db->get('jenis')->result_array();  
	}

	public function hapusJenis($id)
	{
		$this->db->delete('jenis', ['id_jenis' => $id] );

	}

	public function editJenis()
	{
		$data = [
				'nama_jenis' => htmlspecialchars($this->input->post('nama_jenis', true)),
			];
		$this->db->where('id_jenis', $this->input->post('id_jenis'));
		$this->db->update('jenis', $data);
	}

	// sat
	public function tambahSatuan()
	{
		$data = [
				'nama_satuan' => htmlspecialchars($this->input->post('nama_satuan', true)),
			];

		$this->db->insert('satuan', $data);
	}

	public function idsatuan($id)
	{
		return $this->db->get_where('satuan', ['id_satuan' => $id])->row_array();
	}

	public function getSatuan()
	{
		return $this->db->get('satuan')->result_array();  
	}

	public function hapusSatuan($id)
	{
		$this->db->delete('satuan', ['id_satuan' => $id] );

	}

	public function editSatuan()
	{
		$data = [
				'nama_satuan' => htmlspecialchars($this->input->post('nama_satuan', true)),
			];
		$this->db->where('id_satuan', $this->input->post('id_satuan'));
		$this->db->update('satuan', $data);
	}

	public function cekPengadaan()
	{
		$data = [
				'status' => htmlspecialchars($this->input->post('status', true)),


			];
		$this->db->where('id_baku', $this->input->post('id_baku'));
		$this->db->update('bahan_baku', $data);

	}








}