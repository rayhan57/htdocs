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
        <li>Penuli: $this->penulis</li>
        <li>Penerbit: $this->penerbit</li>
        <li>Harga: $this->harga</li>
        </ul>";
    }
}

$produk1 = new Produk("Muslim Hebat", "Amir Sahidin", "Pascal Books", 80000);
$produk2 = new Produk("Mobile Legend", "Moba", "Moonton", 20000);
$produk3 = new Produk("Batman");

echo "Buku: " . $produk1->getContent();
echo "<br>";
echo "Game: " . $produk2->getContent();
echo "<br>";
echo "Film: " . $produk3->getContent();
