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
}