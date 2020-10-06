-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 oct. 2020 à 01:45
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
-- Structure de la vue `v_bookings_details`
--

CREATE  VIEW `v_bookings_details`  AS  select `b`.`id` AS `id`,`b`.`start_date` AS `start_date`,`b`.`end_date` AS `end_date`,to_days(`b`.`end_date`) - to_days(`b`.`start_date`) AS `bookingDay`,`ca`.`label_en` AS `equipment_name_en`,`ca`.`label_de` AS `equipment_name_de`,`ca`.`label_fr` AS `equipment_name_fr`,`e`.`price_per_day` AS `price_per_day`,`c`.`id` AS `client_id`,`c`.`client_name` AS `client_name`,`c`.`client_last_name` AS `client_last_name` from (((`bookings` `b` join `campers` `e`) join `clients` `c`) join `camper_names` `ca`) where `b`.`id_campers` = `e`.`id` and `b`.`id_clients` = `c`.`id` and `e`.`id_campers_name` = `ca`.`id` ;

--
-- VIEW `v_bookings_details`
-- Données : Aucun(e)
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
