CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
CREATE TABLE `sessions` (
  `sesskey` varchar(255) NOT NULL,
  `expiry` int(11) NOT NULL,
  `value` text,
  PRIMARY KEY (`sesskey`)
) ENGINE=InnoDB;