<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('role_model');
        $this->load->library('session');
    }

    public function add()
    {
        $role = $this->input->post('add_role');
        $id = $this->input->post('add_id_role');
        if ($id == '') {
            $save = $this->role_model->add($role);

            if ($save == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success add role';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        } else {
            $update = $this->role_model->edit($role, $id);

            if ($update == TRUE) {
                $response['status'] = 'Success';
                $response['messages'] = 'Success edit role';
            } else {
                $response['status'] = 'Error';
                $response['messages'] = $save;
            }
        }

        echo json_encode($response);
    }

    public function datatable()
    {
        $data = $this->role_model->get();
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_role'],
                    'role_name' => $key['role_name'],
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
            $this->db->where('id_role', $id);
            $this->db->delete('tbl_role');
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
