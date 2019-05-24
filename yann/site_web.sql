-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 24 mai 2019 à 16:40
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `step1`
--

CREATE TABLE `step1` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tranche_age` varchar(255) NOT NULL,
  `time_read` varchar(255) NOT NULL,
  `nb_books` varchar(255) NOT NULL,
  `time_week` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `step2`
--

CREATE TABLE `step2` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `choose_box` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `step3`
--

CREATE TABLE `step3` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `choose` varchar(255) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `step4`
--

CREATE TABLE `step4` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `school_domains` varchar(255) NOT NULL,
  `school_class` varchar(255) NOT NULL,
  `school_genres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `step5`
--

CREATE TABLE `step5` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `magazines_genres` varchar(255) NOT NULL,
  `choose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `step6`
--

CREATE TABLE `step6` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `box_hearth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `step1`
--
ALTER TABLE `step1`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step2`
--
ALTER TABLE `step2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step3`
--
ALTER TABLE `step3`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step4`
--
ALTER TABLE `step4`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step5`
--
ALTER TABLE `step5`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `step6`
--
ALTER TABLE `step6`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `step1`
--
ALTER TABLE `step1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `step2`
--
ALTER TABLE `step2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `step3`
--
ALTER TABLE `step3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `step4`
--
ALTER TABLE `step4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `step5`
--
ALTER TABLE `step5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `step6`
--
ALTER TABLE `step6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
