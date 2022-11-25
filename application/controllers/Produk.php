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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index');
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $data['brand'] = $this->ModelProduk->getBrand()->result_array();

        // validasi data
        $this->form_validation->set_rules('brand', 'brand', 'required', [
            'required' => 'Harap pilih Brand',
        ]);
        $this->form_validation->set_rules('battery', 'battery', 'required|numeric', [
            'numeric' => 'Input harus angka',
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric', [
            'numeric' => 'Input harus angka',
        ]);
        $this->form_validation->set_rules('stok', 'stok', 'required|numeric', [
            'numeric' => 'Input harus angka',
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
    public function edit()
    {
        $data['title'] = 'Edit Produk';
        $data['brand'] = $this->ModelProduk->getBrand()->result_array();
        $data['produk'] = $this->ModelProduk->joinBrandProdukWhere($this->uri->segment(3))->result_array();
        $data['id'] = $this->uri->segment(3);

        // validasi data
        $this->form_validation->set_rules('brand', 'brand', 'required', [
            'required' => 'Harap pilih Brand',
        ]);
        $this->form_validation->set_rules('battery', 'battery', 'required|numeric', [
            'numeric' => 'Input harus angka',
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required|numeric', [
            'numeric' => 'Input harus angka',
        ]);
        $this->form_validation->set_rules('stok', 'stok', 'required|numeric', [
            'numeric' => 'Input harus angka',
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
            $this->load->view('produk/edit');
            $this->load->view('templates/auth_footer');
        } else {

            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else { //foto lama
                $gambar = $this->input->post('old-pict', TRUE);
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
            $this->ModelProduk->updateProduk(['id' => $this->input->post('id')], $data);
            redirect('produk');
        }
    }
    public function hapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelProduk->hapusProduk($where);
        redirect('produk');
    }
    public function detail(){
        $data['produk'] = $this->ModelProduk->joinBrandProdukWhere($this->uri->segment(3))->result_array();
        $data['id'] = $this->uri->segment(3);
        $produk = $data['produk'][0];
        $data['title'] = 'Detail Produk';
        
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/detail');
        $this->load->view('templates/footer');

    }
}
