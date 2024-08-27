-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table siakadremake.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ustadz` int DEFAULT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.kelas: ~2 rows (approximately)
INSERT INTO `kelas` (`id`, `id_ustadz`, `nama`, `status`, `tgl_dibuat`) VALUES
	(148, 4, '8 - A', 1, 1723667718),
	(149, 4, '9 - A', 1, 1723671347);

-- Dumping structure for table siakadremake.kurikulum
CREATE TABLE IF NOT EXISTS `kurikulum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kurikulum` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.kurikulum: ~1 rows (approximately)
INSERT INTO `kurikulum` (`id`, `kurikulum`, `status`, `tgl_dibuat`) VALUES
	(2, 'Tahun 2013', 1, 1723469661);

-- Dumping structure for table siakadremake.mata_pelajaran
CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `silabus` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `b1` int DEFAULT NULL,
  `b2` int DEFAULT NULL,
  `b3` int DEFAULT NULL,
  `b4` int DEFAULT NULL,
  `b5` int DEFAULT NULL,
  `b6` int DEFAULT NULL,
  `g1` int DEFAULT NULL,
  `g2` int DEFAULT NULL,
  `g3` int DEFAULT NULL,
  `g4` int DEFAULT NULL,
  `tgl_dibuat` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.mata_pelajaran: ~3 rows (approximately)
INSERT INTO `mata_pelajaran` (`id`, `kode`, `nama`, `silabus`, `deskripsi`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `g1`, `g2`, `g3`, `g4`, `tgl_dibuat`) VALUES
	(1, 'FIQ121', 'Fiqih', 'c4a2a7b2bb075dd6d289c10f2ebb88cf.pdf', 'asds', 30, 30, 20, 20, 0, 0, 50, 60, 70, 85, 1723427555),
	(5, 'AASSS', 'IPA', '65b2e7e11afa67506bd8d9e886e9d6af.pdf', 'asda', 50, 50, 0, 0, 0, 0, 20, 50, 80, 100, 1724242503),
	(6, 'AQ2102141', 'Aqidah Akhlak', '2464716cbabad8904aa33ee3b565824a.pdf', 'Dasdas', 50, 40, 10, 0, 0, 0, 40, 55, 70, 85, 1724243478);

-- Dumping structure for table siakadremake.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `for` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.menu: ~9 rows (approximately)
INSERT INTO `menu` (`id`, `menu`, `link`, `icon`, `for`, `order`, `status`) VALUES
	(1, 'Dashboard', 'dashboard', 'fa fa-th', '1', 1, 1),
	(2, 'Admin', 'admin', 'fa fa-user-tie', '1', 2, 1),
	(3, 'Data Akademik', 'akademik', 'fa fa-university', '1', 6, 1),
	(6, 'Interface', 'auth/logout', 'fas fa-wrench', '1', 99, 1),
	(15, 'Tahun Pelajaran', 'tahun/tahun', 'fas fa-graduation-cap', '1', 5, 1),
	(16, 'Kurikulum', 'kurikulum/kurikulum', 'fas fa-school', '1', 5, 1),
	(17, 'Penilaian', 'penilaian/penilaian', 'fas fa-clipboard-list', '3', 5, 1),
	(18, 'Laporan', 'laporan', 'fas fa-file-pdf', '2', 5, 1),
	(19, 'Siswa', 'siswa', 'fas fa-user', '4', 5, 1);

-- Dumping structure for table siakadremake.pengguna
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(154) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  `terakhir_login` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.pengguna: ~24 rows (approximately)
INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `image`, `role`, `no_hp`, `jenis_kelamin`, `tgl_dibuat`, `terakhir_login`, `status`) VALUES
	(1, 'Lord Daud', 'abahdaud@gmail.com', '$2y$10$dXy5ySWJtvxf9yUluodeguV1WReKdM/mTlfYUMLKpul6hroIBIDmO', '1723673645_53df239a7a21e9d3506d8b13384fae2c1723673645.jpg', 1, '081312157307', 'L', 1658915944, 1724782322, 1),
	(3, 'Sony Chandra Maulana', '21110582@stmik-mi.ac.id', '$2y$10$TlYxnTXBcjnkRsuALRzLwe/ppEVzunWlHJYvUQWu5rAlTNoEVK72.', '1722944375_a12d52df5015f41a41d4be01a3d092a11722944375.jpg', 2, '081312157307', 'P', 1722419936, 1724782326, 1),
	(4, 'Lord Daud', 'lorddaud@gmail.com', '$2y$10$I9XGPBlZy77DY6AXZB3U7.npzrpTl2GkPH1CkcuGk7rU703AfKJUS', '70e0040728fb3c66dcb8ba56531ffbbe.png', 2, '081312157307', 'L', 1722941841, NULL, 1),
	(5, 'Abang Son', 'abangson@gmail.com', '$2y$10$BbyhDTJeWAG4HfAnFVtRNeDCb5Goky8Zgj9kB5aVBUBQbfRatHAbC', 'd153ded72ed39c2f02d8fc28284777f6.jpg', 3, '081312157307', 'L', 1722942138, 1724782149, 1),
	(6, 'Kalsi Kirei', 'kalsi@gmail.com', '$2y$10$0.I9YQ6ZT.Lcr5QDj0YkxeCPpEjDVoctKLmF/BH6X7LDo.CHAqPii', 'aa55498b7d5e8c7c578972ff06bb1f36.jpg', 2, '08215761826', 'P', 1723035653, 1723042785, 1),
	(7, 'Abang Sonsad', 'abangsonsad@gmail.com', '$2y$10$fYgxkWFSi2CH2M4FfXZrPOtKiti5dWKaq/PmCupjxDNt8Wk1MCTZG', '1723041993_dd9395923e8e7b0c42c7862cd11c515e1723041993.jpg', 2, '081312157307', 'L', 1723041979, NULL, 1),
	(8, 'Tatang Hidayat, SKM', '21110444@stmik-mi.ac.id', '$2y$10$/DU154gVWlahvpCFOr.R8Ovn/AbI3sqMA51zTrUC5zvicmX0RLsZ.', 'default', 3, '081312157307', 'L', 1723074502, NULL, 1),
	(9, 'Iding Ngiding', 'idingngiding@gmail.com', '$2y$10$3fb4X8viPiZDEm8ZMr0IjeGeMGPJsptYYjwEd7BDkER8Ta1qti9S2', '1723074936_7becbbf02b86aad5bf0db60e5f8d7f4e1723074936.png', 3, NULL, 'L', 1723074553, NULL, 1),
	(10, 'Tatang Hidayat, SKM', 'tatanghidayat,skm@gmail.com', '$2y$10$0edikFFz6W354YI1LvI7DeyEcFpjUxfy5DMyw4LbCWGVORcqG0ZTy', '94a3b9fda4ec72a35420a9c19436a316.png', 3, NULL, 'L', 1723075642, NULL, 1),
	(11, 'Shellin', 'shellin@gmail.com', '$2y$10$fXkNvzrr7nIw7xFV2JMlUeEVeRyeCxt3GXmSR9sJfYY3bs04O0Nx2', 'd7ffb1f862122562ac98652088449821.jpeg', 3, NULL, 'L', 1723099487, 1723099524, 1),
	(12, 'Lord Daud', 'sonychandbusiness@gmail.com', '$2y$10$5goTYmaxSbSDqt7YrrCZPudZAr6Pgg7WXoz66bBqfjY6KYDxGB.0K', 'default', 1, '081312157307', 'L', 1723302711, 1723408275, 1),
	(13, 'Abah Daud', 'adscess@gmail.com', '$2y$10$9j4Vu0JyH0oPBsEwJCPowuCg3dnikKXGL21Mu/39KzCxjvaJkbxKm', 'default', 1, '0831285125125', 'L', 1723307863, NULL, 1),
	(14, 'Ananda Chandra', 'sonychandbusines2s@gmail.com', '$2y$10$Ybefa369AcDPDvPjzEgJu.73hBEkopbxle25qmnYL1TWWL21ji2IW', 'default', 2, '0831285125125', 'L', 1723409511, NULL, 1),
	(15, 'Heru', 'heru@gmail.com', '$2y$10$ltbHCnb/xx0BJQdIVaffV.tjg.Jr3ox8agGUOxI4PtYmqcikVLWsS', '1723673665_849bb4a310af8e0e31cd83760dce2c491723673665.jpg', 2, '0831285125125', 'L', 1723409720, NULL, 1),
	(16, 'Abah Daud', 'sonychandcareer@gmail.com', '$2y$10$S5H2xxbQ0l2gzQu4zP8XQuXDDweVbd4fUMPI7PZ//evjHHMOkX0tm', 'default', 2, '0831285125125', 'L', 1723413628, NULL, 1),
	(17, 'Abang Son', 'sonychandshopee@gmail.com', '$2y$10$5aawIJ2lnZhvb.xeomCndu8.yGwBjiUrMiO4B8NZKNB6VWXhE.lgi', 'default', 1, '0831285125125', 'L', 1723414256, NULL, 1),
	(18, 'Sania Rohmah', 'saniarohmah24@gmail.com', '$2y$10$ItkAyjfMMh2atwi6Y3vb1ecTjdXnHudpBiRcDdAm2zAQurvFpZVx.', 'default', 1, '0831285125125', 'P', 1723469090, NULL, 1),
	(19, 'abah daud', 'abahdaud.kuliah@gmail.com', '$2y$10$JUPOSxPt0gjFeun12JZ58O1LmMPoXAQa2l8RwsonYYZQx4/2DR7Ga', 'default', 1, '0831285125125', 'L', 1723469251, NULL, 1),
	(20, 'Lord Daud', 'manukpetet@gmail.com', '$2y$10$45SOZdGCrZbXISuop4fOYuJElxyiMrxErJ6gN2OzhAB8UoIER9HGK', 'default', 1, '0831285125125', 'L', 1723469377, 1723469451, 1),
	(21, 'Rohmat', 'rohmat@gmail.com', '$2y$10$Gu/5wcZ/dmaiJ.6xtbQjQOdp3dG0z5LXPmsMsZ.lxZK4izrLmG86i', 'dfa7972733a6e98f98af265d0199e944.jpg', 2, '0831285125125', 'L', 1723469771, NULL, 1),
	(22, 'Sobat Yatim', 'alifyusuf200@gmail.com', '$2y$10$IH9UA7R0J5bjzDDnYveMXeK.LjjEX5bhPhhDfHbHVqTyNry/nbbc2', 'default', 1, '081312157307', 'L', 1723564032, NULL, 1),
	(23, 'Ananda Chandra', 'sonychandbusinessss@gmail.com', '$2y$10$XWGXqJVpE3fYe97L5DLe/ujh7RIAWxjcl5Y1XSTtY1JWBxCVRu8fq', 'default', 2, '0831285125125', 'L', 1724409720, 1724409812, 1),
	(24, 'Ananda Chandras', 'sonychandbusinesssss@gmail.com', '$2y$10$sd9Ye5.hkOy6wp8ABhT50.dE4ytTu5yffGmh8DmFUoIduczD2qQ.e', 'default', 4, '0831285125125', 'L', 1724766918, NULL, 1),
	(25, 'Sania Rohmah', 'sonychandbssssusiness@gmail.com', '$2y$10$xA6GgM0els3RzfzXN.evK.w/BfWNnc9/7/UnNumSs8n4XnTZiIuQi', '1724782244_3b866d611eaab5d3f4a670f8d0c3fcbd1724782244.jpeg', 4, '0831285125125', 'L', 1724767005, 1724782251, 1);

-- Dumping structure for table siakadremake.pengumuman
CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.pengumuman: ~2 rows (approximately)
INSERT INTO `pengumuman` (`id`, `deskripsi`, `tgl_dibuat`) VALUES
	(1, 'Yatim', 1723668838),
	(3, 'dsad', 1723674030);

-- Dumping structure for table siakadremake.penilaian
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_matpel` int DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `jenis_penilaian` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_dibuat` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_siswa` (`id_siswa`),
  KEY `id_mata_pelajaran` (`id_matpel`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.penilaian: ~28 rows (approximately)
INSERT INTO `penilaian` (`id`, `id_siswa`, `id_matpel`, `nilai`, `jenis_penilaian`, `tgl_dibuat`) VALUES
	(1, 2, 1, 55, 'Presensi', 1723467942),
	(2, 3, 2, 67, 'Quiz 1', 1723470053),
	(3, 2, 2, 100, 'Quiz 1', 1723673572),
	(4, 2, 1, 100, 'Kehadiran', 1724241329),
	(5, 2, 1, 100, 'Kehadiran', 1724241340),
	(6, 2, 1, 100, 'kehadiran', 1724241356),
	(7, 2, 1, 100, 'kehadiran 1', 1724241363),
	(8, 2, 1, 100, 'kehadiran 1', 1724241386),
	(9, 2, 1, 100, 'Kehadiran 4', 1724241400),
	(10, 2, 1, 100, 'Kehadiran 4', 1724241543),
	(11, 2, 1, 100, 'Kehadiran 4', 1724241567),
	(12, 2, 1, 100, 'Kehadiran 4', 1724241577),
	(13, 2, 1, 11, 'Kehadiran 4', 1724241606),
	(14, 2, 1, 11, 'KEHADIRAN 1245125r1asfasfaf asfasf', 1724241632),
	(15, 2, 1, 11, 'KEHADIRAN 1245125r1asfasfaf asfasf', 1724242166),
	(16, 2, 1, 11, 'KEHADIRAN 1245125r1asfasfaf asfasf', 1724242184),
	(17, 2, 1, 16, 'Kehadiran', 1724242211),
	(18, 2, 1, 90, 'Tugas 11', 1724242280),
	(19, 2, 1, 99, 'UTS', 1724242292),
	(22, 2, 1, 82, 'uas', 1724242427),
	(23, 2, 5, 11, 'Quiz 1', 1724242522),
	(24, 2, 5, 100, 'Tugas 2121', 1724242566),
	(25, 2, 6, 100, 'kehadiran 1', 1724243532),
	(26, 2, 6, 70, 'tugas 120', 1724243605),
	(27, 2, 6, 65, 'uts', 1724243912),
	(28, 2, 6, 100, 'kehadiran 2', 1724243898),
	(29, 2, 1, 100, 'Kehadiran', 1724409747),
	(30, 5, 6, 100, 'Kehadiran', 1724770812);

-- Dumping structure for table siakadremake.penjadwalan
CREATE TABLE IF NOT EXISTS `penjadwalan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_matpel` int DEFAULT NULL,
  `id_ustadz` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jam_mulai` int DEFAULT NULL,
  `jam_selesai` int DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_ustadz` (`id_ustadz`),
  KEY `id_mata_pelajaran` (`id_matpel`) USING BTREE,
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.penjadwalan: ~4 rows (approximately)
INSERT INTO `penjadwalan` (`id`, `id_matpel`, `id_ustadz`, `id_kelas`, `hari`, `jam_mulai`, `jam_selesai`, `tgl_dibuat`) VALUES
	(2, 2, 2, 148, 'Rabu', 1723671480, 1723671540, 1723667888),
	(3, 2, 1, 149, 'Selasa', 1723672800, 1723676400, 1723672696),
	(4, 1, 1, 148, 'Senin', 1723672800, 1723672800, 1723672739),
	(5, 1, 1, 148, 'Jumat', 1723672800, 1723680000, 1723672792);

-- Dumping structure for table siakadremake.rapor
CREATE TABLE IF NOT EXISTS `rapor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_matpel` int DEFAULT NULL,
  `nilai` int DEFAULT NULL,
  `grade` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.rapor: ~4 rows (approximately)
INSERT INTO `rapor` (`id`, `id_siswa`, `id_matpel`, `nilai`, `grade`) VALUES
	(1, 2, 1, 84, 'B'),
	(2, 2, 5, 50, 'C'),
	(3, 2, 6, 85, 'A'),
	(4, 5, 6, 50, 'D');

-- Dumping structure for table siakadremake.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kelas` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_kk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nisn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tpt_lahir` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` int DEFAULT NULL,
  `jk` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cita_cita` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hobi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `nama_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.siswa: ~4 rows (approximately)
INSERT INTO `siswa` (`id`, `id_kelas`, `id_user`, `nik`, `no_kk`, `nisn`, `nama`, `tpt_lahir`, `tgl_lahir`, `jk`, `no_hp`, `agama`, `cita_cita`, `hobi`, `alamat`, `nama_ayah`, `tgl_dibuat`) VALUES
	(2, 148, NULL, '3207332005030002', '215125125125', '12512512', 'Lord Daud', 'Ciamis', 1724086800, 'L', '0831285125125', 'Islam', 'dad', 'dad', 'dasd', 'dad', 1723466709),
	(3, 148, NULL, '3207332005050004', '215125125125', '1251251221', 'Ananda Chandra', 'Ciamis', 1724864400, 'P', '081312157307', 'Islam', 'dads', 'dad', 'as', 'dad', 1723469930),
	(4, 149, NULL, '3206380403210093', '21512512512512', '0009358501', 'Sony Chandra Maulana', 'Ciamis', 1724346000, 'L', '081273627132', 'Islam', 'Pengangguran', 'Tidur', 'e', '4', 1723671515),
	(5, 149, 25, '1122334444332211', '1122334444332211', '1251251212', 'Sania Rohmah', 'Ciamis', 1371834000, 'L', '0831285125125', 'Islam', 'Kuli Ngoding', 'Tidur', 'Kukuruyuk', 'Asep', 1724767005);

-- Dumping structure for table siakadremake.submenu
CREATE TABLE IF NOT EXISTS `submenu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `url_i` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `url_ii` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `icon` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `menu_id` (`menu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.submenu: ~12 rows (approximately)
INSERT INTO `submenu` (`id`, `menu_id`, `title`, `url_i`, `url_ii`, `icon`, `status`) VALUES
	(1, 2, 'Pengguna', 'admin/', 'pengguna', '', 1),
	(2, 6, 'Menu', 'layout/', 'menu', NULL, 1),
	(3, 6, 'Submenu', 'layout/', 'submenu', '', 1),
	(10, 2, 'Ustadz', 'admin/', 'ustadz', NULL, 0),
	(16, 3, 'Siswa', 'akademik/', 'siswa', NULL, 1),
	(17, 3, 'Kelas', 'akademik/', 'kelas', NULL, 1),
	(18, 3, 'Mata Pelajaran', 'akademik/', 'matpel', NULL, 1),
	(20, 3, 'Guru', 'akademik/', 'guru', NULL, 1),
	(21, 3, 'Penjadwalan Akademik', 'akademik/', 'jadwal', NULL, 1),
	(22, 3, 'Pengumuman', 'akademik/', 'pengumuman', NULL, 1),
	(23, 19, 'Biodata', 'profil', '', NULL, 1),
	(24, 19, 'Nilai', 'siswa/', 'nilai', NULL, 1);

-- Dumping structure for table siakadremake.tahun
CREATE TABLE IF NOT EXISTS `tahun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.tahun: ~0 rows (approximately)
INSERT INTO `tahun` (`id`, `tahun`, `status`, `tgl_dibuat`) VALUES
	(2, '2024', 1, 1723469651);

-- Dumping structure for table siakadremake.token_pengguna
CREATE TABLE IF NOT EXISTS `token_pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.token_pengguna: ~9 rows (approximately)
INSERT INTO `token_pengguna` (`id`, `email`, `token`, `tgl_dibuat`) VALUES
	(2, '21110582@stmik-mi.ac.id', '75fb877f', 1723307752),
	(17, 'adscess@gmail.com', 'ab4c6238', 1723407487),
	(25, 'sonychandcareer@gmail.com', '318694de', 1723414141),
	(27, 'sonychandshopee@gmail.com', '8e753b80', 1723414263),
	(28, 'saniarohmah24@gmail.com', '027f79b0', 1723469101),
	(29, 'abahdaud.kuliah@gmail.com', '7e665d67', 1723469259),
	(31, 'abahdaud@gmail.com', '0f7a1329', 1723471102),
	(32, 'alifyusuf200@gmail.com', 'ee3de28d', 1723564041),
	(33, 'sonychandbusiness@gmail.com', '1fa6592a', 1723768181);

-- Dumping structure for table siakadremake.ustadz
CREATE TABLE IF NOT EXISTS `ustadz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tpt_lahir` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` int DEFAULT NULL,
  `jk` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.ustadz: ~2 rows (approximately)
INSERT INTO `ustadz` (`id`, `id_user`, `nik`, `nama`, `tpt_lahir`, `tgl_lahir`, `jk`, `no_hp`, `agama`, `pendidikan`, `alamat`, `tgl_dibuat`) VALUES
	(1, 15, '3207332000320004', 'Heru Cahyono', 'Ciamis', 2078586000, 'L', '0831285125125', 'Islam', 'S1', 'Kolong Jembatan', 1723409720),
	(2, 21, '3207332000123456', 'Rohmats', 'Bandung', 1723568400, 'L', '0831285125125', 'Islam', 'S3', 'aweda', 1723469771);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
