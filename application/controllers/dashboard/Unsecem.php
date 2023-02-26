<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unsecem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_dev'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function sender()
    {
        $id = 1;
        $ak = 1;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Unsecure Email',
                'des'       => 'Email ini digunakan untuk mengiriman Email feedback untuk client',
                'data'      => $this->Model_dev->get($id),
                'id'        => $id,
                'ak'        => $ak
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/unsecem', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function viewsender($id)
    {
        $id = 1;
        $ak = 1;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Isi dan Email ini digunakan untuk mengiriman Email feedback untuk client',
                'des'       => 'Email ini digunakan untuk mengiriman Email feedback untuk client',
                'data'      => $this->Model_dev->get_id($id),
                'id'        => $id,
                'ak'        => $ak
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/unsecem_view', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function editemail($id)
    {
        $cek = $this->Model_dev->get_id($id)->id;
        $nama      = $this->input->post('nama');
        $email  = $this->input->post('email');
        $pass_email  = $this->input->post('pass_email');
        $sub  = $this->input->post('sub');
        $mass  = $this->input->post('mass');
        $this->Model_dev->update($id, $nama, $email, $pass_email, $sub, $mass);
        if ($cek == 1) {
            redirect('eunsecure');
        } else {
            redirect('ereport');
        }
    }

    public function report()
    {
        $id = 2;
        $ak = 2;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Report Email',
                'des'       => 'Email ini digunakan untuk mengiriman Email Report jika terdapat permintaan feedback',
                'data'      => $this->Model_dev->get($id),
                'id'        => $id,
                'ak'        => $ak
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/unsecem', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function viewereport($id)
    {
        $ak = 2;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Report Email',
                'des'       => 'Email ini digunakan untuk mengiriman Email Report jika terdapat permintaan feedback',
                'data'      => $this->Model_dev->get_id($id),
                'ak'        => $ak
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/unsecem_view', $data);
            $this->load->view('dashboard/footer');
        }
    }
}
