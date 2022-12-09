<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSup extends CI_Model
{
    public function getId()
    {
        $this->db->select('id');
        $this->db->from('history_sup');
        $result = $this->db->get()->result_array();
        $result = end($result);
        return $result;
    }
    public function getSup()
    {
        return $this->db->get('supplier');
    }
    public function getHis()
    {
        $this->db->order_by('id DESC');
        return $this->db->get('history_sup');
    }
    public function simpanSup($data = null)
    {

        $this->db->insert('supplier', $data);
    }

    public function hapusSup($where = null)
    {
        $this->db->delete('supplier', $where);
    }
    public function getSupWhere($where = '*')
    {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('id=' . $where);
        return $this->db->get();
    }
    public function updateSup($a, $data = null)
    {
        $this->db->update('supplier', $data, $a);
    }

    public function simpanHisSup($data = null)
    {

        $this->db->insert('history_sup', $data);
    }
    public function joinHisCosProduk()
    {
        $this->db->select('history_sup.id as id, supplier.name as sup, history_sup.harga as harga, history_sup.date, brand.name as brand, produk.tipe as tipe');
        $this->db->from('history_sup');
        $this->db->join('supplier', 'history_sup.id_sup=supplier.id');
        $this->db->join('produk', 'history_sup.id_produk=produk.id');
        $this->db->join('brand', 'produk.id_brand= brand.id');
        $this->db->order_by('history_sup.id DESC');
        return $this->db->get();
    }
    public function out()
    {
        $this->db->select('sum(harga) as `out`');
        $this->db->from('history_sup');
        return $this->db->get();
    }
}
