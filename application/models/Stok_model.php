<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Stok_model extends CI_Model
{
    function card_in_out($kode_barang = '')
    {
        $this->db->select("SUM( CASE WHEN type = 'IN' THEN 1 ELSE 0 END ) AS total_in,
                            SUM( CASE WHEN type = 'OUT' THEN 1 ELSE 0 END ) AS total_out");
        $this->db->from('tbl_barang');
        if ($kode_barang != '') {
            $this->db->where('tbl_barang.kode_barang', $kode_barang);
        }
        $this->db->join('tbl_history_barang', 'tbl_history_barang.id_barang=tbl_barang.id_barang');
        $qObj = $this->db->get();
        return $qObj->row_array();
    }

    function stok_barang($kode_barang = '')
    {
        $this->db->select("SUM( jumlah_barang ) AS total_stok,
                            COUNT(*) AS total_barang");
        $this->db->from('tbl_barang');
        if ($kode_barang != '') {
            $this->db->where('tbl_barang.kode_barang', $kode_barang);
        }
        $qObj = $this->db->get();
        return $qObj->row_array();
    }

    function get_stok()
    {
        $qObj = $this->db->get('tbl_barang');
        if ($qObj->num_rows() > 0) {
            return $qObj->result_array();
        }
    }

    function get_detail_header($kode_barang)
    {
        $this->db->where('kode_barang', $kode_barang);
        $this->db->join('tbl_category', 'tbl_category.id_category=tbl_barang.id_category');
        $qObj = $this->db->get('tbl_barang');
        return $qObj->row_array();
    }

    function get_history($kode_barang)
    {
        $this->db->select('*');
        $this->db->from('tbl_history_barang');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang=tbl_history_barang.id_barang');
        $this->db->where('kode_barang', $kode_barang);
        $this->db->order_by('tgl_action', 'DESC');
        $qObj = $this->db->get();
        return $qObj->result_array();
    }
}
