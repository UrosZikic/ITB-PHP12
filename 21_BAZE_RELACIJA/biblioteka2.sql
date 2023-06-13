
-- MAKE SURE TO ALWAYS CHECK SPELLING AND CORRECT PATH!!!--


-- create database
CREATE DATABASE `biblioteka2`;

-- create table
CREATE TABLE `clanovi` (
  `id` INT PRIMARY KEY,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL, 
  `adresa` VARCHAR(45),
  `telefon` CHAR(13)
) ENGINE=INNODB;

CREATE TABLE `knjige` (
  `id` INT PRIMARY KEY,
  `naziv` VARCHAR(45) NOT NULL,
  `pisac` VARCHAR(45) NOT NULL
)ENGINE=INNODB;

CREATE TABLE `zanr` (
  `id` INT PRIMARY KEY,
  `naziv` VARCHAR(45) NOT NULL
)ENGINE=INNODB;

CREATE TABLE `zaduzenje` (
  `id` INT PRIMARY KEY,
  `datum` DATE NOT NULL,
  `vratio` BOOLEAN DEFAULT 0 NOT NULL
)ENGINE=INNODB;

CREATE TABLE `pisac` (
  `id` INT PRIMARY KEY,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `bio` VARCHAR(45),
  `god_rodj` YEAR NOT NULL
)ENGINE=INNODB;

-- povezivanje
CREATE TABLE `knjige_has_zanr` (
  `knjige_id` INT NOT NULL,
  `zanr_id` INT NOT NULL,
   CONSTRAINT `knjiga_zanr_fk`
   FOREIGN KEY (`knjige_id`)
   REFERENCES `knjige`(`id`),
   CONSTRAINT `zanr_knjiga_fk`
   FOREIGN KEY (`zanr_id`)
   REFERENCES `zanr`(`id`)
);

ALTER TABLE `zaduzenje`
ADD `clanovi_id` INT NOT NULL,
ADD `knjige_id` INT NOT NULL,
ADD CONSTRAINT `zaduzenje_clanovi_fk`
FOREIGN KEY (`clanovi_id`) 
REFERENCES `clanovi`(`id`),
ADD CONSTRAINT `zaduzenje_knjige_fk`
FOREIGN KEY (`knjige_id`) 
REFERENCES `knjige`(`id`);

CREATE TABLE `knjige_has_pisac` (
  `knjige_id` INT NOT NULL,
  `pisac_id` INT NOT NULL,
  FOREIGN KEY (`knjige_id`) REFERENCES `knjige`(`id`),
  FOREIGN KEY (`pisac_id`) REFERENCES `pisac`(`id`)
);


-- insert
INSERT INTO `clanovi` VALUES 
(1, 'John', 'Smith', '123 Main St', '555-123-4567'),
  (2, 'Jane', 'Doe', '456 Elm St', '555-987-6543'),
  (3, 'Michael', 'Johnson', '789 Oak Ave', '555-555-5555'),
  (4, 'Emily', 'Williams', '321 Maple Rd', '555-222-3333'),
  (5, 'David', 'Brown', '555 Pine Ln', '555-444-8888'),
  (6, 'Sarah', 'Taylor', '777 Cedar Dr', '555-777-9999'),
  (7, 'James', 'Anderson', '999 Walnut St', '555-111-2222'),
  (8, 'Olivia', 'Lee', '222 Oak St', '555-666-7777'),
  (9, 'Ethan', 'Martinez', '444 Maple Ave', '555-333-1111'),
  (10, 'Ava', 'Wilson', '888 Pine Rd', '555-888-5555');

  INSERT INTO knjige (id, naziv, pisac) VALUES
  (1, 'The Great Gatsby', 'F. Scott Fitzgerald'),
  (2, 'To Kill a Mockingbird', 'Harper Lee'),
  (3, 'Pride and Prejudice', 'Jane Austen'),
  (4, '1984', 'George Orwell'),
  (5, 'The Catcher in the Rye', 'J.D. Salinger'),
  (6, "Harry Potter and the Sorcerer's Stone", 'J.K. Rowling'),
  (7, 'The Hobbit', 'J.R.R. Tolkien'),
  (8, 'The Da Vinci Code', 'Dan Brown'),
  (9, 'The Lord of the Rings', 'J.R.R. Tolkien'),
  (10, 'Animal Farm', 'George Orwell');

  INSERT INTO zanr (id, naziv)
VALUES
  (1, 'Drama'),
  (2, 'Mystery'),
  (3, 'Romance'),
  (4, 'Science Fiction'),
  (5, 'Fantasy'),
  (6, 'Thriller'),
  (7, 'Historical'),
  (8, 'Biography'),
  (9, 'Horror'),
  (10, 'Adventure');

 INSERT INTO zaduzenje (id, datum, vratio, clanovi_id, knjige_id)
