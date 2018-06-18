-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2018 at 11:58 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.5-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `date_creation`, `date_modification`, `is_deleted`) VALUES
(1, 'Skateboardttttttttt', 'Moyen de tttttttttt', '2018-06-09', '2018-06-18', 1),
(2, 'Pneu', 'Bandage en caoutchouc', '2018-06-09', '2018-06-09', 1),
(3, 'EL JAOUHARI', 'test', '2018-06-14', '2018-06-14', 1),
(4, 'EL JAOUHARI', 'test', '2018-06-14', '2018-06-14', 1),
(5, 'EL JAOUHARI', 'test', '2018-06-14', '2018-06-14', 1),
(6, 'nouvelle catégorie', 'nouvelle description', '2018-06-14', '2018-06-14', 1),
(7, 'Test test', 'test', '2018-06-14', '2018-06-14', 1),
(8, 'tt', 'tt', '2018-06-14', '2018-06-14', 1),
(9, 'tt', 'touttou', '2018-06-14', '2018-06-14', 1),
(10, 'new cat', 'new cat', '2018-06-18', '2018-06-18', 1),
(11, 'Test fdsq', 'test', '2018-06-18', '2018-06-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorie_produit`
--

CREATE TABLE `categorie_produit` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id`, `categorie_id`, `produit_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 8),
(9, 1, 1),
(10, 2, 1),
(11, 3, 1),
(12, 4, 1),
(13, 3, 1),
(14, 4, 1),
(15, 1, 33),
(16, 2, 33),
(17, 3, 33),
(18, 4, 33),
(19, 1, 36),
(20, 2, 36),
(21, 3, 36),
(22, 4, 36);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `utilisateur_id`, `date_creation`, `is_deleted`) VALUES
(1, 3, '2018-06-05', 0),
(3, 103, NULL, 0),
(4, 102, '2018-06-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `panier_produit`
--

CREATE TABLE `panier_produit` (
  `id` int(11) NOT NULL,
  `panier_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panier_produit`
--

INSERT INTO `panier_produit` (`id`, `panier_id`, `produit_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix_ht` float NOT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `utilisateur_id`, `date_creation`, `date_modification`, `nom`, `description`, `prix_ht`, `is_deleted`) VALUES
(1, 23, '2018-06-04', '2018-06-14', 'Trucks Chngéeee', 'Armature en alliage d\'aluminium', 60, 1),
(2, 46, '2018-06-04', '2018-06-14', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(3, 15, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(4, 27, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(5, 82, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(6, 83, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(7, 44, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(8, 12, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(9, 93, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(10, 97, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(11, 75, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(12, 28, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(13, 94, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(14, 61, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(15, 39, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(16, 83, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(17, 89, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(18, 62, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(19, 17, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(20, 44, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(21, 61, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(22, 56, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(23, 87, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(24, 86, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(25, 13, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(26, 56, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(27, 71, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(28, 33, '2018-06-04', '2018-06-13', 'Wheels modified', 'Roue changé', 451, 1),
(29, 93, '2018-06-04', '2018-06-14', 'Chnged changed product', 'Roue en polyurethane', 45, 1),
(30, 97, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 1),
(31, 85, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(32, 12, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(33, 76, '2018-06-04', '2018-06-18', 'Trucks Edited', 'edited description', 606, 1),
(34, 54, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(35, 19, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(36, 73, '2018-06-04', '2018-06-18', 'Wheels', 'Roue en polyurethane', 45, 0),
(37, 48, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(38, 43, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(39, 78, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(40, 67, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(41, 46, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 1),
(42, 18, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(43, 93, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(44, 59, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(45, 22, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(46, 32, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(47, 31, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(48, 55, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(49, 25, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(50, 23, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(51, 52, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(52, 22, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(53, 88, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(54, 66, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(55, 62, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(56, 17, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(57, 22, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(58, 96, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(59, 41, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(60, 91, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(61, 96, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(62, 57, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(63, 49, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(64, 84, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(65, 16, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(66, 82, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(67, 82, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(68, 75, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(69, 33, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(70, 42, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(71, 42, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(72, 25, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(73, 13, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(74, 76, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(75, 31, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(76, 51, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(77, 19, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(78, 96, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(79, 67, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(80, 78, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(81, 92, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(82, 35, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(83, 86, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(84, 15, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(85, 96, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(86, 59, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(87, 39, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(88, 76, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(89, 11, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(90, 72, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(91, 87, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(92, 38, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(93, 48, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(94, 28, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(95, 19, '2018-06-04', '2018-06-04', 'Trucks', 'Armature en alliage d\'aluminium', 60, 0),
(96, 86, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(97, 34, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(98, 96, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(99, 82, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(100, 78, '2018-06-04', '2018-06-04', 'Wheels', 'Roue en polyurethane', 45, 0),
(101, 101, NULL, NULL, 'tesst', 'test', 123, 0),
(102, 101, NULL, NULL, 'qsdfqsfqssd', 'fqdsfqsf', 987, 0),
(103, 101, NULL, NULL, 'bloubloub', 'bloublbou', 123, 1),
(104, 101, NULL, NULL, 'touktou', 'touttou', 123, 1),
(105, 101, '2018-06-05', NULL, '1234789', '235', 132, 0),
(106, 101, '2018-06-05', '2018-06-05', '1234789', '235', 132, 0),
(107, 101, '2018-06-05', '2018-06-05', '1234789', '235', 132, 1),
(108, 101, '2018-06-05', '2018-06-05', 'aze', 'ae', 123465, 0),
(109, 101, '2018-06-05', '2018-06-05', 'aze', 'ae', 123465, 0),
(110, 110, '2018-06-18', NULL, 'tak tak', 'takta', 123456, 0),
(111, 110, '2018-06-18', NULL, 'tesst', 'test', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
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
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `cp`, `ville_id`, `telephone`, `mdp`, `role_id`, `date_creation`, `date_modification`, `is_deleted`) VALUES
(3, 'Hunter', 'Ignacia', 'dui@Curabitur.com', '75012', 1, '01 27 88 46 66', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(12, 'Yuli', 'Fay', 'Lorem.ipsum@Donecsollicitudin.co.uk', '75012', 1, '03 94 56 19 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(13, 'Ralph', 'Nadine', 'Quisque@amet.com', '75012', 1, '09 67 33 11 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(14, 'Changé', 'Changé', 'changé@sitamet.net', '75012', 1, '02 67 57 17 11', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(15, 'Richard', 'Courtney', 'vel.arcu@Duis.co.uk', '75012', 1, '08 59 50 65 65', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(16, 'Geoffrey changé', 'May changé', 'imperdiet.ullamcorper@sedsem.net', '75012', 1, '07 86 32 54 81', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(17, 'Kibo', 'Anika', 'quis@luctus.com', '75012', 1, '07 44 54 44 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 1),
(18, 'Christopher', 'Tamara', 'Mauris@ut.co.uk', '75012', 1, '09 02 51 15 66', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(19, 'Kennedy', 'Vivian', 'sollicitudin@diamvel.net', '75012', 1, '01 65 86 54 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(20, 'Fuller', 'Constance', 'nisl@aliquet.net', '75012', 1, '08 35 24 92 54', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(21, 'Malachi', 'Dahlia', 'elit.sed@urnaNunc.com', '75012', 1, '01 36 28 16 80', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(22, 'Ciaran', 'Sloane', 'vitae.diam.Proin@semmolestiesodales.co.uk', '75012', 1, '01 96 41 88 61', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(23, 'James', 'Katell', 'mattis@mollisnec.com', '75012', 1, '01 44 46 89 80', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(24, 'Fletcher', 'Suki', 'sed.dolor@Donecfeugiatmetus.edu', '75012', 1, '04 66 28 87 32', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(25, 'Burton', 'Nevada', 'orci.luctus@sitamet.com', '75012', 1, '01 73 25 39 98', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(26, 'Kuame', 'Doris', 'tempus.non.lacinia@augueutlacus.org', '75012', 1, '01 50 67 41 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(27, 'Herman', 'Martina', 'amet@eu.com', '75012', 1, '05 46 22 73 07', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(28, 'Thomas', 'Natalie', 'eget.ipsum.Donec@volutpat.co.uk', '75012', 1, '06 18 47 23 76', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(29, 'Barry', 'Isabella', 'Morbi.sit.amet@blandit.ca', '75012', 1, '02 01 27 34 88', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(30, 'Steven', 'Chanda', 'pharetra.ut@tristiqueac.ca', '75012', 1, '07 93 23 21 76', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(31, 'Sean', 'Ria', 'sit@in.com', '75012', 1, '05 72 61 04 53', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(32, 'Garrison', 'Mallory', 'blandit@ametloremsemper.ca', '75012', 1, '01 71 46 78 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(33, 'Anthony', 'Odette', 'eleifend.vitae@ligula.com', '75012', 1, '07 02 75 93 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(34, 'Lev', 'Gloria', 'auctor.odio@nonummyipsum.edu', '75012', 1, '06 74 89 67 76', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(35, 'Austin', 'Maggie', 'Nullam.vitae@dolortempusnon.net', '75012', 1, '05 28 52 29 45', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(36, 'Timon', 'Octavia', 'nulla.Donec.non@atortor.org', '75012', 1, '07 03 00 14 06', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(37, 'Denton', 'Urielle', 'Sed@etrisus.net', '75012', 1, '03 94 97 92 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(38, 'Phillip', 'Kirby', 'nec.tellus@Etiamlaoreetlibero.co.uk', '75012', 1, '05 00 25 57 04', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(39, 'Jin', 'Stella', 'Cras@eliterat.co.uk', '75012', 1, '01 30 00 13 01', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(40, 'Elijah', 'Charlotte', 'Curabitur.massa.Vestibulum@felisNullatempor.org', '75012', 1, '08 25 91 44 66', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(41, 'Troy', 'Ebony', 'lectus@non.org', '75012', 1, '02 66 02 26 48', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(42, 'Addison', 'Margaret', 'et.libero.Proin@volutpatnunc.net', '75012', 1, '07 23 12 04 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(43, 'Ivan', 'Melodie', 'ullamcorper.magna@pharetraNam.co.uk', '75012', 1, '07 91 67 13 25', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(44, 'Elmo', 'Sigourney', 'cursus.et.magna@facilisisloremtristique.com', '75012', 1, '07 31 32 56 71', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(45, 'Jamal', 'Vivien', 'tincidunt.pede.ac@purus.net', '75012', 1, '07 59 81 77 11', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(46, 'Otto', 'Daphne', 'pellentesque@fringillaornare.org', '75012', 1, '09 94 52 88 93', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(47, 'Acton', 'Hope', 'tincidunt.vehicula.risus@sagittis.edu', '75012', 1, '01 14 14 22 69', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(48, 'Price', 'Maya', 'Morbi@etrisusQuisque.ca', '75012', 1, '04 21 97 21 01', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(49, 'Baxter', 'Olympia', 'ante.dictum.cursus@faucibusutnulla.net', '75012', 1, '06 71 44 82 11', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(50, 'Brody', 'Colette', 'hymenaeos.Mauris.ut@non.co.uk', '75012', 1, '07 97 26 17 59', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(51, 'Colin', 'Mollie', 'porttitor@aliquamarcu.co.uk', '75012', 1, '07 63 09 55 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(52, 'Gabriel', 'Mariko', 'sodales.elit.erat@etliberoProin.com', '75012', 1, '06 07 02 63 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(53, 'Driscoll', 'Mona', 'sem@convalliserateget.ca', '75012', 1, '02 00 37 17 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(54, 'Micah', 'Aspen', 'Proin.vel.arcu@nibh.ca', '75012', 1, '07 06 50 49 51', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(55, 'Robert', 'Yvonne', 'Quisque.porttitor.eros@malesuadavel.co.uk', '75012', 1, '08 56 90 13 71', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(56, 'Vance', 'Dorothy', 'risus.Donec.nibh@Proin.edu', '75012', 1, '05 96 52 81 14', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(57, 'Forrest', 'Rebekah', 'cursus.Nunc@metusfacilisislorem.edu', '75012', 1, '08 78 99 26 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(58, 'Jarrod', 'Winter', 'molestie.in@porttitor.edu', '75012', 1, '04 16 15 16 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(59, 'Quamar', 'Quemby', 'convallis.ligula.Donec@auctor.com', '75012', 1, '04 29 39 75 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(60, 'Kareem', 'Destiny', 'montes.nascetur@aarcuSed.edu', '75012', 1, '07 10 25 02 27', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(61, 'Amir', 'Daryl', 'magna.a@dolorFusce.ca', '75012', 1, '01 24 04 15 56', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(62, 'Gannon', 'Leah', 'eleifend.non@leoelementum.edu', '75012', 1, '08 87 39 58 63', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(63, 'Ezekiel', 'Kaden', 'blandit.mattis.Cras@turpisvitaepurus.ca', '75012', 1, '09 99 55 98 17', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(64, 'Adrian', 'Isabelle', 'massa@feugiat.com', '75012', 1, '04 02 77 81 25', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(65, 'Barrett', 'Xena', 'consequat.enim@nisi.ca', '75012', 1, '02 28 33 90 72', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(66, 'Emerson', 'Bryar', 'et.ultrices.posuere@tempusscelerisque.ca', '75012', 1, '07 59 45 07 34', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(67, 'Buckminster', 'Dakota', 'senectus@eu.ca', '75012', 1, '08 64 41 95 97', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(68, 'Dale', 'Constance', 'at@nullaIntincidunt.co.uk', '75012', 1, '02 66 85 24 28', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(69, 'Hall', 'Lee', 'mauris.Suspendisse.aliquet@consequat.co.uk', '75012', 1, '01 20 68 40 01', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(70, 'Howard', 'Lydia', 'Integer.aliquam.adipiscing@eudoloregestas.co.uk', '75012', 1, '05 77 68 03 62', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(71, 'Hakeem', 'Brynne', 'lacus@ac.com', '75012', 1, '07 13 15 42 00', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(72, 'Brennan', 'Quon', 'et.risus@Nunc.edu', '75012', 1, '07 14 54 25 77', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(73, 'Simon', 'Delilah', 'Aliquam@Donecfeugiat.ca', '75012', 1, '06 78 42 34 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(74, 'Len', 'Sarah', 'lacinia.at.iaculis@aceleifend.edu', '75012', 1, '08 67 94 11 90', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(75, 'Hasad', 'Brianna', 'dis.parturient@luctusaliquet.co.uk', '75012', 1, '05 61 84 31 24', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(76, 'Kennan', 'Daphne', 'lacinia.at@imperdietnon.co.uk', '75012', 1, '07 43 43 88 16', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(77, 'Lars', 'Jaquelyn', 'sit.amet@Vestibulumanteipsum.edu', '75012', 1, '01 27 16 23 25', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(78, 'Zeus', 'Sydney', 'et@nec.edu', '75012', 1, '09 72 81 40 40', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(79, 'Arsenio', 'Kimberly', 'convallis@liberoProinmi.ca', '75012', 1, '06 06 94 55 31', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(80, 'Nero', 'Emma', 'velit.Pellentesque.ultricies@tellus.co.uk', '75012', 1, '08 89 84 30 20', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(81, 'Reed', 'Angela', 'malesuada.ut.sem@ligulaelitpretium.ca', '75012', 1, '05 69 98 70 06', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(82, 'Price', 'Lavinia', 'Sed.neque@non.com', '75012', 1, '07 53 34 28 03', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(83, 'Chancellor', 'Heather', 'dignissim.magna.a@elit.org', '75012', 1, '04 55 88 64 97', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(84, 'Drew', 'Wynne', 'dolor@Morbiquis.ca', '75012', 1, '02 55 13 07 20', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(85, 'Elvis', 'Yael', 'dolor@dapibusquam.co.uk', '75012', 1, '01 61 13 89 33', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(86, 'Slade', 'Iola', 'in.consequat.enim@necquamCurabitur.org', '75012', 1, '02 42 26 48 35', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(87, 'Rajah', 'Illiana', 'Sed.auctor@Pellentesquehabitantmorbi.com', '75012', 1, '02 11 28 76 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(88, 'Porter', 'Christen', 'nisl.Maecenas.malesuada@bibendumullamcorper.co.uk', '75012', 1, '02 68 05 27 40', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(89, 'Kuame', 'Stacey', 'nisl.sem@egestas.ca', '75012', 1, '07 56 45 53 57', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(90, 'Travis', 'Zephr', 'dapibus@nec.com', '75012', 1, '06 98 27 57 26', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(91, 'Kadeem', 'Jaquelyn', 'vulputate.posuere.vulputate@laciniaorciconsectetuer.edu', '75012', 1, '09 04 65 76 81', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(92, 'Elliott', 'Hedy', 'Phasellus.libero.mauris@iaculislacuspede.com', '75012', 1, '06 65 71 63 21', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(93, 'Lev', 'Donna', 'aliquet.sem@nonbibendum.co.uk', '75012', 1, '06 01 45 37 38', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(94, 'Joshua', 'Karleigh', 'leo.Cras@utdolordapibus.org', '75012', 1, '07 97 93 42 45', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(95, 'Ryan', 'Ebony', 'ac@malesuada.ca', '75012', 1, '01 90 80 93 60', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(96, 'Thane', 'Caryn', 'pellentesque@convallisante.co.uk', '75012', 1, '07 16 22 30 63', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(97, 'Barry', 'Ava', 'mauris@CuraePhasellus.net', '75012', 1, '05 25 93 40 06', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(98, 'Matthew', 'Ursula', 'libero.dui.nec@dictum.org', '75012', 1, '07 04 68 11 08', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(99, 'Bruno', 'Tatiana', 'sit@necante.net', '75012', 1, '05 73 45 01 50', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(100, 'Peter', 'Kirestin', 'arcu@idblandit.ca', '75012', 1, '04 11 48 85 78', '83ea007bfdd589f29b820552b3f94260', 2, '2018-06-04', '2018-06-04', 0),
(101, 'wawa', 'wawa', 'waw@waw.com', '0000', 0, '0000000000', '0a1c6944cb66d02ccefac35620ce2e51', 1, '2018-06-14', '2018-06-14', 0),
(102, 'test', 'test', 'test@test.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, NULL, NULL, 0),
(103, 'tata', 'tata', 'tata@tata.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, NULL, NULL, 0),
(104, 'te', 'te', 'te@te.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, '2018-06-06', '2018-06-06', 0),
(105, '', '', '', '0000', 0, '0000000000', 'd41d8cd98f00b204e9800998ecf8427e', 2, '2018-06-06', '2018-06-06', 0),
(106, 'fqs', 'fqds', 'dsq@dsq.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, '2018-06-06', '2018-06-06', 0),
(107, 'tata', 'tata', 'toto@toto.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, '2018-06-18', '2018-06-18', 0),
(108, 'rara', 'rara', 'rara@rara.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, '2018-06-18', '2018-06-18', 0),
(109, 'jaja', 'jaja', 'jaja@jaja.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 2, '2018-06-18', '2018-06-18', 0),
(110, 'kaka', 'kaka', 'kaka@kaka.com', '0000', 0, '0000000000', '25f9e794323b453885f5181f1b624d0b', 1, '2018-06-18', '2018-06-18', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_id` (`panier_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categorie_produit`
--
ALTER TABLE `categorie_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `panier_produit`
--
ALTER TABLE `panier_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `panier_produit`
--
ALTER TABLE `panier_produit`
  ADD CONSTRAINT `panier_produit_ibfk_1` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `panier_produit_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
