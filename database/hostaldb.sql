-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 03:47 AM
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
-- Database: `hostaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(65) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nic` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nic`) VALUES
('dasunsiya', '$2y$10$CPtbRvOBeXAc7.qEPS0OluQxAdiwdaGLPhWY1I.Foc0VXySctduqi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `bedID` varchar(65) NOT NULL,
  `demageState` varchar(45) DEFAULT NULL,
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`bedID`, `demageState`, `roomNo`) VALUES
('bed0901', 'Good', 34),
('bed0934', 'Good', 34),
('bed2323', 'Damaged', 1),
('bed666', 'Good', 1),
('bed7821', 'Good', 1),
('bed7843', 'Good', 34);

-- --------------------------------------------------------

--
-- Table structure for table `chair`
--

CREATE TABLE `chair` (
  `chairID` varchar(65) NOT NULL,
  `demageState` varchar(45) DEFAULT NULL,
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `chair`
--

INSERT INTO `chair` (`chairID`, `demageState`, `roomNo`) VALUES
('006246', 'No damage', 212352),
('0733', 'No damage', 75463),
('11111', 'No damage', 35),
('1121212', 'No damage', 785),
('22222', 'No damage', 35),
('ch1', 'Damaged', 34),
('ch3', 'Damaged', 2),
('ch4', 'Damaged', 2),
('ch4352', 'Good', 2),
('ch9653', 'Good', 2);

-- --------------------------------------------------------

--
-- Table structure for table `desk`
--

CREATE TABLE `desk` (
  `deskID` varchar(65) NOT NULL,
  `demageState` varchar(45) DEFAULT NULL,
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `desk`
--

INSERT INTO `desk` (`deskID`, `demageState`, `roomNo`) VALUES
('0oiu', 'No damage', 77777),
('112', 'Good', 34),
('25', 'Good', 34),
('3434', 'Damaged', 34),
('412rv', 'No damage', 4352),
('des812', 'Good', 2),
('fdjt6', 'No damage', 681),
('fwf', 'No damage', 542),
('t111', 'Damaged', 35),
('t222', 'No damage', 35),
('th23', 'No damage', 212352),
('trw4', 'No damage', 212352);

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `lockerID` varchar(65) NOT NULL,
  `demageState` varchar(45) NOT NULL,
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`lockerID`, `demageState`, `roomNo`) VALUES
('locker24', 'Good', 34),
('locker83', 'Good', 1),
('locker912', 'Good', 34);

-- --------------------------------------------------------

--
-- Table structure for table `mettress`
--

CREATE TABLE `mettress` (
  `mettressID` varchar(45) NOT NULL,
  `demageState` varchar(45) DEFAULT NULL,
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `mettress`
--

INSERT INTO `mettress` (`mettressID`, `demageState`, `roomNo`) VALUES
('metr4540', 'Good', 34),
('metr888', 'Damaged', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `rackID` varchar(65) NOT NULL,
  `demageState` varchar(45) NOT NULL,
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rackID`, `demageState`, `roomNo`) VALUES
('0', 'No damage', 34802),
('0', 'No damage', 905431),
('0', 'No damage', 97321),
('rack675', 'Damaged', 34),
('rack6876', 'Good', 1),
('rack321', 'Good', 1),
('rack873', 'Good', 34),
('rack690', 'Damaged', 34);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(34),
(35),
(542),
(681),
(785),
(841),
(876),
(4352),
(7832),
(7853),
(34324),
(34802),
(75463),
(77777),
(97321),
(212352),
(905431),
(65654646);

-- --------------------------------------------------------

--
-- Table structure for table `securitylogs`
--

