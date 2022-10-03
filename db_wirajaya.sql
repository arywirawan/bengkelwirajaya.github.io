-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 09:29 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

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
(5, 'Besi Strip 3mm', '30mm x 6 M', 68000, 50, 1, '2022-08-27 09:06:29', '2022-08-30 11:23:33'),
(6, 'Besi Nako 8mm', '6 M', 30000, 50, 1, '2022-08-27 09:08:44', '2022-08-30 11:23:21'),
(7, 'Besi Strip 4mm', '19mm x 6 M', 58000, 50, 1, '2022-08-27 09:11:16', '2022-08-30 11:23:27');

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
(14, 14, '5,7', '5,5', '2022-08-29 07:08:48', '2022-08-29 07:08:48', 630000),
(15, 15, '6,7', '5,5', '2022-08-29 07:09:09', '2022-08-29 07:09:09', 440000),
(16, 17, '6', '5', '2022-08-29 09:55:41', '2022-08-29 09:55:41', 150000);

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
(10, 22, 9, 'BCA', '20220830184024.jpg', 'Belum Terkonfirmasi', '2022-08-30 10:40:25', '2022-08-30 11:24:33');

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
  `produk_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(22, 9, '15,14', '1600,1200', '600,500', '1,2', '2000000', 'Sedang Dikerjakan', 'Belum Diterima', '2022-08-30 10:38:22', '2022-08-30 10:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jasa` bigint(20) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `foto_produk`, `harga_jasa`, `deskripsi`, `created_at`, `updated_at`) VALUES
(14, 'Teralis Jendela Model A (1200mm x 500mm)', '20220827160701.png', 100000, '<pre><strong>Material yang digunakan :</strong><br />Besi Strip lebar 30 mm dan tebal 3 mm<br />Besi Nako Polos 8 mm<br /><br />Harga diatas merupakan harga jasa pembuatan belum termasuk harga bahan baku. Maksimal ukuran 1200 mm x 500 mm<br />Pengukuran kusen jendela bisa dilakukan sendiri. Akurasi ukuran harus tepat.<br /><br />Rekomendasi ukuran yang sesuai :<br />800 mm x 400 mm sampai dengan 1200mm x 500 mm</pre>', '2022-08-27 08:07:01', '2022-08-27 08:07:01'),
(15, 'Teralis Jendela Model A (1600mm x 600mm)', '20220827162031.png', 100000, '<pre><strong>Material yang digunakan :</strong><br />Besi Strip lebar 30 mm dan tebal 3 mm<br />Besi Nako Polos 8 mm<br /><br />Harga diatas merupakan harga jasa pembuatan belum termasuk harga bahan baku. Maksimal ukuran 1200 mm x 500 mm<br />Pengukuran kusen jendela bisa dilakukan sendiri. Akurasi ukuran harus tepat.<br /><br />Rekomendasi ukuran yang sesuai :<br />1200 mm x 400 mm sampai dengan 1600mm x 600 mm</pre>', '2022-08-27 08:20:31', '2022-08-27 08:20:31'),
(16, 'Teralis Jendela Model A (2000mm x 600mm)', '20220827162127.png', 100000, '<pre><strong>Material yang digunakan :</strong><br />Besi Strip lebar 30 mm dan tebal 3 mm<br />Besi Nako Polos 8 mm<br /><br />Harga diatas merupakan harga jasa pembuatan belum termasuk harga bahan baku. Maksimal ukuran 1200 mm x 500 mm<br />Pengukuran kusen jendela bisa dilakukan sendiri. Akurasi ukuran harus tepat.<br /><br />Rekomendasi ukuran yang sesuai :<br />1600 mm x 500 mm sampai dengan 2000mm x 600 mm</pre>', '2022-08-27 08:21:27', '2022-08-27 08:21:27'),
(17, 'Teralis Jendela Model B (1200mm x 500mm)', '20220827171723.png', 100000, '<p><strong>Material yang digunakan :</strong><br />Besi Strip lebar 30 mm dan tebal 3 mm<br />Besi Nako Polos 8 mm<br /><br />Harga diatas merupakan harga jasa pembuatan belum termasuk harga bahan baku. Maksimal ukuran 1200 mm x 500 mm<br />Pengukuran kusen jendela bisa dilakukan sendiri. Akurasi ukuran harus tepat.<br /><br />Rekomendasi ukuran yang sesuai :<br />1600 mm x 500 mm sampai dengan 2000mm x 600 mm</p>', '2022-08-27 09:17:23', '2022-08-27 09:17:23');

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$jjQoJf6MBCknGmIKPmDKCeKrTnUW1hTF28iB3tcNltHi2N89Z3enC', 'admin', '0895410933236', 'Jl. Umalas II No. 36B, Kerobokan Kelod, Kuta Utara, Badung', 'profile-images/k6CJP6A22BWLdnEMyjb0UPrDQc5FGXzGp4iTa54I.jpg', NULL, '2022-08-03 04:08:21', '2022-08-27 19:22:15'),
(2, 'Ary', 'arywirawans@gmail.com', NULL, '$2y$10$OraB7zjRQqFdURFWHDswF.60OJLEDZUveKVcIa1q07dscY1PegNMq', 'pelanggan', '089621521521', 'Jl. Muding Sari', 'profile-images/Master.png', NULL, '2022-08-05 08:08:06', '2022-08-05 08:08:06'),
(3, 'Budi', 'budi@gmail.com', NULL, '$2y$10$CM4tvwVG0n8o/CmX3D50ROWBHk/DXioNOG.epYGm9pzXR8FSTvbEa', 'pelanggan', '08891212121212', 'Jl. Muding Sari', 'profile-images/Master.png', NULL, '2022-08-05 08:10:25', '2022-08-05 08:10:25'),
(4, 'maman', 'maman@gmail.com', NULL, '$2y$10$QmlpQMK1yY1WQY37rY4g7OM5ngsuM3IsbdDGYVeMwlPiQDB2Y86uW', 'admin', '0985748391937', 'jalan mamankus', 'profile-images/hiVAAgmzVJDb4imzfwBm0KhIVnfobbOij7cDv8si.png', NULL, '2022-08-09 05:50:11', '2022-08-09 05:50:11'),
(9, 'I Kadek Surya Indrawan', 'kadeksuryaindrawan@gmail.com', NULL, '$2y$10$1xJ2MXkHljKnO3RGrOyZ4OCSjCYnxDHr2js/r68Dkti1bWnaChDNK', 'pelanggan', '08970945425', 'Denpasar', 'profile-images/edBw5cxqXgqSEacT1apDVZhOxandUQkm4HBTMCTl.jpg', NULL, '2022-08-29 06:38:40', '2022-08-29 06:38:40'),
(10, 'kadek', 'kadek@gmail.com', NULL, '$2y$10$.Njx1jbZnX2ZifcUFJcxs.dRSirNBWUsR40TT.ghLUoinvE7tUmyu', 'pelanggan', '0819289321', 'Pemogan', 'profile-images/ZWX66lcfEltXvnexLWuSVZbdKSbv8ui7IwouXSae.jpg', NULL, '2022-08-30 08:22:31', '2022-08-30 08:22:31');

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
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detil_bahans`
--
ALTER TABLE `detil_bahans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
