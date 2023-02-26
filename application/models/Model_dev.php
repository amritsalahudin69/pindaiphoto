<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dev extends CI_Model
{
    public function sendemail()
    {
        $this->db->select('*');
        $this->db->from('adm_dev');
        $this->db->where('status', 1);
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }
    public function reportemail()
    {
        $this->db->select('*');
        $this->db->from('adm_dev');
        $this->db->where('status', 1);
        $this->db->where('id', 2);
        return $this->db->get()->row();
    }

    public function get($id)
    {
        $this->db->select('*');
        $this->db->from('adm_dev');
        $this->db->where('id', $id);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function get_id($id)
    {
        $this->db->select('*');
        $this->db->from('adm_dev');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function update($id, $nama, $email, $pass_email, $sub, $mass)
    {
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pass_email' => $pass_email,
            'sub'   => $sub,
            'mass'  => $mass
        );
        $this->db->where('id', $id);
        return $this->db->update('adm_dev', $data);
    }
}
