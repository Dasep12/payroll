<?php


class Jobclass extends CI_Controller
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
            'hari'         => $day->tanggal(),
            'job'       => $this->m_payroll->get("jobclass")->result()
        );
        $this->template->load('template/template', 'jobclass', $data);
    }

    public function input()
    {
        $data = array(
            'idjobclass'    => $this->input->post('idjobclass'),
            'jobclass'    => $this->input->post('jobclass'),
        );

        $p =  $this->m_payroll->input($data, "jobclass");
        if ($p > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function update()
    {
        $data = array(
            'idjobclass'    => $this->input->post('idjobclass1'),
            'jobclass'      => $this->input->post('jobclass1'),
        );

        $p =  $this->m_payroll->update("jobclass", $data, ['id' => $this->input->post('id')]);
        if ($p > 0) {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

    public function delete($id)
    {
        $p = $this->m_payroll->delete(['id' => $id], "jobclass");
        if ($p) {
            $this->session->set_flashdata('ok', 'data terhapus');
            redirect('Jobclass/index');
        }
    }
}
