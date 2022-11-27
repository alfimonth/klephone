<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSup extends CI_Model
{
    public function getSup()
    {
        return $this->db->get('supplier');
    }
    public function simpanSup($data = null)
    {

        $this->db->insert('supplier', $data);
    }

    public function hapusSup($where = null)
    {
        $this->db->delete('supplier', $where);
    }





    public function getBrand()
    {
        return $this->db->get('brand');
    }




    public function simpanBrand($data = null)
    {

        $this->db->insert('brand', $data);
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
}
