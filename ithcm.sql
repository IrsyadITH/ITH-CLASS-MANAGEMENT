-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2024 pada 15.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ithcm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `kodeRuangan` varchar(50) NOT NULL,
  `mataKuliah` varchar(50) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jadwalMasuk` time NOT NULL,
  `jadwalKeluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `nama`, `kelas`, `kodeRuangan`, `mataKuliah`, `dosen`, `hari`, `jadwalMasuk`, `jadwalKeluar`) VALUES
(7, 'ITH', 'IK22-A', 'R-202', 'Desain Analisis Algoritma', 'Eka Qadri Nuranti B, S.Kom., M.Kom.', 'Senin', '13:30:00', '15:10:00'),
(8, 'ITH', 'IK22-C', 'R-203', 'Pemrograman Web', 'Mardhiyyah Rafrin, S.T., M.Sc.', 'Senin', '13:30:00', '15:10:00'),
(9, 'ITH', 'IK22-B', 'R-205', 'Pengolahan Citra Digital', 'Naili Suri Intizhami, S.Kom., M.Kom.', 'Senin', '13:30:00', '15:10:00'),
(10, 'ITH', 'IK22-D', 'R-206', 'Rekaya Perangkat Lunak', 'Putri Ayu Maharani, S.T., M.Sc.', 'Senin', '13:30:00', '15:10:00'),
(11, 'ITH', 'IK22-B', 'R-202', 'Desain Analisis Algoritma', 'Eka Qadri Nuranti B, S.Kom., M.Kom.', 'Senin', '15:20:00', '17:00:00'),
(13, 'ITH', 'IK22-A', 'R-203', 'Pemrograman Web', 'Mardhiyyah Rafrin, S.T., M.Sc.', 'Senin', '15:20:00', '17:00:00'),
(15, 'Asbar Selle', 'IK22-C', 'R-102', 'Pemrograman Web', 'Mardhiyyah Rafrin, S.T., M.Sc.', 'Selasa', '07:30:00', '09:10:00'),
(16, 'Muhammad Irsyad Erlanggaa', 'IK22-C', 'R-103', 'Rekaya Perangkat Lunak', 'Putri Ayu Maharani, S.T., M.Sc.', 'Selasa', '13:30:00', '03:10:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kodeuser` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `kodeuser`, `status`, `jurusan`, `prodi`) VALUES
(2, 'irsyad@gmail.com', 'irsyad123', 'Muhammad Irsyad Erlangga', 'A012024', 'Admin', 'Teknologi Produksi dan Industri', 'Ilmu Komputer'),
(6, 'Fauzan@gmail.com', 'fauzan', 'M. Fauzan Iskandar', '221011064', 'Mahasiswa', 'Teknologi Produksi dan Industri', 'Ilmu Komputer'),
(10, 'adit@gmail.com', '222424', 'Aditya Mulyadi', '221011042', 'Mahasiswa', 'Teknologi Produksi dan Industri', 'Ilmu Komputer'),
(26, 'agus123@gmail.com', '111', 'Muh. Agus, S.Kom., M.Kom.', '0021089502', 'Dosen', 'Teknologi Produksi dan Industri', 'Ilmu Komputer'),
(29, 'asbar1234@gmail.com', 'asbar123', 'Asbar Selle', '221011081', 'Mahasiswa', 'Teknologi Produksi dan Industri', 'Ilmu Komputer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodeuser` (`kodeuser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
