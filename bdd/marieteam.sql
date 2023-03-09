-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 09 mars 2023 à 08:38
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

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

CREATE TABLE `bateau` (
  `idBateau` int NOT NULL,
  `nomBateau` varchar(50) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`idBateau`, `nomBateau`) VALUES
(1, 'MegaMax-24'),
(2, 'Triple E’Class'),
(3, 'PanMax'),
(4, 'ICoah'),
(5, 'PingOurs');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `codeCategorie` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `libelleCategorie` varchar(65) COLLATE utf8mb3_bin NOT NULL
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

CREATE TABLE `contenir` (
  `codeCategorie` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `idBateau` int NOT NULL,
  `capacitéMax` int NOT NULL
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

CREATE TABLE `enregistrer` (
  `codeCategorie` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `numType` int NOT NULL,
  `numReservation` int NOT NULL,
  `quantité` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `enregistrer`
--

INSERT INTO `enregistrer` (`codeCategorie`, `numType`, `numReservation`, `quantité`) VALUES
('A', 1, 1, 10),
('A', 1, 2, 150),
('A', 2, 1, 10),
('A', 3, 1, 10),
('B', 1, 1, 1),
('B', 1, 2, 70),
('B', 2, 1, 1),
('C', 1, 1, 1),
('C', 1, 2, 50),
('C', 2, 1, 1),
('C', 3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

CREATE TABLE `liaison` (
  `codeLiaison` int NOT NULL,
  `distanceLiaison` int NOT NULL,
  `idPort` int NOT NULL,
  `idPort_1` int NOT NULL,
  `idSecteur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`codeLiaison`, `distanceLiaison`, `idPort`, `idPort_1`, `idSecteur`) VALUES
(1, 8, 1, 2, 1),
(2, 9, 2, 1, 1),
(3, 8, 1, 3, 1),
(4, 8, 3, 1, 1),
(5, 24, 4, 2, 1),
(6, 25, 2, 4, 1),
(7, 9, 1, 5, 2),
(8, 9, 5, 1, 2),
(9, 8, 6, 7, 3),
(10, 7, 7, 6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

CREATE TABLE `periode` (
  `idPeriode` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `dateDebutPeriode` date NOT NULL,
  `dateFinPeriode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`idPeriode`, `dateDebutPeriode`, `dateFinPeriode`) VALUES
('1', '2021-09-01', '2022-06-15'),
('2', '2022-06-16', '2022-09-15'),
('3', '2022-09-16', '2023-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `idPort` int NOT NULL,
  `nomPort` varchar(32) COLLATE utf8mb3_bin NOT NULL
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

CREATE TABLE `reservation` (
  `numReservation` int NOT NULL,
  `nomReservation` varchar(32) COLLATE utf8mb3_bin NOT NULL,
  `adresseReservation` varchar(254) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `cpReservation` varchar(5) COLLATE utf8mb3_bin NOT NULL,
  `villeReservation` varchar(40) COLLATE utf8mb3_bin NOT NULL,
  `numTraversee` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`numReservation`, `nomReservation`, `adresseReservation`, `cpReservation`, `villeReservation`, `numTraversee`) VALUES
(1, 'Peterson', 'Avenue Gaston Berger', '59000', 'Lille', 1),
(2, 'John', 'Avenue Gaston Berger', '59000', 'Lille', 4);

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE `secteur` (
  `idSecteur` int NOT NULL,
  `nomSecteur` varchar(32) COLLATE utf8mb3_bin NOT NULL
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

CREATE TABLE `tarifer` (
  `codeLiaison` int NOT NULL,
  `idPeriode` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `codeCategorie` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numType` int NOT NULL,
  `prix` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `tarifer`
--

INSERT INTO `tarifer` (`codeLiaison`, `idPeriode`, `codeCategorie`, `numType`, `prix`) VALUES
(1, '3', 'A', 1, '19'),
(1, '3', 'A', 2, '12'),
(1, '3', 'A', 3, '6'),
(1, '3', 'B', 1, '91'),
(1, '3', 'B', 2, '136'),
(1, '3', 'C', 1, '199'),
(1, '3', 'C', 2, '216'),
(1, '3', 'C', 3, '282');

-- --------------------------------------------------------

--
-- Structure de la table `traversee`
--

CREATE TABLE `traversee` (
  `numTraversee` int NOT NULL,
  `dateTraversee` date NOT NULL,
  `heureDepartTraversee` time NOT NULL,
  `idBateau` int NOT NULL,
  `codeLiaison` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `traversee`
--

INSERT INTO `traversee` (`numTraversee`, `dateTraversee`, `heureDepartTraversee`, `idBateau`, `codeLiaison`) VALUES
(1, '2023-12-29', '14:30:00', 4, 1),
(2, '2022-12-29', '14:00:00', 1, 7),
(3, '2023-12-29', '16:30:00', 1, 1),
(4, '2023-12-29', '20:30:00', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `codeCategorie` char(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `numType` int NOT NULL,
  `libelleType` varchar(50) COLLATE utf8mb3_bin NOT NULL
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

CREATE TABLE `utilisateur` (
  `IDutilisateur` int NOT NULL,
  `NomUtilisateur` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `AdresseMailUtilisateur` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `MdpUtilisateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `AdresseUtilisateur` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `CpUtilisateur` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IDutilisateur`, `NomUtilisateur`, `AdresseMailUtilisateur`, `MdpUtilisateur`, `AdresseUtilisateur`, `CpUtilisateur`) VALUES
(1, 'John', 'johndoe@gmail.com', 'password', '69 rue Gaston Berger', 59000),
(3, 'Vanreust', 'florianvanreust@gmail.com', 'b8fe7b5bf0edd635fa2f6e2602664a89d18b22f7898a31fb565305406170809b', '9 sur 10 rue charles van de veegaete', 59200);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bateau`
--
ALTER TABLE `bateau`
  ADD PRIMARY KEY (`idBateau`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`codeCategorie`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`codeCategorie`,`idBateau`),
  ADD KEY `idBateau` (`idBateau`);

--
-- Index pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD PRIMARY KEY (`codeCategorie`,`numType`,`numReservation`),
  ADD KEY `numReservation` (`numReservation`);

--
-- Index pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD PRIMARY KEY (`codeLiaison`),
  ADD KEY `idPort` (`idPort`),
  ADD KEY `idPort_1` (`idPort_1`),
  ADD KEY `idSecteur` (`idSecteur`);

--
-- Index pour la table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idPeriode`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`idPort`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`numReservation`),
  ADD KEY `numTraversee` (`numTraversee`);

--
-- Index pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD PRIMARY KEY (`idSecteur`);

--
-- Index pour la table `tarifer`
--
ALTER TABLE `tarifer`
  ADD PRIMARY KEY (`codeLiaison`,`idPeriode`,`codeCategorie`,`numType`),
  ADD KEY `idPeriode` (`idPeriode`),
  ADD KEY `codeCategorie` (`codeCategorie`,`numType`);

--
-- Index pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD PRIMARY KEY (`numTraversee`),
  ADD KEY `idBateau` (`idBateau`),
  ADD KEY `codeLiaison` (`codeLiaison`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`codeCategorie`,`numType`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`IDutilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bateau`
--
ALTER TABLE `bateau`
  MODIFY `idBateau` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numReservation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `traversee`
--
ALTER TABLE `traversee`
  MODIFY `numTraversee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `IDutilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`codeCategorie`) REFERENCES `categorie` (`codeCategorie`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`idBateau`) REFERENCES `bateau` (`idBateau`);

--
-- Contraintes pour la table `enregistrer`
--
ALTER TABLE `enregistrer`
  ADD CONSTRAINT `enregistrer_ibfk_1` FOREIGN KEY (`codeCategorie`,`numType`) REFERENCES `type` (`codeCategorie`, `numType`),
  ADD CONSTRAINT `enregistrer_ibfk_2` FOREIGN KEY (`numReservation`) REFERENCES `reservation` (`numReservation`);

--
-- Contraintes pour la table `liaison`
--
ALTER TABLE `liaison`
  ADD CONSTRAINT `liaison_ibfk_1` FOREIGN KEY (`idPort`) REFERENCES `port` (`idPort`),
  ADD CONSTRAINT `liaison_ibfk_2` FOREIGN KEY (`idPort_1`) REFERENCES `port` (`idPort`),
  ADD CONSTRAINT `liaison_ibfk_3` FOREIGN KEY (`idSecteur`) REFERENCES `secteur` (`idSecteur`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numTraversee`) REFERENCES `traversee` (`numTraversee`);

--
-- Contraintes pour la table `tarifer`
--
ALTER TABLE `tarifer`
  ADD CONSTRAINT `tarifer_ibfk_1` FOREIGN KEY (`codeLiaison`) REFERENCES `liaison` (`codeLiaison`),
  ADD CONSTRAINT `tarifer_ibfk_2` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`idPeriode`),
  ADD CONSTRAINT `tarifer_ibfk_3` FOREIGN KEY (`codeCategorie`,`numType`) REFERENCES `type` (`codeCategorie`, `numType`);

--
-- Contraintes pour la table `traversee`
--
ALTER TABLE `traversee`
  ADD CONSTRAINT `traversee_ibfk_1` FOREIGN KEY (`idBateau`) REFERENCES `bateau` (`idBateau`),
  ADD CONSTRAINT `traversee_ibfk_2` FOREIGN KEY (`codeLiaison`) REFERENCES `liaison` (`codeLiaison`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`codeCategorie`) REFERENCES `categorie` (`codeCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
