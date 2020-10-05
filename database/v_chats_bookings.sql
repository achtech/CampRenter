-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2020 at 08:53 AM
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
-- Structure for view `v_chats_bookings`
--

DROP VIEW IF EXISTS `v_chats_bookings`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_chats_bookings`  AS  select `m`.`message` AS `message`,`m`.`date_sent` AS `date_sent`,`m`.`id_bookings` AS `id_bookings`,`m`.`ordre_message` AS `ordre_message`,`c`.`id` AS `id_owner`,`c`.`client_name` AS `owner_first_name`,`c`.`client_last_name` AS `owner_last_name`,`ao`.`image` AS `image_owner`,`l`.`id` AS `id_renter`,`l`.`client_name` AS `renter_first_name`,`l`.`client_last_name` AS `renter_last_name`,`ar`.`image` AS `image_renter` from (((((`chats` `m` join `bookings` `b` on((`m`.`id_bookings` = `b`.`id`))) left join `clients` `c` on((`m`.`id_owner` = `c`.`id`))) left join `avatars` `ao` on((`c`.`id_avatars` = `ao`.`id`))) left join `clients` `l` on((`m`.`id_renter` = `l`.`id`))) left join `avatars` `ar` on((`l`.`id_avatars` = `ar`.`id`))) ;

--
-- VIEW `v_chats_bookings`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
