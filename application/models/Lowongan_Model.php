<?php

class Lowongan_Model extends CI_Model{
       
  public function getLowongan()
  {
    return $this->db->get('view_lowongan_persyaratan')->result_array();
  }
  
  public function tambah_data_lowongan()
  {
    $data_lowongan = array(
      'id_lowongan' => $this->input->post('id', true),
      'tgl' => $this->input->post('tgl', true),
      'id_pabrik' => $this->input->post('pabrik', true)
      );

      $data_persyaratan = array(
        'id' => $this->input->post('id_persyaratan', true),
        'tinggi' => $this->input->post('tinggi', true),
        'nilai_un_mtk' => $this->input->post('nilai_un_mtk', true),
        'nilai_un' => $this->input->post('nilai_un', true),
        'id_lowongan' => $this->input->post('id', true)
        );
      
      $this->db->insert('lowongan', $data_lowongan);
      $this->db->insert('persyaratan', $data_persyaratan);
  }
}
