-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 29 Avril 2021 à 16:31
-- Version du serveur :  10.3.27-MariaDB-0+deb10u1
-- Version de PHP :  7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Psycaptr`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `Id` int(11) NOT NULL,
  `Mdp` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prénom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Admin`
--

INSERT INTO `Admin` (`Id`, `Mdp`, `Nom`, `Prénom`) VALUES
(29473, 32456, 'GABORIAUD', 'MATHILDE'),
(34367, 39379, 'THOMAS', 'JULIEN'),
(34853, 93842, 'WALLEZ', 'THEOPHILE'),
(44358, 20843, 'HALLER', 'HANS'),
(53432, 43495, 'DELERUE', 'ARTHUR');

-- --------------------------------------------------------

--
-- Structure de la table `Patient`
--

CREATE TABLE `Patient` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL,
  `Id_Medecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Test`
--

CREATE TABLE `Test` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Type` int(11) NOT NULL,
  `Resultats` int(11) NOT NULL,
  `Id_Patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `Id` int(11) NOT NULL,
  `Mail` varchar(75) NOT NULL,
  `Mdp` int(11) NOT NULL,
  `Date_Inscription` date NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`Id`, `Mail`, `Mdp`, `Date_Inscription`, `Nom`, `Prenom`) VALUES
(23467, 'test@gmail.com', 12345, '2021-04-01', 'Pierre', 'Paul');

-- --------------------------------------------------------

--
-- Structure de la table `ValidationMedecin`
--

CREATE TABLE `ValidationMedecin` (
  `idMedecin` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Prénom` varchar(45) NOT NULL,
  `Profession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ValidationPatient`
--

CREATE TABLE `ValidationPatient` (
  `Type` int(11) NOT NULL,
  `Date` date NOT NULL,
  `idMedecin` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `Prénom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Admin` (`Id`,`Mdp`);

--
-- Index pour la table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Medecin` (`Id_Medecin`);

--
-- Index pour la table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Patient` (`Id_Patient`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD KEY `User` (`Id`,`Mdp`);

--
-- Index pour la table `ValidationPatient`
--
ALTER TABLE `ValidationPatient`
  ADD UNIQUE KEY `Patient` (`idPatient`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `Patient_ibfk_1` FOREIGN KEY (`Id_Medecin`) REFERENCES `Utilisateurs` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `Test_ibfk_1` FOREIGN KEY (`Id_Patient`) REFERENCES `Patient` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
