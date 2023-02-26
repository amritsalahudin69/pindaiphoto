<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_admmenu', 'Model_clientserv'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function aktif()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Laman Aktif',
                'des'       => 'Cek Page Aktif',
                'data'   => $this->Model_admmenu->menu()
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/laman', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function disable($id)
    {
        $status = 0;
        $this->Model_admmenu->aktif($id, $status);
        redirect('lamanaktif');
    }

    public function enable($id)
    {
        $status = 1;
        $this->Model_admmenu->aktif($id, $status);
        redirect('lamanaktif');
    }

    public function judullaman()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Judul dan Deskripsi laman',
                'des'       => 'Judul dan Deskripsi laman',
                'data'   => $this->Model_clientserv->cliser()
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/cliserv', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function viewkonten($id)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Ubah Judul dan Deskripsi laman',
                'des'       => 'Ubah Judul dan Deskripsi laman',
                'data'   => $this->Model_clientserv->kon_id($id)
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/cliserv_ubah', $data);
            $this->load->view('dashboard/footer');
        }
    }
    public function editkonten($id)
    {
        $judul      = $this->input->post('judul');
        $deskripsi      = $this->input->post('des');
        $this->Model_clientserv->update($id, $judul, $deskripsi);
        redirect('kontenlaman');
    }
}
