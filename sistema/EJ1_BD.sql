-- MySQL Script generated by MySQL Workbench
-- Wed Jul 10 12:35:38 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema EJ1_BD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema EJ1_BD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `EJ1_BD` DEFAULT CHARACTER SET utf8 ;
USE `EJ1_BD` ;

-- -----------------------------------------------------
-- Table `EJ1_BD`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EJ1_BD`.`Clientes` (
  `idClientes` INT NOT NULL AUTO_INCREMENT,
  `nomeClientes` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
  `emailClientes` VARCHAR(45) NOT NULL,
  `senhaClientes` VARCHAR(45) NOT NULL,
  `telefoneClientes` VARCHAR(45) NULL,
  `cnpjClientes` VARCHAR(45) NULL,
  `areadeatuacaoClientes` VARCHAR(45) NULL,
  `enderecoClientes` VARCHAR(45) NULL,
  PRIMARY KEY (`idClientes`))
ENGINE = InnoDB
ROW_FORMAT = DYNAMIC;


-- -----------------------------------------------------
-- Table `EJ1_BD`.`Funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EJ1_BD`.`Funcionarios` (
  `idFuncionarios` INT NOT NULL AUTO_INCREMENT,
  `nomeFuncionarios` VARCHAR(45) NULL,
  `emailFuncionarios` VARCHAR(45) NULL,
  `senhaFuncionarios` VARCHAR(45) NULL,
  `areadeatuaçãoFuncionarios` VARCHAR(45) NULL,
  PRIMARY KEY (`idFuncionarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EJ1_BD`.`DOU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EJ1_BD`.`DOU` (
  `idDOU` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `idFuncionario` INT NOT NULL,
  `nomeCliente` VARCHAR(45) NULL,
  `nomeFuncionario` VARCHAR(45) NULL,
  `idUltimoFuncionario` INT NULL,
  `nomeUltimoFuncionario` VARCHAR(45) NULL,
  `dataUpload` DATE NULL,
  `dataUpdate` DATE NULL,
  PRIMARY KEY (`idDOU`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;