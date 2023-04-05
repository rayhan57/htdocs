<?php
$kendaraan = [
    [
        "nama" => "PCX",
        "cc" => "160",
        "merk" => "Honda",
        "gambar" => "pcx.png"
    ], 
    [
        "nama" => "Nmax",
        "cc" => "155",
        "merk" => "Yamaha",
        "gambar" => "nmax.png"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Associative </title>
</head>

<style>
    li{
        list-style: none;
        font-size: 20px;
    }

    img{
        width: 200px;
    }
</style>

<body>
    <h1>Daftar Kendaraan</h1>

    <?php foreach($kendaraan as $mhs): ?>
    <ul>
        <li><img src="<?= $mhs["gambar"] ?>"></li>
        <li>Nama : <?= $mhs["nama"] ?></li>
        <li>Cc : <?= $mhs["cc"] ?></li>
        <li>Merk : <?= $mhs["merk"] ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>