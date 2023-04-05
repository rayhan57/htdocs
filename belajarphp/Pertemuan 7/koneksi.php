<?php

$url = "localhost";
$username = "root";
$password = "";
$database = "phpdasar";

$conn = mysqli_connect($url, $username, $password, $database);

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

?>