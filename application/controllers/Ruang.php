<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
  }

  public function index()
  {
    $data['page'] = "ruang";
    $data['ruang'] = $this->db->get('tb_ruang_kerja')->result_array();
    $this->load->view('templates/admin/header', $data);
    $this->load->view('ruang/index');
    $this->load->view('templates/admin/footer');
  }
}
