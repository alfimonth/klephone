<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suplay extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Suplay';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
}
