-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 10:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru_mapel`
--

CREATE TABLE `tb_guru_mapel` (
  `id_guru_mapel` int(10) NOT NULL,
  `th_pelajaran` varchar(15) NOT NULL,
  `nipy` varchar(20) NOT NULL,
  `kode_mapel` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `komp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru_mapel`
--

INSERT INTO `tb_guru_mapel` (`id_guru_mapel`, `th_pelajaran`, `nipy`, `kode_mapel`, `kelas`, `komp`) VALUES
(81, '2023/2024', '32120220204', 'pkn', 'X', 'PPLG'),
(82, '2023/2024', '32120220204', 'pkn', 'X', 'TE'),
(83, '2023/2024', '32120220204', 'pkn', 'X', 'TKR'),
(84, '2023/2024', '32120220204', 'pkn', 'X', 'TMI'),
(85, '2023/2024', '32120220204', 'pkn', 'X', 'TSM'),
(86, '2023/2024', '32120050027', 'kons_tkr', 'XI', 'TKR'),
(87, '2023/2024', '32120080058', 'kons_tkr', 'XI', 'TKR'),
(88, '2023/2024', '32120220202', 'dd_pplg', 'X', 'PPLG'),
(89, '2023/2024', '32120220202', 'pkk', 'XI', 'PPLG'),
(90, '2023/2024', '32120220202', 'pkk', 'XI', 'TE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `nama_Sjurusan` varchar(4) NOT NULL,
  `nama_Ljurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_Sjurusan`, `nama_Ljurusan`) VALUES
(1, 'TE', 'TEKNIK ELEKTRONIKA'),
(2, 'PPLG', 'PENGEMBANGAN PERANGKAT LUNAK'),
(3, 'TSM', 'TEKNIK SEPEDA MOTOR'),
(4, 'TKR', 'TEKNIK KENDARAAN RINGAN'),
(5, 'TMI', 'TEKNIK MESIN INDUSTRI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_leger`
--

