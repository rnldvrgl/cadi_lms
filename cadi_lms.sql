-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 12:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadi_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadi_all_notifications`
--

CREATE TABLE `cadi_all_notifications` (
  `id` int(11) NOT NULL,
  `notif_message` text NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `time_created` varchar(255) DEFAULT NULL,
  `notif_title` varchar(255) NOT NULL,
  `notif_redirect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadi_all_notifications`
--

INSERT INTO `cadi_all_notifications` (`id`, `notif_message`, `date_created`, `time_created`, `notif_title`, `notif_redirect`) VALUES
(75, 'A new book has been added mess', '2023-11-20', '11:15:23', 'A new book has been added', '#'),
(76, 'Dont has recently been added to the list of books.', '2023-11-20', '11:22:23', 'A new book has been added', '#'),
(77, '\"asdasd\" has recently been added to the list of books.', '2023-11-20', '11:25:13', 'A new book has been added', '#');

-- --------------------------------------------------------

--
-- Table structure for table `cadi_books`
--

CREATE TABLE `cadi_books` (
  `id` int(11) NOT NULL,
  `accesson_number` bigint(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` text DEFAULT NULL,
  `place_of_publication` text DEFAULT NULL,
  `publisher` text DEFAULT NULL,
  `copyright` int(11) NOT NULL DEFAULT 0,
  `available_count` int(11) NOT NULL DEFAULT 100,
  `borrowed_count` int(11) NOT NULL DEFAULT 0,
  `number_of_copies` int(11) NOT NULL DEFAULT 100,
  `is_archived` tinyint(4) NOT NULL DEFAULT 0,
  `date_added` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadi_books`
--

INSERT INTO `cadi_books` (`id`, `accesson_number`, `title`, `author`, `place_of_publication`, `publisher`, `copyright`, `available_count`, `borrowed_count`, `number_of_copies`, `is_archived`, `date_added`, `updated_at`) VALUES
(1, 2000, 'sample', 'sample', '\"sample\"', 'sample to', 20000, 3, 21, 31, 1, '', '2023-11-16 13:31:45'),
(210, 210, 'El Filibusterismo', 'Ako', '\"Sa bahay namin\"', 'Ako din', 2000, 15, 24, 40, 1, '2023-09-14', '2023-11-16 13:26:59'),
(274, 42073, 'Placeat qui aut doloremque.', 'Dr. Ted Medhurst PhD', '359 Graham Alley Apt. 960\nKertzmannview, NE 45573-7416', 'Champlin-Gerlach', 2009, 100, 0, 100, 0, '2023-09-14', NULL),
(275, 261, 'Minima eaque dicta dolore.', 'Ursula Grimes MD', '330 Louisa Lodge\nEast Maxineberg, NV 57221-0135', 'Terry, Grimes and Boyle', 2006, 92, 8, 100, 0, '2023-09-14', '2023-11-20 03:40:26'),
(276, 74204, 'Vitae vitae ipsum.', 'Prof. Trent Reinger Sr.', '397 Alexandro Stravenue\nEast Veronicaville, SC 17911', 'Tromp-Jakubowski', 2020, 100, 0, 100, 0, '2023-09-14', NULL),
(277, 50384, 'Ab omnis aliquam.', 'Mrs. Faye Parker', '6642 King Forks\nEast Trinityhaven, ND 74686', 'Torp-Weissnat', 2013, 100, 0, 100, 0, '2023-09-14', NULL),
(279, 50058, 'Amet aut officiis rerum.', 'Prof. Mikayla Wiegand', '77029 West Courts Suite 485\nLilianfort, CO 01975-3881', 'Ankunding-Abbott', 2021, 97, 3, 100, 0, '2023-09-14', '2023-11-20 03:49:12'),
(280, 67429, 'Doloremque repellat voluptatem.', 'Eldora Ruecker', '4874 Lakin Corners Apt. 504\nLake Clemens, DE 96217', 'Stroman-Hackett', 2009, 100, 0, 100, 0, '2023-09-14', NULL),
(281, 40175, 'Eum aut est exercitationem.', 'Cory Murazik', '54341 Amya Stream\nWest Loyal, PA 63058', 'Sipes-Funk', 2023, 100, 0, 100, 0, '2023-09-14', NULL),
(282, 48704, 'Et unde nostrum.', 'Miss Tiana Kerluke II', '98423 Morissette Gateway\nEast Maximillianberg, NY 45898-7523', 'Rolfson-Hartmann', 2009, 100, 0, 100, 0, '2023-09-14', NULL),
(283, 66115, 'Totam velit ratione.', 'Gretchen Wisozk', '968 Huels Stream Apt. 649\nEast Jessborough, IA 43204', 'Gorczany-Dare', 2019, 100, 0, 100, 0, '2023-09-14', NULL),
(284, 97572, 'Saepe ea.', 'Kianna Tremblay', '325 Ofelia Alley\nWest Wyman, DC 41601-1524', 'Nicolas-Halvorson', 2014, 100, 0, 100, 0, '2023-09-15', NULL),
(286, 58008, 'Quo ipsum repellat quibusdam.', 'Prof. Nellie Toy', '7437 Jarret Passage Apt. 501\nNew Chanelle, MD 25911', 'Steuber-Russel', 2012, 100, 0, 100, 0, '2023-09-15', NULL),
(287, 92454, 'Dolorem accusantium eos nihil.', 'Jazlyn Cassin', '9683 Kerluke Underpass Suite 744\nSouth Vickyberg, WI 85046-9462', 'Orn-Spinka', 2014, 100, 0, 100, 0, '2023-09-15', NULL),
(288, 54639, 'Aperiam nemo nobis.', 'Allen Heidenreich', '941 Estel Mount\nEliastown, TN 10785', 'Ryan, Monahan and Wehner', 2023, 100, 0, 100, 0, '2023-09-15', NULL),
(290, 59319, 'Deleniti sit quasi quae.', 'Kiara Kuhic', '438 Watsica Grove\nLulamouth, AZ 77401-3199', 'Watsica and Sons', 2005, 100, 0, 100, 0, '2023-09-15', NULL),
(291, 473, 'Aperiam assumenda et et.', 'Marianne Watsica', '8111 Auer Ports Suite 128\nKlingview, NH 30361-4791', 'Willms-Jacobi', 2015, 100, 0, 100, 0, '2023-09-15', NULL),
(292, 64583, 'Qui itaque consequatur.', 'Macie Kemmer', '536 Junior Forges Apt. 005\nMonahanfurt, CT 84922', 'Jacobson PLC', 2016, 100, 0, 100, 0, '2023-09-15', NULL),
(294, 93658, 'Est suscipit fuga.', 'Alba Spinka Jr.', '119 Adrian Manors Suite 442\nHipolitomouth, VA 64590', 'Jerde, Spencer and Jenkins', 2020, 100, 0, 100, 0, '2023-09-15', NULL),
(296, 49709, 'Placeat pariatur error quidem.', 'Dr. Lily Doyle', '30566 Lilian Springs Suite 184\nPort Verniceshire, HI 99390', 'Stiedemann Group', 2019, 100, 0, 100, 0, '2023-09-17', NULL),
(298, 123456789, 'Hatdog', 'ako', 'Sa bahay ko', 'doon lang', 2009, 200, 0, 200, 0, '2023-09-26', NULL),
(2020, 210, 'Noli Me Tangere', 'Ako', 'Sa bahay namin', 'Ako din', 2000, 27, 12, 40, 0, '2023-09-14', '2023-11-16 14:15:24'),
(2023, 9898, 'MAMA', 'nya daw', 'sapa', 'akokoo', 2000, 100, 0, 100, 0, '2023-11-20 11:15:23', '2023-11-20 11:15:23'),
(2024, 332, 'Dont', 'you', 'it', 'stop', 2033, 100, 0, 100, 0, '2023-11-20 11:22:23', '2023-11-20 11:22:23'),
(2025, 1245687, 'asdasd', 'asdasd', 'dfgdfg', 'sdswr34', 1211, 11, 0, 11, 0, '2023-11-20 11:25:13', '2023-11-20 11:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `cadi_borrowed_book_infos`
--

CREATE TABLE `cadi_borrowed_book_infos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` varchar(255) DEFAULT NULL,
  `date_borrowed` varchar(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `process_id` bigint(255) NOT NULL,
  `is_returned` int(1) DEFAULT 0,
  `return_date` varchar(255) DEFAULT NULL COMMENT '0 - not returned\r\n1 - returned\r\n2 - penalty paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadi_borrowed_book_infos`
