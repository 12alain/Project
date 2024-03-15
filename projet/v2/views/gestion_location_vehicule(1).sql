-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 08 oct. 2021 à 13:27
-- Version du serveur :  8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_location_vehicule`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int NOT NULL,
  `rue` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `numero_adresse` int NOT NULL,
  `pays` varchar(50) NOT NULL,
  `code_postal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `rue`, `ville`, `numero_adresse`, `pays`, `code_postal`) VALUES
(1, '15', 'hhhhh', 1, 'senegalg', 12400),
(2, '103', '  Rufisquew', 2, '  Senegalw', 12300),
(38, '30', 'saint_louis', 3, 'senegal', 12500),
(40, '30', 'Louga', 62176, 'senegal', 12500),
(41, '15', 'Rufisque', 7475, 'senegal', 12300),
(44, '89', 'Diamniadio', 23567, 'Senegal', 12301),
(45, '19', 'Diamniadiod', 13768, 'senegal', 12330),
(46, '89', 'Louga', 88637, 'Senegald', 12331),
(47, '19', 'saint_louis', 17319, 'senegal', 12301),
(50, '76', 'mbour', 77454, 'senegal', 12330),
(51, '10', ' Dakar', 40142, ' senegal', 12500),
(52, '18', 'Dakar', 77178, 'senegal', 12340),
(53, '103', 'Kedougou', 59760, 'Senegal', 12330),
(54, '10', 'Dakar', 3430, 'senegal', 12330),
(55, '9', 'Dakar', 50168, 'Senegal', 12500),
(56, '18', 'montreal', 27807, 'Canada', 10500),
(57, '10', ' Thies', 5583, 'senegal', 12500),
(58, '10', 'Dakar', 1336, 'senegal', 12300);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int NOT NULL,
  `nom_categorie` varchar(100) NOT NULL,
  `prix_location_jour` int NOT NULL,
  `prix_location_km` int NOT NULL,
  `caution` int NOT NULL,
  `etat` enum('normal','archiver','disponible','indisponible'), --CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `prix_location_jour`, `prix_location_km`, `caution`, `etat`) VALUES
(3, 'Berline', 12000, 200, 1200, 'normal'),
(4, 'monospace', 10000, 150, 1000, 'normal'),
(5, '4*4', 15000, 800, 2000, 'normal'),
(6, 'ludospace', 12500, 300, 1000, 'normal'),
(7, 'citerne', 20000, 1000, 5000, 'normal'),
(22, 'trucks', 1123, 11000, 300, 'normal');

-- --------------------------------------------------------

--
-- Structure de la table `conducteur`
--

CREATE TABLE `conducteur` (
  `id_conducteur` int NOT NULL,
  `nom_conducteur` varchar(50) NOT NULL,
  `prenom_conducteur` varchar(50) NOT NULL,
  `numero_conducteur` int NOT NULL,
  `telephone_conducteur` int NOT NULL,
  `id_adresse` int NOT NULL,
  `id_permis` int NOT NULL,
  `etat` enum('archiver','normal') NOT NULL,
  `nom_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conducteur`
--

INSERT INTO `conducteur` (`id_conducteur`, `nom_conducteur`, `prenom_conducteur`, `numero_conducteur`, `telephone_conducteur`, `id_adresse`, `id_permis`, `etat`, `nom_image`) VALUES
(1, 'driver2', 'driver2', 40, 776543412, 2, 3, 'normal', NULL),
(2, 'driver1', 'driiver1', 91386, 776543422, 40, 3, 'archiver', NULL),
(6, 'Diene', 'Ma awa', 28345, 774172598, 51, 2, 'normal', NULL),
(7, 'Ly wane', 'coudy', 93278, 778909876, 57, 3, 'archiver', 'woman-918583_1920.jpg'),
(8, 'Ndiaye', 'libasse', 20386, 765432312, 58, 3, 'archiver', 'entrepreneur-g56ce44eb8_1920.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id_etat` int NOT NULL,
  `nom_etat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id_etat`, `nom_etat`) VALUES
(1, 'en cours'),
(2, 'valider'),
(3, 'annuler'),
(4, 'louer'),
(5, 'terminer'),
(6, 'disponible'),
(7, 'indisponible'),
(8, 'archiver');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int NOT NULL,
  `nom_image` varchar(50) NOT NULL,
  `id_vehicule` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `nom_image`, `id_vehicule`) VALUES
