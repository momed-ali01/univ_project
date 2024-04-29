-- default behavior;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

-- --------------------------------------------------------

-- Base de données :  udclubs_db
DROP DATABASE IF EXISTS `udclubs_db`;
CREATE DATABASE IF NOT EXISTS `udclubs_db`;
USE `udclubs_db`;

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin`  int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `mot_de_passe` varchar(25) DEFAULT NULL,
  PRIMARY KEY(`id_admin`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`nom`, `email`, `mot_de_passe`) 
VALUES
  ('Mohamed Chakkir', 'momed@gmail.com', 'momed'),
  ('Mohamed Soma', 'soma@gmail.com', 'somasam');


-- --------------------------------------------------------


--
-- Structure de la table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `id_club` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  PRIMARY KEY(`id_club`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table Clubs
--

INSERT INTO `clubs` (`nom`, `details`) 
VALUES
  ('Club de Théâtre', ''),
  ('Club de Débat', ''),
  ("Club de Jeu d'échecs", ''),
  ('Club de Culturel', ''),
  ('Club IT', '');

-- --------------------------------------------------------

--
-- Structure de la table Adhérent
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id_adh` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `mot_de_passe` varchar(25) DEFAULT NULL,
  `filiere` varchar(25) DEFAULT NULL,
  `id_club` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adh`),
  KEY `fk_clubs` (`id_club`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table Adhérent
--

INSERT INTO `adherent` (`nom`, `email`, `mot_de_passe`, `filiere`) 
VALUES
  ('Abdirahman Warsama', 'makaji@gmail.com', 'AXA', 'Informatique'),
  ('Mahad Amin', 'mahad@gmail.com', 'mahad', 'Informatique'),
  ('Mane Salah', 'mane@gmail.com', 'mane', 'Informatique'),
  ('Manar Adnan', 'manar@gmail.com', 'ranam', 'Informatique'),
  ('Moustpaha Aden', 'mousta@gmail.com', 'mousta', 'Informatique');

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
ADD CONSTRAINT `fk_clubs` FOREIGN KEY (`id_club`) REFERENCES `clubs` (`id_club`);