<?php

class Produk
{
    public $judul =  "Judul",
        $penulis = "Penulis",
        $penerbit = "Penerbit",
        $harga = 0;

    public function getContent()
    {
        return "<ul>
        <li>Judul: $this->judul</li>
        <li>Penuli: $this->penulis</li>
        <li>Penerbit: $this->penerbit</li>
        <li>Harga: $this->harga</li>
        </ul>";
    }
}

$produk1 = new Produk();
$produk1->judul = "Muslim Hebat";
$produk1->penulis = "Amir Sahidin";
$produk1->penerbit = "Pascal Books";
$produk1->harga = 80000;

$produk2 = new Produk();
$produk2->judul = "Mobile Legend";
$produk2->penulis = "Moba";
$produk2->penerbit = "Moonton";
$produk2->harga = 20000;

echo "Buku: " . $produk1->getContent();
echo "<br>";
echo "Game: " . $produk2->getContent();
