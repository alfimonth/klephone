<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelProduk extends CI_Model
{
    public function getProduk()
    {
        return $this->db->get('produk');
    }
    public function totalStok()
    {
        $produk = $this->getProduk()->result_array();
        $stok = 0;
        foreach ($produk as $p) {
            $stok += intval($p['stok']);
        }
        return $stok;
    }
    public function getBrand()
    {
        return $this->db->get('brand');
    }
    public function getStok($where)
    {
        $this->db->select('produk.stok');
        $this->db->from('produk');
        $this->db->where('id=' . $where);
        return $this->db->get();
    }

    public function simpanProduk($data = null)
    {

        $this->db->insert('produk', $data);
    }
    public function simpanBrand($data = null)
    {

        $this->db->insert('brand', $data);
    }
    public function hapusProduk($where = null)
    {
        $this->db->delete('produk', $where);
    }
    public function hapusBrand($where = null)
    {
        $this->db->delete('brand', $where);
    }
    public function getBrandWhere($where = null)
    {
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('id=' . $where);
        return $this->db->get();
    }
    public function joinBrandProduk($select = '*')
    {
        //$this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->select($select);
        $this->db->from('produk');
        $this->db->join('brand', 'brand.id = produk.id_brand');
        return $this->db->get();
    }
    public function joinBrandProdukWhere($where = '*')
    {
        //$this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('brand', 'brand.id = produk.id_brand');
        $this->db->where('produk.id=' . $where);
        return $this->db->get();
    }
    public function updateProduk($a, $data = null)
    {
        $this->db->update('produk', $data, $a);
    }
    public function updateBrand($a, $data = null)
    {
        $this->db->update('brand', $data, $a);
    }
    public function getBrandTipe()
    {
        $this->db->select('*');
        $this->db->from('brand');
        $brand = $this->db->get()->result_array();
        $total = [];
        $i = 0;
        foreach ($brand as $b) {
            $n = 0;
            $this->db->select('id');
            $this->db->from('produk');
            $this->db->where('id_brand=' . $b['id']);
            $produk = $this->db->get()->result_array();
            foreach ($produk as $p) {
                $n++;
            }
            $brand[$i]['total_tipe'] = $n;
            $i++;
        }
        return $brand;
    }
}
