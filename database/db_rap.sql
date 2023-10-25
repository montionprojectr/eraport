-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 08:23 AM
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
-- Table structure for table `tb_jenispenilaian`
--

CREATE TABLE `tb_jenispenilaian` (
  `id_type` int(10) NOT NULL,
  `namepenilaian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenispenilaian`
--

INSERT INTO `tb_jenispenilaian` (`id_type`, `namepenilaian`) VALUES
(1, 'Formatif'),
(2, 'Sumatif_1'),
(3, 'Sumatif_2'),
(4, 'Sumatif_3'),
(5, 'Sumatif_4'),
(6, 'ASAS_nontest'),
(7, 'ASAS_test');

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
(1, 400446, 'AFFILIA AYU NINGSIH', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(2, 400447, 'AGUSTINA DAMAYANTI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(3, 400448, 'ALDI MUSTOFA PRANATA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(4, 400449, 'ALI CAKRA GOEVARA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(5, 400450, 'ANANDA REVALIZA AKBAR', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(6, 400451, 'ANDRE DWI SASONGKO', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(7, 400452, 'ANNISATUL FADILAH', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(8, 400453, 'AULIA PUTRI LARASATI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(9, 400454, 'AYU NINGSIH', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(10, 400455, 'CLLARISA MINDY APRILIA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(11, 400456, 'DEA RAHMA SABILA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(12, 400457, 'DELLA FITRISIA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(13, 400458, 'DWI NUR AZIZAH', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(14, 400459, 'DYAH KENANGA NINGRUM', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(15, 400460, 'ENDANG MUSTIKASARI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(16, 400461, 'FADHILAH RAHMAWATI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(17, 400462, 'FITRI DWI RAMADHANI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(18, 400463, 'HAIFA AYU ANJASENO', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(19, 400464, 'HARYANTO SETIAWAN', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(20, 400465, 'HAURA AIDA FATHIN', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(21, 400466, 'IKHSAN RAMADHANI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(22, 400467, 'INTAN BUNGA CINTIA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(23, 400468, 'JAHRA ARDELIA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(24, 400469, 'KESA ADINDA AMALIYA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(25, 400470, 'LATIFAH AULIYA UNNISA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(26, 400471, 'MELIANA SANTI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(27, 400472, 'MIFTA NURMALLA AENI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(28, 400473, 'MONIKA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(29, 400474, 'NICOLA ADITYA PUTRA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(30, 400475, 'NOVITA RACHMAWATI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(31, 400476, 'RAHMAWATI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(32, 400477, 'REHAN OKA MAHENDRA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(33, 400478, 'RIFKI AHMAD FIRMANSYAH', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(34, 400479, 'RISMA ANASTYA PUTRI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(35, 400480, 'SINTIA NANDA TRI MELANI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(36, 400481, 'SRI LESTARI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(37, 400482, 'SYIFA LUTFIA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(38, 400483, 'TIARA MAEMUNAH', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(39, 400484, 'VIRDA HERA WATI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(40, 400485, 'WITDIAH RETNO WATI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(41, 400486, 'WULAN DAHRI', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(42, 400487, 'ZIHNI SILVIATUL AZZAHRA', 'X', 'PPLG', 1, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(43, 400488, 'ABDILLAH YAHYA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(44, 400489, 'ADITYA WIJAYA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(45, 400490, 'AIRIN NUR HAFIA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(46, 400491, 'ANGGUN KARISMA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(47, 400492, 'ANISA IRNAWATI AGUSTIN', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(48, 400493, 'BAGAS RIZKY FEBIANO', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(49, 400494, 'BAMBANG PRAYOGO', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(50, 400495, 'BUNGA ZESILIA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(51, 400496, 'CAHYA NIASIH', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(52, 400497, 'CALISTA ARGENTINA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(53, 400498, 'CHIKA MAYSA PUTRI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(54, 400499, 'DIAH AYUNINGRUM', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(55, 400500, 'DINDA LESTARI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(56, 400501, 'DIVA JUNI ARIYANTI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(57, 400502, 'DIVA SEKAR KEDATHON', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(58, 400503, 'DWI NUR AISAH', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(59, 400504, 'FADHIL ROSI ALFASICH', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(60, 400505, 'FARISCA NELY AGUSTIN', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(61, 400506, 'FIKKA IMAY SHERISTI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(62, 400507, 'JESIKA YENI ERIYANTI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(63, 400508, 'KAYLA DWI HASTITI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(64, 400509, 'KHOZINATUL AIS SI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(65, 400510, 'LINTANG DWI CAHYANI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(66, 400511, 'LISA YULIANAH', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(67, 400512, 'MAULANA ISHAQ', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(68, 400513, 'MUHAMMAD NAZRIL MAULANA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(69, 400514, 'NABILA FILZA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(70, 400515, 'NADIA APRILIYANI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(71, 400516, 'NASETIA LAURISTA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(72, 400517, 'PUTRI SAGITA SEPTIANA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(73, 400518, 'RAHMA AVIFDA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(74, 400519, 'RIZKI RAHMAT DANI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(75, 400520, 'SAFA NURSIAMI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(76, 400521, 'SALWA AISSYABILA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(77, 400522, 'SELVI SEVILATUL AZIZAH', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(78, 400523, 'SHERA RAMADANI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(79, 400524, 'SHILFI BUNGA VANIA', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(80, 400525, 'WIDIYANA APRILLIYANI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(81, 400526, 'WIHANI LUTFI HIDAYAH', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(82, 400527, 'WILDAN AUFA RIZQI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(83, 400528, 'WINARA FALIA PATI MUHID', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', ''),
(84, 400529, 'YENI KUSUMA WARDANI', 'X', 'PPLG', 2, 'Ganjil', '2023/2024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '');

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
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_nilai` int(10) NOT NULL,
  `th_pelajaran` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `komp_keahlian` varchar(10) NOT NULL,
  `pkelas` varchar(5) NOT NULL,
  `kode_mapel` varchar(15) NOT NULL,
  `jenis_penilaian` varchar(15) NOT NULL,
  `semester` varchar(7) NOT NULL,
  `nilai` int(2) NOT NULL,
  `cpm` varchar(255) NOT NULL,
  `cpp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_nilai`, `th_pelajaran`, `nis`, `kelas`, `komp_keahlian`, `pkelas`, `kode_mapel`, `jenis_penilaian`, `semester`, `nilai`, `cpm`, `cpp`) VALUES
(215, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'Formatif', 'Ganjil', 0, '', ''),
(216, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'Formatif', 'Ganjil', 0, '', ''),
(217, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'Sumatif_1', 'Ganjil', 0, '', ''),
(218, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'Sumatif_1', 'Ganjil', 0, '', ''),
(219, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'Sumatif_2', 'Ganjil', 0, '', ''),
(220, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'Sumatif_2', 'Ganjil', 0, '', ''),
(221, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'Sumatif_3', 'Ganjil', 0, '', ''),
(222, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'Sumatif_3', 'Ganjil', 0, '', ''),
(223, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'Sumatif_4', 'Ganjil', 0, '', ''),
(224, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'Sumatif_4', 'Ganjil', 0, '', ''),
(225, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(226, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(227, '2023/2024', '400526', 'X', 'PPLG', '2', 'pabp', 'ASAS_test', 'Ganjil', 0, '', ''),
(228, '2023/2024', '400527', 'X', 'PPLG', '2', 'pabp', 'ASAS_test', 'Ganjil', 0, '', ''),
(229, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'Formatif', 'Ganjil', 0, '', ''),
(230, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'Formatif', 'Ganjil', 0, '', ''),
(231, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'Sumatif_1', 'Ganjil', 0, '', ''),
(232, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'Sumatif_1', 'Ganjil', 0, '', ''),
(233, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'Sumatif_2', 'Ganjil', 0, '', ''),
(234, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'Sumatif_2', 'Ganjil', 0, '', ''),
(235, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'Sumatif_3', 'Ganjil', 0, '', ''),
(236, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'Sumatif_3', 'Ganjil', 0, '', ''),
(237, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'Sumatif_4', 'Ganjil', 0, '', ''),
(238, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'Sumatif_4', 'Ganjil', 0, '', ''),
(239, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(240, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(241, '2023/2024', '400526', 'X', 'PPLG', '2', 'pkn', 'ASAS_test', 'Ganjil', 0, '', ''),
(242, '2023/2024', '400527', 'X', 'PPLG', '2', 'pkn', 'ASAS_test', 'Ganjil', 0, '', ''),
(243, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'Formatif', 'Ganjil', 0, '', ''),
(244, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'Formatif', 'Ganjil', 0, '', ''),
(245, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_1', 'Ganjil', 0, '', ''),
(246, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_1', 'Ganjil', 0, '', ''),
(247, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_2', 'Ganjil', 0, '', ''),
(248, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_2', 'Ganjil', 0, '', ''),
(249, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_3', 'Ganjil', 0, '', ''),
(250, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_3', 'Ganjil', 0, '', ''),
(251, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_4', 'Ganjil', 0, '', ''),
(252, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'Sumatif_4', 'Ganjil', 0, '', ''),
(253, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(254, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(255, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_indo', 'ASAS_test', 'Ganjil', 0, '', ''),
(256, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_indo', 'ASAS_test', 'Ganjil', 0, '', ''),
(257, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'Formatif', 'Ganjil', 0, '', ''),
(258, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'Formatif', 'Ganjil', 0, '', ''),
(259, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'Sumatif_1', 'Ganjil', 0, '', ''),
(260, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'Sumatif_1', 'Ganjil', 0, '', ''),
(261, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'Sumatif_2', 'Ganjil', 0, '', ''),
(262, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'Sumatif_2', 'Ganjil', 0, '', ''),
(263, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'Sumatif_3', 'Ganjil', 0, '', ''),
(264, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'Sumatif_3', 'Ganjil', 0, '', ''),
(265, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'Sumatif_4', 'Ganjil', 0, '', ''),
(266, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'Sumatif_4', 'Ganjil', 0, '', ''),
(267, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(268, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(269, '2023/2024', '400526', 'X', 'PPLG', '2', 'pjok', 'ASAS_test', 'Ganjil', 0, '', ''),
(270, '2023/2024', '400527', 'X', 'PPLG', '2', 'pjok', 'ASAS_test', 'Ganjil', 0, '', ''),
(271, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'Formatif', 'Ganjil', 0, '', ''),
(272, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'Formatif', 'Ganjil', 0, '', ''),
(273, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_1', 'Ganjil', 0, '', ''),
(274, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_1', 'Ganjil', 0, '', ''),
(275, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_2', 'Ganjil', 0, '', ''),
(276, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_2', 'Ganjil', 0, '', ''),
(277, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_3', 'Ganjil', 0, '', ''),
(278, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_3', 'Ganjil', 0, '', ''),
(279, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_4', 'Ganjil', 0, '', ''),
(280, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'Sumatif_4', 'Ganjil', 0, '', ''),
(281, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(282, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(283, '2023/2024', '400526', 'X', 'PPLG', '2', 'sejarah', 'ASAS_test', 'Ganjil', 0, '', ''),
(284, '2023/2024', '400527', 'X', 'PPLG', '2', 'sejarah', 'ASAS_test', 'Ganjil', 0, '', ''),
(285, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'Formatif', 'Ganjil', 0, '', ''),
(286, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'Formatif', 'Ganjil', 0, '', ''),
(287, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'Sumatif_1', 'Ganjil', 0, '', ''),
(288, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'Sumatif_1', 'Ganjil', 0, '', ''),
(289, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'Sumatif_2', 'Ganjil', 0, '', ''),
(290, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'Sumatif_2', 'Ganjil', 0, '', ''),
(291, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'Sumatif_3', 'Ganjil', 0, '', ''),
(292, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'Sumatif_3', 'Ganjil', 0, '', ''),
(293, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'Sumatif_4', 'Ganjil', 0, '', ''),
(294, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'Sumatif_4', 'Ganjil', 0, '', ''),
(295, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(296, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(297, '2023/2024', '400526', 'X', 'PPLG', '2', 'seni', 'ASAS_test', 'Ganjil', 0, '', ''),
(298, '2023/2024', '400527', 'X', 'PPLG', '2', 'seni', 'ASAS_test', 'Ganjil', 0, '', ''),
(299, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'Formatif', 'Ganjil', 0, '', ''),
(300, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'Formatif', 'Ganjil', 0, '', ''),
(301, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_1', 'Ganjil', 0, '', ''),
(302, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_1', 'Ganjil', 0, '', ''),
(303, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_2', 'Ganjil', 0, '', ''),
(304, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_2', 'Ganjil', 0, '', ''),
(305, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_3', 'Ganjil', 0, '', ''),
(306, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_3', 'Ganjil', 0, '', ''),
(307, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_4', 'Ganjil', 0, '', ''),
(308, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'Sumatif_4', 'Ganjil', 0, '', ''),
(309, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(310, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(311, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_jawa', 'ASAS_test', 'Ganjil', 0, '', ''),
(312, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_jawa', 'ASAS_test', 'Ganjil', 0, '', ''),
(313, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'Formatif', 'Ganjil', 0, '', ''),
(314, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'Formatif', 'Ganjil', 0, '', ''),
(315, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'Sumatif_1', 'Ganjil', 0, '', ''),
(316, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'Sumatif_1', 'Ganjil', 0, '', ''),
(317, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'Sumatif_2', 'Ganjil', 0, '', ''),
(318, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'Sumatif_2', 'Ganjil', 0, '', ''),
(319, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'Sumatif_3', 'Ganjil', 0, '', ''),
(320, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'Sumatif_3', 'Ganjil', 0, '', ''),
(321, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'Sumatif_4', 'Ganjil', 0, '', ''),
(322, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'Sumatif_4', 'Ganjil', 0, '', ''),
(323, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(324, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(325, '2023/2024', '400526', 'X', 'PPLG', '2', 'mtk', 'ASAS_test', 'Ganjil', 0, '', ''),
(326, '2023/2024', '400527', 'X', 'PPLG', '2', 'mtk', 'ASAS_test', 'Ganjil', 0, '', ''),
(327, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'Formatif', 'Ganjil', 0, '', ''),
(328, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'Formatif', 'Ganjil', 0, '', ''),
(329, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_1', 'Ganjil', 0, '', ''),
(330, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_1', 'Ganjil', 0, '', ''),
(331, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_2', 'Ganjil', 0, '', ''),
(332, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_2', 'Ganjil', 0, '', ''),
(333, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_3', 'Ganjil', 0, '', ''),
(334, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_3', 'Ganjil', 0, '', ''),
(335, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_4', 'Ganjil', 0, '', ''),
(336, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'Sumatif_4', 'Ganjil', 0, '', ''),
(337, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(338, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(339, '2023/2024', '400526', 'X', 'PPLG', '2', 'b_ing', 'ASAS_test', 'Ganjil', 0, '', ''),
(340, '2023/2024', '400527', 'X', 'PPLG', '2', 'b_ing', 'ASAS_test', 'Ganjil', 0, '', ''),
(341, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'Formatif', 'Ganjil', 0, '', ''),
(342, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'Formatif', 'Ganjil', 0, '', ''),
(343, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'Sumatif_1', 'Ganjil', 0, '', ''),
(344, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'Sumatif_1', 'Ganjil', 0, '', ''),
(345, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'Sumatif_2', 'Ganjil', 0, '', ''),
(346, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'Sumatif_2', 'Ganjil', 0, '', ''),
(347, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'Sumatif_3', 'Ganjil', 0, '', ''),
(348, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'Sumatif_3', 'Ganjil', 0, '', ''),
(349, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'Sumatif_4', 'Ganjil', 0, '', ''),
(350, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'Sumatif_4', 'Ganjil', 0, '', ''),
(351, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(352, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(353, '2023/2024', '400526', 'X', 'PPLG', '2', 'iftk', 'ASAS_test', 'Ganjil', 0, '', ''),
(354, '2023/2024', '400527', 'X', 'PPLG', '2', 'iftk', 'ASAS_test', 'Ganjil', 0, '', ''),
(355, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'Formatif', 'Ganjil', 0, '', ''),
(356, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'Formatif', 'Ganjil', 0, '', ''),
(357, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'Sumatif_1', 'Ganjil', 0, '', ''),
(358, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'Sumatif_1', 'Ganjil', 0, '', ''),
(359, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'Sumatif_2', 'Ganjil', 0, '', ''),
(360, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'Sumatif_2', 'Ganjil', 0, '', ''),
(361, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'Sumatif_3', 'Ganjil', 0, '', ''),
(362, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'Sumatif_3', 'Ganjil', 0, '', ''),
(363, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'Sumatif_4', 'Ganjil', 0, '', ''),
(364, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'Sumatif_4', 'Ganjil', 0, '', ''),
(365, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(366, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(367, '2023/2024', '400526', 'X', 'PPLG', '2', 'ipas', 'ASAS_test', 'Ganjil', 0, '', ''),
(368, '2023/2024', '400527', 'X', 'PPLG', '2', 'ipas', 'ASAS_test', 'Ganjil', 0, '', ''),
(369, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'Formatif', 'Ganjil', 0, '', ''),
(370, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'Formatif', 'Ganjil', 0, '', ''),
(371, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_1', 'Ganjil', 0, '', ''),
(372, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_1', 'Ganjil', 0, '', ''),
(373, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_2', 'Ganjil', 0, '', ''),
(374, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_2', 'Ganjil', 0, '', ''),
(375, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_3', 'Ganjil', 0, '', ''),
(376, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_3', 'Ganjil', 0, '', ''),
(377, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_4', 'Ganjil', 0, '', ''),
(378, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'Sumatif_4', 'Ganjil', 0, '', ''),
(379, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(380, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(381, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_tmi', 'ASAS_test', 'Ganjil', 0, '', ''),
(382, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_tmi', 'ASAS_test', 'Ganjil', 0, '', ''),
(383, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'Formatif', 'Ganjil', 0, '', ''),
(384, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'Formatif', 'Ganjil', 0, '', ''),
(385, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_1', 'Ganjil', 0, '', ''),
(386, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_1', 'Ganjil', 0, '', ''),
(387, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_2', 'Ganjil', 0, '', ''),
(388, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_2', 'Ganjil', 0, '', ''),
(389, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_3', 'Ganjil', 0, '', ''),
(390, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_3', 'Ganjil', 0, '', ''),
(391, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_4', 'Ganjil', 0, '', ''),
(392, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'Sumatif_4', 'Ganjil', 0, '', ''),
(393, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(394, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(395, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_oto', 'ASAS_test', 'Ganjil', 0, '', ''),
(396, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_oto', 'ASAS_test', 'Ganjil', 0, '', ''),
(397, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'Formatif', 'Ganjil', 0, '', ''),
(398, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'Formatif', 'Ganjil', 0, '', ''),
(399, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_1', 'Ganjil', 0, '', ''),
(400, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_1', 'Ganjil', 0, '', ''),
(401, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_2', 'Ganjil', 0, '', ''),
(402, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_2', 'Ganjil', 0, '', ''),
(403, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_3', 'Ganjil', 0, '', ''),
(404, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_3', 'Ganjil', 0, '', ''),
(405, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_4', 'Ganjil', 0, '', ''),
(406, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'Sumatif_4', 'Ganjil', 0, '', ''),
(407, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(408, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(409, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_te', 'ASAS_test', 'Ganjil', 0, '', ''),
(410, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_te', 'ASAS_test', 'Ganjil', 0, '', ''),
(411, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'Formatif', 'Ganjil', 0, '', ''),
(412, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'Formatif', 'Ganjil', 0, '', ''),
(413, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_1', 'Ganjil', 0, '', ''),
(414, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_1', 'Ganjil', 0, '', ''),
(415, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_2', 'Ganjil', 0, '', ''),
(416, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_2', 'Ganjil', 0, '', ''),
(417, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_3', 'Ganjil', 0, '', ''),
(418, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_3', 'Ganjil', 0, '', ''),
(419, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_4', 'Ganjil', 0, '', ''),
(420, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'Sumatif_4', 'Ganjil', 0, '', ''),
(421, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(422, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'ASAS_nontest', 'Ganjil', 0, '', ''),
(423, '2023/2024', '400526', 'X', 'PPLG', '2', 'dd_pplg', 'ASAS_test', 'Ganjil', 0, '', ''),
(424, '2023/2024', '400527', 'X', 'PPLG', '2', 'dd_pplg', 'ASAS_test', 'Ganjil', 0, '', '');

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

INSERT INTO `tb_siswa` (`id`, `nis`, `nisn`, `nama`, `kelas`, `jurusan`, `pemkelas`, `th_pelajaran`, `ttl`, `kelamin`, `agama`, `status`, `anak_ke`, `alamat_siswa`, `hp_siswa`, `asal_sekolah`, `tgl_terima`, `ayah`, `ibu`, `alamat_ortu`, `hp_ortu`, `kerja_ayah`, `kerja_ibu`, `nama_wali`, `alamat_wali`, `hp_wali`, `kerja_wali`, `semester`) VALUES
(1, 400446, 0, 'AFFILIA AYU NINGSIH', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(2, 400447, 0, 'AGUSTINA DAMAYANTI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(3, 400448, 0, 'ALDI MUSTOFA PRANATA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(4, 400449, 0, 'ALI CAKRA GOEVARA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(5, 400450, 0, 'ANANDA REVALIZA AKBAR', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(6, 400451, 0, 'ANDRE DWI SASONGKO', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(7, 400452, 0, 'ANNISATUL FADILAH', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(8, 400453, 0, 'AULIA PUTRI LARASATI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(9, 400454, 0, 'AYU NINGSIH', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(10, 400455, 0, 'CLLARISA MINDY APRILIA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(11, 400456, 0, 'DEA RAHMA SABILA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(12, 400457, 0, 'DELLA FITRISIA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(13, 400458, 0, 'DWI NUR AZIZAH', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(14, 400459, 0, 'DYAH KENANGA NINGRUM', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(15, 400460, 0, 'ENDANG MUSTIKASARI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(16, 400461, 0, 'FADHILAH RAHMAWATI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(17, 400462, 0, 'FITRI DWI RAMADHANI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(18, 400463, 0, 'HAIFA AYU ANJASENO', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(19, 400464, 0, 'HARYANTO SETIAWAN', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(20, 400465, 0, 'HAURA AIDA FATHIN', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(21, 400466, 0, 'IKHSAN RAMADHANI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(22, 400467, 0, 'INTAN BUNGA CINTIA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(23, 400468, 0, 'JAHRA ARDELIA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(24, 400469, 0, 'KESA ADINDA AMALIYA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(25, 400470, 0, 'LATIFAH AULIYA UNNISA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(26, 400471, 0, 'MELIANA SANTI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(27, 400472, 0, 'MIFTA NURMALLA AENI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(28, 400473, 0, 'MONIKA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(29, 400474, 0, 'NICOLA ADITYA PUTRA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(30, 400475, 0, 'NOVITA RACHMAWATI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(31, 400476, 0, 'RAHMAWATI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(32, 400477, 0, 'REHAN OKA MAHENDRA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(33, 400478, 0, 'RIFKI AHMAD FIRMANSYAH', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(34, 400479, 0, 'RISMA ANASTYA PUTRI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(35, 400480, 0, 'SINTIA NANDA TRI MELANI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(36, 400481, 0, 'SRI LESTARI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(37, 400482, 0, 'SYIFA LUTFIA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(38, 400483, 0, 'TIARA MAEMUNAH', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(39, 400484, 0, 'VIRDA HERA WATI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(40, 400485, 0, 'WITDIAH RETNO WATI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(41, 400486, 0, 'WULAN DAHRI', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(42, 400487, 0, 'ZIHNI SILVIATUL AZZAHRA', 'X', 'PPLG', '1', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(43, 400488, 0, 'ABDILLAH YAHYA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(44, 400489, 0, 'ADITYA WIJAYA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(45, 400490, 0, 'AIRIN NUR HAFIA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(46, 400491, 0, 'ANGGUN KARISMA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(47, 400492, 0, 'ANISA IRNAWATI AGUSTIN', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(48, 400493, 0, 'BAGAS RIZKY FEBIANO', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(49, 400494, 0, 'BAMBANG PRAYOGO', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(50, 400495, 0, 'BUNGA ZESILIA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(51, 400496, 0, 'CAHYA NIASIH', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(52, 400497, 0, 'CALISTA ARGENTINA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(53, 400498, 0, 'CHIKA MAYSA PUTRI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(54, 400499, 0, 'DIAH AYUNINGRUM', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(55, 400500, 0, 'DINDA LESTARI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(56, 400501, 0, 'DIVA JUNI ARIYANTI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(57, 400502, 0, 'DIVA SEKAR KEDATHON', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(58, 400503, 0, 'DWI NUR AISAH', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(59, 400504, 0, 'FADHIL ROSI ALFASICH', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(60, 400505, 0, 'FARISCA NELY AGUSTIN', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(61, 400506, 0, 'FIKKA IMAY SHERISTI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(62, 400507, 0, 'JESIKA YENI ERIYANTI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(63, 400508, 0, 'KAYLA DWI HASTITI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(64, 400509, 0, 'KHOZINATUL AIS SI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(65, 400510, 0, 'LINTANG DWI CAHYANI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(66, 400511, 0, 'LISA YULIANAH', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(67, 400512, 0, 'MAULANA ISHAQ', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(68, 400513, 0, 'MUHAMMAD NAZRIL MAULANA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(69, 400514, 0, 'NABILA FILZA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(70, 400515, 0, 'NADIA APRILIYANI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(71, 400516, 0, 'NASETIA LAURISTA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(72, 400517, 0, 'PUTRI SAGITA SEPTIANA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(73, 400518, 0, 'RAHMA AVIFDA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(74, 400519, 0, 'RIZKI RAHMAT DANI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(75, 400520, 0, 'SAFA NURSIAMI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(76, 400521, 0, 'SALWA AISSYABILA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(77, 400522, 0, 'SELVI SEVILATUL AZIZAH', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(78, 400523, 0, 'SHERA RAMADANI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(79, 400524, 0, 'SHILFI BUNGA VANIA', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(80, 400525, 0, 'WIDIYANA APRILLIYANI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(81, 400526, 0, 'WIHANI LUTFI HIDAYAH', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(82, 400527, 0, 'WILDAN AUFA RIZQI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(83, 400528, 0, 'WINARA FALIA PATI MUHID', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil'),
(84, 400529, 0, 'YENI KUSUMA WARDANI', 'X', 'PPLG', '2', '2023/2024', '-', '', '-', '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Ganjil');

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
(1, '2023/2024', 'Ganjil', 'Pemalang, 03 November 2023'),
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
-- Indexes for table `tb_jenispenilaian`
--
ALTER TABLE `tb_jenispenilaian`
  ADD PRIMARY KEY (`id_type`);

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
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

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
-- AUTO_INCREMENT for table `tb_jenispenilaian`
--
ALTER TABLE `tb_jenispenilaian`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
