<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_portofolio', 'Model_category'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function gal($id = false)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            if ($id) {
                $data = array(
                    'npage'     => 'Detail Konten',
                    'des'       => 'Gallery',
                    'data'      => $this->Model_portofolio->gallery($id),
                );
                // var_dump($data['data']);
                $this->load->view('dashboard/galldetail', $data);
            } else {
                $sc = 10;
                $data = array(
                    'npage'     => 'Gallery',
                    'des'       => 'Gallery',
                    'data'   => $this->Model_portofolio->gallery(),
                    'sc'        => $sc
                );
                $this->load->view('dashboard/gall_', $data);
            }
            $this->load->view('dashboard/footer');
        }
    }

    public function tambah()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Upload Gambar',
                'des'       => 'Gallery',
                'dropdown1' => $this->Model_category->catstatus()
            );

            $this->load->library('upload');
            if ($this->input->post('ok')) {
                $kode                    = mt_rand(2, 99);
                $gen                     = "file_" . time();
                $config['upload_path']   = 'assets/gallery/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']      = '8000';
                $config['file_name']     = '~' . $kode . $gen;
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        $namafile                  = htmlspecialchars(strtoupper($this->input->post('nama')));
                        $gen_                      = strtr($namafile, " ", "_");
                        $gen_name                  = $gen . $kode . $gen_;
                        $ex                        = explode('.', $_FILES['file']['name']);
                        $pref1                     = end($ex);
                        $status                    = 1;
                        $id_category               = $this->input->post('dropdown');
                        $exfile                    = $this->upload->data('file_name');

                        form_set_error_delimiters();
                        $this->form_validation->set_rules(
                            'nama',
                            'nama',
                            'required',
                            [
                                'required' => 'Nama File Tidak boleh Kosong'
                            ]
                        );

                        if ($this->form_validation->run() == true) {
                            $this->Model_portofolio->upload($namafile, $gen_name, $exfile, $pref1, $id_category, $status);
                            redirect('galery');
                        }
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                    }
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/galladd', $data);
            if (isset($error)) {
                $this->load->view('_error/error', $error);
            }
            $this->load->view('dashboard/footer');
        }
    }

    public function del($id)
    {
        $namefile = $this->Model_portofolio->gallery($id)->exfile;
        $gim = 'assets/gallery/';
        $path = $gim . $namefile;
        unlink(FCPATH . $path);
        $this->Model_portofolio->hapus($id);
        redirect('galery');
    }

    public function dis($id)
    {
        $status = 0;
        $this->Model_portofolio->aktif($id, $status);
        redirect('galery');
    }
    public function ena($id)
    {
        $status = 1;
        $this->Model_portofolio->aktif($id, $status);
        redirect('galery');
    }
}