(1, 'image1.jpg', 2),
(54, '280px-2008_Nissan_Rogue_SL.jpg', 14),
(55, 'nissan-1632591370.jpeg', 14),
(56, 'S0-modele--chevrolet-camaro-5-1632591370.jpg', 15),
(57, 'S0-modele--chevrolet-camaro-5-1632591370.jpg', 15),
(58, 'kia1.png', 16),
(59, 'kia2-1632591612.png', 16),
(61, '16552-renault-trucks-btr-478.jpg', 18),
(62, 'renault-trucks-t-4x2.jpg', 18),
(63, 'r1.jpeg', 19),
(64, 'r2.jpeg', 19),
(65, 'trucc.jpg', 3),
(66, 'trucc.jpg', 3),
(69, 'images2.png', 2),
(70, 'VW_Tiguan_2.0_TDI_front_20100801.jpg', 21),
(71, 'tg2.jpg', 21),
(72, 'txt_bmw-x6-2020-30.jpg', 22),
(73, 'bmw-x6-2020-26.jpg', 22),
(74, 'volvo.jpg', 23),
(75, 'vovo2.jpg', 23),
(79, '3061.jpeg', 26),
(80, '3062.jpeg', 26),
(81, 'woman-918583_1920.jpg', 27),
(82, 'volvo.jpg', 27),
(83, 'woman-918583_1920.jpg', 28),
(84, 'VW_Tiguan_2.0_TDI_front_20100801.jpg', 28),
(85, 'VW_Tiguan_2.0_TDI_front_20100801.jpg', 29),
(86, 'vovo2.jpg', 29),
(87, 'vovo2.jpg', 30),
(88, 'VW_Tiguan_2.0_TDI_front_20100801.jpg', 31),
(89, 'volvo.jpg', 31),
(90, 'VW_Tiguan_2.0_TDI_front_20100801.jpg', 32),
(91, 'vovo2.jpg', 32),
(92, 'woman-918583_1920.jpg', 33),
(93, 'volvo.jpg', 33),
(94, 'vovo2.jpg', 33),
(95, 'vovo2.jpg', 33),
(96, 'volvo.jpg', 33),
(97, 'vovo2.jpg', 33),
(98, 'vovo2.jpg', 33),
(99, 'vovo2.jpg', 34),
(100, 'volvo.jpg', 34),
(101, '', 0),
(102, '', 35),
(103, '', 35);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int NOT NULL,
  `nom_marque` varchar(100) NOT NULL,
  `etat` enum('normal','archiver') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`, `etat`) VALUES
(5, 'Mercedes', 'normal'),
(6, 'nissan', 'normal'),
(7, 'Chevrolet', 'normal'),
(8, 'Toyota', 'normal'),
(9, 'renault', 'normal'),
(10, 'Volkswagen', 'normal'),
(11, 'jwwjejw', 'normal'),
(12, 'kia kia', 'normal'),
(13, 'wolsvagen ', 'normal'),
(14, 'BMW', 'normal'),
(15, 'peugeot', 'normal'),
(16, 'Volvo ', 'normal');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `id_modele` int NOT NULL,
  `nom_modele` varchar(100) NOT NULL,
  `etat` enum('normal','archiver') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id_modele`, `nom_modele`, `etat`) VALUES
