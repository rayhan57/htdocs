<?php
$nama = $_GET["nama"];
//  File yg mau di baca
$file = "data.json";
//  Mendapatkan file json
$ambil = file_get_contents($file);
//  Decode data.json
$data = json_decode($ambil, true);

foreach($data as $key => $row){
    if($row["nama"] === $nama){
        array_splice($data, $key, 1);
    }
}

// Encode data jadi json
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
// Simpan data ke data.json
file_put_contents($file, $jsonfile);

header("location: index.php");
?>