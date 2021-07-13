<?php


class Tabel_gaji extends CI_Controller
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
            'hari'         => $day->tanggal(),
            'url'         => $this->uri->segment(1),
            'karyawan'    => $this->m_payroll->get("tbl_gaji_karyawan")->result(),
        );
        $this->template->load('template/template', 'tabel_gaji', $data);
    }

    public function edit($id)
    {
        $day = new Day();
        $data  = array(
            'hari'         => $day->tanggal(),
            'url'         => $this->uri->segment(1),
            'data'    => $this->m_payroll->getData(['id' => $id], "tbl_gaji_karyawan")->row(),

        );
        $this->template->load('template/template', 'edit_gaji', $data);
    }

    public function update()
    {
        $id   = $this->input->post('id');
        $nama        = $this->input->post('nama');
        $nik         = $this->input->post('nik');
        $iduser      = $this->input->post('iduser');
        $jobclass    = $this->input->post('jobclass');
        $gaji_pokok  = $this->input->post('gaji_pokok');
        $tunjangan1  = $this->input->post('tunjangan1');
        $tunjangan2  = $this->input->post('tunjangan2');
        $tunjangan3  = $this->input->post('tunjangan3');

        $data = array(
            'nama'              => $nama,
            'nik'               => $nik,
            'gaji_pokok'        => $gaji_pokok,
            'tunjangan1'        => $tunjangan1,
            'tunjangan2'        => $tunjangan2,
            'tunjangan3'        => $tunjangan3,
        );

        try {
            $this->m_payroll->update("tbl_gaji_karyawan", $data, ['id' => $id]);
            echo "sukses";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->m_payroll->delete(['id' => $id], "tbl_gaji_karyawan");
            $this->session->set_flashdata('ok', 'Data terhapus');
            redirect('Tabel_gaji');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
