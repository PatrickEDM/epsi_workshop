-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Octobre 2016 à 09:47
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epsi_workshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE `jeu` (
  `nom` text NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE `joueur` (
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idSuperviseur` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE `statistique` (
  `date` date NOT NULL,
  `idJoueur` int(11) NOT NULL,
  `idJeu` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `superviseur`
--

DROP TABLE IF EXISTS `superviseur`;
CREATE TABLE `superviseur` (
  `pseudo` varchar(50) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `superviseur`
--

INSERT INTO `superviseur` (`pseudo`, `motDePasse`, `id`) VALUES
('test', '$2y$10$TkFbfkn/0TI9Jxq0LKd.MuLNDOMKPeHXHb96KJzrZUu8QYQ/Vlk/y', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IdJeu` (`id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idJoueur` (`id`);

--
-- Index pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD UNIQUE KEY `IdStatistique` (`id`);

--
-- Index pour la table `superviseur`
--
ALTER TABLE `superviseur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IdUtilisateur` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `statistique`
--
ALTER TABLE `statistique`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `superviseur`
--
ALTER TABLE `superviseur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
