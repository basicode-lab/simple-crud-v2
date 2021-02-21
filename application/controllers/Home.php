<?php 
  class Home extends CI_Controller
  {
    public function index()
    {
      $data['title'] = "Selamat datang!";
      $this->load->view('layouts/header', $data);
      $this->load->view('layouts/navbar');
      $this->load->view('index', $data);
      $this->load->view('layouts/footer');
    }
  }
?>