-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2015 at 02:46 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmgtccdb`
--
CREATE DATABASE IF NOT EXISTS `jmgtccdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jmgtccdb`;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
  `AirlineID` int(11) NOT NULL AUTO_INCREMENT,
  `AirlineName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`AirlineID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`AirlineID`, `AirlineName`) VALUES
(1, 'Philippine Airlines'),
(2, 'Cebu Pacific'),
(3, 'Air Philippines'),
(4, 'Zest Air'),
(5, 'British Airways'),
(6, 'Japan Airlines'),
(7, 'Malaysia Airlines'),
(8, 'Thai Airways'),
(9, 'Garuda Indonesia Airlines'),
(10, 'Air Canada'),
(11, 'Emirates'),
(12, 'Delta Airlines'),
(13, 'Qantas Airways'),
(14, 'Continental Airlines');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `AppointmentID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientName` varchar(45) DEFAULT NULL,
  `ClientUsername` varchar(15) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `EmailAddress` varchar(45) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `VisaType` varchar(15) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `ConfirmedBy` varchar(15) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `PaymentRate` double DEFAULT NULL,
  `Message` text,
  `User_UserID` int(11) NOT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `fk_Appointment_User1_idx` (`User_UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointmenthistory`
--

CREATE TABLE IF NOT EXISTS `appointmenthistory` (
  `HistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `PrevAppointmenttDate` date DEFAULT NULL,
  `PrevAppointmentTime` time DEFAULT NULL,
  `Appointment_AppointmentID` int(11) NOT NULL,
  PRIMARY KEY (`HistoryID`),
  KEY `fk_AppointmentHistory_Appointment1_idx` (`Appointment_AppointmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contactnumber`
--

CREATE TABLE IF NOT EXISTS `contactnumber` (
  `NumberID` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(45) DEFAULT NULL,
  `Prefix` varchar(5) DEFAULT NULL,
  `Digits` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `DealID` int(11) NOT NULL AUTO_INCREMENT,
  `Deal` varchar(45) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`DealID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `RoleID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(25) DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`, `Description`) VALUES
(1, 'Superadmin', 'Can access all system modules and processes'),
(2, 'Travel Agent', 'Confirms and Updates travel requests and appo'),
(3, 'Client Account', 'Registered Client / User account'),
(4, 'Guest', 'Unregistered User ');

-- --------------------------------------------------------

--
-- Table structure for table `travelarrangement`
--

CREATE TABLE IF NOT EXISTS `travelarrangement` (
  `ArrangementID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartureDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  `PlaceOfOrigin` varchar(45) DEFAULT NULL,
  `Destination` varchar(45) DEFAULT NULL,
  `NumberOfAdult` int(11) DEFAULT NULL,
  `NumberOfChildren` int(11) DEFAULT NULL,
  `NumberOfInfant` int(11) DEFAULT NULL,
  `NumberOfRooms` int(11) DEFAULT NULL,
  `HotelName` varchar(45) DEFAULT NULL,
  `StarRating` varchar(20) DEFAULT NULL,
  `Flight Type` varchar(20) DEFAULT NULL,
  `CabinType` varchar(20) DEFAULT NULL,
  `TravelDeals` text,
  `TourType` varchar(45) DEFAULT NULL,
  `DateCreated` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `DateConfirmed` date DEFAULT NULL,
  `ConfirmedBy` varchar(20) DEFAULT NULL,
  `DateUpdated` date DEFAULT NULL,
  `UpdatedBy` varchar(20) DEFAULT NULL,
  `Airlines_AirlineID` int(11) NOT NULL DEFAULT '0',
  `User_UserID` int(11) NOT NULL,
  PRIMARY KEY (`ArrangementID`,`Airlines_AirlineID`),
  KEY `fk_TravelArrangement_Airlines1_idx` (`Airlines_AirlineID`),
  KEY `fk_TravelArrangement_User1_idx` (`User_UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `EmailAddress` varchar(45) DEFAULT NULL,
  `LastLoggedIn` datetime DEFAULT NULL,
  `LoggedIn` tinyint(1) DEFAULT NULL,
  `Roles_RoleID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`,`Roles_RoleID`),
  KEY `fk_User_Roles1_idx` (`Roles_RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_Appointment_User1` FOREIGN KEY (`User_UserID`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointmenthistory`
--
ALTER TABLE `appointmenthistory`
  ADD CONSTRAINT `fk_AppointmentHistory_Appointment1` FOREIGN KEY (`Appointment_AppointmentID`) REFERENCES `appointment` (`AppointmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `travelarrangement`
--
ALTER TABLE `travelarrangement`
  ADD CONSTRAINT `fk_TravelArrangement_Airlines1` FOREIGN KEY (`Airlines_AirlineID`) REFERENCES `airlines` (`AirlineID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TravelArrangement_User1` FOREIGN KEY (`User_UserID`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Roles1` FOREIGN KEY (`Roles_RoleID`) REFERENCES `roles` (`RoleID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
