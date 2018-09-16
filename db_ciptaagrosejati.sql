-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2014 at 06:42 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_ciptaagrosejati`
--

-- --------------------------------------------------------

--
-- Table structure for table `h_slip`
--

CREATE TABLE IF NOT EXISTS `h_slip` (
  `noSlip` char(13) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`noSlip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penimbangancpo_d`
--

CREATE TABLE IF NOT EXISTS `penimbangancpo_d` (
  `nmSlipCPO` char(11) NOT NULL,
  `nmKendaraan` varchar(11) DEFAULT NULL,
  `nmSupir` varchar(150) DEFAULT NULL,
  `nmRelasi` varchar(150) DEFAULT NULL,
  `nmDO` varchar(150) DEFAULT NULL,
  `bruto` int(11) DEFAULT NULL,
  `brutoAsli` int(11) DEFAULT NULL,
  `tara` int(11) DEFAULT NULL,
  `netto` int(11) DEFAULT NULL,
  `tanggalMasuk` datetime DEFAULT NULL,
  `tanggalKeluar` datetime DEFAULT NULL,
  `userMasuk` varchar(100) DEFAULT NULL,
  `userKeluar` varchar(100) DEFAULT NULL,
  `complate` enum('y','n','c') DEFAULT 'n',
  `keterangan` varchar(200) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `potFFA` decimal(11,2) DEFAULT NULL,
  `potAir` decimal(11,2) DEFAULT NULL,
  `potKotoran` decimal(11,2) DEFAULT NULL,
  `jumlahSegel` int(5) DEFAULT NULL,
  `segel` text,
  `beratBersih` int(11) DEFAULT NULL,
  PRIMARY KEY (`nmSlipCPO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penimbanganlainya_d`
--

CREATE TABLE IF NOT EXISTS `penimbanganlainya_d` (
  `nmSlipLainya` char(11) NOT NULL,
  `nmKendaraan` varchar(11) DEFAULT NULL,
  `nmSupir` varchar(150) DEFAULT NULL,
  `nmRelasi` varchar(150) DEFAULT NULL,
  `kdMaterial` varchar(150) DEFAULT NULL,
  `nmMaterial` varchar(150) DEFAULT NULL,
  `bruto` int(11) DEFAULT NULL,
  `tara` int(11) DEFAULT NULL,
  `netto` int(11) DEFAULT NULL,
  `tanggalMasuk` datetime DEFAULT NULL,
  `tanggalKeluar` datetime DEFAULT NULL,
  `userMasuk` varchar(100) DEFAULT NULL,
  `userKeluar` varchar(100) DEFAULT NULL,
  `complate` enum('y','n','c') DEFAULT 'n',
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`nmSlipLainya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penimbangantbs_d`
--

CREATE TABLE IF NOT EXISTS `penimbangantbs_d` (
  `nmSlipTBS` char(12) NOT NULL,
  `nmKendaraan` varchar(11) DEFAULT NULL,
  `nmSupir` varchar(150) DEFAULT NULL,
  `nmRelasi` varchar(150) DEFAULT NULL,
  `nmBarang` varchar(150) DEFAULT NULL,
  `bruto` int(11) DEFAULT NULL,
  `brutoAsli` int(11) DEFAULT NULL,
  `tara` int(11) DEFAULT NULL,
  `netto` int(11) DEFAULT NULL,
  `tanggalMasuk` datetime DEFAULT NULL,
  `tanggalKeluar` datetime DEFAULT NULL,
  `userMasuk` varchar(100) DEFAULT NULL,
  `userKeluar` varchar(100) DEFAULT NULL,
  `complate` enum('y','n','c') DEFAULT 'n',
  `keterangan` varchar(200) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `potonganPersen` decimal(11,2) DEFAULT NULL,
  `potWajib` decimal(11,2) DEFAULT NULL,
  `potSampah` decimal(11,2) DEFAULT NULL,
  `potTangkai` decimal(11,2) DEFAULT NULL,
  `potPasir` decimal(11,2) DEFAULT NULL,
  `potAir` decimal(11,2) DEFAULT NULL,
  `potMutu` decimal(11,2) DEFAULT NULL,
  `potMentah` int(11) DEFAULT NULL,
  `potBusuk` int(11) DEFAULT NULL,
  `potTankos` int(11) DEFAULT NULL,
  `potLainya` int(11) DEFAULT NULL,
  `potBrondol` decimal(11,2) DEFAULT NULL,
  `potDura` decimal(11,2) DEFAULT NULL,
  `jumlahTandan` int(11) DEFAULT NULL,
  `beratTandan` int(11) DEFAULT NULL,
  `beratBersih` int(11) DEFAULT NULL,
  PRIMARY KEY (`nmSlipTBS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `kdBarang` char(4) NOT NULL,
  `nmBarang` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kdBarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_relasi`
--

CREATE TABLE IF NOT EXISTS `tb_relasi` (
  `kdRelasi` char(4) NOT NULL,
  `nmRelasi` varchar(200) DEFAULT NULL,
  `potongan` double(11,1) DEFAULT '0.0',
  PRIMARY KEY (`kdRelasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `level` varchar(20) COLLATE latin1_general_ci DEFAULT 'operator',
  `blokir` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
