<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
require 'koneksi.php';
$jumlahDataPerhalaman = 1;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
if (isset($_GET["halaman"])) {
    $halamanAktif = $_GET["halaman"];
} else {
    $halamanAktif = 1;
}
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$mhs = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

if (isset($_POST["cari"])) {
    $mhs = cari($_POST["search"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/de0d5c5a2a.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="bg-info bg-gradient sidebar">
                <i class="fa-solid fa-xmark fs-1 mt-3 float-end close"></i>
                <div class="row text-light fs-1 mt-3 d-flex justify-content-center border-bottom pb-3 title">
                    MHS
                </div>
                <div class="row">
                    <ul class="mt-4 fs-4 p-0">
                        <li class="nav-item">
                            <a class="nav-link text-light p-2" href="index.php"><i class="fa-solid fa-house"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light p-2" href="#"><i class="fa-solid fa-link"></i>Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light p-2" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="col">
                <div class="container-fluid mt-3">
                    <i class="fa-solid fa-bars fs-3 text-dark bar"></i>
                    <div class="row">
                        <h1 class="fs-2 pt-2">Daftar Mahasiswa</h1>
                    </div>

                    <div class="row justify-content-between mt-3">
                        <div class="col-lg-2">
                            <a class="btn btn-primary" href="tambah.php">Tambah Data</a>
                        </div>
                        <div class="col-lg-2 mt-2">
                            <form method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari..." name="search">
                                    <button class="btn btn-success" type="submit" name="cari">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mhs as $row) : ?>
                                    <tr>
                                        <th scope="row"><?= $row["no"] ?></th>
                                        <td>
                                            <a class="btn btn-warning" href="ubah.php?no=<?= $row["no"] ?>">Ubah</a> <a class="btn btn-danger" href="hapus.php?no=<?= $row["no"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?');">Hapus</a>
                                        </td>
                                        <td><?= $row["nama"] ?></td>
                                        <td><?= $row["email"] ?></td>
                                        <td><?= $row["alamat"] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav class="d-flex justify-content-center">
                        <ul class="pagination">
                            <?php if ($halamanAktif > 1) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>">Previous</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ($i == $halamanAktif) : ?>
                                    <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                                <?php else : ?>
                                    <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(".bar, .close").click(function() {
            $(".sidebar").toggleClass("d-none");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>