<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ithcm";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection gagal: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM user WHERE email='$email' AND password='$password'");
    if ($result->num_rows == 0) {
        $check_email =$conn->query("SELECT * FROM user WHERE email='$email'");
        if ($check_email->num_rows == 0) {
            echo "Akun tidak terdaftar";
        } else {
            echo "Password Tidak Cocok";    
        }
    }else {
        session_start();

        while ($row = $result->fetch_assoc()) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
        }
        header('Location: index.php');
    }
?>