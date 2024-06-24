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
    $kodeRuangan = $_POST['kodeRuangan'];
    $mataKuliah = $_POST['mataKuliah'];
    $dosen = $_POST['dosen'];
    $jadwalMasuk = $_POST['jadwalMasuk'];
    $jadwalKeluar = $_POST['jadwalKeluar'];

    // Check for conflicting schedules
    $stmt = $conn->prepare("SELECT COUNT(*) FROM jadwal WHERE kodeRuangan = ? AND ((jadwalMasuk < ? AND jadwalKeluar > ?) OR (jadwalMasuk < ? AND jadwalKeluar > ?) OR (jadwalMasuk >= ? AND jadwalKeluar <= ?))");
    $stmt->bind_param("sssssss", $kodeRuangan, $jadwalKeluar, $jadwalMasuk, $jadwalMasuk, $jadwalKeluar, $jadwalMasuk, $jadwalKeluar);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode("Jadwal bertabrakan dengan jadwal lain di ruangan yang sama");
    } else {
        $stmt = $conn->prepare("INSERT INTO jadwal (nama, kodeRuangan, mataKuliah, dosen, jadwalMasuk, jadwalKeluar) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nama, $kodeRuangan, $mataKuliah, $dosen, $jadwalMasuk, $jadwalKeluar);

        if ($stmt->execute()) {
            echo json_encode("Jadwal berhasil ditambahkan");
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }

        $stmt->close();
    }

    $conn->close();
}
?>
