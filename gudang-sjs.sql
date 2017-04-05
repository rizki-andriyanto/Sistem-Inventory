/*
Navicat MariaDB Data Transfer

Source Server         : localhost_3306
Source Server Version : 100017
Source Host           : localhost:3306
Source Database       : sumber_jaya_sakti

Target Server Type    : MariaDB
Target Server Version : 100017
File Encoding         : 65001

Date: 2016-08-03 21:48:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `keterangan_barang` varchar(50) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_barang_mobil` (`id_mobil`) USING BTREE,
  KEY `fk_barang_kategori` (`id_kategori`) USING BTREE,
  KEY `fk_barang_satuan` (`id_satuan`) USING BTREE,
  CONSTRAINT `fk_barang_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_barang_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_barang_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang
-- ----------------------------

-- ----------------------------
-- Table structure for barang_in
-- ----------------------------
DROP TABLE IF EXISTS `barang_in`;
CREATE TABLE `barang_in` (
  `id_barang_in` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat_jalan` int(10) DEFAULT NULL,
  `tgl_in` date DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `jumlah_in` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang_in`),
  KEY `fk_barang_in_barang` (`id_barang`) USING BTREE,
  CONSTRAINT `fk_barang_in_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang_in
-- ----------------------------

-- ----------------------------
-- Table structure for barang_out
-- ----------------------------
DROP TABLE IF EXISTS `barang_out`;
CREATE TABLE `barang_out` (
  `id_barang_out` int(11) NOT NULL AUTO_INCREMENT,
  `no_nota` int(10) DEFAULT NULL,
  `tgl_out` date DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `rangpoljual` varchar(25) DEFAULT NULL,
  `jumlah_out` int(11) DEFAULT NULL,
  `nama_marketing` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang_out`),
  KEY `fk_barang_out_barang` (`id_barang`) USING BTREE,
  KEY `fk_barang_out_pegawai` (`nama_marketing`) USING BTREE,
  CONSTRAINT `fk_barang_out_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang_out
-- ----------------------------

-- ----------------------------
-- Table structure for barang_request
-- ----------------------------
DROP TABLE IF EXISTS `barang_request`;
CREATE TABLE `barang_request` (
  `id_request` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_request` date DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT NULL,
  `jumlah_request` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_request`),
  KEY `fk_request_barang` (`id_barang`) USING BTREE,
  CONSTRAINT `fk_request_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of barang_request
-- ----------------------------

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('JAB1', 'MANAGER');
INSERT INTO `jabatan` VALUES ('JAB10', 'MEKANIK AC');
INSERT INTO `jabatan` VALUES ('JAB11', 'GUDANG');
INSERT INTO `jabatan` VALUES ('JAB12', 'SOPIR');
INSERT INTO `jabatan` VALUES ('JAB13', 'PENAGIHAN');
INSERT INTO `jabatan` VALUES ('JAB14', 'BEKLEED');
INSERT INTO `jabatan` VALUES ('JAB2', 'CHECKLIST');
INSERT INTO `jabatan` VALUES ('JAB3', 'MANAGER');
INSERT INTO `jabatan` VALUES ('JAB4', 'KACA FILM');
INSERT INTO `jabatan` VALUES ('JAB5', 'ANTI KARAT');
INSERT INTO `jabatan` VALUES ('JAB6', 'MARKETING');
INSERT INTO `jabatan` VALUES ('JAB7', 'ADMIN');
INSERT INTO `jabatan` VALUES ('JAB8', 'SECURITY');
INSERT INTO `jabatan` VALUES ('JAB9', 'KEPALA BENGKEL');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'COVER JOK');
INSERT INTO `kategori` VALUES ('2', 'BEKLEED');
INSERT INTO `kategori` VALUES ('3', 'BEMPER DEPAN');
INSERT INTO `kategori` VALUES ('4', 'BEMPER BELAKANG');
INSERT INTO `kategori` VALUES ('5', 'FOOT STEP');
INSERT INTO `kategori` VALUES ('6', 'KAMERA');
INSERT INTO `kategori` VALUES ('7', 'MONITOR HEAD REST');
INSERT INTO `kategori` VALUES ('8', 'MONITOR HEAD UNIT');
INSERT INTO `kategori` VALUES ('9', 'ALARM');
INSERT INTO `kategori` VALUES ('10', 'KARPET DASAR');

-- ----------------------------
-- Table structure for mobil
-- ----------------------------
DROP TABLE IF EXISTS `mobil`;
CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `produk_mobil` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mobil
-- ----------------------------
INSERT INTO `mobil` VALUES ('1', 'Avanza', 'Toyota');
INSERT INTO `mobil` VALUES ('2', 'Innova', 'Toyota');
INSERT INTO `mobil` VALUES ('3', 'Etios', 'Toyota');
INSERT INTO `mobil` VALUES ('4', 'Hilux', 'Toyota');
INSERT INTO `mobil` VALUES ('5', 'Yaris', 'Toyota');
INSERT INTO `mobil` VALUES ('6', 'Jazz', 'Honda');
INSERT INTO `mobil` VALUES ('7', 'Mobilio', 'Honda');
INSERT INTO `mobil` VALUES ('8', 'Brio', 'Honda');
INSERT INTO `mobil` VALUES ('9', 'Hrv', 'Honda');
INSERT INTO `mobil` VALUES ('10', 'Brv', 'Honda');
INSERT INTO `mobil` VALUES ('11', 'Ertiga', 'Suzuki');
INSERT INTO `mobil` VALUES ('12', 'Swift', 'Suzuki');
INSERT INTO `mobil` VALUES ('13', 'Wagon', 'Suzuki');
INSERT INTO `mobil` VALUES ('14', 'Apv', 'Suzuki');
INSERT INTO `mobil` VALUES ('15', 'Splash', 'Suzuki');
INSERT INTO `mobil` VALUES ('16', 'Xenia', 'Daihatsu');
INSERT INTO `mobil` VALUES ('17', 'Terios', 'Daihatsu');
INSERT INTO `mobil` VALUES ('18', 'Ayla', 'Daihatsu');
INSERT INTO `mobil` VALUES ('19', 'Sirion', 'Daihatsu');
INSERT INTO `mobil` VALUES ('20', 'Luxio', 'Daihatsu');
INSERT INTO `mobil` VALUES ('21', 'Universal', 'Universal');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `nip` varchar(10) NOT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `jk_pegawai` varchar(10) DEFAULT NULL,
  `alamat_pegawai` varchar(100) DEFAULT NULL,
  `phone_pegawai` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `fk_akses` (`username`),
  KEY `fk_memiliki_jabatan` (`id_jabatan`),
  CONSTRAINT `fk_akses` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_memiliki_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES ('PSJS3', 'JAB11', 'gudang_sjs', 'Gudang', 'Perempuan', 'Malang', '087859019519');
INSERT INTO `pegawai` VALUES ('PSJS5', 'JAB6', null, 'Luluk', 'Perempuan', 'Malang', '08888');
INSERT INTO `pegawai` VALUES ('PSJS6', 'JAB6', null, 'Yanies', 'Perempuan', 'Malang', '088688');
INSERT INTO `pegawai` VALUES ('PSJS7', 'JAB6', null, 'Dewy', 'Perempuan', 'Malang', '0886898');

-- ----------------------------
-- Table structure for persediaan
-- ----------------------------
DROP TABLE IF EXISTS `persediaan`;
CREATE TABLE `persediaan` (
  `id_persediaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(10) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT '0',
  `masuk` int(11) DEFAULT '0',
  `keluar` int(11) DEFAULT '0',
  `stok_tersedia` int(11) DEFAULT '0',
  PRIMARY KEY (`id_persediaan`),
  KEY `fk_persediaan_barang` (`id_barang`) USING BTREE,
  CONSTRAINT `fk_persediaan_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persediaan
-- ----------------------------

-- ----------------------------
-- Table structure for satuan
-- ----------------------------
DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan_barang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of satuan
-- ----------------------------
INSERT INTO `satuan` VALUES ('1', 'set');
INSERT INTO `satuan` VALUES ('2', 'pcs');
INSERT INTO `satuan` VALUES ('3', 'roll');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('gudang_sjs', 'gudang', 'gudang');
