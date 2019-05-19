-- MySQL Script generated by MySQL Workbench
-- Sun May 19 10:28:46 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Cemquarium
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Cemquarium` ;

-- -----------------------------------------------------
-- Schema Cemquarium
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Cemquarium` DEFAULT CHARACTER SET utf8 ;
USE `Cemquarium` ;

-- -----------------------------------------------------
-- Table `Cemquarium`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`User` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`User` (
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NULL,
  `Vorname` VARCHAR(45) NULL,
  `PLZ` INT NULL,
  `ort` VARCHAR(45) NULL,
  `strasse` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cemquarium`.`Kategorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Kategorie` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Kategorie` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cemquarium`.`Unterkategorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Unterkategorie` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Unterkategorie` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `Kategorie_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Unterkategorie_Kategorie1_idx` (`Kategorie_id` ASC),
  CONSTRAINT `fk_Unterkategorie_Kategorie1`
    FOREIGN KEY (`Kategorie_id`)
    REFERENCES `Cemquarium`.`Kategorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cemquarium`.`Produkt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Produkt` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Produkt` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `beschreibung` VARCHAR(45) NULL,
  `preis` VARCHAR(45) NULL,
  `Unterkategorie_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Produkt_Unterkategorie1_idx` (`Unterkategorie_id` ASC),
  CONSTRAINT `fk_Produkt_Unterkategorie1`
    FOREIGN KEY (`Unterkategorie_id`)
    REFERENCES `Cemquarium`.`Unterkategorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cemquarium`.`Warenkorb`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Warenkorb` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Warenkorb` (
  `id` INT NOT NULL,
  `User_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Warenkorb_User1_idx` (`User_username` ASC),
  CONSTRAINT `fk_Warenkorb_User1`
    FOREIGN KEY (`User_username`)
    REFERENCES `Cemquarium`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cemquarium`.`Bestellung`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Bestellung` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Bestellung` (
  `id` INT NOT NULL,
  `Warenkorb_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Bestellung_Warenkorb1_idx` (`Warenkorb_id` ASC),
  CONSTRAINT `fk_Bestellung_Warenkorb1`
    FOREIGN KEY (`Warenkorb_id`)
    REFERENCES `Cemquarium`.`Warenkorb` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Cemquarium`.`Warenkorb_has_Produkt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Warenkorb_has_Produkt` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Warenkorb_has_Produkt` (
  `Warenkorb_id` INT NOT NULL,
  `Produkt_id` INT NOT NULL,
  PRIMARY KEY (`Warenkorb_id`, `Produkt_id`),
  INDEX `fk_Warenkorb_has_Produkt_Produkt1_idx` (`Produkt_id` ASC),
  INDEX `fk_Warenkorb_has_Produkt_Warenkorb1_idx` (`Warenkorb_id` ASC),
  CONSTRAINT `fk_Warenkorb_has_Produkt_Warenkorb1`
    FOREIGN KEY (`Warenkorb_id`)
    REFERENCES `Cemquarium`.`Warenkorb` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Warenkorb_has_Produkt_Produkt1`
    FOREIGN KEY (`Produkt_id`)
    REFERENCES `Cemquarium`.`Produkt` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `Cemquarium`.`Kategorie`
-- -----------------------------------------------------
START TRANSACTION;
USE `Cemquarium`;
INSERT INTO `Cemquarium`.`Kategorie` (`id`, `name`) VALUES (1, 'Aquarium');
INSERT INTO `Cemquarium`.`Kategorie` (`id`, `name`) VALUES (2, 'Aquariumtechnik');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Cemquarium`.`Unterkategorie`
-- -----------------------------------------------------
START TRANSACTION;
USE `Cemquarium`;
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (1, 'Meerwasseraquarium', 1);
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (2, 'Sueßwasseraquarium', 1);
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (3, 'Pumpen', 2);
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (4, 'Heizung', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Cemquarium`.`Produkt`
-- -----------------------------------------------------
START TRANSACTION;
USE `Cemquarium`;
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (1, 'Cemaqua Tunnelus 68', '-', '779', 1);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (2, 'Cemaqua Meerwasseraquarium Silberrücken 31', '-', '1099', 1);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (3, 'Cemaqua Meerwasseraquarium Rogg 1000', '-', '2549', 1);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (4, 'Juwel Rio 450 Aquarium mit Unterschrank dunkles Holz', '-', '839', 2);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (5, 'Juwel Aquarium Vision Krieg 450 mit Unterschrank SBX Schwarz', '-', '999', 2);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (6, 'Fluval Nassqualantis Roma 63 mit Dekostreifen', '-', '239', 2);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (7, 'Cemaqua Medic Arctic Volker 6-Pack ', '-', '89,99', 4);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (8, 'Eheim Thermocontrol Reglerheizer 25 ', '-', '16,90', 4);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (9, 'FLUVAL elektronischer Aquariumheizer VueTECH E 50 ', '-', '25,99', 4);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (10, 'Eheim compactON Aquariumpumpe', NULL, '14,99', 3);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (11, 'Cemaqua Medic DC Schneider Aquariumpumpe 3.1 ', NULL, '159', 3);
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`) VALUES (12, 'Resun Power Head SP', NULL, '7,99', 3);

COMMIT;

