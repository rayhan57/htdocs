<?php
$url = "localhost";
$username = "root";
$password = "";
$database = "phpdasar";

$conn = mysqli_connect($url, $username, $password, $database);

// Tampil Data
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $jabatan = $data['jabatan'];

    $sql = "INSERT INTO karyawan VALUES ('', '$nik', '$nama', '$jabatan')";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}
?>