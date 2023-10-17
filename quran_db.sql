-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quran_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `type` enum('news','image','video') NOT NULL DEFAULT 'news',
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title_ar`, `title_en`, `link`, `description`, `description_en`, `type`, `status`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'خبر عام', 'خبر عام', 'https://www.youtube.com/embed/933cevDgB3Y?si=gutFqabwNoSv9wJA', '<p>خبر عام</p>', '<p>خبر عام</p>', 'video', 'active', 2, NULL, '2023-10-12 13:05:55', '2023-10-15 07:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text NOT NULL,
  `description_ar` text NOT NULL,
  `title_en` text NOT NULL,
  `description_en` text NOT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0 => not active, 1 => active, 2 => suspended',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `title_ar`, `description_ar`, `title_en`, `description_en`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'الفرع الأول', 'كتابة القرآن الكريم كاملاَ (ثلاثون جزءاً) من سورة البقرة حتى سورة الناس', 'First Branch', 'Writing the entire Holy Qur’an (thirty parts) from Surat Al-Baqarah to Surat Al-Nas', '1', NULL, '2023-10-12 04:24:03', '2023-10-16 17:50:49'),
(2, 'الفرع الثاني', 'كتابة نصف القرآن الكريم (خمسة عشر جزءاً) من سورة الكهف حتى سورة الناس', 'Second Branch', 'Writing half of the Holy Qur’an (fifteen parts) from Surat Al-Kahf until Surat Al-Nas', '1', NULL, '2023-10-16 17:52:43', '2023-10-16 17:52:43'),
(3, 'الفرع الثالث', 'كتابة ربع يس (سبعة أجزاء) من سورة يس حتى سورة الناس', 'Third Branch', 'Writing a quarter of Yasin (seven parts) from Surat Yasin to Surat An-Nas', '1', NULL, '2023-10-16 17:53:44', '2023-10-16 17:53:44'),
(4, 'الفرع الرابع', 'كتابة جزء واحد من القرآن الكريم (جزء عم) كاملاً', 'Fourth Branch', 'Writing one complete part of the Qur’an (Juz Amma).', '1', NULL, '2023-10-16 17:54:33', '2023-10-16 17:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `branch_gifts`
--

CREATE TABLE `branch_gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text NOT NULL,
  `description_ar` text NOT NULL,
  `title_en` text NOT NULL,
  `description_en` text NOT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0 => not active, 1 => active, 2 => suspended',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_gifts`
--

