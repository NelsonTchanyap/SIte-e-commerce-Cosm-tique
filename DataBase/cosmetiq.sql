-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 août 2022 à 19:52
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
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `IdCategorie` varchar(255) NOT NULL,
  `Descriptions` longtext NOT NULL,
  `Quantité` int(11) NOT NULL,
  `Prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `Designation`, `Url`, `IdCategorie`, `Descriptions`, `Quantité`, `Prix`) VALUES
(1, 'Savon au curcuma', 'images/savon1.png', '1', 'Le savon au curcuma est un savon fabriqué traditionnellement avec des propriétés antiseptiques et antibactériennes . Il vous permettra de réduire les rides et les cernes en rendant votre peau souple et nette . Il est idéal pour les peaux sensibles , acnéiques et ternes .\r\n<br>\r\nAdapté pour tous types de peaux(hommes , femmes , enfants)<br>\r\nConseil d’utilisation: Appliquez la mousse du savon curcuma sur votre visage, patientez 05 minutes et rincez avec de l’eau tiède . Répétez l’opération 03 fois par semaine . Pour obtenir de meilleurs résultats, nous vous proposons de le combiner au savon noir .<br>\r\nComposants: curcuma , citron , miel.', 20, 25),
(2, 'Savon noir', 'images/Savon2.png', '1', 'le savon noir est un savon fabriqué traditionnellement pour vous aider à lutter contre les imperfections de la peau telles que les boutons , les tâches et la dartre . Il gomme votre visage en profondeur , il élimine les toxines, nettoie, purifie la peau en profondeur et la rend douce et satinée . C’est l’indispensable de votre Skin routine .\r\n<br>\r\n<b>Adapté pour tous types de peaux </b><i>(hommes , femmes , enfants)</i><br><br>\r\nConseil d’utilisation: Appliquez la mousse du savon noir sur votre visage, patientez 05 minutes et rincez avec de l’eau tiède . Répétez l’opération 03 fois par semaine . Si vous avez une peau sensible vous pouvez utiliser le savon 02 fois par semaine en mélangeant le savon avec de l’huile rouge, l’Aloe vera ou le miel . Vous pouvez également laver vos cheveux avec votre savon.<br>\r\n<b>Composants: Olives noires.</b>', 34, 30),
(4, 'Gamme Claire', 'images/GamCl1.png', '3', 'Elle est composée de 03 produits à savoir l’huile de carottes , le savon noir et le savon au curcuma votre gamme claire va vous aider à nettoyer et hydrater votre peau , la rendre plus douce et retrouver l’éclat naturel .<br>\r\n\r\n<b>Adaptée aux peaux claires .</b>', 33, 100),
(5, 'Gamme cocktail', 'images/GamCl2.png', '3', 'Elle est composée de 03 produits à savoir: l’huile cocktail , le savon noir et le savon au curcuma.Votre gamme cocktail va vous aider à nettoyer et hydrater votre peau , vous redonner votre teint naturel .<br>\r\n\r\n<b>Adaptée aux peaux caramel.</b>', 22, 118),
(6, 'Gamme réparatrice', 'images/GamCl3.png', '3', 'Elle est composée de 03 produits à savoir: l’huile de curcuma , le savon noir et le savon au curcuma . Votre gamme réparatrice va vous aider à réparer votre peau abîmée par les produits décapants ou de mauvaises qualités, de lutter également contre vos cernes et vous permettre d\'avoir un teint naturel lumineux.<br>\r\n\r\n<b>Adaptée aux personnes ayant des <i>phalanges décolorées(quintaux), peaux vieillissantes  et autres problèmes liés au décapage</i> .</b>', 57, 189),
(7, 'Gamme Anti-Tâches', 'images/GamCl4.png', '3', 'votre gamme anti-tache va vous aider à combattre les tâches d’acnés, les vergetures, les entre cuisses noires et joues de fesses noires .<br>\r\n\r\n<B>Adapté pour tout type de peaux></B>', 45, 178),
(8, 'Gamme ébène', 'images/GamCl5.png', '3', 'Elle est composée de l’huile d’amande douce , savon noir et savon au curcuma .Elle protège la peau et les cheveux , tout en leur redonnant de la vigueur et de l’éclat . Apaisante , elle soulage les irritations et les démangeaisons . Elle est parfaite en cas de gerçures ou de peaux desséchées.<br>\r\n\r\n<b>Adaptée aux peaux noires</b> <i>(utilisation recommandée pour les enfants .)</i> ', 67, 202),
(9, 'Gel de douche', 'images/Gommage.png', '2', 'Gel douche fait à base des extraits aqueux des plaintes médicinales. Il enlève les tâches, dartre , rougeurs, cernes donne de l\'éclat au teint, traité l\'acné et hydrate la peau.', 54, 23),
(10, 'Huile de carotte', 'images/huile-vegetale.jpg', '4', 'Extrait de carotte naturelle , et riche en Bêta-carotène , votre huile essentielle de carotte redonne l’éclat à la peau , unifie le teint et vous donne un effet bonne mine grâce à sa teinte orangée . Elle vous aidera également à lutter contre les taches sur votre corps .<br>\r\n\r\n<b>Adapté aux peaux claires</b><br>\r\n<b>Conseil d’utilisation:</b> Appliquez votre huile le soir au coucher sur une peau propre en massant délicatement jusqu’à pénétration . Ne mélangez pas votre huile essentielle dans votre lait corporel de peur d’altérer le résultat .<br>\r\n<b>Composants:</b> extrait de carottes naturelles , huile de coco pure .', 23, 34),
(11, 'Huile d\'Amande Douce', 'images/huile3.jpg', '4', 'L’huile d’amande douce hydrate , protège la peau et les cheveux , tout en leur redonnant de la vigueur et de l’éclat . Apaisante , elle soulage les irritations et les démangeaisons . Elle est parfaite en cas de gerçures ou de peaux desséchées .<br>\r\n<br>\r\n<b>Adaptée pour tous types de peaux</b><i>(utilisation recommandée pour les enfants .)</i><br>\r\n<b>Conseil d’utilisation:</b> Appliquez votre huile sur une peau propre en massant délicatement jusqu’à pénétration . Ne mélangez pas votre huile essentielle dans votre lait corporel de peur d’altérer le résultat . Peut être utiliser à tout moment de la journée .<br>\r\n<b>Composants/b>: extrait d’amandes douces , huile de coco pure .', 54, 56.99),
(12, 'Huile de Curcuma', 'images/huile6.jpeg', '4', 'Extrait de curcuma frais , l’huile de curcuma est une huile réparatrice qui permet de réparer les peaux abîmées par les produits décapants ou de mauvaises qualités, elle lutte également contre les cernes et permet d\'avoir un teint naturel lumineux.<br>\r\n\r\n<b>Adaptée aux personnes ayant des phalanges décolorées(quintaux), peaux vieillissantes  et autres problèmes liés au décapage .</b> <br>\r\n<B>Conseil d’utilisation:</b> Appliquez votre huile le soir au coucher sur une peau propre en massant délicatement jusqu’à pénétration . Ne mélangez pas votre huile essentielle dans votre lait corporel de peur d’altérer le résultat . Nous vous recommandons d’appliquer votre huile avec un coton disque.<br><br>\r\nComposants: extrait de curcuma , huile de coco pure .', 34, 34.75),
(13, 'Huile Cocktail', 'images/huiles1.jpg', '4', 'Composé d’huile de persil, de coco et de carotte, votre huile vous permettra d\'avoir un teint caramel et une peau unifiée.<br>\r\n\r\nAdapté au teint caramel<br>\r\n<b>Conseil d’utilisation:</b> Appliquez votre huile le soir au coucher sur une peau propre en massant délicatement jusqu’à pénétration . Ne mélangez pas votre huile essentielle dans votre lait corporel de peur d’altérer le résultat.<br><br>\r\nComposants: extrait d’huile de coco pure , extrait d’huile de carotte , extrait d’huile de persil .', 28, 32.78),
(14, 'Huile de Chebe', 'images/huile-de-nigelle.jpg', '4', 'Admirée pour ses propriétés hydratantes et anti casse naturelles , votre huile de chebe va lutter et permettre d’hydrater intensément les cheveux , les rendre moins cassants, plus résistants, et accelere la pousse des cheveux .<br>\r\n\r\n<b>Adapté pour tous types de cheveux</b>. <br>\r\n<b>Conseil d’utilisation:</b> votre huile s’applique 04 fois par semaine sur le cuir chevelu , après application du produit , attacher un foulard afin de bien faire adhérer le produit aux cheveux . <br>\r\n<B>Composants</b>: extrait de poudre de chebe .', 78, 48.95),
(15, 'Huile de Persil', 'images/huile4.jpg', '4', 'Extrait de persil naturel , votre huile de persil va vous aider à combattre les tâches d’acnés, les vergetures,les entre cuisses noires et joues de fesses noires .<br>\r\n\r\n<b>Adapté pour tout type de peaux.</b><br>\r\nConseil d’utilisation: Appliquez votre huile le soir au coucher sur votre peau ou sur la partie ayant des imperfections en massant délicatement jusqu’à pénétration . Ne mélangez pas votre huile essentielle dans votre lait corporel de peur d’altérer le résultat .<br>\r\n<b>Composants:</b> extrait de persil pure , huile de coco pure .', 78, 45.66);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Descriptions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `idArticle`, `idUser`, `Descriptions`) VALUES
(21, 2, 2, 'zefze'),
(22, 2, 4, 'ergerg'),
(78, 2, 7, 'f');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `Designation`) VALUES
(1, 'Nos Savons'),
(2, 'Nos Gommages'),
(3, 'Nos Gammes de produits'),
(4, 'Nos Huiles essentielles');

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
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `avis` ADD FULLTEXT KEY `Descriptions` (`Descriptions`);
ALTER TABLE `avis` ADD FULLTEXT KEY `Descriptions_2` (`Descriptions`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
