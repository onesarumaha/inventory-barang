<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
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
		$this->db->order_by('id_barang', 'DESC');

		return $this->db->get('data_barang')->result_array();  
	}

	public function getBarangNotif()
	{
		$this->db->where('stok <' , 10);


		return $this->db->get('data_barang')->result_array();  
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
		$this->db->delete('data_barang', ['id_barang' => $id] );
	}

	public function hapusBaranga($id)
	{
		$this->db->delete('data_produksi', ['id_barang' => $id] );

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

	public function getSumBarang()
	{
		$sql = "SELECT sum(stok) as stok FROM data_barang ";
		$result = $this->db->query($sql);
		return $result->row()->stok;
	}








}