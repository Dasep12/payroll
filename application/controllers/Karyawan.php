<?php


class Karyawan extends CI_Controller
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
            'url'         => $this->uri->segment(1),
            'hari'         => $day->tanggal(),
            'karyawan'    => $this->m_payroll->get("karyawan")->result(),
        );
        $this->template->load('template/template', 'karyawan', $data);
    }

    public function edit($id)
    {
        $day = new Day();
        $data  = array(
            'url'         => $this->uri->segment(1),
            'data'    => $this->m_payroll->getData(['id' => $id], "karyawan")->row(),
            'job'       => $this->m_payroll->get("jobclass")->result(),
            'hari'         => $day->tanggal()
        );
        $this->template->load('template/template', 'editkaryawan', $data);
    }

    public function update()
    {
        $id   = $this->input->post('id');
        $data   = array(
            'nama'           => $this->input->post('nama'),
            'tgl_lahir'      => $this->input->post('tanggal'),
            'jobclass'       => $this->input->post('jobclass'),
            'email'          => $this->input->post('email'),
            'npwp'           => $this->input->post('npwp'),
        );
        try {
            $this->m_payroll->update("karyawan", $data, ['id' => $id]);
            echo "sukses";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $p = $this->m_payroll->delete(['id_user' => $id], "karyawan");
        if ($p) {
            $this->m_payroll->delete(['id_user' => $id], "tbl_gaji_karyawan");
            $this->m_payroll->delete(['iduser' => $id], "histori_gajian");
            $this->session->set_flashdata('ok', 'data karyawan terhapus');
            redirect('Karyawan');
        }
    }
}
