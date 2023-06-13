-- drugi cas nastavak
-- SELECT -> CITANJE PODATAKA IZ BAZE;

-- 2 Nacina
-- SELECT col_1, col_2,... FROM table_name;
-- SELECT * FROM table_name;

SELECT * FROM `tasks`;
SELECT `title`, `tart_date`, `due_date`, FROM `tasks`;

SELECT `name`, `age`, `address` FROM `customers`;

-- dohvati razlicita imena potrosaca -> ne vraca duplikate ili ti 2 ista imena.
SELECT DISTINCT `name` FROM `customers`; 

SELECT DISTINCT `name`, `age`, `address` FROM `customers`;

SELECT DISTINCT `id`, `name` FROM `customers`;

SELECT DISTINCT `salary` FROM `customers`;


-- zadatak
-- 1 procitaj klijente is srbije
SELECT * FROM `customers` WHERE `state` = 'Srbija';
-- 2 procitaje plate of 500
SELECT * FROM `customers` WHERE `salary` = 500;
SELECT * FROM `customers` WHERE `salary` > 500;
-- 3 procitaj task zadatke sa statusom 1
SELECT `task_id`, `title`, `description` FROM tasks WHERE `status` = 1;
SELECT `task_id`, `title`, `description` FROM tasks WHERE `priority` = 1;


-- iz tabele tasks, procitati sve zadatke koji su prioritetni, a koji su zavrseni.
SELECT `task_id`, `title`, `description` 
FROM `tasks` WHERE `priority` = 1
AND `due_date` IS NOT NULL;


-- CUSTOMER ZADATAK
-- 300 i 800 plata
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `salary` BETWEEN 300 AND 800;
-- nadju customer cija je plata jednaka 500, 600 ili 700;
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `salary` = 500 OR 600 OR 700;
-- ALT WAY
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `salary` IN (500, 600, 700);

-- nadji polje cije ime je Ana, Bojana ili Vuk
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `name` IN ('Ana', 'Bojana', 'Vuk');
-- nadji ime koje pocinje na slovo B
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `name` LIKE 'B%';
-- SADRZI SLOVO j
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `name` LIKE '%j%';

-- nadji ko je iz Srbije, Bugarske ili Rumunije
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `state` IN ('Srbija', 'Rumunija', 'Bugarska');
-- drzava koja pocinje slovom S
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `state` LIKE 's%';
-- dodatna mogucnost
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `state` LIKE 's%k%j%';
SELECT `name`, `address`, `state`, `salary` FROM `customers` WHERE `state` LIKE 'C%G%';

-- zadatak tasks
-- vrati id 1, 4, 8, 12
SELECT `task_id`, `title`, `start_date`, `description` FROM `tasks` WHERE `task_id` IN (1, 4, 8, 12);
-- vrati kasniji datum
SELECT `task_id`, `title`, `start_date`, `description` FROM `tasks` WHERE `start_date` > '2019-01-01';
-- vrati pozitivan status
SELECT `task_id`, `title`, `start_date`, `description` FROM `tasks` WHERE `status` != 0;

-- limitiranje broja rezultata
SELECT * FROM `customers` LIMIT 2;

SELECT * FROM `customers` WHERE `name` LIKE 'B%' LIMIT 1;

-- prikazi prva dva korisnika koji imaju dvocifren broj poseta
SELECT * FROM `customers` WHERE `number_of_visits` BETWEEN 10 AND 99 LIMIT 2;

-- sortiranje ascend i descend  ASC/DESC
SELECT * FROM `customers` ORDER BY `name`;

-- od najstarijeg ka najmladjem
SELECT * FROM `customers` ORDER BY `age` DESC;

-- od najmladjeg ka najstarijem i po broju poseta od vise ka manje poseta
SELECT * FROM `customers` ORDER BY `age` ASC, `number_of_visits` DESC;

-- PRIKAZI prva dva korisnika sa najvecim brojem poseta,
-- a ciji je broj poseta dvocifren

SELECT * FROM `customers` WHERE `number_of_visits` BETWEEN 10 AND 99 ORDER BY `number_of_visits` DESC LIMIT 2;

-- prikazi korisnika koji ima najmanju platu koja je u odseku izmedju 300 i 500;
-- ako ima vise ovakvih korisnika, prikazati onog cije je ime u leksikografskom poredku;
SELECT * FROM `customers` WHERE `salary` BETWEEN 300 AND 500 ORDER BY `salary`, `name` LIMIT 1

-- zadatak
SELECT * FROM `customers` WHERE `state` = 'Srbija' AND `salary` = 600;
SELECT * FROM `customers` WHERE `name` LIKE 'S$' OR `age` < 30;

SELECT * FROM `tasks` WHERE `status` != 1 AND `priority` > 0;
SELECT * FROM `tasks` WHERE NOT `start_date` > "2019-01-01";

-- funkcije seletka min/max/count/avg/sum

-- probroji kupce izmedju 30 i 40 godina
SELECT COUNT(`age`) FROM `customers` WHERE `age` BETWEEN 30 AND 40;

-- preimenovanje polja koji skladisti count(); ->AS "name"
SELECT COUNT(`age`) AS 'broj_kupaca' FROM `customers` WHERE `age` BETWEEN 30 AND 40;

-- prosecan broj kupaca
SELECT AVG(`number_of_visits`) AS 'prosecan_broj_poseta' FROM `customers`;

-- prosecna plata u srbiji 
SELECT AVG(`salary`) AS "prosecna_plata_srbija" FROM `customers` WHERE `state`  = "Srbija";

-- odredi broj razlicitih imena kupaca;
SELECT COUNT(DISTINCT `name`) AS "broj_razlicitih_imena" FROM `customers`;

-- ODREDI RAZLICITI broj drzava kupaca;
SELECT COUNT(DISTINCT `state`) AS "broj_razlicitih_drzava" FROM `customers`;


-- odrediti osobu sa najmanjom platom, ako ih ima vise izbaci bilo koga
SELECT `name` FROM `customers` WHERE `salary` = (SELECT MIN(`salary`) FROM `customers`) LIMIT 1;

-- ALT
SELECT `name` FROM `customers` ORDER BY `salary` LIMIT 1;

-- ISPISI imena svih natprodecno starih osoba;
SELECT `name` FROM `customers` WHERE `age` > (SELECT AVG(`age`) FROM `customers`) ORDER BY `name`;

-- ispisi imena svih srba sa natprosecnom platom
SELECT `name` FROM `customers` WHERE `salary` > (SELECT AVG(`salary`) FROM `customers` WHERE `state` = 'Srbija') AND `state` = 'Srbija';
