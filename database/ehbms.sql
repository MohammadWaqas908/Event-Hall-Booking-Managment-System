-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 08:21 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_tbl`
--

CREATE TABLE `booking_tbl` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Hall_name` varchar(255) NOT NULL,
  `Event_type` varchar(255) NOT NULL,
  `Nop` int(11) NOT NULL,
  `Menu` varchar(255) NOT NULL,
  `Stime` time NOT NULL,
  `Etime` time NOT NULL,
  `Extra` varchar(255) NOT NULL,
  `Booking_date` date NOT NULL,
  `Total_bill` int(11) NOT NULL,
  `Booking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_tbl`
--

INSERT INTO `booking_tbl` (`ID`, `Username`, `Hall_name`, `Event_type`, `Nop`, `Menu`, `Stime`, `Etime`, `Extra`, `Booking_date`, `Total_bill`, `Booking`) VALUES
(1, 'alikhan1', 'Wedding Hall', 'Wedding', 300, 'Biryani Pulao', '08:00:00', '18:00:00', 'Decoration Sound_System', '2020-09-24', 84000, 'Pending'),
(2, 'alikhan1', 'Birthday Party Hall', 'Birthday', 52, 'Karhai', '10:58:00', '14:59:00', 'Sound_System', '2020-10-08', 20400, 'Active'),
(3, 'alikhan1', 'Meeting Halls', 'Meeting', 7, 'Pulao', '11:13:00', '15:13:00', 'Sound_System', '2020-09-30', 8060, 'Past'),
(6, 'alikhan1', 'Conference Hall', 'Conference', 7, 'Pulao', '13:46:00', '14:46:00', 'Sound_System', '0000-00-00', 8560, 'Pending'),
(7, 'alikhan1', 'Conference Hall', 'Conference', 66, 'Karhai', '13:47:00', '13:47:00', 'Decoration', '2020-10-12', 31200, 'Pending'),
(9, 'zube786', 'Conference Hall', 'Conference', 11, 'Karhai', '17:13:00', '19:13:00', 'Decoration', '2020-10-15', 20200, 'Pending'),
(10, 'zube786', 'Meeting Halls', 'Meeting', 7, 'Pulao', '14:14:00', '16:14:00', 'Decoration', '2020-11-04', 18060, 'Active'),
(17, 'amber786', 'Conference Hall Big', 'Conference', 200, 'Biryani', '11:49:00', '11:49:00', 'Decoration', '2020-10-29', 28000, 'Pending'),
(18, 'amber786', 'Conference Hall Big', 'Conference', 100, 'Karhai', '11:48:00', '11:47:00', 'Sound_System', '2020-10-29', 28000, 'Active'),
(19, 'amber786', 'Meeting Halls', 'Meeting', 5, 'Karhai', '09:43:00', '09:43:00', 'Sound System', '2020-10-30', 3500, 'Pending'),
(20, 'amber786', 'Birthday Party Hall', 'Birthday', 50, 'Biryani', '09:47:00', '09:47:00', 'Decoration', '2020-10-30', 25000, 'Pending'),
(21, 'user', 'Wedding Hall', 'Wedding', 200, 'Biryani', '11:58:00', '11:58:00', 'Decoration', '2020-11-03', 65500, 'Pending'),
(22, 'user', 'Chandni Hall', 'Wedding', 10, 'Biryani', '12:04:00', '12:04:00', 'Decoration', '2020-11-03', 22500, 'Pending'),
(23, 'user', 'Meeting Halls', 'Meeting', 5, 'Biryani', '12:05:00', '12:05:00', 'Decoration', '2020-11-03', 19000, 'Pending'),
(24, 'user', 'Wedding Hall', 'Wedding', 200, 'Biryani', '12:08:00', '12:09:00', 'Decoration', '2020-11-25', 65500, 'Pending'),
(25, 'user', 'Meeting Halls', 'Meeting', 10, 'Biryani', '12:07:00', '00:06:00', 'Decoration', '2020-11-04', 20000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_tbl`
--

CREATE TABLE `contactus_tbl` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus_tbl`
--

INSERT INTO `contactus_tbl` (`ID`, `Name`, `Email`, `Message`) VALUES
(1, 'Zubair', 'abc@gamil.com', 'msg'),
(2, 'Akram', '03111111111', 'kjhkdsajkdjakdsj');

-- --------------------------------------------------------

--
-- Table structure for table `feature_tbl`
--

CREATE TABLE `feature_tbl` (
  `ID` int(11) NOT NULL,
  `Feature_Name` varchar(255) NOT NULL,
  `Feature_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_tbl`
--

INSERT INTO `feature_tbl` (`ID`, `Feature_Name`, `Feature_Price`) VALUES
(2, 'Decoration', 15500),
(4, 'Sound System', 5000),
(6, 'Doli', 540);

-- --------------------------------------------------------

--
-- Table structure for table `food_tbl`
--

CREATE TABLE `food_tbl` (
  `ID` int(11) NOT NULL,
  `Food_Name` varchar(255) NOT NULL,
  `Food_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_tbl`
--

INSERT INTO `food_tbl` (`ID`, `Food_Name`, `Food_Price`) VALUES
(1, 'Biryani', 200),
(2, 'Karhai', 200),
(3, 'Pulao', 200),
(5, 'rice', 200);

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `ID` int(11) NOT NULL,
  `Hall_name` varchar(255) NOT NULL,
  `Hall_size` int(11) NOT NULL,
  `Event_type` varchar(255) NOT NULL,
  `Hall_rent` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Hall_location` varchar(255) NOT NULL,
  `Hall_image` varchar(255) NOT NULL,
  `Minimum` int(11) NOT NULL,
  `S_time` time NOT NULL,
  `E_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`ID`, `Hall_name`, `Hall_size`, `Event_type`, `Hall_rent`, `City`, `Hall_location`, `Hall_image`, `Minimum`, `S_time`, `E_Time`) VALUES
(1, 'Wedding Hall', 500, 'Wedding', '10000', 'Karor', 'ward no.5 near railway station', 'hall1.jpg', 200, '01:00:01', '23:00:24'),
(2, 'Birthday Party Hall', 500, 'Birthday', '5000', 'Layyah', 'ward no.5 near railway station', 'hal2.jpg', 50, '01:00:01', '23:00:24'),
(5, 'Meeting Halls', 300, 'Meeting', '2500', 'Layyah', 'ward no.1 ', 'h4.webp', 5, '01:00:00', '23:00:00'),
(6, 'Chandni Hall', 600, 'Wedding', '5000', 'Layyah', 'ward no.1 ', 'hal2.jpg', 10, '01:00:00', '23:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `hall_rating_tbl`
--

CREATE TABLE `hall_rating_tbl` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Hall_name` varchar(255) NOT NULL,
  `Event_type` varchar(255) NOT NULL,
  `Rating` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_rating_tbl`
--

INSERT INTO `hall_rating_tbl` (`ID`, `Username`, `Hall_name`, `Event_type`, `Rating`, `Description`) VALUES
(1, 'alikhan1', 'Wedding Hall', 'Wedding', '4', 'This hall is best choice for wedding'),
(3, 'alikhan1', 'Birthday Party Hall', 'Birthday', '5', 'nice'),
(4, 'amber786', '', '', '3', 'best'),
(5, 'amber786', '', '', '2', 'nice'),
(6, 'amber786', '', '', '5', '5 star');

-- --------------------------------------------------------

--
-- Table structure for table `register_tbl`
--

CREATE TABLE `register_tbl` (
  `ID` int(11) NOT NULL,
  `F_name` varchar(255) NOT NULL,
  `L_name` varchar(255) NOT NULL,
  `Cnic` varchar(255) NOT NULL,
  `Profile_pic` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact_no` varchar(255) NOT NULL,
  `Email_address` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_tbl`
--

INSERT INTO `register_tbl` (`ID`, `F_name`, `L_name`, `Cnic`, `Profile_pic`, `Address`, `Contact_no`, `Email_address`, `Username`, `Password`, `Status`) VALUES
(3, 'shahid', 'khan', '3220212345678', 'download3.jpg', 'word no#18', '0303333333', '123@gmail.com', 'shahid12', 'shahid12', 'Manager'),
(4, 'Mohammad', 'khan', '3220212345678', 'download4.jpg', 'word no#15', '0303333333', 'abc@gmail.com', 'admin', '12345', 'Admin'),
(12, 'zubair', 'akhtar', '8778878787888', 'pic', '897897', '87878787878', 'khanb@zubair.com', 'user', '12345', 'User'),
(13, 'zubair', 'akhta', '8978978978978', 'pic', 'hjkhjkh', '89789789789', 'amber@gmai.ciom', 'manager', '12345', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contactus_tbl`
--
ALTER TABLE `contactus_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feature_tbl`
--
ALTER TABLE `feature_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `food_tbl`
--
ALTER TABLE `food_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hall_rating_tbl`
--
ALTER TABLE `hall_rating_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register_tbl`
--
ALTER TABLE `register_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_tbl`
--
ALTER TABLE `booking_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contactus_tbl`
--
ALTER TABLE `contactus_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feature_tbl`
--
ALTER TABLE `feature_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_tbl`
--
ALTER TABLE `food_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hall_rating_tbl`
--
ALTER TABLE `hall_rating_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register_tbl`
--
ALTER TABLE `register_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
