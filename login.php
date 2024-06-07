<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ithcm";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM user WHERE email='$email' AND password='$password'");

    if ($result->num_rows == 0) {
        $check_email = $conn->query("SELECT * FROM user WHERE email='$email'");
        if ($check_email->num_rows == 0) {
            echo json_encode(["status" => "error", "message" => "Akun tidak terdaftar"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Password Tidak Cocok"]);
        }
    } else {
        session_start();

        while ($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['kodeuser'] = $row['kodeuser'];
        }
        echo json_encode(["status" => "success", "message" => "Login successful"]);
    }

    $conn->close();
?>
