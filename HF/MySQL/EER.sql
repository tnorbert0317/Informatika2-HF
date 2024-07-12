-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Ecarz4sale
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Ecarz4sale
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Ecarz4sale` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema konyvtar
-- -----------------------------------------------------
USE `Ecarz4sale` ;

-- -----------------------------------------------------
-- Table `Ecarz4sale`.`felhasznalo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Ecarz4sale`.`felhasznalo` ;

CREATE TABLE IF NOT EXISTS `Ecarz4sale`.`felhasznalo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nev` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `felhasznalonev` VARCHAR(45) NOT NULL,
  `jelszo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `felhasználónév_UNIQUE` (`felhasznalonev` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ecarz4sale`.`karosszeria_tipus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Ecarz4sale`.`karosszeria_tipus` ;

CREATE TABLE IF NOT EXISTS `Ecarz4sale`.`karosszeria_tipus` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `karosszeria_nev` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nev_UNIQUE` (`karosszeria_nev` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ecarz4sale`.`auto_markak`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Ecarz4sale`.`auto_markak` ;

CREATE TABLE IF NOT EXISTS `Ecarz4sale`.`auto_markak` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marka_nev` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nev_UNIQUE` (`marka_nev` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ecarz4sale`.`auto_modellek`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Ecarz4sale`.`auto_modellek` ;

CREATE TABLE IF NOT EXISTS `Ecarz4sale`.`auto_modellek` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modell_nev` VARCHAR(45) NOT NULL,
  `teljesitmeny_le` INT NOT NULL,
  `akku_meret_kwh` INT NOT NULL,
  `wltp_hatotav` INT NOT NULL,
  `karosszeria_tipus_id` INT NOT NULL,
  `gyartas_kezdete` DATE NOT NULL,
  `gyartas_vege` DATE NULL,
  `auto_markak_id` INT NOT NULL,
  PRIMARY KEY (`id`, `karosszeria_tipus_id`, `auto_markak_id`),
  INDEX `fk_auto_modellek_karosszeria_tipus1_idx` (`karosszeria_tipus_id` ASC),
  INDEX `fk_auto_modellek_auto_markak1_idx` (`auto_markak_id` ASC),
  CONSTRAINT `fk_auto_modellek_karosszeria_tipus1`
    FOREIGN KEY (`karosszeria_tipus_id`)
    REFERENCES `Ecarz4sale`.`karosszeria_tipus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_auto_modellek_auto_markak1`
    FOREIGN KEY (`auto_markak_id`)
    REFERENCES `Ecarz4sale`.`auto_markak` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ecarz4sale`.`hirdetes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Ecarz4sale`.`hirdetes` ;

CREATE TABLE IF NOT EXISTS `Ecarz4sale`.`hirdetes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `feltoltes_datum` DATE NOT NULL,
  `eladas_datum` DATE NULL,
  `felhasznalo_id` INT NOT NULL,
  `leiras` VARCHAR(250) NULL,
  `ar` INT NOT NULL,
  `evjarat` INT NOT NULL,
  `auto_modellek_id` INT NOT NULL,
  PRIMARY KEY (`id`, `auto_modellek_id`, `felhasznalo_id`),
  INDEX `fk_Hirdetés_Felhasználó1_idx` (`felhasznalo_id` ASC),
  INDEX `fk_hirdetes_auto_modellek1_idx` (`auto_modellek_id` ASC),
  CONSTRAINT `fk_Hirdetés_Felhasználó11`
    FOREIGN KEY (`felhasznalo_id`)
    REFERENCES `Ecarz4sale`.`felhasznalo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_hirdetes_auto_modellek11`
    FOREIGN KEY (`auto_modellek_id`)
    REFERENCES `Ecarz4sale`.`auto_modellek` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
