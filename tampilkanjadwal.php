<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ithcm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memastikan session user_id ada dan benar
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Query untuk menampilkan jadwal dari database
$sql = "SELECT id, nama, kodeRuangan, mataKuliah, dosen, jadwalMasuk, jadwalKeluar FROM jadwal ORDER BY kodeRuangan, jadwalMasuk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-bordered table-striped">';
    echo '<thead style="background-color: rgb(13, 74, 114); color: white; text-align: center;">';
    echo '<tr><th>Nama</th><th>Kode Ruangan</th><th>Mata Kuliah</th><th>Dosen</th><th>Jadwal Masuk</th><th>Jadwal Keluar</th><th>Aksi</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
        echo '<td>' . htmlspecialchars($row['kodeRuangan']) . '</td>';
        echo '<td>' . htmlspecialchars($row['mataKuliah']) . '</td>';
        echo '<td>' . htmlspecialchars($row['dosen']) . '</td>';
        echo '<td>' . htmlspecialchars($row['jadwalMasuk']) . '</td>';
        echo '<td>' . htmlspecialchars($row['jadwalKeluar']) . '</td>';
        
        // Tombol hapus untuk setiap entri jadwal
        echo '<td>';
        echo '<button class="btn btn-danger btn-sm" onclick="hapusJadwal(' . $row['id'] . ')">Hapus</button>';
        echo '</td>';
        
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">Tidak ada jadwal yang tersedia.</div>';
}

$conn->close();
?>
