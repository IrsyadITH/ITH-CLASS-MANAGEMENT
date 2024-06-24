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

    // Periksa apakah kodeuser sudah ada
    $stmt = $conn->prepare("SELECT id FROM user WHERE kodeuser = ?");
    $stmt->bind_param("s", $kodeuser);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Kode User sudah ada."]);
    } else {
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO user (nama, email, password, jurusan, prodi, kodeuser, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nama, $email, $password, $jurusan, $prodi, $kodeuser, $status);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "User added successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }
    }

    $stmt->close();
    $conn->close();
}
?>
