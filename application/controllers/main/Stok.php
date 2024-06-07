<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function index()
    {
        $this->load->view('main/stok');
    }

    public function detail($id)
    {
        $data['kode_barang'] = $id;
        $this->load->view('main/detail_stok', $data);
    }
}
