SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;


-- -----------------------------------------------------
-- Table `mydb`.`Empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Empresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `logo` VARCHAR(300) NULL ,
  `url` VARCHAR(100) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  PRIMARY KEY (`idEmpresa`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `usuario` VARCHAR(20) NOT NULL ,
  `contrasena` VARCHAR(20) NOT NULL ,
  `rol` VARCHAR(20) NOT NULL ,
  `idEmpresa` INT NULL ,
  PRIMARY KEY (`usuario`) ,
  INDEX `fk_Usuario_Empresa_idx` (`idEmpresa` ASC) ,
  CONSTRAINT `fk_Usuario_Empresa`
    FOREIGN KEY (`idEmpresa` )
    REFERENCES `mydb`.`Empresa` (`idEmpresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Plato`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Plato` (
  `idPlato` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `ingredientes` VARCHAR(500) NULL ,
  `fecha` DATE NOT NULL ,
  `imagen` VARCHAR(300) NULL ,
  `Precio` DOUBLE NOT NULL ,
  `activo` TINYINT(1) NOT NULL ,
  `idEmpresa` INT NOT NULL ,
  PRIMARY KEY (`idPlato`) ,
  INDEX `fk_Plato_Empresa1_idx` (`idEmpresa` ASC) ,
  CONSTRAINT `fk_Plato_Empresa1`
    FOREIGN KEY (`idEmpresa` )
    REFERENCES `mydb`.`Empresa` (`idEmpresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Adicional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Adicional` (
  `idAdicional` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `ingredientes` varchar(500) DEFAULT NULL,
  `precio` double NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`idAdicional`),
  UNIQUE KEY `Nombre` (`Nombre`),
  KEY `fk_adicional_Empresa` (`idEmpresa`)
) ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `estado` VARCHAR(50) NOT NULL ,
  `tipoPago` VARCHAR(45) NOT NULL ,
  `idCajero` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idPedido`) ,
  INDEX `pedido_usuario_idx` (`idCajero` ASC) ,
  CONSTRAINT `pedido_usuario`
    FOREIGN KEY (`idCajero` )
    REFERENCES `mydb`.`Usuario` (`usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Plato_Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Plato_Pedido` (
  `idPlato` INT NOT NULL ,
  `idPedido` INT NOT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`idPlato`, `idPedido`) ,
  INDEX `PlatoP_idx` (`idPlato` ASC) ,
  INDEX `PlatoP_Pedido_idx` (`idPedido` ASC) ,
  CONSTRAINT `PlatoP_Plato`
    FOREIGN KEY (`idPlato` )
    REFERENCES `mydb`.`Plato` (`idPlato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `PlatoP_Pedido`
    FOREIGN KEY (`idPedido` )
    REFERENCES `mydb`.`Pedido` (`idPedido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Adicional_Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Adicional_Pedido` (
  `idAdicional` INT NOT NULL ,
  `idPedido` INT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`idAdicional`, `idPedido`) ,
  INDEX `AdicionalP_Adicional_idx` (`idAdicional` ASC) ,
  INDEX `AdicionalP_Pedido_idx` (`idPedido` ASC) ,
  CONSTRAINT `AdicionalP_Adicional`
    FOREIGN KEY (`idAdicional` )
    REFERENCES `mydb`.`Adicional` (`idAdicional` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `AdicionalP_Pedido`
    FOREIGN KEY (`idPedido` )
    REFERENCES `mydb`.`Pedido` (`idPedido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;