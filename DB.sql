-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2020 at 06:09 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certificates`
--
CREATE DATABASE IF NOT EXISTS `certificates` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `certificates`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `email`, `name`, `phone`, `password`, `role`, `status`) VALUES
(1, 'mohgood2020@gmail.com', 'محمد ابوالجود', '012534', '$2y$10$rUzycLr.Orx0BxK39HmSoOmtMcNUl7EnNGvg94jDOrzfKtf3aHbe2', 'admin', NULL),
(5, 'amhalotaibi@moj.gov.sa', 'أسماء العتيبى', '0100200300', '$2y$10$Q7oM4yvmX6DKOHYDydaD4ucfOUn/E9YJaZboMkdG9TFtnRseZwTXu', 'admin', NULL),
(6, 'husamsf@moj.gov.sa', 'حسام الزهراني', '0100002000', '$2y$10$0HTD8M3SF0X4w1eftvO4Ausny5/W0ItzVQDG0dxT0YnGOLxprLp.W', 'course', NULL),
(7, 'aaaqarrni@moj.gov.sa', 'عائض القرني', '01251478', '$2y$10$SVdQ4lyiOwMNiqIVL/tY5u8zNKhjSei.Ihngdtg6LG4YiDCyiTZf.', 'course', NULL),
(8, 'jibrinma@moj.gov.sa', 'محمد الجبرين', '021544', '$2y$10$TRMLhezABZCffPBHx/piv.QiKhF8EHUfF41XJY8ODAhDUGr1t6Eee', 'course', NULL),
(9, 'oshanqiti@moj.gov.sa', 'عمر الشنقيطي', '52244755', '$2y$10$9lfX6nPDBkVv5PS2GEWeSO2zOtUsr7vsuJqmmIXjfVhxeUNC3zbpi', 'course', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hours` varchar(100) NOT NULL,
  `days` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `form` int(11) NOT NULL DEFAULT '1',
  `fromDate` varchar(255) DEFAULT NULL,
  `toDate` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `hours`, `days`, `date`, `form`, `fromDate`, `toDate`, `created_by`) VALUES
(1, 'نموذج 1 عن بعد', 'ساعتين تدريبيتين', '', 'الخميس ٢٩ محرم ١٤٤٢هـ', 1, '', '', NULL),
(2, 'نموذج 2 لفترة', '١٥', '٣', '', 2, '١٤٤٢/٢/٥ه', '١٤٤٢/٢/٣ه', NULL),
(3, 'تجربة 3', 'ساعتين تدريبيتين', '', 'يوم الخميس ٢٩ محرم ١٤٤٢هـ', 1, '', '', NULL),
(4, 'تجربة4', 'ساعتين تدريبيتين', '', 'يوم الخميس ٢٩ محرم ١٤٤٢هـ', 1, '', '', NULL),
(5, 'تطبيقات قضائية في المحاكم التجارية', 'أربعة ساعات', '', '٢٦ صفر', 1, '', '', 7),
(6, 'تطبيقات قضائية في المحاكم التجارية', 'أربعة ساعات', '', '٢٦ صفر', 1, '', '', 7),
(7, 'إدارة الأولويات', '٩', '٣', '١٧محرم١٤٤٢هـ', 2, '', '١٩محرم١٤٤٢هـ', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users_courses`
--

CREATE TABLE `users_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `certifcate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_courses`
--

INSERT INTO `users_courses` (`id`, `title`, `name`, `email`, `national_id`, `phone`, `generated`, `created_at`, `updated_at`, `certifcate`, `course`) VALUES
(1, 'الأستاذة', 'أسماء العتيبي', 'amhalotaibi@moj.gov.sa', '1107474890', NULL, NULL, '2020-10-08 16:03:06', '2020-10-15 05:00:59', NULL, '1'),
(2, 'الأستاذة', 'أسماء العتيبي', 'momar@cpt-it.com', '11074748901', '552200904', NULL, '2020-10-08 16:17:50', '2020-10-08 16:17:50', NULL, '2'),
(3, 'الأستاذة', 'أسماء العتيبي', 'amhalotaibi@moj.gov.sa', '1107474890', '552200904', NULL, '2020-10-08 18:29:35', '2020-10-08 18:29:35', NULL, '3'),
(4, 'الأستاذة', 'أسماء العتيبي', 'mohgood2020@gmail.com', '100100200', '552200904', NULL, '2020-10-08 18:31:00', '2020-10-08 18:31:00', NULL, '4'),
(5, 'الاستاذ', 'عائض بن عبدالله القرني', 'aaaqarrni@moj.gov.sa', '1030215774', '506665458', NULL, '2020-10-12 22:19:55', '2020-10-12 22:19:55', NULL, '5'),
(6, 'الاستاذ', 'عائض بن عبدالله القرني', 'aaaqarrni@moj.gov.sa', '1030215774', '506665458', NULL, '2020-10-12 22:19:55', '2020-10-12 22:19:55', NULL, '6'),
(7, 'الاستاذه', 'فلانه فلان فلان الفلاني', 'aaaqarrni@moj.gov.sa', '1030215774', '506665458', NULL, '2020-10-12 22:19:55', '2020-10-12 22:19:55', NULL, '5'),
(8, 'الاستاذه', 'فلانه فلان فلان الفلاني', 'aaaqarrni@moj.gov.sa', '1030215774', '506665458', NULL, '2020-10-12 22:19:55', '2020-10-12 22:19:55', NULL, '6'),
(9, 'الاستاذه', 'فلانه فلان فلان الفلاني', 'aaaqarrni@moj.gov.sa', '1030215774', '506665458', NULL, '2020-10-12 23:59:18', '2020-10-12 23:59:18', NULL, '7'),
(10, 'المعلم', 'محمد الدوسري', 'fo@gmail.com', '41555252555', '01542847', NULL, '2020-10-15 04:23:44', '2020-10-15 04:23:44', NULL, '7'),
(11, 'قاضي', 'أحمد', 'drorr_1410@hotmail.com', '1107474899', NULL, NULL, '2020-10-15 05:02:22', '2020-10-15 05:08:56', NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `national_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `national_id`, `email`, `code`) VALUES
(13, '1107474890', 'amhalotaibi@moj.gov.sa', '611375'),
(3, '11074748901', 'momar@cpt-it.com', '743178'),
(9, '100100200', 'mohgood2020@gmail.com', '727381'),
(11, '1030215774', 'aaaqarrni@moj.gov.sa', '879931'),
(14, '1107474899', 'drorr_1410@hotmail.com', '159899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_courses`
--
ALTER TABLE `users_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_courses`
--
ALTER TABLE `users_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
