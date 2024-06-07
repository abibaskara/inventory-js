<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Supplier_model extends CI_Model
{
    function get()
    {
        try {
            $qObj = $this->db->get('tbl_supplier');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $qObj->result_array();
    }

    function add($data)
    {
        $add_kode_supplier = $data['add_kode_supplier'];
        $add_nama_supplier = $data['add_nama_supplier'];
        $add_nama_pic = $data['add_nama_pic'];
        $add_telp_pic = $data['add_telp_pic'];
        $add_alamat_supplier = $data['add_alamat_supplier'];

        try {
            $this->db->insert('tbl_supplier', [
                'kode_supplier'     => $add_kode_supplier,
                'nama_supplier'     => $add_nama_supplier,
                'alamat_supplier'   => $add_alamat_supplier,
                'nama_pic'          => $add_nama_pic,
                'telp_pic'           => $add_telp_pic
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function edit($data, $id)
    {
        $add_kode_supplier = $data['add_kode_supplier'];
        $add_nama_supplier = $data['add_nama_supplier'];
        $add_nama_pic = $data['add_nama_pic'];
        $add_telp_pic = $data['add_telp_pic'];
        $add_alamat_supplier = $data['add_alamat_supplier'];

        try {
            $this->db->where('id_supplier', $id);
            $this->db->update('tbl_supplier', [
                'kode_supplier'     => $add_kode_supplier,
                'nama_supplier'     => $add_nama_supplier,
                'alamat_supplier'   => $add_alamat_supplier,
                'nama_pic'          => $add_nama_pic,
                'telp_pic'           => $add_telp_pic
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function getbyid($id)
    {
        try {
            $this->db->where('id_supplier', $id);
            $qObj = $this->db->get('tbl_supplier');
            if ($qObj->num_rows() > 0) {
                return $qObj->row_array();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
