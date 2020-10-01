-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2020 at 03:51 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camp`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `equipment_name_en` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
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
  `is_confirmed` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `equipment_name_de` varchar(100) NOT NULL,
  `equipment_name_fr` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_licence_categories` (`id_licence_categories`),
  KEY `fk_id_equipment_categories` (`id_equipment_categories`),
  KEY `fk_id_transmissions` (`id_transmissions`),
  KEY `fk_id_fuels` (`id_fuels`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `id_client`, `equipment_name_en`, `image`, `brand`, `model`, `id_licence_categories`, `value_of_vehicle`, `license_plate_number`, `seat_number`, `sleeping_places`, `id_equipment_categories`, `id_transmissions`, `id_fuels`, `vehicle_licence`, `length`, `width`, `height`, `description_en`, `description_de`, `description_fr`, `location`, `price_per_day`, `minimal_rent_days`, `included_kilometres`, `minimum_age`, `animals_allowed_en`, `animals_allowed_de`, `animals_allowed_fr`, `animal_description_en`, `animal_description_de`, `animal_description_fr`, `license_needed_en`, `license_needed_de`, `license_needed_fr`, `licence_needed_desc_en`, `licence_needed_desc_de`, `licence_needed_desc_fr`, `license_age`, `licence_age_desc_en`, `licence_age_desc_de`, `licence_age_desc_fr`, `smoking_allowed`, `availability`, `is_confirmed`, `created_at`, `updated_at`, `created_by`, `updated_by`, `equipment_name_de`, `equipment_name_fr`) VALUES
(1, 10, 'Caravane', 'C:\\Users\\Abdelah\\Desktop\\Tulips.jpg', 'Caravane', 'Caravane', 1, 'Caravane', '5', '12', 2, 2, 2, 2, '3', '33', '33', '33', 'Perfect for beginners and those who would like to try out a caravan because our caravan is very compact and light. It is easy to drive and can be pushed and parked by hand by two or three people. The caravan is new, our family bought it new in summer 2018.', 'Caravane', 'Caravane', 'ALLEMAGNE', 44, '3', '2222', '22', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 1, 0, '2020-09-09', '2020-09-25', 1, 1, '', ''),
(2, 10, 'Caravane', 'e', 'e', 'A', 1, 'A', 'A', 'A', 22, 1, 1, 1, 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 122, 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 1, 0, '2020-09-16', '2020-09-24', 2, 2, '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
