<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user 
        if ($this->session->userdata('email')) {
            redirect('home');
        }

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', ['required' => 'Email Harus diisi!!', 'valid_email' => 'Email Tidak Benar!!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Harus diisi']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        //jika usernya ada 
        if ($user) {
            //jika user sudah aktif 
            if ($user['is_active'] == 1) {
                //cek password 
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    // cek role
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        if ($user['image'] == 'default.jpg') {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                        }
                        redirect('home');
                    }
                } else {
                    var_dump($user['password']);
                    die;
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('auth');
        }
    }

    public function register()
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
        $this->form_validation->set_rules('fullname', 'Nama', 'required|trim|min_length[3]', [
            'required' => $required,
            'min_length' => 'Nama terlalu pendek'

        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => $required,
            'matches' => 'Konfirmasi Password salah',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',

                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data); //pindah di model
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Akun berhasil dibuat, silahkan Login</div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Berhasil logout</div>');

        redirect('auth');
    }
}
