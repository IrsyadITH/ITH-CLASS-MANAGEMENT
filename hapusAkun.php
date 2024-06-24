// hapusAkun.php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ithcm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: manajemenpengguna.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
