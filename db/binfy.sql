/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : binfy

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-12-29 11:47:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_temp` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referance_token` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referance_by` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'alauddin1987@gmail.com', null, 'alauddin1987@gmail.com', 'alauddin1987@gmail.com', '$2y$10$mFPnYCLbbDPYUS6/h0Kj1eM2DJjkua2RUo4iHhIZQ1KLmbdu.L7wu', null, 'g6JeTLld5bd5h52iNTYh2cC7Z', null, null, '1', 'ZYziCbkdAWDlVIA4XgZJT1EvRSupwG5erQEubkR9p6zf9pmlZuPMONYDRMzR', 'user', '2014-12-29 05:41:23', '2014-12-29 05:45:35');
