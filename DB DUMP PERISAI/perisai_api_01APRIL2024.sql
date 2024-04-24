/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : perisai_api

 Target Server Type    : MariaDB
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 01/04/2024 15:58:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id_berita` int(255) NOT NULL AUTO_INCREMENT,
  `nama_berita` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_satker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `facebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `website` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `instagram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `twitter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tiktok` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sippn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `youtube` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `media_lokal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `media_nasional` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_input` date NULL DEFAULT NULL,
  `tgl_update` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"https:\\/\\/www.w3schools.com\\/php\\/func_string_str_replace.asp\",\"https:\\/\\/www.w3schools.com\\/php\\/phptryit.asp?filename=tryphp_func_string_str_replace\",\"https:\\/\\/stackoverflow.com\\/questions\\/42896820\\/modal-width-increase\"]', '[\"https:\\/\\/docs.google.com\\/forms\\/d\\/18ONTRzLEi1ZykZ4JiankF8Kfovd_c5CfLFFX5_rCErw\\/edit#responses\",\"https:\\/\\/docs.google.com\\/spreadsheets\\/d\\/16Jgi8RIKr7Cj5iP2p0rTnr5Ben9CEs2OJ_HptjUkcmM\\/edit#gid=552200710\",\"https:\\/\\/laravel.com\\/docs\\/10.x\\/queries\",\"https:\\/\\/www.youtube.com\\/results?search_query=make+a+tab+form+laravel\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\"]', '2024-03-01', '2024-03-26');
INSERT INTO `berita` VALUES (2, 'Judul Berita Testing', 'SAT-NTB-05', 'Facebook', 'Website', 'Instagram', 'Twitter', 'Tiktok', 'SIPPN', 'Youtube', '[\"https:\\/\\/www.w3schools.com\\/php\\/php_string_concatenate.asp\",\"https:\\/\\/stackoverflow.com\\/questions\\/42896820\\/modal-width-increase\",\"https:\\/\\/www.w3schools.com\\/php\\/php_regex.asp\"]', '[\"https:\\/\\/docs.google.com\\/forms\\/d\\/18ONTRzLEi1ZykZ4JiankF8Kfovd_c5CfLFFX5_rCErw\\/edit#responses\",\"https:\\/\\/docs.google.com\\/spreadsheets\\/d\\/16Jgi8RIKr7Cj5iP2p0rTnr5Ben9CEs2OJ_HptjUkcmM\\/edit#gid=552200710\",\"https:\\/\\/laravel.com\\/docs\\/10.x\\/queries\",\"https:\\/\\/www.youtube.com\\/results?search_query=make+a+tab+form+laravel\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\"]', '2024-04-01', '2024-03-04');
INSERT INTO `berita` VALUES (4, 'Tes berita lapas mataram II', 'SAT-NTB-04', 'FB II', 'WB II', 'IG II', 'TW II', 'TKTOK II', 'SIPPN II', 'YT II', '[\"https:\\/\\/www.w3schools.com\\/php\\/php_string_concatenate.asp\",\"https:\\/\\/www.facebook.com\\/?locale=id_ID\",\"https:\\/\\/intermilan.id\\/gelandang-atalanta-de-roon-inter-tim-terbaik-di-italia-tapi-kami-siap-bertarung\\/\"]', '[\"https:\\/\\/docs.google.com\\/forms\\/d\\/18ONTRzLEi1ZykZ4JiankF8Kfovd_c5CfLFFX5_rCErw\\/edit#responses\",\"https:\\/\\/docs.google.com\\/spreadsheets\\/d\\/16Jgi8RIKr7Cj5iP2p0rTnr5Ben9CEs2OJ_HptjUkcmM\\/edit#gid=552200710\",\"https:\\/\\/laravel.com\\/docs\\/10.x\\/queries\",\"https:\\/\\/www.youtube.com\\/results?search_query=make+a+tab+form+laravel\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\"]', '2024-04-01', '2024-03-04');
INSERT INTO `berita` VALUES (5, 'TES BIMA KANIM', 'SAT-NTB-019', 'FB BIMA', 'WEBSITE BIMA', 'IG BIMA', 'TWITTER BIMA', 'TIKTOK BIMA', 'SIPPN BIMA', 'YTBIMA', '[\"https:\\/\\/intermilan.id\\/gelandang-atalanta-de-roon-inter-tim-terbaik-di-italia-tapi-kami-siap-bertarung\\/\",\"https:\\/\\/intermilan.id\\/performa-asllani-kian-meningkat-inter-tak-lagi-khawatir-absennya-calhanoglu\\/\"]', '[\"https:\\/\\/docs.google.com\\/forms\\/d\\/18ONTRzLEi1ZykZ4JiankF8Kfovd_c5CfLFFX5_rCErw\\/edit#responses\",\"https:\\/\\/docs.google.com\\/spreadsheets\\/d\\/16Jgi8RIKr7Cj5iP2p0rTnr5Ben9CEs2OJ_HptjUkcmM\\/edit#gid=552200710\",\"https:\\/\\/laravel.com\\/docs\\/10.x\\/queries\",\"https:\\/\\/www.youtube.com\\/results?search_query=make+a+tab+form+laravel\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\"]', '2024-03-03', '2024-03-04');
INSERT INTO `berita` VALUES (6, 'Ut ad animi quas ei', 'SAT-NTB-019', 'Provident doloribus', 'https://www.cadezug.tv', 'Est impedit perfere', 'Sit in ex in hic qu', 'Minima et aut eiusmo', 'Cupiditate adipisci', 'Natus sed commodo si', '[\"https:\\/\\/intermilan.id\\/performa-asllani-kian-meningkat-inter-tak-lagi-khawatir-absennya-calhanoglu\\/\",\"https:\\/\\/intermilan.id\\/performa-asllani-kian-meningkat-inter-tak-lagi-khawatir-absennya-calhanoglu\\/\",\"https:\\/\\/intermilan.id\\/performa-asllani-kian-meningkat-inter-tak-lagi-khawatir-absennya-calhanoglu\\/\"]', '[\"https:\\/\\/docs.google.com\\/forms\\/d\\/18ONTRzLEi1ZykZ4JiankF8Kfovd_c5CfLFFX5_rCErw\\/edit#responses\",\"https:\\/\\/docs.google.com\\/spreadsheets\\/d\\/16Jgi8RIKr7Cj5iP2p0rTnr5Ben9CEs2OJ_HptjUkcmM\\/edit#gid=552200710\",\"https:\\/\\/laravel.com\\/docs\\/10.x\\/queries\",\"https:\\/\\/www.youtube.com\\/results?search_query=make+a+tab+form+laravel\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\",\"https:\\/\\/www.youtube.com\\/watch?v=qHVdbc_N2Nk\"]', '2024-03-02', '2024-03-04');
INSERT INTO `berita` VALUES (7, 'LAPAS KLAS IIA MATARAM EDIT', 'SAT-NTB-04', 'FB LAPAS KLAS IIA MATARAM EDIT', 'Website LAPAS KLAS IIA MATARAM EDIT', 'IG LAPAS KLAS IIA MATARAM EDIT', 'Twit LAPAS KLAS IIA MATARAM coba update', 'Tiktok LAPAS KLAS IIA MATARAM coba update', 'SIPPN LAPAS KLAS IIA MATARAM coba update', 'YT LAPAS KLAS IIA MATARAM coba update', '[\"https:\\/\\/www.w3schools.com\\/php\\/phptryit.asp?filename=tryphp_func_string_str_replace_edit\"]', '[\"https:\\/\\/docs.google.com\\/forms\\/u\\/0\\/d\\/e\\/1FAIpQLSe6AYbuo-ust5CMnpZMY8cH_7r-tWiEvfV_CThARGBFWYw4Nw\\/formResponse_edit\",\"https:\\/\\/www.php.net\\/get-involved_edit\",\"https:\\/\\/www.php.net\\/manual\\/en\\/language.operators.string.php\"]', '2024-04-01', '2024-03-04');
INSERT INTO `berita` VALUES (10, 'Edit2 Judul Berita Lapas Mtr', 'SAT-NTB-04', 'https://news.detik.com/internasional/edit2', 'https://docs.google.com/forms/u/0/d/e/1FAIpQLSe6AYbuo-ust5CMnpZMY8cH_7r-tWiEvfV_CThARGBFWYw4Nw/formResponse_edit', 'https://www.instagram.com/edit2', 'https://twitter.com/?lang=id/edit2', 'https://www.tiktok.com/id-ID/edit2', 'https://sippn.menpan.go.id/edit2', 'https://www.youtube.com/?gl=ID&hl=id/edit2', '[\"https:\\/\\/www.antaranews.com\\/\",\"https:\\/\\/www.tribunnews.com\\/\",\"https:\\/\\/www.tribunnews3.com\\/\",\"https:\\/\\/www.tribunnews4.com\\/\",\"https:\\/\\/www.tribunnews5.com\\/\"]', '[\"https:\\/\\/sport.detik.com\\/\",\"https:\\/\\/news.detik.com\\/\",\"https:\\/\\/www.jawapos.com\\/\",\"https:\\/\\/www.jawapos4.com\\/\",\"https:\\/\\/www.jawapos5.com\\/\",\"https:\\/\\/www.jawapos6.com\\/\",\"https:\\/\\/www.jawapos7.com\\/\"]', '2024-04-01', '2024-03-27');

-- ----------------------------
-- Table structure for cabang
-- ----------------------------
DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang`  (
  `kode_cabang` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_cabang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi_cabang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `radius_cabang` int(255) NOT NULL,
  PRIMARY KEY (`kode_cabang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES ('JKT', 'JAKARTA', '-8.59251035890902,116.0973841', 20);
INSERT INTO `cabang` VALUES ('MTR', 'Mataram', '-8.592313731512958,116.09724612297573', 30);

-- ----------------------------
-- Table structure for departemen
-- ----------------------------
DROP TABLE IF EXISTS `departemen`;
CREATE TABLE `departemen`  (
  `kode_dept` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode_dept`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departemen
-- ----------------------------
INSERT INTO `departemen` VALUES ('GAF', 'General Affair Edit');
INSERT INTO `departemen` VALUES ('HRD', 'Human Resource Development');
INSERT INTO `departemen` VALUES ('IT', 'Information Technology');
INSERT INTO `departemen` VALUES ('KEU', 'Keuangan');
INSERT INTO `departemen` VALUES ('MKT', 'Marketing');

-- ----------------------------
-- Table structure for jam_kerja
-- ----------------------------
DROP TABLE IF EXISTS `jam_kerja`;
CREATE TABLE `jam_kerja`  (
  `kode_jam_kerja` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_jam_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `awal_jam_masuk` time(0) NULL DEFAULT NULL,
  `jam_masuk` time(0) NULL DEFAULT NULL,
  `akhir_jam_masuk` time(0) NULL DEFAULT NULL,
  `jam_pulang` time(0) NULL DEFAULT NULL,
  PRIMARY KEY (`kode_jam_kerja`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jam_kerja
-- ----------------------------
INSERT INTO `jam_kerja` VALUES ('MTR02', 'SHIFT01', '06:30:00', '07:00:00', '08:00:00', '15:00:00');
INSERT INTO `jam_kerja` VALUES ('MTR03', 'SHIFT02', '06:30:00', '07:00:00', '08:00:00', '15:00:00');
INSERT INTO `jam_kerja` VALUES ('REGS1', 'REGULER SABTU', '06:30:00', '07:00:00', '13:00:00', '13:30:00');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `nik` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_cabang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('12311', 'Roody', 'Staff Marketing', '098123', '$2y$10$d6O0Vf.r2jgr8RnzTsAATe47KtM3cyPEmEOIcI.nOMtALyMfEma82', NULL, NULL, 'MKT', 'MTR');
INSERT INTO `karyawan` VALUES ('12345', 'Eko Rizkianto Mamat', 'Head Of IT', '087865249079', '$2y$10$d6O0Vf.r2jgr8RnzTsAATe47KtM3cyPEmEOIcI.nOMtALyMfEma82', NULL, '12345.jpeg', 'IT', 'JKT');
INSERT INTO `karyawan` VALUES ('12346', 'Wahyudianto', 'HRD Manager', '087865249072', '$2y$10$d6O0Vf.r2jgr8RnzTsAATe47KtM3cyPEmEOIcI.nOMtALyMfEma82', NULL, NULL, 'HRD', 'JKT');
INSERT INTO `karyawan` VALUES ('12347', 'Memet', 'Accounting', '087865249072', '$2y$10$d6O0Vf.r2jgr8RnzTsAATe47KtM3cyPEmEOIcI.nOMtALyMfEma82', NULL, '12347.jpeg', 'KEU', 'JKT');
INSERT INTO `karyawan` VALUES ('1991', 'M.Ilyas', 'Pelaksana', '087865349072', '$2y$10$d6O0Vf.r2jgr8RnzTsAATe47KtM3cyPEmEOIcI.nOMtALyMfEma82', NULL, '19973654321.jpeg', 'IT', 'MTR');

-- ----------------------------
-- Table structure for konfigurasi_berita
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi_berita`;
CREATE TABLE `konfigurasi_berita`  (
  `id_konfig` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_config` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_satker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `salam_pembuka` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `yth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_tembusan_yth` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dari_pengirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pengantar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_hashtag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jargon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_moto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penutup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `salam_penutup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_konfig` enum('Konfigurasi Berita','Konfigurasi Rekap') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_input` date NULL DEFAULT NULL,
  `tgl_update` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_konfig`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konfigurasi_berita
-- ----------------------------
INSERT INTO `konfigurasi_berita` VALUES (1, 'Lapas Mataram Template', 'SAT-NTB-04', 'Assalamualaikum Wr. Wb. Edit', 'Yth: Bapak Kakanwil Edit', '[\"Tembusan1\",\"Tembusan2\",\"Tembusan3\",\"Tembusan4\",\"Tembusan5\"]', 'Dari Kalapas Edit', 'Bersama Ini Dilaporkan Edit', '[\"#Parlindungan\",\"#Juare\",\"#KumhamPasti\",\"#Sayang\"]', 'Kumham NTB Pasti Juare Edit', '[\"Moto1\",\"Moto2\",\"Moto3\",\"Moto4\"]', 'Matur Tampiasih Meton Edit', 'Wassalam Edit', 'Konfigurasi Berita', '2024-03-20', '2024-03-26');
INSERT INTO `konfigurasi_berita` VALUES (48, 'tes lapas header 2', 'SAT-NTB-05', 'Assalamualaikum Wr. Wb.', 'Yth: Bapak Kakanwil', '[\"Tembusan1\",\"Tembusan2\",\"Tembusan3\"]', 'Dari Kalapas', 'Bersama Ini Dilaporkan', '[\"#Parlindungan\",\"#Juare\",\"#Menkumham\"]', 'Kumham NTB Pasti Juare', '[\"Moto1\",\"Moto2\"]', 'Matur Tampiasih', 'Wassalam', 'Konfigurasi Berita', '2024-03-20', '2024-03-20');
INSERT INTO `konfigurasi_berita` VALUES (49, 'Konfig 1', 'SAT-NTB-04', 'Assalamualaikum Warrahmatullahir Wabarakatuh', 'Yth: Bapak Kakanwil', '[\"Tembusan1\",\"Tembusan2\",\"Tembusan3\"]', 'Dari Kalapas', 'Bersama Ini Dilaporkan', '[\"#Parlindungan\",\"#Juare\",\"#Menkumham\"]', 'Kumham NTB Pasti Juare', '[\"Moto1\",\"Moto2\"]', 'Penutup', 'Wassalamualaikum', 'Konfigurasi Berita', '2024-03-20', '2024-03-20');
INSERT INTO `konfigurasi_berita` VALUES (50, 'Konfigurasi Berita Kanim 1', 'SAT-NTB-017', 'Assalamualaikum', 'Yth. Bapak Kepala Kakanwil', '[\"Tembusan1\",\"Tembusan2\",\"Tembusan3\",\"Tembusan4\"]', 'Dari Kalapas', 'Bersama Ini Dilaporkan', '[\"#Parlindungan\",\"#Juare\",\"#Menkumham\",\"#KanwilNTB\"]', 'Kumham NTB Pasti Juare', '[\"Moto1\",\"Moto2\",\"Moto3\",\"Moto4\"]', 'Matur Tampiasih', 'Wassalam', 'Konfigurasi Berita', '2024-03-20', '2024-03-27');
INSERT INTO `konfigurasi_berita` VALUES (51, 'Konfigurasi Rutan Bima', 'SAT-NTB-012', 'Assalamualaikum Warahmatullahi Wabarakatuh', 'Yth. Bapak Kepala Kanwil Kemenkumham NTB', '[\"Tembusan Yth : Kadivpas NTB 1\",\"Tembusan Yth : Kadivpas NTB 2\",\"Tembusan Yth : Kadivpas NTB 3\"]', 'Dari : Kalapas Lobar', 'Bersama ini dilaporkan ke bapak Kakanwil terkait publikasi pemberitaan', '[\"#Parlindungan\",\"#KanwilKemenkumhamNTB\"]', '#KumhamPasti', '[\"Juare, Unggul, Amanah, Ramah, Excellent\",\"Don\'t Forget to Like, Comment, and Subscribe\"]', 'Matur Tampiasih', 'Wassalamualaikum Wr. Wb.', 'Konfigurasi Berita', '2024-03-21', '2024-03-21');
INSERT INTO `konfigurasi_berita` VALUES (52, 'Template Berita Rutan Praya', 'SAT-NTB-011', 'Assalamualaikum Wr. Wb.', 'Yth. Bpk Kepala Kanwil  Kemenkumham Nusa Tenggara Barat', '[\"Tembusan Yth : Kadivmin Kanwil NTB\",\"Tembusan Yth : Kadivpas Kanwil NTB\"]', 'Dari Kepala Rutan Praya', 'Bersama ini dilaporkan bahwa telah dipublikasikan giat berikut', '[\"#RutanPraya\",\"#Parlindungan\",\"#Juare\"]', 'Rutan Praye Mantap', '[\"Juare\",\"Unggul\",\"Amanah\",\"Ramah\"]', 'Matur Tampiasin Meton', 'Terimakasih, Wassalam', 'Konfigurasi Berita', '2024-03-26', '2024-03-26');

-- ----------------------------
-- Table structure for konfigurasi_jamkerja
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi_jamkerja`;
CREATE TABLE `konfigurasi_jamkerja`  (
  `nik` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_jam_kerja` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konfigurasi_jamkerja
-- ----------------------------
INSERT INTO `konfigurasi_jamkerja` VALUES ('12345', 'Senin', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('12345', 'Selasa', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('12345', 'Rabu', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('12345', 'Kamis', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('12345', 'Jumat', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('12345', 'Sabtu', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('1991', 'Senin', 'MTR02');
INSERT INTO `konfigurasi_jamkerja` VALUES ('1991', 'Selasa', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('1991', 'Rabu', 'MTR02');
INSERT INTO `konfigurasi_jamkerja` VALUES ('1991', 'Kamis', 'REGS1');
INSERT INTO `konfigurasi_jamkerja` VALUES ('1991', 'Jumat', 'MTR02');
INSERT INTO `konfigurasi_jamkerja` VALUES ('1991', 'Sabtu', 'REGS1');

-- ----------------------------
-- Table structure for konfigurasi_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi_lokasi`;
CREATE TABLE `konfigurasi_lokasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi_kantor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `radius` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konfigurasi_lokasi
-- ----------------------------
INSERT INTO `konfigurasi_lokasi` VALUES (1, '-8.592431342684229,116.09737843303738', '30');

-- ----------------------------
-- Table structure for pengajuan_izin
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan_izin`;
CREATE TABLE `pengajuan_izin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_izin` date NULL DEFAULT NULL,
  `status` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'i:izin s:sakit',
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_approved` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '0:Pending 1:Disetujui 2:Ditolak',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengajuan_izin
-- ----------------------------
INSERT INTO `pengajuan_izin` VALUES (4, '12345', '2024-01-24', 'i', 'Jenguk Saudara Sakit', '0');
INSERT INTO `pengajuan_izin` VALUES (5, '12345', '2024-01-24', 's', 'Sakit Tipes', '0');
INSERT INTO `pengajuan_izin` VALUES (6, '12345', '2024-01-24', 'i', 'Mau pulkam', '0');
INSERT INTO `pengajuan_izin` VALUES (7, '12346', '2024-02-14', 'i', 'Ke acara nikahan saudara', '1');
INSERT INTO `pengajuan_izin` VALUES (8, '12346', '2024-02-13', 's', 'Batuk', '2');

-- ----------------------------
-- Table structure for presensi
-- ----------------------------
DROP TABLE IF EXISTS `presensi`;
CREATE TABLE `presensi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_presensi` date NULL DEFAULT NULL,
  `jam_in` time(0) NULL DEFAULT NULL,
  `jam_out` time(0) NULL DEFAULT NULL,
  `foto_in` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto_out` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi_in` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi_out` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of presensi
-- ----------------------------
INSERT INTO `presensi` VALUES (31, '12345', '2024-01-01', '06:17:06', '16:19:33', '12345-2024-01-15-in.png', '12345-2024-01-15-out.png', '-8.5924306 , 116.0973842', '-8.5924351 , 116.0973728');
INSERT INTO `presensi` VALUES (32, '12346', '2024-01-23', '06:46:02', '08:47:29', '12345-2024-01-16-in.png', '12345-2024-01-16-out.png', '-8.5924733 , 116.0974212', '-8.5924723 , 116.0974207');
INSERT INTO `presensi` VALUES (33, '12346', '2024-01-24', '12:07:23', '00:00:00', '12346-2024-01-16-in.png', NULL, '-8.5924798 , 116.0974125', NULL);
INSERT INTO `presensi` VALUES (34, '12345', '2024-01-24', '11:14:50', '11:34:21', '12345-2024-01-18-in.png', '12345-2024-01-18-out.png', '-8.5919604 , 116.0977311', '-8.5919663 , 116.0977163');
INSERT INTO `presensi` VALUES (35, '12345', '2024-01-24', '09:00:15', '09:01:07', '12345-2024-01-19-in.png', '12345-2024-01-19-out.png', '-8.592475 , 116.0974291', '-8.592471 , 116.0974225');
INSERT INTO `presensi` VALUES (36, '12345', '2024-01-24', '05:06:29', '00:00:00', '12345-2024-01-20-in.png', NULL, '-8.5652286 , 116.1421924', NULL);
INSERT INTO `presensi` VALUES (38, '12345', '2024-02-01', '07:57:50', NULL, '12345-2024-02-01-in.png', NULL, '-8.5924275 , 116.0973809', NULL);
INSERT INTO `presensi` VALUES (39, '12346', '2024-02-01', '10:02:19', NULL, '12346-2024-02-01-in.png', NULL, '-8.5924344 , 116.0974011', NULL);
INSERT INTO `presensi` VALUES (40, '12347', '2024-02-01', '10:05:35', '10:16:17', '12347-2024-02-01-in.png', '12347-2024-02-01-out.png', '-8.5924283 , 116.0973802', '-8.5924343 , 116.097398');
INSERT INTO `presensi` VALUES (41, '12345', '2024-02-05', '15:49:18', '16:56:20', '12345-2024-02-05-in.png', '12345-2024-02-05-out.png', '-8.5924293 , 116.0973902', '-8.5924284 , 116.0973883');
INSERT INTO `presensi` VALUES (42, '12346', '2024-02-05', '16:56:51', '16:57:11', '12346-2024-02-05-in.png', '12346-2024-02-05-out.png', '-8.5924239 , 116.0973803', '-8.5924286 , 116.0973835');
INSERT INTO `presensi` VALUES (43, '12346', '2024-02-07', '07:48:52', '16:09:33', '12346-2024-02-07-in.png', '12346-2024-02-07-out.png', '-8.5924405 , 116.097383', '-8.5924341 , 116.0973995');
INSERT INTO `presensi` VALUES (44, '12345', '2024-02-13', '08:31:23', NULL, '12345-2024-02-13-in.png', NULL, '-8.5924573 , 116.0974343', NULL);
INSERT INTO `presensi` VALUES (45, '12346', '2024-02-15', '07:46:34', NULL, '12346-2024-02-15-in.png', NULL, '-8.5924242 , 116.0973819', NULL);
INSERT INTO `presensi` VALUES (46, '12346', '2024-02-19', '07:59:59', '16:41:54', '12346-2024-02-19-in.png', '12346-2024-02-19-out.png', '-8.592434 , 116.0973814', '-8.5924373 , 116.0973853');
INSERT INTO `presensi` VALUES (47, '12346', '2024-02-20', '07:35:55', NULL, '12346-2024-02-20-in.png', NULL, '-8.592431 , 116.0973746', NULL);
INSERT INTO `presensi` VALUES (49, '12345', '2024-02-20', '14:30:48', NULL, '12345-2024-02-20-in.png', NULL, '-8.5924347 , 116.0973826', NULL);
INSERT INTO `presensi` VALUES (50, '1991', '2024-02-20', '14:36:03', NULL, '1991-2024-02-20-in.png', NULL, '-8.5924303 , 116.0973789', NULL);

-- ----------------------------
-- Table structure for satker
-- ----------------------------
DROP TABLE IF EXISTS `satker`;
CREATE TABLE `satker`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kode_satker` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `roles` enum('humas_kanwil','humas_satker','superadmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `konfigurasi_berita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `konfigurasi_rekap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `kode_satker`(`kode_satker`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of satker
-- ----------------------------
INSERT INTO `satker` VALUES (1, 'ADAM NBC', 'adams', 'SAT-NTB-01', 'adamsedit@gmail.com', '2024-01-23 08:05:54', '$2y$10$a7Mzk8hX/8UWk2iPKeC6aeMNowX/8C6V.xFijkIwln3PQgKLd7Zy.', NULL, '2024-02-23 15:56:48', '2024-03-15 00:00:00', '12345678', 'humas_kanwil', NULL, NULL, 'SAT-NTB-01.jpeg');
INSERT INTO `satker` VALUES (3, 'KAKA SLANK', 'kaka', 'SAT-NTB-02', 'kaka@gmail.com', '2024-01-23 08:05:54', '$2y$10$873EhKlfRK7gR4KdNIwQjugXKZSzf2oybIucBbJWylZsXwPAoP36y', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345678', 'humas_kanwil', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (4, 'ADMIN SLANK', 'admin', 'SAT-NTB-03', 'admin@gmail.com', '2024-01-23 08:05:54', '$2y$10$j7hZA7nThUY0xGkL9wJbdOhLH0md8M.ompnqx4MStg.RaTMP9Mz3G', NULL, '2024-02-23 15:56:48', '2024-03-15 00:00:00', '12345678', 'superadmin', NULL, NULL, 'SAT-NTB-03.png');
INSERT INTO `satker` VALUES (21, 'LAPAS KLAS IIA MATARAM', 'Lapas Mataram', 'SAT-NTB-04', 'lapasmataram@gmail.com', '2024-01-23 08:05:54', '$2y$10$Cdz1tzOsg.YwXtTtGSFRI.OEb1kftMvLRBUV6QgidflUGmP1FTPZG', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (22, 'LAPAS KLAS IIA SUMBAWA BESAR', NULL, 'SAT-NTB-05', 'lapassumbawa@gmail.com', '2024-01-23 08:05:54', '$2y$10$TbTcLqBQ6rJYCpvGRY6kz.FQ/ZsoNSZ3MZlmajOsqqpILAROmW8r6', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (23, 'LAPAS KLAS IIB DOMPU', NULL, 'SAT-NTB-06', 'lapasdompu@gmail.com', '2024-01-23 08:05:54', '$2y$10$FiJvkkPlqa5/jX3UNSEfDOxKfHpSF/dIJIII.RqrAYs4SnQvYsg1m', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (24, 'LAPAS KLAS IIB SELONG', NULL, 'SAT-NTB-07', 'lapasselong@gmail.com', '2024-01-23 08:05:54', '$2y$10$ux6VhbUt1aJGQAIzCHBM8uMd4We/XZEEE0T3DG4FTKKUMeLzjbG3e', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (25, 'LAPAS TERBUKA KLAS IIB LOMBOK TENGAH', NULL, 'SAT-NTB-08', 'lapasterbuka@gmail.com', '2024-01-23 08:05:54', '$2y$10$C.WpwBwA76SmlS4RIbG2LeH4ZQ2piqxTMJylbF00yq3Tn7Xg7tCRK', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (26, 'LPKA KLAS II LOMBOK TENGAH', NULL, 'SAT-NTB-09', 'lpka@gmail.com', '2024-01-23 08:05:54', '$2y$10$4x.RR3tPfUQ3cS9ijD982uFjvEMkEa6g5Ca2y4L8TkK9MfavIml1i', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (27, 'LPP KLAS III MATARAM', NULL, 'SAT-NTB-010', 'lppmataram@gmail.com', '2024-01-23 08:05:54', '$2y$10$78hZfy/HOe79ynktQNMGfeB0iniv/oYQps.SO3134Po/6/OoHQhlK', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (28, 'RUTAN KLAS IIB PRAYA', NULL, 'SAT-NTB-011', 'rutanpraya@gmail.com', '2024-01-23 08:05:54', '$2y$10$zckhhl5k/T6k1O.AF2UOlu15GgMpin2SBSudEmgW1dqLmv6nDpwMS', NULL, '2024-02-23 15:56:48', '2024-03-15 00:00:00', '12345', 'humas_satker', NULL, NULL, 'SAT-NTB-011.jpeg');
INSERT INTO `satker` VALUES (29, 'RUTAN KLAS IIB RABA BIMA', NULL, 'SAT-NTB-012', 'rutanbima@gmail.com', '2024-01-23 08:05:54', '$2y$10$7JRmzM1elXTcurXZeA6kk.Qy/6QY9Kt6desdRBPABUra2BQ70XCHC', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (30, 'BAPAS KLAS II MATARAM', NULL, 'SAT-NTB-013', 'bapasmataram@gmail.com', '2024-01-23 08:05:54', '$2y$10$t91Yupbe4wIHdAncI1tujOlQCjTreWC789u2StrxBd.SQfLtHblQa', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (31, 'BAPAS KLAS II SUMBAWA BESAR', NULL, 'SAT-NTB-014', 'bapassumbawa@gmail.com', '2024-01-23 08:05:54', '$2y$10$TT799TF0F4KC/JTf/dy7R.35XnOdigkf0gYRFnmCMYlcvr3cqoPlO', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (32, 'RUPBASAN KLAS I MATARAM', NULL, 'SAT-NTB-015', 'rupbasanmataram@gmail.com', '2024-01-23 08:05:54', '$2y$10$jq1AXU8CRFKgTWUgro/DPeTuQXn0oln8S3hMWGineoZBRwwoPQxBK', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (33, 'RUPBASAN KLAS II SUMBAWA BESAR', NULL, 'SAT-NTB-016', 'rupbasansumbawa@gmail.com', '2024-01-23 08:05:54', '$2y$10$0pEx696ZrSOfWbHvkNs.NuynbyYPpEgjUd8l7NGnWZo1IkmqXTy.y', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (34, 'KANIM KLAS I TPI MATARAM', NULL, 'SAT-NTB-017', 'kanimmataram@gmail.com', '2024-01-23 08:05:54', '$2y$10$KaGAY4wN1hakgi.IHuMAyuFECPXMKTG7x12176GeAUm.oWAXwHGT.', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (35, 'KANIM KLAS II TPI SUMBAWA BESAR', NULL, 'SAT-NTB-018', 'kanimsumbawa@gmail.com', '2024-01-23 08:05:54', '$2y$10$9/s9A0Sudqvx3mL565gj1uJAVa2AVpZHnTMzoIVAlPUAiKxZsVrkS', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);
INSERT INTO `satker` VALUES (37, 'KANIM KLAS III NON TPI BIMA', NULL, 'SAT-NTB-019', 'kanimbima@gmail.com', '2024-01-23 08:05:54', '$2y$10$jn9IaUiLyJPC4pdu9DNsdeZZ7GKT0W6JKUBRyY5S5oV/Fy.b.aD0m', NULL, '2024-02-23 15:56:48', '2024-02-23 15:56:48', '12345', 'humas_satker', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Adam NBC', 'adams@gmail.com', '2024-01-23 08:05:54', '$2y$10$V.Es3WiUs2U1xnlnOmw/lOoisLQMbRvBYTZa6eqCMKM65sznly3S.', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
