/*
 Navicat Premium Data Transfer

 Source Server         : Local 
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : sistem_informasi_kaderisasi

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 07/04/2024 10:31:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for actions
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO `actions` VALUES (1, 'view', '2024-03-29 21:22:15', NULL);
INSERT INTO `actions` VALUES (2, 'create', '2024-03-29 21:22:15', NULL);
INSERT INTO `actions` VALUES (3, 'update', '2024-03-29 21:22:15', NULL);
INSERT INTO `actions` VALUES (4, 'delete', '2024-03-29 21:22:15', NULL);
INSERT INTO `actions` VALUES (5, 'download', '2024-03-29 21:22:15', NULL);

-- ----------------------------
-- Table structure for cabang
-- ----------------------------
DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cabang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES (1, 'PC IMM KOTA SURAKARTA', '2024-03-31 22:14:14', '2024-04-07 09:53:20', NULL);

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumen
-- ----------------------------
INSERT INTO `dokumen` VALUES (1, 'Nama dokumen', '/dokumen/1711733064_pks_file.pdf', 1, '2024-03-30 00:07:58', '2024-03-30 00:25:12', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for kader
-- ----------------------------
DROP TABLE IF EXISTS `kader`;
CREATE TABLE `kader`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sosial_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kebangsaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_menikah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `domisili` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `komisariat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `universitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kader
-- ----------------------------
INSERT INTO `kader` VALUES (72, 'Sutopo Seno', '0853359661000', '123132W@gmail.om', 'Sutopo_Seno', 'Pria', 'Islam', 'WNA', 'Menikah', 'Boyolali', '2024-04-18', 'Domisili Domisili Domisili DomisiliDomisili Domisili Domisili DomisiliDomisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili DomisiliDomisi', '/foto/1712099657_IMM.png', 'Kota Surakarta', 'PK IMM AVICENNA F.FARM UMS', 'Universitas Muhammadiyah Surakarta', 'Fakultas 1', 'Program Studi 1', '2024-04-03 06:14:17', '2024-04-05 12:52:29', NULL, NULL);
INSERT INTO `kader` VALUES (73, 'Sutopo !@#1', '123123123', 'qqwe@gmail.com', 'asdasdasd', 'Pria', 'Kristen Protestan', 'WNI', 'Menikah', 'Boyolasdl', '2024-04-27', 'Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili', '/foto/1712459573_WhatsApp Image 2024-03-29 at 4.31.06 AM.jpeg', 'Kota Surakarta', 'PK IMM AVICENNA F.FARM UMS', 'Universitas Muhammadiyah Surakarta', 'Fakultas 1', 'Program Studi 2', '2024-04-07 10:12:53', '2024-04-07 10:14:28', '2024-04-07 10:14:28', 13);
INSERT INTO `kader` VALUES (74, 'Sutopo !@#1', '123123123', 'qqwe@gmail.com', 'asdasdasd', 'Pria', 'Kristen Protestan', 'WNI', 'Menikah', 'Boyolasdl', '2024-04-27', 'Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili  Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili Domisili', '/foto/1712459583_WhatsApp Image 2024-03-29 at 4.31.06 AM.jpeg', 'Kota Surakarta', 'PK IMM AVICENNA F.FARM UMS', 'Universitas Muhammadiyah Surakarta', 'Fakultas 1', 'Program Studi 2', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL, 13);

-- ----------------------------
-- Table structure for kampus
-- ----------------------------
DROP TABLE IF EXISTS `kampus`;
CREATE TABLE `kampus`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kampus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kampus
-- ----------------------------
INSERT INTO `kampus` VALUES (1, 'Universitas Muhammadiyah Surakarta', '2024-03-31 22:13:48', '2024-03-31 22:13:57', NULL);
INSERT INTO `kampus` VALUES (2, 'Universitas Sebelas Maret', NULL, NULL, NULL);
INSERT INTO `kampus` VALUES (3, 'Universitas Islam Negeri (UIN) Raden Mas Said Surakarta', NULL, NULL, NULL);
INSERT INTO `kampus` VALUES (4, 'STIKES PKU MUH. SURAKARTA', NULL, NULL, NULL);
INSERT INTO `kampus` VALUES (5, 'STIKES AISYIYAH SURAKARTA', NULL, NULL, NULL);
INSERT INTO `kampus` VALUES (6, 'STIKES AISYIYAH SURAKARTA', NULL, NULL, NULL);
INSERT INTO `kampus` VALUES (7, 'Politeknik Kesehatan Kemenkes Surakarta', NULL, NULL, NULL);
INSERT INTO `kampus` VALUES (8, 'Universitas Slamet Riyadi Surakarta', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for komisariat
-- ----------------------------
DROP TABLE IF EXISTS `komisariat`;
CREATE TABLE `komisariat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `komisariat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of komisariat
-- ----------------------------
INSERT INTO `komisariat` VALUES (1, 'PK IMM FIK UMS', '2024-03-31 21:54:01', '2024-03-31 21:54:01', NULL);
INSERT INTO `komisariat` VALUES (2, 'PK IMM AVICENNA F.FARM UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (3, 'PK IMM FKIP UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (4, 'PK IMM AHMAD DAHLAN FH UMS', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `komisariat` VALUES (5, 'PK IMM AL IDRISI F.GEO UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (6, 'PK IMM MOH. HATTA FEB UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (7, 'PK IMM ADAM MALIK FKI UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (8, 'PK IMM AL GHOZALI F.PSI UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (9, 'PK IMM AVERROES FT UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (10, 'PK IMM AR RAZI FK UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (11, 'PK IMM AL ZAHRAWI FKG UMS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (12, 'PK IMM DJAZMAN AL KINDI (UIN) RADEN MAS SAID SURAKARTA', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (13, 'PK IMM STIKES AISYIYAH SURAKARTA', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (14, 'PK IMM KI BAGUS HADIKUSUMO UNS', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (15, 'PK IMM AL FATIH STIKES PKU MUH. SURAKARTA', NULL, NULL, NULL);
INSERT INTO `komisariat` VALUES (17, 'PK IMM JENDRAL SOEDIRMAN', '2024-04-07 09:58:55', '2024-04-07 09:58:55', NULL);

-- ----------------------------
-- Table structure for menu_roles
-- ----------------------------
DROP TABLE IF EXISTS `menu_roles`;
CREATE TABLE `menu_roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `action_id` int UNSIGNED NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 126 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_roles
-- ----------------------------
INSERT INTO `menu_roles` VALUES (1, 1, 1, 1, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (2, 1, 1, 2, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (3, 1, 1, 3, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (4, 1, 1, 4, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (5, 1, 1, 5, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (6, 2, 1, 1, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (7, 2, 1, 2, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (8, 2, 1, 3, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (9, 2, 1, 4, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (10, 2, 1, 5, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (11, 3, 1, 1, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (12, 3, 1, 2, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (13, 3, 1, 3, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (14, 3, 1, 4, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (15, 3, 1, 5, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (16, 4, 1, 1, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (17, 4, 1, 2, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (18, 4, 1, 3, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (19, 4, 1, 4, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (20, 4, 1, 5, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (21, 1, 2, 1, 1, '2024-03-29 21:22:15', NULL);
INSERT INTO `menu_roles` VALUES (22, 1, 2, 2, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (23, 1, 2, 3, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (24, 1, 2, 4, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (25, 1, 2, 5, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (26, 2, 2, 1, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (27, 2, 2, 2, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (28, 2, 2, 3, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (29, 2, 2, 4, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (30, 2, 2, 5, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (31, 3, 2, 1, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (32, 3, 2, 2, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (33, 3, 2, 3, 0, '2024-03-29 23:07:01', '2024-03-29 23:07:01');
INSERT INTO `menu_roles` VALUES (34, 3, 2, 4, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (35, 3, 2, 5, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (36, 4, 2, 1, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (37, 4, 2, 2, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (38, 4, 2, 3, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (39, 4, 2, 4, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (40, 4, 2, 5, 0, '2024-03-29 23:07:02', '2024-03-29 23:07:02');
INSERT INTO `menu_roles` VALUES (41, 1, 3, 1, 1, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (42, 1, 3, 2, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (43, 1, 3, 3, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (44, 1, 3, 4, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (45, 1, 3, 5, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (46, 2, 3, 1, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (47, 2, 3, 2, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (48, 2, 3, 3, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (49, 2, 3, 4, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (50, 2, 3, 5, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (51, 3, 3, 1, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (52, 3, 3, 2, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (53, 3, 3, 3, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (54, 3, 3, 4, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (55, 3, 3, 5, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (56, 4, 3, 1, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (57, 4, 3, 2, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (58, 4, 3, 3, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (59, 4, 3, 4, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (60, 4, 3, 5, 0, '2024-03-29 23:07:07', '2024-03-29 23:07:07');
INSERT INTO `menu_roles` VALUES (61, 5, 2, 1, 1, '2024-03-29 23:35:43', '2024-03-29 23:35:43');
INSERT INTO `menu_roles` VALUES (62, 5, 2, 2, 1, '2024-03-29 23:35:43', '2024-03-29 23:35:43');
INSERT INTO `menu_roles` VALUES (63, 5, 2, 3, 1, '2024-03-29 23:35:43', '2024-03-29 23:35:43');
INSERT INTO `menu_roles` VALUES (64, 5, 2, 4, 1, '2024-03-29 23:35:43', '2024-03-29 23:35:43');
INSERT INTO `menu_roles` VALUES (65, 5, 2, 5, 1, '2024-03-29 23:35:43', '2024-03-29 23:35:43');
INSERT INTO `menu_roles` VALUES (66, 5, 3, 1, 1, '2024-03-30 00:25:51', '2024-03-30 00:25:51');
INSERT INTO `menu_roles` VALUES (67, 5, 3, 2, 0, '2024-03-30 00:25:51', '2024-03-30 00:25:51');
INSERT INTO `menu_roles` VALUES (68, 5, 3, 3, 0, '2024-03-30 00:25:51', '2024-03-30 00:25:51');
INSERT INTO `menu_roles` VALUES (69, 5, 3, 4, 0, '2024-03-30 00:25:51', '2024-03-30 00:25:51');
INSERT INTO `menu_roles` VALUES (70, 5, 3, 5, 1, '2024-03-30 00:25:51', '2024-03-30 00:25:51');
INSERT INTO `menu_roles` VALUES (71, 6, 2, 1, 1, '2024-03-30 00:50:43', '2024-03-30 00:50:43');
INSERT INTO `menu_roles` VALUES (72, 6, 2, 2, 1, '2024-03-30 00:50:43', '2024-03-30 00:50:43');
INSERT INTO `menu_roles` VALUES (73, 6, 2, 3, 1, '2024-03-30 00:50:43', '2024-03-30 00:50:43');
INSERT INTO `menu_roles` VALUES (74, 6, 2, 4, 1, '2024-03-30 00:50:43', '2024-03-30 00:50:43');
INSERT INTO `menu_roles` VALUES (75, 6, 2, 5, 1, '2024-03-30 00:50:43', '2024-03-30 00:50:43');
INSERT INTO `menu_roles` VALUES (76, 6, 3, 1, 1, '2024-03-30 00:50:52', '2024-03-30 00:50:52');
INSERT INTO `menu_roles` VALUES (77, 6, 3, 2, 1, '2024-03-30 00:50:53', '2024-03-30 00:50:53');
INSERT INTO `menu_roles` VALUES (78, 6, 3, 3, 1, '2024-03-30 00:50:53', '2024-03-30 00:50:53');
INSERT INTO `menu_roles` VALUES (79, 6, 3, 4, 1, '2024-03-30 00:50:53', '2024-03-30 00:50:53');
INSERT INTO `menu_roles` VALUES (80, 6, 3, 5, 1, '2024-03-30 00:50:53', '2024-03-30 00:50:53');
INSERT INTO `menu_roles` VALUES (81, 7, 3, 1, 1, '2024-03-30 00:54:34', '2024-03-30 00:54:34');
INSERT INTO `menu_roles` VALUES (82, 7, 3, 2, 1, '2024-03-30 00:54:34', '2024-03-30 00:54:34');
INSERT INTO `menu_roles` VALUES (83, 7, 3, 3, 1, '2024-03-30 00:54:34', '2024-03-30 00:54:34');
INSERT INTO `menu_roles` VALUES (84, 7, 3, 4, 1, '2024-03-30 00:54:34', '2024-03-30 00:54:34');
INSERT INTO `menu_roles` VALUES (85, 7, 3, 5, 1, '2024-03-30 00:54:34', '2024-03-30 00:54:34');
INSERT INTO `menu_roles` VALUES (86, 7, 2, 1, 1, '2024-03-30 00:54:43', '2024-03-30 00:54:43');
INSERT INTO `menu_roles` VALUES (87, 7, 2, 2, 1, '2024-03-30 00:54:43', '2024-03-30 00:54:43');
INSERT INTO `menu_roles` VALUES (88, 7, 2, 3, 1, '2024-03-30 00:54:43', '2024-03-30 00:54:43');
INSERT INTO `menu_roles` VALUES (89, 7, 2, 4, 1, '2024-03-30 00:54:43', '2024-03-30 00:54:43');
INSERT INTO `menu_roles` VALUES (90, 7, 2, 5, 1, '2024-03-30 00:54:43', '2024-03-30 00:54:43');
INSERT INTO `menu_roles` VALUES (91, 5, 1, 1, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (92, 5, 1, 2, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (93, 5, 1, 3, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (94, 5, 1, 4, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (95, 5, 1, 5, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (96, 6, 1, 1, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (97, 6, 1, 2, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (98, 6, 1, 3, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (99, 6, 1, 4, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (100, 6, 1, 5, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (101, 7, 1, 1, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (102, 7, 1, 2, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (103, 7, 1, 3, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (104, 7, 1, 4, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (105, 7, 1, 5, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (106, 8, 1, 1, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (107, 8, 1, 2, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (108, 8, 1, 3, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (109, 8, 1, 4, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (110, 8, 1, 5, 0, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (111, 9, 1, 1, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (112, 9, 1, 2, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (113, 9, 1, 3, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (114, 9, 1, 4, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (115, 9, 1, 5, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (116, 10, 1, 1, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (117, 10, 1, 2, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (118, 10, 1, 3, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (119, 10, 1, 4, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (120, 10, 1, 5, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (121, 11, 1, 1, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (122, 11, 1, 2, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (123, 11, 1, 3, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (124, 11, 1, 4, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');
INSERT INTO `menu_roles` VALUES (125, 11, 1, 5, 1, '2024-03-31 05:45:18', '2024-03-31 05:45:18');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_order` int UNSIGNED NULL DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, NULL, 'Beranda', 'beranda', 1, 'dashboard', 'bx bx-home-circle', 1, '2024-03-29 21:22:15', NULL, NULL);
INSERT INTO `menus` VALUES (2, NULL, 'Pengguna', 'pengguna', 2, 'users', 'bx bx-user', 1, '2024-03-29 21:22:15', NULL, NULL);
INSERT INTO `menus` VALUES (3, NULL, 'Manajemen Menu', 'manajemen_menu', 3, 'manajemen-menu', 'bx bx-food-menu', 1, '2024-03-29 21:22:15', NULL, NULL);
INSERT INTO `menus` VALUES (4, NULL, 'Otoritas', 'otoritas', 4, 'otoritas', 'bx bx-check-shield', 1, '2024-03-29 21:22:15', NULL, NULL);
INSERT INTO `menus` VALUES (5, NULL, 'Dokumen', 'dokumen', 4, 'dokumen', 'bx bx-book', 1, '2024-03-29 23:34:42', '2024-03-29 23:34:42', NULL);
INSERT INTO `menus` VALUES (6, NULL, 'Timeline', 'timeline', 3, 'timeline', 'bx bx-calendar-event', 1, '2024-03-30 00:50:30', '2024-03-30 00:50:30', NULL);
INSERT INTO `menus` VALUES (7, NULL, 'Kader', 'kader', 2, 'kader', 'bx bx-user-circle', 1, '2024-03-30 00:54:24', '2024-03-31 22:43:06', NULL);
INSERT INTO `menus` VALUES (8, NULL, 'Referensi', 'referensi', 5, 'referensi', 'bx bx-grid-small', 1, '2024-03-31 05:43:11', '2024-03-31 05:43:11', NULL);
INSERT INTO `menus` VALUES (9, 8, 'Kampus', 'kampus', NULL, 'kampus', NULL, 1, '2024-03-31 05:44:05', '2024-03-31 05:44:05', NULL);
INSERT INTO `menus` VALUES (10, 8, 'Cabang', 'cabang', NULL, 'cabang', NULL, 1, '2024-03-31 05:44:33', '2024-03-31 05:44:33', NULL);
INSERT INTO `menus` VALUES (11, 8, 'Komisariat', 'komisariat', NULL, 'komisariat', NULL, 1, '2024-03-31 05:44:55', '2024-03-31 21:38:47', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2022_06_25_061319_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_06_25_061544_create_actions_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_06_25_061702_create_user_roles_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_06_25_062431_create_menus_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_06_25_062843_create_menu_roles_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for ref_pendidikan_terakhir
-- ----------------------------
DROP TABLE IF EXISTS `ref_pendidikan_terakhir`;
CREATE TABLE `ref_pendidikan_terakhir`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kader_id` int NULL DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_pendidikan_terakhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_pendidikan_terakhir
-- ----------------------------
INSERT INTO `ref_pendidikan_terakhir` VALUES (1, 49, 'Diploma', 'Aktif', '2024-04-02 04:45:33', '2024-04-02 04:45:33', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (2, 50, 'Diploma', 'Aktif', '2024-04-02 07:39:49', '2024-04-02 07:39:49', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (3, 50, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:39:49', '2024-04-02 07:39:49', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (4, 51, 'Diploma', 'Aktif', '2024-04-02 07:41:05', '2024-04-02 07:41:05', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (5, 51, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:41:05', '2024-04-02 07:41:05', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (6, 52, 'Diploma', 'Aktif', '2024-04-02 07:41:23', '2024-04-02 07:41:23', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (7, 52, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:41:23', '2024-04-02 07:41:23', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (8, 53, 'Diploma', 'Aktif', '2024-04-02 07:42:18', '2024-04-02 07:42:18', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (9, 53, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:42:18', '2024-04-02 07:42:18', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (10, 54, 'Diploma', 'Aktif', '2024-04-02 07:42:37', '2024-04-02 07:42:37', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (11, 54, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:42:37', '2024-04-02 07:42:37', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (12, 55, 'Diploma', 'Aktif', '2024-04-02 07:43:54', '2024-04-02 07:43:54', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (13, 55, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:43:54', '2024-04-02 07:43:54', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (14, 56, 'Diploma', 'Aktif', '2024-04-02 07:44:10', '2024-04-02 07:44:10', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (15, 56, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:44:10', '2024-04-02 07:44:10', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (16, 57, 'Diploma', 'Aktif', '2024-04-02 07:48:10', '2024-04-02 07:48:10', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (17, 57, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:48:10', '2024-04-02 07:48:10', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (18, 58, 'Diploma', 'Aktif', '2024-04-02 07:59:49', '2024-04-02 07:59:49', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (19, 58, 'Sarjana', 'Tidak Aktif', '2024-04-02 07:59:49', '2024-04-02 07:59:49', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (20, 59, 'Diploma', 'Aktif', '2024-04-02 08:02:31', '2024-04-02 08:02:31', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (21, 59, 'Sarjana', 'Tidak Aktif', '2024-04-02 08:02:31', '2024-04-02 08:02:31', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (22, 60, 'Diploma', 'Aktif', '2024-04-02 08:03:28', '2024-04-02 08:03:28', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (23, 60, 'Sarjana', 'Tidak Aktif', '2024-04-02 08:03:28', '2024-04-02 08:03:28', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (24, 61, 'Sarjana', 'Aktif', '2024-04-03 05:53:33', '2024-04-03 05:53:33', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (25, 61, 'Megister', 'Aktif', '2024-04-03 05:53:33', '2024-04-03 05:53:33', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (26, 62, 'Sarjana', 'Aktif', '2024-04-03 05:54:55', '2024-04-03 05:54:55', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (27, 62, 'Megister', 'Aktif', '2024-04-03 05:54:55', '2024-04-03 05:54:55', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (28, 63, 'Sarjana', 'Aktif', '2024-04-03 05:55:45', '2024-04-03 05:55:45', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (29, 63, 'Megister', 'Aktif', '2024-04-03 05:55:45', '2024-04-03 05:55:45', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (30, 64, 'Sarjana', 'Aktif', '2024-04-03 05:56:45', '2024-04-03 05:56:45', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (31, 64, 'Megister', 'Aktif', '2024-04-03 05:56:45', '2024-04-03 05:56:45', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (32, 65, 'Sarjana', 'Aktif', '2024-04-03 05:57:38', '2024-04-03 05:57:38', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (33, 65, 'Megister', 'Aktif', '2024-04-03 05:57:38', '2024-04-03 05:57:38', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (34, 66, 'Sarjana', 'Aktif', '2024-04-03 06:05:30', '2024-04-03 06:05:30', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (35, 66, 'Megister', 'Aktif', '2024-04-03 06:05:30', '2024-04-03 06:05:30', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (36, 67, 'Sarjana', 'Aktif', '2024-04-03 06:05:54', '2024-04-03 06:05:54', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (37, 67, 'Megister', 'Aktif', '2024-04-03 06:05:54', '2024-04-03 06:05:54', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (38, 68, 'Sarjana', 'Aktif', '2024-04-03 06:06:14', '2024-04-04 16:50:18', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (39, 68, 'Megister', 'Aktif', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (40, 69, 'Sarjana', 'Aktif', '2024-04-03 06:13:00', '2024-04-04 20:28:42', '2024-04-04 20:28:42');
INSERT INTO `ref_pendidikan_terakhir` VALUES (41, 69, 'Megister', 'Aktif', '2024-04-03 06:13:00', '2024-04-04 21:20:32', '2024-04-04 21:20:32');
INSERT INTO `ref_pendidikan_terakhir` VALUES (42, 70, 'Sarjana', 'Aktif', '2024-04-03 06:13:21', '2024-04-04 21:25:15', '2024-04-04 21:25:15');
INSERT INTO `ref_pendidikan_terakhir` VALUES (43, 70, 'Megister', 'Aktif', '2024-04-03 06:13:21', '2024-04-04 21:20:40', '2024-04-04 21:20:40');
INSERT INTO `ref_pendidikan_terakhir` VALUES (44, 71, 'Sarjana', 'Aktif', '2024-04-03 06:13:41', '2024-04-04 21:25:45', '2024-04-04 21:25:45');
INSERT INTO `ref_pendidikan_terakhir` VALUES (45, 71, 'Megister', 'Aktif', '2024-04-03 06:13:41', '2024-04-04 21:25:43', '2024-04-04 21:25:43');
INSERT INTO `ref_pendidikan_terakhir` VALUES (46, 72, 'Sarjana', 'Tidak Aktif', '2024-04-03 06:14:17', '2024-04-04 21:25:40', '2024-04-04 21:25:40');
INSERT INTO `ref_pendidikan_terakhir` VALUES (47, 72, 'Megister', 'Aktif', '2024-04-03 06:14:17', '2024-04-04 17:39:36', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (50, 72, 'Doktor', 'Tidak Aktif', '2024-04-04 15:37:50', '2024-04-05 00:37:34', '2024-04-05 00:37:34');
INSERT INTO `ref_pendidikan_terakhir` VALUES (66, 72, 'Diploma', 'Tidak Aktif', '2024-04-05 09:29:31', '2024-04-05 09:46:30', '2024-04-05 09:46:30');
INSERT INTO `ref_pendidikan_terakhir` VALUES (67, 72, 'Diploma', 'Aktif', '2024-04-05 09:46:23', '2024-04-05 09:46:23', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (68, 72, 'Sarjana', 'Cuti', '2024-04-05 11:29:23', '2024-04-05 11:29:26', '2024-04-05 11:29:26');
INSERT INTO `ref_pendidikan_terakhir` VALUES (69, 73, 'Sarjana', 'Aktif', '2024-04-07 10:12:53', '2024-04-07 10:12:53', NULL);
INSERT INTO `ref_pendidikan_terakhir` VALUES (70, 74, 'Sarjana', 'Aktif', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL);

-- ----------------------------
-- Table structure for ref_pengalaman_organisasi_imm
-- ----------------------------
DROP TABLE IF EXISTS `ref_pengalaman_organisasi_imm`;
CREATE TABLE `ref_pengalaman_organisasi_imm`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kader_id` int NULL DEFAULT NULL,
  `posisi_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mulai_organisasi` date NULL DEFAULT NULL,
  `selesai_organisasi` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_pengalaman_organisasi_imm
-- ----------------------------
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (43, 72, 'KETum 123132', '2024-04-04', '2024-04-03', '2024-04-03 06:14:17', '2024-04-04 21:20:40', NULL);
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (44, 72, 'KETum 123132 4', '2024-04-18', '2024-04-27', '2024-04-03 06:14:17', '2024-04-04 22:24:29', NULL);
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (45, 72, 'KETum 123132 6', '2024-04-25', '2024-04-25', '2024-04-03 06:14:17', '2024-04-05 01:11:41', NULL);
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (88, 72, 'KETum 123132 6 13 123123123123', '2024-04-20', '2024-04-10', '2024-04-05 11:29:38', '2024-04-05 11:31:49', '2024-04-05 11:31:49');
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (89, 72, 'KETum 123132 6KETum 123132 6KETum 123132 6KETum 123132 6KETum 123132 6KETum 123132 6', '2024-05-05', '2024-04-24', '2024-04-05 11:31:58', '2024-04-05 12:31:32', '2024-04-05 12:31:32');
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (90, 72, 'Posisi/Jabatan KETum 123132 6 Mulai 25/04/2024 Selesai 25/04/2024 Posisi/Jabatan', '2024-04-20', '2024-04-11', '2024-04-05 12:31:43', '2024-04-05 12:31:43', NULL);
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (91, 72, 'Mulai 20/04/2024 Selesai 11/04/2024 Posisi/Jabatan', '2024-04-12', '2024-04-12', '2024-04-05 12:32:41', '2024-04-05 12:52:39', '2024-04-05 12:52:39');
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (92, 73, '123123123', '2024-04-18', '2024-05-07', '2024-04-07 10:12:53', '2024-04-07 10:12:53', NULL);
INSERT INTO `ref_pengalaman_organisasi_imm` VALUES (93, 74, '123123123', '2024-04-18', '2024-05-07', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL);

-- ----------------------------
-- Table structure for ref_pengalaman_organisasi_lainnya
-- ----------------------------
DROP TABLE IF EXISTS `ref_pengalaman_organisasi_lainnya`;
CREATE TABLE `ref_pengalaman_organisasi_lainnya`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kader_id` int NULL DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `posisi_jabatan_lainnya` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mulai_organisasi` date NULL DEFAULT NULL,
  `selesai_organisasi` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_pengalaman_organisasi_lainnya
-- ----------------------------
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (42, 72, '23123131', 'Ketum123', '2024-04-04', '2024-04-03', '2024-04-04 21:19:48', '2024-04-05 12:34:50', NULL);
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (100, 72, '123', '123', '2024-04-18', '2024-04-27', '2024-04-05 10:04:21', '2024-04-05 12:52:44', '2024-04-05 12:52:44');
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (101, 72, 'Olengg 2', 'Ketum 3', '2024-04-18', '2024-04-27', '2024-04-05 10:04:21', '2024-04-05 12:33:44', '2024-04-05 12:33:44');
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (102, 72, 'Olengg 2', 'Ketum 3', '2024-04-18', '2024-04-27', '2024-04-05 10:08:13', '2024-04-05 12:33:41', '2024-04-05 12:33:41');
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (103, 72, '123', '123', '2024-04-18', '2024-04-27', '2024-04-05 10:09:54', '2024-04-05 12:33:40', '2024-04-05 12:33:40');
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (106, 72, 'Tempat', 'Posisi/Jabatan 1212', '2024-04-25', '2024-04-25', '2024-04-05 12:34:50', '2024-04-05 12:35:00', '2024-04-05 12:35:00');
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (107, 72, 'Tempat Tempat Posisi/Jabatan', 'Posisi/Jabatan Posisi Mulai', '2024-04-25', '2024-04-25', '2024-04-05 12:35:16', '2024-04-05 12:35:16', NULL);
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (108, 72, 'Tempat 112313', 'Tempat 112313 Posisi/Jabatan 1231231321', '2024-04-20', '2024-04-11', '2024-04-05 12:45:14', '2024-04-05 12:45:14', NULL);
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (109, 73, '123123', '1231231', '2024-04-18', '2024-05-07', '2024-04-07 10:12:53', '2024-04-07 10:12:53', NULL);
INSERT INTO `ref_pengalaman_organisasi_lainnya` VALUES (110, 74, '123123', '1231231', '2024-04-18', '2024-05-07', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL);

-- ----------------------------
-- Table structure for ref_perkaderan
-- ----------------------------
DROP TABLE IF EXISTS `ref_perkaderan`;
CREATE TABLE `ref_perkaderan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kader_id` int NULL DEFAULT NULL,
  `kegiatan_perkaderan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_perkaderan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_perkaderan
-- ----------------------------
INSERT INTO `ref_perkaderan` VALUES (1, 68, 'DAD', '2023', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_perkaderan` VALUES (2, 68, 'DAM', '2025', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_perkaderan` VALUES (3, 68, 'DAP', '2027', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_perkaderan` VALUES (4, 69, 'DAD', '2023', '2024-04-03 06:13:00', '2024-04-03 06:13:00', NULL);
INSERT INTO `ref_perkaderan` VALUES (5, 69, 'DAM', '2025', '2024-04-03 06:13:00', '2024-04-03 06:13:00', NULL);
INSERT INTO `ref_perkaderan` VALUES (6, 69, 'DAP', '2027', '2024-04-03 06:13:00', '2024-04-03 06:13:00', NULL);
INSERT INTO `ref_perkaderan` VALUES (7, 70, 'DAD', '2023', '2024-04-03 06:13:21', '2024-04-03 06:13:21', NULL);
INSERT INTO `ref_perkaderan` VALUES (8, 70, 'DAM', '2025', '2024-04-03 06:13:21', '2024-04-03 06:13:21', NULL);
INSERT INTO `ref_perkaderan` VALUES (9, 70, 'DAP', '2027', '2024-04-03 06:13:21', '2024-04-03 06:13:21', NULL);
INSERT INTO `ref_perkaderan` VALUES (10, 71, 'DAD', '2023', '2024-04-03 06:13:41', '2024-04-03 06:13:41', NULL);
INSERT INTO `ref_perkaderan` VALUES (11, 71, 'DAM', '2025', '2024-04-03 06:13:41', '2024-04-03 06:13:41', NULL);
INSERT INTO `ref_perkaderan` VALUES (12, 71, 'DAP', '2027', '2024-04-03 06:13:41', '2024-04-03 06:13:41', NULL);
INSERT INTO `ref_perkaderan` VALUES (13, 72, 'DAP', '2027', '2024-04-03 06:14:17', '2024-04-05 12:49:23', '2024-04-05 12:49:23');
INSERT INTO `ref_perkaderan` VALUES (14, 72, 'DAM', '2025', '2024-04-03 06:14:17', '2024-04-03 06:14:17', NULL);
INSERT INTO `ref_perkaderan` VALUES (15, 72, 'DAP', '2027', '2024-04-03 06:14:17', '2024-04-03 06:14:17', NULL);
INSERT INTO `ref_perkaderan` VALUES (17, 72, NULL, NULL, '2024-04-04 15:36:03', '2024-04-05 10:39:55', '2024-04-05 10:39:55');
INSERT INTO `ref_perkaderan` VALUES (18, 72, NULL, NULL, '2024-04-05 10:40:03', '2024-04-05 10:40:10', '2024-04-05 10:40:10');
INSERT INTO `ref_perkaderan` VALUES (19, 72, NULL, NULL, '2024-04-05 10:40:13', '2024-04-05 10:40:22', '2024-04-05 10:40:22');
INSERT INTO `ref_perkaderan` VALUES (20, 72, 'DAD', '2323', '2024-04-05 12:36:57', '2024-04-05 12:37:16', '2024-04-05 12:37:16');
INSERT INTO `ref_perkaderan` VALUES (21, 72, NULL, NULL, '2024-04-05 12:38:14', '2024-04-05 12:38:23', '2024-04-05 12:38:23');
INSERT INTO `ref_perkaderan` VALUES (22, 72, NULL, NULL, '2024-04-05 12:38:36', '2024-04-05 12:38:40', '2024-04-05 12:38:40');
INSERT INTO `ref_perkaderan` VALUES (23, 72, NULL, NULL, '2024-04-05 12:38:44', '2024-04-05 12:38:49', '2024-04-05 12:38:49');
INSERT INTO `ref_perkaderan` VALUES (24, 72, 'DAD', '2027', '2024-04-05 12:38:44', '2024-04-05 12:41:13', '2024-04-05 12:41:13');
INSERT INTO `ref_perkaderan` VALUES (25, 72, 'DAD', '1232', '2024-04-05 12:49:29', '2024-04-05 12:49:29', NULL);
INSERT INTO `ref_perkaderan` VALUES (26, 73, 'DAM', '2313', '2024-04-07 10:12:53', '2024-04-07 10:12:53', NULL);
INSERT INTO `ref_perkaderan` VALUES (27, 74, 'DAM', '2313', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL);

-- ----------------------------
-- Table structure for ref_pimpinan
-- ----------------------------
DROP TABLE IF EXISTS `ref_pimpinan`;
CREATE TABLE `ref_pimpinan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kader_id` int NULL DEFAULT NULL,
  `kegiatan_pimpinan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_pimpinan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_pimpinan
-- ----------------------------
INSERT INTO `ref_pimpinan` VALUES (1, 72, 'PIP', '2028', '2024-04-03 06:14:17', '2024-04-05 12:49:41', '2024-04-05 12:49:41');
INSERT INTO `ref_pimpinan` VALUES (2, 72, 'PIM', '2026', '2024-04-03 06:14:17', '2024-04-03 06:14:17', NULL);
INSERT INTO `ref_pimpinan` VALUES (3, 72, 'PIP', '2028', '2024-04-03 06:14:17', '2024-04-05 11:28:21', NULL);
INSERT INTO `ref_pimpinan` VALUES (6, 72, NULL, NULL, '2024-04-05 12:38:14', '2024-04-05 12:38:26', '2024-04-05 12:38:26');
INSERT INTO `ref_pimpinan` VALUES (7, 72, NULL, NULL, '2024-04-05 12:38:36', '2024-04-05 12:38:51', '2024-04-05 12:38:51');
INSERT INTO `ref_pimpinan` VALUES (8, 72, 'PID', '1232', '2024-04-05 12:52:29', '2024-04-05 12:52:29', NULL);
INSERT INTO `ref_pimpinan` VALUES (9, 73, 'PID', '1323123', '2024-04-07 10:12:53', '2024-04-07 10:12:53', NULL);
INSERT INTO `ref_pimpinan` VALUES (10, 74, 'PID', '1323123', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL);

-- ----------------------------
-- Table structure for ref_riwayat_sekolah
-- ----------------------------
DROP TABLE IF EXISTS `ref_riwayat_sekolah`;
CREATE TABLE `ref_riwayat_sekolah`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kader_id` int NULL DEFAULT NULL,
  `jenjang_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_lulus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 125 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_riwayat_sekolah
-- ----------------------------
INSERT INTO `ref_riwayat_sekolah` VALUES (1, 33, 'SD,SMP,SMA', 'asdasd sd,123123 smp,123123 SMA', '1233,12321,123123', '2024-04-02 02:14:13', '2024-04-02 02:14:13', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (2, 37, 'SD', 'asdasd sd', '1233', '2024-04-02 02:23:54', '2024-04-02 02:23:54', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (3, 37, 'SMP', '123123 smp', '12321', '2024-04-02 02:23:54', '2024-04-02 02:23:54', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (4, 37, 'SMA', '123123 SMA', '123123', '2024-04-02 02:23:54', '2024-04-02 02:23:54', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (5, 38, 'SD', 'sdn123', '2313', '2024-04-02 04:37:08', '2024-04-02 04:37:08', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (6, 38, 'SMP', '12321 smp', '1231', '2024-04-02 04:37:08', '2024-04-02 04:37:08', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (7, 38, 'SMA', '12313qw sma', '1234', '2024-04-02 04:37:08', '2024-04-02 04:37:08', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (8, 39, 'SD', 'sdn123', '2313', '2024-04-02 04:37:39', '2024-04-02 04:37:39', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (9, 39, 'SMP', '12321 smp', '1231', '2024-04-02 04:37:39', '2024-04-02 04:37:39', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (10, 39, 'SMA', '12313qw sma', '1234', '2024-04-02 04:37:39', '2024-04-02 04:37:39', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (11, 40, 'SD', 'sdn123', '2313', '2024-04-02 04:37:57', '2024-04-02 04:37:57', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (12, 40, 'SMP', '12321 smp', '1231', '2024-04-02 04:37:57', '2024-04-02 04:37:57', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (13, 40, 'SMA', '12313qw sma', '1234', '2024-04-02 04:37:57', '2024-04-02 04:37:57', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (14, 41, 'SD', 'sdn123', '2313', '2024-04-02 04:42:14', '2024-04-02 04:42:14', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (15, 41, 'SMP', '12321 smp', '1231', '2024-04-02 04:42:14', '2024-04-02 04:42:14', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (16, 41, 'SMA', '12313qw sma', '1234', '2024-04-02 04:42:14', '2024-04-02 04:42:14', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (17, 42, 'SD', 'sdn123', '2313', '2024-04-02 04:42:19', '2024-04-02 04:42:19', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (18, 42, 'SMP', '12321 smp', '1231', '2024-04-02 04:42:19', '2024-04-02 04:42:19', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (19, 42, 'SMA', '12313qw sma', '1234', '2024-04-02 04:42:19', '2024-04-02 04:42:19', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (20, 43, 'SD', 'sdn123', '2313', '2024-04-02 04:42:50', '2024-04-02 04:42:50', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (21, 43, 'SMP', '12321 smp', '1231', '2024-04-02 04:42:50', '2024-04-02 04:42:50', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (22, 43, 'SMA', '12313qw sma', '1234', '2024-04-02 04:42:50', '2024-04-02 04:42:50', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (23, 44, 'SD', 'sdn123', '2313', '2024-04-02 04:43:09', '2024-04-02 04:43:09', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (24, 44, 'SMP', '12321 smp', '1231', '2024-04-02 04:43:09', '2024-04-02 04:43:09', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (25, 44, 'SMA', '12313qw sma', '1234', '2024-04-02 04:43:09', '2024-04-02 04:43:09', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (26, 45, 'SD', 'sdn123', '2313', '2024-04-02 04:43:48', '2024-04-02 04:43:48', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (27, 45, 'SMP', '12321 smp', '1231', '2024-04-02 04:43:48', '2024-04-02 04:43:48', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (28, 45, 'SMA', '12313qw sma', '1234', '2024-04-02 04:43:48', '2024-04-02 04:43:48', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (29, 46, 'SD', 'sdn123', '2313', '2024-04-02 04:44:13', '2024-04-02 04:44:13', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (30, 46, 'SMP', '12321 smp', '1231', '2024-04-02 04:44:13', '2024-04-02 04:44:13', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (31, 46, 'SMA', '12313qw sma', '1234', '2024-04-02 04:44:13', '2024-04-02 04:44:13', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (32, 47, 'SD', 'sdn123', '2313', '2024-04-02 04:44:44', '2024-04-02 04:44:44', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (33, 47, 'SMP', '12321 smp', '1231', '2024-04-02 04:44:44', '2024-04-02 04:44:44', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (34, 47, 'SMA', '12313qw sma', '1234', '2024-04-02 04:44:44', '2024-04-02 04:44:44', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (35, 48, 'SD', 'sdn123', '2313', '2024-04-02 04:45:09', '2024-04-02 04:45:09', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (36, 48, 'SMP', '12321 smp', '1231', '2024-04-02 04:45:09', '2024-04-02 04:45:09', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (37, 48, 'SMA', '12313qw sma', '1234', '2024-04-02 04:45:09', '2024-04-02 04:45:09', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (38, 49, 'SD', 'sdn123', '2313', '2024-04-02 04:45:33', '2024-04-04 16:50:18', '2024-04-04 16:50:18');
INSERT INTO `ref_riwayat_sekolah` VALUES (39, 49, 'SMP', '12321 smp', '1231', '2024-04-02 04:45:33', '2024-04-02 04:45:33', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (40, 49, 'SMA', '12313qw sma', '1234', '2024-04-02 04:45:33', '2024-04-04 20:28:42', '2024-04-04 20:28:42');
INSERT INTO `ref_riwayat_sekolah` VALUES (41, 50, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:39:49', '2024-04-04 21:20:32', '2024-04-04 21:20:32');
INSERT INTO `ref_riwayat_sekolah` VALUES (42, 50, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:39:49', '2024-04-04 21:25:15', '2024-04-04 21:25:15');
INSERT INTO `ref_riwayat_sekolah` VALUES (43, 50, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:39:49', '2024-04-04 16:35:09', '2024-04-04 16:35:09');
INSERT INTO `ref_riwayat_sekolah` VALUES (44, 51, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:41:05', '2024-04-04 21:25:45', '2024-04-04 21:25:45');
INSERT INTO `ref_riwayat_sekolah` VALUES (45, 51, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:41:05', '2024-04-04 21:25:43', '2024-04-04 21:25:43');
INSERT INTO `ref_riwayat_sekolah` VALUES (46, 51, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:41:05', '2024-04-04 16:32:04', '2024-04-04 16:32:04');
INSERT INTO `ref_riwayat_sekolah` VALUES (47, 52, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:41:23', '2024-04-04 16:33:15', '2024-04-04 16:33:15');
INSERT INTO `ref_riwayat_sekolah` VALUES (48, 52, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:41:23', '2024-04-02 07:41:23', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (49, 52, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:41:23', '2024-04-04 16:31:48', '2024-04-04 16:31:48');
INSERT INTO `ref_riwayat_sekolah` VALUES (50, 53, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:42:18', '2024-04-04 16:33:10', '2024-04-04 16:33:10');
INSERT INTO `ref_riwayat_sekolah` VALUES (51, 53, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:42:18', '2024-04-04 16:44:37', '2024-04-04 16:44:37');
INSERT INTO `ref_riwayat_sekolah` VALUES (52, 53, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:42:18', '2024-04-04 16:41:05', '2024-04-04 16:41:05');
INSERT INTO `ref_riwayat_sekolah` VALUES (53, 54, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:42:37', '2024-04-04 16:47:15', '2024-04-04 16:47:15');
INSERT INTO `ref_riwayat_sekolah` VALUES (54, 54, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:42:37', '2024-04-04 16:48:01', '2024-04-04 16:48:01');
INSERT INTO `ref_riwayat_sekolah` VALUES (55, 54, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:42:37', '2024-04-04 16:48:55', '2024-04-04 16:48:55');
INSERT INTO `ref_riwayat_sekolah` VALUES (56, 55, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:43:54', '2024-04-04 16:54:08', '2024-04-04 16:54:08');
INSERT INTO `ref_riwayat_sekolah` VALUES (57, 55, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:43:54', '2024-04-04 17:03:41', '2024-04-04 17:03:41');
INSERT INTO `ref_riwayat_sekolah` VALUES (58, 55, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:43:54', '2024-04-04 17:40:07', '2024-04-04 17:40:07');
INSERT INTO `ref_riwayat_sekolah` VALUES (59, 56, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:44:09', '2024-04-04 20:30:29', '2024-04-04 20:30:29');
INSERT INTO `ref_riwayat_sekolah` VALUES (60, 56, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:44:09', '2024-04-04 20:12:28', '2024-04-04 20:12:28');
INSERT INTO `ref_riwayat_sekolah` VALUES (61, 56, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:44:09', '2024-04-04 20:12:43', '2024-04-04 20:12:43');
INSERT INTO `ref_riwayat_sekolah` VALUES (62, 57, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:48:10', '2024-04-04 20:12:56', '2024-04-04 20:12:56');
INSERT INTO `ref_riwayat_sekolah` VALUES (63, 57, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:48:10', '2024-04-04 21:09:52', '2024-04-04 21:09:52');
INSERT INTO `ref_riwayat_sekolah` VALUES (64, 57, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:48:10', '2024-04-02 07:48:10', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (65, 58, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 07:59:49', '2024-04-02 07:59:49', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (66, 58, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 07:59:49', '2024-04-02 07:59:49', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (67, 58, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 07:59:49', '2024-04-04 22:22:33', '2024-04-04 22:22:33');
INSERT INTO `ref_riwayat_sekolah` VALUES (68, 59, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 08:02:31', '2024-04-04 22:24:24', '2024-04-04 22:24:24');
INSERT INTO `ref_riwayat_sekolah` VALUES (69, 59, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 08:02:31', '2024-04-05 00:08:17', '2024-04-05 00:08:17');
INSERT INTO `ref_riwayat_sekolah` VALUES (70, 59, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 08:02:31', '2024-04-05 00:10:01', '2024-04-05 00:10:01');
INSERT INTO `ref_riwayat_sekolah` VALUES (71, 60, 'SD', 'SD N 1 Boyolali', '2012', '2024-04-02 08:03:28', '2024-04-05 00:35:26', '2024-04-05 00:35:26');
INSERT INTO `ref_riwayat_sekolah` VALUES (72, 60, 'SMP', 'SMP N 6 Boyolali', '2015', '2024-04-02 08:03:28', '2024-04-02 08:03:28', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (73, 60, 'SMA', 'SMA N 1 Boyolali', '2018', '2024-04-02 08:03:28', '2024-04-02 08:03:28', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (74, 61, 'SD', 'SND', '1234', '2024-04-03 05:53:33', '2024-04-03 05:53:33', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (75, 61, 'SMP', 'SMPN', '123132', '2024-04-03 05:53:33', '2024-04-03 05:53:33', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (76, 61, 'SMA', 'SMAN', '123123', '2024-04-03 05:53:33', '2024-04-03 05:53:33', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (77, 62, 'SD', 'SND', '1234', '2024-04-03 05:54:55', '2024-04-03 05:54:55', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (78, 62, 'SMP', 'SMPN', '123132', '2024-04-03 05:54:55', '2024-04-03 05:54:55', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (79, 62, 'SMA', 'SMAN', '123123', '2024-04-03 05:54:55', '2024-04-03 05:54:55', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (80, 63, 'SD', 'SND', '1234', '2024-04-03 05:55:45', '2024-04-03 05:55:45', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (81, 63, 'SMP', 'SMPN', '123132', '2024-04-03 05:55:45', '2024-04-03 05:55:45', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (82, 63, 'SMA', 'SMAN', '123123', '2024-04-03 05:55:45', '2024-04-03 05:55:45', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (83, 64, 'SD', 'SND', '1234', '2024-04-03 05:56:45', '2024-04-03 05:56:45', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (84, 64, 'SMP', 'SMPN', '123132', '2024-04-03 05:56:45', '2024-04-03 05:56:45', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (85, 64, 'SMA', 'SMAN', '123123', '2024-04-03 05:56:45', '2024-04-03 05:56:45', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (86, 65, 'SD', 'SND', '1234', '2024-04-03 05:57:37', '2024-04-03 05:57:37', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (87, 65, 'SMP', 'SMPN', '123132', '2024-04-03 05:57:37', '2024-04-03 05:57:37', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (88, 65, 'SMA', 'SMAN', '123123', '2024-04-03 05:57:37', '2024-04-03 05:57:37', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (89, 66, 'SD', 'SND', '1234', '2024-04-03 06:05:30', '2024-04-03 06:05:30', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (90, 66, 'SMP', 'SMPN', '123132', '2024-04-03 06:05:30', '2024-04-03 06:05:30', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (91, 66, 'SMA', 'SMAN', '123123', '2024-04-03 06:05:30', '2024-04-03 06:05:30', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (92, 67, 'SD', 'SND', '1234', '2024-04-03 06:05:54', '2024-04-03 06:05:54', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (93, 67, 'SMP', 'SMPN', '123132', '2024-04-03 06:05:54', '2024-04-03 06:05:54', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (94, 67, 'SMA', 'SMAN', '123123', '2024-04-03 06:05:54', '2024-04-03 06:05:54', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (95, 68, 'SD', 'SND', '1234', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (96, 68, 'SMP', 'SMPN', '123132', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (97, 68, 'SMA', 'SMAN', '123123', '2024-04-03 06:06:14', '2024-04-03 06:06:14', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (98, 69, 'SD', 'SND', '1234', '2024-04-03 06:13:00', '2024-04-03 06:13:00', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (99, 69, 'SMP', 'SMPN', '123132', '2024-04-03 06:13:00', '2024-04-03 06:13:00', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (100, 69, 'SMA', 'SMAN', '123123', '2024-04-03 06:13:00', '2024-04-03 06:13:00', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (101, 70, 'SD', 'SND', '1234', '2024-04-03 06:13:21', '2024-04-03 06:13:21', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (102, 70, 'SMP', 'SMPN', '123132', '2024-04-03 06:13:21', '2024-04-03 06:13:21', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (103, 70, 'SMA', 'SMAN', '123123', '2024-04-03 06:13:21', '2024-04-03 06:13:21', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (104, 71, 'SD', 'SND', '1234', '2024-04-03 06:13:41', '2024-04-03 06:13:41', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (105, 71, 'SMP', 'SMPN', '123132', '2024-04-03 06:13:41', '2024-04-03 06:13:41', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (106, 71, 'SMA', 'SMAN', '123123', '2024-04-03 06:13:41', '2024-04-03 06:13:41', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (107, 72, 'SD', 'SND 2', '123123', '2024-04-03 06:14:17', '2024-04-04 17:06:20', '2024-04-04 17:06:20');
INSERT INTO `ref_riwayat_sekolah` VALUES (108, 72, 'SMP', 'SMPN', '123132', '2024-04-03 06:14:17', '2024-04-03 06:14:17', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (109, 72, 'SMA', 'SMAN', '123123', '2024-04-03 06:14:17', '2024-04-03 06:14:17', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (116, 72, 'SD', 'SDN 1 Boyulin', '20214', '2024-04-04 17:39:36', '2024-04-04 17:39:36', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (122, 72, 'SMP', 'SMPN 1', '123132', '2024-04-05 09:46:36', '2024-04-05 09:46:43', '2024-04-05 09:46:43');
INSERT INTO `ref_riwayat_sekolah` VALUES (123, 73, 'SD', '123123', '123123', '2024-04-07 10:12:53', '2024-04-07 10:12:53', NULL);
INSERT INTO `ref_riwayat_sekolah` VALUES (124, 74, 'SD', '123123', '123123', '2024-04-07 10:13:03', '2024-04-07 10:13:03', NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'administrator', 'administrator', 1, '2024-03-29 21:22:15', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'cabang', 'cabang', 1, '2024-03-29 21:22:15', '2024-03-29 23:06:34', NULL);
INSERT INTO `roles` VALUES (3, 'komisariat', 'komisariat', 1, '2024-03-29 23:06:16', '2024-03-29 23:06:23', NULL);

-- ----------------------------
-- Table structure for timeline
-- ----------------------------
DROP TABLE IF EXISTS `timeline`;
CREATE TABLE `timeline`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_agenda` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_mulai` date NULL DEFAULT NULL,
  `tanggal_selesai` date NULL DEFAULT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_verif` int NULL DEFAULT 0,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of timeline
-- ----------------------------
INSERT INTO `timeline` VALUES (3, 'Nama Agenda', '2024-04-08', '2024-04-12', '/dokumen/1712360132_mou.pdf', 2, 'Agenda sudah tervalidasi', '2024-04-06 06:35:32', '2024-04-07 10:21:01', NULL, 13);

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `user_id` int UNSIGNED NULL DEFAULT NULL,
  `role_id` int UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (1, 1, NULL, NULL);
INSERT INTO `user_roles` VALUES (1, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (2, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (3, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (4, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (5, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (6, 2, NULL, NULL);
INSERT INTO `user_roles` VALUES (1, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (12, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (13, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (14, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (15, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (16, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (17, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (18, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (19, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (20, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (21, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (22, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (23, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (24, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (25, 3, NULL, NULL);
INSERT INTO `user_roles` VALUES (26, 3, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Main Administrator', 'admin', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, '2024-03-29 21:22:15', NULL, NULL);
INSERT INTO `users` VALUES (12, 'PK IMM FIK UMS', 'pkimmfikums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 'PK IMM AVICENNA F.FARM UMS', 'pkimmavicennaffarmums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'PK IMM FKIP UMS', 'pkimmfkipums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'PK IMM AHMAD DAHLAN FH UMS', 'pkimmahmaddahlanfhums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'PK IMM AL IDRISI F.GEO UMS', 'pkimmalidrisifgeoums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 'PK IMM MOH. HATTA FEB UMS', 'pkimmohhattafebums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 'PK IMM ADAM MALIK FKI UMS', 'pkimmadammalikfkiums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'PK IMM AL GHOZALI F.PSI UMS', 'pkimmalghozalifpsiums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (20, 'PK IMM AVERROES FT UMS', 'pkimmaverroesftums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (21, 'PK IMM AR RAZI FK UMS', 'pkimmarrazifkums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (22, 'PK IMM AL ZAHRAWI FKG UMS', 'pkimmalzahrawifkgums', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (23, 'PK IMM DJAZMAN AL KINDI (UIN) RADEN MAS SAID SURAKARTA', 'pkimmdjazmankindi(uin)radenmassaidsurakarta', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (24, 'PK IMM STIKES AISYIYAH SURAKARTA', 'pkimmstikesaisyiyahsurakarta', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (25, 'PK IMM KI BAGUS HADIKUSUMO UNS', 'pkimmkibagushadikusumouns', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (26, 'PK IMM AL FATIH STIKES PKU MUH. SURAKARTA', 'pkimmalfatihstikespkumuhsurakarta', '$2y$10$XaV3m1fkfbND2OWNhPCbLOJd0cLxvDbrs/Vw.M.uRmpoyeHLSaVES', NULL, 1, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
