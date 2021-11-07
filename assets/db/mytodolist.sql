-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 07 nov. 2021 à 21:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mytodolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_todo` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_todo`, `text`) VALUES
(1, 27, 9, 'bonjour tout le monde\r\n'),
(2, 27, 9, 'test'),
(3, 27, 9, 'testa'),
(4, 27, 9, 'aze'),
(5, 27, 9, 'a'),
(6, 27, 9, 'zaea'),
(7, 27, 9, 'bonjout'),
(8, 27, 9, 'test'),
(9, 27, 9, 'test'),
(10, 27, 9, 'ah'),
(11, 27, 9, 'ah'),
(12, 27, 9, 'test'),
(13, 27, 9, 'alors'),
(14, 27, 10, 'alors'),
(15, 27, 10, 'bonjour'),
(16, 27, 10, 'test'),
(17, 27, 11, 'Let\'s goooooo');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `todo`
--

DROP TABLE IF EXISTS `todo`;
CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `id_team` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `todo`
--

INSERT INTO `todo` (`id`, `id_user`, `state`, `text`, `id_team`) VALUES
(1, 2, 'done', 'ceci est un texte ', 'myteam'),
(9, 27, 'doing', 'finished', '0'),
(10, 27, 'todo', 'Bonjour', '0'),
(8, 27, 'doing', 'test test test ', '0'),
(11, 27, 'doing', 'Une carte pas trop chiante', '0');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id_team` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `status`, `id_team`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(3, 'lucas', 'lucas@gmail.com', 'user', 'dc53fc4f621c80bdc2fa0329a6123708', 1, 0),
(4, 'jason', 'jason@gmail.com', 'user', '2b877b4b825b48a9a0950dd5bd1f264d', 0, 0),
(5, 'lilian', 'lilian@gmail.com', 'user', '55ec2e2f206a39f0aee6e6a0f35b4eb7', 1, 0),
(29, 'titi', 'titi@titi.fr', 'user', 'd41d8cd98f00b204e9800998ecf8427e', 1, NULL),
(27, 'toto', 'toto@toto.fr', 'admin', 'f71dbe52628a3f83a77ab494817525c6', 0, NULL),
(28, 'titi', 'titi@titi.fr', 'user', '5d933eef19aee7da192608de61b6c23d', 0, NULL),
(24, 'denis', 'denis@denis.fr', 'user', 'dec1acbe961d60da7ae858202b9dbf55', 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
