-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 03:39 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- use loginsystem;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Dumping data for table `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `PName` varchar(70) DEFAULT NULL,
  `PAdd1` varchar(500) DEFAULT NULL,
  `PAdd2` varchar(100) DEFAULT NULL,
  `PAdd3` varchar(100) DEFAULT NULL,
  `PPin` varchar(6) DEFAULT NULL,
  `PPhone` varchar(20) DEFAULT NULL,
  `CPName` varchar(70) DEFAULT NULL,
  `CPPhone` varchar(20) DEFAULT NULL,
  `DLNo1` varchar(20) DEFAULT NULL	,
  `DLNo2` varchar(20) DEFAULT NULL,
  `RangeId` int(11) DEFAULT 0,
  `EMail` varchar(255) DEFAULT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(300) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
ALTER TABLE `users`
ADD CONSTRAINT UniqueUserName UNIQUE KEY(UserName);

--
-- Dumping data for table `users`
--
CREATE TABLE `zones` (
  `ZoneId` int(11) NOT NULL ,
  `ZoneName` varchar(100) DEFAULT NULL
);
ALTER TABLE `zones`
  ADD PRIMARY KEY (`ZoneId`);
ALTER TABLE `zones`
  MODIFY `ZoneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  

CREATE TABLE `ranges` (
  `RangeId` int(11) NOT NULL ,
  `RangeName` varchar(100) DEFAULT NULL,
   `ZoneId` int(11) NOT NULL 
  
);
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`RangeId`);
ALTER TABLE `ranges`
  MODIFY `RangeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
CREATE TABLE `CtrlNos` (
  `DstMstNo` int(11) NOT NULL
 );


CREATE TABLE `DstMst` (
  `DstMstNo` int(11) NOT NULL,
  `TranDate` Date NOT NULL,
  `UserId` int(11) NOT NULL,
  `PtName` varchar(70) DEFAULT NULL,
  `PtAdd` varchar(300) DEFAULT NULL,
  `PtPhone` varchar(20) DEFAULT NULL,
  `DrName` varchar(300) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
 );

ALTER TABLE `DstMst`
  ADD PRIMARY KEY (`DstMstNo`);

CREATE TABLE `DstDtl` (
  `DstDtlNo` int(11) NOT NULL,
  `DstMstNo` int(11) NOT NULL,
  `MDName` varchar(50) NOT NULL,
  `MDQty` int(4) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
 );

ALTER TABLE `DstDtl`
  ADD PRIMARY KEY (`DstDtlNo`);
  
  ALTER TABLE `DstDtl`
  MODIFY `DstDtlNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- --
 
CREATE TABLE `DIMaster` (
  `DIId` int(11) NOT NULL,
  `DIName` varchar(70) DEFAULT NULL,
  `DIUsrName` varchar(70) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `EMail` varchar(255) DEFAULT NULL,
  `Password` varchar(300) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `DIMaster`
  ADD PRIMARY KEY (`DIId`);
ALTER TABLE `DIMaster`
  MODIFY `DIId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


CREATE TABLE `DIVsRange` (
  `DIId` int(11) NOT NULL,
  `RangeId` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `DstMst`
  ADD `Processed` BOOLEAN DEFAULT 0;
  
  CREATE TABLE `DIVsDate` (
  `DIId` int(11) NOT NULL,
  `DateCompleted` DATE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
COMMIT;
-- Select U.PName, U.Padd1, U.PAdd2, U.PAdd3, U.PPin, U.PPhone, D.MDName, D.MDQty, M.DstMstNo, M.PtName, M.PtAdd, M.PtPhone, M.DrName FROM users U, DstMst M, DstDtl D, ranges R, DIMaster DI, DIVsRange DV WHERE DV.DIId = DI.DIId AND DV.RangeId = R.RangeId AND U.RangeId = R.RangeId AND M.UserId = U.UserId AND D.DstMstNo = M.DstMstNo AND DI.DIId = 1

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


