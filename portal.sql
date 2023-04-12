/*
 Navicat Premium Data Transfer

 Source Server         : db
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : portal

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 12/04/2023 16:27:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (8, '2023-04-12-042638', 'App\\Database\\Migrations\\Users', 'default', 'App', 1681285008, 1);
INSERT INTO `migrations` VALUES (9, '2023-04-12-043550', 'App\\Database\\Migrations\\PasswordResetTokens', 'default', 'App', 1681285009, 1);
INSERT INTO `migrations` VALUES (10, '2023-04-12-044252', 'App\\Database\\Migrations\\News', 'default', 'App', 1681285009, 1);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'dera', 'dera@gmail.com', '686dbb08210a2dbe53eb739f913f9db62aba47d1e0a2fb3a1b4d6bb91d4b4d08', '2023-04-12 07:50:18', '2023-04-12 07:50:18');
INSERT INTO `user` VALUES (2, 'Deraa Abdul', 'dag@gmail.com', '$2y$10$6lHYgZ/mRthywcarrLsysO7u2U44T54ZtUWkIJEIt.8JsJX0nY7By', '2023-04-12 08:14:01', '2023-04-12 08:14:01');
INSERT INTO `user` VALUES (3, 'zxczxcz', 'ddasda@gmail.com', '$2y$10$BAvO4Cxlt/hpU11tpcw9X.7gLMmkuApCIB1b0gXAyMO7b.hiCv4u6', '2023-04-12 08:20:12', '2023-04-12 08:20:12');
INSERT INTO `user` VALUES (4, 'xzczxczx', 'cczxcz@gmail.com', '$2y$10$PL8cADPjQEdpnybbJoyI4ufPvaGrekCu3IbkQJSDWE1H3Wy2TYS5u', '2023-04-12 08:26:00', '2023-04-12 08:26:00');
INSERT INTO `user` VALUES (5, 'zxczxczx', 'vvxz@gmail.om', '$2y$10$RdKtHleUhBqXtRQBLRxyoOzgGS2xBL0GI8LW9TqzV9gL1jSdMOA8i', '2023-04-12 08:26:34', '2023-04-12 08:26:34');
INSERT INTO `user` VALUES (6, 'Dera Abdul Gani', 'deraabdulgani@gmail.com', '$2y$10$EafB872lFXtxlX/EH7dkEO7zYCjO2zWYjrcWNOuuP/paiidyGo9Hq', '2023-04-12 08:30:28', '2023-04-12 08:30:28');

SET FOREIGN_KEY_CHECKS = 1;
