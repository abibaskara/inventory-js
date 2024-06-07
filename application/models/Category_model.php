<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model
{
    function add($nama_category)
    {
        try {
            $this->db->insert('tbl_category', [
                'nama_category' => $nama_category
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function edit($nama_category, $id)
    {
        try {
            $this->db->where('id_category', $id);
            $this->db->update('tbl_category', [
                'nama_category' => $nama_category
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function get()
    {
        try {
            $qObj = $this->db->get('tbl_category');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $qObj->result_array();
    }
}
