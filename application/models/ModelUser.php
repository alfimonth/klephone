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
    public function getRole()
    {
        return $this->db->get('user_role');
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
    public function joinRole()
    {
        $this->db->select('user.id as id, user.name, user.email, user.image, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->order_by('user_role.id, user.name');
        return $this->db->get();
    }
}
