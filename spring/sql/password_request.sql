-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 04 juin 2019 à 11:05
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `youbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `password_request`
--

CREATE TABLE `password_request` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `date_expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `password_request`
--

INSERT INTO `password_request` (`id`, `email`, `uniqid`, `date_expire`) VALUES
(1, 'cecile.dillet@gmail.com', '5ce7ed30bf2a9', '2019-05-26 15:10:08'),
(2, 'bla@bla.com', '5ce7edbacae65', '2019-05-26 15:12:26'),
(3, 'bla@bla.com', '5ce7ede0a5d46', '2019-05-26 15:13:04'),
(4, 'cecile.dillet@gmail.com', '5ce7fba733e19', '2019-05-26 16:11:51'),
(5, 'cecile.dillet@gmail.com', '5ce804a746b39', '2019-05-26 16:50:15'),
(6, 'bla@bla.com', '5ce805783b6e6', '2019-05-26 16:53:44'),
(7, 'cec@cec.com', '5ce806620723f', '2019-05-26 16:57:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `password_request`
--
ALTER TABLE `password_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `password_request`
--
ALTER TABLE `password_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
