-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 29 Septembre 2018 à 05:22
-- Version du serveur :  5.7.19-log
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chrismultilng`
--

-- --------------------------------------------------------

--
-- Structure de la table `critiqs`
--

CREATE TABLE IF NOT EXISTS `critiqs` (
  `id` int(11) NOT NULL,
  `entrefilet_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `critiq` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrefilets`
--

CREATE TABLE IF NOT EXISTS `entrefilets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entrefilets_files`
--

CREATE TABLE IF NOT EXISTS `entrefilets_files` (
  `id` int(11) NOT NULL,
  `entrefilet_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrefilets_tags`
--

CREATE TABLE IF NOT EXISTS `entrefilets_tags` (
  `entrefilet_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `slide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `slide`, `path`, `created`, `modified`, `status`) VALUES
(1, '98-01.jpg', 'Files/', '2018-09-19 13:20:11', '2018-09-19 13:20:11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20180929043354, 'Initial', '2018-09-29 08:33:55', '2018-09-29 08:33:55', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Economics', '2018-09-26 12:46:44', '2018-09-27 16:03:24'),
(2, 'Health', '2018-09-26 12:46:56', '2018-09-29 12:46:56'),
(3, 'Sport', '2018-09-22 12:47:04', '2018-09-26 12:47:04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_uuid` int(11) DEFAULT NULL,
  `email_confirm` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `user_uuid`, `email_confirm`, `created`, `modified`) VALUES
(1, 'cevchris23@gmail.com', '$2y$10$/uZqoVCIMtrG4mAMyhgdD.v4eQXM2wyZH9RUvRMMkAz3x0oUIVIDW', NULL, NULL, NULL, '2018-09-29 03:56:01', '2018-09-29 03:56:01'),
(2, 'cevchris23@outlook.com', '$2y$10$IhV9YffekpcUkQ6BvLUdLutcK2bPDZh2c7wA8TVrUJAAA0gYFbfue', NULL, NULL, NULL, '2018-09-29 03:57:47', '2018-09-29 03:57:47');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `critiqs`
--
ALTER TABLE `critiqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrefiletdex` (`entrefilet_id`);

--
-- Index pour la table `entrefilets`
--
ALTER TABLE `entrefilets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `userIdex` (`user_id`);

--
-- Index pour la table `entrefilets_files`
--
ALTER TABLE `entrefilets_files`
  ADD KEY `entrefilet_id` (`entrefilet_id`,`file_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Index pour la table `entrefilets_tags`
--
ALTER TABLE `entrefilets_tags`
  ADD PRIMARY KEY (`entrefilet_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`,`locale`,`model`,`foreign_key`,`field`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`,`title`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid_alone` (`user_uuid`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `critiqs`
--
ALTER TABLE `critiqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `entrefilets`
--
ALTER TABLE `entrefilets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `entrefilets_tags`
--
ALTER TABLE `entrefilets_tags`
  MODIFY `entrefilet_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `critiqs`
--
ALTER TABLE `critiqs`
  ADD CONSTRAINT `critiqs_ibfk_1` FOREIGN KEY (`entrefilet_id`) REFERENCES `entrefilets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entrefilets`
--
ALTER TABLE `entrefilets`
  ADD CONSTRAINT `entrefilets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entrefilets_files`
--
ALTER TABLE `entrefilets_files`
  ADD CONSTRAINT `entrefilets_files_ibfk_1` FOREIGN KEY (`entrefilet_id`) REFERENCES `entrefilets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrefilets_files_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entrefilets_tags`
--
ALTER TABLE `entrefilets_tags`
  ADD CONSTRAINT `entrefilets_tags_ibfk_1` FOREIGN KEY (`entrefilet_id`) REFERENCES `entrefilets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrefilets_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
