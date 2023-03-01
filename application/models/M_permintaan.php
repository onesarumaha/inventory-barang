<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permintaan extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idpermintaan($id)
	{
		return $this->db->get_where('permintaan_barang', ['id_permintaan' => $id])->row_array();
	}

	public function getPermintaan()
	{
		$this->db->order_by('id_permintaan', 'DESC');
		$this->db->select('*');
		$this->db->from('permintaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = permintaan_barang.id_barang');
		$this->db->join('users', 'users.id_user = permintaan_barang.id_user');

		// $this->db->where_not_in('status', 'Menunggu Persetujuan');
		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array();
	}

	public function getPermintaandata()
	{
		$this->db->order_by('id_permintaan', 'DESC');
		$this->db->select('*');
		$this->db->from('permintaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = permintaan_barang.id_barang');
		$this->db->join('users', 'users.id_user = permintaan_barang.id_user');

		

		return $query = $this->db->get()->result_array();
	}

	public function getPermintaandua()
	{
		$this->db->order_by('id_permintaan', 'DESC');
		$this->db->select('*');
		$this->db->from('permintaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = permintaan_barang.id_barang');
		$this->db->join('users', 'users.id_user = permintaan_barang.id_user');

		$this->db->where('status', 'Menunggu Persetujuan');


		return $query = $this->db->get()->result_array();
	}

	public function getPermintaanLap()
	{
		$this->db->order_by('id_permintaan', 'DESC');
		$this->db->select('*');
		$this->db->from('permintaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = permintaan_barang.id_barang');
		$this->db->join('users', 'users.id_user = permintaan_barang.id_user');

		$this->db->where('status', 'Diterima');


		return $query = $this->db->get()->result_array();
	}

	public function pilihBarang()
	{
		$data = [
				'id_barang' => htmlspecialchars($this->input->post('id_barang', true)),
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
				'tgl_permintaan' => htmlspecialchars($this->input->post('tgl_permintaan', true)),
				'status' => 'Menunggu Persetujuan',
				

			];

		$this->db->insert('permintaan_barang', $data);
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
				'status' => 'Menunggu Persetujuan',

			];
		$this->db->where('id_permintaan', $this->input->post('id_permintaan'));
		$this->db->update('permintaan_barang', $data);
	}

	public function getSumPermintaan()
	{
		$query = $this->db->get('permintaan_barang');
		    if($query->num_rows()>0)
		    {
		      return $query->num_rows();
		    }
		    else
		    {
		      return 0;
		    }
	}








}