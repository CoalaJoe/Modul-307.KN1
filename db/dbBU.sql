-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 13. Apr 2015 um 15:53
-- Server Version: 5.5.38
-- PHP-Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `KN1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Dropdowntest`
--

DROP TABLE IF EXISTS `Dropdowntest`;
CREATE TABLE `Dropdowntest` (
`id` int(11) NOT NULL,
  `l_Anrede` varchar(255) NOT NULL,
  `dda_Herr` tinyint(4) DEFAULT NULL,
  `dd_Test` varchar(255) NOT NULL,
  `dde_Frau` tinyint(4) DEFAULT NULL,
  `Vorname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `formular`
--

DROP TABLE IF EXISTS `formular`;
CREATE TABLE `formular` (
`id` int(11) NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Alter` int(10) NOT NULL,
  `Geburtstag` date NOT NULL,
  `Gewicht` float NOT NULL,
  `Zeit` time NOT NULL,
  `Textfeld` text,
  `2.Textfeld` longtext NOT NULL,
  `Coole Zahl` mediumint(9) NOT NULL,
  `Noch ein Textfeld` longtext NOT NULL,
  `pw_passwort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Formular2`
--

DROP TABLE IF EXISTS `Formular2`;
CREATE TABLE `Formular2` (
`id` int(11) NOT NULL,
  `method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Formular3`
--

DROP TABLE IF EXISTS `Formular3`;
CREATE TABLE `Formular3` (
`id` int(11) NOT NULL,
  `method` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Dropdowntest`
--
ALTER TABLE `Dropdowntest`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `formular`
--
ALTER TABLE `formular`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `Formular2`
--
ALTER TABLE `Formular2`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `Formular3`
--
ALTER TABLE `Formular3`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Dropdowntest`
--
ALTER TABLE `Dropdowntest`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `formular`
--
ALTER TABLE `formular`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `Formular2`
--
ALTER TABLE `Formular2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `Formular3`
--
ALTER TABLE `Formular3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;