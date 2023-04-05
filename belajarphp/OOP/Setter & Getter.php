<?php
class Produk {
    private $judul, //$this
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

    public function convertToCurrency($harga) {
        return "Rp" . number_format($harga, 0, ".", ".");
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

$produk1 = new Buku("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000, 100);
$produk2 = new Game("Mobile Legend", "Moba", "Moonton", 20000, 7);

echo $produk1->getInfo();
echo "<br>";
echo $produk2->getInfo();
echo "<hr>";

$produk1->setDiskon(20);
echo $produk1->getHarga();
echo "<hr>";

$produk2->setJudul("Valorant");
$produk2->setDiskon(40);
echo $produk2->getJudul();
echo "<br>";
echo $produk2->convertToCurrency($produk2->getHarga());
