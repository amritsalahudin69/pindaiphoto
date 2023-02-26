<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_feedback'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function pesan()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Feedback Masuk',
                'des'       => 'Feedback Masuk',
                'data'   => $this->Model_feedback->feed()
            );
 
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/umpan', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function baca($id)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Baca Detail',
                'des'       => 'Feedback Masuk',
                'data'      => $this->Model_feedback->feed($id)
            );
            $this->dibaca($id);
 
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/umpandetail', $data);
            $this->load->view('dashboard/footer');
        }

    }
    private function dibaca($id)
    {
        $status = 0;
        $this->Model_feedback->aktif($id, $status);
    }

    public function del($id)
    {   
        $this->Model_feedback->hapus($id);
        redirect('feedback');
    }
}
