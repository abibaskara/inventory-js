<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
      $this->load->library('session');
      $logged_in = $this->session->userdata('logged_in');
      if($logged_in == TRUE)
      {
          $this->load->view('dashboard/index');
      } else {
        redirect('auth');
      }
    }
}