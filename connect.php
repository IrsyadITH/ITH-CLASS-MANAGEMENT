<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ithcm";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection gagal: " . $conn->connect_error);
    }
?>