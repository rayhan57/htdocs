<?php
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
