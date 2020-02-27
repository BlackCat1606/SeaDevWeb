-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 10 Juin 2017 à 01:29
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dzhealth`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE `alerte` (
  `idalerte` int(11) NOT NULL,
  `idpatient` varchar(20) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `auxiliaire`
--

CREATE TABLE `auxiliaire` (
  `idauxiliaire` varchar(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `adresse` varchar(35) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `specialite` varchar(20) DEFAULT NULL,
  `etablissement` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gtransport`
--

CREATE TABLE `gtransport` (
  `idgtrasport` varchar(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(35) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `idmedecin` varchar(20) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `adresse` varchar(35) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `specialite` varchar(20) DEFAULT NULL,
  `etablissement` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`idmedecin`, `passwd`, `nom`, `prenom`, `sexe`, `adresse`, `tel`, `specialite`, `etablissement`) VALUES
('mw_redjem', 'seadev', 'REDJEM', 'Wissem', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paramedical`
--

CREATE TABLE `paramedical` (
  `idparamedical` varchar(20) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `sexe` char(1) DEFAULT NULL,
  `adresse` varchar(35) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `specialite` varchar(20) DEFAULT NULL,
  `etablissement` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idpatient` varchar(20) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `datenaiss` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `adresse` varchar(35) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `type` varchar(3) DEFAULT NULL,
  `idmedecin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`idpatient`, `passwd`, `nom`, `prenom`, `datenaiss`, `sexe`, `adresse`, `tel`, `type`, `idmedecin`) VALUES
('p_patient1', 'seadev', 'PATIENT1', 'Patient', NULL, 'M', NULL, NULL, 'AD', 'mw_redjem'),
('p_patient2', 'seadev', 'PATIENT2', 'Patient', '1995-11-27', 'F', 'Alger', NULL, 'G', 'mw_redjem');

-- --------------------------------------------------------

--
-- Structure de la table `prelevement`
--

CREATE TABLE `prelevement` (
  `idprelevement` int(11) NOT NULL,
  `idpatient` varchar(20) NOT NULL,
  `resultat` double DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prelevement`
--

INSERT INTO `prelevement` (`idprelevement`, `idpatient`, `resultat`, `type`, `date`) VALUES
(2, 'p_patient1', 0.7, 'G', '2017-06-09 00:00:00'),
(3, 'p_patient2', 50, 'P', '2017-06-11 00:00:00'),
(4, 'p_patient2', 50, 'P', '2017-06-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `idrdv` int(11) NOT NULL,
  `idpatient` varchar(20) NOT NULL,
  `dateRDV` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rdv`
--

INSERT INTO `rdv` (`idrdv`, `idpatient`, `dateRDV`) VALUES
(3, 'p_patient1', '2017-06-14 00:00:00'),
(4, 'p_patient2', '2017-06-28 00:00:00'),
(5, 'p_patient1', '2017-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` int(11) NOT NULL,
  `idpatient` varchar(20) DEFAULT NULL,
  `dateReservation` datetime NOT NULL,
  `typevehicule` varchar(20) DEFAULT NULL,
  `assistant` tinyint(1) DEFAULT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE `traitement` (
  `idtraitement` int(11) NOT NULL,
  `idpatient` varchar(20) NOT NULL,
  `libelle` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `traitement`
--

INSERT INTO `traitement` (`idtraitement`, `idpatient`, `libelle`) VALUES
(3, 'p_patient1', 'Doliprane'),
(4, 'p_patient1', 'Dolicrane');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD PRIMARY KEY (`idalerte`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `auxiliaire`
--
ALTER TABLE `auxiliaire`
  ADD PRIMARY KEY (`idauxiliaire`);

--
-- Index pour la table `gtransport`
--
ALTER TABLE `gtransport`
  ADD PRIMARY KEY (`idgtrasport`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`idmedecin`);

--
-- Index pour la table `paramedical`
--
ALTER TABLE `paramedical`
  ADD PRIMARY KEY (`idparamedical`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idpatient`),
  ADD KEY `idmedecin` (`idmedecin`);

--
-- Index pour la table `prelevement`
--
ALTER TABLE `prelevement`
  ADD PRIMARY KEY (`idprelevement`,`idpatient`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`idrdv`,`idpatient`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`),
  ADD KEY `idpatient` (`idpatient`);

--
-- Index pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`idtraitement`,`idpatient`),
  ADD KEY `idpatient` (`idpatient`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `alerte`
--
ALTER TABLE `alerte`
  MODIFY `idalerte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `prelevement`
--
ALTER TABLE `prelevement`
  MODIFY `idprelevement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `idrdv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idreservation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `traitement`
--
ALTER TABLE `traitement`
  MODIFY `idtraitement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `alerte`
--
ALTER TABLE `alerte`
  ADD CONSTRAINT `alerte_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`idmedecin`) REFERENCES `medecin` (`idmedecin`);

--
-- Contraintes pour la table `prelevement`
--
ALTER TABLE `prelevement`
  ADD CONSTRAINT `prelevement_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `rdv_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

--
-- Contraintes pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD CONSTRAINT `traitement_ibfk_1` FOREIGN KEY (`idpatient`) REFERENCES `patient` (`idpatient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
