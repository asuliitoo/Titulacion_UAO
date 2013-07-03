SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`carrera` (
  `id_carrera` INT NOT NULL AUTO_INCREMENT ,
  `nombre_carrera` VARCHAR(45) NULL ,
  `creditos_carrera` INT NULL ,
  PRIMARY KEY (`id_carrera`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`alumno`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`alumno` (
  `id_alumno` INT NULL ,
  `fk_carrera` INT NULL ,
  `descripcion` VARCHAR(45) NULL ,
  `programa` VARCHAR(45) NULL ,
  `nombre_alumno` VARCHAR(45) NULL ,
  `clase_alumno` INT NULL ,
  `creditos_ganados` INT NULL ,
  `creditos_inscrito` INT NULL ,
  `creditos_avance` INT NULL ,
  `porcentaje_avance` INT NULL ,
  `estado_candidato` INT NULL ,
  PRIMARY KEY (`id_alumno`) ,
  INDEX `fk_carrera_idx` (`fk_carrera` ASC) ,
  CONSTRAINT `fk_carrera`
    FOREIGN KEY (`fk_carrera` )
    REFERENCES `Sis_Titulacion`.`carrera` (`id_carrera` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`rol` (
  `id_rol` INT NOT NULL AUTO_INCREMENT ,
  `nombre_rol` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_rol`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`usuario` (
  `id_usuario` INT NULL AUTO_INCREMENT ,
  `fk_rol` INT NULL ,
  `nombre_usuario` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_rol_idx` (`fk_rol` ASC) ,
  CONSTRAINT `fk_rol`
    FOREIGN KEY (`fk_rol` )
    REFERENCES `Sis_Titulacion`.`rol` (`id_rol` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`validaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`validaciones` (
  `id_validaciones` INT NOT NULL AUTO_INCREMENT ,
  `fk_usuario` INT NULL ,
  `fk_alumno` INT NULL ,
  `pago_titulacion` INT NULL ,
  `ingles` INT NULL ,
  `documento_firmas` INT NULL ,
  `estado_validacion` INT NULL ,
  PRIMARY KEY (`id_validaciones`) ,
  INDEX `fk_alumno_idx` (`fk_alumno` ASC) ,
  INDEX `fk_usuario_idx` (`fk_usuario` ASC) ,
  CONSTRAINT `fk_alumno`
    FOREIGN KEY (`fk_alumno` )
    REFERENCES `Sis_Titulacion`.`alumno` (`id_alumno` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario`
    FOREIGN KEY (`fk_usuario` )
    REFERENCES `Sis_Titulacion`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`preparatoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`preparatoria` (
  `id_preparatoria` INT NOT NULL AUTO_INCREMENT ,
  `nombre_preparatoria` VARCHAR(45) NULL ,
  `entidad_preparatoria` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_preparatoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`info`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`info` (
  `id_info` INT NOT NULL AUTO_INCREMENT ,
  `nombre_info` VARCHAR(45) NULL ,
  `categoria_info` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_info`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Sis_Titulacion`.`titulacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sis_Titulacion`.`titulacion` (
  `id_titulacion` INT NOT NULL AUTO_INCREMENT ,
  `fk_alumno` INT NULL ,
  `fk_preparatoria` INT NULL ,
  `fk_info` INT NULL ,
  `periodo_preparatoria` VARCHAR(45) NULL ,
  `periodo_carrera` VARCHAR(45) NULL ,
  `CURP` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_titulacion`) ,
  INDEX `fk_alumnoT_idx` (`fk_alumno` ASC) ,
  INDEX `fk_preparatoria_idx` (`fk_preparatoria` ASC) ,
  INDEX `fk_info_idx` (`fk_info` ASC) ,
  CONSTRAINT `fk_alumnoT`
    FOREIGN KEY (`fk_alumno` )
    REFERENCES `Sis_Titulacion`.`alumno` (`id_alumno` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_preparatoria`
    FOREIGN KEY (`fk_preparatoria` )
    REFERENCES `Sis_Titulacion`.`preparatoria` (`id_preparatoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_info`
    FOREIGN KEY (`fk_info` )
    REFERENCES `Sis_Titulacion`.`info` (`id_info` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
