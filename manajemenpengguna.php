<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ithcm";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data pengguna dari database
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Manajemen Pengguna</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#navbar").load("navbaradmin.html");
            $("#footer").load("Footer.html");

            $("form").submit(function(event){
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: 'tambahAkun.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message); // Display success or error message
                        if (res.status === 'success') {
                            // Close the modal
                            $('#staticBackdrop').modal('hide');
                            // Append the new user to the table
                            const newRow = `
                                <tr>
                                    <td>${$('[name="nama"]').val()}</td>
                                    <td>${$('[name="email"]').val()}</td>
                                    <td>${$('[name="jurusan"]').val()}</td>
                                    <td>${$('[name="prodi"]').val()}</td>
                                    <td>${$('[name="kodeuser"]').val()}</td>
                                    <td>${$('[name="status"]').val()}</td>
                                    <td>
                                        <a href='editAkun.php?id=${res.id}' class='btn btn-warning'>Edit</a>
                                        <a href='hapusAkun.php?id=${res.id}' class='btn btn-danger'>Hapus</a>
                                    </td>
                                </tr>
                            `;
                            $('table tbody').append(newRow);
                        }
                    },
                    error: function() {
                        alert('Error occurred while adding user.');
                    }
                });
            });
        });
    </script>
</head>
    <body>
        <div id="navbar"></div>
        
        <div class="container mt-4">
            <h2>Daftar Pengguna</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Prodi</th>
                        <th>Kode User</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "ithcm";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM user";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['jurusan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['prodi']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['kodeuser']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                            echo "<td>
                                    <a href='editAkun.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                                    <a href='hapusAkun.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Tidak ada pengguna yang ditemukan</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
                
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Akun
            </button>
                
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <input type="text" class="form-control" id="prodi" name="prodi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kodeuser" class="form-label">Kode User</label>
                                    <input type="text" class="form-control" id="kodeuser" name="kodeuser" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" required>
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer"></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFyU3f7hZ10u5c0Gmsl5a3MQ40Eu92jcmeLZzY2zE/rf6m4GFy5DP5y38l" crossorigin="anonymous"></script>
    </body>
    </html>
