<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
    public function management()
    {
        $this->form_validation->set_rules('id_role', 'id_role', 'required', [
            'required' => 'Harap pilih Role',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Account';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ac'] = $this->ModelUser->joinRole()->result_array();
            $data['role'] = $this->ModelUser->getRole()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/management/index');
            $this->load->view('templates/footer');
        } else {

            $data = [
                'role_id' => $this->input->post('id_role', true),
            ];
            $this->ModelUser->updateProfile(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Perubahan Role Berhasil</div>');
            redirect('user/management');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->result_array();



        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'image' . time();

        $this->load->library('upload', $config);
        $this->form_validation->set_rules('name', 'name', 'required', [
            'required' => 'Nama tidak boleh kosong',
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('user/edit',);
            $this->load->view('templates/auth_footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/profile/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else { //foto lama
                $gambar = $this->input->post('old-pict', TRUE);
            }

            $data = [
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'image' => $gambar
            ];
            $this->ModelUser->updateProfile(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Perubahan Berhasil</div>');
            redirect('user');
        }
    }
    public function tambah()
    {


        $required = 'Kolom wajib diisi';

        $this->form_validation->set_rules('name', 'Username', 'required|trim|min_length[3]|is_unique[user.name]', [
            'required' => $required,
            'is_unique' => 'Username sudah digunakan',
            'min_length' => 'Username terlalu pendek'

        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => $required,
            'valid_email' => 'Email tidak benar',
            'is_unique' => 'Email sudah terdaftar'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => $required,
            'matches' => 'Konfirmasi Password salah',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Account';
            $data['role'] = $this->ModelUser->getRole()->result_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('user/management/tambah');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'image' => 'default.jpg',

                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data); //pindah di model
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun berhasil dibuat</div>');

            redirect('user/management');
        }
    }
    public function hapus()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusUser($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun berhasil dihapus</div>');
        redirect('user/management');
    }
}
