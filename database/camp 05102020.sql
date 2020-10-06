CREATE TABLE IF NOT EXISTS `avatars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `label` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `billings`
--

DROP TABLE IF EXISTS `billings`;
CREATE TABLE IF NOT EXISTS `billings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `email_paypal` varchar(100) NOT NULL,
  `num_card` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `cvc` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `billing_status` varchar(1000) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_owner` (`id_client`),
  KEY `fk_id_bill` (`id_bill`),
  KEY `fk_id_booking` (`id_booking`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billings`
--

INSERT INTO `billings` (`id`, `id_client`, `id_bill`, `id_booking`, `email_paypal`, `num_card`, `exp_date`, `cvc`, `type`, `amount`, `billing_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 10, 1, 1, 'Email', 122, '2021-05-21', '333', 'AZE', 0, NULL, '2020-09-16', 1, '2020-09-09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `billing_methods`
--

DROP TABLE IF EXISTS `billing_methods`;
CREATE TABLE IF NOT EXISTS `billing_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipments` int(11) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `id_clients` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_equipments` (`id_equipments`),
  KEY `fk_id_clients` (`id_clients`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bookings`
--

INSERT INTO `bookings` (`id`, `id_equipments`, `dateFrom`, `dateTo`, `id_clients`, `created_at`, `created_by`, `updated_at`, `updated_by`, `total`) VALUES
(1, 1, '2020-10-05', '2020-10-05', 10, '2020-09-23', 1, '2020-09-25', 1, 100),
(2, 1, '2020-10-05', '2020-10-12', 11, '2020-09-25', 1, '2020-09-25', 1, 200),
(3, 1, '2020-10-08', '2020-11-04', 12, '2020-09-24', 1, '2020-09-17', 1, 300);

-- --------------------------------------------------------

--
-- Structure de la table `camper_names`
--

DROP TABLE IF EXISTS `camper_names`;
CREATE TABLE IF NOT EXISTS `camper_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `camper_names`
--

INSERT INTO `camper_names` (`id`, `label_en`, `label_de`, `label_fr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'camper_1 en', 'camper_1 de', 'camper_1 fr', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_owner` int(100) DEFAULT NULL,
  `id_renter` int(100) DEFAULT NULL,
  `message` text NOT NULL,
  `id_bookings` int(11) NOT NULL,
  `date_sent` timestamp NOT NULL,
  `ordre_message` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bookings_id` (`id_bookings`) USING BTREE,
  KEY `id_owner` (`id_owner`),
  KEY `id_renter` (`id_renter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`id`, `id_owner`, `id_renter`, `message`, `id_bookings`, `date_sent`, `ordre_message`) VALUES
(1, 10, NULL, 'test', 2, '2020-10-03 08:42:09', 1601639834630),
(2, NULL, 11, 'test answer', 2, '2020-10-03 08:42:09', 1601639856258);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(6000) DEFAULT NULL,
  `client_last_name` varchar(6000) DEFAULT NULL,
  `email` varchar(6000) DEFAULT NULL,
  `password` varchar(6000) DEFAULT NULL,
  `national_id` varchar(6000) DEFAULT NULL,
  `image_national_id` varchar(6000) DEFAULT NULL,
  `driving_licence` varchar(6000) DEFAULT NULL,
  `driving_licence_image` varchar(6000) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `id_avatars` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_avatars` (`id_avatars`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `client_last_name`, `email`, `password`, `national_id`, `image_national_id`, `driving_licence`, `driving_licence_image`, `status`, `id_avatars`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(12, 'Noura', 'bouchbaat', 'noura.bouchbaat@exo-it.com', '123456', '12', 'national.png', '12', 'drivingLicence.jpg', 'active', 1, NULL, NULL, '2020-10-05', NULL),
(10, 'oumaima', 'stitini', 'oumaima.stitini@exo-it.com', '123456', '12', 'national.png', '12', 'drivingLicence.jpg', 'active', 1, NULL, NULL, '2020-10-05', NULL),
(11, 'achraf', 'saloumi', 'achraf.saloumi@exo-it.com', '123456', '12', 'national.png', '12', 'drivingLicence.jpg', 'blocked', 1, NULL, NULL, '2020-09-29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commissions`
--

DROP TABLE IF EXISTS `commissions`;
CREATE TABLE IF NOT EXISTS `commissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` double NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commissions`
--

INSERT INTO `commissions` (`id`, `rate`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 2, '2020-09-30', NULL, '2020-09-30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_campers_name` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `id_licence_categories` int(11) NOT NULL,
  `value_of_vehicle` varchar(100) NOT NULL,
  `license_plate_number` varchar(100) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `sleeping_places` double NOT NULL,
  `id_equipment_categories` int(11) NOT NULL,
  `id_transmissions` int(11) NOT NULL,
  `id_fuels` int(11) NOT NULL,
  `vehicle_licence` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `description_equipment` varchar(300) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price_per_day` double NOT NULL,
  `minimal_rent_days` varchar(100) NOT NULL,
  `included_kilometres` varchar(100) NOT NULL,
  `minimum_age` varchar(100) NOT NULL,
  `animals_allowed` varchar(300) NOT NULL,
  `animal_description` varchar(300) NOT NULL,
  `license_needed` varchar(100) NOT NULL,
  `licence_needed_desc` varchar(200) NOT NULL,
  `license_age` varchar(100) NOT NULL,
  `licence_age_desc` varchar(300) NOT NULL,
  `smoking_allowed` varchar(100) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_licence_categories` (`id_licence_categories`),
  KEY `fk_id_equipment_categories` (`id_equipment_categories`),
  KEY `fk_id_transmissions` (`id_transmissions`),
  KEY `fk_id_fuels` (`id_fuels`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipments`
--

INSERT INTO `equipments` (`id`, `id_client`, `id_campers_name`, `image`, `brand`, `model`, `id_licence_categories`, `value_of_vehicle`, `license_plate_number`, `seat_number`, `sleeping_places`, `id_equipment_categories`, `id_transmissions`, `id_fuels`, `vehicle_licence`, `length`, `width`, `height`, `description_equipment`, `location`, `price_per_day`, `minimal_rent_days`, `included_kilometres`, `minimum_age`, `animals_allowed`, `animal_description`, `license_needed`, `licence_needed_desc`, `license_age`, `licence_age_desc`, `smoking_allowed`, `availability`, `is_confirmed`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 10, 1, 'camp1.jpg', 'Caravane', 'Caravane', 1, 'Caravane', '5', '12', 2, 2, 1, 2, '3', '33', '33', '33', 'Perfect for beginners and those who would like to try out a caravan because our caravan is very compact and light. It is easy to drive and can be pushed and parked by hand by two or three people. The caravan is new, our family bought it new in summer 2018.', 'ALLEMAGNE', 44, '3', '2222', '22', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 1, 1, '2020-09-09', '2020-09-25', 1, 1),
(2, 10, 1, 'camp1.jpg', 'e', 'A', 1, 'A', 'A', 'A', 22, 1, 1, 1, 'A', 'A', 'A', 'A', 'A', 'A', 122, 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 0, 0, '2020-09-16', '2020-09-24', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `equipment_categories`
--

DROP TABLE IF EXISTS `equipment_categories`;
CREATE TABLE IF NOT EXISTS `equipment_categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipment_categories`
--

INSERT INTO `equipment_categories` (`id`, `label_en`, `label_de`, `label_fr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'zz', 'zz', 'ee', '2020-09-28', NULL, '2020-09-28', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `equipment_images`
--

DROP TABLE IF EXISTS `equipment_images`;
CREATE TABLE IF NOT EXISTS `equipment_images` (
  `id` int(11) NOT NULL,
  `id_equipments` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipment` (`id_equipments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipment_images`
--

INSERT INTO `equipment_images` (`id`, `id_equipments`, `image`) VALUES
(1, 1, 'camp1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int(11) NOT NULL,
  `id_equipments` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  UNIQUE KEY `id_clients` (`id_clients`),
  KEY `id_equipments` (`id_equipments`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fuels`
--

DROP TABLE IF EXISTS `fuels`;
CREATE TABLE IF NOT EXISTS `fuels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fuels`
--

INSERT INTO `fuels` (`id`, `label_en`, `label_de`, `label_fr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Gazoil', 'Gazoil', 'Gazoil55', '2020-10-05', NULL, '2020-10-05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `inssurances`
--

DROP TABLE IF EXISTS `inssurances`;
CREATE TABLE IF NOT EXISTS `inssurances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description_en` varchar(300) NOT NULL,
  `description_de` varchar(300) NOT NULL,
  `description_fr` varchar(300) NOT NULL,
  `price_per_day` varchar(100) NOT NULL,
  `id_inssurance_company` int(11) NOT NULL,
  `id_camper_name` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_camper_name` (`id_camper_name`),
  KEY `fk_id_inssurance_company` (`id_inssurance_company`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inssurance_company`
--

DROP TABLE IF EXISTS `inssurance_company`;
CREATE TABLE IF NOT EXISTS `inssurance_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `licence_categories`
--

DROP TABLE IF EXISTS `licence_categories`;
CREATE TABLE IF NOT EXISTS `licence_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `licence_categories`
--

INSERT INTO `licence_categories` (`id`, `label_en`, `label_de`, `label_fr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'tst', 'rr', 'RR', '2020-09-28', NULL, '2020-10-05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `send_date` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `email`, `telephone`, `subject`, `message`, `status`, `send_date`, `id_client`) VALUES
(1, 'oumaima.stitini@exo-it.com', '066666666', 'COMMENT', 'Perfect for beginners and those who would like to try out a caravan because our caravan is very compact and light.', 1, '2020-10-02 06:23:00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_25_111110_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('a.mareshal@gmail.com', '$2y$10$zw8gXn2bAFYczSbufIYJBOYLfrArEsRkMt7IL9lgcrHQud19JKgzS', '2020-10-05 09:36:47');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('w1kU4H6oBAAeeRkGxY0yEFqj4T4tfmGTAsDfszKP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibGwyQWhmUjNXMTNkU25YaWxJUU9WYlJmb0l3QVRDTkF5YVFEZ3NvTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lcXVpcG1lbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6ImxvY2FsZSI7czoyOiJlbiI7fQ==', 1601486736);

-- --------------------------------------------------------

--
-- Structure de la table `status_equipments`
--

DROP TABLE IF EXISTS `status_equipments`;
CREATE TABLE IF NOT EXISTS `status_equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(50) NOT NULL,
  `label_fr` varchar(50) NOT NULL,
  `label_de` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `status_equipments`
--

INSERT INTO `status_equipments` (`id`, `label_en`, `label_fr`, `label_de`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Finished', 'Terminer', 'Fertig', '2020-10-05', '2020-10-06', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `transmissions`
--

DROP TABLE IF EXISTS `transmissions`;
CREATE TABLE IF NOT EXISTS `transmissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_en` varchar(100) NOT NULL,
  `label_de` varchar(100) NOT NULL,
  `label_fr` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `transmissions`
--

INSERT INTO `transmissions` (`id`, `label_en`, `label_de`, `label_fr`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'trans1', 'trans1', 'trans1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adress` text,
  `picture` varchar(200) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `created_by`, `updated_at`, `updated_by`, `telephone`, `adress`, `picture`, `role`, `remember_token`) VALUES
(2, 'Achraf Saloumi2', 'a.mareshal@gmail.com2', '$2y$10$phXZCAHDzrZDuUjxQN1QUeYsCv19OasZNQSSMTLuGDh4baxBz0o6W', '2020-10-05', NULL, '2020-10-05', NULL, '+212653903659', 'machi sou9ek', 'code-informatique-60-1920x1080.jpg', 'admin', NULL);

-- --------------------------------------------------------

--
-- Structure de la vue `bookingdetails`
--
DROP TABLE IF EXISTS `bookingdetails`;

CREATE VIEW `bookingdetails`  AS  select `b`.`id` AS `id`,`b`.`dateFrom` AS `dateFrom`,`b`.`dateTo` AS `dateTo`,(to_days(`b`.`dateTo`) - to_days(`b`.`dateFrom`)) AS `bookingDay`,`ca`.`label_en` AS `equipment_name_en`,`ca`.`label_de` AS `equipment_name_de`,`ca`.`label_fr` AS `equipment_name_fr`,`e`.`price_per_day` AS `price_per_day`,`c`.`id` AS `client_id`,`c`.`client_name` AS `client_name`,`c`.`client_last_name` AS `client_last_name` from (((`bookings` `b` join `equipments` `e`) join `clients` `c`) join `camper_names` `ca`) where ((`b`.`id_equipments` = `e`.`id`) and (`b`.`id_clients` = `c`.`id`) and (`e`.`id_campers_name` = `ca`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_chats_bookings`
--
DROP TABLE IF EXISTS `v_chats_bookings`;

CREATE VIEW `v_chats_bookings`  AS  select `m`.`message` AS `message`,`m`.`date_sent` AS `date_sent`,`m`.`id_bookings` AS `id_bookings`,`m`.`ordre_message` AS `ordre_message`,`c`.`id` AS `id_owner`,`c`.`client_name` AS `owner_first_name`,`c`.`client_last_name` AS `owner_last_name`,`ao`.`image` AS `image_owner`,`l`.`id` AS `id_renter`,`l`.`client_name` AS `renter_first_name`,`l`.`client_last_name` AS `renter_last_name`,`ar`.`image` AS `image_renter` from (((((`chats` `m` join `bookings` `b` on((`m`.`id_bookings` = `b`.`id`))) left join `clients` `c` on((`m`.`id_owner` = `c`.`id`))) left join `avatars` `ao` on((`c`.`id_avatars` = `ao`.`id`))) left join `clients` `l` on((`m`.`id_renter` = `l`.`id`))) left join `avatars` `ar` on((`l`.`id_avatars` = `ar`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_messages`
--
DROP TABLE IF EXISTS `v_messages`;

CREATE VIEW `v_messages`  AS  select `m`.`id` AS `id`,`m`.`email` AS `email`,`m`.`telephone` AS `telephone`,`m`.`subject` AS `subject`,`m`.`message` AS `message`,`m`.`status` AS `status`,`m`.`send_date` AS `send_date`,`c`.`client_name` AS `client_name`,`c`.`client_last_name` AS `client_last_name`,`a`.`image` AS `image` from ((`messages` `m` join `clients` `c` on((`c`.`id` = `m`.`id_client`))) join `avatars` `a` on((`a`.`id` = `c`.`id_avatars`))) ;
COMMIT;
