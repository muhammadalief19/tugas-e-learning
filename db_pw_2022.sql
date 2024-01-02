-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2024 at 03:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pw_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int NOT NULL,
  `id_user` int NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status_absen` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_user`, `jam_masuk`, `jam_keluar`, `tanggal`, `status_absen`) VALUES
(1, 2, '06:41:44', '06:41:51', '2023-03-04', '1'),
(2, 1, '06:42:08', '16:57:11', '2023-03-04', '1'),
(3, 1, '06:44:07', '23:41:02', '2023-03-05', '1'),
(4, 2, '14:27:17', '23:41:20', '2023-03-05', '0'),
(5, 5, '20:59:36', '23:42:03', '2023-03-05', '0'),
(6, 2, '00:03:46', '15:42:40', '2023-03-06', '1'),
(7, 5, '00:04:11', '16:03:32', '2023-03-06', '1'),
(8, 9, '15:44:41', '15:45:36', '2023-03-06', '0'),
(9, 1, '15:45:57', '17:38:31', '2023-03-06', '0'),
(11, 9, '06:28:08', '06:40:43', '2023-03-07', '1'),
(12, 1, '12:38:32', '16:26:31', '2023-03-07', '0'),
(14, 2, '16:12:49', '16:13:24', '2023-03-14', '0'),
(15, 1, '16:14:23', '16:14:44', '2023-03-14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok_barang` int NOT NULL,
  `harga_barang` int NOT NULL,
  `status_barang` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok_barang`, `harga_barang`, `status_barang`) VALUES
(1, 'Aqua', 12, 2000, '1'),
(2, 'Potato', 20, 2000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  `id_produser` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun_rilis` date NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `id_genre`, `id_produser`, `judul`, `tahun_rilis`, `rating`) VALUES
(1, 1, 4, 'Pengabdi Setan ', '2023-02-17', '9'),
(2, 5, 4, 'Pengabdi Setan 2', '2017-09-07', '8');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'Horror'),
(2, 'Comedy'),
(3, 'Romance'),
(4, 'Action'),
(5, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `produser`
--

CREATE TABLE `produser` (
  `id_produser` int NOT NULL,
  `nama_produser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produser`
--

INSERT INTO `produser` (`id_produser`, `nama_produser`) VALUES
(1, 'Manoj Punjabi'),
(2, 'Mira Lesmana'),
(3, 'Raam Soraya'),
(4, 'Joko Anwar'),
(5, 'Raam Punjabi'),
(6, 'Dhamoo Punjabi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` enum('male','famale') NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `gender`, `birthday`, `email`, `telepon`, `password`) VALUES
(1, 'Muhammad Alief', 'male', '2003-08-19', 'aliefmuhammad1908@gmail.com', '082257172988', '6f54f8a284cb56b2914c25df1bf7d125'),
(2, 'Subhan', 'male', '2003-12-07', 'subhanfz@gmail.com', '081231907239', '25d55ad283aa400af464c76d713c07ad'),
(4, 'Yoga', 'male', '2004-02-07', 'vrayogaloreansa@gmail.com', '0851723687', '25d55ad283aa400af464c76d713c07ad'),
(5, 'Muhammad Yigit', 'male', '2022-02-08', 'yigitkhozan1908@gmail.com', '085172368765', '25d55ad283aa400af464c76d713c07ad'),
(6, 'Tolak Ivandi', 'male', '2003-12-27', 'tolakivandi90@gmail.com', '085172368712', '25d55ad283aa400af464c76d713c07ad'),
(7, 'Cristiano Ronaldo', 'male', '1985-02-05', 'cr7@gmail.com', '0876274812', '25d55ad283aa400af464c76d713c07ad'),
(9, 'Saleh', 'male', '2004-04-04', 'salehhuddien0@gmail.com', '087394122041', '25d55ad283aa400af464c76d713c07ad'),
(11, 'santomo', 'male', '2001-02-19', 'santomobarbedoz@gmail.com', '0867486544897', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` enum('male','famale') NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `gender`, `birthday`, `email`, `telepon`, `password`) VALUES
(2, 'Muhammad Alief', 'male', '2003-08-19', 'akunkugajelas@gmail.com', '082257172988', '$2y$10$ws2uVcdGtqiL/xnT4gFU1uHPohJnre/bLo2VBok76almzgzFfnHFy'),
(3, 'Yigit Khozan', 'male', '2022-02-08', 'yigitkhozan1908@gmail.com', '082257172988', '$2y$10$vrw.MDaJitDCGNvBwuwR3.cwxBrpL3JRgALtue/cBfPm0OmIpbNeS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_produser` (`id_produser`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `produser`
--
ALTER TABLE `produser`
  ADD PRIMARY KEY (`id_produser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produser`
--
ALTER TABLE `produser`
  MODIFY `id_produser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`id_produser`) REFERENCES `produser` (`id_produser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
