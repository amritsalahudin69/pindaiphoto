<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UI extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Model_konten', 'Model_dev'));
        $this->load->library(array('email'));
    }

    public function index()
    {

        $data['gallery'] = $this->Model_konten->all();

        $data['partner'] = $this->Model_konten->part();
        $id_client = $data['partner']->id;
        $data['partdet'] = $this->Model_konten->part_detail($id_client);

        $data['serv'] = $this->Model_konten->serv();
        $id_client2 = $data['serv']->id;
        $data['detserv'] = $this->Model_konten->part_detail($id_client2);
        $data['testi'] = $this->Model_konten->testi_all();
        $data['cont'] = $this->Model_konten->testi();
        $data['address'] = $this->Model_konten->contact();

        $this->load->view('ui/header', $data);

        $query = "SELECT * FROM `adm_menu` WHERE `id`= 1";
        $sec = $this->db->query($query)->row();
        if ($sec->status == 1) {
            $this->load->view('ui/gallerynew', $data);
        }

        $query = "SELECT * FROM `adm_menu` WHERE `id`= 2"; //client
        $cli = $this->db->query($query)->row();
        if ($cli->status == 1) {
            $this->load->view('ui/client', $data);
        }

        $query = "SELECT * FROM `adm_menu` WHERE `id`= 3";
        $ser = $this->db->query($query)->row();
        if ($ser->status == 1) {
            $this->load->view('ui/service', $data);
        }

        $query = "SELECT * FROM `adm_menu` WHERE `id`= 4";
        $test = $this->db->query($query)->row();
        if ($test->status == 1) {
            $this->load->view('ui/testimonial', $data);
        }

        $query = "SELECT * FROM `adm_menu` WHERE `id`= 9";
        $con = $this->db->query($query)->row();
        if ($con->status == 1) {
            $this->load->view('ui/contact', $data);
        }

        $this->load->view('ui/footer', $data);
        if ($this->input->post('ok')) {
            $this->ambilsender();
            $this->insert();
            $this->email();
            $this->reportemail();
            redirect('home');
        }
    }

    public function ui($id)
    {
        redirect('home');
    }

    private function ambilsender()
    {
        $name       = htmlspecialchars($this->input->post('name'));
        $name       = strtoupper($name);
        $email      = htmlspecialchars($this->input->post('email'));
        $subject      = htmlspecialchars($this->input->post('subject'));
        $massage      = htmlspecialchars($this->input->post('massage'));
        $data = [
            'name'  => $name,
            'email'     => $email,
            'subject'   => $subject,
            'massage'   => $massage
        ];
        return $data;
    }

    private function insert()
    {
        $array = $this->ambilsender();
        $name = $array['name'];
        $email = $array['email'];
        $subject = $array['subject'];
        $massage = $array['massage'];
        $status  = 1;
        $this->Model_konten->insertemail($name, $email, $subject, $massage, $status);
    }

    private function email()
    {
        $array = $this->ambilsender();
        $to = $array['email'];
        $from = $this->Model_dev->sendemail();

        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => $from->email,
            'smtp_pass' => $from->pass_email,
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        );
        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from($from->email, $from->nama);
        $this->email->to($to);
        $this->email->subject($from->sub);
        $this->email->message($from->mass);
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    private function reportemail()
    {
        $array = $this->ambilsender();
        $name = $array['name'];
        $email = $array['email'];
        $subject = $array['subject'];
        $massage = $array['massage'];

        $sendreport = 'Anda mendapatkan pesan dari ' . $name . '<br></<br> Alamat Email : ' . $email . '<br></<br> Subject: ' . $subject . '<br></<br>' . $massage;
        $subrep = 'Report data';

        $from = $this->Model_dev->sendemail();
        $report = $this->Model_dev->reportemail()->email;

        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => $from->email,
            'smtp_pass' => $from->pass_email,
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        );
        $this->email->initialize($config);
        $this->load->library('email', $config);
        $this->email->from($from->email, $from->nama);
        $this->email->to($report);
        $this->email->subject($subrep);
        $this->email->message($sendreport);
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
