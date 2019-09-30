CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  PRIMARY KEY (`id`, `user_id`)
);

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `author` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
);
