-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 06:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soms`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `municipality`, `province`, `barangay`, `created_at`) VALUES
(1, 'Alba', '3', 'Allabon', '2024-09-05 18:39:08'),
(2, 'Agno', '3', 'Aloleng', '2024-09-05 18:40:25'),
(3, 'Agno', '3', 'Sample', '2024-09-12 05:44:50'),
(4, 'WOw', '2', 'wow', '2024-09-26 16:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `course`, `department_name`) VALUES
(8, 'BS Nursing', 'INSTITUTE OF NURSING'),
(9, 'Bachelor of Elementary Education', 'COLLEGE OF TEACHER EDUCATION'),
(10, 'Bachelor of Secondary Education', 'COLLEGE OF TEACHER EDUCATION'),
(11, 'BS Information Technology', 'BSIT'),
(12, 'Bachelor of Elementary Education', 'asd'),
(13, 'vsit', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `events_management`
--

CREATE TABLE `events_management` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `event_folders`
--

CREATE TABLE `event_folders` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `event_folders`
--

INSERT INTO `event_folders` (`id`, `event_id`, `folder_name`, `created_at`) VALUES
(1, 3, 'Organizations', '2024-09-10 21:15:34'),
(3, 4, 'First Event', '2024-10-13 05:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `event_photos`
--

CREATE TABLE `event_photos` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `folder_name` varchar(255) DEFAULT NULL,
  `uploaded_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `event_photos`
--

