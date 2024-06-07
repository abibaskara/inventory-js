<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Role_model extends CI_Model
{
    function add($role_name)
    {
        try {
            $this->db->insert('tbl_role', [
                'role_name' => $role_name
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function edit($role_name, $id)
    {
        try {
            $this->db->where('id_role', $id);
            $this->db->update('tbl_role', [
                'role_name' => $role_name
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function get()
    {
        try {
            $qObj = $this->db->get('tbl_role');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $qObj->result_array();
    }
}
