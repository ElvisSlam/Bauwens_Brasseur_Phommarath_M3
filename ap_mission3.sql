-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 mars 2022 à 15:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ap_mission3`
--
CREATE DATABASE IF NOT EXISTS `ap_mission3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ap_mission3`;

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

DROP TABLE IF EXISTS `biens`;
CREATE TABLE IF NOT EXISTS `biens` (
  `reference` int(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `prix` int(10) NOT NULL,
  `surface` int(10) NOT NULL,
  `nombre de pièce` int(5) NOT NULL,
  `jardin` tinyint(1) NOT NULL,
  PRIMARY KEY (`reference`),
  KEY `contrainte` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `biens`
--

INSERT INTO `biens` (`reference`, `ville`, `type`, `prix`, `surface`, `nombre de pièce`, `jardin`) VALUES
(10001, 'PARIS', 'Appartement', 50000, 10, 2, 0),
(20001, 'LILLE', 'Immeuble', 900000, 700, 25, 0),
(30001, 'POITIERS', 'Local', 15000, 500, 10, 0),
(40001, 'PARIS', 'Maison', 100000, 100, 10, 1),
(40002, 'RENNES', 'Maison', 65000, 30, 5, 1),
(50001, 'MARSEILLE', 'Terrain', 20000, 49, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(10) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contrainteimage` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `reference`, `chemin`) VALUES
(1, 10001, 'azertyui'),
(2, 20001, 'dfghj'),
(3, 30001, 'poiuytr'),
(7, 40001, 'potr'),
(8, 40002, 'nbvcx'),
(9, 50001, 'poiuyt');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `type` varchar(11) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`type`, `numero`) VALUES
('Appartement', 1),
('Immeuble', 2),
('Local', 3),
('Maison', 4),
('Terrain', 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `email` varchar(60) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `contrainte` FOREIGN KEY (`type`) REFERENCES `type` (`type`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `contrainteimage` FOREIGN KEY (`reference`) REFERENCES `biens` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
