-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2018 pada 07.06
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_loker_aris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_08_133947_create_customer_table', 1),
(4, '2018_05_08_134421_create_seller_table', 2),
(5, '2018_05_08_134823_create_paket_table', 3),
(6, '2018_05_08_135059_create_transaksi_table', 4),
(7, '2018_05_08_135307_create_setting_table', 5),
(8, '2018_05_08_141612_create_log_activity_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `nama_perusahaan`, `alamat`, `no_telpon`, `kota`, `created_at`, `updated_at`) VALUES
(1, 'PT. Empat Dara', 'Kebun Kawung', '08312312312', 'Bandung', '2018-05-09 00:18:07', '2018-05-09 00:18:07'),
(3, 'PT. Yossan', 'Buah Batu', '08123123123', 'Bandung', '2018-05-09 00:19:20', '2018-05-09 00:19:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_det_sewa`
--

CREATE TABLE `tb_det_sewa` (
  `id` int(11) NOT NULL,
  `id_sewa` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `ket_paket` enum('Lokal','Non-Lokal') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_det_sewa`
--

INSERT INTO `tb_det_sewa` (`id`, `id_sewa`, `id_paket`, `ket_paket`, `created_at`, `updated_at`) VALUES
(3, 5, 1, 'Lokal', '2018-05-10 02:56:24', '2018-05-10 02:56:24'),
(4, 5, 5, 'Non-Lokal', '2018-05-10 02:56:24', '2018-05-10 02:56:24'),
(5, 5, 6, 'Lokal', '2018-05-10 02:56:24', '2018-05-10 02:56:24'),
(6, 6, 1, 'Lokal', '2018-05-10 03:54:18', '2018-05-10 03:54:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log_activity`
--

CREATE TABLE `tb_log_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_table` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_log_activity`
--

INSERT INTO `tb_log_activity` (`id`, `activity`, `id_user`, `nama_table`, `created_at`, `updated_at`) VALUES
(3, 'Change Setting', '5', 'tb_setting', '2018-05-10 03:49:32', '2018-05-10 03:49:32'),
(4, 'Commiting new transaction', '5', 'tb_sewa', '2018-05-10 03:54:18', '2018-05-10 03:54:18'),
(5, 'Adding price', '5', 'tb_price', '2018-05-10 03:55:06', '2018-05-10 03:55:06'),
(6, 'Adding seller', '5', 'tb_seller', '2018-05-10 04:44:34', '2018-05-10 04:44:34'),
(7, 'Deleting seller', '5', 'tb_seller', '2018-05-10 04:44:45', '2018-05-10 04:44:45'),
(8, 'Updating seller', '5', 'tb_seller', '2018-05-10 04:57:19', '2018-05-10 04:57:19'),
(9, 'Updating seller', '5', 'tb_seller', '2018-05-10 04:59:17', '2018-05-10 04:59:17'),
(10, 'Updating seller', '5', 'tb_seller', '2018-05-10 04:59:23', '2018-05-10 04:59:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_paket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `non_local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `nama_paket`, `local`, `non_local`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Paket 1', '1000', '2000', 'Paket murah meriah', '2018-05-08 21:48:07', '2018-05-09 08:18:17'),
(5, 'Paket 2', '3000', '4000', 'Paket medium meriah', '2018-05-09 00:02:47', '2018-05-09 08:18:25'),
(6, 'Paket 3', '5000', '6000', 'Paket mahal', '2018-05-09 00:02:59', '2018-05-09 08:18:34'),
(7, 'Paket 4', '8000', '9000', 'Paket extra mahal', '2018-05-09 19:11:30', '2018-05-09 19:11:30'),
(9, 'Paket 5', '10000', '12000', 'Paket lumayan mahal', '2018-05-09 19:11:56', '2018-05-09 19:11:56'),
(10, 'Paket 6', '15000', '18000', 'Paket supreme', '2018-05-10 03:55:06', '2018-05-10 03:55:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_seller`
--

CREATE TABLE `tb_seller` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('Fulltime','Freelancer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('Admin','Owner','Operator') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_seller`
--

INSERT INTO `tb_seller` (`id`, `nama`, `category`, `email`, `password`, `no_telpon`, `alamat`, `aktif`, `created_at`, `updated_at`, `remember_token`, `level`) VALUES
(5, 'Aris', 'Fulltime', 'aris@admin.com', '$2y$10$dnjiSWkiKqT1RZy3RvfeT.rIn7f6T1lTkEnlDK8Nms9H2jbw.DV5e', '083817122289', 'Cilaku', 'Ya', '2018-05-08 23:01:50', '2018-05-08 23:01:50', 'QOVOxJDs5k2tfjm43DpvC9CK1zIa8i8Sazi5rs6RzgwhRmxCXLDWfZeSeB1Q', 'Admin'),
(6, 'Hasan', 'Fulltime', 'aris@owner.com', '$2y$10$EEN36SPWfWPjIDEse5rrrOu0Q7gXXRw4jrjf/QvVpWwVuvRVLbi/K', '087820007444', 'Cianjur', 'Ya', '2018-05-08 23:01:50', '2018-05-10 04:59:17', 'zDh3HUluTSj5KOonPOPD9OrU3CnoRO3dCsVkOBrtaIkofxm6cwyZfjr2kEEW', 'Owner'),
(8, 'Alfin', 'Freelancer', 'alfin@free.com', '$2y$10$fCbql.4hpBzQDe0cS.LCpuVn5XaGk7WVS6vCAupM5U1JIytLCrMv.', '0831123123132', 'Cibogo', 'Tidak', '2018-05-08 23:29:12', '2018-05-10 04:59:23', 'LpUTEaTAm0EK4LUnhVMtXvVVWYDEYzmNN8TGHABqYwXsBGonH0NXQcDolERt', 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `SLI` double NOT NULL,
  `SLJ` double NOT NULL,
  `SMS_domestic` double NOT NULL,
  `SMS_international` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `SLI`, `SLJ`, `SMS_domestic`, `SMS_international`, `created_at`, `updated_at`) VALUES
(2, 40, 90, 20, 400, '2018-05-10 03:25:47', '2018-05-10 03:49:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id`, `id_customer`, `created_at`, `updated_at`) VALUES
(5, '1', '2018-05-10 02:56:24', '2018-05-10 02:56:24'),
(6, '3', '2018-05-10 03:54:17', '2018-05-10 03:54:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_det_sewa`
--
ALTER TABLE `tb_det_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_log_activity`
--
ALTER TABLE `tb_log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_seller`
--
ALTER TABLE `tb_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_det_sewa`
--
ALTER TABLE `tb_det_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_log_activity`
--
ALTER TABLE `tb_log_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_seller`
--
ALTER TABLE `tb_seller`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
