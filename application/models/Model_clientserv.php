<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_clientserv extends CI_Model
{

    public function cliser()
    {
        $this->db->select('c.*, m.nama');
        $this->db->from('con_clientserv c');
        $this->db->join('adm_menu m', 'c.id_menu=m.id');
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }
    public function aktif($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('con_clientserv', $data);
    }

    public function kon_id($id)
    {
        $this->db->select('*');
        $this->db->from('con_clientserv');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function update($id, $judul, $deskripsi)
    {
        $data = array(
            'judul' => $judul,
            'deskripsi' => $deskripsi
        );
        $this->db->where('id', $id);
        return $this->db->update('con_clientserv', $data);
    }
}
