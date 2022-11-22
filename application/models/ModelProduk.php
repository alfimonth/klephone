<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelProduk extends CI_Model
{
    public function getProduk()
    {
        return $this->db->get('produk');
    }

    public function simpanProduk($data = null)
    {

        $this->db->insert('produk', $data);
    }
    public function hapusProduk($where = null)
    {
        $this->db->delete('produk', $where);
    }
}
