-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Feb 2019 um 11:48
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `noob_town`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `ID` int(255) UNSIGNED NOT NULL,
  `User_ID` int(255) UNSIGNED NOT NULL,
  `Artikel_Name` varchar(255) NOT NULL,
  `Preis` double NOT NULL,
  `Zahlungsart` text NOT NULL,
  `Erstellungs_Datum` datetime NOT NULL,
  `Enddatum` datetime NOT NULL,
  `Marke_Hersteller` varchar(255) DEFAULT NULL,
  `Art` varchar(255) DEFAULT NULL,
  `Modell` varchar(255) DEFAULT NULL,
  `Farbe` varchar(255) DEFAULT NULL,
  `Beschreibung` varchar(2000) NOT NULL,
  `Bilder_Link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`ID`, `User_ID`, `Artikel_Name`, `Preis`, `Zahlungsart`, `Erstellungs_Datum`, `Enddatum`, `Marke_Hersteller`, `Art`, `Modell`, `Farbe`, `Beschreibung`, `Bilder_Link`) VALUES
(12, 4, 'dfhgdfh', 12, 'PayPal', '2018-02-03 21:03:31', '2018-02-10 21:03:00', 'dfgd', 'dfg', 'dfg', 'dfgd', 'dfgdfg\r\ndhsd\r\nydfhydfh', 'http://localhost/grid/protect/artikel_img/arc couleur.jpg'),
(13, 4, 'fdgd', 2, 'Barzahlung', '2018-02-03 21:05:29', '2018-02-10 21:05:00', 'dfgd', 'dfg', 'dfg', 'dfg', 'dfg', 'http://localhost/grid/protect/artikel_img/platzhalter.png'),
(14, 6, 'admin', 1.21, 'Barzahlung', '2018-02-03 22:56:16', '2018-02-07 11:25:00', 'admi', 'admi', 'admi', 'admin', 'admin\r\nadmin\r\nadmin\r\nadmin\r\nadmin', 'http://localhost/grid/protect/artikel_img/arc couleur.jpg'),
(15, 7, 'AndrÃ©', 0.01, 'PayPal', '2018-02-05 10:34:36', '2018-02-12 10:33:00', 'Muddl', 'Kind', '1', 'WeiÃŸ', 'Kind, GroÃŸ, Nerfig', 'http://localhost/grid/protect/artikel_img/Andre.jpg'),
(16, 7, 'Flo', -9.99, 'PayPal', '2018-02-05 10:36:43', '2018-02-07 11:34:00', 'Manuella', 'Alien', 'Cyborg', 'Dynamisch', 'Raucher,Dreckig', 'http://localhost/grid/protect/artikel_img/Flo.jpg'),
(18, 6, 'Deinne Mudda', 0, 'PayPal', '2018-02-12 12:10:40', '2018-02-28 13:37:00', 'Deine Oma', 'Gebraucht', 'ur_alt', 'WeiÃŸ', 'so gut wie neu', 'http://localhost/grid/protect/artikel_img/post2.jpg'),
(19, 6, 'Flo', 7.99, 'Bankeinzug', '2018-02-14 09:49:36', '2018-02-21 09:48:00', 'sdf', 'dfg', 'fgbh', 'dfg', 'sdfh', 'http://localhost/grid/protect/artikel_img/Flo.jpg'),
(20, 6, 'Uwe', 12, 'Bankeinzug', '2018-02-19 12:56:36', '2018-02-26 12:56:00', 'sdf', 'daf', 'sdf', 'sdf', 'sdf', 'http://localhost/grid/protect/artikel_img/platzhalter.png'),
(21, 9, 'Lol', 10, 'Bankeinzug', '2018-02-26 12:24:41', '2018-03-05 12:24:00', 'Lol', 'Lol', 'Lol', 'gelb', 'Denk dir was besseres aus', 'http://localhost/grid/protect/artikel_img/platzhalter.png'),
(22, 6, 'Staubsauger', 49.99, 'Barzahlung', '2018-02-26 12:53:26', '2018-03-05 12:51:00', 'AEG', 'Silent', 'VX8-1-Ã–KO', 'Schwarz GrÃ¼n', 'Er ist sehr gut darin graf ausfzusaugen.', 'http://localhost/grid/protect/artikel_img/AEG-VX8-1-Ã–KO-Silent-Staubsauger-mit-Beutel--EEK -A--Schwarz-GrÃ¼n.png'),
(23, 6, 'Lampe', 100, 'Barzahlung', '2018-02-26 12:55:48', '2018-03-05 12:54:00', 'Pixabay', 'Vekotor ', ' strahl Lampe', 'Gelb', 'Dies ist meine Ã¼ber alles geliebte Leselampe Sie hat mir sogar schon 3 mal das leben gerettet', 'http://localhost/grid/protect/artikel_img/index.jpg'),
(24, 6, 'Aldi PC', 250, 'Bankeinzug', '2018-02-26 12:57:42', '2018-03-05 12:56:00', 'Aldi', 'Tower PC', 'Medion', 'Schwarz', 'Ich bin so wie Aldi', 'http://localhost/grid/protect/artikel_img/der-medion-akoya-erscheint-am-25-august-bei-aldi-nord-.jpg'),
(25, 6, 'Mona Lisa', 10000, 'Barzahlung', '2018-02-26 13:01:25', '2018-03-05 12:58:00', 'Leonardo', 'Kunst', 'Uran 236', 'Viele Farben', 'Unsere Politik xD ein fantastisches gemÃ¤lde wenn ich so frei sein darf ?!', 'http://localhost/grid/protect/artikel_img/das-suesse-laecheln-von-mona-lisa-merkel-992f23de-692e-4a5c-a5ad-cad1a87f6283.jpg'),
(123, 7, 'Maxi', 50, 'PayPal', '2018-02-05 10:38:02', '2018-02-12 10:36:00', 'Mama', 'Kindisch', '6', 'Unsicher', 'Handyman', 'http://localhost/grid/protect/artikel_img/Maxi.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `chat_nachrichten`
--

CREATE TABLE `chat_nachrichten` (
  `ID` int(255) UNSIGNED NOT NULL,
  `Nachricht` varchar(500) NOT NULL,
  `Datum_Zeit` datetime NOT NULL,
  `Artikel_ID` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `preise`
--

CREATE TABLE `preise` (
  `ID` int(255) UNSIGNED NOT NULL,
  `User_ID` int(255) UNSIGNED NOT NULL,
  `Artikel_ID` int(255) UNSIGNED NOT NULL,
  `Preis` double NOT NULL,
  `Datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `preise`
