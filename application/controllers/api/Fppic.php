<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fppic extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('fppic_model');
        $this->load->library('session');
    }

    public function get_barang()
    {
        $data = $this->fppic_model->get_barang();
        
        if ($data == TRUE) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success get barang';
            $response['data'] = $data;
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $data;
        }
        
        echo json_encode($response);
    }

    public function create_ppic()
    {
        $data['id_user'] = $this->session->userdata('id_user');
        $data['add_kode_order'] = $this->input->post('add_kode_order');
        $data['add_produk'] = $this->input->post('add_produk');
        $data['quantity_order'] = $this->input->post('quantity_order');
        $data['tgl_start'] = date('Y-m-d H:i:s');
        $data['add_id_barang'] = $this->input->post('add_id_barang');
        $data['add_qty_order'] = $this->input->post('add_qty_order');
        $data['add_stock_barang'] = $this->input->post('add_stock_barang');

        $insert = $this->fppic_model->create_ppic($data);
        
        if ($insert == TRUE) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success add ppic';
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $insert;
        }

        echo json_encode($response);

    }
}