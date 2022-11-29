<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCos extends CI_Model
{
    public function getCos()
    {
        return $this->db->get('costumer');
    }
    public function simpanCos($data = null)
    {

        $this->db->insert('costumer', $data);
    }

    public function hapusCos($where = null)
    {
        $this->db->delete('costumer', $where);
    }
    public function getCosWhere($where = '*')
    {
        $this->db->select('*');
        $this->db->from('costumer');
        $this->db->where('id=' . $where);
        return $this->db->get();
    }
    public function updateCos($a, $data = null)
    {
        $this->db->update('costumer', $data, $a);
    }
}
