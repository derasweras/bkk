-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 16 Jul 2019 pada 10.59
-- Versi Server: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` varchar(12) NOT NULL,
  `tgl` date NOT NULL,
  `id_pabrik` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `tgl`, `id_pabrik`) VALUES
('12', '2019-07-25', '1'),
('67546', '2019-08-02', '1'),
('87867', '2019-07-03', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pabrik`
--

CREATE TABLE `pabrik` (
  `id` varchar(12) NOT NULL,
  `nama_pabrik` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pabrik`
--

INSERT INTO `pabrik` (`id`, `nama_pabrik`, `alamat`) VALUES
('1', 'yamaha', 'kp.mana aja'),
('2', 'honda', 'kp. rambutan'),
('3', 'keihin', 'kp. salak'),
('4', 'kti', 'kp. saki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencaker`
--

CREATE TABLE `pencaker` (
  `nik` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenkel` enum('Laki- laki','perempuan') NOT NULL,
  `tinggi` int(4) NOT NULL,
  `nilai_un` int(9) NOT NULL,
  `Id_lowongan` varchar(12) NOT NULL,
  `hasil` enum('lolos','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` varchar(12) NOT NULL,
  `tinggi` int(12) NOT NULL,
  `nilai_un_mtk` int(12) NOT NULL,
  `nilai_un` int(12) NOT NULL,
  `id_lowongan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `tinggi`, `nilai_un_mtk`, `nilai_un`, `id_lowongan`) VALUES
('1', 120, 12, 12, '12'),
('5443', 76, 45, 45, '67546'),
('343', 323, 4232, 43242, '87867');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lowongan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_lowongan` (
`nama_pabrik` varchar(20)
,`alamat` text
,`id_pabrik` varchar(12)
,`id_lowongan` varchar(12)
,`tgl` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_lowongan_persyaratan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_lowongan_persyaratan` (
`id_pabrik` varchar(12)
,`id_lowongan` varchar(12)
,`nama_pabrik` varchar(20)
,`alamat` text
,`tgl` date
,`id` varchar(12)
,`nilai_un` int(12)
,`nilai_un_mtk` int(12)
,`tinggi` int(12)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_lowongan`
--
DROP TABLE IF EXISTS `view_lowongan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`smkpma`@`%` SQL SECURITY DEFINER VIEW `view_lowongan`  AS  select `pabrik`.`nama_pabrik` AS `nama_pabrik`,`pabrik`.`alamat` AS `alamat`,`lowongan`.`id_pabrik` AS `id_pabrik`,`lowongan`.`id_lowongan` AS `id_lowongan`,`lowongan`.`tgl` AS `tgl` from (`pabrik` join `lowongan`) where (`pabrik`.`id` = `lowongan`.`id_pabrik`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_lowongan_persyaratan`
--
DROP TABLE IF EXISTS `view_lowongan_persyaratan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`smkpma`@`%` SQL SECURITY DEFINER VIEW `view_lowongan_persyaratan`  AS  select `view_lowongan`.`id_pabrik` AS `id_pabrik`,`view_lowongan`.`id_lowongan` AS `id_lowongan`,`view_lowongan`.`nama_pabrik` AS `nama_pabrik`,`view_lowongan`.`alamat` AS `alamat`,`view_lowongan`.`tgl` AS `tgl`,`persyaratan`.`id` AS `id`,`persyaratan`.`nilai_un` AS `nilai_un`,`persyaratan`.`nilai_un_mtk` AS `nilai_un_mtk`,`persyaratan`.`tinggi` AS `tinggi` from (`view_lowongan` join `persyaratan`) where (`view_lowongan`.`id_lowongan` = `persyaratan`.`id_lowongan`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_pabrik` (`id_pabrik`);

--
-- Indexes for table `pabrik`
--
ALTER TABLE `pabrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
  ADD KEY `Id_lowongan` (`Id_lowongan`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`id_pabrik`) REFERENCES `pabrik` (`id`);

--
-- Ketidakleluasaan untuk tabel `pencaker`
--
ALTER TABLE `pencaker`
  ADD CONSTRAINT `pencaker_ibfk_1` FOREIGN KEY (`Id_lowongan`) REFERENCES `lowongan` (`id_lowongan`);

--
-- Ketidakleluasaan untuk tabel `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD CONSTRAINT `persyaratan_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
