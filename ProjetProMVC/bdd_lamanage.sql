-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 mars 2020 à 13:54
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_lamanage`
--

-- --------------------------------------------------------

--
-- Structure de la table `lamanage_admins`
--

DROP TABLE IF EXISTS `lamanage_admins`;
CREATE TABLE IF NOT EXISTS `lamanage_admins` (
  `admins_id` int(11) NOT NULL AUTO_INCREMENT,
  `admins_lastname` varchar(50) NOT NULL,
  `admins_firstname` varchar(50) NOT NULL,
  `admins_mail` varchar(50) NOT NULL,
  `admins_pwd` varchar(250) NOT NULL,
  `admins_picture` varchar(50) DEFAULT '../assets/img/MaillotEntraineur.png',
  PRIMARY KEY (`admins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lamanage_admins`
--

INSERT INTO `lamanage_admins` (`admins_id`, `admins_lastname`, `admins_firstname`, `admins_mail`, `admins_pwd`, `admins_picture`) VALUES
(41, 'Jeje', 'Jeje', 'toutainallan@gmail.com', '$2y$10$Rrw1Ei6FvOfbLdbdjXNcQej0n6JbMqS/d/R/PkQOMQrLsEyZXSPMq', '../assets/img/MaillotEntraineur.png');

-- --------------------------------------------------------

--
-- Structure de la table `lamanage_informations`
--

DROP TABLE IF EXISTS `lamanage_informations`;
CREATE TABLE IF NOT EXISTS `lamanage_informations` (
  `informations_id` int(11) NOT NULL AUTO_INCREMENT,
  `informations_general` varchar(250) NOT NULL,
  `informations_training` varchar(250) NOT NULL,
  `informations_nextgame` varchar(250) NOT NULL,
  `informations_lastgame` varchar(250) NOT NULL,
  `admins_id` int(11) NOT NULL,
  PRIMARY KEY (`informations_id`),
  KEY `Lamanage_informations_Lamanage_admins_FK` (`admins_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lamanage_position`
--

DROP TABLE IF EXISTS `lamanage_position`;
CREATE TABLE IF NOT EXISTS `lamanage_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(250) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lamanage_position`
--

INSERT INTO `lamanage_position` (`position_id`, `position`) VALUES
(1, 'Attaquant'),
(2, 'Attaquant gauche'),
(3, 'Attaquant droit'),
(4, 'Milieu'),
(5, 'Milieu gauche'),
(6, 'Milieu droit'),
(7, 'Défenseur central'),
(8, 'Défenseur gauche'),
(9, 'Défenseur droit'),
(10, 'Gardien de but'),
(11, 'Remplaçant');

-- --------------------------------------------------------

--
-- Structure de la table `lamanage_stats`
--

DROP TABLE IF EXISTS `lamanage_stats`;
CREATE TABLE IF NOT EXISTS `lamanage_stats` (
  `stats_id` int(11) NOT NULL AUTO_INCREMENT,
  `stats_goal` int(11) NOT NULL DEFAULT '0',
  `stats_assist` int(11) NOT NULL DEFAULT '0',
  `stats_game` int(11) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`stats_id`),
  KEY `lamanage_stats_ibfk_1` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lamanage_stats`
--

INSERT INTO `lamanage_stats` (`stats_id`, `stats_goal`, `stats_assist`, `stats_game`, `users_id`) VALUES
(36, 0, 0, 8, 35),
(37, 0, 0, 0, 36);

-- --------------------------------------------------------

--
-- Structure de la table `lamanage_users`
--

DROP TABLE IF EXISTS `lamanage_users`;
CREATE TABLE IF NOT EXISTS `lamanage_users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_lastname` varchar(50) NOT NULL,
  `users_firstname` varchar(50) NOT NULL,
  `users_mail` varchar(50) DEFAULT 'exemple@mail.com',
  `users_pwd` varchar(50) DEFAULT 'joueur',
  `users_picture` varchar(50) NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`),
  KEY `Lamanage_users_Lamanage_position_FK` (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lamanage_users`
--

INSERT INTO `lamanage_users` (`users_id`, `users_lastname`, `users_firstname`, `users_mail`, `users_pwd`, `users_picture`, `position_id`) VALUES
(35, 'Dupont', 'Jordan', 'exemple@mail.com', 'joueur', '../assets/img/maillot1.png', 1),
(36, 'Toutain', 'Allan', 'exemple@mail.com', 'joueur', '../assets/img/maillot12.png', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lamanage_informations`
--
ALTER TABLE `lamanage_informations`
  ADD CONSTRAINT `Lamanage_informations_Lamanage_admins_FK` FOREIGN KEY (`admins_id`) REFERENCES `lamanage_admins` (`admins_id`);

--
-- Contraintes pour la table `lamanage_stats`
--
ALTER TABLE `lamanage_stats`
  ADD CONSTRAINT `lamanage_stats_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `lamanage_users` (`users_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `lamanage_users`
--
ALTER TABLE `lamanage_users`
  ADD CONSTRAINT `Lamanage_users_Lamanage_position_FK` FOREIGN KEY (`position_id`) REFERENCES `lamanage_position` (`position_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
