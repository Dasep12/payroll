<?php

class CreateSlip extends CI_Controller
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
        $this->template->load('template/template', 'create_slip', $data);
    }

    public function create()
    {
        $this->load->library('pdf');

        //ambil tanggal gajian
        $dateGajian  = $this->input->post('tgl');

        //ambil data gajian karyawan
        $gajian  = $this->m_payroll->getData(['tanggal' => $dateGajian], "histori_gajian");
        $cariData = $gajian->num_rows();
        if ($cariData <= 0) {
            $this->session->set_flashdata('info', 'tidak ada data');
            redirect('CreateSlip');
        } else {


            foreach ($gajian->result() as $p) {
                //load data library fpdf 
                $pdf =  new FPDF_Protection('P', 'mm', array(90, 150));

                // membuat halaman baru
                $pdf->AddPage();
                //
                $space = "-------------------------------------------------------------------------------------";
                // setting jenis font yang akan digunakan
                $pdf->SetFont('Arial', 'B', 8);
                // mencetak string 
                $pdf->Image('./assets/images/index.jpg', 7, 8, 30, 'D');
                $pdf->Cell(75, 8, 'SLIP GAJI ' . $this->bulan() . date(' Y'), 0, 1, 'C');

                // Memberikan space kebawah agar tidak terlalu rapat
                $pdf->Cell(10, 2, '', 0, 1);


                $pdf->SetFont('Arial', '', 7);

                $pdf->Cell(190, 2, $space, 0, 1, 'D');

                //data diri karyawan
                $pdf->Cell(30, 4, "NAMA", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, $p->nama, 0, 1, 'D');

                $pdf->Cell(30, 4, "NIK", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, $p->nik, 0, 1, 'D');


                $pdf->Cell(30, 4, "NPWP", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, $p->npwp, 0, 1, 'D');

                $pdf->Cell(30, 4, "JOBCLASS", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, $p->jobclass, 0, 1, 'D');

                // $pdf->Cell(30, 4, "CABANG", 0, 0, 'D');
                // $pdf->Cell(10, 4, ":", 0, 0, 'A');
                // $pdf->Cell(40, 4, "JAKARTA", 0, 1, 'D');

                $pdf->Cell(190, 4, $space, 0, 1, 'D');

                //pendapatan karyawan
                $pdf->Cell(30, 7, "PENDAPATAN", 0, 1, 'D');
                $pdf->Cell(30, 4, "GAJI POKOK", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->gajipokok, 0), 0, 1, 'D');

                $pdf->Cell(30, 4, "TUNJANGAN 1", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->tunjangan1, 0), 0, 1, 'D');


                $pdf->Cell(30, 4, "TUNJANGAN 2", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->tunjangan2, 0), 0, 1, 'D');

                $pdf->Cell(30, 4, "TUNJANGAN 3", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->tunjangan3, 0), 0, 1, 'D');

                $pdf->Cell(30, 4, "LEMBUR", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->lembur, 0), 0, 1, 'D');

                $pdf->Cell(190, 4, $space, 0, 1, 'D');
                //total pendapatan
                $totalPendapatan  = $p->gajipokok + $p->tunjangan1 + $p->tunjangan2 + $p->tunjangan3 +  $p->lembur;
                $pdf->Cell(30, 4, "TOTAL", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($totalPendapatan, 0), 0, 1, 'D');




                //potongan pendapatan karyawan
                $pdf->Cell(30, 7, "POTONGAN", 0, 1, 'D');
                $pdf->Cell(30, 4, "BPJS TENAGAKERJA", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->bpjs_tenagakerja, 0), 0, 1, 'D');

                $pdf->Cell(30, 4, "BPJS KESEHATAN", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($p->bpjs_kesehatan, 0), 0, 1, 'D');

                $pdf->Cell(190, 4, $space, 0, 1, 'D');


                //total potonhgan
                $pot    = $p->bpjs_tengakerja + $p->bpjs_kesehatan;
                $pdf->Cell(30, 4, "TOTAL POTONGAN", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($pot, 0), 0, 1, 'D');

                //gaji diterima
                $diterima  = $totalPendapatan -  $pot;
                $pdf->Cell(30, 4, "GAJI DITERIMA", 0, 0, 'D');
                $pdf->Cell(10, 4, ":", 0, 0, 'A');
                $pdf->Cell(40, 4, number_format($diterima, 0), 0, 1, 'D');

                $pdf->Cell(90, 4, $space, 0, 1, 'D');
                $pdf->Cell(90, 14, "RAHASIA , jika tidak terpakai harap di musnahkan");

                //ambil data diri karyawan
                $tglLahir  = $this->m_payroll->getData(['id_user' => $p->iduser], "karyawan")->row();

                // setting password pdf slip gaji karyawan berdasarkan tanggal lahir , bulan lahir , tahun lahir 
                //  ditambah 3 nik terakhir karyawan
                // FORMAT : ddmmyyxxx 
                $pnik = substr($tglLahir->id_user, -3);
                $tgl    = explode("-", $tglLahir->tgl_lahir);
                $passwordPDF = $tgl[2] . $tgl[1] . substr($tgl[0], -2) . $pnik;
                $pdf->SetProtection(array('print'), $passwordPDF);
                //$pdf->Output();
                //save
                $pdf->Output('./assets/slip/Slip_' . $this->bulan() . "_" . $p->nik . '.pdf', 'F');
            }

            $this->session->set_flashdata('ok', 'slip gaji telah tersimpan');
            redirect('CreateSlip');
        }
    }

    public function bulan()
    {
        $m  = date('m');
        switch ($m) {
            case '01':
                $bln =  'JANUARI';
                break;
            case '02':
                $bln = 'FEBRUARI';
                break;
            case '03':
                $bln = 'MARET';
                break;
            case '04':
                $bln = 'APRIL';
                break;
            case '05':
                $bln = 'MEI';
                break;
            case '06':
                $bln = 'JUNI';
                break;
            case '07':
                $bln = 'JULI';
                break;
            case '08':
                $bln =  'AGUSTUS';
                break;
            case '09':
                $bln = 'SEPTEMBER';
                break;
            case '10':
                $bln = 'OKTOBER';
                break;
            case '11':
                $bln = 'NOVEMBER';
                break;
            case '12':
                $bln = 'DESEMBER';
                break;
            default:
                $bln = "";
                break;
        }
        return $bln;
    }
}
