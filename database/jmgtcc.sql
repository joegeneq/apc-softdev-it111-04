-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2015 at 02:35 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmgtcc`
--
CREATE DATABASE IF NOT EXISTS `jmgtcc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jmgtcc`;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
  `AirlinesID` int(11) NOT NULL AUTO_INCREMENT,
  `AirlineName` varchar(45) NOT NULL,
  PRIMARY KEY (`AirlinesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`AirlinesID`, `AirlineName`) VALUES
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
  `ClientName` varchar(45) NOT NULL,
  `ClientUsername` varchar(15) NOT NULL,
  `City` varchar(45) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `AppointmentDate` date NOT NULL,
  `AppointmentTime` time NOT NULL,
  `VisaType` varchar(15) NOT NULL,
  `DateCreated` date NOT NULL,
  `ConfirmedBy` varchar(15) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `PaymentRate` double NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`AppointmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointmenthistory`
--

CREATE TABLE IF NOT EXISTS `appointmenthistory` (
  `HistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `AppointmentID` varchar(15) NOT NULL,
  `PrevAppointmentDate` date NOT NULL,
  `PrevAppointmentTime` time NOT NULL,
  PRIMARY KEY (`HistoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contactnumber`
--

CREATE TABLE IF NOT EXISTS `contactnumber` (
  `NumberID` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(45) NOT NULL,
  `Prefix` varchar(5) NOT NULL,
  `Digits` int(11) NOT NULL,
  PRIMARY KEY (`NumberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `DealsID` int(11) NOT NULL AUTO_INCREMENT,
  `Deal` varchar(45) NOT NULL,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`DealsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `RoleID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(25) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`, `Description`) VALUES
(1, 'Superadmin', 'Can access all system modules and processes'),
(2, 'Travel Agent', 'Confirms and Updates travel requests and appointments'),
(3, 'Client Account', 'Registered Client / User account'),
(4, 'Guest', 'Unregistered User ');

-- --------------------------------------------------------

--
-- Table structure for table `travelarrangement`
--

CREATE TABLE IF NOT EXISTS `travelarrangement` (
  `ArrangementID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartureDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `PlaceOfOrigin` varchar(45) NOT NULL,
  `Destination` varchar(45) NOT NULL,
  `NumberOfAdult` int(11) NOT NULL,
  `NumberOfChildren` int(11) NOT NULL,
  `NumberOfInfant` int(11) NOT NULL,
  `NumberOfRooms` int(11) NOT NULL,
  `HotelName` varchar(45) NOT NULL,
  `StarRating` varchar(20) NOT NULL,
  `AirlineID` int(11) NOT NULL,
  `FlightType` varchar(20) NOT NULL,
  `CabinType` varchar(20) NOT NULL,
  `TravelDeals` text NOT NULL,
  `TourType` varchar(45) NOT NULL,
  `DateCreated` date NOT NULL,
  `Status` varchar(20) NOT NULL,
  `DateConfirmed` date NOT NULL,
  `ConfirmedBy` varchar(20) NOT NULL,
  `DateUpdated` date NOT NULL,
  `UpdatedBy` varchar(20) NOT NULL,
  PRIMARY KEY (`ArrangementID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `City` varchar(45) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `LastLoggedIn` datetime NOT NULL,
  `LoggedIn` tinyint(1) NOT NULL,
  `RoleID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Gender`, `City`, `ContactNumber`, `EmailAddress`, `LastLoggedIn`, `LoggedIn`, `RoleID`) VALUES
(1, 'afpapna', 'jmgtcc', 'Arianne', 'Papna', 'F', 'Taguig City', '+639074443583', 'afpapna@student.apc.edu.ph', '2015-02-15 06:38:00', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `roles` (`RoleID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
