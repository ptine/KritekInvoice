-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Set 17, 2017 alle 22:26
-- Versione del server: 10.1.25-MariaDB
-- Versione PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kritekinvoice`
--
CREATE DATABASE IF NOT EXISTS `kritekinvoice` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kritekinvoice`;

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `vat` decimal(12,2) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `invoice_id`, `description`, `quantity`, `amount`, `vat`, `total_amount`) VALUES
(1, 1, 'test 1', 1, '5.00', '22.00', '6.10'),
(2, 1, 'test 2', 4, '4.00', '22.00', '19.52'),
(4, 2, 'test 4', 3, '15.00', '22.00', '54.90');

-- --------------------------------------------------------

--
-- Struttura della tabella `invoice_header`
--

CREATE TABLE `invoice_header` (
  `id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `invoice_header`
--

INSERT INTO `invoice_header` (`id`, `invoice_date`, `invoice_number`, `customer_id`) VALUES
(1, '2017-09-17', 451, 4),
(2, '2012-01-01', 452, 6);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9530E2C02989F1FD` (`invoice_id`);

--
-- Indici per le tabelle `invoice_header`
--
ALTER TABLE `invoice_header`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `invoice_header`
--
ALTER TABLE `invoice_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `FK_9530E2C02989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice_header` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
