<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
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
    $data = [
      "teller" => $antri + 1
    ];
    $this->db->update('nasabah', $data);
    $data['nasabah'] = $this->db->get('nasabah')->result_array();
    $this->load->view('tiket_teller', $data);
    redirect("nasabah");
  }
  public function cs($antri = '')
  {
    $data = [
      "cs" => $antri + 1
    ];
    $this->db->update('nasabah', $data);
    $data['nasabah'] = $this->db->get('nasabah')->result_array();
    $this->load->view('tiket_teller', $data);
    redirect("nasabah");
  }
}
