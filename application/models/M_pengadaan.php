<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengadaan extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idpengadaan($id)
	{
		return $this->db->get_where('pengadaan_barang', ['id_pengadaan' => $id])->row_array();
	}


	public function getPengadaan()
	{
		$this->db->order_by('id_pengadaan', 'DESC');
		$this->db->select('*');
		$this->db->from('pengadaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = pengadaan_barang.id_barang');
		// $this->db->join('data_supplier', 'data_supplier.id_supplier = pengadaan_barang.id_supplier');

		$this->db->or_where_not_in('status_pengadaan', 'Menunggu');


		return $query = $this->db->get()->result_array();
	}

	public function getPengadaanLap()
	{
		$this->db->order_by('id_pengadaan', 'DESC');
		$this->db->select('*');
		$this->db->from('pengadaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = pengadaan_barang.id_barang');
		// $this->db->join('data_supplier', 'data_supplier.id_supplier = pengadaan_barang.id_supplier');

		$this->db->where_not_in('status_pengadaan', 'Menunggu Diproses');


		return $query = $this->db->get()->result_array();
	}

	public function tambahPengadaan()
	{
		$data = [
				'tgl_pengadaan' => htmlspecialchars($this->input->post('tgl_pengadaan', true)),
				'id_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				// 'id_supplier' => 1,
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'ket_pengadaan' => htmlspecialchars($this->input->post('keterangan', true)),
				// 'harga' => htmlspecialchars($this->input->post('harga', true)),
				'status_pengadaan' => 'Menunggu Diproses',
				

			];

		$this->db->insert('pengadaan_barang', $data);
	}

	public function editPengadaan()
	{
		$data = [
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'ket_pengadaan' => htmlspecialchars($this->input->post('keterangan', true)),
				// 'harga' => htmlspecialchars($this->input->post('harga', true)),

			];
		$this->db->where('id_pengadaan', $this->input->post('id_pengadaan'));
		$this->db->update('pengadaan_barang', $data);
	}

	public function hapusPengadaan($id)
	{
		$this->db->delete('pengadaan_barang', ['id_pengadaan' => $id] );

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

	public function editPermintaan()
	{
		$data = [
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),

			];
		$this->db->where('id_permintaan', $this->input->post('id_permintaan'));
		$this->db->update('permintaan_barang', $data);
	}

	public function cekPengadaan()
	{
		$data = [
				'stok' => htmlspecialchars($this->input->post('jumlah', true) + $this->input->post('stok', true)),


			];
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('data_barang', $data);

		$dataa = [
				
				'status_pengadaan' => 'Diterima',


			];
		$this->db->where('id_pengadaan', $this->input->post('id_pengadaan'));
		$this->db->update('pengadaan_barang', $dataa);
	}

	







}