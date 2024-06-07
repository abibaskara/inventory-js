<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->library('session');
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == TRUE) {
            redirect('/');
        } else {
            $this->load->view('auth/auth');
        }
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }
}
