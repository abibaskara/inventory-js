<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppic extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ppic_model');
        $this->load->library('session');
    }

    public function datatable()
    {
        $status = $this->input->post('status');
        $data = $this->ppic_model->get_ppic($status);
        
        $no = 1;
        if ($data) {
            foreach ($data as $key) {
                $result[] = [
                    'no' => $no,
                    'id' => $key['id_ppic'],
                    'kode_order' => $key['kode_order'],
                    'produk' => $key['produk'],
                    'qty_order' => $key['qty_order'],
                    'qty_actual' => (is_null($key['qty_actual']) ? '0' : $key['qty_actual']),
                    'qty_reject' => (is_null($key['qty_reject']) ? '0' : $key['qty_reject']),
                    'achive' => $key['achive'],
                    'status' => $key['status'],
                    'tgl_start' => date('d/m/Y H:i'),
                ];
                $no++;
            }
        } else {
            $result = [];
        }
        echo json_encode(['data' => $result]);
    }

    public function update_proses()
    {
        $kode_order = $this->input->post('kode_order');

        $this->db->where('kode_order', $kode_order);
        $this->db->where('status', 'Release');
        $this->db->update('tbl_ppic', [
            'status' => 'In Process'
        ]);
        echo json_encode(['status' => 'Success']);
    }

    public function detail()
    {
        $kode_order = $this->input->get('kode_order');
        $data = $this->ppic_model->get_ppic_detail($kode_order);
        $detail = $this->ppic_model->get_detail_ppic($data['id_ppic']);

        $result['data'] = $data;
        $result['data']['detail'] = $detail;
        
        echo json_encode($result);
    }

    public function udpates()
    {
        $data['add_qty_prosess'] = $this->input->post('add_qty_prosess');
        $data['add_qty_reject'] = $this->input->post('add_qty_reject');
        $data['add_remark'] = $this->input->post('add_remark');
        $data['add_qty_order'] = $this->input->post('add_qty_order');
        $data['before_qty_prosess'] = $this->input->post('before_qty_prosess');
        $data['kode_order'] = $this->input->post('detail_kode_order');
        $data['id_ppic'] = $this->input->post('detail_id_ppic');

        
        $data['add_id_barang'] = $this->input->post('add_id_barang');
        $data['add_qty_item'] = $this->input->post('add_qty_item');
        $data['add_stock_barang'] = $this->input->post('add_stock_barang');
        $data['add_id_detail_ppic'] = $this->input->post('add_id_detail_ppic');
        $data['add_qty_before'] = $this->input->post('add_qty_before');

        $update = $this->ppic_model->update($data);
        
        if ($update == TRUE) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success Update PPIC';
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $update;
        }
        echo json_encode($response);
    }

    public function close()
    {
        $kode_order = $this->input->post('kode_order');

        $update = $this->ppic_model->update_close($kode_order);
        
        if ($update == TRUE) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success Close Request';
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $update;
        }
        echo json_encode($response);
    }

    public function card()
    {
        $data = $this->ppic_model->card();
        $response['data'] = $data;
        echo json_encode($response);
    }
    
    public function get_barang()
    {
        $data = $this->ppic_model->get_barang();
        
        if ($data == TRUE) {
            $response['status'] = 'Success';
            $response['messages'] = 'Success get barang';
            $response['data'] = $data;
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $data;
        }
        
        echo json_encode($response);
    }

    public function deleteRow()
    {
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $jml = $this->input->post('jml');
        $id_barang = $this->input->post('id_barang');
        $kode_barang = $this->input->post('kode_barang');

        $jml_new = intval($qty) + intval($jml);
        $this->db->where('kode_barang', $kode_barang);
        $this->db->update('tbl_barang', [
            'jumlah_barang' => $jml_new
        ]);

        $this->db->insert('tbl_history_barang', [
            'id_barang' => $id_barang,
            'qty' => $qty,
            'tgl_action' => date('Y-m-d H:i:s'),
            'type' => 'IN'
        ]);

        $this->db->where('id_detail_ppic', $id);
        $this->db->delete('tbl_detail_ppic');
        $response['status'] = 'success';
        echo json_encode($response);
    }
}