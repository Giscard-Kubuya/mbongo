-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 05 oct. 2020 à 13:59
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gis_money`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_ADMIN` int(11) NOT NULL,
  `CODE_ADMIN` varchar(255) NOT NULL,
  `CODE_PAYS` varchar(255) NOT NULL,
  `PRENOM_ADMIN` varchar(255) NOT NULL,
  `PSEUDO_ADMIN` varchar(255) NOT NULL,
  `NOM_ADMIN` varchar(255) NOT NULL,
  `MDP_ADMIN` varchar(255) NOT NULL,
  `EMAIL_ADMIN` varchar(255) NOT NULL,
  `MATRICULE_ADMIN` varchar(255) NOT NULL,
  `CREATED_ADMIN_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_PROFIL_ADMIN` int(11) NOT NULL,
  `SEXE_ADMIN` enum('Femme','Homme') NOT NULL,
  `DESCRIPTION_TACHE_ADMIN` varchar(255) DEFAULT NULL,
  `PHOTO_ADMIN` varchar(255) NOT NULL,
  `IS_ACTIF_ADMIN` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_ADMIN`, `CODE_ADMIN`, `CODE_PAYS`, `PRENOM_ADMIN`, `PSEUDO_ADMIN`, `NOM_ADMIN`, `MDP_ADMIN`, `EMAIL_ADMIN`, `MATRICULE_ADMIN`, `CREATED_ADMIN_AT`, `ID_PROFIL_ADMIN`, `SEXE_ADMIN`, `DESCRIPTION_TACHE_ADMIN`, `PHOTO_ADMIN`, `IS_ACTIF_ADMIN`) VALUES
(1, 'ADM1', 'COD', 'Giscard', 'Daniel', 'Kubuya', '3dae85c5acd44fa9a017195cda491c467d6d473f', 'gisdaniel@gmail.com', 'ADM1', '2020-08-09 10:19:32', 2, 'Homme', '', '', 9),
(11, 'admince3750569dee0fd4756f604c253e5090b60d9ebd', 'AUS', 'Kubuya', 'Guilainaaaaaa', '', '0d3e969cc29dbc9c74b637a21015d12aee017262', '', 'ADMIN_3', '2020-08-09 22:18:51', 4, 'Homme', 'a', '', 9);

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `ID_AGENT` int(11) NOT NULL,
  `CODE_AGENT` varchar(255) NOT NULL,
  `ADDED_BY_CODE` varchar(255) NOT NULL,
  `MODIFIED_BY_CODE` varchar(255) DEFAULT NULL,
  `CODE_PAYS_ALPHA3` varchar(10) NOT NULL,
  `VILLE` varchar(255) NOT NULL,
  `CODE_GUICHET` varchar(255) NOT NULL,
  `NOM_AGENT` varchar(255) DEFAULT NULL,
  `PRENOM_AGENT` varchar(255) NOT NULL,
  `PSEUDO_AGENT` varchar(255) NOT NULL,
  `MDP_AGENT` varchar(255) NOT NULL,
  `EMAIL_AGENT` varchar(255) NOT NULL,
  `SEXE_AGENT` enum('Femme','Homme') NOT NULL,
  `TELEPHONE` varchar(255) NOT NULL,
  `PHOTO_AGENT` varchar(255) DEFAULT NULL,
  `DESCRIPTION_TACHE_AGENT` varchar(255) DEFAULT NULL,
  `CREATED_AGENT_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MATRICULE_AGENT` text NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '3',
  `IS_ACTIF_AGENT` int(11) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`ID_AGENT`, `CODE_AGENT`, `ADDED_BY_CODE`, `MODIFIED_BY_CODE`, `CODE_PAYS_ALPHA3`, `VILLE`, `CODE_GUICHET`, `NOM_AGENT`, `PRENOM_AGENT`, `PSEUDO_AGENT`, `MDP_AGENT`, `EMAIL_AGENT`, `SEXE_AGENT`, `TELEPHONE`, `PHOTO_AGENT`, `DESCRIPTION_TACHE_AGENT`, `CREATED_AGENT_AT`, `MATRICULE_AGENT`, `STATUS`, `IS_ACTIF_AGENT`) VALUES
(13, 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'ADM1', NULL, 'COD', 'Bujumbura', '', NULL, 'Gloire', 'Lumoo', '$2y$10$VpxvU.WsPL36ab4xgH7GWuR123dNJV8lZqHzP047iFELdoXnJNudS', 'gloire@gmail.com', 'Homme', '+243 970 769 591', NULL, 'sds', '2020-09-08 10:14:28', 'AG_1', 3, 15);

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `ID_CHAT` int(11) NOT NULL,
  `CODE_CHAT` varchar(255) NOT NULL,
  `CODE_RX` varchar(255) NOT NULL,
  `CODE_TX` varchar(255) NOT NULL,
  `CONTENU_MSG` longtext NOT NULL,
  `DATE_TX` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SEEN` int(11) NOT NULL DEFAULT '7',
  `IS_ACTIF_MSG` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`ID_CHAT`, `CODE_CHAT`, `CODE_RX`, `CODE_TX`, `CONTENU_MSG`, `DATE_TX`, `SEEN`, `IS_ACTIF_MSG`) VALUES
