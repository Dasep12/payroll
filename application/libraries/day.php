<?php
date_default_timezone_set('Asia/Jakarta');


class Day
{
    public function tanggal()
    {
        $d = date('D');
        $m = date('m');
        switch ($m) {
            case '01':
                $m =  'Januari';
                break;
            case '02':
                $m = 'Februari';
                break;
            case '03':
                $m = 'Maret';
                break;
            case '04':
                $m = 'April';
                break;
            case '05':
                $m = 'Mei';
                break;
            case '06':
                $m = 'Juni';
                break;
            case '07':
                $m = 'Juli';
                break;
            case '08':
                $m =  'Agustus';
                break;
            case '09':
                $m = 'September';
                break;
            case '10':
                $m = 'Oktober';
                break;
            case '11':
                $m = 'November';
                break;
            case '12':
                $m = 'Desember';
                break;
            default:
                $m = "";
                break;
        }
        switch ($d) {
            case 'Mon':
                $d = "Senin";
                break;
            case 'Tue':
                $d = "Selasa";
                break;
            case 'Wed':
                $d = "Rabu";
                break;
            case 'Thu':
                $d = "Kamis";
                break;
            case 'Fri':
                $d = "Jumat";
                break;
            case 'Sat':
                $d = "Sabtu";
                break;
            case 'Sun':
                $d = "Minggu";
                break;
        }

        $bulan = $d . "" . date(', d ') . $m . date(' Y');
        return $bulan;
    }
}
