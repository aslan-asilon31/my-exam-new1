/*
 Navicat Premium Data Transfer

 Source Server         : mylocal1
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : my_exam

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 07/04/2025 04:54:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asesmens
-- ----------------------------
DROP TABLE IF EXISTS `asesmens`;
CREATE TABLE `asesmens`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int NOT NULL,
  `tgl_mulai` timestamp NOT NULL,
  `tgl_selesai` timestamp NOT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuat` timestamp NOT NULL,
  `tgl_diupdate` timestamp NOT NULL,
  `apa_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asesmens
-- ----------------------------
INSERT INTO `asesmens` VALUES ('5b0978de-7f09-47f5-bfcf-53594d5611b1', NULL, 'Apa keuntungan menggunakan oven listrik?', 'Membahas keuntungan dan kemudahan yang ditawarkan oleh oven listrik.', 3600, '2025-03-23 22:18:21', '2025-03-23 23:18:21', 'admin@example.com', 'admin@example.com', '2025-03-23 22:18:21', '2025-03-23 22:18:21', 1);
INSERT INTO `asesmens` VALUES ('db4d5e2d-9258-4634-8907-4fdc1c46d84f', NULL, 'Bagaimana cara merawat kulkas?', 'Menjelaskan langkah-langkah perawatan dan pemeliharaan kulkas.', 2800, '2025-03-23 22:18:21', '2025-03-23 23:18:21', 'admin@example.com', 'admin@example.com', '2025-03-23 22:18:21', '2025-03-23 22:18:21', 1);
INSERT INTO `asesmens` VALUES ('f3681d59-671e-477b-b507-4c43c3155a54', NULL, 'Apa fungsi utama dari mesin cuci?', 'Menjelaskan fungsi dasar dari mesin cuci dalam proses mencuci pakaian.', 30, '2025-03-23 22:18:21', '2025-03-23 23:18:21', 'admin@example.com', 'admin@example.com', '2025-03-23 22:18:21', '2025-03-23 22:18:21', 1);

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:28:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"role-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"role-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"role-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:16:\"permission-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:15:\"permission-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"permission-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:16:\"permission-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:14:\"pengguna-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:13:\"pengguna-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:13:\"pengguna-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:14:\"pengguna-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:19:\"hasil_asesmen-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:18:\"hasil_asesmen-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:18:\"hasil_asesmen-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:19:\"hasil_asesmen-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:23:\"penilaian_asesmen-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:22:\"penilaian_asesmen-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:22:\"penilaian_asesmen-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:23:\"penilaian_asesmen-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:23:\"asesmen_evaluator-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:22:\"asesmen_evaluator-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:22:\"asesmen_evaluator-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:23:\"asesmen_evaluator-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:16:\"pertanyaan-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:15:\"pertanyaan-buat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:15:\"pertanyaan-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:16:\"pertanyaan-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:8:\"customer\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"developer\";s:1:\"c\";s:3:\"web\";}}}', 1744062298);

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for detail_pengguna_asesmen
-- ----------------------------
DROP TABLE IF EXISTS `detail_pengguna_asesmen`;
CREATE TABLE `detail_pengguna_asesmen`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesmen_user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int NOT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apa_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `asesmen_user_detail_asesmen_user_id_foreign`(`asesmen_user_id` ASC) USING BTREE,
  INDEX `asesmen_user_detail_pertanyaan_id_foreign`(`pertanyaan_id` ASC) USING BTREE,
  CONSTRAINT `asesmen_user_detail_asesmen_user_id_foreign` FOREIGN KEY (`asesmen_user_id`) REFERENCES `pengguna_asesmens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `asesmen_user_detail_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pengguna_asesmen
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_03_17_030344_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (5, '2025_03_17_032337_create_assesmen_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_03_17_032337_create_posts_table', 1);
INSERT INTO `migrations` VALUES (7, '2025_03_17_032337_create_pertanyaan_table', 2);
INSERT INTO `migrations` VALUES (8, '2025_03_17_032337_create_asesmen_user_detail_table', 3);
INSERT INTO `migrations` VALUES (10, '0001_01_01_000000_create_penggunas_table', 4);
INSERT INTO `migrations` VALUES (11, '2025_04_06_122519_create_personal_access_tokens_table', 5);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 3);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for pengguna_asesmens
-- ----------------------------
DROP TABLE IF EXISTS `pengguna_asesmens`;
CREATE TABLE `pengguna_asesmens`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengguna_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesmen_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` timestamp NOT NULL,
  `tgl_selesai` timestamp NOT NULL,
  `tgl_dibuat` timestamp NOT NULL,
  `tgl_diupdate` timestamp NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna_asesmens
-- ----------------------------
INSERT INTO `pengguna_asesmens` VALUES ('5b0978de-7f09-47f5-bfcf-53594d561122', '4ef03d5e-6c65-4add-99e3-0701e114ea1d', '5b0978de-7f09-47f5-bfcf-53594d5611b1', '2025-03-26 05:29:58', '2025-03-26 06:30:02', '2025-03-26 05:30:09', '2025-03-26 05:30:13', '1', NULL, NULL);

-- ----------------------------
-- Table structure for penggunas
-- ----------------------------
DROP TABLE IF EXISTS `penggunas`;
CREATE TABLE `penggunas`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surel_verifikasi_pada` timestamp NULL DEFAULT NULL,
  `sandi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dibuat_oleh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diupdate_oleh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_dibuat` timestamp NULL DEFAULT NULL,
  `tgl_diupdate` timestamp NULL DEFAULT NULL,
  UNIQUE INDEX `penggunas_surel_unique`(`surel` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penggunas
-- ----------------------------
INSERT INTO `penggunas` VALUES ('df008acd-c5c5-40b3-8484-bbc0b7e456b9', 'aslanasilon', 'aslanasilon@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `penggunas` VALUES ('4ef03d5e-6c65-4add-99e3-0701e114ea1d', 'Customer 1', 'customer1@example.com', NULL, '$2y$12$/gw1WFv89ihFm7LTig8H.eeyr6v45x1qzt19dA9aGLhhgvmQG.59K', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:39', '2025-03-19 22:31:39');
INSERT INTO `penggunas` VALUES ('c797fba1-6657-410e-8366-d6e4095a1f25', 'Customer 10', 'customer10@example.com', NULL, '$2y$12$lWXE4KhGAj8QfDLT9N22Sedr6vSFQ1zG4itMnAda1QhXeHoENsiy6', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:43', '2025-03-19 22:31:43');
INSERT INTO `penggunas` VALUES ('9e81c376-8915-4819-8925-5e99be2e7096', 'Customer 11', 'customer11@example.com', NULL, '$2y$12$yor6QpNX7czKZLZnjhR36elNgV00474lMI0j1Cv2dhL2n9YHluVri', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:43', '2025-03-19 22:31:43');
INSERT INTO `penggunas` VALUES ('f7fa9428-9abe-47ae-9ccd-0cb2a0908149', 'Customer 12', 'customer12@example.com', NULL, '$2y$12$mEwp/mtdkv7eh61dNkomnu464NnICU6hm1DxH.13eNclpmSmxXmiy', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:44', '2025-03-19 22:31:44');
INSERT INTO `penggunas` VALUES ('48b48d0c-2ba2-4d18-8a1e-c4d97e7493ca', 'Customer 13', 'customer13@example.com', NULL, '$2y$12$ywluW1cgsnKp3A4Di/bTjufRqxBV3SEaQh7yPBqpW5bfJtOFzy5v2', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:44', '2025-03-19 22:31:44');
INSERT INTO `penggunas` VALUES ('0746e2cb-60d6-4dbe-8f5a-11ac9551fbe1', 'Customer 14', 'customer14@example.com', NULL, '$2y$12$whQ.TZ.KpRouDyuD8fb4Ze/XwR885L7.qRGb7lLOV.ivwaaMkRx6i', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:45', '2025-03-19 22:31:45');
INSERT INTO `penggunas` VALUES ('03c089da-c560-478f-8b47-0cd0c7d17033', 'Customer 15', 'customer15@example.com', NULL, '$2y$12$7hd6CQXK9VafoJKLK/58xe/WbmhZSQ8Kxym/0c/4RwP3kOs/e28YO', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:45', '2025-03-19 22:31:45');
INSERT INTO `penggunas` VALUES ('16460e0d-a139-419d-aad6-71e1aa082d0d', 'Customer 16', 'customer16@example.com', NULL, '$2y$12$neuGH6KFQt8bH1pkHPpsr.XLks3skwDxBN73Pj1ypTi3NhTb4hqhu', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:46', '2025-03-19 22:31:46');
INSERT INTO `penggunas` VALUES ('441d9824-7a8b-4381-a8d7-ece1895ed2e4', 'Customer 17', 'customer17@example.com', NULL, '$2y$12$I4XsHEkwFBMOs/VJwY2xvOErhQU/AMXoNUkBNiq7O6Awo0maEmPq.', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:46', '2025-03-19 22:31:46');
INSERT INTO `penggunas` VALUES ('ea1125e4-2556-4e03-99d8-c6b6f10f6f8f', 'Customer 18', 'customer18@example.com', NULL, '$2y$12$2qxeyDOCX/YvAvy69xB8deBlvS6fxyXX3tZlVei1k0CY5/kHwXo5.', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:47', '2025-03-19 22:31:47');
INSERT INTO `penggunas` VALUES ('e1295d13-0505-4896-8cf9-98b94b549fb1', 'Customer 19', 'customer19@example.com', NULL, '$2y$12$9p12iTEHObtldQKi13eGF.1BpMPQzkNk7ST8k/7ZkzVpnlcAwkAWq', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:47', '2025-03-19 22:31:47');
INSERT INTO `penggunas` VALUES ('dc07e3ea-d8cf-4b27-9eeb-91e7d9cad82c', 'Customer 2', 'customer2@example.com', NULL, '$2y$12$J0inG9RrqWDUyOwT1JdwYOwGEt.hjQq0S9OfXm/T.umeuMjW3aVty', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:39', '2025-03-19 22:31:39');
INSERT INTO `penggunas` VALUES ('4bd68a38-6998-4f49-85af-ed2e17a98961', 'Customer 20', 'customer20@example.com', NULL, '$2y$12$AAr5KSDyJF0iwR3gLerebeJs6Ms19i31g5U/C63bLhcL6wRverGdO', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:48', '2025-03-19 22:31:48');
INSERT INTO `penggunas` VALUES ('b5887b20-f370-49c9-85cf-de81aac6cdd1', 'Customer 3', 'customer3@example.com', NULL, '$2y$12$3HTpx7um1GMWflh/TQbUy.qiU3UYzLbsq0JUEeaMFRQRkibGWBJci', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:40', '2025-03-19 22:31:40');
INSERT INTO `penggunas` VALUES ('6af41875-1e83-4d66-930e-2e776994204d', 'Customer 4', 'customer4@example.com', NULL, '$2y$12$TD5MzPEiVK1QClxPRy1yGuosZ1J34MpP3zNX0VyJekHbx8hwBWv06', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:40', '2025-03-19 22:31:40');
INSERT INTO `penggunas` VALUES ('1f51dd80-d97a-4fe8-a47f-c6a9573827fb', 'Customer 5', 'customer5@example.com', NULL, '$2y$12$8DPXWpK0bPWtfodnACaujOc7WMWfGuvj2eikjJ2gPgPmS5DK5NVz2', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:41', '2025-03-19 22:31:41');
INSERT INTO `penggunas` VALUES ('4dd1368d-730b-4fbd-8687-0e8908170944', 'Customer 6', 'customer6@example.com', NULL, '$2y$12$J7Cr5wCOVRCdBwHk60rGSe.8GjnckLOarr/1QLLhKuo2h314dQoTS', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:41', '2025-03-19 22:31:41');
INSERT INTO `penggunas` VALUES ('71455d1a-2eec-47fa-a33e-7140460aac31', 'Customer 7', 'customer7@example.com', NULL, '$2y$12$Aa.5R.Ejr.m6nP9YeZJ6S.QIQEoSachu0UG8mgIRAl99AWicsKyPu', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:41', '2025-03-19 22:31:41');
INSERT INTO `penggunas` VALUES ('483d17e7-e98f-4c56-b690-b3c9c65011da', 'Customer 8', 'customer8@example.com', NULL, '$2y$12$.T3YlIlUa9Xar6nXS3De7uHJqKkosGU0zBR7fEblR2UHOIRTfeAGC', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:42', '2025-03-19 22:31:42');
INSERT INTO `penggunas` VALUES ('4d7663a8-1a82-454b-800a-5f0671c9d75a', 'Customer 9', 'customer9@example.com', NULL, '$2y$12$ZXj1RoYY2ZfwPRErCTmZIOQ2fIysGP.afF1P4V4ZCMsV/..QYds6K', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:43', '2025-03-19 22:31:43');
INSERT INTO `penggunas` VALUES ('a7978bf1-d3ba-4bec-9a82-a52b226fa99d', 'Employee 1', 'employee1@example.com', NULL, '$2y$12$eJqNagXlV3uodDkKdKJnlOe.b7xpBExnlb7FPzIUQE2hKEtpTtpfy', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:48', '2025-03-19 22:31:48');
INSERT INTO `penggunas` VALUES ('df008acd-c5c5-40b3-8484-bbc0b7e456b9', 'Employee 2', 'employee2@example.com', NULL, '$2y$12$qxDfQlhtXkuf1Ps5lswn...GooDHP.whH2XfntGjzdrliQyWvo/6a', NULL, 'admin@example.com', 'admin@example.com', '2025-03-19 22:31:48', '2025-03-19 22:31:48');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'role-lihat', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (2, 'role-buat', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (3, 'role-edit', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (4, 'role-hapus', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (5, 'permission-lihat', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (6, 'permission-buat', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (7, 'permission-edit', 'web', '2025-04-06 13:29:23', '2025-04-06 13:29:23');
INSERT INTO `permissions` VALUES (8, 'permission-hapus', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (9, 'pengguna-lihat', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (10, 'pengguna-buat', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (11, 'pengguna-edit', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (12, 'pengguna-hapus', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (13, 'hasil_asesmen-lihat', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (14, 'hasil_asesmen-buat', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (15, 'hasil_asesmen-edit', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (16, 'hasil_asesmen-hapus', 'web', '2025-04-06 13:29:24', '2025-04-06 13:29:24');
INSERT INTO `permissions` VALUES (17, 'penilaian_asesmen-lihat', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (18, 'penilaian_asesmen-buat', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (19, 'penilaian_asesmen-edit', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (20, 'penilaian_asesmen-hapus', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (21, 'asesmen_evaluator-lihat', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (22, 'asesmen_evaluator-buat', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (23, 'asesmen_evaluator-edit', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (24, 'asesmen_evaluator-hapus', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (25, 'pertanyaan-lihat', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (26, 'pertanyaan-buat', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (27, 'pertanyaan-edit', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (28, 'pertanyaan-hapus', 'web', '2025-04-06 13:29:25', '2025-04-06 13:29:25');
INSERT INTO `permissions` VALUES (29, 'dashboard-lihat', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (30, 'dashboard-user-lihat', 'web', NULL, NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for pertanyaans
-- ----------------------------
DROP TABLE IF EXISTS `pertanyaans`;
CREATE TABLE `pertanyaans`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesmen_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pertanyaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int NOT NULL,
  `bobot` int NOT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dibuat` timestamp NOT NULL,
  `tgl_diupdate` timestamp NOT NULL,
  `no_urut` int NOT NULL,
  `apa_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pertanyaans_asesmen_id_foreign`(`asesmen_id` ASC) USING BTREE,
  CONSTRAINT `pertanyaans_asesmen_id_foreign` FOREIGN KEY (`asesmen_id`) REFERENCES `asesmens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pertanyaans
-- ----------------------------
INSERT INTO `pertanyaans` VALUES ('5b0978de-7f09-47f5-bfcf-53594d56333', '5b0978de-7f09-47f5-bfcf-53594d5611b1', NULL, 'soal1 asesmen1', 'essay', 20, 10, 'admin', 'admin', '2025-03-25 04:11:55', '2025-03-25 04:12:01', 1, 1);
INSERT INTO `pertanyaans` VALUES ('5b0978de-7f09-47f5-bfcsdlfkndg', '5b0978de-7f09-47f5-bfcf-53594d5611b1', NULL, 'soal2 asesmen1', 'essay', 10, 10, 'admin', 'admin', '2025-03-25 04:12:31', '2025-03-25 04:12:24', 2, 1);
INSERT INTO `pertanyaans` VALUES ('5b0978de-7f09-47f5-bfsdfgn', '5b0978de-7f09-47f5-bfcf-53594d5611b1', NULL, 'soal4-asesmen4', 'essay', 20, 5, 'admin', 'admin', '2025-03-25 04:34:36', '2025-03-25 04:34:49', 4, 1);
INSERT INTO `pertanyaans` VALUES ('5b0978de-7f09-47f5-bfsdgndskgl', '5b0978de-7f09-47f5-bfcf-53594d5611b1', NULL, 'soal3-asesmen3', 'essay', 30, 10, 'admin', 'admin', '2025-03-25 04:13:53', '2025-03-25 04:13:58', 3, 1);
INSERT INTO `pertanyaans` VALUES ('5b0978de-7fsdkjbsjg', '5b0978de-7f09-47f5-bfcf-53594d5611b1', NULL, 'soal5-asesmen5', 'essay', 10, 3, 'admin', 'admin', '2025-03-25 04:35:29', '2025-03-25 04:35:32', 5, 1);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (6, 3);
INSERT INTO `role_has_permissions` VALUES (7, 3);
INSERT INTO `role_has_permissions` VALUES (8, 3);
INSERT INTO `role_has_permissions` VALUES (9, 3);
INSERT INTO `role_has_permissions` VALUES (10, 3);
INSERT INTO `role_has_permissions` VALUES (11, 3);
INSERT INTO `role_has_permissions` VALUES (12, 3);
INSERT INTO `role_has_permissions` VALUES (13, 3);
INSERT INTO `role_has_permissions` VALUES (14, 3);
INSERT INTO `role_has_permissions` VALUES (15, 3);
INSERT INTO `role_has_permissions` VALUES (16, 3);
INSERT INTO `role_has_permissions` VALUES (17, 3);
INSERT INTO `role_has_permissions` VALUES (18, 3);
INSERT INTO `role_has_permissions` VALUES (19, 3);
INSERT INTO `role_has_permissions` VALUES (20, 3);
INSERT INTO `role_has_permissions` VALUES (21, 3);
INSERT INTO `role_has_permissions` VALUES (22, 3);
INSERT INTO `role_has_permissions` VALUES (23, 3);
INSERT INTO `role_has_permissions` VALUES (24, 3);
INSERT INTO `role_has_permissions` VALUES (25, 3);
INSERT INTO `role_has_permissions` VALUES (26, 3);
INSERT INTO `role_has_permissions` VALUES (27, 3);
INSERT INTO `role_has_permissions` VALUES (28, 3);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'customer', 'web', '2025-03-23 21:31:35', '2025-03-23 21:31:35');
INSERT INTO `roles` VALUES (2, 'marketing', 'web', '2025-03-23 21:31:37', '2025-03-23 21:31:37');
INSERT INTO `roles` VALUES (3, 'developer', 'web', '2025-03-23 21:31:37', '2025-03-23 21:31:37');
INSERT INTO `roles` VALUES (6, 'writer', 'web', '2025-04-06 11:23:30', '2025-04-06 11:23:30');
INSERT INTO `roles` VALUES (7, 'admin', 'web', '2025-04-06 11:23:30', '2025-04-06 11:23:30');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('Mw5C0WjIR1ac1fBtvzw8Vq1UxnVS8i5A9Fj4mOp3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieU80aGdaYk5ZcmZTTENwWUd3UUNQZm1hRmR5NjBqUUlkcjVxckNaTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL2Rhc2JvciI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vbG9jYWxob3N0OjgwMDEvZGFzYm9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6InNvYWwtc2VzaSI7YTozOntzOjc6InVzZXJfaWQiO2k6MTtzOjk6InVzZXJfbmFtZSI7czoxMToiYXNsYW5hc2lsb24iO3M6MTA6InVzZXJfZW1haWwiO3M6MjE6ImFzbGFuYXNpbG9uQGdtYWlsLmNvbSI7fX0=', 1743975898);
INSERT INTO `sessions` VALUES ('ZfiTLsBH9buLofGCUCAGbc31yecPxf2N2SgBCpLq', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicHZKcE9xRTdRdUJ5WGxRa0dCQjBLQ2ZIOTZNMHFibU45YTg1MzRjSiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL2Rhc2Jvci11c2VyIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS9kYXNib3IiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1743976457);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, 'aslanasilon', 'aslanasilon@gmail.com', NULL, '$2y$12$gJUf4vewORG0tDlSUnyHKemxSkdi2MK8WKi5DNjqy6id4al3ZzdWC', NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, NULL, 'aslancustomer', 'aslancustomer@gmail.com', '2025-04-06 11:23:32', '$2y$12$gJUf4vewORG0tDlSUnyHKemxSkdi2MK8WKi5DNjqy6id4al3ZzdWC', 'Skbi0tNyms', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