CREATE TABLE `securitylogs` (
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sid` varchar(65) NOT NULL,
  `note` mediumtext DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `securitylogs`
--

INSERT INTO `securitylogs` (`timestamps`, `sid`, `note`, `start_time`, `end_time`) VALUES
('2024-11-09 12:44:58', 'SEC0012', '1', '2024-11-09 18:04:09', '2024-11-09 18:14:58'),
('2024-11-09 12:47:35', 'SEC0013', '2sd', '2024-11-09 18:15:07', '2024-11-09 18:17:35'),
('2024-11-09 12:47:05', 'SEC0012', '1', '2024-11-09 18:16:29', '2024-11-09 18:17:05'),
('2024-11-09 12:48:00', 'SEC0014', '1sd', '2024-11-09 18:16:36', '2024-11-09 18:18:00'),
('2024-11-09 12:48:52', 'SEC0012', '67g', '2024-11-09 18:18:17', '2024-11-09 18:18:52'),
('2024-11-09 13:01:57', 'SEC0013', '1', '2024-11-09 18:18:37', '2024-11-09 18:31:57'),
('2024-11-09 12:58:21', 'SEC0012', '', '2024-11-09 18:21:12', '2024-11-09 18:28:21'),
('2024-11-09 13:03:08', 'SEC0014', '1', '2024-11-09 18:23:55', '2024-11-09 18:33:08'),
('2024-11-09 13:01:31', 'SEC0012', '1', '2024-11-09 18:30:32', '2024-11-09 18:31:31'),
('2024-11-09 13:03:05', 'SEC0012', '1', '2024-11-09 18:32:02', '2024-11-09 18:33:05'),
('2024-11-09 14:20:00', 'SEC0013', '1', '2024-11-09 19:12:00', '2024-11-09 19:50:00'),
('2024-11-09 13:47:41', 'SEC0012', NULL, '2024-11-09 19:17:41', '0000-00-00 00:00:00'),
('2024-11-09 16:15:09', 'SEC0013', NULL, '2024-11-09 21:45:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `securityperson`
--

CREATE TABLE `securityperson` (
  `sid` varchar(65) NOT NULL,
  `name` varchar(65) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `mark_access` tinyint(1) NOT NULL DEFAULT 0,
  `site_access` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `securityperson`
--

INSERT INTO `securityperson` (`sid`, `name`, `password`, `status`, `mark_access`, `site_access`) VALUES
('SEC0012', 'Jayee5656', '$2y$10$oeEEeKGitaaDKDrfcaSFpeTe4czyOIVdgjNrKtmhhFel/ob8wY0Wm', 1, 0, 1),
('SEC0013', 'Gunee7878', '$2y$10$3uZZd4AGgwNj.NzSbU6JA.WMssOWk38zXlssvDY..8CjMngCutm2a', 1, 1, 1),
('SEC0014', 'Somee3434', '$2y$10$mKb6fw19KCk9WfhfqVf2geQ0qGbwTrQkeLPzRggIVzZRPX7AKvjO.', 0, 0, 0);

--
-- Triggers `securityperson`
--
DELIMITER $$
CREATE TRIGGER `update_site_access` BEFORE UPDATE ON `securityperson` FOR EACH ROW BEGIN
    IF NEW.site_access = 0 THEN
        SET NEW.mark_access = 0;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_on_access` BEFORE UPDATE ON `securityperson` FOR EACH ROW BEGIN
    -- Check if status is set to 0
    IF NEW.status = 0 THEN
        SET NEW.site_access = 0;
        SET NEW.mark_access = 0;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(65) NOT NULL,
  `studentName` varchar(45) NOT NULL,
  `nic` varchar(45) NOT NULL,
  `batch` varchar(45) DEFAULT NULL,
  `phoneNumber` int(10) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `stRoomNo` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `nic`, `batch`, `phoneNumber`, `pswd`, `stRoomNo`, `status`) VALUES
