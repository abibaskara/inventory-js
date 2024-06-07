<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    function getApproval()
    {
        $this->db->select('tbl_jabatan.*, tbl_role.*, tbl_user.*');
        $this->db->where('is_active', '0');
        $this->db->from('tbl_user');
        $this->db->join('tbl_jabatan', 'tbl_user.id_jabatan = tbl_jabatan.id_jabatan');
        $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id_role');
        $qObj = $this->db->get();
        return $qObj->result_array();
    }

    function get()
    {
        $this->db->select('tbl_jabatan.*, tbl_role.*, tbl_user.*');
        $this->db->where('is_active', '1');
        $this->db->or_where('is_active', '2');
        $this->db->from('tbl_user');
        $this->db->join('tbl_jabatan', 'tbl_user.id_jabatan = tbl_jabatan.id_jabatan');
        $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id_role');
        $qObj = $this->db->get();
        return $qObj->result_array();
    }

    function updateApproval($id, $update)
    {
        try {
            $this->db->where('id_user', $id);
            $this->db->update('tbl_user', $update);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function getDetail($id)
    {
        try {
            $this->db->where('id_user', $id);
            $this->db->join('tbl_jabatan', 'tbl_user.id_jabatan = tbl_jabatan.id_jabatan');
            $this->db->join('tbl_role', 'tbl_user.id_role = tbl_role.id_role');
            $qObj = $this->db->get('tbl_user');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $qObj->row_array();
    }
}
