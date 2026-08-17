-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 26.Mar 2026, 18:34
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `komposuflik`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `grafiky`
--

CREATE TABLE `grafiky` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `pamat` varchar(50) DEFAULT NULL,
  `frekvencia` varchar(50) DEFAULT NULL,
  `tdp` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `grafiky`
--

INSERT INTO `grafiky` (`id`, `nazov`, `obrazok`, `pamat`, `frekvencia`, `tdp`, `cena`) VALUES
(1, 'NVIDIA RTX 4060', 'Hloušek/RTX4060.jpg', '8 GB', '1.83 GHz', '220 W', 350.00),
(2, 'NVIDIA RTX 4070', 'Hloušek/RTX4070.jpg', '12 GB', '1.92 GHz', '245 W', 500.00),
(3, 'AMD RX 7600', 'Hloušek/RX7600.jpg', '8 GB', '2.35 GHz', '165 W', 330.00),
(4, 'AMD RX 7700 XT', 'Hloušek/RX7700XT.jpg', '12 GB', '2.6 GHz', '230 W', 450.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `harddisk`
--

CREATE TABLE `harddisk` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `kapacita` varchar(50) DEFAULT NULL,
  `rpm` varchar(50) DEFAULT NULL,
  `cache` varchar(50) DEFAULT NULL,
  `rozhranie` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `harddisk`
--

INSERT INTO `harddisk` (`id`, `nazov`, `obrazok`, `kapacita`, `rpm`, `cache`, `rozhranie`, `cena`) VALUES
(1, 'Seagate Barracuda 2TB', 'Hloušek/HDD1.jpg', '2 TB', '7200', '256 MB', 'SATA III', 80.00),
(2, 'Western Digital Blue 1TB', 'Hloušek/HDD2.jpg', '1 TB', '5400', '128 MB', 'SATA III', 50.00),
(3, 'Seagate IronWolf 4TB NAS', 'Hloušek/HDD3.jpg', '4 TB', '7200', '256 MB', 'SATA III', 150.00),
(4, 'Western Digital Black 2TB', 'Hloušek/HDD4.jpg', '2 TB', '7200', '256 MB', 'SATA III', 120.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `konfiguracie`
--

CREATE TABLE `konfiguracie` (
  `id` int(11) NOT NULL,
  `procesor` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `skrina` varchar(255) DEFAULT NULL,
  `ssd` varchar(255) DEFAULT NULL,
  `zdroj` varchar(255) DEFAULT NULL,
  `grafika` varchar(255) DEFAULT NULL,
  `harddisk` varchar(255) DEFAULT NULL,
  `zakladne_dosky` varchar(255) DEFAULT NULL,
  `cena_celkova` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `procesory`
--

CREATE TABLE `procesory` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `jadra` varchar(50) DEFAULT NULL,
  `vlakna` varchar(50) DEFAULT NULL,
  `frekvencia` varchar(50) DEFAULT NULL,
  `cache` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `procesory`
--

INSERT INTO `procesory` (`id`, `nazov`, `obrazok`, `jadra`, `vlakna`, `frekvencia`, `cache`, `cena`) VALUES
(1, 'Intel i5-13400', 'Hloušek/I5.jpg', '10', '16', '2.5 GHz', '20 MB', 180.00),
(2, 'Intel i7-13700', 'Hloušek/I7.jpg', '16', '24', '3.1 GHz', '30 MB', 300.00),
(3, 'AMD Ryzen 5 7600', 'Hloušek/Ryzen5.jpg', '6', '12', '3.8 GHz', '32 MB', 220.00),
(4, 'AMD Ryzen 7 7700X', 'Hloušek/Ryzen7.jpg', '8', '16', '4.5 GHz', '36 MB', 350.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `kapacita` varchar(50) DEFAULT NULL,
  `frekvencia` varchar(50) DEFAULT NULL,
  `typ` varchar(50) DEFAULT NULL,
  `latencia` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `ram`
--

INSERT INTO `ram` (`id`, `nazov`, `obrazok`, `kapacita`, `frekvencia`, `typ`, `latencia`, `cena`) VALUES
(1, 'Corsair Vengeance 16GB DDR4', 'Hloušek/RAM1.jpg', '16 GB', '3200 MHz', 'DDR4', '16 CL', 60.00),
(2, 'G.Skill Trident Z 32GB DDR4', 'Hloušek/RAM2.jpg', '32 GB', '3600 MHz', 'DDR4', '18 CL', 120.00),
(3, 'Kingston HyperX 16GB DDR4', 'Hloušek/RAM3.jpg', '16 GB', '3000 MHz', 'DDR4', '15 CL', 55.00),
(4, 'Crucial Ballistix 32GB DDR4', 'Hloušek/RAM4.jpg', '32 GB', '3200 MHz', 'DDR4', '16 CL', 110.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `skrine`
--

CREATE TABLE `skrine` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `typ` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `max_gpu_dlzka` varchar(50) DEFAULT NULL,
  `max_cpu_chladic` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `skrine`
--

INSERT INTO `skrine` (`id`, `nazov`, `obrazok`, `typ`, `material`, `max_gpu_dlzka`, `max_cpu_chladic`, `cena`) VALUES
(1, 'NZXT H510', 'Hloušek/Skrina1.jpg', 'Mid Tower', 'Oceľ a plast', '381 mm', '165 mm', 90.00),
(2, 'Corsair 4000D', 'Hloušek/Skrina2.jpg', 'Mid Tower', 'Oceľ a plast', '360 mm', '170 mm', 95.00),
(3, 'Fractal Design Meshify C', 'Hloušek/Skrina3.jpg', 'Mid Tower', 'Oceľ a plast', '315 mm', '170 mm', 100.00),
(4, 'Cooler Master MasterBox NR600', 'Hloušek/Skrina4.jpg', 'Mid Tower', 'Oceľ a plast', '410 mm', '166 mm', 85.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `ssd`
--

CREATE TABLE `ssd` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `kapacita` varchar(50) DEFAULT NULL,
  `typ` varchar(50) DEFAULT NULL,
  `rychlost_citania` varchar(50) DEFAULT NULL,
  `rychlost_zapisu` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `ssd`
--

INSERT INTO `ssd` (`id`, `nazov`, `obrazok`, `kapacita`, `typ`, `rychlost_citania`, `rychlost_zapisu`, `cena`) VALUES
(1, 'Samsung 970 EVO Plus 1TB', 'Hloušek/SSD1.jpg', '1 TB', 'NVMe M.2', '3500 MB/s', '3300 MB/s', 120.00),
(2, 'Crucial MX500 1TB', 'Hloušek/SSD2.jpg', '1 TB', 'SATA 2.5\"', '560 MB/s', '510 MB/s', 80.00),
(3, 'WD Blue SN570 500GB', 'Hloušek/SSD3.jpg', '500 GB', 'NVMe M.2', '3500 MB/s', '2300 MB/s', 60.00),
(4, 'Kingston A400 480GB', 'Hloušek/SSD4.jpg', '480 GB', 'SATA 2.5\"', '500 MB/s', '450 MB/s', 50.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zakladne_dosky`
--

CREATE TABLE `zakladne_dosky` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `socket` varchar(50) DEFAULT NULL,
  `chipset` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `zakladne_dosky`
--

INSERT INTO `zakladne_dosky` (`id`, `nazov`, `obrazok`, `socket`, `chipset`, `ram`, `format`, `cena`) VALUES
(1, 'ASUS ROG Strix B650-E', 'Hloušek/MOBO1.jpg', 'AM5', 'B650-E', 'DDR5 6400MHz', 'ATX', 250.00),
(2, 'MSI MPG Z790 Carbon', 'Hloušek/MOBO2.jpg', 'LGA1700', 'Z790', 'DDR5 6000MHz', 'ATX', 300.00),
(3, 'Gigabyte X670 AORUS Elite', 'Hloušek/MOBO3.jpg', 'AM5', 'X670', 'DDR5 6200MHz', 'ATX', 280.00),
(4, 'ASRock B760 Steel Legend', 'Hloušek/MOBO4.jpg', 'LGA1700', 'B760', 'DDR4 5333MHz', 'ATX', 220.00);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zdroje`
--

CREATE TABLE `zdroje` (
  `id` int(11) NOT NULL,
  `nazov` varchar(255) DEFAULT NULL,
  `obrazok` varchar(255) DEFAULT NULL,
  `vykon` varchar(50) DEFAULT NULL,
  `efektivita` varchar(50) DEFAULT NULL,
  `modularita` varchar(50) DEFAULT NULL,
  `chladenie` varchar(50) DEFAULT NULL,
  `cena` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `zdroje`
--

INSERT INTO `zdroje` (`id`, `nazov`, `obrazok`, `vykon`, `efektivita`, `modularita`, `chladenie`, `cena`) VALUES
(1, 'Corsair RM750x', 'Hloušek/Corsair_RM750x.jpg', '750 W', '80+ Gold', 'Plne modulárny', 'Tiché', 120.00),
(2, 'Seasonic Focus GX-650', 'Hloušek/Seasonic_GX650.jpg', '650 W', '80+ Gold', 'Plne modulárny', 'Tiché', 110.00),
(3, 'EVGA SuperNOVA 850 G5', 'Hloušek/EVGA_850G5.jpg', '850 W', '80+ Gold', 'Plne modulárny', 'Tiché', 150.00),
(4, 'Cooler Master MWE Gold 650', 'Hloušek/CoolerMaster_650.jpg', '650 W', '80+ Gold', 'Modulárny', 'Tiché', 95.00);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `grafiky`
--
ALTER TABLE `grafiky`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `harddisk`
--
ALTER TABLE `harddisk`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `konfiguracie`
--
ALTER TABLE `konfiguracie`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `procesory`
--
ALTER TABLE `procesory`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `skrine`
--
ALTER TABLE `skrine`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `ssd`
--
ALTER TABLE `ssd`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `zakladne_dosky`
--
ALTER TABLE `zakladne_dosky`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `zdroje`
--
ALTER TABLE `zdroje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `grafiky`
--
ALTER TABLE `grafiky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `harddisk`
--
ALTER TABLE `harddisk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `konfiguracie`
--
ALTER TABLE `konfiguracie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `procesory`
--
ALTER TABLE `procesory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `skrine`
--
ALTER TABLE `skrine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `ssd`
--
ALTER TABLE `ssd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `zakladne_dosky`
--
ALTER TABLE `zakladne_dosky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `zdroje`
--
ALTER TABLE `zdroje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
