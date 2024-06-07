<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }

    function datatableApproval()
    {
        $user = $this->user_model->getApproval();
        if ($user) {
            $no = 1;
            foreach ($user as $row) {
                $result[] = [
                    'no' => $no,
                    'id' => $row['id_user'],
                    'fullname' => $row['fullname'],
                    'email' => $row['email'],
                    'jabatan' => $row['jabatan'],
                    'role_name' => $row['role_name'],
                    'created_at' => date('d/m/Y', strtotime($row['created_at'])),
                    'is_active' => $row['is_active'],

                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }

    function datatable()
    {
        $user = $this->user_model->get();
        if ($user) {
            $no = 1;
            foreach ($user as $row) {
                $result[] = [
                    'no' => $no,
                    'id' => $row['id_user'],
                    'fullname' => $row['fullname'],
                    'email' => $row['email'],
                    'jabatan' => $row['jabatan'],
                    'role_name' => $row['role_name'],
                    'created_at' => date('d/m/Y', strtotime($row['created_at'])),
                    'is_active' => $row['is_active'],

                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }

    public function approve()
    {
        $id = $this->input->post('id');

        $update = [
            'is_active' => '1'
        ];
        $user = $this->user_model->updateApproval($id, $update);
        if ($user != TRUE) {
            $response['status'] = "Error";
            $response['messages'] = $user;
        } else {
            $response['status'] = "Success";
            $response['messages'] = "This user success approve :)";
        }
        echo json_encode($response);
    }

    public function decline()
    {
        $id = $this->input->post('id');

        $update = [
            'is_active' => '2'
        ];
        $user = $this->user_model->updateApproval($id, $update);
        if ($user != TRUE) {
            $response['status'] = "Error";
            $response['messages'] = $user;
        } else {
            $response['status'] = "Success";
            $response['messages'] = "This user success decline";
        }
        echo json_encode($response);
    }

    public function detail()
    {
        $id = $this->input->get('id');
        $user = $this->user_model->getDetail($id);
        if ($user) {
            $response['status'] = "Success";
            $response['messages'] = "Get user success";
            $response['data'] = $user;
        } else {
            $response['status'] = "Error";
            $response['messages'] = $user;
        }
        echo json_encode($response);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        try {
            $this->db->where('id_user', $id);
            $this->db->delete('tbl_user');
        } catch (\Throwable $th) {
            $response['status'] = "Error";
            $response['messages'] = $th->getMessage();
        }
        $response['status'] = "Success";
        $response['messages'] = "Success Delete User";

        echo json_encode($response);
    }
}
