-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 04:05 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai_perilaku_kerja`
--

CREATE TABLE `tabel_nilai_perilaku_kerja` (
  `ID_PERILAKUKERJA` int(11) NOT NULL,
  `NIP` varchar(18) DEFAULT NULL,
  `ORIENTASI_PELAYANAN` int(11) NOT NULL,
  `INTEGRITAS` int(11) NOT NULL,
  `KOMITMEN` int(11) NOT NULL,
  `DISIPLIN` int(11) NOT NULL,
  `KERJASAMA` int(11) NOT NULL,
  `KEPEMIMPINAN` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `NILAI_RATA_RATA` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_nilai_perilaku_kerja`
--

INSERT INTO `tabel_nilai_perilaku_kerja` (`ID_PERILAKUKERJA`, `NIP`, `ORIENTASI_PELAYANAN`, `INTEGRITAS`, `KOMITMEN`, `DISIPLIN`, `KERJASAMA`, `KEPEMIMPINAN`, `JUMLAH`, `NILAI_RATA_RATA`) VALUES
(9, '333333333333333333', 1, 1, 1, 1, 1, 1, 6, '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_nilai_realisasi_skp`
--

CREATE TABLE `tabel_nilai_realisasi_skp` (
  `ID_REALISASI` int(11) NOT NULL,
  `ID_TARGET` int(11) DEFAULT NULL,
  `RKUANTITAS` int(11) NOT NULL,
  `RKUALITAS` int(11) NOT NULL,
  `RWAKTU` int(11) NOT NULL,
  `RBIAYA` int(11) NOT NULL,
  `NILAI_SKP` decimal(5,2) DEFAULT NULL,
  `TOTAL_SKP` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_nilai_realisasi_skp`
--

INSERT INTO `tabel_nilai_realisasi_skp` (`ID_REALISASI`, `ID_TARGET`, `RKUANTITAS`, `RKUALITAS`, `RWAKTU`, `RBIAYA`, `NILAI_SKP`, `TOTAL_SKP`) VALUES
(54, 8, 9, 9, 9, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pegawai`
--

CREATE TABLE `tabel_pegawai` (
  `NIP` varchar(18) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `PANGKAT_GOLONGAN` varchar(50) NOT NULL,
  `JABATAN` varchar(100) NOT NULL,
  `UNIT_KERJA` varchar(100) NOT NULL,
  `PASSWORD` varchar(16) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pegawai`
--

INSERT INTO `tabel_pegawai` (`NIP`, `NAMA`, `PANGKAT_GOLONGAN`, `JABATAN`, `UNIT_KERJA`, `PASSWORD`, `STATUS`) VALUES
('111111111111111111', 'Saya Admin', '', '', '', 'admin123', 'Admin'),
('222222222222222222', 'Dendy', 'Penata Tingkat I / (III/d)', 'Kepala Seksi Persandian dan Keamanan Informasi', 'Dinas Komunikasi dan Informatika Provinsi Jawa Timur', 'dendy123', 'Pejabat Penilai'),
('333333333333333333', 'Muhammad Sarwani', 'Penata / (III/c)', 'Staff Seksi Persandian dan Keamanan Informasi', 'Dinas Komunikasi dan Informatika Provinsi Jawa Timur', 'sarwani123', 'Pegawai Yang Dinilai');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_relasi_pegawai`
--

CREATE TABLE `tabel_relasi_pegawai` (
  `id` int(11) NOT NULL,
  `id_pejabat` varchar(18) NOT NULL,
  `id_pegawai` varchar(18) NOT NULL,
  `nama_pejabat` varchar(100) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_relasi_pegawai`
--

INSERT INTO `tabel_relasi_pegawai` (`id`, `id_pejabat`, `id_pegawai`, `nama_pejabat`, `nama_pegawai`) VALUES
(2, '222222222222222222', '333333333333333333', 'Dendy', 'Muhammad Sarwani');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_target_skp`
--

CREATE TABLE `tabel_target_skp` (
  `ID_TARGET` int(11) NOT NULL,
  `NIP` varchar(18) DEFAULT NULL,
  `ID_REALISASI` int(11) DEFAULT NULL,
  `KEGIATAN_TUGAS_JABATAN` varchar(100) NOT NULL,
  `KUANTITAS` int(11) NOT NULL,
  `OUTPUT` varchar(20) NOT NULL,
  `KUALITAS` int(11) NOT NULL,
  `WAKTU` int(11) NOT NULL,
  `BIAYA` int(11) NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_target_skp`
--

INSERT INTO `tabel_target_skp` (`ID_TARGET`, `NIP`, `ID_REALISASI`, `KEGIATAN_TUGAS_JABATAN`, `KUANTITAS`, `OUTPUT`, `KUALITAS`, `WAKTU`, `BIAYA`, `STATUS`) VALUES
(8, '333333333333333333', NULL, 'zxczxczxc', 1, 'Laporan', 1, 1, 1, 'Konfirmasi'),
(9, '333333333333333333', NULL, 'asdasdasdasdasd', 1, 'Laporan', 1, 1, 1, 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tugas_tambahan`
--

CREATE TABLE `tabel_tugas_tambahan` (
  `id_tugas_tambahan` int(11) NOT NULL,
  `nama_tugas_tambahan` varchar(100) NOT NULL,
  `nilai_tugas_tambahan` int(11) DEFAULT NULL,
  `nip` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_tugas_tambahan`
--

INSERT INTO `tabel_tugas_tambahan` (`id_tugas_tambahan`, `nama_tugas_tambahan`, `nilai_tugas_tambahan`, `nip`) VALUES
(13, 'Kreativitas', 1, '333333333333333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_nilai_perilaku_kerja`
--
ALTER TABLE `tabel_nilai_perilaku_kerja`
  ADD PRIMARY KEY (`ID_PERILAKUKERJA`),
  ADD KEY `FK_MEMILIKI3` (`NIP`);

--
-- Indexes for table `tabel_nilai_realisasi_skp`
--
ALTER TABLE `tabel_nilai_realisasi_skp`
  ADD PRIMARY KEY (`ID_REALISASI`),
  ADD KEY `FK_MEMILIKI1` (`ID_TARGET`);

--
-- Indexes for table `tabel_pegawai`
--
ALTER TABLE `tabel_pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `tabel_relasi_pegawai`
--
ALTER TABLE `tabel_relasi_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_target_skp`
--
ALTER TABLE `tabel_target_skp`
  ADD PRIMARY KEY (`ID_TARGET`),
  ADD KEY `FK_MEMILIKI2` (`ID_REALISASI`),
  ADD KEY `FK_MEMPUNYAI` (`NIP`);

--
-- Indexes for table `tabel_tugas_tambahan`
--
ALTER TABLE `tabel_tugas_tambahan`
  ADD PRIMARY KEY (`id_tugas_tambahan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_nilai_perilaku_kerja`
--
ALTER TABLE `tabel_nilai_perilaku_kerja`
  MODIFY `ID_PERILAKUKERJA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_nilai_realisasi_skp`
--
ALTER TABLE `tabel_nilai_realisasi_skp`
  MODIFY `ID_REALISASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tabel_relasi_pegawai`
--
ALTER TABLE `tabel_relasi_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_target_skp`
--
ALTER TABLE `tabel_target_skp`
  MODIFY `ID_TARGET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_tugas_tambahan`
--
ALTER TABLE `tabel_tugas_tambahan`
  MODIFY `id_tugas_tambahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_nilai_perilaku_kerja`
--
ALTER TABLE `tabel_nilai_perilaku_kerja`
  ADD CONSTRAINT `FK_MEMILIKI3` FOREIGN KEY (`NIP`) REFERENCES `tabel_pegawai` (`NIP`);

--
-- Constraints for table `tabel_nilai_realisasi_skp`
--
ALTER TABLE `tabel_nilai_realisasi_skp`
  ADD CONSTRAINT `FK_MEMILIKI1` FOREIGN KEY (`ID_TARGET`) REFERENCES `tabel_target_skp` (`ID_TARGET`);

--
-- Constraints for table `tabel_target_skp`
--
ALTER TABLE `tabel_target_skp`
  ADD CONSTRAINT `FK_MEMILIKI2` FOREIGN KEY (`ID_REALISASI`) REFERENCES `tabel_nilai_realisasi_skp` (`ID_REALISASI`),
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`NIP`) REFERENCES `tabel_pegawai` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
