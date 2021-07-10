<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontrolAntrian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_database');
    date_default_timezone_set('Asia/Jakarta');

    if ($this->session->userdata('username') == null) {
      redirect('login');
    }
  }

  public function index()
  {
    $data['page'] = "Kontrol Antrian";
    $data['no_sidebar'] = true;
    $this->_cekAntrian();

    $antrian = $this->Model_database->getAntrianByUser();

    if ($antrian) {
      $data['antrian'] = $antrian;
    }

    $this->load->view('templates/admin/header', $data);
    $this->load->view('kontrol_antrian/index');
    $this->load->view('templates/admin/footer');
  }

  public function next_antrian($id = null)
  {
    if ($id == null) {
      $this->_cekAntrian();
    } else {
      // update antrian sebelumnya
      $this->db->update('tb_utama', ['status' => 1], ['id' => $id]);
    }
    redirect('kontrolAntrian');
  }

  public function _cekAntrian()
  {
    $id_user = $this->session->userdata('id_user');
    // ambil antriannya
    $antrian = $this->db->get_where('tb_utama', ['id_ruang' => null, "tipe = (SELECT jenis FROM tb_ruang_kerja WHERE id_user = $id_user)" => null])->row_array();
    if ($antrian) {
      $id = $antrian['id'];

      $ruang = $this->db->get_where('tb_ruang_kerja', ['id_user' => $id_user])->row_array();

      $data = [
        'id_user' => $id_user,
        'id_ruang' => $ruang['id_ruang']
      ];

      $this->db->update('tb_utama', $data, ['id' => $id]);
    }
  }
}
