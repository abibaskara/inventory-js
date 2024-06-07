<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('stok_model');
        $this->load->library('session');
    }

    public function card()
    {
        $in_out = $this->stok_model->card_in_out();
        $stok_barang = $this->stok_model->stok_barang();

        $data = array_merge($in_out, $stok_barang);
        $response['status'] = 'Success';
        $response['messages'] = 'Success get card stok';
        $response['data'] = $data;

        echo json_encode($response);
    }

    public function datatable()
    {
        $data = $this->stok_model->get_stok();
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_barang'],
                    'kode_barang' => $key['kode_barang'],
                    'nama_barang' => $key['nama_barang'],
                    'jumlah_barang' => $key['jumlah_barang'],
                    'harga_barang' => 'Rp. ' . number_format($key['harga_barang'], 0),
                    'total_harga' => 'Rp. ' . number_format($key['total'], 0),
                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }

    public function detail_header()
    {
        $kode_barang = $this->input->get('kode_barang');

        $data = $this->stok_model->get_detail_header($kode_barang);

        $response['status'] = 'Success';
        $response['messages'] = 'Success get detail stok header';
        $response['data'] = $data;

        echo json_encode($response);
    }
}