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

INSERT INTO `chats` (`id`, `id_owner`, `id_renter`, `message`, `id_bookings`, `date_sent`, `ordre_message`) VALUES
(1, 10, NULL, 'test', 2, '2020-10-03 09:42:09', 1601639834630),
(2, NULL, 11, 'test answer', 2, '2020-10-03 09:42:09', 1601639856258);

ALTER TABLE `chats`
  ADD CONSTRAINT `fk_booking_id` FOREIGN KEY (`id_bookings`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`id_owner`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `fk_renter_id` FOREIGN KEY (`id_renter`) REFERENCES `clients` (`id`);
