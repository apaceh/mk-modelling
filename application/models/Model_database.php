<?php

class Model_database extends CI_Model
{

  public function ruang($jenis)
  {
    $this->db->order_by('nama');
    return $this->db->get_where('tb_ruang_kerja', ['aktif > ' => 0, 'jenis' => $jenis])
      ->result_array();
  }
}
