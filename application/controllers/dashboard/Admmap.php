<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admmap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_sitemap'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function meta()
    {
        $data['npage'] = 'Meta';
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $d = 1;
            $data['meta'] = $this->Model_sitemap->meta($d);
            $id = $data['meta']->id;
            if ($this->input->post('ok')) {
                $judul              = htmlspecialchars($this->input->post('judul'));
                $site_              = htmlspecialchars($this->input->post('site_'));
                form_set_error_delimiters();
                $this->form_validation->set_rules(
                    'judul',
                    'judul',
                    'required',
                    [
                        'required' => 'Judul Meta Tidak boleh Kosong'
                    ]
                );

                $this->form_validation->set_rules(
                    'site_',
                    'site_',
                    'required',
                    [
                        'required' => 'Tagline Tidak boleh Kosong',
                    ]
                );
                if ($this->form_validation->run() == true) {
                    $this->Model_sitemap->metaupdate($id, $judul, $site_);
                }
                set_message('msg', 'success', "Anda baru saja Mengubah Meta Data");
                redirect('meta');
            }

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/meta', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function deskripsi()
    {
        $data = array(
            'npage' => 'Meta Description',
            'des' => 'Description'
        );
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $d = 10;
            $data['meta'] = $this->Model_sitemap->meta($d);
            $id = $data['meta']->id;
            if ($this->input->post('ok')) {
                $site_              = htmlspecialchars($this->input->post('site_'));
                form_set_error_delimiters();
                $this->form_validation->set_rules(
                    'site_',
                    'site_',
                    'required',
                    [
                        'required' => 'Tagline Tidak boleh Kosong',
                    ]
                );
                if ($this->form_validation->run() == true) {
                    $this->Model_sitemap->deskey($id, $site_);
                }
                set_message('msg', 'success', "Anda baru saja Mengubah Meta Data");
                redirect('description');
            }

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/metdeskey', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function katakunci()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $d = 11;
            $data = array(
                'npage' => 'Meta Keyword',
                'des' => 'Keyword',
                'meta' => $this->Model_sitemap->meta($d)
            );
            // $data['meta'] = $this->Model_sitemap->meta($d);
            $id = $data['meta']->id;
            if ($this->input->post('ok')) {
                $site_              = htmlspecialchars($this->input->post('site_'));
                form_set_error_delimiters();
                $this->form_validation->set_rules(
                    'site_',
                    'site_',
                    'required',
                    [
                        'required' => 'Tagline Tidak boleh Kosong',
                    ]
                );
                if ($this->form_validation->run() == true) {
                    $this->Model_sitemap->deskey($id, $site_);
                }
                set_message('msg', 'success', "Anda baru saja Mengubah Meta Data");
                redirect('keyword');
            }

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/metdeskey', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function contact()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $sc = 2;
            $data = array(
                'npage'     => 'Data Personal',
                'des'       => 'User/Personal Contact',
                'contsos'   => $this->Model_sitemap->contsos($sc),
                'sc'        => $sc
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/consos', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function viewcontact($id)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Ubah Data',
                'des'       => 'Ubah Data Contact',
                'contsos'   => $this->Model_sitemap->contsos_get($id)
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/consos_ubah', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function editcontact($id)
    {
        $site_          = $this->input->post('judul');
        $link = '#';
        $this->insert($id, $site_, $link);
        redirect('contact');
    }

    public function editsost($id)
    {
        $r = $this->Model_sitemap->contsos_get($id)->site_;
        $link      = $this->input->post('judul');
        $site_ = $r;
        $this->insert($id, $site_, $link);
        redirect('sosmed');
    }

    public function disable($id)
    {
        $r = $this->Model_sitemap->contsos_get($id)->id_adm_secmen;
        $status = 0;
        $this->Model_sitemap->aktif($id, $status);
        if ($r == 2) {
            redirect('contact');
        }
        if ($r == 10) {
            redirect('sosmed');
        }
    }

    public function enable($id)
    {
        $r = $this->Model_sitemap->contsos_get($id)->id_adm_secmen;
        $status = 1;
        $this->Model_sitemap->aktif($id, $status);
        if ($r == 2) {
            redirect('contact');
        }
        if ($r == 10) {
            redirect('sosmed');
        }
    }

    public function insert($id, $site_, $link)
    {
        $this->Model_sitemap->consosupdate($id, $site_, $link);
    }



    public function sosmed()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $sc = 10;
            $data = array(
                'npage'     => 'Sosial Media Personal',
                'des'       => 'sosial Media',
                'contsos'   => $this->Model_sitemap->contsos($sc),
                'sc'        => $sc
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/consos', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function viewsos($id)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Ubah Data',
                'des'       => 'Ubah Data Contact',
                'contsos'   => $this->Model_sitemap->contsos_get($id)
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/consos_ubah', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function editsos($id)
    {
        $site_          = $this->input->post('judul');
        $link = '#';
        $this->insert($id, $site_, $link);
        redirect('contact');
    }
}
