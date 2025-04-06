/*
 Navicat Premium Data Transfer

 Source Server         : mydb
 Source Server Type    : MySQL
 Source Server Version : 80403 (8.4.3)
 Source Host           : localhost:3306
 Source Schema         : my_exam_new

 Target Server Type    : MySQL
 Target Server Version : 80403 (8.4.3)
 File Encoding         : 65001

 Date: 25/03/2025 16:50:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asesmens
-- ----------------------------
DROP TABLE IF EXISTS `asesmens`;
CREATE TABLE `asesmens`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `durasi` int NULL DEFAULT NULL,
  `tgl_mulai` timestamp NULL DEFAULT NULL,
  `tgl_selesai` timestamp NULL DEFAULT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_dibuat` timestamp NULL DEFAULT NULL,
  `tgl_diupdate` timestamp NULL DEFAULT NULL,
  `apa_aktif` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asesmens
-- ----------------------------
INSERT INTO `asesmens` VALUES ('068102fa-8603-4769-ac90-f7d52a13db61', 'Bagaimana cara merawat Hair Dryer UTH700?', 'Menjelaskan langkah-langkah perawatan dan pemeliharaan kulkas.', 3600, '2025-03-19 18:00:00', '2025-03-19 19:00:00', 'admin@example.com', 'admin@example.com', '2025-03-19 03:18:03', '2025-03-19 03:18:03', 1);
INSERT INTO `asesmens` VALUES ('07cee92d-9d6a-4ebf-a5c1-b1f59193a949', 'fghjghj', 'ghj', 56, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:30:58', NULL, NULL);
INSERT INTO `asesmens` VALUES ('13e972f8-38fc-445c-86b4-df56c2aaaab6', 'judul14', 'fdgdfh', 12, '2025-02-23 00:00:00', '2025-12-13 00:00:00', 'admin', 'admin', '2025-03-20 05:54:58', NULL, NULL);
INSERT INTO `asesmens` VALUES ('1c111350-7552-4a89-8b8f-aef8a1551073', 'Apa keuntungan menggunakan Tomo R8 ?', 'Membahas keuntungan dan kemudahan yang ditawarkan oleh oven listrik.', 45, '2025-03-19 03:18:03', '2025-03-19 04:18:03', 'admin@example.com', 'admin@example.com', '2025-03-19 03:18:03', '2025-03-19 03:18:03', 1);
INSERT INTO `asesmens` VALUES ('1c20d512-5865-4280-b2ed-142c31e2b095', '1', '1', 1, '2025-03-20 00:00:00', '2025-03-20 00:00:00', 'admin', 'admin', '2025-03-20 06:27:38', NULL, NULL);
INSERT INTO `asesmens` VALUES ('37caf751-bacf-4bf8-a45a-8da38f1427db', 'judul4', 'fdg', 45, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:20:27', NULL, NULL);
INSERT INTO `asesmens` VALUES ('4ae46cce-a270-49be-a892-11af0ff44691', 'Apa fungsi utama dari mesin cuci?', 'Menjelaskan fungsi dasar dari mesin cuci dalam proses mencuci pakaian.', 30, '2025-03-19 03:18:03', '2025-03-19 04:18:03', 'admin@example.com', 'admin@example.com', '2025-03-19 03:18:03', '2025-03-19 03:18:03', 1);
INSERT INTO `asesmens` VALUES ('5831d38b-1a96-4dad-9075-0f4c97d9fef0', NULL, NULL, 1, NULL, NULL, 'admin', 'admin', '2025-03-20 05:12:14', NULL, NULL);
INSERT INTO `asesmens` VALUES ('59920be1-70f7-4168-972a-d0e9b136a7e2', 'judul8', 'dfhgdgh', 50, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:29:12', NULL, NULL);
INSERT INTO `asesmens` VALUES ('6a2e0123-b0a6-4d6d-9116-76ea8ca28ecd', '1', '1', 1, '2025-03-20 00:00:00', '2025-03-20 00:00:00', 'admin', 'admin', '2025-03-20 06:23:11', NULL, NULL);
INSERT INTO `asesmens` VALUES ('6eb88411-9d92-42ba-87ff-8dd2a8e09881', 'judul13', 'fgjnh', 60, '2025-03-21 00:00:00', '2025-03-22 00:00:00', 'admin', 'admin', '2025-03-20 05:51:24', NULL, NULL);
INSERT INTO `asesmens` VALUES ('720077a9-d7b7-467a-9b19-4f17869df8e4', '1', '1', 1, '2025-03-20 00:00:00', '2025-03-20 00:00:00', 'admin', 'admin', '2025-03-20 06:26:13', NULL, NULL);
INSERT INTO `asesmens` VALUES ('73f8a4d5-b7cd-4b2f-88e4-1b90d5949b5e', 'judul10', 'fdgdfgh', 90, '2025-03-21 00:00:00', '2025-03-24 00:00:00', 'admin', 'admin', '2025-03-20 04:59:55', '2025-03-21 08:33:43', 0);
INSERT INTO `asesmens` VALUES ('76118d4e-2ae8-493a-8f70-e482bfa952a9', 'fsgdf', 'desc3', 34, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:14:46', NULL, NULL);
INSERT INTO `asesmens` VALUES ('8aac8dc2-22e9-4f7a-a9d4-7bb2137aef43', 'judul141', 'fxcgdf', 60, '2025-03-21 00:00:00', '2025-03-22 00:00:00', 'admin', 'admin', '2025-03-20 06:09:22', NULL, NULL);
INSERT INTO `asesmens` VALUES ('9154ce1f-f234-432c-a7cd-b093e42b7851', NULL, NULL, 1, NULL, NULL, 'admin', 'admin', '2025-03-20 05:14:12', NULL, NULL);
INSERT INTO `asesmens` VALUES ('9919ed61-70ad-41f1-bd16-90fe808d95f0', 'judul7', 'xfdgdfg', 67, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:27:48', NULL, NULL);
INSERT INTO `asesmens` VALUES ('9d41a34c-9f61-409f-b561-883f1bcd00d1', 'judul11', 'fdgdfh', 20, '2025-03-21 00:00:00', '2025-03-24 00:00:00', 'admin', 'admin', '2025-03-20 05:03:09', NULL, NULL);
INSERT INTO `asesmens` VALUES ('b1e93364-f679-4c8d-850d-435c7e210192', 'judul15', 'fdhsfh', 60, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 05:59:49', NULL, NULL);
INSERT INTO `asesmens` VALUES ('b958b89e-e9a7-4e6c-a086-a11a0df3099c', 'judul3', 'dedsg', 12, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:19:15', NULL, NULL);
INSERT INTO `asesmens` VALUES ('ba3ef86b-a156-4fa3-86e8-1f5488355102', 'judul9', 'dsgdfg', 567, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:30:00', NULL, NULL);
INSERT INTO `asesmens` VALUES ('c19e7c95-7605-40b8-937e-85cd3ba64c19', 'judul12', 'hfgh', 60, '2025-03-21 00:00:00', '2025-03-24 00:00:00', 'admin', 'admin', '2025-03-20 05:06:31', NULL, NULL);
INSERT INTO `asesmens` VALUES ('c964b99c-262e-4f3b-8aa3-1e1d46c98815', 'judul6', 'ghfgdh', 23, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:26:13', NULL, NULL);
INSERT INTO `asesmens` VALUES ('dd7c4568-613f-4b2f-ae5e-47f077ff91a1', 'asesmen1', 'desc1', 45, '2025-03-21 00:00:00', '2025-03-24 00:00:00', 'admin', 'admin', NULL, NULL, NULL);
INSERT INTO `asesmens` VALUES ('eb2ea850-d79f-4feb-b8a2-554a2510cbfc', 'judul5', 'dfdfh', 45, '2025-03-21 00:00:00', '2025-03-21 00:00:00', 'admin', 'admin', '2025-03-20 04:23:13', NULL, NULL);
INSERT INTO `asesmens` VALUES ('ed5d2a87-1041-4787-8867-2d938a96f519', '1', '1', 11, '2025-03-20 00:00:00', '2025-03-20 00:00:00', 'admin', 'admin', '2025-03-20 06:20:59', NULL, NULL);

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
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pengguna_asesmen_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pertanyaan_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `poin` int NULL DEFAULT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `apa_aktif` tinyint(1) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_pengguna_asesmen
-- ----------------------------
INSERT INTO `detail_pengguna_asesmen` VALUES ('c490799e-ffd9-4d54-816c-a7cd04a8d8ce', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', '1234', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('b9f2efc5-b328-46b9-b941-c04ab14e8ffb', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '5', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('d6b9a2f7-fbed-44ae-bf64-4066b59ef061', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '4b18205b-d752-4a37-9485-221f492e8ea0', '6', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('9f28d62e-e0d1-4f02-ae0f-18fbaaf5a9bc', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '7', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('c6450ec0-1669-471d-bbc2-38ca3c923503', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', 'dxjffgh', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('35846b7f-f121-4bce-96bd-19cc2d1ec3ab', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', 'hjfgjyu', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('2a66e697-272a-44cc-a97d-42bc2190f36a', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '4b18205b-d752-4a37-9485-221f492e8ea0', 'hgjghi', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('c3c4b768-6f8f-4dc5-9198-8ecc88413459', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '87e811e5-eef1-456d-a7c3-2a79e18101b1', 'hjghj', 0, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_03_19_023942_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (5, '2025_03_17_032337_create_assesmen_table', 2);
INSERT INTO `migrations` VALUES (6, '2025_03_17_032337_create_pertanyaan_table', 2);

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
  `tgl_mulai` timestamp NULL DEFAULT NULL,
  `tgl_selesai` timestamp NULL DEFAULT NULL,
  `tgl_dibuat` timestamp NULL DEFAULT NULL,
  `tgl_diupdate` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna_asesmens
-- ----------------------------
INSERT INTO `pengguna_asesmens` VALUES ('9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-03-21 08:19:51', '2025-03-21 08:19:51', '2025-03-25 14:31:52', '2025-03-25 14:31:58', '1');
INSERT INTO `pengguna_asesmens` VALUES ('9e81b4c7-e967-42c4-89ae-2f95b7652err', 'eafe4ec3-2e7d-4147-9dbe-754a79ff7740', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-03-25 16:21:59', '2025-03-25 16:22:06', '2025-03-25 16:22:10', '2025-03-25 16:22:12', '1');
INSERT INTO `pengguna_asesmens` VALUES ('9e81b4c7-e967-42c4-89ae-2f95b7652f25', '6022eb14-9bfd-492f-a6ea-643ea14fd30a', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-03-24 06:53:29', '2025-03-24 06:53:29', '2025-03-25 14:31:55', '2025-03-25 14:32:00', '1');

-- ----------------------------
-- Table structure for penggunas
-- ----------------------------
DROP TABLE IF EXISTS `penggunas`;
CREATE TABLE `penggunas`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `surel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `surel_verifikasi_pada` timestamp NULL DEFAULT NULL,
  `sandi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ingat_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_dibuat` timestamp NULL DEFAULT NULL,
  `tgl_diupdate` timestamp NULL DEFAULT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  UNIQUE INDEX `penggunas_surel_unique`(`surel` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penggunas
-- ----------------------------
INSERT INTO `penggunas` VALUES ('eafe4ec3-2e7d-4147-9dbe-754a79ff7740', 'Customer 1', 'customer1@example.com', NULL, '$2y$12$okMf.aK0vb937Mre2zPvTuvuMg7rvqGbXd0JHYVjlVy5h.akATUd2', NULL, '2025-03-19 07:59:39', '2025-03-19 07:59:39', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('22194af1-d134-4779-83be-4d932c9c5a77', 'Customer 10', 'customer10@example.com', NULL, '$2y$12$JgGylBcWLts9w6zR2DeoXur/i3Kw1bvKPzizeQ/CqVHZWRDEXNhe.', NULL, '2025-03-19 07:59:41', '2025-03-19 07:59:41', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('23c427b8-7e8b-4a91-894c-23de14fcb369', 'Customer 11', 'customer11@example.com', NULL, '$2y$12$fzeX.CulVtTUnTE8Gdn43eVTig7.tpha6WlIoOZVuS2qeJ.ekR5lm', NULL, '2025-03-19 07:59:41', '2025-03-19 07:59:41', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('cb397721-e2d2-4a6b-b2d3-e3ad2bde6d4d', 'Customer 12', 'customer12@example.com', NULL, '$2y$12$i../vW1ToR5Yo3ysY5JuZ.YL6a44gPmTiIIOqgDwDOgNFKcRerYBu', NULL, '2025-03-19 07:59:41', '2025-03-19 07:59:41', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('64d1d5b6-db02-4494-98ec-a73b2dd6e590', 'Customer 13', 'customer13@example.com', NULL, '$2y$12$0wjoZ8hoFj2.cbQP13VnQeOy/4Ztl1ojSDAgDbrdpfq5HukaiRETC', NULL, '2025-03-19 07:59:42', '2025-03-19 07:59:42', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('b35469ad-579a-46e9-a92b-d730cd889e60', 'Customer 14', 'customer14@example.com', NULL, '$2y$12$05DH3HQfuSoLLFlDLG5I7evOqwk8y8PrmqNP2hJrDoMg61ThIWsku', NULL, '2025-03-19 07:59:42', '2025-03-19 07:59:42', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('a2deed42-debe-4a5e-b0f2-44f3b2b5798d', 'Customer 15', 'customer15@example.com', NULL, '$2y$12$zt.gq1eXWw6ovgvd3Yqlxefl8Pw8rUFOPyVMw3FDHrmE0Kq7qrmtW', NULL, '2025-03-19 07:59:42', '2025-03-19 07:59:42', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('b020e7e3-811f-4489-9f17-b51860d8df50', 'Customer 16', 'customer16@example.com', NULL, '$2y$12$jFbRLiwYjzu8R1fEN40ESeIjtUTw5PzbrlsP4DPNvOge0PMKa7g72', NULL, '2025-03-19 07:59:42', '2025-03-19 07:59:42', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('9e61f261-f3a6-4f9d-9b93-f1e7dd7a0dd2', 'Customer 17', 'customer17@example.com', NULL, '$2y$12$1mw.aMHLk0pCd.c0Q3q84uDE.b2A8E8PgqO9T2V/p820cK2q699k6', NULL, '2025-03-19 07:59:43', '2025-03-19 07:59:43', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('931a8508-b229-4927-8dde-a32aba62dbad', 'Customer 18', 'customer18@example.com', NULL, '$2y$12$afiQ1AXT6inHreFwU4UQROdM4O/eX/CMrk26oMwTKRQMUmEdCGYV6', NULL, '2025-03-19 07:59:43', '2025-03-19 07:59:43', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('dd9b3e4e-afe4-410e-aa8b-cbf4d84d0134', 'Customer 19', 'customer19@example.com', NULL, '$2y$12$AcShn4pJicpwaEyAd3j45ew98uEHeAhfc8Va9vaKPacR0BAx/tltq', NULL, '2025-03-19 07:59:43', '2025-03-19 07:59:43', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('388cc99c-a5b7-414f-9c44-a969b704fbc0', 'Customer 2', 'customer2@example.com', NULL, '$2y$12$l72ouZHTJHJ9XqwXbACHBu/C.WiyiQQ8I.duPLlQByWtJC520pWO2', NULL, '2025-03-19 07:59:39', '2025-03-19 07:59:39', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('23ad190f-e8e0-4d10-9078-d5d8cfb707d6', 'Customer 20', 'customer20@example.com', NULL, '$2y$12$a1szm7JPK81ZBXa/73/X5eOGUA.QUhXzGf.H0Ph0U/IxtfunmbcKe', NULL, '2025-03-19 07:59:43', '2025-03-19 07:59:43', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('6a0b8b60-62f1-4768-b3ea-1254f3889b77', 'Customer 3', 'customer3@example.com', NULL, '$2y$12$7e7xOkaH6BoIEvme0eUPZOMDPglpwdD2iyZpslmm9tHR.HtfE2uOa', NULL, '2025-03-19 07:59:39', '2025-03-19 07:59:39', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('9d12f122-8dea-42d4-b183-cccace06a152', 'Customer 4', 'customer4@example.com', NULL, '$2y$12$jIclLtfRbjL9WBg6iTik6.UubNTXruoYn6wG.3RU1H6NOTrt59AU6', NULL, '2025-03-19 07:59:39', '2025-03-19 07:59:39', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('43370073-a09b-43a8-83b4-2d4b425856a3', 'Customer 5', 'customer5@example.com', NULL, '$2y$12$RLe6nZysFC0F3PpoY8XQ2e4Llb15kuTj4/ppglpxbHiDcxvJu8WwC', NULL, '2025-03-19 07:59:40', '2025-03-19 07:59:40', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('db7738c5-1f41-4886-8b11-3c89d5cda1f4', 'Customer 6', 'customer6@example.com', NULL, '$2y$12$C37q5Me5ui1P4klrHV6vqOLyR7USUoMQTsnzo6i5/.rj6QKfssq8u', NULL, '2025-03-19 07:59:40', '2025-03-19 07:59:40', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('db396369-8ae6-4b13-996c-913a357b2d5b', 'Customer 7', 'customer7@example.com', NULL, '$2y$12$Dl8uOiRVFVhAxfKZ/DaJ.eGaCoQzJu973lMFv7MbF.K64qF1iOgKq', NULL, '2025-03-19 07:59:40', '2025-03-19 07:59:40', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('96dc9718-58c8-45b8-8412-f71782b1af7a', 'Customer 8', 'customer8@example.com', NULL, '$2y$12$pqyIl0o0wODYWM3.zDSZsOpU6SCdPQEMqe0.SXZ/AfTJ7xmiHKsnW', NULL, '2025-03-19 07:59:40', '2025-03-19 07:59:40', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('1c85597f-e12f-4f5f-b3f3-34f9b8ef4f3d', 'Customer 9', 'customer9@example.com', NULL, '$2y$12$1R1mnk7Bc7lG4vlRTcNCYOhEvQCt4gWzdX1iRtFru8IW/LJtrb15.', NULL, '2025-03-19 07:59:41', '2025-03-19 07:59:41', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('6022eb14-9bfd-492f-a6ea-643ea14fd30a', 'Employee 1', 'employee1@example.com', NULL, '$2y$12$E.eQedJhErBcJwEyM9hNFuQSr/8em4JtGWBYAZ0JahUWTxhGTMTRi', NULL, '2025-03-19 07:59:44', '2025-03-19 07:59:44', 'admin@example.com', 'admin@example.com');
INSERT INTO `penggunas` VALUES ('cac16905-f895-4e63-86d1-f40197d82283', 'Employee 2', 'employee2@example.com', NULL, '$2y$12$..C/6DB2TRDwZHZ1./XOIOM051Mo6KIg14NiUuUpt0UaviRs6EiU.', NULL, '2025-03-19 07:59:44', '2025-03-19 07:59:44', 'admin@example.com', 'admin@example.com');

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for pertanyaans
-- ----------------------------
DROP TABLE IF EXISTS `pertanyaans`;
CREATE TABLE `pertanyaans`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesmen_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `durasi` int NULL DEFAULT NULL,
  `bobot` int NULL DEFAULT NULL,
  `dibuat_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diupdate_oleh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_dibuat` timestamp NULL DEFAULT NULL,
  `tgl_diupdate` timestamp NULL DEFAULT NULL,
  `no_urut` int NULL DEFAULT NULL,
  `apa_aktif` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pertanyaans_asesmen_id_foreign`(`asesmen_id` ASC) USING BTREE,
  CONSTRAINT `pertanyaans_asesmen_id_foreign` FOREIGN KEY (`asesmen_id`) REFERENCES `asesmens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pertanyaans
-- ----------------------------
INSERT INTO `pertanyaans` VALUES ('01e131a6-7649-41eb-8c9a-cdb2c73b5299', '068102fa-8603-4769-ac90-f7d52a13db61', 'Apa yang menjadi keunggulan utama dari Hair Dryer UTH700 dibandingkan dengan pengering rambut lainnya?', 'essay', 14, 10, 'admin', NULL, NULL, NULL, 1, 1);
INSERT INTO `pertanyaans` VALUES ('38d9f241-a8f1-46a4-a3e8-3299aceaa138', '068102fa-8603-4769-ac90-f7d52a13db61', 'Sebutkan spesifikasi daya dan voltase dari Hair Dryer UTH700!', 'essay', 9, 10, 'admin', NULL, NULL, NULL, 2, 1);
INSERT INTO `pertanyaans` VALUES ('4b18205b-d752-4a37-9485-221f492e8ea0', '068102fa-8603-4769-ac90-f7d52a13db61', 'Berapa panjang kabel dari Hair Dryer UTH700 dan mengapa panjang ini penting?', 'essay', 4, 20, 'admin', NULL, NULL, NULL, 3, 1);
INSERT INTO `pertanyaans` VALUES ('5b6126e8-e91f-475c-8589-bb431f1b49e2', '1c111350-7552-4a89-8b8f-aef8a1551073', 'Bagaimana Tomo R8 mengenali dan memetakan ruangan?', 'essay', 2, 10, 'admin', NULL, NULL, NULL, 2, 1);
INSERT INTO `pertanyaans` VALUES ('786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', '1c111350-7552-4a89-8b8f-aef8a1551073', 'Apa manfaat dari fungsi sterilisasi yang dimiliki oleh Tomo R8?', 'essay', 2, 20, 'admin', NULL, NULL, NULL, 3, 1);
INSERT INTO `pertanyaans` VALUES ('85aefb8e-a872-48fd-adb1-971b48f75f1c', '1c111350-7552-4a89-8b8f-aef8a1551073', 'Apa yang membedakan Tomo R8 dari vacuum cleaner biasa?', 'essay', 120, 20, 'admin', NULL, NULL, NULL, 4, 1);
INSERT INTO `pertanyaans` VALUES ('87e811e5-eef1-456d-a7c3-2a79e18101b1', '068102fa-8603-4769-ac90-f7d52a13db61', 'Apa fungsi dari mode Cool & Hot pada Hair Dryer UTH700?', 'essay', 10, 20, 'admin', NULL, NULL, NULL, 4, 1);
INSERT INTO `pertanyaans` VALUES ('9206fcca-5eaf-4635-95ad-67ed35926512', '1c111350-7552-4a89-8b8f-aef8a1551073', 'Apa yang menjadi keunggulan utama dari Hair Dryer UTH700 dibandingkan dengan pengering rambut lainnya?', 'essay', 60, 10, 'admin', NULL, NULL, NULL, 1, 1);
INSERT INTO `pertanyaans` VALUES ('9e799fb2-ea55-48d6-a193-b2404405e20a', '1c20d512-5865-4280-b2ed-142c31e2b095', '2', 'essay', 2, 2, 'admin', 'admin', '2025-03-20 06:27:55', '2025-03-20 06:27:55', 2, 1);
INSERT INTO `pertanyaans` VALUES ('ff12e39a-bf4b-4439-8778-26951309a204', '1c111350-7552-4a89-8b8f-aef8a1551073', 'Apa saja fungsi utama dari Tomo R8 Smart Robot Vacuum and Mop Combo?', 'essay', 60, 10, 'admin', NULL, NULL, NULL, 5, 1);

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------

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
INSERT INTO `sessions` VALUES ('rM8Ro5kAm95Lwo4ePsCpjdGpVKx9IcdxWyhFOx75', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2tvbmZpcm1hc2ktc2VsZXNhaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJsM1M0SkxOTHZQVDQ5ZjNvaEFNeW5xSlZpb2pGUnVNaUN1UEtqdTB0IjtzOjk6InNvYWwtc2VzaSI7YTo4OntzOjc6InVzZXJfaWQiO3M6MzY6ImVhZmU0ZWMzLTJlN2QtNDE0Ny05ZGJlLTc1NGE3OWZmNzc0MCI7czo5OiJ1c2VyX25hbWUiO3M6MTA6IkN1c3RvbWVyIDEiO3M6MTA6InVzZXJfZW1haWwiO3M6MjE6ImN1c3RvbWVyMUBleGFtcGxlLmNvbSI7czoxMDoiYXNlc21lbl9pZCI7czozNjoiMDY4MTAyZmEtODYwMy00NzY5LWFjOTAtZjdkNTJhMTNkYjYxIjtzOjEyOiJ3YWt0dUFzZXNtZW4iO3M6MjE6IjEgamFtIDAgbWVuaXQgMCBkZXRpayI7czoxNzoid2FrdHVTb2FsQmVyamFsYW4iO2k6LTE7czo0OiJzb2FsIjthOjQ6e2k6MDthOjc6e3M6MTM6InBlcnRhbnlhYW5faWQiO3M6MzY6IjAxZTEzMWE2LTc2NDktNDFlYi04YzlhLWNkYjJjNzNiNTI5OSI7czo3OiJqYXdhYmFuIjtzOjI6ImoxIjtzOjEwOiJkdXJhc2lTb2FsIjtpOjE0O3M6MTc6Indha3R1U29hbFNla2FyYW5nIjtzOjE5OiIyMDI1LTAzLTI1IDA2OjA2OjEzIjtzOjE2OiJ3YWt0dVNvYWxTZWxlc2FpIjtzOjE5OiIyMDI1LTAzLTI1IDA2OjA2OjI3IjtzOjIzOiJ3YWt0dVNvYWxZYW5nRGloYWJpc2thbiI7ZDotNy4zRS01O3M6OToibm9tb3JTb2FsIjtpOjE7fWk6MTthOjc6e3M6MTM6InBlcnRhbnlhYW5faWQiO3M6MzY6IjM4ZDlmMjQxLWE4ZjEtNDZhNC1hM2U4LTMyOTlhY2VhYTEzOCI7czo3OiJqYXdhYmFuIjtzOjI6ImoyIjtzOjEwOiJkdXJhc2lTb2FsIjtpOjk7czoxNzoid2FrdHVTb2FsU2VrYXJhbmciO3M6MTk6IjIwMjUtMDMtMjUgMDY6MDY6MTMiO3M6MTY6Indha3R1U29hbFNlbGVzYWkiO3M6MTk6IjIwMjUtMDMtMjUgMDY6MDY6MjciO3M6MjM6Indha3R1U29hbFlhbmdEaWhhYmlza2FuIjtkOi05LjVFLTU7czo5OiJub21vclNvYWwiO2k6Mjt9aToyO2E6Nzp7czoxMzoicGVydGFueWFhbl9pZCI7czozNjoiNGIxODIwNWItZDc1Mi00YTM3LTk0ODUtMjIxZjQ5MmU4ZWEwIjtzOjc6Imphd2FiYW4iO3M6MjoiajMiO3M6MTA6ImR1cmFzaVNvYWwiO2k6NDtzOjE3OiJ3YWt0dVNvYWxTZWthcmFuZyI7czoxOToiMjAyNS0wMy0yNSAwNjowNjoxMyI7czoxNjoid2FrdHVTb2FsU2VsZXNhaSI7czoxOToiMjAyNS0wMy0yNSAwNjowNjoyNyI7czoyMzoid2FrdHVTb2FsWWFuZ0RpaGFiaXNrYW4iO2Q6LTUuMkUtNTtzOjk6Im5vbW9yU29hbCI7aTozO31pOjM7YTo3OntzOjEzOiJwZXJ0YW55YWFuX2lkIjtzOjM2OiI4N2U4MTFlNS1lZWYxLTQ1NmQtYTdjMy0yYTc5ZTE4MTAxYjEiO3M6NzoiamF3YWJhbiI7czoyOiJqNCI7czoxMDoiZHVyYXNpU29hbCI7aToxMDtzOjE3OiJ3YWt0dVNvYWxTZWthcmFuZyI7czoxOToiMjAyNS0wMy0yNSAwNjowNjoxMyI7czoxNjoid2FrdHVTb2FsU2VsZXNhaSI7czoxOToiMjAyNS0wMy0yNSAwNzowNjoxMyI7czoyMzoid2FrdHVTb2FsWWFuZ0RpaGFiaXNrYW4iO2Q6LTkuM0UtNTtzOjk6Im5vbW9yU29hbCI7aTo0O319czoyNjoid2FrdHVBc2VzbWVuWWFuZ0RpaGFiaXNrYW4iO2Q6LTIxLjkwNjYzNzt9fQ==', 1742895544);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
