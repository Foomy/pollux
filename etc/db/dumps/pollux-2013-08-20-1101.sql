-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. August 2013 um 11:00
-- Server Version: 5.1.66
-- PHP-Version: 5.3.3-7+squeeze16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `pollux`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mediatype_id` int(10) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`id`, `mediatype_id`, `created`, `modified`, `title`) VALUES
(1, 1, '2013-03-03 08:31:25', '0000-00-00 00:00:00', 'Star Trek - Der Film'),
(2, 1, '2013-03-03 08:31:25', '0000-00-00 00:00:00', 'Star Trek II - Der Zorn des Khan'),
(3, 1, '2013-03-03 08:31:25', '0000-00-00 00:00:00', 'Star Trek III - Auf der Suche nach Mr. Spock'),
(4, 1, '2013-07-09 09:45:24', '2013-07-09 09:45:24', 'Star Trek IV - Zurück in die Gegenwart'),
(5, 1, '2013-07-09 09:52:04', '2013-07-09 09:52:04', 'Moon'),
(6, 1, '2013-08-16 14:47:54', '2013-08-16 02:47:54', 'Der Club der toten Dichter');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mediatype`
--

CREATE TABLE IF NOT EXISTS `mediatype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `typename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `mediatype`
--

INSERT INTO `mediatype` (`id`, `created`, `modified`, `typename`) VALUES
(1, '2013-07-06 11:00:00', '0000-00-00 00:00:00', 'movie'),
(2, '2013-07-06 11:00:00', '0000-00-00 00:00:00', 'book');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Daten für Tabelle `meta`
--

