-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aimeediane_kubwimana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(130) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'CEO', 'hirwa@gmail.com', 'hirwa\r\n'),
(3, 'manager', 'inezadenyse@gmail.com', '123'),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, 'diane', 'kubwimanaaimee@gmail.com', '123'),
(11, 'diane', 'kubwimanaaimee@gmail.com', '123'),
(12, 'diane', 'kubwimanaaimee@gmail.com', 'love'),
(13, 'lulu', 'inezadenyse@gmail.com', 'love'),
(14, 'veve', 'veve@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_code` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `workinghours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_code`, `Date`, `time_in`, `time_out`, `workinghours`) VALUES
(4, 3, '2024-04-23', '10:26:00', '04:26:00', 6),
(20, 17, '2024-04-02', '18:14:00', '12:13:00', 6),
(21, 17, '2024-04-02', '18:14:00', '12:13:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(210) NOT NULL,
  `description` varchar(120) NOT NULL,
  `location` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `name`, `description`, `location`) VALUES
(1, 'IT', 'computer based assistance', 'fl4room1'),
(2, 'accounting', 'fianancial analysis', 'fl4'),
(3, 'marketing', 'market segmentation', 'fl1r200');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_code` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `hireddate` date DEFAULT NULL,
  `status` varchar(120) NOT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_code`, `firstname`, `lastname`, `username`, `email`, `password`, `telephone`, `hireddate`, `status`, `dept_id`) VALUES
(1, 'clere', 'rukundonhgtre', 'uwase', 'uwase@gmail.com', '123', '0987654', '2024-04-20', '', 1),
(3, 'mjhgfd', 'aimeedianedfghjkl', 'aimee', 'kubwimana@gmail.com', '123zxcvb', '09876543', '2024-04-12', '', 1),
(17, 'seraphine', 'ingabire', 'phina', 'ingabire@gmail.com', '$2y$10$WStSz7f/LvE43sKV7D5McuYJkVMlnfcncOAYKyEZe2jKixcisGPGi', '09876543', '2024-04-22', 'manager', 1),
(18, 'luice', 'himbaza', 'lorie', 'nzayituliki@gmail.com', '$2y$10$9pjwUNUpabyeHsn0lQk9RuB9e.3jTY9QrCxNNNOZnteBz3b936KU.', '098765432', '2024-04-24', 'hod', 2),
(19, 'kamanzi', 'john', 'kaboy', 'kamanze@gmail.com', '$2y$10$mwdDg1FxAGu3ojRK0DwfI.A0iqHYiw72L8efgldMM05awLb.5ePT6', '0987654', '2024-04-29', 'manager', 2);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `employee_code` int(11) NOT NULL,
  `holidaytype` varchar(200) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `document` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `employee_code`, `holidaytype`, `StartDate`, `EndDate`, `document`) VALUES
(17, 19, 'personal reason', '2024-04-29', '2024-05-08', 'delete_products.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Id` int(11) NOT NULL,
  `employee_code` int(11) NOT NULL,
  `content` varchar(120) DEFAULT NULL,
  `type` varchar(120) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `sendingdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Id`, `employee_code`, `content`, `type`, `Status`, `sendingdate`) VALUES
(9, 3, 'welcome in this system', 'personal', 'read', '2024-04-24'),
(10, 3, 'moving forward in this life', 'personal', 'read', '2024-04-24'),
(11, 3, 'bwsdghj', 'AXCDFG', 'SDFG', '2024-04-27'),
(16, 17, ' bg', 'jhytresasxcvbnm,', 'mnhbgfdsasdfgh', '2024-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `Reasonforleave` varchar(100) NOT NULL,
  `Date` date DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `leavetype` varchar(200) DEFAULT NULL,
  `employee_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `Reasonforleave`, `Date`, `StartDate`, `EndDate`, `Duration`, `leavetype`, `employee_code`) VALUES
(24, 'b', '2024-04-20', '2024-05-10', '2024-05-08', 70, 'pp', 3),
(25, 'cvbnm,./', '2024-04-20', '2024-04-14', '2024-04-21', 10, 'personal issue', 1),
(28, 'wedding', '2024-04-24', '2024-04-28', '2024-05-05', 13, 'personal issue', 3),
(29, 'hgv', '2024-04-26', '2024-04-26', '2024-04-25', 7, 'wedding', 3),
(30, 'sicknessbb', '2024-04-03', '2024-04-15', '2024-04-30', 15, 'personal issue', 3),
(32, 'wedding', '2024-04-29', '2024-04-29', '2024-05-11', 10, 'wedding', 19);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(130) NOT NULL,
  `email` varchar(130) NOT NULL,
  `password` varchar(200) NOT NULL,
  `telephone` int(11) NOT NULL,
  `hireddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `telephone`, `hireddate`) VALUES
