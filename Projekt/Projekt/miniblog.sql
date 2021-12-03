-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Dez 2021 um 14:48
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
  `autor_passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_autoren`
--

INSERT INTO `tbl_autoren` (`autor_id`, `autor_vorname`, `autor_nachname`, `autor_email`, `autor_passwort`) VALUES
(13, 'Reynaldo', 'Fleger', 'r9@iad.de', '$2y$10$SvJp0yI23cLb2q5Da0oXN.v8eUb.WmcEJ1UXn2sOFtivw8YItX.Ha'),
(14, 'Sebastian', 'Neumann', 'sn@iad.de', '$2y$10$riV1z.6cC9mj80sfdZ9GGeCs1bBGYcxRRoZhWibzohzCkhvdR9RUy'),
(15, 'Karl-Martin', 'Vogel', 'kmv@iad.de', '$2y$10$tuQSUTHVaN9q/83cKT7.DueDIMHiTgyIilbAu7ZrgIcuTqrUGPKly');

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
(3, 'Politik'),
(4, 'Gemischtes');

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
-- Daten für Tabelle `tbl_posts`
--

INSERT INTO `tbl_posts` (`posts_id`, `posts_autor_id_ref`, `posts_kateg_id_ref`, `posts_titel`, `posts_inhalt`, `posts_bild`) VALUES
(47, 14, 1, 'Baden-Württemberg verbietet Großveranstaltungen', 'Das erfuhr die Deutsche Presse-Agentur am Freitag aus Regierungskreisen in Stuttgart. Demnach werde für sämtliche Veranstaltungen wie Fußballspiele oder Kulturveranstaltungen künftig eine \"harte Obergrenze\" von 750 Personen gelten. Die Regeln sollen bereits am Samstag in Kraft treten.\r\n\r\nDavon betroffen wird gleich am Sonntag (15.30 Uhr, LIVE! bei kicker) der VfB Stuttgart sein, der im Kampf um den Klassenerhalt die wichtige Partie gegen Hertha BSC vor der Brust hat. Bis wann diese Regelung gilt, ist bisher nicht bekannt.', 'https://static.spektrum.de/fm/912/Fu__ball_fotolia_110372910_steevy84.jpg?f=2000x857'),
(48, 14, 1, 'Adler siegen auch in München - Berlin verspielt ei', 'Die Adler gewannen auch am Donnerstagabend verdient mit 5:2 (2:1, 2:0, 1:1) und holten damit den neunten Sieg in Serie in München. Bereits am Sonntag hatte das Team von Trainer Pavel Gross in Mannheim gewonnen. Durch den erneuten Sieg zogen die Adler in der Tabelle am EHC vorbei.\r\n\r\nDie Negativserie der Münchner im Dauer-Spitzenduell der DEL mit Mannheim schien schon im Vorfeld am EHC zu nagen. Trainer Don Jackson hatte nach der Pleite am Sonntag in Mannheim Kommentare zum Spiel verweigert und Nationalspieler Matthias Plachta \"Schwalben\" im Spiel unterstellt. Belege dafür lieferte er nicht, strittige Szenen gab es auch keine. \"Sowas gehört zum Sport dazu, und da nehmen sich beide Trainer nichts\", sagte Adler-Keeper Dennis Endras am Donnerstag bei MagentaSport zu den den Psychospielchen der Coaches.', 'https://weserstars-eishockey.de/wp-content/uploads/2021/08/Neuzugaenge_2021_ii.jpg'),
(49, 15, 2, 'Ausflugsziele rund um Erfurt', 'Eingebettet in eine wunderschöne Landschaft im mittleren Ilmtal bietet die Erlebnisregion rund um den Stausee Hohenfelden ihren Besuchern eine unvergleichliche Vielfalt an Möglichkeiten, die Natur zu erleben und den Alltag hinter sich zu lassen:\r\n\r\nEinzigartige Einblicke in vergangene Lebenswelten der Menschen auf dem Land im Thüringer Freilichtmuseum Hohenfelden. Toben oder Relaxen in der Avenida-Therme. Klettern oder Bogenschießen im Aktivpark. Beim Geocachen oder Erlebnisreiten die Natur erkunden. Hier ist für jeden Geschmack und alle Generationen etwas dabei. Bestaunen Sie den Sturzflug eines Adlers aus großer Höhe oder den lautlosen Flug eines Uhus auf dem Adler- und Falkenhof auf der Niederburg in Kranichfeld. Das Rad- und Wanderwegenetz rund um die Erlebnisregion Stausee Hohenfelden verbindet Natur mit Kultur und führt Sie vom Stausee bis in die Landeshauptstadt Erfurt oder in die Kulturstadt Weimar.', 'https://www.erfurt-tourismus.de/fileadmin/_processed_/9/7/csm_1062_hohenfelden_07_fcfe547ae4.jpg'),
(50, 15, 2, 'Fahner Höhe', 'Die Fahner Höhe ist eine geschichtsträchtige Waldlandschaft und bekannt für ihre ertragreichen Obstplantagen. Besonders beliebt: das Selberpflücken von Äpfeln und Kirschen. Natur- und Wanderfreunde, aber auch Radfahrer schätzen die Ursprünglichkeit dieser Kulturlandschaft sehr. Durch den Fahner Höhe Wanderweg wurde eine Verbindung zwischen Thüringens Landeshauptstadt Erfurt und dem Nationalpark Hainich geschaffen. Hier öffnen sich dem Wanderer herrliche Fernblicke in das Thüringer Becken bis zu seinem Randerhebungen, wie Hainleite, Finne, Schrecke, Schmücke und auf den Thüringer Wald mit Inselsberg und den Drei Gleichen. Die Zeit der Obstblüte mit rund einer Million blühenden Obstbäumen ist besonders idyllisch. Der Ausgangspunkt für eine Wanderung durch die Fahner Höhe ist der Walschleber Weg 2 in Gierstädt.', 'https://www.wissenschaft.de/wp-content/uploads/i/S/iStock-901134626-1.jpg'),
(51, 13, 3, '13. Grundgesetzänderungen', 'Bei Grundgesetzänderungen sind bestimmte formale und inhaltliche Voraussetzungen zu erfüllen (vgl.vergleiche Art. Artikel 79 Grundgesetz). Formal ist eine Grundgesetzänderung nur durch ein Gesetz möglich, das den Wortlaut des Grundgesetzes ausdrücklich ändert oder ergänzt (ausgenommen bestimmte völkerrechtliche Verträge). Ein solches Gesetz zur Änderung oder Ergänzung des Wortlautes des Grundgesetzes kann nur mit Zweidrittelmehrheit des Bundestages und des Bundesrates verabschiedet werden. Grundgesetzänderungen, „durch welche die Gliederung des Bundes in Länder, die grundsätzliche Mitwirkung der Länder bei der Gesetzgebung oder die in Artikel 1 und 20 niedergelegten Grundsätze berührt werden“  (Art. Artikel 79 Abs. Absatz 3 Grundgesetz), sind unzulässig. Das Verfahren bei Grundgesetzänderungen entspricht dem üblichen Gesetzgebungsverfahren.', 'https://cdn.pixabay.com/photo/2020/03/24/21/44/deutscher-bundestag-4965585_960_720.jpg'),
(52, 14, 3, 'Der Einbürgerungstest', 'Für die Einbürgerung in Deutschland ist die erfolgreiche Teilnahme am Einbürgerungstest notwendig. Der Thüringer Volkshochschulverband e.V. und einige Thüringer Volkshochschulen führen regelmäßig Einbürgerungstests durch. \r\n\r\nFür das Verfahren der Einbürgerung ist Ihre Einbürgerungsbehörde vor Ort zuständig. Die Einbürgerungsbehörde berät Sie über die Voraussetzungen und Formalitäten zur Erlangung der deutschen Staatsbürgerschaft.\r\n\r\nBitte melden Sie sich mit dem  per E-Mail, Fax oder per Post bei uns an. \r\nSie können sich auch gerne direkt über unsere Webseite anmelden. Die möglichen Termine finden Sie unten. ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-oA7EOKPMQnR7AQynPXnFJbf2sp_G3PvLpw&usqp=CAU'),
(53, 15, 4, 'Jeden Tag ein Bier trinken: Ab welcher Menge wird ', 'Im Schnitt trinkt jeder von uns 100 Liter Bier pro Jahr. Das sind 200 Flaschen. Kann das gesund sein? Ab wie viel Bier pro Tag wird es bedenklich? Wie viele Flaschen Bier wir trinken dürfen, bis es kritisch wird, dürfte überraschen: Sowohl Wissenschaftler als auch die \"Bundeszentrale für gesundheitliche Aufklärung\" sprechen dazu deutliche Empfehlungen aus, wenngleich sich diese leicht unterscheiden. Von mehr als einem halben Liter Bier pro Tag raten sie jedoch alle ab. Wichtig sind außerdem komplett alkoholfreie Tage, um den Körper nicht übermäßig zu belasten. Denn das kann zu schwerwiegenden Erkrankungen führen.\r\n\r\nBuchtipp: Alkoholsucht bekämpfen - Für ein neues Leben ohne Alkohol!\r\n\r\nAuch den Konsum von Bier sollten Sie nicht auf die leichte Schulter nehmen, denn der enthaltene Alkohol ist ein Zellgift, das sich bei zu hohem Konsum sehr negativ auf Geist und Körper auswirkt.', 'https://cdn.pixabay.com/photo/2017/06/24/23/41/beer-2439237__340.jpg'),
(54, 13, 4, 'Fahrradfahren ist gesund und alltagstauglich', 'Wenn Sie beruflich und privat stark eingebunden sind, ist es gar nicht so einfach, regelmäßig Zeit für Sport einzuplanen. Fahrradfahren lässt sich im Gegensatz zu vielen anderen Sportarten wie Joggen, Schwimmen oder Fitnesstraining oft einigermaßen unkompliziert in den normalen Tagesablauf integrieren. Einen erheblichen Teil der Strecken, die wir täglich zurücklegen, können wir ebenso gut mit dem Fahrrad bewältigen: den Weg zum Bäcker, den kleinen Einkauf oder die Fahrt zur Arbeit. Man spart sich den Gang zur jeweiligen Sportstätte, das Duschen und Umziehen... und kann sich ohne großen Aufwand jeden Tag sportlich betätigen.', 'https://cdn.pixabay.com/photo/2013/03/19/18/23/mountain-biking-95032__340.jpg');

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
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT für Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  MODIFY `kateg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
