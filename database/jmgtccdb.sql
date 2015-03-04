-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2015 at 07:50 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jmgtccdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE IF NOT EXISTS `accommodation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accommodation_name` varchar(60) DEFAULT NULL,
  `accommodation_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`id`, `accommodation_name`, `accommodation_desc`) VALUES
(1, 'Breakfast', 'Accommodation will include Breakfast at the Hotel'),
(2, 'Lunch', 'Accommodation will include Lunch at the Hotel or at any places included in the tour package'),
(3, 'Dinner', 'Accommodation will include Dinner at the Hotel or at any places included in the tour package');

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE IF NOT EXISTS `airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `airline_name`) VALUES
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_code` varchar(25) DEFAULT NULL,
  `client_name` varchar(60) DEFAULT NULL,
  `client_username` varchar(15) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `visa_type` varchar(15) DEFAULT NULL,
  `payment_rate` double DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `confirmed_by` varchar(15) DEFAULT NULL,
  `notes` text,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointment_user1_idx` (`user_id`),
  KEY `fk_appointment_staff1_idx` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `country` varchar(45) DEFAULT NULL,
  `prefix` varchar(5) DEFAULT NULL,
  `digits` int(11) DEFAULT NULL,
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
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(60) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_name`, `country`) VALUES
(1, 'Rambler Garden-bf at Café de coral', 'Hong Kong'),
(2, ' Silka Fareast / Silka West Kowloon', 'Hong Kong'),
(3, 'Silka Seaview / Largos', 'Hong Kong');

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
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) DEFAULT NULL,
  `role_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_description`) VALUES
(1, 'Superadmin', 'Can access all system modules and processes'),
(2, 'Travel Agent', 'Confirms and Updates travel requests and appo'),
(3, 'Client Account', 'Registered Client / User account'),
(4, 'Guest', 'Unregistered User ');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`roles_id`),
  KEY `fk_staff_roles1_idx` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tour_deals`
--

CREATE TABLE IF NOT EXISTS `tour_deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(60) DEFAULT NULL,
  `deal_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tour_deals`
--

INSERT INTO `tour_deals` (`id`, `deal_name`, `deal_description`) VALUES
(1, 'Historical / Cultural Tour', 'Includes visiting historical sites and cultural centers'),
(2, 'Adventure Tour', 'Includes camping, cycling, climbing, hiking,  mountaineering ');

-- --------------------------------------------------------

--
-- Table structure for table `travel_arrangement`
--

CREATE TABLE IF NOT EXISTS `travel_arrangement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrangement_code` varchar(25) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `place_of_origin` varchar(60) DEFAULT NULL,
  `destination` varchar(60) DEFAULT NULL,
  `number_of_adult` int(11) DEFAULT NULL,
  `numbrt_of_children` int(11) DEFAULT NULL,
  `number_of_infant` int(11) DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT NULL,
  `hotel_name` varchar(100) DEFAULT NULL,
  `star_rating` varchar(20) DEFAULT NULL,
  `accommodation` text,
  `flight_type` varchar(20) DEFAULT NULL,
  `cabin_type` varchar(20) DEFAULT NULL,
  `tour_type` varchar(45) DEFAULT NULL,
  `tour_deals` text,
  `transport_service` varchar(45) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_confirmed` date DEFAULT NULL,
  `confirmed_by` varchar(20) DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `notes` text,
  `hotels_id` int(11) NOT NULL DEFAULT '0',
  `airlines_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`hotels_id`,`airlines_id`),
  KEY `fk_travel_arrangement_hotels_idx` (`hotels_id`),
  KEY `fk_travel_arrangement_airlines1_idx` (`airlines_id`),
  KEY `fk_travel_arrangement_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `gender`, `city`, `contact_number`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'Dummy', 'Damien', '', '', '', 'yifHjslVBqWBtTer9WGKUX6srFvJdo46', '$2y$13$IVo/n0883K2ViMg/4GHoaO2SAgjp8/uEEmFG57/b7vRqInF0RgNxG', NULL, 'dummydame@gmail.com', 10, 1425451157, 1425451157),
(2, 'user2', 'Damien', 'Dackles', 'F', 'Makati City', '+639153125819', 'ib0LECLgJPN2UQAkVGFupgoPFMedhzJ6', '$2y$13$GfKtt2N8.5pfVvsRS4/NUuWKNbDTr6mUI/xOBOqBLW7/QLc83Ap7q', NULL, 'rekhidalgo23@gmail.com', 10, 1425451670, 1425451670);

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE IF NOT EXISTS `user1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `last_logged_in` datetime DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`roles_id`),
  KEY `fk_user_roles1_idx` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_appointment_user1` FOREIGN KEY (`user_id`) REFERENCES `user1` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_appointment_staff1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD CONSTRAINT `fk_appointment_history_appointment1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `travel_arrangement`
--
ALTER TABLE `travel_arrangement`
  ADD CONSTRAINT `fk_travel_arrangement_hotels` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_travel_arrangement_airlines1` FOREIGN KEY (`airlines_id`) REFERENCES `airlines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_travel_arrangement_user1` FOREIGN KEY (`user_id`) REFERENCES `user1` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user1`
--
ALTER TABLE `user1`
  ADD CONSTRAINT `fk_user_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
