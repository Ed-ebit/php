-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Nov 2021 um 10:26
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `miniblog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_autoren`
--

CREATE TABLE `tbl_autoren` (
  `autor_id` int(11) NOT NULL,
  `autor_vorname` varchar(50) DEFAULT NULL,
  `autor_nachname` varchar(50) NOT NULL,
  `autor_email` varchar(100) NOT NULL,
  `autor_passwort` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_kategorien`
--

CREATE TABLE `tbl_kategorien` (
  `kateg_id` int(11) NOT NULL,
  `kateg_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_kategorien`
--

INSERT INTO `tbl_kategorien` (`kateg_id`, `kateg_name`) VALUES
(1, 'Sport'),
(2, 'Freizeit'),
(3, 'Karl'),
(4, 'nicht Karl');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `posts_id` int(11) NOT NULL,
  `posts_autor_id_ref` int(11) NOT NULL,
  `posts_kateg_id_ref` int(11) NOT NULL,
  `posts_titel` varchar(50) NOT NULL,
  `posts_inhalt` text NOT NULL,
  `posts_bild` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_autoren`
--
ALTER TABLE `tbl_autoren`
  ADD PRIMARY KEY (`autor_id`),
  ADD UNIQUE KEY `autor_email` (`autor_email`);

--
-- Indizes für die Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  ADD PRIMARY KEY (`kateg_id`);

--
-- Indizes für die Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_autoren`
--
ALTER TABLE `tbl_autoren`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  MODIFY `kateg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
