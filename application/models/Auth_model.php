<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    function register($data)
    {
        $signup_fullname = $data['signup_fullname'];
        $signup_email = $data['signup_email'];
        $signup_password = $data['signup_password'];
        $signup_terms = $data['signup_terms'];
        $insert = [
            'fullname' => $signup_fullname,
            'email' => $signup_email,
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
            $this->db->where('email', $email);
            $qObj = $this->db->get('tbl_user');
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