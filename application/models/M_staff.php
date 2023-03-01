<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_staff extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idstaff($id)
	{
		return $this->db->get_where('users', ['id_user' => $id])->row_array();
	}

	public function getStaff()
	{
		$this->db->or_where_not_in('level', 'Supplier');
		$this->db->where_not_in('level',  'Manager' );

		return $this->db->get('users')->result_array();  
	}

	public function tambahStaff()
	{


		$data = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'level' => htmlspecialchars($this->input->post('level', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),

		];
		$this->db->insert('users', $data);

	
	}

	public function editStaff()
	{
		$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'level' => htmlspecialchars($this->input->post('level', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
			];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('users', $data);
	}

	public function hapusStaff($id)
	{
		$this->db->delete('users', ['id_user' => $id] );

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


	public function idpemesanan($id)
	{
		return $this->db->get_where('pengadaan_barang', ['id_permintaan' => $id])->row_array();
	}

	public function getPemesanan()
	{
		$this->db->order_by('id_pengadaan', 'DESC');
		$this->db->select('*');
		$this->db->from('pengadaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = pengadaan_barang.id_barang');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = pengadaan_barang.id_supplier');

		// $this->db->where('status_pengadaan', 'Diterima');

		$username = $this->session->userdata['username'];
		$this->db->where('nama_supplier', $username);

		return $query = $this->db->get()->result_array();
	}

	public function prosesPemesanan()
	{
		$data = [
				'status_pengadaan' => htmlspecialchars($this->input->post('status_pengadaan', true)),
				'pesan' => htmlspecialchars($this->input->post('pesan', true)),
			];

		$this->db->where('id_pengadaan', $this->input->post('id_pengadaan'));
		$this->db->update('pengadaan_barang', $data);
	}










}