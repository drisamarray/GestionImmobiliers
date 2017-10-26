-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Jeu 21 Septembre 2017 à 06:33
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `google`
--

-- --------------------------------------------------------

--
-- Structure de la table `donnees`
--

CREATE TABLE `donnees` (
  `id` int(11) NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `nfamille` varchar(60) DEFAULT NULL,
  `adresse` varchar(80) DEFAULT NULL,
  `prix` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `donnees`
--

INSERT INTO `donnees` (`id`, `latitude`, `longitude`, `prenom`, `nfamille`, `adresse`, `prix`) VALUES
(39, 45.566177, -73.706757, 'gilberto', 'ramos', '4448 Rue de BrianÃ§on, Laval, QC, Canada', 2000),
(40, 45.534687, -73.604561, 'charlot', 'Torres', '447 Rue Beaubien Est, MontrÃ©al, QC, Canada', 500),
(41, 45.518505, -73.567879, 'Pierre', 'denis', '3245 Rue Berri, MontrÃ©al, QC, Canada', 600),
(42, 45.597034, -73.563354, 'Diane', 'villeneuve', '8925 Rue BÃ©langer, MontrÃ©al, QC, Canada', 700);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `idannonce` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `idannonce`, `filename`, `path`) VALUES
(23, 39, 'facade-en-ete-maison-a-vendre-longueuil-quebec-province-1600-7912598.jpg', 'upload/facade-en-ete-maison-a-vendre-longueuil-quebec-province-1600-7912598.jpg'),
(24, 40, 'vue-sur-le-lac-maison-a-vendre-val-des-monts-quebec-province-standard-6513323.jpg', 'upload/vue-sur-le-lac-maison-a-vendre-val-des-monts-quebec-province-standard-6513323.jpg'),
(25, 41, 'maison-a-un-etage-et-demi-a-vendre-malartic-quebec-province-standard-3222555.jpg', 'upload/maison-a-un-etage-et-demi-a-vendre-malartic-quebec-province-standard-3222555.jpg'),
(26, 42, 'facade-maison-a-vendre-val-des-monts-quebec-province-standard-7389878.jpg', 'upload/facade-maison-a-vendre-val-des-monts-quebec-province-standard-7389878.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `donnees`
--
ALTER TABLE `donnees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `donnees`
--
ALTER TABLE `donnees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;