<?php
date_default_timezone_set('Asia/Jakarta');

class Upload_gaji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $id = $this->session->userdata('id');
        if ($id == null || $id == "") {
            redirect('Login');
        }
    }


    private $filename = "uploadgaji";
    public function index()
    {
        $day = new Day();
        $data = array();
        if (isset($_POST['submit'])) {
            $upload = $this->m_payroll->uploadfile($this->filename);
            if ($upload['result'] == "success") {
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('assets/upload_gaji/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

                $data['sheet'] = $sheet;
            } else {
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                echo $upload['error'];
            }
        }
        $data['url']  =  $this->uri->segment(1);
        $data['hari']  = $day->tanggal();
        $this->template->load('template/template', 'upload_gaji', $data);
    }


    public function format()
    {

        // Load plugin  PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
        // Panggil class PHPExcel nya 
        $excel = new PHPExcel();
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1// Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B1', "ID KARYAWAN");
        $excel->setActiveSheetIndex(0)->setCellValue('C1', "NOREF");
        $excel->setActiveSheetIndex(0)->setCellValue('D1', "NAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('E1', "NIK");
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "NPWP");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "EMAIL");
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "JOBCLASS");
        $excel->setActiveSheetIndex(0)->setCellValue('I1', "GAJI POKOK");
        $excel->setActiveSheetIndex(0)->setCellValue('J1', "TUNJANGAN 1");
        $excel->setActiveSheetIndex(0)->setCellValue('K1', "TUNJANGAN 2");
        $excel->setActiveSheetIndex(0)->setCellValue('L1', "TUNJANGAN 3");
        $excel->setActiveSheetIndex(0)->setCellValue('M1', "BPJS KESEHATAN");
        $excel->setActiveSheetIndex(0)->setCellValue('N1', "BPJS KETENAGAKERJAAN");
        $excel->setActiveSheetIndex(0)->setCellValue('O1', "LEMBUR");
        $excel->setActiveSheetIndex(0)->setCellValue('P1', "TANGGAL");

        // Buat query untuk menampilkan semua data gaji karyawan
        $sql = $this->m_payroll->ambilRinciGaji()->result();
        // Eksekusi querynya
        $no = 1;
        // Untuk penomoran tabel, di awal set dengan 1 
        $numrow = 2;
        // Set baris pertama untuk isi tabel adalah baris ke 4 
        foreach ($sql as $data) {
            $noref =   date('dmy') . $data->nik . "PYRL";
            // Ambil semua data dari hasil eksekusi $sql  
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->id_user);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $noref);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->nik);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->npwp);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->email);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->jobclass);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->gaji_pokok);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->tunjangan1);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->tunjangan2);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->tunjangan3);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->bpjs_kesehatan);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->bpjs_tenagakerja);
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, 0);
            $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, date('Y-m-d'));
            $no++;
            // Tambah 1 setiap kali looping  
            $numrow++;
            // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(15); // Set width kolom B
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Format Upload.xlsx"');
        // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function post()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('assets/upload_gaji/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        $numrow = 1;
        $data = array();
        $cekNPK = array();
        foreach ($sheet as $row) {
            if ($numrow > 1) {
                //cek noref sudah terdaftar apa tidak
                $cekNPK = $this->m_payroll->getData(array('noref' => $row['C']), "histori_gajian")->num_rows();
                if ($cekNPK > 0) {
                    $this->session->set_flashdata("error",   $row['C'] . " Noref sudah digunakan");
                    redirect("Upload_gaji");
                } else {
                    // push data
                    array_push($data, array(
                        'noref'             => $row['C'],
                        'iduser'            => $row['B'],
                        'nama'              => $row['D'],
                        'nama'              => $row['D'],
                        'nik'               => $row['E'],
                        'npwp'              => $row['F'],
                        'email'             => $row['G'],
                        'jobclass'          => $row['H'],
                        'gajipokok'         => $row['I'],
                        'tunjangan1'        => $row['J'],
                        'tunjangan2'        => $row['K'],
                        'tunjangan3'        => $row['L'],
                        'bpjs_kesehatan'    => $row['M'],
                        'bpjs_tenagakerja'  => $row['N'],
                        'lembur'            => $row['O'],
                        'tanggal'           => $row['P'],
                    ));
                }
            }
            $numrow++; // Tambah 1
        }

        if ($cekNPK > 0) {
            echo "";
        } else {
            $input = $this->m_payroll->inputArray("histori_gajian", $data);
            if ($input) {
                $this->session->set_flashdata("success", "Data Gajian Terposting");
                redirect("Upload_gaji");
            } else {
                echo "Gagal";
            }
        }
    }
}
