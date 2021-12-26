<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TestTime extends Controller
{
    public function index(){
        echo '<h3> Now, Yesterday, Today & Tomorrow</h3>';
        echo 'Waktu saat ini : '. Carbon::now();
        echo '<hr>';
        echo 'Kemarin : '.Carbon::yesterday();
        echo '<hr>';
        echo 'Hari ini : '.Carbon::today();
        echo '<hr>';
        echo 'Besok : '.Carbon::tomorrow();
        echo '<hr>';
        echo '<br>';

        echo '<h3> Timezone</h3>';
        echo 'Timezone Eropa : '.Carbon::now('Europe/London');
        echo '<hr>';
        echo 'Carbon Create from format : '.Carbon::createFromFormat('Y-m-d H:i:s', now(),'Europe/London');
        echo '<hr>';
        echo 'Convert now to Timezone Dhaka : '.Carbon::now()->tz('Asia/Dhaka');
        echo '<hr>';
        echo '<br>';
        
        echo '<h3> Get Properties </h3>';
        $time = now();
        echo "Waktu saat ini : ".$time;
        echo '<hr>';
        echo "Menit saat ini : ".$time->minute;
        echo '<hr>';
        echo "Detik saat ini : ".$time->second;
        echo '<hr>';
        echo "Bulan saat ini (angka): ".$time->month;
        echo '<hr>';
        echo "Bulan saat ini (huruf): ".$time->monthName;
        echo '<hr>';
        echo "Hari ke-n dalam minggu ini (angka) : ".$time->dayOfWeek;
        echo '<hr>';
        echo "Hari ke-n dalam minggu ini (huruf) : ".$time->shortLocaleDayOfWeek;
        echo '<hr>';
        echo "Minggu ke-n dalam bulan ini : ".$time->weekNumberInMonth;
        echo '<hr>';
        echo "Minggu ke-n dalam tahun ini : ".$time->weekOfYear;
        echo '<hr>';
        echo '<br>';
        
        echo '<h3> Time Modifiers </h3>';
        echo '<p> Perlu diingat!! , ini adalah method , jadi ini merubah nilai variable aslinya ,  Untuk mengatasi itu , buat $time->copy()->*modifiers*';
        echo '<p>';
        $time = now();
        echo "Waktu saat ini : ".$time;
        echo '<hr>';
        echo "Mengambil nilai jam nya saja : ".$time->copy()->startOfHour();
        echo '<hr>';
        echo "Mengambil waktu akhir bulan : ".$time->copy()->endOfMonth();
        echo '<hr>';
        echo "Menambahkan 1 Minggu kedepan : ".$time->copy()->next();
        echo '<hr>';
        echo "Hari Senin depan : ".$time->copy()->next('Monday');
        echo '<hr>';
        echo "Menambahkan 1 Hari kedepan : ".$time->copy()->nextWeekDay();
        echo '<hr>';
        echo "Hari Sabtu ke 2 pada bulan ini : ".$time->copy()->nthOfMonth(2,Carbon::SATURDAY);
        echo '<hr>';
        echo '<br>';

        $start = now();
        $end = now()->endOfMonth();
        echo "Tanggal tengah (average) , antara hari ini dan akhir bulan ini : ".$start->average($end);
        echo '<hr>';
        echo '<br>';


        echo '<h3> Add() and Sub() </h3>';
        echo '<p> ini juga modifiers (method) , buat $time->copy()->*modifiers*';
        echo '<p>';
        $time = now();
        echo "Waktu saat ini : ".$time;
        echo '<hr>';
        echo "Add(tambah) 1 bulan : ".$time->copy()->addMonth();
        echo '<hr>';
        echo "Add(tambah) 10 bulan : ".$time->copy()->addMonths(10);
        echo '<hr>';
        echo "Sub(kurangi) 1 tahun : ".$time->copy()->subYear();
        echo '<hr>';
        echo "Sub(kurangi) 5 tahun : ".$time->copy()->subYears(5);
        echo '<hr>';
        echo "Add(tambah) 1 jam : ".$time->copy()->addHour();
        echo '<hr>';
        echo "Add(tambah) 6 jam : ".$time->copy()->addHours(6);
        echo '<hr>';
        echo "Sub(kurangi) 1 minggu (7 hari) : ".$time->copy()->subWeek();
        echo '<hr>';
        echo "Sub(kurangi) 3 minggu (21 hari) : ".$time->copy()->subWeeks(3);
        echo '<hr>';
        echo "Sub(kurangi) 4 hari , tapi lewati sabtu dan minggu : ".$time->copy()->subWeekDays(4);
        echo '<hr>'; 
      echo '<br>';

        echo '<h3> Times Differences </h3>';
        echo "Waktu saat ini : ".now();
        echo '<hr>';
        echo 'Perbedaan Jam sekarang dan 3 hari yang lalu : '.now()->diffInHours(now()->subDays(3));
        echo '<hr>';
        echo 'Perbedaan Hari sekarang dan 2 bulan yang lalu : '.now()->diffInDays(now()->subMonths(2));
        echo '<hr>';
        echo 'Perbedaan Hari sekarang (selain Sabtu dan minggu) dan 2 bulan yang lalu : '.now()->diffInWeekDays(now()->subMonths(2));
        echo '<hr>';
        echo 'Perbedaan waktu sekarang dengan 2 bulan 10 hari yang lalu : '.now()->diffForHumans(now()->subMonths(2)->subDays(10));
        echo '<hr>';
        echo 'Perbedaan waktu sekarang dan 3 hari yang akan datang : '.now()->diffForHumans(now()->addDays(3));
        echo '<hr>'; 
        echo '<br>';

        echo '<h3> Set Test Now </h3>';
        echo "Waktu saat ini (Sebelum set test) : ".now();
        echo '<hr>'; 
        Carbon::setTestNow(now()->subDays(4)); // Membuat test day now
        echo "Waktu saat ini (setelah set test 4 hari yang lalu) : ".now();
        echo '<hr>'; 
        echo "tambahkan 1 menit : ".now()->addMinute();
        echo '<hr>'; 
        echo '<br>';

        echo '<h3> Comparison </h3>';
        $hariIni = now();
        $deadline = now()->subDays(3); 
        echo "Waktu saat ini : ".$hariIni;
        echo '<hr>'; 
        echo "Deadline :".$deadline;
        echo '<hr>'; 
        echo ($hariIni->greaterThan($deadline)) ? 'Sudah lewat deadline' : 'Belum lewat deadline';
        echo '<hr>'; 
        echo ($hariIni->lessThanOrEqualTo($deadline)) ? 'Masih belum deadline' : 'Sudah melewati batas waktu';
        echo '<hr>'; 
        echo '<br>';

        echo '<h3> isXXXX </h3>';
        echo "Apakah hari ini Rabu? : ".(now()->isWednesday())?'Ya hari ini Rabu' : 'Bukan hari ini bukan Rabu';
        echo '<hr>'; 
        echo "Apakah hari ini Weekend? : ".(now()->isWeekend())?'Ya hari ini Weekend' : 'Bukan hari ini bukan Weekend';
        echo '<hr>'; 
        $born = Carbon::createFromFormat('Y-m-d','2002-03-04');
        echo "Apakah hari ini Ulang tahun? : ".($born->isBirthday())?'Happy Birthday' : 'not your birthday';
        echo '<hr>'; 
        $time = Carbon::createFromFormat('Y-m-d','2020-11-04');
        echo "Apakah hari ini Masa depan? : ".($time->isFuture())?'This is Future' : 'This is Past';
        echo '<hr>'; 
        echo '<br>';
        
        echo '<h3> ROUNDING </h3>';
        echo "Waktu saat ini : ".now();
        echo '<hr>'; 
        echo "Pembulatan waktu saat ini : ".now()->roundMinute();
        echo '<hr>'; 
        echo "Pembulatan waktu (kebawah) saat ini : ".now()->floorMinute();
        echo '<hr>'; 
        echo "Pembulatan waktu (keatas) saat ini : ".now()->ceilMinute();
        echo '<hr>'; 
        echo "Pembulatan jam saat ini : ".now()->roundHour();
        echo '<hr>'; 
        echo "Pembulatan tahun saat ini : ".now()->roundYear();
        echo '<hr>'; 
        echo '<br>';

    }
}
