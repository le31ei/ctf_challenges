# Host: localhost  (Version: 5.5.53)
# Date: 2018-09-12 17:30:16
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "double"
#
CREATE DATABASE sql_test DEFAULT CHARACTER SET utf8;
use sql_test;

CREATE TABLE `double` (
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "double"
#


#
# Structure for table "flag"
#

CREATE TABLE `flag` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "flag"
#

INSERT INTO `flag` VALUES (1,'NSCTF{f6c631f294a64dbb1e963f427fdc725d}');

#
# Structure for table "userinfo"
#

CREATE TABLE `userinfo` (
  `Id` char(8) NOT NULL DEFAULT '',
  `username` varchar(255) DEFAULT NULL,
  `usermail` varchar(255) DEFAULT NULL,
  `callnumber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "userinfo"
#

INSERT INTO `userinfo` VALUES ('1','zhangsan','111@qq.com','123'),('2','lisi','222@qq.com','456'),('3','wangwu','333@qq.com','789');
