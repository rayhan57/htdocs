<?php

use CetakInfoProduk as GlobalCetakInfoProduk;

interface infoProduk {
    public function getInfo();
}

abstract class Produk {
    protected $judul, //$this
        $penulis, //$this
        $harga, //$this
        $penerbit, //$this
        $diskon = 0; //$this

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul($judul) {
        $this->judul = $judul;
    }

    public function setPenulis($penulis) {
        $this->penulis = $penulis;
    }

    public function setPenerbit($penerbit) {
        $this->penerbit = $penerbit;
    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function getPenerbit() {
        return $this->penerbit;
    }

    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getContent() {
        return "$this->judul, $this->penulis";
    }

    abstract public function Info();
}


class Buku extends Produk implements infoProduk {
    public $halaman; //$this
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $halaman = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga, $halaman);
        $this->halaman = $halaman;
    }

    public function Info() {
        $string = "{$this->getContent()} {$this->penerbit} (Rp. {$this->harga})";
        return $string;
    }

    public function getInfo() {
        $string = "Buku: " . $this->Info() . " - {$this->halaman} Halaman";
        return $string;
    }
}

class Game extends Produk implements infoProduk {
    public $ukuran; //$this
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $ukuran = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga, $ukuran);
        $this->ukuran = $ukuran;
    }

    public function Info() {
        $string = "{$this->getContent()} {$this->penerbit} (Rp. {$this->harga})";
        return $string;
    }

    public function getInfo() {
        $string = "Game: " . $this->Info() . " - {$this->ukuran} GB";
        return $string;
    }
}

class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk(Produk $produk) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $string = "Daftar Produk : <br>";
        foreach ($this->daftarProduk as $p) {
            $string .= "- {$p->getInfo()} <br>";
        }
        return $string;
    }
}

$produk1 = new Buku("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000, 100);
$produk2 = new Game("Mobile Legend", "Moba", "Moonton", 20000, 7);

$cetakProduk = new GlobalCetakInfoProduk;
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
