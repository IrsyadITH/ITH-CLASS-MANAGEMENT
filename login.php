<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ithcm";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
    }

    $kodeuser = $_POST['kodeuser'];  // Ambil kodeuser dari form login
    $password = $_POST['password'];  // Ambil password dari form login

    // Query untuk memeriksa apakah ada kombinasi kodeuser dan password yang sesuai
    $result = $conn->query("SELECT * FROM user WHERE kodeuser='$kodeuser' AND password='$password'");

    if ($result->num_rows == 0) {
        // Jika tidak ada hasil, periksa apakah kodeuser ada di database
        $check_kodeuser = $conn->query("SELECT * FROM user WHERE kodeuser='$kodeuser'");
        if ($check_kodeuser->num_rows == 0) {
            echo json_encode(["status" => "error", "message" => "Akun tidak terdaftar"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Password tidak cocok"]);
        }
    } else {
        // Jika ada hasil, berarti login berhasil
        session_start();

        while ($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['kodeuser'] = $row['kodeuser'];
            $_SESSION['jurusan'] = $row['jurusan'];
            $_SESSION['prodi'] = $row['prodi'];
        }
        echo json_encode(["status" => "success", "message" => "Login berhasil"]);
    }

    $conn->close();
?>