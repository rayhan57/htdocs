<?php

class Produk
{
    public $judul, //$this
        $penulis, //$this
        $penerbit, //$this
        $harga, //$this
        $halaman, //$this
        $ukuran, //$this
        $tipe; //$this

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $halaman = 0, $ukuran = 0, $tipe)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->halaman = $halaman;
        $this->ukuran = $ukuran;
        $this->tipe = $tipe;
    }

    public function getContent()
    {
        return "$this->judul, $this->penulis";
    }

    public function getInfo()
    {
        $string = "{$this->tipe}: {$this->getContent()} {$this->penerbit} (Rp. {$this->harga})";
        if ($this->tipe == "Buku") {
            $string .= " - {$this->halaman} Halaman";
        } else {
            $string .= " - {$this->ukuran} GB";
        }
        return $string;
    }
}

class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $string = "{$produk->getContent()} | {$produk->penerbit} (Rp. {$produk->harga})";
        return $string;
    }
}

$produk1 = new Produk("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000, 100, 0, "Buku");
$produk2 = new Produk("Mobile Legend", "Moba", "Moonton", 20000, 0, 7, "Game");

echo $produk1->getInfo();
echo "<br>";
echo $produk2->getInfo();
echo "<br><hr>";

$infoProduk = new CetakInfoProduk;
echo $infoProduk->cetak($produk1);
