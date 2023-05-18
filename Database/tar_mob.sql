-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 04:20 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `inserare_factura` (IN `nr_factura` INT, IN `nr_com` INT, IN `id_prod` INT, IN `cant` INT)   BEGIN
  DECLARE pret_produs DOUBLE;

  SELECT pret_total_produs(id_prod, cant, pret) INTO pret_produs FROM produse WHERE id_produs = id_prod;

  INSERT INTO facturi (nr_fact, nr_comanda, id_produs, pret, cantitate) VALUES (nr_factura, nr_com, id_prod, pret_produs, cant);

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `pret_total_produs` (`id` INT, `cant` INT, `pret_p` DOUBLE) RETURNS DOUBLE DETERMINISTIC BEGIN
SELECT pret into @pret_p FROM produse WHERE id_produs=id;
SET @pret_t = (cant * @pret_p) * 1.10;
RETURN @pret_t;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id_client` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `nume` varchar(100) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `localitate` varchar(100) NOT NULL,
  `judet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id_client`, `id_user`, `nume`, `adresa`, `localitate`, `judet`, `telefon`) VALUES
(4, 2, 'Irimus Adrian', 'Str. Lalelelor, nr. 49', 'Alba Iulia', 'Alba', '0770181430'),
(5, 3, 'Irimus Andrei', 'Str. Aleei, Nr. 12, bl. A4, ap. 4', 'Sebes', 'Alba', '0745248642'),
(6, 4, 'Popescu Alex', 'Str. Hanului, Nr. 98', 'Turda', 'Cluj', '0746836832');

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

--
-- Dumping data for table `comenzi`
--

INSERT INTO `comenzi` (`nr_comanda`, `id_client`, `data`, `stare`) VALUES
(1, 4, '2019-05-23', 'In tranzit'),
(2, 5, '2022-09-14', 'In curs de pregatire'),
(3, 6, '2023-04-03', 'Spre destinatia clientului');

-- --------------------------------------------------------

--
-- Table structure for table `facturi`
--

CREATE TABLE `facturi` (
  `id_fact` int UNSIGNED NOT NULL,
  `nr_fact` int UNSIGNED NOT NULL,
  `nr_comanda` int UNSIGNED NOT NULL,
  `id_produs` int UNSIGNED NOT NULL,
  `pret` double NOT NULL,
  `cantitate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facturi`
--

INSERT INTO `facturi` (`id_fact`, `nr_fact`, `nr_comanda`, `id_produs`, `pret`, `cantitate`) VALUES
(1, 10001, 1, 3, 700, 1),
(2, 0, 2, 3, 0, 4),
(3, 0, 3, 2, 6330721.100000001, 10),
(4, 10002, 3, 1, 647354.136, 5),
(6, 10003, 3, 1, 647354.136, 5),
(7, 10005, 2, 1, 0, 5),
(8, 10005, 2, 1, 1, 5),
(9, 10005, 2, 1, 647354.136, 5),
(10, 10005, 2, 1, 647354.136, 5),
(11, 10006, 2, 1, 647354.136, 5),
(12, 10007, 2, 1, 4220.04, 5),
(13, 10007, 3, 2, 26389.000000000004, 10);

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id_produs` int UNSIGNED NOT NULL,
  `marca` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `diagonala` double UNSIGNED NOT NULL,
  `rezolutie` varchar(100) NOT NULL,
  `tip_display` varchar(50) NOT NULL,
  `os` varchar(100) NOT NULL,
  `versiune_os` double UNSIGNED NOT NULL,
  `procesor` varchar(100) NOT NULL,
  `nuclee` int UNSIGNED NOT NULL,
  `mem_interna` int UNSIGNED NOT NULL,
  `mem_ram` int UNSIGNED NOT NULL,
  `baterie` int UNSIGNED NOT NULL,
  `sloturi_sim` int UNSIGNED NOT NULL,
  `stoc` int NOT NULL,
  `pret` double NOT NULL,
  `imagine` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id_produs`, `marca`, `model`, `diagonala`, `rezolutie`, `tip_display`, `os`, `versiune_os`, `procesor`, `nuclee`, `mem_interna`, `mem_ram`, `baterie`, `sloturi_sim`, `stoc`, `pret`, `imagine`) VALUES
(1, 'SAMSUNG', 'GALAXY A14', 6.4, '2408x1080', 'LCD', 'ANDROID', 13, 'Snapdragon 5356k', 8, 64, 4, 5000, 2, 5, 767.28, 'smta146bk_5__c96135ef.avif'),
(2, 'APPLE', 'IPHONE 11', 6.1, '1792 x 828', 'LIQUID RETINA HD', 'IOS', 14, 'A13 Bionic chip, Neural Engine Generatia a treia', 16, 64, 4, 3110, 1, 3, 2399, 'iPhone_11_Black_2-up_Vertical_US-EN_SCREEN_b5865797.webp'),
(3, 'MOTOROLA', 'MOTO G13', 6.53, '1600x720', 'IPS', 'ANDROID', 13, 'MediaTek Helio G85', 8, 128, 4, 5000, 2, 10, 649.9, 'moto_g13_10__7a0accde.avif'),
(4, 'SAMSUNG', 'GALAXY A04S', 6.5, '720x1600', 'LCD', 'ANDROID', 13, 'Snapdragon 865+', 8, 32, 3, 5000, 2, 99, 599.99, 'telefon-samsung-galaxy-a04s-black-01_fb445fab.jpg'),
(5, 'APPLE', 'IPHONE 13', 6.1, '2532x1170', 'SUPER RETINA XDR', 'IOS', 13, 'A15 Bionic chip + 16-core Neural Engine', 6, 128, 4, 3240, 1, 99, 3.899, 'Telefon_APPLE_iPhone_13_5G_128GB_PRODUCT_RED_4_.jpg'),
(6, 'MOTOROLA', 'MOTO E22S', 6.5, '1600x720', 'LCD', 'ANDROID', 12, 'MediaTek Helio G37', 8, 64, 4, 5000, 2, 99, 579.99, '156458-1200-auto.png'),
(7, 'HUAWEI', 'NOVA 10', 6.67, '2400x1080', 'OLED', 'ANDROID', 12, 'Qualcomm Snapdragon 778G 4G', 8, 128, 8, 4000, 2, 99, 1.799, 'Telefon_HUAWEI_nova_10_128gb_product.png'),
(8, 'HUAWEI', 'P60 PRO', 6.67, '2700x1220', 'OLED', 'ANDROID', 13.1, 'Snapdragon 8+ Gen 1 4G Mobile Platform', 8, 256, 8, 4815, 2, 99, 5.799, 'telefon_huawei_p60_pro_black_01_51119a78.webp'),
(9, 'OPPO', 'RENO7 LITE ', 6.43, '2400x1080', 'AMOLED', 'ANDROID', 11, 'Qualcomm Snapdragom 695', 8, 128, 8, 4500, 2, 99, 1.469, 'smtreno7zbk-1_bfaf7f8b.webp'),
(10, 'OPPO', 'RENO8 T', 6.43, '2400x1080', 'AMOLED', 'ANDROID', 13, 'MediaTek Helio G99', 8, 128, 8, 5000, 2, 99, 1.499, 'smtreno8tbked_ca9fc55d.webp'),
(11, 'SONY', 'XPERIA 1 IV', 6.5, '3088x1440', 'OLED', 'ANDROID', 12, 'Platforma mobila Snapdragon 8 Gen 1', 8, 256, 12, 5000, 2, 99, 5.499, 'telefon_sony_xperia_1_iv_5g_09_a67535e5.webp'),
(12, 'SONY', 'XPERIA 5 IV', 6.1, '2500x1080', 'OLED', 'ANDROID', 12, 'Snapdragon 8 Gen 1 Mobile Platform', 8, 128, 8, 5000, 2, 99, 4.499, 'telefon-sony-xperia-5-iv-5g-128gb-8gb-ram-dual-sim-green-1_729b4566.webp'),
(13, 'XIAOMI', '12X', 6.28, '1080x2400', 'AMOLED DOTDISPLAY', 'ANDROID', 11, 'Snapdragon 870 7nm, Kryo 585 CPU pana la 3.2GHz', 8, 128, 8, 4500, 2, 99, 2.679, 'Telefon_XIAOMI_12X_5G_Blue_2_.webp'),
(14, 'XIAOMI', '11T', 6.67, '1080x2400', 'AMOLED', 'ANDROID', 13, 'MediaTek Dimensity 1200 6nm', 8, 256, 8, 5000, 2, 99, 1.889, 'Telefon_XIAOMI_Mi_11T_5G_256GB_8GB_RAM_Dual_SIM_Moonlight_White_7_.webp'),
(15, 'HONOR', 'MAGIC 5 LITE', 6.67, '2400x1080', 'AMOLED', 'ANDROID', 12, 'Qualcomm Snapdragon 695', 8, 128, 6, 5100, 2, 0, 1.499, 'telefon_honor_magic5_lite_midnight_black_2__399df9d6.webp');

--
-- Triggers `produse`
--
DELIMITER $$
CREATE TRIGGER `produse_upper` BEFORE INSERT ON `produse` FOR EACH ROW SET NEW.marca = upper(NEW.marca),
    NEW.model = upper(NEW.model),
    NEW.tip_display = UPPER(NEW.tip_display),
	NEW.os = UPPER(NEW.os)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int UNSIGNED NOT NULL,
  `nume_utilizator` varchar(50) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `parola` varbinary(200) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilizator`
