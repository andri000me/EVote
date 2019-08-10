/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100126
 Source Host           : localhost:3306
 Source Schema         : evote

 Target Server Type    : MySQL
 Target Server Version : 100126
 File Encoding         : 65001

 Date: 09/08/2019 22:36:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username_admin` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password_admin` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `hak_akses` enum('admin','operator-teknik','operator-fekon','operator-fok','operator-mipa','operator-fis','operator-fip','operator-hukum','operator-pertanian','operator-fsb','operator-fik','dekan','rektor') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `login_terakhir` datetime(0) NOT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Fachrul Rusli', 'fachrulrusli', 'fachrulrusli', 'admin', '2019-08-09 20:12:20');

-- ----------------------------
-- Table structure for detail_capres
-- ----------------------------
DROP TABLE IF EXISTS `detail_capres`;
CREATE TABLE `detail_capres`  (
  `id_detail_capres` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama_capres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fakultas_capres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan_capres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prodi_capres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `angkatan_capres` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar_capres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_paslon` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_detail_capres`) USING BTREE,
  INDEX `id_paslon`(`id_paslon`) USING BTREE,
  CONSTRAINT `detail_capres_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_capres
-- ----------------------------
INSERT INTO `detail_capres` VALUES (1, 'Rian Sulistio', 'Teknik', 'Teknik Informatika', 'Perawat', '2016', '20160816_184714.jpg', 3);
INSERT INTO `detail_capres` VALUES (2, 'Krisdewanto', 'Hukum', 'Ilmu Hukum', 'Pendidikan Hukum', '2015', 'nan.jpg', 4);

-- ----------------------------
-- Table structure for detail_cawapres
-- ----------------------------
DROP TABLE IF EXISTS `detail_cawapres`;
CREATE TABLE `detail_cawapres`  (
  `id_detail_cawapres` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama_cawapres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fakultas_cawapres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan_cawapres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prodi_cawapres` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `angkatan_cawapres` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar_cawapres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_paslon` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_detail_cawapres`) USING BTREE,
  INDEX `id_paslon`(`id_paslon`) USING BTREE,
  CONSTRAINT `detail_cawapres_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detail_cawapres
-- ----------------------------
INSERT INTO `detail_cawapres` VALUES (1, 'Fahri Akuba', 'Olahraga & Kesehatan', 'Farmasi', 'Perawat', '2016', '20160816_184714.jpg', 3);
INSERT INTO `detail_cawapres` VALUES (2, 'Julisa Amny Tapola', 'Ekonomi', 'Manajemen', 'Manajemen', '2015', 'nan.jpg', 4);

-- ----------------------------
-- Table structure for fakultas
-- ----------------------------
DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas`  (
  `id_fakultas` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_fakultas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of fakultas
-- ----------------------------
INSERT INTO `fakultas` VALUES (1, 'RT 01');
INSERT INTO `fakultas` VALUES (2, 'RT 02');
INSERT INTO `fakultas` VALUES (3, 'RT 03');
INSERT INTO `fakultas` VALUES (4, 'RT 05');
INSERT INTO `fakultas` VALUES (5, 'RT 06');
INSERT INTO `fakultas` VALUES (6, 'RT 04');

-- ----------------------------
-- Table structure for paslon
-- ----------------------------
DROP TABLE IF EXISTS `paslon`;
CREATE TABLE `paslon`  (
  `id_paslon` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama_koalisi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_paslon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fakultas_koalisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_urut` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `visimisi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_paslon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of paslon
-- ----------------------------
INSERT INTO `paslon` VALUES (3, 'UNG Bersatu', 'Rian & Fahri', '', '1', '<p>Visi <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br>Misi</p>\r\n<ol>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n</ol>');
INSERT INTO `paslon` VALUES (4, 'Menuju PERUBAHAN!', 'Kris & Lisa', '', '2', 'Visi <br>\r\n              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n              <br>\r\n              Misi <br>\r\n              <ol>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n              </ol>');

-- ----------------------------
-- Table structure for pemilih
-- ----------------------------
DROP TABLE IF EXISTS `pemilih`;
CREATE TABLE `pemilih`  (
  `id_pemilih` int(11) NOT NULL AUTO_INCREMENT,
  `nim_pemilih` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pemilih` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token_pemilih` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_pemilih` enum('ya','tidak') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'tidak',
  `telah_memilih` enum('ya','tidak') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'tidak',
  `terakhir_login` datetime(0) NOT NULL,
  `id_fakultas` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_pemilih`) USING BTREE,
  UNIQUE INDEX `nim_pemilih`(`nim_pemilih`) USING BTREE,
  INDEX `id_fakultas`(`id_fakultas`) USING BTREE,
  INDEX `nim_pemilih_2`(`nim_pemilih`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1546 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemilih
-- ----------------------------
INSERT INTO `pemilih` VALUES (1512, '531416001', 'Foo', 'qwerty', 'ya', 'ya', '2018-03-30 13:16:12', 1);
INSERT INTO `pemilih` VALUES (1513, '531416002', 'Fii', 'qwerty', 'ya', 'ya', '2018-03-14 10:17:35', 2);
INSERT INTO `pemilih` VALUES (1514, '531416003', 'Faa', 'qwerty', 'ya', 'ya', '2018-03-14 10:17:56', 3);
INSERT INTO `pemilih` VALUES (1515, '531416004', 'Fee', 'qwerty', 'ya', 'ya', '2018-03-14 10:18:35', 4);
INSERT INTO `pemilih` VALUES (1516, '531416005', 'Fuu', 'qwerty', 'ya', 'ya', '2018-03-14 10:18:48', 5);
INSERT INTO `pemilih` VALUES (1517, '531416006', 'Bar', 'qwerty', 'ya', 'tidak', '2018-03-30 10:30:00', 1);
INSERT INTO `pemilih` VALUES (1518, '531416007', 'Ber', 'qwerty', 'ya', 'tidak', '2018-04-09 13:09:54', 2);
INSERT INTO `pemilih` VALUES (1519, '531416008', 'Bur', 'qwerty', 'ya', 'tidak', '2018-03-14 10:19:37', 3);
INSERT INTO `pemilih` VALUES (1520, '531416009', 'Bir', 'qwerty', 'ya', 'tidak', '2018-03-14 10:19:54', 4);
INSERT INTO `pemilih` VALUES (1522, '531416011', 'Baz', 'qwerty', 'ya', 'tidak', '2018-03-14 11:26:15', 5);
INSERT INTO `pemilih` VALUES (1523, '531416012', 'Bez', 'qwerty', 'ya', 'ya', '2018-04-13 14:49:46', 1);
INSERT INTO `pemilih` VALUES (1524, '531416013', 'Buz', 'qwerty', 'ya', 'ya', '2018-03-30 16:56:21', 2);
INSERT INTO `pemilih` VALUES (1525, '531416014', 'Boz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 3);
INSERT INTO `pemilih` VALUES (1526, '531416015', 'Biz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 4);
INSERT INTO `pemilih` VALUES (1527, '531416016', 'Bax', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 5);
INSERT INTO `pemilih` VALUES (1528, '531416017', 'Bex', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 1);
INSERT INTO `pemilih` VALUES (1529, '531416018', 'Bux', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 2);
INSERT INTO `pemilih` VALUES (1530, '531416019', 'Box', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 3);
INSERT INTO `pemilih` VALUES (1531, '531416020', 'Bix', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 4);
INSERT INTO `pemilih` VALUES (1532, '531416021', 'Tux', 'qwerty', 'tidak', 'tidak', '2018-03-11 10:44:28', 5);
INSERT INTO `pemilih` VALUES (1533, '531416022', 'Tax', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 1);
INSERT INTO `pemilih` VALUES (1534, '531416023', 'Tex', 'qwerty', 'ya', 'tidak', '2018-03-30 10:24:36', 2);
INSERT INTO `pemilih` VALUES (1535, '531416024', 'Tix', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 3);
INSERT INTO `pemilih` VALUES (1536, '531416025', 'Tox', 'qwerty', 'tidak', 'tidak', '2018-03-12 14:31:34', 4);
INSERT INTO `pemilih` VALUES (1537, '531416026', 'Muz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 5);
INSERT INTO `pemilih` VALUES (1538, '531416027', 'Maz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 1);
INSERT INTO `pemilih` VALUES (1539, '531416028', 'Mez', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 2);
INSERT INTO `pemilih` VALUES (1540, '531416029', 'Miz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 3);
INSERT INTO `pemilih` VALUES (1541, '531416030', 'Moz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 4);
INSERT INTO `pemilih` VALUES (1544, '531416010', 'Bor', 'qwerty', 'ya', 'ya', '2018-03-14 14:30:37', 5);
INSERT INTO `pemilih` VALUES (1545, '14167064', 'Fachrul Rusli', 'qwerty', 'ya', 'tidak', '2019-07-14 18:40:18', 1);

-- ----------------------------
-- Table structure for pemilihan
-- ----------------------------
DROP TABLE IF EXISTS `pemilihan`;
CREATE TABLE `pemilihan`  (
  `id_pemilihan` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_memilih` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pemilih` int(11) NOT NULL,
  `id_paslon` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pemilihan`) USING BTREE,
  INDEX `id_pemilih`(`id_pemilih`) USING BTREE,
  INDEX `id_paslon`(`id_paslon`) USING BTREE,
  CONSTRAINT `pemilihan_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pemilihan_ibfk_2` FOREIGN KEY (`id_pemilih`) REFERENCES `pemilih` (`id_pemilih`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pemilihan
-- ----------------------------
INSERT INTO `pemilihan` VALUES (61, '2018-03-14 10:17:15', 1512, 3);
INSERT INTO `pemilihan` VALUES (62, '2018-03-14 10:17:38', 1513, 4);
INSERT INTO `pemilihan` VALUES (63, '2018-03-14 10:17:58', 1514, 4);
INSERT INTO `pemilihan` VALUES (64, '2018-03-14 10:18:15', 1515, 3);
INSERT INTO `pemilihan` VALUES (65, '2018-03-14 10:18:51', 1516, 3);
INSERT INTO `pemilihan` VALUES (66, '2018-03-14 14:30:12', 1544, 4);
INSERT INTO `pemilihan` VALUES (67, '2018-03-30 16:53:10', 1524, 3);
INSERT INTO `pemilihan` VALUES (68, '2018-04-13 14:50:13', 1523, 4);

SET FOREIGN_KEY_CHECKS = 1;
