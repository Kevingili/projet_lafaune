-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Avril 2015 à 12:57
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `baselafaune1`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `cat_code` varchar(3) NOT NULL,
  `cat_libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_libelle`) VALUES
('F00', 'Carnivores'),
('P00', 'Paysages'),
('W00', 'Oiseaux'),
('M00', 'Autres mammifères');

-- --------------------------------------------------------

--
-- Structure de la table `clientconnu`
--

CREATE TABLE IF NOT EXISTS `clientconnu` (
  `clt_code` varchar(5) NOT NULL,
  `clt_nom` varchar(25) NOT NULL,
  `clt_adresse` varchar(50) NOT NULL,
  `clt_tel` varchar(10) NOT NULL,
  `clt_email` varchar(30) NOT NULL,
  `clt_motPasse` varchar(25) NOT NULL,
  PRIMARY KEY (`clt_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clientconnu`
--

INSERT INTO `clientconnu` (`clt_code`, `clt_nom`, `clt_adresse`, `clt_tel`, `clt_email`, `clt_motPasse`) VALUES
('c0001', 'Dupont', '12, rue haute 75001 Paris', '0105223597', 'dupont@wanadoo.fr', 'aaa'),
('c0002', 'Dubois', '4, bld d''Alsace 75002 Paris', '0144976254', 'dubois@club-internet.fr', 'bbb'),
('c0003', 'Durand', '5, allée des Ifs 80000 Amiens', '0322796456', 'durand@free.fr', 'ccc');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `cde_client` varchar(5) NOT NULL,
  `cde_moment` varchar(20) NOT NULL,
  PRIMARY KEY (`cde_client`,`cde_moment`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `cde_client` varchar(5) NOT NULL,
  `cde_moment` varchar(15) NOT NULL,
  `produit` varchar(5) NOT NULL,
  `quantite` int(5) NOT NULL,
  PRIMARY KEY (`cde_client`,`cde_moment`,`produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `pdt_ref` varchar(3) NOT NULL,
  `pdt_designation` varchar(50) NOT NULL,
  `pdt_prix` decimal(5,2) NOT NULL,
  `pdt_image` varchar(50) NOT NULL,
  `pdt_categorie` varchar(3) NOT NULL,
  PRIMARY KEY (`pdt_ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`pdt_ref`, `pdt_designation`, `pdt_prix`, `pdt_image`, `pdt_categorie`) VALUES
('F01', 'Lionceux 40 x 60', '35.00', 'Lionceau.jpg', 'F00'),
('F02', 'Jeune guépard 40 x 60', '30.00', 'Jeune-guepard.jpg', 'F00'),
('F03', 'Accouplement royal 50 x 75', '40.00', 'Acc-royal.jpg', 'F00'),
('F04', 'Hyène 30 x 45', '25.00', 'Hyene.jpg', 'F00'),
('F05', 'Portrait lion male 20 x 30', '15.00', 'Portrait-lion.jpg', 'F00'),
('F06', 'Lionne et carcasse 20 x 30', '17.00', 'Carcasse.jpg', 'F00'),
('F07', 'Galipette de lion 40 x 60', '35.00', 'Galipette.jpg', 'F00'),
('P01', 'Paysage du lac Magadi 40 x 60', '35.00', 'Magadi.jpg', 'P00'),
('P02', 'La sentinelle 40 x 60', '36.00', 'Sentinelle.jpg', 'P00'),
('P03', 'Rivière rouge 40 x 60', '35.00', 'Riviere-rouge.jpg', 'P00'),
('P04', 'Lac Natron 30 x 40', '25.00', 'Natron.jpg', 'P00'),
('P05', 'Survol 30 x 40', '24.00', 'Survol.jpg', 'P00'),
('P06', 'Ombre 30 x 40', '25.00', 'Ombre.jpg', 'P00'),
('P07', 'Flamants 40 x 60', '40.00', 'Flamants.jpg', 'P00'),
('W01', 'Rollier 20 x 30', '10.00', 'Rollier.jpg', 'W00'),
('W02', 'Aigle 30 x 40', '19.00', 'Aigle.jpg', 'W00'),
('W03', 'Oedicnème 20 x 30 ', '8.00', 'Oedicneme.jpg', 'W00'),
('W04', 'Calao terrestre 20 x 30', '8.00', 'Calao.jpg', 'W00'),
('W05', 'Ombrette', '8.00', 'Ombrette.jpg', 'W00'),
('M01', 'Bouquet de girafes 20 x30', '8.00', 'Bouquet-girafe.jpg', 'M00'),
('M02', 'Portrait de girafe 20 x 30', '8.00', 'Girafe.jpg', 'M00'),
('M03', 'Phacochère 20 x 30', '8.00', 'Phacochere.jpg', 'M00'),
('M04', 'Impalas au lever du soleil 40 x 60', '28.00', 'Impalas.jpg', 'M00'),
('M05', 'Buffle 20 x 30', '8.00', 'Buffle.jpg', 'M00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
