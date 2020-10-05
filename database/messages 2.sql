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

INSERT INTO `messages` (`id`, `email`, `telephone`, `subject`, `message`, `status`, `send_date`, `id_client`) VALUES
(1, 'oumaima.stitini@exo-it.com', '066666666', 'COMMENT', 'Perfect for beginners and those who would like to try out a caravan because our caravan is very compact and light.', 1, '2020-10-02 06:23:00', 10);
COMMIT;
