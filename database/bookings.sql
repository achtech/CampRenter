DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campers` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `id_clients` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_campers` (`id_campers`),
  KEY `fk_id_clients` (`id_clients`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO `bookings` (`id`, `id_campers`, `start_date`, `end_date`, `id_clients`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '2020-09-24', '2020-09-26', 10, '2020-09-23', 1, '2020-09-25', 1),
(2, 1, '2020-09-10', '2020-09-16', 11, '2020-09-25', 1, '2020-09-25', 1),
(3, 1, '2020-09-18', '2020-09-25', 12, '2020-09-24', 1, '2020-09-17', 1);
