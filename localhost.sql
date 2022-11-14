-- phpMyAdmin SQL Dump
-- version 5.2.0-1.fc36
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 07 nov. 2022 à 10:59
-- Version du serveur : 10.5.16-MariaDB
-- Version de PHP : 8.1.11

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
-- Déchargement des données de la table `biens`
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
-- Structure de la table `Connexion`
--

CREATE TABLE `Connexion` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `dateConnexion` datetime NOT NULL,
  `dateDeconnexion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Connexion`
--

INSERT INTO `Connexion` (`id`, `login`, `dateConnexion`, `dateDeconnexion`) VALUES
(1, 'truc@truc.fr', '2022-10-17 08:18:53', '2022-11-07 07:18:53'),
(2, 'antbrasseur@gmail.com', '2022-10-17 08:20:10', '2022-11-07 07:20:10');

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
-- Déchargement des données de la table `image`
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

CREATE TABLE `utilisateurs` (
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `consentement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `mdp`, `consentement`) VALUES
('Brasseur', 'antonin', 'antbrasseur@gmail.com', '$2y$10$QG0yoc4/S3.Zrrjnr8CrHuUBiOUKw8qCMSKjzkBDmjXXnkXf9f16O', '0000-00-00'),
('bauwens', 'elvis', 'elvisbauwens@gmail.com', '$2y$10$B7j/eCwDDnKyRqSSMF.jB.vKLLtD5Eb1Cud.5QhZLoR2pKSwfApMS', '2022-11-07'),
('gerard', 'gerard', 'gerard@truc.fr', '$2y$10$DIEFihgWfvnDsLmHcf56wemgmU4Cdz0bB7eJdPI951oSeOOB/jIR2', '0000-00-00'),
('truc', 'tru', 'truc@truc.fr', '$2y$10$oflbM2iNCgi0/BwBxU9wrOhL9bjhm6Nm2hWxR2zM2FOZE0LZ838Ym', '2022-10-17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `biens`
--
ALTER TABLE `biens`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `contrainte` (`type`);

--
-- Index pour la table `Connexion`
--
ALTER TABLE `Connexion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ce` (`login`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `biens`
--
ALTER TABLE `biens`
  ADD CONSTRAINT `contrainte` FOREIGN KEY (`type`) REFERENCES `type` (`type`);

--
-- Contraintes pour la table `Connexion`
--
ALTER TABLE `Connexion`
  ADD CONSTRAINT `ce` FOREIGN KEY (`login`) REFERENCES `utilisateurs` (`email`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `contrainteimage` FOREIGN KEY (`reference`) REFERENCES `biens` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
