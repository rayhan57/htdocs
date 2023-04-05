<?php
$angka = [[1,2,3],[4,5,6],[7,8,9]]
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
    .kotak{
        display: inline-block;
        width: 50px;
        height: 50px;
        margin-top: 5px;
        text-align: center;
        line-height: 50px;
        background: salmon;
        font-size: 30px;
        transition: 1s;
        cursor: pointer;
    }

    .kotak:hover{
        transform: scale(2);
        background: lightgreen;
    }

    .clear{
        clear: both;
    }
</style>
<body>
    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $b) : ?>
            <div class="kotak"><?php echo $b; ?></div>
        <?php endforeach; ?>
    <div class="clear"></div>
    <?php endforeach; ?>
</body>
</html>