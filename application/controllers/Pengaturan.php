<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            cek_login();
        } else {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            if ($user['role_id'] == 1) {
                redirect('auth/blocked');
            }
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('instansi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pengaturan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['p'] = $this->Modeluser->get_data('pengaturan')->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengaturan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'instansi' => htmlspecialchars(
                    $this->input->post('instansi', true)
                ),
                'pimpinan' => htmlspecialchars(
                    $this->input->post('pimpinan', true)
                ),
                'telepon' => htmlspecialchars(
                    $this->input->post('telepon', true)
                ),
                'website' => htmlspecialchars(
                    $this->input->post('website', true)
                ),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars(
                    $this->input->post('alamat', true)
                ),
            ];

            $this->Modeluser->update_data($data, 'pengaturan', 'id');
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-message" role="alert">Selamat!! Pengaturan baru sudah disimpan</div>'
            );
            redirect('pengaturan');
        }
    }

    public function edit()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['p'] = $this->Modeluser->get_data('pengaturan')->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengaturan', $data);
        $this->load->view('templates/footer');

        $instansi = $this->input->post('instansi');
        $pimpinan = $this->input->post('pimpinan');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');

        if ($instansi == '' or $pimpinan == '' or $email == '' or $website == '' or $telepon == '' or $alamat == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('pengaturan');
        } else {
            $data = [
                'instansi' => $this->input->post('instansi'),
                'pimpinan' => $this->input->post('pimpinan'),
                'email' => $this->input->post('email'),
                'website' => $this->input->post('website'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
            ];

            $this->db->update('pengaturan', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('pengaturan');
        }
    }
}
