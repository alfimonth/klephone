<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->session->userdata('role_id');
        $data['produk'] = $this->ModelProduk->joinBrandProduk("Produk.id,produk.img,brand.name,produk.tipe,produk.memory,produk.harga,produk.stok")->result_array();
        $data['sup'] = $this->ModelSup->getSup()->result_array();
        $data['cos'] = $this->ModelCos->getCos()->result_array();
        $data['stok'] = $this->ModelProduk->totalStok();
        $data['hs'] = $this->ModelSup->getHis()->result_array();
        $b = $this->ModelRekening->getBalance();
        $data['balance'] = number_format($b['balance'], 0, '.', ',');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
}