INSERT INTO `meta` (`id`, `media_id`, `metakey_id`, `user_id`, `created`, `modified`, `value`) VALUES
(1, 1, 1, 0, '2013-03-03 08:41:49', '0000-00-00 00:00:00', 'Star Trek: The Motion Picture'),
(2, 1, 2, 0, '2013-03-03 08:41:49', '0000-00-00 00:00:00', 'DVD'),
(3, 1, 3, 0, '2013-03-03 08:41:49', '0000-00-00 00:00:00', 'Science-Fiction'),
(4, 1, 4, 0, '2013-03-03 08:41:49', '0000-00-00 00:00:00', 'Robert Wise'),
(5, 1, 5, 0, '2013-03-03 08:41:49', '0000-00-00 00:00:00', 'William Shatner, Leonard Nimoy, DeForest Kelley, James Doohan, George Takei'),
(6, 1, 8, 0, '2013-03-03 08:49:37', '0000-00-00 00:00:00', ' Die U.S.S. Enterprise™ startet wieder in die unendlichen Weiten des Universums - in diesem neuen, hervorragend restaurierten Director''s Cut des original Star Trek™-Films. Diese neue Fassung des legendären Regisseurs Robert Wise enthält verbesserte visuelle Effekte und einen neuen Sound. Als unbekannte Außerirdische drei mächtige klingonische Schiffe zerstören, kehrt Captain James T. Kirk auf die frisch umgebaute U.S.S. Enterprise™ zurück, um das Kommando zu übernehmen. Leonard Nimoy, DeForest Kelly und die Original-Besatzung der beliebten Star Trek™-Serie nehmen mit Warp-Geschwindigkeit den Kampf auf, um die außerirdischen Eindringlinge auf ihrem erbarmungslosen Weg zur Erde zu stoppen.'),
(7, 1, 7, 0, '2013-03-03 08:49:37', '0000-00-00 00:00:00', '131'),
(8, 2, 1, 0, '2013-03-03 08:56:31', '0000-00-00 00:00:00', 'Star Trek II: The Wrath Of Khan'),
(9, 2, 2, 0, '2013-03-03 09:02:07', '0000-00-00 00:00:00', 'DVD'),
(10, 2, 3, 0, '2013-03-03 09:02:07', '0000-00-00 00:00:00', 'Science-Fiction'),
(11, 2, 4, 0, '2013-03-03 09:02:07', '0000-00-00 00:00:00', 'Nicholas Meyer'),
(12, 2, 8, 0, '2013-03-03 09:02:07', '0000-00-00 00:00:00', 'Im 23. Jahrhundert: Das Föderationsraumschiff U.S.S. Enterprise befindet sich auf einem Routine-Manöver. Admiral Kirk scheint bedrückt, da diese Inspektion wahrscheinlich die letzte seiner Laufbahn sein wird. Doch Khan ist zurückgekehrt: Unterstützt von einer Gruppe verbannter Mutanten hat er die Weltraumstation Regula One überfallen, die Top-Secret-Vorrichtung namens Projekt Genesis gestohlen und die Kontrolle eines Föderationsraumschiffs an sich gerissen. Nun plant Khan eine tödliche Falle für seinen alten Feind Kirk ... und droht dem gesamten Universum mit dem Untergang! In einer Nebenrolle Kirstie Alley (Cheers™) in ihrem grandiosem Filmdebüt.'),
(13, 2, 5, 0, '2013-03-03 09:02:07', '0000-00-00 00:00:00', 'William Shatner, Leonard Nimoy, DeForest Kelley, James Doohan, George Takei'),
(14, 2, 7, 0, '2013-03-03 09:02:07', '0000-00-00 00:00:00', '108'),
(15, 1, 9, 0, '2013-03-03 12:39:50', '0000-00-00 00:00:00', '1979'),
(16, 2, 9, 0, '2013-03-03 12:39:50', '0000-00-00 00:00:00', '1982'),
(17, 1, 6, 0, '2013-03-03 12:47:49', '0000-00-00 00:00:00', 'GeneRoddenberry, Alan Dean Foster, Harold Livingston'),
(18, 2, 6, 0, '2013-03-03 12:49:14', '0000-00-00 00:00:00', 'Gene Roddenberry, Harve Bennett, Jack B Sowards, Samuel A. Peeples, Nicholas Meyer, Ramon Sanchez'),
(19, 3, 1, 0, '2013-07-05 22:59:56', '0000-00-00 00:00:00', 'Star Trek III: The Search For Spock'),
(20, 3, 2, 0, '2013-07-05 23:00:21', '0000-00-00 00:00:00', 'DVD'),
(21, 3, 3, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', 'Science-Fiction'),
(22, 3, 4, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', 'Leonard Nimoy'),
(23, 3, 5, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', 'William Shatner, Leonard Nimoy, DeForest Kelley, James Doohan, George Takei, Walter Koenig, Nichelle Nichols'),
(24, 3, 6, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', 'Harve Bennet, Gene Roddenberry'),
(25, 3, 7, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', '101'),
(26, 3, 8, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', 'Admiral Kirks Sieg über Khan und die Erschaffung des Planeten Genesis sind teuer erkauft: Spock ist tot und McCoy offensichtlich verrückt geworden. Der unerwartete Besuch von Sarek, Spocks Vater, liefert eine überaschende Offenbarung: Spocks Lebensessenz ist in McCoys Körper übergegangen. Um seinen Freunden zu helfen, stiehl Kirk die U.S.S. Enterprise und missachtet die Sternenflotten-Quarantäne für Genesis. Doch die Klingonen haben das Geheimnis von Genesis entdeckt und sind auf dem Weg zu einem tödlichen Rendevous mit Kirk...'),
(27, 3, 9, 0, '2013-07-05 23:13:02', '0000-00-00 00:00:00', '1984');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `metakey`
--

CREATE TABLE IF NOT EXISTS `metakey` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mediatype_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `keyname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `metakey`
--

INSERT INTO `metakey` (`id`, `mediatype_id`, `created`, `modified`, `keyname`) VALUES
(1, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'original_title'),
(2, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'medium'),
(3, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'genre'),
(4, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'director'),
(5, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'starring'),
(6, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'writers'),
(7, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'duration'),
(8, 1, '2013-07-05 22:18:02', '0000-00-00 00:00:00', 'blurb'),
(9, 1, '2013-07-05 22:20:54', '0000-00-00 00:00:00', 'release');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `person_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `since` date DEFAULT NULL,
  `due` date DEFAULT NULL,
  PRIMARY KEY (`person_id`,`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `rental`
--


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `can_login` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Daten für Tabelle `user`
--

