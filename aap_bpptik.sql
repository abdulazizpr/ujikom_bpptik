/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : aap_bpptik

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2017-07-11 12:25:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aap_buku
-- ----------------------------
DROP TABLE IF EXISTS `aap_buku`;
CREATE TABLE `aap_buku` (
  `aap_kode_buku` varchar(8) NOT NULL,
  `aap_judul_buku` varchar(100) NOT NULL,
  `aap_pengarang` varchar(100) NOT NULL,
  `aap_penerbit` varchar(100) NOT NULL,
  `aap_tahun_terbit` varchar(4) NOT NULL,
  `aap_harga` int(11) NOT NULL,
  PRIMARY KEY (`aap_kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aap_buku
-- ----------------------------
INSERT INTO `aap_buku` VALUES ('BK001', 'Algoritma dan Pemrograman', 'Rosa Ariani Sukamto', 'Informatika', '2014', '35000');
INSERT INTO `aap_buku` VALUES ('BK002', 'Basis Data', 'Maman Abdurahman', 'Informatika', '2015', '50000');
INSERT INTO `aap_buku` VALUES ('BK003', 'Biologi', 'Sutrisna', 'Erlangga', '2002', '35000');

-- ----------------------------
-- Table structure for aap_login
-- ----------------------------
DROP TABLE IF EXISTS `aap_login`;
CREATE TABLE `aap_login` (
  `aap_id` int(11) NOT NULL AUTO_INCREMENT,
  `aap_username` varchar(20) NOT NULL,
  `aap_password` varchar(255) NOT NULL,
  PRIMARY KEY (`aap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aap_login
-- ----------------------------
INSERT INTO `aap_login` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for aap_pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `aap_pemesanan`;
CREATE TABLE `aap_pemesanan` (
  `aap_kode_pemesanan` varchar(8) NOT NULL,
  `aap_tanggal_pemesanan` date NOT NULL,
  `aap_email_pemesanan` varchar(50) NOT NULL,
  `aap_kode_buku` varchar(8) NOT NULL,
  `aap_jumlah_pemesanan` int(11) NOT NULL,
  `aap_keterangan` varchar(255) DEFAULT NULL,
  `kode_bayar` int(11) NOT NULL,
  PRIMARY KEY (`aap_kode_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aap_pemesanan
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;
