-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 01:13 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zavrsni`
--

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
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'Računske operacije', '2021-04-21 12:03:08', '2021-04-21 12:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lesson` bigint(20) UNSIGNED NOT NULL,
  `complexity` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `title`, `id_lesson`, `complexity`, `created_at`, `updated_at`) VALUES
(7, 'Razina 1', 2, 0, '2021-04-21 12:03:28', '2021-04-21 12:03:28'),
(8, 'Razina 2', 2, 0, '2021-04-21 12:04:53', '2021-04-21 12:04:53'),
(9, 'Razina 3', 2, 1, '2021-04-21 12:06:02', '2021-04-21 12:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `level_level`
--

CREATE TABLE `level_level` (
  `level_1` bigint(20) UNSIGNED DEFAULT NULL,
  `level_0` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_level`
--

INSERT INTO `level_level` (`level_1`, `level_0`, `created_at`, `updated_at`) VALUES
(9, 7, '2021-04-21 12:06:03', '2021-04-21 12:06:03'),
(9, 8, '2021-04-21 12:06:03', '2021-04-21 12:06:03');

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
(56, '2014_10_12_000000_create_users_table', 1),
(57, '2014_10_12_100000_create_password_resets_table', 1),
(58, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(59, '2019_08_19_000000_create_failed_jobs_table', 1),
(60, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(61, '2021_03_22_181443_create_sessions_table', 1),
(62, '2021_03_25_154622_create_lessons_table', 1),
(63, '2021_03_25_154827_create_levels_table', 1),
(64, '2021_03_25_155458_create_tasks_table', 1),
(65, '2021_03_25_155606_create_user_tasks_table', 1),
(66, '2021_03_30_151629_create_level_level_table', 1);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7vMQHrM0Zygt5FqBcKuZIbSvfuj0GSZsiVq48Ubj', 3, '192.168.10.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6ImJYTUpieWVNS29vaXcxd01ZZXNLR09SN2dURHQzZjVxamxZazhmWVMiO3M6MzoidXJsIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cHM6Ly9ob21lc3RlYWQudGVzdC9nYW1lL3Rhc2svMTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkT2hQTDRCTm00Z1FnZHBYNFRuQTZsdXl6RTljR0l0aW0uVWY4eXZEM2E3aHByUkRKVHBXbEsiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJE9oUEw0Qk5tNGdRZ2RwWDRUbkE2bHV5ekU5Y0dJdGltLlVmOHl2RDNhN2hwclJESlRwV2xLIjtzOjI6ImlkIjtzOjE6IjkiO3M6OToiaWRfbGVzc29uIjtzOjE6IjIiO3M6ODoiaWRfbGV2ZWwiO3M6MToiOSI7fQ==', 1619038713);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `body`, `solution`, `instructions`, `level`, `created_at`, `updated_at`) VALUES
(5, '1.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\nx = -7 <br />\r\ny = 25 <br />\r\nz = 2.7 <br /> <br />\r\nPRINT x+y, y-x, ABS(x), SQR(y), INT(z) <br/>\r\n</code>\r\n\r\n\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 18, 32, 7, 5, 2\r\n </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 7, '2021-04-21 12:03:53', '2021-04-21 12:12:57'),
(6, '2.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\nx = -12 <br />\r\ny = 49 <br />\r\nz = 3.3 <br /> <br />\r\nPRINT x+y, y-x, ABS(x), SQR(y), INT(z) <br/>\r\n</code>\r\n\r\n\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 37, 61, 12, 7, 3\r\n </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 7, '2021-04-21 12:04:10', '2021-04-21 12:14:38'),
(7, '3.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\nx = -2 <br />\r\ny = 100 <br />\r\nz = 0.7 <br /> <br />\r\nPRINT x+y, y-x, ABS(x), SQR(y), INT(z)<br/>\r\n</code>\r\n\r\n\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 98, 102, 2, 10, 0\r\n </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 7, '2021-04-21 12:04:33', '2021-04-21 12:18:54'),
(8, '1.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\na = 7 <br />\r\nb = 2 <br />\r\nc = 3 <br />\r\nd = (a^b * c) / a <br />\r\nd = d MOD b <br /><br />\r\n\r\nPRINT d <br/>\r\n</code>\r\n\r\n\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 1 </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 8, '2021-04-21 12:05:11', '2021-04-21 20:57:37'),
(9, '2.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\na = 10 <br />\r\nb = 2 <br />\r\nc = 4 <br />\r\nd = (a * b^3) / c <br />\r\nd = d MOD c <br /><br />\r\nPRINT d <br/>\r\n</code>\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 0 </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 8, '2021-04-21 12:05:28', '2021-04-21 12:05:28'),
(10, '3.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\na = 5 <br />\r\nb = 2 <br />\r\nc = 10 <br />\r\nd = (a * b ^ a) / c <br />\r\nd = d MOD c <br /><br />\r\nPRINT d <br/>\r\n</code>\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 6 </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 8, '2021-04-21 12:05:43', '2021-04-21 12:05:43'),
(11, '1.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\na = ABS (SQR (20 + 5) + 2^2 - 15)  <br />\r\nb = INT (2.5 + 3 * 3)  <br />\r\nc = 2^2 + 2  <br />\r\na = a + c  <br />\r\nb = b + a  <br /><br/>\r\nPRINT a, b, c <br/>\r\n</code>\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 12, 23, 6 </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 9, '2021-04-21 12:06:16', '2021-04-21 12:06:16'),
(12, '2.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\na = SQR (3^3 - 2) + INT (9.8)  <br/>\r\nb = INT (8.5) - ABS (-9)  <br/>\r\nc = 2^3 + 2  <br/>\r\na = a + c  <br/>\r\nb = b + a  <br/><br/>\r\nPRINT a, b, c <br/>\r\n</code>\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\"> 24, 23, 10 </label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 9, '2021-04-21 12:07:13', '2021-04-21 12:07:13'),
(13, '3.', 'Što će se ispisati na ekran nakon izvođenja sljedećeg dijela koda:\r\n<br /><br />\r\n<code>\r\na = INT (SQR (10)) + 3^3 MOD 5 + 2^2 - 2  <br/>\r\nb = a * 2  <br/>\r\nc = a + b  <br/><br/>\r\nPrint a, b  <br/><br/>\r\na = a + b  <br/>\r\nS = a + b + c  <br/><br/>\r\nPrint c, S  <br/>\r\n</code>\r\n<br /><br /><input type=\"radio\" id=\"1\" name=\"odg\" value=\"1\"><label for=\"1\" > 7, 14 <br /><span style=\"margin-left:25px\">21, 56</h1></label><br /><input type=\"radio\" id=\"2\" name=\"odg\" value=\"2\"><label for=\"2\"> krivo </label><br /><input type=\"radio\" id=\"3\" name=\"odg\" value=\"3\"><label for=\"3\"> krivo </label><br /><br /><button type=\"submit\">Predaj odgovor</button>', '1', 'da', 9, '2021-04-21 12:07:29', '2021-04-21 12:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@admin.com', 'admin', NULL, '$2y$10$OhPL4BNm4gQgdpX4TnA6luyzE9cGItim.Uf8yvD3a7hprRDJTpWlK', NULL, NULL, NULL, NULL, NULL, '2021-04-21 11:50:41', '2021-04-21 11:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_task` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_id_lesson_foreign` (`id_lesson`);

--
-- Indexes for table `level_level`
--
ALTER TABLE `level_level`
  ADD KEY `level_level_level_1_foreign` (`level_1`),
  ADD KEY `level_level_level_0_foreign` (`level_0`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_level_foreign` (`level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD KEY `user_tasks_id_user_foreign` (`id_user`),
  ADD KEY `user_tasks_id_task_foreign` (`id_task`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_id_lesson_foreign` FOREIGN KEY (`id_lesson`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `level_level`
--
ALTER TABLE `level_level`
  ADD CONSTRAINT `level_level_level_0_foreign` FOREIGN KEY (`level_0`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `level_level_level_1_foreign` FOREIGN KEY (`level_1`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_level_foreign` FOREIGN KEY (`level`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD CONSTRAINT `user_tasks_id_task_foreign` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tasks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
