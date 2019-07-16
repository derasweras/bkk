<?php
class Lowongan extends CI_Controller
{

  public function __construct() {
    parent::__construct();
    $this->load->model('Lowongan_Model');
    $this->load->model('Pabrik_Model');
    $this->load->library('form_validation');
  }

  public function index()
  {
        $data['lowongan']= $this->Lowongan_Model->getLowongan();
        $data['judul']= "Lowongan kerja";
        $this->load->view("data/lowongan/index",$data);
  }

  public function tambah_lowongan()
  {
     $data['pabrik']= $this->Pabrik_Model->getPabrik();
     $data['judul']= "Tambah Data Lowongan";
     $this->form_validation->set_rules('id', 'Id', 'required');
     $this->form_validation->set_rules('tgl', 'tgl', 'required');
     $this->form_validation->set_rules('id_persyaratan', 'Id persyaratan', 'required');
     $this->form_validation->set_rules('tinggi', 'Tinggi', 'required|numeric');
     $this->form_validation->set_rules('nilai_un_mtk', 'nilai UN MTK', 'required|numeric');
     $this->form_validation->set_rules('nilai_un', 'nilai UN', 'required|numeric');
  //   $this->form_validation->set_rules('email', 'email', 'required|valid_email');
     if ($this->form_validation->run() == FALSE)
     {
         $this->load->view("template/header",$data);
         $this->load->view('data/lowongan/tambah-data-lowongan',$data);
         $this->load->view("template/footer");

     }
     else
     {
      $this->Lowongan_Model->tambah_data_lowongan();
      //  $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('Lowongan');
     }
  }
}
