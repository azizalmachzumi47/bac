-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2025 pada 11.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bac`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `about_us` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `company`, `about_us`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'FreeCOOL BAC', 'Merupakan UMKM mitra terpercaya dalam layanan\r\npenyedia, perawatan dan pembersihan AC serta kulkas.\r\nSejak pendirian kami, kami telah berkomitmen untuk\r\nmemberikan layanan berkualitas tinggi dan solusi terbaik\r\nuntuk kebutuhan perawatan peralatan pendingin Anda.\r\n\r\nTim kami yang berpengalaman dan terampil memiliki\r\nkeahlian teknis yang bersertifikasi, jujur, ramah dan\r\nterpercaya. Harga yang terjangkau dan memberikan nilai\r\nterbaik merupakan komitmen kami kepada konsumen.\r\nIntegrasi dan profesionalisme menjadi landasan dalam\r\nsetiap interaksi dengan konsumen. Kami terus berinovasi\r\ndalam layanan dan proses kami.', 'freecoolbac2@gmail.com', '083878238593', 'Jl. Kerkof No. 12 Leuwigajah, Cimahi Selatan, Kota Cimahi', '2025-05-20 21:22:15', '2025-05-23 00:26:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `address_client` varchar(300) NOT NULL,
  `client_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `client_name`, `address_client`, `client_logo`, `created_at`, `updated_at`) VALUES
(1, 'VIVO CERVICE CENTER UBER', 'Ujung Berung', '1747905055client_logo.jpeg', '2025-05-22 02:10:55', '2025-05-22 02:24:22'),
(3, 'PT. Surya Abadi Isolasi', 'Xyz', '1747905931client_logo.png', '2025-05-22 02:25:31', '2025-05-22 02:25:31'),
(4, 'Robotika Nusantara', 'Xyk', '1747905977client_logo.png', '2025-05-22 02:26:17', '2025-05-22 02:26:17'),
(5, 'DePasteur Hospitality', 'Bandung', '1747906019client_logo.png', '2025-05-22 02:26:59', '2025-05-22 02:26:59'),
(6, 'AEGIPIX', 'Xcv', '1747906059client_logo.png', '2025-05-22 02:27:39', '2025-05-22 02:27:39'),
(7, 'BOARDRIDERS', 'Xcv', '1747906121client_logo.png', '2025-05-22 02:28:41', '2025-05-22 02:28:41'),
(8, 'PT. Arka Aftariz Persada', 'Zxd', '1747906211client_logo.png', '2025-05-22 02:30:11', '2025-05-22 02:30:11');

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
-- Struktur dari tabel `image_activity`
--

