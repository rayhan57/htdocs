<?php
class Produk {
    public $judul, //$this
        $penulis, //$this
        $penerbit, //$this
        $harga; //$this

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getContent() {
        return "$this->judul, $this->penulis";
    }

    public function getInfo() {
        $string = "{$this->getContent()} {$this->penerbit} (Rp. {$this->harga})";
        return $string;
    }
}


class Buku extends Produk {
    public $halaman; //$this
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $halaman = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga, $halaman);
        $this->halaman = $halaman;
    }

    public function getInfo() {
        $string = "Buku: " . parent::getInfo() . " - {$this->halaman} Halaman";
        return $string;
    }
}

class Game extends Produk {
    public $ukuran; //$this
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $ukuran = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga, $ukuran);
        $this->ukuran = $ukuran;
    }

    public function getInfo() {
        $string = "Game: " . parent::getInfo() . " - {$this->ukuran} GB";
        return $string;
    }
}


class CetakInfoProduk {
    public function cetak(Produk $produk) {
        $string = "{$produk->getContent()} | {$produk->penerbit} (Rp. {$produk->harga})";
        return $string;
    }
}

$produk1 = new Buku("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000, 100);
$produk2 = new Game("Mobile Legend", "Moba", "Moonton", 20000, 7);

echo $produk1->getInfo();
echo "<br>";
echo $produk2->getInfo();
echo "<br><hr>";

$infoProduk = new CetakInfoProduk;
echo $infoProduk->cetak($produk1);
