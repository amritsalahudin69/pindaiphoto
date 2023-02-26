<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_category'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function index()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $sc = 10;
            $data = array(
                'npage'     => 'Category',
                'des'       => 'Post Category',
                'data'   => $this->Model_category->cat(),
                'sc'        => $sc
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/categ', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function add()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Tambah Category',
                'des'       => 'Post Category',
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/categ_tmbh', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function viewcat($id)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Ubah Category',
                'des'       => 'Post Category',
                'data'   => $this->Model_category->cat_id($id)
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/categ_ubah', $data);
            $this->load->view('dashboard/footer');
        }
    }

    private function hitung()
    {
        $q = "SELECT count(*) as `data` FROM `con_catagory`";
        $data = $this->db->query($q)->row();
        return $data;
    }
    
    public function tambah()
    {
        $kode          = mt_rand(5, 9999);
        $ncat          = $this->input->post('nama');
        $link_         = '#';
        $domref        = strtr($ncat, " ", "_");
        $pref          = '.' . $domref;
        $status = 1;
        $this->_add($kode, $ncat, $link_, $pref, $domref, $status);
        redirect('category');
    }

    public function _add($kode, $ncat, $link_, $pref, $domref, $status)
    {
        $this->Model_category->add($kode, $ncat, $link_, $pref, $domref, $status);
    }

    public function editcat($id)
    {
        
        $ncat          = $this->input->post('ncat');
        $link_         = '#';
        $domref        = strtr($ncat, " ", "_");
        $pref          = '.' . $domref;
        $this->update($id, $ncat, $link_, $pref, $domref);
        redirect('category');


    }

    public function update($id, $ncat, $link_, $pref, $domref)
    {
        $this->Model_category->update($id, $ncat, $link_, $pref, $domref);
    }

    public function disable($id)
    {
        $status = 0;
        $this->Model_category->aktif($id, $status);
        redirect('category');
    }

    public function enable($id)
    {
        $status = 1;
        $this->Model_category->aktif($id, $status);
        redirect('category');
    }
}
