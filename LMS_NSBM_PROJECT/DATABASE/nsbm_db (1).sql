-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 02:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsbm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursedetail`
--

CREATE TABLE `coursedetail` (
  `CourseID` int(50) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `FacID` int(50) NOT NULL,
  `YearID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetail`
--

INSERT INTO `coursedetail` (`CourseID`, `CourseName`, `FacID`, `YearID`) VALUES
(1, 'Fundamental Of Mathematics', 1, 1),
(2, 'Introduction To Statistics', 1, 1),
(3, 'Academic Wiriting', 1, 1),
(4, 'Introduction To Computer Application', 1, 1),
(5, 'Communication and Buissness Skills', 1, 1),
(6, 'Application Development with C Language', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facdetail`
--

CREATE TABLE `facdetail` (
  `FacID` int(45) NOT NULL,
  `FacName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facdetail`
--

INSERT INTO `facdetail` (`FacID`, `FacName`) VALUES
(1, 'SCHOOL OF COMPUTING'),
(2, 'SCHOOL OF BUSINESS'),
(3, 'SCHOOL OF ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `lecturedetail`
--

CREATE TABLE `lecturedetail` (
  `LechID` int(45) NOT NULL,
  `LechName` varchar(255) NOT NULL,
  `CourseID` int(45) NOT NULL,
  `FacID` int(45) NOT NULL,
  `YearID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturedetail`
--

INSERT INTO `lecturedetail` (`LechID`, `LechName`, `CourseID`, `FacID`, `YearID`) VALUES
(2, 'Lecture Name 2', 1, 1, 1),
(3, 'Lecture Name 3', 1, 1, 1),
(4, 'Lecture Name 4', 1, 1, 1),
(5, 'Lecture Name 5', 1, 1, 1),
(6, 'Lecture Name 6', 1, 1, 1),
(1, 'Lecture Name 1', 1, 1, 1),
(1, 'Lecture Name 1', 2, 1, 1),
(2, 'Lecture Name 2', 2, 1, 1),
(1, 'Lecture Name 1', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturefiles`
--

CREATE TABLE `lecturefiles` (
  `FileName` varchar(255) NOT NULL,
  `FilePath` varchar(1000) NOT NULL,
  `FileType` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `FileID` int(200) NOT NULL,
  `LechID` int(45) NOT NULL,
  `CourseID` int(45) NOT NULL,
  `YearID` int(45) NOT NULL,
  `FacID` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturefiles`
--

INSERT INTO `lecturefiles` (`FileName`, `FilePath`, `FileType`, `Date`, `FileID`, `LechID`, `CourseID`, `YearID`, `FacID`) VALUES
('file_1', 'uploaded_files/SCHOOL OF COMPUTING/Year 0/Fundamental Of Mathematics/file_1_sql_overview.pdf', 'application/pdf', '', 1, 1, 1, 1, 1),
('file_2', 'uploaded_files/SCHOOL OF COMPUTING/Year 0/Fundamental Of Mathematics/file_2_Untitled-1.png', 'image/png', '', 2, 2, 1, 1, 1),
('file_1', 'uploaded_files/SCHOOL OF COMPUTING/Year 0/Academic Wiriting/file_1_dbms_architecture.pdf', 'application/pdf', '', 3, 1, 3, 1, 1),
('file_1', 'uploaded_files/SCHOOL OF COMPUTING/Year 0/Introduction To Statistics/file_1_note.txt', 'text/plain', '', 4, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salt` text NOT NULL,
  `AccLevel` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `contact`, `address`, `salt`, `AccLevel`, `active`) VALUES
(1, 'Nishan', '2adaebefc75bd3c6dca451ba2b9eeee23680149cd48109e853a48dd4df4a7bb4', 'Nishan', 'Wijethunga', '', '', 'ƒûÚTxRãú Ä~y}|öFó	eàKÁ”Ô0\0', 'student', 1),
(2, 'Sameera', '9649e116b5140a1c8a566a1a1a50cfe09f9ee7d74a7976292ebcb576f084c6f4', 'Sameera', 'Wijenthunga', '', '', '…á°2]¥÷µŸ,’uØXÃ‚n@ÕS—ÍtðCÔg‡', 'teacher', 1),
(3, 'admin', '3cf2412e98a90eb552a38febf410674981eab5666f99753f6a9ad0733458f44a', 'a', 'b', '', '', 'W@QˆÓYôî"ÖÆýÅMÒ°ª€•4mf_æ‹mdÊ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `User_ID` varchar(255) NOT NULL,
  `Paswd` varchar(255) NOT NULL,
  `States` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`User_ID`, `Paswd`, `States`) VALUES
('1', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yeardetails`
--

CREATE TABLE `yeardetails` (
  `YearID` int(45) NOT NULL,
  `YearName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yeardetails`
--

INSERT INTO `yeardetails` (`YearID`, `YearName`) VALUES
(1, 'Year 0'),
(2, 'Year 1'),
(3, 'Year 2'),
(4, 'Year 3'),
(5, 'Year 4'),
(6, 'PGD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursedetail`
--
ALTER TABLE `coursedetail`
  ADD PRIMARY KEY (`CourseID`,`FacID`,`YearID`);

--
-- Indexes for table `facdetail`
--
ALTER TABLE `facdetail`
  ADD PRIMARY KEY (`FacID`);

--
-- Indexes for table `lecturefiles`
--
ALTER TABLE `lecturefiles`
  ADD PRIMARY KEY (`FileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_ID` (`User_ID`),
  ADD UNIQUE KEY `User_ID_2` (`User_ID`);

--
-- Indexes for table `yeardetails`
--
ALTER TABLE `yeardetails`
  ADD PRIMARY KEY (`YearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facdetail`
--
ALTER TABLE `facdetail`
  MODIFY `FacID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lecturefiles`
--
ALTER TABLE `lecturefiles`
  MODIFY `FileID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `yeardetails`
--
ALTER TABLE `yeardetails`
  MODIFY `YearID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
