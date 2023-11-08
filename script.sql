-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-kylan3il.alwaysdata.net
-- Generation Time: Nov 08, 2023 at 03:05 PM
-- Server version: 10.6.14-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kylan3il_projet_gite`
--

-- --------------------------------------------------------

--
-- Table structure for table `date_reserve`
--

CREATE TABLE `date_reserve` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `date_reserve`
--

INSERT INTO `date_reserve` (`date`) VALUES
                                      ('2023-10-26'),
                                      ('2023-10-27'),
                                      ('2023-10-28'),
                                      ('2023-10-29'),
                                      ('2023-10-30'),
                                      ('2023-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
                        `id` int(11) NOT NULL,
                        `nom_fichier` varchar(255) NOT NULL,
                        `description` text DEFAULT NULL,
                        `date_creation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `nom_fichier`, `description`, `date_creation`) VALUES
                                                                             (14, 'img/figuies3.jpg', NULL, '2023-11-08 13:59:14'),
                                                                             (15, 'img/figuies-3.jpg', NULL, '2023-11-08 13:59:22'),
                                                                             (16, 'img/figuies-4.jpg', NULL, '2023-11-08 13:59:28'),
                                                                             (17, 'img/figuies-5.jpg', NULL, '2023-11-08 13:59:33'),
                                                                             (18, 'img/figuies-6.jpg', NULL, '2023-11-08 13:59:38'),
                                                                             (19, 'img/figuies-9.jpg', NULL, '2023-11-08 13:59:48'),
                                                                             (20, 'img/figuies-10.jpg', NULL, '2023-11-08 13:59:54'),
                                                                             (21, 'img/figuies-11.jpg', NULL, '2023-11-08 14:00:01'),
                                                                             (22, 'img/figuies-12.jpg', NULL, '2023-11-08 14:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                      `login` varchar(255) NOT NULL,
                      `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `passwd`) VALUES
  ('xmouly', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `date_reserve`
--
ALTER TABLE `date_reserve`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
