<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
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
            $this->load->view('user/edit', );
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
       redirect('user');
     }
    }
}