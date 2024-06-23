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

    function create_ppic($data)
    {
        $id_user = $data['id_user'];
        $add_kode_order = $data['add_kode_order'];
        $add_produk = $data['add_produk'];
        $quantity_order = $data['quantity_order'];
        $tgl_start = $data['tgl_start'];
        $add_id_barang = $data['add_id_barang'];
        $add_qty_order = $data['add_qty_order'];
        $add_stock_barang = $data['add_stock_barang'];

        try {
            // insert tbl ppic
            $ppic = $this->db->insert('tbl_ppic', [
                'id_user' => $id_user,
                'kode_order' => $add_kode_order,
                'produk' => $add_produk,
                'status' => 'Release',
                'tgl_start' => $tgl_start,
                'qty_order' => $quantity_order,
                'achive' => 0
            ]);
            $ppic_id = $this->db->insert_id();

            foreach($add_id_barang as $key => $value)
            {
                // insert tbl detail ppic
                $this->db->insert('tbl_detail_ppic', [
                    'id_ppic' => $ppic_id,
                    'id_barang' => $value,
                    'qty' => $add_qty_order[$key]
                ]);

                // update tbl barang
                $new_stock = intval($add_stock_barang[$key]) - intval($add_qty_order[$key]);
                $this->db->where('id_barang', $value);
                $this->db->update('tbl_barang', [
                    'jumlah_barang' => $new_stock
                ]);

                // insert history barang
                $this->db->insert('tbl_history_barang', [
                    'id_barang' => $value,
                    'qty' => $add_qty_order[$key],
                    'tgl_action' => $tgl_start,
                    'type' => 'OUT'
                ]);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }
}