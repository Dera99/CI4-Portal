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

 Date: 15/04/2023 13:21:31
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
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (32, '2023-04-12-042638', 'App\\Database\\Migrations\\Users', 'default', 'App', 1681535672, 1);
INSERT INTO `migrations` VALUES (33, '2023-04-12-043550', 'App\\Database\\Migrations\\PasswordResetTokens', 'default', 'App', 1681535672, 1);
INSERT INTO `migrations` VALUES (34, '2023-04-12-044252', 'App\\Database\\Migrations\\News', 'default', 'App', 1681535672, 1);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `images` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'dera Testing Read Post', 'D4G Dev', 'deraabdulgani@gmail.com', '1681536635_94cc24b62167058e704b.jpg', '2023-04-15 05:30:35', '2023-04-15 05:30:35');
INSERT INTO `news` VALUES (2, 'Testing Post', '2312', 'deraabdulgani@gmail.com', '1681536795_249d7325465fa75cf0d3.jpg', '2023-04-15 05:33:15', '2023-04-15 05:33:15');
INSERT INTO `news` VALUES (3, 'generator', 'Test post', 'deraabdulgani@gmail.com', '1681536806_2ec0ef151f27752083c9.jpg', '2023-04-15 05:33:26', '2023-04-15 05:33:26');
INSERT INTO `news` VALUES (4, 'Testing', 'Banyak Posting ', 'deraabdulgani@gmail.com', '1681536822_0c5cbf0685bb917b560a.jpg', '2023-04-15 05:33:42', '2023-04-15 05:33:42');
INSERT INTO `news` VALUES (5, 'Testing', 'Banyak Posting ', 'deraabdulgani@gmail.com', '1681536822_0c5cbf0685bb917b560a.jpg', '2023-04-15 05:33:42', '2023-04-15 05:33:42');
INSERT INTO `news` VALUES (6, 'Testing', 'Banyak Posting ', 'deraabdulgani@gmail.com', '1681536822_0c5cbf0685bb917b560a.jpg', '2023-04-15 05:33:42', '2023-04-15 05:33:42');
INSERT INTO `news` VALUES (7, 'Testing', 'Banyak Posting ', 'deraabdulgani@gmail.com', '1681536822_0c5cbf0685bb917b560a.jpg', '2023-04-15 05:33:42', '2023-04-15 05:33:42');
INSERT INTO `news` VALUES (8, 'Test Without Image', 'Succes without img', 'deraabdulgani@gmail.com', '', '2023-04-15 06:02:53', '2023-04-15 06:02:53');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `profile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'dera', 'deraabdulgani@gmail.com', '1681535697_d8542db0b19c8c665516.webp', '$2y$10$U.XISvBBrWHG37RuRtUAB.yPXLd8JESsind0LUnziRFz9.8RARZBW', '2023-04-15 05:14:57', '2023-04-15 05:58:45');

SET FOREIGN_KEY_CHECKS = 1;
