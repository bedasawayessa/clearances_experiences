-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 03:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearance_experience_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_requests_tbl`
--

CREATE TABLE `approved_requests_tbl` (
  `ApprovalID` int(11) NOT NULL,
  `ClearanceID` int(11) DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Roles` varchar(50) DEFAULT NULL,
  `ApprovedDate` date DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `YearLevel` int(11) DEFAULT NULL,
  `ClearanceType` varchar(50) DEFAULT NULL,
  `ClearanceReason` text DEFAULT NULL,
  `RequestedDate` date DEFAULT NULL,
  `Priority` varchar(20) DEFAULT NULL,
  `SupportingDocuments` text DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `approved_requests_tbl`
--

INSERT INTO `approved_requests_tbl` (`ApprovalID`, `ClearanceID`, `StudentID`, `UserID`, `Roles`, `ApprovedDate`, `DepartmentID`, `YearLevel`, `ClearanceType`, `ClearanceReason`, `RequestedDate`, `Priority`, `SupportingDocuments`, `Status`) VALUES
(1, 3, 10, 5, '', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(2, 3, 10, 3, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Rejected'),
(3, 3, 10, 3, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(4, 3, 10, 5, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(5, 3, 10, 5, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(6, 3, 10, 5, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(7, 3, 10, 5, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(8, 3, 10, 5, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(9, 3, 10, 5, 'instructor', '2023-03-01', 1, 2024, 'Semester', 'added i have updated', '2023-03-01', 'High', '', 'Accepted'),
(10, 5, 12, 5, 'instructor', '2024-05-08', 1, 2034, 'Withdrawal', 'aaa', '2024-05-08', 'Medium', '', 'Accepted'),
(11, 5, 12, 5, 'instructor', '2024-05-08', 1, 2034, 'Withdrawal', 'aaa', '2024-05-08', 'Medium', '', 'Accepted'),
(12, 5, 12, 5, 'instructor', '2024-05-08', 1, 2034, 'Withdrawal', 'aaa', '2024-05-08', 'Medium', '', 'Accepted'),
(13, 5, 12, 5, 'instructor', '2024-05-08', 1, 2034, 'Withdrawal', 'aaa', '2024-05-08', 'Medium', '', 'Accepted'),
(14, 5, 12, 5, 'instructor', '2024-05-08', 1, 2034, 'Withdrawal', 'aaa', '2024-05-08', 'Medium', '', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings_tbl`
--

CREATE TABLE `borrowings_tbl` (
  `BorrowingID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PropertyID` int(11) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Purpose` text DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `borrowings_tbl`
--

INSERT INTO `borrowings_tbl` (`BorrowingID`, `StudentID`, `UserID`, `PropertyID`, `StartDate`, `EndDate`, `Purpose`, `Status`) VALUES
(1, 12, 6, 1, '2024-05-08', '2024-05-31', 'aaa', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `clearances_tbl`
--

CREATE TABLE `clearances_tbl` (
  `ClearanceID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `YearLevel` varchar(20) NOT NULL,
  `ClearanceType` varchar(50) DEFAULT NULL,
  `ClearanceReason` text NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `RequestedDate` date DEFAULT NULL,
  `ApprovedDate` date DEFAULT NULL,
  `DeniedDate` date DEFAULT NULL,
  `ReasonForDenial` text DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `Deadline` date DEFAULT NULL,
  `Priority` varchar(20) DEFAULT NULL,
  `SupportingDocuments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clearances_tbl`
--

INSERT INTO `clearances_tbl` (`ClearanceID`, `UserID`, `StudentID`, `DepartmentID`, `YearLevel`, `ClearanceType`, `ClearanceReason`, `Status`, `RequestedDate`, `ApprovedDate`, `DeniedDate`, `ReasonForDenial`, `Comments`, `Deadline`, `Priority`, `SupportingDocuments`) VALUES
(3, 3, 10, 1, '2024', 'Semester', 'added i have updated', 'Pending', '2023-03-01', NULL, NULL, NULL, NULL, NULL, 'High', ''),
(5, 6, 12, 1, '2034', 'Withdrawal', 'aaa', 'Pending', '2024-05-08', NULL, NULL, NULL, NULL, NULL, 'Medium', '');

-- --------------------------------------------------------

--
-- Table structure for table `departments_tbl`
--

CREATE TABLE `departments_tbl` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `departments_tbl`
--

INSERT INTO `departments_tbl` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `property_tbl`
--

CREATE TABLE `property_tbl` (
  `PropertyID` int(11) NOT NULL,
  `PropertyType` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Availability` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `property_tbl`
--

INSERT INTO `property_tbl` (`PropertyID`, `PropertyType`, `Description`, `Availability`, `Location`, `Image`) VALUES
(1, '', 'na', 'aa', 'aa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE `students_tbl` (
  `StudentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DepartmentID` int(255) NOT NULL,
  `Program` varchar(100) DEFAULT NULL,
  `YearLevel` varchar(20) DEFAULT NULL,
  `GPA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`StudentID`, `UserID`, `DepartmentID`, `Program`, `YearLevel`, `GPA`) VALUES
(1, 1, 1, 'CEP', '2023', 1.00),
(9, 2, 1, 'Porgram', '2024', 4.00),
(10, 3, 1, 'CEP', '2024', 2.00),
(11, 4, 1, 'NA', '2023', 3.00),
(12, 6, 1, 'CIVIL', '2034', 21.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `role` varchar(30) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `role`, `reset_token`, `reset_token_expiry`) VALUES
(3, 'bedonaf', 'password', 'Bedasa', 'Wayessa', 'bedonaf@gmail.com', 0, 'admin', '', NULL),
(4, 'bedasa', 'password', 'Bedasa', 'Wayessa', 'bedonaf2023@gmail.com', 935736649, 'admin', '4b6af6b7c229c927847dced1c595f8ece17c79477e65dfaf9590da8f86527f38', '2024-04-28 13:27:24'),
(5, 'student', 'password', 'Bedasa', 'Wayessa', 'bedonaf1@gmail.com', 0, 'student', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Passwords` varchar(255) DEFAULT NULL,
  `Roles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`UserID`, `UserName`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `Passwords`, `Roles`) VALUES
(1, 'bedonaf', 'Bedasa', 'Wayessa', '0935736649', 'bedonaf@gmail.com', '$2y$10$uCwHcV8l8z5dTN7yJ.20Vu.tGk1h/CRV6fnScjsf3aSGgk0IwFny6', 'admin'),
(2, 'bedasa', 'Bedasa', 'Wayessa', '0935736649', 'bedonaf2023@gmail.com', '$2y$10$iU.h9j9zICpxAoVk1OWgh.7y8J6gbSrsR/sjskeZhpzK0myp2EEzW', 'librarian'),
(3, 'bedasa1', 'Bedasa', 'Wayessa', '0935736649', 'bedonaf2024@gmail.com', '$2y$10$/XxcTmpFn7eOBCA.Aa82u.1CuDbykeyyPeBJdJVNi.z3oHzjkH2YC', 'student'),
(4, 'admin', 'Bedasa', 'Wayessa', '0935736649', 'bedonaf2025@gmail.com', '$2y$10$.1HO55.JMBDNUy26QurRUOQO8riztx5yfh2Cvq1379a92neJmgyci', 'admin'),
(5, 'hod', 'Bedasa', 'Wayessa', '0935736649', 'bedonaf2026@gmail.com', '$2y$10$noB/bTBNHy30.QfhhIYWae5lbZzezBmjylk8Rh4P8nmS4qCgrAiqi', 'instructor'),
(6, 'kabe', 'Kabe', 'Sori', '0935736649', 'kabe@gmail.com', '$2y$10$dPWEw9T78HoiE8GycmNWdOyloHQk3HBlWwn5oRBNw3NWC6BhNgftC', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_requests_tbl`
--
ALTER TABLE `approved_requests_tbl`
  ADD PRIMARY KEY (`ApprovalID`),
  ADD KEY `FK_ClearanceID` (`ClearanceID`),
  ADD KEY `FK_StudentID` (`StudentID`),
  ADD KEY `FK_UserID` (`UserID`),
  ADD KEY `FK_DepartmentID` (`DepartmentID`);

--
-- Indexes for table `borrowings_tbl`
--
ALTER TABLE `borrowings_tbl`
  ADD PRIMARY KEY (`BorrowingID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `clearances_tbl`
--
ALTER TABLE `clearances_tbl`
  ADD PRIMARY KEY (`ClearanceID`),
  ADD KEY `YearLevel` (`YearLevel`),
  ADD KEY `clearances_tbl_ibfk_1` (`StudentID`),
  ADD KEY `clearances_tbl_ibfk_2` (`DepartmentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `departments_tbl`
--
ALTER TABLE `departments_tbl`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `property_tbl`
--
ALTER TABLE `property_tbl`
  ADD PRIMARY KEY (`PropertyID`);

--
-- Indexes for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `DepartmentID` (`DepartmentID`) USING BTREE,
  ADD KEY `student_user_id` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_requests_tbl`
--
ALTER TABLE `approved_requests_tbl`
  MODIFY `ApprovalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `borrowings_tbl`
--
ALTER TABLE `borrowings_tbl`
  MODIFY `BorrowingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearances_tbl`
--
ALTER TABLE `clearances_tbl`
  MODIFY `ClearanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments_tbl`
--
ALTER TABLE `departments_tbl`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_tbl`
--
ALTER TABLE `property_tbl`
  MODIFY `PropertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approved_requests_tbl`
--
ALTER TABLE `approved_requests_tbl`
  ADD CONSTRAINT `FK_ClearanceID` FOREIGN KEY (`ClearanceID`) REFERENCES `clearances_tbl` (`ClearanceID`),
  ADD CONSTRAINT `FK_DepartmentID` FOREIGN KEY (`DepartmentID`) REFERENCES `departments_tbl` (`DepartmentID`),
  ADD CONSTRAINT `FK_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `students_tbl` (`StudentID`),
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserID`) REFERENCES `users_tbl` (`UserID`);

--
-- Constraints for table `borrowings_tbl`
--
ALTER TABLE `borrowings_tbl`
  ADD CONSTRAINT `borrowings_tbl_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students_tbl` (`StudentID`),
  ADD CONSTRAINT `borrowings_tbl_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users_tbl` (`UserID`),
  ADD CONSTRAINT `borrowings_tbl_ibfk_3` FOREIGN KEY (`PropertyID`) REFERENCES `property_tbl` (`PropertyID`);

--
-- Constraints for table `clearances_tbl`
--
ALTER TABLE `clearances_tbl`
  ADD CONSTRAINT `clearances_tbl_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students_tbl` (`StudentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `clearances_tbl_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `departments_tbl` (`DepartmentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `clearances_tbl_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users_tbl` (`UserID`);

--
-- Constraints for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD CONSTRAINT `student_department_id` FOREIGN KEY (`DepartmentID`) REFERENCES `departments_tbl` (`DepartmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_user_id` FOREIGN KEY (`UserID`) REFERENCES `users_tbl` (`UserID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
