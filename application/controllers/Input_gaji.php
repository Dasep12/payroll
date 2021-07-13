<?php


class Input_gaji extends CI_Controller
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
            'karyawan'     => $this->m_payroll->ambilRinciGaji()->result()
        );
        $this->template->load('template/template', 'input_gaji', $data);
        //$this->load->view('input_gaji');
    }


    public function input()
    {
        $noref       = $this->input->post('noref');
        $nama        = $this->input->post('nama');
        $nik         = $this->input->post('nik');
        $iduser      = $this->input->post('iduser');
        $jobclass    = $this->input->post('jobclass');
        $gaji_pokok  = $this->input->post('gaji_pokok');
        $tunjangan1  = $this->input->post('tunjangan1');
        $tunjangan2  = $this->input->post('tunjangan2');
        $tunjangan3  = $this->input->post('tunjangan3');
        $lembur      = $this->input->post('lembur');
        $bpjskes     = $this->input->post('bpjs_kesehatan');
        $bpjstk      = $this->input->post('bpjs_tenagakerja');
        $tanggal     = $this->input->post('tanggal');
        $email       = $this->input->post('email');
        $npwp        = $this->input->post('npwp');

        $data = array(
            'noref'             => $noref,
            'iduser'            => $iduser,
            'nama'              => $nama,
            'nik'               => $nik,
            'jobclass'          => $jobclass,
            'gajipokok'         => $gaji_pokok,
            'tunjangan1'        => $tunjangan1,
            'tunjangan2'        => $tunjangan2,
            'tunjangan3'        => $tunjangan3,
            'bpjs_kesehatan'    => $bpjskes,
            'bpjs_tenagakerja'  => $bpjstk,
            'lembur'            => $lembur,
            'tanggal'           => $tanggal,
            'email'             => $email,
            'npwp'              => $npwp
        );
        $input =  $this->m_payroll->input($data, "histori_gajian");
        if ($input > 0) {
            echo "simpan berhasil";
        } else {
            echo "terjadi kesalahan";
        }
    }
}
