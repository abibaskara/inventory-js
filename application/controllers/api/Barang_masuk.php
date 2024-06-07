<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('barang_masuk_model');
        $this->load->library('session');
    }

    public function add()
    {
        $data['add_kode_barang'] = $this->input->post('add_kode_barang');
        $data['add_nama_barang'] = $this->input->post('add_nama_barang');
        $data['add_category_barang'] = $this->input->post('add_category_barang');
        $data['add_jumlah_barang'] = $this->input->post('add_jumlah_barang');
        $data['add_description_barang'] = $this->input->post('add_description_barang');
        $data['add_harga_persatuan'] = preg_replace('/\D/', '', $this->input->post('add_harga_persatuan'));
        $data['add_total'] = preg_replace('/\D/', '', $this->input->post('add_total'));


        //update barang
        $update = $this->barang_masuk_model->add($data);
        if ($update == TRUE) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success add barang';
            $this->barang_masuk_model->add_history($data);
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $update;
        }

        //insert history

        echo json_encode($response);
    }

    public function search()
    {
        $kode = $this->input->get('kode');

        $data = $this->barang_masuk_model->search($kode);
        $response['status'] = 'Success';
        $response['messages'] = 'Success add barang';
        $response['data'] = $data;

        echo json_encode($response);
    }

    public function datatable_history()
    {
        $data = $this->barang_masuk_model->get_history();
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'kode_barang' => $key['kode_barang'],
                    'nama_barang' => $key['nama_barang'],
                    'qty' => $key['qty'],
                    'type' => $key['type'],
                    'tgl_action' => date('d/m/Y H:i:s', strtotime($key['tgl_action']))
                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }
}
