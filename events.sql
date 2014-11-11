-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 11 Novembre 2014 à 22:27
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `crep`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` smallint(5) unsigned NOT NULL,
  `creationTime` int(10) unsigned NOT NULL,
  `nom` text CHARACTER SET utf8 NOT NULL,
  `description` mediumtext CHARACTER SET utf8 NOT NULL,
  `annule` tinyint(1) NOT NULL DEFAULT '0',
  `valide` int(10) unsigned NOT NULL DEFAULT '0',
  `duree` mediumint(8) unsigned NOT NULL DEFAULT '3600',
  `supprime` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `creationTime`, `nom`, `description`, `annule`, `valide`, `duree`, `supprime`) VALUES
(1, 1415737327, 'Événement de test n°1', 'Description de l''événement de test n°1.', 0, 0, 7200, 0),
(2, 1415738888, 'Événement de test n°2', 'Description de l''événement de test n°2.\r\nNouvelle ligne et caractères $ρ∑⊂|⋀∪×.', 1, 0, 12345, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
