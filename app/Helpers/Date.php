<?php
namespace App\Helpers;


use Alkoumi\LaravelHijriDate\Hijri;
use Carbon\Carbon;

class Date {
    public static function tglIndo($tanggal)
    {
        $bulan = array (
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );
        $pecahkan = explode(' ', $tanggal);
        $pecahkan = explode('-', $pecahkan[0]);

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] - 1 ] . ' ' . $pecahkan[0];
    }

    public static function tglMasehi($tanggal)
    {
        $bulan = array (
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode(' ', $tanggal);
        $pecahkan = explode('-', $pecahkan[0]);

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] - 1 ] . ' ' . $pecahkan[0];
    }

    public static function tglHijriyah($tanggal)
    {
        $bulan = array (
            'Muharam',
            'Safar',
            'Rabiul Awal',
            'Rabiul Akhir',
            'Jumadil Awal',
            'Jumadil Akhir',
            'Rajab',
            'Syakban',
            'Ramadhan',
            'Syawal',
            'Zulkaidah',
            'Zulhijah'
        );
        $date = Carbon::parse($tanggal);
        $tglHijri = Hijri::ShortDate($date);;
        $pecahkan = explode('/', $tglHijri);

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] - 1 ] . ' ' . $pecahkan[0];
    }

    public static function bulanRomawi($tanggal)
    {
        $bulanRomawi = array (
            'I',
            'II',
            'III',
            'IV',
            'V',
            'VI',
            'VII',
            'VIII',
            'IX',
            'X',
            'XI',
            'XII'
        );
        $pecahkan = explode('-', $tanggal);

        return $bulanRomawi[ (int)$pecahkan[1] - 1 ];
    }

    public static function tglReverse($tanggal)
    {
        $pecahkan = explode(' ', $tanggal);
        $pecahkan = explode('-', $pecahkan[0]);

        if (count($pecahkan) == 1) return "";

        return $pecahkan[2] . '/' . $pecahkan[1] . '/' . $pecahkan[0];
    }

    public static function hariIni($tanggal){

        $tanggal = strtotime($tanggal);
        $tanggal = date('D', $tanggal);

        switch($tanggal){
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;

    }
}
