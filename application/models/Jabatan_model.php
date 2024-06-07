<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Jabatan_model extends CI_Model
{
    function add($jabatan)
    {
        try {
            $this->db->insert('tbl_jabatan', [
                'jabatan' => $jabatan
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function edit($jabatan, $id)
    {
        try {
            $this->db->where('id_jabatan', $id);
            $this->db->update('tbl_jabatan', [
                'jabatan' => $jabatan
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function get()
    {
        try {
            $qObj = $this->db->get('tbl_jabatan');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $qObj->result_array();
    }
}
