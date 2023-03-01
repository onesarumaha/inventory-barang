<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('log/login');
		}else{
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if($user) {
			if(password_verify($password, $user['password'])) { 
				$data = [
					'username' => $user['username'],
					'level' => $user['level'],
					'nama_lengkap' => $user['nama_lengkap'],
					'id_user' => $user['id_user'],
				];
				$this->session->set_userdata($data);
				if($user['level'] == 'Staff Lapangan' ) {
					redirect(base_url('Dashboard'));
				}elseif($user['level'] == 'Manager') {
					redirect(base_url('Dashboard'));
				}elseif($user['level'] == 'Staff Gudang') {
					redirect(base_url('Dashboard'));
				}elseif($user['level'] == 'Staff Produksi') {
					redirect(base_url('Dashboard'));
				}elseif($user['level'] == 'Supplier') {
					redirect(base_url('Dashboard'));
				}
			}else{
				$this->session->set_flashdata('notif', '<div class="col-md-12 mb-3">
              <div class="alert alert--danger">
                <div class="alert__icon">
                  <span class="fa fa-warning"></span>
                </div>
                <div class="alert__description">
                  Password Salah
                </div>
              </div>
            </div>');
        		redirect(base_url('Log'));
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="col-md-12 mb-3">
              <div class="alert alert--danger">
                <div class="alert__icon">
                  <span class="fa fa-warning"></span>
                </div>
                <div class="alert__description">
                  Username Salah
                </div>
              </div>
            </div>');
        	redirect(base_url('Log'));
		}
	}

	public function daftar()
	{
		$this->load->view('log/daftar');
	}

	public function action_daftar() 
	{
		if($this->session->userdata('username')) {
			redirect('Log');
		}

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
			'required' => 'Nama Harus Diisi',
		]);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
				'is_unique' => 'Username sudah terdaftar!',
				'required' => 'Username Harus Diisi'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]|matches[konfirpassword]', [
				'matches' => 'Password Tidak Sesuai',
				'min_length' => 'Password terlalu pendek minimal 5 karakter',
				'required' => 'Password Harus Diisi'
		]);
		$this->form_validation->set_rules('konfirpassword', 'Konfirmasi Password', 'required|trim|matches[password]',[
			'matches' => 'Password Harus Sama',
			'required' => 'Konfirmasi Password Harus Diisi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		


		if($this->form_validation->run() == false){
			$data['title'] = 'DAFTAR';
			$this->load->view('log/daftar', $data);
		}else{

			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'jk' => htmlspecialchars($this->input->post('jk', true)),
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

				'level' => 'Supplier'
			];

			$this->db->insert('users', $data);


			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">
 			 Login Berhasil, Silahkan Login !</div>');
			redirect('Log/');

		}
	}

	public function logout()
	{
		
		$this->session->sess_destroy();


		$this->session->set_flashdata('notif', '<div class="col-md-12 mb-3">
              <div class="alert alert--success">
                <div class="alert__icon">
                  <span class="fa fa-check-circle"></span>
                </div>
                <div class="alert__description">
                  Logout Berhasil
                </div>
              </div>
            </div>');
        redirect(base_url('Log'));
	}














}
