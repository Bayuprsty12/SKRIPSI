-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 08:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring_listrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_penggunaan`
--

CREATE TABLE `log_penggunaan` (
  `id` int(11) NOT NULL,
  `tegangan` float DEFAULT NULL,
  `arus` float DEFAULT NULL,
  `daya` float DEFAULT NULL,
  `energi` float DEFAULT NULL,
  `hasil_fuzzy` varchar(50) NOT NULL,
  `lama_penggunaan` float DEFAULT NULL,
  `tanggal_penggunaan` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_penggunaan`
--

INSERT INTO `log_penggunaan` (`id`, `tegangan`, `arus`, `daya`, `energi`, `hasil_fuzzy`, `lama_penggunaan`, `tanggal_penggunaan`, `timestamp`) VALUES
(1, 220, 1, 220, 3, '', 0, '2023-04-28', '2023-04-27 16:09:41'),
(2, 220, 1, 220, 3, '', 0, '2023-04-28', '2023-04-27 16:15:41'),
(3, 220, 1, 220, 3, '', 0.35, '2023-04-28', '2023-04-27 16:17:33'),
(4, 220, 0.5, 110, 2, '', 0.58, '2023-04-29', '2023-04-29 05:44:38'),
(5, 220, 0.5, 110, 2, '', 0, '2023-04-29', '2023-04-29 05:48:28'),
(6, 220, 0.5, 110, 2, '', 0.17, '2023-04-29', '2023-04-29 05:55:08'),
(7, 220, 0.5, 110, 2, '', 0.27, '2023-04-29', '2023-04-29 05:57:01'),
(8, 220, 2, 440, 3, '', 10, '2023-04-29', '2023-04-29 05:59:26'),
(9, 220, 2, 440, 3, '10', 0, '2023-04-29', '2023-04-29 06:00:32'),
(10, 220, 2, 440, 3, 'Hemat', 10, '2023-04-29', '2023-04-29 06:02:12'),
(11, 220, 0.5, 110, 2, 'Hemat', 0.3, '2023-04-29', '2023-04-29 06:04:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_penggunaan`
--
ALTER TABLE `log_penggunaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_penggunaan`
--
ALTER TABLE `log_penggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
