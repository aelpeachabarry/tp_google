-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 01 Janvier 2014 à 22:18
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tp_google`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `idDATA` int(11) NOT NULL AUTO_INCREMENT,
  `DAT_nb_links` varchar(45) DEFAULT NULL,
  `URL_idURL` int(11) NOT NULL,
  `DAT_title` varchar(200) DEFAULT NULL,
  `DAT_descr` varchar(400) DEFAULT NULL,
  `DAT_alt` int(11) DEFAULT NULL,
  `DAT_h1` varchar(150) DEFAULT NULL,
  `DAT_keywords` longtext,
  `DAT_rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDATA`,`URL_idURL`),
  KEY `fk_DATA_URL` (`URL_idURL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `idURL` int(11) NOT NULL AUTO_INCREMENT,
  `URL_url` varchar(500) DEFAULT NULL,
  `URL_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idURL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `fk_DATA_URL` FOREIGN KEY (`URL_idURL`) REFERENCES `url` (`idURL`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
