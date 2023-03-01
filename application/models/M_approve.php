<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_approve extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idpermintaan($id)
	{
		return $this->db->get_where('permintaan_barang', ['id_permintaan' => $id])->row_array();
	}

	public function diterima_app($id, $data) 
	{
		$this->db->where('id_permintaan', $id);
		return $this->db->update('permintaan_barang', $data);
	}

	public function ditolak_app($id, $data) 
	{
		$this->db->where('id_permintaan', $id);
		return $this->db->update('permintaan_barang', $data);
	}

	public function getPengadaan()
	{
		$this->db->order_by('id_pengadaan', 'DESC');
		$this->db->select('*');
		$this->db->from('pengadaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = pengadaan_barang.id_barang');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = pengadaan_barang.id_supplier');


		$this->db->where('status_pengadaan', 'Menunggu');


		return $query = $this->db->get()->result_array();
	}

	public function pengadaan_app($id, $data) 
	{
		$this->db->where('id_baku', $id);
		return $this->db->update('bahan_baku', $data);
	}

	public function pengadaan_tolak($id, $data) 
	{
		$this->db->where('id_baku', $id);
		return $this->db->update('bahan_baku', $data);
	}

	public function approveya()
	{
		$data = [
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'status' => 'Diterima',
			];
		$this->db->where('id_permintaan', $this->input->post('id_permintaan'));
		$this->db->update('permintaan_barang', $data);

		$dataa = [
				'stok' => htmlspecialchars($this->input->post('stok', true) - $this->input->post('qty', true) ),
			];
		$this->db->where('id_barang', $this->input->post('id_barang'));
		$this->db->update('data_barang', $dataa);
	}

	public function getBaku()
	{
		$this->db->order_by('id_baku', 'DESC');
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = bahan_baku.id_supplier');


		$this->db->where('status', 'Menunggu Diapprove');


		return $query = $this->db->get()->result_array(); 
	}









}