CREATE TABLE `image_activity` (
  `id_imageactivity` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `activity_photosbac` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_activity`
--

INSERT INTO `image_activity` (`id_imageactivity`, `id_service`, `activity_photosbac`, `created_at`, `updated_at`) VALUES
(3, 3, '1747888074_Struktur Pstechnology.jpg', '2025-05-21 21:27:54', '2025-05-21 21:27:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_17_032912_create_table_users_role', 1),
(5, '2025_02_17_033358_create_table_users_menu', 1),
(6, '2025_02_17_033644_create_table_users_sub_menu', 1),
(7, '2025_02_17_034020_create_table_users_access_menu', 1),
(8, '2025_02_21_022410_create_personal_access_tokens_table', 2),
(9, '2025_05_21_040508_create_about_table', 3),
(10, '2025_05_21_043931_create_vision_mission_table', 4),
(11, '2025_05_21_050914_create_service_table', 5),
(12, '2025_05_21_063506_create_service_table', 6),
(13, '2025_05_21_075035_create_image_activity_table', 7),
(14, '2025_05_22_050812_create_superiority_table', 8),
(15, '2025_05_22_084945_create_client_table', 9),
(16, '2025_05_28_070452_create_product_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `stock`, `price`, `product_description`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'AC Split AQA-KCR9VRAL', 10, 6415000, 'BTU/h\r\n9.100 (1.700~9.500)\r\nDaya Masukan (Watt)\r\n870 (220~1.100)\r\nRefrigerant\r\nR32', '1748418123_product_image.png', '2025-05-28 00:42:03', '2025-05-28 00:42:03'),
(3, 'AC Panasonic 2 PK', 10, 10000000, 'AC Split\r\n2 PK\r\nCS-PN18UKJ + CU-PN18UKJ (Indoor + Outdoor)\r\nNanoe Teknologi\r\nKapasitas Pendingin: 18.000 Btu/h\r\nPenghilang Kelembapan: 2.9 L/h\r\nSirkulasi Udara: 19.7 m³/ menit\r\nTingkat Kebisingan: 45/39 dB-A (indoor); 54 dB-A (outdoor)\r\nRefrigerant: R32\r\nDaya Listrik: 1660 Watt\r\nUnit Utama', '1748421206_product_image.jpg', '2025-05-28 01:33:26', '2025-05-28 01:33:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `decryption` varchar(1000) NOT NULL,
  `address` varchar(300) NOT NULL,
  `activity_date` date NOT NULL,
  `activity_photos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id_service`, `category`, `decryption`, `address`, `activity_date`, `activity_photos`, `created_at`, `updated_at`) VALUES
(1, 'Air Condition Section', 'Xyz klxs', 'Kota Bandung', '2025-05-21', '1747812858activity_photos.png', '2025-05-21 00:08:14', '2025-05-21 00:34:18'),
(3, 'Refrigerator Section', 'Xyzbz', 'Kota CImahi', '2025-05-22', '1747887747_activity_photos.png', '2025-05-21 21:22:28', '2025-05-21 21:22:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DRbuoClTy3kvNZqwsNJi4MnMiX91Vj6yXgtowKky', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmQ0RElXd0dCNjlOQWNDUURjdzU0cnFZY29uUkI2anhzOGc4RkI3MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1748424020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `superiority`
--

CREATE TABLE `superiority` (
  `id_superiority` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `decryption` varchar(255) NOT NULL,
  `image_superiority` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `superiority`
--

INSERT INTO `superiority` (`id_superiority`, `title`, `decryption`, `image_superiority`, `created_at`, `updated_at`) VALUES
(1, 'Berpengalaman', 'Tim kami berpengalaman dan terampil, serta memiliki keahlian teknis yang bersertifikasi, jujur, ramah dan terpercaya.', '1747902890image_superiority.png', '2025-05-22 01:00:21', '2025-05-22 01:37:01'),
(3, 'Mengutamakan Pelanggan', 'Layanan pelanggan adalah prioritas utama kami, dan kami berkomitmen untuk memberikan pengalaman pelanggan yang memuaskan.', '1747903580image_superiority.png', '2025-05-22 01:46:20', '2025-05-22 01:46:20'),
(4, 'Harga Terjangkau', 'Menawarkan harga yang kompetitif dan transparan, serta memberikan nilai tambah melalui layanan unggulan.', '1747903655image_superiority.png', '2025-05-22 01:47:35', '2025-05-22 01:47:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(512) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `image`, `remember_token`, `google_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2025-02-20 01:17:20', '$2y$12$R96B.1mxU71LU2JIaAVExu7ATl3Vk0.9fEAPFsKEjcr7dF/9J9v7.', 1, 'default.png', NULL, '', '2025-02-20 01:17:20', '2025-02-20 01:39:28'),
(2, 'Users', 'users@gmail.com', '2025-02-20 01:17:20', '$2y$12$QLo8jAWz2ox25c06MuZVlel99f3ovKS/wWlLFJHPf.cFlB5HsFA3C', 2, 'default.png', 'jKRtKG5aBa2FnmGRWQNqZjbky99pfUNdNe8l633HKdNuYJDRjreoXPAmPvZs', '', '2025-02-20 01:17:20', '2025-02-20 21:22:53'),
(6, 'Test User', 'testuser@gmail.com', NULL, '$2y$12$uFL/RKlRO6eO7sXq8z/7ueLWrAyypMElsqXUuHp7f96UgZujmitf.', 2, 'default.png', NULL, '', '2025-02-20 21:10:00', '2025-02-20 21:10:00'),
(10, 'berkah kayu jaya', 'berkahkayujaya77@gmail.com', '2025-02-27 05:15:55', '$2y$12$wnyVivkegf7ZGU6IBl17S.FpaKd9IFDUJeCQEAEJnf.bP5aLfn5qu', 2, 'https://lh3.googleusercontent.com/a/ACg8ocIuqu3jZc8f7v2lIj6dUiiHwt_EEYzY-TAUhPTMAcen56-E1A=s96-c', NULL, '109133510949050460247', '2025-02-26 22:15:55', '2025-02-26 22:15:55'),
(11, 'Ars Home', 'arshome05@gmail.com', '2025-02-27 05:26:04', '$2y$12$H1MDa22gPjE6bxR82uoGduicthtHpn3aJ9eil5Llb1MUf8eLG/VkS', 2, 'https://lh3.googleusercontent.com/a/ACg8ocKcENgHbUvjwzVWErBX0iN3oQuFcWG5IwpLqUPvBRO0ORbhcg=s96-c', NULL, '104994611981399137062', '2025-02-26 22:26:04', '2025-03-03 22:10:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_access_menu`
--

INSERT INTO `users_access_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2025-02-20 08:22:00', NULL),
(2, 2, 1, '2025-02-20 08:22:00', NULL),
(3, 1, 3, '2025-02-20 08:22:35', NULL),
(4, 1, 1, '2025-02-20 08:22:35', NULL),
(8, 2, 3, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 1, 4, NULL, NULL),
(11, 1, 5, NULL, NULL),
(12, 1, 6, NULL, NULL),
(13, 1, 7, NULL, NULL),
(14, 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_menu`
--

CREATE TABLE `users_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(255) NOT NULL,
  `icon_menu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_menu`
--

INSERT INTO `users_menu` (`id`, `menu`, `icon_menu`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'fa fa-fw fa-rocket', '2025-02-20 08:18:33', NULL),
(2, 'Admin', 'fa fa-fw fa-user-circle', '2025-02-20 08:18:33', NULL),
(3, 'Menu', 'fa fa-fw fa-book', '2025-02-20 08:19:37', NULL),
(5, 'Company_profile', 'fa fa-fw fa-address-card', '2025-05-20 20:59:08', '2025-05-20 21:01:31'),
(6, 'Service', 'fa fa-fw fa-cogs', '2025-05-20 22:05:52', '2025-05-20 22:05:52'),
(7, 'Freecool_bac', 'fa fa-fw fa-snowflake', '2025-05-21 22:00:34', '2025-05-21 22:00:34'),
(8, 'Product', 'fa fa-fw fa-cubes', '2025-05-28 00:15:28', '2025-05-28 00:15:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2025-02-20 08:18:00', NULL),
(2, 'User', '2025-02-20 08:18:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_sub_menu`
--

CREATE TABLE `users_sub_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard', 'dashboard', 1, '2025-02-20 08:19:57', NULL),
(2, 2, 'Administartor', 'admin', 1, '2025-02-20 08:19:57', NULL),
(3, 2, 'Role', 'admin/role', 1, '2025-02-20 08:20:53', NULL),
(4, 3, 'Menu Management', 'menu', 1, '2025-02-20 08:20:53', NULL),
(5, 3, 'Submenu Management', 'menu/submenu', 1, '2025-02-20 08:21:34', NULL),
(7, 5, 'About', 'company_profile', 1, NULL, NULL),
(8, 5, 'Vision & Mission', 'company_profile/vision_mission', 1, NULL, NULL),
(9, 6, 'Our Service', 'service', 1, NULL, NULL),
(10, 6, 'Image Activity', 'service/image_activity', 1, NULL, NULL),
(11, 7, 'Layanan FreeCOOL BAC', 'freecool_bac', 1, NULL, NULL),
(12, 7, 'Client List', 'freecool_bac/client', 1, NULL, NULL),
(13, 8, 'Product BAC', 'product', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vision_mission`
--

CREATE TABLE `vision_mission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vision` varchar(1000) NOT NULL,
  `mission` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vision_mission`
--

INSERT INTO `vision_mission` (`id`, `vision`, `mission`, `created_at`, `updated_at`) VALUES
(1, 'Menjadi penyedia layanan terkemuka dalam industri perawatan dan pembersihan AC serta kulkas, memberikan solusi yang inovatif dan ramah lingkungan.', 'Memberikan layanan berkualitas tinggi dengan\r\nkeahlian teknis dan perhatian detail yang tinggi.\r\n\r\nMenyediakan jadwal layanan yang dapat\r\ndiandalkan, serta respons cepat terhadap\r\nkebutuhan pelanggan.\r\n\r\nMengadopsi teknologi terkini dalam industri untuk\r\nmeningkatkan efisiensi layanan dan kenyamanan\r\npelanggan.\r\n\r\nMemahami dan memenuhi kebutuhan pelanggan\r\ndengan memberikan layanan yang bersertifikasi,\r\njujur, ramah, dan terpercaya.', '2025-05-20 21:52:44', '2025-05-20 21:58:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `image_activity`
--
ALTER TABLE `image_activity`
  ADD PRIMARY KEY (`id_imageactivity`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `superiority`
--
ALTER TABLE `superiority`
  ADD PRIMARY KEY (`id_superiority`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vision_mission`
--
ALTER TABLE `vision_mission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_activity`
--
ALTER TABLE `image_activity`
  MODIFY `id_imageactivity` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id_service` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `superiority`
--
ALTER TABLE `superiority`
  MODIFY `id_superiority` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `vision_mission`
--
ALTER TABLE `vision_mission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
