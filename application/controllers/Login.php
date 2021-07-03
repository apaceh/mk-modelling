<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('login');
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['user' => $username])->row_array();

		if (!$user) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak ditemukan!</div>');
			redirect('login');
		} elseif ($user['aktif'] == 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak Dapat Login, Status User Non-Aktif!</div>');
			redirect('login');
		} else {
			// cek password
			if (password_verify($password, $user['pass'])) {
				$data = ['username' => $user['user'], 'level' => $user['level']];
				$this->session->set_userdata($data);
				if ($user['level'] == 1) {
					redirect('user');
				} else {
					redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah password!</div>');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Log Out!</div>');
		redirect('login');
	}
}
