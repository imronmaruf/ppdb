-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Sep 2024 pada 22.47
-- Versi server: 8.0.30
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_ara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_ppdb_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akte_kelahiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kartu_pkh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pas_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `peserta_ppdb_id`, `akte_kelahiran`, `kk`, `ktp_ortu`, `ijazah`, `kartu_pkh`, `pas_foto`, `created_at`, `updated_at`) VALUES
('84617054-953e-43e8-9457-e02ad9f8826e', '248b4d45-91f4-4d9a-9861-94fb0b1c8bbb', 'http://127.0.0.1:8001/uploads/berkas/akte/admin11tes_66d630211789a.pdf', 'http://127.0.0.1:8001/uploads/berkas/kk/admin11tes_66d630211831d.pdf', 'http://127.0.0.1:8001/uploads/berkas/ktp/admin11tes_66d6302118826.pdf', 'http://127.0.0.1:8001/uploads/berkas/ijazah/admin11tes_66d6302118c39.pdf', 'http://127.0.0.1:8001/uploads/berkas/kartu/admin11tes_66d6302118ff9.pdf', 'http://127.0.0.1:8001/uploads/berkas/pas_foto/admin11tes_66d6302119540.jpeg', '2024-09-02 14:37:37', '2024-09-02 14:37:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint UNSIGNED NOT NULL,
  `foto_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `foto_url`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8001/uploads/fasilitas/admin_66d62ee0c2358.jpg', '2024-09-02 14:32:16', '2024-09-02 14:32:16'),
(2, 'http://127.0.0.1:8001/uploads/fasilitas/admin_66d62ee0c2d49.jpg', '2024-09-02 14:32:16', '2024-09-02 14:32:16'),
(3, 'http://127.0.0.1:8001/uploads/fasilitas/admin_66d62ee0c30c2.jpg', '2024-09-02 14:32:16', '2024-09-02 14:32:16'),
(4, 'http://127.0.0.1:8001/uploads/fasilitas/admin_66d62ee0c34cb.jpg', '2024-09-02 14:32:16', '2024-09-02 14:32:16'),
(5, 'http://127.0.0.1:8001/uploads/fasilitas/admin_66d62ee0c388b.png', '2024-09-02 14:32:16', '2024-09-02 14:32:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `foto_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('akademik','non-akademik') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `foto_url`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f03c7dc6.jpg', 'akademik', '2024-09-02 14:32:51', '2024-09-02 14:32:51'),
(2, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f03c87ec.jpg', 'akademik', '2024-09-02 14:32:51', '2024-09-02 14:32:51'),
(3, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f03c8e48.jpg', 'akademik', '2024-09-02 14:32:51', '2024-09-02 14:32:51'),
(4, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f1e6c70b.png', 'non-akademik', '2024-09-02 14:33:18', '2024-09-02 14:33:18'),
(5, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f1e6d0e6.png', 'non-akademik', '2024-09-02 14:33:18', '2024-09-02 14:33:18'),
(6, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f1e6d4ae.png', 'non-akademik', '2024-09-02 14:33:18', '2024-09-02 14:33:18'),
(7, 'http://127.0.0.1:8001/uploads/galeri/admin_66d62f1e6d9a7.png', 'non-akademik', '2024-09-02 14:33:18', '2024-09-02 14:33:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_08_24_133702_create_peserta_ppdb_table', 1),
(7, '2024_08_24_133703_create_berkas_table', 1),
(8, '2024_08_24_133703_create_ortu_table', 1),
(9, '2024_08_24_133704_create_wali_table', 1),
(10, '2024_09_02_171936_create_tentang_kontak_table', 1),
(11, '2024_09_02_183038_create_fasilitas_table', 1),
(12, '2024_09_02_203530_create_galeri_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_ppdb_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir_tanggal_lahir_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir_tanggal_lahir_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_ppdb`
--

CREATE TABLE `peserta_ppdb` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_akte_kelahiran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pkh` enum('ada','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pkh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` enum('islam','katolik','protestan','hindu','buddha','konghucu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggal_dengan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_saudara_kandung` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_badan` double(5,2) NOT NULL,
  `berat_badan` double(5,2) NOT NULL,
  `status` enum('verifikasi','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peserta_ppdb`
--

INSERT INTO `peserta_ppdb` (`id`, `user_id`, `name`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kk`, `nik`, `no_akte_kelahiran`, `status_pkh`, `no_pkh`, `asal_sekolah`, `agama`, `alamat`, `tinggal_dengan`, `anak_ke`, `jml_saudara_kandung`, `tinggi_badan`, `berat_badan`, `status`, `created_at`, `updated_at`) VALUES
('248b4d45-91f4-4d9a-9861-94fb0b1c8bbb', 'aadf18ce-0dce-4039-8926-619fa18c8eba', 'admin11tes', 'laki-laki', 'Aceh Tengah', '2024-09-06', '1234567890', '1234567890', '1234567890', 'ada', '1234567890', 'TK Harapan', 'islam', 'asaas', 'Ayah', '2', '2', 120.00, 20.00, 'verifikasi', '2024-09-02 14:36:54', '2024-09-02 14:36:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kontak`
--

CREATE TABLE `tentang_kontak` (
  `id` bigint UNSIGNED NOT NULL,
  `konten_tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tentang_kontak`
--

INSERT INTO `tentang_kontak` (`id`, `konten_tentang`, `foto`, `alamat`, `no_telp`, `wa_link`, `created_at`, `updated_at`) VALUES
(1, 'SD Negeri 18 Dewantara adalah', 'http://127.0.0.1:8001/landing/img/admin_66d62eb99c654.jpg', 'Ulee', '082233334444', 'https://api.whatsapp.com/send/?phone=082233334444&text&type=phone_number&app_absent=0', '2024-09-02 14:31:37', '2024-09-02 14:31:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa','kepsek') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('1039dbc5-25ff-416a-99b0-0201d87bb58a', 'kepsek', 'kepsek@gmail.com', 'kepsek', '$2y$12$DHeQLtL9ztLgJKc5KQENf.iHM57wmd5OnpNvWvcFkId8MX7ID7Czy', NULL, '2024-09-02 14:28:32', '2024-09-02 14:28:32'),
('126ccf9c-3c87-47c7-ba4a-0fc220c5a27c', 'admin', 'admin@gmail.com', 'admin', '$2y$12$hw4BKlTdzws.79R3a2I76ufHgAMDGaGe2BOWq7BlPQ8ZNVq8kn5ly', NULL, '2024-09-02 14:28:32', '2024-09-02 14:28:32'),
('aadf18ce-0dce-4039-8926-619fa18c8eba', 'siswa', 'siswa@gmail.com', 'siswa', '$2y$12$8DTufRPp.xam0vGErzuXNOjdR9CUGyDB86AeI9xP55ey2.qW0TO5K', NULL, '2024-09-02 14:28:32', '2024-09-02 14:28:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE `wali` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peserta_ppdb_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berkas_peserta_ppdb_id_foreign` (`peserta_ppdb_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ortu_peserta_ppdb_id_foreign` (`peserta_ppdb_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `peserta_ppdb`
--
ALTER TABLE `peserta_ppdb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_ppdb_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tentang_kontak`
--
ALTER TABLE `tentang_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wali_peserta_ppdb_id_foreign` (`peserta_ppdb_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tentang_kontak`
--
ALTER TABLE `tentang_kontak`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_peserta_ppdb_id_foreign` FOREIGN KEY (`peserta_ppdb_id`) REFERENCES `peserta_ppdb` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD CONSTRAINT `ortu_peserta_ppdb_id_foreign` FOREIGN KEY (`peserta_ppdb_id`) REFERENCES `peserta_ppdb` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peserta_ppdb`
--
ALTER TABLE `peserta_ppdb`
  ADD CONSTRAINT `peserta_ppdb_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `wali_peserta_ppdb_id_foreign` FOREIGN KEY (`peserta_ppdb_id`) REFERENCES `peserta_ppdb` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