('2021t01224', 'Hewa Siyasingha Polgahamullage Dasun Nilnuwan', '200105500381', '2nd Year', 786569924, '$2y$10$jibUIj1hy3leBEPPdnOu.O8X3NMofaKIupav0X/byhAlbKva0BzNa', 1, 0),
('6766', 'dasun', '200186', '2nd Year', 34343434, '$2y$10$8644eiZ7j/Tggzr5HEqE2ezKBkkqHii34ndnTniKMe6F9mb5IuxNW', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentlogs`
--

CREATE TABLE `studentlogs` (
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp(),
  `studentID` varchar(65) NOT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  `note` mediumtext DEFAULT NULL,
  `inMarkedby` varchar(65) NOT NULL,
  `outMarkedby` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `studentlogs`
--

INSERT INTO `studentlogs` (`timestamps`, `studentID`, `in_time`, `out_time`, `note`, `inMarkedby`, `outMarkedby`) VALUES
('2024-11-09 19:53:43', '2021t01224', '2024-11-10 01:23:43', '2024-11-10 18:51:52', '', 'SEC0013', 'SEC0013'),
('2024-11-10 06:46:31', '6766', '2024-11-10 12:16:31', '0000-00-00 00:00:00', NULL, 'SEC0013', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `st_latemsg`
--

CREATE TABLE `st_latemsg` (
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp(),
  `stid` varchar(65) NOT NULL,
  `msg` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`bedID`),
  ADD KEY `fk_bed_room1` (`roomNo`);

--
-- Indexes for table `chair`
--
ALTER TABLE `chair`
  ADD PRIMARY KEY (`chairID`),
  ADD KEY `fk_chair_room1` (`roomNo`);

--
-- Indexes for table `desk`
--
ALTER TABLE `desk`
  ADD PRIMARY KEY (`deskID`),
  ADD KEY `fk_desk_room1` (`roomNo`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`lockerID`),
  ADD KEY `roomNo` (`roomNo`);

--
-- Indexes for table `mettress`
--
ALTER TABLE `mettress`
  ADD PRIMARY KEY (`mettressID`),
  ADD KEY `fk_mettress_room1` (`roomNo`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD KEY `roomNo` (`roomNo`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNo`);

--
-- Indexes for table `securitylogs`
--
ALTER TABLE `securitylogs`
  ADD KEY `securitylogs_ibfk_1` (`sid`);

--
-- Indexes for table `securityperson`
--
ALTER TABLE `securityperson`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `fk_student_room1` (`stRoomNo`);

--
-- Indexes for table `studentlogs`
--
ALTER TABLE `studentlogs`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `markedby` (`inMarkedby`),
  ADD KEY `outMarkby` (`outMarkedby`);

--
-- Indexes for table `st_latemsg`
--
ALTER TABLE `st_latemsg`
  ADD KEY `stid` (`stid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bed`
--
ALTER TABLE `bed`
  ADD CONSTRAINT `fk_bed_room1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chair`
--
ALTER TABLE `chair`
  ADD CONSTRAINT `fk_chair_room1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `desk`
--
ALTER TABLE `desk`
  ADD CONSTRAINT `fk_desk_room1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locker`
--
ALTER TABLE `locker`
  ADD CONSTRAINT `locker_ibfk_1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mettress`
--
ALTER TABLE `mettress`
  ADD CONSTRAINT `fk_mettress_room1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rack`
--
ALTER TABLE `rack`
  ADD CONSTRAINT `rack_ibfk_1` FOREIGN KEY (`roomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `securitylogs`
--
ALTER TABLE `securitylogs`
  ADD CONSTRAINT `securitylogs_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `securityperson` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_room1` FOREIGN KEY (`stRoomNo`) REFERENCES `room` (`roomNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studentlogs`
--
ALTER TABLE `studentlogs`
  ADD CONSTRAINT `studentlogs_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentlogs_ibfk_2` FOREIGN KEY (`inMarkedby`) REFERENCES `securityperson` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `studentlogs_ibfk_3` FOREIGN KEY (`outMarkedby`) REFERENCES `securityperson` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `st_latemsg`
--
ALTER TABLE `st_latemsg`
  ADD CONSTRAINT `st_latemsg_ibfk_1` FOREIGN KEY (`stid`) REFERENCES `student` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
