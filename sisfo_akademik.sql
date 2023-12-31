-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_matapelajaran` int(10) NOT NULL,
  `materi_pembahasan` varchar(256) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tanggal`, `id_matapelajaran`, `materi_pembahasan`, `id_kelas`, `id_user`) VALUES
(1, '2023-08-12', 2, 'Bilangan Bulat, Bilangan Prima, Perpangkatan dan Faktorial', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama_dosen`, `alamat`, `jenis_kelamin`, `email`, `telp`, `photo`) VALUES
(2, '123459015', 'Dedi Waluyo Wijoyo', 'Bekasi', 'Laki-laki', 'doniwaluyo@contoh.com', '0214565326', 'profil2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `pesan`) VALUES
(1, 'Erik', 'erik@gmail.com', 'Mohon informasi pendaftaran mahasiswa baru');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `judul_website` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `judul_website`, `alamat`, `email`, `telp`) VALUES
(1, 'UNIVERSITAS PEKANBARU', 'Jalan Ahmad Dahlan No. 88', 'universitas.pekanbaru@gmail.com', '0216767677');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `judul_informasi` varchar(50) NOT NULL,
  `isi_informasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `icon`, `judul_informasi`, `isi_informasi`) VALUES
(1, 'fas fa-university', 'Penerimaan Mahasiswa Baru', 'Penerimaan mahasiswa baru gelombang 4 dibuka mulai 31 Juni 2020 sampai 31 Agustus 2020'),
(2, 'fas fa-wallet', 'Pembayaran Uang Kuliah', 'Pembayaran uang kuliah mulai tanggal 01 Juli 2020 sampai 01 Agustus 2020'),
(3, 'fas fa-user-graduate', 'Jadwal Wisuda', 'Jadwal pelaksanaan wisuda gelombang 1 tanggal 23 Oktoberr 2020'),
(5, 'fas fa-file-invoice', 'Bimbingan Skripsi', 'Jadwal bimbingan skripsi atau tugas akhir mulai dilaksanakan 21 Juni 2020');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(3) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'IK', 'Ilmu Komputer'),
(8, 'EB', 'Ekonomi dan Bisinis'),
(9, 'KB', 'Komunikasi dan Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `nama_jurusan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `nama_kelas`, `nama_jurusan`) VALUES
(1, 'A1', 'Reguler A1', NULL),
(2, 'A2', 'Reguler A2', NULL),
(3, 'B1', 'Reguler B1', NULL),
(4, 'B2', 'Reguler B2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_thn_akad` int(10) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `id_thn_akad`, `nim`, `kode_matakuliah`, `nilai`) VALUES
(2, 2, '12171353', 'MKU04', 'A'),
(3, 2, '12171355', 'MKU04', 'C'),
(4, 1, '12171301', 'MKB1', 'A'),
(5, 1, '12171301', 'MKB2', 'A'),
(6, 1, '12171301', 'MKB3', 'A'),
(7, 1, '12171301', 'MKB4', 'A'),
(8, 1, '12171301', 'MKB6', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nama_lengkap` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `nama_prodi` varchar(120) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama_lengkap`, `alamat`, `email`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nama_prodi`, `photo`) VALUES
(3, '12171301', 'Darmawan', 'Jakarta', 'darmawan@contoh.com', '021010234', 'Bandung', '1990-12-12', 'Laki-laki', 'Sistem Informasi', 'profil7.jpg'),
(4, '12171302', 'Dimas Indra', 'Bekasi', 'dimas@contoh.com', '08821212341', 'Cikarang', '1991-11-11', 'Laki-laki', 'Sistem Informasi', 'profil8.jpg'),
(5, '12171303', 'Budi Hartono', 'Cilacap', 'budi@contoh.com', '08821212322', 'Cilacap', '1990-10-10', 'Laki-laki', 'Sistem Informasi', 'profil6.jpg'),
(6, '12171304', 'Juleha', 'Karawang', 'juleha@contoh.com', '0877989898', 'Karawang', '1991-09-09', 'Laki-laki', 'Sistem Informasi', 'profil9.jpg'),
(7, '12171305', 'Firman Sinaga', 'Jakarta', 'firman@contoh.com', '089896754', 'Jakarta', '1991-08-07', 'Laki-laki', 'Sistem Informasi', 'profil4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `sks` int(5) NOT NULL,
  `semester` int(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `nama_matakuliah`, `sks`, `semester`, `nama_prodi`) VALUES
('MKB1', 'Logika dan Algoritma', 3, 1, 'Sistem Informasi'),
('MKB2', 'Pengantar TIK', 2, 1, 'Sistem Informasi'),
('MKB3', 'Struktur Data', 3, 2, 'Sistem Informasi'),
('MKB4', 'Perancangan Basis Data', 3, 3, 'Sistem Informasi'),
('MKB5', 'Interaksi Manusia dan Komputer', 2, 1, 'Sistem Informasi'),
('MKB6', 'Web Programming', 3, 3, 'Sistem Informasi'),
('MKK2', 'Bahasa Inggris', 3, 2, 'Sistem Informasi'),
('MKK3', 'Statistika Deskriptif', 2, 2, 'Sistem Informasi'),
('MPK1', 'Pendidikan Pancasila', 2, 1, 'Sistem Informasi'),
('MPK2', 'Pendidikan Agama', 2, 1, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(11) NOT NULL,
  `kode_matapelajaran` varchar(10) NOT NULL,
  `nama_matapelajaran` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `kode_matapelajaran`, `nama_matapelajaran`, `kelas`) VALUES
(2, 'MTK', 'Matematika', 'Reguler A1'),
(3, 'IND', 'Bahasa Indonesia', 'Reguler A1'),
(4, 'ENG', 'Bahasa Inggris', 'Reguler A1'),
(5, 'IPA', 'Ilmu Pengetahuan Alam', 'Reguler A1'),
(6, 'IPS', 'Ilmu Pengetahuan Sosial', 'Reguler A1'),
(7, 'PAI', 'Pendidikan Agama Islam', 'Reguler A1');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `nama_pengajar` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nama_pengajar`, `alamat`, `jenis_kelamin`, `email`, `telp`, `photo`) VALUES
(1, 'Dedi Waluyo Wijoyo', 'Bekasi', 'Laki-laki', 'doniwaluyo@contoh.com', '0214565326', 'profil2.jpg'),
(2, 'Pajeet Patel', 'Prindavan', 'Laki-laki', 'pajeetpatel@gmail.com', '0', 'profil41.jpg'),
(3, 'Shelvie Neyman', 'Bogor', 'Perempuan', 'shelvieneyman@gmail.com', '0', 'profil91.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `w1` int(11) NOT NULL,
  `w2` int(11) NOT NULL,
  `w3` int(11) NOT NULL,
  `w4` int(11) NOT NULL,
  `w5` int(11) NOT NULL,
  `w6` int(11) NOT NULL,
  `w7` int(11) NOT NULL,
  `w8` int(11) NOT NULL,
  `total_realisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_siswa`, `id_kelas`, `bulan`, `tahun`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `total_realisasi`) VALUES
(22, 2, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(23, 3, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(24, 4, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(25, 5, 1, 'Agustus', '2023', 1, 1, 0, 0, 0, 0, 0, 0, '2'),
(26, 6, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(27, 7, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(28, 8, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(29, 9, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(30, 10, 1, 'Agustus', '2023', 1, 1, 1, 1, 1, 1, 1, 1, '8'),
(31, 11, 1, 'Agustus', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(32, 2, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(33, 3, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(34, 4, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(35, 5, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(36, 6, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(37, 7, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(38, 8, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(39, 9, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(40, 10, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0'),
(41, 11, 1, 'September', '2023', 0, 0, 0, 0, 0, 0, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(20) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `nama_jurusan`) VALUES
(1, 'MI', 'Manajemen Informatika', 'Ilmu Komputer'),
(3, 'AK', 'Akutansi', 'Ekonomi dan Bisinis'),
(4, 'SI', 'Sastra Inggris', 'Komunikasi dan Bahasa'),
(5, 'SI', 'Sistem Informasi', 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(120) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `tempat_lahir` varchar(120) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(120) NOT NULL,
  `photo` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama_lengkap`, `kelas`, `alamat`, `email`, `telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `photo`) VALUES
(2, 'Rivaldy Fauzan', 'Reguler A1', 'Banjaran', 'rifalous@gmail.com', '081223651657', 'Banjaran', '2023-08-11', 'Laki-laki', 'bfc09a91.jpg'),
(3, 'Kurnia Halim', 'Reguler A1', 'Ciapus', 'halimkurnia@gmail.com', '0', 'Bandung', '2011-06-20', 'Laki-laki', 'default.jpg'),
(4, 'Nadine Hasanah', 'Reguler A1', 'Banjaran', 'nadine@gmail.com', '0', 'Bandung', '2011-11-15', 'Perempuan', 'default.jpg'),
(5, 'Asman Prasetya', 'Reguler A1', 'Sindangpanon', 'asman@gmail.com', '0', 'Bandung', '2012-10-16', 'Laki-laki', 'default.jpg'),
(6, 'Natalia Yulianti', 'Reguler A1', 'Banjaran', 'nataliyu@gmail.com', '0', 'Bandung', '2011-12-07', 'Laki-laki', 'default.jpg'),
(7, 'Rahman Natsir', 'Reguler A1', 'Kiangroke', 'rahmann@gmail.com', '0', 'Bandung', '2012-09-15', 'Laki-laki', 'default.jpg'),
(8, 'Ella Rahmawati', 'Reguler A1', 'Mekarjaya', 'ellarahma@gmail.com', '0', 'Bandung', '2011-03-01', 'Perempuan', 'default.jpg'),
(9, 'Cecep Hidayat', 'Reguler A1', 'Banjaran', 'cecep@gmail.com', '0', 'Bandung', '2011-05-20', 'Laki-laki', 'default.jpg'),
(10, 'Adhiarja Wibowo', 'Reguler A1', 'Tarajusari', 'adwi@gmail.com', '0', 'Bandung', '2010-07-28', 'Laki-laki', 'default.jpg'),
(11, 'Vivi Yolanda', 'Reguler A1', 'Kamasan', 'viviyolan@gmail.com', '0', 'Bandung', '2010-05-03', 'Perempuan', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_thn_akad` int(11) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_thn_akad`, `tahun_akademik`, `semester`, `status`) VALUES
(1, '2018/2019', 'Ganjil', 'Aktif'),
(2, '2018/2019', 'Genap', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kampus`
--

CREATE TABLE `tentang_kampus` (
  `id` int(11) NOT NULL,
  `sejarah` varchar(1000) NOT NULL,
  `visi` varchar(250) NOT NULL,
  `misi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang_kampus`
--

INSERT INTO `tentang_kampus` (`id`, `sejarah`, `visi`, `misi`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi vero aliquid necessitatibus expedita sint maxime mollitia animi ut dolor non fuga quasi sapiente, alias error, voluptatum eum optio? Animi, distinctio! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad exercitationem officiis doloribus consectetur, laboriosam molestias, sit nihil cupiditate ipsam ea aliquid nisi! Doloribus sapiente dolore odit exercitationem alias. Adipisci, velit.', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae nisi nulla cupiditate similique rem sed ad dicta. Quod dolorum numquam tenetur quaerat, quis nam beatae perspiciatis ipsam ullam, assumenda dicta! Lorem ipsum dolor sit amet consect');

-- --------------------------------------------------------

--
-- Table structure for table `transkrip_nilai`
--

CREATE TABLE `transkrip_nilai` (
  `id_transkrip` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_matakuliah` varchar(15) NOT NULL,
  `nilai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transkrip_nilai`
--

INSERT INTO `transkrip_nilai` (`id_transkrip`, `nim`, `kode_matakuliah`, `nilai`) VALUES
(1, '12171353', 'MKU04', 'A'),
(2, '12171301', 'MKB1', 'A'),
(3, '12171301', 'MKB2', 'A'),
(4, '12171301', 'MKB3', 'A'),
(5, '12171301', 'MKB4', 'A'),
(6, '12171301', 'MKB6', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','pengajar','orangtua') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `id_child` int(11) DEFAULT NULL,
  `id_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`, `blokir`, `id_child`, `id_session`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@contoh.com', 'admin', 'N', 0, ''),
(3, 'azkiya', '7af1c8118ee8743c9a469567ba4a5bcc', 'azkiya@gmail.com', 'admin', 'N', 0, 'd41d8cd98f00b204e9800998ecf8427e'),
(4, 'waluyo', '0e8008f6f69308f53390e2ecd9ff659f', 'dedi_waluyo@gmail.com', 'pengajar', 'N', 0, 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'budi@gmail.com', 'orangtua', 'N', 6, 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_thn_akad`);

--
-- Indexes for table `tentang_kampus`
--
ALTER TABLE `tentang_kampus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  ADD PRIMARY KEY (`id_transkrip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_thn_akad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tentang_kampus`
--
ALTER TABLE `tentang_kampus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transkrip_nilai`
--
ALTER TABLE `transkrip_nilai`
  MODIFY `id_transkrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
