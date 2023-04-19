-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 05:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cobit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gap`
--

CREATE TABLE `tbl_gap` (
  `id_gap` int(11) NOT NULL,
  `id_indikator` varchar(5) NOT NULL,
  `index_sekarang` decimal(4,2) NOT NULL,
  `diharapkan` int(11) NOT NULL,
  `gap` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gap`
--

INSERT INTO `tbl_gap` (`id_gap`, `id_indikator`, `index_sekarang`, `diharapkan`, `gap`) VALUES
(1, '2', '0.31', 5, '4.69'),
(2, '3', '0.17', 5, '4.83'),
(3, '4', '0.14', 5, '4.86'),
(4, '5', '0.21', 5, '4.79'),
(5, '7', '0.21', 5, '4.79'),
(6, '8', '0.31', 5, '4.69'),
(7, '9', '0.17', 5, '4.83'),
(8, '10', '0.21', 5, '4.79');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_index`
--

CREATE TABLE `tbl_index` (
  `id_index` int(11) NOT NULL,
  `id_indikator` varchar(5) NOT NULL,
  `total_pertanyaan` int(11) NOT NULL,
  `jml_skor_domain` int(11) NOT NULL,
  `index_sekarang` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_index`
--

INSERT INTO `tbl_index` (`id_index`, `id_indikator`, `total_pertanyaan`, `jml_skor_domain`, `index_sekarang`) VALUES
(1, '2', 58, 29, '0.31'),
(2, '3', 58, 29, '0.17'),
(3, '4', 58, 29, '0.14'),
(4, '5', 58, 29, '0.21'),
(5, '7', 58, 29, '0.21'),
(6, '8', 58, 29, '0.31'),
(7, '9', 58, 29, '0.17'),
(8, '10', 58, 29, '0.21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indikator`
--

CREATE TABLE `tbl_indikator` (
  `id_indikator` int(11) NOT NULL,
  `kode_indikator` varchar(5) NOT NULL,
  `nama_indikator` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_indikator`
--

INSERT INTO `tbl_indikator` (`id_indikator`, `kode_indikator`, `nama_indikator`) VALUES
(2, 'AI2', 'Memperoleh dan Memelihara Perangkat Lunak Aplikasi'),
(3, 'AI3', 'Memperoleh dan Memelihara Infrastruktur Teknologi'),
(4, 'AI4', 'Mengaktifkan Operasi dan Penggunaan'),
(5, 'AI5', 'Pengadaan Sumber Daya TI'),
(7, 'DS7', 'Mendidik dan Melatih Pengguna'),
(8, 'DS10', 'Mengelola Masalah'),
(9, 'DS12', 'Mengelola Lingkungan Fisik'),
(10, 'DS13', 'Mengelola Operasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_kuisioner` int(3) NOT NULL,
  `id_responden` varchar(5) NOT NULL,
  `id_pertanyaan` varchar(5) NOT NULL,
  `id_indikator` varchar(5) NOT NULL,
  `nilai_huruf` varchar(15) NOT NULL,
  `nilai_angka` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id_kuisioner`, `id_responden`, `id_pertanyaan`, `id_indikator`, `nilai_huruf`, `nilai_angka`) VALUES
(1, '62', '1', '2', 'Sangat Setuju', 5),
(2, '62', '2', '2', 'Setuju', 4),
(3, '62', '3', '3', 'Ragu-ragu', 3),
(4, '62', '4', '3', 'Tidak Setuju', 2),
(5, '62', '5', '4', 'Sangat Tidak Se', 1),
(6, '62', '6', '4', 'Sangat Setuju', 5),
(7, '62', '7', '5', 'Setuju', 4),
(8, '62', '8', '5', 'Ragu-ragu', 3),
(9, '62', '9', '7', 'Tidak Setuju', 2),
(10, '62', '10', '7', 'Sangat Tidak Se', 1),
(11, '62', '11', '8', 'Sangat Setuju', 5),
(12, '62', '12', '8', 'Setuju', 4),
(13, '62', '13', '9', 'Ragu-ragu', 3),
(14, '62', '14', '9', 'Tidak Setuju', 2),
(15, '62', '15', '10', 'Sangat Tidak Se', 1),
(16, '62', '16', '10', 'Sangat Setuju', 5),
(17, '63', '1', '2', 'Sangat Setuju', 5),
(18, '63', '2', '2', 'Setuju', 4),
(19, '63', '3', '3', 'Ragu-ragu', 3),
(20, '63', '4', '3', 'Tidak Setuju', 2),
(21, '63', '5', '4', 'Sangat Tidak Se', 1),
(22, '63', '6', '4', 'Sangat Tidak Se', 1),
(23, '63', '7', '5', 'Tidak Setuju', 2),
(24, '63', '8', '5', 'Ragu-ragu', 3),
(25, '63', '9', '7', 'Setuju', 4),
(26, '63', '10', '7', 'Sangat Setuju', 5),
(27, '63', '11', '8', 'Sangat Setuju', 5),
(28, '63', '12', '8', 'Setuju', 4),
(29, '63', '13', '9', 'Ragu-ragu', 3),
(30, '63', '14', '9', 'Tidak Setuju', 2),
(31, '63', '15', '10', 'Sangat Tidak Se', 1),
(32, '63', '16', '10', 'Sangat Setuju', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `id_pertanyaan` int(5) NOT NULL,
  `id_indikator` varchar(5) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`id_pertanyaan`, `id_indikator`, `pertanyaan`) VALUES
(1, '2', 'aplikasi\r\n'),
(2, '2', 'Telah melaksanakan proses merancang/ mendefenisikan/  mengadakan dan memelihara software aplikasi dengan baik.'),
(3, '3', 'Telah melaksanakan proses untuk merancang/ mendefinisikan/ mengadakan dan memelihara infrastruktur TI dengan baik'),
(4, '3', 'Telah memperoleh infrastruktur dan dapat menyelesaikan proyek baru tepat waktu dan sesuai anggaran dengan baik'),
(5, '4', 'Telah melaksanakan proses untuk merancang/ mendefenisikan/ memudahkan pengoperasian/ penggunaan hardware dan software dengan baik'),
(6, '4', 'Telah menerapkan sistem kerja yang baik pada pengoperasian hardware dan software dengan baik'),
(7, '5', 'Telah melaksanakan proses untuk merancang/ mendefenisikan/ melakukan pengadaan terhadap sumber daya TI dengan baik'),
(8, '5', 'Telah melakukan pengadaan sumber daya TI dengan baik'),
(9, '7', 'Telah melaksanakan proses untuk pelatihan/ sosialisasi kepada user terkait penggunaan perangkat TI baik hardware maupun software dengan baik'),
(10, '7', 'Telah mampu menggunakan system TI lebih produktif dan aman dengan baik'),
(11, '8', 'Adanya unit dukungan teknis untuk menangani pengelolaan masalah dengan baik'),
(12, '8', 'Telah melaksanakan proses untuk merancang/ mendefinisikan/ mengelola/mengatasi permasalahan TI dengan baik'),
(13, '9', 'Telah memperhatikan aspek lingkungan fisik dengan baik'),
(14, '9', 'Telah melaksanakan proses untuk merancang/ mendefinisikan/ mengelola lingkungan fisik yang terdampak terhadap TI dengan baik (missal : memperhitungkan tingkat kelembaban, suhu ataupun tata ruang dalam data center)'),
(15, '10', 'Telah melakukan pengelolaan hardware dan software dengan baik'),
(16, '10', 'Telah melaksanakan proses untuk merancang/ mendefenisikan/ mengelola pengoperasian/ penggunaan hardware dan software dengan baik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_responden`
--

CREATE TABLE `tbl_responden` (
  `id_responden` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_responden`
--

INSERT INTO `tbl_responden` (`id_responden`, `username`, `password`, `nama`, `jenis_kelamin`) VALUES
(62, 'razak', 'razak', 'Razak Hardana', 'laki-laki'),
(63, 'adli', 'adli', 'Muhammad Adli', 'Laki-laki'),
(64, 'stevany', '123', 'Stevany Claudia', 'Perempuan'),
(65, 'afdhal', 'afdhal', 'afdhal fandu', 'laki-laki'),
(66, 'fauzi', 'fauzi', 'fauzi hidaya', 'laki-laki'),
(67, 'nurfadila', '123', 'Nurfadila', 'Perempuan'),
(68, 'maisan', 'maisan', 'Puspa', 'Perempuan'),
(69, 'leo', 'leo', 'Leonardo Hasibuan', 'laki-laki'),
(70, 'yulio', 'yulio', 'Yulio Maulana', 'laki-laki'),
(71, 'akbar', 'akbar', 'Akbar Hidayat', 'laki-laki'),
(72, 'siti', 'siti', 'Siti Aisyah', 'Perempuan'),
(73, 'elga', 'elga', 'Elga Hidayati', 'Perempuan'),
(74, 'monica', 'monica', 'Monica', 'Perempuan'),
(75, 'dicky', 'dicky', 'Dicky Surya', 'laki-laki'),
(76, 'tika', 'tika', 'Kartika', 'Perempuan'),
(77, 'irvan', 'irvan', 'Irvan', 'laki-laki'),
(78, 'vera', 'vera', 'Vera Putri', 'Perempuan'),
(79, 'ridho', 'ridho', 'Ridho fandu', 'laki-laki'),
(80, 'rezky', 'rezky', 'Rezky', 'laki-laki'),
(81, 'mawar', 'mawar', 'Mawar Merah', 'Perempuan'),
(82, 'aldo', 'aldo', 'aldo kurnia', 'laki-laki'),
(83, 'robi', 'robi', 'robi', 'laki-laki'),
(84, 'aisha', 'aisha', 'aisha', 'Perempuan'),
(85, 'maesa', 'mesa', 'mesa', 'Perempuan'),
(86, 'david', 'david', 'David Kurnia', 'laki-laki'),
(87, 'bima', 'bima', 'Bima Oktovian', 'laki-laki'),
(88, 'reza', 'reza', 'Reza', 'laki-laki'),
(89, 'ega', 'ega', 'Ega', 'Perempuan'),
(90, 'sukma', 'sukma', 'Sukma', 'Perempuan'),
(92, 'dinda', 'dinda', 'dinda haw', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin'),
(2, 'pimpinan', 'pimpinan', 'Pimpinan', 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gap`
--
ALTER TABLE `tbl_gap`
  ADD PRIMARY KEY (`id_gap`);

--
-- Indexes for table `tbl_index`
--
ALTER TABLE `tbl_index`
  ADD PRIMARY KEY (`id_index`);

--
-- Indexes for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indexes for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tbl_responden`
--
ALTER TABLE `tbl_responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gap`
--
ALTER TABLE `tbl_gap`
  MODIFY `id_gap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_index`
--
ALTER TABLE `tbl_index`
  MODIFY `id_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_kuisioner` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `id_pertanyaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_responden`
--
ALTER TABLE `tbl_responden`
  MODIFY `id_responden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
