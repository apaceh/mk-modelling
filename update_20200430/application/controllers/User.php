<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['page'] = "user";
    $data['user'] = $this->db->get('user')->result_array();
    $this->load->view('templates/admin/header', $data);
    $this->load->view('user/index');
    $this->load->view('templates/admin/footer');
  }
  public function tambah_user()
  {
    $data['page'] = "user";
    $this->load->view('templates/admin/header', $data);
    $this->load->view('user/tambah');
    $this->load->view('templates/admin/footer');
  }
  public function tambah()
  {
    //validasi kegiatan form
    $this->form_validation->set_rules("tnama", "Nama Pegawai", "required|trim", [
      'required' => 'Nama Pegawai tidak boleh kosong'
    ]);
    $this->form_validation->set_rules("tuser", "User", "required|trim|min_length[5]|is_unique[user.user]", [
      'required' => 'User tidak boleh kosong',
      'is_unique' => 'User sudah terdaftar',
      'min_length' => 'User minimal 5 karekter'
    ]);
    $this->form_validation->set_rules("tpass", "Password", "required|trim|min_length[5]", [
      'required' => 'Password tidak boleh kosong',
      'is_unique' => 'password sudah terdaftar',
      'min_length' => 'Password minimal 5 karekter'
    ]);

    //Uji validasi form diatas apabila belum memenuhi prosedur   
    if ($this->form_validation->run() == false) {
      $data['page'] = "user";
      $this->load->view('templates/admin/header', $data);
      $this->load->view("user/tambah");
      $this->load->view("templates/admin/footer");
    } else {
      $data = [
        'nama' => htmlspecialchars($this->input->post('tnama', true)),
        'level' => htmlspecialchars($this->input->post('tlevel', true)),
        'user' => htmlspecialchars($this->input->post('tuser', true)),
        'pass' => password_hash($this->input->post('tpass', true), PASSWORD_DEFAULT),
        'aktif' => 0
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('pesan', '  <div class="container alert alert-dismissible alert-success mt-3 mb-5">
            <p class="mb-0">User berhasil ditambahkan</p>
        </div>');
      redirect('user');
    }
  }

  public function aktif($id = "", $aktif = "")
  {
    if ($aktif == 0) {
      $this->db->where('id_login', $id);
      $this->db->update('user', ['aktif' => 1]);
    } else {
      $this->db->where('id_login', $id);
      $this->db->update('user', ['aktif' => 0]);
    }

    redirect('user');
  }
  public function hapus($id = "")
  {
    $this->db->delete('user', ['id_login' => $id]);
    redirect('user');
  }
  public function edit($id = "")
  {

    $data['page'] = "user";
    $data['user'] = $this->db->get_where('user', ['id_login' => $id])->row_array();
    $this->load->view('templates/admin/header', $data);
    $this->load->view('user/edit');
    $this->load->view('templates/admin/footer');
  }
  public function editp()
  {
    if ($this->input->POST('tuser') != "") {
      $data = ['user' => $this->input->POST('tuser', true)];
      $this->db->where('id_login', $this->input->POST('tid'));
      $this->db->update('user', $data);
    }
    if ($this->input->POST('tpass') != "") {
      $data = ['user' => $this->input->POST('tpass', true)];
      $this->db->where('id_login', $this->input->POST('tid'));
      $this->db->update('user', $data);
    }
    $data = [
      'nama' => $this->input->POST('tnama', true),
      'level' => $this->input->POST('tlevel')
    ];
    $this->db->where('id_login', $this->input->POST('tid'));
    $this->db->update('user', $data);
    redirect('user');
  }
}
