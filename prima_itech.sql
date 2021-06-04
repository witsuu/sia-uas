-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 03:34 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prima_itech`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` bigint(20) NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `kode_akun`, `nama_akun`, `created_at`, `updated_at`) VALUES
(1, 1110, 'Kas', '2021-05-29 05:03:26', '2021-05-29 05:03:26'),
(2, 1120, 'Piutang', '2021-05-29 05:34:14', '2021-06-04 12:33:16'),
(3, 1130, 'Asuransi dibayar dimuka', '2021-05-29 05:35:05', '2021-05-29 05:35:05'),
(4, 1140, 'Perlengkapan service', '2021-05-29 05:35:33', '2021-05-29 05:35:33'),
(5, 1150, 'Perlengkapan kantor', '2021-05-29 05:45:57', '2021-05-29 05:45:57'),
(6, 1210, 'Peralatan service', '2021-05-29 05:47:28', '2021-05-29 05:47:28'),
(7, 1211, 'Akumulasi penyusutan peralatan service', '2021-05-29 05:47:54', '2021-05-29 05:47:54'),
(8, 1230, 'Gedung', '2021-05-29 05:48:09', '2021-05-29 05:48:09'),
(9, 1231, 'Akumulasi penyusutan gedung', '2021-05-29 05:48:31', '2021-05-29 05:48:31'),
(10, 1240, 'Tanah', '2021-05-29 05:48:49', '2021-05-29 05:48:49'),
(11, 2110, 'Hutang usaha', '2021-05-29 05:49:02', '2021-05-29 05:49:02'),
(12, 2120, 'Hutang gaji', '2021-05-29 05:49:23', '2021-05-29 05:49:23'),
(13, 3110, 'Modal', '2021-05-29 05:49:43', '2021-05-29 05:49:43'),
(14, 3120, 'Prive', '2021-05-29 05:49:59', '2021-05-29 05:49:59'),
(15, 4110, 'Pendapatan usaha', '2021-05-29 05:50:16', '2021-05-29 05:50:16'),
(16, 4210, 'Pendapatan lain-lain', '2021-05-29 05:50:46', '2021-05-29 05:50:46'),
(17, 6110, 'Beban asuransi', '2021-05-29 05:50:59', '2021-05-29 05:50:59'),
(18, 6120, 'Beban perlengkapan service', '2021-05-29 05:51:23', '2021-05-29 05:51:23'),
(19, 6130, 'Beban perlengkapan kantor', '2021-05-29 05:51:50', '2021-05-29 05:51:50'),
(20, 6140, 'Beban penyusutan peralatan service', '2021-05-29 05:52:16', '2021-05-29 05:52:16'),
(21, 6150, 'Beban penyusutan peralatan kantor', '2021-05-29 05:52:37', '2021-05-29 05:52:37'),
(22, 6160, 'Beban penyusutan gedung', '2021-05-29 05:54:56', '2021-05-29 05:54:56'),
(23, 6170, 'Beban listrik', '2021-05-29 05:55:12', '2021-05-29 05:55:12'),
(24, 6171, 'Beban air', '2021-05-29 05:55:24', '2021-05-29 05:55:24'),
(25, 6172, 'Baban telepon', '2021-05-29 05:55:42', '2021-05-29 05:55:42'),
(26, 6173, 'Beban wifi', '2021-05-29 05:57:00', '2021-05-29 05:57:00'),
(27, 6180, 'Beban gaji karyawan', '2021-05-29 05:57:20', '2021-05-29 05:57:20'),
(28, 6181, 'Biaya bonnus karyawan', '2021-05-29 05:57:46', '2021-05-29 05:57:46'),
(29, 6190, 'Biaya lain-lain', '2021-05-29 05:58:01', '2021-05-29 05:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_29_092616_create_akun_table', 1),
(5, '2021_05_29_141205_create_transaksi_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_akun` bigint(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jenis_saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `kode_akun`, `tanggal_transaksi`, `jenis_saldo`, `saldo`, `created_at`, `updated_at`) VALUES
(6, 1, 1120, '2021-05-27', 'debit', 1000000, '2021-05-29 08:05:42', '2021-05-29 08:05:42'),
(7, 1, 1150, '2021-05-28', 'debit', 1000000, '2021-06-03 13:34:48', '2021-06-03 13:34:48'),
(8, 1, 1120, '2021-05-31', 'debit', 500000, '2021-06-03 13:35:30', '2021-06-03 13:35:30'),
(10, 1, 1240, '2021-05-11', 'debit', 750000, '2021-06-03 14:28:43', '2021-06-04 13:22:45'),
(11, 1, 1150, '2021-05-04', 'debit', 57500000, '2021-06-03 14:29:35', '2021-06-04 13:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$bQVGQs1m8Rod0JOmBZNB.eHStZwqrFDcJYXyIFYRQusy7.aRS/rKq', 'karyawan', NULL, '2021-05-29 03:08:53', '2021-05-29 03:08:53'),
(2, 'owner', 'owner@mail.com', NULL, '$2y$10$bQVGQs1m8Rod0JOmBZNB.eHStZwqrFDcJYXyIFYRQusy7.aRS/rKq', 'owner', NULL, '2021-06-04 11:44:27', '2021-06-04 11:44:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
