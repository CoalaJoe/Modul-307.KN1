-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 22. Apr 2015 um 06:11
-- Server Version: 5.5.38
-- PHP-Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `KN1`
--
CREATE DATABASE IF NOT EXISTS `KN1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `KN1`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Checkbox einzeln`
--

DROP TABLE IF EXISTS `Checkbox einzeln`;
CREATE TABLE `Checkbox einzeln` (
  `l_Label` int(25) NOT NULL,
  `check_Erste Checkbox` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Checkbox Gruppe`
--

DROP TABLE IF EXISTS `Checkbox Gruppe`;
CREATE TABLE `Checkbox Gruppe` (
  `l_Label` int(11) NOT NULL,
  `check_Wert1` tinyint(1) DEFAULT NULL,
  `check_Wert2` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Datumsfelder`
--

DROP TABLE IF EXISTS `Datumsfelder`;
CREATE TABLE `Datumsfelder` (
  `Geburtstag` date NOT NULL,
  `Jetztige Zeit` time NOT NULL,
  `Unterrichtsbeginn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Vorname` varchar(255) NOT NULL,
  `l_Fach` int(11) NOT NULL,
  `radio_Mathe` text NOT NULL,
  `radio_Englisch` text NOT NULL,
  `l_ToDo Liste` varchar(50) DEFAULT NULL,
  `check_Brot essen` tinyint(1) DEFAULT NULL,
  `check_Kaugummi kauen` tinyint(1) NOT NULL,
  `check_Den Unterricht stören` tinyint(1) NOT NULL,
  `check_KN1 fertig machen` int(11) NOT NULL,
  `pw_Passwort` char(32) NOT NULL
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
  `pw_passwort` char(32) NOT NULL
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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Passwort`
--

DROP TABLE IF EXISTS `Passwort`;
CREATE TABLE `Passwort` (
  `pw_Passwort` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Radio-Button einzeln`
--

DROP TABLE IF EXISTS `Radio-Button einzeln`;
CREATE TABLE `Radio-Button einzeln` (
  `l_Test Label` varchar(25) NOT NULL,
  `radio_test` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Radio-Button Gruppe`
--

DROP TABLE IF EXISTS `Radio-Button Gruppe`;
CREATE TABLE `Radio-Button Gruppe` (
  `l_Test Label` varchar(25) NOT NULL,
  `radio_Erster Testwert` int(11) DEFAULT NULL,
  `radio_Zweiter Testwert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Select Dropdown`
--

DROP TABLE IF EXISTS `Select Dropdown`;
CREATE TABLE `Select Dropdown` (
  `l_Label` varchar(25) NOT NULL,
  `dda_Antwort1` varchar(25) NOT NULL,
  `dde_Antwort2` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Textarea`
--

DROP TABLE IF EXISTS `Textarea`;
CREATE TABLE `Textarea` (
  `Textarea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Textfeld`
--

DROP TABLE IF EXISTS `Textfeld`;
CREATE TABLE `Textfeld` (
  `Text` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Zahlenfelder`
--

DROP TABLE IF EXISTS `Zahlenfelder`;
CREATE TABLE `Zahlenfelder` (
  `Alter` int(11) NOT NULL,
  `Gewicht` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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