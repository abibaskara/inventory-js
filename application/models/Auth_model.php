<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    function register($data)
    {
        $signup_fullname = $data['signup_fullname'];
        $signup_email = $data['signup_email'];
        $signup_jabatan = $data['signup_jabatan'];
        $signup_role = $data['signup_role'];
        $signup_password = $data['signup_password'];
        $signup_terms = $data['signup_terms'];
        $insert = [
            'fullname' => $signup_fullname,
            'email' => $signup_email,
            'id_jabatan' => $signup_jabatan,
            'id_role' => $signup_role,
            'password' => password_hash($signup_password, PASSWORD_DEFAULT),
            'is_active' => '0'
        ];
        
        try {
            $this->db->insert('tbl_user', $insert);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return true;
    }

    function cek_user($email)
    {
        try {
            // $this->db->where('email', $email);
            // $qObj = $this->db->get('tbl_user');
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id_role');
            $this->db->join('tbl_jabatan', 'tbl_user.id_jabatan = tbl_jabatan.id_jabatan');
            $this->db->where('tbl_user.email', $email);
            $qObj = $this->db->get();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        if($qObj->num_rows() > 0) {
            return $qObj->row_array();
        } else {
            return false;
        }
    }
}