(17, 'cht303f77c35eda9602f7923c4b45c8e9eeca01aa80', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'Hein', '2020-10-01 11:40:13', 9, 9),
(18, 'chtb07debf517bdf4b40bbe9e74e59fd62e65e5c0e2', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'yeah', '2020-10-01 11:40:32', 9, 9),
(19, 'chtc70333a4b3a4d91ac7d76e841d9305401d14ddec', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'Lov', '2020-10-01 11:41:11', 9, 9),
(20, 'cht90f691e4efd478ce1587ff5d8dde932a1aaa4e33', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'Lov ww', '2020-10-01 11:41:26', 9, 9),
(21, 'cht5e4d1c9d23abc3f1c35b7e556acfeb23fa4af127', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'km', '2020-10-01 11:41:31', 9, 9),
(22, 'cht654669703e77ea7bef9a204b8466b2e5a8d5fbe4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0000', '2020-10-01 11:41:43', 9, 9),
(23, 'cht62b7f6d138ef4c2c3a140d0b2bb7d2024627a420', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'hhhh', '2020-10-01 11:41:51', 9, 9),
(24, 'cht84d70d7ece5b6de8188f4fa34fd5dc87c387bd0a', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'c quoi le blem', '2020-10-01 18:15:00', 9, 9),
(25, 'chtca35f227ecb60ab9b201363faa40ff056600ae99', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'JE FINIS MOI', '2020-10-01 18:18:41', 9, 9),
(26, 'chta0771377de5d61612b0b0d9d7a6ea13468fe6d79', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'Apr ce test je termine', '2020-10-01 18:19:38', 9, 9),
(27, 'cht913225a27e30cadd35ffa1790a56530b90beda49', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'hello ici', '2020-10-01 18:53:35', 9, 9),
(28, 'cht41361db37e04c74f710aa6d9eabf6ed044132559', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'cool', '2020-10-01 19:05:37', 9, 9),
(29, 'cht50f31e7a637b65333ccea6af12a68edac32fee10', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'admin un soucis', '2020-10-02 15:18:54', 7, 9);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(11) NOT NULL,
  `CODE_CLIENT` varchar(255) NOT NULL,
  `CODE_PAYS_ALPHA3` varchar(10) DEFAULT NULL,
  `NOM_CLIENT` varchar(255) DEFAULT NULL,
  `PRENOM_CLIENT` varchar(255) NOT NULL,
  `PSEUDO_CLIENT` varchar(255) NOT NULL,
  `MDP_CLIENT` varchar(255) NOT NULL,
  `EMAIL_CLIENT` varchar(255) DEFAULT NULL,
  `MATRICULE_CLIENT` longtext NOT NULL,
  `SEXE_CLIENT` enum('Femme','Homme') NOT NULL,
  `PHOTO_CLIENT` varchar(255) DEFAULT NULL,
  `CREATED_CLIENT_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DELETED_BYCODE` varchar(255) DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '3',
  `IS_ACTIF_CLIENT` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `CODE_CLIENT`, `CODE_PAYS_ALPHA3`, `NOM_CLIENT`, `PRENOM_CLIENT`, `PSEUDO_CLIENT`, `MDP_CLIENT`, `EMAIL_CLIENT`, `MATRICULE_CLIENT`, `SEXE_CLIENT`, `PHOTO_CLIENT`, `CREATED_CLIENT_AT`, `DELETED_BYCODE`, `STATUS`, `IS_ACTIF_CLIENT`) VALUES
