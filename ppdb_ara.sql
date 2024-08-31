-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Agu 2024 pada 16.36
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
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kartu_pkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `peserta_ppdb_id`, `akte_kelahiran`, `kk`, `ktp_ortu`, `ijazah`, `kartu_pkh`, `pas_foto`, `created_at`, `updated_at`) VALUES
('1d9ab794-06d8-4f50-8902-9b545b9c23df', '7e67106a-7944-4fde-b17b-58eb1916c405', 'http://127.0.0.1:8001/uploads/berkas/akte/imronmf_1724614570.pdf', 'http://127.0.0.1:8001/uploads/berkas/kk/imronmf_1724614570.pdf', 'http://127.0.0.1:8001/uploads/berkas/ktp/imronmf_1724614570.pdf', 'http://127.0.0.1:8001/uploads/berkas/ijazah/imronmf_1724614570.pdf', 'http://127.0.0.1:8001/uploads/berkas/kartu/imronmf_1724614570.pdf', 'http://127.0.0.1:8001/uploads/berkas/pas_foto/imronmf_1724614570.jpeg', '2024-08-25 12:36:12', '2024-08-25 12:36:12'),
('3d2e80b9-e0ae-4fe5-85b9-c242ad3f3324', '2aa7cba3-6a3a-47a1-a934-3e8284231ba7', 'http://127.0.0.1:8001/uploads/berkas/akte/Rambo Tehok_1724688706.pdf', 'http://127.0.0.1:8001/uploads/berkas/kk/Rambo Tehok_1724688706.pdf', 'http://127.0.0.1:8001/uploads/berkas/ktp/Rambo Tehok_1724688706.pdf', 'http://127.0.0.1:8001/uploads/berkas/ijazah/Rambo Tehok_1724688706.pdf', 'http://127.0.0.1:8001/uploads/berkas/kartu/Rambo Tehok_1724688706.pdf', 'http://127.0.0.1:8001/uploads/berkas/pas_foto/Rambo Tehok_1724688706.jpg', '2024-08-26 09:11:46', '2024-08-26 09:11:46');

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
(9, '2024_08_24_133704_create_wali_table', 1);

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

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`id`, `peserta_ppdb_id`, `nama_ayah`, `nama_ibu`, `alamat_ayah`, `alamat_ibu`, `tempat_lahir_tanggal_lahir_ayah`, `tempat_lahir_tanggal_lahir_ibu`, `nik_ayah`, `nik_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `created_at`, `updated_at`) VALUES
('38498d1f-12f0-49b6-86b2-c51d24c8fcf7', '2aa7cba3-6a3a-47a1-a934-3e8284231ba7', 'Wak Saji', 'Heniiiiiiiiiiiiii', 'Asrama NANUNA', 'Seasrama sama wak SAJI', 'Boyolali, 12 Desember 1999', 'Bale Endah, 12 Desember 2002', '1234567890', '345678909876', 'NANUNA', 'SLB', 'NANUNA JUGA', 'Pustakawan', '2024-08-26 08:56:30', '2024-08-26 08:56:30'),
('a8466ef9-b538-4203-bff1-6c275be53139', '7e67106a-7944-4fde-b17b-58eb1916c405', 'Nama Ayah', 'Nama Ibu', 'Alamatnya disini aja', 'Alamatnya disini aja', 'Aceh, 20 Sep 1998', 'Aceh, 20 Agustus 1999', '123456789', '451345678', 'SMA', 'S1', 'Petani', 'Pegawai', '2024-08-25 14:23:32', '2024-08-25 14:23:32');

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
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `peserta_ppdb` (`id`, `user_id`, `name`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kk`, `nik`, `no_akte_kelahiran`, `status_pkh`, `asal_sekolah`, `agama`, `alamat`, `tinggal_dengan`, `anak_ke`, `jml_saudara_kandung`, `tinggi_badan`, `berat_badan`, `status`, `created_at`, `updated_at`) VALUES
('2aa7cba3-6a3a-47a1-a934-3e8284231ba7', 'd3847621-91e3-46dd-a55e-406239e72eb6', 'Rambo Tehok', 'laki-laki', 'Kamboja', '2016-10-26', '1991200188', '1991200188', '19912001888765', 'ada', 'TK Tadika Mesra', 'buddha', 'Suka Suka Dia', 'Ayah', '3', '10', 120.00, 80.00, 'diterima', '2024-08-26 08:53:50', '2024-08-26 09:13:27'),
('7e67106a-7944-4fde-b17b-58eb1916c405', 'a0ffcd98-69b0-4b9f-a767-46faf0c07687', 'imronmf', 'laki-laki', 'Aceh Tengah', '2024-08-08', '1234567890', '1234567890', '1234567890', 'ada', 'TK Harapan', 'islam', 'Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe Lhokseumawe', 'Ayah', '2', '2', 160.00, 50.00, 'verifikasi', '2024-08-25 11:51:15', '2024-08-25 15:11:27'),
('fcccc521-7e15-4bed-bc1d-e725671598bf', 'ad32971f-d794-4d9e-8f20-1876aab2a354', 'siswa 2', 'laki-laki', 'Aceh tengah', '2015-12-28', '1234567890987', '1234567890987', '1234567890987', 'ada', 'TK mana', 'islam', 'Alamatnya disini', 'Nenek', '3', '4', 142.00, 44.80, 'diterima', '2024-08-25 16:21:28', '2024-08-25 16:40:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('a0ffcd98-69b0-4b9f-a767-46faf0c07687', 'siswa', 'siswa@gmail.com', 'siswa', '$2y$12$s0FpBASvrYHAwneD30I9Au1BkMmXDCLACh3IdiHQc3xcThMQd.QDO', NULL, '2024-08-25 05:29:30', '2024-08-25 05:29:30'),
('ad32971f-d794-4d9e-8f20-1876aab2a354', 'siswa kedua', 'siswa2@gmail.com', 'siswa', '$2y$12$nuraKBw3yb1vBnSgQNWMUeu4/Htz0XSI/IWa.S1.UVkY1J8lq1jrK', NULL, '2024-08-25 16:18:18', '2024-08-25 16:18:18'),
('d16e3ea7-79e6-4ed7-8a45-a4126e0d3729', 'admin', 'admin@gmail.com', 'admin', '$2y$12$gLx5Tdf0sI4dGzk8h5AytOuO4.9v/wjUiMhoadY1K9AHLjg9G9F9i', NULL, '2024-08-25 05:29:30', '2024-08-25 05:29:30'),
('d3847621-91e3-46dd-a55e-406239e72eb6', 'RAMBO TEHOK', 'rambo@gmail.com', 'siswa', '$2y$12$A0rVE32DyIhN5VBz2Ip0oOEjBbsOQAIZakfcOa1WEf9vBVpeukbS2', NULL, '2024-08-26 08:49:56', '2024-08-26 08:49:56');

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
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id`, `peserta_ppdb_id`, `nama_wali`, `no_telp`, `tahun_lahir`, `pendidikan`, `pekerjaan`, `alamat`, `created_at`, `updated_at`) VALUES
('4bbc6753-a4f5-460f-bee6-b7a33e49c5ac', '2aa7cba3-6a3a-47a1-a934-3e8284231ba7', 'Halim', '082255678798', '2004', 'S1', 'Petarunk', 'Didepan Kos zumba', '2024-08-26 08:58:19', '2024-08-26 08:58:19'),
('992585f4-f467-4851-bc8b-7b4566490111', '7e67106a-7944-4fde-b17b-58eb1916c405', 'Nama Wali Imron', '082242807340', '2001', 'S1', 'Pegawai BUMN', 'alamat walinya suka sukanya', '2024-08-25 14:24:38', '2024-08-25 14:24:38');

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
