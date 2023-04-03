<?php
// Tanggal
// echo date("l, d M Y")

// Waktu yg akan datang
// echo date("l, d M Y", time()-60*60*24*100)

// jam,menit,detik,bulan,tanggal,tahun
// echo date("l", mktime(0,0,0,6,14,2001))

// strtotime
echo date("l", strtotime("14 jun 2001"))
?>