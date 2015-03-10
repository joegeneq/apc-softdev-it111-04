SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `jmgtccdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
CREATE SCHEMA IF NOT EXISTS `new_schema1` ;
USE `jmgtccdb` ;

-- -----------------------------------------------------
-- Table `jmgtccdb`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `role_name` VARCHAR(45) NULL ,
  `role_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`user` (
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
  PRIMARY KEY (`id`, `roles_id`) ,
  INDEX `fk_user_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_user_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `jmgtccdb`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`staff`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`staff` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(15) NULL ,
  `password` VARCHAR(45) NULL ,
  `roles_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `roles_id`) ,
  INDEX `fk_staff_roles1_idx` (`roles_id` ASC) ,
  CONSTRAINT `fk_staff_roles1`
    FOREIGN KEY (`roles_id` )
    REFERENCES `jmgtccdb`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`appointment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`appointment` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `appointment_code` VARCHAR(25) NULL ,
  `client_name` VARCHAR(60) NULL ,
  `client_username` VARCHAR(15) NULL ,
  `city` VARCHAR(45) NULL ,
  `contact_number` VARCHAR(20) NULL ,
  `email_address` VARCHAR(45) NULL ,
  `appointment_date` DATE NULL ,
  `appointment_time` TIME NULL ,
  `visa_type` VARCHAR(15) NULL ,
  `payment_rate` DOUBLE NULL ,
  `date_created` TIMESTAMP NULL ,
  `status` VARCHAR(15) NULL ,
  `confirmed_by` VARCHAR(15) NULL ,
  `notes` TEXT NULL ,
  `user_id` INT NOT NULL ,
  `staff_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_appointment_user1_idx` (`user_id` ASC) ,
  INDEX `fk_appointment_staff1_idx` (`staff_id` ASC) ,
  CONSTRAINT `fk_appointment_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `jmgtccdb`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_staff1`
    FOREIGN KEY (`staff_id` )
    REFERENCES `jmgtccdb`.`staff` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`contact_number`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`contact_number` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country` VARCHAR(45) NULL ,
  `prefix` VARCHAR(5) NULL ,
  `digits` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`airlines`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`airlines` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `airline_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`tour_deals`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`tour_deals` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `deal_name` VARCHAR(60) NULL ,
  `deal_description` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`appointment_history`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`appointment_history` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `history_code` VARCHAR(25) NULL ,
  `prev_appointment_time` TIME NULL ,
  `prev_appointment_date` DATE NULL ,
  `appointment_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_appointment_history_appointment1_idx` (`appointment_id` ASC) ,
  CONSTRAINT `fk_appointment_history_appointment1`
    FOREIGN KEY (`appointment_id` )
    REFERENCES `jmgtccdb`.`appointment` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`hotels`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`hotels` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `hotel_name` VARCHAR(60) NULL ,
  `country` VARCHAR(45) NULL ,
  `star rating` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`travel_arrangement`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`travel_arrangement` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `arrangement_code` VARCHAR(25) NULL ,
  `departure_date` DATE NULL ,
  `return_date` DATE NULL ,
  `destination` VARCHAR(60) NULL ,
  `number_of_pax` INT NULL ,
  `room_type` VARCHAR(60) NULL ,
  `hotel_name` VARCHAR(100) NULL ,
  `inclusion` TEXT NULL ,
  `itinerary` TEXT NULL ,
  `flight_type` VARCHAR(20) NULL ,
  `class_type` VARCHAR(20) NULL ,
  `date_created` TIMESTAMP NULL ,
  `status` VARCHAR(20) NULL ,
  `date_confirmed` DATE NULL ,
  `confirmed_by` VARCHAR(20) NULL ,
  `date_updated` DATE NULL ,
  `updated_by` VARCHAR(20) NULL ,
  `remarks` TEXT NULL ,
  `hotels_id` INT NULL ,
  `airlines_id` INT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `hotels_id`, `airlines_id`) ,
  INDEX `fk_travel_arrangement_hotels_idx` (`hotels_id` ASC) ,
  INDEX `fk_travel_arrangement_airlines1_idx` (`airlines_id` ASC) ,
  INDEX `fk_travel_arrangement_user1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_travel_arrangement_hotels`
    FOREIGN KEY (`hotels_id` )
    REFERENCES `jmgtccdb`.`hotels` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_arrangement_airlines1`
    FOREIGN KEY (`airlines_id` )
    REFERENCES `jmgtccdb`.`airlines` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_arrangement_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `jmgtccdb`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `jmgtccdb`.`accommodation`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `jmgtccdb`.`accommodation` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `accommodation_name` VARCHAR(60) NULL ,
  `accommodation_desc` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `new_schema1` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
