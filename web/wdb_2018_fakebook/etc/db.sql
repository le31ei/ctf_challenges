SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP DATABASE IF EXISTS `fakebook`;
CREATE DATABASE fakebook;
USE fakebook;

DROP TABLE IF EXISTS `file`;
CREATE TABLE `users` (
	`no` INT NOT NULL AUTO_INCREMENT ,
	`username` VARCHAR(100) NOT NULL ,
	`passwd` VARCHAR(128) NOT NULL ,
	`data` TEXT NOT NULL ,
	PRIMARY KEY (`no`)
) ENGINE = MyISAM;
-- CREATE TABLE `file` (
--   `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `filename` varchar(256) NOT NULL,
--   `oldname` varchar(256) DEFAULT NULL,
--   `view` int(11) DEFAULT NULL,
--   `extension` varchar(32) DEFAULT NULL,
--   PRIMARY KEY (`fid`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
