<?php
require 'koneksi.php';

if (isset($_POST["submit"])) {
    $kdGaji = $_POST["kdgaji"];
    $nip = $_POST["nip"];
    $bulan = $_POST["bulan"];
    $gajiPokok = $_POST["gajipokok"];
    $jabatan = $_POST["jabatan"];

    if ($jabatan == "Direktur") {
        $tunjangan = 15000000;
    } elseif ($jabatan == "Manajer") {
        $tunjangan = 10000000;
    } else {
        $tunjangan = 5000000;
    }

    $total = $gajiPokok + $tunjangan;

    $sql = "INSERT INTO gaji VALUES ('$kdGaji', '$nip', '$bulan', '$gajiPokok', '$jabatan', '$tunjangan', '$total')";
    mysqli_query($conn, $sql);

    header("location: gaji.php");
    return mysqli_affected_rows($conn);
}

$gaji = tampilData("SELECT * FROM gaji");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>No 4</title>
</head>
<style>
    li {
        display: inline-block;
    }
</style>

<body>
    <form method="post">
        <ul>
            <li>KD Gaji</li>
            <li><input type="text" name="kdgaji"></li>
        </ul>
        <ul>
            <li>NIP</li>
            <li><input type="number" name="nip"></li>
        </ul>
        <ul>
            <li>Bulan</li>
            <li><select name="bulan">
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select></li>
        </ul>
        <ul>
            <li>Gaji Pokok</li>
            <li><input type="number" name="gajipokok"></li>
        </ul>
        <ul>
            <li>Jabatan</li>
            <li><select name="jabatan">
                    <option value="Direktur">Direktur</option>
                    <option value="Manajer">Manajer</option>
                    <option value="Pegawai">Pegawai</option>
                </select></li>
        </ul>
        <button name="submit">Simpan</button>
    </form>

    <h2>STRUK GAJI</h2>
    <?php foreach ($gaji as $row) : ?>
        Kode Gaji :<?= $row["Kd_gaji"] ?><br>
        NIP :<?= $row["nip"] ?><br>
        Bulan :<?= $row["bulan"] ?><br>
        Gaji Pokok :<?= $row["Gaji_pokok"] ?><br>
        Jabatan :<?= $row["jabatan"] ?><br>
        Tunjangan :<?= $row["Tunj_jabatan"] ?><br>
        Total :<?= $row["total"] ?>
    <?php endforeach; ?>
</body>

</html>