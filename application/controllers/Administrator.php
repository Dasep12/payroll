<?php


class Administrator extends CI_Controller
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
            'admin'         => $this->m_payroll->get("akun")->result()
        );
        $this->template->load('template/template', 'administrator', $data);
    }

    public function input()
    {
        $email       = $this->input->post('email');
        $data   = array(
            'name'           => $this->input->post('nama'),
            'password'       => $this->input->post('password'),
            'email'          => $this->input->post('email'),
        );

        $cekid  = $this->m_payroll->getData(['email' => $email], "akun")->num_rows();

        if ($cekid > 0) {
            echo "user sudah ada";
        } else {
            try {
                $this->m_payroll->input($data, "akun");
                echo "sukses";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function edit($id)
    {
        $day = new Day();
        $data  = array(
            'url'         => $this->uri->segment(1),
            'data'        => $this->m_payroll->getData(['id' => $id], "akun")->row(),
            'hari'        => $day->tanggal()
        );
        $this->template->load('template/template', 'editadmin', $data);
    }

    public function update()
    {
        $id   = $this->input->post('id');
        if ($this->input->post('password2') == null || $this->input->post('password2') == "") {
            $data   = array(
                'name'           => $this->input->post('nama2'),
                'email'           => $this->input->post('email2'),
            );
        } else {
            $data   = array(
                'name'           => $this->input->post('nama2'),
                'password'       => $this->input->post('password2'),
                'email'           => $this->input->post('email2'),
            );
        }

        try {
            $this->m_payroll->update("akun", $data, ['id' => $id]);
            echo "sukses";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        $p = $this->m_payroll->delete(['id' => $id], "akun");
        if ($p) {
            $this->session->set_flashdata('ok', 'data admin terhapus');
            redirect('Administrator');
        }
    }
}
