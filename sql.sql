-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema mul18
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mul18
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mul18` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`color`
-- -----------------------------------------------------


-- -----------------------------------------------------
-- DROP TABLE
-- -----------------------------------------------------
DROP TABLE IF EXISTS color;
DROP TABLE IF EXISTS postit;
DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS `mydb`.`color` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `colorname` VARCHAR(45) NULL,
  `cssclass` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`postit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`postit` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdate` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `author` VARCHAR(45) NULL,
  `headertext` VARCHAR(45) NULL,
  `bodytext` VARCHAR(100) NULL,
  `color_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_postit_color_idx` (`color_id` ASC),
  CONSTRAINT `fk_postit_color`
    FOREIGN KEY (`color_id`)
    REFERENCES `mydb`.`color` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mul18` ;

-- -----------------------------------------------------
-- Table `mul18`.`color`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mul18`.`color` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `colorname` VARCHAR(45) NULL DEFAULT NULL,
  `cssclass` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mul18`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mul18`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(40) NULL DEFAULT NULL,
  `pwhash` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mul18`.`postit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mul18`.`postit` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `createdate` DATETIME NULL DEFAULT NULL,
  `headertext` VARCHAR(45) NULL DEFAULT NULL,
  `bodytext` VARCHAR(100) NULL DEFAULT NULL,
  `color_id1` INT(11) NOT NULL,
  `users_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_postit_color_idx` (`color_id1` ASC),
  INDEX `fk_postit_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_postit_color`
    FOREIGN KEY (`color_id1`)
    REFERENCES `mul18`.`color` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_postit_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `mul18`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Color table
-- -----------------------------------------------------

INSERT INTO color (colorname, cssclass) VALUES ('Red', 'postitred');
INSERT INTO color (colorname, cssclass) VALUES ('Yellow', 'postityellow');
INSERT INTO color (colorname, cssclass) VALUES ('Green', 'postitgreen');

-- -----------------------------------------------------
-- Insert a postit
-- -----------------------------------------------------

SELECT * FROM color;
SELECT * FROM postit;
SELECT * FROM users;


SELECT id, colorname FROM color;

DELETE FROM postit WHERE id=1;

SELECT postit.id AS pid, date(createdate), headertext, bodytext, users_id AS uid, username, cssclass 
FROM postit, users, color 
WHERE users_id = users.id  AND color_id1 = color.id;





