-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 08:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wirajaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahans`
--

CREATE TABLE `bahans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahans`
--

INSERT INTO `bahans` (`id`, `nama_bahan`, `ukuran`, `harga`, `stok`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Besi Hollow 15x15', '1mm x 6M', 70000, 20, 1, '2022-07-12 15:38:37', '2022-07-19 15:38:37'),
(2, 'Besi Ulir ', '1mm x 6M', 50000, 20, 1, '2022-08-17 12:29:27', '2022-08-12 12:29:27'),
(3, 'gggggg', '293823982', 23893283, 40, 1, '2022-08-09 06:34:04', '2022-08-09 06:36:10'),
(4, 'Besi Strip 20x15', '12 x 7 M', 200000, 1000, 1, '2022-08-24 08:27:16', '2022-08-24 08:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `detil_bahans`
--

CREATE TABLE `detil_bahans` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) DEFAULT NULL,
  `bahan_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_item` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detil_bahans`
--

INSERT INTO `detil_bahans` (`id`, `produk_id`, `bahan_id`, `jumlah_item`, `created_at`, `updated_at`, `total_harga`) VALUES
(1, 1, '1,1', '10,20', '2022-08-11 00:22:32', '2022-08-23 07:45:49', 2800000),
(2, 1, '1,2', '6,9', '2022-08-11 00:51:24', '2022-08-23 21:37:14', 1470000),
(5, 1, '1,4', '10,20', '2022-08-24 08:31:09', '2022-08-24 08:31:09', 2800000);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_06_084607_create_kategoris_table', 1),
(6, '2022_07_27_131126_create_produks_table', 1),
(7, '2022_07_28_140310_create_bahans_table', 1),
(8, '2022_08_02_083945_create_pesanans_table', 1),
(9, '2022_08_02_085241_create_detil_bahans_table', 1),
(10, '2022_08_18_034548_create_pembayarans_table', 2);

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
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `pesanan_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_upload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `pesanan_id`, `user_id`, `bank`, `bukti_upload`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'BCA', '1.jpg', 'Terkonfirmasi', '2022-07-12 15:38:37', '2022-08-24 09:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `panjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lebar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `produk_id`, `panjang`, `lebar`, `kuantitas`, `harga_total`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '200', '500', '1', '20000', 'Sedang Dikerjakan', '', '2022-07-12 15:38:37', '2022-07-19 15:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jasa` bigint(20) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `foto_produk`, `harga_jasa`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Teralis Jendela', '20220803102154.jpg', 100000, 'Bagus Top Cer', '2022-07-12 15:38:37', '2022-07-19 15:38:37'),
(2, 'Lemari', '20220803102154.jpg', 100000, 'Lorem Ipsum', '2022-08-04 14:59:59', '2022-07-19 15:38:37'),
(4, 'Meja', '20220803104439.jpg', 1200000, 'Awawaokwaokwaokwaokwkawkoaokwa asa sa sa sa sasa s', '2022-08-17 12:29:27', '2022-08-12 12:29:27'),
(7, 'Tralis Pintu asasas', 'C:\\xampp\\tmp\\phpE92C.tmp', 100000, 'as asasa sas as as a', '2022-08-24 08:48:20', '2022-08-24 08:48:20'),
(8, 'Teralis qwqwq', 'C:\\xampp\\tmp\\php9101.tmp', 10000, 'qwqw qwq wq wq wq wq', '2022-08-24 08:50:08', '2022-08-24 08:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pelanggan',
  `notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'VD6rWrpXN8hx2CiV9VbHzijNSrrQWcylora5uevO.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `notelp`, `alamat`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin 1', 'admin@admin.com', NULL, '$2y$10$jjQoJf6MBCknGmIKPmDKCeKrTnUW1hTF28iB3tcNltHi2N89Z3enC', 'admin', '0895410933236', 'Jl. Umalas II No. 36B, Kerobokan Kelod, Kuta Utara, Badung', 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png', NULL, '2022-08-03 04:08:21', '2022-08-03 04:08:21'),
(2, 'Ary', 'arywirawans@gmail.com', NULL, '$2y$10$OraB7zjRQqFdURFWHDswF.60OJLEDZUveKVcIa1q07dscY1PegNMq', 'pelanggan', '089621521521', 'Jl. Muding Sari', 'profile-images/SNNwjU8DaVB37x1LpEx7YOCntbXJcLgIDnxMsjFR.png', NULL, '2022-08-05 08:08:06', '2022-08-05 08:08:06'),
(3, 'Budi', 'budi@gmail.com', NULL, '$2y$10$CM4tvwVG0n8o/CmX3D50ROWBHk/DXioNOG.epYGm9pzXR8FSTvbEa', 'pelanggan', '08891212121212', 'Jl. Muding Sari', 'profile-images/nWmPQdHwjceJZn8Y5H7L9K98TK10HE2qjj2lqyXL.png', NULL, '2022-08-05 08:10:25', '2022-08-05 08:10:25'),
(4, 'maman', 'maman@gmail.com', NULL, '$2y$10$QmlpQMK1yY1WQY37rY4g7OM5ngsuM3IsbdDGYVeMwlPiQDB2Y86uW', 'admin', '0985748391937', 'jalan mamankus', 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png', NULL, '2022-08-09 05:50:11', '2022-08-09 05:50:11'),
(5, 'jole', 'makus@gmail.com', NULL, '$2y$10$QMQWJq9Nr48ARAxha.lfgeQk.JgBZasNLEDtzR2CHX0FevjvS8UfO', 'pelanggan', '0987654567890', 'jalan jalan', 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png', NULL, '2022-08-14 02:32:31', '2022-08-14 02:32:31'),
(6, 'user', 'user@gmail.com', NULL, '$2y$10$MrHB53E/enSRvVa25dX0NO.K9HVGOomTzI2MYoJ3CjFk9XDc7kU56', 'pelanggan', '09876543456789', 'jalan mamana', 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png', NULL, '2022-08-23 04:53:15', '2022-08-23 04:53:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahans`
--
ALTER TABLE `bahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bahans_user_id_foreign` (`user_id`);

--
-- Indexes for table `detil_bahans`
--
ALTER TABLE `detil_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_user_id_foreign` (`user_id`),
  ADD KEY `pembayarans_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
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
-- AUTO_INCREMENT for table `bahans`
--
ALTER TABLE `bahans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detil_bahans`
--
ALTER TABLE `detil_bahans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahans`
--
ALTER TABLE `bahans`
  ADD CONSTRAINT `bahans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembayarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `produk_id` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