(1, 'admin', '4124bc0a9335c27f086f24ba207a4912', 'Administrator', 'admin@detik.com', '4444 4444', 'superVisor', 'N', '3trpvlfb1aqt4kougar95f1gm2'),
(2, 'operator', '21232f297a57a5a743894a0e4a801fc3', 'Sinto Gendeng', 'sinto@detik.com', '09945849545', 'operator', 'N', '0tvsbu4our6sbl4571ckkfrna6'),
(3, 'joko', '4124bc0a9335c27f086f24ba207a4912', 'Joko Sembung', 'joko@detik.com', '0895485045958', 'operator', 'N', 't9sju2vj8l7isvn0vbj8thfeu3'),
(4, 'wiro', '7577bfe4fecd40c43e6140344d90ce0e', 'Wiro Sableng', 'wiro@detik.com', '038039403948', 'superVisor', 'N', 'fb8c1878ba35faf15d16dc46ff599c42'),
(13, 'scaleindo', '21232f297a57a5a743894a0e4a801fc3', 'scaleindo', 'scaleindo@scaleindo.com', '0000', 'superUser', 'N', 'fbln0kmovdkkquhvmg8j8gbi35'),
(14, 'edy', 'f75f761c049dced5d7eb5028ac04174a', 'Edy Chandra', 'asd', 'asd', 'operator', 'N', '743iqfjjq2i69dnmnrat0g67f0');

-- --------------------------------------------------------

--
-- Table structure for table `u_minimum`
--

