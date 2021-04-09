-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2021 at 04:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `photo` text,
  `pet_note` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `pet_id`, `owner_id`, `photo`, `pet_note`, `date`) VALUES
(1, 1, 35, '120727_gridImage.png', 'qwe24', '2021-03-19 09:46:25'),
(2, 2, 35, 'chihuahua.jpg', 'qweeee', '2021-03-19 10:22:27'),
(3, 15, 39, 'german-shepherd.jpg', 'qweeeee', '2021-03-19 10:08:40'),
(4, 15, 39, 'chihuahua.jpg', 'sample note', '2021-03-19 10:53:55'),
(5, 15, 39, 'german-shepherd.jpg', 'edited note', '2021-03-19 11:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `pet_weight` varchar(11) NOT NULL,
  `pet_temperature` varchar(11) NOT NULL,
  `pet_document` text NOT NULL,
  `pet_laboratory` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(255) NOT NULL,
  `request_status` varchar(255) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `request_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `pet_id` int(255) NOT NULL,
  `pet_class` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `appointment_type` varchar(255) NOT NULL,
  `vaccine_type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `request_status`, `tag`, `request_id`, `owner_id`, `pet_id`, `pet_class`, `pet_breed`, `request_type`, `appointment_type`, `vaccine_type`, `date`) VALUES
