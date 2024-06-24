<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);

// Memeriksa apakah user sudah login
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
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="navbar"></div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white" style="background-color: rgb(13, 74, 114);">
                        Profil Pengguna
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Pengguna:</label>
                            <input type="text" class="form-control" id="username" value="<?php echo $_SESSION['nama'];?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" value="<?php echo $_SESSION['email'];?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="kodeuser" class="form-label">NIM:</label>
                            <input type="text" class="form-control" id="kodeuser" value="<?php echo $_SESSION['kodeuser'];?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan:</label>
                            <input type="text" class="form-control" id="jurusan" value="<?php echo $_SESSION['jurusan'];?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Program Studi:</label>
                            <input type="text" class="form-control" id="prodi" value="<?php echo $_SESSION['prodi'];?>" readonly>
                        </div>
                        <a href="logout.php" class="btn btn-danger" style="background-color: rgb(13, 74, 114);">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer"></div>

    <script>
        $(document).ready(function(){
            $("#navbar").load("navbarAdmin.html");
            $("#footer").load("Footer.html");
        });
    </script>
</body>
</html>
