<?php


class Histori extends CI_Controller
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
            'histori'      => $this->m_payroll->get("histori_gajian")->result(),
            'hari'         => $day->tanggal()
        );
        $this->template->load('template/template', 'histori', $data);
    }
}
