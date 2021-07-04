-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 04 juil. 2021 à 20:29
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tournoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `email`, `mot_de_passe`) VALUES
(1, 'amirhermi@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `platforme_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `nom`, `platforme_id`) VALUES
(1, 'Valorant', 2),
(3, 'COD Warzone -- PC', 2),
(4, 'COD Warzon -- PS4', 1),
(5, 'COD Warzon -- XBOX', 3),
(6, 'Fortnite -- PC', 2),
(7, 'Fortnite -- PS4', 1),
(8, 'Free Fire -- MOBILE', 4),
(9, 'Clash Royale -- MOBILE', 4),
(10, 'PUBG -- MOBILE', 4),
(11, 'PUBG -- PC', 2),
(12, 'Fifa 21 -- XBOX', 3),
(13, 'Fifa 21 -- PS4', 1),
(14, 'Apex Legends -- PS4', 1),
(15, 'Apex Legends -- XBOX', 3),
(16, 'Apex Legends -- PC', 2);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2021_02_11_111022_create_sessions_table', 1),
(12, '2021_02_11_111538_create_admins_table', 1),
(13, '2021_02_11_121205_create_platformes_table', 1),
(14, '2021_02_11_121324_create_games_table', 1),
(15, '2021_02_11_121446_create_tournois_table', 1),
(16, '2021_02_11_121552_create_participations_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participations`
--

CREATE TABLE `participations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tournoi` bigint(20) UNSIGNED NOT NULL,
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `participations`
--

INSERT INTO `participations` (`id`, `id_tournoi`, `id_utilisateur`) VALUES
(12, 6, 21),
(14, 7, 20);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `platformes`
--

CREATE TABLE `platformes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platforme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `platformes`
--

INSERT INTO `platformes` (`id`, `platforme`) VALUES
(1, 'ps4'),
(2, 'pc'),
(3, 'xbox'),
(4, 'mobile');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tournois`
--

CREATE TABLE `tournois` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recompense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_game` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tournois`
--

INSERT INTO `tournois` (`id`, `nom`, `image`, `type`, `description`, `recompense`, `date_debut`, `date_fin`, `id_game`, `created_at`, `updated_at`) VALUES
(5, 'Fortnite Tournament', 'storage/photos/161338900614br-consoles-1920x1080-wlogo-1920x1080-432974386.jpg', 'Solo', 'This event has cash prizes and is only available for Champion League players. This tournament occurs across one round, so make it count!', '100$', '2021-02-15', '2021-02-19', 6, '2021-02-15 10:36:46', '2021-02-15 10:36:46'),
(6, 'COD Tournament', 'storage/post/1613482050COD_warzone_main.jpg', 'Solo', 'aaaa aaa aaa aaa', '100$', '2021-02-15', '2021-02-20', 5, '2021-02-15 10:47:53', '2021-02-16 12:27:30'),
(7, 'fifa 21 xbox', 'storage/photos/1613389992eaplay-socialpost-spotlight-fifa21-16x9.png.adapt.crop191x100.628p.png', 'solo', 'FIFA 21 is a football simulation video game published by Electronic Arts as part of the FIFA series. It is the 28th installment in the FIFA series,', '100$', '2021-02-15', '2021-02-19', 12, '2021-02-15 10:53:12', '2021-02-15 10:53:12'),
(10, 'Valorant Tournament', 'storage/photos/1613483007VALORANT.jpg', 'Squad', 'Blend your style and experience on a global, competitive stage. You have 13 rounds to attack and defend your side using sharp gunplay and tactical abilities. And, with one life per-round,', '100$', '2021-02-16', '2021-02-20', 1, '2021-02-16 12:43:27', '2021-02-16 12:43:27'),
(13, 'Free fire Tournament', 'storage/photos/1615234612COD_warzone_main.jpg', 'solo', 'kjhdz zkjdn szbhde fekhfr rkjf krfrfkjr jfrkjfr fjrjfbrfbh edehjdbed ekjhfbe', '50$', '2021-03-08', '2021-03-21', 8, '2021-03-08 19:16:52', '2021-03-08 19:16:52'),
(14, 'Free fire', 'storage/photos/1617819585Free-Fire-Redeem-Codes-Today-3-April-2021.jpg', 'solo', 'uysausuha suisha asuhas snkjd', '20$', '2021-04-07', '2021-04-16', 8, '2021-04-07 17:19:45', '2021-04-07 17:19:45'),
(16, 'Fifa 21 tournament', 'storage/photos/1617820232Fifa_1592566574619_1592566698613.png', 'solo', 'L\'EA SPORTS FIFA 21 GLOBAL SERIES (« FGS » ou « Compétition ») est sponsorisée par Electronic Arts Inc. (« EA »),', '20$', '2021-04-07', '2021-04-15', 13, '2021-04-07 17:30:32', '2021-04-07 17:30:32'),
(17, 'Apex Legends', 'storage/photos/1617820571apex-legends.webp', 'Squad', 'A team is only allowed to play in one region during the tournament. All team members must be of age 13 or older', '20$', '2021-04-07', '2021-04-14', 14, '2021-04-07 17:36:11', '2021-04-07 17:36:11'),
(18, 'Call of duty Warzone', 'storage/photos/1622029477AGB_WZ_0310_TOUT.jpg', 'Solo', 'rules of the game is :\r\n*\r\n*', '100$', '2021-05-26', '2021-05-31', 4, '2021-05-26 10:44:37', '2021-05-26 10:44:37'),
(19, 'Pubg', 'storage/post/1622030237maxresdefault.jpg', 'Squad', 'Rules', '50$', '2021-05-26', '2021-05-31', 10, '2021-05-26 10:56:02', '2021-05-26 10:57:17');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(18, 'bilel', 'ghazouani', 'bilelghazouani@gmail.com', '$2y$10$KC9hrFUA5Fo1iyBFSJcfUOtKl5zJMfwCMeni2fSohPtlHmBn3pKMi'),
(19, 'omar', 'benali', 'omarbnalii@gmail.com', '$2y$10$5abjwViiFocqeb5X/EwyXupZ0vlTwmGhC8opXMTHsTeDJV0PJN/zO'),
(20, 'mourad', 'arfaoui', 'mourad@gmail.com', '$2y$10$fAfzvk00uJN5Lq9yDBl.JulXS4V3QuA7H8FnYU478aZLW11CZWYoi'),
(21, 'Achref', 'Hermi', 'achrefhm@gmail.com', '$2y$10$35wLmPRirpOJ/lSBqZTMFeewVfeeC4jj67xv0cXKSlyMCuClMHyDy'),
(22, 'Amir', 'Hermi', 'amirhermi@gmail.com', '$2y$10$mGAq.LVphmeHx3Pbz2WzyO8JQXtabPEsppNQs6u.WnKVRS3NHx.Ou'),
(23, 'ali	', 'hermi', 'alihermi@gmail.com', '$2y$10$ikawP7idzBTgXojl234mHuZQ9bkU/8FcTc/y00OHXZ900yD/vuk.6'),
(24, 'mohamed', 'ayari', 'mohamed@gmail.com', '$2y$10$.vFmcQ2lDMbZ64mrlO8NRO9ou9/h9eBg9sVMzKUH7j4PtNxhS84OK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games_platforme_id_foreign` (`platforme_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participations_id_tournoi_foreign` (`id_tournoi`),
  ADD KEY `participations_id_utilisateur_foreign` (`id_utilisateur`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `platformes`
--
ALTER TABLE `platformes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `tournois`
--
ALTER TABLE `tournois`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournois_id_game_foreign` (`id_game`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utilisateurs_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `participations`
--
ALTER TABLE `participations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `platformes`
--
ALTER TABLE `platformes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tournois`
--
ALTER TABLE `tournois`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_platforme_id_foreign` FOREIGN KEY (`platforme_id`) REFERENCES `platformes` (`id`);

--
-- Contraintes pour la table `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `participations_id_tournoi_foreign` FOREIGN KEY (`id_tournoi`) REFERENCES `tournois` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participations_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tournois`
--
ALTER TABLE `tournois`
  ADD CONSTRAINT `tournois_id_game_foreign` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
