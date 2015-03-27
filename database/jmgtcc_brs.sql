-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2015 at 05:20 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmgtcc_brs`
--
CREATE DATABASE IF NOT EXISTS `jmgtcc_brs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jmgtcc_brs`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_code` varchar(25) DEFAULT NULL,
  `client_name` varchar(60) NOT NULL,
  `client_username` varchar(15) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `country` varchar(60) DEFAULT NULL,
  `visa_type` varchar(30) DEFAULT NULL,
  `payment_rate` double DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `confirmed_by` varchar(15) DEFAULT NULL,
  `notes` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointment_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE IF NOT EXISTS `appointment_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `history_code` varchar(25) DEFAULT NULL,
  `prev_appointment_time` time DEFAULT NULL,
  `prev_appointment_date` date DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointment_history_appointment1_idx` (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_number`
--

CREATE TABLE IF NOT EXISTS `contact_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(45) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `digits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact_number`
--

INSERT INTO `contact_number` (`id`, `country`, `prefix`, `digits`) VALUES
(1, 'Philippines', '+63', 10),
(2, 'Australia', '+61', 9),
(3, 'Canada', '+1', 10),
(4, 'Hong Kong', '+852', 8),
(5, 'Russia', '+7', 10),
(6, 'South Africa', '+27', 9),
(7, 'United States', '+1', 10),
(8, 'Wales', '+44', 10);

-- --------------------------------------------------------

--
-- Table structure for table `food_deals`
--

CREATE TABLE IF NOT EXISTS `food_deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_deal_name` varchar(45) NOT NULL,
  `food_deal_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `food_deals`
--

INSERT INTO `food_deals` (`id`, `food_deal_name`, `food_deal_description`) VALUES
(1, 'Breakfast', 'Includes breakfast meal from the hotel '),
(2, 'Breakfast Buffet', 'Includes buffet breakfast meal from the hotel '),
(3, 'Lunch', 'Includes lunch at local restaurant or at the hotel'),
(4, 'Lunch Buffet', 'Includes lunch buffet at any local restaurant or at the hotel'),
(5, 'Dinner', 'Includes dinner at local restaurant or at the hotel'),
(6, 'Dinner Buffet', 'Includes dinner buffet at any local restaurant or at the hotel');

-- --------------------------------------------------------

--
-- Table structure for table `freebies`
--

CREATE TABLE IF NOT EXISTS `freebies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `freebies_name` varchar(45) NOT NULL,
  `freebies_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `freebies`
--

INSERT INTO `freebies` (`id`, `freebies_name`, `freebies_description`) VALUES
(1, 'Train Ticket', 'Includes 1 free train ticket per person to explore the city.'),
(2, 'Bus Pass / Ticket', 'Includes 1 round trip bus ticket to tour city');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1425449657),
('m130524_201442_init', 1425449658);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personnel_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `time`, `description`) VALUES
(1, '10:00:00', '10:00 - 11:00 AM'),
(2, '11:00:00', '11:00 - 12:00 NN'),
(3, '01:00:00', '1:00 - 2:00 PM'),
(4, '02:00:00', '2:00 - 3:00 PM'),
(5, '03:00:00', '3:00 - 4:00 PM'),
(6, '04:00:00', '4:00 - 5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tour_arrangement`
--

CREATE TABLE IF NOT EXISTS `tour_arrangement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrangement_code` varchar(25) DEFAULT NULL,
  `place_of_origin` varchar(60) DEFAULT NULL,
  `destination` varchar(60) NOT NULL,
  `arrival_date` date NOT NULL,
  `return_date` date NOT NULL,
  `number_of_pax` int(11) NOT NULL,
  `hotel_name` varchar(100) DEFAULT NULL,
  `room_type` varchar(80) DEFAULT NULL,
  `inclusion_food_deals` text NOT NULL,
  `inclusion_freebies` text NOT NULL,
  `inclusion_tour_type` text NOT NULL,
  `inclusion_transport_service` varchar(60) NOT NULL,
  `remarks` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tour_arrangement_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tour_type`
--

CREATE TABLE IF NOT EXISTS `tour_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_name` varchar(45) NOT NULL,
  `tour_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tour_type`
--

INSERT INTO `tour_type` (`id`, `tour_name`, `tour_description`) VALUES
(1, 'Adventure Tour', 'Includes camping, cycling, climbing, hiking,  mountaineering, or visiting attractions that has extreme rides.'),
(2, 'City Tour', 'Includes visit to famous sites or tourist spots within the city'),
(3, 'Historical / Cultural Tours ', 'Includes visiting historical sites and cultural centers');

-- --------------------------------------------------------

--
-- Table structure for table `transport_service`
--

CREATE TABLE IF NOT EXISTS `transport_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transport_type` varchar(25) NOT NULL,
  `transport_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transport_service`
--

INSERT INTO `transport_service` (`id`, `transport_type`, `transport_description`) VALUES
(1, 'Tour Bus', 'Recommended for group tours. Includes: tour guide, pick-up and drop-off at the hotel'),
(2, 'Private Car', 'Rent a car of your choice and tour all your preferred destination. Gas fare is excluded.'),
(3, 'Private Car with Driver', 'Tour all your preferred destination with  the help of trusted drivers. Gas fare is excluded and a tip of $50 is recommended. ');

-- --------------------------------------------------------

--
-- Table structure for table `travel_tour_arrangement`
--

CREATE TABLE IF NOT EXISTS `travel_tour_arrangement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrangement_code` varchar(25) DEFAULT NULL,
  `place_of_origin` varchar(60) DEFAULT NULL,
  `destination` varchar(60) NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date NOT NULL,
  `airline_name` varchar(60) DEFAULT NULL,
  `flight_type` varchar(45) DEFAULT NULL,
  `class_type` varchar(60) DEFAULT NULL,
  `number_of_pax` int(11) NOT NULL,
  `hotel_name` varchar(100) DEFAULT NULL,
  `room_type` varchar(80) NOT NULL,
  `inclusion_food_deals` text NOT NULL,
  `inclusion_freebies` text NOT NULL,
  `inclusion_tour_type` text NOT NULL,
  `inclusion_transport_service` varchar(60) NOT NULL,
  `remarks` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_travel_arrangement_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL DEFAULT '10',
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_logged_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `first_name`, `last_name`, `gender`, `city`, `contact_number`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `last_logged_in`) VALUES
(1, 20, 'abby20', 'abby', 'abby', 'F', 'Taguig City', '+639999999', 'hQYW0jZSMtNkzUAqJ_42p7fgDiFmVmZ9', '$2y$13$WCOxuMS.G5FDbFM6iHHKp.cFGjhbki2YDtpjpVUK4Rr.EXaB2Di02', NULL, 'abby@abby.com', 10, 1427199313, 1427199313, '2015-03-24 14:55:54'),
(2, 10, 'abby10', 'abby', 'abby', 'F', 'Taguig City', '+639999999', '6aGejgtcu4vKWDkyMdjpzKxE_WrDVjDX', '$2y$13$wdWjYC6dsT5vIqhArEtahupHS1DheZMwWrufmbRRia57lEXh2qQe2', NULL, 'abby123@abby.com', 10, 1427199557, 1427199557, '2015-03-24 14:56:02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD CONSTRAINT `fk_appointment_history_appointment1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `travel_tour_arrangement`
--
ALTER TABLE `travel_tour_arrangement`
  ADD CONSTRAINT `fk_travel_tour_arrangement_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
