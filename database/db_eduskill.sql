-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 07:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eduskill`
--

-- --------------------------------------------------------

--
-- Table structure for table `tkategori`
--

CREATE TABLE `tkategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tkategori`
--

INSERT INTO `tkategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'WEB DEVELOPER'),
(2, 'ANDROID DEVELOPER'),
(3, 'UI UX DESIGNER'),
(7, 'DATABASE ADMINISTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `tkursus`
--

CREATE TABLE `tkursus` (
  `id_kursus` varchar(20) NOT NULL,
  `nama_kursus` varchar(255) NOT NULL,
  `deskripsi_kursus` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tkursus`
--

INSERT INTO `tkursus` (`id_kursus`, `nama_kursus`, `deskripsi_kursus`, `id_kategori`) VALUES
('EDU-001', 'HTML DASAR', 'siswa mampu membuat kerangka website', 1),
('EDU-002', 'CSS DASAR', 'siswa mampu membuat website menarik', 1),
('EDU-003', 'JAVASCRIPT DASAR', 'siswa mampu membuat website menjadi interaktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmateri`
--

CREATE TABLE `tmateri` (
  `id_materi` int(11) NOT NULL,
  `id_kursus` varchar(20) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `deskripsi_materi` varchar(255) NOT NULL,
  `file_materi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmateri`
--

INSERT INTO `tmateri` (`id_materi`, `id_kursus`, `nama_materi`, `deskripsi_materi`, `file_materi`) VALUES
(4, 'EDU-001', 'PENDAHULUAN HTML', 'easy learning with HTML', 'asas.pdf'),
(5, 'EDU-001', 'HTML BASIC', 'All HTML documents must start with a document type declaration', 'basichtml.pdf'),
(6, 'EDU-001', 'HTML ELEMENT', 'The HTML element is everything from the start tag to the end tag:', 'taghtml.pdf'),
(7, 'EDU-002', 'CSS INTORDUCTION', 'CSS is the language we use to style an HTML document.', 'css.pdf'),
(8, 'EDU-002', 'CSS SELECTOR', 'A CSS selector selects the HTML element(s) you want to style.', 'selectorcss.pdf'),
(9, 'EDU-003', 'JAVASCRIPT WHERE TO', 'A JavaScript function is a block of JavaScript code, that can be executed when \"called\" for.', 'js.pdf'),
(10, 'EDU-003', 'JAVASCRIPT VARIABLE', 'In this first example, x, y, and z are undeclared variables.', 'varjs.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Siswa','Admin','Owner','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`id`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(1, 'ekoapriliyani11', 'Eko Apriliyani', '0fcf749a835c57d70419ddf653b3f4bc', 'Owner'),
(2, 'owner', 'Owner', '72122ce96bfec66e2396d2e25225d70a', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tkategori`
--
ALTER TABLE `tkategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tkursus`
--
ALTER TABLE `tkursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `kategori` (`id_kategori`);

--
-- Indexes for table `tmateri`
--
ALTER TABLE `tmateri`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_kursus` (`id_kursus`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tkategori`
--
ALTER TABLE `tkategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tmateri`
--
ALTER TABLE `tmateri`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tkursus`
--
ALTER TABLE `tkursus`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tkategori` (`id_kategori`);

--
-- Constraints for table `tmateri`
--
ALTER TABLE `tmateri`
  ADD CONSTRAINT `tmateri_ibfk_1` FOREIGN KEY (`id_kursus`) REFERENCES `tkursus` (`id_kursus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
