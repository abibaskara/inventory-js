<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->library('session');
    }

    public function datatable()
    {
        $data = $this->produk_model->get_produk();
        
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_ppic'],
                    'kode_order' => $key['kode_order'],
                    'produk' => $key['produk'],
                    'qty_order' => $key['qty_order'],
                    'qty_actual' => (is_null($key['qty_actual']) ? '0' : $key['qty_actual']),
                    'qty_reject' => (is_null($key['qty_reject']) ? '0' : $key['qty_reject']),
                    'achive' => $key['achive'],
                    'status' => $key['status'],
                    'tgl_start' => date('d/m/Y H:i'),
                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }
    
    public function detail()
    {
        $kode_order = $this->input->get('kode_order');
        $data = $this->produk_model->get_ppic_detail($kode_order);
        $detail = $this->produk_model->get_detail_ppic($data['id_ppic']);

        $result['data'] = $data;
        $result['data']['detail'] = $detail;
        
        echo json_encode($result);
    }
}