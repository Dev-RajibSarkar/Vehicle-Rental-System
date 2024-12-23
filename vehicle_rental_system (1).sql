-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 07:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(10) NOT NULL,
  `v_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `book_place` varchar(50) NOT NULL,
  `book_dt` date NOT NULL,
  `duration` int(10) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `fare` int(10) NOT NULL,
  `ret_dt` date NOT NULL,
  `status` varchar(50) DEFAULT 'under processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `v_id`, `c_id`, `book_place`, `book_dt`, `duration`, `destination`, `fare`, `ret_dt`, `status`) VALUES
(1, 4, 7, 'Guwahati', '2024-11-06', 2, 'meghalaya', 16000, '2024-11-09', 'RETURNED'),
(2, 4, 7, 'Shillong', '2024-11-06', 2, 'arunachal pradesh', 16000, '2024-11-08', 'RETURNED'),
(3, 4, 7, 'Guwahati', '2024-11-12', 2, 'meghalaya', 16000, '2024-11-14', 'under processing'),
(4, 4, 8, 'Guwahati', '2024-11-12', 3, 'shillong', 24000, '2024-11-15', 'under processing'),
(5, 5, 9, 'Guwahati', '2024-12-05', 2, 'Shillong', 20000, '2024-12-07', 'APPROVED'),
(6, 5, 9, 'Guwahati', '2024-12-06', 2, 'meghalaya', 20000, '2024-12-09', 'CANCELLED'),
(7, 7, 9, 'Guwahati', '2024-12-06', 3, 'arunachal pradesh', 3000, '2024-12-10', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `o_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ph_no` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int(10) NOT NULL,
  `status` varchar(255) DEFAULT 'under processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`o_id`, `name`, `email`, `password`, `ph_no`, `address`, `pincode`, `status`) VALUES
(1, 'nitay sarkar', 'nitay@gmail.com', '234', 2147483647, 'Azara Boripara', 781017, 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `exp_dt` varchar(10) NOT NULL,
  `cvv` int(5) NOT NULL,
  `fare` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `book_id`, `card_id`, `exp_dt`, `cvv`, `fare`) VALUES
(9, 4, '1111222233334444', '12/25', 123, 24000),
(10, 5, '123456781234', '56/09', 123, 20000),
(11, 5, '1123456789012', '23/34', 123, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ph_no` int(10) NOT NULL,
  `adhar_no` varchar(20) NOT NULL,
  `dl_no` int(20) NOT NULL,
  `dl_validity` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(50) DEFAULT 'under processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`c_id`, `c_name`, `c_email`, `password`, `address`, `ph_no`, `adhar_no`, `dl_no`, `dl_validity`, `gender`, `status`) VALUES
(7, 'Rajib Sarkar', 'sarkarrajib824@gmail.com', '123', 'Azara Boripara', 1234567890, '2147483647', 1234, '2024-10-30', 'Male', 'APPROVED'),
(8, 'Raj Sarkar', 'nitay@gmail.com', '234', 'Azara Boripara', 2147483647, '123423453456', 0, '2030-12-25', 'Male', 'under processing'),
(9, 'rajib sarkar', 'rajib@gmail.com', 'asd', 'Azara Boripara', 1234567899, '234556784567', 0, '2030-07-11', 'Male', 'under processing');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `v_name` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `type` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `capacity` int(10) NOT NULL,
  `milage` varchar(10) NOT NULL,
  `price` int(20) NOT NULL,
  `pur_dt` date NOT NULL,
  `mfg` date NOT NULL,
  `reg_exp` date NOT NULL,
  `status` varchar(50) DEFAULT 'under processing',
  `available` varchar(5) DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `o_id`, `v_name`, `image`, `type`, `reg_no`, `capacity`, `milage`, `price`, `pur_dt`, `mfg`, `reg_exp`, `status`, `available`) VALUES
(4, 1, 'BMW Z3', 0x6361726267352e6a7067, 'Petrol', 'AS01DE1234', 2, '10KMPL', 8000, '2024-06-03', '2023-06-06', '2034-06-03', 'APPROVED', 'Y'),
(5, 1, 'Ferrari SF90 Stradale', 0x666572726172692e6a7067, 'Petrol', 'AS01BW1234', 2, '18KMPL', 10000, '2022-07-28', '2019-02-15', '2034-02-14', 'under processing', 'Y'),
(6, 1, 'Harley Davidson Sportster S', 0x6861726c6579206461766964736f6e2e706e67, 'Petrol', 'AS01RS1890', 2, '20KMPL', 2000, '2021-12-14', '2021-06-09', '2036-12-15', 'under processing', 'Y'),
(7, 1, 'RE GT 650', 0x4754203635302e706e67, 'Petrol', 'AS01EW1234', 2, '27KMPL', 1000, '2022-03-10', '2021-08-20', '2037-07-15', 'under processing', 'Y'),
(8, 1, 'XUV 700', 0x585556203730302e706e67, 'Petrol', 'AS01AB1256', 6, '15KMPL', 2500, '2023-07-05', '2023-07-04', '2038-07-07', 'under processing', 'Y'),
(10, 1, 'Mercedes Benz', 0x63617262672e706e67, 'Petrol', 'AS01DW7848', 4, '15kmpl', 3000, '2022-03-09', '2022-01-02', '2037-02-10', 'under processing', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `o_id` (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vehicles` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `users` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `booking` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `owner` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
