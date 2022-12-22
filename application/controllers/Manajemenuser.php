<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManajemenUser extends CI_Controller
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
        $data['title'] = 'Manajemen User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->Modeluser->role()->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('manajemenuser/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user' => $this->input->post('user')
            ];
            $this->db->insert('user', $data);
            redirect('manajemenuser');
        }
    }

    public function tambah_pengguna()
    {
        $data['title'] = 'Tambah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('manajemenuser/tambah-pengguna');
        $this->load->view('templates/footer');
    }

    public function tambah_user()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah_pengguna();
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->Modeluser->insert_data($data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!
            </div>');
            redirect('manajemenuser');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Manajemen User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->Modeluser->role()->result_array();
        $name = $this->input->post('name');

        if ($name == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Nama tidak boleh kosong!</div>');
            redirect('manajemenuser');
        } else {
            $data = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
            ];

            $this->Modeluser->update_data($data, 'user', 'id');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('manajemenuser');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => '%s harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => '%s harus diisi!',
            'is_unique' => '%s ini sudah melakukan registrasi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => '%s harus diisi!',
            'min_length' => '%s minimal 8 digit!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]', [
            'matches' => '%s tidak sama!'
        ]);
    }

    public function delete($id)
    {
        $where = ['id' => $id];

        $this->Modeluser->delete($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus!
            </div>');
        redirect('manajemenuser');
    }
}
