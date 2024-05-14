-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 04, 2024 at 11:24 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `programare_inmatriculari`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `address` varchar(32) DEFAULT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`,`employee_id`) VALUES
(1, 'Inmatriculari-Bucuresti', 'Bucuresti', 1),
(2, 'Inmatriculari-Brasov', 'Brasov', 2),
(3, 'Inmatriculari-Sibiu', 'Sibiu', 2),
(4, 'Inmatriculari-Constanta', 'Constanta', 3);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `data` DATE DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `location_id`, `data`) VALUES
(1, 1, 1, '2024-05-10'),
(2, 1, 2, '2024-05-15'),
(3, 2, 1, '2024-06-12'),
(4, 2, 2, '2024-05-01'),
(5, 3, 3, '2024-05-11'),
(6, 3, 4, '2024-07-12'),
(7, 4, 2, '2024-05-19'),
(8, 4, 2, '2024-08-10'),
(9, 5, 1, '2024-06-01'),
(10, 5, 2, '2024-07-12'),
(11, 5, 3, '2024-05-05'),
(12, 5, 5, '2025-01-05'),
(13, 5, 4, '2025-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Alex', 'alex@mail.com', '12345678'),
(2, 'Ionut', 'ionut@gmail.com', 'parola1234'),
(3, 'Sorin', 'sorin@mail.com', 'qwerty1234'),
(4, 'George', 'george@mail.com', 'george1234'),
(5, 'Florin', 'florin@test_mail.com', 'parolasigura1');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`) VALUES
(1, 'Angajat1', 'parolaAngajat1'),
(2, 'Angajat2', 'parolaAngajat2'),
(3, 'Angajat3', 'parolaAngajat3'),
(12, 'Angajat12', 'parolaAngajat12');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `appointments`
--