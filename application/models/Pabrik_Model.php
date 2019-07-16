<?php

class Pabrik_Model extends CI_Model{
       
  public function getPabrik()
  {
    return $this->db->get('pabrik')->result_array();
  }

  public function tambah_data_pabrik()
  {
    $data = array(
      'id' => $this->input->post('id', true),
      'nama_pabrik' => $this->input->post('nama', true),
      'alamat' => $this->input->post('alamat', true)
      );

      $this->db->insert('pabrik', $data);
  }

}
