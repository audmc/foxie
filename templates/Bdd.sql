-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 27, 2020 at 10:10 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `foxie`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnement`
--

CREATE TABLE `abonnement` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abonnement`
--

INSERT INTO `abonnement` (`id`, `type`) VALUES
(1, 'Basique'),
(2, 'Recommandé'),
(3, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_id` int(11) NOT NULL,
  `matiere_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201125153707', '2020-11-25 15:37:16', 51),
('DoctrineMigrations\\Version20201126100457', '2020-11-26 10:05:06', 57);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id`, `nom_matiere`) VALUES
(1, 'Html/CSS'),
(2, 'AdobeXD, Figma,Sketch'),
(3, 'Photoshop,illustrator'),
(4, 'Canka'),
(5, 'Animate,Acrobate'),
(6, 'Bootstrap,Wordpress'),
(7, 'Php'),
(8, 'JavaScript'),
(9, 'Symfony'),
(10, 'React'),
(11, 'Java'),
(12, 'Angular'),
(13, 'Audrey'),
(14, 'quentin');

-- --------------------------------------------------------

--
-- Table structure for table `mode_de_paiement`
--

CREATE TABLE `mode_de_paiement` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mode_de_paiement`
--

INSERT INTO `mode_de_paiement` (`id`, `type`) VALUES
(1, 'Carte bancaire'),
(2, 'Paypal'),
(3, 'Virement bancaire');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id`, `type`, `description`) VALUES
(1, 'Néophyte', 'débutant'),
(14, 'Intermédiaire', 'Intermédiaire'),
(15, 'Avancé', 'Avancé');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci,
  `code_postal` longtext COLLATE utf8mb4_unicode_ci,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abonnement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `email`, `password`, `pseudo`, `prenom`, `nom`, `date_de_naissance`, `adresse`, `code_postal`, `ville`, `abonnement`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'carte bleu'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cb'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cb'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cb'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cb'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qqq');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `adresse` longtext COLLATE utf8mb4_unicode_ci,
  `code_postal` longtext COLLATE utf8mb4_unicode_ci,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abonnement_id` int(11) NOT NULL,
  `mode_de_paiement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `pseudo`, `prenom`, `nom`, `date_de_naissance`, `adresse`, `code_postal`, `ville`, `abonnement_id`, `mode_de_paiement_id`) VALUES
(1, 'audreymasson75@yahoo.fr', '[]', '$argon2id$v=19$m=65536,t=4,p=1$fqqixCvjNxW6avbkJJWyKQ$jDBIBlbg45e21JKnvc7EHJD0UYeWhDrdl61QYJhpt0w', 'Aud', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(2, 'papa@test.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Z1fTB/IqzO2f5E3rSo1Beg$vF9PNMxnPskyQzGZFWb4woyvnLCOpANS+8mjqTILatc', 'aud', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(3, 'js.quetier@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$71MfOZPr2/AN9btmAMi9TA$tjEHb8/WJNH1z/8SAhK2/zAp837d+8DlnP9CsDHgQOU', 'God', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FDCA8C9CB3E9C81` (`niveau_id`),
  ADD KEY `IDX_FDCA8C9CF46CD258` (`matiere_id`),
  ADD KEY `IDX_FDCA8C9CFB88E14F` (`utilisateur_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode_de_paiement`
--
ALTER TABLE `mode_de_paiement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`),
  ADD KEY `IDX_1D1C63B3F1D74413` (`abonnement_id`),
  ADD KEY `IDX_1D1C63B38776F13D` (`mode_de_paiement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mode_de_paiement`
--
ALTER TABLE `mode_de_paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_FDCA8C9CB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `FK_FDCA8C9CF46CD258` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`),
  ADD CONSTRAINT `FK_FDCA8C9CFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B38776F13D` FOREIGN KEY (`mode_de_paiement_id`) REFERENCES `mode_de_paiement` (`id`),
  ADD CONSTRAINT `FK_1D1C63B3F1D74413` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnement` (`id`);
