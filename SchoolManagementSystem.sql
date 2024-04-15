-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2024 at 06:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SchoolManagementSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_class_teacher`
--

CREATE TABLE `assign_class_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_class_teacher`
--

INSERT INTO `assign_class_teacher` (`id`, `class_id`, `subject_id`, `teacher_id`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(14, 2, 1, 17, 0, 2, '2023-10-26', '2023-10-26'),
(15, 2, 2, 17, 0, 2, '2023-10-26', '2023-10-26'),
(24, 5, 7, 18, 0, 2, '2023-10-26', '2023-10-26'),
(26, 5, 4, 18, 0, 2, '2023-10-26', '2023-10-26'),
(27, 6, 1, 17, 0, 2, '2023-10-26', '2023-10-26'),
(28, 6, 2, 17, 0, 2, '2023-10-26', '2023-10-26'),
(29, 1, 1, 17, 0, 2, '2023-10-27', '2023-10-27'),
(30, 1, 2, 17, 0, 2, '2023-10-27', '2023-10-27'),
(31, 5, 2, 17, 0, 2, '2023-11-04', '2023-11-04'),
(32, 5, 6, 17, 0, 2, '2023-11-04', '2023-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: active, 1: inactive',
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `amount`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'One', 500, 0, 2, '2023-10-23', '2023-12-06'),
(2, 'Two', 1000, 0, 2, '2023-10-23', '2023-12-06'),
(4, 'Three', 1500, 0, 2, '2023-10-25', '2023-12-06'),
(5, 'Four', 2000, 0, 2, '2023-10-25', '2023-12-06'),
(6, 'Five', 2500, 0, 2, '2023-10-25', '2023-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(8, 2, 1, 2, 0, '2023-10-25', '2023-10-25'),
(9, 2, 4, 2, 0, '2023-10-25', '2023-10-25'),
(10, 2, 2, 2, 0, '2023-10-25', '2023-10-25'),
(11, 2, 5, 2, 0, '2023-10-25', '2023-10-25'),
(15, 4, 1, 2, 0, '2023-10-25', '2023-10-25'),
(16, 4, 4, 2, 0, '2023-10-25', '2023-10-25'),
(17, 4, 7, 2, 0, '2023-10-25', '2023-10-25'),
(18, 4, 2, 2, 0, '2023-10-25', '2023-10-25'),
(24, 5, 7, 2, 0, '2023-10-25', '2023-10-25'),
(25, 5, 2, 2, 0, '2023-10-25', '2023-10-25'),
(26, 5, 5, 2, 0, '2023-10-25', '2023-10-25'),
(27, 5, 6, 2, 0, '2023-10-25', '2023-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetable`
--

CREATE TABLE `class_subject_timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject_timetable`
--

