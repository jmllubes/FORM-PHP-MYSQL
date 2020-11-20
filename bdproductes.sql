-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 20-11-2020 a les 09:18:17
-- Versió del servidor: 10.4.11-MariaDB
-- Versió de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `bdproductes`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `client`
--

CREATE TABLE `client` (
  `codi` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `telefon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `client`
--

INSERT INTO `client` (`codi`, `nom`, `telefon`) VALUES
(1, 'joan', 5645456),
(2, 'Marc', 5645457),
(3, 'Cristina', 6436543),
(4, 'Alberto', 654645);

-- --------------------------------------------------------

--
-- Estructura de la taula `detall_ticket`
--

CREATE TABLE `detall_ticket` (
  `codi_p` int(11) NOT NULL,
  `codi_t` int(11) NOT NULL,
  `quantitat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `detall_ticket`
--

INSERT INTO `detall_ticket` (`codi_p`, `codi_t`, `quantitat`) VALUES
(1, 1, 2),
(1, 3, 4),
(2, 1, 2),
(3, 1, 3),
(4, 1, 2),
(5, 3, 3),
(7, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de la taula `productes`
--

CREATE TABLE `productes` (
  `codi` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `preu` decimal(6,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `productes`
--

INSERT INTO `productes` (`codi`, `nom`, `preu`, `stock`) VALUES
(1, 'aigua', '1.00', 30),
(2, 'patates', '1.00', 31),
(3, 'mongetes', '3.50', 32),
(4, 'fessols', '2.30', 33),
(5, 'cocacola', '2.00', 34),
(6, 'llimonada', '2.30', 35),
(7, 'taronjada', '1.30', 36),
(8, 'iogurt', '1.30', 37),
(9, 'formatge', '3.40', 38),
(10, 'ous', '2.00', 39),
(11, 'pipes', '1.00', 123);

-- --------------------------------------------------------

--
-- Estructura de la taula `ticket`
--

CREATE TABLE `ticket` (
  `codi` int(11) NOT NULL,
  `data_ticket` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` decimal(6,2) DEFAULT NULL,
  `codi_c` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `ticket`
--

INSERT INTO `ticket` (`codi`, `data_ticket`, `total`, `codi_c`) VALUES
(1, '2020-11-09 12:31:28', NULL, 1),
(3, '2020-11-13 09:00:23', NULL, 2);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`codi`);

--
-- Índexs per a la taula `detall_ticket`
--
ALTER TABLE `detall_ticket`
  ADD PRIMARY KEY (`codi_p`,`codi_t`),
  ADD KEY `codi_t` (`codi_t`);

--
-- Índexs per a la taula `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`codi`);

--
-- Índexs per a la taula `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`codi`),
  ADD KEY `clientFK` (`codi_c`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `client`
--
ALTER TABLE `client`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la taula `productes`
--
ALTER TABLE `productes`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la taula `ticket`
--
ALTER TABLE `ticket`
  MODIFY `codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `detall_ticket`
--
ALTER TABLE `detall_ticket`
  ADD CONSTRAINT `detall_ticket_ibfk_1` FOREIGN KEY (`codi_t`) REFERENCES `ticket` (`codi`),
  ADD CONSTRAINT `productesFK` FOREIGN KEY (`codi_p`) REFERENCES `productes` (`codi`);

--
-- Restriccions per a la taula `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `clientFK` FOREIGN KEY (`codi_c`) REFERENCES `client` (`codi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