(12, 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'DEU', 'Echi', 'Kubuya', 'Micheline', '$2y$10$xjY.pA2WR6J3JKVoV6gEfOQJoIDg89UuDmQi6AKZ97OBQ.jG1NXrm', 'gis@gmail.com', 'KBY_ebTc-0_1', 'Femme', NULL, '2020-09-08 09:41:37', NULL, 3, 9),
(13, 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'BGR', 'Kubuya', 'Wabo', 'Mediane', '$2y$10$3xmMQQXSqDt6OphCp6M.Bels/jsCuEglyVP5MYa.RKpFeFMOwT7MO', '', 'KBY_kBOD-1_1', 'Femme', NULL, '2020-09-08 11:04:44', NULL, 3, 9),
(14, 'kbyb5de176471213303eb8cf8c48e05c5914b3ce847', NULL, NULL, 'Muisha', 'Gloire', '$2y$10$LRfhVGkghRH/vuh90wZud.fZ5XjMPbrx/tdNnKA4U6LOPhwTZjYbO', NULL, 'KBY_rAdo-2_1', 'Homme', NULL, '2020-09-10 14:08:04', NULL, 3, 9),
(15, 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', NULL, NULL, 'Cubaka', 'Alpha', '$2y$10$9mns.iewCP7VELEy/MCK/eZrNbnet4ZSXSjjQYlzsOQMu2IHTyc.O', NULL, 'KBY920_EHWP_3', 'Homme', NULL, '2020-09-10 14:13:57', NULL, 3, 9),
(16, 'kby8b403d5a2d8753a0717460081c0fbe2760422854', NULL, NULL, 'Fr', 'Oli', '$2y$10$ZP/gX9CNrksh1HG2tJKauuOdYqIu2nXtFDhwTSIgFfQ8Pr5JBre9m', NULL, 'KBY920_UBFV_4', 'Homme', NULL, '2020-09-13 18:54:37', NULL, 3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

CREATE TABLE `description` (
  `ID_DESCRIPTION` int(11) NOT NULL,
  `CODE_DESCRIPTION` varchar(255) NOT NULL,
  `CODE_TX` varchar(255) NOT NULL,
  `CODE_RX` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DATE_SENT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SEEN` int(11) NOT NULL DEFAULT '0',
  `IS_ACTIF_DESCRIPTION` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `description`
--

INSERT INTO `description` (`ID_DESCRIPTION`, `CODE_DESCRIPTION`, `CODE_TX`, `CODE_RX`, `DESCRIPTION`, `DATE_SENT`, `SEEN`, `IS_ACTIF_DESCRIPTION`) VALUES
(1, 'desc150eaec85a246ab4e1fc22e3dd25ffb297f32077', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'test pour toi Mediane', '2020-09-10 20:36:27', 7, 9),
(2, 'desc74304553515470aa249ea3753362dc26142e7aa3', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'autre', '2020-09-10 20:37:33', 7, 9),
(3, 'desccc84f27f78b51524a6494f6b996da9c5a0a66b9a', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'gfgf', '2020-09-10 21:46:37', 7, 9),
(4, 'desc528d1929176f34ba2c50de0ec41b1609c209437a', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'SWSW', '2020-09-10 22:17:03', 7, 9),
(5, 'descaa3e6d6246d932dc1608ecd72dfd1542009952db', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'ggf', '2020-09-10 22:27:01', 7, 9),
(6, 'desc1572d9d10207fa9560ff41cfb7ad89bd90312cc5', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'fdf', '2020-09-10 22:28:36', 7, 9),
(7, 'desced35329250406b83fddd353793d18b6ae58f0304', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', '1234', '2020-09-10 22:29:23', 7, 9),
(8, 'descb1feb2078e555db1e4cb753875b6a61999aff1c9', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'fd', '2020-09-10 22:29:57', 7, 9);

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `ID_DEVISE` int(11) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `ADDED_BY_CODE` varchar(255) NOT NULL,
  `MODIFIED_BY_CODE` varchar(255) DEFAULT NULL,
  `NOM_DEVISE` varchar(255) NOT NULL,
  `ABBR_DEVISE` varchar(50) NOT NULL,
  `CODE_PAYS` varchar(50) NOT NULL,
  `CREATED_DEVISE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_DEVISE` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devise`
--

INSERT INTO `devise` (`ID_DEVISE`, `CODE_DEVISE`, `ADDED_BY_CODE`, `MODIFIED_BY_CODE`, `NOM_DEVISE`, `ABBR_DEVISE`, `CODE_PAYS`, `CREATED_DEVISE_AT`, `IS_ACTIF_DEVISE`) VALUES
(4, 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 'ADM1', NULL, 'Franc Congolais', 'FC', 'COD', '2020-09-08 08:53:59', 9),
(5, 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 'ADM1', NULL, 'Franc Burundais', 'FB', 'BDI', '2020-09-08 09:00:11', 9),
(6, 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 'ADM1', NULL, 'Dollars', '$', 'USA', '2020-09-08 09:00:45', 9);

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `ID_GESTION` int(11) NOT NULL,
  `CODE_GESTION` varchar(255) NOT NULL,
  `CODE_COMPTE` varchar(255) NOT NULL,
  `STATUS` enum('Entente','Bloqué','Approuvé') NOT NULL DEFAULT 'Approuvé',
  `PIN` int(11) DEFAULT NULL,
  `DATE_CREATION` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_GESTION` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`ID_GESTION`, `CODE_GESTION`, `CODE_COMPTE`, `STATUS`, `PIN`, `DATE_CREATION`, `IS_ACTIF_GESTION`) VALUES
(1, 'ges94501027b336552e7925674b25289c2c06487dec', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'Approuvé', 1111, '2020-09-12 14:30:52', 9);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `ID_GROUPE` int(11) NOT NULL,
  `CODE_GROUPE` varchar(255) NOT NULL,
  `CODE_GESTION` varchar(255) NOT NULL,
  `TELEPHONE` varchar(255) NOT NULL,
  `NOM_GROUPE` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DATE_CREATION_GR` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_GROUPE` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`ID_GROUPE`, `CODE_GROUPE`, `CODE_GESTION`, `TELEPHONE`, `NOM_GROUPE`, `DESCRIPTION`, `DATE_CREATION_GR`, `IS_ACTIF_GROUPE`) VALUES
(1, 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'ges94501027b336552e7925674b25289c2c06487dec', '61493765', 'FONGOLAB 2020', 'Paiement des frais du module', '2020-09-12 14:33:41', 9);

-- --------------------------------------------------------

--
-- Structure de la table `guichet`
--

CREATE TABLE `guichet` (
  `ID_GUICHET` int(11) NOT NULL,
  `CODE_GUICHET` varchar(255) NOT NULL,
  `CODE_AGENT` varchar(255) NOT NULL,
  `ADDED_BY_CODE` varchar(255) NOT NULL,
  `CODE_PAYS_ALPHA3` varchar(255) NOT NULL,
  `NOM_GUICHET` varchar(255) NOT NULL,
  `ADDRESSE_GUI` text NOT NULL,
  `TELEPHONE_GUI` varchar(255) NOT NULL,
  `EMAIL_GUI` varchar(255) NOT NULL,
  `DESCRIPTION_GUI` text NOT NULL,
  `CREATED_GUICHET_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_GUICHET` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `guichet`
--

INSERT INTO `guichet` (`ID_GUICHET`, `CODE_GUICHET`, `CODE_AGENT`, `ADDED_BY_CODE`, `CODE_PAYS_ALPHA3`, `NOM_GUICHET`, `ADDRESSE_GUI`, `TELEPHONE_GUI`, `EMAIL_GUI`, `DESCRIPTION_GUI`, `CREATED_GUICHET_AT`, `IS_ACTIF_GUICHET`) VALUES
(8, 'gui3bdf7d2180b85be1ca6fcc8fac6d18a270f46073', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'ADM1', 'BDI', 'Ngagara', 'Bujumbura/Ngagara Q2', '61493765', 'ngagara@gmail.com', 'Prêt de HOPE AFRICA', '2020-09-08 10:25:35', 9);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `ID_MEMBER` int(11) NOT NULL,
  `CODE_MEMBER` varchar(255) NOT NULL,
  `CODE_GROUPE` varchar(255) NOT NULL,
  `CODE_COMPTE` varchar(255) NOT NULL,
  `POSITION` varchar(255) NOT NULL,
  `DESCRIPTION_MEMBRE` text NOT NULL,
  `DATE_CREATION` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_MEMBER` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`ID_MEMBER`, `CODE_MEMBER`, `CODE_GROUPE`, `CODE_COMPTE`, `POSITION`, `DESCRIPTION_MEMBRE`, `DATE_CREATION`, `IS_ACTIF_MEMBER`) VALUES
(1, 'mbr99e64abee0cb846dbb8cedfc49308921a331b88b', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'Stagiaire', 'Vs etes dans le groupe et tout ce qui consiste pqiement vs devez l effectier ici', '2020-09-12 14:36:48', 9);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `ID_MODULE` int(11) NOT NULL,
  `CODE_MODULE` varchar(255) NOT NULL,
  `CODE_GROUPE` varchar(255) NOT NULL,
  `NOM_MODULE` varchar(255) NOT NULL,
  `DESCRIPTION_MOD` text NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `PRIX_MODULE` float NOT NULL,
  `DATE_CREATION_MODULE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_MODULE` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`ID_MODULE`, `CODE_MODULE`, `CODE_GROUPE`, `NOM_MODULE`, `DESCRIPTION_MOD`, `CODE_DEVISE`, `PRIX_MODULE`, `DATE_CREATION_MODULE`, `IS_ACTIF_MODULE`) VALUES
(1, 'mod1ebdbad270b9e96d186e71ac570db17154141261', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'Paracetamol', 'JNN', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 20, '2020-09-12 14:42:28', 9),
(2, 'mod371d349361ed9f30cb19a81ad650bfc3324aba65', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'Gis', 'kk', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 20, '2020-09-12 14:46:30', 9),
(3, 'modb7044df6f70bf448a933989676d6391dd8e52e02', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'Jdjdj', 'Kdjdj', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 4000, '2020-09-12 14:55:53', 9),
(4, 'modb18f4c0beecd0acb4a20314b6eaf0fee9d76a65a', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'Test', 'payer en temps', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 200, '2020-10-02 15:25:31', 9);

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `ID_PAYEMENT` int(11) NOT NULL,
  `CODE_PAYEMENT` varchar(255) NOT NULL,
  `CODE_RX` varchar(255) DEFAULT NULL,
  `CODE_TX` varchar(255) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `MONTANT_TX` float NOT NULL,
  `MONTANT_RX` float NOT NULL,
  `NOMBRE_PAYEMENT` float NOT NULL,
  `DATE_PAYEMENT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_PAYEMENT` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`ID_PAYEMENT`, `CODE_PAYEMENT`, `CODE_RX`, `CODE_TX`, `CODE_DEVISE`, `MONTANT_TX`, `MONTANT_RX`, `NOMBRE_PAYEMENT`, `DATE_PAYEMENT`, `IS_ACTIF_PAYEMENT`) VALUES
