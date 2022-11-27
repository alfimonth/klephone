<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Brand';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['brand'] = $this->ModelProduk->getBrandTipe();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/brand');
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Brand';
        $data['brand'] = $this->ModelProduk->getBrand()->result_array();

        // validasi data
        $this->form_validation->set_rules('name', 'name', 'required', [
            'required' => 'Harap pilih Brand',
        ]);


        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/brand/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('produk/tambah-brand');
            $this->load->view('templates/auth_footer');
        } else {
            $this->upload->do_upload('logo');
            if ($this->upload->do_upload('logo')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                var_dump('gagal');
                die;
                $gambar = '';
            }

            $data = [
                'name' => $this->input->post('name', true),
                'logo' => $gambar
            ];

            $this->ModelProduk->simpanBrand($data);
            redirect('brand');
        }
    }
    public function edit()
    {
        $data['title'] = 'Edit Brand';
        $data['brand'] = $this->ModelProduk->getBrandWhere($this->uri->segment(3))->result_array();
        $data['id'] = $this->uri->segment(3);

        // validasi data

        $this->form_validation->set_rules('name', 'name', 'required', [
            'required' => 'Input tidak boleh kosong',
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/brand/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('produk/edit-brand');
            $this->load->view('templates/auth_footer');
        } else {

            if ($this->upload->do_upload('logo')) {
                $image = $this->upload->data();
                unlink('assets/img/brand/' . $this->input->post('old-pict', TRUE));
                $gambar = $image['file_name'];
            } else { //foto lama
                $gambar = $this->input->post('old-pict', TRUE);
            }
            $data = [
                'name' => $this->input->post('name', true),
                'logo' => $gambar
            ];

            $this->ModelProduk->updateBrand(['id' => $this->input->post('id')], $data);
            redirect('brand');
        }
    }
    public function hapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelProduk->hapusBrand($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Brand berhasil dihapus</div>');
        redirect('brand');
    }
}
