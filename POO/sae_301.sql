-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 déc. 2023 à 09:11
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_301`
--

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `trail_id` int(11) DEFAULT NULL,
  `cheminImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `trail_id`, `cheminImage`) VALUES
(1, 1, 'img/trail.jpg'),
(2, 2, 'img/trail2.jpg'),
(3, 3, 'img/trail3.jpg'),
(4, 4, 'img/trail4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `referent`
--

CREATE TABLE `referent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `referent`
--

INSERT INTO `referent` (`id`, `nom`, `contact`) VALUES
(1, 'Guibaud Oscar', 'guibaud.oscar@contact.fr'),
(2, 'Riveti Melenn', 'riveti.melenn@contact.fr'),
(3, 'Veclain Clément', 'veclain.clement@contact.fr'),
(4, 'Montes Romain', 'romain.montes55@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `trail`
--

CREATE TABLE `trail` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL,
  `heureDepart` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `trail`
--

INSERT INTO `trail` (`id`, `nom`, `distance`, `heureDepart`) VALUES
(1, 'Marche Polaire', 5, '17:00'),
(2, 'Trail des pingouin', 10, '18:00'),
(3, 'Trail des alpinistes', 15, '18:30'),
(4, 'Trail des loup', 20, '19:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trail_id` (`trail_id`);

--
-- Index pour la table `referent`
--
ALTER TABLE `referent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trail`
--
ALTER TABLE `trail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `referent`
--
ALTER TABLE `referent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `trail`
--
ALTER TABLE `trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `parcours_ibfk_1` FOREIGN KEY (`trail_id`) REFERENCES `trail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
