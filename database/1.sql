-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table lms.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.admins: ~2 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `first_name`, `last_name`, `middle_name`, `birthday`, `address`, `position`, `phone`, `profile_image`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Jenna', 'Musgrave', NULL, '2020-08-12', 'New York', '2', '123-456-7890', 'profile/admin/1598026189.jpg', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-21 16:09:49', '2020-08-21 16:31:58'),
	(2, 'Chris', 'Musgrave', NULL, '2020-08-06', 'New York', '3', '7777', 'profile/admin/1598026222.jpg', 'admin2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-21 16:10:22', '2020-08-21 16:32:14');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;


-- Dumping structure for table lms.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `classes_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.assignments: ~6 rows (approximately)
DELETE FROM `assignments`;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` (`id`, `name`, `attach`, `video`, `grade_id`, `classes_id`, `course_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
	(1, 'Math Assignment 1', 'assignment/txt/1598027388.pdf', 'assignment/video/1598027388.mp4', 2, 1, 1, NULL, '2020-08-21 16:29:48', '2020-08-21 16:29:48'),
	(2, 'Math Assignment 2', 'assignment/txt/1598027418.pdf', 'assignment/video/1598027418.mp4', 2, 1, 1, NULL, '2020-08-21 16:30:18', '2020-08-21 16:30:18'),
	(3, 'Computer Assignment 1', 'assignment/txt/1598027451.pdf', 'assignment/video/1598027451.mp4', 2, 1, 2, NULL, '2020-08-21 16:30:51', '2020-08-21 16:30:51'),
	(4, 'Computer Assignment 2', 'assignment/txt/1598027476.pdf', 'assignment/video/1598027476.mp4', 2, 2, 2, NULL, '2020-08-21 16:31:16', '2020-08-21 16:31:16'),
	(5, 'Teacher1 Assignment 01', 'assignment/txt/1598027915.pdf', 'assignment/video/1598027915.mp4', 2, 1, 3, 1, '2020-08-21 16:37:08', '2020-08-21 16:38:35'),
	(6, 'Teacher1 Assignment 02', 'assignment/txt/1598027884.pdf', 'assignment/video/1598027884.mp4', 2, 1, 3, 1, '2020-08-21 16:38:04', '2020-08-21 16:38:04');
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;


-- Dumping structure for table lms.attands
CREATE TABLE IF NOT EXISTS `attands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `status` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.attands: ~2 rows (approximately)
DELETE FROM `attands`;
/*!40000 ALTER TABLE `attands` DISABLE KEYS */;
INSERT INTO `attands` (`id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, '2020-08-21', '2020-08-21 16:36:30', '2020-08-21 16:36:30'),
	(8, 2, '2020-08-21', '2020-08-21 18:39:14', '2020-08-21 18:39:14');
/*!40000 ALTER TABLE `attands` ENABLE KEYS */;


-- Dumping structure for table lms.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.classes: ~4 rows (approximately)
DELETE FROM `classes`;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` (`id`, `grade_id`, `teacher_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 'first-01', '2020-08-21 16:15:50', '2020-08-21 16:28:55'),
	(2, 2, 3, 'first-02', '2020-08-21 16:16:01', '2020-08-21 16:29:10'),
	(3, 2, NULL, 'first-03', '2020-08-21 16:16:09', '2020-08-21 16:16:09'),
	(4, 3, NULL, 'second-01', '2020-08-21 16:16:16', '2020-08-21 16:16:16'),
	(5, 3, NULL, 'second-02', '2020-08-21 16:16:23', '2020-08-21 16:16:23');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;


-- Dumping structure for table lms.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.courses: ~2 rows (approximately)
DELETE FROM `courses`;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Math', '2020-08-21 16:16:30', '2020-08-21 16:16:30'),
	(2, 'Computer', '2020-08-21 16:16:40', '2020-08-21 16:16:40'),
	(3, 'Course 1', '2020-08-21 16:35:16', '2020-08-21 16:35:16');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


-- Dumping structure for table lms.directors
CREATE TABLE IF NOT EXISTS `directors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `directors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.directors: ~0 rows (approximately)
DELETE FROM `directors`;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-21 16:07:33', '2020-08-21 16:07:33');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;


-- Dumping structure for table lms.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


-- Dumping structure for table lms.grades
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.grades: ~2 rows (approximately)
DELETE FROM `grades`;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(2, 'First Grade', '2020-08-21 16:15:11', '2020-08-21 16:15:20'),
	(3, 'Second Grade', '2020-08-21 16:15:35', '2020-08-21 16:15:35');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;


-- Dumping structure for table lms.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.migrations: ~13 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(48, '2014_10_12_000000_create_users_table', 1),
	(49, '2014_10_12_100000_create_password_resets_table', 1),
	(50, '2019_08_19_000000_create_failed_jobs_table', 1),
	(51, '2020_07_30_041117_create_directors_table', 1),
	(52, '2020_08_15_132122_create_admins_table', 1),
	(53, '2020_08_16_121938_create_teachers_table', 1),
	(54, '2020_08_16_134722_create_students_table', 1),
	(55, '2020_08_16_154937_create_grades_table', 1),
	(56, '2020_08_17_063746_create_classes_table', 1),
	(57, '2020_08_18_053612_create_courses_table', 1),
	(58, '2020_08_19_034126_create_assignments_table', 1),
	(59, '2020_08_20_070905_create_attands_table', 1),
	(60, '2020_08_21_065718_create_scores_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table lms.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table lms.scores
CREATE TABLE IF NOT EXISTS `scores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `score` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.scores: ~2 rows (approximately)
DELETE FROM `scores`;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
INSERT INTO `scores` (`id`, `teacher_id`, `student_id`, `assignment_id`, `score`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 2.50, '2020-08-21 16:39:21', '2020-08-21 16:39:21'),
	(2, 1, 1, 6, 2.80, '2020-08-21 16:40:22', '2020-08-21 16:40:22');
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;


-- Dumping structure for table lms.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `last_school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent1_first` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent1_last` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent1_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent2_first` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent2_last` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent2_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classes_id` int(11) DEFAULT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.students: ~2 rows (approximately)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `first_name`, `last_name`, `middle_name`, `birthday`, `address`, `grade_id`, `last_school`, `last_grade`, `profile_image`, `phone`, `parent1_first`, `parent1_last`, `parent1_phone`, `parent2_first`, `parent2_last`, `parent2_phone`, `classes_id`, `course_name`, `email`, `password`, `payment`, `created_at`, `updated_at`) VALUES
	(1, 'Student1', 'B', NULL, '2020-08-05', 'New York', 2, 'Oxford', 'First Grade', 'profile/student/1598026640.png', '123-456-7890', 'James', 'Musgrave', '1234', 'Oxana', 'Musgrave', '789', 1, 'Math, Computer, ', 'student1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', '2020-08-21 16:17:20', '2020-08-21 16:35:30'),
	(2, 'Student2', 'B', NULL, '2020-08-13', 'New York', 2, 'Oxford', 'First Grade', 'profile/student/1598026689.png', '123-456-7890', 'James', 'Musgrave', '123', 'Oxana', 'Musgrave', '789', 2, 'Math, ', 'student2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', '2020-08-21 16:18:09', '2020-08-21 16:35:34');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;


-- Dumping structure for table lms.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `classes_id` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.teachers: ~2 rows (approximately)
DELETE FROM `teachers`;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `middle_name`, `birthday`, `address`, `subject`, `phone`, `profile_image`, `grade_id`, `classes_id`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Jenna', 'B', NULL, '2020-08-11', 'New York', 'Math, Computer', '123-456-7890', 'profile/teacher/1598026353.jpg', 2, 1, 'teacher1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-21 16:12:33', '2020-08-21 16:33:20'),
	(3, 'Chris', 'B', NULL, '2020-08-18', 'New York', 'Math, Computer', '456', 'profile/teacher/1598026447.jpg', 2, 2, 'teacher2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-21 16:14:07', '2020-08-21 16:33:30');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;


-- Dumping structure for table lms.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lms.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
