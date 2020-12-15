-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 15 Décembre 2020 à 17:05
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
-- Structure de la table `feedbackProduct`
--

CREATE TABLE `feedbackProduct` (
  `idFeedbackProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `description` text NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `feedbackProduct`
--

INSERT INTO `feedbackProduct` (`idFeedbackProduct`, `idUser`, `note`, `description`, `idProduct`) VALUES
(1, 1, 1, 'zfeef', 1),
(2, 1, 4, 'ytyututy', 1),
(3, 1, 1, 'hk,h,', 1);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `vendeur` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `idProductCategory` int(11) NOT NULL,
  `description` text NOT NULL,
  `descriptionFull` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`idProduct`, `nom`, `vendeur`, `prix`, `idProductCategory`, `description`, `descriptionFull`) VALUES
(1, 'Appareil photo', 'Canon', 1000, 1, '<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>', '<h4>OPERATING SYSTEM</h4>\r\n\r\n                                            <p><strong>Available with Windows 10 Home:</strong> Gaming is better than ever on Windows 10, with games in 4K, DirectX 12, and streaming your gameplay*.</p>');

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
-- Index pour la table `feedbackProduct`
--
ALTER TABLE `feedbackProduct`
  ADD PRIMARY KEY (`idFeedbackProduct`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`);

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
-- AUTO_INCREMENT pour la table `feedbackProduct`
--
ALTER TABLE `feedbackProduct`
  MODIFY `idFeedbackProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