--

INSERT INTO `utilizator` (`id_utilizator`, `nume_utilizator`, `nume`, `parola`, `email`) VALUES
(1, 'Admin', 'Admin', 0x243279243130244775756b6c385950736e35525253656a35526547354f61505a6b2e374363444d51486d772f667139584e54416f736d6261542f6d71, 'admin@root.com'),
(2, 'adi_irimus22', 'Adi Irimus', 0x24327924313024764e5541656c6558714b6337676d4a724834706e612e5068333635744f58513231465879354e42454f4949626e445461364f79416d, 'adi@irimus.ro'),
(3, 'andrei_irimus7', 'Andrei Irimus', 0x24327924313024573872325678314e34464a74576b364c6e336133364f6e6873574e734c784946564869686c35323272712e7038396d577463514665, 'andrei@irimus.ro'),
(4, 'alex_popescu', 'Alex Popescu', 0x243279243130246f70696937723547684633576a48487059557375427559495739434a4d4b47764d5375694f4e6e3166584c635a725a4e7433633253, 'alex@popescu.ro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`nr_comanda`),
  ADD KEY `fk_id_client` (`id_client`);

--
-- Indexes for table `facturi`
--
ALTER TABLE `facturi`
  ADD PRIMARY KEY (`id_fact`),
  ADD KEY `fk_nr_comanda` (`nr_comanda`),
  ADD KEY `fk_id_produs` (`id_produs`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id_produs`);

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
  MODIFY `id_client` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `nr_comanda` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facturi`
--
ALTER TABLE `facturi`
  MODIFY `id_fact` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id_produs` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clienti`
--
ALTER TABLE `clienti`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `utilizator` (`id_utilizator`);

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_id_client` FOREIGN KEY (`id_client`) REFERENCES `clienti` (`id_client`);

--
-- Constraints for table `facturi`
--
ALTER TABLE `facturi`
  ADD CONSTRAINT `fk_id_produs` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id_produs`),
  ADD CONSTRAINT `fk_nr_comanda` FOREIGN KEY (`nr_comanda`) REFERENCES `comenzi` (`nr_comanda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
