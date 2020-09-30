-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 sep. 2020 à 18:13
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
-- Structure de la vue `bookingdetails`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bookingdetails`  AS  select `b`.`id` AS `id`,`b`.`dateFrom` AS `dateFrom`,`b`.`dateTo` AS `dateTo`,to_days(`b`.`dateTo`) - to_days(`b`.`dateFrom`) AS `bookingDay`,`e`.`equipment_name_en` AS `equipment_name_en`,`e`.`equipment_name_de` AS `equipment_name_de`,`e`.`equipment_name_fr` AS `equipment_name_fr`,`e`.`price_per_day` AS `price_per_day`,`c`.`id` AS `client_id`,`c`.`client_name` AS `client_name`,`c`.`client_last_name` AS `client_last_name` from ((`bookings` `b` join `equipments` `e`) join `clients` `c`) where `b`.`id_equipments` = `e`.`id` and `b`.`id_clients` = `c`.`id` ;

--
-- VIEW `bookingdetails`
-- Données : Aucun(e)
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
