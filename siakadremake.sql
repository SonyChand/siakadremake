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

-- Dumping structure for table siakadremake.absensi_santri
CREATE TABLE IF NOT EXISTS `absensi_santri` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Hadir','Tidak Hadir','Izin','Sakit') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.absensi_santri: ~0 rows (approximately)

-- Dumping structure for table siakadremake.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ustadz` int DEFAULT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.kelas: ~0 rows (approximately)
INSERT INTO `kelas` (`id`, `id_ustadz`, `nama`, `status`, `tgl_dibuat`) VALUES
	(2, 15, 'A', 1, 1723423908);

-- Dumping structure for table siakadremake.mata_pelajaran
CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `silabus` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `tgl_dibuat` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.mata_pelajaran: ~0 rows (approximately)
INSERT INTO `mata_pelajaran` (`id`, `kode`, `nama`, `silabus`, `deskripsi`, `tgl_dibuat`) VALUES
	(1, '123d', 'PAIss', '7cb7092ddf605bf2e733b304583e4f51.pdf', 'asds', 1723427555);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.menu: ~9 rows (approximately)
INSERT INTO `menu` (`id`, `menu`, `link`, `icon`, `for`, `order`, `status`) VALUES
	(1, 'Dashboard', 'dashboard', 'fa fa-th', '2', 1, 1),
	(2, 'Admin', 'admin', 'fa fa-user-tie', '1', 2, 1),
	(3, 'Data Akademik', 'akademik', 'fa fa-university', '2', 6, 1),
	(5, 'Logout', 'auth/logout', 'fa fa-sign-out-alt', '2', 100, 1),
	(6, 'Interface', 'auth/logout', 'fas fa-wrench', '1', 99, 1),
	(14, 'Profil Sekolah', 'sekolah', 'fas fa-school', '1', 5, 1),
	(15, 'Tahun Pelajaran', 'pelajaran', 'fas fa-graduation-cap', '1', 5, 1),
	(16, 'Kurikulum', 'kurikulum', 'fas fa-school', '1', 5, 1),
	(17, 'Penilaian', 'nilai', 'fas fa-clipboard-list', '1', 5, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.pengguna: ~10 rows (approximately)
INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `image`, `role`, `no_hp`, `jenis_kelamin`, `tgl_dibuat`, `terakhir_login`, `status`) VALUES
	(1, 'Lord Daud', 'abahdaud@gmail.com', '$2y$10$dXy5ySWJtvxf9yUluodeguV1WReKdM/mTlfYUMLKpul6hroIBIDmO', '1723301278_53df239a7a21e9d3506d8b13384fae2c1723301278.jpg', 1, '081312157307', 'L', 1658915944, 1723422888, 1),
	(3, 'Sony Chandra Maulana', '21110582@stmik-mi.ac.id', '$2y$10$TlYxnTXBcjnkRsuALRzLwe/ppEVzunWlHJYvUQWu5rAlTNoEVK72.', '1722944375_a12d52df5015f41a41d4be01a3d092a11722944375.jpg', 2, '081312157307', 'P', 1722419936, 1722936686, 1),
	(4, 'Lord Daud', 'lorddaud@gmail.com', '$2y$10$I9XGPBlZy77DY6AXZB3U7.npzrpTl2GkPH1CkcuGk7rU703AfKJUS', '70e0040728fb3c66dcb8ba56531ffbbe.png', 2, '081312157307', 'L', 1722941841, NULL, 1),
	(5, 'Abang Son', 'abangson@gmail.com', '$2y$10$BbyhDTJeWAG4HfAnFVtRNeDCb5Goky8Zgj9kB5aVBUBQbfRatHAbC', 'd153ded72ed39c2f02d8fc28284777f6.jpg', 3, '081312157307', 'L', 1722942138, NULL, 1),
	(6, 'Kalsi Kirei', 'kalsi@gmail.com', '$2y$10$0.I9YQ6ZT.Lcr5QDj0YkxeCPpEjDVoctKLmF/BH6X7LDo.CHAqPii', 'aa55498b7d5e8c7c578972ff06bb1f36.jpg', 2, '08215761826', 'P', 1723035653, 1723042785, 1),
	(7, 'Abang Sonsad', 'abangsonsad@gmail.com', '$2y$10$fYgxkWFSi2CH2M4FfXZrPOtKiti5dWKaq/PmCupjxDNt8Wk1MCTZG', '1723041993_dd9395923e8e7b0c42c7862cd11c515e1723041993.jpg', 2, '081312157307', 'L', 1723041979, NULL, 1),
	(8, 'Tatang Hidayat, SKM', '21110444@stmik-mi.ac.id', '$2y$10$/DU154gVWlahvpCFOr.R8Ovn/AbI3sqMA51zTrUC5zvicmX0RLsZ.', 'default', 3, '081312157307', 'L', 1723074502, NULL, 1),
	(9, 'Iding Ngiding', 'idingngiding@gmail.com', '$2y$10$3fb4X8viPiZDEm8ZMr0IjeGeMGPJsptYYjwEd7BDkER8Ta1qti9S2', '1723074936_7becbbf02b86aad5bf0db60e5f8d7f4e1723074936.png', 3, NULL, 'L', 1723074553, NULL, 1),
	(10, 'Tatang Hidayat, SKM', 'tatanghidayat,skm@gmail.com', '$2y$10$0edikFFz6W354YI1LvI7DeyEcFpjUxfy5DMyw4LbCWGVORcqG0ZTy', '94a3b9fda4ec72a35420a9c19436a316.png', 3, NULL, 'L', 1723075642, NULL, 1),
	(11, 'Shellin', 'shellin@gmail.com', '$2y$10$fXkNvzrr7nIw7xFV2JMlUeEVeRyeCxt3GXmSR9sJfYY3bs04O0Nx2', 'd7ffb1f862122562ac98652088449821.jpeg', 3, NULL, 'L', 1723099487, 1723099524, 1),
	(12, 'Lord Daud', 'sonychandbusiness@gmail.com', '$2y$10$5goTYmaxSbSDqt7YrrCZPudZAr6Pgg7WXoz66bBqfjY6KYDxGB.0K', 'default', 1, '081312157307', 'L', 1723302711, 1723408275, 1),
	(13, 'Abah Daud', 'adscess@gmail.com', '$2y$10$9j4Vu0JyH0oPBsEwJCPowuCg3dnikKXGL21Mu/39KzCxjvaJkbxKm', 'default', 1, '0831285125125', 'L', 1723307863, NULL, 1),
	(14, 'Ananda Chandra', 'sonychandbusines2s@gmail.com', '$2y$10$Ybefa369AcDPDvPjzEgJu.73hBEkopbxle25qmnYL1TWWL21ji2IW', 'default', 2, '0831285125125', 'L', 1723409511, NULL, 1),
	(15, 'Heru', 'heru@gmail.com', '$2y$10$ltbHCnb/xx0BJQdIVaffV.tjg.Jr3ox8agGUOxI4PtYmqcikVLWsS', '1723410394_849bb4a310af8e0e31cd83760dce2c491723410394.png', 2, '0831285125125', 'L', 1723409720, NULL, 1),
	(16, 'Abah Daud', 'sonychandcareer@gmail.com', '$2y$10$S5H2xxbQ0l2gzQu4zP8XQuXDDweVbd4fUMPI7PZ//evjHHMOkX0tm', 'default', 2, '0831285125125', 'L', 1723413628, NULL, 1),
	(17, 'Abang Son', 'sonychandshopee@gmail.com', '$2y$10$5aawIJ2lnZhvb.xeomCndu8.yGwBjiUrMiO4B8NZKNB6VWXhE.lgi', 'default', 1, '0831285125125', 'L', 1723414256, NULL, 1);

-- Dumping structure for table siakadremake.penilaian
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `id_matpel` int DEFAULT NULL,
  `nilai` int DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jenis_penilaian` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_siswa` (`id_siswa`),
  KEY `id_mata_pelajaran` (`id_matpel`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.penilaian: ~0 rows (approximately)

-- Dumping structure for table siakadremake.penjadwalan
CREATE TABLE IF NOT EXISTS `penjadwalan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_matpel` int DEFAULT NULL,
  `id_ustadz` int DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_ustadz` (`id_ustadz`),
  KEY `id_mata_pelajaran` (`id_matpel`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.penjadwalan: ~0 rows (approximately)

-- Dumping structure for table siakadremake.rapor
CREATE TABLE IF NOT EXISTS `rapor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `rata_rata_nilai` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.rapor: ~0 rows (approximately)

-- Dumping structure for table siakadremake.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kelas` int DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.siswa: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table siakadremake.submenu: ~10 rows (approximately)
INSERT INTO `submenu` (`id`, `menu_id`, `title`, `url_i`, `url_ii`, `icon`, `status`) VALUES
	(1, 2, 'Pengguna', 'admin/', 'pengguna', '', 1),
	(2, 6, 'Menu', 'ui/', 'menu', NULL, 1),
	(3, 6, 'Submenu', 'ui/', 'submenu', '', 1),
	(10, 2, 'Ustadz', 'admin/', 'ustadz', NULL, 1),
	(16, 3, 'Siswa', 'akademik/', 'siswa', NULL, 1),
	(17, 3, 'Kelas', 'akademik/', 'kelas', NULL, 1),
	(18, 3, 'Mata Pelajaran', 'akademik/', 'matpel', NULL, 1),
	(20, 3, 'Guru', 'akademik/', 'guru', NULL, 1);

-- Dumping structure for table siakadremake.tahun
CREATE TABLE IF NOT EXISTS `tahun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.tahun: ~0 rows (approximately)

-- Dumping structure for table siakadremake.token_pengguna
CREATE TABLE IF NOT EXISTS `token_pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_dibuat` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.token_pengguna: ~2 rows (approximately)
INSERT INTO `token_pengguna` (`id`, `email`, `token`, `tgl_dibuat`) VALUES
	(2, '21110582@stmik-mi.ac.id', '75fb877f', 1723307752),
	(17, 'adscess@gmail.com', 'ab4c6238', 1723407487),
	(25, 'sonychandcareer@gmail.com', '318694de', 1723414141),
	(26, 'sonychandbusiness@gmail.com', 'bdc65fa4', 1723414193),
	(27, 'sonychandshopee@gmail.com', '8e753b80', 1723414263);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table siakadremake.ustadz: ~0 rows (approximately)
INSERT INTO `ustadz` (`id`, `id_user`, `nik`, `nama`, `tpt_lahir`, `tgl_lahir`, `jk`, `no_hp`, `agama`, `pendidikan`, `alamat`, `tgl_dibuat`) VALUES
	(1, 15, '3207332000320004', 'Heru Cahyono', 'Ciamis', 2078586000, 'L', '0831285125125', 'Islam', 'S1', 'Kolong Jembatan', 1723409720);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
