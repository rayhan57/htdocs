<?php
require 'koneksi.php';

$sql = query("SELECT * FROM karyawan, jabatan WHERE karyawan.id_jabatan = jabatan.id_jabatan");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <title>Data Pegawai</title>
  </head>
  <body>
      <h1 class="text-center fs-3 mt-4">Data Pegawai</h1>
    <div class="container mt-5">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIK</th>
            <th scope="col">Nama</th>
            <th scope="col">Nama Jabatan</th>
            <th scope="col">Gaji</th>
            <th scope="col">Tunjangan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

        <?php $no = 1 ?>
          <?php foreach ($sql as $row): ?>
          <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $row['nik']?></td>
            <td><?= $row['nama']?></td>
            <td><?= $row['nama_jabatan']?></td>
            <td><?= $row['gaji']?></td>
            <td><?= $row['tunjangan']?></td>
            <td><a href="ubah.php"><button class="btn btn-warning">Ubah</button></a> <a href="hapus.php"><button class="btn btn-danger">Hapus</button></a></td>
          </tr>
          <?php $no++ ?>
          <?php endforeach; ?>
        
        </tbody>
      </table>
      <a href="tambah.php"><button class="btn btn-primary">Tambah</button></a>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
