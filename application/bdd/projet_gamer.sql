-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 oct. 2020 à 07:31
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_gamer`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ID_Article` int(11) NOT NULL AUTO_INCREMENT,
  `Article_Title` varchar(255) NOT NULL,
  `Article_Descritption` text NOT NULL,
  `Article_Picture` varchar(255) NOT NULL,
  `Article_Score` int(11) DEFAULT NULL,
  `Article_Slug` double NOT NULL,
  `Article_CreateAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `Article_UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Article_DeleteAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ID_Categorie` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`),
  KEY `Articles_Categories_FK` (`ID_Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID_Categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID_Categorie`, `Categorie_Name`) VALUES
(1, 'Review');

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `ID_Commentary` int(11) NOT NULL AUTO_INCREMENT,
  `Commentary_Text` varchar(5) NOT NULL,
  `Commentary_CreateAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `Commentary_UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Commentary_DeleteAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ID_Article` int(11) DEFAULT NULL,
  `ID_User` int(11) NOT NULL,
  PRIMARY KEY (`ID_Commentary`),
  KEY `Commentary_Articles_FK` (`ID_Article`),
  KEY `Commentary_User0_FK` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_Role` int(11) NOT NULL AUTO_INCREMENT,
  `Role_Type` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`ID_Role`, `Role_Type`) VALUES
(1, 'USER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `User_Mail` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_UserName` varchar(255) NOT NULL,
  `User_Picture` varchar(255) NOT NULL,
  `User_Verification_Key` varchar(255) NULL,
  `User_CreateAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `User_DeleteAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `ID_Role` int(11) NOT NULL,
  PRIMARY KEY (`ID_User`),
  KEY `User_Role_FK` (`ID_Role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `userscore`
--

DROP TABLE IF EXISTS `userscore`;
CREATE TABLE IF NOT EXISTS `userscore` (
  `ID_UserScore` int(11) NOT NULL AUTO_INCREMENT,
  `UserScore_Score` int(11) DEFAULT NULL,
  `ID_Commentary` int(11) NOT NULL,
  PRIMARY KEY (`ID_UserScore`),
  UNIQUE KEY `UserScore_Commentary_AK` (`ID_Commentary`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_article`
--

DROP TABLE IF EXISTS `user_article`;
CREATE TABLE IF NOT EXISTS `user_article` (
  `ID_Article` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  PRIMARY KEY (`ID_Article`,`ID_User`),
  KEY `User_Article_User0_FK` (`ID_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_Categories_FK` FOREIGN KEY (`ID_Categorie`) REFERENCES `categories` (`ID_Categorie`);

--
-- Contraintes pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `Commentary_Articles_FK` FOREIGN KEY (`ID_Article`) REFERENCES `articles` (`ID_Article`),
  ADD CONSTRAINT `Commentary_User0_FK` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_Role_FK` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID_Role`);

--
-- Contraintes pour la table `userscore`
--
ALTER TABLE `userscore`
  ADD CONSTRAINT `UserScore_Commentary_FK` FOREIGN KEY (`ID_Commentary`) REFERENCES `commentary` (`ID_Commentary`);

--
-- Contraintes pour la table `user_article`
--
ALTER TABLE `user_article`
  ADD CONSTRAINT `User_Article_Articles_FK` FOREIGN KEY (`ID_Article`) REFERENCES `articles` (`ID_Article`),
  ADD CONSTRAINT `User_Article_User0_FK` FOREIGN KEY (`ID_User`) REFERENCES `user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
