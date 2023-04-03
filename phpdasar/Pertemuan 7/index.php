<?php
require 'koneksi.php';
$mhs = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Mahasiswa</title>
    </head>
    <body>
        <h1>Daftar Mahasiswa</h1>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>

            <?php foreach ($mhs as $row): ?>
                <tr>
                    <td><?= $row["no"] ?></td>
                    <td>
                        <a href="">Ubah</a> |
                        <a href="">Hapus</a>
                    </td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["alamat"] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </body>
</html>
