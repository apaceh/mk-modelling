<?php

class Model_database extends CI_Model
{

  public function ruang($jenis)
  {
    $this->db->order_by('nama');
    return $this->db->get_where('tb_ruang_kerja', ['aktif > ' => 0, 'jenis' => $jenis])
      ->result_array();
  }

  public function getAntrianByUser()
  {
    $id_user = $this->session->userdata('id_user');

    $ruang = $this->db->get_where('tb_ruang_kerja', ['id_user' => $id_user])->row_array();

    $tgl = date('Y-m-d');

    $query = $this->db->select()
      ->from('tb_utama')
      ->where(['status' => 0, "DATE_FORMAT(tanggal, '%Y-%m-%d') = " => $tgl, 'tipe' => $ruang['jenis']])
      ->order_by('tanggal', 'asc')
      ->get()->row_array();

    return $query;
  }
}
