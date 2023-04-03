<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
require 'koneksi.php';

$no = $_GET["no"];

$mhs = query("SELECT * FROM mahasiswa WHERE no = $no")[0];

// Jika tombol ubah di klik
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diubah');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Ubah Data</title>
</head>

<body>
    <div class="container pt-3">
        <h2 class="text-center">Ubah Data</h2>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5 shadow-lg rounded-3 p-3">
                <form method="POST">
                    <input type="hidden" name="no" value="<?= $mhs["no"] ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs["nama"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $mhs["email"] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mhs["alamat"] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>