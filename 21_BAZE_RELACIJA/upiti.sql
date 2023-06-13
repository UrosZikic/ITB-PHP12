-- create a new DATABASE
CREATE DATABASE drustvena_mreza;
-- create a table 
CREATE TABLE `korisnici` (
`id` INT PRIMARY KEY,
`korisnicko_ime` VARCHAR(45),
`lozinka` VARCHAR(45)
) ENGINE=INNODB
-- create a table (foreign key one) 1 on 1 relation
CREATE TABLE `profili` {
  `id` INT PRIMARY KEY,
  `adresa` VARCHAR(45),
  `telefon` VARCHAR(45),
  `korisnik_id` INT NOT NULL UNIQUE-- UNIQUE was initially forgotten, UNIQUE ensures 1 on 1 relation
} ENGINE=INNODB

-- add foreign key
ALTER TABLE `profili`
ADD FOREIGN KEY(`korisnik_id`) --profili
REFERENCES `korisnici`(`id`) -- 

-- change engine -> if foreign key is not added
ALTER TABLE `profili` ENGINE=INNODB
ALTER TABLE `korisnici` ENGINE=INNODB

-- add unique
ALTER TABLE `profili` ADD UNIQUE(`korisnik_id`);

-- insert
INSERT INTO `korisnici` (`id`, `korisnicko_ime`, `lozinka`)
VALUES 
(1, "Pera_Peric", "1234"),
(2, "Mika_Mikic", "12345"),
(3, "Nikola_Nikolic", "1212");

INSERT INTO `profili` (`id`, `korisnik_id`, `adresa`)
VALUES 
(1, 3, "Adresa korisnika id=3"),
(10, 2, "Adresa korisnika id=2");

-- nije moguce jer profil 50 ne postoji;
-- INSERT INTO `profili` (`id`, `kosisnkik_id`, `adresa`)
-- VALUES 
-- (1, 50, "Adresa korisnika id=5"),


-- menjanje on Delete
-- ALTER TABLE `profili` DROP FOREIGN KEY `profili_ibfk_1`; ALTER TABLE `profili` ADD CONSTRAINT `profili_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnici`(`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

-- create a table 1:n
CREATE TABLE `objave`(
  `id` INT PRIMARY KEY,
  `naslov_objave` VARCHAR(45) NOT NULL
) ENGINE=INNODB;

CREATE TABLE `komentari` (
  `id` INT PRIMARY KEY,
  `komentar` VARCHAR(255) NOT NULL
  `objava_id` INT NOT NULL 
) ENGINE=INNODB;

-- za update uvek cascade, za delete razmisli!
ALTER TABLE `komentari` 
ADD CONSTRAINT `komentari_objava_fk`
FOREIGN KEY (`objava_id`)
REFERENCES `objave`(`id`)
ON DELETE CASCADE ON UPDATE CASCADE;

-- DODAJ OBJAVE
INSERT INTO `objave` (`id`, `naslov_objave`) 
VALUES 
(1, "Moja prva objava"),
(2, "Druga objava"),
(3, "Moja treca objava");

INSERT INTO `komentari` (`id`, `objava_id`, `komentar`) 
VALUES 
(1, 1, "Komentar 1 za objavu 1"),
(2, 1, "Komentar 2 za objavu 1"),
(3, 3, "Komentar 1 za objavu 3");

-- n:m
CREATE TABLE `kategorije` (
  `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `naziv` VARCHAR(45) NOT NULL,
) ENGINE=INNODB;

INSERT INTO `kategorije`(`id`, `naziv`)
VALUES
(1, "Ekonomija"),
(null, "Crna Hronika");

-- auto inkrement
INSERT INTO `kategorije`(`naziv`)
VALUES
( "Ljubav"),
("Zdravlje");

-- DODAJ TRECU TABELU KOJA DRZI DRUGE DVE
CREATE TABLE `kategorije_has_objave` (
  `kategorija_id` INT(10) UNSIGNED NOT NULL,
  `objava_id` INT NOT NULL
) ENGINE=INNODB;
--NO ACTION jer ne zelimo da izgubimo ID iz trece tabele kada obrisemo kategoriju iz prve.
ALTER TABLE `kategorije_has_objave`
ADD CONSTRAINT `kat_obj_kategorija_fk`
FOREIGN KEY (`kategorija_id`)
REFERENCES `kategorije`(`id`)
ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `kat_obj_objava_fk`
FOREIGN KEY (`objava_id`)
REFERENCES `objave`(`id`)
ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `kategorije_has_objave` ENGINE=INNODB;

-- alter table `kategorija_has_objave` nije radilo bez ovog altera ispod!!!!
ALTER TABLE `kategorije_has_objave` CHANGE `kategorija_id` `kategorija_id` INT(10) UNSIGNED NOT NULL;

-- insert 
INSERT INTO `kategorije_has_objave` (`kategorija_id`, `objava_id`)
VALUES
(1, 1),
(5, 1),
(2, 2),
(4, 2),
(1, 3);