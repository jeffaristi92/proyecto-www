SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bd_www` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bd_www` ;

-- -----------------------------------------------------
-- Table `bd_www`.`Empresa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Empresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(100) NOT NULL ,
  `logo` VARCHAR(300) NULL ,
  `url` VARCHAR(100) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  PRIMARY KEY (`idEmpresa`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Usuario` (
  `usuario` VARCHAR(20) NOT NULL ,
  `contrasena` VARCHAR(20) NOT NULL ,
  `rol` VARCHAR(20) NOT NULL ,
  `idEmpresa` INT NULL ,
  PRIMARY KEY (`usuario`) ,
  INDEX `fk_Usuario_Empresa_idx` (`idEmpresa` ASC) ,
  CONSTRAINT `fk_Usuario_Empresa`
    FOREIGN KEY (`idEmpresa` )
    REFERENCES `bd_www`.`Empresa` (`idEmpresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Plato`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Plato` (
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
    REFERENCES `bd_www`.`Empresa` (`idEmpresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Adicional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Adicional` (
  `idAdicional` INT NOT NULL AUTO_INCREMENT ,
  `Nombre` VARCHAR(100) NOT NULL ,
  `ingredientes` VARCHAR(500) NULL ,
  `precio` DOUBLE NOT NULL ,
  PRIMARY KEY (`idAdicional`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Adicional_Plato`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Adicional_Plato` (
  `idPlato` INT NOT NULL ,
  `idAdicional` INT NOT NULL ,
  PRIMARY KEY (`idPlato`, `idAdicional`) ,
  INDEX `adicionalP_Plato_idx` (`idPlato` ASC) ,
  INDEX `adicionalP_Adicional_idx` (`idAdicional` ASC) ,
  CONSTRAINT `adicionalP_Plato`
    FOREIGN KEY (`idPlato` )
    REFERENCES `bd_www`.`Plato` (`idPlato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `adicionalP_Adicional`
    FOREIGN KEY (`idAdicional` )
    REFERENCES `bd_www`.`Adicional` (`idAdicional` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `estado` VARCHAR(50) NOT NULL ,
  `tipoPago` VARCHAR(45) NOT NULL ,
  `idCajero` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idPedido`) ,
  INDEX `pedido_usuario_idx` (`idCajero` ASC) ,
  CONSTRAINT `pedido_usuario`
    FOREIGN KEY (`idCajero` )
    REFERENCES `bd_www`.`Usuario` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Plato_Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Plato_Pedido` (
  `idPlato` INT NOT NULL ,
  `idPedido` INT NOT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`idPlato`, `idPedido`) ,
  INDEX `PlatoP_idx` (`idPlato` ASC) ,
  INDEX `PlatoP_Pedido_idx` (`idPedido` ASC) ,
  CONSTRAINT `PlatoP_Plato`
    FOREIGN KEY (`idPlato` )
    REFERENCES `bd_www`.`Plato` (`idPlato` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `PlatoP_Pedido`
    FOREIGN KEY (`idPedido` )
    REFERENCES `bd_www`.`Pedido` (`idPedido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_www`.`Adicional_Pedido`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bd_www`.`Adicional_Pedido` (
  `idAdicional` INT NOT NULL ,
  `idPedido` INT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`idAdicional`, `idPedido`) ,
  INDEX `AdicionalP_Adicional_idx` (`idAdicional` ASC) ,
  INDEX `AdicionalP_Pedido_idx` (`idPedido` ASC) ,
  CONSTRAINT `AdicionalPedido_Adicional`
    FOREIGN KEY (`idAdicional` )
    REFERENCES `bd_www`.`Adicional` (`idAdicional` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `AdicionalPedido_Pedido`
    FOREIGN KEY (`idPedido` )
    REFERENCES `bd_www`.`Pedido` (`idPedido` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `bd_www` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
