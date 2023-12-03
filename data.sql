-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2023 pada 19.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `id_penerbit`, `kategori`, `nama_buku`, `harga`, `stok`) VALUES
(36, 13, 'Majalah', 'Si Kancilll', '10.000', '1'),
(38, 14, 'Ensiklopedia', 'Pejuang Kehidupan', '15.000', '9'),
(39, 17, 'Komik', 'Teh wariors', '40.000', '5'),
(40, 10, 'Novel', 'Sang idola', '50.000', '20'),
(41, 14, 'Ensiklopedia', 'Ridho Allah', '35.000', '12'),
(42, 15, 'Novel', 'Cinta Bersemi Kembali', '25.000', '9'),
(43, 16, 'Komik', 'One Piece', '24.000', '5'),
(44, 10, 'Komik', 'Attack On Titan', '23.000', '5'),
(45, 14, 'Majalah', 'Cara menjadi milyarder', '80.000', '30'),
(46, 16, 'Ensiklopedia', 'Cara disukai cewe', '30.000', '2'),
(47, 17, 'Ensiklopedia', 'Biografi jokowi', '75.000', '11'),
(48, 10, 'Majalah', 'Cara aktif dikampus', '12.000', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`, `alamat`, `kota`, `no_telepon`) VALUES
(10, 'Rivalda Fatah ', 'Kopo Area', 'Bandung Selatan', '07234823412'),
(13, 'Adit', 'Kopo', 'Bandung', '032432424'),
(14, 'Gilang', 'Arcamanik', 'Bandung', '08824892734'),
(15, 'Irshal', 'Cireang', 'Subang', '087787234'),
(16, 'Yoga Fajar', 'Cipedes', 'Bandung', '08765242'),
(17, 'Jones saut', 'Kopoo area', 'Bandung selatan', '087676232');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
