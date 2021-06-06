/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3307
Source Database       : act

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-03-28 12:35:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `sno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_cyear` int(6) DEFAULT NULL,
  `f_class_name` varchar(10) DEFAULT NULL,
  `f_user_id` varchar(15) DEFAULT NULL,
  `f_passwd` varchar(16) DEFAULT NULL,
  `f_user_name` varchar(10) DEFAULT NULL,
  `f_company_id` varchar(4) DEFAULT NULL,
  `f_company_name` varchar(16) DEFAULT NULL,
  `f_edit_date` varchar(20) DEFAULT NULL,
  `f_edit_time` varchar(16) DEFAULT NULL,
  `f_edit_ip` varchar(15) DEFAULT NULL,
  `f_identity` varchar(10) DEFAULT NULL,
  `f_address` varchar(20) DEFAULT NULL,
  `f_dept` varchar(10) DEFAULT NULL,
  `f_pic` varchar(14) DEFAULT NULL,
  `f_mail` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sno`),
  KEY `st_id` (`f_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1092', '資二一', 'guest', 'guest', 'guest', 'test', 'test', null, null, null, null, null, null, null, null);
