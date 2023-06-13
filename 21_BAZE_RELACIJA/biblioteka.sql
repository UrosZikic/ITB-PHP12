CREATE DATABASE `biblioteka`;

-- tabele
CREATE TABLE `clanovi` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `adresa` VARCHAR(45),
  `telefon` CHAR(13) NOT NULL
) ENGINE=INNODB;

INSERT INTO `clanovi` VALUES ("Uros", "Zikic", "Adresa 1", "+381061234567");


CREATE TABLE `knjige` (
   `id` INT AUTO_INCREMENT PRIMARY KEY,
  `naziv` VARCHAR(45),
  `pisac` VARCHAR(45),
)  ENGINE=INNODB;

INSERT INTO `knjige` (`naziv`, `pisac`) VALUES ("Harry Potter and the Philosopher's Stone", "J.K.Rowling");

CREATE TABLE `zanr` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
 `naziv` VARCHAR(45),
)  ENGINE=INNODB;

CREATE TABLE `zaduzenje` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
 `datum` DATE NOT NULL,
 `vratio` BOOLEAN DEFAULT 0 NOT NULL
)  ENGINE=INNODB;

INSERT INTO `zaduzenje` (`datum`, `vratio`) VALUES ('1.6.2023', 0);

CREATE TABLE `pisac` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
 `ime` VARCHAR(45) NOT NULL,
 `prezime` VARCHAR(45) NOT NULL,
 `bio` TEXT,
 `god_rodj` INT(4)
);

-- POVEZIVANJE KNJIGE I ZANRA
CREATE TABLE `zanr_has_knjigu` (
  `zanr_id` INT(10) NOT NULL,
  `knjiga_id` INT NOT NULL,
  FOREIGN KEY (`zanr_id`)
  REFERENCES `zanr`(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`knjiga_id`)
  REFERENCES `knjige`(`id`)
  ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=INNODB;

-- POVEZIVANJE CLANOVA I ZADUZENJA 
-- MAJA JE TABELU ZADOUZENJE "ALTER" UMESTO DA PRAVI OVAKO, UKLONI OVU TABELU
-- CREATE TABLE `clan_zaduzio_knjigu` (
--   `clan_id` INT(10) NOT NULL,
--   `zaduzenje_id` INT(10) NOT NULL,
--   `knjiga_id` INT(10) NOT NULL,
--   FOREIGN KEY (`clan_id`)
--   REFERENCES `clanovi`(`id`)
--   ON DELETE CASCADE ON UPDATE CASCADE,
--   FOREIGN KEY (`zaduzenje_id`)
--   REFERENCES `vratio`(`id`)
--   ON DELETE CASCADE ON UPDATE CASCADE,
--   FOREIGN KEY (`knjiga_id`)
--   REFERENCES `knjige`(`id`)
--   ON DELETE NO ACTION ON UPDATE CASCADE
-- ) ENGINE=INNODB;

ALTER TABLE `zaduzenje`
   `clan_id` INT NOT NULL,
   `knjiga_id` INT NOT NULL,
   FOREIGN KEY (`clan_id`)
   REFERENCES `clanovi`(`id`)
   FOREIGN KEY (`knjiga_id`)
   REFERENCES `knjige`(`id`)

-- INSERT INTO `clan_zaduzio_knjigu` (`clan_id`, `zaduzenje_id`, `knjiga_id`) 
-- VALUES (1, 0, 1);

-- POVIZIVANJE PISCA I KNJIGE
CREATE TABLE `pisac_pisao_knjigu` (
  `pisac_id` INT NOT NULL,
  `knjiga_id` INT NOT NULL,
  FOREIGN KEY (`pisac_id`)
  REFERENCES `pisac`(`id`)
  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`knjiga_id`)
  REFERENCES `knjige`(`id`)
  ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=INNODB;

