-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 22 sep. 2021 à 09:59
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `NUM_ACTIVITE` int(2) NOT NULL,
  `NOM_ACTIVITE` char(32) DEFAULT NULL,
  `DATE_ACTIVITE` date DEFAULT NULL,
  `HEURE_ACTIVITE` time DEFAULT NULL,
  `PRIX_ACTIVITE` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `congressiste`
--

CREATE TABLE `congressiste` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_ORGANISME` int(2) DEFAULT NULL,
  `NUM_HOTEL` int(2) DEFAULT NULL,
  `NOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `PRENOM_CONGRESSISTE` char(32) DEFAULT NULL,
  `ADRESSE_CONGRESSISTE` char(50) DEFAULT NULL,
  `TEL_CONGRESSISTE` char(10) DEFAULT NULL,
  `DATE_INSCRIPTION` date DEFAULT NULL,
  `CODE_ACCOMPAGNATEUR` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `NUM_FACTURE` int(2) NOT NULL,
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `DATE_FACTURE` date DEFAULT NULL,
  `CODE_REGLEMENT` tinyint(1) DEFAULT NULL,
  `MONTANT_FACTURE` bigint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `NUM_HOTEL` int(2) NOT NULL,
  `NOM_HOTEL` char(32) DEFAULT NULL,
  `ADRESSE_HOTEL` char(50) DEFAULT NULL,
  `NOMBRE_ETOILES` smallint(1) DEFAULT NULL,
  `PRIX_PARTICIPANT` int(2) DEFAULT NULL,
  `PRIX_SUPPL` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organisme_payeur`
--

CREATE TABLE `organisme_payeur` (
  `NUM_ORGANISME` int(2) NOT NULL,
  `NOM_ORGANISME` char(32) DEFAULT NULL,
  `ADRESSE_ORGANISME` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participation_session`
--

CREATE TABLE `participation_session` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_SESSION` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rel_1`
--

CREATE TABLE `rel_1` (
  `NUM_CONGRESSISTE` int(2) NOT NULL,
  `NUM_ACTIVITE` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `NUM_SESSION` int(2) NOT NULL,
  `DATE_SESSION` date DEFAULT NULL,
  `HEURE_SESSION` time DEFAULT NULL,
  `PRIX_SESSION` int(2) DEFAULT NULL,
  `NOM_SESSION` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`NUM_SESSION`, `DATE_SESSION`, `HEURE_SESSION`, `PRIX_SESSION`, `NOM_SESSION`) VALUES
(1, '2021-09-12', '16:00:00', 12, 'L\'histoire de toto'),
(2, '2021-09-13', '16:30:00', 13, 'Visite de totoville'),
(3, '2021-09-14', '17:00:00', 14, 'Toto notre bien aimé');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`NUM_ACTIVITE`);

--
-- Index pour la table `congressiste`
--
ALTER TABLE `congressiste`
  ADD PRIMARY KEY (`NUM_CONGRESSISTE`),
  ADD KEY `I_FK_CONGRESSISTE_ORGANISME_PAYEUR` (`NUM_ORGANISME`),
  ADD KEY `I_FK_CONGRESSISTE_HOTEL` (`NUM_HOTEL`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`NUM_FACTURE`),
  ADD UNIQUE KEY `I_FK_FACTURE_CONGRESSISTE` (`NUM_CONGRESSISTE`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`NUM_HOTEL`);

--
-- Index pour la table `organisme_payeur`
--
ALTER TABLE `organisme_payeur`
  ADD PRIMARY KEY (`NUM_ORGANISME`);

--
-- Index pour la table `participation_session`
--
ALTER TABLE `participation_session`
  ADD PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_SESSION`),
  ADD KEY `I_FK_PARTICIPATION_SESSION_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  ADD KEY `I_FK_PARTICIPATION_SESSION_SESSION` (`NUM_SESSION`);

--
-- Index pour la table `rel_1`
--
ALTER TABLE `rel_1`
  ADD PRIMARY KEY (`NUM_CONGRESSISTE`,`NUM_ACTIVITE`),
  ADD KEY `I_FK_REL_1_CONGRESSISTE` (`NUM_CONGRESSISTE`),
  ADD KEY `I_FK_REL_1_ACTIVITE` (`NUM_ACTIVITE`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`NUM_SESSION`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `NUM_SESSION` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
