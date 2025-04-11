/*
 Navicat Premium Data Transfer

 Source Server         : Mitra
 Source Server Type    : MySQL
 Source Server Version : 80403 (8.4.3)
 Source Host           : localhost:3306
 Source Schema         : my_exam_new

 Target Server Type    : MySQL
 Target Server Version : 80403 (8.4.3)
 File Encoding         : 65001

 Date: 11/04/2025 16:48:09
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
INSERT INTO `asesmens` VALUES ('068102fa-8603-4769-ac90-f7d52a13db61', 'Perawatan Rambut yang Efisien', 'Rice cooker adalah alat yang dirancang khusus untuk memasak nasi dengan efisien. Alat ini menggunakan teknologi pemanasan yang merata untuk menghasilkan nasi yang sempurna.', 3600, '2025-04-09 18:00:00', '2025-04-09 18:55:00', 'admin@example.com', 'admin@example.com', '2025-03-19 03:18:03', '2025-03-19 03:18:03', 1);
INSERT INTO `asesmens` VALUES ('1b7a10e0-5040-446c-bbdb-0546bb3b2b9b', 'Inovasi Teknologi dalam Peralatan Rumah Tangga', 'Menyentuh perkembangan terbaru dalam teknologi peralatan rumah tangga, termasuk fitur-fitur modern yang meningkatkan kenyamanan pengguna.', 10, '2025-04-10 12:00:00', '2025-04-10 15:00:00', 'admin', 'admin', '2025-04-08 07:47:59', NULL, 1);
INSERT INTO `asesmens` VALUES ('1c111350-7552-4a89-8b8f-aef8a1551073', 'Inovasi dalam Memasak Nasi', 'Hair dryer adalah alat yang digunakan untuk mengeringkan rambut dengan aliran udara panas. Fitur seperti pengaturan suhu dan kecepatan dapat mempengaruhi hasil akhir.', 7, '2025-03-19 03:18:03', '2025-03-19 04:18:03', 'admin@example.com', 'admin@example.com', '2025-03-19 03:18:03', '2025-03-19 03:18:03', 1);
INSERT INTO `asesmens` VALUES ('3ee79f83-44ba-4c79-9de4-a8ac0c626ba8', 'Uji Pengetahuan Anda tentang Peralatan Rumah Tangga', 'Perawatan rambut yang efisien melibatkan penggunaan produk dan teknik yang tepat untuk menjaga kesehatan dan penampilan rambut. Dengan memahami jenis rambut, memilih produk perawatan yang sesuai, serta menerapkan rutinitas perawatan harian, Anda dapat mencapai hasil maksimal tanpa menghabiskan banyak waktu. Fokus pada penggunaan bahan alami dan alat styling modern juga dapat membantu mengurangi kerusakan pada rambut.', 10, '2025-04-08 12:00:00', '2025-04-08 13:00:00', 'admin', 'admin', '2025-04-08 04:14:40', NULL, 1);
INSERT INTO `asesmens` VALUES ('4ae46cce-a270-49be-a892-11af0ff44691', 'Kebersihan Rumah yang Praktis', 'Vacuum cleaner adalah alat yang digunakan untuk membersihkan debu dan kotoran dari permukaan lantai. Berbagai jenis vacuum cleaner menawarkan solusi berbeda untuk kebutuhan kebersihan.', 15, '2025-03-19 03:18:03', '2025-03-19 05:24:12', 'admin@example.com', 'admin@example.com', '2025-03-19 03:18:03', '2025-03-19 03:17:43', 1);
INSERT INTO `asesmens` VALUES ('86fb850b-f5a0-4456-b039-3c4b61d1b20f', 'Perawatan Rutin Alat Dapur: Menjaga Kebersihan dan Keamanan', 'Asesmen ini membahas pentingnya perawatan rutin alat dapur seperti oven, microwave, dan blender untuk memastikan kebersihan serta mencegah risiko kebakaran atau kerusakan.', 12, '2025-04-09 09:00:00', '2025-04-09 12:00:00', 'admin', 'admin', '2025-04-08 07:55:57', NULL, 1);
INSERT INTO `asesmens` VALUES ('87396a95-3b9f-43de-a841-e39b99439640', 'Dampak Lingkungan dari Penggunaan Peralatan Rumah Tangga', 'Peserta akan menganalisis dampak lingkungan dari penggunaan berbagai peralatan rumah tangga serta cara-cara untuk mengurangi jejak karbon melalui pilihan produk yang lebih ramah lingkungan.', 9, '2025-04-09 14:00:00', '2025-04-09 15:00:00', 'admin', 'admin', '2025-04-08 08:04:30', NULL, 1);
INSERT INTO `asesmens` VALUES ('95e36db6-dfa4-4b5e-955e-c9d3e56ae72a', 'Kualitas Udara yang Lebih Baik', 'Air purifier adalah alat yang dirancang untuk menghilangkan polutan dan alergen dari udara. Dengan teknologi filtrasi yang canggih, alat ini membantu menciptakan lingkungan yang lebih sehat. ', 8, '2025-03-28 17:00:00', '2025-03-28 17:43:00', 'admin', 'admin', '2025-03-26 04:37:44', NULL, 1);
INSERT INTO `asesmens` VALUES ('bf24850e-130e-4a3a-bdbc-46af1cf016bd', 'Penggunaan Aman Peralatan Listrik di Rumah', 'Asesmen ini fokus pada praktik keamanan saat menggunakan peralatan listrik di rumah, termasuk langkah-langkah pencegahan untuk menghindari kecelakaan atau kerusakan alat.', 7, '2025-04-16 10:00:00', '2025-04-17 12:00:00', 'admin', 'admin', '2025-04-08 07:59:44', NULL, 1);
INSERT INTO `asesmens` VALUES ('e03e6b28-b664-4d3a-8eb4-cb6e44d2960f', 'Inovasi Teknologi dalam Peralatan Rumah Tangga Modern', 'Peserta akan menjelajahi inovasi terbaru dalam teknologi peralatan rumah tangga seperti smart appliances dan bagaimana teknologi tersebut meningkatkan kenyamanan pengguna sehari-hari.', 8, '2025-04-11 12:00:00', '2025-04-14 12:00:00', 'admin', 'admin', '2025-04-08 07:57:44', NULL, 1);
INSERT INTO `asesmens` VALUES ('e46a4a4c-1d7b-4fa9-82ad-2a9c24ab84f7', 'Kreativitas dalam Memasak', 'Blender adalah alat yang digunakan untuk mencampur, menghaluskan, dan mengaduk bahan makanan. Fungsinya yang serbaguna menjadikannya alat penting di dapur.', 6, '2025-03-27 13:20:00', '2025-03-27 14:15:00', 'admin', 'admin', '2025-03-26 04:35:08', NULL, 1);

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
INSERT INTO `cache` VALUES ('pg_cached_tables', 'a:1:{i:0;s:29:\"powergrid_columns_in_asesmens\";}', 2059723301);
INSERT INTO `cache` VALUES ('powergrid_columns_in_asesmens', 'a:11:{s:2:\"id\";s:8:\"char(36)\";s:5:\"judul\";s:12:\"varchar(255)\";s:9:\"deskripsi\";s:4:\"text\";s:6:\"durasi\";s:3:\"int\";s:9:\"tgl_mulai\";s:9:\"timestamp\";s:11:\"tgl_selesai\";s:9:\"timestamp\";s:11:\"dibuat_oleh\";s:12:\"varchar(255)\";s:13:\"diupdate_oleh\";s:12:\"varchar(255)\";s:10:\"tgl_dibuat\";s:9:\"timestamp\";s:12:\"tgl_diupdate\";s:9:\"timestamp\";s:9:\"apa_aktif\";s:10:\"tinyint(1)\";}', 1744374101);
INSERT INTO `cache` VALUES ('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:35:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:16:\"pertanyaan-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:15:\"pertanyaan-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"pertanyaan-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:16:\"pertanyaan-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:13:\"asesmen-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"asesmen-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"asesmen-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:13:\"asesmen-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"role-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:9:\"role-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"role-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"user-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:9:\"user-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:9:\"user-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:10:\"user-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:19:\"hasil_asesmen-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:17;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:23:\"penilaian_asesmen-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:18;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:22:\"penilaian_asesmen-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:19;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:22:\"penilaian_asesmen-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:20;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:23:\"penilaian_asesmen-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:21;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:23:\"asesmen_evaluator-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:22;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:22:\"asesmen_evaluator-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:23;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:22:\"asesmen_evaluator-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:24;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:23:\"asesmen_evaluator-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:25;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:20:\"daftar_asesmen-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:26;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:19:\"daftar_asesmen-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:27;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:19:\"daftar_asesmen-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:28;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:20:\"daftar_asesmen-hapus\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:29;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:15:\"dashboard-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:30;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:20:\"dashboard-user-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:16:\"permission-lihat\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:32;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:15:\"permission-ubah\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:33;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:15:\"permission-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:34;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:17:\"permission-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"developer\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:7:\"peserta\";s:1:\"c\";s:3:\"web\";}}}', 1744436826);

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
INSERT INTO `detail_pengguna_asesmen` VALUES ('c490799e-ffd9-4d54-816c-a7cd04a8d8ce', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', 'sdfghdsfh', 1, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('b9f2efc5-b328-46b9-b941-c04ab14e8ffb', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('d6b9a2f7-fbed-44ae-bf64-4066b59ef061', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '4b18205b-d752-4a37-9485-221f492e8ea0', 'jhfd', 3, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('9f28d62e-e0d1-4f02-ae0f-18fbaaf5a9bc', '9e7bcab7-56ad-4a10-b80c-6b2b3f082fd0', '87e811e5-eef1-456d-a7c3-2a79e18101b1', 'syeryyh', 1, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('c6450ec0-1669-471d-bbc2-38ca3c923503', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', 'dxjffgh', 5, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('35846b7f-f121-4bce-96bd-19cc2d1ec3ab', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('2a66e697-272a-44cc-a97d-42bc2190f36a', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '4b18205b-d752-4a37-9485-221f492e8ea0', 'hgjghi', 2, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('c3c4b768-6f8f-4dc5-9198-8ecc88413459', '9e81b4c7-e967-42c4-89ae-2f95b7652err', '87e811e5-eef1-456d-a7c3-2a79e18101b1', 'hjghj', 2, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('d7eb9327-c209-45a1-ae18-db68680403a9', '6d57bcef-190c-4f86-8064-6b984dbd0fdb', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'jawab2 soal Uji Pengetahuan Anda tentang Peralatan Rumah Tangga', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('0b22b9c8-366f-4cab-8955-7bf83f5d3101', '6d57bcef-190c-4f86-8064-6b984dbd0fdb', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'jawab2 soal Uji Pengetahuan Anda tentang Peralatan Rumah Tangga', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('b2d8729f-79d2-4f80-a2cd-bf64712a4b5a', '6d57bcef-190c-4f86-8064-6b984dbd0fdb', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'jawab2 soal Uji Pengetahuan Anda tentang Peralatan Rumah Tangga', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('d44fa147-a69e-4b1b-bc2f-0fa86a4fd204', '6d57bcef-190c-4f86-8064-6b984dbd0fdb', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'jawab2 soal Uji Pengetahuan Anda tentang Peralatan Rumah Tangga', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES ('c0748818-3f28-453d-aec6-d68be464a8ad', '6d57bcef-190c-4f86-8064-6b984dbd0fdb', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'jawab2 soal Uji Pengetahuan Anda tentang Peralatan Rumah Tangga', 0, NULL, NULL, NULL);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b200-14ca-441b-8ad3-809c508024c4', '9206fcca-5eaf-4635-95ad-67ed35926512', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b200-14ca-441b-8ad3-809c508024c4', '5b6126e8-e91f-475c-8589-bb431f1b49e2', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b200-14ca-441b-8ad3-809c508024c4', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b200-14ca-441b-8ad3-809c508024c4', '85aefb8e-a872-48fd-adb1-971b48f75f1c', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b200-14ca-441b-8ad3-809c508024c4', 'ff12e39a-bf4b-4439-8778-26951309a204', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b236-2281-4d91-9ebd-7713b09eb907', '9206fcca-5eaf-4635-95ad-67ed35926512', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b236-2281-4d91-9ebd-7713b09eb907', '5b6126e8-e91f-475c-8589-bb431f1b49e2', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b236-2281-4d91-9ebd-7713b09eb907', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b236-2281-4d91-9ebd-7713b09eb907', '85aefb8e-a872-48fd-adb1-971b48f75f1c', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b236-2281-4d91-9ebd-7713b09eb907', 'ff12e39a-bf4b-4439-8778-26951309a204', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b28d-7b9b-44e4-9489-c6ccf852b592', '9206fcca-5eaf-4635-95ad-67ed35926512', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b28d-7b9b-44e4-9489-c6ccf852b592', '5b6126e8-e91f-475c-8589-bb431f1b49e2', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b28d-7b9b-44e4-9489-c6ccf852b592', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b28d-7b9b-44e4-9489-c6ccf852b592', '85aefb8e-a872-48fd-adb1-971b48f75f1c', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b28d-7b9b-44e4-9489-c6ccf852b592', 'ff12e39a-bf4b-4439-8778-26951309a204', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b328-062f-40c5-a43f-f078e1630e2e', '9206fcca-5eaf-4635-95ad-67ed35926512', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b328-062f-40c5-a43f-f078e1630e2e', '5b6126e8-e91f-475c-8589-bb431f1b49e2', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b328-062f-40c5-a43f-f078e1630e2e', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b328-062f-40c5-a43f-f078e1630e2e', '85aefb8e-a872-48fd-adb1-971b48f75f1c', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b328-062f-40c5-a43f-f078e1630e2e', 'ff12e39a-bf4b-4439-8778-26951309a204', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b357-f018-4fc8-98af-ecb125b13773', '9206fcca-5eaf-4635-95ad-67ed35926512', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b357-f018-4fc8-98af-ecb125b13773', '5b6126e8-e91f-475c-8589-bb431f1b49e2', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b357-f018-4fc8-98af-ecb125b13773', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b357-f018-4fc8-98af-ecb125b13773', '85aefb8e-a872-48fd-adb1-971b48f75f1c', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3b357-f018-4fc8-98af-ecb125b13773', 'ff12e39a-bf4b-4439-8778-26951309a204', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bcdd-862f-409b-bfb7-649f88de9970', '9e9fbeaa-a938-4b85-9e37-39e83c952a72', 'j1', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bcdd-862f-409b-bfb7-649f88de9970', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'j2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bcdd-862f-409b-bfb7-649f88de9970', '9ea19a4c-a7a8-4756-9da6-8ac179d239e0', 'j3', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bcdd-862f-409b-bfb7-649f88de9970', '9ea19d04-b2ab-4617-a9e8-7be99afd2641', 'j4', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bdc3-f54a-4213-91fa-885ecf4a6dab', '9206fcca-5eaf-4635-95ad-67ed35926512', 'h1', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bdc3-f54a-4213-91fa-885ecf4a6dab', '5b6126e8-e91f-475c-8589-bb431f1b49e2', 'h2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bdc3-f54a-4213-91fa-885ecf4a6dab', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', 'h3', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bdc3-f54a-4213-91fa-885ecf4a6dab', '85aefb8e-a872-48fd-adb1-971b48f75f1c', 'h4', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3bdc3-f54a-4213-91fa-885ecf4a6dab', 'ff12e39a-bf4b-4439-8778-26951309a204', 'h5', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3d175-14ca-42b7-a3ee-0cca19dcfd9f', '9e9fbeaa-a938-4b85-9e37-39e83c952a72', 'j1', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3d175-14ca-42b7-a3ee-0cca19dcfd9f', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'j2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3d175-14ca-42b7-a3ee-0cca19dcfd9f', '9ea19a4c-a7a8-4756-9da6-8ac179d239e0', 'j3', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '9ea3d175-14ca-42b7-a3ee-0cca19dcfd9f', '9ea19d04-b2ab-4617-a9e8-7be99afd2641', 'j4', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '1a97c2a5-cec1-4437-ab9a-f9755610cdb1', '9e9fbeaa-a938-4b85-9e37-39e83c952a72', 'j2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '1a97c2a5-cec1-4437-ab9a-f9755610cdb1', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'j', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '1a97c2a5-cec1-4437-ab9a-f9755610cdb1', '9ea19a4c-a7a8-4756-9da6-8ac179d239e0', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '1a97c2a5-cec1-4437-ab9a-f9755610cdb1', '9ea19d04-b2ab-4617-a9e8-7be99afd2641', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '24e2a12c-c21b-4af5-a6e7-d264b4deade3', '9e9fbeaa-a938-4b85-9e37-39e83c952a72', 'j2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '24e2a12c-c21b-4af5-a6e7-d264b4deade3', '9e9fc06f-599d-44f9-8a06-f40f85d9a77b', 'j', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '24e2a12c-c21b-4af5-a6e7-d264b4deade3', '9ea19a4c-a7a8-4756-9da6-8ac179d239e0', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '24e2a12c-c21b-4af5-a6e7-d264b4deade3', '9ea19d04-b2ab-4617-a9e8-7be99afd2641', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'ed46c2ec-cf20-4b4b-ac4d-7ab09edeadd1', '9206fcca-5eaf-4635-95ad-67ed35926512', 'j1', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'ed46c2ec-cf20-4b4b-ac4d-7ab09edeadd1', '5b6126e8-e91f-475c-8589-bb431f1b49e2', 'j2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'ed46c2ec-cf20-4b4b-ac4d-7ab09edeadd1', '786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', 'j3', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'ed46c2ec-cf20-4b4b-ac4d-7ab09edeadd1', '85aefb8e-a872-48fd-adb1-971b48f75f1c', 'j4', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'ed46c2ec-cf20-4b4b-ac4d-7ab09edeadd1', 'ff12e39a-bf4b-4439-8778-26951309a204', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '14d487cf-6b0a-43a8-8781-73721ddefb7f', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '14d487cf-6b0a-43a8-8781-73721ddefb7f', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '14d487cf-6b0a-43a8-8781-73721ddefb7f', '4b18205b-d752-4a37-9485-221f492e8ea0', 'j3', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '14d487cf-6b0a-43a8-8781-73721ddefb7f', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'af3405ce-944e-49af-8e1a-7dc5b6def629', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', 'j1', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'af3405ce-944e-49af-8e1a-7dc5b6def629', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', 'j2', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'af3405ce-944e-49af-8e1a-7dc5b6def629', '4b18205b-d752-4a37-9485-221f492e8ea0', 'j3', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, 'af3405ce-944e-49af-8e1a-7dc5b6def629', '87e811e5-eef1-456d-a7c3-2a79e18101b1', 'j4', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '173c56cf-02a6-45d8-98d3-6fc7cda59173', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '173c56cf-02a6-45d8-98d3-6fc7cda59173', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '173c56cf-02a6-45d8-98d3-6fc7cda59173', '4b18205b-d752-4a37-9485-221f492e8ea0', 'j', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '173c56cf-02a6-45d8-98d3-6fc7cda59173', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '5c51f001-aebe-4431-ab58-7bff323f3098', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', 'jj', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '5c51f001-aebe-4431-ab58-7bff323f3098', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', 'jj', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '5c51f001-aebe-4431-ab58-7bff323f3098', '4b18205b-d752-4a37-9485-221f492e8ea0', 'j', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '5c51f001-aebe-4431-ab58-7bff323f3098', '87e811e5-eef1-456d-a7c3-2a79e18101b1', 'jjjj', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '3e3432b8-36dc-4a0a-9266-822cf100879e', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '3e3432b8-36dc-4a0a-9266-822cf100879e', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '3e3432b8-36dc-4a0a-9266-822cf100879e', '4b18205b-d752-4a37-9485-221f492e8ea0', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '3e3432b8-36dc-4a0a-9266-822cf100879e', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '55bb6484-959d-40f4-9bd2-aa01daa79879', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '55bb6484-959d-40f4-9bd2-aa01daa79879', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '55bb6484-959d-40f4-9bd2-aa01daa79879', '4b18205b-d752-4a37-9485-221f492e8ea0', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '55bb6484-959d-40f4-9bd2-aa01daa79879', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '164ddc93-6f67-48b1-af4b-9e7ee767f428', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '164ddc93-6f67-48b1-af4b-9e7ee767f428', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '164ddc93-6f67-48b1-af4b-9e7ee767f428', '4b18205b-d752-4a37-9485-221f492e8ea0', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '164ddc93-6f67-48b1-af4b-9e7ee767f428', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '32485c99-e6b0-4d6a-a868-dedbb58add46', '01e131a6-7649-41eb-8c9a-cdb2c73b5299', NULL, 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '32485c99-e6b0-4d6a-a868-dedbb58add46', '38d9f241-a8f1-46a4-a3e8-3299aceaa138', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '32485c99-e6b0-4d6a-a868-dedbb58add46', '4b18205b-d752-4a37-9485-221f492e8ea0', '', 0, NULL, NULL, 1);
INSERT INTO `detail_pengguna_asesmen` VALUES (NULL, '32485c99-e6b0-4d6a-a868-dedbb58add46', '87e811e5-eef1-456d-a7c3-2a79e18101b1', '', 0, NULL, NULL, 1);

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
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 3);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 5);

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
INSERT INTO `pengguna_asesmens` VALUES ('164ddc93-6f67-48b1-af4b-9e7ee767f428', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 09:13:23', '2025-04-11 09:13:23', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('173c56cf-02a6-45d8-98d3-6fc7cda59173', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 08:23:37', '2025-04-11 08:23:37', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('32485c99-e6b0-4d6a-a868-dedbb58add46', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 09:18:04', '2025-04-11 09:18:04', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('3e3432b8-36dc-4a0a-9266-822cf100879e', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 08:30:21', '2025-04-11 08:30:21', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('55bb6484-959d-40f4-9bd2-aa01daa79879', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 09:01:10', '2025-04-11 09:01:10', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('5c51f001-aebe-4431-ab58-7bff323f3098', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 08:25:00', '2025-04-11 08:25:00', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('9e81b4c7-e967-42c4-89ae-2f95b7652f25', '2', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-03-24 06:53:29', '2025-03-24 06:53:29', '2025-03-25 14:31:55', '2025-03-25 14:32:00', '1');
INSERT INTO `pengguna_asesmens` VALUES ('9ea3d175-14ca-42b7-a3ee-0cca19dcfd9f', '4', '3ee79f83-44ba-4c79-9de4-a8ac0c626ba8', '2025-04-10 05:51:49', '2025-04-10 05:51:49', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('af3405ce-944e-49af-8e1a-7dc5b6def629', '5', '068102fa-8603-4769-ac90-f7d52a13db61', '2025-04-11 08:18:07', '2025-04-11 08:18:07', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('dd47298c-d19e-4472-8768-bc9ea01019b3', '1', '1b7a10e0-5040-446c-bbdb-0546bb3b2b9b', '2025-04-11 07:07:20', '2025-04-11 07:07:20', NULL, NULL, NULL);
INSERT INTO `pengguna_asesmens` VALUES ('ed46c2ec-cf20-4b4b-ac4d-7ab09edeadd1', '1', '1c111350-7552-4a89-8b8f-aef8a1551073', '2025-04-11 07:15:09', '2025-04-11 07:15:09', NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'pertanyaan-lihat', 'web', '2025-04-07 02:23:17', '2025-04-07 02:23:17');
INSERT INTO `permissions` VALUES (2, 'pertanyaan-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (3, 'pertanyaan-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (4, 'pertanyaan-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (5, 'asesmen-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (6, 'asesmen-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (7, 'asesmen-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (8, 'asesmen-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (9, 'role-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (10, 'role-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (11, 'role-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (12, 'role-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (13, 'user-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (14, 'user-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (15, 'user-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (16, 'user-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (17, 'hasil_asesmen-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (21, 'penilaian_asesmen-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (22, 'penilaian_asesmen-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (23, 'penilaian_asesmen-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (24, 'penilaian_asesmen-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (25, 'asesmen_evaluator-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (26, 'asesmen_evaluator-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (27, 'asesmen_evaluator-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (28, 'asesmen_evaluator-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (29, 'daftar_asesmen-lihat', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (30, 'daftar_asesmen-ubah', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (31, 'daftar_asesmen-edit', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (32, 'daftar_asesmen-hapus', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `permissions` VALUES (33, 'dashboard-lihat', 'web', '2025-04-07 09:45:57', '2025-04-07 09:45:59');
INSERT INTO `permissions` VALUES (34, 'dashboard-user-lihat', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (35, 'permission-lihat', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (36, 'permission-ubah', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (37, 'permission-edit', 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (38, 'permission-delete', 'web', NULL, NULL);

-- ----------------------------
-- Table structure for pertanyaans
-- ----------------------------
DROP TABLE IF EXISTS `pertanyaans`;
CREATE TABLE `pertanyaans`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asesmen_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
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
INSERT INTO `pertanyaans` VALUES ('01e131a6-7649-41eb-8c9a-cdb2c73b5299', '068102fa-8603-4769-ac90-f7d52a13db61', '/files/images/pertanyaan/img1.png', 'Apa yang menjadi keunggulan utama dari Hair Dryer UTH700 dibandingkan dengan pengering rambut lainnya?', 'essay', 15, 5, 'admin', 'admin', '2025-04-07 15:37:16', '2025-04-07 15:37:19', 1, 1);
INSERT INTO `pertanyaans` VALUES ('38d9f241-a8f1-46a4-a3e8-3299aceaa138', '068102fa-8603-4769-ac90-f7d52a13db61', '/files/images/pertanyaan/img2.png', 'Sebutkan spesifikasi daya dan voltase dari Hair Dryer UTH700!', 'essay', 10, 4, 'admin', NULL, NULL, NULL, 2, 1);
INSERT INTO `pertanyaans` VALUES ('4b18205b-d752-4a37-9485-221f492e8ea0', '068102fa-8603-4769-ac90-f7d52a13db61', '/files/images/pertanyaan/img3.png', 'Berapa panjang kabel dari Hair Dryer UTH700 dan mengapa panjang ini penting?', 'essay', 20, 5, 'admin', NULL, NULL, NULL, 3, 1);
INSERT INTO `pertanyaans` VALUES ('5b6126e8-e91f-475c-8589-bb431f1b49e2', '1c111350-7552-4a89-8b8f-aef8a1551073', '/files/images/pertanyaan/img4.png', 'Bagaimana Tomo R8 mengenali dan memetakan ruangan?', 'essay', 10, 3, 'admin', NULL, NULL, NULL, 2, 1);
INSERT INTO `pertanyaans` VALUES ('786aa6e2-fdb5-4bb8-a84e-dc2cfb9b0a47', '1c111350-7552-4a89-8b8f-aef8a1551073', NULL, 'Apa manfaat dari fungsi sterilisasi yang dimiliki oleh Tomo R8?', 'essay', 10, 3, 'admin', NULL, NULL, NULL, 3, 1);
INSERT INTO `pertanyaans` VALUES ('85aefb8e-a872-48fd-adb1-971b48f75f1c', '1c111350-7552-4a89-8b8f-aef8a1551073', NULL, 'Apa yang membedakan Tomo R8 dari vacuum cleaner biasa?', 'essay', 120, 4, 'admin', NULL, NULL, NULL, 4, 1);
INSERT INTO `pertanyaans` VALUES ('87e811e5-eef1-456d-a7c3-2a79e18101b1', '068102fa-8603-4769-ac90-f7d52a13db61', NULL, 'Apa fungsi dari mode Cool & Hot pada Hair Dryer UTH700?', 'essay', 5, 5, 'admin', NULL, NULL, NULL, 4, 1);
INSERT INTO `pertanyaans` VALUES ('9206fcca-5eaf-4635-95ad-67ed35926512', '1c111350-7552-4a89-8b8f-aef8a1551073', NULL, 'Apa yang menjadi keunggulan utama dari Hair Dryer UTH700 dibandingkan dengan pengering rambut lainnya?', 'essay', 60, 4, 'admin', NULL, NULL, NULL, 1, 1);
INSERT INTO `pertanyaans` VALUES ('9e85babe-2567-440c-83e7-d9592da2fa61', '95e36db6-dfa4-4b5e-955e-c9d3e56ae72a', NULL, '<p>Jelaskan cara kerja mesin ini dan bagaimana alat ini dapat mempermudah proses memfilter udara. Apa saja fitur tambahan yang biasanya ada pada rice cooker modern?<br></p>', 'essay', 20, 2, 'admin', 'admin', '2025-03-26 06:53:28', '2025-03-26 06:53:28', 2, 1);
INSERT INTO `pertanyaans` VALUES ('9e9fbeaa-a938-4b85-9e37-39e83c952a72', '3ee79f83-44ba-4c79-9de4-a8ac0c626ba8', NULL, 'Jelaskan berbagai jenis rambut yang umum ditemukan dan bagaimana masing-masing jenis mempengaruhi pemilihan produk perawatan. Sertakan contoh produk yang sesuai untuk setiap jenis rambut.', 'essay', 5, 5, 'admin', 'admin', '2025-04-08 05:15:58', '2025-04-08 05:15:58', 1, 1);
INSERT INTO `pertanyaans` VALUES ('9e9fc06f-599d-44f9-8a06-f40f85d9a77b', '3ee79f83-44ba-4c79-9de4-a8ac0c626ba8', NULL, 'Deskripsikan rutinitas perawatan harian yang ideal untuk menjaga kesehatan rambut. Apa saja langkah-langkah penting dalam rutinitas tersebut, dan mengapa setiap langkah itu penting?', 'essay', 4, 5, 'admin', 'admin', '2025-04-08 05:20:55', '2025-04-08 05:20:55', 2, 1);
INSERT INTO `pertanyaans` VALUES ('9e9fd467-652b-46c9-a114-4f5caead4407', '95e36db6-dfa4-4b5e-955e-c9d3e56ae72a', NULL, 'Jelaskan1 bagaimana air purifier bekerja dalam menghilangkan polutan dan alergen dari udara. Sebutkan teknologi filtrasi yang umum digunakan dalam alat ini!', 'essay', 20, 5, 'admin', 'admin', '2025-04-08 06:16:45', '2025-04-08 07:28:10', 1, 1);
INSERT INTO `pertanyaans` VALUES ('9ea19a4c-a7a8-4756-9da6-8ac179d239e0', '3ee79f83-44ba-4c79-9de4-a8ac0c626ba8', NULL, 'Diskusikan faktor-faktor apa saja yang perlu dipertimbangkan saat memilih produk perawatan rambut. Bagaimana cara Anda menentukan apakah suatu produk cocok atau tidak untuk tipe rambut tertentu? Berikan contoh situasi di mana pemilihan produk dapat mempengaruhi hasil akhir.', 'essay', 5, 10, 'admin', 'admin', '2025-04-09 03:25:55', '2025-04-09 03:25:55', 5, 1);
INSERT INTO `pertanyaans` VALUES ('9ea19d04-b2ab-4617-a9e8-7be99afd2641', '3ee79f83-44ba-4c79-9de4-a8ac0c626ba8', NULL, 'Analisis beberapa teknik perawatan rambut, seperti pengeringan, penataan, dan perlindungan dari panas. Bagaimana teknik-teknik ini berkontribusi pada kesehatan dan penampilan rambut? Sertakan tips praktis untuk menerapkan teknik-teknik tersebut dengan benar.', 'essay', 5, 5, 'admin', 'admin', '2025-04-09 03:33:32', '2025-04-09 03:33:32', 6, 1);
INSERT INTO `pertanyaans` VALUES ('9ea6253e-5755-45d8-a2f2-a4fda8a4f59c', 'e46a4a4c-1d7b-4fa9-82ad-2a9c24ab84f7', NULL, 'Apa keunggulan utama dari Rice Cooker Umeda dibandingkan dengan rice cooker biasa?', 'essay', 20, 10, 'admin', 'admin', '2025-04-11 09:37:44', '2025-04-11 09:37:44', 1, 1);
INSERT INTO `pertanyaans` VALUES ('9ea62787-51aa-46c5-b723-f6e2ab349971', 'e46a4a4c-1d7b-4fa9-82ad-2a9c24ab84f7', NULL, 'Bagaimana cara kerja timer otomatis pada Rice Cooker Umeda dalam proses memasak?', 'essay', 12, 10, 'admin', 'admin', '2025-04-11 09:44:09', '2025-04-11 09:44:09', 2, 1);
INSERT INTO `pertanyaans` VALUES ('ff12e39a-bf4b-4439-8778-26951309a204', '1c111350-7552-4a89-8b8f-aef8a1551073', NULL, 'Apa saja fungsi utama dari Tomo R8 Smart Robot Vacuum and Mop Combo?', 'essay', 60, 4, 'admin', NULL, NULL, NULL, 5, 1);

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
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (4, 2);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (7, 2);
INSERT INTO `role_has_permissions` VALUES (8, 2);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (14, 2);
INSERT INTO `role_has_permissions` VALUES (15, 2);
INSERT INTO `role_has_permissions` VALUES (16, 2);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (22, 2);
INSERT INTO `role_has_permissions` VALUES (23, 2);
INSERT INTO `role_has_permissions` VALUES (24, 2);
INSERT INTO `role_has_permissions` VALUES (25, 2);
INSERT INTO `role_has_permissions` VALUES (26, 2);
INSERT INTO `role_has_permissions` VALUES (27, 2);
INSERT INTO `role_has_permissions` VALUES (28, 2);
INSERT INTO `role_has_permissions` VALUES (29, 2);
INSERT INTO `role_has_permissions` VALUES (30, 2);
INSERT INTO `role_has_permissions` VALUES (31, 2);
INSERT INTO `role_has_permissions` VALUES (32, 2);
INSERT INTO `role_has_permissions` VALUES (33, 2);
INSERT INTO `role_has_permissions` VALUES (1, 3);
INSERT INTO `role_has_permissions` VALUES (2, 3);
INSERT INTO `role_has_permissions` VALUES (3, 3);
INSERT INTO `role_has_permissions` VALUES (4, 3);
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
INSERT INTO `role_has_permissions` VALUES (21, 3);
INSERT INTO `role_has_permissions` VALUES (22, 3);
INSERT INTO `role_has_permissions` VALUES (23, 3);
INSERT INTO `role_has_permissions` VALUES (24, 3);
INSERT INTO `role_has_permissions` VALUES (25, 3);
INSERT INTO `role_has_permissions` VALUES (26, 3);
INSERT INTO `role_has_permissions` VALUES (27, 3);
INSERT INTO `role_has_permissions` VALUES (28, 3);
INSERT INTO `role_has_permissions` VALUES (29, 3);
INSERT INTO `role_has_permissions` VALUES (30, 3);
INSERT INTO `role_has_permissions` VALUES (31, 3);
INSERT INTO `role_has_permissions` VALUES (32, 3);
INSERT INTO `role_has_permissions` VALUES (33, 3);
INSERT INTO `role_has_permissions` VALUES (35, 3);
INSERT INTO `role_has_permissions` VALUES (36, 3);
INSERT INTO `role_has_permissions` VALUES (37, 3);
INSERT INTO `role_has_permissions` VALUES (38, 3);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'peserta', 'web', '2025-04-07 02:23:18', '2025-04-07 02:23:18');
INSERT INTO `roles` VALUES (2, 'admin', 'web', '2025-04-07 02:23:19', '2025-04-07 02:23:19');
INSERT INTO `roles` VALUES (3, 'developer', 'web', '2025-04-07 02:23:19', '2025-04-07 02:23:19');

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
INSERT INTO `sessions` VALUES ('Gjbjajd77fHBhW6FHGup1bd8xxVhEC2kMar5Lpdg', 5, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiNUZWMHRGVW9hMUMxb1pyb0VCMHBNSDJrMWk0NFlYZUlZUE1ORUVXaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovL2xvY2FsaG9zdDo4MDAxL2Rhc2Jvci11c2VyIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS9rb25maXJtYXNpLXNlbGVzYWkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTU6InBlbmdndW5hQXNlc21lbiI7YTo0OntzOjI3OiJwZW5nZ3VuYV9hc2VzbWVuLmFzZXNtZW5faWQiO3M6MzY6ImU0NmE0YTRjLTFkN2ItNGZhOS04MmFkLTJhOWMyNGFiODRmNyI7czoyNjoicGVuZ2d1bmFfYXNlc21lbi50Z2xfbXVsYWkiO3M6MTk6IjIwMjUtMDMtMjcgMTM6MjA6MDAiO3M6Mjg6InBlbmdndW5hX2FzZXNtZW4udGdsX3NlbGVzYWkiO3M6MTk6IjIwMjUtMDMtMjcgMTQ6MTU6MDAiO3M6MzE6InBlbmdndW5hX2FzZXNtZW4uYXNlc21lbl9kdXJhc2kiO3M6MjI6IjAgamFtIDU1IG1lbml0IDAgZGV0aWsiO31zOjIxOiJkZXRhaWxQZW5nZ3VuYUFzZXNtZW4iO2E6Mjp7aTowO2E6MTE6e3M6NToiaW5kZXgiO2k6MDtzOjEzOiJwZXJ0YW55YWFuX2lkIjtzOjM2OiI5ZTlmZDQ2Ny02NTJiLTQ2YzktYTExNC00ZjVjYWVhZDQ0MDciO3M6Nzoibm9fdXJ1dCI7aToxO3M6OToiaW1hZ2VfdXJsIjtOO3M6MTA6InBlcnRhbnlhYW4iO3M6MTU2OiJKZWxhc2thbjEgYmFnYWltYW5hIGFpciBwdXJpZmllciBiZWtlcmphIGRhbGFtIG1lbmdoaWxhbmdrYW4gcG9sdXRhbiBkYW4gYWxlcmdlbiBkYXJpIHVkYXJhLiBTZWJ1dGthbiB0ZWtub2xvZ2kgZmlsdHJhc2kgeWFuZyB1bXVtIGRpZ3VuYWthbiBkYWxhbSBhbGF0IGluaSEiO3M6NjoiZHVyYXNpIjtpOjIwO3M6NToiYm9ib3QiO2k6NTtzOjc6Imphd2FiYW4iO3M6MDoiIjtzOjE2OiJ3YWt0dV9tdWxhaV9zb2FsIjtzOjE5OiIyMDI1LTA0LTExIDA5OjE5OjExIjtzOjE4OiJ3YWt0dV9zZWxlc2FpX3NvYWwiO3M6MTk6IjIwMjUtMDQtMTEgMDk6MTk6MzEiO3M6MTA6InNpc2Ffd2FrdHUiO2Q6MTkuOTAzNTczO31pOjE7YToxMTp7czo1OiJpbmRleCI7aToxO3M6MTM6InBlcnRhbnlhYW5faWQiO3M6MzY6IjllODViYWJlLTI1NjctNDQwYy04M2U3LWQ5NTkyZGEyZmE2MSI7czo3OiJub191cnV0IjtpOjI7czo5OiJpbWFnZV91cmwiO047czoxMDoicGVydGFueWFhbiI7czoxNzI6IjxwPkplbGFza2FuIGNhcmEga2VyamEgbWVzaW4gaW5pIGRhbiBiYWdhaW1hbmEgYWxhdCBpbmkgZGFwYXQgbWVtcGVybXVkYWggcHJvc2VzIG1lbWZpbHRlciB1ZGFyYS4gQXBhIHNhamEgZml0dXIgdGFtYmFoYW4geWFuZyBiaWFzYW55YSBhZGEgcGFkYSByaWNlIGNvb2tlciBtb2Rlcm4/PGJyPjwvcD4iO3M6NjoiZHVyYXNpIjtpOjIwO3M6NToiYm9ib3QiO2k6MjtzOjc6Imphd2FiYW4iO3M6MDoiIjtzOjE2OiJ3YWt0dV9tdWxhaV9zb2FsIjtOO3M6MTg6Indha3R1X3NlbGVzYWlfc29hbCI7TjtzOjEwOiJzaXNhX3dha3R1IjtpOjA7fX1zOjI2OiJpbmRleERldGFpbFBlbmdndW5hQXNlc21lbiI7aTowO3M6MTY6InBlbmdndW5hX2FzZXNtZW4iO2E6MTp7czoxMDoiYXNlc21lbl9pZCI7czozNjoiMDY4MTAyZmEtODYwMy00NzY5LWFjOTAtZjdkNTJhMTNkYjYxIjt9fQ==', 1744364533);
INSERT INTO `sessions` VALUES ('pteKuVjyO6zI6aatW5a5ya8gEjF2OQiZIHT7d54m', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6IlBRNUpOMXR0UmNiMWNhdWp5azNkdzMwRGZjU3FnRjBmOFdUZmx2WnkiO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNib3IiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4MToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FzZXNtZW4tZXZhbHVhdG9yL3ViYWgvZTQ2YTRhNGMtMWQ3Yi00ZmE5LTgyYWQtMmE5YzI0YWI4NGY3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJzdGF0ZSI7czo0MDoiZW9GVjRBWm1Pek9ZRk44WHF1Tm9YMGQ1bEJPTmZyTlZteUpOQkE5QyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE2OiJwZW5nZ3VuYV9hc2VzbWVuIjthOjE6e3M6MTA6ImFzZXNtZW5faWQiO3M6MzY6ImU0NmE0YTRjLTFkN2ItNGZhOS04MmFkLTJhOWMyNGFiODRmNyI7fXM6MTU6InBlbmdndW5hQXNlc21lbiI7TjtzOjE3OiJwZW5nZ3VuYV9hc2VzZW1lbiI7YToxOntzOjEwOiJhc2VzbWVuX2lkIjtzOjM2OiI4NzM5NmE5NS0zYjlmLTQzZGUtYTg0MS1lMzliOTk0Mzk2NDAiO31zOjQ6Im1hcnkiO2E6MTp7czo1OiJ0b2FzdCI7YTowOnt9fX0=', 1744364650);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gauth_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gauth_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, 'aslanpeserta', 'aslanpeserta@gmail.com', '2025-04-07 02:23:21', '$2y$12$CCRoBXNaCEYMMgCdp/HA.ePV/wj6VSCSyC5jDJz19sZIXaZCRpGES', 'MKfffWbk8ZawrAkLgbtAN0vczx0QpBwBV82ClMIhb7mORZFojsiEURMtOFAK', '2025-04-07 09:25:16', '2025-04-07 09:25:19', NULL, NULL);
INSERT INTO `users` VALUES (2, NULL, 'aslandeveloper', 'aslandeveloper@gmail.com', '2025-04-07 09:25:08', '$2y$12$CCRoBXNaCEYMMgCdp/HA.ePV/wj6VSCSyC5jDJz19sZIXaZCRpGES', NULL, '2025-04-07 09:25:12', '2025-04-07 09:25:14', NULL, NULL);
INSERT INTO `users` VALUES (3, NULL, 'aslanadmin ', 'aslanadmin@gmail.com', '2025-04-07 09:25:54', '$2y$12$CCRoBXNaCEYMMgCdp/HA.ePV/wj6VSCSyC5jDJz19sZIXaZCRpGES', NULL, '2025-04-07 09:25:47', '2025-04-07 09:25:49', NULL, NULL);
INSERT INTO `users` VALUES (4, NULL, 'afika', 'afika@gmail.com', '2025-04-08 10:55:02', '$2y$12$CCRoBXNaCEYMMgCdp/HA.ePV/wj6VSCSyC5jDJz19sZIXaZCRpGES', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, NULL, 'peserta2', 'peserta2@gmail.com', NULL, '$2y$12$CCRoBXNaCEYMMgCdp/HA.ePV/wj6VSCSyC5jDJz19sZIXaZCRpGES', NULL, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
