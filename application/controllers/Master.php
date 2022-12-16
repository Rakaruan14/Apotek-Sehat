<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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

    //Satuan Obat
    public function satuan_index()
    {
        $data['title'] = 'Data Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->Modeluser->get_data('data_jenis')->result_array();
    }

    public function satuan()
    {
        $data['title'] = 'Data Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->Modeluser->get_data('data_satuan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/satuan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_satuan()
    {
        $this->satuan_index();
        $satuan = $this->input->post('satuan');

        if ($satuan == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh kosong!</div>');
            redirect('master/satuan');
        } else {
            $data = [
                'satuan' => $this->input->post('satuan'),
            ];

            $this->Modeluser->insert_data($data, 'data_satuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!</div>');
            redirect('master/satuan');
        };
    }

    public function edit_satuan($id)
    {
        $this->satuan_index();
        $satuan = $this->input->post('satuan');

        if ($satuan == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh kosong!</div>');
            redirect('master/satuan');
        } else {
            $data = [
                'id_satuan' => $id,
                'satuan' => $this->input->post('satuan'),
            ];

            $this->Modeluser->update_data($data, 'data_satuan', 'id_satuan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('master/satuan');
        }
    }

    public function delete_satuan($id)
    {
        $where = ['id_satuan' => $id];

        $this->Modeluser->delete($where, 'data_satuan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Data Berhasil Dihapus!</div>');
        redirect('master/satuan');
    }

    //Jenis Obat
    public function jenis_index()
    {
        $data['title'] = 'Data Jenis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->Modeluser->get_data('data_jenis')->result_array();
    }

    public function jenis()
    {
        $data['title'] = 'Data Jenis';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->Modeluser->get_data('data_jenis')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/jenis', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jenis()
    {
        $this->jenis_index();
        $jenis = $this->input->post('jenis');

        if ($jenis == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh kosong!</div>');
            redirect('master/jenis');
        } else {
            $data = [
                'jenis' => $this->input->post('jenis'),
            ];

            $this->Modeluser->insert_data($data, 'data_jenis');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!</div>');
            redirect('master/jenis');
        };
    }

    public function edit_jenis($id)
    {
        $this->jenis_index();
        $jenis = $this->input->post('jenis');

        if ($jenis == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh kosong!</div>');
            redirect('master/jenis');
        } else {
            $data = [
                'id_jenis' => $id,
                'jenis' => $this->input->post('jenis'),
            ];

            $this->Modeluser->update_data($data, 'data_jenis', 'id_jenis');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('master/jenis');
        }
    }

    public function delete_jenis($id)
    {
        $where = ['id_jenis' => $id];

        $this->Modeluser->delete($where, 'data_jenis');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus!
            </div>');
        redirect('master/jenis');
    }

    //Kategori Obat
    public function kategori_index()
    {
        $data['title'] = 'Data Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Modeluser->get_data('data_kategori')->result_array();
    }

    public function kategori()
    {
        $data['title'] = 'Data Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Modeluser->get_data('data_kategori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/kategori', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_kategori()
    {
        $this->kategori_index();
        $kategori = $this->input->post('kategori');

        if ($kategori == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh kosong!</div>');
            redirect('master/kategori');
        } else {
            $data = [
                'kategori' => $this->input->post('kategori'),
            ];

            $this->Modeluser->insert_data($data, 'data_kategori');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!</div>');
            redirect('master/kategori');
        };
    }

    public function edit_kategori($id)
    {
        $this->kategori_index();
        $kategori = $this->input->post('kategori');

        if ($kategori == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh kosong!</div>');
            redirect('master/kategori');
        } else {
            $data = [
                'id_kategori' => $id,
                'kategori' => $this->input->post('kategori'),
            ];

            $this->Modeluser->update_data($data, 'data_kategori', 'id_kategori');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('master/kategori');
        }
    }

    public function delete_kategori($id)
    {
        $where = ['id_kategori' => $id];

        $this->Modeluser->delete($where, 'data_kategori');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus!
            </div>');
        redirect('master/kategori');
    }

    //Data Obat
    public function obat_index()
    {
        $data['title'] = 'Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();
        $data['kategori'] = $this->Modeluser->get_data('data_kategori')->result_array();
        $data['jenis'] = $this->Modeluser->get_data('data_jenis')->result_array();
        $data['satuan'] = $this->Modeluser->get_data('data_satuan')->result_array();
    }

    public function obat()
    {
        $data['title'] = 'Data Obat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['obat'] = $this->Modeluser->get_data('data_obat')->result_array();
        $data['kategori'] = $this->Modeluser->get_data('data_kategori')->result_array();
        $data['jenis'] = $this->Modeluser->get_data('data_jenis')->result_array();
        $data['satuan'] = $this->Modeluser->get_data('data_satuan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/obat', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_obat()
    {
        $this->obat_index();
        $obat = $this->input->post('obat');
        $kategori = $this->input->post('kategori_obat');
        $jenis = $this->input->post('jenis_obat');
        $satuan = $this->input->post('satuan_obat');
        $brand = $this->input->post('brand');
        $dosis = $this->input->post('dosis');
        $kemasan = $this->input->post('kemasan');
        $indikasi = $this->input->post('indikasi');
        $hrg_beli = $this->input->post('hrg_beli');
        $hrg_jual = $this->input->post('hrg_jual');

        if ($obat == '' or $kategori == '' or $jenis == '' or $satuan == '' or $brand == '' or $dosis == '' or $kemasan == '' or $indikasi == '' or $hrg_beli == '' or $hrg_jual == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('master/obat');
        } else {
            $data = [
                'kode_obat' => $this->input->post('kode_obat'),
                'obat' => $this->input->post('obat'),
                'kategori_obat' => $this->input->post('kategori_obat'),
                'jenis_obat' => $this->input->post('jenis_obat'),
                'satuan_obat' => $this->input->post('satuan_obat'),
                'brand' => $this->input->post('brand'),
                'dosis' => $this->input->post('dosis'),
                'kemasan' => $this->input->post('kemasan'),
                'indikasi' => $this->input->post('indikasi'),
                'hrg_beli' => $this->input->post('hrg_beli'),
                'hrg_jual' => $this->input->post('hrg_jual'),
                'stok' => 0,
            ];

            $this->Modeluser->insert_data($data, 'data_obat');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!
            </div>');
            redirect('master/obat');
        };
    }

    public function edit_obat($id)
    {
        $this->obat_index();
        $obat = $this->input->post('obat');
        $kategori = $this->input->post('kategori_obat');
        $jenis = $this->input->post('jenis_obat');
        $satuan = $this->input->post('satuan_obat');
        $brand = $this->input->post('brand');
        $dosis = $this->input->post('dosis');
        $kemasan = $this->input->post('kemasan');
        $indikasi = $this->input->post('indikasi');
        $hrg_beli = $this->input->post('hrg_beli');
        $hrg_jual = $this->input->post('hrg_jual');

        if ($obat == '' or $kategori == '' or $jenis == '' or $satuan == '' or $brand == '' or $dosis == '' or $kemasan == '' or $indikasi == '' or $hrg_beli == '' or $hrg_jual == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('master/obat');
        } else {
            $data = [
                'id_obat' => $id,
                'obat' => $this->input->post('obat'),
                'kategori_obat' => $this->input->post('kategori_obat'),
                'jenis_obat' => $this->input->post('jenis_obat'),
                'satuan_obat' => $this->input->post('satuan_obat'),
                'brand' => $this->input->post('brand'),
                'dosis' => $this->input->post('dosis'),
                'kemasan' => $this->input->post('kemasan'),
                'indikasi' => $this->input->post('indikasi'),
                'stok' => $this->input->post('stok'),
                'hrg_beli' => $this->input->post('hrg_beli'),
                'hrg_jual' => $this->input->post('hrg_jual'),
            ];

            $this->Modeluser->update_data($data, 'data_obat', 'id_obat');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('master/obat');
        }
    }

    public function delete_obat($id)
    {
        $where = ['id_obat' => $id];

        $this->Modeluser->delete($where, 'data_obat');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus!
            </div>');
        redirect('master/obat');
    }

    //Data Suplier
    public function suplier_index()
    {
        $data['title'] = 'Data Suplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suplier'] = $this->Modeluser->get_data('data_suplier')->result_array();
    }

    public function suplier()
    {
        $data['title'] = 'Data Suplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suplier'] = $this->Modeluser->get_data('data_suplier')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/suplier', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_suplier()
    {
        $this->suplier_index();
        $suplier = $this->input->post('suplier');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');

        if ($suplier == '' or $telepon == '' or $alamat == '' or $keterangan == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('master/obat');
        } else {
            $data = [
                'suplier' => $this->input->post('suplier'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $this->Modeluser->insert_data($data, 'data_suplier');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan!
            </div>');
            redirect('master/suplier');
        };
    }

    public function edit_suplier($id)
    {
        $this->suplier_index();
        $suplier = $this->input->post('suplier');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');

        if ($suplier == '' or $telepon == '' or $alamat == '' or $keterangan == '') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data tidak boleh ada yang kosong!</div>');
            redirect('master/obat');
        } else {
            $data = [
                'id_suplier' => $id,
                'suplier' => $this->input->post('suplier'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'keterangan' => $this->input->post('keterangan'),
            ];

            $this->Modeluser->update_data($data, 'data_suplier', 'id_suplier');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah!
            </div>');
            redirect('master/suplier');
        }
    }

    public function delete_suplier($id)
    {
        $where = ['id_suplier' => $id];

        $this->Modeluser->delete($where, 'data_suplier');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data Berhasil Dihapus!
            </div>');
        redirect('master/suplier');
    }
}