(4, 'uwamariya', 'rrrrrrrrrrrr', 'fddd', 'duwariya@gmail.com', '123', 98765432, '2024-04-18'),
(11, 'uwera', 'prence', 'love', 'uwera@gmail.com', 'llll', 2147483647, '2024-04-20'),
(13, 'gwiza', 'anitha', 'gwiza', 'anitha@gmail.com', '123', 987654, '2024-04-21'),
(14, 'gwiza', 'anitha', 'gwiza', 'anitha@gmail.com', '123', 987654, '2024-04-21'),
(15, 'alice', 'berwa', 'alice', 'berwa@gmail.com', '123', 98765432, '2024-04-30'),
(16, 'ingabire', 'pascaline', 'paccy', 'ingabirepaccy@gmail.com', 'mama', 9876543, '2024-04-26'),
(17, 'ingabire', 'pascaline', 'paccy', 'ingabirepaccy@gmail.com', 'mama', 9876543, '2024-04-26'),
(18, 'diane', 'kabatesi', 'diane', 'kabatesi@gmail.com', 'love', 987654321, '2024-04-29'),
(19, 'diane', 'kabatesi', 'diane', 'kabatesi@gmail.com', 'love', 987654321, '2024-04-29'),
(20, 'mhgfc', 'mjhgf', ',kjhgf', 'nzayituliki@gmail.com', '000', 987654321, '2024-04-29'),
(21, 'ingabire', 'paccy', 'paccy', 'paccy@gmail.com', 'love2001', 987654332, '2024-04-29'),
(22, 'ingabire', 'paccy', 'paccy', 'paccy@gmail.com', 'love2001', 987654332, '2024-04-29'),
(23, 'temote', 'ogg', 'ogg', 'ogg@gmail.com', 'lovemama', 987657890, '2024-04-29'),
(24, 'berwa ', 'maria', 'regine', 'berwa@gmail.com', 'love1234', 987654321, '2024-04-01'),
(25, 'mpundu', 'fideline', 'ishimwe', 'mpundu@gmail.com', '$2y$10$GZ50u759PB4oOMECr5vByOzZ5M6ln/WS0xUiwzgVTzVqjHroWuj1y', 987909809, '2024-05-06'),
(26, 'mugeni', 'mugeni', 'mugeni', 'mugeni@gmail.com', '$2y$10$pZMjsnqqhf3IEmAjvnzp1O9VU.SG7AP5Vx3gR7SMRxV8w/VY7shV2', 987909809, '2024-04-30'),
(27, 'murazeyesu', 'aime', 'jackman', 'cl@gmail.com', '$2y$10$D/kAx6oGkw.Nj1PpjLBpJOdspGV1QmrgRusiYwfU86j9/v2uqzu2G', 987654321, '2024-04-30'),
(28, 'bgbdsh', 'gvgxh', 'keza', 'aa@gmail.com', '$2y$10$OSG/2w4o18HokClmtPJ.RuyfW/kWNd21YlWJkj.CZFDgTv.JdQ/n2', 2147483647, '2024-04-24'),
(29, 'zxcvbhj', 'xcvbn', 'xcvbhj', 'berwa1@gmail.com', '$2y$10$RfBjPW0YTkDoqkrEO1n90OJXK9gZ81OzrJhqDFWXU0PL21HC2j12q', 987909809, '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'dfghjm', 'xcvbnm', 'dfghj', 'vvvv@gmail.com', '567890987654', '$2y$10$Z.TZzr/26OqboKZ2qC/v.urHa5WgUIzUP3x4RabkTpODaLIHeemRy', '2024-04-30 13:38:14', '1', 0),
(3, 'dfghjm', 'xcvbnm', 'd', 'vvv@gmail.com', '567890987654', '$2y$10$lJw7ol7lX3IkBFQzC8jK1.hMrzCKGMCHguEK9pVrPcIYccXpACY8a', '2024-04-30 13:39:06', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_code` (`employee_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_code`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_code` (`employee_code`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `employee_code` (`employee_code`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_code` (`employee_code`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_code`) REFERENCES `employee` (`employee_code`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `holiday`
--
ALTER TABLE `holiday`
  ADD CONSTRAINT `holiday_ibfk_1` FOREIGN KEY (`employee_code`) REFERENCES `employee` (`employee_code`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`employee_code`) REFERENCES `employee` (`employee_code`);

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`employee_code`) REFERENCES `employee` (`employee_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