INSERT INTO `event_photos` (`id`, `event_id`, `photo_name`, `folder_name`, `uploaded_at`) VALUES
(2, 2, 'events/66de9b9c46d68.jpg', NULL, NULL),
(3, 2, 'events/66de9b9c4812e.png', NULL, NULL),
(4, 2, 'events/66de9f2e833b8.jpg', NULL, NULL),
(5, 3, '302597659_483170430485654_5599727337940796982_n.jpg', 'Organization', '2024-09-11'),
(6, 3, 'documentary-envelope-2.jpg', 'Organization', '2024-09-11'),
(7, 3, '302597659_483170430485654_5599727337940796982_n.jpg', 'Organization', '2024-09-11'),
(8, 3, 'documentary-envelope-2.jpg', 'Organization', '2024-09-11'),
(9, 3, 'mindanao zipcode.PNG', 'Organization', '2024-09-11'),
(10, 3, 'Starbright Office Depot.png', 'Organization', '2024-09-11'),
(11, 3, 'about-us-photo2.png', 'Starbright', '2024-09-11'),
(12, 3, 'Capture.PNG', 'Starbright', '2024-09-11'),
(13, 3, 'about-us-photo2.png', 'Starbright', '2024-09-11'),
(14, 3, 'Capture.PNG', 'Starbright', '2024-09-11'),
(15, 3, 'ss -dashboard.png', 'Organizations', '2024-09-11'),
(16, 4, 'Screenshot 2024-10-10 165347.png', '1st event', '2024-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `event_schedule`
--

CREATE TABLE `event_schedule` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `budget` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `event_schedule`
--

INSERT INTO `event_schedule` (`id`, `title`, `image_path`, `date`, `budget`, `org_id`, `description`, `status`) VALUES
(1, 'Test Title', 'cisco.png', '2024-09-01', 7000, 7, 'Test Title', 'ACTIVE'),
(2, 'asd', 'luffy_shen.png', '2024-09-01', 5000, 7, 'asd', 'ACTIVE'),
(3, 'asd', 'about-us-photo2.png', '2024-09-02', 5000, 7, 'asd', 'ACTIVE'),
(4, 'starbright', 'mindanao zipcode.PNG', '2024-09-03', 5000, 10, 'asd', 'ACTIVE'),
(5, 'Soccer', 'ngk-spark-plugs-500x500.jpg', '2024-09-30', 5000, 13, 'soccer', 'ACTIVE'),
(7, 'Testing na Event', 'phone-call.png', '2024-12-24', 0, 7, 'Test', 'ACTIVE'),
(8, 'Sample posting', 'pin.png', '2024-12-19', 7555, 7, 'Teasasdasd', 'REJECTED'),
(9, 'tetest', 'placeholder.png', '2024-12-29', 123, 15, 'testttt', 'ACTIVE'),
(10, '123123112', '440227972_3381741635460009_8553949861315671610_n.jpg', '2025-01-16', 123, 16, '3123123', 'ACTIVE'),
(11, '321', '461857516_18368326747111209_6532040241162741301_n.jpg', '2025-01-06', 123, 16, '123', 'ACTIVE'),
(12, '123', '447527104_3407529109547928_8336046724942837281_n.jpg', '2025-01-23', 321, 7, '321', 'REJECTED'),
(13, '123', '435485050_3368751356759037_7379572523247747236_n.jpg', '2025-01-18', 321, 16, '321', 'REJECTED'),
(14, 'test', '377496342_284868081056973_3131883958541202066_n-removebg-preview.png', '2025-01-22', 0, 16, 'test', 'REJECTED'),
(15, '123', '441489380_3395022154131957_2020794782272675669_n.jpg', '2025-01-14', 123, 16, '123', 'REJECTED'),
(16, '123', '448814224_3418543651779807_1953415502170066054_n.jpg', '2025-01-23', 123, 16, '123', 'REJECTED'),
(17, '123', '455183643_18361337401111209_6864872913176090652_n.jpg', '2025-01-17', 123, 16, '123', 'REJECTED'),
(18, '123', '677b5e50b8b24.jpg', '2025-01-09', 123, 16, '123', 'REJECTED'),
(19, 'test', '677b5e8099d05.jpg', '2025-01-14', 123, 16, 'tes6t', 'REJECTED'),
(20, '123', '677bbef526e49.png', '2025-01-06', 123, 16, 'test', 'ACTIVE'),
(21, '123', '677bc08aad8f9.png', '2025-01-09', 123, 16, '123', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `financial_statement`
--

CREATE TABLE `financial_statement` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `organization_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_statement`
--

INSERT INTO `financial_statement` (`id`, `event_id`, `description`, `cost`, `status`, `organization_id`) VALUES
(2, 1, 'Test', 5522.00, 'ACTIVE', NULL),
(3, 5, 'tasdasdasd', 5000.00, 'ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`, `created_at`, `type`) VALUES
(2, 24, 'New user registered: 123', 'accepted', '2025-01-04 21:50:26', NULL),
(3, 27, 'New user registered: test', 'accepted', '2025-01-04 22:37:10', NULL),
(4, 28, 'New user registered: president', 'accepted', '2025-01-04 22:44:02', NULL),
(13, 28, 'A new event has been created.', 'accepted', '2025-01-06 04:39:28', 'event'),
(14, 29, 'New user registered: adviser', 'accepted', '2025-01-06 10:22:00', NULL),
(15, 28, 'A new event has been created.', 'read', '2025-01-06 11:31:01', 'event'),
(16, 30, 'New user registered: pres', 'accepted', '2025-01-06 11:35:20', NULL),
(17, 30, 'A new event has been created.', 'read', '2025-01-06 11:37:46', 'event'),
(18, 31, 'New user registered: adviser123', 'accepted', '2025-01-06 11:41:53', NULL),
(19, 32, 'New user registered: newpresident', 'accepted', '2025-01-06 20:42:25', NULL),
(20, 33, 'New user registered: newpresident1', 'accepted', '2025-01-06 20:53:20', NULL),
(21, 34, 'New user registered: testadviser', 'accepted', '2025-01-06 21:11:39', NULL),
(22, 35, 'New user registered: tadviser', 'unread', '2025-01-06 21:23:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `officer_email` varchar(255) NOT NULL,
  `officer_phone` varchar(20) NOT NULL,
  `course` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `personal_statement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `student_name`, `officer_email`, `officer_phone`, `course`, `year`, `organization_name`, `position`, `personal_statement`) VALUES
(19, '4', 'hdeuhf21@gmail.com', '09987654321', 0, '', '7', 'Treasurer', ''),
(20, '3', 'delacruzalyssa607@gmail.com', '09465379305', 0, '', '7', 'Vice President', ''),
(21, '2', 'yedhsnskdj@gmail.com', '99875443345', 0, '', '7', 'P.R.Os.', ''),
(23, '1', 'hdiwdni@gmail.com', '123456789', 0, '4th Year', '7', 'President', 'kjfhiuecenucej'),
(24, '1', '', '', 0, '', '13', 'Vice President', ''),
(25, '16', '', '', 0, '', '7', 'President', ''),
(26, '17', '', '', 0, '', '13', 'President', ''),
(27, '17', '', '', 0, '', '10', 'President', ''),
(28, '17', '', '', 0, '', '10', 'Vice President', ''),
(29, '16', '', '', 0, '', '10', 'Secretary', '');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `organization_type` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `advisor_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `requirements` varchar(255) DEFAULT NULL,
  `organization_directory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_name`, `organization_type`, `department`, `advisor_name`, `contact_email`, `logo`, `created_at`, `requirements`, `organization_directory`) VALUES
(7, 'INFORMATION TECHNOLOGY STUDENT ORGANIZATION', 'Academic', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY', 'abcdefg', 'rfsdxsz@gmail.com', '66b511a9a2d881.25436988.png', '2024-08-09', NULL, NULL),
(10, 'PSU-BC', 'Sports', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY', 'aswa', 'aew@ghj.com', '66b597f1f24f47.45481820.jpg', '2024-08-09', NULL, NULL),
(13, 'Mistery', 'Academic', 'INSTITUTE OF NURSING', 'MisteryTechg', 'mis@gmail.com', '', '2024-09-12', '66e241463a6fa5.50417067.pdf', NULL),
(15, 'test', 'Arts', 'INSTITUTE OF NURSING', 'test', 'test@gmail.com', '', '2025-01-05', '6779b033c0b723.65222700.png', NULL),
(16, '123', 'Academic', 'BSIT', '123', '123@gmail.com', '', '2025-01-05', '6779b0b258aba5.28040540.png', 'orgs/123'),
(17, 'neworganization1', '', '', '', '', '', '2025-01-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section_table`
--

CREATE TABLE `section_table` (
  `id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `document1` varchar(255) NOT NULL,
  `document2` varchar(255) NOT NULL,
  `document3` varchar(255) NOT NULL,
  `document4` varchar(255) NOT NULL,
  `document5` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `organization` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'INACTIVE',
  `organization_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `username`, `password`, `lastname`, `firstname`, `middlename`, `course`, `year`, `section`, `gender`, `dob`, `age`, `email`, `phone`, `street`, `barangay`, `municipality`, `province`, `role`, `region`, `document1`, `document2`, `document3`, `document4`, `document5`, `position`, `organization`, `status`, `organization_id`) VALUES
(1, '24-BGU-456', 'Alyssaaaa', '', 'edcsce', 'odoewdmw', 'iuijkre', 'BS Business Administration', 'II', '3', 'Female', '2004-08-09', 20, 'hdeuhf21@gmail.com', '09987654321', 'Namualan Sur', 'Diaz', 'Bautista', 'Pangasinan', 'Students', NULL, '', '', '', '', '', NULL, 'Mistery', 'ACTIVE', NULL),
(8, '89-1', 'admin', 'admin', 'Dela Cruz', 'Alyssas', 'Lanorio', 'BS Information Technology', 'III', '3', 'Female', '2002-07-08', 22, 'delacruzalyssa607@gmail.com', '09465379305', 'zone 1', 'Vacante', 'Bautista', 'Pangasinan', 'Admin', NULL, '', '', '', '', '', NULL, '', 'ACTIVE', NULL),
(16, '24-BGU-555', 'empal', '', 'ANDRE', 'ray leigh mart', 'silvestre', 'Bachelor of Elementary Education', 'I', '2', 'Male', '1998-11-05', 25, 'admin@gmail.com', '09107899222', 'asdasd', 'Macupit', 'Cavite', 'Ilocos Norte', 'Students', 'Region I', '', '', '', '', '', NULL, '', 'ACTIVE', NULL),
(17, '11111', 'customer1', 'xHI9wptvKx7v', 'escalante', 'ray leigh mart', 'silvestre', 'Bachelor Of Science', 'II', '2', 'Male', '2024-10-10', 0, 'reydhenebueza0023@gmail.com', '1234341', 'sdasd', 'Barangay 37', 'Basilisa', 'Dinagat Islands', 'Students', 'Region XIII', '', '', '', '', '', 'President', '', 'ACTIVE', NULL),
(18, '', 'adviser1', 'psu12345', 'Test', 'Adviser', 'P.', 'Bachelor of Secondary Education', 'II', '3', 'Male', '2023-06-06', 1, 'test@gmail.com', '923232232', 'Testing Street', 'Address 1, Quiapo, Manila', 'Barangay Quiapo', 'Manila', 'Adviser', 'NCR', '', '', '', '', '', NULL, '', 'ACTIVE', NULL),
(19, '123456', 'president1', 'psu12345', 'Test', 'President', 'P.', 'Bachelor of Secondary Education', 'IV', '3', 'Female', '2022-10-25', 2, 'president@gmail.com', '923232232', 'Testing Street', 'Barangay 1', 'Kawit', 'Cavite', 'Students', 'Region IV-A', '', '', '', '', '', 'President', '', 'ACTIVE', NULL),
(20, '', 'adviser2', 'psu12345', 'Test', 'Adviser', 'P.', 'Bachelor of Elementary Education', 'IV', '3', 'Female', '2022-06-26', 2, 'test@gmail.com', '923232232', 'Testing Street', 'Address 2, Pasay', 'Barangay 29', 'Pasay', 'Adviser', 'NCR', '', '', '', '', '', NULL, '', 'ACTIVE', NULL),
(21, '24-BGU-123', 'student1', 'psu12345', 'student1', 'student1', 'student1', 'Bachelor of Secondary Education', 'II', '2', 'Female', '2015-06-22', 9, 'student1@gmail.com', '093223222222', 'Test Street', 'Barangay 11', 'Nabunturan', 'Davao de Oro', 'Students', 'Region XI', '', '', '', '', '', NULL, '', 'ACTIVE', NULL),
(22, '12-BGU-121', 'president_test1', '11111111', 'Mulingbayan', 'Jonas', 'Isaiah P.', 'Bachelor of Secondary Education', 'II', '3', 'Male', '1990-11-11', 25, 'jonasmulingbayan@gmail.com', '923232232', 'Bacoor Cavite', 'Barangay 4', 'Glan', 'Sarangani', 'President', 'Region XII', 'CCPRGG1L_INF244_ActivityNo.2-copy.pdf', 'web desing proj.pdf', 'Customer_Stock_Management_Flowchart_Steps_Corrected.pdf', 'Customer_Stock_Management_Flowchart_Steps_Corrected.pdf', 'Customer_Stock_Management_Flowchart_Steps_Corrected.pdf', 'President', 'IT ORG', 'ACTIVE', NULL),
(24, '12-BGU-123', '123', '123', '123', '123', '123', 'Bachelor of Elementary Education', 'I', '1', 'Male', '2025-01-05', 1, '123@gmail.com', '123', '123', 'Barangay Bel-Air', 'Makati', 'Metro Manila', 'President', 'NCR', '', '', '', '', '', 'President', '', 'ACTIVE', 7),
(26, '20220815', 'Manzano20220815', 'PSU2025', 'Manzano', 'Winmari', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', NULL, '', '', '', '', '', 'Vice President', '', 'ACTIVE', 7),
(27, '12-BGU-321', 'test', 'test', 'test', 'test', 'test', 'Bachelor of Elementary Education', 'II', '1', 'Male', '2025-01-05', 1, 'test@gmail.com', '9552839952', '123', 'Barangay 10', 'San Francisco', 'Agusan del Sur', 'President', 'Region XIII', '', '', '', '', '', 'President', '', 'ACTIVE', 15),
(28, '32-BGU-321', 'president', 'president', 'president', 'president', 'president', 'Bachelor of Elementary Education', 'I', '2', 'Male', '2025-01-08', 12, 'test@gmail.com', '9552839952', 'president', 'Barangay 4', 'Glan', 'Sarangani', 'President', 'Region XII', '', '', '', '', '', 'President', '', 'ACTIVE', 16),
(29, '', 'adviser', 'adviser', 'adviser', 'adviser', 'adviser', 'Bachelor of Elementary Education', 'II', '2', 'Female', '2025-01-05', 1, 'adviser@gmail.com', '9552839952', 'adviser', 'Barangay 3', 'Nasipit', 'Agusan del Norte', 'Adviser', 'CAR', '', '', '', '', '', NULL, '', 'ACTIVE', 16),
(30, '12-BGU-123', 'pres', 'pres', '123', '123', '123', 'Bachelor of Elementary Education', 'II', '2', 'Male', '2025-01-05', 1, 'pres@gmail.com', '12312321312', '123', 'Barangay 1', 'Butuan City', 'Agusan del Norte', 'President', 'Region XIII', '', '', '', '', '', 'President', '', 'ACTIVE', 16),
(31, '', 'adviser123', 'adviser123', 'adviser123', 'adviser123', 'adviser123', 'Bachelor of Elementary Education', 'II', '3', 'Male', '2024-12-29', 1, 'adviser123@gmail.com', '123123123', 'adviser123', 'Barangay 3', 'Lamitan City', 'Basilan', 'Adviser', 'BARMM', '', '', '', '', '', NULL, '', 'ACTIVE', 0),
(32, '12-BGU-123', 'newpresident', 'newpresident', 'newpresident', 'newpresident', 'newpresident', 'Bachelor of Secondary Education', 'II', '1', 'Female', '2024-12-31', 1, 'newpresident@gmail.com', '123123', 'newpresident', 'Barangay 2', 'Butuan City', 'Agusan del Norte', 'President', 'CAR', 'RRL.pdf', '', '', '', '', 'President', 'neworganization', 'ACTIVE', NULL),
(33, '12-BGU-123', 'newpresident1', 'newpresident1', 'newpresident1', 'newpresident1', 'newpresident1', 'Bachelor of Elementary Education', 'III', '3', 'Male', '2024-12-31', 12, 'newpresident1@gmail.com', '9552839952', 'newpresident1', 'Barangay 3', 'Nasipit', 'Agusan del Norte', 'President', 'CAR', '', '', '', '', '', 'President', 'neworganization1', 'ACTIVE', 17),
(34, '', 'testadviser', 'testadviser', 'testadviser', 'testadviser', 'testadviser', 'Bachelor of Secondary Education', 'I', '1', 'Female', '2025-01-08', 1, 'testadviser@gmail.com', '9552839952', 'testadviser', 'Barangay 1', 'Butuan City', 'Agusan del Norte', 'Adviser', 'Region XIII', '', '', '', '', '', NULL, 'neworganization1', 'ACTIVE', 17),
(35, '', 'tadviser', 'tadviser', 'tadviser', 'tadviser', 'tadviser', 'Bachelor of Elementary Education', 'I', '1', 'Male', '2024-12-29', 1, 'test@gmail.com', '9552839952', 'tadviser', 'Barangay 12', 'Lumba-Bayabao', 'Lanao del Sur', 'Adviser', 'BARMM', '', '', '', '', '', 'Adviser', '', 'INACTIVE', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`) USING BTREE;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `event_folders`
--
ALTER TABLE `event_folders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `event_photos`
--
ALTER TABLE `event_photos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `event_id` (`event_id`) USING BTREE;

--
-- Indexes for table `event_schedule`
--
ALTER TABLE `event_schedule`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `financial_statement`
--
ALTER TABLE `financial_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `section_table`
--
ALTER TABLE `section_table`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_folders`
--
ALTER TABLE `event_folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_photos`
--
ALTER TABLE `event_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event_schedule`
--
ALTER TABLE `event_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `financial_statement`
--
ALTER TABLE `financial_statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_photos`
--
ALTER TABLE `event_photos`
  ADD CONSTRAINT `event_photos_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event_schedule` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
