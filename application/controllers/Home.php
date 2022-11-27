<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->ModelProduk->joinBrandProduk("*")->result_array();

        $this->load->view('templates/header', $data);
        $email = $this->session->userdata('role_id');
        if ($email != null) {
            if ($email == 1) {
                $this->load->view('templates/sidebar');
            }
        }
        $this->load->view('templates/topbar');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
