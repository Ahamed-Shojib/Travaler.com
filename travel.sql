-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 05:51 AM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `admin_pass` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_id`, `name`, `email`, `admin_pass`) VALUES
(1, 1001, 'Ahamed Shojib', 'ahamed@cse.com', '123@abc');

-- --------------------------------------------------------

--
-- Table structure for table `avail_tour`
--

CREATE TABLE `avail_tour` (
  `tour_id` int(100) NOT NULL,
  `locations` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `dates` date NOT NULL,
  `price` int(100) NOT NULL,
  `seats` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avail_tour`
--

INSERT INTO `avail_tour` (`tour_id`, `locations`, `details`, `dates`, `price`, `seats`) VALUES
(501, 'Cox Bazar', 'Cox’s Bazar is a town on the southeast coast of Bangladesh. It’s known for its very long, sandy beachfront, stretching from Sea Beach in the north to Kolatoli Beach in the south. Aggameda Khyang monastery is home to bronze statues and centuries-old Buddhist manuscripts. ', '2024-06-05', 5000, 25),
(502, 'Santmartin', 'Saint Martin\'s Island is renowned for its pristine beaches, crystal-clear blue waters, and coral reefs, making it a popular tourist destination.It is the only coral island in Bangladesh, and the vibrant underwater life attracts divers and snorkelers.', '2024-06-20', 6500, 15),
(601, 'Darjeeling', 'Darjeeling is a town in India\'s West Bengal state, in the Himalayan foothills. Once a summer resort for the British Raj elite, it remains the terminus of the narrow-gauge Darjeeling Himalayan Railway, or “Toy Train,” completed in 1881.', '2024-07-25', 15000, 10),
(701, 'Shitakundo', 'Shitakundo is a beautiful place of Bangladesh.', '2024-06-22', 4500, 18),
(707, 'Kolkata', 'Kolkata is a famous and old city in India.', '2024-06-20', 18500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `tour_id` int(100) NOT NULL,
  `locations` varchar(100) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `seats` int(20) NOT NULL,
  `ticket_no` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`tour_id`, `locations`, `dates`, `total_price`, `seats`, `ticket_no`, `email`) VALUES
(61, 'Cox Bazar', '2024-06-14', 5000, 1, 367699, 'mehedi@gmail.com'),
(64, 'Santmartin', '2024-07-03', 6500, 1, 393593, 'mehedi@gmail.com'),
(70, 'Cox Bazar', '2024-06-20', 5000, 1, 965003, 'shojib@gmail.com'),
(73, 'Darjeeling', '2024-06-18', 25000, 2, 864744, 'ali@gmail.com'),
(74, 'Darjeeling', '2024-06-18', 25000, 2, 817538, 'ali@gmail.com'),
(75, 'Cox Bazar', '2024-06-14', 10000, 2, 146052, 'ali@gmail.com'),
(76, 'Darjeeling', '2024-06-18', 30000, 2, 602087, 'ali@gmail.com'),
(77, 'Cox Bazar', '2024-06-25', 5000, 1, 298594, 'ali@gmail.com'),
(78, 'Cox Bazar', '2024-06-27', 10000, 2, 659985, 'mehedi@gmail.com'),
(79, 'Cox Bazar', '2024-06-21', 5000, 1, 597877, 'rana@gmail.com'),
(80, 'Cox Bazar', '2024-12-19', 5000, 1, 867943, ''),
(81, 'Cox Bazar', '2024-12-19', 5000, 1, 803418, ''),
(82, 'Cox Bazar', '2024-12-19', 5000, 1, 822815, ''),
(83, 'Cox Bazar', '2024-12-14', 5000, 1, 864482, ''),
(84, 'Cox Bazar', '2024-12-01', 5000, 1, 551320, ''),
(85, 'Cox Bazar', '2024-12-20', 5000, 1, 630761, ''),
(86, 'Cox Bazar', '2024-12-01', 5000, 1, 612037, ''),
(87, 'Cox Bazar', '2024-12-01', 5000, 1, 748350, 'ab@gmail.com'),
(88, 'Cox Bazar', '2024-12-20', 5000, 1, 108085, 'ab@gmail.com'),
(89, 'Cox Bazar', '2024-12-01', 5000, 1, 960328, 'ab@gmail.com'),
(90, 'Cox Bazar', '2024-12-05', 10000, 2, 289398, 'ahamed@yahoo.com');

--
-- Triggers `book`
--
DELIMITER $$
CREATE TRIGGER `add_price` BEFORE INSERT ON `book` FOR EACH ROW BEGIN
IF NEW.seats = 1 AND NEW.locations= 'Cox Bazar' THEN
SET NEW.total_price = 5000;
END IF;
IF NEW.seats = 2 AND NEW.locations= 'Cox Bazar' THEN
SET NEW.total_price = 5000*2;
END IF;
IF NEW.seats = 3 AND NEW.locations= 'Cox Bazar' THEN
SET NEW.total_price = 5000*3;
END IF;

IF NEW.seats = 1 AND NEW.locations= 'Santmartin' THEN
SET NEW.total_price = 6500;
END IF;
IF NEW.seats = 2 AND NEW.locations= 'Santmartin' THEN
SET NEW.total_price = 6500*2;
END IF;
IF NEW.seats = 3 AND NEW.locations= 'Santmartin' THEN
SET NEW.total_price = 6500*3;
END IF;