(1, 'benz', 'normal'),
(2, 'rogue', 'normal'),
(3, 'camaro', 'normal'),
(4, 'verso', 'normal'),
(5, 'Trucks Defense', 'normal'),
(6, 'Transporter', 'normal'),
(7, 'kia kia', 'normal'),
(8, 'model', 'normal'),
(9, 'benzd', 'normal'),
(10, 'benzww', 'normal'),
(11, 'rogue', 'normal'),
(12, 'X6', 'normal'),
(13, 'Tiguan', 'normal'),
(14, '306', 'normal'),
(15, 'vollvo FH', 'normal');

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE `mode_paiement` (
  `id_mode_paiement` int NOT NULL,
  `mode_paiement` enum('espece','cheque') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mode_paiement`
--

INSERT INTO `mode_paiement` (`id_mode_paiement`, `mode_paiement`) VALUES
(1, 'espece'),
(2, 'cheque');

-- --------------------------------------------------------

--
-- Structure de la table `option_vehicule`
--

CREATE TABLE `option_vehicule` (
  `id_option_vehicule` int NOT NULL,
  `nom_option_vehicule` varchar(100) NOT NULL,
  `etat` enum('normal','archiver') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `option_vehicule`
--

INSERT INTO `option_vehicule` (`id_option_vehicule`, `nom_option_vehicule`, `etat`) VALUES
(1, 'Toit ouvrant', 'normal'),
(2, 'Lecteur cd', 'normal'),
(3, 'Climatiseur', 'normal'),
(5, 'siege bebe', 'normal');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int NOT NULL,
  `montant_paiement` int NOT NULL,
  `id_reservation` int NOT NULL,
  `id_mode_paiement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id_paiement`, `montant_paiement`, `id_reservation`, `id_mode_paiement`) VALUES
(1, 1200, 11, 1),
(2, 1200, 11, 1),
(3, 1200, 11, 1),
(4, 1200, 11, 1),
(5, 1200, 11, 1),
(6, 1200, 6, 1),
(7, 5000, 3, 1),
(8, 1200, 12, 1),
(9, 1200, 14, 1),
(10, 1200, 15, 1),
(11, 5000, 16, 1),
(12, 5000, 16, 1),
(13, 5000, 16, 1),
(14, 5000, 16, 1),
(15, 5000, 17, 1),
(16, 300, 18, 1),
(17, 300, 19, 1),
(18, 300, 21, 1),
(19, 5000, 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

CREATE TABLE `permis` (
  `id_permis` int NOT NULL,
  `type_permis` enum('A','B','C','D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `permis`
--

INSERT INTO `permis` (`id_permis`, `type_permis`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int NOT NULL,
  `date_reservation` date DEFAULT NULL,
  `date_debut_location` datetime NOT NULL,
  `date_fin_location` datetime NOT NULL,
  `id_vehicule` int DEFAULT NULL,
  `id_user` int NOT NULL,
  `id_conducteur` int DEFAULT NULL,
  `kilometre_parcourus` int DEFAULT NULL,
  `date_retour_reel` datetime DEFAULT NULL,
  `id_modele` int NOT NULL,
  `id_marque` int NOT NULL,
  `id_categorie` int NOT NULL,
  `id_option_vehicule` int DEFAULT NULL,
  `id_etat` int NOT NULL,
  `id_type_vehicule` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_reservation`, `date_debut_location`, `date_fin_location`, `id_vehicule`, `id_user`, `id_conducteur`, `kilometre_parcourus`, `date_retour_reel`, `id_modele`, `id_marque`, `id_categorie`, `id_option_vehicule`, `id_etat`, `id_type_vehicule`) VALUES
(6, NULL, '2021-09-24 00:00:00', '2021-09-26 00:00:00', 12, 12, NULL, 12000, '2021-09-29 00:00:00', 1, 5, 3, NULL, 5, 2),
(9, NULL, '2021-09-29 00:00:00', '2021-09-30 00:00:00', 15, 2, NULL, NULL, NULL, 3, 7, 5, NULL, 3, 2),
(11, NULL, '2021-09-29 00:00:00', '2021-09-30 00:00:00', 2, 19, NULL, 12000, '2021-09-30 00:00:00', 1, 5, 3, NULL, 5, 2),
(12, NULL, '2021-09-29 00:00:00', '2021-10-08 00:00:00', 14, 13, NULL, NULL, NULL, 11, 6, 3, NULL, 3, 2),
(13, NULL, '2021-09-29 00:00:00', '2021-10-10 00:00:00', NULL, 13, NULL, NULL, NULL, 1, 5, 3, NULL, 3, 2),
(15, NULL, '2021-10-02 00:00:00', '2021-10-06 00:00:00', 2, 2, NULL, 12000, '2021-10-06 00:00:00', 1, 5, 3, NULL, 5, 2),
(17, NULL, '2021-10-07 00:00:00', '2021-10-08 00:00:00', 3, 2, 7, NULL, NULL, 5, 9, 7, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nom_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'GESTIONNAIRE'),
(2, 'CLIENT'),
(3, 'RESPONSABLE_RESERVATION');

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicule`
--

CREATE TABLE `type_vehicule` (
  `id_type_vehicule` int NOT NULL,
  `nom_type_vehicule` enum('camion','voiture') NOT NULL,
  `id_permis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_vehicule`
--

INSERT INTO `type_vehicule` (`id_type_vehicule`, `nom_type_vehicule`, `id_permis`) VALUES
(1, 'camion', 3),
(2, 'voiture', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `telephone_user` int NOT NULL,
  `fax_user` int NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `id_adresse` int NOT NULL,
  `id_role` int NOT NULL,
  `confirm_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `telephone_user`, `fax_user`, `password_user`, `id_adresse`, `id_role`, `confirm_password`) VALUES
