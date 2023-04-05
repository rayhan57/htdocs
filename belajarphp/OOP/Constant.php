<?php
date_default_timezone_set("Asia/Bangkok");
$jam = date("H");

if ($jam > 5 && $jam <= 10) {
    $salam = "Pagi";
} else if ($jam > 10 && $jam < 15) {
    $salam = "Siang";
} else  if ($jam >= 15 && $jam < 18) {
    $salam = "Sore";
} else {
    $salam = "Malam";
}
echo "<h2>Selamat $salam</h2><br>";



define("NAMA", "Rayhan");
echo NAMA . "<br>";

const TANGGAL = 10;
echo TANGGAL . "<hr>";

class Coba {
    const NAMA = "Rayhan";
}
echo Coba::NAMA;
echo "<hr>";

class Tes {
    public $kelas = __CLASS__;
}
$obj = new Tes;
echo $obj->kelas;
