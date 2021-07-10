-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Jul 2021 pada 19.45
-- Versi server: 5.7.24
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(11) NOT NULL,
  `teller` int(11) NOT NULL,
  `cs` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id`, `teller`, `cs`, `tgl`) VALUES
(1, 4, 2, '2021-07-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang_kerja`
--

CREATE TABLE `tb_ruang_kerja` (
  `id_ruang` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis` int(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang_kerja`
--

INSERT INTO `tb_ruang_kerja` (`id_ruang`, `nama`, `jenis`, `aktif`, `id_user`) VALUES
(1, 'Teller 1', 0, 1, 3),
(2, 'Teller 2', 0, 0, 0),
(3, 'Teller 3', 0, 0, 0),
(4, 'Teller 4', 0, 0, 0),
(5, 'CS-1', 1, 1, 4),
(6, 'CS-2', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_utama`
--

CREATE TABLE `tb_utama` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `no_antri` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_utama`
--

INSERT INTO `tb_utama` (`id`, `tanggal`, `id_user`, `id_ruang`, `no_antri`, `status`, `tipe`) VALUES
(1, '2021-04-05 14:42:32', 3, 1, 3, 1, 0),
(2, '2021-04-05 14:42:32', 2, 2, 4, 1, 0),
(3, '2021-04-05 14:43:13', 3, 3, 6, 1, 0),
(4, '2021-04-05 14:43:13', 3, 3, 8, 1, 0),
(5, '2021-07-10 15:47:11', 3, 6, 1, 1, 1),
(6, '2021-07-10 17:14:09', 3, 1, 8, 1, 0),
(17, '2021-07-11 00:32:45', 4, 5, 2, 1, 1),
(18, '2021-07-11 00:45:47', 3, 1, 2, 1, 0),
(21, '2021-07-11 00:49:23', 3, 1, 3, 1, 0),
(22, '2021-07-11 00:49:36', 4, 5, 3, 1, 1),
(23, '2021-07-11 01:20:47', 3, 1, 4, 1, 0),
(24, '2021-07-11 01:20:52', 4, 5, 4, 1, 1),
(25, '2021-07-11 01:20:58', 4, 5, 5, 1, 1),
(26, '2021-07-11 01:20:59', 4, 5, 6, 1, 1),
(27, '2021-07-11 01:20:59', 4, 5, 7, 1, 1),
(28, '2021-07-11 02:27:38', 4, 5, 1, 0, 1),
(29, '2021-07-11 02:27:39', NULL, NULL, 2, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `level` tinyint(1) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_login`, `nama`, `user`, `pass`, `level`, `aktif`) VALUES
(1, 'alfi', 'admin', '$2y$10$q5BatjYMvRqzNJDK2w.8E.oMI6lOQaoi/GnZELh1wx9gJwFsbAs9m', 1, 1),
(2, 'manajer', 'manajer', '$2y$10$q5BatjYMvRqzNJDK2w.8E.oMI6lOQaoi/GnZELh1wx9gJwFsbAs9m', 3, 1),
(3, 'teller1', 'teller1', '$2y$10$6gRqdNLSa4dbh56Q0s/l2OOmyVkLwwvAaDdBjlCojjkd26sqH928K', 2, 1),
(4, 'cs1', 'cs_01', '$2y$10$o4S08KRa8a3abNGLlEMERex7b1gx/4r3tyXhRU1EohmFyIFmKoW5q', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ruang_kerja`
--
ALTER TABLE `tb_ruang_kerja`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `tb_utama`
--
ALTER TABLE `tb_utama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_to_ruang` (`id_ruang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang_kerja`
--
ALTER TABLE `tb_ruang_kerja`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_utama`
--
ALTER TABLE `tb_utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_utama`
--
ALTER TABLE `tb_utama`
  ADD CONSTRAINT `fk_to_ruang` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang_kerja` (`id_ruang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
