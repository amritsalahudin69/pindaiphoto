<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_secmen extends CI_Model
{
    public function sec($id)
    {
        $this->db->select('*');
        $this->db->from('con_clientserv_detail');
        $this->db->where('id_clientservt', $id);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('con_clientserv_detail');
    }

    public function sec_id($id)
    {
        $this->db->select('*');
        $this->db->from('con_clientserv_detail');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function aktif($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('con_clientserv_detail', $data);
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('con_serv_detail');
        $this->db->where('id_clientserv_detail', $id);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function bc($id)
    {
        $this->db->select('*');
        $this->db->from('con_serv_detail');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function eb($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('con_serv_detail', $data);
    }

    public function update_sr($id, $nama, $desk)
    {
        $data = array(
            'nama' => $nama,
            'add_desk' => $desk
        );
        $this->db->where('id', $id);
        return $this->db->update('con_clientserv_detail', $data);
    }

    public function upload($backlink, $id_clientservt, $nama, $phone, $logo, $exlogo, $status)
    {
       $data = array(
           'backlink'   => $backlink,
           'id_clientservt' => $id_clientservt,
           'nama'   => $nama,
           'phone'  => $phone,
           'logo'   => $logo,
           'exlogo'  => $exlogo,
           'status' => $status
       );
       return $this->db->insert('con_clientserv_detail', $data);
    }

    public function tambah($id_clientservt, $nama, $add_desk, $exlogo, $status)
    {
       $data = array(
           'id_clientservt' => $id_clientservt,
           'nama'   => $nama,
           'add_desk'  => $add_desk,
           'exlogo'    => $exlogo,
           'status' => $status
       );
       return $this->db->insert('con_clientserv_detail', $data);
    }
    public function testiadd($id_clientservt, $nama, $add_desk, $add_2, $exlogo, $status)
    {
       $data = array(
           'id_clientservt' => $id_clientservt,
           'nama'   => $nama,
           'add_desk'  => $add_desk,
           'add_2'      => $add_2,
           'exlogo'    => $exlogo,
           'status' => $status
       );
       return $this->db->insert('con_clientserv_detail', $data);
    }
}