INSERT INTO `branch_gifts` (`id`, `branch_id`, `title_ar`, `description_ar`, `title_en`, `description_en`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'جائزة المرتبة الأولى', 'تفاصيل جائزة المرتبة الأولى', 'First Score Gift', 'Details about First Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(2, 1, 'جائزة المرتبة الثانية', 'تفاصيل جائزة المرتبة الثانية', 'Second Score Gift', 'Details about Second Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(3, 1, 'جائزة المرتبة الثالثة', 'تفاصيل جائزة المرتبة الثالثة', 'Third Score Gift', 'Details about Third Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(4, 1, 'جائزة المرتبة الرابعة', 'تفاصيل جائزة المرتبة الرابعة', 'Fourth Score Gift', 'Details about Fourth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(5, 1, 'جائزة المرتبة الخامسة', 'تفاصيل جائزة المرتبة الخامسة', 'Fifth Score Gift', 'Details about Fifth Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(6, 1, 'جائزة المرتبة السادسة', 'تفاصيل جائزة المرتبة السادسة', 'Sexth Score Gift', 'Details about Sexth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(7, 1, 'جائزة المرتبة السابعة', 'تفاصيل جائزة المرتبة السابعة', 'Seventh Score Gift', 'Details about Seventh Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(8, 1, 'جائزة المرتبة الثامنة', 'تفاصيل جائزة المرتبة الثامنة', 'Eighth Score Gift', 'Details about Eighth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(9, 2, 'جائزة المرتبة الأولى', 'تفاصيل جائزة المرتبة الأولى', 'First Score Gift', 'Details about First Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(10, 2, 'جائزة المرتبة الثانية', 'تفاصيل جائزة المرتبة الثانية', 'Second Score Gift', 'Details about Second Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(11, 2, 'جائزة المرتبة الثالثة', 'تفاصيل جائزة المرتبة الثالثة', 'Third Score Gift', 'Details about Third Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(12, 2, 'جائزة المرتبة الرابعة', 'تفاصيل جائزة المرتبة الرابعة', 'Fourth Score Gift', 'Details about Fourth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(13, 2, 'جائزة المرتبة الخامسة', 'تفاصيل جائزة المرتبة الخامسة', 'Fifth Score Gift', 'Details about Fifth Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(14, 2, 'جائزة المرتبة السادسة', 'تفاصيل جائزة المرتبة السادسة', 'Sexth Score Gift', 'Details about Sexth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(15, 2, 'جائزة المرتبة السابعة', 'تفاصيل جائزة المرتبة السابعة', 'Seventh Score Gift', 'Details about Seventh Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(16, 2, 'جائزة المرتبة الثامنة', 'تفاصيل جائزة المرتبة الثامنة', 'Eighth Score Gift', 'Details about Eighth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(17, 3, 'جائزة المرتبة الأولى', 'تفاصيل جائزة المرتبة الأولى', 'First Score Gift', 'Details about First Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(18, 3, 'جائزة المرتبة الثانية', 'تفاصيل جائزة المرتبة الثانية', 'Second Score Gift', 'Details about Second Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(19, 3, 'جائزة المرتبة الثالثة', 'تفاصيل جائزة المرتبة الثالثة', 'Third Score Gift', 'Details about Third Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(20, 3, 'جائزة المرتبة الرابعة', 'تفاصيل جائزة المرتبة الرابعة', 'Fourth Score Gift', 'Details about Fourth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(21, 3, 'جائزة المرتبة الخامسة', 'تفاصيل جائزة المرتبة الخامسة', 'Fifth Score Gift', 'Details about Fifth Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(22, 3, 'جائزة المرتبة السادسة', 'تفاصيل جائزة المرتبة السادسة', 'Sexth Score Gift', 'Details about Sexth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(23, 3, 'جائزة المرتبة السابعة', 'تفاصيل جائزة المرتبة السابعة', 'Seventh Score Gift', 'Details about Seventh Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(24, 3, 'جائزة المرتبة الثامنة', 'تفاصيل جائزة المرتبة الثامنة', 'Eighth Score Gift', 'Details about Eighth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(25, 4, 'جائزة المرتبة الأولى', 'تفاصيل جائزة المرتبة الأولى', 'First Score Gift', 'Details about First Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(26, 4, 'جائزة المرتبة الثانية', 'تفاصيل جائزة المرتبة الثانية', 'Second Score Gift', 'Details about Second Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(27, 4, 'جائزة المرتبة الثالثة', 'تفاصيل جائزة المرتبة الثالثة', 'Third Score Gift', 'Details about Third Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(28, 4, 'جائزة المرتبة الرابعة', 'تفاصيل جائزة المرتبة الرابعة', 'Fourth Score Gift', 'Details about Fourth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(29, 4, 'جائزة المرتبة الخامسة', 'تفاصيل جائزة المرتبة الخامسة', 'Fifth Score Gift', 'Details about Fifth Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(30, 4, 'جائزة المرتبة السادسة', 'تفاصيل جائزة المرتبة السادسة', 'Sexth Score Gift', 'Details about Sexth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12'),
(31, 4, 'جائزة المرتبة السابعة', 'تفاصيل جائزة المرتبة السابعة', 'Seventh Score Gift', 'Details about Seventh Score Gift', '1', NULL, '2023-10-15 06:18:53', '2023-10-16 17:55:51'),
(32, 4, 'جائزة المرتبة الثامنة', 'تفاصيل جائزة المرتبة الثامنة', 'Eighth Score Gift', 'Details about Eighth Score Gift', '1', NULL, '2023-10-16 17:59:12', '2023-10-16 17:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `parent_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'الأخبار', 'News', NULL, 'active', NULL, '2023-10-12 04:24:03', '2023-10-12 04:24:03'),
(2, 'القسم التعليمي', 'education section', 0, 'active', NULL, '2023-10-12 12:47:02', '2023-10-12 12:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title_ar`, `title_en`, `country_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'جدة', 'jeddah', 1, NULL, '2023-10-12 04:24:03', '2023-10-12 04:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `content` text NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `content`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'HADEEL MIKKI', NULL, 'hmikki@gmail.com', 'hello', 'unread', NULL, '2023-10-15 15:57:07', '2023-10-15 15:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `nationality_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `nationality_en` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `nationality_ar`, `title_en`, `nationality_en`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'السعودية', 'سعودي', 'saudi arabia', 'saudi arabian', NULL, '2023-10-12 04:24:03', '2023-10-12 04:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0 => not active, 1 => active, 2 => suspended',
  `role_id` tinyint(4) NOT NULL,
  `type` enum('dash','subdash') NOT NULL,
  `token` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name_ar`, `name_en`, `phone`, `email`, `password`, `is_active`, `role_id`, `type`, `token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fern Schuppe', NULL, '3343228378', 'boyer.ines@kautzer.com', '$2y$10$qNK4xCIKokgDvWauADBgIud8eyzpqYakh1nemSa3Q2rmoIwOEanuO', '1', 1, 'dash', NULL, NULL, '2023-10-12 04:24:03', '2023-10-12 15:44:18'),
(2, 'HADEEL MIKKI', NULL, '082860077', 'admin@admin.com', '$2y$10$0NyoQ3nlr7WgjHcQDK3OF.F5fNwico.q7LLK5uqZ7FoC9b/O3Q9yi', '1', 1, 'dash', NULL, NULL, '2023-10-12 04:24:03', '2023-10-12 15:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Message', 12, '2d504d90-601c-4c1c-a294-86101143b90c', 'messages', 'about1', 'about1.jpg', 'image/jpeg', 'public', 'public', 26289, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-12 04:49:40', '2023-10-12 04:49:42'),
(2, 'App\\Models\\Message', 12, '3107f71b-2df0-4763-b51b-e89a2cb6de6c', 'profile', 'about1', 'about1.jpg', 'image/jpeg', 'public', 'public', 26289, '[]', '[]', '{\"thumb\":true}', '[]', 2, '2023-10-12 04:53:13', '2023-10-12 04:53:13'),
(3, 'App\\Models\\Blog', 1, '738edb31-8de8-45c7-a0a2-2b92a29f18b3', 'photo', 'blog-mini-1', 'blog-mini-1.jpg', 'image/jpeg', 'public', 'public', 3664, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-12 13:05:56', '2023-10-12 13:05:57'),
(4, 'App\\Models\\Blog', 1, '95b398b9-5bd1-4950-be84-2f546e146420', 'photo', 'blog-mini-1', 'blog-mini-1.jpg', 'image/jpeg', 'public', 'public', 3664, '[]', '[]', '{\"thumb\":true}', '[]', 2, '2023-10-12 13:29:25', '2023-10-12 13:29:25'),
(5, 'App\\Models\\Blog', 1, 'c1cabbb6-f792-49e6-a416-55d3cb88d994', 'photo', 'about1', 'about1.jpg', 'image/jpeg', 'public', 'public', 26289, '[]', '[]', '{\"thumb\":true}', '[]', 3, '2023-10-12 13:32:00', '2023-10-12 13:32:00'),
(6, 'App\\Models\\Blog', 1, 'fd6a8081-de8a-4fbc-b754-e0ee35b45fda', 'photo', 'about-1', 'about-1.jpg', 'image/jpeg', 'public', 'public', 113798, '[]', '[]', '{\"thumb\":true}', '[]', 4, '2023-10-12 13:32:00', '2023-10-12 13:32:01'),
(7, 'App\\Models\\Blog', 1, '3590b430-a689-4135-820b-cd35a302bc08', 'photo', 'about2', 'about2.jpg', 'image/jpeg', 'public', 'public', 101198, '[]', '[]', '{\"thumb\":true}', '[]', 5, '2023-10-12 13:32:01', '2023-10-12 13:32:01'),
(8, 'App\\Models\\Blog', 1, '7ee54e5e-9daf-44a0-a507-1816d4cfc399', 'photo', 'about-2', 'about-2.jpg', 'image/jpeg', 'public', 'public', 43550, '[]', '[]', '{\"thumb\":true}', '[]', 6, '2023-10-12 13:32:01', '2023-10-12 13:32:01'),
(9, 'App\\Models\\Blog', 1, '1309c2a2-7f5a-4e30-88ae-1f34ee5cdd23', 'photo', 'about-3', 'about-3.jpg', 'image/jpeg', 'public', 'public', 44052, '[]', '[]', '{\"thumb\":true}', '[]', 7, '2023-10-12 13:32:01', '2023-10-12 13:32:02'),
(10, 'App\\Models\\Setting', 1, '277c51ef-b4fe-4cf5-9196-d27986a0040b', 'logo', 'logo', 'logo.png', 'image/png', 'public', 'public', 33632, '[]', '[]', '{\"logothumb\":true,\"logoDarkthumb\":true,\"favthumb\":true,\"breadcrumbthumb\":true,\"mainphotothumb\":true}', '[]', 1, '2023-10-12 15:36:38', '2023-10-12 15:36:40'),
(11, 'App\\Models\\Setting', 1, '8f8b1b3e-5936-403f-ba96-7eeea5de2c38', 'logoDark', 'logo', 'logo.png', 'image/png', 'public', 'public', 33632, '[]', '[]', '{\"logothumb\":true,\"logoDarkthumb\":true,\"favthumb\":true,\"breadcrumbthumb\":true,\"mainphotothumb\":true}', '[]', 2, '2023-10-12 15:36:40', '2023-10-12 15:36:43'),
(12, 'App\\Models\\Setting', 1, '35d0bee7-4e81-4d51-82fa-bbfa5bf379e9', 'fav', 'logo', 'logo.png', 'image/png', 'public', 'public', 33632, '[]', '[]', '{\"logothumb\":true,\"logoDarkthumb\":true,\"favthumb\":true,\"breadcrumbthumb\":true,\"mainphotothumb\":true}', '[]', 3, '2023-10-12 15:36:43', '2023-10-12 15:36:46'),
(13, 'App\\Models\\Setting', 1, 'bd6b1232-6cdb-4654-b808-9431ea830975', 'breadcrumb', 'logo', 'logo.png', 'image/png', 'public', 'public', 33632, '[]', '[]', '{\"logothumb\":true,\"logoDarkthumb\":true,\"favthumb\":true,\"breadcrumbthumb\":true,\"mainphotothumb\":true}', '[]', 4, '2023-10-12 15:36:46', '2023-10-12 15:36:49'),
(14, 'App\\Models\\Employee', 2, '94529d6d-f751-4b49-98c2-c9e9e78d1916', 'profile', 'about-child', 'about-child.jpg', 'image/jpeg', 'public', 'public', 9783, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-12 15:41:49', '2023-10-12 15:41:49'),
(15, 'App\\Models\\Employee', 1, '3191d601-d149-4807-a89f-a1aa2aec434e', 'profile', 'about-child', 'about-child.jpg', 'image/jpeg', 'public', 'public', 9783, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-12 15:44:18', '2023-10-12 15:44:19'),
(16, 'App\\Models\\User', 1, '71ca6a06-9b24-4932-ba41-fcd4949b9131', 'profile', 'about-child', 'about-child.jpg', 'image/jpeg', 'public', 'public', 9783, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-12 16:34:02', '2023-10-12 16:34:02'),
(19, 'App\\Models\\Message', 13, 'ac0161d8-6fa5-4848-bc7f-0a5de2c449eb', 'messages', 'quran4', 'quran4.jpg', 'image/jpeg', 'public', 'public', 32810, '[]', '[]', '{\"thumb\":true}', '[]', 3, '2023-10-12 18:39:27', '2023-10-12 18:39:27'),
(20, 'App\\Models\\MessagesResponse', 2, 'a8041cfc-3344-4be1-b788-a3b6d0287521', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-13 16:50:36', '2023-10-13 16:50:36'),
(21, 'App\\Models\\Message', 14, 'b34af4c4-9ba0-470d-8099-581e6633bab1', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:15:58', '2023-10-17 07:15:59'),
(22, 'App\\Models\\Message', 15, 'b7f55d3b-bd39-4206-b72b-c8e67b00c311', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:16:51', '2023-10-17 07:16:51'),
(23, 'App\\Models\\Message', 16, '1bb54936-2f60-4f36-97a4-072ef780236c', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:17:34', '2023-10-17 07:17:34'),
(24, 'App\\Models\\Message', 17, 'ad5070a9-fca9-49d6-b464-d5701146db54', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:17:51', '2023-10-17 07:17:51'),
(25, 'App\\Models\\Message', 18, 'f59e6766-f4f2-47a9-8d6d-c37926dbf939', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:18:24', '2023-10-17 07:18:25'),
(26, 'App\\Models\\Message', 19, 'd4bcd556-54ea-4b88-980b-b322b795d07e', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:18:42', '2023-10-17 07:18:42'),
(27, 'App\\Models\\Message', 20, '669f41fc-0c9f-4696-9f48-c55cede93c20', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:19:00', '2023-10-17 07:19:01'),
(28, 'App\\Models\\Message', 21, '691fd7a6-2564-42af-9416-2a71219a4b89', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:20:21', '2023-10-17 07:20:21'),
(29, 'App\\Models\\MessagesResponse', 4, '0b4ee74b-e47e-4847-a9f3-e07fc51b8374', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:29:58', '2023-10-17 07:29:59'),
(30, 'App\\Models\\Message', 22, '41d9f9e1-a732-42db-a620-87bd4099c067', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:38:34', '2023-10-17 07:38:34'),
(31, 'App\\Models\\Message', 23, 'e84d6b21-e84e-4f6e-ba24-0162fb88bc16', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:44:56', '2023-10-17 07:44:57'),
(32, 'App\\Models\\MessagesResponse', 5, '24795366-b22b-41b9-b6b6-d1a03e060142', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:46:35', '2023-10-17 07:46:35'),
(33, 'App\\Models\\Message', 24, 'b8d2dc74-d22d-425e-927e-0db2c10e2158', 'messages', 'image1', 'image1.jpg', 'image/jpeg', 'public', 'public', 67788, '[]', '[]', '{\"thumb\":true}', '[]', 1, '2023-10-17 07:54:50', '2023-10-17 07:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` text DEFAULT NULL,
  `description` text NOT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `sender_type` enum('user','supervisor') NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_type` enum('user','supervisor') NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `description`, `status`, `sender_type`, `sender_id`, `receiver_type`, `receiver_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(24, 'Lyla Rosenbaum', '7848059678', 'user@user.com', '<p>test message</p>', 'read', 'user', 1, 'user', 1, NULL, '2023-10-17 07:54:50', '2023-10-17 07:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages_responses`
--

CREATE TABLE `messages_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `response` text DEFAULT NULL,
  `status` enum('read','unread') NOT NULL DEFAULT 'unread',
  `sender_type` enum('user','supervisor') NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_type` enum('user','supervisor') NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_18_150158_create_media_table', 1),
(6, '2023_04_19_225815_create_settings_table', 1),
(7, '2023_05_05_191418_create_employees_table', 1),
(8, '2023_05_05_191418_create_supervisors_table', 1),
(9, '2023_08_11_0009010_create_messages_table', 1),
(10, '2023_08_11_000909_create_contacts_table', 1),
(11, '2023_08_11_002102_create_pages_table', 1),
(12, '2023_08_11_002541_create_categories_table', 1),
(13, '2023_08_11_004103_create_countries_table', 1),
(14, '2023_08_11_004104_create_cities_table', 1),
(15, '2023_08_13_004105_create_branches_table', 1),
(16, '2023_08_14_004105_create_users_table', 1),
(17, '2023_09_04_152841_create_blogs_table', 1),
(18, '2023_09_12_170118_create_sliders_table', 1),
(19, '2023_08_11_0009010_create_messages_responses_table', 2),
(20, '2023_08_13_004105_create_branch_gifts_table', 3),
(21, '2019_10_27_021941_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_type` tinyint(4) DEFAULT NULL,
  `ref_id` bigint(20) UNSIGNED DEFAULT NULL,
  `destination_type` tinyint(4) DEFAULT NULL,
  `destination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `message_ar` varchar(255) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `ref_type`, `ref_id`, `destination_type`, `destination_id`, `title`, `title_ar`, `message`, `message_ar`, `type`, `read_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, 24, 1, 1, 'Message Response', 'لديك رسالة جديدة', '<p>test message</p>', '<p>test message</p>', 1, '2023-10-17 08:21:00', NULL, '2023-10-17 07:54:51', '2023-10-17 08:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `description_ar` text NOT NULL,
  `vision_ar` text DEFAULT NULL,
  `mission_ar` text DEFAULT NULL,
  `massage_ar` text DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `vision_en` text DEFAULT NULL,
  `mission_en` text DEFAULT NULL,
  `massage_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name_ar`, `description_ar`, `vision_ar`, `mission_ar`, `massage_ar`, `name_en`, `description_en`, `vision_en`, `mission_en`, `massage_en`, `created_at`, `updated_at`) VALUES
(1, 'من نحن', '<p class=\"mb-5 text-center\">هي مسابقة لكتابة القرآن الكريم بخط اليد وتحمل عنوان <br><strong class=\"text-primary\">\"بخـط يـدي كتبت أحرفه ، وفي الصدر حفظت رسـم كلماته\"</strong>\n                    <br>\n                    من منطلق حفظ كتاب الله جاءت هذه المسابقة و هي الأولى من نوعها في العالم الاسلامي ، علها تكون اسهاما في زيادة الصلة بين المسلم و كتاب الله عز و جل ، و تشجيعا على الاقتداء بالصحابة رضوان الله عليهم بكتابة القرآن الكريم بخط اليد مما يساعد على حفظة أيضا والتقرب به إلى الله سبحانه و تعالى ولهذا كان اهتمامنا منصباً على التركيز على كتاب الله عز و جل و تحفيز المسلمين على التمسك به والتعمق به و المساعدة على حفظه وتجويده و فهم معانيه على ضوء هذه المسابقة.\n                <br>\n                و إن هذه المسابقة تعكس حرص العالم الاسلامي على نشر كتاب الله و ترسيخ معانيه بين أبناء المسلمين .\n                </p>', 'التميـز فـي خدمة كتاب اللـه تعالى تلاوةً وحفظاً وتدبراً وعملاً .', '<div class=\"col-md-6\">\n                                <p class=\"mb-2\"><i class=\"fa fa-check text-primary\"></i>تعليـم القـرآن الكريـم تلاوة وحفظا ًوتدبرا ًوتجويدا</p>\n                                <p class=\"mb-0\"><i class=\"fa fa-check text-primary\"></i>ايجـاد ّحفـاظ ُمتقنيـن ُمتخلقين بأخلاق القرآن الكريم</p>\n                            </div>\n                            <div class=\"col-md-6\">\n                                <p class=\"mb-2\"><i class=\"fa fa-check text-primary\"></i> تأهيـل المعلميـن والمعلمـات لتعليم القرآن الكريم</p>\n                                <p class=\"mb-0\"><i class=\"fa fa-check text-primary\"></i>الإسـهام في تحصين المتعلمين فكريا</p>\n                            </div>', 'نخــدم كتــاب اللــه تعالــى بكفــاءة عاليــة لنكــون الأفضل فــي البرامــج القرآنيــة النوعيــة الموجهــة لشــرائح المجتمـع بكـوادر مؤهلةتعمل بروحالفريقفي بيئة عمل تنافسـية', 'about', '<p class=\"mb-5 text-center\">It is a competition for writing the Holy Qur’an by hand and is titled <br><strong class=\"text-primary\">“In my handwriting I wrote his letters, and in my chest I preserved the outline of his words.”</strong>\n                    <br>\n                    From the standpoint of memorizing the Book of God, this competition came, and it is the first of its kind in the Islamic world. It may be a contribution to increasing the connection between the Muslim and the Book of God Almighty, and to encourage the imitation of the Companions, may God be pleased with them, by writing the Holy Qur’an by hand, which also helps its memorizers. And drawing closer to God Almighty through it. That is why our interest was focused on focusing on the Book of God Almighty and motivating Muslims to adhere to it, delve deeper into it, and help memorize and improve it and understand its meanings in light of this competition.\n                    <br>\n                    This competition reflects the Islamic world’s keenness to spread the Book of God and consolidate its meanings among Muslim children.\n                </p>', 'Excellence in serving the Book of God Almighty in its recitation, memorization, contemplation, and work.', '<div class=\"col-md-6\">\n                                <p class=\"mb-2\"><i class=\"fa fa-check text-primary\"></i>Teaching the Holy Qur’an in recitation, memorization, contemplation and intonation</p>\n                                <p class=\"mb-0\"><i class=\"fa fa-check text-primary\"></i>Creating proficient memorizers who adhere to the morals of the Holy Qur’an</p>\n                            </div>\n                            <div class=\"col-md-6\">\n                                <p class=\"mb-2\"><i class=\"fa fa-check text-primary\"></i>Qualifying male and female teachers to teach the Holy Quran</p>\n                                <p class=\"mb-0\"><i class=\"fa fa-check text-primary\"></i>Contributing to fortifying learners intellectually</p>\n                            </div>', 'We serve the Book of God Almighty with high efficiency to be the best in quality Quranic programs directed to segments of society with qualified cadres who work in a team spirit in a competitive work environment.', '2023-10-12 04:24:03', '2023-10-12 04:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `pdf` text DEFAULT NULL,
  `tax_num` varchar(255) DEFAULT NULL,
  `commercial_num` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `ticktok` varchar(255) DEFAULT NULL,
  `keywords_ar` varchar(255) DEFAULT NULL,
  `keywords_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name_ar`, `name_en`, `email`, `email2`, `phone`, `phone2`, `whatsapp`, `address`, `address2`, `location`, `lat`, `lng`, `pdf`, `tax_num`, `commercial_num`, `currency`, `payment`, `facebook`, `twitter`, `youtube`, `linkedin`, `instagram`, `snapchat`, `ticktok`, `keywords_ar`, `keywords_en`, `description_ar`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 'مسـابقة كتابة القرآن الكريم العالمية', NULL, 'info@aacid.org', 'info@aacid.org', '02 3346 7777', '02 3346 7777', '+201004879589', 'عنوان تجريبي عنوان تجريبي', NULL, NULL, NULL, NULL, NULL, '123456789456123', '12346549875', 'جنيه', NULL, 'facebook link', NULL, NULL, NULL, NULL, NULL, NULL, 'كلمات دلاليه', NULL, 'وصف النظام', NULL, '2023-10-12 04:24:03', '2023-10-12 15:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('slider','category') NOT NULL DEFAULT 'slider',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0 => not active, 1 => active, 2 => suspended',
  `role_id` tinyint(4) NOT NULL,
  `type` enum('supervisor','subSupervisor') NOT NULL,
  `token` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `name_ar`, `name_en`, `phone`, `email`, `password`, `is_active`, `role_id`, `type`, `token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Imani O\'Connell DVM', NULL, '5654943358', 'supervisor@supervisor.com', '$2y$10$LC8k8lryWoPpnR4bTA9uRuDmgNvekPlEIpgLBlei3fOV8L6p3ucwm', '1', 1, 'supervisor', NULL, NULL, '2023-10-12 04:24:03', '2023-10-12 04:24:03'),
(2, 'Leda Boyle', NULL, '3092765227', 'botsford.jaycee@kertzmann.com', '$2y$10$cXymry6qnQrVtatIXkuL0ORiT636kWmn9.t7tK2Tz7TcT39iUKbFK', '1', 1, 'supervisor', NULL, NULL, '2023-10-12 04:24:03', '2023-10-12 04:24:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nationality` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0 => not active, 1 => active, 2 => suspended',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `email`, `nationality`, `address`, `email_verified_at`, `city_id`, `country_id`, `branch_id`, `is_active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lyla Rosenbaum', '7848059678', '$2y$10$2k9x8mWovV8.HSMAGlXG2u3U//asfzxtb5udP73lfRLAoy8QtovKq', 'user@user.com', 'سعودي', '60342 Katheryn Isle Apt. 915New Annabelletown, NV 14690-3947', NULL, 1, 1, 1, '1', NULL, NULL, '2023-10-12 04:24:03', '2023-10-12 16:34:02'),
(2, 'Gail Goyette', '5101741874', '$2y$10$XquySn8ba4wK/UlU0claleZAC.FxcDc9iAfFNzA8wd44tgRBlwAO2', 'mschultz@fay.net', 'سعودي', '103 Volkman Fall Apt. 177\nIsobelview, VT 62421-5261', NULL, 1, 1, 1, '1', NULL, NULL, '2023-10-12 04:24:03', '2023-10-12 04:24:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_gifts`
--
ALTER TABLE `branch_gifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_gifts_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD UNIQUE KEY `employees_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_responses`
--
ALTER TABLE `messages_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_responses_message_id_foreign` (`message_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_category_id_foreign` (`category_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervisors_email_unique` (`email`),
  ADD UNIQUE KEY `supervisors_phone_unique` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_city_id_foreign` (`city_id`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch_gifts`
--
ALTER TABLE `branch_gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `messages_responses`
--
ALTER TABLE `messages_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `branch_gifts`
--
ALTER TABLE `branch_gifts`
  ADD CONSTRAINT `branch_gifts_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages_responses`
--
ALTER TABLE `messages_responses`
  ADD CONSTRAINT `messages_responses_country_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
