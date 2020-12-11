-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 11 Décembre 2020 à 09:26
-- Version du serveur :  10.1.47-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `phpfinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `deliveryAdress`
--

CREATE TABLE `deliveryAdress` (
  `idDeliveryAdress` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostale` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `productCategory`
--

CREATE TABLE `productCategory` (
  `idProductCategory` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nombreDeProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `productCategory`
--

INSERT INTO `productCategory` (`idProductCategory`, `nom`, `nombreDeProduit`) VALUES
(1, 'Informatique', 0),
(2, 'Vêtements', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'martin', 'yann', 'ymartin@la-providence.net', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(4, 'Pesant', 'Valetin', 'pvalentin@la-providence.net', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(5, 'Martel', 'Vincent', 'vmartek@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `deliveryAdress`
--
ALTER TABLE `deliveryAdress`
  ADD PRIMARY KEY (`idDeliveryAdress`);

--
-- Index pour la table `productCategory`
--
ALTER TABLE `productCategory`
  ADD PRIMARY KEY (`idProductCategory`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `deliveryAdress`
--
ALTER TABLE `deliveryAdress`
  MODIFY `idDeliveryAdress` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `productCategory`
--
ALTER TABLE `productCategory`
  MODIFY `idProductCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
