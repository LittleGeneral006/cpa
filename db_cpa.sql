-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 07:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_template_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_child_menu`
--

CREATE TABLE `tb_child_menu` (
  `id_menu` int(11) NOT NULL,
  `kd_menu` int(11) DEFAULT NULL,
  `fry_menu` int(11) DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `nama_view` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `icon_menu` varchar(20) DEFAULT NULL,
  `routes` varchar(50) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_child_menu`
--

INSERT INTO `tb_child_menu` (`id_menu`, `kd_menu`, `fry_menu`, `nama_menu`, `nama_view`, `status`, `icon_menu`, `routes`, `controller`) VALUES
(1, 10, 500, 'Setup User', 'v_user', 'Aktif', '', 'setup-user', 'user'),
(2, 20, 500, 'Setup Level', 'v_level', 'Aktif', '', 'setup-level', 'level'),
(3, 30, 500, 'Setup Menu', 'v_menu', 'Aktif', NULL, 'setup-menu', 'menu'),
(4, 40, 500, 'Setup Otoritas', 'v_otoritas', 'Aktif', '', 'setup-otoritas', 'otoritas'),
(5, 50, 500, 'Setup Web', 'v_pengaturan', 'Aktif', '', 'setup-web', 'pengaturan'),
(6, 60, 20, 'menu anak 2', 'v_anak2', 'Aktif', '', 'anak2', NULL),
(9, 7, 520, 'nama menu 3', 'nama view 3', 'Tidak Aktif', 'icon menu 3', 'routes 3', NULL),
(10, 70, 520, 'Ut quos quisquam in ', 'Consequatur Consequ', 'Tidak Aktif', 'Aperiam sunt fugiat ', 'Aliquam aute cumque ', NULL),
(11, 77, 520, 'Ratione veritatis as', 'Incididunt architect', 'Tidak Aktif', 'Dolor delectus aut ', 'Reiciendis lorem dol', NULL),
(12, 46, 620, 'Nulla dolores qui po', 'Ut repudiandae corpo', 'Tidak Aktif', 'Voluptate officia ve', 'Qui quasi laborum si', 'Ea qui hic dolor lab'),
(13, 621, 620, 'nama child haha', 'v_dashboard_sadd', 'Tidak Aktif', 'fa fa-home', 'dashboard haha', 'menu 123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `kd_level` varchar(50) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `kd_unit_level` varchar(50) NOT NULL,
  `aktif_level` varchar(50) NOT NULL,
  `maker_level` varchar(100) NOT NULL,
  `waktu_maker_level` varchar(50) NOT NULL,
  `kd_unit_maker_level` varchar(50) NOT NULL,
  `updater_level` varchar(100) NOT NULL,
  `waktu_updater_level` varchar(50) NOT NULL,
  `kd_unit_updater_level` varchar(50) NOT NULL,
  `deleter_level` varchar(100) NOT NULL,
  `waktu_deleter_level` varchar(50) NOT NULL,
  `kd_unit_deleter_level` varchar(50) NOT NULL,
  `kd_induk_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `kd_level`, `nama_level`, `kd_unit_level`, `aktif_level`, `maker_level`, `waktu_maker_level`, `kd_unit_maker_level`, `updater_level`, `waktu_updater_level`, `kd_unit_updater_level`, `deleter_level`, `waktu_deleter_level`, `kd_unit_deleter_level`, `kd_induk_level`) VALUES
(11, 'LEVEL20230510141317', 'Administrator', '000', 'Aktif', 'admin', '2023-07-23 04:43:43', '000', '', '', '', '', '', '', '000'),
(16, 'LVL23072023131340', 'Audit', '000', 'Aktif', 'admin', '2023-07-23 13:13:40', '000', 'User Testing', '2023-11-09 09:25:35', '000', '', '', '', '000'),
(17, 'LVL23072023133657', 'Staff KP Umum', '000', 'Aktif', 'admin', '2023-07-23 13:36:57', '000', 'Gusti Abdurrahman Syahril', '2023-11-24 00:00:49', '1301', '', '', '', '000'),
(18, 'LVL23072023133934', 'Admin Umum', '000', 'Aktif', 'admin', '2023-07-23 13:39:34', '000', 'Gusti Abdurrahman Syahril', '2023-11-24 00:00:41', '1301', '', '', '', '000'),
(19, 'LVL23072023134345', 'Koordinator Kredit', '000', 'Aktif', 'admin', '2023-07-23 13:43:45', '000', 'User Testing', '2023-11-09 09:24:59', '000', '', '', '', '000'),
(20, 'LVL23072023135343', 'Admin DOP', '000', 'Aktif', 'admin', '2023-07-23 13:53:43', '000', 'Gusti Abdurrahman Syahril', '2023-11-24 00:00:33', '1301', '', '', '', '000'),
(21, 'LVL18092023101055', 'Kantor Pusat Kredit', '000', 'Aktif', 'admin', '2023-09-18 10:10:55', '000', 'User Testing', '2023-11-09 09:25:22', '000', '', '', '', '000'),
(22, 'LVL09102023151012', 'Staff KP DOP', '000', 'Aktif', 'admin', '2023-10-09 15:10:12', '000', 'User Testing', '2023-11-09 09:22:47', '000', '', '', '', '000'),
(24, 'LVL05112023080341', 'Staff Administrasi dan Umum', '000', 'Aktif', 'User Testing', '2023-11-05 08:03:41', '000', 'User Testing', '2023-11-09 09:27:03', '000', '', '', '', '000'),
(25, 'LVL07112023095721', 'Staff Transaksi Kredit Cabang', '000', 'Aktif', 'User Testing', '2023-11-07 09:57:21', '000', 'User Testing', '2023-11-09 09:23:33', '000', '', '', '', '000'),
(26, 'LVL07112023100547', 'Pemasar Kredit', '000', 'Aktif', 'User Testing', '2023-11-07 10:05:47', '000', 'User Testing', '2023-11-09 09:24:36', '000', '', '', '', '000'),
(27, 'LVL09112023101143', 'Level Default', '000', 'Aktif', 'User Testing', '2023-11-09 10:11:43', '000', 'User Testing', '2023-11-09 10:12:05', '000', '', '', '', '000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `kd_menu` int(11) DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `nama_view` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `icon_menu` varchar(20) DEFAULT NULL,
  `routes` varchar(50) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `kd_menu`, `nama_menu`, `nama_view`, `status`, `icon_menu`, `routes`, `controller`) VALUES
(1, 100, 'Dashboard', 'v_dashboard', 'Aktif', 'fa fa-home', 'dashboard', 'dashboard'),
(2, 500, 'Setup', 'hello view', 'Aktif', 'fa fa-cogs', 'asiyap-routes', NULL),
(3, 510, 'Unit Kerja', 'v_unit_kerja', 'Aktif', 'fa fa-university', 'unit-kerja', 'unit-kerja'),
(4, 400, 'menu tunggal nonaktif', 'v_nonaktif', 'Tidak Aktif', 'fa fa-book', 'routes-nonaktif', NULL),
(5, 200, 'menu parent 500', 'v_parent_500', 'Tidak Aktif', 'fa fa-pencil', 'parent_500', NULL),
(6, 600, 'menu tunggal 600', 'v_tunggal_600', 'Tidak Aktif', 'fa fa-book', 'tunggal_600', NULL),
(7, 520, 'Edit Profil', 'v_profil', 'Aktif', 'fa fa-user', 'edit-profil', 'profil'),
(8, 111, 'nama menu', 'nama view', 'Tidak Aktif', 'fa fa-asiyap', 'bang-jali', NULL),
(9, 69, 'Repudiandae tempora ', 'Veniam enim volupta', 'Tidak Aktif', 'Et quis et provident', 'Incidunt quisquam v', NULL),
(10, 610, 'v_dashboard', 'v_user', 'Aktif', 'fa fa-home', 'dashboard-haha', ''),
(11, 620, 'nama menu', 'v_user_haha', 'Aktif', 'fa fa-home', 'ahahha-njay', 'asiyap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_otoritas`
--

CREATE TABLE `tb_otoritas` (
  `id_otoritas` int(11) NOT NULL,
  `kd_otoritas` int(11) DEFAULT NULL,
  `kd_level` varchar(50) DEFAULT NULL,
  `kd_menu` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_otoritas`
--

INSERT INTO `tb_otoritas` (`id_otoritas`, `kd_otoritas`, `kd_level`, `kd_menu`, `status`) VALUES
(1, 10, 'LEVEL20230510141317', 10, 'Aktif'),
(2, 11, 'LEVEL20230510141317', 500, 'Aktif'),
(3, 12, 'LVL23072023131340', 10, 'Aktif'),
(4, 14, 'LVL23072023131340', 100, 'Aktif'),
(5, 15, 'LEVEL20230510141317', 20, 'Aktif'),
(6, 1, 'LEVEL20230510141317', 100, 'Aktif'),
(7, 13, 'LEVEL20230510141317', 510, 'Aktif'),
(8, 100, 'LEVEL20230510141317', 30, 'Aktif'),
(9, 16, 'LEVEL20230510141317', 40, 'Aktif'),
(10, 17, 'LEVEL20230510141317', 50, 'Aktif'),
(12, 22, 'LVL23072023131340', 510, 'Aktif'),
(13, 23, 'LVL23072023131340', 20, 'Aktif'),
(14, 24, 'LVL23072023131340', 30, 'Tidak Aktif'),
(15, 25, 'LVL23072023131340', 40, 'Aktif'),
(16, 26, 'LVL23072023131340', 50, 'Tidak Aktif'),
(17, 520, 'LEVEL20230510141317', 520, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id` int(11) NOT NULL,
  `singkatan_web` varchar(50) DEFAULT NULL,
  `judul_web` varchar(100) DEFAULT NULL,
  `copyright` varchar(100) DEFAULT NULL,
  `warna_tema` varchar(50) DEFAULT NULL,
  `redirect` varchar(100) DEFAULT NULL,
  `default_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`id`, `singkatan_web`, `judul_web`, `copyright`, `warna_tema`, `redirect`, `default_password`) VALUES
(1, 'TMP', 'Ini Judul Web', 'Copyright Divisi TSI 2023', 'blue-bg', '/template_baru/login', 'Passwordbpd1*');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit_kerja`
--

CREATE TABLE `tb_unit_kerja` (
  `id_unit` int(3) NOT NULL,
  `kd_unit` varchar(4) NOT NULL,
  `kd_induk_unit` varchar(4) DEFAULT NULL,
  `nama_unit` char(60) DEFAULT NULL,
  `alamat_unit` varchar(250) DEFAULT NULL,
  `telpon_unit` varchar(13) DEFAULT NULL,
  `role_unit` varchar(10) NOT NULL DEFAULT 'Cabang',
  `aktif_unit` varchar(50) NOT NULL,
  `maker_unit` varchar(100) NOT NULL,
  `waktu_maker_unit` varchar(50) NOT NULL,
  `kd_unit_maker_unit` varchar(50) NOT NULL,
  `updater_unit` varchar(100) NOT NULL,
  `waktu_updater_unit` varchar(100) NOT NULL,
  `kd_unit_updater_unit` varchar(50) NOT NULL,
  `deleter_unit` varchar(100) NOT NULL,
  `waktu_deleter_unit` varchar(50) NOT NULL,
  `kd_unit_deleter_unit` varchar(50) NOT NULL,
  `kd_cab_unit` varchar(50) NOT NULL,
  `kd_induk_unit2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit_kerja`
--

INSERT INTO `tb_unit_kerja` (`id_unit`, `kd_unit`, `kd_induk_unit`, `nama_unit`, `alamat_unit`, `telpon_unit`, `role_unit`, `aktif_unit`, `maker_unit`, `waktu_maker_unit`, `kd_unit_maker_unit`, `updater_unit`, `waktu_updater_unit`, `kd_unit_updater_unit`, `deleter_unit`, `waktu_deleter_unit`, `kd_unit_deleter_unit`, `kd_cab_unit`, `kd_induk_unit2`) VALUES
(1, '000', '000', 'Kantor Pusat', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(2, '001', '001', 'Cabang Utama', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(3, '002', '002', 'Cabang Barabai', 'Jl. Brigjend. H. Hasan Basri No. 12 Barabai 71311', '051741119\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(4, '003', '003', 'Cabang Kotabaru', 'Jl. H. Agus Salim No. 1 Kotabaru 72113', '051823860\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(5, '004', '004', 'Cabang Amuntai', 'Jl. Norman Umar No. 6 Amuntai 71411', '052761172\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(6, '005', '005', 'Cabang Tanjung', 'Jl. Jend. Sudirman No.54 Tanjung 71513', '052620201014\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(7, '006', '006', 'Cabang Rantau', 'Jl. Brigjend H. Hasan Basri No 2A, Rantau', '051731163\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(8, '007', '007', 'Cabang Pelaihari', 'Jl. Kemakmuran No. 1 Pelaihari 70811', '051221195\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(9, '008', '008', 'Cabang Kandangan', 'Jl. P. Antasari No. 1-2 Kandangan 71211', '051721481\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(10, '009', '009', 'Cabang Martapura', 'Jl. A. Yani Km. 40 Martapura 70614', '05114720283\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(11, '010', '010', 'Cabang Batulicin', 'Jl. Raya Batulicin No. 40 Rt. 01', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(12, '011', '011', 'Cabang Banjarbaru', 'Jl. A. Yani Km. 34', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(13, '012', '012', 'Cabang Marabahan', 'Jl. Basuki Rahmat No. 10', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(14, '013', '013', 'Cabang Paringin', 'Jl. A. Yani No. 3 Rt. 03', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(15, '014', '010', 'Capem Satui', 'Jl. Propinsi Km. 167 Desa Makmur Mulia Kec. Satui Kab. Tanah Bumbu', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(16, '015', '008', 'Capem Nagara', 'Jl. Pelabuhan Desa Tumbukan Banyu Kec. Daha Selatan, Nagara', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(17, '016', '016', 'Cabang A. Yani', 'Jl. A. Yani Km. 3,5 Rt. 02 No. 145', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(18, '017', '010', 'Capem Kayutangi', 'Jl. Brigjend H. Hasan Basry (Kantor Samsat Banjarmasin II)', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(19, '018', '001', 'Capem Banjarmasin Timur', 'Jl. Veteran No. 52 Rt. 23 ', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(20, '019', '001', 'Capem Gambut', 'Jl. A. Yani Km. 14 ', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(21, '020', '001', 'Capem Sentra Antasari', 'Jl. Pangeran Antasari No. 23A Rt. 005 Rw. 001', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(22, '021', '002', 'Capem Murakata', 'Jl. Bhima No. C253 Kel. Barabai Selatan, Kab. HST', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(23, '022', '003', 'Capem Limbur Raya', 'Jl. Putri Ciptasari', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(24, '023', '004', 'Capem Pasar Amuntai', 'Komplek Pasar Amuntai Jl. Abdul Aziz, Amuntai, Kab. HSU', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(25, '024', '005', 'Capem Kelua', 'Jl. A. Yani Rt. 04 Desa Pudak Setegal Kec. Kelua Kab. Tabalong', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(26, '025', '006', 'Capem Binuang', 'Jl. Kesuma Bangsa Rt. 07 Rw. 03 Kel. Birayang Kec. Batang Alai Selatan Kab. HST', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(27, '026', '007', 'Capem Asam-asam', 'Jl. A. Yani Km. 122 Desa Sungai Baru Asam-Asam Kec. Jorong Kab. Tanah Laut', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(28, '027', '010', 'Capem Serongga', 'Jl. Provinsi Km. 294 Rt. 08 Rw. 2 No. 144A Desa Tegalrejo Kec Kelumpang Hilir Kab. Kotabaru', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(29, '028', '010', 'Capem Pagatan', 'Jl. Brigjend H. Hasan Basri Desa Pagaruyung Rt. 02 Kec. Kusan Hilir Kab. Tanah Bumbu', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(30, '029', '010', 'Capem Gunung Tinggi', 'Jl. Dharma Praja No. 1 Desa Gunung Tinggi Kec. Batulicin Kab. Tanah Bumbu', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(31, '030', '001', 'Capem RSUD Ulin', 'Komplek RSUD Ulin Jl. A.Yani Km. 2 No. 43 Banjarmasin 70231', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(32, '031', '001', 'Capem Sultan Adam', 'Komplek Ruko STIHSA Bjm Jl. Pangeran Hidayatullah Banjarmasin', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(33, '032', '001', 'Capem Duta Mall', 'Jl. A.Yani Km. 2 Banjarmasin', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(34, '033', '011', 'Capem Landasan Ulin', 'Komplek Pasar Ulin Raya ', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(35, '034', '011', 'Capem Kantor Gubernur', 'Jl. Dharma Praja No. 1, Komplek Perkantoran Pemprov Kalsel', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(36, '035', '007', 'Capem Pemkab Tala', 'Jl. A. Syairani No. 3 Komplek Perkantoran Gagas, Pelaihari Kab. Tanah Laut', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(37, '036', '005', 'Capem Mabuun', 'Jl. Raya Mabu’un Kec. Murung Pudak Kab. Tabalong', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(38, '037', '001', 'Capem Teluk Dalam', 'Jl. Sutoyo S. No. 59 Rt. 20 Kel. Teluk Dalam Banjarmasin', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(39, '038', '001', 'Capem Dispenda', 'Kantor Dinas Pendapatan Provinsi Kalsel Jl. A.Yani Km. 6 Banjarmasin', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(40, '039', '007', 'Capem Bati-bati', 'Jl. A.Yani Rt. 002 Kec. Bati-Bati Kab. Tanah Laut', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(41, '040', '040', 'Cabang Jakarta', 'Sahid Building Jl. Jenderal Sudirman 86 Rt.04 Jakarta Pusat', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(42, '041', '006', 'Capem Margasari', 'Jl. Raya Margasari Desa Baringin A Kec. Candi Laras Selatan Rt. 01 Rw. 01 Kab. Tapin', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(43, '042', '004', 'Capem Alabio', 'Jl. Berita Rt. 3 No. 26 Alabio Amuntai', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(44, '043', '012', 'Capem Handil Bakti', 'Jl. Trans Kalimantan Handil Bakti Kab. Barito Kuala', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(45, '044', '009', 'Capem Sekumpul', 'Jl. Sekumpul Rt.01 Rw. 03 Sekumpul Kec. Martapura Kab. Banjar', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(46, '045', '010', 'Capem Angsana', 'Jl. Raya Provinsi Km.195 Rt. 10 Desa Karang Indah Kec. Angsana Kab. Tanah Bumbu', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(47, '046', '007', 'Capem Takisung', 'Jl. Jend. Sudirman Rt. 08 Rw. 02 Desa Gunung Makmur Kec. Takisung Kab. Tanah Laut', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(48, '047', '002', 'Capem Birayang', 'Jl. Kesuma Bangsa Rt. 07 Rw. 03 Kel. Birayang Kec. Batang Alai Selatan Kab. HST', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(49, '048', '005', 'Capem Muara Uya', 'Jl. Propinsi Samping Terminal Muara Uya Desa Muara Uya Kec. Muara Uya Kab. Tabalong', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(50, '049', '006', 'Capem Mataraman', 'Jl. A.Yani Km.56 Rt.01 Rw.01 Desa Bawahan Pasar Kec. Mataraman Kab. Banjar', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(51, '050', '003', 'Capem Sengayam', 'Jl. PU Semanggang RT 1 Desa Sengayam Kecamatan Pamukan Barat Kotabaru', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(52, '051', '012', 'Capem Anjir Pasar', 'Desa Anjir Pasar Kota RT 1 RW 2 Kecamatan Anjir Pasar Batola', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(53, '052', '003', 'Capem Lontar', 'Jl. Lontar Utara RT.001 RW.001 Desa Lontar Utara Kecamatan Pulau Laut Barat Kabupaten Kotabaru', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(54, '701', '701', 'HO Cabang Utama', 'Jl. Lambung Mangkurat No.7', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(55, '710', '710', 'HO Cabang Batulicin', 'Jl. Raya Batulicin ', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(56, '740', '740', 'HO Cabang Jakarta', 'Jl. Thamrin', '0\r', 'Cabang', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(57, '1100', '1100', 'Divisi Umum', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(58, '1101', '1100', 'Bagian Pengadaan Aset', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(59, '1102', '1100', 'Bagian Pengelolaan Aset & Pelayanan Umum', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(60, '1103', '1100', 'Bagian Dokumentasi & Kearsipan', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(61, '1200', '1200', 'Divisi Akuntansi & Keuangan', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(62, '1201', '1200', 'Bagian Akuntansi & Perpajakan', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(63, '1202', '1200', 'Bagian Pelaporan Informasi Keuangan', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(64, '1300', '1300', 'Divisi Teknologi Sistem Informasi', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(65, '1301', '1300', 'Bagian Pengembangan Teknologi & Informasi', 'Jl.Lambung Mangkurat No.7', '05113350726', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(66, '1302', '1300', 'Bagian Support Aplikasi & Operasional', '', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(67, '1303', '1300', 'Bagian Infrastruktur & It Security', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(68, '1304', '1300', 'Bagian Quality Assurance', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(69, '1400', '1400', 'Divisi Operasional', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(70, '1401', '1400', 'Bagian Transaksi Operasional', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(71, '1402', '1400', 'Bagian Transaksi Kredit', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(72, '1403', '1400', 'Bagian Customer Care', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(73, '1404', '1400', 'Bagian Rekon & Setlement E-Channel', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(74, '1405', '1400', 'Bagian Sentralisasi Operasional Atm & Kartu', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(75, '1500', '1500', 'Divisi Kredit & Pembiayaan Bermasalah', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(76, '1501', '1500', 'Bagian Penyelamatan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(77, '1502', '1500', 'Bagian Penyelesaian & Disposal', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(78, '1503', '1500', 'Desk Collection', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(79, '1504', '1500', 'Penanganan Hukum Kredit/Pembiayaan Bermasalah', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(80, '1600', '1600', 'Divisi Risiko Kredit & Pasar', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(81, '1601', '1600', 'Risiko Kredit/Pembiayaan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(82, '1602', '1600', 'Pengembangan Risiko', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(83, '1603', '1600', 'Risiko Pasar', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(84, '1700', '1700', 'Divisi Perencanaan Dan Kinerja', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(85, '1701', '1700', 'Bagian Perencanaan Strategis', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(86, '1702', '1700', 'Bagian Manajemen Kinerja', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(87, '1703', '1700', 'Bagian Manajemen Perubahan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(88, '1800', '1800', 'Divisi Internal Audit', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(89, '1801', '1800', 'Bagian Inspeksi 1', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(90, '1802', '1800', 'Bagian Inspeksi 2', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(91, '1803', '1800', 'Bagian Perencanaan & Pengendalian Mutu', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(92, '1804', '1800', 'Bagian Anti Fraud & Investigasi', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(93, '1805', '1800', 'Bagian Audit Teknologi Informasi', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(94, '1900', '1900', 'Divisi Dana & Digital Banking', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(95, '1901', '1900', 'Bagian Dana Institusi', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(96, '1902', '1900', 'Bagian Dana Retail', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(97, '1903', '1900', 'Bagian Digital Banking', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(98, '2000', '2000', 'Divisi Usaha Syariah', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(99, '2001', '2000', 'Bagian Pembiayaan Komersial & Korporasi', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(100, '2002', '2000', 'Bagian Pembiayaan Konsumer', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(101, '2003', '2000', 'Bagian Pembiayaan Umk', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(102, '2004', '2000', 'Bagian Admin, Legal & Pengelolaan Data', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(103, '2005', '2000', 'Bagian Dana & Kelembagaan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(104, '2006', '2000', 'Bagian Digital Banking Syariah', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(105, '2100', '2100', 'Divisi Sekretaris Perusahaan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(106, '2101', '2100', 'Bagian Keberlanjutan Usaha & Penanganan Hukum Perusahaan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(107, '2102', '2100', 'Corporate & Marketing Communication', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(108, '2103', '2100', 'Kesekretariatan & Keprotokolan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(109, '2200', '2200', 'Divisi Manajemen Risiko & Kepatuhan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(110, '2201', '2200', 'Bagian Manajemen Risiko', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(111, '2202', '2200', 'Bagian Kepatuhan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(112, '2203', '2200', 'Bagian Apu & Ppt', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(113, '2300', '2300', 'Divisi Human Capital', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(114, '2301', '2300', 'Bagian Penerimaan & Pengembangan Human Capital', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(115, '2302', '2300', 'Bagian Pendidikan & Pelatihan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(116, '2303', '2300', 'Bagian Kompensasi & Manfaat', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(117, '2400', '2400', 'Divisi Jaringan & Pelayanan Cabang', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(118, '2401', '2400', 'Bagian Kualitas Pelayanan Cabang', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(119, '2402', '2400', 'Bagian Pengembangan Jaringan & Kinerja Cabang', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(120, '2500', '2500', 'Divisi Komersial & Korporasi', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(121, '2501', '2500', 'Bagian Komersial', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(122, '2502', '2500', 'Bagian Korporasi', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(123, '2503', '2500', 'Support Komersial Dan Korporat', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(124, '2504', '2500', 'Relation Manager', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(125, '2600', '2600', 'Divisi Konsumer', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(126, '2601', '2600', 'Bagian Konsumer', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(127, '2602', '2600', 'Bagian B2B Konsumer', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(128, '2603', '2600', 'Bagian Support Konsumer', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(129, '2700', '2700', 'Divisi Treasury', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(130, '2701', '2700', 'Bagian Trading & Dealing Room', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(131, '2702', '2700', 'Bagian Likuiditas & Alma', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(132, '2703', '2700', 'Financial Institution & Pengembangan', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(133, '2704', '2700', 'Fungsional Treasury', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(134, '2800', '2800', 'Divisi Ultra Mikro Kecil', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(135, '2801', '2800', 'Bagian Bisnis Umk', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(136, '2802', '2800', 'Bagian Support Umk', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(137, '2803', '2800', 'Bagian B2B Program & Apex', 'Jl.Lambung Mangkurat No.7', '05113350726\r', 'Pusat', 'Aktif', 'admin', '2023-07-12 16:33:50', '000', '', '', '', '', '', '', '000', '000'),
(141, '1978', '007', 'unit testing', 'jl. abc ada lima', '8768678', 'Cabang', 'Aktif', 'admin', '2023-09-18 09:17:23', '000', 'admin', '2023-09-18 09:17:54', '000', '', '', '', '000', '000'),
(144, '901', '901', 'CABANG SYARIAH BANJARMASIN', 'Kota Banjarmasin', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:03:04', '000', 'User Testing', '2023-11-09 09:04:34', '000', '', '', '', '000', '000'),
(145, '902', '902', 'Cabang Syariah Kandangan', 'Kandangan', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:05:55', '000', 'User Testing', '2023-11-09 09:06:16', '000', '', '', '', '000', '000'),
(146, '903', '903', 'Capem Syariah Batulicin', 'Batulicin', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:07:17', '000', 'User Testing', '2023-11-09 09:07:49', '000', '', '', '', '000', '000'),
(147, '904', '901', 'Kedai Syariah Q mall', '0', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:09:09', '000', '', '', '', '', '', '', '000', '000'),
(148, '921', '000', 'Kantor Fungsional Syariah Jakarta', '0', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:10:20', '000', '', '', '', '', '', '', '000', '000'),
(149, '931', '901', 'Kedai Syariah Gatot', 'Jl. Gatot Subroto', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:11:35', '000', '', '', '', '', '', '', '000', '000'),
(150, '932', '901', 'Kedai Syariah Kayutangi', 'Kota Banjarmasin', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:12:28', '000', '', '', '', '', '', '', '000', '000'),
(151, '933', '902', 'Kedai Syariah Amuntai', 'Amuntai', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:13:16', '000', '', '', '', '', '', '', '000', '000'),
(152, '934', '901', 'Kedai Syariah Martapura', 'Martapura', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:13:58', '000', '', '', '', '', '', '', '000', '000'),
(153, '935', '902', 'Kedai Syariah Paringin', '0', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:14:37', '000', '', '', '', '', '', '', '000', '000'),
(154, '936', '902', 'Kedai Syariah Barabai', '0', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:15:18', '000', '', '', '', '', '', '', '000', '000'),
(155, '937', '901', 'Kedai Syariah Pelaihari', '0', '0', 'Cabang', 'Aktif', 'User Testing', '2023-11-09 09:15:55', '000', '', '', '', '', '', '', '000', '000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `kd_user` varchar(100) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `kd_unit_user` varchar(50) NOT NULL,
  `kd_level_user` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `aktif_user` varchar(10) NOT NULL,
  `counter_blokir` varchar(50) NOT NULL DEFAULT '3',
  `last_login_user` varchar(50) NOT NULL,
  `sha_user` varchar(200) NOT NULL,
  `nama_foto` varchar(100) NOT NULL,
  `jabatan_user` varchar(100) NOT NULL,
  `maker_user` varchar(100) NOT NULL,
  `waktu_maker_user` varchar(50) NOT NULL,
  `kd_unit_maker_user` varchar(10) NOT NULL,
  `updater_user` varchar(100) NOT NULL,
  `waktu_updater_user` varchar(50) NOT NULL,
  `kd_unit_updater_user` varchar(50) NOT NULL,
  `deleter_user` varchar(100) NOT NULL,
  `waktu_deleter_user` varchar(50) NOT NULL,
  `kd_unit_deleter_user` varchar(50) NOT NULL,
  `nopeg_user` varchar(100) NOT NULL,
  `divisi_user` varchar(100) NOT NULL,
  `kd_unit_user2` varchar(50) NOT NULL,
  `kd_induk_user` varchar(50) NOT NULL,
  `konsolidasi_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `kd_user`, `username_user`, `password_user`, `kd_unit_user`, `kd_level_user`, `nama_user`, `aktif_user`, `counter_blokir`, `last_login_user`, `sha_user`, `nama_foto`, `jabatan_user`, `maker_user`, `waktu_maker_user`, `kd_unit_maker_user`, `updater_user`, `waktu_updater_user`, `kd_unit_updater_user`, `deleter_user`, `waktu_deleter_user`, `kd_unit_deleter_user`, `nopeg_user`, `divisi_user`, `kd_unit_user2`, `kd_induk_user`, `konsolidasi_user`) VALUES
(1, 'USER020231109112649', 'admin', '$2y$10$5f2T22hWP8JGnVvfUERF2O/nfY79Xf3kKWT6qtPpGGEF9G9JTNbki', '000', 'LEVEL20230510141317', 'administrator', 'Tidak', '0', '2023-12-31 12:24:51', 'fa8d2317c155c09661b3388dc4239bc87f93fa94', '', '', 'admin', '2023-10-26 08:56:25', '000', 'administrator', '2023-11-09 13:55:07', '000', '', '', '', '', '', '000', '000', '1'),
(2, 'USER120231109112649', 'admin-dak', '$2y$10$pQQeSzwmxAHo6qI6MhRlbOK4DHL8rtuA8BByoo42C5LfTUe1IGrq6', '000', 'LEVEL20230510141317', 'admin dak', 'Tidak', '0', '2023-12-21 06:36:57', '8f122a42279abd59ce21534383be8546c8d41926', '', '', 'admin', '2023-10-26 08:56:25', '000', 'admin dak', '2023-12-21 14:34:25', '000', '', '', '', '', '', '000', '000', '1'),
(3, 'USER220231109112649', 'admin-umum', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '000', 'LEVEL20230510141317', 'admin umum', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', '', '', '', '', '', '', '', '', '000', '000', '1'),
(4, 'USER320231109112649', '00439', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL23072023135343', 'Maya Novita Sari', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:15:02', '000', '', '', '', '', '', '1402', '1400', '3'),
(5, 'USER420231109112649', '00305', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Helda Septiana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:15:32', '000', '', '', '', '', '', '1402', '1400', '3'),
(6, 'USER520231109112649', '00479', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Saikun', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:15:50', '000', '', '', '', '', '', '1402', '1400', '3'),
(7, 'USER620231109112649', '00467', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Sari Hariyati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:16:17', '000', '', '', '', '', '', '1402', '1400', '3'),
(8, 'USER720231109112649', '01743', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Atika Thoria', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:16:38', '000', '', '', '', '', '', '1402', '1400', '3'),
(9, 'USER820231109112649', '01402', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Renny Indah Pratiwi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:16:54', '000', '', '', '', '', '', '1402', '1400', '3'),
(10, 'USER920231109112649', '01522', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Mohammad Rizaldy Akbar', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:17:12', '000', '', '', '', '', '', '1402', '1400', '3'),
(11, 'USER1020231109112649', '01423', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Arif Hidayat', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:17:32', '000', '', '', '', '', '', '1402', '1400', '3'),
(12, 'USER1120231109112649', '00973', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL23072023135343', 'Achmad Riady', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:17:52', '000', '', '', '', '', '', '1402', '1400', '3'),
(13, 'USER1220231109112649', '01413', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL23072023135343', 'Aditya Dwian', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:18:18', '000', '', '', '', '', '', '1402', '1400', '3'),
(14, 'USER1320231109112649', '01363', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Akhmad Fahriza', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:25:33', '000', '', '', '', '', '', '1402', '1400', '3'),
(15, 'USER1420231109112649', '01451', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Muhammad Afriza Hasany', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:25:50', '000', '', '', '', '', '', '1402', '1400', '3'),
(16, 'USER1520231109112649', '00144', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Eka Fatmawati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:26:11', '000', '', '', '', '', '', '1402', '1400', '3'),
(17, 'USER1620231109112649', '01731', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Ridha Ameilia Saputri', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:26:39', '000', '', '', '', '', '', '1402', '1400', '3'),
(18, 'USER1720231109112649', '01087', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Fina Amalia Hayati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:26:56', '000', '', '', '', '', '', '1402', '1400', '3'),
(19, 'USER1820231109112649', '01718', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Surya Eka Wardana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:27:12', '000', '', '', '', '', '', '1402', '1400', '3'),
(20, 'USER1920231109112649', '01096', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Muhammad Wandi Syahbana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:27:31', '000', '', '', '', '', '', '1402', '1400', '3'),
(21, 'USER2020231109112649', '01288', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Ade Sandy Setiawan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:27:50', '000', '', '', '', '', '', '1402', '1400', '3'),
(22, 'USER2120231109112649', '01820', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1402', 'LVL09102023151012', 'Adelia Rimadhina', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:28:18', '000', '', '', '', '', '', '1402', '1400', '3'),
(23, 'USER2220231109112649', '00394', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1100', 'LVL23072023133934', 'Teguh Marsudi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', '', '', '', '', '', '', '', '', '1100', '1100', '3'),
(24, 'USER2320231109112649', '00081', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Ayatullah Hasbi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:07:19', '000', '', '', '', '', '', '1101', '1100', '3'),
(25, 'USER2420231109112649', '00796', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Sigit Priyambodo', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:07:38', '000', '', '', '', '', '', '1101', '1100', '3'),
(26, 'USER2520231109112649', '01020', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Muhamad Eko Iswandi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:07:58', '000', '', '', '', '', '', '1101', '1100', '3'),
(27, 'USER2620231109112649', '01162', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Fajar Ramadhani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:08:21', '000', '', '', '', '', '', '1101', '1100', '3'),
(28, 'USER2720231109112649', '00998', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Rahmadi Adha', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:08:44', '000', '', '', '', '', '', '1101', '1100', '3'),
(29, 'USER2820231109112649', '01387', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Muhamad Fardan Aula', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:09:02', '000', '', '', '', '', '', '1101', '1100', '3'),
(30, 'USER2920231109112649', '00114', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1101', 'LVL23072023133657', 'Abdul Basid', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:09:23', '000', '', '', '', '', '', '1101', '1100', '3'),
(31, 'USER3020231109112649', '00561', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Slamet', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:10:02', '000', '', '', '', '', '', '1102', '1100', '3'),
(32, 'USER3120231109112649', '00400', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133934', 'Rakhmad Rayan Noor', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:10:29', '000', '', '', '', '', '', '1102', '1100', '3'),
(33, 'USER3220231109112649', '00750', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Gusti Muhammad Reddy Kardian', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:10:56', '000', '', '', '', '', '', '1102', '1100', '3'),
(34, 'USER3320231109112649', '00084', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Amrullah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:11:18', '000', '', '', '', '', '', '1102', '1100', '3'),
(35, 'USER3420231109112649', '00623', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Yudi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:11:35', '000', '', '', '', '', '', '1102', '1100', '3'),
(36, 'USER3520231109112649', '00556', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Fachrul', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:11:52', '000', '', '', '', '', '', '1102', '1100', '3'),
(37, 'USER3620231109112649', '00575', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Mohammad Andy Priatmadja', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:12:13', '000', '', '', '', '', '', '1102', '1100', '3'),
(38, 'USER3720231109112649', '00122', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'M Riduan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:12:36', '000', '', '', '', '', '', '1102', '1100', '3'),
(39, 'USER3820231109112649', '00792', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Rahmatullah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:13:01', '000', '', '', '', '', '', '1102', '1100', '3'),
(40, 'USER3920231109112649', '00609', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1102', 'LVL23072023133657', 'Tofik Hartono', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:13:29', '000', '', '', '', '', '', '1102', '1100', '3'),
(41, 'USER4020231109112649', '00217', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1103', 'LVL23072023133657', 'Noor Ipansyah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:13:52', '000', '', '', '', '', '', '1103', '1100', '3'),
(42, 'USER4120231109112649', '00189', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1103', 'LVL23072023133657', 'Rizki Yulia', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:14:23', '000', '', '', '', '', '', '1103', '1100', '3'),
(43, 'USER4220231109112649', '01257', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Muhammad Endy Ferdhian', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 10:58:03', '000', '', '', '', '', '', '001', '001', '3'),
(44, 'USER4320231109112649', '00915', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'M Nugraha Adiputra Basri', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 10:58:35', '000', '', '', '', '', '', '001', '001', '3'),
(45, 'USER4420231109112649', '00047', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Barkiyah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 10:58:56', '000', '', '', '', '', '', '001', '001', '3'),
(46, 'USER4520231109112649', '01373', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '020', 'LVL07112023095721', 'Dina Aulia Damayanti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:50:20', '000', '', '', '', '', '', '020', '001', '3'),
(47, 'USER4620231109112649', '01125', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '018', 'LVL07112023095721', 'Muhammad Abdi Rahman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:49:43', '000', '', '', '', '', '', '018', '001', '3'),
(48, 'USER4720231109112649', '01143', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '019', 'LVL07112023095721', 'Sofia Dhika Octaviany', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:50:03', '000', '', '', '', '', '', '019', '001', '3'),
(49, 'USER4820231109112649', '00812', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '031', 'LVL07112023095721', 'Auliya Mulkiwati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:58:11', '000', '', '', '', '', '', '031', '001', '3'),
(50, 'USER4920231109112649', '00951', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '037', 'LVL07112023095721', 'Nadiya Novilia', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:00:15', '000', '', '', '', '', '', '037', '001', '3'),
(51, 'USER5020231109112649', '00662', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Siti Aisyah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:28:57', '000', '', '', '', '', '', '009', '009', '3'),
(52, 'USER5120231109112649', '00363', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Ade Suzie Widyastuti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:36:22', '000', '', '', '', '', '', '009', '009', '3'),
(53, 'USER5220231109112649', '00898', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '044', 'LVL07112023095721', 'Tri Sagita Fahliana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:04:16', '000', '', '', '', '', '', '044', '009', '3'),
(54, 'USER5320231109112649', '01135', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '040', 'LVL07112023095721', 'Ratih Permata Ayu', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:01:21', '000', '', '', '', '', '', '040', '040', '3'),
(55, 'USER5420231109112649', '00039', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '040', 'LVL07112023095721', 'Arifah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:01:36', '000', '', '', '', '', '', '040', '040', '3'),
(56, 'USER5520231109112649', '01775', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '040', 'LVL07112023095721', 'Wymas Wimandanu', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:02:14', '000', '', '', '', '', '', '040', '040', '3'),
(57, 'USER5620231109112649', '00708', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '007', 'LVL07112023095721', 'Erlina', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:23:08', '000', '', '', '', '', '', '007', '007', '3'),
(58, 'USER5720231109112649', '00617', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '007', 'LVL07112023095721', 'Siti Nor Latifah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:23:31', '000', '', '', '', '', '', '007', '007', '3'),
(59, 'USER5820231109112649', '00309', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '026', 'LVL07112023095721', 'Milawati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:56:29', '000', '', '', '', '', '', '026', '007', '3'),
(60, 'USER5920231109112649', '00706', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '039', 'LVL07112023095721', 'Dina Wahyuningsih', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:01:05', '000', '', '', '', '', '', '039', '007', '3'),
(61, 'USER6020231109112649', '00300', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '046', 'LVL07112023095721', 'Rosida Badriana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:05:07', '000', '', '', '', '', '', '046', '007', '3'),
(62, 'USER6120231109112649', '01502', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Akhmad Fajar Sofyan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:39:35', '000', '', '', '', '', '', '010', '010', '3'),
(63, 'USER6220231109112649', '01646', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Isfa Nur Amalia Zulkifli', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:39:49', '000', '', '', '', '', '', '010', '010', '3'),
(64, 'USER6320231109112649', '00630', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Noraida Hayati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:40:05', '000', '', '', '', '', '', '010', '010', '3'),
(65, 'USER6420231109112649', '01492', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '027', 'LVL07112023095721', 'Wimpi Aditama', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:56:49', '000', '', '', '', '', '', '027', '010', '3'),
(66, 'USER6520231109112649', '01460', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '028', 'LVL07112023095721', 'Muhammad Nurhadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:57:05', '000', '', '', '', '', '', '028', '010', '3'),
(67, 'USER6620231109112649', '01382', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '045', 'LVL07112023095721', 'Hery Aprianto', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:04:30', '000', '', '', '', '', '', '045', '010', '3'),
(68, 'USER6720231109112649', '00266', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '003', 'LVL07112023095721', 'Amaliah Haq', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:08:35', '000', '', '', '', '', '', '003', '003', '3'),
(69, 'USER6820231109112649', '01098', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '003', 'LVL07112023095721', 'Pebrian Hidayat', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:11:00', '000', '', '', '', '', '', '003', '003', '3'),
(70, 'USER6920231109112649', '00871', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '050', 'LVL07112023095721', 'Mustafa Ramadhan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:05:38', '000', '', '', '', '', '', '050', '003', '3'),
(71, 'USER7020231109112649', '01330', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '052', 'LVL07112023095721', 'Muhammad Fahrianor', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:06:34', '000', '', '', '', '', '', '052', '003', '3'),
(72, 'USER7120231109112649', '01534', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'Selvy Novitasari', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:03:12', '000', '', '', '', '', '', '002', '002', '3'),
(73, 'USER7220231109112649', '00564', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'M Ansyari', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:03:54', '000', '', '', '', '', '', '002', '002', '3'),
(74, 'USER7320231109112649', '01022', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'Muhammad Taufik Rahman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:04:20', '000', '', '', '', '', '', '002', '002', '3'),
(75, 'USER7420231109112649', '01127', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '021', 'LVL07112023095721', 'Muhammad Fikri Zulpi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:50:43', '000', '', '', '', '', '', '021', '002', '3'),
(76, 'USER7520231109112649', '00462', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '047', 'LVL07112023095721', 'Aulia Puspita', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:05:20', '000', '', '', '', '', '', '047', '002', '3'),
(77, 'USER7620231109112649', '01199', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '011', 'LVL07112023095721', 'Alnadia', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:41:47', '000', '', '', '', '', '', '011', '011', '3'),
(78, 'USER7720231109112649', '01515', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '011', 'LVL07112023095721', 'Ghina Arih Juliani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:42:01', '000', '', '', '', '', '', '011', '011', '3'),
(79, 'USER7820231109112649', '01384', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '011', 'LVL07112023095721', 'Lulu Afifah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:42:14', '000', '', '', '', '', '', '011', '011', '3'),
(80, 'USER7920231109112649', '01206', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '033', 'LVL07112023095721', 'Dalena Novianti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:58:57', '000', '', '', '', '', '', '033', '011', '3'),
(81, 'USER8020231109112649', '01448', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '005', 'LVL07112023095721', 'Maulana Sidik', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:18:27', '000', '', '', '', '', '', '005', '005', '3'),
(82, 'USER8120231109112649', '00875', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '005', 'LVL07112023095721', 'Norlatifah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:18:43', '000', '', '', '', '', '', '005', '005', '3'),
(83, 'USER8220231109112649', '00826', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '024', 'LVL07112023095721', 'Meity Atinna Nurfyanti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:55:51', '000', '', '', '', '', '', '024', '005', '3'),
(84, 'USER8320231109112649', '01482', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '036', 'LVL07112023095721', 'Sekar Sae Khoirunnisa', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:00:00', '000', '', '', '', '', '', '036', '005', '3'),
(85, 'USER8420231109112649', '01403', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '004', 'LVL07112023095721', 'Reza Noor', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:15:11', '000', '', '', '', '', '', '004', '004', '3'),
(86, 'USER8520231109112649', '01468', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '004', 'LVL07112023095721', 'Nor Kumala', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:15:31', '000', '', '', '', '', '', '004', '004', '3'),
(87, 'USER8620231109112649', '01706', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '004', 'LVL07112023095721', 'Rohmattia Yolina Ningrum', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:15:59', '000', '', '', '', '', '', '004', '004', '3'),
(88, 'USER8720231109112649', '01265', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '023', 'LVL07112023095721', 'Rini Wardila', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:50:59', '000', '', '', '', '', '', '023', '004', '3'),
(89, 'USER8820231109112649', '01543', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '042', 'LVL07112023095721', 'Irena Sri Lestari Sumarna', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:03:52', '000', '', '', '', '', '', '042', '004', '3'),
(90, 'USER8920231109112649', '01673', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '006', 'LVL07112023095721', 'Muhammad Paloma Dion Tjahjadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:20:47', '000', '', '', '', '', '', '006', '006', '3'),
(91, 'USER9020231109112649', '00408', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '006', 'LVL07112023095721', 'Dewi Rabiatul Hikmah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:21:07', '000', '', '', '', '', '', '006', '006', '3'),
(92, 'USER9120231109112649', '01444', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '006', 'LVL07112023095721', 'M Arief Rahmatullah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:22:02', '000', '', '', '', '', '', '006', '006', '3'),
(93, 'USER9220231109112649', '00416', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '025', 'LVL07112023095721', 'Dina Mega Sari', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:56:12', '000', '', '', '', '', '', '025', '006', '3'),
(94, 'USER9320231109112649', '01429', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '041', 'LVL07112023095721', 'Fahmie', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:03:14', '000', '', '', '', '', '', '041', '006', '3'),
(95, 'USER9420231109112649', '00245', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '016', 'LVL07112023095721', 'Yulia Risnani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:47:19', '000', '', '', '', '', '', '016', '016', '3'),
(96, 'USER9520231109112649', '00333', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '016', 'LVL07112023095721', 'Aisyah Turidha', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:47:40', '000', '', '', '', '', '', '016', '016', '3'),
(97, 'USER9620231109112649', '01344', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '008', 'LVL07112023095721', 'Putra Kembar Ridhayat', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:26:54', '000', '', '', '', '', '', '008', '008', '3'),
(98, 'USER9720231109112649', '00955', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '008', 'LVL07112023095721', 'Yuliana Farida', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:27:24', '000', '', '', '', '', '', '008', '008', '3'),
(99, 'USER9820231109112649', '00118', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '008', 'LVL07112023095721', 'Kemas A Maulana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:27:58', '000', '', '', '', '', '', '008', '008', '3'),
(100, 'USER9920231109112649', '01493', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '012', 'LVL07112023095721', 'Winda Yuliana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:43:28', '000', '', '', '', '', '', '012', '012', '3'),
(101, 'USER10020231109112649', '00979', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '012', 'LVL07112023095721', 'Ariati Kharda', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:43:42', '000', '', '', '', '', '', '012', '012', '3'),
(102, 'USER10120231109112649', '01713', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '012', 'LVL07112023095721', 'Siska Hardiyanti Putri', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:43:59', '000', '', '', '', '', '', '012', '012', '3'),
(103, 'USER10220231109112649', '01434', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '043', 'LVL07112023095721', 'Handy Prianto Utoyo', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:04:04', '000', '', '', '', '', '', '043', '012', '3'),
(104, 'USER10320231109112649', '01605', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '051', 'LVL07112023095721', 'Ramadhan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:06:00', '000', '', '', '', '', '', '051', '012', '3'),
(105, 'USER10420231109112649', '01726', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '013', 'LVL07112023095721', 'Yudi Ramadhani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:44:58', '000', '', '', '', '', '', '013', '013', '3'),
(106, 'USER10520231109112649', '01445', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '013', 'LVL07112023095721', 'M Noor Alifullah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:45:21', '000', '', '', '', '', '', '013', '013', '3'),
(107, 'USER10620231109112649', '00983', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '014', 'LVL07112023095721', 'Ferry Indriani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:46:02', '000', '', '', '', '', '', '014', '010', '3'),
(108, 'USER10720231109112649', '00321', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '014', 'LVL07112023095721', 'Alwaidi Mahdani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:46:21', '000', '', '', '', '', '', '014', '010', '3'),
(109, 'USER10820231109112649', '01422', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '015', 'LVL07112023095721', 'Arief Anjari', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:46:38', '000', '', '', '', '', '', '015', '008', '3'),
(110, 'USER10920231109112649', '00768', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '017', 'LVL07112023095721', 'Munawarah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:48:53', '000', '', '', '', '', '', '017', '010', '3'),
(111, 'USER11020231109112649', '01464', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '017', 'LVL07112023095721', 'Mustika Mayang', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:49:12', '000', '', '', '', '', '', '017', '010', '3'),
(112, 'USER11120231109112649', '01742', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '029', 'LVL07112023095721', 'Monikariski Indrayani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:57:21', '000', '', '', '', '', '', '029', '010', '3'),
(113, 'USER11220231109112649', '01633', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '029', 'LVL07112023095721', 'Dea Fitri Febriyanti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:57:36', '000', '', '', '', '', '', '029', '010', '3'),
(114, 'USER11320231109112649', '01566', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '030', 'LVL07112023095721', 'Dieky Marantika', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:57:52', '000', '', '', '', '', '', '030', '001', '3'),
(115, 'USER11420231109112649', '00641', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '032', 'LVL07112023095721', 'Novie Karina K', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:58:28', '000', '', '', '', '', '', '032', '001', '3'),
(116, 'USER11520231109112649', '01120', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '032', 'LVL07112023095721', 'Juhairiah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:58:43', '000', '', '', '', '', '', '032', '001', '3'),
(117, 'USER11620231109112649', '00944', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '034', 'LVL07112023095721', 'Heida Julianda', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:59:13', '000', '', '', '', '', '', '034', '011', '3'),
(118, 'USER11720231109112649', '01421', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '035', 'LVL07112023095721', 'Apriani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:59:28', '000', '', '', '', '', '', '035', '007', '3'),
(119, 'USER11820231109112649', '00858', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '038', 'LVL07112023095721', 'Fathonah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:00:30', '000', '', '', '', '', '', '038', '001', '3'),
(120, 'USER11920231109112649', '00848', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '038', 'LVL07112023095721', 'Agung Kuncoro', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:00:45', '000', '', '', '', '', '', '038', '001', '3'),
(121, 'USER12020231109112649', '00390', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '901', 'LVL07112023095721', 'Rina Marlina', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:49:55', '000', '', '', '', '', '', '901', '901', '3'),
(122, 'USER12120231109112649', '00148', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '901', 'LVL07112023095721', 'Ruspawati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:50:17', '000', '', '', '', '', '', '901', '901', '3'),
(123, 'USER12220231109112649', '00801', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '901', 'LVL07112023095721', 'Septia Risa Savitri', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:50:41', '000', '', '', '', '', '', '901', '901', '3'),
(124, 'USER12320231109112649', '00440', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '932', 'LVL07112023095721', 'Dina Soufhiana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:54:44', '000', '', '', '', '', '', '932', '901', '3'),
(125, 'USER12420231109112649', '00736', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '931', 'LVL07112023095721', 'Kurnia Puji Astuty', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:54:26', '000', '', '', '', '', '', '931', '901', '3'),
(126, 'USER12520231109112649', '00606', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '934', 'LVL07112023095721', 'Dino Wijaya', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:55:19', '000', '', '', '', '', '', '934', '901', '3'),
(127, 'USER12620231109112649', '01760', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '937', 'LVL07112023095721', 'Muhammad Noor Abdillah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:56:21', '000', '', '', '', '', '', '937', '901', '3'),
(128, 'USER12720231109112649', '01684', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '902', 'LVL07112023095721', 'Nor Annisa', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:51:40', '000', '', '', '', '', '', '902', '902', '3'),
(129, 'USER12820231109112649', '01284', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '902', 'LVL07112023095721', 'A Syarif Hidayatullah', 'Tidak', '0', '2023-11-09 13:53:39', 'cc6e1e8d1426ae084ac3385a2b89fc507c61600a', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:52:13', '000', '', '', '', '', '', '902', '902', '3'),
(130, 'USER12920231109112649', '00648', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '933', 'LVL07112023095721', 'Juwita Ekawati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:55:03', '000', '', '', '', '', '', '933', '902', '3'),
(131, 'USER13020231109112649', '01171', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '935', 'LVL07112023095721', 'M Isa Firdaus', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:55:39', '000', '', '', '', '', '', '935', '902', '3'),
(132, 'USER13120231109112649', '01449', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '936', 'LVL07112023095721', 'Melinda Aprilia Hayati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:55:56', '000', '', '', '', '', '', '936', '902', '3'),
(133, 'USER13220231109112649', '01488', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '903', 'LVL07112023095721', 'Tria Puspita Ningsih', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:53:03', '000', '', '', '', '', '', '903', '903', '3'),
(134, 'USER13320231109112649', '01075', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '904', 'LVL07112023095721', 'Yulia Erlyta', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:53:29', '000', '', '', '', '', '', '904', '901', '3'),
(135, 'USER13420231109112649', '01774', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '904', 'LVL07112023095721', 'Ahmad Raynaldi Saputra', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:53:51', '000', '', '', '', '', '', '904', '901', '3'),
(136, 'USER13520231109112649', '00612', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Iis Halimatus Sakdiah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 10:59:31', '000', '', '', '', '', '', '001', '001', '3'),
(137, 'USER13620231109112649', '00856', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Edi Santoso', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 10:59:53', '000', '', '', '', '', '', '001', '001', '3'),
(138, 'USER13720231109112649', '00857', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Evi Damayanti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:00:49', '000', '', '', '', '', '', '001', '001', '3'),
(139, 'USER13820231109112649', '00326', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Titrin Rahayu', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:36:40', '000', '', '', '', '', '', '009', '009', '3'),
(140, 'USER13920231109112649', '00409', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Akhmad Yulizar Solikhin', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:37:34', '000', '', '', '', '', '', '009', '009', '3'),
(141, 'USER14020231109112649', '01089', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Iskandar Zulkarnaen', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:37:57', '000', '', '', '', '', '', '009', '009', '3'),
(142, 'USER14120231109112649', '00738', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Ahyani Bulkis', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:38:24', '000', '', '', '', '', '', '009', '009', '3'),
(143, 'USER14220231109112649', '00096', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '007', 'LVL07112023095721', 'Dwi Darnida Yendranoto', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:23:51', '000', '', '', '', '', '', '007', '007', '3'),
(144, 'USER14320231109112649', '00311', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '007', 'LVL07112023095721', 'A Rosidi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:25:46', '000', '', '', '', '', '', '007', '007', '3'),
(145, 'USER14420231109112649', '01327', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Mariani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:40:21', '000', '', '', '', '', '', '010', '010', '3'),
(146, 'USER14520231109112649', '00956', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Windi Astuti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:40:38', '000', '', '', '', '', '', '010', '010', '3'),
(147, 'USER14620231109112649', '00721', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Ahmad Suriani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:40:55', '000', '', '', '', '', '', '010', '010', '3'),
(148, 'USER14720231109112649', '01659', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '003', 'LVL07112023095721', 'M Azmi Sofyan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:11:40', '000', '', '', '', '', '', '003', '003', '3'),
(149, 'USER14820231109112649', '01748 ', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '003', 'LVL07112023095721', 'Rizky Muliadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:13:34', '000', '', '', '', '', '', '003', '003', '3'),
(150, 'USER14920231109112649', '00497', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'Irwan Haryadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:05:36', '000', '', '', '', '', '', '002', '002', '3'),
(151, 'USER15020231109112649', '00492', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'Fajeriansyah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:06:00', '000', '', '', '', '', '', '002', '002', '3'),
(152, 'USER15120231109112649', '00337', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '011', 'LVL07112023095721', 'Abdul Sahid', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:42:35', '000', '', '', '', '', '', '011', '011', '3'),
(153, 'USER15220231109112649', '01436', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '005', 'LVL07112023095721', 'Indri Lusi Jayanti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:19:01', '000', '', '', '', '', '', '005', '005', '3'),
(154, 'USER15320231109112649', '00535', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '005', 'LVL07112023095721', 'Supian Hadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:19:19', '000', '', '', '', '', '', '005', '005', '3'),
(155, 'USER15420231109112649', '00089', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '004', 'LVL07112023095721', 'Adi Dharma', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:16:21', '000', '', '', '', '', '', '004', '004', '3'),
(156, 'USER15520231109112649', '00803', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '016', 'LVL07112023095721', 'Erni Budiaprianti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:47:58', '000', '', '', '', '', '', '016', '016', '3'),
(157, 'USER15620231109112649', '00146', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '015', 'LVL07112023095721', 'Junaidi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:46:58', '000', '', '', '', '', '', '015', '008', '3'),
(158, 'USER15720231109112649', '00289', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '035', 'LVL07112023095721', 'Sunarto', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 12:59:41', '000', '', '', '', '', '', '035', '007', '3'),
(159, 'USER15820231109112649', '00129', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '921', 'LVL07112023095721', 'Widiyatmoko', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:54:10', '000', '', '', '', '', '', '921', '000', '3'),
(160, 'USER15920231109112649', '01443', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '902', 'LVL07112023095721', 'Lyta Herawati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:52:28', '000', '', '', '', '', '', '902', '902', '3'),
(161, 'USER16020231109112649', '01079', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Aries Alfian', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:01:22', '000', '', '', '', '', '', '001', '001', '3'),
(162, 'USER16120231109112649', '01035', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'Asri Rahmadani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:01:50', '000', '', '', '', '', '', '001', '001', '3'),
(163, 'USER16220231109112649', '01074', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Syafrin Rahmatullah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:38:51', '000', '', '', '', '', '', '009', '009', '3'),
(164, 'USER16320231109112649', '01376', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Eko Hadi Setiawan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:41:09', '000', '', '', '', '', '', '010', '010', '3');
INSERT INTO `tb_user` (`id_user`, `kd_user`, `username_user`, `password_user`, `kd_unit_user`, `kd_level_user`, `nama_user`, `aktif_user`, `counter_blokir`, `last_login_user`, `sha_user`, `nama_foto`, `jabatan_user`, `maker_user`, `waktu_maker_user`, `kd_unit_maker_user`, `updater_user`, `waktu_updater_user`, `kd_unit_updater_user`, `deleter_user`, `waktu_deleter_user`, `kd_unit_deleter_user`, `nopeg_user`, `divisi_user`, `kd_unit_user2`, `kd_induk_user`, `konsolidasi_user`) VALUES
(165, 'USER16420231109112649', '00970', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '040', 'LVL07112023095721', 'Desita Arni', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:02:33', '000', '', '', '', '', '', '040', '040', '3'),
(166, 'USER16520231109112649', '01498', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '003', 'LVL07112023095721', 'Zulkifli', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:14:06', '000', '', '', '', '', '', '003', '003', '3'),
(167, 'USER16620231109112649', '01129', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '007', 'LVL07112023095721', 'Muhammad Ridho Hasibuan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:26:03', '000', '', '', '', '', '', '007', '007', '3'),
(168, 'USER16720231109112649', '01524', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'Muhammad Nor', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:06:29', '000', '', '', '', '', '', '002', '002', '3'),
(169, 'USER16820231109112649', '01585', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '011', 'LVL07112023095721', 'Suryadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:42:51', '000', '', '', '', '', '', '011', '011', '3'),
(170, 'USER16920231109112649', '01442', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '005', 'LVL07112023095721', 'Lyli Sekar Wati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:19:36', '000', '', '', '', '', '', '005', '005', '3'),
(171, 'USER17020231109112649', '00752', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '004', 'LVL07112023095721', 'Deddie Admoko', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:16:52', '000', '', '', '', '', '', '004', '004', '3'),
(172, 'USER17120231109112649', '01539', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '006', 'LVL07112023095721', 'Tri Rahmad Mordiono', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:22:26', '000', '', '', '', '', '', '006', '006', '3'),
(173, 'USER17220231109112649', '00986', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '016', 'LVL07112023095721', 'Heny Damayanti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:48:22', '000', '', '', '', '', '', '016', '016', '3'),
(174, 'USER17320231109112649', '01487', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '008', 'LVL07112023095721', 'Syifa Salima', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:28:14', '000', '', '', '', '', '', '008', '008', '3'),
(175, 'USER17420231109112649', '01433', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '012', 'LVL07112023095721', 'Gusti Sahirul Imam', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:44:16', '000', '', '', '', '', '', '012', '012', '3'),
(176, 'USER17520231109112649', '01191', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '013', 'LVL07112023095721', 'Wahyu Saputra', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:45:35', '000', '', '', '', '', '', '013', '013', '3'),
(177, 'USER17620231109112649', '01667', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '901', 'LVL07112023095721', 'Mohammad Ziandra Riefhano', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:51:09', '000', '', '', '', '', '', '901', '901', '3'),
(178, 'USER17720231109112649', '01440', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '902', 'LVL07112023095721', 'Lidyawati', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:52:44', '000', '', '', '', '', '', '902', '902', '3'),
(179, 'USER17820231109112649', '00576', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '001', 'LVL07112023095721', 'M Yulian Meirad', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:02:41', '000', '', '', '', '', '', '001', '001', '3'),
(180, 'USER17920231109112649', '00328', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '009', 'LVL07112023095721', 'Dwi Puji Astuti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:39:16', '000', '', '', '', '', '', '009', '009', '3'),
(181, 'USER18020231109112649', '01064', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '010', 'LVL07112023095721', 'Muhammad Harfin Idiar', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:41:32', '000', '', '', '', '', '', '010', '010', '3'),
(182, 'USER18120231109112649', '00647', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '040', 'LVL07112023095721', 'Ichsan Rahadian', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:02:47', '000', '', '', '', '', '', '040', '040', '3'),
(183, 'USER18220231109112649', '00882', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '003', 'LVL07112023095721', 'Yulianisa', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:14:29', '000', '', '', '', '', '', '003', '003', '3'),
(184, 'USER18320231109112649', '00605', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '007', 'LVL07112023095721', 'M Sevri Virza Iskomala', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:26:28', '000', '', '', '', '', '', '007', '007', '3'),
(185, 'USER18420231109112649', '00438', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '002', 'LVL07112023095721', 'Early Hifzatun Nisa', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:07:34', '000', '', '', '', '', '', '002', '002', '3'),
(186, 'USER18520231109112649', '00591', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '011', 'LVL07112023095721', 'Muhammad Firdaus', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:43:13', '000', '', '', '', '', '', '011', '011', '3'),
(187, 'USER18620231109112649', '00820', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '005', 'LVL07112023095721', 'Hierry Hendriyanto', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:19:55', '000', '', '', '', '', '', '005', '005', '3'),
(188, 'USER18720231109112649', '00495', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '004', 'LVL07112023095721', 'Dini Fitria R', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:17:11', '000', '', '', '', '', '', '004', '004', '3'),
(189, 'USER18820231109112649', '01118', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '006', 'LVL07112023095721', 'Hendra Wijaya', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:22:49', '000', '', '', '', '', '', '006', '006', '3'),
(190, 'USER18920231109112649', '00204', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '016', 'LVL07112023095721', 'Herlyn Silviyeni', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:48:37', '000', '', '', '', '', '', '016', '016', '3'),
(191, 'USER19020231109112649', '01012', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '008', 'LVL07112023095721', 'Deni', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:28:34', '000', '', '', '', '', '', '008', '008', '3'),
(192, 'USER19120231109112649', '00924', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '012', 'LVL07112023095721', 'Reza Putra Kurnia', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:44:36', '000', '', '', '', '', '', '012', '012', '3'),
(193, 'USER19220231109112649', '00829', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '013', 'LVL07112023095721', 'Muhammad Khairuddin', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 11:45:48', '000', '', '', '', '', '', '013', '013', '3'),
(194, 'USER19320231109112649', '00106', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2500', 'LVL23072023134345', 'Izhar', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:38:37', '000', '', '', '', '', '', '2500', '2500', '3'),
(195, 'USER19420231109112649', '00252', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2502', 'LVL18092023101055', 'Muhammad Hasan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:41:40', '000', '', '', '', '', '', '2502', '2500', '3'),
(196, 'USER19520231109112649', '00437', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2502', 'LVL18092023101055', 'Muliyadi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:41:58', '000', '', '', '', '', '', '2502', '2500', '3'),
(197, 'USER19620231109112649', '00863', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2502', 'LVL18092023101055', 'Jaka Wardana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:42:28', '000', '', '', '', '', '', '2502', '2500', '3'),
(198, 'USER19720231109112649', '01249', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2502', 'LVL18092023101055', 'Irfan Fathurrohman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:42:44', '000', '', '', '', '', '', '2502', '2500', '3'),
(199, 'USER19820231109112649', '01115', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2502', 'LVL18092023101055', 'Gusti Aditya Rachman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:43:09', '000', '', '', '', '', '', '2502', '2500', '3'),
(200, 'USER19920231109112649', '00989', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2502', 'LVL18092023101055', 'Maisarah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:43:36', '000', '', '', '', '', '', '2502', '2500', '3'),
(201, 'USER20020231109112649', '00723', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2504', 'LVL18092023101055', 'Beny Irawan Prajoko', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:48:03', '000', '', '', '', '', '', '2504', '2500', '3'),
(202, 'USER20120231109112649', '01275', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2504', 'LVL18092023101055', 'Ridwan Syafmeinan Mtg', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:48:22', '000', '', '', '', '', '', '2504', '2500', '3'),
(203, 'USER20220231109112649', '00210', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2504', 'LVL18092023101055', 'Reza Pahlevi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:48:43', '000', '', '', '', '', '', '2504', '2500', '3'),
(204, 'USER20320231109112649', '00746', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2504', 'LVL18092023101055', 'Hafiz Noor Miswari', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:49:16', '000', '', '', '', '', '', '2504', '2500', '3'),
(205, 'USER20420231109112649', '00945', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2501', 'LVL18092023101055', 'Imam Ludfi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:39:49', '000', '', '', '', '', '', '2501', '2500', '3'),
(206, 'USER20520231109112649', '01224', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2501', 'LVL18092023101055', 'Muhammad Rizqo Ridho I', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:40:14', '000', '', '', '', '', '', '2501', '2500', '3'),
(207, 'USER20620231109112649', '00603', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2501', 'LVL18092023101055', 'Muhammad Alwi Rahman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:40:38', '000', '', '', '', '', '', '2501', '2500', '3'),
(208, 'USER20720231109112649', '00793', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2501', 'LVL18092023101055', 'Ramdi Murdana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:40:56', '000', '', '', '', '', '', '2501', '2500', '3'),
(209, 'USER20820231109112649', '01114', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2501', 'LVL18092023101055', 'Gt Rendy Pramana', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:41:22', '000', '', '', '', '', '', '2501', '2500', '3'),
(210, 'USER20920231109112649', '00650', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Yugo Trianto', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:43:56', '000', '', '', '', '', '', '2503', '2500', '3'),
(211, 'USER21020231109112649', '00205', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Zweirina Abdiani', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:44:27', '000', '', '', '', '', '', '2503', '2500', '3'),
(212, 'USER21120231109112649', '00727', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Romy Herwanda', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:44:43', '000', '', '', '', '', '', '2503', '2500', '3'),
(213, 'USER21220231109112649', '00860', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Harry Aulia Rahman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:45:10', '000', '', '', '', '', '', '2503', '2500', '3'),
(214, 'USER21320231109112649', '00779', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Lukman Al Hakim', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:45:30', '000', '', '', '', '', '', '2503', '2500', '3'),
(215, 'USER21420231109112649', '01506', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Amalia Rizky Septiany', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:46:05', '000', '', '', '', '', '', '2503', '2500', '3'),
(216, 'USER21520231109112649', '01296', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Annisa Amelia', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:46:20', '000', '', '', '', '', '', '2503', '2500', '3'),
(217, 'USER21620231109112649', '01584', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Muhammad Noor Fajeri', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:47:04', '000', '', '', '', '', '', '2503', '2500', '3'),
(218, 'USER21720231109112649', '00942', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '2503', 'LVL18092023101055', 'Erizka Famia Renata', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:47:46', '000', '', '', '', '', '', '2503', '2500', '3'),
(219, 'USER21820231109112649', '00198', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1500', 'LVL18092023101055', 'Nordin', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:28:38', '000', '', '', '', '', '', '1500', '1500', '3'),
(220, 'USER21920231109112649', '00393', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1502', 'LVL18092023101055', 'Didi Ferdinansyah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:31:06', '000', '', '', '', '', '', '1502', '1500', '3'),
(221, 'USER22020231109112649', '00745', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1502', 'LVL18092023101055', 'Dimas Arif Andi Wibowo', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:31:23', '000', '', '', '', '', '', '1502', '1500', '3'),
(222, 'USER22120231109112649', '00280', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1502', 'LVL18092023101055', 'Yunita', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:31:38', '000', '', '', '', '', '', '1502', '1500', '3'),
(223, 'USER22220231109112649', '01258', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1502', 'LVL18092023101055', 'Muhammad Syafrial', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:31:55', '000', '', '', '', '', '', '1502', '1500', '3'),
(224, 'USER22320231109112649', '01018', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1502', 'LVL18092023101055', 'Lukman Nool Hakim', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:32:16', '000', '', '', '', '', '', '1502', '1500', '3'),
(225, 'USER22420231109112649', '00279', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1501', 'LVL18092023101055', 'Rabbiyanur Fahmi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:29:21', '000', '', '', '', '', '', '1501', '1500', '3'),
(226, 'USER22520231109112649', '00839', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1501', 'LVL18092023101055', 'Rendra Saputra', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:29:43', '000', '', '', '', '', '', '1501', '1500', '3'),
(227, 'USER22620231109112649', '00921', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1501', 'LVL18092023101055', 'Muhammad Haris Fadillah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:30:01', '000', '', '', '', '', '', '1501', '1500', '3'),
(228, 'USER22720231109112649', '00808', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1501', 'LVL18092023101055', 'Akhmad Gazali', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:30:23', '000', '', '', '', '', '', '1501', '1500', '3'),
(229, 'USER22820231109112649', '01741', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1501', 'LVL18092023101055', 'Cynthia Della Aprillisfianti', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:30:47', '000', '', '', '', '', '', '1501', '1500', '3'),
(230, 'USER22920231109112649', '00108', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1800', 'LVL23072023131340', 'Teguh Sutriono', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:32:36', '000', '', '', '', '', '', '1800', '1800', '3'),
(231, 'USER23020231109112649', '00034', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1804', 'LVL23072023131340', 'Arif Hamda Rahman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:37:24', '000', '', '', '', '', '', '1804', '1800', '3'),
(232, 'USER23120231109112649', '00412', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1804', 'LVL23072023131340', 'Helmi Bayu Prasetyo', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:37:43', '000', '', '', '', '', '', '1804', '1800', '3'),
(233, 'USER23220231109112649', '00905', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1804', 'LVL23072023131340', 'Akhmad Wiryawan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:38:16', '000', '', '', '', '', '', '1804', '1800', '3'),
(234, 'USER23320231109112649', '00152', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1801', 'LVL23072023131340', 'Widhas Raditya', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:32:59', '000', '', '', '', '', '', '1801', '1800', '3'),
(235, 'USER23420231109112649', '00273', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1801', 'LVL23072023131340', 'Adi Saputra', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:33:18', '000', '', '', '', '', '', '1801', '1800', '3'),
(236, 'USER23520231109112649', '00651', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1801', 'LVL23072023131340', 'Rusiansyah', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:33:38', '000', '', '', '', '', '', '1801', '1800', '3'),
(237, 'USER23620231109112649', '00904', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1801', 'LVL23072023131340', 'Akhmad Syauqi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:33:55', '000', '', '', '', '', '', '1801', '1800', '3'),
(238, 'USER23720231109112649', '00402', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1802', 'LVL23072023131340', 'Ahmad Mardian Umar', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:34:26', '000', '', '', '', '', '', '1802', '1800', '3'),
(239, 'USER23820231109112649', '00795', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1802', 'LVL23072023131340', 'Riza Haris Rahman', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:34:50', '000', '', '', '', '', '', '1802', '1800', '3'),
(240, 'USER23920231109112649', '00067', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1802', 'LVL23072023131340', 'Yanuar Fauzan', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:35:16', '000', '', '', '', '', '', '1802', '1800', '3'),
(241, 'USER24020231109112649', '00941', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1802', 'LVL23072023131340', 'Donny Agra Prawira', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:35:37', '000', '', '', '', '', '', '1802', '1800', '3'),
(242, 'USER24120231109112649', '00645', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1803', 'LVL23072023131340', 'Budi Khairin', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:35:53', '000', '', '', '', '', '', '1803', '1800', '3'),
(243, 'USER24220231109112649', '00807', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1803', 'LVL23072023131340', 'Akhmad Faisal Akbar', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:36:07', '000', '', '', '', '', '', '1803', '1800', '3'),
(244, 'USER24320231109112649', '00010', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1803', 'LVL23072023131340', 'Deasy Silvia Melani ED', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:36:32', '000', '', '', '', '', '', '1803', '1800', '3'),
(245, 'USER24420231109112649', '01379', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '1803', 'LVL23072023131340', 'Gt Suci Dian Saputri', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', 'Admin TSI', '2023-12-14 13:37:08', '000', '', '', '', '', '', '1803', '1800', '3'),
(246, 'USER11092023135640', '12345', '$2y$10$0aJlN9eOuvBAlwa9mDmiq.je8vMWUUJ2YgDHjZOPKwCNOcv8AOIRK', '000', 'LEVEL20230510141317', 'Admin TSI', 'Tidak', '0', '2023-12-19 11:58:28', 'bc18d291d2bcfef8e8213dc2cc44a5f7134b039d', '', '', 'administrator', '2023-11-09 13:56:40', '000', 'Admin TSI', '2023-11-10 07:35:25', '000', '', '', '', '', '', '000', '000', '1'),
(247, 'USER11102023153228', '01790', '$2y$10$O.e5ZQFsYQXDmgTigeoHuetijnoDOuwwBx2Gg4MSU5gxKp1iuvYOy', '1301', 'LEVEL20230510141317', 'Gusti Abdurrahman Syahril', 'Tidak', '0', '2024-01-15 13:48:44', '57604adcc7359b10fa68dd42bd3e699cefc913a5', '', '', 'Admin TSI', '2023-11-10 15:32:28', '000', 'Gusti Abdurrahman Syahril', '2024-01-05 11:52:28', '1301', '', '', '', '', '', '000', '1300', '1'),
(248, 'USER11102023163358', 'admin-dop', '$2y$10$c8l8g.quOt4tjmWO8HF5fuqUuQ0sfTdUyYDo4kLFpJoZOfr0o2y8u', '000', 'LVL23072023135343', 'admin div operasional', 'Tidak', '0', '', '', '', '', 'Gusti Abdurrahman Syahril', '2023-11-10 16:33:58', '1301', 'Gusti Abdurrahman Syahril', '2023-11-10 16:34:27', '1301', '', '', '', '', '', '1301', '000', '1'),
(249, 'USER24962031109112649', 'admin-tsi', '$2y$10$nBKC5LyREM7reSzBHivn6uE.R3aG5GCDuDLH3pM4CKV0gO5HeLstq', '000', 'LEVEL20230510141317', 'admin tsi', 'Tidak', '0', '', '', '', '', 'admin', '2023-10-26 08:56:25', '000', '', '', '', '', '', '', '', '', '000', '000', '1'),
(250, 'USERS40020231215114441', 'MASTER', '$2y$10$KTJsQDVOvd3OVtbzBDWIZ.D4WtUTyrrKAwwHydPfMSD7PfNDRfcOu', '000', 'LVL09112023101143', 'MASTER', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '000', '', '', '', '', '', '', '', '', '000', '000', '3'),
(251, 'USERS40120231215114442', 'TSI', '$2y$10$NZkV.osslrpNVRfhQP5JfeODcUDsw3f80sIoYrI5/G8pCxI.NmODm', '000', 'LVL09112023101143', 'TSI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '000', '', '', '', '', '', '', '', '', '000', '000', '3'),
(252, 'USERS40220231215114442', 'TSI-CAB', '$2y$10$xHSmc1AaJVaNsP7nVikCX.ovyuBWGeFbi1RuiVOMtx8UbXLFK39rK', '001', 'LVL09112023101143', 'TSI-CAB', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '001', '', '', '', '', '', '', '', '', '001', '001', '3'),
(253, 'USERS40320231215114442', '01091', '$2y$10$7uvMtMTW2h8b0hndGeKhDe/n18JN82Lbdw59/1i28XVoOHEytLN9S', '000', 'LVL09112023101143', 'M ARIS ZULKARNAIN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '000', '', '', '', '', '', '', '', '', '000', '000', '3'),
(254, 'USERS42220231215114445', '01076', '$2y$10$iGyBfiHs9.FLpidDJOwbGeBDZdlSQ8Q6h0hHvIxZZBE87JVGTUorC', '001', 'LVL09112023101143', 'AHMAD FAUZAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '001', '', '', '', '', '', '', '', '', '001', '001', '3'),
(255, 'USERS43320231215114447', '01255', '$2y$10$xNAfd42mcJZc.Hs2rWKUkuZS.qYAm0Kqn6DN49JgeFZjlJ7hGs65u', '015', 'LVL09112023101143', 'MUHAMMAD ALKAUTSAR ANSHARI', 'Tidak', '0', '', '', '', '', 'ARIF HIDAYAT', '2023-11-20 08:21:53', '015', '', '', '', '', '', '', '', '', '015', '008', '3'),
(256, 'USERS45020231215114450', '00629', '$2y$10$D7z4v0/TT9EG4NBPeLhn.OwiIhni19ynqoX4AQ.fLaZ7PUcXJTFuW', '003', 'LVL09112023101143', 'NOOR FADHILAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '003', '', '', '', '', '', '', '', '', '003', '003', '3'),
(257, 'USERS45120231215114450', '00585', '$2y$10$7.eHgsLtBYQMqNhXKQPDvun4rM2Z.BueE8kdX75Gnq8bhvWQatmyC', '003', 'LVL09112023101143', 'HERLINA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '003', '', '', '', '', '', '', '', '', '003', '003', '3'),
(258, 'USERS46620231215114453', '00749', '$2y$10$O1/IEWXC3EXy/SivZ6B8LenfHx7ZQJ8vxKGt33V77h5m81obWnuzG', '005', 'LVL09112023101143', 'FITRIYADI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '005', '', '', '', '', '', '', '', '', '005', '005', '3'),
(259, 'USERS49920231215114459', '00463', '$2y$10$no38PFJfxepax6edpdIQEOapr8MRyoGWAEdgO8/6nOptmO2pnmspi', '034', 'LVL09112023101143', 'ANIS CHOLIDAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '034', '', '', '', '', '', '', '', '', '034', '011', '3'),
(260, 'USERS50320231215114459', '00107', '$2y$10$wTiRVPP92.dG2k9Z75nXGOMshncSpUDA4YHGuy0eDUaCJHaNqdN9q', '001', 'LVL09112023101143', 'FIRMANSYAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '001', '', '', '', '', '', '', '', '', '001', '001', '3'),
(261, 'USERS50420231215114459', '00380', '$2y$10$prwh9cRfKIhrPsuLpAZFhuIrY01zzSIIkcd8XM6raxMhe3v3.GFFO', '002', 'LVL09112023101143', 'MUHAINI ACHYAR', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '002', '', '', '', '', '', '', '', '', '002', '002', '3'),
(262, 'USERS50520231215114500', '00232', '$2y$10$DwnyjRclvuBvjNWx9j2UTukog59LDOVs3Y01CakN9tzBNFLmGLxsy', '003', 'LVL09112023101143', 'SAMSIR HASYIM', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '003', '', '', '', '', '', '', '', '', '003', '003', '3'),
(263, 'USERS50620231215114500', '01410', '$2y$10$sMWtXUXLI5z32XQbSirrfuC7Q4bqRDgXIg9ofGULoWeXbqeZFvE56', '004', 'LVL09112023101143', 'ALY RIZQAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '004', '', '', '', '', '', '', '', '', '004', '004', '3'),
(264, 'USERS50720231215114500', '00590', '$2y$10$Y.m/uj9RzKJwit8gSnlGP.ut2oQMtn5vlsQLWAcQcafIDNzKyW0yC', '005', 'LVL09112023101143', 'KHUZAIMI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '005', '', '', '', '', '', '', '', '', '005', '005', '3'),
(265, 'USERS50820231215114500', '00401', '$2y$10$dwuikkDE0NeKx7z8VyjCH.JNjODKzP1EosrfXSy/9UH1DJY4CiQ1O', '006', 'LVL09112023101143', 'HERLINAWATI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '006', '', '', '', '', '', '', '', '', '006', '006', '3'),
(266, 'USERS50920231215114501', '00350', '$2y$10$JWCjk4Q4L17J05mOlBPFSOo68dn.VoXAWmqGHshfc61T7O1UiWH5e', '007', 'LVL09112023101143', 'IWAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '007', '', '', '', '', '', '', '', '', '007', '007', '3'),
(267, 'USERS51020231215114501', '00208', '$2y$10$XtwhUSe0fd9QqWDAtX6z..YGUSjTi9Bee7VnMlLLdX1s7WlHc/A8O', '007', 'LVL09112023101143', 'MUHAMMAD HANAFIAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '007', '', '', '', '', '', '', '', '', '007', '007', '3'),
(268, 'USERS51120231215114501', '00562', '$2y$10$pdg2v4SND29nZjfSbCdG8OEXslIsZ2ApcEyerquGp4EUOLZQSnxTi', '008', 'LVL09112023101143', 'MUHAMMAD LOUTHFI RAHMANY', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '008', '', '', '', '', '', '', '', '', '008', '008', '3'),
(269, 'USERS51220231215114501', '00195', '$2y$10$Qcb1kSbnjYlrM3NMD29lL.zKkVDHnAW2DGEmdPU5TlrTnbEjOJ2Pa', '009', 'LVL09112023101143', 'AKHMAD FAUZI NOOR', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '009', '', '', '', '', '', '', '', '', '009', '009', '3'),
(270, 'USERS51320231215114501', '00017', '$2y$10$TAa7ZTHfmLxh9ihN96Ngf.xnAi2si6Us4UzypBG/PgRC1LKEz4Y4i', '010', 'LVL09112023101143', 'AZIS NURHAKIM', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '010', '', '', '', '', '', '', '', '', '010', '010', '3'),
(271, 'USERS51420231215114502', '00296', '$2y$10$Qc/wXKfCg1tKfZhduDdy4.XglRjgaPPkwb97i0Rf4TiX9qQOMGobC', '011', 'LVL09112023101143', 'KHAIRUNNISA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '011', '', '', '', '', '', '', '', '', '011', '011', '3'),
(272, 'USERS51520231215114502', '00027', '$2y$10$mUfCa0KR7AItiNchE6nH7.InOTwbpx8g6KQc.hsuzB8PpNm4K2AqW', '012', 'LVL09112023101143', 'MUHAMMAD YAMIN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '012', '', '', '', '', '', '', '', '', '012', '012', '3'),
(273, 'USERS51620231215114502', '00371', '$2y$10$aUHyqhK/AuAcxHjFl4ZSX.SPmGqp2IGEc8Ht7oIPq68Bry4cNNqxa', '013', 'LVL09112023101143', 'AGUS SETIAWAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '013', '', '', '', '', '', '', '', '', '013', '013', '3'),
(274, 'USERS51720231215114502', '00063', '$2y$10$Jy0qjcDI5V1Thiw8/e.S0u.oorrAH7qzxHwE5mmBjET/J8Fg7T/nq', '016', 'LVL09112023101143', 'SHISKA AYU KRESNA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '016', '', '', '', '', '', '', '', '', '016', '016', '3'),
(275, 'USERS51820231215114503', '00028', '$2y$10$EL88kUzeA6Ox6/u.GTbPf.ztuoUGauGSGuTK245sME4DBmbmm3zei', '040', 'LVL09112023101143', 'ANDHY ANDRIYAWAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '040', '', '', '', '', '', '', '', '', '040', '040', '3'),
(276, 'USERS51920231215114503', '00571', '$2y$10$xM4NxR2FwakDFiAj6g5da.b3tkllUOZ.5GSWHGwO/K0XViCf2wN32', '014', 'LVL09112023101143', 'HARIS FADILLAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '014', '', '', '', '', '', '', '', '', '014', '010', '3'),
(277, 'USERS52020231215114503', '01618', '$2y$10$fKDA6mPZBn7UJDR8HuQ0B.2VK5UMEbwqbjxdalXEixb3.ESERYvLi', '015', 'LVL09112023101143', 'DARU PRATAMA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '015', '', '', '', '', '', '', '', '', '015', '008', '3'),
(278, 'USERS52120231215114503', '00218', '$2y$10$V1ZMxazHTCo6SdYfXZ7vKuaRPEaVahwX1retoPLBX7jt/fkp8c5oq', '017', 'LVL09112023101143', 'SURIADI SYAMSURI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '017', '', '', '', '', '', '', '', '', '017', '010', '3'),
(279, 'USERS52220231215114503', '00484', '$2y$10$6A.ElAm1xZkZj64DYW57Ee0T9bt/XwVMaHsgr1XNYAQ3Lkna4/yhO', '018', 'LVL09112023101143', 'DARMILAWATI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '018', '', '', '', '', '', '', '', '', '018', '001', '3'),
(280, 'USERS52320231215114504', '00744', '$2y$10$VjWMxiswKPTQKZAQv9yFEeSCvM.3Dm6cPwx6pg/RlIlnq9b8rKkHC', '019', 'LVL09112023101143', 'AHMAD NOOR SAFWAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '019', '', '', '', '', '', '', '', '', '019', '001', '3'),
(281, 'USERS52420231215114504', '00494', '$2y$10$uxw9/7/Z0LEEiZ/XS0xnn.lGV.rq64qll0qf4M8Lgawp9iQZc1PYy', '020', 'LVL09112023101143', 'AKHMAD BAIHAKI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '020', '', '', '', '', '', '', '', '', '020', '001', '3'),
(282, 'USERS52520231215114504', '00454', '$2y$10$mCMfj0yTAgzxotYqJSb.vOom6E4qeaLEizSS7mPJMkTi2ObM0oKJS', '021', 'LVL09112023101143', 'NORSALIMAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '021', '', '', '', '', '', '', '', '', '021', '002', '3'),
(283, 'USERS52620231215114504', '00532', '$2y$10$UhcNQvyuWx0rJ4ukJWlu/.0rgOSzKXmZVTkGGJWSVI0FQsda65LWW', '024', 'LVL09112023101143', 'BOBY HERMAWAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '024', '', '', '', '', '', '', '', '', '024', '005', '3'),
(284, 'USERS52720231215114505', '00411', '$2y$10$CkSyRLyyfKuqSmgARzsAJeQEX3iyyxX1pw7FecDX4bDLszVd/aSgS', '025', 'LVL09112023101143', 'RIZA FARIDIE', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '025', '', '', '', '', '', '', '', '', '025', '006', '3'),
(285, 'USERS52820231215114505', '01097', '$2y$10$WV9pElVxsimmol4UbuyA4etXOeBE4r0ThqrT023DRHq/dFLPCc8oa', '026', 'LVL09112023101143', 'NOOR IHSAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '026', '', '', '', '', '', '', '', '', '026', '007', '3'),
(286, 'USERS52920231215114505', '00756', '$2y$10$8.IWrc1kGOxzdNm0gtHCcehk1wKGcTSjzRJQGGGzOd.MIalOobReK', '027', 'LVL09112023101143', 'FERRY DEVI YULIASTANTO', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '027', '', '', '', '', '', '', '', '', '027', '010', '3'),
(287, 'USERS53020231215114505', '00707', '$2y$10$L4ZDMyHyDguuw/l/Zp/dR.zR43lJ1QWFk3nldrD5V.qJPClUJz1ae', '028', 'LVL09112023101143', 'NINA ALFINA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '028', '', '', '', '', '', '', '', '', '028', '010', '3'),
(288, 'USERS53120231215114505', '00304', '$2y$10$rZ/y3H/c8O.O7YkD/0wAxOkb40iVQaYhDuOjOEufAN5nqFlQ8H.ta', '029', 'LVL09112023101143', 'BUDI RAHMAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '029', '', '', '', '', '', '', '', '', '029', '010', '3'),
(289, 'USERS53220231215114506', '00030', '$2y$10$ytX0bnOJEceQJLwq2sIo3eGF.P2V94gfEccKt8EVs/GmmGUUdTC9.', '030', 'LVL09112023101143', 'DIAN YULLY PURBASARI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '030', '', '', '', '', '', '', '', '', '030', '001', '3'),
(290, 'USERS53320231215114506', '00578', '$2y$10$xKzWjjxBqVeWLbRCrkeyjewKYYpBkVEIvo0TrDsDtdbmV9vQMHy/m', '031', 'LVL09112023101143', 'AHMAD MAULANA HAMIDULLAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '031', '', '', '', '', '', '', '', '', '031', '001', '3'),
(291, 'USERS53420231215114506', '00522', '$2y$10$wSBYo/cY/tod4ADdoZ9zceYhD/rt08YAaH8U4D62i/qScZq3FHdBe', '032', 'LVL09112023101143', 'MUHAMMAD FIRMANSYAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '032', '', '', '', '', '', '', '', '', '032', '001', '3'),
(292, 'USERS53520231215114506', '00325', '$2y$10$vmNJ0bGj2xFv4m2B7/4dMO4tFmf1WMkR5dYRe0U9ZF6rs6NZoM7Am', '033', 'LVL09112023101143', 'NUR ARNIDA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '033', '', '', '', '', '', '', '', '', '033', '011', '3'),
(293, 'USERS53620231215114507', '00580', '$2y$10$Xnyb4oji3qwQbrOAvfyUkuHV/QU7pRNm76BoYUURtp9jpDIJYpA3u', '034', 'LVL09112023101143', 'ANANG RIFANI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '034', '', '', '', '', '', '', '', '', '034', '011', '3'),
(294, 'USERS53720231215114507', '00549', '$2y$10$Ndua3fgZrP4odgplYyF65OO6yb698IKrdqoO.39QCangRh7aL6mNK', '036', 'LVL09112023101143', 'AHRINA MAULIDIYA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '036', '', '', '', '', '', '', '', '', '036', '005', '3'),
(295, 'USERS53820231215114507', '00741', '$2y$10$1u.10GGQfFebXrfjIn6AeO6tMrW68Y6BhfGoefso3J9O5UHD.3CJO', '037', 'LVL09112023101143', 'DARMADIANSYAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '037', '', '', '', '', '', '', '', '', '037', '001', '3'),
(296, 'USERS53920231215114507', '00596', '$2y$10$0krrw56s5TeSBGga0BNesejLD1LGm7nMCmD0QI7iD093LCbhyy9aC', '038', 'LVL09112023101143', 'SOFYAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '038', '', '', '', '', '', '', '', '', '038', '001', '3'),
(297, 'USERS54020231215114507', '00587', '$2y$10$QLIzzA4TUp.dQuYVeY6SAutG5Dvm49AnkQEagn58Y3jqbfsUMswL2', '039', 'LVL09112023101143', 'HERU DWIMOYO', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '039', '', '', '', '', '', '', '', '', '039', '007', '3'),
(298, 'USERS54120231215114508', '01003', '$2y$10$ddPBv9QZ7.f14JSzaVcT7.IJT53.vb.2mD2IDowgr1vSfPy51Y0D2', '041', 'LVL09112023101143', 'YAYAN ERYANDI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '041', '', '', '', '', '', '', '', '', '041', '006', '3'),
(299, 'USERS54220231215114508', '00806', '$2y$10$bDCBza6XqB9KxKt/nwDp0.fTkbdRmAGvgiva71BzKV8kA5rimVeuK', '042', 'LVL09112023101143', 'AHMAD HAMDANIE', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '042', '', '', '', '', '', '', '', '', '042', '004', '3'),
(300, 'USERS54320231215114508', '00098', '$2y$10$QdvVT7SDGhchoQo4UjCUnO6499PARI88MliZbezoU/e7Xduowionu', '043', 'LVL09112023101143', 'ABDUL MUKMIN RAMDHANI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '043', '', '', '', '', '', '', '', '', '043', '012', '3'),
(301, 'USERS54420231215114508', '00357', '$2y$10$aENtaqRtnWt3phnGNlKIrebKbsviGDvQl8tJMb5glhne3LBnqpdKK', '044', 'LVL09112023101143', 'INDAH EKANITA A', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '044', '', '', '', '', '', '', '', '', '044', '009', '3'),
(302, 'USERS54520231215114508', '00811', '$2y$10$sr2trNr3yOowSRhWP8AmuuXLTH4pht0o9ZFptMihUs1oYQxFLfyoW', '045', 'LVL09112023101143', 'ASRUL SANI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '045', '', '', '', '', '', '', '', '', '045', '010', '3'),
(303, 'USERS54620231215114509', '00318', '$2y$10$2.4li5/WLx56T5plfeezyOrPiC4l80hxmjLBibR1lRr1R8e1DRe9a', '046', 'LVL09112023101143', 'DEMY DJAM\'ATIAH', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '046', '', '', '', '', '', '', '', '', '046', '007', '3'),
(304, 'USERS54720231215114509', '00455', '$2y$10$eRTd1e.o1kVPjs0iUx.y1.kSRR8ymV6FINn2R6R2UatOxDcb8oN6q', '047', 'LVL09112023101143', 'MUHAMMAD RAYMOND YASIR', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '047', '', '', '', '', '', '', '', '', '047', '002', '3'),
(305, 'USERS54820231215114509', '00817', '$2y$10$SZyBqxIUxRX/Iq.ioCil1ez0R0H637mrX8heGhcOsvjTUf2PhrhlO', '048', 'LVL09112023101143', 'FIKRI SYUHADA', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '048', '', '', '', '', '', '', '', '', '048', '005', '3'),
(306, 'USERS54920231215114509', '00909', '$2y$10$07etHIBHtLxnLvl1Y2b0D.sgHJUyQgZ6.yTtJ1NszJWtN0Hl6RvFi', '050', 'LVL09112023101143', 'FIRMAN BEKTI SAYOGI', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '050', '', '', '', '', '', '', '', '', '050', '003', '3'),
(307, 'USERS55020231215114510', '01067', '$2y$10$eCHn87R2VtRSgjOyZV7Hne6aRNDcMfVDSQ2.Pqs8UBIie8aqlqzOm', '052', 'LVL09112023101143', 'RENDY SYAIHAN RACHMAN', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-06 16:29:00', '052', '', '', '', '', '', '', '', '', '052', '003', '3'),
(308, 'USERS55120231215114510', '01190', '$2y$10$fjC5anixUnYWhBJJFgXvCOdQZPLfKzrhMBmp.hEN1ZwozG.pz0EnW', '022', 'LVL09112023101143', 'WAHYU EFENDI', 'Tidak', '0', '', '', '', '', 'ADITYA DWIAN', '2023-07-10 15:24:08', '022', '', '', '', '', '', '', '', '', '022', '003', '3'),
(309, 'USERS55320231215114510', 'testing', '$2y$10$6oMGMZjqVh4ZgISXE36gH.QVZaarMZv/M5iFwtpixmCWYWOfIKTUO', '017', 'LVL09112023101143', 'testing saja', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-12 10:13:51', '017', '', '', '', '', '', '', '', '', '017', '010', '3'),
(310, 'USERS55420231215114510', 'testingtsi', '$2y$10$PyKJyTIjdDFxj35gO1id5emmBbeslQ7ni.CufTx.PoyvPYHCxkTdi', '017', 'LVL09112023101143', 'testing tsi', 'Tidak', '0', '', '', '', '', 'TSI', '2023-07-13 14:17:12', '017', '', '', '', '', '', '', '', '', '017', '010', '3'),
(311, 'USERS55520231215114511', 'DIV-KPB', '$2y$10$UseaoMN9M8/v3MpI6hcbIeboxugQdrq2hr8hU3Ad1M23HL88uHjXK', '000', 'LVL09112023101143', 'DIV-KPB', 'Tidak', '0', '', '', '', '', 'ARIF HIDAYAT', '2023-11-15 10:15:03', '000', '', '', '', '', '', '', '', '', '000', '000', '3'),
(312, 'USERS55720231215114511', 'DIV-DOP', '$2y$10$Gwloy1RiESSYnJXokk2rj.JdyABSx5cR5krkMyZtrHQXbG7STaMFa', '011', 'LVL09112023101143', 'DIV-DOP', 'Tidak', '0', '', '', '', '', 'ADITYA DWIAN', '2023-10-17 08:11:44', '011', '', '', '', '', '', '', '', '', '011', '011', '3'),
(313, 'USERS55820231215114511', '01058', '$2y$10$S1zkLIAYnpN0JyTncg/MDendFnS690iahoaEg.7Sy4Dde8G3NDzl6', '034', 'LVL09112023101143', 'FADHIATUN INDAH', 'Tidak', '0', '', '', '', '', 'ARIF HIDAYAT', '2023-10-19 16:32:15', '034', '', '', '', '', '', '', '', '', '034', '011', '3'),
(314, 'USER01042024105504', '88888', '$2y$10$P9s0HAvcI6YIAU499Nmqy.omTh2D9V9YINGGC9CwHIlByj4DComaC', '000', 'LEVEL20230510141317', 'nama satu', 'Tidak', '0', '', '', '', '', 'Gusti Abdurrahman Syahril', '2024-01-04 10:55:04', '1301', '', '', '', '', '', '', '', '', '1301', '000', '1'),
(315, 'USER01042024105745', '757656', '$2y$10$Cv31bTsxu.juUHV9YbzN9.IfwYMfCDBSy2LAZD9UkCkTtwVB2uaqu', '043', 'LVL23072023131340', 'Enim corporis fuga ', 'Tidak', '0', '2024-01-04 11:01:33', 'd174f86aa7e4ae8e9c6fb2f491fdde0f61c507a3', '', '', 'Gusti Abdurrahman Syahril', '2024-01-04 10:57:46', '1301', 'Enim corporis fuga ', '2024-01-04 11:02:45', '043', '', '', '', '', '', '1301', '012', '1'),
(316, 'USER01052024075456', '01234', '$2y$10$c1k.MNIwCxDFEhWPY1hZW.dglmnHMcmwr1p58wKwRKlNOJiPCStc.', '1300', 'LVL23072023131340', 'farhan satu', 'Ya', '3', '2024-01-05 08:06:04', '63a3613c15348b26608e1705f848918f43a38aad', '', '', 'Gusti Abdurrahman Syahril', '2024-01-05 07:54:56', '1301', 'Gusti Abdurrahman Syahril', '2024-01-05 09:33:20', '1301', '', '', '', '', '', '1301', '1300', '2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_level`
-- (See below for the actual view)
--
CREATE TABLE `v_level` (
`id_level` int(11)
,`kd_level` varchar(50)
,`nama_level` varchar(100)
,`kd_unit_level` varchar(50)
,`aktif_level` varchar(50)
,`maker_level` varchar(100)
,`waktu_maker_level` varchar(50)
,`kd_unit_maker_level` varchar(50)
,`updater_level` varchar(100)
,`waktu_updater_level` varchar(50)
,`kd_unit_updater_level` varchar(50)
,`deleter_level` varchar(100)
,`waktu_deleter_level` varchar(50)
,`kd_unit_deleter_level` varchar(50)
,`kd_induk_level` varchar(50)
,`nama_unit` char(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_menu`
-- (See below for the actual view)
--
CREATE TABLE `v_menu` (
`id_menu` int(11)
,`kd_menu` int(11)
,`nama_menu` varchar(100)
,`nama_view` varchar(100)
,`status` varchar(50)
,`icon_menu` varchar(20)
,`routes` varchar(50)
,`id_menu_child` int(11)
,`kd_menu_child` int(11)
,`fry_menu` int(11)
,`nama_menu_child` varchar(100)
,`nama_view_child` varchar(100)
,`status_child` varchar(50)
,`icon_menu_child` varchar(20)
,`routes_child` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_otoritas`
-- (See below for the actual view)
--
CREATE TABLE `v_otoritas` (
`id_otoritas` int(11)
,`kd_otoritas` int(11)
,`kd_level` varchar(50)
,`kd_menu` int(11)
,`status` varchar(20)
,`nama_level` varchar(100)
,`nama_menu` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_otoritas_old`
-- (See below for the actual view)
--
CREATE TABLE `v_otoritas_old` (
`id_otoritas` int(11)
,`kd_otoritas` int(11)
,`kd_level` varchar(50)
,`kd_menu` int(11)
,`status` varchar(20)
,`nama_level` varchar(100)
,`nama_menu` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id_user` int(11)
,`kd_user` varchar(100)
,`username_user` varchar(100)
,`password_user` varchar(100)
,`kd_unit_user` varchar(50)
,`kd_level_user` varchar(50)
,`nama_user` varchar(100)
,`aktif_user` varchar(10)
,`counter_blokir` varchar(50)
,`last_login_user` varchar(50)
,`sha_user` varchar(200)
,`nama_foto` varchar(100)
,`jabatan_user` varchar(100)
,`maker_user` varchar(100)
,`waktu_maker_user` varchar(50)
,`kd_unit_maker_user` varchar(10)
,`updater_user` varchar(100)
,`waktu_updater_user` varchar(50)
,`kd_unit_updater_user` varchar(50)
,`deleter_user` varchar(100)
,`waktu_deleter_user` varchar(50)
,`kd_unit_deleter_user` varchar(50)
,`nopeg_user` varchar(100)
,`divisi_user` varchar(100)
,`kd_unit_user2` varchar(50)
,`kd_induk_user` varchar(50)
,`konsolidasi_user` varchar(50)
,`nama_level` varchar(100)
,`nama_unit` char(60)
);

-- --------------------------------------------------------

--
-- Structure for view `v_level`
--
DROP TABLE IF EXISTS `v_level`;

CREATE  VIEW if not exists `v_level`  AS SELECT `tb_level`.`id_level` AS `id_level`, `tb_level`.`kd_level` AS `kd_level`, `tb_level`.`nama_level` AS `nama_level`, `tb_level`.`kd_unit_level` AS `kd_unit_level`, `tb_level`.`aktif_level` AS `aktif_level`, `tb_level`.`maker_level` AS `maker_level`, `tb_level`.`waktu_maker_level` AS `waktu_maker_level`, `tb_level`.`kd_unit_maker_level` AS `kd_unit_maker_level`, `tb_level`.`updater_level` AS `updater_level`, `tb_level`.`waktu_updater_level` AS `waktu_updater_level`, `tb_level`.`kd_unit_updater_level` AS `kd_unit_updater_level`, `tb_level`.`deleter_level` AS `deleter_level`, `tb_level`.`waktu_deleter_level` AS `waktu_deleter_level`, `tb_level`.`kd_unit_deleter_level` AS `kd_unit_deleter_level`, `tb_level`.`kd_induk_level` AS `kd_induk_level`, `tb_unit_kerja`.`nama_unit` AS `nama_unit` FROM (`tb_level` left join `tb_unit_kerja` on(`tb_level`.`kd_unit_level` = `tb_unit_kerja`.`kd_unit`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_menu`
--
DROP TABLE IF EXISTS `v_menu`;

CREATE  VIEW if not exists `v_menu`  AS SELECT `tb_menu`.`id_menu` AS `id_menu`, `tb_menu`.`kd_menu` AS `kd_menu`, `tb_menu`.`nama_menu` AS `nama_menu`, `tb_menu`.`nama_view` AS `nama_view`, `tb_menu`.`status` AS `status`, `tb_menu`.`icon_menu` AS `icon_menu`, `tb_menu`.`routes` AS `routes`, `tb_child_menu`.`id_menu` AS `id_menu_child`, `tb_child_menu`.`kd_menu` AS `kd_menu_child`, `tb_child_menu`.`fry_menu` AS `fry_menu`, `tb_child_menu`.`nama_menu` AS `nama_menu_child`, `tb_child_menu`.`nama_view` AS `nama_view_child`, `tb_child_menu`.`status` AS `status_child`, `tb_child_menu`.`icon_menu` AS `icon_menu_child`, `tb_child_menu`.`routes` AS `routes_child` FROM (`tb_menu` left join `tb_child_menu` on(`tb_menu`.`kd_menu` = `tb_child_menu`.`fry_menu`)) WHERE `tb_menu`.`status` = 'aktif' ORDER BY `tb_menu`.`kd_menu` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_otoritas`
--
DROP TABLE IF EXISTS `v_otoritas`;

CREATE  VIEW if not exists `v_otoritas`  AS SELECT `tb_otoritas`.`id_otoritas` AS `id_otoritas`, `tb_otoritas`.`kd_otoritas` AS `kd_otoritas`, `tb_otoritas`.`kd_level` AS `kd_level`, `tb_otoritas`.`kd_menu` AS `kd_menu`, `tb_otoritas`.`status` AS `status`, `tb_level`.`nama_level` AS `nama_level`, `tb_menu`.`nama_menu` AS `nama_menu` FROM ((`tb_otoritas` join `tb_level`) join `tb_menu`) WHERE `tb_otoritas`.`kd_level` = `tb_level`.`kd_level` AND `tb_otoritas`.`kd_menu` = `tb_menu`.`kd_menu` AND `tb_level`.`aktif_level` = 'Aktif' AND `tb_menu`.`status` = 'Aktif''Aktif'  ;

-- --------------------------------------------------------

--
-- Structure for view `v_otoritas_old`
--
DROP TABLE IF EXISTS `v_otoritas_old`;

-- CREATE  VIEW if not exists `v_otoritas_old`  AS SELECT `tb_otoritas`.`id_otoritas` AS `id_otoritas`, `tb_otoritas`.`kd_otoritas` AS `kd_otoritas`, `tb_otoritas`.`kd_level` AS `kd_level`, `tb_otoritas`.`kd_menu` AS `kd_menu`, `tb_otoritas`.`status` AS `status`, `tb_level`.`nama_level` AS `nama_level`, `tb_menu`.`nama_menu` AS `nama_menu` FROM ((`tb_otoritas` join `tb_level`) join `tb_menu`) WHERE `tb_otoritas`.`kd_level` = `tb_level`.`kd_level` AND `tb_otoritas`.`kd_menu` = `tb_menu`.`kd_menu``kd_menu`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE  VIEW if not exists `v_user`  AS SELECT `tb_user`.`id_user` AS `id_user`, `tb_user`.`kd_user` AS `kd_user`, `tb_user`.`username_user` AS `username_user`, `tb_user`.`password_user` AS `password_user`, `tb_user`.`kd_unit_user` AS `kd_unit_user`, `tb_user`.`kd_level_user` AS `kd_level_user`, `tb_user`.`nama_user` AS `nama_user`, `tb_user`.`aktif_user` AS `aktif_user`, `tb_user`.`counter_blokir` AS `counter_blokir`, `tb_user`.`last_login_user` AS `last_login_user`, `tb_user`.`sha_user` AS `sha_user`, `tb_user`.`nama_foto` AS `nama_foto`, `tb_user`.`jabatan_user` AS `jabatan_user`, `tb_user`.`maker_user` AS `maker_user`, `tb_user`.`waktu_maker_user` AS `waktu_maker_user`, `tb_user`.`kd_unit_maker_user` AS `kd_unit_maker_user`, `tb_user`.`updater_user` AS `updater_user`, `tb_user`.`waktu_updater_user` AS `waktu_updater_user`, `tb_user`.`kd_unit_updater_user` AS `kd_unit_updater_user`, `tb_user`.`deleter_user` AS `deleter_user`, `tb_user`.`waktu_deleter_user` AS `waktu_deleter_user`, `tb_user`.`kd_unit_deleter_user` AS `kd_unit_deleter_user`, `tb_user`.`nopeg_user` AS `nopeg_user`, `tb_user`.`divisi_user` AS `divisi_user`, `tb_user`.`kd_unit_user2` AS `kd_unit_user2`, `tb_user`.`kd_induk_user` AS `kd_induk_user`, `tb_user`.`konsolidasi_user` AS `konsolidasi_user`, `tb_level`.`nama_level` AS `nama_level`, `tb_unit_kerja`.`nama_unit` AS `nama_unit` FROM ((`tb_user` left join `tb_level` on(`tb_user`.`kd_level_user` = `tb_level`.`kd_level`)) left join `tb_unit_kerja` on(`tb_user`.`kd_unit_user` = `tb_unit_kerja`.`kd_unit`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_child_menu`
--
ALTER TABLE `tb_child_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `UNIQUE` (`kd_menu`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `UNIQUE` (`kd_level`,`nama_level`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `UNIQUE` (`kd_menu`);

--
-- Indexes for table `tb_otoritas`
--
ALTER TABLE `tb_otoritas`
  ADD PRIMARY KEY (`id_otoritas`),
  ADD UNIQUE KEY `UNIQUE` (`kd_otoritas`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unit_kerja`
--
ALTER TABLE `tb_unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_child_menu`
--
ALTER TABLE `tb_child_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_otoritas`
--
ALTER TABLE `tb_otoritas`
  MODIFY `id_otoritas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_unit_kerja`
--
ALTER TABLE `tb_unit_kerja`
  MODIFY `id_unit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
