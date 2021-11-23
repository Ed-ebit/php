-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Nov 2021 um 08:52
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
-- Datenbank: `restaurant`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_benutzer`
--

CREATE TABLE `tbl_benutzer` (
  `bntzr_id` int(11) NOT NULL,
  `bntzr_name` varchar(100) NOT NULL,
  `bntzr_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_gerichte`
--

CREATE TABLE `tbl_gerichte` (
  `gerte_id` int(11) NOT NULL,
  `gerte_name` varchar(255) NOT NULL,
  `gerte_beschreibung` text NOT NULL,
  `gerte_kateg_id_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_gerichte`
--

INSERT INTO `tbl_gerichte` (`gerte_id`, `gerte_name`, `gerte_beschreibung`, `gerte_kateg_id_ref`) VALUES
(1, 'Hummus', 'Leckere Aufstrich aus Kircherbsen', 2),
(2, 'Falafel', 'Bällchen aus Kircherbsenmehl', 4),
(3, 'Bratlinge', 'Bratlinge aus roten Bohnen', 4),
(4, 'Rosmarienkartoffeln', 'Im Ofen gebacken', 4),
(5, 'Zucchiniboote', 'Gefüllte Zucchinihälften, im Ofen gebacken', 4),
(6, 'Focaccia', 'Mit Oliven und Kirschtomaten und vielen frischen Kräutern', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_kategorien`
--

CREATE TABLE `tbl_kategorien` (
  `kateg_id` int(11) NOT NULL,
  `kateg_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_kategorien`
--

INSERT INTO `tbl_kategorien` (`kateg_id`, `kateg_name`) VALUES
(1, 'Suppen'),
(2, 'Aufstriche'),
(3, 'Kuchen'),
(4, 'Hauptgericht'),
(5, 'Salate'),
(6, 'Nachspeisen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_benutzer`
--
ALTER TABLE `tbl_benutzer`
  ADD PRIMARY KEY (`bntzr_id`);

--
-- Indizes für die Tabelle `tbl_gerichte`
--
ALTER TABLE `tbl_gerichte`
  ADD PRIMARY KEY (`gerte_id`);

--
-- Indizes für die Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  ADD PRIMARY KEY (`kateg_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_benutzer`
--
ALTER TABLE `tbl_benutzer`
  MODIFY `bntzr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tbl_gerichte`
--
ALTER TABLE `tbl_gerichte`
  MODIFY `gerte_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  MODIFY `kateg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
