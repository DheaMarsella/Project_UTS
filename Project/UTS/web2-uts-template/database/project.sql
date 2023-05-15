-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 05:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `ukuran` varchar(45) DEFAULT NULL,
  `warna` varchar(45) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(32) DEFAULT NULL,
  `tipe_pakaian_id` int(45) DEFAULT NULL,
  `image_location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`id`, `nama`, `ukuran`, `warna`, `stok`, `harga`, `tipe_pakaian_id`, `image_location`) VALUES
(1, 'Jaket', 'XL', 'Hitam', 20, 200000, 2, '../uploads/jaket.jpg'),
(2, 'Kaos Polosan Putih ', 'XL', 'Hitam', 20, 30000, 2, '../uploads/kaos.jpg'),
(11, 'Jeans', 'L', 'Putih', 20, 35000, 6, '../uploads/jeans.jpg'),
(12, 'Kemeja', 'M', 'Biru', 8, 200000, 2, '../uploads/kemeja.jpg'),
(13, 'Celana', 'XL', 'Hitam', 7, 150000, 7, '../uploads/celana.jpg'),
(18, 'Celana Boomber', 'XL', 'Putih', 47, 100000, 7, '../uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pakaian_id` int(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `pakaian_id`, `quantity`) VALUES
(5, '2023-05-07', 2, 190),
(7, '2023-05-09', 1, 59),
(12, '2023-05-13', 12, 30),
(13, '2023-05-26', 13, 8),
(21, '2023-05-13', 2, 2),
(25, '2023-05-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_pakaian`
--

CREATE TABLE `tipe_pakaian` (
  `id` int(11) NOT NULL,
  `tipe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_pakaian`
--

INSERT INTO `tipe_pakaian` (`id`, `tipe`) VALUES
(2, 'Kaos'),
(6, 'Jeans'),
(7, 'Celana'),
(10, 'Baju'),
(12, 'Dress'),
(14, 'Rok'),
(16, 'Gamis'),
(25, 'Mukena18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pakaian_1_idx` (`tipe_pakaian_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan1` (`pakaian_id`);

--
-- Indexes for table `tipe_pakaian`
--
ALTER TABLE `tipe_pakaian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tipe_pakaian`
--
ALTER TABLE `tipe_pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD CONSTRAINT `fk_pakaian_tipe1` FOREIGN KEY (`tipe_pakaian_id`) REFERENCES `tipe_pakaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan1` FOREIGN KEY (`pakaian_id`) REFERENCES `pakaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
