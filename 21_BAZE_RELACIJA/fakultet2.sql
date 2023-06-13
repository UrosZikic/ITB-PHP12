-- create database
CREATE DATABASE `fakultet2`;

-- create tables
CREATE TABLE `predmeti`(
  `id` INT PRIMARY KEY,
  `naziv` VARCHAR(50) NOT NULL,
  `smer` VARCHAR(50) NOT NULL
  ) ENGINE=INNODB;
CREATE TABLE `studenti` (
  `indeks` VARCHAR(10) PRIMARY KEY,
  `ime` VARCHAR (50) NOT NULL,
  `prezime` VARCHAR (50) NOT NULL
)ENGINE=INNODB;
CREATE TABLE `ispiti` (
  `id` INT PRIMARY KEY,
  `datum` DATE NOT NULL,
  `ocena` INT(2) NOT NULL
)ENGINE=INNODB;
CREATE TABLE `nastavnici` (
  `id` INT PRIMARY KEY,
  `ime` VARCHAR(50) NOT NULL,
  `prezime` VARCHAR(50) NOT NULL
)ENGINE=INNODB;

-- POVEZI
ALTER TABLE `ispiti` 
ADD `student_indeks` VARCHAR(10) NOT NULL,
ADD `predmet_id` INT NOT NULL,
ADD CONSTRAINT `ispit_student_fk`
FOREIGN KEY (`student_indeks`)
REFERENCES `studenti`(`indeks`),
ADD CONSTRAINT `ispit_predmet_fk`
FOREIGN KEY (`predmet_id`)
REFERENCES `predmeti`(`id`);

ALTER TABLE `ispiti`
ADD `nastavnik_id` INT NOT NULL,
ADD CONSTRAINT `ispiti_nastavnik_id`
FOREIGN KEY (`nastavnik_id`)
REFERENCES `nastavnici`(`id`); 

-- PROSIRI

CREATE TABLE `zvanje` (
  `id` INT PRIMARY KEY,
  `naziv_zvanja` VARCHAR(50) NOT NULL
) ENGINE=INNODB;
CREATE TABLE `smer` (
  `id` INT PRIMARY KEY,
  `naziv_smer` VARCHAR(50) NOT NULL
)ENGINE=INNODB;

CREATE TABLE `katedra` (
  `id` INT PRIMARY KEY,
  `naziv_katedra` VARCHAR(50) NOT NULL
) ENGINE=INNODB;

-- POVEZI
ALTER TABLE `nastavnici`
ADD `zvanje_id` INT NULL;

ALTER TABLE `nastavnici`
ADD FOREIGN KEY (`zvanje_id`)
REFERENCES `zvanje`(`id`);

-- popuni zvanje tabelu
ALTER TABLE `nastavnici`
MODIFY COLUMN `zvanje_id` INT NOT NULL;

SELECT `smer`.`naziv_smer`,
       `studenti`.`ime`,
       `studenti`.`prezime`
       	FROM `studenti`
        LEFT JOIN `smer` ON `studenti`.`smer_id` = `smer`.`id`;


UPDATE `studenti`
SET `smer_id` = 2
WHERE `ime` LIKE "A%";
-- UPITI

-- 1
SELECT 
 `studenti`.`ime`,
 `studenti`.`prezime`,
 `predmeti`.`naziv`, 
 `nastavnici`.`ime`, 
 `nastavnici`.`prezime`,
 `ispiti`.`datum`,
 `ispiti`.`ocena` 
  FROM `ispiti`
  LEFT JOIN `studenti` ON `ispiti`.`student_indeks` = `studenti`.`indeks`
  LEFT JOIN `predmeti` ON `ispiti`.`predmet_id` = `predmeti`.`id`
  LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id` = `nastavnici`.`id`;

-- 2
SELECT 
 `studenti`.`ime`,
 `studenti`.`prezime`,
 `predmeti`.`naziv`, 
 `nastavnici`.`ime`, 
 `nastavnici`.`prezime`,
 `ispiti`.`datum`,
 `ispiti`.`ocena` 
  FROM `ispiti`
  LEFT JOIN `studenti` ON `ispiti`.`student_indeks` = `studenti`.`indeks`
  LEFT JOIN `predmeti` ON `ispiti`.`predmet_id` = `predmeti`.`id`
  LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id` = `nastavnici`.`id`
  WHERE `ispiti`.`datum` = "2023-05-04";

-- 3
  SELECT 
 `studenti`.`ime`,
 `studenti`.`prezime`,
 `predmeti`.`naziv`,
 `ispiti`.`ocena`
 FROM `ispiti`
  LEFT JOIN `studenti` ON `ispiti`.`student_indeks` = `studenti`.`indeks`
  LEFT JOIN `predmeti` ON `ispiti`.`predmet_id` = `predmeti`.`id`
  WHERE `studenti`.`ime` = "Uros";

  -- 4
   SELECT 
 `studenti`.`ime`,
 `studenti`.`prezime`,
 `predmeti`.`naziv`,
 `ispiti`.`ocena`
 FROM `ispiti`
  LEFT JOIN `studenti` ON `ispiti`.`student_indeks` = `studenti`.`indeks`
  LEFT JOIN `predmeti` ON `ispiti`.`predmet_id` = `predmeti`.`id`
  WHERE `studenti`.`ime` = "Uros" AND `ispiti`.`ocena` > 8;

  -- 
   SELECT 
 `predmeti`.`naziv`,
 MAX(`ispiti`.`ocena`)
 FROM `ispiti`
 LEFT JOIN `predmeti` ON `ispiti`.`predmet_id` = `predmeti`.`id`
  WHERE `predmeti`.`naziv` = "CSS";
  -- 
    SELECT 
 `studenti`.`ime`,
 `studenti`.`prezime`,
 AVG(`ispiti`.`ocena`)
 FROM `ispiti`
  LEFT JOIN `studenti` ON `ispiti`.`student_indeks` = `studenti`.`indeks`
  WHERE `studenti`.`ime` = "Uros";

-- 
   SELECT 
 `ispiti`.`datum`,
 AVG(`ispiti`.`ocena`)
 FROM `ispiti`
 LEFT JOIN `predmeti` ON `ispiti`.`predmet_id` = `predmeti`.`id`
  WHERE `ispiti`.`datum` = "2023-05-04";


  -- 
  SELECT 
  `nastavnici`.`ime`,
  `katedra`.`naziv_katedra`
  FROM `nastavnik_has_katedra`
  LEFT JOIN `nastavnici` ON `nastavnik_has_katedra`.`nastavnik_id` = `nastavnici`.`id`
  LEFT JOIN `katedra` ON `nastavnik_has_katedra`.`katedra_id` = `katedra`.`id`;