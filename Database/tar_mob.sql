-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 04:04 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `adauga_comanda` (`id_c` INT, `d` DATE, `st` VARCHAR(50))   BEGIN
INSERT INTO comenzi (id_client, data, stare) VALUES (id_c, d, st);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adauga_factura` (IN `nr_fact` INT, IN `nr_com` INT, IN `id_prod` INT, IN `cant` INT)   BEGIN
    INSERT INTO facturi (nr_fact, nr_comanda, id_produs, cantitate)
    VALUES (nr_fact, nr_com, id_prod, cant);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_comanda` (`id_com` INT, `st` VARCHAR(50))   BEGIN
UPDATE comenzi
SET stare = st
WHERE nr_comanda = id_com;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `total_factura` (`factura_nr` INT) RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
    DECLARE total DECIMAL(10, 2);
    
    SELECT SUM(p.pret * f.cantitate) INTO total
    FROM facturi f
    JOIN produse p ON p.id_produs = f.id_produs
    WHERE f.nr_fact = factura_nr;
    
    RETURN total;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `val_stoc` () RETURNS DECIMAL(10,2) DETERMINISTIC BEGIN
DECLARE total DECIMAL(10, 2);
    
SELECT SUM(pret * stoc) INTO total FROM produse;

RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `afisare_clienti`
-- (See below for the actual view)
--
CREATE TABLE `afisare_clienti` (
`Nume` varchar(100)
,`Localitate` varchar(100)
,`Judet` varchar(50)
,`Adresa` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id_client` int UNSIGNED NOT NULL,
  `nume` varchar(100) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `localitate` varchar(100) NOT NULL,
  `judet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id_client`, `nume`, `adresa`, `localitate`, `judet`, `telefon`) VALUES
(18, 'Adi Irimus', 'Str Cucului, nr 34', 'Alba Iulia', 'Alba', '0748645363'),
(21, 'Andrei Irimus', 'Str. Hini, Nr. 22', 'Cluj Napoca', 'Cluj', '0758647654'),
(22, 'Andrei Irimus', 'Str. Cailor, Nr 12', 'Sebes', 'Alba', '0758647654'),
(23, 'Popescu Ion', 'Str. Almas, Nr 12', 'Aiud', 'Alba', '0753864245');

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
(7, 18, '2023-05-21', 'In tranzit'),
(10, 21, '2023-05-21', 'In curs de procesare'),
(11, 21, '2023-05-22', 'In curs de procesare'),
(13, 22, '2023-04-13', 'Preluat de destinatar'),
(14, 23, '2023-05-25', 'In curs de procesare');

-- --------------------------------------------------------

--
-- Stand-in structure for view `comenzi_recente`
-- (See below for the actual view)
--
CREATE TABLE `comenzi_recente` (
`Nr comanda` int unsigned
,`Data` date
,`Nume client` varchar(100)
,`Stare` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detalii_factura`
-- (See below for the actual view)
--
CREATE TABLE `detalii_factura` (
`Nr factura` int unsigned
,`Data` date
,`Nr comanda` int unsigned
,`Nume client` varchar(100)
,`Cantitate` decimal(32,0)
,`Total` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detalii_produse`
-- (See below for the actual view)
--
CREATE TABLE `detalii_produse` (
`ID` int unsigned
,`Marca` varchar(100)
,`Model` varchar(100)
,`Sistem de operare` varchar(100)
,`Cantitate` int
,`Pret unitar` double
,`Pret total` double
);

-- --------------------------------------------------------

--
-- Table structure for table `facturi`
--

CREATE TABLE `facturi` (
  `id_fact` int UNSIGNED NOT NULL,
  `nr_fact` int UNSIGNED NOT NULL,
  `nr_comanda` int UNSIGNED NOT NULL,
  `id_produs` int UNSIGNED NOT NULL,
  `cantitate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facturi`
--

INSERT INTO `facturi` (`id_fact`, `nr_fact`, `nr_comanda`, `id_produs`, `cantitate`) VALUES
(14, 1, 11, 9, 2),
(15, 1, 11, 11, 3),
(16, 1, 11, 2, 1),
(17, 2, 10, 3, 3),
(18, 2, 10, 13, 1),
(19, 2, 10, 17, 3),
(20, 3, 7, 17, 10),
(21, 3, 7, 5, 1),
(27, 6, 7, 8, 2),
(29, 28, 14, 5, 2),
(30, 28, 14, 9, 1),
(32, 28, 14, 15, 6);

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
(1, 'SAMSUNG', 'GALAXY A14', 6.4, '2408x1080', 'LCD', 'ANDROID', 13, 'Snapdragon 5356k', 8, 64, 4, 5000, 2, 19, 767.28, 'smta146bk_5__c96135ef.avif'),
(2, 'APPLE', 'IPHONE 11', 6.1, '1792 x 828', 'LIQUID RETINA HD', 'IOS', 14, 'A13 Bionic chip, Neural Engine Generatia a treia', 16, 64, 4, 3110, 1, 3, 2399, 'iPhone_11_Black_2-up_Vertical_US-EN_SCREEN_b5865797.webp'),
(3, 'MOTOROLA', 'MOTO G13', 6.53, '1600x720', 'IPS', 'ANDROID', 13, 'MediaTek Helio G85', 8, 128, 4, 5000, 2, 10, 649.9, 'moto_g13_10__7a0accde.avif'),
(5, 'APPLE', 'IPHONE 13', 6.1, '2532x1170', 'SUPER RETINA XDR', 'IOS', 13, 'A15 Bionic chip + 16-core Neural Engine', 6, 128, 4, 3240, 1, 99, 3899, 'Telefon_APPLE_iPhone_13_5G_128GB_PRODUCT_RED_4_.jpg'),
(6, 'MOTOROLA', 'MOTO E22S', 6.5, '1600x720', 'LCD', 'ANDROID', 12, 'MediaTek Helio G37', 8, 64, 4, 5000, 2, 99, 579.99, '156458-1200-auto.png'),
(7, 'HUAWEI', 'NOVA 10', 6.67, '2400x1080', 'OLED', 'ANDROID', 12, 'Qualcomm Snapdragon 778G 4G', 8, 128, 8, 4000, 2, 99, 1799, 'Telefon_HUAWEI_nova_10_128gb_product.png'),
(8, 'HUAWEI', 'P60 PRO', 6.67, '2700x1220', 'OLED', 'ANDROID', 13.1, 'Snapdragon 8+ Gen 1 4G Mobile Platform', 8, 256, 8, 4815, 2, 99, 5799, 'telefon_huawei_p60_pro_black_01_51119a78.webp'),
(9, 'OPPO', 'RENO7 LITE ', 6.43, '2400x1080', 'AMOLED', 'ANDROID', 11, 'Qualcomm Snapdragom 695', 8, 128, 8, 4500, 2, 99, 1469, 'smtreno7zbk-1_bfaf7f8b.webp'),
(10, 'OPPO', 'RENO8 T', 6.43, '2400x1080', 'AMOLED', 'ANDROID', 13, 'MediaTek Helio G99', 8, 128, 8, 5000, 2, 99, 1499, 'smtreno8tbked_ca9fc55d.webp'),
(11, 'SONY', 'XPERIA 1 IV', 6.5, '3088x1440', 'OLED', 'ANDROID', 12, 'Platforma mobila Snapdragon 8 Gen 1', 8, 256, 12, 5000, 2, 99, 5499, 'telefon_sony_xperia_1_iv_5g_09_a67535e5.webp'),
(12, 'SONY', 'XPERIA 5 IV', 6.1, '2500x1080', 'OLED', 'ANDROID', 12, 'Snapdragon 8 Gen 1 Mobile Platform', 8, 128, 8, 5000, 2, 99, 4499, 'telefon-sony-xperia-5-iv-5g-128gb-8gb-ram-dual-sim-green-1_729b4566.webp'),
(13, 'XIAOMI', '12X', 6.28, '1080x2400', 'AMOLED DOTDISPLAY', 'ANDROID', 11, 'Snapdragon 870 7nm, Kryo 585 CPU pana la 3.2GHz', 8, 128, 8, 4500, 2, 99, 2679, 'Telefon_XIAOMI_12X_5G_Blue_2_.webp'),
(14, 'XIAOMI', '11T', 6.67, '1080x2400', 'AMOLED', 'ANDROID', 13, 'MediaTek Dimensity 1200 6nm', 8, 256, 8, 5000, 2, 99, 1889, 'Telefon_XIAOMI_Mi_11T_5G_256GB_8GB_RAM_Dual_SIM_Moonlight_White_7_.webp'),
(15, 'HONOR', 'MAGIC 5 LITE', 6.67, '2400x1080', 'AMOLED', 'ANDROID', 12, 'Qualcomm Snapdragon 695', 8, 128, 6, 5100, 2, 0, 1499, 'telefon_honor_magic5_lite_midnight_black_2__399df9d6.webp'),
(17, 'NOKIA', '1310', 2.1, '300x200', 'LED', 'CEVA', 2, 'Racheta', 1, 0, 0, 1500, 1, 20, 500, 'res_f7eb764947d09b3a9971d9421f2efe27.webp');

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
(10, 'adi_irimus22', 'Adi Irimus', 0x24327924313024326a4668736e4952684c6f3743424e4c5a4b782f676561654156346479306668786b4232697430474b506f35626c4351644c703843, 'adi@irimus.ro'),
(11, 'radu13', 'Radu', 0x24327924313024466c7351647a4467754f632f52745631325a315456754b4174364f74634f30775969343638636a61316e384c525542496979715753, 'radu13@gmail.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vanzari_produse`
-- (See below for the actual view)
--
CREATE TABLE `vanzari_produse` (
`ID` int unsigned
,`Marca` varchar(100)
,`Model` varchar(100)
,`Cantitate vanduta` decimal(32,0)
,`Venit produs` double
);

-- --------------------------------------------------------

--
-- Structure for view `afisare_clienti`
--
DROP TABLE IF EXISTS `afisare_clienti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `afisare_clienti`  AS SELECT `c`.`nume` AS `Nume`, `c`.`localitate` AS `Localitate`, `c`.`judet` AS `Judet`, `c`.`adresa` AS `Adresa` FROM `clienti` AS `c` ORDER BY `c`.`nume` ASC, `c`.`localitate` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `comenzi_recente`
--
DROP TABLE IF EXISTS `comenzi_recente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comenzi_recente`  AS SELECT `c`.`nr_comanda` AS `Nr comanda`, `c`.`data` AS `Data`, `cl`.`nume` AS `Nume client`, `c`.`stare` AS `Stare` FROM (`comenzi` `c` join `clienti` `cl` on((`c`.`id_client` = `cl`.`id_client`))) WHERE (`c`.`data` >= (curdate() - interval 1 month))  ;

-- --------------------------------------------------------

--
-- Structure for view `detalii_factura`
--
DROP TABLE IF EXISTS `detalii_factura`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalii_factura`  AS SELECT `f`.`nr_fact` AS `Nr factura`, `c`.`data` AS `Data`, `c`.`nr_comanda` AS `Nr comanda`, `cl`.`nume` AS `Nume client`, sum(`f`.`cantitate`) AS `Cantitate`, `total_factura`(`f`.`nr_fact`) AS `Total` FROM (((`facturi` `f` join `comenzi` `c` on((`c`.`nr_comanda` = `f`.`nr_comanda`))) join `clienti` `cl` on((`cl`.`id_client` = `c`.`id_client`))) join `produse` `p` on((`p`.`id_produs` = `f`.`id_produs`))) GROUP BY `f`.`nr_fact`, `c`.`data`, `c`.`nr_comanda`, `cl`.`nume``nume`  ;

-- --------------------------------------------------------

--
-- Structure for view `detalii_produse`
--
DROP TABLE IF EXISTS `detalii_produse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalii_produse`  AS SELECT `p`.`id_produs` AS `ID`, `p`.`marca` AS `Marca`, `p`.`model` AS `Model`, `p`.`os` AS `Sistem de operare`, `p`.`stoc` AS `Cantitate`, `p`.`pret` AS `Pret unitar`, sum((`p`.`pret` * `p`.`stoc`)) AS `Pret total` FROM `produse` AS `p` GROUP BY `p`.`id_produs`, `p`.`marca`, `p`.`model``model`  ;

-- --------------------------------------------------------

--
-- Structure for view `vanzari_produse`
--
DROP TABLE IF EXISTS `vanzari_produse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vanzari_produse`  AS SELECT `f`.`id_produs` AS `ID`, `p`.`marca` AS `Marca`, `p`.`model` AS `Model`, sum(`f`.`cantitate`) AS `Cantitate vanduta`, sum((`p`.`pret` * `f`.`cantitate`)) AS `Venit produs` FROM (`facturi` `f` join `produse` `p` on((`p`.`id_produs` = `f`.`id_produs`))) GROUP BY `f`.`id_produs`, `p`.`marca`, `p`.`model` ORDER BY sum((`p`.`pret` * `f`.`cantitate`)) AS `DESCdesc` ASC  ;

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
  MODIFY `id_client` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `nr_comanda` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facturi`
--
ALTER TABLE `facturi`
  MODIFY `id_fact` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id_produs` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_id_client` FOREIGN KEY (`id_client`) REFERENCES `clienti` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facturi`
--
ALTER TABLE `facturi`
  ADD CONSTRAINT `fk_id_produs` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id_produs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nr_comanda` FOREIGN KEY (`nr_comanda`) REFERENCES `comenzi` (`nr_comanda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
