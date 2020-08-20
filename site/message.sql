/*
Navicat MySQL Data Transfer

Source Server         : youinme
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2020-08-05 11:16:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `message` text,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '1', '你好', '2020-08-05', '11:15:04');

CREATE TABLE `weather` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `today` text,
  `tomorrow` text,
  `date` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `log_record` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `count` varchar(100),
  `ip` varchar(20),
  address text,
  `client` text DEFAULT NULL,
  date varchar(20),
  time varchar(20),
  other text,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;