<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function idkaryawan($id)
	{
		return $this->db->get_where('data_karyawan', ['id_karyawan' => $id])->row_array();
	}

	public function getKaryawan()
	{
		$this->db->order_by('id_karyawan', 'DESC');
		$this->db->select('*');
		$this->db->from('data_karyawan');
		$this->db->join('users', 'users.id_user = data_karyawan.id_user');

		return $query = $this->db->get()->result_array();
		 
	}

	public function tambahKaryawan()
	{


		$data = [
				'nama_karyawan' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'jk_karyawan' => htmlspecialchars($this->input->post('jk', true)),
				'alamat_karyawan' => htmlspecialchars($this->input->post('alamat', true)),
				'tmp_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'id_user' => htmlspecialchars($this->input->post('username', true)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),

		];
		$this->db->insert('data_karyawan', $data);

	
	}

	public function editKaryawan()
	{
		$data = [
				'nama_karyawan' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'jk_karyawan' => htmlspecialchars($this->input->post('jk', true)),
				'alamat_karyawan' => htmlspecialchars($this->input->post('alamat', true)),
				'tmp_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'id_user' => htmlspecialchars($this->input->post('username', true)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
			];
		$this->db->where('id_karyawan', $this->input->post('id_karyawan'));
		$this->db->update('data_karyawan', $data);
	}

	public function hapusKaryawan($id)
	{
		$this->db->delete('data_karyawan', ['id_karyawan' => $id] );

	}

	public function getSumKaryawan()
	{
		$query = $this->db->get('data_karyawan');
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