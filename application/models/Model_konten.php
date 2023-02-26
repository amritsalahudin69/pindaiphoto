<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_konten extends CI_Model
{
    public function all()
    {
        $this->db->select('
                            `g`.`namafile`,
                            `g`.`exfile`,
                            `g`.`pref1`,
                            `g`.`status`,
                            `c`.`ncat`,
                            `c`.`link_`,
                            `c`.`pref`,
                            `c`.`domref`
                        ');
        $this->db->from('con_gallery g');
        $this->db->join('con_catagory c', 'g.id_category=c.id');
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function part()
    {
        $this->db->select('
                            *
                        ');
        $this->db->from('con_clientserv');
        $this->db->where('status', 1);
        $this->db->where('id_menu', 2);
        return $this->db->get()->row();
    }
    public function serv()
    {
        $this->db->select('
                            *
                        ');
        $this->db->from('con_clientserv');
        $this->db->where('status', 1);
        $this->db->where('id_menu', 3);
        return $this->db->get()->row();
    }
    public function testi()
    {
        $this->db->select('
                            *
                        ');
        $this->db->from('con_clientserv');
        $this->db->where('status', 1);
        $this->db->where('id_menu', 9);
        return $this->db->get()->row();
    }
    public function part_detail($id_client)
    {
        $this->db->select('
                            *
                        ');
        $this->db->from('con_clientserv_detail');
        $this->db->where('id_clientservt', $id_client);
        $this->db->where('status', 1);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }
    public function testi_all()
    {
        $this->db->select('
                            *
                        ');
        $this->db->from('con_clientserv_detail');
        $this->db->where('id_clientservt', 3);
        $this->db->where('status', 1);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }

    public function contact()
    {
        $this->db->select('
                            *
                        ');
        $this->db->from('adm_sitemap');
        $this->db->where('id_adm_secmen', 2);
        $this->db->where('status', 1);
        $query = $this->db->get()->result_array();
        $data = $query;
        return $data;
    }
    public function insertemail($nama, $email, $subject, $massage, $status)
    {
        $data = array (
            'name' => $nama,
            'email' => $email,
            'subject_em' => $subject,
            'message' => $massage,
            'status' => $status
        );
        return $this->db->insert('feedback', $data);

    }
}
