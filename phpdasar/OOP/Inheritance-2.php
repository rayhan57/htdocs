<?php


class Produk
{
    public $judul, //$this
        $penulis, //$this
        $penerbit, //$this
        $harga, //$this
        $halaman, //$this
        $ukuran; //$this

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $halaman = 0, $ukuran = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->halaman = $halaman;
        $this->ukuran = $ukuran;
    }

    public function getContent()
    {
        return "$this->judul, $this->penulis";
    }

    public function getInfo()
    {
        $string = "{$this->getContent()} {$this->penerbit} (Rp. {$this->harga})";
        return $string;
    }
}


class Buku extends Produk
{
    public function getInfo()
    {
        $string = "Buku: {$this->getContent()} {$this->penerbit} (Rp. {$this->harga}) - {$this->halaman} Halaman";
        return $string;
    }
}

class Game extends Produk
{
    public function getInfo()
    {
        $string = "Game: {$this->getContent()} {$this->penerbit} (Rp. {$this->harga}) - {$this->ukuran} GB";
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

$produk1 = new Buku("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000, 100, 0);
$produk2 = new Game("Mobile Legend", "Moba", "Moonton", 20000, 0, 7);

echo $produk1->getInfo();
echo "<br>";
echo $produk2->getInfo();
echo "<br><hr>";

$infoProduk = new CetakInfoProduk;
echo $infoProduk->cetak($produk1);
