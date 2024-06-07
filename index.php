<?php
    session_start();
    if(!isset($_SESSION["user_id"])){
        header("login.html");
            exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>BERANDA</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#navbar").load("navbar.html");
        $("#footer").load("footer.html");
    });
    </script>
</head>
<body>
    <div id="navbar"></div>

    <div class="index-container">
        <div class="welcome">
            <h1>SELAMAT DATANG, <span><?php echo $_SESSION['nama'];?></span></h1>
        </div>
        <div class="intro">
            <h1 class="title">ITH CLASS MANAGEMENT</h1>
            <p>
                ITH CLASS MANAGEMENT merupakan solusi yang didasarkan pada teknologi informasi dan komunikasi (TIK) yang dirancang khusus untuk mengoptimalkan penggunaan ruang belajar di lingkungan akademik. Tujuan utamanya adalah untuk menyediakan kemudahan akses, transparansi informasi, dan efisiensi dalam mengatur jadwal ruang belajar di lembaga pendidikan tinggi. Melalui integrasi teknologi, platform ini berupaya membentuk lingkungan belajar yang lebih terstruktur, efisien, dan produktif bagi mahasiswa serta dosen di institusi tersebut.
            </p>
            <p>
                Dengan ITH CLASS MANAGEMENT, proses administrasi terkait ruang belajar menjadi lebih efisien dan mudah dilakukan. Mahasiswa dan dosen dapat dengan cepat mengakses informasi terkait jadwal ruang belajar, serta melakukan reservasi atau penjadwalan ulang jika diperlukan. Sistem ini juga memungkinkan pengaturan jadwal secara otomatis berdasarkan ketersediaan dan preferensi pengguna, mengurangi potensi tumpang tindih dan konflik jadwal.
            </p>
            <p>
                Selain itu, platform ini juga berperan dalam menciptakan lingkungan belajar yang lebih produktif. Dengan memberikan akses yang mudah terhadap informasi jadwal dan lokasi kelas, mahasiswa dapat lebih fokus pada pembelajaran mereka tanpa terganggu oleh masalah administratif. Di sisi lain, dosen dapat mengalokasikan waktu mereka secara lebih efisien, meningkatkan interaksi dengan mahasiswa, dan memfasilitasi kegiatan belajar yang lebih terarah dan efektif.
            </p>
            <p>
                Dengan demikian, ITH CLASS MANAGEMENT bukan hanya sekadar alat administratif, tetapi juga merupakan sarana untuk meningkatkan pengalaman belajar secara keseluruhan di lingkungan pendidikan tinggi. Dengan menghilangkan hambatan administratif dan menciptakan lingkungan belajar yang lebih terstruktur dan produktif, platform ini berpotensi untuk meningkatkan prestasi akademik serta kepuasan mahasiswa dan dosen dalam proses pembelajaran.
            </p>
            <div class="buttons">
                <button><a href="jadwal.html">Lihat Jadwal</a></button>
                <button><a href="booking.html">Pesan Ruangan</a></button>
            </div>
        </div>
    </div>

    <div id="footer"></div>
</body>
</html>
