-- phpMyAdmin SQL Dump
-- version 2.6.0-rc1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 05. September 2004 um 23:10
-- Server Version: 4.0.20
-- PHP-Version: 4.3.8
-- 
-- Datenbank: `partysoke`
-- 
CREATE DATABASE `partysoke`;
USE partysoke;

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `events`
-- 

CREATE TABLE `events` (
  `id` int(6) NOT NULL auto_increment,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM COMMENT='Veranstaltungen' AUTO_INCREMENT=1 ;

-- 
-- Daten für Tabelle `events`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `groups`
-- 

CREATE TABLE `groups` (
  `id` int(5) NOT NULL auto_increment,
  `group` varchar(25) NOT NULL default '',
  `info` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM COMMENT='Mitglieder Gruppen' AUTO_INCREMENT=1 ;

-- 
-- Daten für Tabelle `groups`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `navigation`
-- 

CREATE TABLE `navigation` (
  `id` int(4) default NULL,
  `sub_id` int(4) default NULL,
  `sub_name` char(25) default NULL,
  `link_name` char(50) default NULL,
  `link` char(50) default NULL,
  `visible` enum('y','n') NOT NULL default 'y'
) TYPE=MyISAM COMMENT='Navigations Menü';

-- 
-- Daten für Tabelle `navigation`
-- 

INSERT INTO `navigation` VALUES (0, NULL, NULL, 'HOME', 'home', 'y');
INSERT INTO `navigation` VALUES (10, NULL, NULL, 'NEWS', 'news', 'y');
INSERT INTO `navigation` VALUES (20, NULL, NULL, 'EVENTS', 'events', 'y');
INSERT INTO `navigation` VALUES (20, 1, 'events', 'Übersicht', 'view', 'y');
INSERT INTO `navigation` VALUES (20, 2, 'events', '&nbsp;', NULL, 'y');
INSERT INTO `navigation` VALUES (20, 3, 'events', 'Saale-Orla-Kreis', 'sok', 'y');
INSERT INTO `navigation` VALUES (20, 4, 'events', 'Saalfeld-Rudolstadt', 'slf', 'y');
INSERT INTO `navigation` VALUES (30, NULL, NULL, 'NIGHTGUIDE', 'nightguide', 'y');
INSERT INTO `navigation` VALUES (30, 1, 'nightguide', 'Bars', 'bars', 'y');
INSERT INTO `navigation` VALUES (30, 2, 'nightguide', 'Discotheken', 'discotheken', 'y');
INSERT INTO `navigation` VALUES (30, 3, 'nightguide', 'Locations', 'locations', 'y');
INSERT INTO `navigation` VALUES (40, NULL, NULL, 'KINO', 'cinema', 'y');
INSERT INTO `navigation` VALUES (40, 1, 'cinema', 'Neu im Kino', 'new', 'y');
INSERT INTO `navigation` VALUES (40, 2, 'cinema', 'Film Archiv', 'archiv', 'y');
INSERT INTO `navigation` VALUES (40, 3, 'cinema', 'Programm', 'programm', 'y');
INSERT INTO `navigation` VALUES (50, NULL, NULL, 'GALERIE', 'galerie', 'y');
INSERT INTO `navigation` VALUES (60, NULL, NULL, 'FORUM', 'forum', 'y');
INSERT INTO `navigation` VALUES (70, 4, 'shop', 'Tickets', 'tickets', 'y');
INSERT INTO `navigation` VALUES (70, NULL, NULL, 'SHOP', 'shop', 'y');
INSERT INTO `navigation` VALUES (70, 1, 'shop', 'CD', 'cd', 'y');
INSERT INTO `navigation` VALUES (70, 2, 'shop', 'DVD', 'dvd', 'y');
INSERT INTO `navigation` VALUES (70, 3, 'shop', 'Shirts', 'shirts', 'y');
INSERT INTO `navigation` VALUES (80, NULL, NULL, 'LINKS', 'links', 'y');
INSERT INTO `navigation` VALUES (90, NULL, NULL, 'GÄSTEBUCH', 'gbook', 'y');
INSERT INTO `navigation` VALUES (100, NULL, NULL, 'KONTAKT', 'contact', 'y');
INSERT INTO `navigation` VALUES (100, 1, 'contact', 'Impressum', 'copyright', 'y');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `news`
-- 

CREATE TABLE `news` (
  `id` int(4) NOT NULL auto_increment,
  `date` datetime default NULL,
  `title` varchar(150) NOT NULL default '',
  `content` text NOT NULL,
  `art` enum('general','members') NOT NULL default 'general',
  `source` varchar(25) NOT NULL default '',
  `link_target` enum('_blank','_self') NOT NULL default '_blank',
  `link` varchar(150) default NULL,
  `picture_link` varchar(150) default NULL,
  `picture_align` enum('left','right') default NULL,
  `picture_text` varchar(25) NOT NULL default '',
  `user` varchar(25) NOT NULL default '',
  `visible` enum('y','n') NOT NULL default 'y',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM COMMENT='News' AUTO_INCREMENT=3 ;

-- 
-- Daten für Tabelle `news`
-- 

INSERT INTO `news` VALUES (1, '2004-07-31 21:00:00', 'Internet Explorer File not found BuG', 'Versuchen Sie Folgendes: Klicken Sie auf Aktualisieren oder wiederholen Sie den Vorgang später.\r\nFalls Sie die Adresse der Seite manuell in der Adressleiste eingegeben haben, stellen Sie sicher, dass die Adresse keine Tippfehler enthält. ', 'general', 'Internet Explorer', '_self', 'http://www.microsoft.de', 'http://localhost/partysoke/_new/themes/orange/images/map_slf.gif', 'left', 'Saale-Orla-Kreis', 'maf', 'y');
INSERT INTO `news` VALUES (2, '2004-08-01 14:00:00', 'PartySOKe Gewinnspiel', 'Klicken Sie auf  Aktualisieren oder wiederholen Sie den Vorgang später.\r\n\r\nFalls Sie die Adresse der Seite manuell in der Adressleiste eingegeben haben, stellen Sie sicher, dass die Adresse keine Tippfehler enthält.\r\n\r\nKlicken Sie auf Extras und dann auf Internetoptionen, um die Einstellungen für die Verbindung zu überprüfen. Wählen Sie die Registerkarte Verbindungen, und klicken Sie auf Einstellungen. Stellen Sie mit Hilfe Ihres Netzwerkadministrators oder Internetdienstanbieters sicher, dass die derzeitigen Einstellungen richtig sind. \r\nMicrosoft Windows kann das Netzwerk überprüfen und automatisch nach Einstellungen für Netzwerkverbindungen suchen, wenn das vom Netzwerkadministrator aktiviert wurde.\r\nKlicken Sie auf  Netzwerkeinstellungen ermitteln, um die Überprüfung durchzuführen.\r\n\r\nEinige Sites erfordern 128-Bit Verbindungssicherheit. Klicken Sie auf das Menü Hilfe und dann auf Info, um festzustellen, welche Sicherheitsstufe installiert ist. \r\nStellen Sie sicher, dass die Sicherheitseinstellungen unterstützt werden können, wenn Sie eine sichere Site erreichen möchten. Klicken Sie im Menü Extras auf Internetoptionen. Überprüfen Sie in der Registerkarte "Erweitert" unter "Sicherheit" die Einstellungen für SSL 2.0, SSL 3.0, TLS 1.0, PCT 1.0. \r\nKlicken Sie auf die Schaltfläche  Zurück, um einen anderen Link zu verwenden. \r\n<BR>\r\n\r\n\r\nFehler: Server oder DNS kann nicht gefunden werden\r\nInternet Explorer  \r\n', 'general', 'Internet Explorer', '_blank', 'http://www.windowsupdate.de', 'http://localhost/partysoke/_new/themes/orange/images/ad_tune.jpg', 'right', 'Saalfeld-Rudolstadt', 'maf', 'y');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `news_comments`
-- 

CREATE TABLE `news_comments` (
  `id` int(5) NOT NULL auto_increment,
  `id_news` int(5) NOT NULL default '0',
  `user` varchar(25) NOT NULL default '',
  `comment` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM COMMENT='News Kommentare' AUTO_INCREMENT=3 ;

-- 
-- Daten für Tabelle `news_comments`
-- 

INSERT INTO `news_comments` VALUES (1, 1, 'maf', 'Hier kommen die passenden NEws dazu. Tschaka', '2004-08-02 21:00:00');
INSERT INTO `news_comments` VALUES (2, 1, 'Rene2U', 'Trallalllaaaa ich habe Bald ferien une ich freue mich drauf ;) und eben noch ein paar andere Sachen, so das eben die box hier gefüllt ist und es nach etwas aussehen kann oder so...\r\n', '2004-08-02 23:00:00');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `users`
-- 

CREATE TABLE `users` (
  `id` int(6) NOT NULL auto_increment,
  `vorname` char(25) NOT NULL default '',
  `name` char(25) NOT NULL default '',
  `strasse` char(35) NOT NULL default '',
  `hausnr` char(8) NOT NULL default '',
  `plz` char(5) NOT NULL default '',
  `ort` char(35) NOT NULL default '',
  `telefon` char(20) NOT NULL default '',
  `handy` char(15) NOT NULL default '',
  `email` char(55) NOT NULL default '',
  `homepage` char(100) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM COMMENT='Mitglieder Daten' AUTO_INCREMENT=1 ;

-- 
-- Daten für Tabelle `users`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `users_gbook`
-- 

CREATE TABLE `users_gbook` (
  `user` int(6) NOT NULL default '0',
  PRIMARY KEY  (`user`),
  UNIQUE KEY `user` (`user`)
) TYPE=MyISAM COMMENT='Mitglieder Persönliches Gästebuch';

-- 
-- Daten für Tabelle `users_gbook`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `users_msgs`
-- 

CREATE TABLE `users_msgs` (
  `id` int(8) NOT NULL auto_increment,
  `user` int(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) TYPE=MyISAM COMMENT='Mitglieder Private Nachrichten' AUTO_INCREMENT=1 ;

-- 
-- Daten für Tabelle `users_msgs`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `users_nickpage`
-- 

CREATE TABLE `users_nickpage` (
  `user` int(6) NOT NULL default '0',
  PRIMARY KEY  (`user`),
  UNIQUE KEY `user` (`user`)
) TYPE=MyISAM COMMENT='Mitglieder Nickpages';

-- 
-- Daten für Tabelle `users_nickpage`
-- 


-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `users_stats`
-- 

CREATE TABLE `users_stats` (
  `user` int(6) NOT NULL default '0',
  PRIMARY KEY  (`user`),
  UNIQUE KEY `user` (`user`)
) TYPE=MyISAM;

-- 
-- Daten für Tabelle `users_stats`
-- 

