<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ithcm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $kodeuser = $_POST['kodeuser'];
    $status = $_POST['status'];

    $sql = "UPDATE user SET nama = ?, email = ?, password = ?, jurusan = ?, prodi = ?, kodeuser = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $nama, $email, $password, $jurusan, $prodi, $kodeuser, $status, $id);

    if ($stmt->execute()) {
        header("Location: manajemenpengguna.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Akun</title>
</head>
<body>
<div class="container mt-4">
    <h2>Edit Akun</h2>
    <form action="editAkun.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $user['jurusan']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $user['prodi']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="kodeuser" class="form-label">Kode User</label>
            <input type="text" class="form-control" id="kodeuser" name="kodeuser" value="<?php echo $user['kodeuser']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="<?php echo $user['status']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-danger" onclick="window.history.back();">Batalkan</button>
    </form>
</div>
</body>
</html>