(1, 'pmtde621e27b1c05665da78e809f4c7ced905629a31', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 10, 1, '2020-09-12 14:38:50', 9),
(2, 'pmtd0dfd777c0e034af4496257af2394a911d8d2245', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 10, 10, 1, '2020-10-02 15:39:44', 9),
(3, 'pmtd466074b6d0b4279ecbe4eac6772b7a9f2a42540', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'grp81c3b31957f3753c2683c7597c23c730d292f34c', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 20, 20, 1, '2020-10-02 15:44:53', 9);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `ID_PAYS` smallint(5) UNSIGNED NOT NULL,
  `CODE_TEL` int(11) NOT NULL,
  `CODE_PAYS_ALPHA2` varchar(2) NOT NULL,
  `CODE_PAYS_ALPHA3` varchar(3) NOT NULL,
  `NOM_EN_GB` varchar(45) NOT NULL,
  `NOM_FR_FR` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`ID_PAYS`, `CODE_TEL`, `CODE_PAYS_ALPHA2`, `CODE_PAYS_ALPHA3`, `NOM_EN_GB`, `NOM_FR_FR`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l\'Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d\'Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Côte d\'Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People\'s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L\'ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `pay_module`
--

CREATE TABLE `pay_module` (
  `ID_PAY` int(11) NOT NULL,
  `CODE_PAY` varchar(255) NOT NULL,
  `CODE_CLIENT` varchar(255) NOT NULL,
  `CODE_MODULE` varchar(255) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `MONTANT_TX` float NOT NULL,
  `DESCRIPTION_PAY` text NOT NULL,
  `DATE_PAY` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_PAY` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pay_module`
--

INSERT INTO `pay_module` (`ID_PAY`, `CODE_PAY`, `CODE_CLIENT`, `CODE_MODULE`, `CODE_DEVISE`, `MONTANT_TX`, `DESCRIPTION_PAY`, `DATE_PAY`, `IS_ACTIF_PAY`) VALUES
(1, 'paymtbc4a955fc710b2060535f27e905c842b57a6d343', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'mod371d349361ed9f30cb19a81ad650bfc3324aba65', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 'jh', '2020-09-20 15:17:22', 9);

-- --------------------------------------------------------

--
-- Structure de la table `profil_admin`
--

CREATE TABLE `profil_admin` (
  `ID_PROFIL_ADMIN` int(11) NOT NULL,
  `NOM_PROFIL` varchar(255) NOT NULL,
  `IS_ACTIF_PROFIL` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil_admin`
--

INSERT INTO `profil_admin` (`ID_PROFIL_ADMIN`, `NOM_PROFIL`, `IS_ACTIF_PROFIL`) VALUES
(1, 'Co-Administrateur Principal', 9),
(2, 'Administrateur Principal', 9),
(3, 'Administrateur Simple', 9),
(4, 'Co-Administrateur Simple', 9);

-- --------------------------------------------------------

--
-- Structure de la table `profil_agent`
--

CREATE TABLE `profil_agent` (
  `ID_PROFIL_AGENT` int(11) NOT NULL,
  `CODE_PROFIL_AGENT` varchar(255) NOT NULL,
  `ADDED_BY_CODE` varchar(255) NOT NULL,
  `NOM_PROFIL_AGENT` varchar(255) NOT NULL,
  `CREATED_AGENT_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_AGENT` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil_agent`
--

INSERT INTO `profil_agent` (`ID_PROFIL_AGENT`, `CODE_PROFIL_AGENT`, `ADDED_BY_CODE`, `NOM_PROFIL_AGENT`, `CREATED_AGENT_AT`, `IS_ACTIF_AGENT`) VALUES
(1, 'aa', 'sa', 'Revendeur', '2020-08-11 20:51:42', 9),
(2, 'ss', 'ss', 'Distrubuteur', '2020-08-11 20:51:42', 9);

-- --------------------------------------------------------

--
-- Structure de la table `rec_trans`
--

CREATE TABLE `rec_trans` (
  `ID_RT` int(11) NOT NULL,
  `CODE_RT` varchar(255) DEFAULT NULL,
  `CODE_RX` varchar(255) DEFAULT NULL,
  `CODE_TX` varchar(255) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `MONTANT_TX` float NOT NULL,
  `MONTANT_RX` float NOT NULL,
  `FRAIS_TX` float NOT NULL,
  `DATE_RT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_RT` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rec_trans`
--

INSERT INTO `rec_trans` (`ID_RT`, `CODE_RT`, `CODE_RX`, `CODE_TX`, `CODE_DEVISE`, `MONTANT_TX`, `MONTANT_RX`, `FRAIS_TX`, `DATE_RT`, `IS_ACTIF_RT`) VALUES
(1, 'trans315ac9e984eeff49885ec4e690623fe8d658f300', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 56, 55.328, 0.672, '2020-09-10 20:36:26', 9),
(2, 'trans552ea2d4bc86d1b6dc25953aa2715c8ba66b0c34', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 2, 1.98, 0.02, '2020-09-10 20:37:32', 9),
(3, 'transe3f27e944866526a7254c0936e6a05ea305fb370', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 21, 20.79, 0.21, '2020-09-10 21:46:36', 9),
(4, 'trans211108e1798991bbb24034ee3856e4d14d9b6655', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 56, 55.328, 0.672, '2020-09-10 22:17:03', 9),
(5, 'trans6f401f3ef5f126b0caa58a42cf5a58b470f010ae', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 1, 0.99, 0.01, '2020-09-10 22:27:01', 9),
(6, 'transfbfe33b7f7606c08c9c3cfba8bb67b8ee5e7ea15', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 9.9, 0.1, '2020-09-10 22:28:36', 9),
(7, 'trans576eadf3d0a62009e11c2b8146275478494335ac', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 9.9, 0.1, '2020-09-10 22:29:22', 9),
(8, 'trans4a50a2c565052fde845ce7f98ffbfd4a0f1c24f2', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 9.9, 0.1, '2020-09-10 22:29:56', 9);

-- --------------------------------------------------------

--
-- Structure de la table `rec_trans_systm`
--

CREATE TABLE `rec_trans_systm` (
  `ID_RT` int(11) NOT NULL,
  `CODE_RT` varchar(255) NOT NULL,
  `CODE_RX` varchar(255) NOT NULL,
  `CODE_TX` varchar(255) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `MONTANT_TX` float NOT NULL,
  `MONTANT_RX` float NOT NULL,
  `FRAIS_TX` float DEFAULT '0',
  `DATE_RT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_ADM` int(11) NOT NULL DEFAULT '10',
  `IS_ACTIF_RT` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rec_trans_systm`
--

INSERT INTO `rec_trans_systm` (`ID_RT`, `CODE_RT`, `CODE_RX`, `CODE_TX`, `CODE_DEVISE`, `MONTANT_TX`, `MONTANT_RX`, `FRAIS_TX`, `DATE_RT`, `IS_ACTIF_ADM`, `IS_ACTIF_RT`) VALUES
(126, 'trsyst61ac77ad0ef8ffab1f3fc925b1eea506d997d97f', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'ADM1', 'Devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 15000, 15000, 0, '2020-09-08 09:28:58', 10, 9),
(127, 'trsyst865e9d8e71fb1fd0ff98ce6b15654fb63072cc3b', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'ADM1', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 15000, 15000, 0, '2020-09-08 09:37:25', 10, 9),
(128, 'trsystb77d18d5d285c48309ae4c5205a661399bfda2c8', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'ADM1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 15000, 15000, 0, '2020-09-08 09:37:41', 10, 9),
(129, 'trsyst02d4bc4862b374a281f6005a914e097af4889951', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'ADM1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 15000, 15000, 0, '2020-09-08 09:37:54', 10, 9),
(130, 'trsystf92644748dfbe1dbb648ff22d824b2c2fb3a31e1', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'ADM1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 15000, 15000, 0, '2020-09-08 09:38:49', 10, 9),
(131, 'transysag92a128cb042083fd3847bda6fd5b6c6b9736fb1a', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 400, 392.8, 7.2, '2020-09-08 10:30:55', 10, 9),
(132, 'transysagecac53970481c41397bfb84a325cc88a6a41b5e82', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 100, 98.2, 1.8, '2020-09-08 10:51:49', 10, 9),
(133, 'transysag9bafa73b91ed0e876c8b5d1fc180c62570771cb2', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 10, 0, '2020-09-08 10:55:11', 10, 9),
(134, 'transysag7db63da8d70c38005569afd8b98bfdc5737ce4b4', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 10, 0, '2020-09-08 11:01:48', 10, 9),
(135, 'transysagee75c7161b7cc4530d08fec67639784d6e6449a13', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 100, 98.2, 1.8, '2020-09-08 11:05:47', 10, 9),
(136, 'transysag623eb74d7b48e8fa34888a617507858b97d9b253', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 400, 392.8, 7.2, '2020-09-09 21:58:40', 10, 9),
(137, 'tranSysc82f07a56a1ed22b7c00a324b287dbfa0f543014', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 10, 0, '2020-09-10 10:54:11', 10, 9),
(138, 'transysag125ea551a5edff76aac164ee5199cc98174ba502', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 20, 20, 0, '2020-09-10 14:51:20', 10, 9),
(139, 'transysag797dfe779a8f82aaa9f21681a092b8bd75cbd9e6', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 400, 392.8, 7.2, '2020-09-10 14:52:36', 10, 9),
(140, 'transysag21dad5766414bff7323d88f24f5ac49eace17f85', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 10, 9.9, 0.1, '2020-09-10 15:22:09', 10, 9),
(141, 'transysag8f2a5d7a90d3d8a16b51d9abefe4ee72de05a1a1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 10, 9.9, 0.1, '2020-09-10 15:36:31', 10, 9),
(142, 'transysag0846c83f5ee1384d998ab358db8677e05d310eb8', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 11, 10.89, 0.11, '2020-09-10 15:55:07', 10, 9),
(143, 'transysag685374838591fe40f1fe527b96cf580e737c1ae6', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 56, 55.328, 0.672, '2020-09-10 16:08:16', 10, 9),
(144, 'transysagab4f97b2d75ef8a62cf1c35d5cf8485ca20940c1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 56, 55.328, 0.672, '2020-09-10 16:09:30', 10, 9),
(145, 'transysag8bcd9bfedd2169d5e4bc4b4838592ced879ad0cf', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 56, 55.328, 0.672, '2020-09-10 16:10:28', 10, 9),
(146, 'transysage5bc9d01daa207302c3f1ac9674f7c46b771f585b', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 100, 98.2, 1.8, '2020-09-10 16:13:40', 10, 9),
(147, 'transysag181f5e9824e57acd21e5925bd2755d7b2ce2922a', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 10, 9.9, 0.1, '2020-09-10 16:39:57', 10, 9),
(148, 'transysag646202da59f83db5a4c1d5192bbcb746e5c2ab8d', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 9.9, 0.1, '2020-09-10 16:40:14', 10, 9),
(149, 'transysagedb80566a78bfb3c133846df33fe96a7f9443099', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 20, 20, 0, '2020-09-10 16:46:36', 10, 9),
(150, 'transysag92fea3d25b4f3a28fb4363a12af60bcd907efe2c', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 9.9, 0.1, '2020-09-10 19:03:14', 10, 9),
(151, 'tranSys4397cde6ffd61ed3d91b74d482dc68d5aa174ce2', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 10, 10, 0, '2020-09-10 19:04:53', 10, 9),
(152, 'transysaga96dc2a5ccd72f9cc24909656a3b111246b4feda', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 100, 98.2, 1.8, '2020-09-10 22:46:50', 10, 9),
(153, 'transysagf100f74fb08c9781786c15a7cc85047be573108f', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 50, 49.4, 0.6, '2020-09-10 22:47:15', 10, 9),
(154, 'transysage750c12a74e507424d29ba242521afe3ce569a9f6', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 100, 98.2, 1.8, '2020-09-10 22:48:02', 10, 9),
(155, 'transysagc2fb1fddb0fb8cbcbdf799b34352c0f30b75d9ec', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 10, 10, 0, '2020-09-12 14:12:07', 10, 9),
(156, 'transysage9899262de106400e2397d074d93af2922ca8a742', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 100, 98.2, 1.8, '2020-09-12 18:29:55', 10, 9),
(157, 'transysage68bf6e2b51df9c7d76da3e7d19037784b118360f', 'kby8b403d5a2d8753a0717460081c0fbe2760422854', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 400, 392.8, 7.2, '2020-09-13 19:00:02', 10, 9),
(158, 'transysag8fbbcff5996edc17bf680969645cf7509d756682', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 40, 40, 0, '2020-09-14 16:26:11', 10, 9),
(159, 'transysag4eb8d5f0beb81cd9b99c7d00efd68e15c608211a', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 30, 30, 0, '2020-09-14 16:26:39', 10, 9),
(160, 'transysagfff3e5603e75991eaafbe0ad632d02703e91d188', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 40, 40, 0, '2020-09-14 16:31:21', 10, 9),
(161, 'transysag0b93621d005a4cd1a4966c49704ae549a58ef8b8', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 40, 40, 0, '2020-09-14 16:34:09', 10, 9),
(162, 'transysag9bf55e9468fc9fd12b410a873649b45df0b3ba2c', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 40, 40, 0, '2020-09-14 16:34:37', 10, 9),
(163, 'tranSys9a135e4cd2af1e4d44be9c963cf8b72d925e8376', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 40, 40, 0, '2020-09-19 21:47:19', 10, 9),
(164, 'tranSysf1add82f4c162e1d47c9bf9c2caaa58669982af0', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 3, 3, 0, '2020-09-19 21:48:01', 10, 9);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `CODE_ROLE` varchar(255) NOT NULL,
  `CODE_GROUPE` varchar(255) NOT NULL,
  `NOM_ROLE` varchar(255) NOT NULL,
  `IS_ACTIF_ROLE` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `solde`
--

CREATE TABLE `solde` (
  `ID_SOLDE` int(11) NOT NULL,
  `CODE_SOLDE` varchar(255) NOT NULL,
  `CODE_CLIENT` varchar(255) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `MONTANT_SOLDE` float NOT NULL DEFAULT '0',
  `LAST_UPDATE_SOLDE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LAST_CHECK_AT` datetime DEFAULT NULL,
  `IS_ACTIF_SOLDE` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `solde`
--

INSERT INTO `solde` (`ID_SOLDE`, `CODE_SOLDE`, `CODE_CLIENT`, `CODE_DEVISE`, `MONTANT_SOLDE`, `LAST_UPDATE_SOLDE_AT`, `LAST_CHECK_AT`, `IS_ACTIF_SOLDE`) VALUES
(34, 'sld66e1a4c823c18814fec4fe3d716f69ee1cddee60', 'kby758b8b0f190958b3551c5256b2377374b720e7a2', 'dev2cf5fdb48ffd1352f7858d8fce254038feddd37c', 16.8, '2020-09-07 08:31:57', NULL, 9),
(35, 'sldclt5eebf27aa64a86cd995de6acece5203d017c2e18', 'kby758b8b0f190958b3551c5256b2377374b720e7a2', 'dev9e4b89c2ee39c7895375a83555754cf45ba96e05', 9.9, '2020-09-07 11:01:50', NULL, 9),
(36, 'sldclt1aa543e42397e7e3aed17e0cd8973d38bbe3222c', 'kbyd643dec11bc0801d2c86fe940619f3e0060ed9f7', 'devdc6123b41276f36702b2eea2206c0f2f8756a257', 43.328, '2020-09-07 11:43:51', NULL, 9),
(37, 'sldclte65b5e8b3935760e46e3792a3af2bcd23be9f55b', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 37.9, '2020-10-02 15:44:53', NULL, 9),
(38, 'sldclt0770173d6f956b3cb291397a49f695d8cd991f91', 'kby68250ec9738c976f8b793b963e9bc8f7b7dea822', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 166.298, '2020-09-10 21:46:36', NULL, 9),
(39, 'sldclt700d767b89d513537fb6255867f0d6b8d6bfd819', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 15.518, '2020-10-02 15:44:53', NULL, 9),
(40, 'sldcltc714f921129d5a0b5e1c958f4c4e1ac419c37d8c', 'kbydaf6f7d18cc1c7a33903c81c605f0eb48242c742', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 98.2, '2020-09-10 22:48:02', NULL, 9),
(41, 'sldclt624c04f711bb5ae0f8fdbb0fc216a8c72ba0e8cf', 'kbydc943232f12f5ea8b8daa2c429f497ca688a81d4', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 98.2, '2020-09-12 18:29:55', NULL, 9),
(42, 'sldcltf429b6a081f4cbee605d832fbf5dad852032ee11', 'kby8b403d5a2d8753a0717460081c0fbe2760422854', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 392.8, '2020-09-13 19:00:02', NULL, 9);

-- --------------------------------------------------------

--
-- Structure de la table `solde_system`
--

CREATE TABLE `solde_system` (
  `ID_SOLDE` int(11) NOT NULL,
  `CODE_SOLDE` varchar(255) NOT NULL,
  `CODE_CLIENT` varchar(255) NOT NULL,
  `CODE_DEVISE` varchar(255) NOT NULL,
  `MONTANT_SOLDE` float NOT NULL DEFAULT '0',
  `LAST_UPDATE_SOLDE_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ACTIF_SOLDE` int(11) NOT NULL DEFAULT '11'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `solde_system`
--

INSERT INTO `solde_system` (`ID_SOLDE`, `CODE_SOLDE`, `CODE_CLIENT`, `CODE_DEVISE`, `MONTANT_SOLDE`, `LAST_UPDATE_SOLDE_AT`, `IS_ACTIF_SOLDE`) VALUES
(42, 'dev5eb3ce6e9e3aa9174cf1ba3d6beb83c41e1aa9b7', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 14506.6, '2020-09-10 16:10:28', 10),
(43, 'devb9f468d4939dcb5f3ee70f23331be5a50dd07fae', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 14583.1, '2020-09-10 22:29:57', 10),
(45, 'dev818f76d3f9b7ba2561ff9c754d19559ddb476bd0', '0ur5haO4Zdg7eaIYAgnz7Ix2xIFmilT5uWUnUL8IjnjRMBiKOE0WJZJCypKHfx2PMelyLp0qcfVAURTQEAaWumb64wrCnk8q94sF2owkkchjzvuMi1Rv5qiuptsbDNQQ3qmUpGdwV1BA46dG59FdyPftPN2579oUnRYHjfk80zE9GONTxJlHqliyYGo3wDy9TMcZ4GtVBgvVXzbOjKI8RrEZoFL3mhpgN6cvC8ewYvSe3BHzDCWL2SO1F1', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 13854.3, '2020-09-14 16:34:37', 10),
(46, 'sld6c9b56989d63dba70b5970b363974d04d28e40e6', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbfd9f4509f1810655f36cd99584d92167dfc2722', 826.218, '2020-09-19 21:48:01', 11),
(47, 'sld8683edc3beeab85c6bf900d38261d255e4a41f25', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'dev7feb87651a2155b004f198d8f1803144de7b0dd1', 282.79, '2020-09-14 16:34:37', 11),
(48, 'sld2b73f6e482ed492f27b5eba937d46f6e01eb443e', 'agtc2e001db4374d28245085e985d30ee5bfde89e98', 'devbdcf1619e1ba1ea3b6aa72981741e8b2dce1f52b', 12.456, '2020-09-12 18:29:55', 11);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD KEY `CODE_ADMIN` (`CODE_ADMIN`),
  ADD KEY `CODE_PROFIL_ADMIN` (`ID_PROFIL_ADMIN`),
  ADD KEY `ID_PROFIL_ADMIN` (`ID_PROFIL_ADMIN`),
  ADD KEY `administrateur_ibfk_1` (`CODE_PAYS`);

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`ID_AGENT`),
  ADD KEY `CODE_AGENT` (`CODE_AGENT`),
  ADD KEY `CODE_PAYS_ALPHA3` (`CODE_PAYS_ALPHA3`),
  ADD KEY `CODE_GUICHET` (`CODE_GUICHET`),
  ADD KEY `agent_ibfk_1` (`ADDED_BY_CODE`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID_CHAT`),
  ADD KEY `CODE_CLIENT` (`CODE_TX`),
  ADD KEY `CODE_RX` (`CODE_RX`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`),
  ADD KEY `CODE_CLIENT` (`CODE_CLIENT`),
  ADD KEY `CODE_PAYS_ALPHA3` (`CODE_PAYS_ALPHA3`);

--
-- Index pour la table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`ID_DESCRIPTION`),
  ADD KEY `CODE_TX` (`CODE_TX`),
  ADD KEY `CODE_RX` (`CODE_RX`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`ID_DEVISE`),
  ADD KEY `ADDED_BY_CODE` (`ADDED_BY_CODE`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`);

--
-- Index pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`ID_GESTION`),
  ADD UNIQUE KEY `CODE_GESTION_2` (`CODE_GESTION`),
  ADD UNIQUE KEY `PIN` (`PIN`),
  ADD KEY `CODE_GESTION` (`CODE_GESTION`),
  ADD KEY `CODE_COMPTE` (`CODE_COMPTE`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`ID_GROUPE`),
  ADD KEY `CODE_GESTION` (`CODE_GESTION`),
  ADD KEY `CODE_GROUPE` (`CODE_GROUPE`),
  ADD KEY `CREATED_BY` (`TELEPHONE`);

--
-- Index pour la table `guichet`
--
ALTER TABLE `guichet`
  ADD PRIMARY KEY (`ID_GUICHET`),
  ADD KEY `CODE_GUICHET` (`CODE_GUICHET`),
  ADD KEY `ADDED_BY_CODE` (`ADDED_BY_CODE`),
  ADD KEY `CODE_PAYS_ALPHA3` (`CODE_PAYS_ALPHA3`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID_MEMBER`),
  ADD KEY `CODE_GROUPE` (`CODE_GROUPE`),
  ADD KEY `CODE_COMPTE` (`CODE_COMPTE`),
  ADD KEY `ROLE_MEMBER` (`POSITION`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`ID_MODULE`),
  ADD KEY `CODE_GROUPE` (`CODE_GROUPE`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`ID_PAYEMENT`),
  ADD KEY `CODE_TX` (`CODE_TX`,`CODE_RX`),
  ADD KEY `CODE_RT` (`CODE_PAYEMENT`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`),
  ADD KEY `rec_trans_ibfk_3` (`CODE_RX`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`ID_PAYS`),
  ADD UNIQUE KEY `alpha2` (`CODE_PAYS_ALPHA2`),
  ADD UNIQUE KEY `alpha3` (`CODE_PAYS_ALPHA3`),
  ADD UNIQUE KEY `code_unique` (`CODE_TEL`),
  ADD KEY `CODE_PAYS_ALPHA3` (`CODE_PAYS_ALPHA3`);

--
-- Index pour la table `pay_module`
--
ALTER TABLE `pay_module`
  ADD PRIMARY KEY (`ID_PAY`),
  ADD KEY `CODE_CLIENT` (`CODE_CLIENT`),
  ADD KEY `CODE_GROUPE` (`CODE_MODULE`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`);

--
-- Index pour la table `profil_admin`
--
ALTER TABLE `profil_admin`
  ADD PRIMARY KEY (`ID_PROFIL_ADMIN`);

--
-- Index pour la table `profil_agent`
--
ALTER TABLE `profil_agent`
  ADD PRIMARY KEY (`ID_PROFIL_AGENT`),
  ADD KEY `CODE_PROFIL_AGENT` (`CODE_PROFIL_AGENT`,`ADDED_BY_CODE`);

--
-- Index pour la table `rec_trans`
--
ALTER TABLE `rec_trans`
  ADD PRIMARY KEY (`ID_RT`),
  ADD KEY `CODE_TX` (`CODE_TX`,`CODE_RX`),
  ADD KEY `CODE_RT` (`CODE_RT`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`),
  ADD KEY `rec_trans_ibfk_3` (`CODE_RX`);

--
-- Index pour la table `rec_trans_systm`
--
ALTER TABLE `rec_trans_systm`
  ADD PRIMARY KEY (`ID_RT`),
  ADD KEY `CODE_TX` (`CODE_TX`,`CODE_RX`),
  ADD KEY `CODE_RT` (`CODE_RT`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`),
  ADD KEY `CODE_RX` (`CODE_RX`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`),
  ADD KEY `CODE_GROUPE` (`CODE_GROUPE`);

--
-- Index pour la table `solde`
--
ALTER TABLE `solde`
  ADD PRIMARY KEY (`ID_SOLDE`),
  ADD KEY `CODE_CLIENT` (`CODE_CLIENT`),
  ADD KEY `CODE_SOLDE` (`CODE_SOLDE`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`);

--
-- Index pour la table `solde_system`
--
ALTER TABLE `solde_system`
  ADD PRIMARY KEY (`ID_SOLDE`),
  ADD KEY `CODE_CLIENT` (`CODE_CLIENT`),
  ADD KEY `CODE_SOLDE` (`CODE_SOLDE`),
  ADD KEY `CODE_DEVISE` (`CODE_DEVISE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `ID_AGENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID_CHAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `description`
--
ALTER TABLE `description`
  MODIFY `ID_DESCRIPTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `ID_DEVISE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `ID_GESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `ID_GROUPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `guichet`
--
ALTER TABLE `guichet`
  MODIFY `ID_GUICHET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `ID_MEMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `ID_MODULE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `ID_PAYEMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `ID_PAYS` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT pour la table `pay_module`
--
ALTER TABLE `pay_module`
  MODIFY `ID_PAY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `profil_admin`
--
ALTER TABLE `profil_admin`
  MODIFY `ID_PROFIL_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `profil_agent`
--
ALTER TABLE `profil_agent`
  MODIFY `ID_PROFIL_AGENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rec_trans`
--
ALTER TABLE `rec_trans`
  MODIFY `ID_RT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `rec_trans_systm`
--
ALTER TABLE `rec_trans_systm`
  MODIFY `ID_RT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `solde`
--
ALTER TABLE `solde`
  MODIFY `ID_SOLDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `solde_system`
--
ALTER TABLE `solde_system`
  MODIFY `ID_SOLDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_2` FOREIGN KEY (`ID_PROFIL_ADMIN`) REFERENCES `profil_admin` (`ID_PROFIL_ADMIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`CODE_PAYS_ALPHA3`) REFERENCES `pays` (`CODE_PAYS_ALPHA3`);

--
-- Contraintes pour la table `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`CODE_RX`) REFERENCES `client` (`CODE_CLIENT`),
  ADD CONSTRAINT `description_ibfk_2` FOREIGN KEY (`CODE_TX`) REFERENCES `client` (`CODE_CLIENT`);

--
-- Contraintes pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD CONSTRAINT `gestionnaire_ibfk_1` FOREIGN KEY (`CODE_COMPTE`) REFERENCES `client` (`CODE_CLIENT`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`CODE_GESTION`) REFERENCES `gestionnaire` (`CODE_GESTION`);

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`CODE_COMPTE`) REFERENCES `client` (`CODE_CLIENT`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`CODE_GROUPE`) REFERENCES `groupe` (`CODE_GROUPE`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`CODE_TX`) REFERENCES `members` (`CODE_GROUPE`);

--
-- Contraintes pour la table `rec_trans`
--
ALTER TABLE `rec_trans`
  ADD CONSTRAINT `rec_trans_ibfk_3` FOREIGN KEY (`CODE_RX`) REFERENCES `client` (`CODE_CLIENT`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`CODE_GROUPE`) REFERENCES `groupe` (`CODE_GROUPE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
