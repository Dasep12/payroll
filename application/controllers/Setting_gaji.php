<?php


class Setting_gaji extends CI_Controller
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
            'karyawan'     => $this->m_payroll->get("karyawan")->result(),
            'hari'         => $day->tanggal()
        );
        $this->template->load('template/template', 'setting_gaji', $data);
        //$this->load->view('input_gaji');
    }


    public function input()
    {
        $nama        = $this->input->post('nama');
        $nik         = $this->input->post('nik');
        $iduser      = $this->input->post('iduser');
        $jobclass    = $this->input->post('jobclass');
        $gaji_pokok  = $this->input->post('gaji_pokok');
        $tunjangan1  = $this->input->post('tunjangan1');
        $tunjangan2  = $this->input->post('tunjangan2');
        $tunjangan3  = $this->input->post('tunjangan3');
        $bpjskes     = $this->input->post('bpjs_kesehatan');
        $bpjstk      = $this->input->post('bpjs_tenagakerja');

        $data = array(
            'id_user'           => $iduser,
            'nama'              => $nama,
            'nik'               => $nik,
            'gaji_pokok'        => $gaji_pokok,
            'tunjangan1'        => $tunjangan1,
            'tunjangan2'        => $tunjangan2,
            'tunjangan3'        => $tunjangan3,
            'bpjs_kesehatan'    => $bpjskes,
            'bpjs_tenagakerja'  => $bpjstk
        );

        $cek   = $this->m_payroll->getData(['id_user' => $iduser], "tbl_gaji_karyawan")->num_rows();
        if ($cek > 0) {
            echo "data gaji karyawan " . $nik .  " sudah di setting";
        } else {
            try {
                $this->m_payroll->input($data, "tbl_gaji_karyawan");
                echo "sukses simpan data";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
