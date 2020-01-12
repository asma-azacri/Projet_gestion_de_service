-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2017 at 10:14 AM
-- Server version: 5.7.11
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



-- --------------------------------------------------------

--
-- Table structure for table `affectations`
--

DROP TABLE IF EXISTS `affectations`;
CREATE TABLE `affectations` (
  `eid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `nbh` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `affectations`
--

INSERT INTO `affectations` (`eid`, `gid`, `nbh`) VALUES
(1, 9, 18),
(1, 11, 21),
(1, 35, 12),
(1, 45, 12),
(2, 24, 21),
(2, 25, 15),
(2, 27, 24),
(2, 28, 21),
(3, 1, 21),
(3, 2, 18),
(3, 4, 21),
(3, 13, 6),
(3, 17, 5),
(3, 30, 9),
(3, 31, 21),
(4, 7, 21),
(4, 8, 18),
(4, 10, 21),
(4, 33, 9),
(4, 34, 21),
(4, 43, 6),
(4, 44, 12),
(5, 3, 18),
(5, 5, 21),
(5, 14, 9),
(5, 16, 12),
(5, 18, 21),
(5, 20, 15),
(5, 22, 24),
(5, 32, 21),
(6, 6, 21),
(6, 13, 3),
(6, 23, 15),
(7, 23, 9),
(7, 26, 15),
(7, 29, 21);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `nom`) VALUES
(1, 'Licence 1 Informatique'),
(2, 'Licence 2 Informatique'),
(3, 'Licence 3 Informatique');

-- --------------------------------------------------------

--
-- Table structure for table `enseignants`
--

DROP TABLE IF EXISTS `enseignants`;
CREATE TABLE `enseignants` (
  `eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `etid` int(11) NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enseignants`
--

INSERT INTO `enseignants` (`eid`, `uid`, `nom`, `prenom`, `email`, `tel`, `etid`, `annee`) VALUES
(1, 3, 'Dupont', 'Jean', 'jdupont@mail.com', '010203040506', 3, 2016),
(2, 4, 'Fermi', 'Enrico', 'efermi@mail.com', '07225451832', 4, 2016),
(3, 5, 'Descartes', 'René', 'rdescartes@mail.com', '07334416623', 1, 2015),
(4, 5, 'Descartes', 'René', 'rdescartes@mail.com', '01990016623', 1, 2016),
(5, 6, 'Pascal', 'Blaise', 'bpascal@mail.com', '0871767253', 2, 2015),
(6, 7, 'Knuth', 'Donald', 'dknuth@mail.com', '0018826663552', 2, 2015),
(7, 7, 'Knuth', 'Donald', 'dknuth@mail.com', '0018826663552', 2, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `etypes`
--

DROP TABLE IF EXISTS `etypes`;
CREATE TABLE `etypes` (
  `etid` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `nbh` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etypes`
--

INSERT INTO `etypes` (`etid`, `nom`, `nbh`) VALUES
(1, 'MCF', 192),
(2, 'PR', 192),
(3, 'ATER', 192),
(4, 'VAC1', 64);

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
CREATE TABLE `groupes` (
  `gid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `annee` year(4) NOT NULL,
  `gtid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`gid`, `mid`, `nom`, `annee`, `gtid`) VALUES
(1, 1, 'CM', 2015, 1),
(2, 1, 'TD1', 2015, 2),
(3, 1, 'TD2', 2015, 2),
(4, 1, 'TP1', 2015, 3),
(5, 1, 'TP2', 2015, 3),
(6, 1, 'TP3', 2015, 3),
(7, 2, 'CM', 2016, 1),
(8, 2, 'TD1', 2016, 2),
(9, 2, 'TD2', 2016, 2),
(10, 2, 'TP1', 2016, 3),
(11, 2, 'TP2', 2016, 3),
(12, 2, 'TP3', 2016, 3),
(13, 3, 'CM', 2015, 4),
(14, 3, 'TD1', 2015, 5),
(15, 3, 'TD2', 2015, 5),
(16, 3, 'TP1', 2015, 6),
(17, 3, 'TP2', 2015, 6),
(18, 4, 'CM', 2015, 7),
(19, 4, 'TD1', 2015, 8),
(20, 4, 'TD2', 2015, 8),
(21, 4, 'TP1', 2015, 9),
(22, 4, 'TP2', 2015, 9),
(23, 4, 'TP3', 2015, 9),
(24, 5, 'CM', 2016, 7),
(25, 5, 'TD1', 2016, 8),
(26, 5, 'TD2', 2016, 8),
(27, 5, 'TP1', 2016, 9),
(28, 5, 'TP2', 2016, 9),
(29, 5, 'TP3', 2016, 9),
(30, 6, 'CM', 2015, 10),
(31, 6, 'TP1', 2015, 11),
(32, 6, 'TP2', 2015, 11),
(33, 7, 'CM', 2016, 10),
(34, 7, 'TP1', 2016, 11),
(35, 7, 'TP2', 2016, 11),
(36, 8, 'CM', 2016, 12),
(37, 8, 'TP1', 2016, 13),
(38, 8, 'TP2', 2016, 13),
(39, 8, 'TP3', 2016, 13),
(40, 9, 'CM', 2015, 14),
(41, 9, 'TD1', 2015, 15),
(42, 9, 'TD2', 2015, 15),
(43, 10, 'CM', 2016, 14),
(44, 10, 'TD1', 2016, 15),
(45, 10, 'TD2', 2016, 15);

-- --------------------------------------------------------

--
-- Table structure for table `gtypes`
--

DROP TABLE IF EXISTS `gtypes`;
CREATE TABLE `gtypes` (
  `gtid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `nbh` int(10) UNSIGNED NOT NULL,
  `coeff` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gtypes`
--

INSERT INTO `gtypes` (`gtid`, `nom`, `nbh`, `coeff`) VALUES
(1, 'CM Programmation 2', 21, 1.5),
(2, 'TD Programmation 2', 18, 1),
(3, 'TP Programmation 2', 21, 0.66),
(4, 'CM Bases de données', 9, 1.5),
(5, 'TD Bases de données', 9, 1),
(6, 'TP Bases de données', 12, 1),
(7, 'CM Systèmes d\'exploitation', 21, 1.5),
(8, 'TD Systèmes d\'exploitation', 15, 1),
(9, 'TP Systèmes d\'exploitation', 24, 1),
(10, 'CM Programmation WEB', 9, 1.5),
(11, 'TP Programmation WEB', 21, 1),
(12, 'CM Réseaux', 30, 1.5),
(13, 'TP Réseaux', 15, 1),
(14, 'CM Compilation', 18, 1.5),
(15, 'TD Compilation', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `mid` int(11) NOT NULL,
  `intitule` varchar(30) NOT NULL,
  `code` varchar(10) NOT NULL,
  `eid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mid`, `intitule`, `code`, `eid`, `cid`, `annee`) VALUES
(1, 'Programmation 2', '2SXUPR20', 6, 1, 2015),
(2, 'Programmation 2', '2SXUPR20', 7, 1, 2016),
(3, 'Bases de données', 'XSXUBAD0', 3, 2, 2015),
(4, 'Systèmes d\'exploitation', 'A4S6UYE0', 5, 2, 2015),
(5, 'Systèmes d\'exploitation', '4SXUSYE0', 4, 2, 2016),
(6, 'Programmation WEB', 'XSXUPRW0', 6, 2, 2015),
(7, 'Programmation WEB', 'XSXUPRW0', 7, 2, 2016),
(8, 'Réseaux', '5SXURES0', 2, 3, 2016),
(9, 'Compilation', '6SXUCOM0', 3, 3, 2015),
(10, 'Compilation', '6SXUCOM0', 4, 3, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `login`, `mdp`, `role`) VALUES
(1, 'admin', '$2y$10$WUXmfWOTO3gf.QIwxuHH0ecG51cmEsgW5YmHbQaAHcYL6wV11GgOm', 'admin'),
(2, 'test', '$2y$10$rwE2jgPjPrw1i8DBi5xgY.aZuqV..6w9ZEFQmiYAy1G3slnJpKFVy', 'user'),
(3, 'jdupont', '$2y$10$lyEiQXexGfSd.7YMzpHkMurB6ghYnSQqFWAr97FxDxPJPC3aZZyC6', 'user'),
(4, 'efermi', '$2y$10$YRrjhKVaaV39aZrXm2nRiuSioSKbgWrpETY33jRELIoGo/OQjh0cu', 'user'),
(5, 'rdescartes', '$2y$10$2YNN8a.4ojBUR4NPPUi4uuGkbe/Ka3gFGEa/HWClQcRFjpnELR26K', 'user'),
(6, 'bpascal', '$2y$10$/Ef1yfTzrQPRZglkw2Epl.ZuLubilM3JU0WzNvTSv81pDkI1itHRC', 'user'),
(7, 'dknuth', '$2y$10$TLsBum/NSyJwX/vxAEKJeeE20arY3ILNIHEkC3.sckNUVNtvVz5kS', 'user'),
(8, 'test2', '$2y$10$t812JaGkKeUGSPW2O217lOQ8JbzRg65U7nYH17bO.cAmC8jFf2he2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affectations`
--
ALTER TABLE `affectations`
  ADD PRIMARY KEY (`eid`,`gid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `etid` (`etid`);

--
-- Indexes for table `etypes`
--
ALTER TABLE `etypes`
  ADD PRIMARY KEY (`etid`);

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `mid` (`mid`),
  ADD KEY `gtid` (`gtid`);

--
-- Indexes for table `gtypes`
--
ALTER TABLE `gtypes`
  ADD PRIMARY KEY (`gtid`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `etypes`
--
ALTER TABLE `etypes`
  MODIFY `etid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `gtypes`
--
ALTER TABLE `gtypes`
  MODIFY `gtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectations`
--
ALTER TABLE `affectations`
  ADD CONSTRAINT `affectations_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `groupes` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectations_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `enseignants` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD CONSTRAINT `enseignants_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enseignants_ibfk_2` FOREIGN KEY (`etid`) REFERENCES `etypes` (`etid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `modules` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groupes_ibfk_2` FOREIGN KEY (`gtid`) REFERENCES `gtypes` (`gtid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `enseignants` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
