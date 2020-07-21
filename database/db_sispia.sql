-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 03:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sispia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id_akm` int(11) NOT NULL,
  `tahun_ak` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akm`, `tahun_ak`, `status`) VALUES
(3, '2020-2021', 'Tidak Aktif'),
(4, '2019-2020', 'Tidak Aktif'),
(5, '2018-2019', 'Tidak Aktif'),
(6, '2017-2018', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `nip` varchar(20) NOT NULL,
  `nama_kepsek` varchar(128) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `akademik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`nip`, `nama_kepsek`, `jenis_kelamin`, `jabatan`, `no_hp`, `akademik_id`) VALUES
('12180841', 'Sukisno Tino.Spd', 'Laki-Laki', 'Kepala Sekolah', '08120018201', 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `angkatan` varchar(30) NOT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'default.png',
  `kepsek_id` varchar(20) NOT NULL,
  `ijazah` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_siswa`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `alamat`, `status`, `angkatan`, `foto`, `kepsek_id`, `ijazah`, `created_at`) VALUES
('12121212', '10101010', 'Samudra Putra', 'Perempuan', 'Islam', 'Karawang', '1999-01-01', '08120018201', 'Cikampek Indah, Jawa Barat Indonesia', 0, '2017', 'default.png', '12180841', 'ijazah12121212.pdf', '2020-06-14 04:02:25'),
('13192912', '0032987472', 'Saefudin', 'Perempuan', 'Islam', 'Karawang', '1998-01-24', '08120018201', 'Cikampek, Jawa Barat', 0, '2018', 'default.png', '12180841', NULL, '2020-06-19 06:20:35'),
('1516070921', '32987473', 'Putra', 'Laki-Laki', 'Islam', 'Karawang', '1999-08-18', '81300182023', 'Indonesia', 0, '2017', 'default.png', '12180841', NULL, '2020-06-19 20:57:05'),
('1516070930', '0032987472', 'Putri', 'Perempuan', 'Islam', 'Karawang', '1997-10-19', '8120018201', 'Indonesia', 0, '2018', 'default.png', '12180841', NULL, '2020-06-19 20:57:05'),
('1516070955', '0032987478', 'ANI AYU FITRI', 'Perempuan', 'Islam', 'Karawang', '2003-11-27', '08120018201', 'Cikampek, Jawa Barat', 0, '2017', 'default.png', '12180841', 'ijazah1516070955.jpeg', '2020-06-14 07:27:40'),
('1516070975', '0032987478', 'Martin', 'Laki-Laki', 'Islam', 'Karawang', '1998-10-10', '8212018000', 'Indonesia', 0, '2017', 'default.png', '12180841', NULL, '2020-06-19 20:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `no_hp`, `foto`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Saefudin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081282441221', 'img_2020-06-19.jpg', 1, '2020-06-13 17:35:15', NULL),
(3, 'Elixabeth', 'user@gmail.com', 'staff', '827ccb0eea8a706c4c34a16891f84e7b', '089688048342', 'img_2020-06-191.jpg', 2, '2020-06-13 18:49:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akm`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
