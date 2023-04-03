<?php
$url = "localhost";
$username = "root";
$password = "";
$database = "uas_1484";

$conn = mysqli_connect($url, $username, $password, $database);

function tampilData($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
