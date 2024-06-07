<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
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
    <div class="user-container">
        <h2><?php echo $_SESSION['nama'];?></h2>
        <div class="data-user">
            <h4>User address</h4>
            <p style="margin-left: 10px;"><?php echo $_SESSION['email'];?></p>
        </div>
        <div class="data-user">
            <h4>NIM</h4>
            <p style="margin-left: 10px;"><?php echo $_SESSION['kodeuser'];?></p>
        </div>
        <div class="button-container">
            <button type="submit" id="change-pass" class="account"><a href="">Ganti Password</a></button>
            <button type="submit" id="logout" class="account"><a href="logout.php">Log out</a></button>
        </div>
    </div>
    <div id="footer"></div>
</body>
</html>