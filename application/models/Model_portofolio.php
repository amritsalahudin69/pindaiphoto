<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_portofolio extends CI_Model
{

    public function gallery($id = false)
    {
        if($id){
            $this->db->select('*');
            $this->db->from('con_gallery');
            $this->db->where('id', $id);
            return $this->db->get()->row();
        }else{
            $this->db->select('*');
            $this->db->from('con_gallery');
            $query = $this->db->get()->result_array();
            $data = $query;
            return $data;
        }
    }
    public function upload($namafile, $gen_name, $exfile, $pref1, $id_category, $status)
    {
        $data = array(
            'namafile'   => $namafile,
            'gen_name' => $gen_name,
            'exfile'   => $exfile,
            'pref1'  => $pref1,
            'id_category'   => $id_category,
            'status' => $status
        );
        return $this->db->insert('con_gallery', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('con_gallery');
    }
    public function aktif($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('con_gallery', $data);
    }

}