CREATE TABLE `tb_leger` (
  `id` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `pemkelas` int(1) NOT NULL,
  `semester` enum('Ganjil','Genap','','') NOT NULL,
  `th_pelajaran` varchar(12) NOT NULL,
  `pabp` int(3) NOT NULL,
  `pkn` int(3) NOT NULL,
  `b_indo` int(3) NOT NULL,
  `penjas` int(3) NOT NULL,
  `sejarah` int(3) NOT NULL,
  `seni` int(3) NOT NULL,
  `b_jawa` int(3) NOT NULL,
  `mtk` int(3) NOT NULL,
  `b_ing` int(3) NOT NULL,
  `informatika` int(3) NOT NULL,
  `projek` int(3) NOT NULL,
  `dasar` int(3) NOT NULL,
  `b_arab` int(3) NOT NULL,
  `mapel_pilihan` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `rerata` int(3) NOT NULL,
  `sakit` int(3) NOT NULL,
  `ijin` int(3) NOT NULL,
  `alpa` int(3) NOT NULL,
  `rangking` int(2) NOT NULL,
  `eks1` varchar(3) NOT NULL,
  `eks2` varchar(3) NOT NULL,
  `eks3` varchar(3) NOT NULL,
  `eks4` varchar(3) NOT NULL,
  `eks5` varchar(3) NOT NULL,
  `eks6` varchar(3) NOT NULL,
  `eks7` varchar(3) NOT NULL,
  `tgl_bagi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_leger`
--

INSERT INTO `tb_leger` (`id`, `nis`, `nama`, `kelas`, `jurusan`, `pemkelas`, `semester`, `th_pelajaran`, `pabp`, `pkn`, `b_indo`, `penjas`, `sejarah`, `seni`, `b_jawa`, `mtk`, `b_ing`, `informatika`, `projek`, `dasar`, `b_arab`, `mapel_pilihan`, `total`, `rerata`, `sakit`, `ijin`, `alpa`, `rangking`, `eks1`, `eks2`, `eks3`, `eks4`, `eks5`, `eks6`, `eks7`, `tgl_bagi`) VALUES
(1, 1111, 'ADNAN ARDHANA ARROHMAN', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(2, 1112, 'AFITA DEWI ARYANA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(3, 1113, 'ALI WARDANA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(4, 1114, 'ALIYA AYU DIAH NINGRUM', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(5, 1115, 'Bayu Setiaji', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(6, 1116, 'Amirul', 'X', 'TE', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(7, 1117, 'AhmadAkbar', 'X', 'TE', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(8, 1118, 'Zaenal', 'X', 'TE', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(9, 1119, 'Yandi', 'XI', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(10, 1234, 'Muhammad Dendi', 'X', 'TMI', 4, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(11, 100372, 'Contoh', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_levelusers`
--

CREATE TABLE `tb_levelusers` (
  `id_levelusers` int(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_levelusers`
--

INSERT INTO `tb_levelusers` (`id_levelusers`, `level`) VALUES
(1, 'operator'),
(2, 'guru'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(10) NOT NULL,
  `kode_mapel` varchar(15) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `kategori_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`, `kelas`, `kategori_mapel`) VALUES
(24, 'pabp', 'Pendidikan Agama Islam dan Budi Pekerti', 'X', 'umum'),
(25, 'pkn', 'Pendidikan Pancasila', 'X', 'umum'),
(26, 'b_indo', 'Bahasa Indonesia', 'X', 'umum'),
(27, 'pjok', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'X', 'umum'),
(28, 'sejarah', 'Sejarah', 'X', 'umum'),
(29, 'seni', 'Seni Budaya', 'X', 'umum'),
(30, 'b_jawa', 'Bahasa Jawa', 'X', 'umum'),
(31, 'mtk', 'Matematika', 'X', 'kejuruan'),
(32, 'b_ing', 'Bahasa Inggris', 'X', 'kejuruan'),
(33, 'iftk', 'Informatika', 'X', 'kejuruan'),
(34, 'ipas', 'Projek Ilmu Pengetahuan Alam dan Sosial', 'X', 'kejuruan'),
(35, 'dd_tmi', 'Dasar-Dasar Teknik Mesin', 'X', 'kejuruan'),
(36, 'dd_oto', 'Dasar-Dasar Otomotif', 'X', 'kejuruan'),
(37, 'dd_te', 'Dasar-Dasar Teknik Elektronika', 'X', 'kejuruan'),
(38, 'dd_pplg', 'Dasar-Dasar Pengembangan Perangkat Lunak Dan Gim', 'X', 'kejuruan'),
(39, 'pabp', 'Pendidikan Agama Islam dan Budi Pekerti', 'XI', 'umum'),
(40, 'pkn', 'Pendidikan Pancasila', 'XI', 'umum'),
(41, 'b_indo', 'Bahasa Indonesia', 'XI', 'umum'),
(42, 'pjok', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'XI', 'umum'),
(43, 'sejarah', 'Sejarah', 'XI', 'umum'),
(44, 'b_jawa', 'Bahasa Jawa', 'XI', 'umum'),
(45, 'b_arab', 'Bahasa Arab', 'XI', 'umum'),
(46, 'mtk', 'Matematika', 'XI', 'kejuruan'),
(47, 'b_ing', 'Bahasa Inggris', 'XI', 'kejuruan'),
(48, 'kons_tmi', 'Konsentrasi Keahlian Teknik Mekanik Industri', 'XI', 'kejuruan'),
(49, 'kons_tsm', 'Konsentrasi Teknik Sepeda Motor', 'XI', 'kejuruan'),
(50, 'kons_tkr', 'Konsentrasi Keahlian Teknik Kendaraan Ringan', 'XI', 'kejuruan'),
(51, 'kons_te', 'Konsentrasi Keahlian Teknik Audio Video', 'XI', 'kejuruan'),
(52, 'kons_pplg', 'Konsentrasi Keahlian Rekayasa Perangkat Lunak', 'XI', 'kejuruan'),
(53, 'pkk', 'Projek Kreatif dan Kewirausahaan', 'XI', 'kejuruan'),
(54, 'mpp', 'Mata Pelajaran Pilihan', 'XI', 'kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rolsusers`
--

CREATE TABLE `tb_rolsusers` (
  `id_rolsuser` int(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nipy` varchar(20) NOT NULL,
  `id_leveluser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rolsusers`
--

INSERT INTO `tb_rolsusers` (`id_rolsuser`, `id_user`, `nipy`, `id_leveluser`) VALUES
(119, 'USE0077', '32120220202', 1),
(122, 'USE0001', '32120050026\r\n', 2),
(123, 'USE0002', '32120050027', 2),
(124, 'USE0003', '32120050028', 2),
(125, 'USE0004', '32120050029', 2),
(126, 'USE0005', '32120050030', 2),
(127, 'USE0006', '32120070037', 2),
(128, 'USE0007', '32120070039', 2),
(129, 'USE0008', '32120080041', 2),
(130, 'USE0009', '32120080042', 2),
(131, 'USE0010', '32120080043', 2),
(132, 'USE0011', '32120080044', 2),
(133, 'USE0012', '32120080045', 2),
(134, 'USE0013', '32120080046', 2),
(135, 'USE0014', '32120080047', 2),
(136, 'USE0015', '32120080048', 2),
(137, 'USE0016', '32120080051', 2),
(138, 'USE0017', '32120080052', 2),
(139, 'USE0018', '32120080053', 2),
(140, 'USE0019', '32120080055', 2),
(141, 'USE0020', '32120080056', 2),
(142, 'USE0021', '32120080057', 2),
(143, 'USE0022', '32120080058', 2),
(144, 'USE0023', '32120090066', 2),
(145, 'USE0024', '32120090067', 2),
(146, 'USE0025', '32120090068', 2),
(147, 'USE0026', '32120090072', 2),
(148, 'USE0027', '32120090073', 2),
(149, 'USE0028', '32120090074', 2),
(150, 'USE0029', '32120090075', 2),
(151, 'USE0030', '32120090076', 2),
(152, 'USE0031', '32120090077', 2),
(153, 'USE0032', '32120100092', 2),
(154, 'USE0033', '32120100093', 2),
(155, 'USE0034', '32120100103', 2),
(156, 'USE0035', '32120110109', 2),
(157, 'USE0036', '32120120126', 2),
(158, 'USE0037', '32120120127', 2),
(159, 'USE0038', '32120130133', 2),
(160, 'USE0039', '32120130145', 2),
(161, 'USE0040', '32120130146', 2),
(162, 'USE0041', '32120130148', 2),
(163, 'USE0042', '32120130149', 2),
(164, 'USE0043', '32120130155', 2),
(165, 'USE0044', '32120140158', 2),
(166, 'USE0045', '32120140159', 2),
(167, 'USE0046', '32120140160', 2),
(168, 'USE0047', '32120140161', 2),
(169, 'USE0048', '32120140162', 2),
(170, 'USE0049', '32120140163', 2),
(171, 'USE0050', '32120140165', 2),
(172, 'USE0051', '32120150169', 2),
(173, 'USE0052', '32120150170', 2),
(174, 'USE0053', '32120160172', 2),
(175, 'USE0054', '32120160173', 2),
(176, 'USE0055', '32120160174', 2),
(177, 'USE0056', '32120160175', 2),
(178, 'USE0057', '32120160177', 2),
(179, 'USE0058', '32120170182', 2),
(180, 'USE0059', '32120180183', 2),
(181, 'USE0060', '32120180184', 2),
(182, 'USE0061', '32120180185', 2),
(183, 'USE0062', '32120190186', 2),
(184, 'USE0063', '32120200193', 2),
(185, 'USE0064', '32120210194', 2),
(186, 'USE0065', '32120210197', 2),
(187, 'USE0066', '32120220201', 2),
(188, 'USE0067', '32120220202', 2),
(189, 'USE0068', '32120220203', 2),
(190, 'USE0069', '32120220204', 2),
(191, 'USE0070', '32120220205', 2),
(192, 'USE0071', '32120220206', 2),
(193, 'USE0072', '32120220207', 2),
(194, 'USE0073', '32120220208', 2),
(195, 'USE0074', '32220040016', 2),
(196, 'USE0075', '10', 2),
(197, 'USE0076', '11', 2),
(251, 'USE0078', '32120090066', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(2) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `npsn` varchar(40) NOT NULL,
  `nss` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `kel` varchar(30) NOT NULL,
  `kec` varchar(30) NOT NULL,
  `kab` varchar(30) NOT NULL,
  `prov` varchar(30) NOT NULL,
  `web` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama_ks` varchar(50) NOT NULL,
  `nipy` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`, `npsn`, `nss`, `alamat`, `kel`, `kec`, `kab`, `prov`, `web`, `email`, `nama_ks`, `nipy`) VALUES
(1, 'SMK SATYA PRAJA 2 PETARUKAN', '32120090066', '3212009006612', 'Jalan Raya ISer Petarukan Pemalang ', 'Iser', 'Petarukan 123456', 'Pemalang', 'Jawa Tengah', 'http://www.smksatyapraja2.id/', 'smksapra2@gmail.com', 'Purwo Setyowitanto, ST', '32120090066');

-- --------------------------------------------------------

--
-- Table structure for table `tb_select_tahunpel`
--

CREATE TABLE `tb_select_tahunpel` (
  `id` int(10) NOT NULL,
  `select_tahunpel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_select_tahunpel`
--

INSERT INTO `tb_select_tahunpel` (`id`, `select_tahunpel`) VALUES
(1, '2023/2024');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(10) NOT NULL,
  `nis` int(10) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kel` varchar(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `pemkelas` varchar(1) NOT NULL,
  `th_pelajaran` varchar(12) NOT NULL,
  `ttl` varchar(40) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `hp_siswa` varchar(15) NOT NULL,
  `asal_sekolah` varchar(40) NOT NULL,
  `tgl_terima` varchar(20) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `hp_ortu` varchar(15) NOT NULL,
  `kerja_ayah` varchar(20) NOT NULL,
  `kerja_ibu` varchar(20) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `alamat_wali` text NOT NULL,
  `hp_wali` varchar(50) NOT NULL,
  `kerja_wali` varchar(20) NOT NULL,
  `semester` enum('Ganjil','Genap','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `nisn`, `nama`, `kel`, `kelas`, `jurusan`, `pemkelas`, `th_pelajaran`, `ttl`, `kelamin`, `agama`, `status`, `anak_ke`, `alamat_siswa`, `hp_siswa`, `asal_sekolah`, `tgl_terima`, `ayah`, `ibu`, `alamat_ortu`, `hp_ortu`, `kerja_ayah`, `kerja_ibu`, `nama_wali`, `alamat_wali`, `hp_wali`, `kerja_wali`, `semester`) VALUES
(1, 1111, 400372, 'ADNAN ARDHANA ARROHMAN S.Kom', '', 'X', 'PPLG', '1', '2023/2024', 'Pemalang, 18 April 2000', 'P', 'ISLAM', 'Anak kandung', 1, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(2, 1112, 400373, 'AFITA DEWI ARYANA', '', 'X', 'PPLG', '1', '2023/2024', 'Pemalang, 18 April 2001', 'L', 'KRISTEN', 'Anak kandung', 2, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(3, 1113, 400374, 'ALI WARDANA', '', 'X', 'PPLG', '1', '2023/2024', 'Pemalang, 18 April 2002', 'P', 'ISLAM', 'Anak kandung', 3, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(4, 1114, 400375, 'ALIYA AYU DIAH NINGRUM', '', 'X', 'PPLG', '1', '2023/2024', 'Pemalang, 18 April 2003', 'P', 'ISLAM', 'Anak kandung', 4, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(5, 1115, 400376, 'Bayu Setiaji', '', 'X', 'PPLG', '2', '2023/2024', 'Pemalang, 18 April 2004', 'L', 'KRISTEN', 'Anak kandung', 5, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(6, 1116, 400377, 'Amirul', '', 'X', 'TE', '2', '2023/2024', 'Pemalang, 18 April 2005', 'L', 'ISLAM', 'Anak kandung', 6, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(7, 1117, 400378, 'AhmadAkbar', '', 'X', 'TE', '2', '2023/2024', 'Pemalang, 18 April 2006', 'P', 'ISLAM', 'Anak kandung', 7, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(8, 1118, 400379, 'Zaenal', '', 'X', 'TE', '2', '2023/2024', 'Pemalang, 18 April 2007', 'L', 'ISLAM', 'Anak kandung', 8, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil'),
(9, 1119, 45353, 'Yandi', '', 'XI', 'PPLG', '2', '2023/2024', 'Pemalang, 18 April 2008', 'L', 'ISLAM', 'Anak kandung', 7, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ganjil'),
(13, 1234, 12345, 'Muhammad Dendi', 'X TMI 4', 'X', 'TMI', '4', '2023/2024', '', 'L', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(14, 100372, 400372, 'Contoh', '', 'X', 'PPLG', '4', '2023/2024', 'Pemalang, 18 April 2000', 'P', 'ISLAM', 'Anak kandung', 1, 'Jalan wira wiri kesana kemari', '-', 'SMP Negeri 4 Petarukan', '12 Juli 2023', 'aku', 'kamu', 'Jalan wira wiri kesana kemari', '-', 'wiraswasta', 'ibu rumah tangga', '-', '-', '-', '-', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_thpelajaran`
--

CREATE TABLE `tb_thpelajaran` (
  `id` int(10) NOT NULL,
  `tahun_pelajaran` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tgl_bagi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_thpelajaran`
--

INSERT INTO `tb_thpelajaran` (`id`, `tahun_pelajaran`, `semester`, `tgl_bagi`) VALUES
(1, '2023/2024', 'Ganjil', ''),
(2, '2023/2024', 'Genap', ''),
(3, '2024/2025', 'Ganjil', ''),
(4, '2024/2025', 'Genap', ''),
(5, '2025/2026', 'Ganjil', ''),
(6, '2025/2026', 'Genap', ''),
(7, '2026/2027', 'Ganjil', ''),
(8, '2026/2027', 'Genap', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nipy` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `nipy`, `nama_lengkap`) VALUES
('USE0001', '32120050026', '32120050026', '32120050026', 'Purwo Setya Witanto, S.T'),
('USE0002', '32120050027', '32120050027', '32120050027', 'Munasir, S.Pd, M.T'),
('USE0003', '32120050028', '32120050028', '32120050028', 'Maulana Malik, S.H, S.Pd'),
('USE0004', '32120050029', '32120050029', '32120050029', 'Moh. Samsurizal, S.I.P'),
('USE0005', '32120050030', '32120050030', '32120050030', 'Ginco Abdul S, S.T'),
('USE0006', '32120070037', '32120070037', '32120070037', 'Adil Syaifulhaq, S.Pd.Ing'),
('USE0007', '32120070039', '32120070039', '32120070039', 'Eko Kurniawan,S.Pd'),
('USE0008', '32120080041', '32120080041', '32120080041', 'Sutojoyo, S.T'),
('USE0009', '32120080042', '32120080042', '32120080042', 'Urip Prayitno, S.Pd'),
('USE0010', '32120080043', '32120080043', '32120080043', 'Eka Nurhayati, S.Pd'),
('USE0011', '32120080044', '32120080044', '32120080044', 'Della Alifah, S.Pd'),
('USE0012', '32120080045', '32120080045', '32120080045', 'Trimanto, S.T'),
('USE0013', '32120080046', '32120080046', '32120080046', 'Arif Budi Prakoso, S.Pd'),
('USE0014', '32120080047', '32120080047', '32120080047', 'Sugeng Nur Arif, S.Pd'),
('USE0015', '32120080048', '32120080048', '32120080048', 'Apriliyanto Hernadi, S.T'),
('USE0016', '32120080051', '32120080051', '32120080051', 'Dian Anggraeni, S.Pd'),
('USE0017', '32120080052', '32120080052', '32120080052', 'Wahludi, S.S, S.Pd'),
('USE0018', '32120080053', '32120080053', '32120080053', 'Wahyu Triyo Utomo, S.Pd'),
('USE0019', '32120080055', '32120080055', '32120080055', 'Faqih Udin, S.Pd'),
('USE0020', '32120080056', '32120080056', '32120080056', 'Galih Bayu Aji, S.Pd'),
('USE0021', '32120080057', '32120080057', '32120080057', 'Suroso, S.T'),
('USE0022', '32120080058', '32120080058', '32120080058', 'Octovian Andy S, S.T'),
('USE0023', '32120090066', '32120090066', '32120090066', 'Yandi Pirmansyah, ST'),
('USE0024', '32120090067', '32120090067', '32120090067', 'Didi Irawan, S.Pd'),
('USE0025', '32120090068', '32120090068', '32120090068', 'Muh. Abduh, S.T'),
('USE0026', '32120090072', '32120090072', '32120090072', 'Nylla Mustikasari, S.Pd'),
('USE0027', '32120090073', '32120090073', '32120090073', 'Moh. Ali Akbar Navi, S.T'),
('USE0028', '32120090074', '32120090074', '32120090074', 'Nur Isiyamto, S.Pd'),
('USE0029', '32120090075', '32120090075', '32120090075', 'Budi Susilo, S.T, M.T'),
('USE0030', '32120090076', '32120090076', '32120090076', 'Dirman Hadi S, S.T'),
('USE0031', '32120090077', '32120090077', '32120090077', 'Warjo, S.T'),
('USE0032', '32120100092', '32120100092', '32120100092', 'Rini Fatmawati, S.E'),
('USE0033', '32120100093', '32120100093', '32120100093', 'Rahayu Fitria, S.Pd'),
('USE0034', '32120100103', '32120100103', '32120100103', 'Resti Linuwih, S.Pd'),
('USE0035', '32120110109', '32120110109', '32120110109', 'Hernita Yuliarsih, S.Pd'),
('USE0036', '32120120126', '32120120126', '32120120126', 'Kikit Bawich, S.T'),
('USE0037', '32120120127', '32120120127', '32120120127', 'Winarsih, S.Pd'),
('USE0038', '32120130133', '32120130133', '32120130133', 'Giri Satya Hadi, S.Pd'),
('USE0039', '32120130145', '32120130145', '32120130145', 'Syamsu Hernawan, ST'),
('USE0040', '32120130146', '32120130146', '32120130146', 'Isnan Priyadi, ST'),
('USE0041', '32120130148', '32120130148', '32120130148', 'Setyaji Yogi Utomo, S.Pd'),
('USE0042', '32120130149', '32120130149', '32120130149', 'Eko Yulian Prasetyo, S.Pd'),
('USE0043', '32120130155', '32120130155', '32120130155', 'Devi Nuranita, S.Pd, M.Pd'),
('USE0044', '32120140158', '32120140158', '32120140158', 'Johnny Iqbal Habibi, S.PdI'),
('USE0045', '32120140159', '32120140159', '32120140159', 'Wahyuni Yuli Astuti, S.Pd'),
('USE0046', '32120140160', '32120140160', '32120140160', 'Eka Pratiwi Sintowati, S.Pd'),
('USE0047', '32120140161', '32120140161', '32120140161', 'Firman Maulana, S.Pd'),
('USE0048', '32120140162', '32120140162', '32120140162', 'Falasifah Aulia, S.Pd'),
('USE0049', '32120140163', '32120140163', '32120140163', 'Imam Kurniawan, S.Pd'),
('USE0050', '32120140165', '32120140165', '32120140165', 'Kurnawan, S.Pd'),
('USE0051', '32120150169', '32120150169', '32120150169', 'Dwi Endra Desianto, S.Pd'),
('USE0052', '32120150170', '32120150170', '32120150170', 'Haris Zia\'ul Iman, S.Pd'),
('USE0053', '32120160172', '32120160172', '32120160172', 'Mashadi Irfan, S.Pd.I'),
('USE0054', '32120160173', '32120160173', '32120160173', 'Teguh Pamuji, S.Pd'),
('USE0055', '32120160174', '32120160174', '32120160174', 'Bambang Apriandi, S.Pd'),
('USE0056', '32120160175', '32120160175', '32120160175', 'Edi Susanto, S.T'),
('USE0057', '32120160177', '32120160177', '32120160177', 'Bagus Adi Prasetyo, S.Kom'),
('USE0058', '32120170182', '32120170182', '32120170182', 'Rullyta Widya Renggani, S.Pd'),
('USE0059', '32120180183', '32120180183', '32120180183', 'Sane Oktana, S.Pd'),
('USE0060', '32120180184', '32120180184', '32120180184', 'Dian Nurhadi, S.Pd'),
('USE0061', '32120180185', '32120180185', '32120180185', 'Rizki Fani Candra Dewi, S.Pd'),
('USE0062', '32120190186', '32120190186', '32120190186', 'Faizin Nurdiansyah, S.Pd'),
('USE0063', '32120200193', '32120200193', '32120200193', 'Muhamad Ardianto, S.Kom'),
('USE0064', '32120210194', '32120210194', '32120210194', 'Eva Wiji Setyaningrum, S.kom'),
('USE0065', '32120210197', '32120210197', '32120210197', 'Labibatuz Zahro, S.Pd.I'),
('USE0066', '32120220201', '32120220201', '32120220201', 'Afiyaturrahmah, S.T'),
('USE0067', '32120220202', '32120220202', '32120220202', 'Muhammad Irfa Nufaiyal Kharish, S.Kom'),
('USE0068', '32120220203', '32120220203', '32120220203', 'Amianti Putri Hestiningtyan, M.Pd'),
('USE0069', '32120220204', '32120220204', '32120220204', 'Okidha Amin, S.Pd'),
('USE0070', '32120220205', '32120220205', '32120220205', 'Alfan Yusuf, ST'),
('USE0071', '32120220206', '32120220206', '32120220206', 'Rifka Algani Amrullah, S.Pd'),
('USE0072', '32120220207', '32120220207', '32120220207', 'Chofalina Ayuningtyas, S.Pd'),
('USE0073', '32120220208', '32120220208', '32120220208', 'Rian Arisetyawan, S.Pd'),
('USE0074', '32220040016', '32220040016', '32220040016', 'Sumaryo, ST'),
('USE0075', '10', '10', '10', 'Tsamara Revinda I, S.Pd'),
('USE0076', '11', '11', '11', 'Istiqomah Ayu Mustika, S.Pd'),
('USE0077', '32120220202_admin', '32120220202_admin', '32120220202', 'Muhammad Irfa Nufaiyal Kharish, S.Kom'),
('USE0078', '32120090066_admin', '32120090066_admin', '32120090066', 'Yandi Pirmansyah, ST');

-- --------------------------------------------------------

--
-- Table structure for table `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_walikelas` int(10) NOT NULL,
  `th_pelajaran` varchar(10) NOT NULL,
  `nipy` varchar(20) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `komp_keahlian` varchar(50) NOT NULL,
  `pkelas` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_walikelas`, `th_pelajaran`, `nipy`, `kelas`, `komp_keahlian`, `pkelas`) VALUES
(4, '2023/2024', '32120110109', 'X', 'PPLG', 1),
(6, '2023/2024', '32120220202', 'X', 'PPLG', 2),
(7, '2023/2024', '11', 'X', 'TE', 1),
(8, '2023/2024', '32120090068', 'X', 'TE', 2),
(9, '2023/2024', '32120220208', 'X', 'TMI', 1),
(10, '2023/2024', '32120130149', 'X', 'TMI', 2),
(11, '2023/2024', '32120080041', 'X', 'TMI', 3),
(12, '2023/2024', '32120100093', 'X', 'TMI', 4),
(13, '2023/2024', '32120080045', 'X', 'TKR', 1),
(14, '2023/2024', '32120050030', 'X', 'TKR', 2),
(15, '2023/2024', '32120160172', 'X', 'TKR', 3),
(16, '2023/2024', '32120120127', 'X', 'TKR', 4),
(17, '2023/2024', '32120180185', 'X', 'TSM', 1),
(18, '2023/2024', '32120220207', 'X', 'TSM', 2),
(19, '2023/2024', '10', 'X', 'TSM', 3),
(20, '2023/2024', '32120160173', 'X', 'TSM', 4),
(21, '2023/2024', '32120160177', 'XI', 'PPLG', 1),
(22, '2023/2024', '32120090066', 'XI', 'PPLG', 2),
(23, '2023/2024', '32120090072', 'XI', 'TE', 1),
(24, '2023/2024', '32120070037', 'XI', 'TE', 2),
(25, '2023/2024', '32120080051', 'XI', 'TMI', 1),
(26, '2023/2024', '32120140162', 'XI', 'TMI', 2),
(27, '2023/2024', '32120080055', 'XI', 'TMI', 3),
(28, '2023/2024', '32120190186', 'XI', 'TMI', 4),
(29, '2023/2024', '32120090067', 'XI', 'TKR', 1),
(30, '2023/2024', '32120080043', 'XI', 'TKR', 2),
(31, '2023/2024', '32120080053', 'XI', 'TKR', 3),
(32, '2023/2024', '32120140158', 'XI', 'TKR', 4),
(33, '2023/2024', '32120220204', 'XI', 'TSM', 1),
(35, '2023/2024', '32120140163', 'XI', 'TSM', 2),
(36, '2023/2024', '32120100103', 'XI', 'TSM', 3),
(37, '2023/2024', '32120090077', 'XI', 'TSM', 4),
(38, '2023/2024', '32120050029', 'XII', 'PPLG', 1),
(39, '2023/2024', '32120080044', 'XII', 'PPLG', 2),
(40, '2023/2024', '32120220201', 'XII', 'TE', 1),
(41, '2023/2024', '32120130145', 'XII', 'TMI', 1),
(42, '2023/2024', '32120130146', 'XII', 'TMI', 2),
(43, '2023/2024', '32120160175', 'XII', 'TMI', 3),
(44, '2023/2024', '32120080057', 'XII', 'TMI', 4),
(45, '2023/2024', '32120210197', 'XII', 'TKR', 1),
(46, '2023/2024', '32120180183', 'XII', 'TKR', 2),
(47, '2023/2024', '32120130133', 'XII', 'TKR', 3),
(48, '2023/2024', '32120140160', 'XII', 'TKR', 4),
(49, '2023/2024', '32220040016', 'XII', 'TSM', 1),
(50, '2023/2024', '32120180184', 'XII', 'TSM', 2),
(51, '2023/2024', '32120220206', 'XII', 'TSM', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru_mapel`
--
ALTER TABLE `tb_guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_leger`
--
ALTER TABLE `tb_leger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_levelusers`
--
ALTER TABLE `tb_levelusers`
  ADD PRIMARY KEY (`id_levelusers`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_rolsusers`
--
ALTER TABLE `tb_rolsusers`
  ADD PRIMARY KEY (`id_rolsuser`);

--
-- Indexes for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_select_tahunpel`
--
ALTER TABLE `tb_select_tahunpel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_thpelajaran`
--
ALTER TABLE `tb_thpelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_walikelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru_mapel`
--
ALTER TABLE `tb_guru_mapel`
  MODIFY `id_guru_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_leger`
--
ALTER TABLE `tb_leger`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_levelusers`
--
ALTER TABLE `tb_levelusers`
  MODIFY `id_levelusers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_rolsusers`
--
ALTER TABLE `tb_rolsusers`
  MODIFY `id_rolsuser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_select_tahunpel`
--
ALTER TABLE `tb_select_tahunpel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_thpelajaran`
--
ALTER TABLE `tb_thpelajaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_walikelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
