<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.html");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#navbar").load("navbarDosen.html");
            $("#footer").load("Footer.html");
        });
    </script>
</head>
<body>
    <div id="navbar"></div>
    <h3 style="font-weight: bold; margin: 2vw; margin-left: 5%;">SELAMAT DATANG, <span style="color: rgb(13, 74, 114) ;"><?php echo $_SESSION['nama'];?></span></h3>
    <div class="container" style="background-color: rgba(206, 202, 202, 0.301); border-radius: 20px; padding: 25px; text-align: justify;">
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button" style="background-color: rgb(13, 74, 114);"><a href="pesanruanganDosen.php" style="color: white; text-decoration: none; ">Pesan Ruangan</a></button>
        </div>
    </div>

</body>
</html>
