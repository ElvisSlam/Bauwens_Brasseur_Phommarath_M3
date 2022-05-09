-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Avril 2022 à 13:17
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ap_mission3`
--

-- --------------------------------------------------------

--
-- Structure de la table `biens`
--

CREATE TABLE `biens` (
  `reference` int(10) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` int(10) NOT NULL,
  `surface` int(10) NOT NULL,
  `nbpiece` int(5) NOT NULL,
  `jardin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `biens`
--

INSERT INTO `biens` (`reference`, `ville`, `type`, `description`, `prix`, `surface`, `nbpiece`, `jardin`) VALUES
(10001, 'PARIS', 'Appartement', 'un appart a PARIS pour 50 000 €, tu dois dormir debout tellement il est petit après tout c\'est PARIS , 10m² pour 50 000 € c\'est dans la moyenne donc saisissez votre chance . C\'est sans meuble faut pas déconner', 50000, 10, 2, 0),
(20001, 'PARIS', 'Immeuble', 'immeuble', 900000, 700, 25, 0),
(30001, 'POITIERS', 'Local', '', 15000, 500, 10, 0),
(40001, 'PARIS', 'Maison', '', 100000, 100, 10, 1),
(40002, 'RENNES', 'Maison', '', 65000, 30, 5, 1),
(50001, 'MARSEILLE', 'Terrain', '', 20000, 49, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `reference` int(10) NOT NULL,
  `chemin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `reference`, `chemin`) VALUES
(1, 10001, '../images/appart1.jpeg'),
(2, 20001, 'dfghj'),
(3, 30001, 'poiuytr'),
(7, 40001, 'potr'),
(8, 40002, 'nbvcx'),
(9, 50001, 'poiuyt');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type` varchar(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
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

CREATE TABLE `utilisateurs` (
  `email` varchar(60) NOT NULL,
  `mdp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`email`, `mdp`) VALUES
('Boss', ' . $2y$10$RD5LplARoKKD44RLgD4Fc.n8LYTooMknLd2sqYTZIz5zD2A7NjPL. .'),
('test', 'test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `contrainte` (`type`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrainteimage` (`reference`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
