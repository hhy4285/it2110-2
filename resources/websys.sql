-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for websysproject
CREATE DATABASE IF NOT EXISTS `websysproject` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `websysproject`;

-- Dumping structure for table websysproject.groups
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

-- Dumping data for table websysproject.groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`GroupID`, `GroupName`, `FounderID`, `Description`, `ContactEmail`) VALUES
	(1, 'testgroup', 1, 'doing nothing', '');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table websysproject.group_individual_relations
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

-- Dumping data for table websysproject.group_individual_relations: ~0 rows (approximately)
/*!40000 ALTER TABLE `group_individual_relations` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_individual_relations` ENABLE KEYS */;

-- Dumping structure for table websysproject.users
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
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `username` (`username`),
  KEY `GroupID` (`GroupID`),
  CONSTRAINT `group` FOREIGN KEY (`GroupID`) REFERENCES `groups` (`GroupID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table websysproject.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username`, `password`, `UserID`, `FirstName`, `LastName`, `RIN`, `Email`, `GroupID`, `Skills`, `image`) VALUES
	('bob', 'bob', 1, 'bob', 'ross', 123123123, 'rossb@rpi.edu', 1, '', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
