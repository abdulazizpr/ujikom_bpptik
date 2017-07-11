/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : aap_bpptik

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2017-07-11 22:16:13
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `aap_kode_bayar` int(11) NOT NULL,
  PRIMARY KEY (`aap_kode_pemesanan`),
  KEY `fk_kode_buku` (`aap_kode_buku`),
  CONSTRAINT `fk_kode_buku` FOREIGN KEY (`aap_kode_buku`) REFERENCES `aap_buku` (`aap_kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aap_pemesanan
-- ----------------------------
INSERT INTO `aap_pemesanan` VALUES ('TRX001', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK001', '8', 'Bayar Lunas', '1');
INSERT INTO `aap_pemesanan` VALUES ('TRX002', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK002', '10', 'Bayar Lunas', '1');
INSERT INTO `aap_pemesanan` VALUES ('TRX003', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK003', '52', 'Bayar Lunas', '1');
INSERT INTO `aap_pemesanan` VALUES ('TRX004', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK004', '15', 'Bayar Lunas', '1');
INSERT INTO `aap_pemesanan` VALUES ('TRX005', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK005', '25', 'Bayar Lunas', '1');
INSERT INTO `aap_pemesanan` VALUES ('TRX006', '2017-07-11', 'abdulazizpriatna@gmail.com', 'BK006', '2', 'Bayar Lunas', '1');
INSERT INTO `aap_pemesanan` VALUES ('TRX007', '2017-07-11', 'toto@gmail.com', 'BK001', '4', null, '0');
SET FOREIGN_KEY_CHECKS=1;
