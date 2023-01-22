SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `spendwiser` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `spendwiser`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(72) NOT NULL,
  `password` varchar(72) NOT NULL,
  `complete` tinyint(1) DEFAULT '0',
  `first_name` varchar(72) NOT NULL,
  `last_name` varchar(72) NOT NULL,
  `age` tinyint(1),
  `yearEarn` int(11),
  `monthExp` int(11),
  `housing` int(11),
  `food` int(11),
  `misc` int(11),
  `completeInv` tinyint(1) DEFAULT '0',
  `goal` varchar(72),
  `period` varchar(72),
  `types` varchar(72),
  `invested` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);
  
  ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
