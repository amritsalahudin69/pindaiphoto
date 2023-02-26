<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Core
{
    public function doencrypt($string)
    {
        $ci = &get_instance();
        $key2 = 'nowar!';
        $ecI = hash_hmac('sha256', $string, $ci->config->item('encryption_key'), true);
        $ecII = base64_encode($ecI);
        $ecIII = sha1($key2 . md5($ecII));
        return $ecIII;
    }

    public function _login()
    {
        $ci = &get_instance();
        $kode = $ci->input->post('kode', true);
        $password = $ci->input->post('password', true);

        $ci->load->library('form_validation');
        form_set_error_delimiters();
        $ci->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[1]',
            [
                'min_length' => 'Password terlalu pendek'
            ]
        );
        if ($ci->form_validation->run() == true) {
            $db = $ci->Model_user->login($kode);
            $sandi = $this->doencrypt($password);
            if (isset($db)) {
                if ($sandi == $db->password) {
                    $datalog = array(
                        'log_status'    => true,
                        'log_id'        => $db->id,
                        'log_kode'      => $db->kodeuser,
                        'log_role'      => $db->id_role,
                        'log_user'      => $db->user,
                        'log_email'     => $db->email
                    );
                    $ci->session->set_userdata($datalog);
                    $kode = $ci->session->log_kode;
                    redirect('rumah');
                } else {
                    set_message('login', 'danger', "Password Salah");
                    redirect('kimochi');
                }
            } else {
                set_message('login', 'danger', "User Belum di Terdaftar");;
                redirect('kimochi');
            }
        }
    }

    public function cek_password()
    {
        $ci = &get_instance();
        $id = $ci->session->userdata('log_id');
        $oldpass             = $ci->Model_user->pw($id);
        $oldpass             = $oldpass->password;

        return $oldpass;
    }

    public function gantipassword()
    {

        $ci = &get_instance();
        $id = $ci->session->userdata('log_id');

        $email     = $ci->input->post('email');
        $user   = $ci->input->post('user');
        $kodeuser     = $email;
        $status = 1;
        $id_role = 1;
        $password = $ci->input->post('password', true);
        $newpass = $ci->input->post('newpass', true);
        $confirm = $ci->input->post('confirm', true);

        $oldpass = $this->cek_password();
        $newpassword = $this->doencrypt($password);

        // $ci->Model_user->gantipass($id, $kodeuser, $id_role, $user, $email, $enpass, $status);

        $ci->load->library('form_validation');
        form_set_error_delimiters();
        $ci->form_validation->set_rules(
            'email',
            'email',
            'required|min_length[3]',
            [
                'required'      => 'Email Tidak Boleh Kosong',
                'min_length'    => 'Minimal 4 Karakter'
            ]
        );
        $ci->form_validation->set_rules(
            'user',
            'user',
            'required|min_length[3]',
            [
                'required'      => 'User Tidak Boleh Kosong',
                'min_length'    => 'Minimal 4 Karakter'
            ]
        );
        $ci->form_validation->set_rules(
            'password',
            'password',
            'required|min_length[3]',
            [
                'required'      => 'Password Lama Tidak Boleh Kosong',
                'min_length'    => 'Panjang Password Minimal 3 Karakter'
            ]
        );
        $ci->form_validation->set_rules(
            'newpass',
            'password baru',
            'required|min_length[3]',
            [
                'required'      => 'Password Baru Tidak Boleh Kosong',
                'min_length'    => 'Panjang Password Baru Minimal 3 Karakter'
            ]
        );
        $ci->form_validation->set_rules('confirm', 'konfirmasi password baru', 'required|min_length[3]|matches[newpass]');

        if ($ci->form_validation->run() == true) {
            if ($oldpass == $newpassword) {
                $enpass = $this->doencrypt($newpass);
                $ci->Model_user->gantipass($id, $kodeuser, $id_role, $user, $email, $enpass, $status);
                $this->logout();
            } else {
                set_message('msg', 'danger', "Password Lama Salah! Ulangi Lagi!");
            }
        }
    }

    public function cekaktif()
    {
        $ci = &get_instance();
        if ($ci->session->log_status == true) {
            return true;
        } else {
            return false;
        }
    }

    public function pageaktif()
    {
        if ($this->cekaktif() == false) {
            set_message('msg', 'danger', 'Silahkan login terlebih dahulu.');
            redirect('login');
        }
    }
    public function logout()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata('log_id');
        $ci->session->unset_userdata('log_status');
        $ci->session->unset_userdata('log_kode');
        $ci->session->unset_userdata('log_role');
        $ci->session->unset_userdata('log_user');
        $ci->session->unset_userdata('log_email');
        session_destroy();
        set_message('daftar', 'danger', "Anda Sudah Keluar");
        redirect('kimochi');
    }
}
