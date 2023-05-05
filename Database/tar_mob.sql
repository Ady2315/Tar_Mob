-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 07:31 AM
-- Server version: 8.0.33
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tar_mob`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id_client` int UNSIGNED NOT NULL,
  `nume` varchar(100) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `localitate` varchar(100) NOT NULL,
  `tara` varchar(50) NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id_client`, `nume`, `adresa`, `localitate`, `tara`, `telefon`) VALUES
(3, 'Irimus Iosif Adrian', 'Str Magurele, nr 44', 'Alba Iulia', 'Romania', '0786857353');

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `nr_comanda` int UNSIGNED NOT NULL,
  `id_client` int UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `stare` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lista_comenzi`
--

CREATE TABLE `lista_comenzi` (
  `id_com` int UNSIGNED NOT NULL,
  `nr_comanda` int UNSIGNED NOT NULL,
  `id_produs` int UNSIGNED NOT NULL,
  `pret` double NOT NULL,
  `cantitate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id_produs` int UNSIGNED NOT NULL,
  `id_telefon` int UNSIGNED NOT NULL,
  `stoc` int NOT NULL,
  `pret` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telefoane`
--

CREATE TABLE `telefoane` (
  `id` int UNSIGNED NOT NULL,
  `marca` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `diagonala` double UNSIGNED NOT NULL,
  `rezolutie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tip_display` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `refresh_rate` int UNSIGNED NOT NULL,
  `os` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `procesor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nuclee` int UNSIGNED NOT NULL,
  `mem_interna` int UNSIGNED NOT NULL,
  `mem_ram` int UNSIGNED NOT NULL,
  `baterie` int UNSIGNED NOT NULL,
  `sloturi_sim` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int UNSIGNED NOT NULL,
  `nume_utilizator` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`nr_comanda`),
  ADD KEY `fk_id_client` (`id_client`);

--
-- Indexes for table `lista_comenzi`
--
ALTER TABLE `lista_comenzi`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `fk_nr_comanda` (`nr_comanda`),
  ADD KEY `fk_id_produs` (`id_produs`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id_produs`),
  ADD KEY `fk_id_telefon` (`id_telefon`);

--
-- Indexes for table `telefoane`
--
ALTER TABLE `telefoane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id_utilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id_client` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `nr_comanda` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lista_comenzi`
--
ALTER TABLE `lista_comenzi`
  MODIFY `id_com` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telefoane`
--
ALTER TABLE `telefoane`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_id_client` FOREIGN KEY (`id_client`) REFERENCES `clienti` (`id_client`);

--
-- Constraints for table `lista_comenzi`
--
ALTER TABLE `lista_comenzi`
  ADD CONSTRAINT `fk_id_produs` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id_produs`),
  ADD CONSTRAINT `fk_nr_comanda` FOREIGN KEY (`nr_comanda`) REFERENCES `comenzi` (`nr_comanda`);

--
-- Constraints for table `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `fk_id_telefon` FOREIGN KEY (`id_telefon`) REFERENCES `telefoane` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
