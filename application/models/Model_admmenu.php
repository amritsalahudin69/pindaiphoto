<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admmenu extends CI_Model
{

    public function menu()
    {
        $this->db->select('*');
        $this->db->from('adm_menu');
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
        return $this->db->update('adm_menu', $data);
    }
}
