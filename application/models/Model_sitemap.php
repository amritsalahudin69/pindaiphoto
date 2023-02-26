<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sitemap extends CI_Model
{
    public function meta($id)
    {
        $this->db->select('*');
        $this->db->from('adm_sitemap');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    public function metaupdate($id, $judul, $site_)
    {
        $data = array(
            'judul' => $judul,
            'site_' => $site_
        );
        $this->db->where('id', $id);
        return $this->db->update('adm_sitemap', $data);
    }
    public function deskey($id, $site_)
    {
        $data = array(
            'site_' => $site_
        );
        $this->db->where('id', $id);
        return $this->db->update('adm_sitemap', $data);
    }

    public function contsos($sc)
    {
        $this->db->select('*');
        $this->db->from('adm_sitemap');
        $this->db->where('id_adm_secmen', $sc);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function contsos_get($id)
    {
        $this->db->select('*');
        $this->db->from('adm_sitemap');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function consosupdate($id, $site_, $link)
    {
        $data = array(
            'site_' => $site_,
            'link' => $link
        );
        $this->db->where('id', $id);
        return $this->db->update('adm_sitemap', $data);
    }

    public function aktif($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        return $this->db->update('adm_sitemap', $data);
    }
}
