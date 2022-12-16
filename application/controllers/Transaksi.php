<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            cek_login();
        } else {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if ($user['role_id'] == 2) {
                redirect('auth/blocked');
            }
        }
    }

    //Obat Masuk
    public function masuk()
    {
        $data['title'] = 'Obat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['masuk'] = $this->Modeluser->get_data('obat_masuk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/masuk');
        $this->load->view('templates/footer');
    }

    public function transaksi_masuk()
    {
        $data['title'] = 'Transaksi Obat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suplier'] = $this->Modeluser->get_data('data_suplier')->result_array();
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/transaksi-masuk');
        $this->load->view('templates/footer');
    }

    public function transaksi_masuk_tambah()
    {
        $data['suplier'] = $this->Modeluser->get_data('data_suplier')->result_array();
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();

        $nama_obat = $this->input->post('nama_obat');
        $nama_suplier = $this->input->post('nama_suplier');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $jumlah = $this->input->post('jumlah');

        if ($nama_obat == '' or $nama_suplier == '' or $tgl_masuk == '' or $jumlah == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('transaksi/masuk');
        } else {
            $data = [
                'kode_masuk' => $this->input->post('kode_masuk'),
                'nama_obat' => $this->input->post('nama_obat'),
                'nama_suplier' => $this->input->post('nama_suplier'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'jumlah' => $this->input->post('jumlah'),
                'harga_beli' => $this->Modeluser->getbeli($this->input->post('nama_obat')),
                'subtotal' => $this->input->post('jumlah') * $this->Modeluser->getbeli($this->input->post('nama_obat')),
            ];
            $data2 = [
                'obat' => $this->input->post('nama_obat'),
                'stok' => $this->input->post('jumlah') + $this->Modeluser->getstok($this->input->post('nama_obat')),
            ];

            $this->Modeluser->update_data($data2, 'data_obat', 'obat');
            $this->Modeluser->insert_data($data, 'obat_masuk');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!
            </div>');
            redirect('transaksi/masuk');
        }
    }

    public function detail_tm($id)
    {
        $data['title'] = 'Obat Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['om'] = $this->Modeluser->detailobm($id)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/detail-tm');
        $this->load->view('templates/footer');
    }

    //Obat Keluar
    public function keluar()
    {
        $data['title'] = 'Obat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['keluar'] = $this->Modeluser->get_data('obat_keluar')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/keluar');
        $this->load->view('templates/footer');
    }

    public function transaksi_keluar()
    {
        $data['title'] = 'Transaksi Obat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/transaksi-keluar');
        $this->load->view('templates/footer');
    }

    public function transaksi_keluar_tambah()
    {
        $data['suplier'] = $this->Modeluser->get_data('data_suplier')->result_array();
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();

        $nama_obat = $this->input->post('nama_obat');
        $tgl_keluar = $this->input->post('tgl_keluar');
        $jumlah = $this->input->post('jumlah');

        if ($nama_obat == '' or $tgl_keluar == '' or $jumlah == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('transaksi/keluar');
        } else {
            if ($this->input->post('jumlah') > $this->Modeluser->getstok($this->input->post('nama_obat'))) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Gagal Ditambahkan! Perhatikan stok saat transaksi.
                </div>');
                redirect('transaksi/keluar');
            } else {
                $data = [
                    'kode_keluar' => $this->input->post('kode_keluar'),
                    'nama_obat' => $this->input->post('nama_obat'),
                    'tgl_keluar' => $this->input->post('tgl_keluar'),
                    'jumlah' => $this->input->post('jumlah'),
                    'harga_jual' => $this->Modeluser->getjual($this->input->post('nama_obat')),
                    'subtotal' => $this->input->post('jumlah') * $this->Modeluser->getjual($this->input->post('nama_obat')),
                ];
                $data2 = [
                    'obat' => $this->input->post('nama_obat'),
                    'stok' => $this->Modeluser->getstok($this->input->post('nama_obat')) - $this->input->post('jumlah'),
                ];

                $this->Modeluser->update_data($data2, 'data_obat', 'obat');
                $this->Modeluser->insert_data($data, 'obat_keluar');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan!
                </div>');
                redirect('transaksi/keluar');
            }
        }
    }

    public function detail_tk($id)
    {
        $data['title'] = 'Obat Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ok'] = $this->Modeluser->detailobk($id)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/detail-tk');
        $this->load->view('templates/footer');
    }
}
