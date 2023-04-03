<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
require 'koneksi.php';

$no = $_GET["no"];

if(hapus($no)>0){
    echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal dihapus');
        document.location.href = 'index.php';
        </script>";
    }
?>