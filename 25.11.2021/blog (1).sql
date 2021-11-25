-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 15. Jan 2019 um 08:25
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_header` varchar(50) NOT NULL,
  `post_body` text NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `img_alt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Blog-Beiträge';

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `post_header`, `post_body`, `post_img`, `img_alt`) VALUES
(1, 'PHP', 'PHP ist eine Serverseitige Scriptsprache. Aktuell in der Version 7 ist PHP weit verbreitet und findet Anwendung in CMS, Blog-Systemen und anderen Applikationen.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/320px-PHP-logo.svg.png', 'Das PHP-Logo'),
(2, 'HTML', 'HTML ist eine Auszeichnungssprache, die zum Anzeigen von Webseiten im Internet Verwendung findet.\r\nZusammen mit CSS kann hiermit die Struktur und das Layout einer Website festgehalten werden.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/240px-HTML5_logo_and_wordmark.svg.png', 'Das HTML-Logo'),
(3, 'CSS', 'CSS wird häufig zusammen mit HTML, XML und ähnlichen Auszeichnungssprachen verwendet um die durch diese Auszeichnungssprachen gefertigte Struktur in ein Layout zu bringen.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/170px-CSS3_logo_and_wordmark.svg.png', 'Das Logo von CSS'),
(4, 'JavaScript', 'JavaScript ist eine Skript-Sprache, die meist im Browser verwendet wird um Webseiten dynamischer zu gestalten.\r\nSeit Kurzem gibt es mit Node-JS auch eine serverseitige Variante.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/240px-Unofficial_JavaScript_logo_2.svg.png', 'JavaScript');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