INSERT INTO `class_subject_timetable` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(14, 2, 2, 1, '09:10', '10:00', '102', '2023-10-29', '2023-10-29'),
(15, 2, 2, 2, '10:00', '10:50', '102', '2023-10-29', '2023-10-29'),
(16, 2, 2, 3, '09:10', '10:00', '103', '2023-10-29', '2023-10-29'),
(17, 2, 2, 4, '10:00', '10:50', '103', '2023-10-29', '2023-10-29'),
(18, 2, 2, 5, '10:00', '10:50', '102', '2023-10-29', '2023-10-29'),
(19, 2, 1, 1, '10:50', '11:40', '101', '2023-10-29', '2023-10-29'),
(20, 2, 1, 2, '09:00', '09:50', '102', '2023-10-29', '2023-10-29'),
(21, 2, 1, 3, '10:00', '10:50', '101', '2023-10-29', '2023-10-29'),
(22, 2, 1, 4, '11:00', '11:50', '102', '2023-10-29', '2023-10-29'),
(23, 2, 1, 5, '10:00', '10:50', '102', '2023-10-29', '2023-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Md. Ibne Sina', 'ibnesina10@gmail.com', '01670632145', 'How to get Admitted?', '2023-12-25', '2023-12-25'),
(2, 'Ashique', 'ashique@gmail.com', '012314741431', 'When will the class be started?', '2023-12-25', '2023-12-25'),
(3, 'Abdu Kalam', 'abdulkalam@gmail.com', '01234412142', 'Hello! Can you help?', '2023-12-25', '2023-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(2000) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `note`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'First Term', 'ABCD', 2, '2023-11-03', '2023-11-03'),
(3, 'Final Term', 'xyz', 2, '2023-11-03', '2023-11-03'),
(4, 'Middle Term', 'asdf', 2, '2023-11-03', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(25) DEFAULT NULL,
  `full_marks` varchar(25) DEFAULT NULL,
  `pass_mark` varchar(25) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `room_number`, `full_marks`, `pass_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 4, 5, 6, '2023-10-10', '11:00', '12:00', '101', '100', '40', 2, '2023-11-03', '2023-11-03'),
(6, 4, 5, 5, '2023-10-11', '10:00', '12:00', '101', '100', '40', 2, '2023-11-03', '2023-11-03'),
(7, 4, 5, 2, '2023-10-12', '11:00', '13:00', '101', '100', '40', 2, '2023-11-03', '2023-11-03'),
(8, 4, 5, 7, '2023-10-13', '12:00', '14:00', '102', '100', '40', 2, '2023-11-03', '2023-11-03'),
(9, 1, 5, 6, '2020-01-02', '10:00', '12:00', '101', '100', '40', 2, '2023-11-03', '2023-11-03'),
(10, 1, 5, 5, '2020-01-03', '09:00', '11:00', '102', '100', '40', 2, '2023-11-03', '2023-11-03'),
(11, 1, 5, 2, '2020-01-05', '10:00', '00:00', '101', '100', '40', 2, '2023-11-03', '2023-11-03'),
(12, 1, 5, 7, '2020-01-06', '11:00', '13:00', '101', '100', '40', 2, '2023-11-03', '2023-11-03'),
(13, 1, 2, 5, '2020-03-02', '10:00', '11:00', '101', '100', '40', 2, '2023-11-04', '2023-11-04'),
(14, 1, 2, 2, '2020-03-03', '10:00', '11:00', '101', '100', '40', 2, '2023-11-04', '2023-11-04'),
(15, 1, 2, 4, '2020-03-05', '11:00', '12:00', '101', '100', '40', 2, '2023-11-04', '2023-11-04'),
(16, 1, 2, 1, '2020-03-10', '11:00', '12:00', '101', '100', '40', 2, '2023-11-04', '2023-11-04');

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
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, '202401030619362gmdtltvpanu1djozl1i.jpeg', '2024-01-03', 2024),
(4, '20240103061943aqqhgn9rrrhbe8ikdice.jpeg', '2024-01-03', 2024),
(6, '20240103064833m1hakez0nfpkdc0s1yqi.jpeg', '2024-01-03', 2024),
(7, '202401030650071ugyqdewrgedxlmau4vu.jpeg', '2024-01-03', 2024),
(8, '20240103075205gip7eegcy71jqltvnqzv.jpeg', '2024-01-03', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `marks_register`
--

CREATE TABLE `marks_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `home_work` int(11) NOT NULL DEFAULT 0,
  `class_test` int(11) NOT NULL DEFAULT 0,
  `exam` int(11) NOT NULL DEFAULT 0,
  `full_marks` int(11) DEFAULT 0,
  `pass_mark` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_register`
--

INSERT INTO `marks_register` (`id`, `student_id`, `exam_id`, `class_id`, `subject_id`, `home_work`, `class_test`, `exam`, `full_marks`, `pass_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 15, 1, 2, 5, 10, 20, 65, 100, 40, 5, '2023-11-10', '2023-12-05'),
(6, 15, 1, 2, 2, 8, 17, 60, 100, 40, 5, '2023-11-10', '2023-12-05'),
(7, 15, 1, 2, 4, 7, 15, 70, 100, 40, 5, '2023-11-10', '2023-12-05'),
(8, 15, 1, 2, 1, 10, 20, 70, 100, 40, 5, '2023-11-10', '2023-12-05'),
(9, 19, 1, 2, 5, 9, 19, 70, 100, 40, 5, '2023-11-10', '2023-12-05'),
(10, 19, 1, 2, 2, 10, 20, 65, 100, 40, 5, '2023-11-10', '2023-12-05'),
(11, 19, 1, 2, 4, 10, 10, 70, 100, 40, 5, '2023-11-10', '2023-12-05'),
(12, 19, 1, 2, 1, 8, 13, 60, 100, 40, 5, '2023-11-10', '2023-12-05');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `created_at`, `updated_at`) VALUES
(2, 'শীতকালীন ছুটির অবস্থায় স্কুল বন্ধ থাকবে', '2024-01-04', '2024-01-04'),
(3, 'পরীক্ষার ফল প্রকাশের তারিখ ঘোষণা হবে পরে', '2024-01-04', '2024-01-04'),
(4, 'সকল ছাত্র-ছাত্রীদের দৃষ্টান্ত মেটিং এ অংশ নিতে অনুরোধ করা হল', '2024-01-04', '2024-01-04'),
(5, 'বিশেষ নোটিশ: আগামী শুক্রবার পরীক্ষা প্রস্তুতি ক্লাস অনুষ্ঠিত হবে', '2024-01-04', '2024-01-04'),
(6, 'সময় সূচি: আগামী শনিবারে স্কুলে শিক্ষার্থীদের বিশেষ কার্যক্রম অনুষ্ঠিত হবে', '2024-01-04', '2024-01-04'),
(7, 'সকল মানুষকে অনুরোধ করা হচ্ছে সঠিক মাস্ক পরা এবং সামাজিক দূরত্ব অবলম্বন করায় সতর্ক থাকুন', '2024-01-04', '2024-01-04');

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
-- Table structure for table `student_add_fees`
--

