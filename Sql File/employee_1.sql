-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 03:43 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmpId` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmpId`, `Name`, `Email`, `Designation`) VALUES
(1, 'Murugan', 'muruganactive90@gmail.com', 'Sr, Web Developer'),
(2, 'Ragul', 'ragul@gmail.com', 'PHP Developer');

-- --------------------------------------------------------

--
-- Table structure for table `employees_details`
--

CREATE TABLE `employees_details` (
  `id` int(11) NOT NULL,
  `EmpId` int(11) NOT NULL,
  `DegreeCertificate` varchar(200) DEFAULT NULL,
  `DegreeCertificatePath` varchar(255) DEFAULT NULL,
  `PassportCopy` varchar(255) DEFAULT NULL,
  `PassportCopyPath` varchar(255) DEFAULT NULL,
  `Resume` varchar(255) DEFAULT NULL,
  `ResumePath` varchar(255) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_details`
--

INSERT INTO `employees_details` (`id`, `EmpId`, `DegreeCertificate`, `DegreeCertificatePath`, `PassportCopy`, `PassportCopyPath`, `Resume`, `ResumePath`, `CreatedDate`) VALUES
(1, 1, 'murugan_DegreeCertificate_1633439901.pdf', 'uploads/1/DegreeCertificate/murugan_DegreeCertificate_1633439901.pdf', 'murugan_PassportCopy_1633439901.jpg', 'uploads/1/PassportCopy/murugan_PassportCopy_1633439901.jpg', 'murugan_Resume_1633439901.doc', 'uploads/1/Resume/murugan_Resume_1633439901.doc', '2021-10-05 13:18:21'),
(2, 2, 'ragul_DegreeCertificate_1633440071.pdf', 'uploads/2/DegreeCertificate/ragul_DegreeCertificate_1633440071.pdf', 'ragul_PassportCopy_1633440071.jpg', 'uploads/2/PassportCopy/ragul_PassportCopy_1633440071.jpg', 'ragul_Resume_1633440071.doc', 'uploads/2/Resume/ragul_Resume_1633440071.doc', '2021-10-05 13:21:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmpId`);

--
-- Indexes for table `employees_details`
--
ALTER TABLE `employees_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees_details`
--
ALTER TABLE `employees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
