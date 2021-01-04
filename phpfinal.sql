-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 04 jan. 2021 à 20:03
-- Version du serveur :  10.1.47-MariaDB-0+deb9u1
-- Version de PHP : 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kbwyoyxi_projetphp`
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
-- Structure de la table `feedbackProduct`
--

CREATE TABLE `feedbackProduct` (
  `idFeedbackProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `feedbackProduct`
--

INSERT INTO `feedbackProduct` (`idFeedbackProduct`, `idUser`, `note`, `description`, `idProduct`) VALUES
(1, 1, '3', 'Taille parfait', 6);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `vendeur` varchar(255) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `descriptionFull` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`idProduct`, `nom`, `vendeur`, `idCategory`, `prix`, `description`, `descriptionFull`) VALUES
(1, 'Mac', 'Apple', 1, 1500, 'Ordinateur 13 pouces', 'Le Mac est un ordinateur'),
(2, 'Appareil photo ', 'Sony', 1, 1000, 'Appareil Sony ', 'L\'appareil photo Sony est le meilleur du marché'),
(3, 'TV', 'Philips', 1, 2000, '', ''),
(4, 'Imprimente', 'HP', 1, 50, '', ''),
(5, 'T-shirt', 'Zara', 2, 19, '', ''),
(6, 'PullOver', 'Jules', 2, 45, '', ''),
(7, 'Sarouel', 'Kiabi', 2, 15, '', ''),
(8, 'Doudoune', 'Guess', 2, 150, '', '');

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
-- Déchargement des données de la table `productCategory`
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
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'martin', 'yann', 'ymartin@la-providence.net', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(4, 'Pesant', 'Valetin', 'pvalentin@la-providence.net', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(5, 'Martel', 'Vincent', 'vmartek@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(6, 'Pesant', 'Valentin', 'Valentin.pesant@outlook.fr', 'e05af1399f4f4beb7934c9f12ba5a9c88f7ee1e8ef3fe7a167be4b979c515d24102ad90d3a0754d48fc5930f6369a3087e686e9732ef3460e6439a95089b4800');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `deliveryAdress`
--
ALTER TABLE `deliveryAdress`
  ADD PRIMARY KEY (`idDeliveryAdress`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `feedbackProduct`
--
ALTER TABLE `feedbackProduct`
  ADD PRIMARY KEY (`idFeedbackProduct`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategory` (`idCategory`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `deliveryAdress`
--
ALTER TABLE `deliveryAdress`
  MODIFY `idDeliveryAdress` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feedbackProduct`
--
ALTER TABLE `feedbackProduct`
  MODIFY `idFeedbackProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `productCategory`
--
ALTER TABLE `productCategory`
  MODIFY `idProductCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
