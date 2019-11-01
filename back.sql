/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.1.34-MariaDB : Database - akademik
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`akademik` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `akademik`;

/*Table structure for table `tabel_menu` */

DROP TABLE IF EXISTS `tabel_menu`;

CREATE TABLE `tabel_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_menu` */

insert  into `tabel_menu`(`id`,`nama_menu`,`link`,`icon`,`is_main_menu`) values 
(1,'KELOLA SISWA','siswa','fa fa-users',0),
(2,'Kelola GURU','guru','fa fa-graduation-cap',0),
(8,'data sekolah','sekolah','fa fa-building',0),
(9,'Data master','#','fa fa-bars',0),
(10,'Mata Pelajaran','mapel','fa fa-book',9),
(11,'Ruangan','ruangan','fa fa-building',9),
(12,'Jurusan','jurusan','fa fa-th-large',9),
(13,'Rombel','rombel','fa fa-users',9),
(14,'Jadwal','jadwal','fa fa-calendar',0),
(15,'Tahun Akademik','tahunakademik','fa fa-calendar-o',9),
(16,'laporan nilai','nilai','fa fa-file-excel-o',0),
(17,'Pengguna sistem','users','fa fa-cubes',0),
(19,'Kurikulum','kurikulum','fa fa-newspaper-o',9),
(20,'Wali Kelas','walikelas','fa fa-users',0),
(21,'form pembayaran','keuangan/form','fa fa-shopping-cart',0),
(22,'Peserta Didik','siswa/siswa_aktif','fa fa-graduation-cap',0),
(23,'jenis pembayaran','jenis_pembayaran','fa fa-credit-card',0),
(24,'setup biaya','keuangan/setup','fa fa-graduation-cap',0),
(25,'Raport Online','raport','fa fa-graduation-cap',0),
(27,'phonebook','sms_group','fa fa-book',26),
(28,'form sms','sms','fa fa-keyboard-o',26),
(29,'Laporan','keuangan','fa fa-desktop',0),
(30,'Laporan','keuangan','fa fa-desktop',0),
(31,'PROFIL SISWA','siswa/profil','fa fa-users',0),
(32,'DAFTAR GURU','guru/daftar_guru','fa fa-user',0),
(33,'PROFIL GURU','guru/profil','fa fa-users',0),
(34,'RAPORT SISWA','raport/listnilaisiswa','fa fa-graduation-cap',0),
(35,'NILAI','raport/nilai','fa fa-book',0);

/*Table structure for table `tbl_agama` */

DROP TABLE IF EXISTS `tbl_agama`;

