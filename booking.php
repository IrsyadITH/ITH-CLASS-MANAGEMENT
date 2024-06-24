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
    $kelas = $_POST['kelas'];
    $kodeRuangan = $_POST['kodeRuangan'];
    $mataKuliah = $_POST['mataKuliah'];
    $dosen = $_POST['dosen'];
    $jadwalMasuk = $_POST['jadwalMasuk'];
    $jadwalKeluar = $_POST['jadwalKeluar'];
    $hari = $_POST['hari']; // Hari dari form HTML

    // Check for conflicting schedules
    $stmt = $conn->prepare("SELECT COUNT(*) FROM jadwal 
                            WHERE kodeRuangan = ? AND hari = ? AND (
                                (jadwalMasuk < ? AND jadwalKeluar > ?) OR  -- Overlap partial di dalam
                                (jadwalMasuk < ? AND jadwalKeluar > ?) OR  -- Overlap partial di luar
                                (jadwalMasuk >= ? AND jadwalKeluar <= ?)   -- Overlap total
                            )");
    $stmt->bind_param("ssssssss", $kodeRuangan, $hari, $jadwalKeluar, $jadwalMasuk, $jadwalMasuk, $jadwalKeluar, $jadwalMasuk, $jadwalKeluar);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo json_encode("Jadwal bertabrakan dengan jadwal lain di ruangan yang sama pada hari yang sama");
    } else {
        // Insert new schedule
        $stmt = $conn->prepare("INSERT INTO jadwal (nama, kelas, kodeRuangan, mataKuliah, dosen, hari, jadwalMasuk, jadwalKeluar) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nama, $kelas, $kodeRuangan, $mataKuliah, $dosen, $hari, $jadwalMasuk, $jadwalKeluar);

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
