-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2019 at 06:31 PM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `prix_achat` float DEFAULT NULL,
  `quantite_initial` int(11) DEFAULT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `caracteristiques` text,
  `made_in` varchar(255) DEFAULT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `designation`, `prix_achat`, `quantite_initial`, `fournisseur_id`, `caracteristiques`, `made_in`, `produit_id`, `created_at`, `updated_at`) VALUES
(9, 'Clavier Alpha Numerique', NULL, 15000, 100, 3, 'clavier avec pavé alphabetique et pavé', NULL, 3, '2019-09-27 20:06:10', '2019-09-27 20:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `article_clients`
--

CREATE TABLE `article_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `numero_bon_commande` varchar(255) DEFAULT NULL,
  `numero_facture` varchar(255) DEFAULT NULL,
  `prix_vente_unitaire` float DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_clients`
--

INSERT INTO `article_clients` (`id`, `article_id`, `numero_bon_commande`, `numero_facture`, `prix_vente_unitaire`, `quantite`, `created_at`, `updated_at`) VALUES
(12, 9, NULL, 'FACT16722', 20000, 10, '2019-09-27 20:23:54', '2019-09-27 20:23:54'),
(13, 9, NULL, 'FACT16722', 20000, 1, '2019-09-27 21:34:26', '2019-09-27 21:34:26'),
(14, 9, NULL, 'FACT18650', 20000, 10, '2019-09-28 18:37:53', '2019-09-28 18:37:53'),
(15, 9, NULL, 'FACT22766', 20000, 5, '2019-09-28 19:00:06', '2019-09-28 19:00:06'),
(16, 9, NULL, 'FACT322', 20000, 20, '2019-09-29 04:24:42', '2019-09-29 04:24:42'),
(17, 9, 'BC11509', 'FACT58016', 10000, 10, '2019-09-29 12:11:44', '2019-09-29 12:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `bon_commandes`
--

CREATE TABLE `bon_commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) NOT NULL,
  `statut` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bon_commandes`
--

INSERT INTO `bon_commandes` (`id`, `numero`, `client_id`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'BC11509', 2, 1, '2019-09-29 12:11:51', '2019-09-29 12:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, '25', 'Test', '2019-07-22 21:52:56', '2019-07-22 21:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `cni` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `reference`, `cni`, `profession`, `telephone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Tchokouani', 'TC2012', NULL, NULL, '698033754', NULL, '2019-09-28 18:37:56', '2019-09-28 18:37:56'),
(2, 'Tchokouani', 'TE2012', NULL, NULL, '698033754', NULL, '2019-09-28 19:00:10', '2019-09-28 19:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_facture` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id`, `numero_facture`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 'FACT18650', 1, '2019-09-28 18:40:08', '2019-09-28 18:40:08'),
(2, 'FACT22766', 2, '2019-09-28 19:00:10', '2019-09-28 19:00:10'),
(4, 'FACT322', 2, '2019-09-29 04:26:23', '2019-09-29 04:26:23'),
(5, 'FACT49440', 2, '2019-09-29 12:25:59', '2019-09-29 12:25:59'),
(6, 'FACT58016', 2, '2019-09-29 12:26:42', '2019-09-29 12:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `raison_social` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `isOff` tinyint(1) DEFAULT '0',
  `nom_contact` varchar(255) DEFAULT NULL,
  `reg_commerce` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom`, `raison_social`, `adresse`, `email`, `tel`, `isOff`, `nom_contact`, `reg_commerce`, `created_at`, `updated_at`) VALUES
(1, 'nom', 'dfgfdgd', 'Kotto Douala', 'test@test.com', '699856225', 1, 'Tchokouani', NULL, '2019-07-22 17:04:49', '2019-08-01 15:01:27'),
(3, 'TCHUITOU essaie', 'test de raison social', 'Kotto Douala', 'admin@admin.com', '698033754', 0, 'Tchokouani', NULL, '2019-07-26 15:31:37', '2019-08-01 15:59:42');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `parameters` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mouvements`
--

CREATE TABLE `mouvements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '0 pour sorti et 1 pour entrer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mouvements`
--

INSERT INTO `mouvements` (`id`, `article_id`, `user_id`, `quantite`, `created_at`, `updated_at`, `prix`, `type`) VALUES
(1, 9, 1, 100, '2019-09-27 20:06:10', '2019-09-27 20:06:10', 15000, 1),
(2, 9, 1, 20, '2019-09-29 04:26:24', '2019-09-29 04:26:24', 20000, 0),
(3, 9, 1, 10, '2019-09-29 12:26:43', '2019-09-29 12:26:43', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_key` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browser_dashboard', 'Statistiques', '2019-09-28 23:00:00', '2019-09-28 23:00:00'),
(2, 'browser_fournisseur', 'Fournisseurs', NULL, NULL),
(3, 'browser_produits', 'Produits', NULL, NULL),
(4, 'browser_bon_commande', 'Bons de commande', NULL, NULL),
(5, 'browser_facture', 'Factures', NULL, NULL),
(6, 'browser_user', 'Utilisateurs', NULL, NULL),
(7, 'browser_role', 'Roles', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `code`, `libelle`, `categorie_id`, `created_at`, `updated_at`) VALUES
(3, '2501', 'Ordinateurs', 1, '2019-07-23 09:19:55', '2019-07-23 09:19:55'),
(4, 'yuy', '(rytyyg', 1, '2019-08-01 19:15:20', '2019-08-01 19:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrateur Principale', '2019-09-28 23:00:00', '2019-09-28 23:00:00'),
(2, 'user', 'Utilisateur normale', '2019-09-28 23:00:00', '2019-09-28 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_initial` int(11) DEFAULT NULL,
  `seuil_critique` int(11) DEFAULT NULL,
  `produits_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_encours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `stock_initial`, `seuil_critique`, `produits_id`, `created_at`, `updated_at`, `stock_encours`) VALUES
(4, 100, 10, 3, '2019-09-27 20:06:10', '2019-09-29 12:26:42', 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `remember_token`, `login`, `password`, `telephone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test', '9DDxGpTX9vu0FovEdvJ7qimbm3NKeZifkqs5mteDz6Rdc6taKust2tr7iXk5', NULL, '$2y$10$6uQ/Ikoi8jjBYQDVXzx3Bue14BGcdIODhIzySUrKDAvR.W.xaImmK', NULL, 'test@test.com', '2019-07-20 05:33:10', '2019-07-20 05:33:10'),
(2, 'Tchokouani', NULL, NULL, '$2y$10$4myTuwTBkS6RWWMXEz7aIuRsnNMfqM1m.z0ZZ9JMTeJREAPGRFLgG', NULL, 'edytchokouani@gmail.com', '2019-09-29 15:10:05', '2019-09-29 15:10:05'),
(4, 'Tchokouani', NULL, NULL, '$2y$10$rcqclnwoah9wXXRaXK4FKuQQXfSaq8NCPaFM24YdDOfr.ZpzPsUmy', NULL, 'edytchokouani@yahoo.com', '2019-09-29 15:24:28', '2019-09-29 15:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Indexes for table `article_clients`
--
ALTER TABLE `article_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `bon_commande_id` (`numero_bon_commande`),
  ADD KEY `numero_facture` (`numero_facture`);

--
-- Indexes for table `bon_commandes`
--
ALTER TABLE `bon_commandes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `mouvements`
--
ALTER TABLE `mouvements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `produits_id` (`produits_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephone` (`telephone`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `article_clients`
--
ALTER TABLE `article_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `bon_commandes`
--
ALTER TABLE `bon_commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mouvements`
--
ALTER TABLE `mouvements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Constraints for table `article_clients`
--
ALTER TABLE `article_clients`
  ADD CONSTRAINT `article_clients_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Constraints for table `mouvements`
--
ALTER TABLE `mouvements`
  ADD CONSTRAINT `mouvements_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `mouvements_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD CONSTRAINT `permission_roles_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
