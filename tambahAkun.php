<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ithcm";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $jurusan = $_POST['jurusan'];
        $prodi = $_POST['prodi'];
        $kodeuser = $_POST['kodeuser'];
        $status = $_POST['status'];

        $stmt = $conn->prepare("INSERT INTO user (nama, email, password, jurusan, prodi, kodeuser, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nama, $email, $password, $jurusan, $prodi, $kodeuser, $status);

        if ($stmt->execute()) {
            echo "User added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
