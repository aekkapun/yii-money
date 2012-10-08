# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: money
# Generation Time: 2012-10-07 19:47:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Account`;

CREATE TABLE `Account` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccName` varchar(50) NOT NULL DEFAULT '',
  `AccTypeId` int(11) NOT NULL,
  `OverDraftLimit` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Account` WRITE;
/*!40000 ALTER TABLE `Account` DISABLE KEYS */;

INSERT INTO `Account` (`Id`, `AccName`, `AccTypeId`, `OverDraftLimit`)
VALUES
	(1,'First Direct current account',1,500),
	(2,'Barclaycard',2,3500),
	(3,'Paypal account',4,0),
	(4,'First Direct e-savings account',5,0),
	(5,'Natwest joint account',1,250),
	(6,'First Direct gold card',2,500),
	(7,'First Direct Loan',3,0);

/*!40000 ALTER TABLE `Account` ENABLE KEYS */;
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


# Dump of table Cat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Cat`;

CREATE TABLE `Cat` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) NOT NULL DEFAULT '',
  `CatType` enum('Income','Expense') DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Cat` WRITE;
/*!40000 ALTER TABLE `Cat` DISABLE KEYS */;

INSERT INTO `Cat` (`Id`, `CategoryName`, `CatType`)
VALUES
	(0,'Household Bills','Expense'),
	(1,'Wages & Salary','Income'),
	(2,'Car','Expense'),
	(4,'Reimbursements','Income'),
	(5,'Luxeries','Expense'),
	(6,'Food','Expense'),
	(7,'Electrical Goods','Expense');

/*!40000 ALTER TABLE `Cat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Payee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Payee`;

CREATE TABLE `Payee` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PayeeName` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Payee` WRITE;
/*!40000 ALTER TABLE `Payee` DISABLE KEYS */;

INSERT INTO `Payee` (`Id`, `PayeeName`)
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

/*!40000 ALTER TABLE `Payee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table SubCat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubCat`;

CREATE TABLE `SubCat` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CatId` int(11) NOT NULL,
  `SubCatName` varchar(50) NOT NULL DEFAULT '',
  `CatType` enum('Income','Expense') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `SubCat` WRITE;
/*!40000 ALTER TABLE `SubCat` DISABLE KEYS */;

INSERT INTO `SubCat` (`Id`, `CatId`, `SubCatName`, `CatType`)
VALUES
	(1,0,'Gas','Expense'),
	(2,0,'Electricity','Expense'),
	(3,6,'Lunch','Expense'),
	(4,6,'Groceries','Expense'),
	(7,2,'Fuel','Expense'),
	(13,0,'Gifts Recieved','Income'),
	(14,4,'Tax Refund','Income'),
	(15,0,'Water & Sewerage','Expense'),
	(16,0,'Takeaway','Expense'),
	(17,0,'Road Tax','Expense'),
	(18,0,'MOT','Expense'),
	(23,0,'Satellite TV','Expense'),
	(24,0,'TV License','Expense'),
	(25,7,'Multimedia','Expense'),
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

/*!40000 ALTER TABLE `SubCat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Transaction`;

CREATE TABLE `Transaction` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `AccountId` int(11) NOT NULL,
  `TransDate` date NOT NULL,
  `TransType` enum('Withdrawal','Deposit','Transfer') NOT NULL,
  `PayeeId` int(11) NOT NULL,
  `TransAmount` decimal(10,2) NOT NULL,
  `TransId` int(11) DEFAULT NULL,
  `SubCatId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Transaction` WRITE;
/*!40000 ALTER TABLE `Transaction` DISABLE KEYS */;

INSERT INTO `Transaction` (`Id`, `AccountId`, `TransDate`, `TransType`, `PayeeId`, `TransAmount`, `TransId`, `SubCatId`)
VALUES
	(44,5,'2011-06-01','Withdrawal',2,-116.56,0,1),
	(45,2,'2011-06-02','Withdrawal',3,-65.11,0,1),
	(46,1,'2011-03-25','Withdrawal',2,-1429.00,0,4),
	(48,5,'2011-06-10','Withdrawal',7,-30.01,0,24),
	(49,5,'2011-06-11','Withdrawal',2,-32.23,0,4),
	(50,2,'2011-06-11','Withdrawal',2,-65.23,0,4),
	(51,6,'2012-02-22','Deposit',4,300.05,0,25),
	(52,1,'2011-06-18','Withdrawal',5,-25.00,0,4),
	(58,1,'2011-06-19','Withdrawal',2,-123.25,0,4),
	(61,5,'2011-06-18','Deposit',2,-56.66,0,4),
	(64,1,'2012-02-06','Withdrawal',2,77.77,0,1),
	(65,6,'2012-02-22','Withdrawal',5,3.25,NULL,4),
	(66,1,'2012-02-26','Withdrawal',3,-22.00,NULL,3),
	(67,1,'2012-02-26','Deposit',2,22.22,NULL,3),
	(68,1,'2012-02-27','Deposit',9,50.00,NULL,13),
	(69,1,'2012-10-06','Withdrawal',3,-2.00,NULL,3),
	(70,1,'2012-10-06','Withdrawal',2,-5.00,NULL,3),
	(71,1,'2012-10-07','Deposit',11,32.32,NULL,13),
	(72,1,'2012-10-07','Deposit',8,1365.66,NULL,27);

/*!40000 ALTER TABLE `Transaction` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
