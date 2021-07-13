<?php


class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id = $this->session->userdata('id');
        if ($id == null || $id == "") {
            redirect('Login');
        }
    }


    public function index()
    {
        $day = new Day();
        $data  = array(
            'url'          => $this->uri->segment(1),
            'hari'         => $day->tanggal(),
            'admin'        => $this->m_payroll->getData(['id' => $this->session->userdata('id')], "akun")->row()
        );
        $this->template->load('template/template', 'profile', $data);
    }
}
