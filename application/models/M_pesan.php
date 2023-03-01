<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idPesan($id)
	{
		return $this->db->get_where('pesan', ['id_pesan' => $id])->row_array();
	}

	public function getPesan()
	{
		$this->db->order_by('id_pesan', 'DESC');

		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->join('data_barang', 'data_barang.id_barang = pesan.id_barang');
		$this->db->join('users', 'users.id_user = pesan.id_user');

		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array(); 
	}

	public function tambahPesan()
	{
		$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'id_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'isi_pesan' => htmlspecialchars($this->input->post('isi_pesan', true)),
				'status_pesan' => 'Pesan Masuk'
			];

		$this->db->insert('pesan', $data);
	}


	public function editPesan()
	{
		$data = [
				'id_barang' => htmlspecialchars($this->input->post('nama_barang', true)),
				'isi_pesan' => htmlspecialchars($this->input->post('isi_pesan', true)),
			];
		$this->db->where('id_pesan', $this->input->post('id_pesan'));
		$this->db->update('pesan', $data);
	}

	public function hapusPesan($id)
	{
		$this->db->delete('pesan', ['id_pesan' => $id] );

	}

	public function getPesanMasuk()
	{
		$this->db->order_by('id_pesan', 'DESC');

		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->join('data_barang', 'data_barang.id_barang = pesan.id_barang');
		$this->db->join('users', 'users.id_user = pesan.id_user');


		return $query = $this->db->get()->result_array(); 
	}

	public function diterima_pesan($id, $data) 
	{
		$this->db->where('id_pesan', $id);
		return $this->db->update('pesan', $data);
	}








}