<?php
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
