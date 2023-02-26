<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Secmen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_secmen'));
        $this->load->library(array('form_validation', 'core', 'session'));
    }

    public function client()
    {
        $id = 1;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Client Secmen',
                'des'       => 'Client Secmen',
                'data'      => $this->Model_secmen->sec($id),
                'id'        => $id
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/secclient', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function clientadd()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Client Secmen',
                'des'       => 'Tambah Client Secmen'
            );

            $this->load->library('upload');
            if ($this->input->post('ok')) {
                $kode                    = mt_rand(2, 99);
                $gen                     = "file_" . time();
                $config['upload_path']   = 'assets/upload_gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']      = '4000';
                $config['file_name']     = '~' . $kode . $gen;
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        $id_clientservt            = 1;
                        $backlink                  = htmlspecialchars($this->input->post('backlink'));
                        $nama                      = htmlspecialchars(strtoupper($this->input->post('nama')));
                        $phone                     = htmlspecialchars(strtoupper($this->input->post('phone')));
                        $exlogo                    = explode('.', $_FILES['file']['name']);
                        $exlogo                    = end($exlogo);
                        $status                    = 1;
                        $logo                      = $this->upload->data('file_name');

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
                            $this->upload($backlink, $id_clientservt, $nama, $phone, $logo, $exlogo, $status);
                            redirect('secclient');
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
            $this->load->view('dashboard/secclient_tambah', $data);
            if (isset($error)) {
                $this->load->view('_error/error', $error);
            }
            $this->load->view('dashboard/footer');
        }
    }
    private function upload($backlink, $id_clientservt, $nama, $phone, $logo, $exlogo, $status)
    {
        $this->Model_secmen->upload($backlink, $id_clientservt, $nama, $phone, $logo, $exlogo, $status);
    }

    public function hapus($id)
    {
        $namefile = $this->Model_secmen->sec_id($id)->logo;
        $gim = 'assets/upload_gambar/';
        $path = $gim . $namefile;
        unlink(FCPATH . $path);
        $this->Model_secmen->hapus($id);
        redirect('secclient');
    }

    public function delete2($id)
    {
        $namefile = $this->Model_secmen->sec_id($id)->add_2;
        $gim = 'assets/upload_gambar/';
        $path = $gim . $namefile;
        unlink(FCPATH . $path);
        $this->Model_secmen->hapus($id);
        redirect('testi');
    }

    public function clidisable($id)
    {
        $cek = $this->Model_secmen->sec_id($id)->id_clientservt;
        $status = 0;
        $this->Model_secmen->aktif($id, $status);
        switch ($cek) {
            case '1':
                redirect('secclient');
                break;
            case '2':
                redirect('secserv');
                break;
            case '3':
                redirect('testi');
                break;;
        }
    }

    public function clienable($id)
    {
        $cek = $this->Model_secmen->sec_id($id)->id_clientservt;
        $status = 1;
        $this->Model_secmen->aktif($id, $status);
        switch ($cek) {
            case '1':
                redirect('secclient');
                break;
            case '2':
                redirect('secserv');
                break;
            case '3':
                redirect('testi');
                break;;
        }
    }

    public function serv($id = false)
    {
        $i = 2;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            if ($id) {
                $data = array(
                    'npage'     => 'Detail Sekmen Layanan',
                    'des'       => 'Detail Sekmen Layanan',
                    'data'      => $this->Model_secmen->detail($id)
                );
                $this->load->view('dashboard/secservdetail', $data);
            } else {
                $data = array(
                    'npage'     => 'Sekmen Layanan',
                    'des'       => 'Sekmen Layanan',
                    'data'      => $this->Model_secmen->sec($i),
                    'id'        => $i
                );
                $this->load->view('dashboard/secserv', $data);
            }
            $this->load->view('dashboard/footer');
        }
    }
    public function delete1($id)
    {
        $this->Model_secmen->hapus($id);
        redirect('secserv');
    }

    public function serv_add()
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Sekmen Layanan',
                'des'       => 'Tambah Sekmen Layanan'
            );

            if ($this->input->post('ok')) {

                $id_clientservt            = 2;
                $nama                      = htmlspecialchars(strtoupper($this->input->post('nama')));
                $add_desk                  = htmlspecialchars($this->input->post('add_desk'));
                $exlogo                    = 'serv';
                $status                    = 1;

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
                    $this->Model_secmen->tambah($id_clientservt, $nama, $add_desk, $exlogo, $status);
                    redirect('secserv');
                }
            }
            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/secservadd', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function serd($id)
    {
        $cek = $this->Model_secmen->bc($id);
        $ed = $cek->id_clientserv_detail;
        $status = 0;
        $this->Model_secmen->eb($id, $status);
        redirect('secserv/' . $ed);
    }

    public function sere($id)
    {
        $cek = $this->Model_secmen->bc($id);
        $ed = $cek->id_clientserv_detail;
        $status = 1;
        $this->Model_secmen->eb($id, $status);
        redirect('secserv/' . $ed);
    }

    public function editserv($id)
    {
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Ubah Sekmen Layanan',
                'des'       => 'Sekmen Layanan',
                'data'      => $this->Model_secmen->sec_id($id)
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/secserv_ubah', $data);
            $this->load->view('dashboard/footer');
        }
    }

    public function edit($id)
    {
        $nama      = $this->input->post('nama');
        $add_desk      = $this->input->post('des');
        $this->Model_secmen->update_sr($id, $nama, $add_desk);
        redirect('secserv');
    }

    public function testimonial()
    {
        $id = 3;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Testimonial Secmen',
                'des'       => 'testimonial Secmen',
                'data'      => $this->Model_secmen->sec($id),
                'id'        => $id
            );

            $this->load->view('dashboard/header');
            $this->load->view('dashboard/topmenus');
            $this->load->view('dashboard/sidebar');
            $this->load->view('dashboard/sectesti', $data);
            $this->load->view('dashboard/footer');
        }
    }
    public function testimonialadd()
    {
        $id = 3;
        if ($this->core->cekaktif() == false) {
            $this->core->logout();
        } else {
            $data = array(
                'npage'     => 'Testimonial Secmen',
                'des'       => 'testimonial Secmen'
            );

            $this->load->library('upload');
            if ($this->input->post('ok')) {
                $kode                    = mt_rand(2, 99);
                $gen                     = "file_" . time();
                $config['upload_path']   = 'assets/upload_gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']      = '4000';
                $config['file_name']     = '~testi' . $kode . $gen;
                $this->upload->initialize($config);

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {
                        $id_clientservt            = $id;
                        $nama                      = htmlspecialchars(strtoupper($this->input->post('nama')));
                        $add_desk                  = htmlspecialchars($this->input->post('add_desk'));
                        $exlogo                    = 'testi';
                        $status                    = 1;
                        $add_2                    = $this->upload->data('file_name');

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
                            $this->Model_secmen->testiadd($id_clientservt, $nama, $add_desk, $add_2, $exlogo, $status);
                            redirect('testi');
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
            $this->load->view('dashboard/sectestiadd', $data);
            if (isset($error)) {
                $this->load->view('_error/error', $error);
            }
            $this->load->view('dashboard/footer');
        }
    }
}
