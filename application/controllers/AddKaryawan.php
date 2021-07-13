<?php


class AddKaryawan extends CI_Controller
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
            'url'       => $this->uri->segment(1),
            'job'       => $this->m_payroll->get("jobclass")->result(),
            'hari'         => $day->tanggal()
        );
        $this->template->load('template/template', 'addkaryawan', $data);
    }

    public function input()
    {

        $nik   = $this->input->post('nik');
        $data   = array(
            'nama'           => $this->input->post('nama'),
            'id_user'        => $this->input->post('nik'),
            'nik'            => $this->input->post('nik'),
            'tgl_lahir'      => $this->input->post('tgl_lahir'),
            'jobclass'       => $this->input->post('jobclass'),
            'email'          => $this->input->post('email'),
            'npwp'          => $this->input->post('npwp'),
        );

        $cekid  = $this->m_payroll->getData(['nik' => $nik], "karyawan")->num_rows();
        $cekus  = $this->m_payroll->getData(['id_user' => $nik], "karyawan")->num_rows();

        if ($cekid > 0 || $cekus > 0) {
            echo "user sudah ada";
        } else {
            try {
                $this->m_payroll->input($data, "karyawan");
                echo "sukses";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
