<?php

class home extends CI_Controller
{
  public function index()
  {
    $data['judul'] = "Home";
    $this->load->view("template/header",$data);
    $this->load->view("index");
    $this->load->view("template/footer");
  }
}
