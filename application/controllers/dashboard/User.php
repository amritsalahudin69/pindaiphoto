<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_konten', 'Model_dev', 'Model_user'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function logout()
    {
        $this->core->logout();
    }
    public function login()
    {
        if ($this->core->cekaktif() == true) {
            redirect('dashboard');
        }
        if ($this->input->post('ok')) {
            $this->core->_login();
        }
        $this->load->view('dashboard/header');
        $this->load->view('dashboard/login');
        $this->load->view('dashboard/footer');
    }


    public function index()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/blank');
            $this->load->view('dashboard/footer');
        }
    }

    public function meta()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/meta');
            $this->load->view('dashboard/footer');
        }
    }

    public function ganti()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        }
        $id = $this->session->userdata('log_id');
        $data = array(
            'npage'     => 'Ubah Password',
            'des'       => 'Ubah Password',
            'data'      => $this->Model_user->id($id)
        );
        if ($this->input->post('ok')) {
            $this->core->gantipassword();
        }

        $this->load->view('dashboard/header');
        $this->load->view('dashboard/topmenus');
        $this->load->view('dashboard/sidebar');
        $this->load->view('dashboard/ganti', $data);
        $this->load->view('dashboard/footer');
    }
}
