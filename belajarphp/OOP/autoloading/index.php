<?php
require 'App/init.php';

$produk1 = new Buku("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000, 100);
$produk2 = new Game("Mobile Legend", "Moba", "Moonton", 20000, 7);

$cetakProduk = new CetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
