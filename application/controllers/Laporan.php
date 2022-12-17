<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['title'] = 'Laporan Transaksi & Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['om'] = $this->Modeluser->get_data('obat_masuk')->result_array();
        $data['ok'] = $this->Modeluser->get_data('obat_keluar')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/index');
        $this->load->view('templates/footer');
    }

    public function cetak_obat()
    {
        $data['title'] = 'LAPORAN SEMUA DATA OBAT';
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();
        $data['p'] = $this->Modeluser->get_data('pengaturan')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('laporan/cetak-obat');
    }

    public function cetak_obm()
    {
        $data['title'] = 'LAPORAN OBAT MASUK';
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();
        $data['obatmasuk'] = $this->Modeluser->obm()->result_array();
        $data['p'] = $this->Modeluser->get_data('pengaturan')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('laporan/cetak-obm');
    }

    public function cetak_obk()
    {
        $data['title'] = 'LAPORAN OBAT KELUAR';
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();
        $data['obatkeluar'] = $this->Modeluser->obk()->result_array();
        $data['p'] = $this->Modeluser->get_data('pengaturan')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('laporan/cetak-obk');
    }
}
