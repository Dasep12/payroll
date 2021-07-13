<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Send_mail extends CI_Controller
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
        $handler = opendir("./assets/slip/");
        $file = readdir($handler);
        $day = new Day();
        $data = array(
            'url'   => $this->uri->segment(1),
            'slip'  => $file,
            'hari'         => $day->tanggal()
        );
        $this->template->load('template/template', 'sendmail', $data);
    }

    public function send()
    {


        require APPPATH . 'THIRD_PARTY/phpmailer/Exception.php';
        require APPPATH . 'THIRD_PARTY/phpmailer/PHPMailer.php';
        require APPPATH . 'THIRD_PARTY/phpmailer/SMTP.php';

        //ambil tanggal gajian
        $dateGajian  = $this->input->post('tgl');

        //ambil data gajian karyawan
        $gajian  = $this->m_payroll->getData(['tanggal' => $dateGajian], "histori_gajian");
        $cariData = $gajian->num_rows();

        //ambil data gajian karyawan 
        $dataGaji = $this->m_payroll->getData(['tanggal' => $dateGajian], "histori_gajian")->result();


        if ($cariData <= 0) {
            $this->session->set_flashdata('info', 'Data tidak ada');
            redirect("Send_mail");
        } else {


            foreach ($dataGaji as $gaji) {
                $mail = new PHPMailer();
                // PHPMailer object
                $response = false;
                $mail = new PHPMailer();


                // SMTP configuration
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
                $mail->SMTPAuth = true;
                $mail->Username = 'dasepdepiyawan19101051@gmail.com'; // user email
                $mail->Password = 'swadharma'; // password email
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;

                $mail->setFrom('dasepdepiyawan19101051@gmail.com', 'PT Anti Rugi'); // user email
                $mail->addReplyTo('dasepdepiyawan19101051@gmail.com', ''); //user email

                // Add a recipient
                $mail->addAddress($gaji->email); //email tujuan pengiriman email

                // Email subject
                $mail->Subject = 'Payroll'; //subject email

                // Set email format to HTML
                $mail->isHTML(true);

                // Email body content
                $link  = base_url('assets/slip/Slip_' . $this->bulan() . '_' . $gaji->nik .  '.pdf?slipid=' . md5($gaji->noref),);
                $pesan = "<b>Kpd Sdr. " . $gaji->nama . "</b><br>
       Bersama ini kami sampaikan e-Slip Gaji Saudara untuk bulan " . $this->bulan() . " 2021. Klik link yang di berikan dan masukkan password e-Slip yaitu ddmmyyxxx (contoh: 010582087) dengan penjelasan sebagai berikut:<br>
        <table>
        <table>
        <tr>
            <th></th>
            <th></th>
        </tr>
        <tbody>
            <tr>
                <td>dd</td>
                <td style='width: 2px;'>:</td>
                <td> Dua digit tanggal lahir, </td>
                <td> contoh </td>
                <td> :</td>
                <td>tanggal 1, ditulis 01</td>
            </tr>
            <tr>
                <td>mm</td>
                <td style='width: 2px;'>:</td>
                <td> Dua digit bulan lahir dalam angka, , </td>
                <td> contoh </td>
                <td> :</td>
                <td>Mei, ditulis 05.</td>
            </tr>
            <tr>
                <td>yy</td>
                <td style='width: 2px;'>:</td>
                <td> Dua digit tahun lahir, , </td>
                <td> contoh </td>
                <td> :</td>
                <td>1982, ditulis 82.</td>
            </tr>
            <tr>
                <td>dd</td>
                <td style='width: 2px;'>:</td>
                <td>3 digit terakhir Nomor Induk Karyawan (NIK), </td>
                <td> contoh </td>
                <td> :</td>
                <td>2015045465, ditulis 465</td>
            </tr>
        </tbody>
    </table>
        </table>
        <p>Demikian kami sampaikan. Terima kasih atas partisipasi Saudara dalam mendukung program PT AntiRugi Go Green melalui e-Slip.</p>

        <p>Think twice before you print : Save our Environment, Save our Generation</p>
        
        <p>Salam Sukses</p>,
        
        <br>
        <p>
        HR-Compensation
        PT. Anti Rugi
        </p>
        <h1><a href='" . $link . "'>Kunjungi Link</a> </h1>";
                $mail->Body = $pesan;

                // Send email
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo "Message has been sent<br>";
                }
            }
            $this->session->set_flashdata('ok', 'Email terkirim');
            redirect("Send_mail");
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
