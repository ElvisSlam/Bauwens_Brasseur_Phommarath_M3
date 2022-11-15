-- phpMyAdmin SQL Dump
-- version 5.2.0-1.fc36
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 15 nov. 2022 à 15:12
-- Version du serveur : 10.5.16-MariaDB
-- Version de PHP : 8.1.12

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
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `login` varchar(60) DEFAULT NULL,
  `dateConnexion` datetime NOT NULL,
  `dateDeconnexion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `login`, `dateConnexion`, `dateDeconnexion`) VALUES
(1, 'test@gmail.com', '2022-10-16 08:24:25', '2022-10-16 10:24:25'),
(22, 'o', '2022-11-07 11:23:05', NULL),
(25, 'b@b.fr', '2022-11-14 12:02:07', NULL);

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
  `email` varchar(60) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `date_consent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `mdp`, `date_consent`) VALUES
('dd', 'cd', 'aaa', '$2y$10$3BxmKSYBnJ0rmEjpD21Bk.CmiO5Dq2/WAYJUxTQQ5QdjHqb.rZzc2', '2022-11-07'),
('b', 'b', 'b@b.fr', '$2y$10$h2JdyRNiAdpZRqYfLDmN5Oessc5GiG4coIS4h6oG.VPdvbjpzbfNC', '2022-11-14'),
('', '', 'Boss', ' . $2y$10$RD5LplARoKKD44RLgD4Fc.n8LYTooMknLd2sqYTZIz5zD2A7NjPL. .', '0000-00-00'),
('aze', 'aze', 'e', '$2y$10$9bB.4C1OKm1XnH4cssRQ0..ngBahyyMYMmIDI9sHR1YRkwGtovkBu', '0000-00-00'),
('bn', 'nb', 'kj', '$2y$10$RLUsY.TF50DN49CdOU3AGeXMI1IV.UsxSnUfW/eKuqdAv5fu4hYGO', '2022-11-07'),
('o', 'o', 'o', '$2y$10$eNcqHi7Zuz/gLjLpNk771OJaS0UPM3Hz7K18o6z96TnlLayMhwSqG', '2022-11-07'),
('azeaa', 'aa', 's', '$2y$10$FRtQsRqfQ7k1zUt9qR8lVOf2tgkSoePgG0HpEwdIs0sDitP.rcCGa', '2022-10-17'),
('', '', 'test', 'test', '0000-00-00'),
('test', 'test', 'test@gmail.com', '$2y$10$b1DngiXfbaroGUetLYI2pu8lhV045BLxJeEYhHB8jsXjhBmspVHZS', '0000-00-00');

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
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `contrainteimage` FOREIGN KEY (`reference`) REFERENCES `biens` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
