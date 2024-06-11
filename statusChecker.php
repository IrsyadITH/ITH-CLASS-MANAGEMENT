
<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

    // Memeriksa status pengguna
    if ($_SESSION['status'] == 'Admin') {
        include 'indexAdmin.php';
    } elseif ($_SESSION['status'] == 'dosen') {
        echo "Selamat datang Dosen " . $_SESSION['nama'];
        // Tampilkan konten khusus dosen
    } elseif ($_SESSION['status'] == 'mahasiswa') {
        echo "Selamat datang Mahasiswa " . $_SESSION['nama'];
        // Tampilkan konten khusus mahasiswa
    } else {
        echo "Status pengguna tidak dikenal";
    }
?>
