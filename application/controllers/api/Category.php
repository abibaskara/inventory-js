<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->library('session');
    }

    public function add()
    {
        $nama_category = $this->input->post('add_nama_category');
        $id = $this->input->post('add_id_category');
        if ($id == '') {
            $save = $this->category_model->add($nama_category);

            if ($save == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success add category';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        } else {
            $update = $this->category_model->edit($nama_category, $id);

            if ($update == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success edit category';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        }

        echo json_encode($response);
    }

    public function datatable()
    {
        $data = $this->category_model->get();
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_category'],
                    'nama_category' => $key['nama_category'],
                    'created_at' => date('d/m/Y', strtotime($key['created_at']))
                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        try {
            $this->db->where('id_category', $id);
            $this->db->delete('tbl_category');
        } catch (\Throwable $th) {
            $response['status'] = 'Error';
            $response['messages'] = $th->getMessage();
            echo json_encode($response);
            exit;
        }
        $response['status'] = 'Success';
        $response['messages'] = 'Success Delete category';
        echo json_encode($response);
    }
}
