<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {

        $data['title'] = 'Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->ModelProduk->joinBrandProduk("Produk.id,produk.img,brand.name,produk.tipe,produk.memory,produk.harga,produk.stok")->result_array();



        // validasi data
        $this->form_validation->set_rules('tipe', 'Tipe', 'required', [
            'required' => 'Tipe harus diisi',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('home/produk');
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('img')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'id_brand' => $this->input->post('brand', true),
                'tipe' => $this->input->post('tipe', true),
                'memory' => $this->input->post('memory', true),
                'layar' => $this->input->post('layar', true),
                'fcam' => $this->input->post('fcam', true),
                'bcam' => $this->input->post('bcam', true),
                'battery' => $this->input->post('battery', true),
                'cpu' => $this->input->post('cpu', true),
                'harga' => $this->input->post('harga', true),
                'stok' => $this->input->post('stok', true),
                'img' => $gambar
            ];

            $this->ModelProduk->simpanProduk($data);
            redirect('produk');
        }
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $data['brand'] = $this->ModelProduk->getBrand()->result_array();

        // validasi data
        $this->form_validation->set_rules('brand', 'brand', 'required', [
            'required' => 'Harap pilih Brand',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('produk/tambah');
            $this->load->view('templates/auth_footer');
        } else {
            $this->upload->do_upload('image');
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $memory = $this->input->post('ram', true) . '/' . $this->input->post('rom', true);
            $data = [
                'id_brand' => $this->input->post('brand', true),
                'tipe' => $this->input->post('tipe', true),
                'memory' => $memory,
                'layar' => $this->input->post('layar', true),
                'fcam' => $this->input->post('fcam', true),
                'bcam' => $this->input->post('bcam', true),
                'battery' => $this->input->post('battery', true),
                'cpu' => $this->input->post('cpu', true),
                'harga' => $this->input->post('harga', true),
                'stok' => $this->input->post('stok', true),
                'img' => $gambar
            ];

            $this->ModelProduk->simpanProduk($data);
            redirect('produk');
        }
    }
    public function hapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelProduk->hapusProduk($where);
        redirect('produk');
    }
}
