<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ithcm";

// Memastikan session user_id ada dan benar
if (!isset($_SESSION['user_id'])) {
    echo "Anda tidak memiliki izin untuk menghapus jadwal.";
    exit();
}

$user_id = $_SESSION['user_id'];

// Memastikan ada data POST id yang dikirimkan
if (!isset($_POST['id'])) {
    echo "ID jadwal tidak ditemukan.";
    exit();
}

$id = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk menghapus jadwal dari database berdasarkan id
$sql = "DELETE FROM jadwal WHERE id = ?";
$stmt = $conn->prepare($sql);

// Binding parameter dengan tipe integer (i)
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Jadwal berhasil dihapus.";
    } else {
        echo "Anda tidak memiliki izin untuk menghapus jadwal ini.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
