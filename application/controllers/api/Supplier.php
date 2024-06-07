<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_model');
        $this->load->library('session');
    }

    public function datatable()
    {
        $supplier = $this->supplier_model->get();

        $no = 1;
        if ($supplier) {
            foreach ($supplier as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_supplier'],
                    'kode_supplier' => $key['kode_supplier'],
                    'nama_supplier' => $key['nama_supplier'],
                    'alamat_supplier' => $key['alamat_supplier'],
                    'nama_pic' => $key['nama_pic'],
                    'telp_pic' => $key['telp_pic'],
                    'created_at' => date('d/m/Y', strtotime($key['created_at']))
                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }

    public function add()
    {
        $data['add_kode_supplier'] = $this->input->post('add_kode_supplier');
        $data['add_nama_supplier'] = $this->input->post('add_nama_supplier');
        $data['add_nama_pic'] = $this->input->post('add_nama_pic');
        $data['add_telp_pic'] = $this->input->post('add_telp_pic');
        $data['add_alamat_supplier'] = $this->input->post('add_alamat_supplier');
        $id = $this->input->post('add_id_supplier');

        if ($data['add_alamat_supplier'] == NULL || $data['add_alamat_supplier'] == '') {
            $response['status'] = 'Error';
            $response['messages'] = 'Alamat is required';
            echo json_encode($response);
            exit;
        }

        if ($id == '') {
            $save = $this->supplier_model->add($data);
            if ($save == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success add supplier';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        } else {
            $update = $this->supplier_model->edit($data, $id);

            if ($update == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success edit supplier';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        }

        echo json_encode($response);
    }

    public function get()
    {
        $id = $this->input->get('id');
        $data = $this->supplier_model->getbyid($id);
        if ($data) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success get supplier';
            $response['data'] = $data;
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $save;
        }
        echo json_encode($response);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        try {
            $this->db->where('id_supplier', $id);
            $this->db->delete('tbl_supplier');
        } catch (\Throwable $th) {
            $response['status'] = 'Error';
            $response['messages'] = $th->getMessage();
            echo json_encode($response);
            exit;
        }
        $response['status'] = 'Success';
        $response['messages'] = 'Success Delete role';
        echo json_encode($response);
    }
}