--

INSERT INTO `cadi_borrowed_book_infos` (`id`, `user_id`, `book_id`, `date_borrowed`, `due_date`, `process_id`, `is_returned`, `return_date`) VALUES
(60, 1, '279', '2023-11-20', '2023-11-23', 18539690, 0, NULL),
(61, 1, '279', '2023-11-20', '2023-11-23', 17338370, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cadi_logs`
--

CREATE TABLE `cadi_logs` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `action_done` text DEFAULT NULL,
  `date_done` text NOT NULL,
  `time_done` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadi_logs`
--

INSERT INTO `cadi_logs` (`id`, `user_name`, `action_done`, `date_done`, `time_done`) VALUES
(86, 'Aldwin Nunag', 'Archived a student. Student name: Honey', '2023-10-01', '07:49:58'),
(87, 'Aldwin Nunag', 'Deleted a book. Title: dimahulaan', '2023-11-01', '07:50:07'),
(88, 'Aldwin Nunag', 'Added book. Title: Ale', '2023/11/14', '13:26:37'),
(89, 'Aldwin Nunag', 'Added book. Title: Ale', '2023/11/14', '13:27:50'),
(90, 'Aldwin Nunag', 'Archived a student. Student name: Perfect Dive', 'November-14-2023', '14:56:01'),
(91, 'Aldwin Nunag', 'Archived a student. Student name: Honey', 'November-14-2023', '14:56:06'),
(92, 'Aldwin Nunag', 'Deleted a book. Title: stustu', '2023/11/15', '14:50:16'),
(93, 'Aldwin Nunag', 'Deleted a book. Title: Quia numquam autem.', '2023/11/15', '14:51:39'),
(94, 'Aldwin Nunag', 'Deleted a book. Title: Eligendi blanditiis.', '2023/11/15', '14:51:46'),
(95, 'Aldwin Nunag', 'Deleted a book. Title: Deserunt ad unde et.', '2023/11/15', '14:52:42'),
(96, 'Aldwin Nunag', 'Deleted a book. Title: Inventore totam perspiciatis voluptatum.', '2023/11/15', '14:53:08'),
(97, 'Aldwin Nunag', 'Deleted a book. Title: Sed corrupti necessitatibus.', '2023/11/15', '14:54:32'),
(98, 'Aldwin Nunag', 'Deleted a book. Title: Facere temporibus amet repudiandae.', '2023/11/15', '14:54:45'),
(99, 'Aldwin Nunag', 'Archived a book. Title: El Filibusterismo', '2023/11/15', '15:00:59'),
(100, 'Aldwin Nunag', 'Deleted a book. Title: stustu', '2023/11/15', '15:06:51'),
(101, 'Aldwin Nunag', 'Archived a student. Student name: Perfect Dive', 'November-16-2023', '03:55:58'),
(102, 'Aldwin Nunag', 'Archived a student. Student name: stustu', 'November-16-2023', '03:58:23'),
(103, 'Aldwin Nunag', 'Archived a student. Student name: stustu', 'November-16-2023', '03:59:04'),
(104, 'Aldwin Nunag', 'Archived a student. Student name: stustu', 'November-16-2023', '04:06:07'),
(105, 'Aldwin Nunag', 'Archived a student. Student name: student', 'November-16-2023', '04:06:19'),
(106, 'Aldwin Nunag', 'Deleted a book. Title: stustu', '2023/11/16', '04:06:29'),
(107, 'Aldwin Nunag', 'Deleted a book. Title: stustu', '2023/11/16', '04:10:41'),
(108, 'Aldwin Nunag', 'Deleted a book. Title: Ale', '2023/11/16', '04:23:04'),
(109, 'Aldwin Nunag', 'Archived a student. Student name: asdasd123123', 'November-16-2023', '04:56:01'),
(110, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 39', '2023/11/16', '04:57:05'),
(111, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 39', '2023/11/16', '04:58:56'),
(112, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 39', '2023/11/16', '05:02:17'),
(113, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 39', '2023/11/16', '05:02:31'),
(114, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 39', '2023/11/16', '05:03:39'),
(115, 'Aldwin Nunag', 'Archived a book. Title: ', '2023/11/16', '05:34:12'),
(116, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:34:26'),
(117, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:35:50'),
(118, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:36:32'),
(119, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:37:52'),
(120, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:38:19'),
(121, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:38:25'),
(122, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:38:38'),
(123, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:39:04'),
(124, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:39:17'),
(125, 'Aldwin Nunag', 'Mark as paid ', '2023/11/16', '05:39:38'),
(126, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 23594214', '2023/11/16', '13:55:45'),
(127, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 23594214', '2023/11/16', '13:56:30'),
(128, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 400486514', '2023/11/16', '13:56:47'),
(129, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 96568573', '2023/11/16', '13:56:58'),
(130, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 57435715', '2023/11/16', '14:23:40'),
(131, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 1428247', '2023/11/16', '14:23:57'),
(132, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 86475000', '2023/11/16', '14:24:55'),
(133, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: 29058672', '2023/11/18', '14:25:16'),
(134, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: ', '2023/11/20', '03:27:11'),
(135, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: ', '2023/11/20', '03:33:35'),
(136, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: ', '2023/11/20', '03:34:39'),
(137, 'Aldwin Nunag', 'Deleted a transaction. transaction ID: ', '2023/11/20', '03:48:50'),
(138, 'Aldwin Nunag', 'Added book. Title: MAMA', '2023/11/20', '11:11:46'),
(139, 'Aldwin Nunag', 'Added book. Title: MAMA', '2023/11/20', '11:13:49'),
(140, 'Aldwin Nunag', 'Added book. Title: MAMA', '2023/11/20', '11:15:23'),
(141, 'Aldwin Nunag', 'Added book. Title: Dont', '2023/11/20', '11:22:23'),
(142, 'Aldwin Nunag', 'Added book. Title: asdasd', '2023/11/20', '11:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `cadi_penalty_amounts`
--

CREATE TABLE `cadi_penalty_amounts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadi_penalty_amounts`
--

INSERT INTO `cadi_penalty_amounts` (`id`, `user_id`, `amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, '267', 12, 0, '2023-09-26 00:00:00', '2023-09-26 00:00:00'),
(2, '268', 12, 0, '2023-09-26 00:00:00', '2023-09-26 00:00:00'),
(3, '267', 12, 0, '2023-09-26 00:00:00', '2023-09-26 00:00:00'),
(4, '267', 12, 0, '2023-09-26 00:00:00', '2023-09-26 00:00:00'),
(5, '267', 12, 0, '2023-09-26 00:00:00', '2023-09-26 00:00:00'),
(6, '268', 12, 0, '2023-10-11 00:00:00', '2023-10-11 00:00:00'),
(7, '268', 12, 0, '2023-10-11 00:00:00', '2023-10-11 00:00:00'),
(8, '267', 12, 0, '2023-10-11 00:00:00', '2023-10-11 00:00:00'),
(9, '268', 12, 0, '2023-10-20 00:00:00', '2023-10-20 00:00:00'),
(10, '268', 12, 0, '2023-10-20 00:00:00', '2023-10-20 00:00:00'),
(11, '267', 12, 0, '2023-10-20 00:00:00', '2023-10-20 00:00:00'),
(12, '268', 12, 0, '2023-10-20 00:00:00', '2023-10-20 00:00:00'),
(13, '268', 12, 0, '2023-10-20 00:00:00', '2023-10-20 00:00:00'),
(14, '267', 12, 0, '2023-10-20 00:00:00', '2023-10-20 00:00:00'),
(15, '268', 12, 0, '2023-11-04 00:00:00', '2023-11-04 00:00:00'),
(16, '268', 12, 0, '2023-11-04 00:00:00', '2023-11-04 00:00:00'),
(17, '268', 12, 0, '2023-11-04 00:00:00', '2023-11-04 00:00:00'),
(18, '268', 12, 0, '2023-11-04 00:00:00', '2023-11-04 00:00:00'),
(19, '268', 12, 0, '2023-11-05 00:00:00', '2023-11-05 00:00:00'),
(20, '268', 12, 0, '2023-11-05 00:00:00', '2023-11-05 00:00:00'),
(21, '268', 12, 0, '2023-11-05 00:00:00', '2023-11-05 00:00:00'),
(22, '268', 12, 0, '2023-11-05 00:00:00', '2023-11-05 00:00:00'),
(23, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(24, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(25, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(26, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(27, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(28, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(29, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(30, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(31, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(32, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(33, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(34, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(35, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(36, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(37, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(38, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(39, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(40, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(41, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(42, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(43, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(44, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(45, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(46, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(47, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(48, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(49, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(50, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(51, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(52, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(53, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(54, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(55, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(56, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(57, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(58, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(59, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(60, '268', 12, 0, '2023-11-06 00:00:00', '2023-11-06 00:00:00'),
(61, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(62, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(63, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(64, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(65, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(66, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(67, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(68, '268', 12, 0, '2023-11-07 00:00:00', '2023-11-07 00:00:00'),
(71, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(72, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(73, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(74, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(75, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(76, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(77, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(78, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(79, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(80, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(81, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(82, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(83, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(84, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(85, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(86, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(87, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(88, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(89, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(90, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(91, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(92, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(93, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(94, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(95, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(96, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(97, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(98, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(99, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(100, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(101, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(102, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(103, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(104, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(105, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(106, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(107, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(108, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(109, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(110, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(111, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(112, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(113, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(114, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(115, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(116, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(117, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(118, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(119, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(120, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(121, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(122, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(123, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(124, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(125, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(126, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(127, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(128, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(129, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(130, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(131, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(132, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(133, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(134, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(135, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(136, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(137, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(138, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(139, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(140, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(141, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(142, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(143, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(144, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(145, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(146, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(147, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(148, '268', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00'),
(149, '1', 12, 0, '2023-11-08 00:00:00', '2023-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cadi_users`
--

CREATE TABLE `cadi_users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT '1' COMMENT '1 - active\r\n0 - not active',
  `is_banned` varchar(255) NOT NULL DEFAULT '0' COMMENT '1 - banned\r\n0 - not banned',
  `is_archived` int(1) NOT NULL DEFAULT 0,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(255) DEFAULT '0',
  `is_verified` varchar(255) NOT NULL DEFAULT '0',
  `usertype` varchar(255) NOT NULL DEFAULT 'admin',
  `last_login` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadi_users`
--

INSERT INTO `cadi_users` (`id`, `name`, `uname`, `email`, `pword`, `is_active`, `is_banned`, `is_archived`, `created_at`, `updated_at`, `remember_token`, `is_verified`, `usertype`, `last_login`) VALUES
(1, 'Aldwin Nunag', 'anunag', 'aldwinnunag20@gmail.com', 'qweqwe', '1', '0', 0, '2023-08-29', '2023-09-07 01:42:19', '', '1', 'admin', 'November-20-2023 - 10:04:30'),
(2, 'asdasd', 'asdasd', 'asdasd@gmail.com', '123123', '1', '0', 0, '2023-09-01 02:23:12', '2023-09-03 03:56:02', '0', '0', '', ''),
(3, 'hellobesh', 'hellobesh', 'hello@gmail.com', 'hello@gmail.com', '1', '0', 0, '2023-09-01 02:23:34', '2023-09-01 02:23:34', '0', '0', 'librarian', ''),
(4, 'Perfect Dive', 'perttoo@gmail.com', '1', 'per@gmail.com', '1', '0', 1, '2023-09-01 02:49:25', '2023-09-01 02:49:25', '0', '0', 'student', ''),
(5, 'dimahulaan', 'dimahulaan', 'dimahulaan@gmail.com', 'dimahulaan', '1', '0', 0, '2023-09-01 08:03:22', '2023-09-01 08:03:22', '0', '0', 'student', 'November-18-2023 - 14:31:30'),
(6, 'Honey', 'honey@gmail.com', 'honey@gmail.com', '123123', '1', '0', 1, '2023-09-02 15:03:11', '2023-09-02 15:03:11', '0', '0', 'student', 'September-15-2023 - 06:45:07'),
(7, 'suc', 'suc@gmail.com', 'suc@gmail.com', 'succcc', '0', '0', 0, '2023-09-02 15:03:51', '2023-09-02 15:03:51', '0', '0', 'student', ''),
(268, 'ahh', NULL, 'ahcom@gmail.com', 'ahhhhhh', '1', '0', 0, '2023-09-02 15:07:14', '2023-09-02 15:07:14', '0', '0', 'student', 'November-14-2023 - 13:22:42'),
(270, 'student', 'student@gmail.com', 'student@gmail.com', 'student', '1', '0', 1, '2023-11-15 08:39:48', '2023-11-15 08:39:48', '0', '0', 'student', NULL),
(271, 'stustu', 'stustu@gmail.com', 'stustu@gmail.com', 'stustu', '1', '0', 1, '2023-11-15 08:48:23', '2023-11-15 08:48:23', '0', '0', 'student', NULL),
(274, 'asdasd123123', 'alertalert-success@gmail.com', 'alertalert-success@gmail.com', '123123123', '1', '0', 1, '2023-11-15 08:51:52', '2023-11-15 08:51:52', '0', '0', 'student', NULL),
(275, 'success', 'success@gmail.com', 'success@gmail.com', 'successsuccess', '1', '0', 0, '2023-11-15 08:52:49', '2023-11-15 08:52:49', '0', '0', 'student', NULL),
(276, 'asdasd@gmail.com', 'asdasd@gmail.com', 'asdasd@gmail.com', 'asdasd@gmail.com', '1', '0', 0, '2023-11-15 09:53:15', '2023-11-15 09:53:15', '0', '0', 'student', NULL),
(277, 'ale', 'bebybeale@gmail.com', 'bebybeale@gmail.com', 'asdfghjkl', '1', '0', 0, '2023-11-15 21:07:58', '2023-11-15 21:07:58', '0', '0', 'student', NULL),
(278, 'kulang', 'kulang@gmail.com', 'kulang@gmail.com', 'kulang', '1', '0', 0, '2023-11-16 19:46:35', '2023-11-16 19:46:35', '0', '0', 'student', NULL),
(279, 'Juan Dela', 'juandela@gmail.com', 'juandela@gmail.com', 'qweqweqwe', '1', '0', 0, '2023-11-18 21:48:05', '2023-11-18 21:48:05', '0', '0', 'student', NULL),
(280, 'tetetete', 'tetetete@gmail.com', 'tetetete@gmail.com', 'qweqwe', '1', '0', 0, '2023-11-19 08:49:37', '2023-11-19 08:49:37', '0', '0', 'student', NULL),
(281, 'tetetetete', 'tetetete@gnm.com', 'tetetete@gnm.com', 'qweqweqwe', '1', '0', 0, '2023-11-19 08:50:03', '2023-11-19 08:50:03', '0', '0', 'student', NULL),
(282, 'tetetetete', 'tetetete@gnm.com', 'tetetete@gnm.com', '123123123', '1', '0', 0, '2023-11-19 08:55:34', '2023-11-19 08:55:34', '0', '0', 'student', NULL),
(284, 'taho', 'asd@gma.com', 'asd@gma.com', 'asdasd', '1', '0', 0, '2023-11-19 08:59:02', '2023-11-19 08:59:02', '0', '0', 'librarian', NULL),
(285, 'aaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@gm.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@gm.com', 'aaaaaaa', '1', '0', 0, '2023-11-19 09:12:25', '2023-11-19 09:12:25', '0', '0', 'admin', NULL),
(286, 'test modal', 'addstudentmodal@gmail.com', 'addstudentmodal@gmail.com', 'qweqweqwe', '1', '0', 0, '2023-11-19 21:26:14', '2023-11-19 21:26:14', '0', '0', 'admin', NULL),
(287, 'ppalit', 'ppalit@gmail.co', 'ppalit@gmail.co', 'mppalit', '1', '0', 0, '2023-11-19 21:27:31', '2023-11-19 21:27:31', '0', '0', 'admin', NULL),
(288, 'wqaitlang', 'wqaitlang@gmail.com', 'wqaitlang@gmail.com', 'wqaitlang', '1', '0', 0, '2023-11-19 21:28:15', '2023-11-19 21:28:15', '0', '0', 'student', NULL),
(289, 'sarsa', 'sarsa@gmail.com', 'sarsa@gmail.com', 'sarsa@gmail.com', '1', '0', 0, '2023-11-19 22:39:13', '2023-11-19 22:39:13', '0', '0', 'student', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cadi_user_notifications`
--

CREATE TABLE `cadi_user_notifications` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `notif_message` text DEFAULT NULL,
  `date_created` varchar(250) DEFAULT NULL,
  `time_Created` varchar(255) DEFAULT NULL,
  `notif_title` varchar(255) DEFAULT NULL,
  `notif_redirect` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `gg` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`id`, `user_id`, `gg`, `date`) VALUES
(1, 0, 'ako this', 'date to');

-- --------------------------------------------------------

--
-- Table structure for table `test2`
--

CREATE TABLE `test2` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test2`
--

INSERT INTO `test2` (`id`, `name`, `age`, `email`) VALUES
(0, 'ako', 20, 'ayisangmodel@gmail.com'),
(0, 'ikaw', 1, 'qwert123');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadi_all_notifications`
--
ALTER TABLE `cadi_all_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadi_books`
--
ALTER TABLE `cadi_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadi_borrowed_book_infos`
--
ALTER TABLE `cadi_borrowed_book_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `cadi_logs`
--
ALTER TABLE `cadi_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadi_penalty_amounts`
--
ALTER TABLE `cadi_penalty_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadi_users`
--
ALTER TABLE `cadi_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cadi_user_notifications`
--
ALTER TABLE `cadi_user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadi_all_notifications`
--
ALTER TABLE `cadi_all_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `cadi_books`
--
ALTER TABLE `cadi_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2026;

--
-- AUTO_INCREMENT for table `cadi_borrowed_book_infos`
--
ALTER TABLE `cadi_borrowed_book_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cadi_logs`
--
ALTER TABLE `cadi_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `cadi_penalty_amounts`
--
ALTER TABLE `cadi_penalty_amounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `cadi_users`
--
ALTER TABLE `cadi_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `cadi_user_notifications`
--
ALTER TABLE `cadi_user_notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
