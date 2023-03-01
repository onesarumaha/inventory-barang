<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idsupplier($id)
	{
		return $this->db->get_where('data_supplier', ['id_supplier' => $id])->row_array();
	}

	public function getBaku()
	{
		$this->db->order_by('id_baku', 'DESC');
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = bahan_baku.id_supplier');

		$username = $this->session->userdata['username'];
		$this->db->where('nama_supplier', $username);
		
		$this->db->where('status', 'Diapprove');


		return $query = $this->db->get()->result_array(); 
	}

	public function getBakuSelesai()
	{
		$this->db->order_by('id_baku', 'DESC');
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = bahan_baku.id_supplier');

		$username = $this->session->userdata['username'];
		$this->db->where('nama_supplier', $username);
		
		$this->db->where('status', 'Barang Diterima');
		$this->db->or_where_in('status', 'Barang Selesai');


		return $query = $this->db->get()->result_array(); 
	}

	public function getSupplier()
	{
		return $this->db->get('data_supplier')->result_array();  
	}

	public function tambahSupplier()
	{


		$user = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_supplier', true)),
				'username' => htmlspecialchars($this->input->post('nama_supplier', true)),
				'level' => 'Supplier',

		];
		$this->db->insert('users', $user);

		$id_user = $this->db->insert_id();
		$data = [
				'id_user' => $id_user,
				'nama_supplier' => htmlspecialchars($this->input->post('nama_supplier', true)),
				'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
				'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'alamat_supplier' => htmlspecialchars($this->input->post('alamat', true)),
				

			];

		$this->db->insert('data_supplier', $data);
	}

	public function editSupplier()
	{
		$data = [
				'nama_supplier' => htmlspecialchars($this->input->post('nama_supplier', true)),
				'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
				'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
				'alamat_supplier' => htmlspecialchars($this->input->post('alamat', true)),
			];
		$this->db->where('id_supplier', $this->input->post('id_supplier'));
		$this->db->update('data_supplier', $data);
	}

	public function hapusSupplier($id)
	{
		$this->db->delete('data_supplier', ['id_supplier' => $id] );

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

		$this->db->where('status_pengadaan', 'Diterima');

		$username = $this->session->userdata['username'];
		$this->db->where('nama_supplier', $username);

		return $query = $this->db->get()->result_array();
	}

	public function getPemesananSelesai()
	{
		$this->db->order_by('id_pengadaan', 'DESC');
		$this->db->select('*');
		$this->db->from('pengadaan_barang');
		$this->db->join('data_barang', 'data_barang.id_barang = pengadaan_barang.id_barang');
		$this->db->join('data_supplier', 'data_supplier.id_supplier = pengadaan_barang.id_supplier');

		$this->db->where('status_pengadaan', 'Selesai');

		$username = $this->session->userdata['username'];
		$this->db->where('nama_supplier', $username);

		return $query = $this->db->get()->result_array();
	}

	public function prosesPemesanan()
	{
		$data = [
				
				'pesan' => htmlspecialchars($this->input->post('pesan', true)),
				'status' => 'Barang Selesai',
			];

		$this->db->where('id_baku', $this->input->post('id_baku'));
		$this->db->update('bahan_baku', $data);
	}

	public function getSumSupplier()
	{
		$query = $this->db->get('data_supplier');
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