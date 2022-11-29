<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sup'] = $this->ModelSup->getSup()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('sup/index');
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah Supplier';
        $data['brand'] = $this->ModelProduk->getBrand()->result_array();

        // validasi data
        $this->form_validation->set_rules('name', 'name', 'required|trim', [
            'required' => 'Harap isi nama supplier',
        ]);
        $this->form_validation->set_rules('tlp', 'tlp', 'required|trim', [
            'required' => 'Harap isi nomor telepon',
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Harap isi alamat',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[supplier.email]', [
            'required' => 'Harap masukkan email',
            'valid_email' => 'Email tidak benar',
            'is_unique' => 'Email sudah terdaftar'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('sup/tambah');
            $this->load->view('templates/auth_footer');
        } else {

            $data = [
                'name' => $this->input->post('name', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'tlp' => $this->input->post('tlp', true),
                'catatan' => $this->input->post('catatan', true),
            ];

            $this->ModelSup->simpanSup($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">1 Supplier berhasil ditambahkan</div>');
            redirect('supplier');
        }
    }
    public function edit()
    {
        $data['title'] = 'Edit Supplier';
        $data['sup'] = $this->ModelSup->getSupWhere($this->uri->segment(3))->row_array();
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
            $this->load->view('sup/edit');
            $this->load->view('templates/auth_footer');
        } else {

            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'tlp' => $this->input->post('tlp', true),
                'alamat' => $this->input->post('alamat', true),
                'catatan' => $this->input->post('catatan', true),
            ];



            $this->ModelSup->updateSup(['id' => $this->input->post('id')], $data);
            redirect('supplier');
        }
    }
    public function hapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelSup->hapusSup($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Supplier berhasil dihapus</div>');
        redirect('supplier');
    }
}