VALUES
  (1, '2023-05-01', 0, 1, 3),
  (2, '2023-05-15', 1, 2, 1),
  (3, '2023-06-02', 0, 3, 5),
  (4, '2023-05-10', 1, 4, 2),
  (5, '2023-05-28', 0, 5, 7),
  (6, '2023-05-05', 1, 6, 4),
  (7, '2023-06-01', 0, 7, 9),
  (8, '2023-05-20', 1, 8, 6),
  (9, '2023-05-12', 1, 1, 10),
  (10, '2023-05-18', 0, 2, 8);

  INSERT INTO pisac (id, ime, prezime, bio, god_rodj)
VALUES
  (1, 'F. Scott', 'Fitzgerald', NULL, 1896),
  (2, 'Harper', 'Lee', NULL, 1926),
  (3, 'Jane', 'Austen', NULL, 1775),
  (4, 'George', 'Orwell', NULL, 1903),
  (5, 'J.D.', 'Salinger', NULL, 1919),
  (6, 'J.K.', 'Rowling', NULL, 1965),
  (7, 'J.R.R.', 'Tolkien', NULL, 1892),
  (8, 'Dan', 'Brown', NULL, 1964),
  (9, 'J.R.R.', 'Tolkien', NULL, 1892),
  (10, 'George', 'Orwell', NULL, 1903);

  INSERT INTO `knjige_has_pisac` (`knjige_id`, `pisac_id`) VALUES (1, 1);
 

 INSERT INTO `knjige_has_zanr` (`knjige_id`, `zanr_id`)
VALUES
  (1, 1),
  (1, 2),
  (2, 3),
  (2, 4),
  (3, 3),
  (3, 5),
  (4, 6),
  (4, 7),
  (5, 8),
  (6, 9),
  (6, 10),
  (7, 2),
  (8, 11),
  (9, 12),
  (9, 7),
  (10, 13),
  (10, 14);


--   SELECT 
-- CONCAT(`studenti`.`ime`, " ", `studenti`.`prezime`) AS `student`,
-- `predmeti`.`naziv`,
-- CONCAT(`nastavnici`.`ime`, " ", `nastavnici`.`prezime`) AS `nastavnik`,
-- `ispiti`.`datum`,
-- `ispiti`.`ocena`
--  FROM `ispiti` 
-- LEFT JOIN `studenti` ON `ispiti`.`student_indeks`= `studenti`.`indeks`
-- LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`= `predmeti`.`id`
-- LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`= `nastavnici`.`id`
-- WHERE `studenti`.`ime`="Nikola" AND `studenti`.`prezime` = "Devic"
-- AND `ispiti`.`ocena` >8;


-- UPITI

SELECT `ime` FROM `clanovi`;
SELECT CONCAT(`clanovi`.`ime`, " ", `clanovi`.`prezime`) AS `Full Name` FROM `clanovi`;

--NE MOZE --> NE MOZES ZVATI KOLONE JEDNE TABELE U DRUGOJ TABELI <--
            --  UKOLIKO NE POSTOJI FOREIGN KEY KOJI IH POVEZUJE --
-- SELECT CONCAT(`clanovi`.`ime`, " ", `clanovi`.`prezime`) AS `Full Name` FROM `pisac`;

SELECT CONCAT(`pisac`.`ime`, " ", `pisac`.`prezime`) AS `Full Name` 
FROM `pisac` WHERE `pisac`.`ime` LIKE 'J%';

SELECT `knjige`.`naziv`,
       `zanr`.`naziv`
FROM `knjige_has_zanr`
     LEFT JOIN `knjige` ON `knjige_has_zanr`.`knjige_id` = `knjige`.`id`
     LEFT JOIN `zanr` ON `knjige_has_zanr`.`zanr_id` = `zanr`.`id`;


-- RADI
SELECT CONCAT(`clanovi`.`ime`, " ", `clanovi`.`prezime`) AS `Full Name`,
`knjige`.`naziv`,
`zaduzenje`.`datum`,
`zaduzenje`.`vratio`
FROM `zaduzenje`
LEFT JOIN `clanovi` ON `zaduzenje`.`clanovi_id` = `clanovi`.`id`
LEFT JOIN `knjige` ON `zaduzenje`.`knjige_id` = `knjige`.`id`;

-- DODATAK
WHERE `zaduzenje`.`vratio` = 0;

-- MAKE SURE TO ALWAYS CHECK SPELLING AND CORRECT PATH!!!--