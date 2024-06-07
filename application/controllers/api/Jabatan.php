<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('jabatan_model');
        $this->load->library('session');
    }

    public function add()
    {
        $jabatan = $this->input->post('add_jabatan');
        $id = $this->input->post('add_id_jabatan');
        if ($id == '') {
            $save = $this->jabatan_model->add($jabatan);

            if ($save == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success Add Jabatan';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        } else {
            $update = $this->jabatan_model->edit($jabatan, $id);

            if ($update == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success Edit Jabatan';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        }

        echo json_encode($response);
    }

    public function datatable()
    {
        $data = $this->jabatan_model->get();
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_jabatan'],
                    'jabatan' => $key['jabatan'],
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
            $this->db->where('id_jabatan', $id);
            $this->db->delete('tbl_jabatan');
        } catch (\Throwable $th) {
            $response['status'] = 'Error';
            $response['messages'] = $th->getMessage();
            echo json_encode($response);
            exit;
        }
        $response['status'] = 'Success';
        $response['messages'] = 'Success Delete Jabatan';
        echo json_encode($response);
    }
}
