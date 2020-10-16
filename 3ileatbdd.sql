Drop table if exists utilisateurs;

CREATE TABLE utilisateurs (
  idUtil mediumint(8) UNSIGNED primary key,
  login varchar(50) DEFAULT NULL,
  mdp varchar(50) DEFAULT NULL,
  courriel varchar(255) DEFAULT NULL,
  droit varchar(6) DEFAULT 'Client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO utilisateurs (idUtil, login, mdp,courriel) VALUES
(2, 'Invite', '$2y$10$JxFeD0mSVllbniTHTTtLh.Z8btBIDV56kEqhBmRLpEXeQNjP0YtJK', 'invite@3ileat.fr'),
(3, 'Jordan', '$2y$10$pQObxWPm5uBhTnObB/r6vuw/kAo7H95.J4khxXCrz0kpT6H3eLa2C', 'jordan3il@3ileat.fr');


insert into utilisateurs values (1, 'Admin', '$2y$10$/tVWd38AC80UvQVRFMmJ2OAukWgu0VytX6wwLbFUjtr7IZr2n2Uii', 'admin@3ileat.fr', 'Admin');
insert into utilisateurs values (4, 'Admin2', '$2y$10$dfRWSgGpWfb4ShCRZQ3/7OzUKkUwOVW97g2JXMmxO7Q55Ws6pBoDe', 'admin2@3ileat.fr', 'Admin');
insert into utilisateurs values (5, 'Admin3', '$2y$10$fIQVsQrZ0lWLlP8IDxrLPuAOY9UmWyG..GYU2D.wVkDBpJhb2GmOG', 'admin3@3ileat.fr', 'Admin');


DROP TABLE IF EXISTS `ticket`;

CREATE TABLE IF NOT EXISTS `ticket`(
  `idTicket` mediumint(8) NOT NULL AUTO_INCREMENT,
  `idUtil` mediumint(8) NOT NULL,
  `etat` VARCHAR(20) NOT NULL DEFAULT 'ouvert',
  `objet` VARCHAR(300) NOT NULL,
  `reponse` VARCHAR(300) NULL DEFAULT NULL,
  `dateopen` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateclose` DATETIME NULL,
  `openadmin` VARCHAR(50) NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `idUtil` (`idUtil`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


insert into ticket (idTicket, idUtil, objet) values
 (1, 2, 'Remarque sur le sujet du manque de fourchettes'),
 (2, 2, 'Plaite pour les repas avec trop de sel pas bien pour las sante...'),
 (3, 2, 'De la musique douce pendant les repas sera une bonne idée'),
 (4, 2, 'Pourquoi pas une pause à table basse'),
 (5, 2, 'Des hamburgers, ca prend moin de temps à préparer !'),
 (6, 2, 'Je vote pour des repas vegetariens'),
 (7, 3, 'Les salles sont pas lumineuses...'),
 (8, 3, 'Trop de bruit pendant les repas, une musique douce pour combler ?'),
 (9, 3, 'Grand manque de forchettes'),
 (10, 3, 'Pas assez de places pour tout le monde'),
 (11, 2, 'Bonne ambiance le matin mais pas a midi...');
 

UPDATE ticket
SET reponse = 'Nous aurons un nouveau stock la semaine prochaine',
	etat = 'ferme',
    openadmin = 'Admin',
    dateclose = NOW()
WHERE idTicket = 1;



