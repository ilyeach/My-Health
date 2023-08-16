-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2023 at 10:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `name`, `email_id`, `user_name`, `password`, `contact_number`, `status`, `created_at`) VALUES
(1, 'ilyeach', 'ilyeach121212@gmail.com', 'ilyeach', '12345', '7418107135', 1, '2023-05-28 14:26:36'),
(3, 'mani', 'mani@gmail.com', 'mani', '221133', '9876543210', 1, '2023-05-29 02:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` tinyint NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `patient_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `appointment_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `appointment_time_of_day` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `appointment_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `doctor_id`, `patient_id`, `appointment_date`, `appointment_time_of_day`, `appointment_time`, `created_at`, `update_at`) VALUES
(93, '1', '8', '15/08/2023', 'Morning', '10.45 am', '2023-08-15 15:40:09', '2023-08-15 15:40:09'),
(103, '1', '8', '17/08/2023', 'Morning', '10.00 am', '2023-08-16 22:40:06', '2023-08-16 22:40:06'),
(101, '1', '8', '16/08/2023', 'Morning', '10.00 am', '2023-08-15 21:07:59', '2023-08-15 21:07:59'),
(94, '1', '8', '15/08/2023', 'Morning', '10.45 am', '2023-08-15 15:41:44', '2023-08-15 15:41:44'),
(83, '1', '19', '12/08/2023', 'Morning', '11.00 am', '2023-08-09 16:36:14', '2023-08-09 16:36:14'),
(22, '6', '5', '24/07/2023', 'Morning', '10.15 am', '2023-08-07 17:16:45', '2023-08-07 17:16:45'),
(21, '3', '5', '24/07/2023', 'Morning', '10.00 am', '2023-08-07 17:17:07', '2023-08-07 17:17:07'),
(46, '2', '10', '05/08/2023', 'Afternoon', '12.30 pm', '2023-08-07 17:17:20', '2023-08-07 17:17:20'),
(19, '2', '5', '24/07/2023', 'Evening', '4.30 pm', '2023-08-07 17:17:29', '2023-08-07 17:17:29'),
(13, '3', '8', '23/07/2023', 'Morning', '10.15 am', '2023-08-07 17:18:56', '2023-08-07 17:18:56'),
(16, '7', '8', '25/07/2023', 'Morning', '10.00 am', '2023-08-07 17:20:47', '2023-08-07 17:20:47'),
(15, '3', '8', '22/07/2023', 'Morning', '10.15 am', '2023-08-07 17:19:06', '2023-08-07 17:19:06'),
(35, '2', '8', '25/07/2023', 'Morning', '10.00 am', '2023-08-07 17:20:18', '2023-08-07 17:20:18'),
(36, '7', '8', '29/07/2023', 'Evening', '5.30 pm', '2023-08-07 17:20:38', '2023-08-07 17:20:38'),
(43, '1', '8', '05/08/2023', 'Morning', '10.00 am', '2023-08-07 17:22:07', '2023-08-07 17:22:07'),
(41, '1', '8', '04/08/2023', 'Morning', '10.00 am', '2023-08-07 17:22:16', '2023-08-07 17:22:16'),
(45, '1', '10', '05/08/2023', 'Afternoon', '12.30 pm', '2023-08-07 17:21:57', '2023-08-07 17:21:57'),
(47, '3', '10', '05/08/2023', 'Afternoon', '12.30 pm', '2023-08-07 17:22:28', '2023-08-07 17:22:28'),
(48, '2', '8', '06/08/2023', 'Afternoon', '12.30 pm', '2023-08-07 17:22:37', '2023-08-07 17:22:37'),
(49, '2', '8', '06/08/2023', 'Morning', '10.00 am', '2023-08-07 17:23:15', '2023-08-07 17:23:15'),
(50, '2', '8', '06/08/2023', 'Morning', '10.15 am', '2023-08-07 17:20:08', '2023-08-07 17:20:08'),
(51, '2', '8', '07/08/2023', 'Morning', '10.00 am', '2023-08-07 17:18:44', '2023-08-07 17:18:44'),
(52, '12', '8', '06/08/2023', 'Morning', '10.00 am', '2023-08-07 17:15:38', '2023-08-07 17:15:38'),
(63, '2', '8', '08/08/2023', 'Morning', '10.00 am', '2023-08-08 18:05:22', '2023-08-08 18:05:22'),
(55, '1`', '5', '07/08/2023', 'Afternoon', '12.30 pm', '2023-08-07 15:58:07', '2023-08-07 15:58:07'),
(56, '3', '5', '24/07/2023', 'Morning', '10.00 am', '2023-08-07 17:16:55', '2023-08-07 17:16:55'),
(84, '1', '19', '12/08/2023', 'Morning', '10.30 am', '2023-08-09 16:37:12', '2023-08-09 16:37:12'),
(85, '1', '19', '12/08/2023', 'Morning', '10.00 am', '2023-08-09 16:37:54', '2023-08-09 16:37:54'),
(86, '2', '19', '12/08/2023', 'Evening', '6.00 pm', '2023-08-09 16:38:31', '2023-08-09 16:38:31'),
(87, '1', '8', '13/08/2023', 'Morning', '10.00 am', '2023-08-12 20:33:48', '2023-08-12 20:33:48'),
(89, '1', '8', '15/08/2023', 'Morning', '10.00 am', '2023-08-15 15:11:26', '2023-08-15 15:11:26'),
(90, '1', '8', '15/08/2023', 'Morning', '10.15 am', '2023-08-15 15:14:00', '2023-08-15 15:14:00'),
(91, '1', '8', '15/08/2023', 'Morning', '10.30 am', '2023-08-15 15:36:34', '2023-08-15 15:36:34'),
(92, '1', '8', '15/08/2023', 'Morning', '10.45 am', '2023-08-15 15:39:13', '2023-08-15 15:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

DROP TABLE IF EXISTS `doctor_details`;
CREATE TABLE IF NOT EXISTS `doctor_details` (
  `doctor_id` tinyint NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(100) NOT NULL,
  `graduation_status` varchar(50) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `specialist` varchar(100) NOT NULL,
  `fees` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `status` varchar(12) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `profile_photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`doctor_id`, `doctor_name`, `graduation_status`, `email_id`, `specialist`, `fees`, `gender`, `address`, `mobile`, `status`, `experience`, `profile_photo`, `created_at`, `update_at`) VALUES
(1, ' Dr. Anjali Shetty', 'BAMS', 'anjali@myhealth.com', 'General', '700', 'female', '      410, CMR Road, 2nd Block, Off Kammanahalli Main Road, Landmark: Opposite BSNL Office, Bangalore', '8877664433', 'Active', '15 years', '', '2023-07-04 01:07:53', '0000-00-00 00:00:00'),
(2, 'Dr. Utkarsha Lokesh', 'MBBS,MD', 'utkarsha@myhealth.com', 'Neurologist', '600', 'male', '  298, 16 and 17th Cross, 2nd Main Road, Sampige Road, Landmark: Opposite SBI ATM, Bangalore', '8976432123', 'Active', '15 years', '', '2023-07-04 01:09:49', '0000-00-00 00:00:00'),
(3, 'Dr. Pallavi Sarji', 'MBBS,MD', 'pallavi@myhealth.com', 'Surgeon', '500', 'female', '  298, Venkata Ranga Iyengar Road, Vyalikaval, Kodandarampura, Malleshwaram West, Landmark: Below Utkasrha Dental and Implant Clinic, Bangalore', '8976432123', 'Active', '6 years', '', '2023-07-04 01:11:22', '0000-00-00 00:00:00'),
(4, ' Dr. Ganesh Shetty', 'MBBS', 'ganesh@myhealth.com', 'General', '500', 'male', '   410, CMR Road, 2nd Block, Off Kammanahalli Main Road, Landmark: Opposite BSNL Office, Bangalore', '7565432123', 'Active', '15 years', '', '2023-07-04 01:13:11', '0000-00-00 00:00:00'),
(5, 'Dr. K.A. Mohan', 'MBBS', 'mohan@myhealth.com', 'Neurologist', '900', 'male', '      111, 4th Main, Landmark: Kalki Dhyana Mandir, Bangalore', '9998765443', 'Active', '7 years', '', '2023-07-04 01:15:20', '0000-00-00 00:00:00'),
(6, 'Dr. O. R. Kumaran', 'MBBS,MD', 'kumar@myhealth.com', 'General', '1000', 'male', ' Lake View Road, 80 Feet Road, KK Nagar, Landmark: Opposite Rajadhani Hotel, Madurai', '9998765443', 'Active', '8 years', '', '2023-07-04 01:16:41', '0000-00-00 00:00:00'),
(7, ' Dr. Bennet', 'MBBS,MD', 'raj@myhealth.com', 'Urologist', '500', '', ' 80 Feet Road, KK Nagar, Landmark: Opposite Rajadhani Hotel, Madurai', '9999888777', 'Active', '15 years', '', '2023-07-04 01:17:54', '0000-00-00 00:00:00'),
(8, ' Dr. Bennet Rajmohan', 'MBBS', 'bennetraj@myhealth.com', 'Urologist', '700', 'male', '  80 Feet Road, KK Nagar, Landmark: Opposite Rajadhani Hotel, Madurai', '9999888777', 'Active', '14 years', '', '2023-07-04 01:20:32', '0000-00-00 00:00:00'),
(9, 'Dr. R M Manikandan', 'MBBS,MS', 'mani@myhealth.com', 'General', '700', 'male', ' 80 Feet Road, KK Nagar, Landmark: Opposite Rajadhani Hotel, Madurai', '7676454567', 'Active', '12 years', '', '2023-07-04 01:23:40', '0000-00-00 00:00:00'),
(10, 'Dr. M. Paul Sudhakar', 'MBBS,MD', 'paul@myhealth.com', 'General', '500', 'male', ' Lake View Road, 80 Feet Road, KK Nagar, Landmark: Opposite Rajadhani Hotel, Madurai', '9988776789', 'Active', '12 years', '', '2023-07-04 01:28:32', '0000-00-00 00:00:00'),
(11, 'Dr Alagappan M', 'MBBS', 'alagappa@myhealth.com', 'Orthopaedics', '700', 'male', 'Lake View Road, 80 Feet Road, KK Nagar, Landmark: Opposite Rajadhani Hotel, Madurai', '765765998', 'Active', '12 years', '', '2023-07-04 01:29:49', '2023-07-04 01:29:49'),
(12, 'Dr. Arun Kumar J', 'MBBS', 'arun@myhealth.com', 'Urologist', '700', 'male', ' KK Nagar,Madurai', '9677876754', 'Active', '5 years', '', '2023-07-04 01:31:52', '0000-00-00 00:00:00'),
(13, 'Dr Asma J A Batcha', 'MBBS,MD', 'asma@myhealth.com', 'General', '600', 'female', ' pollo Speciality Hospitals KK', '899887888', 'Active', '5 years', '', '2023-07-04 01:33:21', '0000-00-00 00:00:00'),
(14, 'Dr. Balamurugan S', 'MBBS', 'bala@myhealth.com', 'Neurologist', '700', 'male', ' Chennai Bypass Road, Near Old Palpannai TiruchirappalliTrichy', '9954232123', 'Active', '10 years', '', '2023-07-04 01:34:48', '0000-00-00 00:00:00'),
(15, 'Dr. Bharathi Sundar M', 'MBBS,MS', 'barathi@myhealth.com', 'Neurologist', '600', 'female', ' Apollo Speciality Hospitals KK Nagar,Madurai', '9900885684', 'Active', '12 years', '', '2023-07-04 01:37:31', '0000-00-00 00:00:00'),
(16, 'Dr. Balu Mahendra K', 'MBBS', 'balu@myhealth.com', 'General', '1000', 'male', '  80 Feet Road, KK NagarMadurai', '9788678105', 'Active', '15 years', '', '2023-07-04 01:39:03', '0000-00-00 00:00:00'),
(17, 'Dr Devanand J', 'MBBS,MS', 'deva@myhealth.com', 'Surgeon', '900', 'male', ' 13,thirunagar 3rd stop,madurai', '9080997878', 'Active', '15 years', '', '2023-07-04 01:40:32', '0000-00-00 00:00:00'),
(18, 'Dr. Hemaleka K', 'MBBS', 'hema@myhealth.com', 'Urologist', '800', 'female', ' No.484-BWest, 1st St, near District Court,KK Nagar, Tamil NaduMadurai', '887098098', 'Active', '8 years', '', '2023-07-04 01:42:00', '0000-00-00 00:00:00'),
(19, 'Dr A Navaladi Shankar', 'MBBS,MD', 'navaladi@myhealth.com', 'Orthopaedics', '900', 'male', 'Greams Lane, 21, Greams Rd, Thousand LightsChennai', '887098098', 'Active', '15 years', '', '2023-07-04 01:43:11', '2023-07-04 01:43:11'),
(21, 'DR. KAMARAJ', 'MBBS', 'kamaraj@gmail.com', 'Surgeon', '1200', 'male', ' CHILD DOCTOR', '8121212121', 'Active', '15 years', '', '2023-08-09 11:16:28', '0000-00-00 00:00:00'),
(23, 'Kumari', 'MBBS', 'ilyea@gmail.com', 'General', '500', 'female', '  summa ', '7412321223', 'Active', '2 years', '', '2023-08-16 16:58:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_details`
--

DROP TABLE IF EXISTS `hospital_details`;
CREATE TABLE IF NOT EXISTS `hospital_details` (
  `hospital_id` tinyint NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(50) NOT NULL,
  `hospital_address` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hospital_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospital_details`
--

INSERT INTO `hospital_details` (`hospital_id`, `hospital_name`, `hospital_address`, `email_id`, `location`, `contact_number`, `created_at`, `update_at`) VALUES
(20, '  viladi', 'SUMMA', 'viladi@gmail.com', 'chennai', '1111111111', '2023-08-14 07:20:12', '0000-00-00 00:00:00'),
(18, '   Govt Hospital', 'Salem EAST', '123@west.com', 'Salem RURAL', '111111', '2023-06-21 15:12:14', '0000-00-00 00:00:00'),
(19, ' velammal hospital', '18.chinthamani,madurai', 'velammal@gmail.com', 'madurai - TAMIL NADU', '212111', '2023-06-27 06:43:00', '0000-00-00 00:00:00'),
(16, 'ilyeach', 'bangalur', 'arul@123qw', 'SUMMA', '12', '2023-06-21 10:49:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

DROP TABLE IF EXISTS `patient_details`;
CREATE TABLE IF NOT EXISTS `patient_details` (
  `patient_id` tinyint NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `patient_name`, `user_name`, `email_id`, `dob`, `contact_number`, `gender`, `address`, `password`, `created_at`, `update_at`) VALUES
(1, 'guru', '', 'guru@gmail', '', '7418107135', 'male', 'weddew', '12345', '2023-06-27 12:23:43', '2023-06-27 12:23:43'),
(6, 'ilyeach hos', '', 'viladi@gmail.com', '20/07/2018', '342532', 'Male', 'kjhgf', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'ajith', '', 'ajith@123', '2023-02-06', '77443322', 'male', '18,babdbg', '12345', '0000-00-00 00:00:00', '2023-08-07 14:20:13'),
(9, 'viladi', 'viladi', 'viladi@gmail.comss', '08/05/1995', '7502562505', 'Male', 'bangluru', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'jeeva', 'jeeva ', 'jeeva@gmail.com', '1996-06-11', '7418107135', 'male', '18madpuram vilakku', '12345', '0000-00-00 00:00:00', '2023-08-16 22:46:03'),
(10, 'Ramasamy', 'ramasamy', 'ramasamy@gmail.com', '01/08/2023', '1234567890', 'Male', 'Bangalore', 'ramasamy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'arun', 'arun', 'arun12@gmail', '01/08/2006', '5543432222', 'Male', 'awawes', 'arunkumar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'arulpr', 'arul p', 'arulp2@gmail', '01/08/2006', '5543432222', 'Male', 'awawes', 'arunkumar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'arulpr', 'arul p', 'arulp112@gmail', '01/08/2006', '5543432222', 'Male', 'awawes', 'arunkumar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'arulpr', 'arul p', 'arulp88112@gmail', '01/08/2006', '5543432222', 'Male', 'awawes', 'arunkumar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'arulpr', 'arul p', 'arulp32112@gmail', '01/08/2006', '5543432222', 'Male', 'awawes', 'arunkumar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'viladi', 'viladi', 'viladiarasu@gmail', '22233', '7507777777', 'Other', '11dwdax', '54321', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'viladi       tre', 'viladi', 'v@gmail.com', '2023-08-08', '333333333333', 'male', 'dlnsdnckjdsnckjdskjwqdkwdkjq', '123', '0000-00-00 00:00:00', '2023-08-08 18:16:12'),
(19, 'Mani PRAKASH CHINNASAMY NAVALUR, ATTUR, SALEM TAMIL NADU, MADURAI NEAR', 'mani', 'mani+123@gmail.com', '2003-04-02', '9787899999', 'male', 'BLURU', '123456', '0000-00-00 00:00:00', '2023-08-09 16:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `report_details`
--

DROP TABLE IF EXISTS `report_details`;
CREATE TABLE IF NOT EXISTS `report_details` (
  `rep_id` int NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(100) NOT NULL,
  `patient_name` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `message` varchar(1500) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report_details`
--

INSERT INTO `report_details` (`rep_id`, `patient_id`, `patient_name`, `email_id`, `message`, `created_at`) VALUES
(1, '8', 'jeeva', 'jeeva@gmail.com', 'hi', '2023-08-16 21:09:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
