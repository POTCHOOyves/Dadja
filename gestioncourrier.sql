-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 juil. 2024 à 14:21
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestioncourrier`
--

-- --------------------------------------------------------

--
-- Structure de la table `bordereaus`
--

DROP TABLE IF EXISTS `bordereaus`;
CREATE TABLE IF NOT EXISTS `bordereaus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `matriculeBordereau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCourrier` int NOT NULL,
  `nombreColis` int NOT NULL,
  `statut` int NOT NULL DEFAULT '1',
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poids` int NOT NULL,
  `frais` int NOT NULL,
  `idCharge` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `courriers`
--

DROP TABLE IF EXISTS `courriers`;
CREATE TABLE IF NOT EXISTS `courriers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `courtier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idVoieTrans` int DEFAULT NULL,
  `idTypeCourrier` int DEFAULT NULL,
  `numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heureEnregistrement` time NOT NULL,
  `dateEnvoi` date NOT NULL,
  `dateEnregistrement` date NOT NULL,
  `idCharge` int NOT NULL,
  `traitement` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombreColis` int DEFAULT NULL,
  `poids` int DEFAULT NULL,
  `frais` int DEFAULT NULL,
  `piece_jointe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinataire` int NOT NULL,
  `groupe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `virtuel` int NOT NULL DEFAULT '0',
  `reception` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Entrant',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courriers`
--

INSERT INTO `courriers` (`id`, `courtier`, `idVoieTrans`, `idTypeCourrier`, `numero`, `contenu`, `objet`, `heureEnregistrement`, `dateEnvoi`, `dateEnregistrement`, `idCharge`, `traitement`, `created_at`, `updated_at`, `nombreColis`, `poids`, `frais`, `piece_jointe`, `destinataire`, `groupe`, `virtuel`, `reception`) VALUES
(3, 'Gozem', 2, 2, '50-727909/07-2024', 'neant', 'Cadeau d\'anniversaire', '14:07:00', '2024-07-03', '2024-07-03', 1, 1, '2024-07-03 14:30:26', '2024-07-04 10:01:26', 2, 12, 50000, 'upload/8922.PNG', 1, 'groupe', 0, 'Entrant'),
(2, 'DHL TOGO', 2, 2, '32-298938/07-2024', 'neant', 'Test', '13:07:00', '2024-07-03', '2024-07-03', 1, 0, '2024-07-03 13:31:34', '2024-07-03 13:31:34', 1, 1, 2000, 'upload/3254.jpg', 1, 'Personne', 0, 'Entrant'),
(4, 'DONYOH ERIC', NULL, NULL, NULL, 'Test', 'test', '11:07:00', '2024-07-04', '2024-07-04', 1, 1, '2024-07-04 11:46:39', '2024-07-04 11:46:39', 0, 0, 0, NULL, 1, 'Personne', 1, 'courrier electronique'),
(7, 'DONYOH ERIC', NULL, NULL, NULL, 'NiceAdmin is a powerful admin and dashboard template based latest version of Bootstrap framework. It provides a clean and intuitive design that is focused on user experience. The custom plugins included has been carefully customized to fit with the overall look of the theme, working seamlessly across browsers, tablets and phones.', 'Facture paiement en ligne', '13:07:00', '2024-07-04', '2024-07-04', 1, 1, '2024-07-04 13:00:33', '2024-07-04 13:00:33', 0, 0, 0, 'upload/1950.pdf', 1, 'Personne', 1, 'courrier electronique');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

DROP TABLE IF EXISTS `departements`;
CREATE TABLE IF NOT EXISTS `departements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionDepartement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatDepartement` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `departement`, `descriptionDepartement`, `etatDepartement`, `created_at`, `updated_at`) VALUES
(1, 'Département Informatique', 'neant', 1, '2024-06-21 10:34:34', '2024-06-21 11:04:10');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_21_095205_create_departements_table', 2),
(6, '2024_06_21_120130_create_postes_table', 3),
(7, '2024_06_21_172227_create_typecourriers_table', 4),
(8, '2024_06_22_011614_create_voiestransmissions_table', 5),
(9, '2024_06_22_023013_create_courriers_table', 6),
(10, '2024_06_26_113102_create_bordereaus_table', 7);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

DROP TABLE IF EXISTS `postes`;
CREATE TABLE IF NOT EXISTS `postes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionPoste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatPoste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id`, `poste`, `departement`, `descriptionPoste`, `etatPoste`, `created_at`, `updated_at`) VALUES
(2, 'IT', '1', 'neant', '1', '2024-06-21 12:18:23', '2024-06-21 12:24:34');

-- --------------------------------------------------------

--
-- Structure de la table `typecourriers`
--

DROP TABLE IF EXISTS `typecourriers`;
CREATE TABLE IF NOT EXISTS `typecourriers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `typeCourrier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionCourrier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatCourrier` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typecourriers`
--

INSERT INTO `typecourriers` (`id`, `typeCourrier`, `descriptionCourrier`, `etatCourrier`, `created_at`, `updated_at`) VALUES
(2, 'Physique', 'neant', 1, '2024-06-22 00:59:56', '2024-06-22 01:04:03');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste` int NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `contact`, `typeUser`, `adresse`, `email`, `email_verified_at`, `etat`, `poste`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'DONYOH', 'ERIC', '+22892854521', 'Admin', 'Paris', 'sco.eric3@gmail.com', NULL, '1', 2, '$2y$10$DJcqzL8djLET3SBMf1cDhuSLGhirPNWCYi7.qV31G/f6wgp20jwTG', NULL, '2024-06-21 13:08:09', '2024-07-03 11:54:43');

-- --------------------------------------------------------

--
-- Structure de la table `voiestransmissions`
--

DROP TABLE IF EXISTS `voiestransmissions`;
CREATE TABLE IF NOT EXISTS `voiestransmissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `voietransmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionVt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatVt` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voiestransmissions`
--

INSERT INTO `voiestransmissions` (`id`, `voietransmission`, `descriptionVt`, `etatVt`, `created_at`, `updated_at`) VALUES
(2, 'Xpress', NULL, 1, '2024-06-22 01:56:34', '2024-06-22 01:56:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
