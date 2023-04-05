<?php
//  File yg mau di baca
$file = "data.json";
//  Mendapatkan file json
$ambil = file_get_contents($file);
//  Decode data.json
$data = json_decode($ambil, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUD JSON</title>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="https://kit.fontawesome.com/de0d5c5a2a.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <h3 class="text-center mt-3">Data Peminjam Mobil</h3>
    <div class="row mt-3">
      <div class="col-md">
        <a class="btn btn-primary" href="tambah.php"><i class="fa-solid fa-plus"></i> Tambah</a>
        <form method="post">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Merk Mobil</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Lama Peminjaman</th>
                <th scope="col">Harga</th>
                <th scope="col">Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
              <?php foreach ($data as $row) : ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['merk'] ?></td>
                  <td><?= $row['alamat'] ?></td>
                  <td><?= $row["tglpinjam"] ?></td>
                  <td><?= $row["tglkembali"] ?></td>
                  <td><?= $row['lamapinjam'], " Hari" ?></td>
                  <td><?= "Rp " . number_format($row['harga'], 0, ', ', '.') ?></td>
                  <td><a class="btn btn-danger" href="hapus.php?nama=<?= $row['nama'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a> <a class="btn btn-warning" href="ubah.php?nama=<?= $row['nama'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

</html>