--

INSERT INTO `preise` (`ID`, `User_ID`, `Artikel_ID`, `Preis`, `Datum`) VALUES
(1, 4, 14, 6.99, '2018-02-03 23:59:14'),
(2, 4, 14, 6.99, '2018-02-03 23:15:14'),
(4, 6, 15, 6, '2018-02-05 00:00:00'),
(5, 6, 15, 125, '2018-02-12 00:00:00'),
(6, 6, 15, 125, '2018-02-12 00:00:00'),
(7, 6, 15, 125, '2018-02-12 00:00:00'),
(8, 6, 15, 125, '2018-02-12 00:00:00'),
(9, 6, 15, 125, '2018-02-12 00:00:00'),
(10, 6, 15, 125, '2018-02-12 00:00:00'),
(11, 6, 15, 125, '2018-02-12 00:00:00'),
(12, 6, 15, 125, '2018-02-12 00:00:00'),
(13, 6, 15, 125, '2018-02-12 00:00:00'),
(14, 6, 15, 125, '2018-02-12 00:00:00'),
(15, 6, 15, 125, '2018-02-12 00:00:00'),
(16, 6, 15, 125, '2018-02-12 00:00:00'),
(17, 6, 15, 125, '2018-02-12 00:00:00'),
(18, 6, 15, 125, '2018-02-12 00:00:00'),
(19, 6, 15, 125, '2018-02-12 00:00:00'),
(20, 6, 15, 125, '2018-02-12 00:00:00'),
(21, 6, 15, 125, '2018-02-12 00:00:00'),
(22, 6, 15, 125, '2018-02-12 00:00:00'),
(23, 6, 15, 125, '2018-02-12 00:00:00'),
(24, 6, 15, 125, '2018-02-12 00:00:00'),
(25, 6, 15, 125, '2018-02-12 00:00:00'),
(26, 6, 15, 125, '2018-02-12 00:00:00'),
(27, 6, 15, 125, '2018-02-12 00:00:00'),
(28, 6, 15, 125, '2018-02-12 00:00:00'),
(29, 6, 15, 125, '2018-02-12 00:00:00'),
(30, 6, 15, 125, '2018-02-12 00:00:00'),
(31, 6, 123, 80, '2018-02-12 12:22:14'),
(32, 6, 123, 90, '2018-02-12 12:22:52'),
(33, 6, 123, 100.1, '2018-02-12 12:23:58'),
(34, 6, 16, 5, '2018-02-12 12:25:12'),
(35, 8, 18, 5, '2018-02-12 12:28:36'),
(36, 4, 123, 120, '2018-02-12 12:40:50'),
(37, 4, 123, 150, '2018-02-12 12:40:53'),
(38, 9, 18, 50, '2018-02-26 12:22:46'),
(39, 9, 18, 1000, '2018-02-26 12:22:54'),
(40, 9, 20, 16, '2018-02-26 12:34:15'),
(41, 9, 20, 16, '2018-02-26 12:38:51'),
(42, 9, 20, 16, '2018-02-26 12:38:58'),
(43, 9, 20, 17, '2018-02-26 12:39:08'),
(44, 9, 20, 17, '2018-02-26 12:39:22'),
(45, 9, 20, 17, '2018-02-26 12:40:20'),
(46, 9, 20, 17, '2018-02-26 12:41:27'),
(47, 9, 20, 17, '2018-02-26 12:42:06'),
(48, 9, 20, 19.99, '2018-02-26 12:42:40'),
(49, 9, 20, 49.99, '2018-02-26 12:43:41');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(255) UNSIGNED NOT NULL,
  `E-Mail` varchar(255) NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Geburtstag` date NOT NULL,
  `Land` varchar(255) NOT NULL,
  `Ort` varchar(255) NOT NULL,
  `PLZ` int(5) NOT NULL,
  `Hausnummer` varchar(4) NOT NULL,
  `Kennwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Affige Arbeit bei Graf';

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `E-Mail`, `Vorname`, `Nachname`, `Geburtstag`, `Land`, `Ort`, `PLZ`, `Hausnummer`, `Kennwort`) VALUES
(4, 'andre.hagenah@gmail.com', 'AndrÃ©', 'Hagenah', '2018-02-02', 'Deutschland', 'Hemmoor', 21745, '2a', '$2y$10$AKKEV8iI9CF3xEhHvf8BtuVCKUgGv6oATJcMcfuACyT3ZRstSyj0u'),
(6, 'admin@admin.de', 'admin', 'admin', '2018-02-03', 'admin', 'admin', 10101, 'root', '$2y$10$OrHwufUx6RJO2XZeSnXGqeQlU5yoL1O5TIpIDLJ4JgyoDltfMZVk.'),
(7, 'a@b.c', 'Rick', 'Onil', '2018-02-05', 'Deutschland', 'Kemnath', 95478, '28', '$2y$10$j5gendE5kNvln.G/yKDKdeJ3UsmXJIa/vrpPRpKu.cDSUQx6QMgcC'),
(8, 'admin@.de', 'Hi', 'JO', '2018-02-12', 'Deutschland', 'HUMBUG', 9832, '33n', '$2y$10$avozTq8h.RbuZuIxjjJelO5n4u4kwlv8pwQ6rNV/UZzErJJh0LW5i'),
(9, 'maximilian.wintjes@gmail.com', 'Maximilian', 'Wintjes', '1996-12-19', 'Deutschland', 'NeuhausOste', 21785, '10', '$2y$10$v8OAI48coKAJtf7yruFahuMvmpXZmYyPyM4C.4.a.xzrHpgmpc00u');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_chat`
--

CREATE TABLE `user_chat` (
  `ID` int(255) UNSIGNED NOT NULL,
  `User_ID` int(255) UNSIGNED NOT NULL,
  `Nachrichten_ID` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indizes für die Tabelle `chat_nachrichten`
--
ALTER TABLE `chat_nachrichten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Artikel_ID` (`Artikel_ID`);

--
-- Indizes für die Tabelle `preise`
--
ALTER TABLE `preise`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Artikel_ID` (`Artikel_ID`),
  ADD KEY `User_ID_2` (`User_ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `user_chat`
--
ALTER TABLE `user_chat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Nachrichten_ID` (`Nachrichten_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT für Tabelle `chat_nachrichten`
--
ALTER TABLE `chat_nachrichten`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `preise`
--
ALTER TABLE `preise`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `user_chat`
--
ALTER TABLE `user_chat`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `chat_nachrichten`
--
ALTER TABLE `chat_nachrichten`
  ADD CONSTRAINT `chat_nachrichten_ibfk_1` FOREIGN KEY (`Artikel_ID`) REFERENCES `artikel` (`ID`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `preise`
--
ALTER TABLE `preise`
  ADD CONSTRAINT `preise_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `preise_ibfk_3` FOREIGN KEY (`Artikel_ID`) REFERENCES `artikel` (`ID`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `user_chat`
--
ALTER TABLE `user_chat`
  ADD CONSTRAINT `user_chat_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `user_chat_ibfk_2` FOREIGN KEY (`Nachrichten_ID`) REFERENCES `chat_nachrichten` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