IF NEW.seats = 1 AND NEW.locations= 'Darjeeling' THEN
SET NEW.total_price = 15000;
END IF;
IF NEW.seats = 2 AND NEW.locations= 'Darjeeling' THEN
SET NEW.total_price = 15000*2;
END IF;
IF NEW.seats = 3 AND NEW.locations= 'Darjeeling' THEN
SET NEW.total_price = 15000*3;
END IF;

IF NEW.seats = 1 AND NEW.locations= 'Shitakundo' THEN
SET NEW.total_price = 4500;
END IF;
IF NEW.seats = 2 AND NEW.locations= 'Shitakundo' THEN
SET NEW.total_price = 4500*2;
END IF;
IF NEW.seats = 3 AND NEW.locations= 'Shitakundo' THEN
SET NEW.total_price = 4500*3;
END IF;

IF NEW.seats = 1 AND NEW.locations= 'Kolkata' THEN
SET NEW.total_price = 18500;
END IF;
IF NEW.seats = 2 AND NEW.locations= 'Kolkata' THEN
SET NEW.total_price = 18500*2;
END IF;
IF NEW.seats = 3 AND NEW.locations= 'Kolkata' THEN
SET NEW.total_price = 18500*3;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `seat_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `TYPE` enum('Bus','Plane','Car') NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `TYPE`, `NAME`, `capacity`, `created_at`) VALUES
(2, 'Plane', 'Boeing 747', 300, '2024-12-02 09:59:26'),
(3, 'Car', 'Sedan', 4, '2024-12-02 09:59:26'),
(4, 'Bus', 'City Bus', 50, '2024-12-02 10:00:46'),
(5, 'Plane', 'Boeing 747', 300, '2024-12-02 10:00:46'),
(6, 'Car', 'Sedan', 4, '2024-12-02 10:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `available_seats` int(11) NOT NULL,
  `vehicle_type` varchar(10) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `type`, `date`, `available_seats`, `vehicle_type`, `vehicle_name`) VALUES
(9, 'Car', '2024-12-21', 14, '', ''),
(10, 'Plane', '2024-12-15', 13, 'Economy', 'US Bangla');

-- --------------------------------------------------------

--
-- Table structure for table `upcomming`
--

CREATE TABLE `upcomming` (
  `tour_id` int(10) NOT NULL,
  `locations` varchar(30) NOT NULL,
  `details` text NOT NULL,
  `dates` date NOT NULL,
  `price` int(10) NOT NULL,
  `seats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcomming`
--

INSERT INTO `upcomming` (`tour_id`, `locations`, `details`, `dates`, `price`, `seats`) VALUES
(150, 'Taj Mohol', 'Indian\'s Most famous tourist place.', '2024-06-25', 25000, 10),
(210, 'Thailand', 'Most Luxurious place', '2024-06-30', 30000, 8),
(303, 'Paris', 'One of the most desirable place', '2024-07-10', 52000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `nation` text NOT NULL,
  `gender` text NOT NULL,
  `religion` text NOT NULL,
  `blood` varchar(5) NOT NULL,
  `marit` text NOT NULL,
  `gurdian_n` varchar(20) NOT NULL,
  `present_add` varchar(100) NOT NULL,
  `parmanent_add` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `dob`, `mobile`, `nation`, `gender`, `religion`, `blood`, `marit`, `gurdian_n`, `present_add`, `parmanent_add`) VALUES
(1, 'ahamed', '123@abc', 'Hasan', '', 'ab@gmail.com', NULL, '01634260670', '', '', '', '', '', '', '', ''),
(2, 'shojib', '1234', 'Mehedi', '', 'uy@gmail.com', NULL, '01771260670', '', '', '', '', '', '', '', ''),
(423, '', '1234', 'Ahamed', 'Shojib', 'ahamed@yahoo.com', NULL, '01634260678', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `nation` varchar(15) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `blood` varchar(3) NOT NULL,
  `marit` varchar(10) NOT NULL,
  `gurdian_n` varchar(20) NOT NULL,
  `present_add` varchar(255) NOT NULL,
  `parmanent_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `pass`, `dob`, `nation`, `mobile`, `gender`, `religion`, `blood`, `marit`, `gurdian_n`, `present_add`, `parmanent_add`) VALUES
(106, 'Ahamed', 'Shojib', 'shojib@gmail.com', '12345', '2001-01-04', 'Bangladeshi', '01771260670', 'Male', 'Islam', 'B+', 'Unmarit', '01892346342', 'Uttara,Dhaka', 'Jamalpur'),
(263, 'Mehedi', 'Hasan', 'mehedi@gmail.com', '12345', '2001-01-04', 'Bangladeshi', '01634260670', 'Male', 'Islam', 'B+', 'N/A', '01771260670', 'Uttara,Dhaka', 'Jamalpur'),
(351, 'Asraf', 'Ali', 'ali@gmail.com', '12345', '2023-11-14', 'Indian', '0163426373', 'Male', 'Islam', 'A+', 'Marit', '0147333333', 'Motijhill,Dhaka', 'West Bangel'),
(681, 'Rana', 'Hasan', 'rana@gmail.com', '12345', '0000-00-00', '', '01734374344', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`,`admin_id`,`email`);

--
-- Indexes for table `avail_tour`
--
ALTER TABLE `avail_tour`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcomming`
--
ALTER TABLE `upcomming`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`email`,`mobile`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`,`mobile`,`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `tour_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
