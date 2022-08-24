-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 juil. 2022 à 21:48
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cosmetiq`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `datedenaissance` date DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `motdepasse`, `datedenaissance`, `role`) VALUES
(2, 'vr', 'r', 'cc@4ecc.com', '$2y$12$pC53pu/CyWxWppn6zrkF/uBDJTXAj62P8mEUA8Aeu.dvPrC8.pFY.', '0001-11-11', NULL),
(3, 'vr', 'r', 'cc@4eczc.com', '$2y$12$bbFzYzYUuidd1VqFLKu6KusH1RJFajXj7EK1vTHBLDU7nqGj8Fxx.', '0001-11-11', NULL),
(4, 'c', 'c', 'cc@kk.com', '$2y$12$aDtTa.h3aWu1ZPUK6LmKze0nN1kvDzC2UNHg5Gz08WK06Y.etBstS', '0053-05-05', NULL),
(5, 'd', 'd', 'dsd@dsd.cf', '$2y$12$f8GnaC3T3I4KPlv4UtrTSex919XjAfRL6Orf179TlCPySbIEOqAT.', '2038-11-11', NULL),
(6, 'sds', 'ds', 'dsds@ffd.gh', '$2y$12$n2HBG.3o0FBNKG7XjdJEWuSvJlNPS9oP.FtR5CLQ1C9Fct7XMyO/K', '0000-00-00', NULL),
(7, 'd', 'd', 'dd@dd.dd', '$2y$12$gL96io8uBT.08WLjrKXAz.lc0dMC9SbDWGkxCE2ksZ2SX4apnhs.y', '0011-11-11', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
