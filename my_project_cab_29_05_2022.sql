-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 06:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project_cab`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `pickup` varchar(150) NOT NULL,
  `destination` varchar(150) NOT NULL,
  `booking_time` time NOT NULL,
  `date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `bookingStatus` int(5) NOT NULL,
  `action` int(5) NOT NULL DEFAULT 0,
  `vehicleAllocated` varchar(100) NOT NULL,
  `distance` int(11) NOT NULL,
  `completed_time` time NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `pickup`, `destination`, `booking_time`, `date`, `amount`, `bookingStatus`, `action`, `vehicleAllocated`, `distance`, `completed_time`, `payment_status`, `payment_id`) VALUES
(25, 9, 'Erumeli, Kerala, India', 'Kanjirappally, Kerala, India', '15:44:00', '2022-05-07', 65, 0, 2, '4', 11, '00:00:00', 1, 'pay_JYlSrSUviyS2XB'),
(26, 9, 'Chennai, Tamil Nadu, India', 'Tambaram, Chennai, Tamil Nadu, India', '19:51:00', '2022-05-07', 153, 1, 2, '4', 25, '00:00:00', 1, 'pay_JYlbJAimAG1vzr');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(5) NOT NULL,
  `d_id` int(5) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `license_no` varchar(15) NOT NULL,
  `license_validity` date NOT NULL,
  `licence_doc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `d_id`, `address`, `gender`, `dob`, `license_no`, `license_validity`, `licence_doc`) VALUES
(1, 4, 'mathew', 'Male', '2022-04-20', 'hkj654jhcbjs', '2022-04-22', 'ABSTRACT main.pdf'),
(2, 11, 'Raman H', 'Male', '1999-06-12', '3243654345546', '2022-05-19', 'New Text Document.txt'),
(3, 13, 'Thakadiyel', 'Male', '2003-02-22', '3243654345546', '2022-05-29', 'proof.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `driver_payment` int(11) NOT NULL,
  `vehicle_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `type` int(3) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `mobile`, `profile_pic`, `type`, `status`) VALUES
(1, 'Alantina', 'alantina@gmail.com', '1146a55a233a518bd00ca614e1222b60', 9512345689, 'IMG20220121171534.jpg', 1, 1),
(2, 'admin1998', 'admin123@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 8129517085, '_MG_1125.JPG', 0, 1),
(3, 'liyan1999', 'liyan@gmail.com', '814e845d5144c6dba2f39fce20bc807f', 7356816868, '', 1, 1),
(4, 'Mathew197', 'mathew@gmail.com', 'de296f4278f2fc32f4182b7e791e0642', 9895120369, 'IMG_20211015_175753.jpg', 2, 1),
(5, 'Monnu', 'monnu@gmail.com', '95f429ce38f0210f05ad4bdb80b232b3', 9876543210, '', 3, 1),
(6, 'Appu', 'appu@gmail.com', '476b9cf0bf0883fb92964631efd5ed58', 5869898710, '', 3, 0),
(7, 'meenu', 'meenu@gmail.com', '550ba481acb35905ed45692c3fab1ebc', 9874563210, '', 3, 0),
(8, 'sabu', 'sabu@gmail.com', '92e749904d43dd5f9660f2350546988f', 9856321582, '', 3, 1),
(9, 'Mrudul', 'mrudulathakadiyel72@gmail.com', 'a93e1669a3924937b28c1bc15061f927', 8590456210, '', 1, 1),
(10, 'mrudulat', 'mrudulathakadiyel@gmail.com', 'a93e1669a3924937b28c1bc15061f927', 8590456214, '', 1, 1),
(11, 'raman', 'raman@gmail.com', 'fc75b1b545dc48232c30685f6eaba5ed', 859620145, '', 2, 1),
(12, 'sabin123', 'sabin@gmail.com', '27a192092e556f3a581ae9e2048cafbf', 9876322012, '', 3, 2),
(13, 'ligin', 'ligin@gmail.com', '66ffbabbb1cc9360f042e7c2236d6bc3', 8563214562, '20191220_133834.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `reg_no` varchar(15) NOT NULL,
  `model_company` varchar(150) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `seating_capacity` int(5) NOT NULL,
  `engine_no` varchar(15) NOT NULL,
  `chaise_no` varchar(15) NOT NULL,
  `reg_validity` date NOT NULL,
  `insurence_scheme` varchar(25) NOT NULL,
  `insurence_validity` date NOT NULL,
  `tax` date NOT NULL,
  `pollution` date NOT NULL,
  `vehicle_img` varchar(100) NOT NULL,
  `rc_doc` varchar(200) NOT NULL,
  `category` int(25) NOT NULL,
  `driverAllocated` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `u_id`, `reg_no`, `model_company`, `fuel`, `seating_capacity`, `engine_no`, `chaise_no`, `reg_validity`, `insurence_scheme`, `insurence_validity`, `tax`, `pollution`, `vehicle_img`, `rc_doc`, `category`, `driverAllocated`) VALUES
(1, 5, 'KL36Y1035', 'Hundai Sandro', 'disel', 4, 'shb5456cjsc', 'gh455vhn', '2022-05-05', 'Full Cover', '2022-04-29', '2022-04-28', '2022-04-29', 'IMG20201113154629.jpg', 'IMG20201113154629.jpg', 1, -1),
(2, 6, 'KL36Y1035', 'Toyota-Innova', 'electric', 6, 'gf546hjgh', 'ghfgh4536451', '2022-04-26', 'Bumber to Bumber', '2022-04-29', '2022-04-19', '2022-04-20', 'IMG20201113154629.jpg', 'IMG20201113154030.jpg', 2, -1),
(3, 7, 'fg15m3625', 'BMW', 'disel', 4, 'gh595', 'gh55695hj', '2022-04-30', 'Full Cover', '2022-04-29', '2022-05-07', '2022-04-30', 'IMG20201113154030.jpg', 'IMG20201113154629.jpg', 3, -1),
(4, 8, 'kl15m3648', 'Hundai i20', 'disel', 4, 'JK1529GJK74HDCB', 'HJ846JHJH25SHV', '2022-04-29', 'Full Cover', '2022-04-29', '2022-05-06', '2022-05-07', ' IMG20201113154629.jpg', '', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclerate`
--

CREATE TABLE `vehiclerate` (
  `id` int(5) NOT NULL,
  `category` varchar(150) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehiclerate`
--

INSERT INTO `vehiclerate` (`id`, `category`, `price`) VALUES
(1, 'BUDGET', 6),
(2, 'EXECUTIVE', 10),
(3, 'LUXURY', 15);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_request`
--

CREATE TABLE `vehicle_request` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_request`
--

INSERT INTO `vehicle_request` (`id`, `driver_id`, `vehicle_id`, `status`) VALUES
(2, 4, 2, 0),
(3, 13, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiclerate`
--
ALTER TABLE `vehiclerate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_request`
--
ALTER TABLE `vehicle_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehiclerate`
--
ALTER TABLE `vehiclerate`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_request`
--
ALTER TABLE `vehicle_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
