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
        $this->form_validation->set_rules('id_produk', 'id_produk', 'required', [
            'required' => 'Harap pilih produk',
        ]);
        $this->form_validation->set_rules('id_cos', 'id_cos', 'required', [
            'required' => 'Harap pilih customer',
        ]);
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->session->userdata('role_id');
            $data['produk'] = $this->ModelProduk->joinBrandProdukStok()->result_array();
            $data['sup'] = $this->ModelSup->getSup()->result_array();
            $data['cos'] = $this->ModelCos->getCos()->result_array();
            $data['stok'] = $this->ModelProduk->totalStok();
            $data['hs'] = $this->ModelSup->joinHisCosProduk()->result_array();
            $data['tran'] = $this->ModelTran->joinTranCosProduk()->result_array();

            $out = $this->ModelSup->out()->row_array();
            $in = $this->ModelTran->in();
            $b = $this->ModelRekening->getBalance();
            $data['in'] = number_format($in, 0, ',', '.');
            $data['out'] = number_format($out['out'], 0, ',', '.');
            $data['balance'] = number_format($b['balance'], 0, ',', '.');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/index');
            $this->load->view('templates/footer');
        } else {
            $datatran = $this->input->post();
            $this->session->set_userdata('tran', $datatran);
            redirect('dashboard/transaksi');

            // ase_url('dashboard/transaksi') //
        }
    }
    public function kas()
    {
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
            'required' => 'Harap masukkan jumlah',
        ]);

        if ($this->form_validation->run() == false) {
            manager();
            $data['title'] = 'Manajemen Kas';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['role'] = $this->session->userdata('role_id');
            $data['produk'] = $this->ModelProduk->joinBrandProdukStok()->result_array();
            $data['sup'] = $this->ModelSup->getSup()->result_array();
            $data['cos'] = $this->ModelCos->getCos()->result_array();
            $data['stok'] = $this->ModelProduk->totalStok();
            $data['hs'] = $this->ModelSup->getHis()->result_array();
            $b = $this->ModelRekening->getBalance();
            $data['balance'] = number_format($b['balance'], 0, '.', ',');
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/kas');
            $this->load->view('templates/auth_footer');
        } else {
            $prebalance = $this->ModelRekening->getBalance()['balance'];
            if ($this->input->post('order', true) == 'd') {
                $debit = $this->input->post('jumlah', true);
                $kredit = 0;
                $balance = intval($prebalance) + intval($this->input->post('jumlah', true));

                $kas = 'bertambah';
            } else {
                $kredit = $this->input->post('jumlah', true);
                $debit = 0;
                $balance = intval($prebalance) - intval($this->input->post('jumlah', true));
                if ($balance < 0) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Kas tidak mencukupi untuk diambil</div>');
                    redirect('dashboard');
                    die;
                }
                $kas = 'berkurang';
            }
            // rekening

            //    
            $data = [
                'ket' => $this->input->post('ket', true),
                'balance' => $balance,
                'kredit' => $kredit,
                'debit' => $debit,
                'id_his_sup' => '',
                'id_tran' => ''
            ];

            $this->ModelRekening->simpanRek($data);
            $this->session->set_flashdata('pesan', "<div class='alert alert-success alert-message' role='alert'>Kas $kas</div>");
            redirect('dashboard');
        }
    }
    public function transaksi()
    {
        $tran = $this->session->userdata('tran');
        if ($tran == null) {
            redirect('dashboard');
            die;
        }

        $this->form_validation->set_rules('diskon', 'diskon', 'required', [
            'required' => 'Harap masukkan diskon',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Transaksi';
            $data['produk'] = $this->ModelProduk->joinBrandProdukWhere($tran['id_produk'])->row_array();
            $data['cos'] = $this->ModelCos->getCosWhere($tran['id_cos'])->row_array();
            $data['q'] = $tran['stok'];
            $harga = $data['produk']['harga'];
            $data['harga'] = number_format($harga, 0, ',', '.');
            $data['total'] = number_format((intval($harga) * intval($data['q'])), 0, ',', '.');
            // var_dump($data['produk']);
            // die;

            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/transaksi');
            $this->load->view('templates/auth_footer');
        } else {
            $data['produk'] = $this->ModelProduk->joinBrandProdukWhere($tran['id_produk'])->row_array();
            $prebalance = $this->ModelRekening->getBalance()['balance'];
            $diskon = $this->input->post('diskon', true);
            $harga = $data['produk']['harga'];
            //transaksi tabel  
            $data = [
                'id_costumer' => $tran['id_cos'],
                'id_produk' => $tran['id_produk'],
                'harga' => $harga,
                'diskon' => $diskon,
            ];

            $this->ModelTran->simpan($data);

            // update stok
            $stok = $this->ModelProduk->getStok($tran['id_produk'])->row_array()['stok'];
            $stok = intval($stok) - intval($tran['stok']);
            $id = $data['id_produk'];
            $data = [
                'stok' => $stok,
            ];


            $this->ModelProduk->updateProduk(['id' => $id], $data);
            // rekening
            $debit = intval($harga) - intval($diskon);
            $balance = intval($prebalance) + $debit;
            $id_tran = $this->ModelTran->getId()['id'];
            $data = [
                'ket' => 'transaksi',
                'balance' => $balance,
                'kredit' => 0,
                'debit' => $debit,
                'id_his_sup' => '',
                'id_tran' => $id_tran
            ];
            // var_dump($data);
            // die;

            $this->ModelRekening->simpanRek($data);
            $this->session->set_flashdata('pesan', "<div class='alert alert-success alert-message' role='alert'>Transaksi berhasil</div>");
            redirect('dashboard');
        }
    }
}
