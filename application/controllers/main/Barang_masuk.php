<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
    public function index()
    {
        $this->load->view('main/barang_masuk');
    }
}
