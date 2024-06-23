<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Produk_model extends CI_Model
{
    function get_produk()
    {
        $this->db->where('status', 'Close');
        $qObj = $this->db->get('tbl_ppic');
        if ($qObj->num_rows() > 0) {
            return $qObj->result_array();
        }
    }
    
    function get_ppic_detail($kode_order)
    {
        $this->db->select('tbl_ppic.*, tbl_user.fullname, DATE_FORMAT(tbl_ppic.tgl_start, "%d/%m/%Y") AS tgl_now');
        $this->db->from('tbl_ppic');
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_ppic.id_user');
        $this->db->where('kode_order', $kode_order);
        $qObj = $this->db->get();
        return $qObj->row_array();
    }

    function get_detail_ppic($id)
    {
        $this->db->select('tbl_detail_ppic.*, tbl_barang.kode_barang, tbl_barang.nama_barang');
        $this->db->from('tbl_detail_ppic');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang=tbl_detail_ppic.id_barang');
        $this->db->where('id_ppic', $id);
        $qObj = $this->db->get();
        return $qObj->result_array();
    }
}