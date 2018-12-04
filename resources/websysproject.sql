-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5249
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for websysproject
DROP DATABASE IF EXISTS `websysproject`;
CREATE DATABASE IF NOT EXISTS `websysproject` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `websysproject`;

-- Dumping structure for table websysproject.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `GroupID` int(10) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FounderID` int(10) NOT NULL,
  `Description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ContactEmail` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`GroupID`),
  KEY `OwnerID` (`FounderID`),
  CONSTRAINT `owner` FOREIGN KEY (`FounderID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table websysproject.group_individual_relations
DROP TABLE IF EXISTS `group_individual_relations`;
CREATE TABLE IF NOT EXISTS `group_individual_relations` (
  `relationID` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `groupID` int(10) NOT NULL,
  PRIMARY KEY (`relationID`),
  KEY `user` (`userID`),
  KEY `group_individual` (`groupID`),
  CONSTRAINT `group_individual` FOREIGN KEY (`groupID`) REFERENCES `groups` (`GroupID`) ON DELETE CASCADE,
  CONSTRAINT `user` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table websysproject.group_tags
DROP TABLE IF EXISTS `group_tags`;
CREATE TABLE IF NOT EXISTS `group_tags` (
  `groupID` int(10) NOT NULL,
  `skill` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  KEY `groupID` (`groupID`),
  CONSTRAINT `groupID` FOREIGN KEY (`groupID`) REFERENCES `groups` (`GroupID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table websysproject.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `RIN` int(10) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GroupID` int(10) DEFAULT NULL,
  `Skills` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` longblob,
  `PreferredJob` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Biography` varchar(440) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `username` (`username`),
  KEY `GroupID` (`GroupID`),
  CONSTRAINT `group` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table websysproject.user_tags
DROP TABLE IF EXISTS `user_tags`;
CREATE TABLE IF NOT EXISTS `user_tags` (
  `userID` int(10) NOT NULL,
  `skill` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  KEY `userID` (`userID`),
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
