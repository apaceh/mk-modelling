<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  public function index()
  {
    $data['title'] = "Nasabah";
    $data['nasabah'] = $this->db->get('nasabah')->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('nasabah');
    $this->load->view('templates/footer');
  }

  public function teller($antri = '')
  {
    $nasabah = $this->db->get('nasabah')->row_array();

    if ($nasabah['tgl'] != date('Y-m-d')) {
      $antri = 1;
      $data = [
        "teller" => 1,
        'cs' => 0,
        "tgl" => date('Y-m-d')
      ];
    } else {
      $antri = $antri + 1;
      $data = [
        "teller" => $antri
      ];
    }
    $this->db->update('nasabah', $data);

    // ambil teller yang idle
    $teller = $this->db->get_where('tb_ruang_kerja', ['jenis' => 0, 'aktif' => 1, 'id_ruang NOT IN (SELECT id_ruang FROM tb_utama WHERE status = 0)' => null])
      ->row_array();

    // insert data ke tb_utama
    $data_antri = [
      'tanggal' => date('Y-m-d H:i:s'),
      'id_user' => $teller ? $teller['id_user'] : null,
      'id_ruang' => $teller ? $teller['id_ruang'] : null,
      'no_antri' => $antri,
      'status' => 0,
      'tipe' => 0
    ];
    $this->db->insert('tb_utama', $data_antri);

    $data['nasabah'] = $this->db->get('nasabah')->result_array();
    $this->load->view('tiket_teller', $data);
    redirect("nasabah");
  }

  public function cs($antri = '')
  {
    $nasabah = $this->db->get('nasabah')->row_array();

    if ($nasabah['tgl'] != date('Y-m-d')) {
      $antri = 1;
      $data = [
        "teller" => 0,
        'cs' => 1,
        "tgl" => date('Y-m-d')
      ];
    } else {
      $antri = $antri + 1;
      $data = [
        "cs" => $antri
      ];
    }
    $this->db->update('nasabah', $data);

    // ambil cs yang idle
    $cs = $this->db->get_where('tb_ruang_kerja', ['jenis' => 1, 'aktif' => 1, 'id_ruang NOT IN (SELECT id_ruang FROM tb_utama WHERE status = 0)' => null])
      ->row_array();

    // insert data ke tb_utama
    $data_antri = [
      'tanggal' => date('Y-m-d H:i:s'),
      'id_user' => $cs ? $cs['id_user'] : null,
      'id_ruang' => $cs ? $cs['id_ruang'] : null,
      'no_antri' => $antri,
      'status' => 0,
      'tipe' => 1
    ];
    $this->db->insert('tb_utama', $data_antri);

    $data['nasabah'] = $this->db->get('nasabah')->result_array();
    $this->load->view('tiket_teller', $data);
    redirect("nasabah");
  }
}
