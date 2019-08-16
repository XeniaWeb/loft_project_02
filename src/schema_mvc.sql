CREATE DATABASE oks_mvc
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE oks_mvc;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    login CHAR(128) NOT NULL UNIQUE,
    user_name CHAR(128) NOT NULL,
    user_pass CHAR(128) NOT NULL,
    age INT(3) NOT NULL,
    descript CHAR(255),
    avatar CHAR(128),
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);


CREATE TABLE files (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  file_name CHAR(128) NOT NULL,
  about CHAR(255),
  user_id INT(11) NOT NULL,
  dt_add TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);