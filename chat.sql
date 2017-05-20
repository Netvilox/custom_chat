/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : chat

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-05-20 15:03:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `chats`
-- ----------------------------
DROP TABLE IF EXISTS `chats`;
CREATE TABLE `chats` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `from` bigint(11) NOT NULL,
  `to` bigint(11) NOT NULL,
  `message` text NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chats
-- ----------------------------
INSERT INTO `chats` VALUES ('1', '4', '3', 'hey 4-->3?', '2017-05-14 12:35:47', '1');
INSERT INTO `chats` VALUES ('2', '3', '4', 'hi', '2017-05-14 12:36:31', '1');
INSERT INTO `chats` VALUES ('3', '4', '3', 'ok', '2017-05-14 12:36:39', '1');
INSERT INTO `chats` VALUES ('4', '4', '3', 'hw r u', '2017-05-14 12:37:10', '1');
INSERT INTO `chats` VALUES ('5', '4', '3', 'whr r u?', '2017-05-14 12:37:26', '1');
INSERT INTO `chats` VALUES ('6', '5', '4', 'I\'m good', '2017-05-14 12:38:23', '1');
INSERT INTO `chats` VALUES ('7', '3', '4', 'in india', '2017-05-14 12:38:26', '1');
INSERT INTO `chats` VALUES ('8', '4', '3', 'ohh grt', '2017-05-14 12:38:48', '1');
INSERT INTO `chats` VALUES ('9', '4', '3', '<img id=\"smile__3\" src=\"http://local.all.com/chatplugin/client/themes/smileys/evilgrin55088.gif\" alt=\"smile\" />', '2017-05-14 12:40:27', '1');
INSERT INTO `chats` VALUES ('10', '1', '4', '<img id=\"smile__4\" src=\"http://local.all.com/chatplugin/client/themes/smileys/bigsmile54781.gif\" alt=\"smile\" />', '2017-05-14 12:40:43', '1');
INSERT INTO `chats` VALUES ('11', '2', '4', '<img id=\"smile__4\" src=\"http://local.all.com/chatplugin/client/themes/smileys/smile54593.gif\" alt=\"smile\" />', '2017-05-14 12:49:39', '1');
INSERT INTO `chats` VALUES ('12', '4', '3', 'hey 4-->3?', '2017-05-14 12:50:34', '1');
INSERT INTO `chats` VALUES ('13', '4', '3', 'oye', '2017-05-14 13:17:23', '1');
INSERT INTO `chats` VALUES ('14', '4', '6', 'hyy', '2017-05-14 13:20:42', '1');
INSERT INTO `chats` VALUES ('15', '4', '3', 'ohk', '2017-05-14 13:22:05', '1');
INSERT INTO `chats` VALUES ('16', '4', '3', 'hahaha', '2017-05-14 13:26:44', '1');
INSERT INTO `chats` VALUES ('17', '4', '3', 'heyss 4-->3?', '2017-05-14 13:56:51', '1');
INSERT INTO `chats` VALUES ('18', '4', '3', 'heyss 4-->3?', '2017-05-14 13:57:26', '1');
INSERT INTO `chats` VALUES ('19', '4', '3', 'heysa 4-->3?', '2017-05-14 14:02:45', '1');
INSERT INTO `chats` VALUES ('20', '4', '3', 'heysad 4-->3?', '2017-05-14 14:03:14', '1');
INSERT INTO `chats` VALUES ('21', '4', '3', 'heysadss 4-->3?', '2017-05-14 14:03:33', '1');
INSERT INTO `chats` VALUES ('22', '4', '3', 'heysadss 4-->3?', '2017-05-14 14:12:04', '1');
INSERT INTO `chats` VALUES ('23', '4', '3', 'hola 4-->3?', '2017-05-14 14:12:19', '1');
INSERT INTO `chats` VALUES ('24', '4', '3', 'hola 4-->3?', '2017-05-14 14:19:18', '1');
INSERT INTO `chats` VALUES ('25', '4', '3', 'hola11 4-->3?', '2017-05-14 14:19:29', '1');
INSERT INTO `chats` VALUES ('26', '4', '3', 'hola112 4-->3?', '2017-05-14 14:20:05', '1');
INSERT INTO `chats` VALUES ('27', '4', '3', 'hola112 4-->3?', '2017-05-14 14:20:19', '1');
INSERT INTO `chats` VALUES ('28', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:20:44', '1');
INSERT INTO `chats` VALUES ('29', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:21:08', '1');
INSERT INTO `chats` VALUES ('30', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:21:25', '1');
INSERT INTO `chats` VALUES ('31', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:21:38', '1');
INSERT INTO `chats` VALUES ('32', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:21:52', '1');
INSERT INTO `chats` VALUES ('33', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:21:58', '1');
INSERT INTO `chats` VALUES ('34', '4', '3', 'hola1124 4-->3?', '2017-05-14 14:22:24', '1');
INSERT INTO `chats` VALUES ('35', '4', '3', 'dfjhgj 4-->3?', '2017-05-14 14:22:54', '1');
INSERT INTO `chats` VALUES ('36', '4', '3', 'dfjhgjgfhfg 4-->3?', '2017-05-14 14:23:14', '1');
INSERT INTO `chats` VALUES ('37', '4', '3', 'sdfsdf 4-->3?', '2017-05-14 14:23:45', '1');
INSERT INTO `chats` VALUES ('38', '4', '3', 'sdfsdffg 4-->3?', '2017-05-14 14:24:41', '1');

-- ----------------------------
-- Table structure for `session`
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permanent_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('1', '1', '1', '2017-05-20 14:12:20');
INSERT INTO `session` VALUES ('2', '4', '1', '2017-05-20 13:53:36');
INSERT INTO `session` VALUES ('3', '5', '0', '2017-05-20 14:12:30');
INSERT INTO `session` VALUES ('4', '6', '1', '2017-05-20 14:12:35');
INSERT INTO `session` VALUES ('5', '3', '1', '2017-05-20 14:12:50');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'John', '3', 'rups', '96a7810cc225f9043d6066c947fa09e0', '1234567899', '2017-05-03 13:28:56', '2017-05-14 17:44:26');
INSERT INTO `users` VALUES ('4', 'John', '4', 'rups1', '96a7810cc225f9043d6066c947fa09e0', 'xyz123', '2017-05-03 13:51:17', '2017-05-14 17:44:36');
INSERT INTO `users` VALUES ('5', 'John', '5', 'ababab', 'e99a18c428cb38d5f260853678922e03', 'ababa223', '2017-05-05 01:30:09', '2017-05-14 17:44:36');
INSERT INTO `users` VALUES ('6', 'John', '6', 'bchxh', '9bfe43f5cfeeb0e6d402886789ece2f3', '63b43f939fdf024e', '2017-05-05 01:59:45', '2017-05-14 17:44:37');
INSERT INTO `users` VALUES ('7', 'John', '7', 'ababa', 'e99a18c428cb38d5f260853678922e03', '63b43f939fdf024e', '2017-05-05 02:00:57', '2017-05-14 17:44:39');
INSERT INTO `users` VALUES ('8', 'fghg', 'eert', '1111111111', '202cb962ac59075b964b07152d234b70', '63b43f939fdf024e', '2017-05-05 22:01:54', '2017-05-14 12:57:06');
INSERT INTO `users` VALUES ('9', 'ghjgh', 'bnvbn', '9926882900', '86f500cd7b7d38e5d4ae6cde3920f589', '24b57990aff58491', '2017-05-05 22:11:27', '2017-05-14 12:57:08');
INSERT INTO `users` VALUES ('10', 'ghjgh', 'vcbcv', '9179973345', '827ccb0eea8a706c4c34a16891f84e7b', 'cdfd811f870831cf', '2017-05-05 22:27:20', '2017-05-14 12:57:09');
INSERT INTO `users` VALUES ('11', 'ghj', 'dfgdf', '9685078888', '81dc9bdb52d04dc20036dbd8313ed055', '24b57990aff58491', '2017-05-05 23:15:04', '2017-05-14 12:57:10');
INSERT INTO `users` VALUES ('12', 'ghjhj', 'dg', '2222222222', '202cb962ac59075b964b07152d234b70', 'fefc9805e15ae9d1', '2017-05-05 23:37:19', '2017-05-14 12:57:11');
