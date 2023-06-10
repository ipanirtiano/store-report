-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2021 at 06:59 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_users` varchar(10) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `id_users`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'USR-248046', 'vtamba@puspita.info', '$2y$10$XLkTjHg0vV6Q3vGe8zWz9eJ9o/ZmdeWv9jZpZgQUHDhHR9hs.TYpO', 'admin', '2021-03-04 07:45:16', '2021-03-06 10:37:10'),
(3, 'USR-012479', 'ipanirtiano@gmail.com', '$2y$10$SXemHlvz16.Dc.sK9fbNb.9FF5MSjY4vCiUagCfBwZKEybB5/KsBm', 'manager', '2021-03-06 10:41:17', '2021-03-06 10:41:17'),
(4, 'USR-257038', 'dwi@gmail.com', '$2y$10$xKFYEPyFSq9qU20Fgle2g.m3XVmg78Q9olAEnDRgCjkmjWMtD/Jq.', 'admin', '2021-03-09 08:04:47', '2021-03-09 08:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `nama_project` varchar(50) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `kode_transaksi`, `nama_project`, `tanggal`, `bulan`, `harga_modal`, `harga_jual`, `keuntungan`, `created_at`, `updated_at`) VALUES
(4, 'DSN-359146', 'DESIGN CARING HEARTS', '07-03-2021', 'Maret', 300000, 500000, 200000, '2021-03-07 06:55:54', '2021-03-07 06:55:54'),
(5, 'DSN-145078', 'DESIGN T-SHIRT', '12-03-2021', 'Maret', 1000000, 3500000, 2500000, '2021-03-12 19:47:25', '2021-03-12 19:47:25'),
(6, 'DSN-046345', 'DESIGN T-SHIRT', '13-03-2021', 'Maret', 800000, 3500000, 2700000, '2021-03-13 23:28:12', '2021-03-13 23:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-03-04-132037', 'App\\Database\\Migrations\\Auth', 'default', 'App', 1614864816, 1),
(2, '2021-03-04-133541', 'App\\Database\\Migrations\\Users', 'default', 'App', 1614865065, 2),
(3, '2021-03-04-165002', 'App\\Database\\Migrations\\Store', 'default', 'App', 1614876755, 3),
(4, '2021-03-06-164255', 'App\\Database\\Migrations\\Store', 'default', 'App', 1615049087, 4),
(5, '2021-03-06-164255', 'App\\Database\\Migrations\\Design', 'default', 'App', 1615051223, 5),
(6, '2021-03-06-172039', 'App\\Database\\Migrations\\Workshop', 'default', 'App', 1615051260, 6),
(7, '2021-03-06-173719', 'App\\Database\\Migrations\\Pemasukan', 'default', 'App', 1615056369, 7),
(8, '2021-03-08-142344', 'App\\Database\\Migrations\\Pengeluaran', 'default', 'App', 1615213581, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `income` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `kode_transaksi`, `tanggal`, `bulan`, `dept`, `income`, `created_at`, `updated_at`) VALUES
(6, 'STR-138168', '07-03-2021', 'Maret', 'store', 150000, '2021-03-07 06:55:06', '2021-03-07 06:55:06'),
(8, 'DSN-359146', '07-03-2021', 'Maret', 'design', 200000, '2021-03-07 06:55:54', '2021-03-07 06:55:54'),
(10, 'WSP-268245', '07-03-2021', 'Maret', 'workshop', 500000, '2021-03-07 06:57:38', '2021-03-07 06:57:38'),
(11, 'WSP-378369', '07-03-2021', 'Maret', 'workshop', 500000, '2021-03-07 06:57:48', '2021-03-07 06:57:48'),
(12, 'STR-169023', '07-03-2021', 'Maret', 'store', 500000, '2021-03-07 07:13:58', '2021-03-07 07:13:58'),
(13, 'WSP-678568', '07-03-2021', 'Maret', 'workshop', 1500000, '2021-03-07 07:36:51', '2021-03-07 07:36:51'),
(14, 'STR-146289', '08-03-2021', 'Maret', 'store', 150000, '2021-03-08 02:51:18', '2021-03-08 02:51:18'),
(15, 'WSP-678069', '08-03-2021', 'Maret', 'workshop', 1500000, '2021-03-08 22:29:08', '2021-03-08 22:29:08'),
(17, 'DSN-145078', '12-03-2021', 'Maret', 'design', 2500000, '2021-03-12 19:47:25', '2021-03-12 19:47:25'),
(18, 'STR-389479', '13-03-2021', 'Maret', 'store', 1700000, '2021-03-13 23:27:39', '2021-03-13 23:27:39'),
(19, 'DSN-046345', '13-03-2021', 'Maret', 'design', 2700000, '2021-03-13 23:28:12', '2021-03-13 23:28:12'),
(20, 'WSP-248348', '13-03-2021', 'Maret', 'workshop', 2250000, '2021-03-13 23:28:47', '2021-03-13 23:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `ket_biaya` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode_transaksi`, `tanggal`, `bulan`, `ket_biaya`, `jumlah`, `created_at`, `updated_at`) VALUES
(2, 'TR-135017', '08-03-2021', 'Maret', 'IPL ', 1000000, '2021-03-08 21:41:32', '2021-03-13 23:25:39'),
(3, 'TR-147568', '08-03-2021', 'Maret', 'IPL ', 820000, '2021-03-08 21:41:58', '2021-03-08 22:32:56'),
(5, 'TR-468017', '13-03-2021', 'Maret', 'LISTRIK', 750000, '2021-03-13 23:34:23', '2021-03-13 23:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `kode_transaksi`, `nama_barang`, `kategori`, `tanggal`, `bulan`, `harga_modal`, `harga_jual`, `keuntungan`, `created_at`, `updated_at`) VALUES
(4, 'STR-138168', 'B2FIVE BV-W1 01 SCOPEDOG ATM-09-ST II', 'Model Kit', '07-03-2021', 'Maret', 300000, 450000, 150000, '2021-03-07 06:55:06', '2021-03-07 06:55:06'),
(5, 'STR-169023', 'B2FIVE BV-W1 01 SCOPEDOG ATM-09-ST III', 'Model Kit', '07-03-2021', 'Maret', 500000, 1000000, 500000, '2021-03-07 07:13:58', '2021-03-07 07:13:58'),
(6, 'STR-146289', 'B2FIVE BV-W1 01 SCOPEDOG ATM-09-ST II', 'Action Figure', '08-03-2021', 'Maret', 450000, 600000, 150000, '2021-03-08 02:51:18', '2021-03-08 02:51:18'),
(7, 'STR-389479', 'SEGA SONIC THE HEDGEHOG PREMIUM FIGURE 20TH ANNIVE', 'Diecast', '13-03-2021', 'Maret', 2500000, 4200000, 1700000, '2021-03-13 23:27:39', '2021-03-13 23:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `departemen` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_user`, `nama_lengkap`, `email`, `phone`, `departemen`, `created_at`, `updated_at`) VALUES
(1, 'USR-248046', 'Anastasia Haryanti M.Farm', 'vtamba@puspita.info', '089602745843', 'Store', '2021-03-04 07:45:15', '2021-03-06 10:37:10'),
(3, 'USR-012479', 'Ipan Irtiano', 'ipanirtiano@gmail.com', '089602745633', 'Design', '2021-03-06 10:41:17', '2021-03-06 10:41:17'),
(4, 'USR-257038', 'DWI DZULQHORI', 'dwi@gmail.com', '089602745844', 'Design', '2021-03-09 08:04:47', '2021-03-09 08:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `nama_project` varchar(50) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `kode_transaksi`, `nama_project`, `tanggal`, `bulan`, `harga_modal`, `harga_jual`, `keuntungan`, `created_at`, `updated_at`) VALUES
(1, 'WSP-128015', 'RAKIT LINING TOP COAT WHITE BASE', '06-02-2021', 'Februari', 500000, 1000000, 500000, '2021-03-07 01:01:58', '2021-03-07 01:01:58'),
(6, 'WSP-268245', 'RAKIT LINING TOP COAT MUSAI', '07-03-2021', 'Maret', 500000, 1000000, 500000, '2021-03-07 06:57:38', '2021-03-07 06:57:38'),
(7, 'WSP-378369', 'RAKIT LINING TOP COAT WHITE BASE', '07-03-2021', 'Maret', 500000, 1000000, 500000, '2021-03-07 06:57:48', '2021-03-07 06:57:48'),
(8, 'WSP-678568', 'DESIGN T-SHIRT', '07-03-2021', 'Maret', 1000000, 2500000, 1500000, '2021-03-07 07:36:51', '2021-03-07 07:36:51'),
(9, 'WSP-678069', 'RAKIT LINING TOP COAT MUSAI', '08-03-2021', 'Maret', 1000000, 2500000, 1500000, '2021-03-08 22:29:08', '2021-03-08 22:29:08'),
(11, 'WSP-248348', 'RAKIT LINING TOP COAT MUSAI', '13-03-2021', 'Maret', 750000, 3000000, 2250000, '2021-03-13 23:28:47', '2021-03-13 23:28:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
