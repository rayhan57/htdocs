<?php

class Produk
{
    public $judul, //$this
        $penulis, //$this
        $penerbit, //$this
        $harga; //$this

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getContent()
    {
        return "<ul>
        <li>Judul: $this->judul</li>
        <li>Penulis: $this->penulis</li>
        </ul>";
    }
}

class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $string = "{$produk->judul} {$produk->getContent()} (Rp. {$produk->harga})";
        return $string;
    }
}

$produk1 = new Produk("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000);
$produk2 = new Produk("Mobile Legend", "Moba", "Moonton", 20000);

echo "Buku: " . $produk1->getContent();
echo "<br>";
echo "Game: " . $produk2->getContent();
echo "<br>";

$infoProduk = new CetakInfoProduk();
echo $infoProduk->cetak($produk1);
