<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelRekening extends CI_Model
{
    public function simpanRek($data = null)
    {
        $this->db->insert('rekening', $data);
    }

    public function getBalance()
    {
        $this->db->select('balance');
        $this->db->from('rekening');
        $result = $this->db->get()->result_array();
        $result = end($result);


        return $result;
    }
    public function simpanUser($data = null)
    {

        $this->db->insert('user', $data);
    }

    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }
    public function updateUser($a, $data = null)
    {
        $this->db->update('user', $data, $a);
    }
}
