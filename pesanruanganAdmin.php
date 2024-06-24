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
    <style>
        /* Optional styling for demonstration */
        .form-section {
            display: none;
            background-color: rgba(206, 202, 202, 0.301);
            padding: 20px;
            margin-top: 20px;
        }
    </style>
    <script>
        function hapusJadwal(id) {
            if (confirm("Anda yakin ingin menghapus jadwal ini?")) {
                $.ajax({
                    url: 'hapus_jadwal.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        alert(response); // Tampilkan pesan sukses atau error
                        // Lakukan reload halaman atau perbarui tampilan jadwal
                        loadSchedule();
                    },
                    error: function() {
                        alert('Error occurred while deleting schedule.');
                    }
                });
            }
        }
        $(document).ready(function(){
    $("#navbar").load("navbaradmin.html");
    $("#footer").load("footer.html");
    
    // Function to load schedule
    function loadSchedule() {
        $.ajax({
            url: 'tampilkanjadwal.php',
            type: 'GET',
            success: function(response) {
                $("#jadwal").html(response); // Display existing schedule
            },
            error: function() {
                alert('Error occurred while loading schedule.');
            }
        });
    }

    // Initial load of schedule
    loadSchedule();

    // Handle click event on the "Pesan Ruangan" button
    $("#btnShowForm").click(function(){
        var formSection = $(".form-section");
        if (formSection.is(":visible")) {
            formSection.hide(); // Hide the form section
            $("#btnShowForm").text("Pesan Ruangan"); // Change button text back to "Pesan Ruangan"
        } else {
            formSection.show(); // Show the form section
            $("#btnShowForm").text("Batalkan"); // Change button text to "Batalkan"
            clearForm(); // Clear form fields
        }

        // Scroll to the form section (optional)
        $('html, body').animate({
            scrollTop: formSection.offset().top
        }, 1000);
    });

    // Function to clear form fields
    function clearForm() {
        $("#nama").val(""); // Clear nama field
        $("#kodeRuangan").val(""); // Clear kodeRuangan field
        $("#mataKuliah").val(""); // Clear mataKuliah field
        $("#dosen").val(""); // Clear dosen field
        $("#jadwalMasuk").val(""); // Clear jadwalMasuk field
        $("#jadwalKeluar").val(""); // Clear jadwalKeluar field
    }

    // Handle form submission
    $("form").submit(function(event){
        event.preventDefault(); // Prevent default form submission
        $.ajax({
            url: 'booking.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response); // Display success or error message
                loadSchedule(); // Refresh schedule after successful booking
                $(".form-section").hide(); // Hide form after successful booking
                $("#btnShowForm").text("Pesan Ruangan"); // Change button text back to "Pesan Ruangan"
                clearForm(); // Clear form fields
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
    <div class="container">
        <div class="row m-2">
            <div class="col mb-2 mt-2" style="text-align: center;">
                <h6 style="font-weight: bold; color: red;">HARAP UNTUK MENGISI FORM PEMESANAN DENGAN BENAR!</h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <legend style="font-weight: bold;">Jadwal Perkuliahan</legend>
                <div id="jadwal">
                    <!-- Tampilan jadwal akan dimuat oleh AJAX -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary mb-3" id="btnShowForm" style="background-color: rgb(13, 74, 114); float: right;">Pesan Ruangan</button>
                <div class="form-section">
                    <legend style="font-weight: bold;">Pesan Ruangan</legend>
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama pemesan</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="kodeRuangan" class="form-label">Pilih kode ruangan</label>
                            <select class="form-select" aria-label="Default select example" id="kodeRuangan" name="kodeRuangan">
                                <option selected>Kode ruangan</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mataKuliah" class="form-label">Pilih mata kuliah</label>
                            <select class="form-select" aria-label="Default select example" id="mataKuliah" name="mataKuliah">
                                <option selected>Mata kuliah</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dosen" class="form-label">Pilih dosen pengampu mata kuliah</label>
                            <select class="form-select" aria-label="Default select example" id="dosen" name="dosen">
                                <option selected>Dosen pengampu mata kuliah</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label for="jadwalMasuk" class="form-label">Jadwal masuk</label>
                                <input type="time" class="form-control" id="jadwalMasuk" name="jadwalMasuk">
                            </div>
                            <div class="col">
                                <label for="jadwalKeluar" class="form-label">Jadwal Keluar</label>
                                <input type="time" class="form-control" id="jadwalKeluar" name="jadwalKeluar">
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-primary" type="submit" style="background-color: rgb(13, 74, 114);">Button</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="footer"></div>
</body>
</html>