(1, 'Mbaye', 'Libasse', 'gest1@gmail.com', 778900987, 9876, 'passer@123', 1, 1, 'passer@123'),
(2, 'Niass', 'Imame', 'client1@gmail.com', 778900787, 9786, 'passer@123', 2, 2, 'passer@123'),
(11, 'Ndiaye', 'libasse', 'libassse@gmail.com', 778098637, 7362671, 'passer@123', 38, 2, 'passer@123'),
(12, 'client2', 'client2', 'client2@gmail.com', 774172598, 33527, 'passer@123', 45, 2, 'passer@123'),
(13, 'Diop', 'libasse', 'libnjjs@gmail.com', 780987865, 87954, 'passer@123', 46, 2, 'passer@123'),
(14, 'mamadou', 'barro', 'barro@gmail.com', 778098633, 47081, 'passer@123', 47, 2, 'passer@123'),
(15, 'ibrahima', 'traore', 'ibrahima@gmail.com', 774172598, 73626732, 'passer@123', 50, 2, 'passer@123'),
(16, 'responsable', 'responsable', 'responsable@gmail.com', 778965432, 987699, 'passer@123', 41, 3, 'passer@123'),
(17, 'Diouf', 'Baye', 'diouf1@gmail.com', 778900987, 17716, 'passer@123', 52, 2, 'passer@123'),
(18, 'ndoye', 'ndoye', 'ndoye1@gmail.com', 774172598, 54185, 'passer@123', 53, 2, 'passer@123'),
(19, 'Ndiaye', 'Seynabou', 'ndiayee@gmail.com', 786542345, 41217213, 'passer@123', 54, 2, 'passer@123'),
(20, 'Mbaye Laye', 'Awa', 'awalaye@gmail.com', 776176019, 968, 'passer@123', 55, 2, 'passer@123'),
(21, 'Cissokho', 'Fatou', 'cissokhafa@gmail.com', 778098632, 40271, 'passer@123', 56, 2, 'passer@123');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int NOT NULL,
  `numero_vehicule` int NOT NULL,
  `immatriculation_vehicule` varchar(20) ,--CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kilometrage_vehicule` varchar(20) NOT NULL,
  `volume_m3` int DEFAULT NULL,
  `charge_maximale_kg` int DEFAULT NULL,
  `longueur` int DEFAULT NULL,
  `largeur` int DEFAULT NULL,
  `hauteur` int DEFAULT NULL,
  `id_categorie` int NOT NULL,
  `id_modele` int NOT NULL,
  `id_marque` int NOT NULL,
  `id_type_vehicule` int NOT NULL,
  `id_etat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `numero_vehicule`, `immatriculation_vehicule`, `kilometrage_vehicule`, `volume_m3`, `charge_maximale_kg`, `longueur`, `largeur`, `hauteur`, `id_categorie`, `id_modele`, `id_marque`, `id_type_vehicule`, `id_etat`) VALUES
