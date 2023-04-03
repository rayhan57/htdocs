<?php
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
