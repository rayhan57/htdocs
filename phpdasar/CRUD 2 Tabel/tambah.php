<?php
require 'koneksi.php';
$jabatan = query("SELECT * FROM jabatan");

if(isset($_POST["submit"])){
  if(tambah($_POST) > 0){
    echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
  } else{
    echo "<script>
        alert('Data gagal ditambahkan');
        document.location.href = 'index.php';
        </script>";
  }
}
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

    <title>Rental Mobil</title>
  </head>
  <style>
    .container {
      width: 500px;
    }
  </style>
  <body>
    <h1 class="text-center fs-3 mt-4">Tambah Data</h1>
    <div class="container mt-3">
      <form method="post">
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input
            type="text"
            class="form-control"
            id="nik"
            name="nik"
          />
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input
            type="text"
            class="form-control"
            id="nama"
            name="nama"
          />
        </div>

        <div class="mb-3">
          <label for="jabatan" class="form-label">Jabatan</label>
         <select class="form-select" aria-label="Default select example" id="jabatan" name="jabatan">
            <option selected>Pilih Jabatan</option>

            <?php foreach ($jabatan as $row): ?>
            <option value="<?= $row['id_jabatan'] ?>"><?= $row['nama_jabatan'] ?></option>
            <?php endforeach; ?>
            
          </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">
          Tambah
        </button>
      </form>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
