<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fppic_model extends CI_Model
{
    function get_barang()
    {
        try {
            $qObj = $this->db->get('tbl_barang');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $qObj->result_array();
    }
}