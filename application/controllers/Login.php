<?php

class Login extends CI_Controller
{




    public function __construct()
    {
        parent::__construct();
        $id = $this->session->userdata('id');
        if ($id != null || $id != "") {
            redirect('Home');
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function cek()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        try {
            $data = $this->m_payroll->getData(['email' => $email, 'password' => $password], "akun");
            if ($data->num_rows() > 0) {
                $akun = $data->row();
                $this->session->set_userdata('id', $akun->id);
                redirect('Home');
            } else {
                $this->session->set_flashdata('info', 'user not found');
                redirect('Login');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
