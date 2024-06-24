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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Optional styling for demonstration */
        .form-section {
            display: none;
            background-color: rgba(206, 202, 202, 0.301);
            padding: 20px;
            margin-top: 20px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to load schedule
        function loadSchedule() {
            $.ajax({
                url: 'tampilkanjadwal.php', // Sesuaikan dengan file PHP yang menampilkan jadwal dari database
                type: 'GET',
                success: function(response) {
                    $("#jadwal").html(response); // Tampilkan jadwal yang sudah diperbarui
                },
                error: function() {
                    alert('Error occurred while loading schedule.');
                }
            });
        }

        // Function to delete schedule entry
        function hapusJadwal(id) {
            if (confirm("Anda yakin ingin menghapus jadwal ini?")) {
                $.ajax({
                    url: 'hapus_jadwal.php', // Sesuaikan dengan file PHP yang melakukan penghapusan
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        alert(response); // Tampilkan pesan sukses atau error
                        loadSchedule(); // Panggil kembali fungsi loadSchedule untuk memperbarui jadwal
                    },
                    error: function() {
                        alert('Error occurred while deleting schedule.');
                    }
                });
            }
        }

        $(document).ready(function(){
            $("#navbar").load("navbarDosen.html");
            $("#footer").load("footer.html");
            
            // Function to load schedule initially
            loadSchedule();

            // Handle click event on the "Pesan Ruangan" button
            $("#btnShowForm").click(function(){
                var formSection = $(".form-section");
                if (formSection.is(":visible")) {
                    formSection.hide(); // Sembunyikan bagian form
                    $("#btnShowForm").text("Pesan Ruangan"); // Ubah teks tombol kembali menjadi "Pesan Ruangan"
                } else {
                    formSection.show(); // Tampilkan bagian form
                    $("#btnShowForm").text("Batalkan"); // Ubah teks tombol menjadi "Batalkan"
                    clearForm(); // Bersihkan isian form
                }

                // Scroll ke bagian form (opsional)
                $('html, body').animate({
                    scrollTop: formSection.offset().top
                }, 1000);
            });

            // Function to clear form fields
            function clearForm() {
                $("#nama").val(""); // Bersihkan isian nama
                $("#kodeRuangan").val(""); // Bersihkan isian kodeRuangan
                $("#mataKuliah").val(""); // Bersihkan isian mataKuliah
                $("#dosen").val(""); // Bersihkan isian dosen
                $("#jadwalMasuk").val(""); // Bersihkan isian jadwalMasuk
                $("#jadwalKeluar").val(""); // Bersihkan isian jadwalKeluar
            }

            // Handle form submission
            $("form").submit(function(event){
                event.preventDefault(); // Cegah pengiriman form bawaan
                $.ajax({
                    url: 'booking.php', // Sesuaikan dengan file PHP untuk melakukan booking
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response); // Tampilkan pesan sukses atau error
                        loadSchedule(); // Perbarui jadwal setelah booking berhasil
                        $(".form-section").hide(); // Sembunyikan form setelah booking berhasil
                        $("#btnShowForm").text("Pesan Ruangan"); // Ubah teks tombol kembali menjadi "Pesan Ruangan"
                        clearForm(); // Bersihkan isian form
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
                            <label for="kelas" class="form-label">Pilih kelas</label>
                            <select class="form-select" aria-label="Default select example" id="kelas" name="kelas">
                                <option value="IK22-A">IK22-A</option>
                                <option value="IK22-B">IK22-B</option>
                                <option value="IK22-C">IK22-C</option>
                                <option value="IK22-D">IK22-D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kodeRuangan" class="form-label">Pilih kode ruangan</label>
                            <select class="form-select" aria-label="Default select example" id="kodeRuangan" name="kodeRuangan">
                                <option value="R-101">R-101</option>
                                <option value="R-102">R-102</option>
                                <option value="R-103">R-103</option>
                                <option value="R-104">R-104</option>
                                <option value="R-202">R-202</option>
                                <option value="R-203">R-203</option>
                                <option value="R-205">R-205</option>
                                <option value="R-206">R-206</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mataKuliah" class="form-label">Pilih mata kuliah</label>
                            <select class="form-select" aria-label="Default select example" id="mataKuliah" name="mataKuliah">
                                <option value="Pemrograman Web">Pemrograman Web</option>
                                <option value="Desain Analisis Algoritma">Desain Analisis Algoritma</option>
                                <option value="Aritifical Intelegence">Aritifical Intelegence</option>
                                <option value="Statistika dan Probabilitas">Statistika dan Probabilitas</option>
                                <option value="Keamanan Data dan Informasi">Keamanan Data dan Informasi</option>
                                <option value="Rekaya Perangkat Lunak">Rekaya Perangkat Lunak</option>
                                <option value="Riset Teknologi dan Informasi">Riset Teknologi dan Informasi</option>
                                <option value="Pengolahan Citra Digital">Pengolahan Citra Digital</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dosen" class="form-label">Pilih dosen pengampu mata kuliah</label>
                            <select class="form-select" aria-label="Default select example" id="dosen" name="dosen">
                                <option value="Prof. Dr. Ir. Indar Chaerah Gunadin,S.T., M.T.,IPM">Prof. Dr. Ir. Indar Chaerah Gunadin,S.T., M.T.,IPM</option>
                                <option value="Naili Suri Intizhami, S.Kom., M.Kom.">Naili Suri Intizhami, S.Kom., M.Kom.</option>
                                <option value="Eka Qadri Nuranti B, S.Kom., M.Kom.">Eka Qadri Nuranti B, S.Kom., M.Kom.</option>
                                <option value="Mardhiyyah Rafrin, S.T., M.Sc.">Mardhiyyah Rafrin, S.T., M.Sc.</option>
                                <option value="Putri Ayu Maharani, S.T., M.Sc.">Putri Ayu Maharani, S.T., M.Sc.</option>
                                <option value="Muh. Agus, S.Kom., M.Kom.">Muh. Agus, S.Kom., M.Kom.</option>
                                <option value="Muh. Ikhsan Amar, S.Kom., M.Kom.">Muh. Ikhsan Amar, S.Kom., M.Kom.</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select class="form-select" aria-label="Default select example" id="hari" name="hari">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
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
                            <button class="btn btn-primary" type="submit" style="background-color: rgb(13, 74, 114);">Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="footer"></div>
</body>
</html>
