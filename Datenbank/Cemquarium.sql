-- MySQL Script generated by MySQL Workbench
-- Thu Jun  6 12:35:38 2019
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
  CONSTRAINT `fk_Unterkategorie_Kategorie1`
    FOREIGN KEY (`Kategorie_id`)
    REFERENCES `Cemquarium`.`Kategorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Unterkategorie_Kategorie1_idx` ON `Cemquarium`.`Unterkategorie` (`Kategorie_id` ASC);


-- -----------------------------------------------------
-- Table `Cemquarium`.`Produkt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Produkt` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Produkt` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `beschreibung` VARCHAR(10000) NULL,
  `preis` VARCHAR(45) NULL,
  `Unterkategorie_id` INT NOT NULL,
  `bild` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Produkt_Unterkategorie1`
    FOREIGN KEY (`Unterkategorie_id`)
    REFERENCES `Cemquarium`.`Unterkategorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Produkt_Unterkategorie1_idx` ON `Cemquarium`.`Produkt` (`Unterkategorie_id` ASC);


-- -----------------------------------------------------
-- Table `Cemquarium`.`Warenkorb`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Warenkorb` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Warenkorb` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `User_username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Warenkorb_User1`
    FOREIGN KEY (`User_username`)
    REFERENCES `Cemquarium`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Warenkorb_User1_idx` ON `Cemquarium`.`Warenkorb` (`User_username` ASC);


-- -----------------------------------------------------
-- Table `Cemquarium`.`Warenkorb_has_Produkt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`Warenkorb_has_Produkt` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`Warenkorb_has_Produkt` (
  `Warenkorb_id` INT NOT NULL,
  `Produkt_id` INT NOT NULL,
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

CREATE INDEX `fk_Warenkorb_has_Produkt_Produkt1_idx` ON `Cemquarium`.`Warenkorb_has_Produkt` (`Produkt_id` ASC);

CREATE INDEX `fk_Warenkorb_has_Produkt_Warenkorb1_idx` ON `Cemquarium`.`Warenkorb_has_Produkt` (`Warenkorb_id` ASC);


-- -----------------------------------------------------
-- Table `Cemquarium`.`payments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Cemquarium`.`payments` ;

CREATE TABLE IF NOT EXISTS `Cemquarium`.`payments` (
  `payment_id` INT(11) NOT NULL AUTO_INCREMENT,
  `item_number` VARCHAR(255) NOT NULL,
  `txn_id` VARCHAR(255) NOT NULL,
  `payment_gross` FLOAT(10,2) NOT NULL,
  `currency_code` VARCHAR(5) NOT NULL,
  `payment_status` VARCHAR(255) NOT NULL,
  `payment_date` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`payment_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


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
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (2, 'Suesswasseraquarium', 1);
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (3, 'Pumpen', 2);
INSERT INTO `Cemquarium`.`Unterkategorie` (`id`, `name`, `Kategorie_id`) VALUES (4, 'Heizung', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Cemquarium`.`Produkt`
-- -----------------------------------------------------
START TRANSACTION;
USE `Cemquarium`;
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (1, 'Tunnelus', 'Rahmenloses Komplettaquarium mit Unterschrank und Unterschrankfiltersystem fuer anspruchsvolle Riffaquarien und Meerwasserlandschaften.', '779', 1, '\\webshop\\pictures\\Produktbilder\\Aquarium\\Meerwasseraquarium\\Tunnelus.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (2, 'Silberruecken', 'Meerwasseraquarium mit Filtersumpf und Pumpe mit viel Platz fuer ein Riff und seine Bewohner.', '1099', 1, '\\webshop\\pictures\\Produktbilder\\Aquarium\\Meerwasseraquarium\\Silberruecken.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (3, 'Roggi', 'Roggi beinhaltet alle notwendige Zubehoere.', '2549', 1, '\\webshop\\pictures\\Produktbilder\\Aquarium\\Meerwasseraquarium\\Roggi.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (4, 'Juwel Rio', 'Juwel  Rio, bestehend aus Rio 450-Aquarium und Rio 450 SBX Unterschrank.', '839', 2, '\\webshop\\pictures\\Produktbilder\\Aquarium\\Suesswasseraquarium\\Juwel Rio.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (5, 'Juwel Krieg', 'Suesswasseraquarium mit 450l Volumen aus Float Glas. Inkl. Aquarienpumpe, Einsatzleuchte & Leuchtmittel.', '999', 2, '\\webshop\\pictures\\Produktbilder\\Aquarium\\Suesswasseraquarium\\Juwel Krieg.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (6, 'Nassqualantis', 'Das rechteckige Aquarium ueberzeugt durch eine klare Linienfuehrung, das kompakte Volumen von 125 l und die Qualitaet der verarbeiteten Materialien.', '239', 2, '\\webshop\\pictures\\Produktbilder\\Aquarium\\Suesswasseraquarium\\Nassqualantis.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (7, 'Volkerpack', 'Volkerpack 6-pack ist ein strahlwassergeschuetzter Luefter (IP 55) zur Abkuehlung des Aquarienwassers. Mit 6 Ventilatoren ausgestattet.', '89.99', 4, '\\webshop\\pictures\\Produktbilder\\Technik\\Heizung\\Volkerpack.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (8, 'Reglerheizer', 'Der Reglerheizer sorgt fuer die genaue Regelung der Wassertemperatur in Suess- & Meerwasseraquarien. ', '16.90', 4, '\\webshop\\pictures\\Produktbilder\\Technik\\Heizung\\Reglerheizer.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (9, 'Aquariumheizer', 'Elektronischer Aquariumheizer mit LCD Anzeige fuer praezise und einfache Temperatureinstellung. Erhaeltlich in verschiedenen Leistungsstaerken.', '25.99', 4, '\\webshop\\pictures\\Produktbilder\\Technik\\Heizung\\Aquariumheizer.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (10, 'compactON Aquariumpumpe', 'Die compactON Aquarienpumpe besticht durch eine kompakte Bauweise und den prolemlosen Einsatz in Suess- und Meerwasser.', '14.99', 3, '\\webshop\\pictures\\Produktbilder\\Technik\\Pumpen\\compactON Aquariumpumpe.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (11, 'Schneider Aquariumpumpe', 'Foerderpumpe mit extremer Laufruhe mit Controller und stromsparendem Gleichstrommotor. Eine Kraftvolle und regelbare Universalpumpe fuer Aquarien.', '159', 3, '\\webshop\\pictures\\Produktbilder\\Technik\\Pumpen\\Schneider Aquariumpumpe.jpg');
INSERT INTO `Cemquarium`.`Produkt` (`id`, `name`, `beschreibung`, `preis`, `Unterkategorie_id`, `bild`) VALUES (12, 'Resun Power', 'Kompakte, energiesparende Pumpe fuer Zimmerbrunnen oder zur Verwendung als Umwaelz- und Stroemungspumpe in Suess- und Meerwasseraquarien.\r ', '7.99', 3, '\\webshop\\pictures\\Produktbilder\\Technik\\Pumpen\\Resun Power.jpg');

COMMIT;

