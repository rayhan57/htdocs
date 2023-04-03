<?php
$mahasiswa = [["Rayhan","201943501484"], ["Fajar","201943501487"], ["Galih","201943501434"]];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs): ?>
    <ul>
        <li>Nama : <?php echo $mhs[0]; ?> </li>
        <li>NPM : <?php echo $mhs[1]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>