<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_feedback extends CI_Model
{

    public function feed($id = false)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('feedback');
            $this->db->where('id', $id);
            return $this->db->get()->row();
        }else{
            $this->db->select('*');
            $this->db->from('feedback');
            $query = $this->db->get()->result_array();
            $data = $query;
            return $data;
        }
    }
    public function aktif($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('feedback', $data);
    }
    
    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('feedback');
    }


}
