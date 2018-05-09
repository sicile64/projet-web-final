-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 09 mai 2018 à 22:00
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetfinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `login`, `password`) VALUES
(1, 'francesco', '838ae3c1946a7d7135f7e8401e314ba8');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datenaiss` datetime NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idclient`, `login`, `password`, `email`, `datenaiss`) VALUES
(1, 'franco', '81dc9bdb52d04dc20036dbd8313ed055', 'francocosta87@gmail.com', '1995-09-05 00:00:00'),
(2, 'julien', '202cb962ac59075b964b07152d234b70', 'juju@dubui.com', '2011-05-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idcommande` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `prixtot` float NOT NULL,
  `datecom` date NOT NULL,
  PRIMARY KEY (`idcommande`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idcommande`, `idclient`, `prixtot`, `datecom`) VALUES
(1, 1, 156.3, '2018-05-09'),
(2, 2, 384.96, '2018-05-09');

-- --------------------------------------------------------

--
-- Structure de la table `commandef`
--

DROP TABLE IF EXISTS `commandef`;
CREATE TABLE IF NOT EXISTS `commandef` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcommande` int(11) NOT NULL,
  `idjeux` int(11) NOT NULL,
  `qteV` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandef`
--

INSERT INTO `commandef` (`id`, `idcommande`, `idjeux`, `qteV`, `prix`) VALUES
(1, 1, 11, 1, 46.3),
(2, 1, 12, 1, 30),
(3, 1, 18, 4, 20),
(4, 2, 11, 1, 46.3),
(5, 2, 13, 2, 20),
(6, 2, 14, 3, 45),
(7, 2, 16, 4, 24.99),
(8, 2, 19, 5, 12.74);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `idjeux` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `plateform` varchar(25) NOT NULL,
  `editeur` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `pegi` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `datesortie` date NOT NULL,
  `jacket` varchar(255) NOT NULL,
  PRIMARY KEY (`idjeux`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`idjeux`, `nom`, `genre`, `plateform`, `editeur`, `prix`, `pegi`, `description`, `datesortie`, `jacket`) VALUES
(11, 'uncharted 4', 'aventure', 'PS4', 'nothy dog', 46.3, 16, 'quatrième opus de uncharted', '2016-05-10', 'uncharted4.jpg'),
(12, 'GTA V', 'simulation', 'PS4', 'rockstar', 30, 18, 'cinquième opus de la franchise gta', '2014-11-18', 'GTAV.jpg'),
(13, 'the witcher 3', 'aventure', 'PS4', 'CD projekt RED', 20, 18, 'troisième opus de la francise the witcher', '2015-05-19', 'w3.jpg'),
(14, 'Assasins creed Origin', 'simulation', 'PS4', 'ubisoft', 45, 18, 'suivez l\'histoire de bayek dans l\'egypte Antique ', '2017-10-27', 'acOrigins.jpg'),
(15, 'far cry 5', 'simulation', 'XBOX', 'ubisoft', 59.99, 18, 'cinquième opus de la série far cry ', '2018-03-27', 'farcry5.jpg'),
(16, 'dragon ball xenoverse 2', 'combat', 'XBOX', 'bandai namco', 24.99, 12, 'deuxième opus du jeux dragon ball xenoverse', '2016-10-28', 'xeno2.jpg'),
(17, 'fallout 4', 'simulation', 'XBOX', 'bethesda ', 16.97, 18, 'quatrième opus de la série fallout', '2015-11-10', 'f4.png'),
(18, 'the witcher 3', 'simulation', 'PC', 'CD projekt RED', 20, 18, 'troisième opus de la série the witcher 3', '2015-05-19', 'w3.jpg'),
(19, 'Dark soul 3', 'action/RPG', 'PC', 'from software', 12.74, 18, 'troisième opus de la série dark soul', '2016-04-12', 'ds3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
