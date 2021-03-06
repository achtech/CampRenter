CREATE TABLE `campers` (
  `id` int(11) NOT NULL,
  `id_clients` int(11) NOT NULL,
  `id_campers_name` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
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
  `description_camper` varchar(300) NOT NULL,
  `location` varchar(100) NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `position_x` int(11) DEFAULT NULL,
  `position_y` int(11) DEFAULT NULL,
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
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `campers` (`id`, `id_clients`, `id_campers_name`, `image`, `brand`, `model`, `id_licence_categories`, `value_of_vehicle`, `license_plate_number`, `seat_number`, `sleeping_places`, `id_camper_categories`, `id_transmissions`, `id_fuels`, `vehicle_licence`, `length`, `width`, `height`, `description_camper`, `location`, `zip_code`, `city`, `country`, `position_x`, `position_y`, `price_per_day`, `minimal_rent_days`, `included_kilometres`, `minimum_age`, `animals_allowed`, `animal_description`, `license_needed`, `licence_needed_desc`, `license_age`, `licence_age_desc`, `smoking_allowed`, `availability`, `is_confirmed`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 10, 1, 'camp1.jpg', 'Caravane', 'Caravane', 1, 'Caravane', '5', '12', 2, 2, 1, 2, '3', '33', '33', '33', 'Perfect for beginners and those who would like to try out a caravan because our caravan is very compact and light. It is easy to drive and can be pushed and parked by hand by two or three people. The caravan is new, our family bought it new in summer 2018.', 'ALLEMAGNE', NULL, NULL, NULL, NULL, NULL, 44, '3', '2222', '22', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 1, 1, '2020-09-09', '2020-09-25', 1, 1),
(2, 10, 1, 'camp1.jpg', 'e', 'A', 1, 'A', 'A', 'A', 22, 1, 1, 1, 'A', 'A', 'A', 'A', 'A', 'A', NULL, NULL, NULL, NULL, NULL, 122, 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 0, 0, '2020-09-16', '2020-09-24', 2, 2);

ALTER TABLE `campers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_licence_categories` (`id_licence_categories`),
  ADD KEY `fk_id_camper_categories` (`id_camper_categories`),
  ADD KEY `fk_id_transmissions` (`id_transmissions`),
  ADD KEY `fk_id_fuels` (`id_fuels`),
  ADD KEY `id_clients` (`id_clients`);

--
ALTER TABLE `campers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