(1, 'Approved', '', 0, 0, 0, '', '', '', '', '', '2021-02-05 05:17:58'),
(2, 'Approved', '', 7, 0, 0, '', '', '', '', '', '2021-02-05 05:24:57'),
(3, 'Approved', '', 9, 0, 0, '', '', '', '', '', '2021-02-05 05:28:28'),
(4, 'Approved', '', 6, 37, 0, '', '', 'Grooming', 'Home Service', '', '2021-02-05 05:39:38'),
(5, 'Rejected', '', 0, 0, 0, '', '', '', '', '', '2021-02-05 05:48:03'),
(6, 'Approved', '', 9, 37, 8, '', '', 'Vaccination', 'Home Service', '', '2021-02-05 06:16:02'),
(7, 'Approved', '', 7, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-02-05 06:16:05'),
(8, 'Approved', '', 9, 37, 8, '', '', 'Vaccination', 'Home Service', '', '2021-02-05 06:17:13'),
(9, 'Approved', '', 7, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-02-05 06:17:19'),
(10, 'Rejected', '', 9, 0, 0, '', '', '', '', '', '2021-02-05 06:19:47'),
(11, 'Approved', '', 0, 0, 0, '', '', '', '', '', '2021-02-05 07:12:27'),
(12, 'Approved', '', 7, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-02-05 07:12:39'),
(13, 'Approved', '', 9, 37, 8, '', '', 'Vaccination', 'Home Service', '', '2021-02-05 07:12:48'),
(14, 'Rejected', '', 9, 37, 8, '', '', 'Vaccination', 'Home Service', '', '2021-02-05 07:12:51'),
(15, 'Approved', '', 9, 37, 8, '', '', 'Vaccination', 'Home Service', '', '2021-02-06 16:27:02'),
(16, 'Rejected', '', 9, 37, 8, '', '', 'Vaccination', 'Home Service', '', '2021-02-06 16:27:13'),
(17, 'Approved', '', 8, 37, 9, '', '', 'Consultation', 'Home Service', '', '2021-02-07 22:38:21'),
(18, 'Deleted', '', 3, 37, 0, '', '', 'Consultation', 'Home Service', '', '2021-02-07 22:42:03'),
(19, 'Approved', 'Show', 7, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-03-02 18:18:23'),
(20, '', NULL, 0, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-02-23 22:50:57'),
(21, '', NULL, 0, 37, 10, '', '', 'Consultation', 'Home Service', '', '2021-02-24 05:13:14'),
(22, '', NULL, 0, 35, 5, '', '', 'Consultation', 'Home Service', '', '2021-03-01 21:03:45'),
(23, 'Approved', NULL, 12, 35, 5, '', '', 'Consultation', 'Home Service', '', '2021-03-01 21:05:06'),
(24, 'Approved', NULL, 11, 37, 10, '', '', 'Consultation', 'Home Service', '', '2021-03-02 12:33:55'),
(25, 'Approved', 'Show', 7, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-03-02 18:18:15'),
(26, 'Approved', NULL, 10, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-03-03 03:45:56'),
(27, 'Approved', 'Show', 10, 37, 11, '', '', 'Consultation', 'Home Service', '', '2021-03-03 03:46:06'),
(28, '', NULL, 0, 39, 15, '', '', 'Consultation', 'Home Service', '', '2021-03-14 22:47:10'),
(29, 'Approved', NULL, 14, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-15 02:03:17'),
(30, 'Approved', 'Show', 14, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-15 02:03:31'),
(31, '', NULL, 0, 39, 15, '', '', 'Consultation', 'Clinic', '', '2021-03-19 06:28:46'),
(32, 'Approved', NULL, 15, 39, 15, '', '', 'Consultation', 'Clinic', '', '2021-03-19 06:29:40'),
(33, 'Approved', 'Show', 15, 39, 15, '', '', 'Consultation', 'Clinic', '', '2021-03-19 06:29:51'),
(34, '', NULL, 0, 39, 15, '', '', 'Consultation', 'Clinic', '', '2021-03-19 11:56:15'),
(35, 'Approved', NULL, 17, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 12:00:51'),
(36, 'Approved', 'Show', 17, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:20:11'),
(37, 'Approved', 'Show', 17, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:32:07'),
(38, 'Approved', 'Show', 17, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:33:31'),
(39, 'Approved', 'Show', 17, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:34:49'),
(40, 'Approved', 'Show', 17, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:37:59'),
(41, 'Approved', 'Show', 15, 39, 15, '', '', 'Consultation', 'Clinic', '', '2021-03-19 13:39:12'),
(42, 'Approved', 'No-Show', 14, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:40:08'),
(43, 'Approved', 'No-Show', 14, 39, 16, '', '', 'Grooming', 'Clinic', '', '2021-03-19 13:41:18'),
(44, 'Approved', 'No-Show', 12, 35, 5, '', '', 'Consultation', 'Home Service', '', '2021-03-19 13:42:21'),
(45, 'Approved', 'Show', 11, 37, 10, '', '', 'Consultation', 'Home Service', '', '2021-03-19 13:50:04'),
(46, '', NULL, 0, 41, 17, '', '', 'Consultation', 'Clinic', '', '2021-03-20 02:36:55'),
(47, 'Approved', NULL, 19, 41, 17, '', '', 'Consultation', 'Clinic', '', '2021-03-20 03:39:05'),
(48, 'Deleted', NULL, 4, 37, 0, '', '', 'Consultation', 'Walk in', '', '2021-03-24 01:41:10'),
(49, 'Deleted', NULL, 5, 37, 0, '', '', 'Vaccination', 'Home Service', '', '2021-03-24 01:41:24'),
(50, 'Deleted', NULL, 6, 37, 0, '', '', 'Grooming', 'Home Service', '', '2021-03-24 01:41:33'),
(51, 'Approved', NULL, 18, 41, 17, '', '', 'Grooming', 'Clinic', '', '2021-03-24 22:34:54'),
(52, '', NULL, 0, 45, 18, '', '', 'Consultation', 'Clinic', '', '2021-03-25 00:37:31'),
(53, 'Rejected', NULL, 21, 45, 18, '', '', 'Grooming', 'Home Service', '', '2021-03-25 00:38:57'),
(54, 'Approved', NULL, 20, 45, 18, '', '', 'Consultation', 'Clinic', '', '2021-03-25 00:39:01'),
(55, 'Approved', 'Show', 20, 45, 18, '', '', 'Consultation', 'Clinic', '', '2021-03-25 00:39:37'),
(56, 'Deleted', NULL, 21, 45, 18, '', '', 'Grooming', 'Home Service', '', '2021-03-26 00:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_from` varchar(255) NOT NULL,
  `message_status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `owner_id`, `message`, `message_from`, `message_status`, `date`) VALUES
(1, 35, '', 'Admin', 'Deleted', '2021-02-26 09:36:21'),
(2, 35, 'qweqweqwe', 'Admin', 'Sent', '2021-02-26 09:36:27'),
(3, 35, 'hello harry potter', 'Admin', 'Sent', '2021-02-26 09:53:13'),
(4, 35, 'hello harry', 'Admin', 'Deleted', '2021-03-01 21:07:22'),
(5, 39, 'hello user', 'Admin', 'Sent', '2021-03-08 00:17:01'),
(6, 39, 'qweqwe', 'Admin', 'Deleted', '2021-03-08 00:40:15'),
(7, 0, 'hello abi', 'Admin', 'Sent', '2021-03-15 01:54:49'),
(8, 0, 'helooo', 'Admin', 'Sent', '2021-03-15 01:55:37'),
(9, 39, 'hello again', 'Admin', 'Sent', '2021-03-15 01:58:18'),
(10, 39, 'HEY', 'Admin', 'Sent', '2021-03-16 14:02:46'),
(11, 45, 'GJHTFGJHFG', 'Admin', 'Sent', '2021-03-25 00:43:31'),
(12, 45, 'GJHTFGJHFG', 'Admin', 'Sent', '2021-03-25 00:43:31'),
(13, 0, 'sgseddfh', '45', 'Sent', '2021-03-25 00:45:03'),
(14, 39, 'HEYY', 'Admin', 'Replied', '2021-03-31 13:12:14'),
(15, 39, 'qweqwe', 'Admin', 'Replied', '2021-04-05 23:25:31'),
(16, 39, 'qweq', 'Admin', 'Replied', '2021-04-05 23:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `pet_note` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `pet_id`, `owner_id`, `pet_note`, `date`) VALUES
(1, 1, 35, '35', '2021-02-12 17:19:08'),
(2, 4, 35, '4 35 testing', '2021-02-12 17:19:54'),
(3, 8, 37, 'Your dog has been slain', '2021-02-23 22:43:32'),
(4, 16, 39, 'gupit', '2021-03-15 02:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `pet_status` varchar(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `pet_birth` date NOT NULL,
  `pet_weight` varchar(255) NOT NULL,
  `pet_temp` varchar(255) DEFAULT NULL,
  `pet_vaccine_history` varchar(255) DEFAULT NULL,
  `pet_photo` varchar(255) DEFAULT NULL,
  `pet_class` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `owner_id`, `pet_status`, `pet_name`, `pet_birth`, `pet_weight`, `pet_temp`, `pet_vaccine_history`, `pet_photo`, `pet_class`, `pet_breed`) VALUES
(1, 35, '', 'arp', '0000-00-00', '21kg', '31', NULL, 'german-shepherd.jpg', 'Dog', 'German Shepherd'),
(2, 35, '', 'arp arp', '0000-00-00', '10kg', '30', NULL, 'german-shepherd.jpg', 'Dog', 'German Shepherd'),
(4, 35, '', 'kitkat', '0000-00-00', '20kg', '30', NULL, 'persian-cat.jpg', 'Cat', 'Persian Cat'),
(5, 35, '', 'doggs', '0000-00-00', '10kg', '30', NULL, 'chihuahua.jpg', 'Dog', 'Chihuahua'),
(8, 37, '', 'Roger', '0000-00-00', '22kg', '30', NULL, 'german-shepherd.jpg', 'Dog', 'German Shepherd'),
(9, 37, '', 'Chiwawaw', '0000-00-00', '22kg', '30', NULL, 'chihuahua.jpg', 'Dog', 'Chihuahua'),
(10, 37, '', 'Doggie', '0000-00-00', '22kg', '30', '2020-11-19', 'german-shepherd.jpg', 'Dog', 'German Shepherd'),
(11, 37, '', 'Catty', '0000-00-00', '10kg', '30', NULL, 'chihuahua.jpg', 'Cat', 'Persian Cat'),
(12, 38, '', '', '0000-00-00', '10kg', '30', '2020-11-10', 'german-shepherd.jpg', 'Dog', 'German Shepherd'),
(13, 38, '', '', '0000-00-00', '10kg', '30', '2020-11-18', 'persian-cat.jpg', 'Cat', 'Persian Cat'),
(14, 35, '', 'doggsee', '0000-00-00', '10kg', '22', NULL, 'chihuahua.jpg', 'Dog', 'German Shepherd'),
(15, 39, '', 'rojah', '0000-00-00', '21kg', '30', NULL, 'german-shepherd.jpg', 'Dog', 'German Shepherd'),
(16, 39, '', 'chichay', '0000-00-00', '5kg', '30', NULL, 'german-shepherd.jpg', 'Dog', 'Bichon Frise'),
(17, 41, '', 'cloud', '0000-00-00', '20kg', '37', NULL, 'german-shepherd.jpg', 'Dog', 'Alaskan'),
(18, 45, '', 'mingming', '0000-00-00', '20kg', '35', NULL, '', 'Cat', 'Persian Cat');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photos_id`, `location`, `member_id`) VALUES
(1, 'upload/7918240442_4471d5b11e_b.jpg', 1),
(2, 'upload/gw111.jpg', 33),
(3, 'upload/GodsWar Online [USA] - Troy 4_7_2020 12_07_40 PM.png', 33),
(4, 'upload/BossRan 1_25_2020 7_36_37 AM.png', 35);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `type`, `item_name`, `item_description`, `quantity`, `item_price`, `date_updated`) VALUES
(1, 'Vaccine', 'Biogesic', '3 in 1 plus 1', 4, 12, '2021-03-26 22:54:23'),
(2, 'Vaccine', 'Neozep', 'qwejhqwe', 0, 0, '2021-03-26 22:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `totalAmount` int(11) DEFAULT NULL,
  `totalFinal` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `type`, `owner_id`, `item_name`, `item_description`, `quantity`, `amount`, `totalAmount`, `totalFinal`, `date`) VALUES
(11, 'Vaccine', 39, 'Biogesic', '3', 4, 44, 176, 176, '2021-03-26 20:52:22'),
(12, 'Vaccine', 0, 'Biogesic', '3', 1, 500, 500, 500, '2021-03-26 20:52:32'),
(13, 'Groom', 0, '', '', 1, 9, 9, 9, '2021-03-26 20:58:18'),
(14, 'Groom', 0, '', '', 1, 9, 9, 9, '2021-03-26 20:58:23'),
(15, 'CBC', 0, 'Biogesic', '3', 4, 4, 16, 16, '2021-03-26 21:17:10'),
(16, '', 0, '', '', 0, 0, 0, 0, '2021-03-17 10:25:52'),
(17, '', 39, '', '', 4, 4, 16, 16, '2021-03-17 10:28:21'),
(18, 'CBC', 39, 'Biogesic', '3', 4, 4, 16, 16, '2021-03-26 21:17:16'),
(19, 'CBC', 39, '', '3', 4, 5, 20, 20, '2021-03-26 21:17:26'),
(20, '', 39, '', NULL, 4, 5, 20, 20, '2021-03-17 10:42:57'),
(21, '', 39, 'Biogesic', '', 4, 11, 44, 44, '2021-03-17 10:48:17'),
(22, '', 39, 'Biogesic', NULL, 2, 11, 22, 22, '2021-03-17 10:48:17'),
(23, 'BLOOD CHEM', 39, 'Biogesic', '3', 4, 1, 4, 4, '2021-03-27 01:34:27'),
(24, 'BLOOD CHEM', 39, 'Biogesic', NULL, 4, 2, 8, 8, '2021-03-27 01:34:22'),
(25, 'BLOOD CHEM', 39, 'Biogesic', '3', 4, 3, 12, 12, '2021-03-27 01:34:17'),
(26, 'BLOOD CHEM', 39, 'Biogesic', '3', 4, 4, 16, 16, '2021-03-27 01:34:12'),
(27, 'BLOOD CHEM', 39, 'Biogesic', '3', 4, 5, 20, 20, '2021-03-27 01:34:07'),
(28, '', 39, 'Biogesic', '3', 4, 6, 24, 24, '2021-03-17 13:06:30'),
(29, '', 39, 'Biogesic', '3', 4, 7, 28, 28, '2021-03-17 13:06:30'),
(30, '', 39, 'Biogesic', '3', 4, 8, 32, 32, '2021-03-17 13:06:30'),
(31, '', 39, 'Biogesic', '3', 4, 9, 36, 36, '2021-03-17 13:06:30'),
(32, '', 39, 'Biogesic', '3', 4, 10, 40, 40, '2021-03-17 13:06:30'),
(33, '', 39, 'Biogesic', 'qwejhqwe', 4, 10, 40, 40, '2021-03-19 06:33:27'),
(34, '', 39, '', NULL, 0, 0, 0, 0, '2021-03-19 06:33:27'),
(35, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(36, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(37, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(38, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(39, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(40, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(41, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(42, '', 39, '', '', 0, 0, 0, 0, '2021-03-19 06:33:27'),
(43, '', 35, 'Neozep', 'qwejhqwe', 4, 4, 16, 16, '2021-03-19 11:22:55'),
(44, '', 35, '', NULL, 0, 0, 0, 0, '2021-03-19 11:22:55'),
(45, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(46, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(47, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(48, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(49, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(50, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(51, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(52, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:22:55'),
(53, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(54, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(55, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(56, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(57, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(58, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(59, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46'),
(60, '', 35, '', '', 0, 0, 0, 0, '2021-03-19 11:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `appointment_type` varchar(255) NOT NULL,
  `vaccine_type` varchar(255) NOT NULL,
  `request_status` varchar(255) NOT NULL,
  `request_concern` varchar(255) NOT NULL,
  `request_date` date NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `request_note` varchar(255) NOT NULL,
  `message_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `owner_id`, `tag`, `owner_name`, `contact_no`, `pet_breed`, `pet_name`, `request_type`, `appointment_type`, `vaccine_type`, `request_status`, `request_concern`, `request_date`, `date_requested`, `request_note`, `message_status`) VALUES
(1, 1, '', '', '', '1', '', '0', '', '', '1', '', '0000-00-00', '2021-02-11 06:35:16', 'Your Appointment has been Approved.', 0),
(7, 37, '', '', '', '11', '', 'Consultation', 'Home Service', '', 'Approved', '', '2021-01-25', '2021-02-11 06:35:16', 'Your Appointment has been Approved.', 1),
(8, 37, '', '', '', '9', '', 'Consultation', 'Home Service', '', 'Approved', '', '2021-01-26', '2021-02-11 06:35:16', 'Your Appointment has been Approved.', 1),
(9, 37, '', '', '', '8', '', 'Vaccination', 'Home Service', '', 'Rejected', '', '2021-01-22', '2021-02-11 06:35:16', 'Your Appointment has been Rejected.', 1),
(10, 37, '', '', '', '11', '', 'Consultation', 'Home Service', '', 'Approved', 'my pet looks like a dog', '2021-02-26', '2021-03-03 03:45:56', 'Your Appointment has been Approved.', 1),
(11, 37, 'Show', '', '', '10', '', 'Consultation', 'Home Service', '', 'Approved', 'yung mga aso ko mukang pusa', '2021-02-26', '2021-03-19 13:50:04', 'Your Appointment has been Approved.', 1),
(12, 35, 'No-Show', '', '', '5', '', 'Consultation', 'Home Service', '', 'Approved', 'yung aso ko nagiging si roger minsan', '0000-00-00', '2021-03-19 13:42:21', 'Your Appointment has been Approved.', 1),
(13, 39, '', '', '', '15', '', 'Consultation', 'Home Service', '', 'Pending', 'rojah is coming', '2021-03-16', '2021-03-14 22:47:10', '', 0),
(14, 39, 'No-Show', '', '', '16', '', 'Grooming', 'Clinic', '', 'Approved', 'full grooming', '2021-03-16', '2021-03-19 13:41:18', 'Your Appointment has been Approved.', 1),
(15, 39, 'Show', '', '', '15', '', 'Consultation', 'Clinic', '', 'Approved', 'sample concern', '2021-03-20', '2021-03-19 13:39:12', 'Your Appointment has been Approved.', 1),
(16, 39, '', '', '', '15', '', 'Consultation', 'Clinic', '', 'Pending', '03 22 2021', '2021-03-22', '2021-03-19 11:56:14', '', 0),
(17, 39, 'Show', '', '', '16', '', 'Grooming', 'Clinic', '', 'Approved', 'groom', '2021-03-22', '2021-03-19 13:37:59', 'Your Appointment has been Approved.', 1),
(18, 41, '0', '', '', '17', '', 'Grooming', 'Clinic', '', 'Approved', 'grooming', '2021-03-21', '2021-03-24 22:34:53', 'Your Appointment has been Approved.', 1),
(19, 41, '0', '', '', '17', '', 'Consultation', 'Clinic', '', 'Approved', 'not eating', '2021-03-21', '2021-03-20 03:39:05', 'Your Appointment has been Approved.', 1),
(20, 45, 'Show', '', '', '18', '', 'Consultation', 'Clinic', '', 'Approved', 'cough', '2021-03-25', '2021-03-25 00:39:37', 'Your Appointment has been Approved.', 1),
(21, 39, '', '', '', '15', '', 'Vaccination', 'Home Service', 'Rabbies', 'Pending', 'qwe', '0000-00-00', '2021-04-01 23:36:39', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `access` int(9) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `access`, `firstname`, `middlename`, `lastname`, `birthdate`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$qZnDx0XBtTBJGoN/nNSlNeWP582rPDUuNvEk7E.V.QXZvXXyyr0lK', 1, 1, 'John', NULL, 'Russel', NULL, '', '', 'haya.jpg', 1, '', '', '2018-05-01'),
(35, 'harry1@den.com', '$2y$10$prQVdu/RZ2vG0nNE2WNPaeE1jux7992a9V0YcQwW3ZVAiNgJRdQDa', 0, 0, 'Harry', NULL, 'harry', NULL, 'qwe', '123123', 'BossRan 1_25_2020 7_36_44 AM.png', 1, 'eqT2lY4nxW1z', '', '2020-11-06'),
(36, 'newuser@g.c', '$2y$10$vw6FVPlgYgWF8nrOYDWdue8YH6oGn7Tw/ExGrCTWVYzdC4R.ylKMm', 0, 0, 'new', NULL, 'user', NULL, '', '', 'BossRan 1_25_2020 7_33_14 AM.png', 1, 'Pw2dKRVQHSiY', '', '2020-11-07'),
(37, 'new@g.c', '$2y$10$AeI395SSLrn529VASTCwDO10SWrqR11Ici.ISwiOhDq9p4ukX3xHu', 0, 0, 'new', NULL, 'new', NULL, 'eeee', '09224123', '16473248_1512952268745380_7534525838051156543_n.jpg', 1, 'ilxyY7uo8aGZ', '', '2020-11-07'),
(38, 'usernew@g.c', '$2y$10$YXklnWHE4rJm6S/fGB4n1uoF79cV2IGF.ZjjsKRBcw/.oTYpwaJaG', 0, 0, 'new', NULL, 'user', NULL, '', '', 'BossRan 1_25_2020 7_36_44 AM.png', 1, 'CDTfl9YVF4Md', '', '2020-11-07'),
(39, 'user@user.com', '$2y$10$lOWnVlOpZ0z.2FZIl3DPMuIDR/Kq.1e18jpM6zpA23Vwk/EV6hm7G', 0, 0, 'user', NULL, 'user', NULL, 'N/a', 'N/a', 'IMG_20210307_061112.jpg', 1, 'NKzByIgrjuc9', '', '2021-02-26'),
(40, 'testing@gmail.com', '$2y$10$wDdqQX19Jth1z1L9u40UFOk.vfoiDfJpFPQX31g0tPm4YwofeBdDe', 0, 0, 'test', NULL, 'testing', NULL, '', '', '', 1, 'f3qudokLTwWJ', '', '2021-03-20'),
(41, 'testing1@gmail.com', '$2y$10$A40GgyeoMf0brtu0a/Ut5.86CSovNJ.sGjv1WyF3sAHtQwKLOnWaq', 0, 0, 'test', NULL, 'testing', NULL, '', '', '', 1, 'wE49OqHN7imD', '', '2021-03-20'),
(42, 'tessy1@g.c', '$2y$10$xGTqukfhTjJqoSOlV6HpQOksMy/xWmryUp.nCrCEG7PJoHa4NbK8m', 0, 0, 'tes', 'tess', 'tessy', '0000-00-00', '', '', '', 0, 'IyEQpMWwZrsh', '', '2021-03-21'),
(43, 'tessy2@g.c', '$2y$10$AtJGWsLdHeDOTHansdFrT.g7jPA5A79a/Zd9TAO0nccQ0zbYsLpZK', 0, 0, 'tes', 'rrr', 'tessy', '2021-03-18', '', '123123123', '1847_gridImage.png', 1, 'JGyto51vbFQ3', '', '2021-03-21'),
(45, 'queeny.allyson13@gmail.com', '$2y$10$p9eG60j5W6DKdMvJKknBKejf1bJ45GjEcoR.a.wD1jTTHPRAl3oNq', 0, 0, 'queeny', 'directo', 'canonizado', '1998-07-23', '', '09275245707', '', 1, 'O69xnsjipXb2', '', '2021-03-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photos_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