(2, 1, 'DK-089-bh', '1200', NULL, NULL, NULL, NULL, NULL, 3, 1, 5, 2, 6),
(3, 2, 'DK-041-th', '1000', 16, 30, 5, 3, 3, 7, 5, 9, 1, 6),
(4, 3, 'DK-401-AC', '1200', NULL, NULL, NULL, NULL, NULL, 3, 8, 10, 2, 6),
(13, 4, 'DK-4010-AC', '1200', 20, 12000, 5, 3, 4, 7, 5, 9, 1, 8),
(14, 99005, 'HT-6998-FO', '12000', NULL, NULL, NULL, NULL, NULL, 3, 11, 6, 2, 6),
(15, 36294, 'VN-8351-YX', '12000', NULL, NULL, NULL, NULL, NULL, 5, 3, 7, 2, 6),
(16, 18833, 'NA-9198-LX', '12000', NULL, NULL, NULL, NULL, NULL, 4, 7, 12, 2, 6),
(18, 55780, 'GD-6529-YZ', '12000', 16, 30, 3, 5, 2, 22, 6, 9, 1, 6),
(19, 11586, 'RV-8045-MB', '12000', 15, 28, 3, 5, 2, 22, 5, 9, 1, 6),
(21, 54080, 'LF-6435-SN', '12000', NULL, NULL, NULL, NULL, NULL, 5, 13, 10, 2, 6),
(22, 92788, 'QR-2965-IW', '12000', NULL, NULL, NULL, NULL, NULL, 5, 12, 14, 2, 6),
(23, 67435, 'YL-1734-NF', '12000', 20, 36, 6, 5, 3, 22, 15, 16, 1, 6),
(26, 39301, 'EP-0821-BI', '12000', NULL, NULL, NULL, NULL, NULL, 4, 14, 15, 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_option_vehicule`
--

CREATE TABLE `vehicule_option_vehicule` (
  `id_option_vehicule` int NOT NULL,
  `id_vehicule` int NOT NULL,
  `id_vehicule_option_vehicule` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicule_option_vehicule`
--

INSERT INTO `vehicule_option_vehicule` (`id_option_vehicule`, `id_vehicule`, `id_vehicule_option_vehicule`) VALUES
(1, 2, 1),
(2, 2, 2),
(2, 3, 3),
(3, 3, 4),
(1, 14, 5),
(2, 14, 6),
(3, 14, 7),
(1, 15, 8),
(2, 15, 9),
(3, 15, 10),
(1, 16, 11),
(3, 16, 12),
(1, 21, 13),
(2, 21, 14),
(2, 26, 15),
(5, 26, 16),
(1, 27, 17),
(2, 27, 18),
(3, 27, 19),
(1, 28, 20),
(2, 28, 21),
(1, 29, 22),
(2, 29, 23),
(3, 30, 26),
(3, 31, 28),
(1, 32, 29),
(2, 32, 30),
(1, 33, 31),
(2, 33, 32),
(1, 33, 33),
(2, 33, 34),
(1, 34, 35),
(2, 34, 36),
(3, 34, 37),
(3, 35, 38),
(1, 35, 39),
(2, 35, 40);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `conducteur`
--
ALTER TABLE `conducteur`
  ADD PRIMARY KEY (`id_conducteur`),
  ADD KEY `id_adresse` (`id_adresse`),
  ADD KEY `id_permis` (`id_permis`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id_modele`);

--
-- Index pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  ADD PRIMARY KEY (`id_mode_paiement`);

--
-- Index pour la table `option_vehicule`
--
ALTER TABLE `option_vehicule`
  ADD PRIMARY KEY (`id_option_vehicule`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_reservation` (`id_reservation`),
  ADD KEY `id_mode_paiement` (`id_mode_paiement`);

--
-- Index pour la table `permis`
--
ALTER TABLE `permis`
  ADD PRIMARY KEY (`id_permis`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD UNIQUE KEY `id_conducteur` (`id_conducteur`),
  ADD KEY `id_vehicule` (`id_vehicule`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_modele` (`id_modele`),
  ADD KEY `id_marque` (`id_marque`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_option_vehicule` (`id_option_vehicule`),
  ADD KEY `id_etat` (`id_etat`),
  ADD KEY `id_type_vehicule` (`id_type_vehicule`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  ADD PRIMARY KEY (`id_type_vehicule`),
  ADD KEY `id_permis` (`id_permis`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_adresse` (`id_adresse`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD UNIQUE KEY `numero_vehicule` (`numero_vehicule`),
  ADD UNIQUE KEY `immatriculation_vehicule` (`immatriculation_vehicule`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_modele` (`id_modele`),
  ADD KEY `id_marque` (`id_marque`),
  ADD KEY `id_type_vehicule` (`id_type_vehicule`),
  ADD KEY `id_user` (`id_etat`);

--
-- Index pour la table `vehicule_option_vehicule`
--
ALTER TABLE `vehicule_option_vehicule`
  ADD PRIMARY KEY (`id_vehicule_option_vehicule`),
  ADD KEY `id_option_vehicule` (`id_option_vehicule`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `conducteur`
--
ALTER TABLE `conducteur`
  MODIFY `id_conducteur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id_etat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `id_modele` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  MODIFY `id_mode_paiement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `option_vehicule`
--
ALTER TABLE `option_vehicule`
  MODIFY `id_option_vehicule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `permis`
--
ALTER TABLE `permis`
  MODIFY `id_permis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  MODIFY `id_type_vehicule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `vehicule_option_vehicule`
--
ALTER TABLE `vehicule_option_vehicule`
  MODIFY `id_vehicule_option_vehicule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
