<?php
$angka = [3,2,10,34,15,20,30]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    div{
        width: 50px;
        height: 50px;
        background: lightblue;
        display: inline-flex;
        margin: 5px;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
    <?php for($i = 0; $i < count($angka); $i++): ?>
    <div><?php echo $angka[$i]; ?></div>
    <?php endfor; ?>

    <br>

    <?php foreach($angka as $a): ?>
        <div><?php echo $a; ?></div>
    <?php endforeach; ?>
</body>
</html>