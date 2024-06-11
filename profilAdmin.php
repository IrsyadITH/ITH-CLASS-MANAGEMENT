<?php
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
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="navbarAdmin.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="profileAdmin.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#navbar").load("navbarAdmin.html");
        $("#footer").load("footer.html");
    });
    </script>
</head>
<body>
    <div id="navbar"></div>

    <div class="user-container">
        <h2><?php echo $_SESSION['nama'];?></h2>
        <div>
            <div class="data-user">
                <h4>Email address</h4>
                <p style="margin-left: 10px;"><?php echo $_SESSION['email'];?></p>
            </div>
            <div class="data-user">
                <h4>Kode Admin</h4>
                <p style="margin-left: 10px;"><?php echo $_SESSION['kodeuser'];?></p>
            </div .button-container>

            <button type="submit"><a href="">Ganti Password</a></button>
            <button type="submit"><a href="logout.php">Log Out</a></button>
        </div>
    </div>
    <div id="footer"></div>
</body>
</html>