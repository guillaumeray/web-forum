use webforum;

CREATE TABLE `Articles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `titre` VARCHAR(45) NULL,
  `description` MEDIUMTEXT NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `Messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `room` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NULL,
  `message` MEDIUMTEXT NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `Room` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` MEDIUMTEXT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
