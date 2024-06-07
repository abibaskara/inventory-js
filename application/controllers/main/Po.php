<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Po extends CI_Controller
{
    public function index()
    {
        $this->load->view('main/po');
    }
}
