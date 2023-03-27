-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rentsystem
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rentsystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rentsystem` DEFAULT CHARACTER SET utf8 ;
USE `rentsystem` ;

-- -----------------------------------------------------
-- Table `rentsystem`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rentsystem`.`type` (
  `type_id` INT NOT NULL AUTO_INCREMENT,
  `type_name` VARCHAR(45) NOT NULL,
  `type_code` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`type_id`, `type_code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rentsystem`.`stockpile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rentsystem`.`stockpile` (
  `stockpile_id` INT NOT NULL AUTO_INCREMENT,
  `stock_name` VARCHAR(45) NULL,
  `stock_des` VARCHAR(45),
  `type_type_id` INT NOT NULL,
  `type_type_code` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`stockpile_id`),
  INDEX `fk_stockpile_type_idx` (`type_type_id` ASC, `type_type_code` ASC) ,
  CONSTRAINT `fk_stockpile_type`
    FOREIGN KEY (`type_type_id` , `type_type_code`)
    REFERENCES `rentsystem`.`type` (`type_id` , `type_code`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rentsystem`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rentsystem`.`user` (
  `user_id` INT NOT NULL,
  `user_fname` VARCHAR(45) NOT NULL,
  `user_lname` VARCHAR(45) NOT NULL,
  `user_address` VARCHAR(45) NOT NULL,
  `user_city` VARCHAR(45) NOT NULL,
  `user_state` VARCHAR(45) NOT NULL,
  `user_phone` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `userpassword` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rentsystem`.`stockpile_has_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rentsystem`.`stockpile_has_user` (
  `stockpile_stockpile_id` INT NOT NULL AUTO_INCREMENT,
  `user_user_id` INT NOT NULL,
  `amount` INT NOT NULL,
  `hasrent_des` VARCHAR(100),
  `date_start` VARCHAR(30) NOT NULL,
  `date_end` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`stockpile_stockpile_id`, `user_user_id`),
  INDEX `fk_stockpile_has_user_user1_idx` (`user_user_id` ASC) ,
  INDEX `fk_stockpile_has_user_stockpile1_idx` (`stockpile_stockpile_id` ASC) ,
  CONSTRAINT `fk_stockpile_has_user_stockpile1`
    FOREIGN KEY (`stockpile_stockpile_id`)
    REFERENCES `rentsystem`.`stockpile` (`stockpile_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stockpile_has_user_user1`
    FOREIGN KEY (`user_user_id`)
    REFERENCES `rentsystem`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
