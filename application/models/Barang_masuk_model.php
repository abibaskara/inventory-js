<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Barang_masuk_model extends CI_Model
{
    function add($data)
    {
        $add_kode_barang = $data['add_kode_barang'];

        $cek = $this->cek_barang($add_kode_barang);

        if ($cek > 0) {
            $hasil = $this->update_barang($data);
        } else {
            $hasil = $this->insert_barang($data);
        }
        return $hasil;
    }

    function cek_barang($kode_barang)
    {
        $this->db->where('kode_barang', $kode_barang);
        $qObj = $this->db->get('tbl_barang');

        if ($qObj->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function insert_barang($data)
    {
        $add_kode_barang = $data['add_kode_barang'];
        $add_nama_barang = $data['add_nama_barang'];
        $add_category_barang = $data['add_category_barang'];
        $add_jumlah_barang = $data['add_jumlah_barang'];
        // $add_harga_persatuan = $data['add_harga_persatuan'];
        $add_description_barang = $data['add_description_barang'];
        // $add_total = $data['add_total'];

        try {
            $insert = [
                'kode_barang' => $add_kode_barang,
                'nama_barang' => $add_nama_barang,
                'jumlah_barang' => $add_jumlah_barang,
                // 'harga_barang' => $add_harga_persatuan,
                'deskripsi_barang' => $add_description_barang,
                // 'total' => $add_total,
                'id_category' => $add_category_barang,
            ];
            $this->db->insert('tbl_barang', $insert);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function update_barang($data)
    {
        $add_kode_barang = $data['add_kode_barang'];
        $add_nama_barang = $data['add_nama_barang'];
        $add_category_barang = $data['add_category_barang'];
        $add_jumlah_barang = $data['add_jumlah_barang'];
        // $add_harga_persatuan = $data['add_harga_persatuan'];
        $add_description_barang = $data['add_description_barang'];
        // $add_total = $data['add_total'];

        $this->db->where('kode_barang', $add_kode_barang);
        $qObj = $this->db->get('tbl_barang');
        $get = $qObj->row_array();
        try {

            $qty1 = $get['jumlah_barang'];
            $hasil = intval($add_jumlah_barang) + intval($qty1);
            $hasilHarga = intval($add_harga_persatuan) * intval($hasil);
            $update = [
                'kode_barang' => $add_kode_barang,
                'nama_barang' => $add_nama_barang,
                'jumlah_barang' => $hasil,
                // 'harga_barang' => $add_harga_persatuan,
                'deskripsi_barang' => $add_description_barang,
                // 'total' => $hasilHarga,
                'id_category' => $add_category_barang,
            ];
            $this->db->where('kode_barang', $add_kode_barang);
            $this->db->update('tbl_barang', $update);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function add_history($data)
    {
        $add_kode_barang = $data['add_kode_barang'];
        $add_nama_barang = $data['add_nama_barang'];
        $add_category_barang = $data['add_category_barang'];
        $add_jumlah_barang = $data['add_jumlah_barang'];
        // $add_harga_persatuan = $data['add_harga_persatuan'];
        // $add_total = $data['add_total'];
        $date = date('Y-m-d H:i:s');

        //get id barang
        $this->db->where('kode_barang', $add_kode_barang);
        $qObj = $this->db->get('tbl_barang');
        $get = $qObj->row_array();
        try {
            if ($get) {
                $id_barang = $get['id_barang'];
                $insert = [
                    'id_barang' => $id_barang,
                    'qty' => $add_jumlah_barang,
                    'tgl_action' => $date,
                    'type' => 'IN'
                ];
                $this->db->insert('tbl_history_barang', $insert);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return TRUE;
    }

    function search($kode)
    {
        $this->db->where('kode_barang', $kode);
        $qObj = $this->db->get('tbl_barang');
        return $qObj->row_array();
    }

    function get_history()
    {
        $this->db->select('*');
        $this->db->from('tbl_history_barang');
        $this->db->join('tbl_barang', 'tbl_barang.id_barang=tbl_history_barang.id_barang');
        $this->db->order_by('tgl_action', 'DESC');
        $qObj = $this->db->get();
        return $qObj->result_array();
    }
}
