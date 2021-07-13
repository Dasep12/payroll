<?php

class Home extends CI_Controller
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
            'hari'         => $day->tanggal()
        );
        $this->template->load('template/template', 'home', $data);
    }
}