CREATE TABLE IF NOT EXISTS `u_minimum` (
  `kdMinimum` char(4) NOT NULL,
  `nmMinimum` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kdMinimum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_minimum`
--

INSERT INTO `u_minimum` (`kdMinimum`, `nmMinimum`) VALUES
('1', '10');

-- --------------------------------------------------------

--
-- Table structure for table `u_sidebar`
--

CREATE TABLE IF NOT EXISTS `u_sidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdMenu` varchar(150) NOT NULL,
  `nmMenu` varchar(150) DEFAULT NULL,
  `urutan` int(3) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `header` varchar(25) DEFAULT NULL,
  `akses` varchar(100) DEFAULT NULL,
  `superVisor` enum('y','n') DEFAULT 'y',
  `operator` enum('y','n') DEFAULT 'y',
  `superUser` enum('y','n') DEFAULT 'y',
  PRIMARY KEY (`id`,`kdMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `u_sidebar`
--

INSERT INTO `u_sidebar` (`id`, `kdMenu`, `nmMenu`, `urutan`, `icon`, `link`, `header`, `akses`, `superVisor`, `operator`, `superUser`) VALUES
(1, 'prosesPenimbangan', 'Penimbangan', 0, 'fa-barcode', '#', 'header', 'operator superVisor', 'y', 'y', 'y'),
(2, 'master', 'Master', 0, 'fa-external-link', '?menu=master', 'header', 'operator superVisor', 'y', 'y', 'y'),
(3, 'utility', 'Utility', 0, 'fa-gears', '#', 'header', 'operator superVisor', 'y', 'y', 'y'),
(4, 'laporan', 'Laporan', 0, 'fa-bar-chart-o', '#', 'header', 'operator superVisor', 'y', 'y', 'y'),
(5, 'barang', 'Barang', 0, NULL, 'contentChack.php?menu=barang', '', 'master/barang', 'y', 'y', 'y'),
(6, 'relasi', 'Relasi', 0, NULL, 'contentChack.php?menu=relasi', 'master', 'master/relasi', 'y', 'y', 'y'),
(7, 'minimum', 'Weight Minimum', 0, NULL, 'contentChack.php?menu=minimum', 'utility', 'utility/minimum', 'y', 'n', 'y'),
(8, 'hakAkses', 'Hak Akses', 0, NULL, 'contentChack.php?menu=hakAkses', 'utility', 'utility/hakAkses', 'y', 'n', 'y'),
(9, 'manageUser', 'Manage User', 0, NULL, 'contentChack.php?menu=manageUser', 'utility', 'utility/manageUser', 'y', 'n', 'y'),
(10, 'myAccount', 'myaccount', 0, NULL, 'contentChack.php?menu=myAccount', '', 'utility/myAccount', 'y', 'y', 'y'),
(31, 'laporanTBS', 'Laporan TBS', 0, NULL, 'contentChack.php?menu=laporanTBS', 'laporan', 'laporan/laporanTBS', 'y', 'y', 'y'),
(32, 'laporanCPO', 'Laporan CPO', 0, NULL, 'contentChack.php?menu=laporanCPO', 'laporan', 'laporan/laporanCPO', 'y', 'y', 'y'),
(33, 'laporanLainya', 'Laporan Lainnya', 0, NULL, 'contentChack.php?menu=laporanLainya', 'laporan', 'laporan/laporanLainya', 'y', 'y', 'y'),
(34, 'cetakSlipTBS', 'Cetak Slip TBS', 0, NULL, 'contentChack.php?menu=cetakSlipTBS', 'laporan', 'laporan/cetakSlipTBS', 'y', 'y', 'y'),
(35, 'cetakSlipCPO', 'Cetak Slip CPO', 0, NULL, 'contentChack.php?menu=cetakSlipCPO', 'laporan', 'laporan/cetakSlipCPO', 'y', 'y', 'y'),
(36, 'cetakSlipLainya', 'Cetak Slip Lainnya', 0, NULL, 'contentChack.php?menu=cetakSlipLainya', 'laporan', 'laporan/cetakSlipLainya', 'y', 'y', 'y'),
(37, 'penimbanganTBS', 'Penimbangan TBS', 0, NULL, 'contentChack.php?menu=penimbanganTBS', 'prosesPenimbangan', 'penimbanganTBS', 'y', 'y', 'y'),
(38, 'penimbanganCPO', 'Penimbangan CPO', 0, NULL, 'contentChack.php?menu=penimbanganCPO', 'prosesPenimbangan', 'penimbanganCPO', 'y', 'y', 'y'),
(39, 'penimbanganLainya', 'Penimbangan Lainnya', 0, NULL, 'contentChack.php?menu=penimbanganLainya', 'prosesPenimbangan', 'penimbanganLainya', 'y', 'y', 'y'),
(40, 'TBS', 'TBS', 0, NULL, 'data.php?menu=TBS&page=listTBS', 'master', 'data', 'y', 'n', 'y'),
(41, 'CPO', 'CPO', 0, NULL, 'data.php?menu=CPO&page=listCPO', 'master', 'data', 'y', 'n', 'y'),
(42, 'Lainya', 'Lainnya', 0, NULL, 'data.php?menu=Lainya&page=listLainya', 'master', 'data', 'y', 'n', 'y'),
(43, 'batalKeluarTBS', 'Batal Keluar TBS', 0, NULL, 'contentChack.php?menu=batalKeluarTBS', 'laporan', 'laporan/batalKeluarTBS', 'y', 'n', 'y'),
(44, 'batalKeluarCPO', 'Batal Keluar CPO', 0, NULL, 'contentChack.php?menu=batalKeluarCPO', 'laporan', 'laporan/batalKeluarCPO', 'y', 'n', 'y'),
(45, 'batalKeluarLainya', 'Batal Keluar Lainnya', 0, NULL, 'contentChack.php?menu=batalKeluarLainya', 'laporan', 'laporan/batalKeluarLainya', 'y', 'n', 'y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
