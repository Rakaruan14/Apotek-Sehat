<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modeluser extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table, $id_name)
    {
        $this->db->where($id_name, $data[$id_name]);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function simpanpengguna($data = null)
    {
        $this->db->delete('user', $data);
    }

    public function getUserWhere($data, $where = null)
    {
        return $this->db->get_where($data, $where);
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('user');
        return $this->db->get()->row($field);
    }

    public function totalom($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('obat_masuk');
        return $this->db->get()->row($field);
    }

    public function totalok($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('obat_masuk');
        return $this->db->get()->row($field);
    }

    public function role()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        return  $this->db->get();
    }

    public function obm()
    {
        $this->db->select('*');
        $this->db->from('obat_masuk');
        $this->db->join('data_obat', 'data_obat.obat = obat_masuk.nama_obat');
        return  $this->db->get();
    }

    public function detailobm($id)
    {
        $this->db->select('*');
        $this->db->from('obat_masuk');
        $this->db->join('data_obat', 'data_obat.obat = obat_masuk.nama_obat');
        return  $this->db->get_where('', ['id_masuk' => $id]);
    }

    public function obk()
    {
        $this->db->select('*');
        $this->db->from('obat_keluar');
        $this->db->join('data_obat', 'data_obat.obat = obat_keluar.nama_obat');
        return  $this->db->get();
    }

    public function detailobk($id)
    {
        $this->db->select('*');
        $this->db->from('obat_keluar');
        $this->db->join('data_obat', 'data_obat.obat = obat_keluar.nama_obat');
        return  $this->db->get_where('', ['id_keluar' => $id]);
    }

    public function getstok($id)
    {
        $this->db->select('stok');
        $this->db->from('data_obat');
        $this->db->where('obat',$id);   
        $query = $this->db->get();
        return $query->row()->stok;
    }

    public function getbeli($id)
    {
        $this->db->select('hrg_beli');
        $this->db->from('data_obat');
        $this->db->where('obat',$id);   
        $query = $this->db->get();
        return $query->row()->hrg_beli;
    }
    
    public function getjual($id)
    {
        $this->db->select('hrg_jual');
        $this->db->from('data_obat');
        $this->db->where('obat',$id);   
        $query = $this->db->get();
        return $query->row()->hrg_jual;
    }
}
