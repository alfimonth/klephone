<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }
    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }
    public function cekRole($where)
    {
        $this->db->select('role_id');
        $this->db->from('user');
        $this->db->where('email = ' . $where);
        return $this->db->get();
    }
    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
    public function updateProfile($a, $data = null)
    {
        $this->db->update('user', $data, $a);
    }

    // management
    public function getUser()
    {
        return $this->db->get('user');
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