CREATE TABLE `tbl_agama` (
  `kd_agama` varchar(2) NOT NULL,
  `nama_agama` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_agama` */

insert  into `tbl_agama`(`kd_agama`,`nama_agama`) values 
('1','ISLAM'),
('2','KRISTEN/ PROTESTAN'),
('3','KATHOLIK'),
('4','HINDU'),
('5','BUDHA'),
('6','KHONG HU CHU'),
('7','LAIN LAIN');

/*Table structure for table `tbl_biaya_sekolah` */

DROP TABLE IF EXISTS `tbl_biaya_sekolah`;

CREATE TABLE `tbl_biaya_sekolah` (
  `id_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_biaya_sekolah` */

insert  into `tbl_biaya_sekolah`(`id_biaya`,`id_jenis_pembayaran`,`id_tahun_akademik`,`jumlah_biaya`) values 
(3,1,1,600000),
(4,2,1,900000);

/*Table structure for table `tbl_guru` */

DROP TABLE IF EXISTS `tbl_guru`;

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nuptk` varchar(16) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `gender` enum('p','w') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tempat_lahir` text,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_guru` */

insert  into `tbl_guru`(`id_guru`,`nuptk`,`nama_guru`,`gender`,`username`,`password`,`tempat_lahir`,`tgl_lahir`,`no_telp`,`agama`,`foto`,`alamat`) values 
(8,'1548758656300002','Ari Purnawati. S.Pd.I','','ari','246776804a9f91ead4fbaa90b812d0e2','Pringsewu','1980-02-16','081369374221','1',NULL,''),
(9,'3747752654110062','Bari.S.Pd.I','p','bari','53b937338b7f2f0279343ca336cef9ed','Blitar','1974-04-15','','01',NULL,NULL),
(10,'493576433110062','Iwan Sobri.S.Pd.I','p','iwan','01ccce480c60fcdb67b54f4509ffdb56','Sinar Rejeki','1986-06-03','','01',NULL,NULL),
(11,'3639740643200040','Ir. Fatoni','','fatoni','96e9befa8d7aec506eed783915a237f3','Lampung Selatan','0001-01-01','',NULL,NULL,NULL),
(12,'7944755659200002','Samsul Izon.S.Pd.','p','samsul','6ddcd35687be9a4415e4416a6dd6829e','Bandar Lampung','1977-12-06','','01',NULL,NULL),
(13,'7544764666210163','Nurmalasari.S.Pd.','p','nurmalasari','5e4941a123187bb711f8c21a3241a9de','Sumber Jaya','1986-12-12','','01',NULL,NULL),
(14,'8845768669220002','Resti Ratnawati.S.Pd','p','resti','f5a7a91022921bea8248c0b7176902ed','Jatimulyo','1990-05-13','','01',NULL,NULL),
(15,'5952767668220012','Marinah Kasari.S.Pd.','p','marinah','e97d2fe397ee0445abaebe96cbcb6d12','Sumber Jaya','1989-06-20','','01',NULL,NULL),
(16,'3838770671220002','Kamirah.S.P.d.','p','kamirah','85c18d3120798630e8f0ee7af5488a13','Sumber Jaya','1992-05-06','','01',NULL,NULL),
(17,'3741752653300050','Sari Wulan.S.P.d','p','sari','a87bcf310c4fdf2a80f2f3d97f1f9424','Bandar Lampung','1974-04-10','','01',NULL,NULL),
(18,'083574263200062','Drs. Sunari','p','sunari','c307c81201bcf2d4c16e70a8552276ed','Ambarawa','1964-03-05','','01',NULL,NULL),
(19,'4462763665110033','Sobirin','p','sobirin','e22e6a011aee88d47c481538841f9885','Margodadi','1985-11-05','','01',NULL,NULL),
(20,'9843757659300042','Atmini','','atmini','de979a6fbc017883b2ce156ea31a486c','Sidoharjo','1979-05-11','','1',NULL,''),
(21,'','Nurrul Khifta','p','nurrul','49a14102aedfa1525158fc13bdab9433','Sinar Rejeki','1998-08-08','','01',NULL,NULL),
(22,'','Imam Mukhlisin','p','imam','eaccb8ea6090a40a98aa28c071810371','Purwotani','1992-02-29','081398402846','01',NULL,NULL),
(23,'4333333','tes a','','123456','d41d8cd98f00b204e9800998ecf8427e','dcdxs','2019-09-11','32423','1','profil2.png','sdvsdv'),
(24,'435435','greg','p','rrrr','6b76b5b54567ec0008287d11a2e9e22a','fhgf','2019-09-16','453345','2','','fdgfdg'),
(25,'3454','greg','p','reg','dd4a0b947f663839c0aa952a6fb2524b','rgre','2019-09-10','-243543','1','ss','regre'),
(26,'23543534','hrth','p','trytrytry','c2575a1d1677d109f009d2617b9ae88f','4565','2019-09-11','564','3','profil21.png','hrthtrhggf');

/*Table structure for table `tbl_history_kelas` */

DROP TABLE IF EXISTS `tbl_history_kelas`;

CREATE TABLE `tbl_history_kelas` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_rombel` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_history_kelas` */

insert  into `tbl_history_kelas`(`id_history`,`id_rombel`,`nim`,`id_tahun_akademik`) values 
(46,10,'2006008',6),
(47,10,'sdcx',6);

/*Table structure for table `tbl_jadwal` */

DROP TABLE IF EXISTS `tbl_jadwal`;

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun_akademik` int(11) NOT NULL,
  `kd_jurusan` varchar(6) NOT NULL,
  `kelas` int(11) NOT NULL,
  `kd_mapel` varchar(4) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam` varchar(14) NOT NULL,
  `kd_ruangan` varchar(4) NOT NULL,
  `semester` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=390 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jadwal` */

insert  into `tbl_jadwal`(`id_jadwal`,`id_tahun_akademik`,`kd_jurusan`,`kelas`,`kd_mapel`,`id_guru`,`jam`,`kd_ruangan`,`semester`,`hari`,`id_rombel`) values 
(381,6,'1',10,'E',16,'13.30 - 14.15','X',1,'SELASA',10),
(382,6,'1',10,'E',8,'','R2',1,'',11),
(383,6,'1',10,'A',8,'13.30 - 14.15','X',1,'SENIN',10),
(384,6,'1',10,'A',8,'','R2',1,'',11),
(385,6,'1',10,'F',8,'10.45 - 11.30','R2',1,'RABU',10),
(386,6,'1',10,'F',8,'','R2',1,'',11),
(387,6,'1',10,'C',8,'10.00 - 10.45','R2',1,'SENIN',10),
(388,6,'1',10,'C',8,'','R2',1,'',11),
(389,6,'5',10,'K',8,'','R2',1,'',8);

/*Table structure for table `tbl_jenis_pembayaran` */

DROP TABLE IF EXISTS `tbl_jenis_pembayaran`;

CREATE TABLE `tbl_jenis_pembayaran` (
  `id_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_pembayaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jenis_pembayaran` */

insert  into `tbl_jenis_pembayaran`(`id_jenis_pembayaran`,`nama_jenis_pembayaran`) values 
(1,'SPP SEMESTER 1'),
(2,'DANA SUMBANGAN POKOK'),
(3,'SPP SEMESTER 2'),
(4,'SPP SEMESTER 3'),
(5,'SPP SEMESTER 4'),
(6,'SPP SEMESTER 5');

/*Table structure for table `tbl_jenjang_sekolah` */

DROP TABLE IF EXISTS `tbl_jenjang_sekolah`;

CREATE TABLE `tbl_jenjang_sekolah` (
  `id_jenjang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(10) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jenjang_sekolah` */

insert  into `tbl_jenjang_sekolah`(`id_jenjang`,`nama_jenjang`,`jumlah_kelas`) values 
(1,'SD/ MI',6),
(2,'SMP/ MTS',3),
(3,'SMA/ SMK',3);

/*Table structure for table `tbl_jurusan` */

DROP TABLE IF EXISTS `tbl_jurusan`;

CREATE TABLE `tbl_jurusan` (
  `kd_jurusan` varchar(4) NOT NULL,
  `nama_jurusan` varchar(250) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_jurusan` */

insert  into `tbl_jurusan`(`kd_jurusan`,`nama_jurusan`) values 
('1','Teknik Komputer dan Jaringan'),
('2','Teknik Kendaraan Ringan Otomot'),
('3','Administrasi Perkantoran'),
('4','Otomatisasi dan Tata Kelola Pe'),
('5','Akuntansi dan Keuangan Lembaga'),
('6','Akuntansi'),
('7','Teknik Kendaraan Ringan'),
('8','Manajemen Perkantoran');

/*Table structure for table `tbl_kelompok_mapel` */

DROP TABLE IF EXISTS `tbl_kelompok_mapel`;

CREATE TABLE `tbl_kelompok_mapel` (
  `id_kelompok_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelompok` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelompok_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kelompok_mapel` */

insert  into `tbl_kelompok_mapel`(`id_kelompok_mapel`,`nama_kelompok`) values 
(1,'Kelompok Wajib A'),
(2,'Kelompok Wajib B'),
(3,'Kelompok Wajib C'),
(4,'Permintaan');

/*Table structure for table `tbl_kurikulum` */

DROP TABLE IF EXISTS `tbl_kurikulum`;

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kurikulum` varchar(30) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_kurikulum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kurikulum` */

insert  into `tbl_kurikulum`(`id_kurikulum`,`nama_kurikulum`,`is_aktif`) values 
(3,'KURIKULUM 2015-2016','y');

/*Table structure for table `tbl_kurikulum_detail` */

DROP TABLE IF EXISTS `tbl_kurikulum_detail`;

CREATE TABLE `tbl_kurikulum_detail` (
  `id_kurikulum_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_kurikulum` int(11) NOT NULL,
  `kd_mapel` varchar(11) NOT NULL,
  `kd_jurusan` varchar(4) NOT NULL,
  `kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_kurikulum_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kurikulum_detail` */

insert  into `tbl_kurikulum_detail`(`id_kurikulum_detail`,`id_kurikulum`,`kd_mapel`,`kd_jurusan`,`kelas`) values 
(37,3,'E','1',10),
(38,3,'H','3',10),
(39,3,'J','3',10),
(40,3,'A','1',10),
(42,3,'F','1',10),
(43,3,'H','2',10),
(44,3,'C','1',10),
(45,3,'K','5',10);

/*Table structure for table `tbl_level_user` */

DROP TABLE IF EXISTS `tbl_level_user`;

CREATE TABLE `tbl_level_user` (
  `id_level_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_level_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_level_user` */

insert  into `tbl_level_user`(`id_level_user`,`nama_level`) values 
(1,'Admin'),
(3,'Guru'),
(5,'Siswa');

/*Table structure for table `tbl_mapel` */

DROP TABLE IF EXISTS `tbl_mapel`;

CREATE TABLE `tbl_mapel` (
  `kd_mapel` varchar(4) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_mapel` */

insert  into `tbl_mapel`(`kd_mapel`,`nama_mapel`) values 
('A','PAI'),
('B','PKN'),
('C','SNI'),
('D','Bahasa Indonesia'),
('E','Matematika'),
('F','Bahasa Inggris'),
('G','PENJOK'),
('H','Ekonomi'),
('I','Pend. Seni'),
('J','Komputer'),
('K','Geografi'),
('L','Sosiologi'),
('M','Biologi'),
('N','Bahasa Arab'),
('O','Prakarya');

/*Table structure for table `tbl_nilai` */

DROP TABLE IF EXISTS `tbl_nilai`;

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_nilai` */

insert  into `tbl_nilai`(`id_nilai`,`id_jadwal`,`nim`,`nilai`) values 
(1,346,'2006008',80),
(2,377,'2006008',80),
(3,380,'2006008',90),
(4,378,'2006008',60),
(5,379,'2006008',50);

/*Table structure for table `tbl_pembayaran` */

DROP TABLE IF EXISTS `tbl_pembayaran`;

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nim` varchar(13) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pembayaran` */

insert  into `tbl_pembayaran`(`id_pembayaran`,`tanggal`,`nim`,`id_jenis_pembayaran`,`jumlah`,`keterangan`) values 
(1,'2017-03-02','ti102132',1,100000,'tidak ada'),
(2,'2017-03-02','ti102132',1,100000,'tidak ada');

/*Table structure for table `tbl_phonebook` */

DROP TABLE IF EXISTS `tbl_phonebook`;

CREATE TABLE `tbl_phonebook` (
  `id_phonebook` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_phonebook`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_phonebook` */

insert  into `tbl_phonebook`(`id_phonebook`,`id_group`,`no_hp`) values 
(1,7,'089699935552'),
(2,7,'085310204081');

/*Table structure for table `tbl_rombel` */

DROP TABLE IF EXISTS `tbl_rombel`;

CREATE TABLE `tbl_rombel` (
  `id_rombel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rombel` varchar(100) NOT NULL,
  `kelas` int(11) NOT NULL,
  `kd_jurusan` varchar(4) NOT NULL,
  PRIMARY KEY (`id_rombel`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_rombel` */

insert  into `tbl_rombel`(`id_rombel`,`nama_rombel`,`kelas`,`kd_jurusan`) values 
(8,'X AK',10,'5'),
(10,'X TKJ 1',10,'1'),
(11,'kelas AB',10,'1');

/*Table structure for table `tbl_ruangan` */

DROP TABLE IF EXISTS `tbl_ruangan`;

CREATE TABLE `tbl_ruangan` (
  `kd_ruangan` varchar(4) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_ruangan` */

insert  into `tbl_ruangan`(`kd_ruangan`,`nama_ruangan`) values 
('R2','COntoh1'),
('X','Kelas X'),
('XI','Kelas XI'),
('XII','Kelas XII');

/*Table structure for table `tbl_sekolah_info` */

DROP TABLE IF EXISTS `tbl_sekolah_info`;

CREATE TABLE `tbl_sekolah_info` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `id_jenjang_sekolah` int(11) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sekolah_info` */

insert  into `tbl_sekolah_info`(`id_sekolah`,`nama_sekolah`,`id_jenjang_sekolah`,`alamat_sekolah`,`email`,`telpon`) values 
(0,'',0,'','',''),
(1,'SMKN 1 CANDIPURO',3,'Kecamatan Kec. Candipuro, Kabupaten Kab. Lampung Selatan, Provinsi Prov. Lampung','smknegericandipuro@ymail.com','02134235');

/*Table structure for table `tbl_siswa` */

DROP TABLE IF EXISTS `tbl_siswa`;

CREATE TABLE `tbl_siswa` (
  `nim` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('P','W') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `kd_agama` varchar(2) NOT NULL,
  `foto` text NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama_ibu` varchar(300) DEFAULT NULL,
  `nama_ayah` varchar(300) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_siswa` */

insert  into `tbl_siswa`(`nim`,`nama`,`gender`,`tanggal_lahir`,`tempat_lahir`,`kd_agama`,`foto`,`id_rombel`,`username`,`password`,`nama_ibu`,`nama_ayah`,`alamat`) values 
('2006008','Aan Sayudi','P','2000-01-26','Beringin Kencana','1','profil1.png',10,'2006008','e807f1fcf82d132f9bb018ca6738a19f','YULIANAH','SADARUDIN','BERINGIN KENCANA');

/*Table structure for table `tbl_sms_group` */

DROP TABLE IF EXISTS `tbl_sms_group`;

CREATE TABLE `tbl_sms_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_group` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sms_group` */

insert  into `tbl_sms_group`(`id`,`nama_group`) values 
(1,'group 1'),
(2,'group 2'),
(4,'asasas'),
(5,'testing'),
(7,'walimurid');

/*Table structure for table `tbl_tahun_akademik` */

DROP TABLE IF EXISTS `tbl_tahun_akademik`;

CREATE TABLE `tbl_tahun_akademik` (
  `id_tahun_akademik` int(4) NOT NULL AUTO_INCREMENT,
  `tahun_akademik` varchar(10) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  PRIMARY KEY (`id_tahun_akademik`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_tahun_akademik` */

insert  into `tbl_tahun_akademik`(`id_tahun_akademik`,`tahun_akademik`,`is_aktif`,`semester_aktif`) values 
(6,'2017/2018','y',1),
(7,'2018/2019','n',0);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_lengkap`,`username`,`password`,`id_level_user`,`foto`) values 
(1,'Admin','admin','a66abb5684c45962d887564f08346e8d',1,'dsdsdsds'),
(2,'Tes','tes','a66abb5684c45962d887564f08346e8d',5,'');

/*Table structure for table `tbl_user_rule` */

DROP TABLE IF EXISTS `tbl_user_rule`;

CREATE TABLE `tbl_user_rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_level_user` int(11) NOT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user_rule` */

insert  into `tbl_user_rule`(`id_rule`,`id_menu`,`id_level_user`) values 
(3,1,1),
(4,2,1),
(6,14,2),
(8,16,3),
(11,9,1),
(12,10,1),
(13,11,1),
(14,12,1),
(15,13,1),
(16,14,1),
(17,17,1),
(18,19,1),
(20,14,3),
(25,22,1),
(29,26,1),
(30,26,5),
(34,14,5),
(36,31,5),
(37,32,5),
(38,33,3),
(42,15,1),
(43,8,1),
(44,20,1),
(46,35,5),
(48,34,3);

/*Table structure for table `tbl_walikelas` */

DROP TABLE IF EXISTS `tbl_walikelas`;

CREATE TABLE `tbl_walikelas` (
  `id_walikelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  PRIMARY KEY (`id_walikelas`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_walikelas` */

insert  into `tbl_walikelas`(`id_walikelas`,`id_guru`,`id_tahun_akademik`,`id_rombel`) values 
(7,5,1,1),
(8,5,1,2),
(9,5,1,3),
(10,5,1,4),
(11,2,7,8),
(12,2,7,9),
(13,2,7,10),
(14,19,6,10),
(15,8,6,8);

/*Table structure for table `v_master_rombel` */

DROP TABLE IF EXISTS `v_master_rombel`;

/*!50001 DROP VIEW IF EXISTS `v_master_rombel` */;
/*!50001 DROP TABLE IF EXISTS `v_master_rombel` */;

/*!50001 CREATE TABLE  `v_master_rombel`(
 `id_rombel` int(11) ,
 `nama_rombel` varchar(100) ,
 `kelas` int(11) ,
 `kd_jurusan` varchar(4) ,
 `nama_jurusan` varchar(250) 
)*/;

/*Table structure for table `v_tbl_user` */

DROP TABLE IF EXISTS `v_tbl_user`;

/*!50001 DROP VIEW IF EXISTS `v_tbl_user` */;
/*!50001 DROP TABLE IF EXISTS `v_tbl_user` */;

/*!50001 CREATE TABLE  `v_tbl_user`(
 `id_user` int(11) ,
 `nama_lengkap` varchar(50) ,
 `username` varchar(40) ,
 `password` varchar(32) ,
 `id_level_user` int(11) ,
 `foto` text ,
 `nama_level` varchar(30) 
)*/;

/*Table structure for table `v_walikelas` */

DROP TABLE IF EXISTS `v_walikelas`;

/*!50001 DROP VIEW IF EXISTS `v_walikelas` */;
/*!50001 DROP TABLE IF EXISTS `v_walikelas` */;

/*!50001 CREATE TABLE  `v_walikelas`(
 `nama_guru` varchar(30) ,
 `nama_rombel` varchar(100) ,
 `id_walikelas` int(11) ,
 `id_tahun_akademik` int(11) ,
 `nama_jurusan` varchar(250) ,
 `kelas` int(11) ,
 `tahun_akademik` varchar(10) 
)*/;

/*View structure for view v_master_rombel */

/*!50001 DROP TABLE IF EXISTS `v_master_rombel` */;
/*!50001 DROP VIEW IF EXISTS `v_master_rombel` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_master_rombel` AS select `tr`.`id_rombel` AS `id_rombel`,`tr`.`nama_rombel` AS `nama_rombel`,`tr`.`kelas` AS `kelas`,`tr`.`kd_jurusan` AS `kd_jurusan`,`tj`.`nama_jurusan` AS `nama_jurusan` from (`tbl_rombel` `tr` join `tbl_jurusan` `tj`) where (`tj`.`kd_jurusan` = `tr`.`kd_jurusan`) */;

/*View structure for view v_tbl_user */

/*!50001 DROP TABLE IF EXISTS `v_tbl_user` */;
/*!50001 DROP VIEW IF EXISTS `v_tbl_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_user` AS select `tu`.`id_user` AS `id_user`,`tu`.`nama_lengkap` AS `nama_lengkap`,`tu`.`username` AS `username`,`tu`.`password` AS `password`,`tu`.`id_level_user` AS `id_level_user`,`tu`.`foto` AS `foto`,`tlu`.`nama_level` AS `nama_level` from (`tbl_user` `tu` join `tbl_level_user` `tlu`) where (`tu`.`id_level_user` = `tlu`.`id_level_user`) */;

/*View structure for view v_walikelas */

/*!50001 DROP TABLE IF EXISTS `v_walikelas` */;
/*!50001 DROP VIEW IF EXISTS `v_walikelas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_walikelas` AS select `g`.`nama_guru` AS `nama_guru`,`r`.`nama_rombel` AS `nama_rombel`,`w`.`id_walikelas` AS `id_walikelas`,`w`.`id_tahun_akademik` AS `id_tahun_akademik`,`j`.`nama_jurusan` AS `nama_jurusan`,`r`.`kelas` AS `kelas`,`ta`.`tahun_akademik` AS `tahun_akademik` from ((((`tbl_walikelas` `w` join `tbl_rombel` `r`) join `tbl_guru` `g`) join `tbl_jurusan` `j`) join `tbl_tahun_akademik` `ta`) where ((`w`.`id_guru` = `g`.`id_guru`) and (`w`.`id_rombel` = `r`.`id_rombel`) and (`j`.`kd_jurusan` = `r`.`kd_jurusan`) and (`ta`.`id_tahun_akademik` = `w`.`id_tahun_akademik`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
