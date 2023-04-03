<?php
require 'koneksi.php';

if (isset($_POST["submit"])) {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $jenisKelamin = $_POST["jeniskelamin"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];

    $sql = "INSERT INTO tbl_pegawai VALUES ('$nip', '$nama', '$jenisKelamin', '$alamat', '$telp')";
    mysqli_query($conn, $sql);

    header("location: pegawai.php");
    return mysqli_affected_rows($conn);
}

$pegawai = tampilData("SELECT * FROM tbl_pegawai");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>No 3</title>
</head>
<style>
    li {
        display: inline-block;
    }
</style>

<body>
    <form method="post">
        <ul>
            <li>NIP</li>
            <li><input type="text" name="nip"></li>
        </ul>
        <ul>
            <li>Nama</li>
            <li><input type="text" name="nama"></li>
        </ul>
        <ul>
            <li>Jenis Kelamin</li>
            <li><input type="text" name="jeniskelamin"></li>
        </ul>
        <ul>
            <li>Alamat</li>
            <li><input type="text" name="alamat"></li>
        </ul>
        <ul>
            <li>Telp</li>
            <li><input type="number" name="telp"></li>
        </ul>
        <button name="submit">Submit</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Telp</th>
        </tr>
        <?php foreach ($pegawai as $row) : ?>
            <tr>
                <td><?= $row["nip"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td><?= $row["telp"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>