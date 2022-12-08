<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelTran extends CI_Model
{
    public function simpan($data = null)
    {
        $this->db->insert('transaksi', $data);
    }
    public function getId()
    {
        $this->db->select('id');
        $this->db->from('transaksi');
        $result = $this->db->get()->result_array();
        $result = end($result);
        return $result;
    }
    public function joinTranCosProduk()
    {
        $this->db->select('transaksi.id as id, costumer.name as cos, transaksi.harga as harga, transaksi.diskon, transaksi.date, brand.name as brand, produk.tipe as tipe');
        $this->db->from('transaksi');
        $this->db->join('costumer', 'transaksi.id_costumer=costumer.id');
        $this->db->join('produk', 'transaksi.id_produk=produk.id');
        $this->db->join('brand', 'produk.id_brand= brand.id');
        return $this->db->get();
    }
    public function in()
    {
        $this->db->select('sum(harga) as `h`, sum(diskon) as `d`');
        $this->db->from('transaksi');
        $p = $this->db->get()->row_array();
        return intval($p['h']) - intval($p['d']);
    }
}
