SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `jmgtcc_brs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
CREATE SCHEMA IF NOT EXISTS `new_schema1` ;
USE `jmgtcc_brs` ;

-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `role_name` VARCHAR(45) NULL ,
  `role_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(15) NULL ,
  `password` VARCHAR(45) NULL ,
  `first_name` VARCHAR(45) NULL ,
  `last_name` VARCHAR(45) NULL ,
  `gender` VARCHAR(1) NULL ,
  `city` VARCHAR(45) NULL ,
  `contact_number` VARCHAR(20) NULL ,
  `email_address` VARCHAR(45) NULL ,
  `last_logged_in` DATETIME NULL ,
  `roles_id` INT NOT NULL ,
  `tour_arrangement_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `roles_id`) ,
  INDEX `fk_user_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_user_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `jmgtcc_brs`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`staff`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`staff` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(15) NULL ,
  `password` VARCHAR(45) NULL ,
  `roles_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `roles_id`) ,
  INDEX `fk_staff_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_staff_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `jmgtcc_brs`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`appointment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`appointment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `appointment_code` VARCHAR(25) NULL ,
  `client_name` VARCHAR(60) NOT NULL ,
  `client_username` VARCHAR(15) NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `contact_number` VARCHAR(20) NOT NULL ,
  `email_address` VARCHAR(45) NOT NULL ,
  `appointment_date` DATE NOT NULL ,
  `appointment_time` TIME NOT NULL ,
  `country` VARCHAR(60) NULL ,
  `visa_type` VARCHAR(30) NULL ,
  `payment_rate` DOUBLE NULL ,
  `date_created` TIMESTAMP NOT NULL ,
  `status` VARCHAR(20) NULL ,
  `confirmed_by` VARCHAR(15) NULL ,
  `notes` TEXT NULL ,
  `user_id` INT NOT NULL ,
  `staff_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_appointment_user1_idx` (`user_id` ASC) ,
  INDEX `fk_appointment_staff1_idx` (`staff_id` ASC) ,
  CONSTRAINT `fk_appointment_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `jmgtcc_brs`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_staff1`
    FOREIGN KEY (`staff_id` )
    REFERENCES `jmgtcc_brs`.`staff` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`contact_number`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`contact_number` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country` VARCHAR(45) NULL ,
  `prefix` VARCHAR(5) NULL ,
  `digits` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`airlines`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`airlines` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `airline_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`tour_type`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`tour_type` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tour_name` VARCHAR(45) NOT NULL ,
  `tour_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`appointment_history`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`appointment_history` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `history_code` VARCHAR(25) NULL ,
  `prev_appointment_time` TIME NULL ,
  `prev_appointment_date` DATE NULL ,
  `appointment_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_appointment_history_appointment1_idx` (`appointment_id` ASC) ,
  CONSTRAINT `fk_appointment_history_appointment1`
    FOREIGN KEY (`appointment_id` )
    REFERENCES `jmgtcc_brs`.`appointment` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`travel_tour_arrangement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`travel_tour_arrangement` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `arrangement_code` VARCHAR(25) NULL ,
  `destination` VARCHAR(60) NOT NULL ,
  `departure_date` DATE NOT NULL ,
  `return_date` DATE NOT NULL ,
  `airline_name` VARCHAR(60) NULL ,
  `flight_type` VARCHAR(20) NULL ,
  `class_type` VARCHAR(20) NULL ,
  `number_of_pax` INT NOT NULL ,
  `hotel_name` VARCHAR(100) NULL ,
  `room_type` VARCHAR(60) NOT NULL ,
  `inclusion` TEXT NULL ,
  `remarks` TEXT NULL ,
  `date_created` TIMESTAMP NULL ,
  `status` VARCHAR(20) NULL ,
  `date_confirmed` DATE NULL ,
  `confirmed_by` VARCHAR(20) NULL ,
  `date_updated` DATE NULL ,
  `updated_by` VARCHAR(20) NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_travel_arrangement_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_travel_arrangement_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `jmgtcc_brs`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`hotels`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`hotels` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hotel_name` VARCHAR(60) NOT NULL ,
  `country` VARCHAR(45) NOT NULL ,
  `star_rating` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`inclusion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`inclusion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tour_type` VARCHAR(60) NOT NULL ,
  `food_deals` TEXT NOT NULL ,
  `transport_service` VARCHAR(45) NOT NULL ,
  `freebies` VARCHAR(45) NOT NULL ,
  `remarks` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`tour_arrangement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`tour_arrangement` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `destination` VARCHAR(60) NOT NULL ,
  `departure_date` DATE NOT NULL ,
  `return_date` DATE NOT NULL ,
  `airline_name` VARCHAR(60) NULL ,
  `flight_type` VARCHAR(20) NULL ,
  `class_type` VARCHAR(20) NULL ,
  `number_of_pax` INT NOT NULL ,
  `remarks` TEXT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tour_arrangement_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_tour_arrangement_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `jmgtcc_brs`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`food_deals`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`food_deals` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `food_deal_name` VARCHAR(45) NOT NULL ,
  `food_deal_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`transport_service`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`transport_service` (
  `id` INT NOT NULL ,
  `transport_type` VARCHAR(25) NOT NULL ,
  `transport_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`freebies`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`freebies` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `freebies_name` VARCHAR(45) NOT NULL ,
  `freebies_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtcc_brs`.`time`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtcc_brs`.`time` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `time` TIME NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `new_schema1` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
