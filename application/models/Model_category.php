<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_category extends CI_Model
{

    public function cat()
    {
        $this->db->select('*');
        $this->db->from('con_catagory');
        $this->db->where('id >', 1);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function catstatus()
    {
        $this->db->select('*');
        $this->db->from('con_catagory');
        $this->db->where('id >', 1);
        $this->db->where('status', 1);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function cat_id($id)
    {
        $this->db->select('*');
        $this->db->from('con_catagory');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $ncat, $link_, $pref, $domref)
    {
        $data = array(
            'ncat' => $ncat,
            'link_' => $link_,
            'pref'  => $pref,
            'domref' => $domref
        );
        $this->db->where('id', $id);
        return $this->db->update('con_catagory', $data);
    }
    public function add($kode, $ncat, $link_, $pref, $domref, $status)
    {
        $data = array(
            'kode' => $kode,
            'ncat' => $ncat,
            'link_' => $link_,
            'pref'  => $pref,
            'domref' => $domref,
            'status' => $status
        );
        return $this->db->insert('con_catagory', $data);
    }

    public function aktif($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('con_catagory', $data);
    }

}
