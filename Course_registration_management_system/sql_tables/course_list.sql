-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 10:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `mobile`) VALUES
(1, '12345', '12345', 'bsa70046@gmail.com', '01521201882'),
(2, 'admin', 'admin', 'alahammed@gmail.com', '01677280324');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_title` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `pre_req` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `credit` double(100,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_title`, `course_code`, `pre_req`, `department`, `credit`) VALUES
('Software Development I', 'CSE100', 'null', 'CSE', 0.75),
('Computer and Programming Concepts', 'CSE101', 'null', 'CSE', 3.00),
('Computer and Programming Concepts Lab', 'CSE102', 'null', 'CSE', 1.50),
('Discrete Mathematics', 'CSE103', 'null', 'CSE', 3.00),
('Structured Programming Language', 'CSE111', 'CSE101', 'CSE', 3.00),
('Structured Programming Language Lab', 'CSE112', 'CSE101', 'CSE', 1.50),
('Object Oriented Programming Language', 'CSE121', 'CSE111', 'CSE', 3.00),
('Object Oriented Programming Language Lab', 'CSE122', 'CSE111', 'CSE', 1.50),
('Principles of Economics', 'ECO101', 'null', 'CSE', 2.00),
('Electrical Technology', 'EEE101', 'null', 'CSE', 3.00),
('Electrical Technology Lab', 'EEE102', 'null', 'CSE', 1.50),
('English Language-I', 'ENG101', 'null', 'CSE', 3.00),
('ENGLISH LANGUAGE I', 'ENG101', 'null', 'EEE', 3.00),
('ENGLISH LANGUAGE II', 'ENG102', 'null', 'EEE', 3.00),
('English Language-II', 'ENG111', 'ENG101', 'CSE', 3.00),
('Differential and Integral Calculus', 'MAT101', 'null', 'CSE', 3.00),
('CO-ORDINATE GEOMETRY AND LINEAR ALGEBRA', 'MAT101', 'null', 'EEE', 3.00),
('DIFFERENTIAL AND INTEGRAL CALCULUS', 'MAT102', 'null', 'EEE', 3.00),
('ORDINARY AND PARTIAL DIFFERENTIAL EQUATIONS', 'MAT103', 'null', 'EEE', 3.00),
('Co-Ordinate Geometry and Vector Calculus', 'MAT111', 'MAT101', 'CSE', 3.00),
('Linear Algebras and Differential Equations', 'MAT121', 'MAT111', 'CSE', 3.00),
('Physics', 'PHY101', 'null', 'CSE', 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `full_name` varchar(258) NOT NULL,
  `dept_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`full_name`, `dept_code`) VALUES
('Computer Science & Engineering ', 'CSE'),
('Electrical & Electronics Engineering', 'EEE');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `des`) VALUES
(1, 'Lecturer'),
(2, 'Assistant Professor'),
(3, 'Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `incharge`
--

CREATE TABLE `incharge` (
  `id` int(100) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `year` int(100) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `intake` int(10) NOT NULL,
  `section` int(10) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incharge`
--

INSERT INTO `incharge` (`id`, `semester`, `year`, `code_name`, `intake`, `section`, `department`) VALUES
(13, 'Fall', 2019, 'ATR', 1, 1, 'CSE'),
(18, 'Fall', 2019, 'DMA', 1, 1, 'EEE'),
(14, 'Fall', 2019, 'MBW', 1, 2, 'CSE'),
(15, 'Fall', 2019, 'SMR', 2, 1, 'CSE'),
(16, 'Fall', 2019, 'SAM', 2, 2, 'CSE'),
(17, 'Fall', 2019, 'SS', 3, 1, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `semester` varchar(200) NOT NULL,
  `year` int(200) NOT NULL,
  `intake` int(200) NOT NULL,
  `section` int(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course_code` varchar(200) NOT NULL,
  `day1` varchar(255) DEFAULT NULL,
  `time1` varchar(255) DEFAULT NULL,
  `day2` varchar(255) DEFAULT NULL,
  `time2` varchar(255) DEFAULT NULL,
  `day3` varchar(255) DEFAULT NULL,
  `time3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`semester`, `year`, `intake`, `section`, `department`, `course_code`, `day1`, `time1`, `day2`, `time2`, `day3`, `time3`) VALUES
('Fall', 2019, 1, 1, 'CSE', 'CSE101', 'Saturday', '08:30-09:30', 'Sunday', '09:35-10:35', 'Tuesday', '10:40-11:40'),
('Fall', 2019, 1, 1, 'CSE', 'CSE102', 'Monday', '09:35-10:35', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45'),
('Fall', 2019, 1, 1, 'CSE', 'ENG101', 'Tuesday', '11:45-12:45', 'Tuesday', '13:15-14:15', 'Wednesday', '15:25-16:25'),
('Fall', 2019, 1, 1, 'CSE', 'PHY101', 'Sunday', '10:40-11:40', 'Wednesday', '10:40-11:40', 'Wednesday', '11:45-12:45'),
('Fall', 2019, 1, 2, 'CSE', 'CSE101', 'Tuesday', '10:40-11:40', 'Wednesday', '10:40-11:40', 'Wednesday', '11:45-12:45'),
('Fall', 2019, 1, 2, 'CSE', 'CSE102', 'Saturday', '13:15-14:15', 'Saturday', '14:20-15:20', 'Saturday', '15:25-16:25'),
('Fall', 2019, 1, 2, 'CSE', 'ENG101', 'Sunday', '10:40-11:40', 'Monday', '13:15-14:15', 'Tuesday', '09:35-10:35'),
('Fall', 2019, 1, 2, 'CSE', 'PHY101', 'Sunday', '11:45-12:45', 'Monday', '15:25-16:25', 'Tuesday', '11:45-12:45'),
('Fall', 2019, 2, 1, 'CSE', 'CSE111', 'Saturday', '13:15-14:15', 'Monday', '08:30-09:30', 'Monday', '09:35-10:35'),
('Fall', 2019, 2, 1, 'CSE', 'CSE112', 'Sunday', '08:30-09:30', 'Sunday', '09:35-10:35', 'Sunday', '10:40-11:40'),
('Fall', 2019, 2, 1, 'CSE', 'EEE101', 'Saturday', '14:20-15:20', 'Tuesday', '10:40-11:40', 'Tuesday', '11:45-12:45'),
('Fall', 2019, 2, 1, 'CSE', 'EEE102', 'Wednesday', '09:35-10:35', 'Wednesday', '10:40-11:40', 'Wednesday', '11:45-12:45'),
('Fall', 2019, 2, 1, 'CSE', 'ENG111', 'Tuesday', '09:35-10:35', 'Thursday', '09:35-10:35', 'Thursday', '10:40-11:40'),
('Fall', 2019, 2, 1, 'CSE', 'MAT101', 'Saturday', '15:25-16:25', 'Monday', '10:40-11:40', 'Tuesday', '08:30-09:30'),
('Fall', 2019, 2, 2, 'CSE', 'CSE111', 'Saturday', '08:30-09:30', 'Saturday', '09:35-10:35', 'Saturday', '10:40-11:40'),
('Fall', 2019, 2, 2, 'CSE', 'CSE112', 'Sunday', '09:35-10:35', 'Sunday', '10:40-11:40', 'Sunday', '11:45-12:45'),
('Fall', 2019, 2, 2, 'CSE', 'EEE101', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45', 'Monday', '13:15-14:15'),
('Fall', 2019, 2, 2, 'CSE', 'EEE102', 'Tuesday', '11:45-12:45', 'Tuesday', '13:15-14:15', 'Tuesday', '14:20-15:20'),
('Fall', 2019, 2, 2, 'CSE', 'ENG111', 'Wednesday', '13:15-14:15', 'Wednesday', '14:20-15:20', 'Wednesday', '15:25-16:25'),
('Fall', 2019, 2, 2, 'CSE', 'MAT101', 'Thursday', '14:20-15:20', 'Thursday', '15:25-16:25', 'Thursday', '16:30-17:30'),
('Fall', 2019, 3, 1, 'CSE', 'CSE100', '', '', '', '', '', ''),
('Fall', 2019, 3, 1, 'CSE', 'CSE103', 'Saturday', '08:30-09:30', 'Sunday', '09:35-10:35', 'Sunday', '10:40-11:40'),
('Fall', 2019, 3, 1, 'CSE', 'CSE121', 'Saturday', '09:35-10:35', 'Saturday', '10:40-11:40', 'Sunday', '11:45-12:45'),
('Fall', 2019, 3, 1, 'CSE', 'CSE122', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45', 'Monday', '13:15-14:15'),
('Fall', 2019, 3, 1, 'CSE', 'ECO101', 'Tuesday', '11:45-12:45', 'Tuesday', '13:15-14:15', 'Tuesday', '14:20-15:20'),
('Fall', 2019, 3, 1, 'CSE', 'MAT121', 'Wednesday', '13:15-14:15', 'Wednesday', '15:25-16:25', 'Wednesday', '16:30-17:30');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `student_id` bigint(200) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `year` int(100) NOT NULL,
  `receipt_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`student_id`, `semester`, `year`, `receipt_no`) VALUES
(14152103011, 'Fall', 2019, '111'),
(14152103018, 'Fall', 2019, '118'),
(14152103046, 'Fall', 2019, '1234'),
(14152103038, 'Fall', 2019, '138');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `day`, `time`) VALUES
(17, 'Monday', '08:30-09:30'),
(18, 'Monday', '09:35-10:35'),
(19, 'Monday', '10:40-11:40'),
(20, 'Monday', '11:45-12:45'),
(21, 'Monday', '13:15-14:15'),
(22, 'Monday', '14:20-15:20'),
(23, 'Monday', '15:25-16:25'),
(24, 'Monday', '16:30-17:30'),
(1, 'Saturday', '08:30-09:30'),
(2, 'Saturday', '09:35-10:35'),
(3, 'Saturday', '10:40-11:40'),
(4, 'Saturday', '11:45-12:45'),
(5, 'Saturday', '13:15-14:15'),
(6, 'Saturday', '14:20-15:20'),
(7, 'Saturday', '15:25-16:25'),
(8, 'Saturday', '16:30-17:30'),
(9, 'Sunday', '08:30-09:30'),
(10, 'Sunday', '09:35-10:35'),
(11, 'Sunday', '10:40-11:40'),
(12, 'Sunday', '11:45-12:45'),
(13, 'Sunday', '13:15-14:15'),
(14, 'Sunday', '14:20-15:20'),
(15, 'Sunday', '15:25-16:25'),
(16, 'Sunday', '16:30-17:30'),
(41, 'Thursday', '08:30-09:30'),
(42, 'Thursday', '09:35-10:35'),
(43, 'Thursday', '10:40-11:40'),
(44, 'Thursday', '11:45-12:45'),
(45, 'Thursday', '13:15-14:15'),
(46, 'Thursday', '14:20-15:20'),
(47, 'Thursday', '15:25-16:25'),
(48, 'Thursday', '16:30-17:30'),
(25, 'Tuesday', '08:30-09:30'),
(26, 'Tuesday', '09:35-10:35'),
(27, 'Tuesday', '10:40-11:40'),
(28, 'Tuesday', '11:45-12:45'),
(29, 'Tuesday', '13:15-14:15'),
(30, 'Tuesday', '14:20-15:20'),
(31, 'Tuesday', '15:25-16:25'),
(32, 'Tuesday', '16:30-17:30'),
(33, 'Wednesday', '08:30-09:30'),
(34, 'Wednesday', '09:35-10:35'),
(35, 'Wednesday', '10:40-11:40'),
(36, 'Wednesday', '11:45-12:45'),
(37, 'Wednesday', '13:15-14:15'),
(38, 'Wednesday', '14:20-15:20'),
(39, 'Wednesday', '15:25-16:25'),
(40, 'Wednesday', '16:30-17:30');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `year` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `s_name`, `year`) VALUES
(16, 'Fall', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` bigint(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `intake` int(100) NOT NULL,
  `section` int(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `name`, `gender`, `email`, `intake`, `section`, `mobile`, `department`, `password`, `image`) VALUES
(25, 14152103003, 'Minia Rahman Bristy', 'female', 'bristy@gmail.com', 1, 1, '01715611561', 'CSE', '123', 'female_avatar.jpg1557134133.jpg'),
(24, 14152103002, 'Md. Jahid Hasan Sheum', 'male', 'sheum@gmail.com', 1, 1, '01874621169', 'CSE', '123', 'male_avater.jpg1557134057.jpg'),
(23, 14152103001, 'Effath Mostary Nabila', 'female', 'nabila@gmail.com', 1, 1, '01651165685', 'CSE', '123', 'female_avatar.jpg1557133773.jpg'),
(26, 14152103004, 'Md. Ak Azad', 'male', 'azad@gmail.com', 1, 1, '01676949498', 'CSE', '123', 'male_avater.jpg1557134206.jpg'),
(27, 14152103005, 'Naznin Nahar Nipa', 'female', 'nipa@gmail.com', 1, 1, '01965151895', 'CSE', '123', 'female_avatar.jpg1557134297.jpg'),
(28, 14152103006, 'Md. Inzamamul Haque', 'male', 'inzamam@gmail.com', 1, 1, '01619007878', 'CSE', '123', 'male_avater.jpg1557134383.jpg'),
(29, 14152103007, 'Sifat Assifa Riya', 'female', 'riya@gmail.com', 1, 1, '01661184848', 'CSE', '123', 'female_avatar.jpg1557134514.jpg'),
(30, 14152103008, 'Matiur Rahman', 'male', 'matiur@gmail.com', 1, 1, '01656416887', 'CSE', '123', 'male_avater.jpg1557134616.jpg'),
(31, 14152103009, 'Md. Shanjid Mollik Tuba', 'male', 'tuba@gmail.com', 1, 1, '01649848665', 'CSE', '123', 'male_avater.jpg1557134690.jpg'),
(32, 14152103010, 'Habiba Thahrima Asha', 'female', 'asha@gmail.com', 1, 1, '01679416554', 'CSE', '123', 'female_avatar.jpg1557134742.jpg'),
(33, 14152103011, 'Mushfiqur Rahman', 'male', 'musfiqurrahman333@gmail.com', 1, 2, '01685795115', 'CSE', '123', '50943371_1155946271221957_6724560390459490304_n.jpg1557134928.jpg'),
(34, 14152103012, 'Najnin Nupur', 'female', 'nupur@gmail.com', 1, 2, '01754546414', 'CSE', '123', 'female_avatar.jpg1557135486.jpg'),
(35, 14152103013, 'Tahmina Jannat', 'female', 'urmi@gmail.com', 1, 2, '01546448894', 'CSE', '123', 'female_avatar.jpg1557135550.jpg'),
(36, 14152103014, 'Mallik Mohammed Ashraf', 'male', 'mike@gmail.com', 1, 2, '01533413167', 'CSE', '123', 'male_avater.jpg1557135628.jpg'),
(37, 14152103015, 'Anjuman Ara Islam', 'female', 'anjum@gmail.com', 1, 2, '01816518995', 'CSE', '123', 'female_avatar.jpg1557135718.jpg'),
(38, 14152103016, 'Md. Sabbir Hossain', 'male', 'bappy@gmail.com', 1, 2, '01682783052', 'CSE', '123', 'male_avater.jpg1557135782.jpg'),
(39, 14152103017, 'Abdullah Al Mahabub', 'male', 'shourov@gmail.com', 1, 2, '01781227222', 'CSE', '123', 'male_avater.jpg1557135852.jpg'),
(40, 14152103018, 'Jahid Hasan', 'Male', 'jahid@gmail.com', 1, 2, '01664665135', 'CSE', '123', 'male_avater.jpg1557135920.jpg'),
(41, 14152103019, 'Abdullah Zubayer', 'male', 'shaon@gmail.com', 1, 2, '01686939797', 'CSE', '123', 'male_avater.jpg1557135997.jpg'),
(42, 14152103020, 'Sonia Jahan Mou', 'female', 'mou@gmail.com', 1, 2, '01765161665', 'CSE', '123', 'female_avatar.jpg1557136044.jpg'),
(43, 14152103021, 'Md. Rifatul Hasan', 'male', 'riffi@gmail.com', 2, 1, '01953588243', 'CSE', '123', 'male_avater.jpg1557136174.jpg'),
(44, 14152103022, 'Mst. Naima Akther Shaly', 'female', 'shaly@gmail.com', 2, 1, '01765165165', 'CSE', '123', 'female_avatar.jpg1557136245.jpg'),
(45, 14152103023, 'Md. Rasel Hossain', 'male', 'rasel@gmail.com', 2, 1, '01679002024', 'CSE', '123', 'male_avater.jpg1557136543.jpg'),
(46, 14152103024, 'Mazedul Akash', 'male', 'akash@gmail.com', 2, 1, '01641755768', 'CSE', '123', 'male_avater.jpg1557136626.jpg'),
(47, 14152103025, 'A. S. M. Abdullah Zaki', 'male', 'zaki@gmail.com', 2, 1, '01673325826', 'CSE', '123', 'male_avater.jpg1557136676.jpg'),
(48, 14152103026, 'Abu Taher Biplob', 'male', 'biplob@gmail.com', 2, 1, '01651619894', 'CSE', '123', 'male_avater.jpg1557136782.jpg'),
(49, 14152103027, 'Sharmin Sultana', 'female', 'sharmin@gmail.com', 2, 1, '01965151684', 'CSE', '123', 'female_avatar.jpg1557136890.jpg'),
(50, 14152103028, 'Nayla Afrin Khan', 'female', 'nayla@gmail.com', 2, 1, '01549884684', 'CSE', '123', 'female_avatar.jpg1557136955.jpg'),
(51, 14152103029, 'Momotaz Rahman', 'female', 'momtaz@gmail.com', 2, 1, '01915165189', 'CSE', '123', 'female_avatar.jpg1557137008.jpg'),
(52, 14152103030, 'Sanchita Paul', 'female', 'paul@gmail.com', 2, 1, '01614989744', 'CSE', '123', 'female_avatar.jpg1557137055.jpg'),
(53, 14152103031, 'Azizul Haque', 'male', 'aziz@gmail.com', 2, 2, '01945165497', 'CSE', '123', 'male_avater.jpg1557137167.jpg'),
(54, 14152103032, 'Md. Mosfik Us Salahin', 'male', 'mosfik@gmail.com', 2, 2, '01649849465', 'CSE', '123', 'male_avater.jpg1557137214.jpg'),
(55, 14152103033, 'Farzana Reza', 'female', 'eva@gmail.com', 2, 1, '01684998463', 'CSE', '123', 'female_avatar.jpg1557137259.jpg'),
(56, 14152103034, 'Fuad Hasan Emon', 'male', 'emon@gmail.com', 2, 2, '01651688994', 'CSE', '123', 'male_avater.jpg1557137313.jpg'),
(57, 14152103035, 'Md. Saiful Islam', 'male', 'saif@gmail.com', 2, 2, '01654894615', 'CSE', '123', 'male_avater.jpg1557137359.jpg'),
(58, 14152103036, 'Md. Sakhawat Hossain', 'male', 'sifat@gmail.com', 2, 2, '01894845649', 'CSE', '123', 'male_avater.jpg1557137410.jpg'),
(59, 14152103037, 'Md. Rifat Rahman', 'male', 'rifat@gmail.com', 2, 2, '01654498498', 'CSE', '123', 'male_avater.jpg1557137481.jpg'),
(60, 14152103038, 'Sabbir Ahammed', 'male', 'alahammed@gmail.com', 2, 2, '01677280324', 'CSE', '123', '14671197_674208289394153_6737077164981671351_n.jpg1557137590.jpg'),
(61, 14152103039, 'Mahmudur Rahman', 'male', 'mahmud@gmail.com', 2, 2, '01654895465', 'CSE', '123', 'male_avater.jpg1557137714.jpg'),
(62, 14152103040, 'Sharmin Nur Juhi', 'female', 'juhi@gmail.com', 2, 2, '01961519854', 'CSE', '123', 'female_avatar.jpg1557137776.jpg'),
(63, 14152103041, 'Md. Anas Ahmed', 'male', 'anas@gmail.com', 3, 1, '01651684951', 'CSE', '123', 'male_avater.jpg1557137857.jpg'),
(64, 14152103042, 'Rifat Hossain', 'male', 'rif@gmail.com', 3, 1, '01564984874', 'CSE', '123', 'male_avater.jpg1557137963.jpg'),
(65, 14152103043, 'Jabir Bin Abdullah', 'Male', 'jabir@gmail.com', 3, 1, '01649849445', 'CSE', '123', 'male_avater.jpg1557138181.jpg'),
(66, 14152103044, 'Ratri Hasan', 'female', 'ratri@gmail.com', 3, 1, '01964649819', 'CSE', '123', 'female_avatar.jpg1557138260.jpg'),
(67, 14152103045, 'Shuvo Shikdar', 'male', 'shikdar@gmail.com', 3, 1, '01654984984', 'CSE', '123', 'male_avater.jpg1557138326.jpg'),
(68, 14152103046, 'Sumaia akter', 'female', 'Bsa70019@gmail.com', 3, 1, '01574155786', 'CSE', '123', 'Untitled-1 copy.jpg1557138387.jpg'),
(69, 14152103047, 'Nusrat Jahan', 'female', 'nusrat@gmail.com', 3, 1, '01648949844', 'CSE', '123', 'female_avatar.jpg1557138445.jpg'),
(70, 14152213001, 'Md. Hasnat Islam', 'male', 'hasnat@gmail.com', 1, 1, '01764849456', 'EEE', '123', 'male_avater.jpg1557138594.jpg'),
(71, 14152213002, 'Md. Shibli Shadik Shishir', 'male', 'shishir@gmail.com', 1, 1, '01765498498', 'EEE', '123', 'male_avater.jpg1557138768.jpg'),
(72, 14152213003, 'Rowshan Zaman Oney', 'female', 'oney@gmail.com', 1, 1, '01698498493', 'EEE', '123', 'female_avatar.jpg1557138837.jpg'),
(73, 14152213004, 'Gulshan Zaman Bony', 'female', 'bony@gmail.com', 1, 1, '01564947446', 'EEE', '123', 'female_avatar.jpg1557138893.jpg'),
(74, 14152213005, 'Farjana Pervin', 'female', 'farzana@gmail.com', 1, 1, '01565144895', 'EEE', '123', 'female_avatar.jpg1557138959.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stu_offer`
--

CREATE TABLE `stu_offer` (
  `id` int(11) NOT NULL,
  `student_id` bigint(100) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `year` int(200) NOT NULL,
  `intake` int(100) NOT NULL,
  `section` int(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `day1` varchar(255) DEFAULT NULL,
  `time1` varchar(255) DEFAULT NULL,
  `day2` varchar(255) DEFAULT NULL,
  `time2` varchar(255) DEFAULT NULL,
  `day3` varchar(255) DEFAULT NULL,
  `time3` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `seen` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_offer`
--

INSERT INTO `stu_offer` (`id`, `student_id`, `s_name`, `year`, `intake`, `section`, `department`, `course_code`, `day1`, `time1`, `day2`, `time2`, `day3`, `time3`, `status`, `seen`) VALUES
(74, 14152103038, 'Fall', 2019, 2, 2, 'CSE', 'CSE111', 'Saturday', '08:30-09:30', 'Saturday', '09:35-10:35', 'Saturday', '10:40-11:40', 'pending', 0),
(75, 14152103038, 'Fall', 2019, 2, 2, 'CSE', 'CSE112', 'Sunday', '09:35-10:35', 'Sunday', '10:40-11:40', 'Sunday', '11:45-12:45', 'pending', 0),
(76, 14152103038, 'Fall', 2019, 2, 2, 'CSE', 'EEE101', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45', 'Monday', '13:15-14:15', 'accepted', 1),
(77, 14152103038, 'Fall', 2019, 2, 2, 'CSE', 'EEE102', 'Tuesday', '11:45-12:45', 'Tuesday', '13:15-14:15', 'Tuesday', '14:20-15:20', 'accepted', 1),
(78, 14152103038, 'Fall', 2019, 2, 2, 'CSE', 'ENG111', 'Wednesday', '13:15-14:15', 'Wednesday', '14:20-15:20', 'Wednesday', '15:25-16:25', 'accepted', 1),
(79, 14152103038, 'Fall', 2019, 2, 2, 'CSE', 'MAT101', 'Thursday', '14:20-15:20', 'Thursday', '15:25-16:25', 'Thursday', '16:30-17:30', 'pending', 0),
(80, 14152103046, 'Fall', 2019, 3, 1, 'CSE', 'CSE103', 'Saturday', '08:30-09:30', 'Sunday', '09:35-10:35', 'Sunday', '10:40-11:40', 'accepted', 1),
(81, 14152103046, 'Fall', 2019, 3, 1, 'CSE', 'CSE121', 'Saturday', '09:35-10:35', 'Saturday', '10:40-11:40', 'Sunday', '11:45-12:45', 'accepted', 1),
(82, 14152103046, 'Fall', 2019, 3, 1, 'CSE', 'CSE122', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45', 'Monday', '13:15-14:15', 'pending', 1),
(83, 14152103046, 'Summer', 2019, 3, 1, 'CSE', 'ECO101', 'Tuesday', '11:45-12:45', 'Tuesday', '13:15-14:15', 'Tuesday', '14:20-15:20', 'accepted', 1),
(84, 14152103046, 'Fall', 2019, 3, 1, 'CSE', 'CSE100', '', '', '', '', '', '', 'dropped', 1),
(85, 14152103018, 'Fall', 2019, 1, 2, 'CSE', 'CSE101', 'Tuesday', '10:40-11:40', 'Wednesday', '10:40-11:40', 'Wednesday', '11:45-12:45', 'accepted', 0),
(86, 14152103018, 'Fall', 2019, 2, 1, 'CSE', 'CSE112', 'Sunday', '08:30-09:30', 'Sunday', '09:35-10:35', 'Sunday', '10:40-11:40', 'accepted', 0),
(87, 14152103018, 'Fall', 2019, 2, 2, 'CSE', 'CSE111', 'Saturday', '08:30-09:30', 'Saturday', '09:35-10:35', 'Saturday', '10:40-11:40', 'accepted', 0),
(88, 14152103018, 'Fall', 2019, 2, 2, 'CSE', 'EEE101', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45', 'Monday', '13:15-14:15', 'accepted', 0),
(91, 14152103011, 'Fall', 2019, 1, 1, 'CSE', 'CSE101', 'Saturday', '08:30-09:30', 'Sunday', '09:35-10:35', 'Tuesday', '10:40-11:40', 'accepted', 0),
(92, 14152103011, 'Fall', 2019, 1, 1, 'CSE', 'CSE102', 'Monday', '09:35-10:35', 'Monday', '10:40-11:40', 'Monday', '11:45-12:45', 'accepted', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `room` int(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `t_name`, `code_name`, `gender`, `email`, `mobile`, `room`, `designation`, `department`, `password`, `image`) VALUES
(16, 'Md. Raisul Alam', 'MRA', 'male', 'ralam02@yahoo.com', '01965419895', 307, 'Assistant Professor', 'CSE', '123', 'download.png1557139339.png'),
(15, 'Prof. Dr. Ameer Ali', 'DMA', 'male', 'dmaa730@gmail.com', '01561619975', 305, 'Professor & Chairman', 'CSE', '123', 'download.png1557139189.png'),
(11, 'Atiqur Rahman', 'ATR', 'male', 'rasel.bangladeshUBT@gmail.com', '01954849115', 321, 'Assistant Professor', 'CSE ', '123', 'ATR.png1557133316.png'),
(17, 'Md. Saifur Rahman', 'SR', 'male', 'saifurs@gmail.com', '01648494845', 421, 'Assistant Professor', 'CSE', '123', 'download (1).png1557139406.png'),
(18, 'Md. Shahiduzzaman', 'MSZ', 'male', 'shahid@bubt.edu.bd', '01764498944', 321, 'Assistant Professor', 'CSE', '123', 'download (2).png1557139465.png'),
(19, 'Suman Saha', 'SS', 'male', 'sumancsecu04@gmail.com', '01561498849', 321, 'Assistant Professor', 'CSE', '123', 'download (3).png1557139586.png'),
(20, 'Milon Biswas', 'MBW', 'male', 'milonbiswas@bubt.edu.bd', '01654984944', 313, 'Assistant Professor', 'CSE', '123', 'download (4).png1557139650.png'),
(21, 'Shamim Ahmed', 'SAM', 'male', 'shamim.a@bubt.edu.bd', '01615189415', 313, 'Assistant Professor', 'CSE', '123', 'SAM.jpg1557139755.jpg'),
(22, 'Shamim Reza Sajib', 'SMR', 'male', 'sajib1717@gmail.com', '01659849844', 313, 'Assistant Professor', 'CSE', '123', 'download (5).png1557139821.png'),
(23, 'Mohammad Zaeed', 'MMZ', 'male', 'tz2201@gmail.com', '01654489442', 213, 'Lecturer', 'CSE', '123', 'download (6).png1557139897.png'),
(24, 'Mr. Mrinmoy Das', 'MMD', 'male', 'mrinmoydas.cse@gmail.com', '01684984956', 811, 'Lecturer', 'CSE', '123', 'download (7).png1557139975.png'),
(25, 'Atanu Shome', 'ATS', 'male', 'atanu.cse.ku@gmail.com', '01684611651', 911, 'Assistant Professor', 'CSE', '123', 'download (8).png1557140057.png'),
(26, ' M. Azharul Haque', 'AZH', 'male', 'azhar_iiuc@yahoo.com', '01716516991', 204, 'Professor & Chairman', 'EEE', '123', 'download (9).png1557140177.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`,`department`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_code`),
  ADD UNIQUE KEY `email` (`dept_code`),
  ADD UNIQUE KEY `username` (`full_name`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incharge`
--
ALTER TABLE `incharge`
  ADD PRIMARY KEY (`semester`,`year`,`intake`,`section`,`department`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`semester`,`year`,`intake`,`section`,`department`,`course_code`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`student_id`,`semester`,`year`),
  ADD UNIQUE KEY `receipt_no` (`receipt_no`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day` (`day`,`time`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `stu_offer`
--
ALTER TABLE `stu_offer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `code_name` (`code_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incharge`
--
ALTER TABLE `incharge`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `stu_offer`
--
ALTER TABLE `stu_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
