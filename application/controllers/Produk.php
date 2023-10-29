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
        // validasi
        $this->form_validation->set_rules('id_produk', 'id_produk', 'required', [
            'required' => 'Harap pilih Produk',
        ]);
        $this->form_validation->set_rules('id_sup', 'id_sup', 'required', [
            'required' => 'Harap pilih Supplier',
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Produk';
            $data['role'] = $this->session->userdata('role_id');
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['produk'] = $this->ModelProduk->joinBrandProduk("Produk.id,produk.img,brand.name,produk.tipe,produk.memory,produk.harga,produk.stok")->result_array();
            $data['sup'] = $this->ModelSup->getSup()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('produk/index');
            $this->load->view('templates/footer');
        } else {
            $prebalance = $this->ModelRekening->getBalance()['balance'];
            $harga = $this->input->post('harga', true);
            if (intval($harga) > intval($prebalance)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Suplai gagal, kas tidak mencukupi !</div>');
                redirect('produk');
                die;
            } else {
                $data = [
                    'id_produk' => $this->input->post('id_produk', true),
                    'id_sup' => $this->input->post('id_sup', true),
                    'harga' => $harga,
                    'stok' => $this->input->post('stok', true),
                ];
                $stok = $this->ModelProduk->getStok($data['id_produk'])->row_array()['stok'];
                $stok = intval($stok) + intval($data['stok']);

                $id = $data['id_produk'];

                $this->ModelSup->simpanHisSup($data);
                // history sup

                // edit produk 
                $data = [
                    'stok' => $stok,
                ];
                $this->ModelProduk->updateProduk(['id' => $id], $data);
                // rekening

                $balance = intval($prebalance) - intval($this->input->post('harga', true));
                $id_his_sup = $this->ModelSup->getId()['id'];

                //    
                $data = [
                    'debit' => 0,
                    'kredit' => $this->input->post('harga', true),
                    'balance' => $balance,
                    'id_his_sup' => $id_his_sup,
                    'id_tran' => ''
                ];

                $this->ModelRekening->simpanRek($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Suplai Berhasil</div>');
                redirect('produk');
            }
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


            $judul_hp = $data['brand'][$this->input->post('brand', true) - 1]['name'] . ' ' . $this->input->post('tipe', true);
            $api_key = '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';
            $url = 'https://api.openai.com/v1/engines/text-davinci-003/completions';
            $headers = array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $api_key
            );
            $data = array(
                'prompt' => 'Deskripsikan HP ' . $judul_hp . 'secara singkat dibawah dibawah 100 karakter',
                'max_tokens' => 100,
                'temperature' => 0.6,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);
            curl_close($ch);
            $deskripsi = json_decode($response, true)['choices'][0]['text'];


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
                'description' => $deskripsi,
                'harga' => $this->input->post('harga', true),
                'stok' => $this->input->post('stok', true),
                'img' => $gambar
            ];

            $this->ModelProduk->simpanProduk($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Produk baru ditambahkan</div>');
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
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Perubahan berhasil</div>');
            redirect('produk');
        }
    }
    public function hapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelProduk->hapusProduk($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Produk berhasil dihapus</div>');
        redirect('produk');
    }
    public function detail()
    {
        $data['produk'] = $this->ModelProduk->joinBrandProdukWhere($this->uri->segment(3))->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id'] = $this->uri->segment(3);
        $data['title'] = 'Detail Produk';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/detail');
        $this->load->view('templates/footer');
    }
}
