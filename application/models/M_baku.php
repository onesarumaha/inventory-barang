<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_baku extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idbaku($id)
	{
		return $this->db->get_where('bahan_baku', ['id_baku' => $id])->row_array();
	}

	public function getBaku()
	{
		$this->db->order_by('id_baku', 'DESC');
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = bahan_baku.id_supplier');


		// $this->db->where('status', 'Menunggu Diapprove');


		return $query = $this->db->get()->result_array(); 
	}

	public function getBarangNotif()
	{
		$this->db->where('stok <' , 10);


		return $this->db->get('data_barang')->result_array();  
	}

	public function tambahBaku()
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'sat' => htmlspecialchars($this->input->post('satuan', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'harga' => htmlspecialchars($this->input->post('harga', true)),
				'id_supplier' => htmlspecialchars($this->input->post('supplier', true)),
				'status' => 'Menunggu Diapprove',
				'tgl' => htmlspecialchars($this->input->post('tgl', true)),
				
				

			];

		$this->db->insert('bahan_baku', $data);
	}

	public function editBaku()
	{
		$data = [
				'nama_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'sat' => htmlspecialchars($this->input->post('satuan', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'harga' => htmlspecialchars($this->input->post('harga', true)),
				'id_supplier' => htmlspecialchars($this->input->post('supplier', true)),
				'status' => 'Menunggu Diapprove',
			];
		$this->db->where('id_baku', $this->input->post('id_baku'));
		$this->db->update('bahan_baku', $data);
	}


	public function hapusBaku($id)
	{
		$this->db->delete('bahan_baku', ['id_baku' => $id] );

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