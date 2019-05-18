-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Mag 18, 2019 alle 14:13
-- Versione del server: 5.7.24
-- Versione PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

DROP TABLE IF EXISTS `prenotazioni`;
CREATE TABLE IF NOT EXISTS `prenotazioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_day` date NOT NULL,
  `to_day` date NOT NULL,
  `days` int(11) NOT NULL,
  `pax` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_stanza` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id`, `from_day`, `to_day`, `days`, `pax`, `nome`, `id_stanza`, `data`) VALUES
(1, '2019-05-01', '2019-05-02', 1, 1, 'Giacomo Leopardi', 1, '2019-05-18 11:09:23');

-- --------------------------------------------------------

--
-- Struttura della tabella `stanze`
--

DROP TABLE IF EXISTS `stanze`;
CREATE TABLE IF NOT EXISTS `stanze` (
  `stanza_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stanza_nome` varchar(32) COLLATE utf8_bin NOT NULL,
  `stanza_des` text COLLATE utf8_bin,
  `stanza_postiletto` int(3) NOT NULL,
  `stanza_prezzonotte` int(4) UNSIGNED NOT NULL,
  `stanza_fkstrutturaid` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`stanza_id`),
  KEY `indice_stanza_nome` (`stanza_nome`),
  KEY `indice_stanza_postiletto` (`stanza_postiletto`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `stanze`
--

INSERT INTO `stanze` (`stanza_id`, `stanza_nome`, `stanza_des`, `stanza_postiletto`, `stanza_prezzonotte`, `stanza_fkstrutturaid`) VALUES
(1, 'stanza1', NULL, 3, 35, 1),
(2, 'stanza2', NULL, 2, 35, 1),
(3, 'stanza3', NULL, 2, 35, 2),
(4, 'stanza4', NULL, 1, 25, 2),
(5, 'stanza5', NULL, 4, 70, 3),
(6, 'stanza6', NULL, 2, 50, 3),
(7, 'stanza7', NULL, 2, 45, 4),
(8, 'stanza8', NULL, 1, 30, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `strutture`
--

DROP TABLE IF EXISTS `strutture`;
CREATE TABLE IF NOT EXISTS `strutture` (
  `struttura_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `struttura_fkutenteid` int(10) UNSIGNED NOT NULL,
  `struttura_nome` varchar(75) COLLATE utf8_bin NOT NULL,
  `struttura_note` tinytext COLLATE utf8_bin NOT NULL,
  `struttura_en` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`struttura_id`),
  KEY `struttura_nome` (`struttura_nome`),
  KEY `struttura_fkutenteid` (`struttura_fkutenteid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `strutture`
--

INSERT INTO `strutture` (`struttura_id`, `struttura_fkutenteid`, `struttura_nome`, `struttura_note`, `struttura_en`) VALUES
(1, 1, 'struttura1', '', 1),
(2, 2, 'struttura2', '', 1),
(3, 1, 'struttura3', '', 1),
(4, 2, 'struttura4', '', 1),
(8, 1, 'Hotel JOJO', '', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

DROP TABLE IF EXISTS `utenti`;
CREATE TABLE IF NOT EXISTS `utenti` (
  `utente_id` int(10) UNSIGNED NOT NULL,
  `utente_email` varchar(75) COLLATE utf8_bin NOT NULL,
  `utente_password` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`utente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`utente_id`, `utente_email`, `utente_password`) VALUES
(1, 'utente1@email.it', 'password1'),
(2, 'utente2@email.it', 'password2');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `strutture`
--
ALTER TABLE `strutture`
  ADD CONSTRAINT `FK_strutture_utenti` FOREIGN KEY (`struttura_fkutenteid`) REFERENCES `utenti` (`utente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
