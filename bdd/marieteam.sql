-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 mai 2023 à 13:35
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `idBateau` int NOT NULL AUTO_INCREMENT,
  `nomBateau` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `longueurBateau` int DEFAULT NULL,
  `largeurBat` int DEFAULT NULL,
  PRIMARY KEY (`idBateau`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`idBateau`, `nomBateau`, `longueurBateau`, `largeurBat`) VALUES
(1, 'MegaMax-24', 270, 32),
(2, 'Triple EClass', 300, 38),
(3, 'PanMax', 350, 40),
(4, 'ICoah', 250, 30),
(5, 'PingOurs', 330, 36);

-- --------------------------------------------------------

--
-- Structure de la table `bateaufret`
--

DROP TABLE IF EXISTS `bateaufret`;
CREATE TABLE IF NOT EXISTS `bateaufret` (
  `idBateau` int NOT NULL,
  `poidsMax` int NOT NULL,
  PRIMARY KEY (`idBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `bateauvoyageur`
--

DROP TABLE IF EXISTS `bateauvoyageur`;
CREATE TABLE IF NOT EXISTS `bateauvoyageur` (
  `idBateau` int NOT NULL,
  `vitesseMax` int NOT NULL,
  PRIMARY KEY (`idBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `bateauvoyageur`
--

INSERT INTO `bateauvoyageur` (`idBateau`, `vitesseMax`) VALUES
(1, 50),
(2, 24),
(3, 40),
(4, 50),
(5, 35);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `codeCategorie` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `libelleCategorie` varchar(65) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`codeCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`codeCategorie`, `libelleCategorie`) VALUES
('A', 'Passager'),
('B', 'Véh.inf.2m'),
('C', 'Véh.sup.2m');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `codeCategorie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `idBateau` int NOT NULL,
  `capacitéMax` int NOT NULL,
  PRIMARY KEY (`codeCategorie`,`idBateau`),
  KEY `idBateau` (`idBateau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`codeCategorie`, `idBateau`, `capacitéMax`) VALUES
('A', 1, 100),
('A', 2, 120),
('A', 3, 130),
('A', 4, 140),
('A', 5, 150),
('B', 1, 30),
('B', 2, 40),
('B', 3, 50),
('B', 4, 60),
('B', 5, 70),
('C', 1, 20),
('C', 2, 25),
('C', 3, 30),
('C', 4, 40),
('C', 5, 50);

-- --------------------------------------------------------

--
-- Structure de la table `enregistrer`
--

DROP TABLE IF EXISTS `enregistrer`;
CREATE TABLE IF NOT EXISTS `enregistrer` (
  `codeCategorie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numType` int NOT NULL,
  `numReservation` int NOT NULL,
  `quantité` int DEFAULT NULL,
  PRIMARY KEY (`codeCategorie`,`numType`,`numReservation`),
  KEY `numReservation` (`numReservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `enregistrer`
--

INSERT INTO `enregistrer` (`codeCategorie`, `numType`, `numReservation`, `quantité`) VALUES
('A', 1, 16, 1),
('A', 1, 17, 2),
('A', 1, 18, 1),
('A', 1, 19, 1),
('A', 2, 16, 1),
('A', 2, 17, 2),
('A', 2, 18, 1),
('A', 2, 19, 1),
('A', 3, 16, 1),
('A', 3, 17, 2),
('A', 3, 18, 1),
('A', 3, 19, 1),
('B', 1, 16, 1),
('B', 1, 17, 2),
('B', 1, 18, 1),
('B', 1, 19, 1),
('B', 2, 16, 1),
('B', 2, 17, 2),
('B', 2, 18, 1),
('B', 2, 19, 1),
('C', 1, 16, 1),
('C', 1, 17, 2),
('C', 1, 18, 1),
('C', 1, 19, 1),
('C', 2, 16, 1),
('C', 2, 17, 2),
('C', 2, 18, 1),
('C', 2, 19, 1),
('C', 3, 16, 1),
('C', 3, 17, 2),
('C', 3, 18, 1),
('C', 3, 19, 1);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `idEquipement` int NOT NULL AUTO_INCREMENT,
  `libelleEquipement` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`idEquipement`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`idEquipement`, `libelleEquipement`) VALUES
(1, 'Accès Handicapé'),
(2, 'Bar'),
(3, 'Pont Promenade'),
(4, 'Salon Vidéo'),
(5, 'Restaurant'),
(6, 'Piscine');

-- --------------------------------------------------------

--
-- Structure de la table `etre_equipé`
--

DROP TABLE IF EXISTS `etre_equipé`;
CREATE TABLE IF NOT EXISTS `etre_equipé` (
  `idBateau` int NOT NULL,
  `idEquipement` int NOT NULL,
  PRIMARY KEY (`idBateau`,`idEquipement`),
  KEY `idEquipement` (`idEquipement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `etre_equipé`
--

INSERT INTO `etre_equipé` (`idBateau`, `idEquipement`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 3),
(4, 3),
(4, 4),
(1, 5),
(2, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `codeLiaison` int NOT NULL AUTO_INCREMENT,
  `distanceLiaison` int NOT NULL,
  `idPort` int NOT NULL,
  `idPort_1` int NOT NULL,
  `idSecteur` int NOT NULL,
  PRIMARY KEY (`codeLiaison`),
  KEY `idPort` (`idPort`),
  KEY `idPort_1` (`idPort_1`),
  KEY `idSecteur` (`idSecteur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`codeLiaison`, `distanceLiaison`, `idPort`, `idPort_1`, `idSecteur`) VALUES
(1, 69, 1, 2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `idPeriode` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `dateDebutPeriode` date NOT NULL,
  `dateFinPeriode` date NOT NULL,
  PRIMARY KEY (`idPeriode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`idPeriode`, `dateDebutPeriode`, `dateFinPeriode`) VALUES
('1', '2021-09-01', '2022-06-15'),
('2', '2022-06-16', '2022-09-15'),
('3', '2022-09-16', '2025-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

DROP TABLE IF EXISTS `port`;
CREATE TABLE IF NOT EXISTS `port` (
  `idPort` int NOT NULL,
  `nomPort` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`idPort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`idPort`, `nomPort`) VALUES
(1, 'Quiberon'),
(2, 'Le Palais'),
(3, 'Sauzon'),
(4, 'Vannes'),
(5, 'Port St Gildas'),
(6, 'Lorient'),
(7, 'Port-Tudy');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `numReservation` int NOT NULL AUTO_INCREMENT,
  `nomReservation` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `adresseReservation` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `cpReservation` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `villeReservation` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numTraversee` int NOT NULL,
  `dates` date NOT NULL,
  `prix` int NOT NULL,
  `AdresseMailUtilisateur` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`numReservation`),
  KEY `numTraversee` (`numTraversee`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`numReservation`, `nomReservation`, `adresseReservation`, `cpReservation`, `villeReservation`, `numTraversee`, `dates`, `prix`, `AdresseMailUtilisateur`) VALUES
(16, 'Utilisateur1', '2 rue utilisateur', '14785', 'ville', 1, '2023-05-22', 962, 'utilisateur1@gmail.com'),
(17, 'Utilisateur1', '2 rue utilisateur', '14785', 'ville', 1, '2023-05-22', 1924, 'utilisateur1@gmail.com'),
(18, 'Utilisateur1', '2 rue utilisateur', '14785', 'ville', 1, '2023-05-22', 962, 'utilisateur1@gmail.com'),
(19, 'Utilisateur1', '2 rue utilisateur', '14785', 'ville', 2, '2023-05-22', 1187, 'utilisateur1@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `idSecteur` int NOT NULL,
  `nomSecteur` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`idSecteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`idSecteur`, `nomSecteur`) VALUES
(1, 'Belle-Île-en-mer'),
(2, 'Houat'),
(3, 'Ile de Groix'),
(4, 'Ouessant'),
(5, 'Molène'),
(6, 'Sein'),
(7, 'Bréhat'),
(8, 'Batz'),
(9, 'Aix'),
(10, 'Yeu');

-- --------------------------------------------------------

--
-- Structure de la table `tarifer`
--

DROP TABLE IF EXISTS `tarifer`;
CREATE TABLE IF NOT EXISTS `tarifer` (
  `codeLiaison` int NOT NULL,
  `idPeriode` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `codeCategorie` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numType` int NOT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`codeLiaison`,`idPeriode`,`codeCategorie`,`numType`),
  KEY `idPeriode` (`idPeriode`),
  KEY `codeCategorie` (`codeCategorie`,`numType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `tarifer`
--

INSERT INTO `tarifer` (`codeLiaison`, `idPeriode`, `codeCategorie`, `numType`, `prix`) VALUES
(1, '1', 'A', 1, '22'),
(1, '1', 'A', 2, '15'),
(1, '1', 'A', 3, '9'),
(1, '1', 'B', 1, '100'),
(1, '1', 'B', 2, '149'),
(1, '1', 'C', 1, '257'),
(1, '1', 'C', 2, '389'),
(1, '1', 'C', 3, '409'),
(1, '2', 'A', 1, '11'),
(1, '2', 'A', 2, '9'),
(1, '2', 'A', 3, '4'),
(1, '2', 'B', 1, '101'),
(1, '2', 'B', 2, '178'),
(1, '2', 'C', 1, '239'),
(1, '2', 'C', 2, '294'),
(1, '2', 'C', 3, '347'),
(1, '3', 'A', 1, '19'),
(1, '3', 'A', 2, '13'),
(1, '3', 'A', 3, '6'),
(1, '3', 'B', 1, '91'),
(1, '3', 'B', 2, '136'),
(1, '3', 'C', 1, '199'),
(1, '3', 'C', 2, '216'),
(1, '3', 'C', 3, '282'),
(2, '1', 'A', 1, '26'),
(2, '1', 'A', 2, '12'),
(2, '1', 'A', 3, '6'),
(2, '1', 'B', 1, '93'),
(2, '1', 'B', 2, '149'),
(2, '1', 'C', 1, '173'),
(2, '1', 'C', 2, '300'),
(2, '1', 'C', 3, '428'),
(2, '2', 'A', 1, '23'),
(2, '2', 'A', 2, '10'),
(2, '2', 'A', 3, '7'),
(2, '2', 'B', 1, '88'),
(2, '2', 'B', 2, '139'),
(2, '2', 'C', 1, '187'),
(2, '2', 'C', 2, '304'),
(2, '2', 'C', 3, '445'),
(2, '3', 'A', 1, '27'),
(2, '3', 'A', 2, '17'),
(2, '3', 'A', 3, '11'),
(2, '3', 'B', 1, '101'),
(2, '3', 'B', 2, '157'),
(2, '3', 'C', 1, '201'),
(2, '3', 'C', 2, '306'),
(2, '3', 'C', 3, '498'),
(3, '1', 'A', 1, '12'),
(3, '1', 'A', 2, '9'),
(3, '1', 'A', 3, '3'),
(3, '1', 'B', 1, '81'),
(3, '1', 'B', 2, '129'),
(3, '1', 'C', 1, '156'),
(3, '1', 'C', 2, '264'),
(3, '1', 'C', 3, '392'),
(3, '2', 'A', 1, '13'),
(3, '2', 'A', 2, '9'),
(3, '2', 'A', 3, '6'),
(3, '2', 'B', 1, '72'),
(3, '2', 'B', 2, '111'),
(3, '2', 'C', 1, '162'),
(3, '2', 'C', 2, '277'),
(3, '2', 'C', 3, '333'),
(3, '3', 'A', 1, '14'),
(3, '3', 'A', 2, '8'),
(3, '3', 'A', 3, '3'),
(3, '3', 'B', 1, '77'),
(3, '3', 'B', 2, '145'),
(3, '3', 'C', 1, '193'),
(3, '3', 'C', 2, '279'),
(3, '3', 'C', 3, '347'),
(4, '1', 'A', 1, '19'),
(4, '1', 'A', 2, '16'),
(4, '1', 'A', 3, '11'),
(4, '1', 'B', 1, '143'),
(4, '1', 'B', 2, '158'),
(4, '1', 'C', 1, '198'),
(4, '1', 'C', 2, '330'),
(4, '1', 'C', 3, '495'),
(4, '2', 'A', 1, '22'),
(4, '2', 'A', 2, '19'),
(4, '2', 'A', 3, '15'),
(4, '2', 'B', 1, '150'),
(4, '2', 'B', 2, '200'),
(4, '2', 'C', 1, '210'),
(4, '2', 'C', 2, '308'),
(4, '2', 'C', 3, '406'),
(4, '3', 'A', 1, '22'),
(4, '3', 'A', 2, '17'),
(4, '3', 'A', 3, '17'),
(4, '3', 'B', 1, '110'),
(4, '3', 'B', 2, '198'),
(4, '3', 'C', 1, '250'),
(4, '3', 'C', 2, '301'),
(4, '3', 'C', 3, '459'),
(5, '1', 'A', 1, '27'),
(5, '1', 'A', 2, '17'),
(5, '1', 'A', 3, '10'),
(5, '1', 'B', 1, '129'),
(5, '1', 'B', 2, '194'),
(5, '1', 'C', 1, '284'),
(5, '1', 'C', 2, '308'),
(5, '1', 'C', 3, '402'),
(5, '2', 'A', 1, '30'),
(5, '2', 'A', 2, '19'),
(5, '2', 'A', 3, '10'),
(5, '2', 'B', 1, '130'),
(5, '2', 'B', 2, '200'),
(5, '2', 'C', 1, '300'),
(5, '2', 'C', 2, '350'),
(5, '2', 'C', 3, '400'),
(5, '3', 'A', 1, '31'),
(5, '3', 'A', 2, '25'),
(5, '3', 'A', 3, '16'),
(5, '3', 'B', 1, '150'),
(5, '3', 'B', 2, '200'),
(5, '3', 'C', 1, '269'),
(5, '3', 'C', 2, '394'),
(5, '3', 'C', 3, '486'),
(6, '1', 'A', 1, '14'),
(6, '1', 'A', 2, '8'),
(6, '1', 'A', 3, '3'),
(6, '1', 'B', 1, '77'),
(6, '1', 'B', 2, '145'),
(6, '1', 'C', 1, '193'),
(6, '1', 'C', 2, '279'),
(6, '1', 'C', 3, '347'),
(6, '2', 'A', 1, '19'),
(6, '2', 'A', 2, '16'),
(6, '2', 'A', 3, '11'),
(6, '2', 'B', 1, '143'),
(6, '2', 'B', 2, '158'),
(6, '2', 'C', 1, '198'),
(6, '2', 'C', 2, '330'),
(6, '2', 'C', 3, '495'),
(6, '3', 'A', 1, '22'),
(6, '3', 'A', 2, '19'),
(6, '3', 'A', 3, '15'),
(6, '3', 'B', 1, '150'),
(6, '3', 'B', 2, '200'),
(6, '3', 'C', 1, '210'),
(6, '3', 'C', 2, '308'),
(6, '3', 'C', 3, '406'),
(7, '1', 'A', 1, '11'),
(7, '1', 'A', 2, '9'),
(7, '1', 'A', 3, '4'),
(7, '1', 'B', 1, '101'),
(7, '1', 'B', 2, '178'),
(7, '1', 'C', 1, '239'),
(7, '1', 'C', 2, '294'),
(7, '1', 'C', 3, '347'),
(7, '2', 'A', 1, '19'),
(7, '2', 'A', 2, '13'),
(7, '2', 'A', 3, '6'),
(7, '2', 'B', 1, '91'),
(7, '2', 'B', 2, '136'),
(7, '2', 'C', 1, '199'),
(7, '2', 'C', 2, '216'),
(7, '2', 'C', 3, '282'),
(7, '3', 'A', 1, '26'),
(7, '3', 'A', 2, '12'),
(7, '3', 'A', 3, '6'),
(7, '3', 'B', 1, '93'),
(7, '3', 'B', 2, '149'),
(7, '3', 'C', 1, '173'),
(7, '3', 'C', 2, '300'),
(7, '3', 'C', 3, '428'),
(8, '1', 'A', 1, '30'),
(8, '1', 'A', 2, '19'),
(8, '1', 'A', 3, '10'),
(8, '1', 'B', 1, '130'),
(8, '1', 'B', 2, '200'),
(8, '1', 'C', 1, '300'),
(8, '1', 'C', 2, '350'),
(8, '1', 'C', 3, '400'),
(8, '2', 'A', 1, '31'),
(8, '2', 'A', 2, '25'),
(8, '2', 'A', 3, '16'),
(8, '2', 'B', 1, '150'),
(8, '2', 'B', 2, '200'),
(8, '2', 'C', 1, '269'),
(8, '2', 'C', 2, '394'),
(8, '2', 'C', 3, '486'),
(8, '3', 'A', 1, '14'),
(8, '3', 'A', 2, '8'),
(8, '3', 'A', 3, '3'),
(8, '3', 'B', 1, '77'),
(8, '3', 'B', 2, '145'),
(8, '3', 'C', 1, '193'),
(8, '3', 'C', 2, '279'),
(8, '3', 'C', 3, '347');

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

DROP TABLE IF EXISTS `traversee`;
CREATE TABLE IF NOT EXISTS `traversee` (
  `numTraversee` int NOT NULL AUTO_INCREMENT,
  `dateTraversee` date NOT NULL,
  `heureDepartTraversee` time NOT NULL,
  `idBateau` int NOT NULL,
  `codeLiaison` int NOT NULL,
  PRIMARY KEY (`numTraversee`),
  KEY `idBateau` (`idBateau`),
  KEY `codeLiaison` (`codeLiaison`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `traversee`
--

INSERT INTO `traversee` (`numTraversee`, `dateTraversee`, `heureDepartTraversee`, `idBateau`, `codeLiaison`) VALUES
(1, '2023-12-29', '14:30:00', 4, 1),
(2, '2022-12-29', '14:00:00', 1, 7),
(3, '2023-12-29', '16:30:00', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `codeCategorie` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numType` int NOT NULL,
  `libelleType` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`codeCategorie`,`numType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`codeCategorie`, `numType`, `libelleType`) VALUES
('A', 1, 'Adulte'),
('A', 2, 'Junior 8 à 18 ans'),
('A', 3, 'Enfant 0 à 7 ans'),
('B', 1, 'Voiture inf. 4m'),
('B', 2, 'Voiture inf. 5m'),
('C', 1, 'Fourgon'),
('C', 2, 'Camping Car'),
('C', 3, 'Camion');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IDutilisateur` int NOT NULL AUTO_INCREMENT,
  `NomUtilisateur` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `AdresseMailUtilisateur` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `MdpUtilisateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `AdresseUtilisateur` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `CpUtilisateur` int NOT NULL,
  `RoleUtilisateur` int DEFAULT NULL,
  `ville` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`IDutilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDutilisateur`, `NomUtilisateur`, `AdresseMailUtilisateur`, `MdpUtilisateur`, `AdresseUtilisateur`, `CpUtilisateur`, `RoleUtilisateur`, `ville`) VALUES
(1, 'Utilisateur', 'utilisateur@gmail.com', 'df86714fc534e90b5ffa0726164516b16f207e7fb20a3b823be218c26c789f03', '42 avenue utilisateur', 14785, 0, 'lille1'),
(2, 'Technicien', 'technicien@gmail.com', 'df86714fc534e90b5ffa0726164516b16f207e7fb20a3b823be218c26c789f03', '42 rue technicien', 14785, 1, 'lille2'),
(3, 'Admin', 'admin@gmail.com', 'df86714fc534e90b5ffa0726164516b16f207e7fb20a3b823be218c26c789f03', '42 rue admin', 14785, 2, 'lille3'),
(15, 'Utilisateur1', 'utilisateur1@gmail.com', 'df86714fc534e90b5ffa0726164516b16f207e7fb20a3b823be218c26c789f03', '2 rue utilisateur', 14785, 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
