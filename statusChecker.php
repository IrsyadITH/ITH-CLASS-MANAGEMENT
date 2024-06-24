
<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

    // Memeriksa status pengguna
    if ($_SESSION['status'] == 'Admin') {
        include 'berandaAdmin.php';
    } elseif ($_SESSION['status'] == 'dosen') {
        echo "Selamat datang Dosen " . $_SESSION['nama'];
        // Tampilkan konten khusus dosen
    } elseif ($_SESSION['status'] == 'Mahasiswa') {
        include 'beranda.php';
    } else {
        echo "Status pengguna tidak dikenal";
    }
?>
