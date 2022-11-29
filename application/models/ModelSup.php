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
}
