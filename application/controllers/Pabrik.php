<?php
class Pabrik extends CI_controller
{

  public function __construct() {
    parent::__construct();
    $this->load->model('Pabrik_Model');
    $this->load->library('form_validation');
  }


  public function index()
  {
        $data['Pabrik']= $this->Pabrik_Model->getPabrik();
        $data['judul']= "Data Pabrik";
        $this->load->view("template/header",$data);
        $this->load->view("data/pabrik/index",$data);
        $this->load->view("template/footer");
  }

  public function tambah_pabrik()
  {
       // $data['siswa']= $this->Siswa_Model->getAllSiswa();
        $data['judul']= "Tambah Data Pabrik";
         $this->form_validation->set_rules('id', 'Id', 'required');
         $this->form_validation->set_rules('nama', 'Nama', 'required');
         $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      //   $this->form_validation->set_rules('email', 'email', 'required|valid_email');
         if ($this->form_validation->run() == FALSE)
         {
             $this->load->view("template/header",$data);
             $this->load->view('data/pabrik/tambah-data-pabrik');
             $this->load->view("template/footer");

         }
         else
         {
          $this->Pabrik_Model->tambah_data_pabrik();
          //  $this->session->set_flashdata('flash', 'ditambahkan');
          redirect('Pabrik');
         }

         
         
        
  }
}
