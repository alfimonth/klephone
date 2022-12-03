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
}
