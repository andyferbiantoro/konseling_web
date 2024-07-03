-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2024 pada 10.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konseling_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) NOT NULL,
  `isi_feedback` varchar(255) NOT NULL,
  `id_user_guru` bigint(20) NOT NULL,
  `id_user_siswa` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `isi_feedback`, `id_user_guru`, `id_user_siswa`, `created_at`, `updated_at`) VALUES
(3, 'Sangat Baik', 6, 11, '2024-07-02 00:57:00', '2024-07-02 00:57:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_konselings`
--

CREATE TABLE `guru_konselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `status_kepegawaian` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru_konselings`
--

INSERT INTO `guru_konselings` (`id`, `nama`, `nip`, `status_kepegawaian`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'joko', '123456', 'aktif', 3, '2024-06-08 03:33:18', '2024-06-08 03:33:18'),
(3, 'suherman', '1234567', 'aktif', 4, '2024-06-08 03:38:54', '2024-06-08 03:38:54'),
(5, 'khoirul anam', '12345678', 'aktif', 6, '2024-06-08 20:58:28', '2024-06-08 20:58:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(2, 'VIIB', '2024-06-08 05:04:35', '2024-06-08 05:04:35'),
(3, 'VIIA', '2024-06-08 05:04:40', '2024-06-08 05:04:40'),
(4, 'VIIC', '2024-06-08 20:42:24', '2024-06-08 20:42:24'),
(5, 'VIID', '2024-06-08 20:59:07', '2024-06-08 20:59:07'),
(6, 'VIIE', '2024-06-28 00:27:14', '2024-06-28 00:27:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2024_06_08_042551_create_guru_konselings_table', 1),
(34, '2024_06_08_043208_create_murids_table', 1),
(35, '2024_06_08_043230_create_pelanggarans_table', 1),
(36, '2024_06_08_090406_create_points_table', 1),
(37, '2024_06_08_113443_create_kelas_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggarans`
--

CREATE TABLE `pelanggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `id_point` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggaran` text NOT NULL,
  `kategori_pelanggaran` varchar(255) DEFAULT NULL,
  `point_pelanggaran` int(11) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `points`
--

INSERT INTO `points` (`id`, `nama_pelanggaran`, `kategori_pelanggaran`, `point_pelanggaran`, `perihal`, `created_at`, `updated_at`) VALUES
(10, 'mengmabil barang yang bukan miliknya', 'Berat', 90, 'Perihal Larangan Siswa', '2024-06-29 01:52:57', '2024-06-29 01:52:57'),
(11, 'Hadir selambar lambatnya 10 menit sebelum pelajaran dimulai', 'Ringan', NULL, 'Perihal Masuk Sekolah', '2024-07-03 00:31:19', '2024-07-03 00:31:19'),
(12, 'Narget temen / orang lain', 'Sedang', 25, 'Perihal Larangan Siswa', '2024-07-03 00:33:12', '2024-07-03 00:33:58'),
(14, 'Sepatu warna hitam polos', 'Ringan', 10, 'Perihal Pakaian Seragam Siswa', '2024-07-03 00:38:59', '2024-07-03 00:38:59'),
(16, 'Siswa dapat mminjam buku diperpustakaan sekolah', NULL, NULL, 'Perihal Hak Siswa', '2024-07-03 00:49:21', '2024-07-03 00:49:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nis` varchar(225) NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nama`, `alamat`, `nis`, `id_kelas`, `id_user`, `created_at`, `updated_at`) VALUES
(9, 'Dono Pradono', 'Banyuwangi', '111111', 6, 11, '2024-06-30 20:06:34', '2024-06-30 20:06:34'),
(10, 'joko', 'Banyuwangi', '222222', 6, 12, '2024-06-30 20:06:44', '2024-06-30 20:06:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tata_tertibs`
--

CREATE TABLE `tata_tertibs` (
  `id` bigint(20) NOT NULL,
  `tata_tertib` varchar(255) NOT NULL,
  `id_point` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tata_tertibs`
--

INSERT INTO `tata_tertibs` (`id`, `tata_tertib`, `id_point`, `created_at`, `updated_at`) VALUES
(2, 'siswa wajib datang tepat waktu', NULL, '2024-06-14 06:05:09', '2024-06-14 06:05:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$BmVTVCuOK2jF4yZtuqPd8.1EI1iudQl/hsI3wTOKv39rSSt38.y3.', 'superadmin', NULL, NULL, NULL),
(3, 'joko', 'joko@gmail.com', NULL, '$2y$10$z1po52zxuEilt4d7hzszp.yVgWYjHZPQl34vFcwmvfwRkSeaT5QKK', 'guru_konseling', NULL, '2024-06-08 03:33:18', '2024-06-08 03:33:18'),
(4, 'suherman', 'suherman@gmail.com', NULL, '$2y$10$BmVTVCuOK2jF4yZtuqPd8.1EI1iudQl/hsI3wTOKv39rSSt38.y3.', 'guru_konseling', NULL, '2024-06-08 03:38:54', '2024-06-08 03:38:54'),
(6, 'irul', 'andyfebri999@gmail.com', NULL, '$2y$10$DZCjF91eRyzqib5N3WDO8uayMkQkIagsfTFtdcUeJ.PrSb2mip9UC', 'guru_konseling', NULL, '2024-06-08 20:58:28', '2024-06-08 20:58:28'),
(7, '222222', NULL, NULL, '$2y$10$gXLS5hMTMB5cwVf.IJFVye3PEPrPNoREr3YwuRaKs5lbSW1R6BaR.', 'siswa', NULL, '2024-06-13 20:00:23', '2024-06-13 20:11:04'),
(11, '111111', NULL, NULL, '$2y$10$9KPYO6jPoLN2Y7NtbjF.Lepd.X8EhuGvTk40MSShGk4nz6zvu6sui', 'siswa', NULL, '2024-06-30 20:06:34', '2024-06-30 20:06:34'),
(12, '222222', NULL, NULL, '$2y$10$c6OLa6ve3Sf0M0kYay8PiePLN9Dn6g22irj/jU.OTpnOGpRmTuxuu', 'siswa', NULL, '2024-06-30 20:06:44', '2024-06-30 20:06:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru_konselings`
--
ALTER TABLE `guru_konselings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pelanggarans`
--
ALTER TABLE `pelanggarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_point` (`id_point`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tata_tertibs`
--
ALTER TABLE `tata_tertibs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_point` (`id_point`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `guru_konselings`
--
ALTER TABLE `guru_konselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pelanggarans`
--
ALTER TABLE `pelanggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tata_tertibs`
--
ALTER TABLE `tata_tertibs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
