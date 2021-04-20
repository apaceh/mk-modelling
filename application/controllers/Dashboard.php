<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_database');
  }

  public function index()
  {
    $data['title'] = "Dashboard";
    $data['ruang_teller'] = $this->Model_database->ruang(0);
    $data['ruang_cs'] = $this->Model_database->ruang(1);

    $this->load->view('templates/header', $data);
    $this->load->view('index', $data);
    $this->load->view('templates/footer');
  }
}
