<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar-container">
        <div class="navbar-container-left">
            <div class="brand">
                <h1>ITH</h1>
                <h2>CM</h2>
            </div>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="booking.html">Pesan Ruangan</a></li>
                <li><a href="jadwal.html">Jadwal</a></li>
                <li><a href="user.html"><i class="fa-solid fa-user" style="font-size: 2vw;"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container-right">
            <img src="assets/Logo_Kampus_Merdeka_Kemendikbud.png" alt="KAMPUSMERDEKA">
            <img src="assets/ITH.jpg" alt="ITHLOGO">
        </div>
    </nav>
    <div class="user-container">
        <h2>NAMA USER</h2>
        <div class="data-user">
            <h4>User address</h4>
            <?php echo $_SESSION['email'];?>
        </div>
        <div class="data-user">
            <h4>NIM</h4>
        </div>
        <div class="data-user">
            <h4>Kelas</h4>
        </div>
        <div class="data-user">
            <h4>Jurusan</h4>
        </div>
        <div class="data-user">
            <h4>Prodi</h4>
        </div>
        <div class="button-container">
            <button>Ganti Password</button>
            <button type="submit" id="logout"><a href="logout.php">Log out</a></button>
        </div>
    </div>
    <footer class="copyright">Copyright 2024 © ITHCM. Developed By ITHCM TEAM</footer>
    <footer class="contact">
        <h6>Contact Us: </h6>
        <a href="" class="fa-brands fa-instagram"></a>
        <a href="" class="fa-brands fa-whatsapp"></a>
        <a href="" class="fa-solid fa-envelope"></a>
    </footer>
</body>
</html>