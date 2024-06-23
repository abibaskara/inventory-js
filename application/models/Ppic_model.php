<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Ppic_model extends CI_Model
{
    function get_ppic($status)
    {
        if($status != '') {
            $this->db->where('status', $status);
        }
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
        $this->db->select('tbl_detail_ppic.*, tbl_barang.kode_barang, tbl_barang.nama_barang, tbl_barang.jumlah_barang');
        $this->db->from('tbl_detail_ppic');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang=tbl_detail_ppic.id_barang');
        $this->db->where('id_ppic', $id);
        $qObj = $this->db->get();
        return $qObj->result_array();
    }

    function update($data)
    {
        $add_qty_prosess = $data['add_qty_prosess'];
        $add_qty_reject = $data['add_qty_reject'];
        $add_remark = $data['add_remark'];
        $add_qty_order = $data['add_qty_order'];
        $before_qty_prosess = $data['before_qty_prosess'];
        $kode_order = $data['kode_order'];
        $id_ppic = $data['id_ppic'];
        
        $add_id_barang = $data['add_id_barang'];
        $add_qty_item = $data['add_qty_item'];
        $add_stock_barang = $data['add_stock_barang'];
        $add_id_detail_ppic = $data['add_id_detail_ppic'];
        $add_qty_before = $data['add_qty_before'];

        try {
            
            $new_qty = intval($before_qty_prosess) + intval($add_qty_prosess);
            $achive = 0;
            if($new_qty > 0) {
                $achive = (intval($add_qty_order) / intval($new_qty)) * 100;
            }
            $this->db->where('kode_order', $kode_order);
            $this->db->update('tbl_ppic', [
                'qty_actual' => $new_qty,
                'qty_reject' => $add_qty_reject,
                'remark' => $add_remark,
                'achive' => $achive
            ]);
            
            foreach($add_id_barang as $key => $value)
            {
                if($add_id_detail_ppic[$key] == 0) {
                    // insert tbl detail ppic
                    $this->db->insert('tbl_detail_ppic', [
                        'id_ppic' => $id_ppic,
                        'id_barang' => $value,
                        'qty' => $add_qty_item[$key]
                    ]);
                } else {
                    if($add_qty_before[$key] != '') {
                        $update_stock = intval($add_qty_before[$key]) + intval($add_qty_item[$key]);
                        $this->db->where('id_detail_ppic', $add_id_detail_ppic[$key]);
                        $this->db->update('tbl_detail_ppic', [
                            'qty' => $update_stock
                        ]);
                    }
                }

                // update tbl barang
                $new_stock = intval($add_stock_barang[$key]) - intval($add_qty_item[$key]);
                $this->db->where('id_barang', $value);
                $this->db->update('tbl_barang', [
                    'jumlah_barang' => $new_stock
                ]);

                // insert history barang
                $this->db->insert('tbl_history_barang', [
                    'id_barang' => $value,
                    'qty' => $add_qty_item[$key],
                    'tgl_action' => date('Y-m-d H:i:s'),
                    'type' => 'OUT'
                ]);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }
    
    function update_close($kode_order)
    {
        try {
            $date = date('Y-m-d H:i:s');
            $this->db->where('kode_order', $kode_order);
            $this->db->update('tbl_ppic', [
                'tgl_finish' => $date,
                'status' => 'Close'
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function card()
    {
        $this->db->select("SUM( CASE WHEN status = 'Release' THEN 1 ELSE 0 END ) AS total_release,
                            SUM( CASE WHEN status = 'In Process' THEN 1 ELSE 0 END ) AS total_process,
                            SUM( CASE WHEN status = 'Close' THEN 1 ELSE 0 END ) AS total_close
                            ");
        $this->db->from('tbl_ppic');
        $qObj = $this->db->get();
        return $qObj->row_array();
    }
    
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