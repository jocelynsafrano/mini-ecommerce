-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 04 Juin 2018 à 22:26
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mini-ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_creation_commande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_création_panier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier_produit`
--

CREATE TABLE `panier_produit` (
  `id` int(11) NOT NULL,
  `panier_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_creation_produit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification_produit` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix_ht` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `utilisateur_id`, `date_creation_produit`, `date_modification_produit`, `nom`, `description`, `prix_ht`) VALUES
(1, 23, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(2, 46, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(3, 15, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(4, 27, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(5, 82, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(6, 83, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(7, 44, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(8, 12, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(9, 93, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(10, 97, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(11, 75, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(12, 28, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(13, 94, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(14, 61, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(15, 39, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(16, 83, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(17, 89, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(18, 62, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(19, 17, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(20, 44, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(21, 61, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(22, 56, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(23, 87, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(24, 86, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(25, 13, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(26, 56, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(27, 71, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(28, 33, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(29, 93, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(30, 97, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(31, 85, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(32, 12, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(33, 76, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(34, 54, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(35, 19, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(36, 73, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(37, 48, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(38, 43, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(39, 78, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(40, 67, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(41, 46, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(42, 18, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(43, 93, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(44, 59, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(45, 22, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(46, 32, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(47, 31, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(48, 55, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(49, 25, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(50, 23, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(51, 52, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(52, 22, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(53, 88, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(54, 66, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(55, 62, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(56, 17, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(57, 22, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(58, 96, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(59, 41, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(60, 91, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(61, 96, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(62, 57, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(63, 49, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(64, 84, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(65, 16, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(66, 82, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(67, 82, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(68, 75, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(69, 33, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(70, 42, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(71, 42, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(72, 25, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(73, 13, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(74, 76, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(75, 31, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(76, 51, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(77, 19, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(78, 96, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(79, 67, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(80, 78, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(81, 92, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(82, 35, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(83, 86, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(84, 15, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(85, 96, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(86, 59, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(87, 39, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(88, 76, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(89, 11, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(90, 72, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(91, 87, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(92, 38, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(93, 48, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(94, 28, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(95, 19, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Trucks', 'Armature en alliage d\'aluminium', 60),
(96, 86, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(97, 34, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(98, 96, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(99, 82, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45),
(100, 78, '2018-06-04 20:27:45', '2018-06-04 20:27:45', 'Wheels', 'Roue en polyurethane', 45);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT '2',
  `date_creation_utilisateur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification_utilisateur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `cp`, `ville_id`, `telephone`, `mdp`, `role_id`, `date_creation_utilisateur`, `date_modification_utilisateur`) VALUES
(1, 'Ferris', 'Kendall', 'risus.Nulla.eget@tincidunt.co.uk', '75012', 1, '06 45 32 57 43', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(2, 'Nathan', 'Ciara', 'scelerisque.neque.sed@malesuadamalesuadaInteger.com', '75012', 1, '08 74 07 51 44', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(3, 'Hunter', 'Ignacia', 'dui@Curabitur.com', '75012', 1, '01 27 88 46 66', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(4, 'Thaddeus', 'Cameron', 'faucibus.lectus.a@sapien.net', '75012', 1, '04 03 18 88 12', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(5, 'Raymond', 'Isabelle', 'sodales.at.velit@tincidunt.net', '75012', 1, '09 71 55 71 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(6, 'Lamar', 'Adrienne', 'Proin@nisl.ca', '75012', 1, '08 37 83 05 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(7, 'Ishmael', 'Quincy', 'nonummy.ut.molestie@quis.org', '75012', 1, '06 30 05 61 02', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(8, 'Davis', 'Sheila', 'Fusce.mi.lorem@mus.edu', '75012', 1, '05 60 25 50 58', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(9, 'Xavier', 'Daria', 'aliquet.diam@velitin.org', '75012', 1, '06 65 88 61 28', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(10, 'Jarrod', 'Emi', 'aptent.taciti@Proinegetodio.org', '75012', 1, '03 67 36 37 63', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(11, 'Rudyard', 'Rowan', 'sit.amet.luctus@aneque.ca', '75012', 1, '08 39 30 29 88', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(12, 'Yuli', 'Fay', 'Lorem.ipsum@Donecsollicitudin.co.uk', '75012', 1, '03 94 56 19 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(13, 'Ralph', 'Nadine', 'Quisque@amet.com', '75012', 1, '09 67 33 11 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(14, 'Kasper', 'Cora', 'urna.Ut@sitamet.net', '75012', 1, '02 67 57 17 11', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(15, 'Richard', 'Courtney', 'vel.arcu@Duis.co.uk', '75012', 1, '08 59 50 65 65', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(16, 'Geoffrey', 'May', 'imperdiet.ullamcorper@sedsem.net', '75012', 1, '07 86 32 54 81', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(17, 'Kibo', 'Anika', 'quis@luctus.com', '75012', 1, '07 44 54 44 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(18, 'Christopher', 'Tamara', 'Mauris@ut.co.uk', '75012', 1, '09 02 51 15 66', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(19, 'Kennedy', 'Vivian', 'sollicitudin@diamvel.net', '75012', 1, '01 65 86 54 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(20, 'Fuller', 'Constance', 'nisl@aliquet.net', '75012', 1, '08 35 24 92 54', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(21, 'Malachi', 'Dahlia', 'elit.sed@urnaNunc.com', '75012', 1, '01 36 28 16 80', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(22, 'Ciaran', 'Sloane', 'vitae.diam.Proin@semmolestiesodales.co.uk', '75012', 1, '01 96 41 88 61', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(23, 'James', 'Katell', 'mattis@mollisnec.com', '75012', 1, '01 44 46 89 80', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(24, 'Fletcher', 'Suki', 'sed.dolor@Donecfeugiatmetus.edu', '75012', 1, '04 66 28 87 32', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(25, 'Burton', 'Nevada', 'orci.luctus@sitamet.com', '75012', 1, '01 73 25 39 98', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(26, 'Kuame', 'Doris', 'tempus.non.lacinia@augueutlacus.org', '75012', 1, '01 50 67 41 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(27, 'Herman', 'Martina', 'amet@eu.com', '75012', 1, '05 46 22 73 07', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(28, 'Thomas', 'Natalie', 'eget.ipsum.Donec@volutpat.co.uk', '75012', 1, '06 18 47 23 76', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(29, 'Barry', 'Isabella', 'Morbi.sit.amet@blandit.ca', '75012', 1, '02 01 27 34 88', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(30, 'Steven', 'Chanda', 'pharetra.ut@tristiqueac.ca', '75012', 1, '07 93 23 21 76', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(31, 'Sean', 'Ria', 'sit@in.com', '75012', 1, '05 72 61 04 53', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(32, 'Garrison', 'Mallory', 'blandit@ametloremsemper.ca', '75012', 1, '01 71 46 78 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(33, 'Anthony', 'Odette', 'eleifend.vitae@ligula.com', '75012', 1, '07 02 75 93 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(34, 'Lev', 'Gloria', 'auctor.odio@nonummyipsum.edu', '75012', 1, '06 74 89 67 76', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(35, 'Austin', 'Maggie', 'Nullam.vitae@dolortempusnon.net', '75012', 1, '05 28 52 29 45', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(36, 'Timon', 'Octavia', 'nulla.Donec.non@atortor.org', '75012', 1, '07 03 00 14 06', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(37, 'Denton', 'Urielle', 'Sed@etrisus.net', '75012', 1, '03 94 97 92 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(38, 'Phillip', 'Kirby', 'nec.tellus@Etiamlaoreetlibero.co.uk', '75012', 1, '05 00 25 57 04', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(39, 'Jin', 'Stella', 'Cras@eliterat.co.uk', '75012', 1, '01 30 00 13 01', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(40, 'Elijah', 'Charlotte', 'Curabitur.massa.Vestibulum@felisNullatempor.org', '75012', 1, '08 25 91 44 66', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(41, 'Troy', 'Ebony', 'lectus@non.org', '75012', 1, '02 66 02 26 48', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(42, 'Addison', 'Margaret', 'et.libero.Proin@volutpatnunc.net', '75012', 1, '07 23 12 04 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(43, 'Ivan', 'Melodie', 'ullamcorper.magna@pharetraNam.co.uk', '75012', 1, '07 91 67 13 25', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(44, 'Elmo', 'Sigourney', 'cursus.et.magna@facilisisloremtristique.com', '75012', 1, '07 31 32 56 71', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(45, 'Jamal', 'Vivien', 'tincidunt.pede.ac@purus.net', '75012', 1, '07 59 81 77 11', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(46, 'Otto', 'Daphne', 'pellentesque@fringillaornare.org', '75012', 1, '09 94 52 88 93', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(47, 'Acton', 'Hope', 'tincidunt.vehicula.risus@sagittis.edu', '75012', 1, '01 14 14 22 69', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(48, 'Price', 'Maya', 'Morbi@etrisusQuisque.ca', '75012', 1, '04 21 97 21 01', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(49, 'Baxter', 'Olympia', 'ante.dictum.cursus@faucibusutnulla.net', '75012', 1, '06 71 44 82 11', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(50, 'Brody', 'Colette', 'hymenaeos.Mauris.ut@non.co.uk', '75012', 1, '07 97 26 17 59', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(51, 'Colin', 'Mollie', 'porttitor@aliquamarcu.co.uk', '75012', 1, '07 63 09 55 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(52, 'Gabriel', 'Mariko', 'sodales.elit.erat@etliberoProin.com', '75012', 1, '06 07 02 63 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(53, 'Driscoll', 'Mona', 'sem@convalliserateget.ca', '75012', 1, '02 00 37 17 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(54, 'Micah', 'Aspen', 'Proin.vel.arcu@nibh.ca', '75012', 1, '07 06 50 49 51', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(55, 'Robert', 'Yvonne', 'Quisque.porttitor.eros@malesuadavel.co.uk', '75012', 1, '08 56 90 13 71', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(56, 'Vance', 'Dorothy', 'risus.Donec.nibh@Proin.edu', '75012', 1, '05 96 52 81 14', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(57, 'Forrest', 'Rebekah', 'cursus.Nunc@metusfacilisislorem.edu', '75012', 1, '08 78 99 26 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(58, 'Jarrod', 'Winter', 'molestie.in@porttitor.edu', '75012', 1, '04 16 15 16 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(59, 'Quamar', 'Quemby', 'convallis.ligula.Donec@auctor.com', '75012', 1, '04 29 39 75 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(60, 'Kareem', 'Destiny', 'montes.nascetur@aarcuSed.edu', '75012', 1, '07 10 25 02 27', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(61, 'Amir', 'Daryl', 'magna.a@dolorFusce.ca', '75012', 1, '01 24 04 15 56', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(62, 'Gannon', 'Leah', 'eleifend.non@leoelementum.edu', '75012', 1, '08 87 39 58 63', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(63, 'Ezekiel', 'Kaden', 'blandit.mattis.Cras@turpisvitaepurus.ca', '75012', 1, '09 99 55 98 17', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(64, 'Adrian', 'Isabelle', 'massa@feugiat.com', '75012', 1, '04 02 77 81 25', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(65, 'Barrett', 'Xena', 'consequat.enim@nisi.ca', '75012', 1, '02 28 33 90 72', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(66, 'Emerson', 'Bryar', 'et.ultrices.posuere@tempusscelerisque.ca', '75012', 1, '07 59 45 07 34', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(67, 'Buckminster', 'Dakota', 'senectus@eu.ca', '75012', 1, '08 64 41 95 97', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(68, 'Dale', 'Constance', 'at@nullaIntincidunt.co.uk', '75012', 1, '02 66 85 24 28', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(69, 'Hall', 'Lee', 'mauris.Suspendisse.aliquet@consequat.co.uk', '75012', 1, '01 20 68 40 01', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(70, 'Howard', 'Lydia', 'Integer.aliquam.adipiscing@eudoloregestas.co.uk', '75012', 1, '05 77 68 03 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(71, 'Hakeem', 'Brynne', 'lacus@ac.com', '75012', 1, '07 13 15 42 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(72, 'Brennan', 'Quon', 'et.risus@Nunc.edu', '75012', 1, '07 14 54 25 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(73, 'Simon', 'Delilah', 'Aliquam@Donecfeugiat.ca', '75012', 1, '06 78 42 34 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(74, 'Len', 'Sarah', 'lacinia.at.iaculis@aceleifend.edu', '75012', 1, '08 67 94 11 90', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(75, 'Hasad', 'Brianna', 'dis.parturient@luctusaliquet.co.uk', '75012', 1, '05 61 84 31 24', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(76, 'Kennan', 'Daphne', 'lacinia.at@imperdietnon.co.uk', '75012', 1, '07 43 43 88 16', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(77, 'Lars', 'Jaquelyn', 'sit.amet@Vestibulumanteipsum.edu', '75012', 1, '01 27 16 23 25', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(78, 'Zeus', 'Sydney', 'et@nec.edu', '75012', 1, '09 72 81 40 40', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(79, 'Arsenio', 'Kimberly', 'convallis@liberoProinmi.ca', '75012', 1, '06 06 94 55 31', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(80, 'Nero', 'Emma', 'velit.Pellentesque.ultricies@tellus.co.uk', '75012', 1, '08 89 84 30 20', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(81, 'Reed', 'Angela', 'malesuada.ut.sem@ligulaelitpretium.ca', '75012', 1, '05 69 98 70 06', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(82, 'Price', 'Lavinia', 'Sed.neque@non.com', '75012', 1, '07 53 34 28 03', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(83, 'Chancellor', 'Heather', 'dignissim.magna.a@elit.org', '75012', 1, '04 55 88 64 97', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(84, 'Drew', 'Wynne', 'dolor@Morbiquis.ca', '75012', 1, '02 55 13 07 20', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(85, 'Elvis', 'Yael', 'dolor@dapibusquam.co.uk', '75012', 1, '01 61 13 89 33', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(86, 'Slade', 'Iola', 'in.consequat.enim@necquamCurabitur.org', '75012', 1, '02 42 26 48 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(87, 'Rajah', 'Illiana', 'Sed.auctor@Pellentesquehabitantmorbi.com', '75012', 1, '02 11 28 76 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(88, 'Porter', 'Christen', 'nisl.Maecenas.malesuada@bibendumullamcorper.co.uk', '75012', 1, '02 68 05 27 40', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(89, 'Kuame', 'Stacey', 'nisl.sem@egestas.ca', '75012', 1, '07 56 45 53 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(90, 'Travis', 'Zephr', 'dapibus@nec.com', '75012', 1, '06 98 27 57 26', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(91, 'Kadeem', 'Jaquelyn', 'vulputate.posuere.vulputate@laciniaorciconsectetuer.edu', '75012', 1, '09 04 65 76 81', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(92, 'Elliott', 'Hedy', 'Phasellus.libero.mauris@iaculislacuspede.com', '75012', 1, '06 65 71 63 21', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(93, 'Lev', 'Donna', 'aliquet.sem@nonbibendum.co.uk', '75012', 1, '06 01 45 37 38', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(94, 'Joshua', 'Karleigh', 'leo.Cras@utdolordapibus.org', '75012', 1, '07 97 93 42 45', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(95, 'Ryan', 'Ebony', 'ac@malesuada.ca', '75012', 1, '01 90 80 93 60', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(96, 'Thane', 'Caryn', 'pellentesque@convallisante.co.uk', '75012', 1, '07 16 22 30 63', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(97, 'Barry', 'Ava', 'mauris@CuraePhasellus.net', '75012', 1, '05 25 93 40 06', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(98, 'Matthew', 'Ursula', 'libero.dui.nec@dictum.org', '75012', 1, '07 04 68 11 08', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(99, 'Bruno', 'Tatiana', 'sit@necante.net', '75012', 1, '05 73 45 01 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28'),
(100, 'Peter', 'Kirestin', 'arcu@idblandit.ca', '75012', 1, '04 11 48 85 78', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04 20:31:28', '2018-06-04 20:31:28');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_id` (`panier_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier_produit`
--
ALTER TABLE `panier_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD CONSTRAINT `panier_produit_ibfk_1` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `panier_produit_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
