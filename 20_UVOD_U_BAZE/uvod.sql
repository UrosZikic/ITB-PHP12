-- komanda za kreiranje baze podataka:
--1. CREATE DATABASE test_druga;

-- ovo nije neophodno ali je zgodno
--2. CREATE DATABASE test_druga CHARACTER SET utf16 COLLATE utf16_slovenian_ci; <= prosledi u SQL prozor unutar phpmyadmin
CREATE DATABASE test_druga CHARACTER SET utf16 COLLATE utf16_slovenian_ci;


-- komanda za brisanje baze podataka:
DROP DATABASE test_druga;

-- komanda za odabir baze podataka:
USE test_baza;

-- zadatak skola 
CREATE DATABASE test_druga CHARACTER SET utf16 COLLATE utf16_slovenian_ci;
-- 2 odabiri bazu skola
USE skola;
-- 3 Kreiranje tabele studenti
CREATE TABLE studenti(
  ime VARCHAR(50),
  prezime VARCHAR(50),
  -- jmbg CHAR(13)
);


-- tipovi podataka varchar...
-- char i varchar su isti ali varchar koristi memoriju koja mu treba a char svu koristi svu dodeljenu memoriju.

-- KREIRANJE TABELE CUSTOMERS
CREATE TABLE customers (
  id INT NOT NULL,
  name VARCHAR(20) NOT NULL,
  age TINYINT NOT NULL,
  address CHAR(25),
  salary DECIMAL(18, 2) DEFAULT 500
);

-- kreiranje tabele tasks
CREATE TABLE tasks(
  task_id INT UNIQUE,
  title VARCHAR(255) NUT NULL,
  start_date DATE,
  due_date DATE,
  status TINYINT NOT NULL,
  description TEXT
); 


-- MODIFIKACIJA -> DODAT PRIMARNI KLJUC (prim kljuc se moze sastojati od vise kolona)
-- CREATE TABLE customers (
--   id INT NOT NULL,
--   name VARCHAR(20) NOT NULL,
--   age TINYINT NOT NULL,
--   address CHAR(25),
--   salary DECIMAL(18, 2) DEFAULT 500,
--   PRIMARY KEY(id) 
-- ); -> NE jer vec postoji tabela sa tim nazivom, nema takve modifikacije

-- Dodavanja primarnog kljuca u tabelu customers
ALTER TABLE `customers` ADD PRIMARY KEY(`id`);
ALTER TABLE tasks ADD PRIMARY KEY(task_id);
-- dodavanje na drugi nacin
ALTER TABLE tasks
ADD title VARCHAR(255) NOT NULL;

-- zadatak
ALTER TABLE customers ADD active BOOLEAN;
ALTER TABLE customers ADD state VARCHAR(90);
ALTER TABLE customers ADD number_of_visits TINYINT;
ALTER TABLE tasks ADD priority TINYINT NOT FULL;

-- BRISANJE TABELE
DROP TABLE studenti;

-- DODAVANJE NOVIH REDOVA U TABELU
INSERT INTO customers VALUES (1, "Ana", 25, "Bubanjskih heroja 48", 600,00, 1, "Srbija", 37)

INSERT INTO customers(name, id, age, active, state, number_of_visits)
VALUES
("Bojana", 2, 39, 0, "Srbija", 16),
("Dejan", 3, 31, 0, "Crna Gora", 3)

INSERT INTO customers 
VALUES (4, "Ana", 25, "Bubanjskih heroja 48", 600,00, 1, "Srbija", 37);

-- DRUGI CAS BAZE PODATAKA 2/6/2023;

INSERT into tasks 
(task_id, title, start_date, due_date, status, description, priority)
VALUES
(1, "čas iz ITBootcampa", "2023-06-02", "2023-06-02", 1, "Čas iz baze podataka", 1),
(2, "Štenja", "2023-06-01", "2023-06-01", 1, "Lagan Šetnja", 0),
(3, "Uradi domaći zadatak", "2023-06-03", NULL, "Domaći zadataka iz sql-a", 1),