CREATE TABLE `student_add_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT 0,
  `paid_amount` int(11) DEFAULT 0,
  `remaining_amount` int(11) DEFAULT 0,
  `remark` varchar(256) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_add_fees`
--

INSERT INTO `student_add_fees` (`id`, `student_id`, `class_id`, `total_amount`, `paid_amount`, `remaining_amount`, `remark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 13, 5, 2000, 500, 1500, NULL, 2, '2023-12-07', '2023-12-07'),
(2, 13, 5, 1500, 1500, 0, NULL, 2, '2023-12-07', '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: active, 1: inactive',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, 2, 0, '2023-10-23', '2023-10-23'),
(2, 'Mathematics', NULL, 2, 0, '2023-10-23', '2023-10-23'),
(4, 'Global Studies', NULL, 2, 0, '2023-10-25', '2023-10-25'),
(5, 'Religion', NULL, 2, 0, '2023-10-25', '2023-10-25'),
(6, 'Science', NULL, 2, 0, '2023-10-25', '2023-10-25'),
(7, 'History', NULL, 2, 0, '2023-10-25', '2023-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 4,
  `role` int(11) DEFAULT NULL,
  `admission_number` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `marital_status` varchar(11) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `role`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `religion`, `mobile_number`, `admission_date`, `profile_pic`, `blood_group`, `height`, `weight`, `status`, `date_of_joining`, `marital_status`, `current_address`, `permanent_address`, `qualification`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$iTMldh3vfBglY7pPFx5RseNTo/dPChgPzUlnrs7YbFKlzmBOLoS3e', 'AwLKHTAHFl4bTCq7ck1rohaEH5ONeHvRpDuqYegXEarJin8csExIZyX8IDU9', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-21 07:00:47', '2023-10-21 07:00:47'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$gYjXFjUfGEzRRqpWj5Cwc.AQ9999oj36jnxycflILj5bjPLYZs6Y.', 'NKWBLtKG6JODhy16NHFT0xe71oOPBXQO6Ffp7W7XZJAx0do4YAQtYaF6nv3e', 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-21 07:00:47', '2023-12-24 07:49:30'),
(5, 'Sadi Ahmed', 'support@admin.com', NULL, '$2y$10$mQFsXGDyJlxzHQFrlDUmx.sEPgK8yly7BXnZ.4KsylKkvsYhleFF.', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-22 01:14:58', '2023-12-24 07:49:39'),
(7, 'Abdus Salam', 'abdus@admin.com', NULL, '$2y$10$ljS20yAOgqHDUsikyKUefuO1I4m3WEQJ/GO7ab2lU4v6HlBWYJBxC', NULL, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-22 06:45:39', '2023-12-24 07:50:30'),
(13, 'Ibne Sina', 'sina@gmail.com', NULL, '$2y$10$k1brwE5Xl6/FWJmyB5qRPO.qMtXmiIyV7NmBWsU.v5RwmShCj5xGK', NULL, 4, NULL, '10', '10', 5, 'Male', '2001-10-20', 'Islam', '01670632145', '2010-10-20', '202310250728211myontq7ioiukwtoknfa.jpeg', 'B+', '6', '70', 0, NULL, NULL, NULL, NULL, NULL, '2023-10-24 11:20:30', '2023-10-29 00:53:57'),
(15, 'Plabon Ahmed', 'sina10@gmail.com', NULL, '$2y$10$Q0UtgHdUhQtJl97KhObDjOJn48n9TFSRuEStinWjHbUPFuvv5TvZ6', NULL, 4, NULL, '22', '1', 2, 'Male', '2000-10-20', 'Islam', '+8801670632145', '2010-10-10', '20231110071843ktmnseb3zjbjhozjhdc9.avif', 'B+', '5.5', '70', 0, NULL, NULL, NULL, NULL, NULL, '2023-10-24 12:27:22', '2023-11-10 01:18:43'),
(17, 'Abdul Aziz Sarkar', 'aziz@gmail.com', NULL, '$2y$10$Dbkbf2WP6J2lADuzVS6jueENuT3mhLAmxVxvRt8es1r3qMH2awpkO', NULL, 3, NULL, NULL, NULL, NULL, 'Male', '1995-10-10', 'Islam', '01239123', NULL, '20231025053507q54eo0mxog0qdthtc17l.jpeg', 'O+', NULL, NULL, NULL, '2022-10-10', 'Married', 'Cas', 'ASasdn', 'B.Sc', '2023-10-24 23:35:07', '2023-10-24 23:49:46'),
(18, 'Sankar', 'sankar@gmail.com', NULL, '$2y$10$OGy2IQqTTwgW0eN/XEIiwuMrGmYsljp88ZPcBEvE4wJMvrlzRZBKK', NULL, 3, NULL, NULL, NULL, NULL, 'Male', '2000-10-10', 'Islam', '12393124', NULL, '20231025060508dkrpvamzknleyyoicy0o.jpeg', 'B+', NULL, NULL, NULL, '2023-10-10', 'Married', 'ASJSD', 'Khulna', 'M.Sc', '2023-10-25 00:05:09', '2023-10-25 01:00:27'),
(19, 'Karim', 'karim@gmail.com', NULL, '$2y$10$ukHSvVr8qbRuDElZeNFHT.Ui9bPsGPFiYM4yxfOQ3QBpeVK8aW.Zy', NULL, 4, NULL, '12', '2', 2, 'Male', '2000-01-29', 'Islam', '123843128', '2000-10-10', '20231027041246cxbvaaae6zz3peau8n3f.jpeg', 'O+', '7', '50', 0, NULL, NULL, NULL, NULL, NULL, '2023-10-26 22:12:28', '2023-11-10 01:02:37'),
(20, 'Misba', 'misba@gmail.com', NULL, '$2y$10$x7TRcQNcYHDtoKz03m9YFek7V5gFHTThVBWhq2j2H83V2yOj.EK/S', NULL, 4, NULL, '12', '3', 2, 'Male', '2001-10-20', 'Islam', '0231412415', '2023-10-10', '20231110071822yqdhz2bdtmhqbuin7iwd.avif', 'A+', '4.10', '60', 0, NULL, NULL, NULL, NULL, NULL, '2023-11-10 01:18:22', '2023-11-10 01:18:22'),
(21, 'Sina', 'Sina123@gmail.com', NULL, '$2y$10$NCFqgXYPTLMfNlj4/Ur3S.6mVZE2KlGsivgG59B.PtO0Fd7J22xdy', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-24 07:35:21', '2023-12-24 07:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', NULL, NULL),
(2, 'Tuesday', NULL, NULL),
(3, 'Wednesday', NULL, NULL),
(4, 'Thursday', NULL, NULL),
(5, 'Friday', NULL, NULL),
(6, 'Saturday', NULL, NULL),
(7, 'Sunday', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_register`
--
ALTER TABLE `marks_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marks_register`
--
ALTER TABLE `marks_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
