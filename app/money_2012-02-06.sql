# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: money
# Generation Time: 2012-02-06 01:08:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Accounts`;

CREATE TABLE `Accounts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccName` varchar(50) NOT NULL DEFAULT '',
  `AccTypeId` int(11) NOT NULL,
  `OverDraftLimit` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Accounts` WRITE;
/*!40000 ALTER TABLE `Accounts` DISABLE KEYS */;

INSERT INTO `Accounts` (`Id`, `AccName`, `AccTypeId`, `OverDraftLimit`)
VALUES
	(1,'First Direct current account',1,500),
	(2,'Barclay Card',2,3500),
	(3,'Paypal account',4,0),
	(4,'First Direct e-savings account',5,0),
	(5,'Natwest joint account',1,250),
	(6,'First Direct gold card',2,500),
	(7,'First Direct Loan',3,0);

/*!40000 ALTER TABLE `Accounts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table AccType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AccType`;

CREATE TABLE `AccType` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccTypeName` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `AccType` WRITE;
/*!40000 ALTER TABLE `AccType` DISABLE KEYS */;

INSERT INTO `AccType` (`Id`, `AccTypeName`)
VALUES
	(1,'Bank Account'),
	(2,'Credit Account'),
	(3,'Loan'),
	(4,'Other'),
	(5,'Savings Account');

/*!40000 ALTER TABLE `AccType` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Cats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cats`;

CREATE TABLE `Cats` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) NOT NULL DEFAULT '',
  `CatType` enum('Income','Expense') DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Cats` WRITE;
/*!40000 ALTER TABLE `Cats` DISABLE KEYS */;

INSERT INTO `Cats` (`Id`, `CategoryName`, `CatType`)
VALUES
	(0,'Household Bills','Expense'),
	(1,'Wages & Salary','Income'),
	(2,'Car','Expense'),
	(4,'Reimbursements','Income'),
	(5,'Luxeries','Expense');

/*!40000 ALTER TABLE `Cats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Payees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Payees`;

CREATE TABLE `Payees` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PayeeName` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Payees` WRITE;
/*!40000 ALTER TABLE `Payees` DISABLE KEYS */;

INSERT INTO `Payees` (`Id`, `PayeeName`)
VALUES
	(2,'Tesco Brislington'),
	(3,'Sainsburys Winterstoke Road'),
	(4,'Comet Cribbs Causeway'),
	(5,'Tesco A420'),
	(6,'Comet Longwell Green'),
	(7,'Ebay'),
	(8,'Newicon'),
	(9,'Nan and Grandad'),
	(10,'Martin McColl Newsagents Bishopsworth'),
	(11,'Sky'),
	(12,'Vodafone');

/*!40000 ALTER TABLE `Payees` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table SubCats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubCats`;

CREATE TABLE `SubCats` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CatId` int(11) NOT NULL,
  `SubCatName` varchar(50) NOT NULL DEFAULT '',
  `CatType` enum('Income','Expense') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `SubCats` WRITE;
/*!40000 ALTER TABLE `SubCats` DISABLE KEYS */;

INSERT INTO `SubCats` (`Id`, `CatId`, `SubCatName`, `CatType`)
VALUES
	(1,0,'Gas','Expense'),
	(2,0,'Electricity','Expense'),
	(3,5,'Lunch','Expense'),
	(4,0,'Groceries','Expense'),
	(7,2,'Fuel','Expense'),
	(13,0,'Gifts Recieved','Income'),
	(14,4,'Tax Refund','Income'),
	(15,0,'Water & Sewerage','Expense'),
	(16,0,'Takeaway','Expense'),
	(17,0,'Road Tax','Expense'),
	(18,0,'MOT','Expense'),
	(23,0,'Satellite TV','Expense'),
	(24,0,'TV License','Expense'),
	(25,0,'Multimedia','Expense'),
	(26,0,'Tobacco','Expense'),
	(27,1,'Net Pay','Income'),
	(28,0,'Nights Out','Expense'),
	(29,0,'Insurance Refund','Income'),
	(30,0,'Car Insurance','Expense'),
	(31,0,'Home Insurance','Expense'),
	(32,0,'Life Insurance','Expense'),
	(33,0,'Snacks','Expense'),
	(34,0,'Water','Expense'),
	(35,0,'Sky','Expense');

/*!40000 ALTER TABLE `SubCats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Transactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Transactions`;

CREATE TABLE `Transactions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccountId` int(11) NOT NULL,
  `TransDate` date NOT NULL,
  `TransType` enum('Withdrawal','Deposit','Transfer') NOT NULL,
  `PayeeId` int(11) NOT NULL,
  `CatId` int(11) NOT NULL,
  `TransAmount` decimal(10,2) NOT NULL,
  `TransId` int(11) DEFAULT NULL,
  `SubCatId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Transactions` WRITE;
/*!40000 ALTER TABLE `Transactions` DISABLE KEYS */;

INSERT INTO `Transactions` (`Id`, `AccountId`, `TransDate`, `TransType`, `PayeeId`, `CatId`, `TransAmount`, `TransId`, `SubCatId`)
VALUES
	(61,5,'2011-06-18','Withdrawal',2,0,56.66,NULL,4),
	(44,5,'2011-06-01','Withdrawal',2,0,-116.56,NULL,1),
	(45,2,'2011-06-02','Withdrawal',3,0,-65.11,NULL,1),
	(46,0,'2011-03-25','Withdrawal',0,4,-1429.00,NULL,NULL),
	(48,0,'2011-06-10','Withdrawal',7,0,-30.01,NULL,24),
	(49,5,'2011-06-11','Withdrawal',0,0,-32.23,NULL,NULL),
	(50,0,'2011-06-11','Withdrawal',0,0,-65.23,NULL,NULL),
	(51,0,'2011-06-11','Deposit',0,0,300.05,NULL,NULL),
	(52,0,'2011-06-18','Withdrawal',0,0,-25.00,NULL,NULL),
	(58,0,'2011-06-19','Withdrawal',0,0,-123.25,NULL,NULL),
	(59,0,'2011-06-19','Deposit',0,0,200.10,NULL,NULL),
	(62,0,'2011-06-21','Withdrawal',0,0,-125.23,NULL,NULL),
	(63,0,'2011-06-24','Withdrawal',0,0,-54.23,NULL,NULL),
	(64,1,'2012-02-06','Withdrawal',2,0,77.77,NULL,1);

/*!40000 ALTER TABLE `Transactions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
