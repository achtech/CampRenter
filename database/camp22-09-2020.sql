-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 sep. 2020 à 17:43
-- Version du serveur :  10.4.11-MariaDB
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
-- Base de données : `camp`
--

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `label` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `billings`
--

CREATE TABLE `billings` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_bookings` int(11) NOT NULL,
  `email_paypal` varchar(100) NOT NULL,
  `num_card` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `cvc` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `billing_methods`
--

CREATE TABLE `billing_methods` (
  `id` int(11) NOT NULL,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `id_campers` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `camper_names`
--

CREATE TABLE `camper_names` (
  `id` int(11) NOT NULL,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `national_id` varchar(100) NOT NULL,
  `image_national_id` varchar(100) NOT NULL,
  `driving_licence` varchar(50) NOT NULL,
  `driving_licence_image` varchar(300) NOT NULL,
  `id_avatars` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `campers`
--

CREATE TABLE `campers` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `camper_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `id_licence_categories` int(11) NOT NULL,
  `value_of_vehicle` varchar(100) NOT NULL,
  `license_plate_number` varchar(100) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `sleeping_places` double NOT NULL,
  `id_camper_categories` int(11) NOT NULL,
  `id_transmissions` int(11) NOT NULL,
  `id_fuels` int(11) NOT NULL,
  `vehicle_licence` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `description_en` varchar(300) NOT NULL,
  `description_de` varchar(300) NOT NULL,
  `description_fr` varchar(300) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price_per_day` double NOT NULL,
  `minimal_rent_days` varchar(100) NOT NULL,
  `included_kilometres` varchar(100) NOT NULL,
  `minimum_age` varchar(100) NOT NULL,
  `animals_allowed_en` varchar(300) NOT NULL,
  `animals_allowed_de` varchar(300) NOT NULL,
  `animals_allowed_fr` varchar(300) NOT NULL,
  `animal_description_en` varchar(300) NOT NULL,
  `animal_description_de` varchar(300) NOT NULL,
  `animal_description_fr` varchar(300) NOT NULL,
  `license_needed_en` varchar(100) NOT NULL,
  `license_needed_de` varchar(100) NOT NULL,
  `license_needed_fr` varchar(100) NOT NULL,
  `licence_needed_desc_en` varchar(200) NOT NULL,
  `licence_needed_desc_de` varchar(200) NOT NULL,
  `licence_needed_desc_fr` varchar(200) NOT NULL,
  `license_age` varchar(100) NOT NULL,
  `licence_age_desc_en` varchar(300) NOT NULL,
  `licence_age_desc_de` varchar(300) NOT NULL,
  `licence_age_desc_fr` varchar(300) NOT NULL,
  `smoking_allowed` varchar(100) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `camper_categories`
--

CREATE TABLE `camper_categories` (
  `id` int(100) NOT NULL,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_campers` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fuels`
--

CREATE TABLE `fuels` (
  `id` int(11) NOT NULL,
  `label_en` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `insurances`
--

CREATE TABLE `insurances` (
  `id` int(11) NOT NULL,
  `description_en` varchar(300) NOT NULL,
  `description_de` varchar(300) NOT NULL,
  `description_fr` varchar(300) NOT NULL,
  `price_per_day` varchar(100) NOT NULL,
  `id_inssurance_company` int(11) NOT NULL,
  `id_camper_name` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `id` int(11) NOT NULL,
  `label_en` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `licence_categories`
--

CREATE TABLE `licence_categories` (
  `id` int(11) NOT NULL,
  `label_en` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` date NOT NULL,
  `created_by` date NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `status_campers`
--

CREATE TABLE `status_campers` (
  `id` int(11) NOT NULL,
  `label_en` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `transmissions`
--

CREATE TABLE `transmissions` (
  `id` int(11) NOT NULL,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_owner` (`id_clients`),
  ADD KEY `fk_id_bill` (`id_bill`),
  ADD KEY `fk_id_booking` (`id_bookings`);

--
-- Index pour la table `billing_methods`
--
ALTER TABLE `billing_methods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_campers` (`id_campers`);

--
-- Index pour la table `camper_names`
--
ALTER TABLE `camper_names`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_avatars` (`id_avatars`);

--
-- Index pour la table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `campers`
--
ALTER TABLE `campers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_licence_categories` (`id_licence_categories`),
  ADD KEY `fk_id_camper_categories` (`id_camper_categories`),
  ADD KEY `fk_id_transmissions` (`id_transmissions`),
  ADD KEY `fk_id_fuels` (`id_fuels`),
  ADD KEY `id_clients` (`id_clients`);

--
-- Index pour la table `camper_categories`
--
ALTER TABLE `camper_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD UNIQUE KEY `id_clients` (`id_clients`),
  ADD KEY `id_campers` (`id_campers`);

--
-- Index pour la table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_camper_name` (`id_camper_name`),
  ADD KEY `fk_id_inssurance_company` (`id_inssurance_company`);

--
-- Index pour la table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `licence_categories`
--
ALTER TABLE `licence_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `status_campers`
--
ALTER TABLE `status_campers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transmissions`
--
ALTER TABLE `transmissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `billing_methods`
--
ALTER TABLE `billing_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `camper_names`
--
ALTER TABLE `camper_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `campers`
--
ALTER TABLE `campers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `camper_categories`
--
ALTER TABLE `camper_categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `licence_categories`
--
ALTER TABLE `licence_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `transmissions`
--
ALTER TABLE `transmissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
