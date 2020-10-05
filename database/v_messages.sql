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
-- Structure for view `v_messages`
--

DROP VIEW IF EXISTS `v_messages`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_messages`  AS  select `m`.`id` AS `id`,`m`.`email` AS `email`,`m`.`telephone` AS `telephone`,`m`.`subject` AS `subject`,`m`.`message` AS `message`,`m`.`status` AS `status`,`m`.`send_date` AS `send_date`,`c`.`client_name` AS `client_name`,`c`.`client_last_name` AS `client_last_name`,`a`.`image` AS `image` from ((`messages` `m` join `clients` `c` on((`c`.`id` = `m`.`id_client`))) join `avatars` `a` on((`a`.`id` = `c`.`id_avatars`))) ;

--
-- VIEW `v_messages`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
