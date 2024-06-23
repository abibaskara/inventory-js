<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function index()
    {
        $this->load->view('main/produk');
    }
    
    public function detail($id)
    {
        $data['kode_order'] = $id;
        $this->load->view('main/detail_produk', $data);
    }
}