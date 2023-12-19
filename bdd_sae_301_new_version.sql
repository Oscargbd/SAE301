-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 déc. 2023 à 14:27
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
-- Base de données : `sae301`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `idChat` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`idChat`, `user_id`, `message`, `timestamp`) VALUES
(11, 10, 'Bonjour j\'ai une question', '2023-12-17 11:47:16'),
(12, 10, 'Oui dites nous', '2023-12-17 11:47:30'),
(13, 10, 'Salut ! Ca va nickel et toi ?', '2023-12-17 11:51:25'),
(14, 11, 'Hello !', '2023-12-18 09:36:21'),
(15, 10, 'wesh oscar', '2023-12-18 09:36:55'),
(16, 10, 'Bonjour !', '2023-12-18 09:45:37'),
(17, 10, 'hhh', '2023-12-18 09:49:39');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `idEquip` int(200) NOT NULL,
  `typeEquip` varchar(200) NOT NULL,
  `pointureRaq` int(200) NOT NULL,
  `idUtilisateur` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `trail_id` int(11) DEFAULT NULL,
  `cheminImage` varchar(255) DEFAULT NULL,
  `distance` varchar(200) DEFAULT NULL,
  `denivele` varchar(200) DEFAULT NULL,
  `idParticipant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `trail_id`, `cheminImage`, `distance`, `denivele`, `idParticipant`) VALUES
(1, 1, 'img/trail.jpg', '5', NULL, NULL),
(2, 2, 'img/trail2.jpg', '10', NULL, NULL),
(3, 3, 'img/trail3.jpg', '15', NULL, NULL),
(4, 4, 'img/trail4.jpg', '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `idParticipant` int(200) NOT NULL,
  `nomParticipant` varchar(200) NOT NULL,
  `prenomParticipant` varchar(200) NOT NULL,
  `ageParticipant` int(200) NOT NULL,
  `numDossard` int(200) NOT NULL,
  `idUtilisateur` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(200) NOT NULL,
  `url` varchar(500) NOT NULL,
  `alt` varchar(200) NOT NULL,
  `idUtilisateur` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nomUtilisateur` varchar(200) NOT NULL,
  `prenomUtilisateur` varchar(200) NOT NULL,
  `ageUtilisateur` int(200) NOT NULL,
  `idEquipement` int(200) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `username`, `email`, `password`, `nomUtilisateur`, `prenomUtilisateur`, `ageUtilisateur`, `idEquipement`, `role`) VALUES
(10, 'admin', 'admin@admin.com', '$2y$10$iWDQO/TiJNFa5YXhJJuzO..a1ii25xOc0bus8mBlYTnwnEBaX8Gpy', 'admin', 'admin', 19, 0, 'user'),
(11, 'lilrom1__', 'romain.montes55@gmail.com', '$2y$10$Lx7ptevTU65dbduZ1SuHAOewpqP5zUvtl8LKuaCUYUIoiydIB0rXy', 'Montes', 'Romain', 19, 0, 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`idEquip`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trail_id` (`trail_id`),
  ADD KEY `fk_participant_parcours` (`idParticipant`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`idParticipant`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

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
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `idEquipement` (`idEquipement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `idEquip` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `idParticipant` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(200) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD CONSTRAINT `equipement_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `fk_participant_parcours` FOREIGN KEY (`idParticipant`) REFERENCES `participant` (`idParticipant`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `parcours_ibfk_1` FOREIGN KEY (`trail_id`) REFERENCES `trail` (`id`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
