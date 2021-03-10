# dynamic-article-Page
dynamic article webpage build with php

# ERD

![alt text](https://github.com/fritzbernert/dynamic-article-Page/blob/main/erd.png?raw=true)


# SQL

CREATE DATABASE IF NOT EXISTS `articlewebsite` DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci;
CREATE TABLE `articlewebsite`.`article` (
  `article_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_title` text NOT NULL,
  `article_text` text NOT NULL,
  `article_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `articlewebsite`.`article` ADD PRIMARY KEY (`article_id`);
ALTER TABLE `articlewebsite`.`article` MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0 ;
CREATE TABLE `articlewebsite`.`user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `articlewebsite`.`user` ADD PRIMARY KEY (`user_id`);
ALTER TABLE `articlewebsite`.`user` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0 ;
