-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 04:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_vaccine_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Vaccine_Center` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`, `Vaccine_Center`) VALUES
('admin', '123', 'Mirpur Maternity Hospital'),
('admin1', '123', 'Mirpur Maternity Hospital'),
('admin10', '123', 'CCC Covid Hospital'),
('admin11', '123', 'Centre Point Hospital (Pvt) Ltd.'),
('admin12', '123', 'BNSB General Hospital'),
('admin13', '123', 'Chittagong Medical College'),
('admin2', '123', 'Mirpur Lalkuthi Hospital'),
('admin3', '123', 'Regent Hospital Mirpur'),
('admin4', '123', 'Bangladesh Kuwait Moitree Hospital'),
('admin5', '123', 'Uttara Lalkuthi Hospital'),
('admin6', '123', 'DNCC Dedicated Covid-19 Hospital'),
('admin7', '123', 'Labaid Hospital'),
('admin8', '123', 'Mohakhali Government Hospital'),
('admin9', '123', 'Combined Military Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `Agent_Email` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `NID` int(10) NOT NULL,
  `Vaccine_Center` varchar(50) NOT NULL,
  `Appointed_By` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`Agent_Email`, `Password`, `NID`, `Vaccine_Center`, `Appointed_By`) VALUES
('agent47@gmail.com', '123', 10000054, 'Mirpur Maternity Hospital', 'admin'),
('agent48@gmail.com', '123', 10000056, 'Bangladesh Kuwait Moitree Hospital', 'admin4'),
('agent49@gmail.com', '123', 10000036, 'Mirpur Maternity Hospital', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificate_table`
--

CREATE TABLE `birth_certificate_table` (
  `Birth_Certificate_No` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Contains` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth_certificate_table`
--

INSERT INTO `birth_certificate_table` (`Birth_Certificate_No`, `Name`, `Date_of_Birth`, `Gender`, `Contains`) VALUES
(20000001, 'Niloy', '1978-02-16', 'Male', NULL),
(20000002, 'Joy', '1974-09-11', 'Male', NULL),
(20000003, 'Nodi', '1980-02-21', 'Female', NULL),
(20000004, 'Samir', '1963-06-02', 'Male', NULL),
(20000005, 'Husne', '1954-04-11', 'Male', NULL),
(20000006, 'Fahim', '1957-06-06', 'Male', NULL),
(20000007, 'Ariyan', '1977-04-06', 'Male', NULL),
(20000008, 'Peter', '1995-12-14', 'Male', NULL),
(20000009, 'Steve', '1992-05-15', 'Male', NULL),
(20000010, 'Inaya', '1988-04-02', 'Female', NULL),
(20000011, 'Arham', '1977-07-24', 'Male', NULL),
(20000012, 'Kiara', '1977-11-22', 'Female', NULL),
(20000013, 'Maliha', '1974-07-21', 'Female', NULL),
(20000014, 'Raisa', '1994-01-19', 'Female', NULL),
(20000015, 'Sifat', '1967-12-31', 'Male', NULL),
(20000016, 'Azmat', '1954-08-20', 'Male', NULL),
(20000017, 'Ismat', '1974-02-22', 'Female', NULL),
(20000018, 'Sabby', '2000-02-05', 'Male', NULL),
(20000019, 'Saiful', '1985-11-17', 'Male', NULL),
(20000020, 'Khadiza', '1976-08-19', 'Female', NULL),
(20000021, 'Anika', '1952-09-14', 'Female', NULL),
(20000022, 'Mannan', '2000-03-26', 'Female', NULL),
(20000023, 'Sadia', '1981-08-06', 'Female', NULL),
(20000024, 'Rafa', '1971-05-07', 'Female', NULL),
(20000025, 'Abrar Shahriar Abeed', '1997-10-05', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nid_table`
--

CREATE TABLE `nid_table` (
  `NID` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Contains` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nid_table`
--

INSERT INTO `nid_table` (`NID`, `Name`, `Date_of_Birth`, `Gender`, `Contains`) VALUES
(10000001, 'Niloy', '1978-02-16', 'Male', NULL),
(10000002, 'Joy', '1974-09-11', 'Male', NULL),
(10000003, 'Nodi', '1980-02-21', 'Female', NULL),
(10000004, 'Samir', '1963-06-02', 'Male', NULL),
(10000005, 'Husne', '1954-04-11', 'Male', NULL),
(10000006, 'Fahim', '1957-06-06', 'Male', NULL),
(10000007, 'Ariyan', '1977-04-06', 'Male', NULL),
(10000008, 'Peter', '1995-12-14', 'Male', NULL),
(10000009, 'Steve', '1992-05-15', 'Male', NULL),
(10000010, 'Inaya', '1988-04-02', 'Female', NULL),
(10000011, 'Arham', '1977-07-24', 'Male', NULL),
(10000012, 'Kiara', '1977-11-22', 'Female', NULL),
(10000013, 'Maliha', '1974-07-21', 'Female', NULL),
(10000014, 'Raisa', '1994-01-19', 'Female', NULL),
(10000015, 'Sifat', '1967-12-31', 'Male', NULL),
(10000016, 'Azmat', '1954-08-20', 'Male', NULL),
(10000017, 'Ismat', '1974-02-22', 'Female', NULL),
(10000018, 'Sabby', '2000-02-05', 'Male', NULL),
(10000019, 'Saiful', '1985-11-17', 'Male', NULL),
(10000020, 'Khadiza', '1976-08-19', 'Female', NULL),
(10000021, 'Anika', '1952-09-14', 'Female', NULL),
(10000022, 'Mannan', '2000-03-26', 'Female', NULL),
(10000023, 'Sadia', '1981-08-06', 'Female', NULL),
(10000024, 'Rafa', '1971-05-07', 'Female', NULL),
(10000025, 'Abrar Shahriar Abeed', '1997-10-05', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passport_table`
--

CREATE TABLE `passport_table` (
  `Passport_No` varchar(8) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Contains` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passport_table`
--

INSERT INTO `passport_table` (`Passport_No`, `Name`, `Date_of_Birth`, `Gender`, `Contains`) VALUES
('AB300001', 'Niloy', '1978-02-16', 'Male', NULL),
('AB300002', 'Joy', '1974-09-11', 'Male', NULL),
('AB300003', 'Nodi', '1980-02-21', 'Female', NULL),
('AB300004', 'Samir', '1963-06-02', 'Male', NULL),
('AB300005', 'Husne', '1954-04-11', 'Male', NULL),
('AB300006', 'Fahim', '1957-06-06', 'Male', NULL),
('AB300007', 'Ariyan', '1977-04-06', 'Male', NULL),
('AB300008', 'Peter', '1995-12-14', 'Male', NULL),
('AB300009', 'Steve', '1992-05-15', 'Male', NULL),
('AB300010', 'Inaya', '1988-04-02', 'Female', NULL),
('AB300011', 'Arham', '1977-07-24', 'Male', NULL),
('AB300012', 'Kiara', '1977-11-22', 'Female', NULL),
('AB300013', 'Maliha', '1974-07-21', 'Female', NULL),
('AB300014', 'Raisa', '1994-01-19', 'Female', NULL),
('AB300015', 'Sifat', '1967-12-31', 'Male', NULL),
('AB300016', 'Azmat', '1954-08-20', 'Male', NULL),
('AB300017', 'Ismat', '1974-02-22', 'Female', NULL),
('AB300018', 'Sabby', '2000-02-05', 'Male', NULL),
('AB300019', 'Saiful', '1985-11-17', 'Male', NULL),
('AB300020', 'Khadiza', '1976-08-19', 'Female', NULL),
('AB300021', 'Anika', '1952-09-14', 'Female', NULL),
('AB300022', 'Mannan', '2000-03-26', 'Female', NULL),
('AB300023', 'Sadia', '1981-08-06', 'Female', NULL),
('AB300024', 'Rafa', '1971-05-07', 'Female', NULL),
('AB300025', 'Abrar Shahriar Abeed', '1997-10-05', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `update_vaccine_info`
--

CREATE TABLE `update_vaccine_info` (
  `Agent_Email` varchar(50) NOT NULL,
  `Vaccine_card_no` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Unq_username` varchar(50) NOT NULL,
  `NID` int(11) NOT NULL,
  `Passport` varchar(8) NOT NULL,
  `bcn` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `hc` varchar(10) NOT NULL,
  `Has` int(12) DEFAULT NULL,
  `Managed_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Unq_username`, `NID`, `Passport`, `bcn`, `Email`, `Password`, `hc`, `Has`, `Managed_by`) VALUES
('Fahim', 10000006, 'AB300006', 20000006, 'Fahim@gmail.com', '123', 'No', 632359270, NULL),
('inaya', 10000010, 'AB300010', 20000010, 'INNNAAYA@gmail.com', '123', 'No', 257940141, NULL),
('Khadiza_123', 10000020, 'AB300020', 20000020, 'khadiza@gmail.com', '123', 'Yes', 656992355, NULL),
('Kiara', 10000003, 'AB300003', 20000003, 'kiara@gmail.com', '123', 'Yes', 777914483, NULL),
('niloy', 10000001, 'AB300001', 20000001, 'niloy654568@gmail.com', '123', 'No', 758235726, NULL),
('sifat', 10000015, 'AB300015', 20000015, 'sifat@gmail.com', '123', 'Yes', 639930330, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `Vaccine_card_no` int(12) NOT NULL,
  `Unq_username` varchar(50) NOT NULL,
  `Center_Name` varchar(50) DEFAULT '',
  `City` varchar(50) DEFAULT '',
  `Area` varchar(50) DEFAULT '',
  `Selected_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`Vaccine_card_no`, `Unq_username`, `Center_Name`, `City`, `Area`, `Selected_date`) VALUES
(257940141, 'inaya', 'Mirpur Maternity Hospital', 'Dhaka', 'Mirpur', '2022-01-21'),
(632359270, 'Fahim', 'Bangladesh Kuwait Moitree Hospital', 'Dhaka', 'Uttara', '2022-01-28'),
(639930330, 'sifat', 'Mirpur Maternity Hospital', 'Dhaka', 'Mohammadpur', '2021-08-08'),
(656992355, 'Khadiza_123', 'Mirpur Maternity Hospital', 'Dhaka', 'Mirpur', '2022-01-14'),
(758235726, 'niloy', 'Mirpur Maternity Hospital', 'Dhaka', 'Mirpur', '2022-01-23'),
(777914483, 'Kiara', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_info`
--

CREATE TABLE `vaccine_info` (
  `Vaccine_card_no` int(12) NOT NULL,
  `No_of_doses` int(1) DEFAULT 0,
  `First_Dose_Date` date DEFAULT NULL,
  `Second_Dose_Date` date DEFAULT NULL,
  `Vaccine_Name` varchar(50) DEFAULT '',
  `Unq_username` varchar(50) NOT NULL,
  `Has` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_info`
--

INSERT INTO `vaccine_info` (`Vaccine_card_no`, `No_of_doses`, `First_Dose_Date`, `Second_Dose_Date`, `Vaccine_Name`, `Unq_username`, `Has`) VALUES
(257940141, 0, '0000-00-00', '0000-00-00', '', 'inaya', 'inaya'),
(632359270, 2, '2022-01-28', '2022-03-04', 'Moderna', 'Fahim', 'Fahim'),
(639930330, 2, '2021-07-10', '2021-08-08', 'Pfizer BioNTech', 'sifat', 'sifat'),
(656992355, 0, '0000-00-00', '0000-00-00', '', 'Khadiza_123', 'Khadiza_123'),
(758235726, 2, '2022-01-23', '2022-02-27', 'Pfizer BioNTech', 'niloy', 'niloy'),
(777914483, 0, '0000-00-00', '0000-00-00', '', 'Kiara', 'Kiara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`Agent_Email`),
  ADD UNIQUE KEY `Agent_Email` (`Agent_Email`),
  ADD UNIQUE KEY `NID` (`NID`),
  ADD KEY `Appointed_By` (`Appointed_By`);

--
-- Indexes for table `birth_certificate_table`
--
ALTER TABLE `birth_certificate_table`
  ADD PRIMARY KEY (`Birth_Certificate_No`),
  ADD KEY `Contains` (`Contains`);

--
-- Indexes for table `nid_table`
--
ALTER TABLE `nid_table`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `Contains` (`Contains`);

--
-- Indexes for table `passport_table`
--
ALTER TABLE `passport_table`
  ADD PRIMARY KEY (`Passport_No`),
  ADD KEY `Contains` (`Contains`);

--
-- Indexes for table `update_vaccine_info`
--
ALTER TABLE `update_vaccine_info`
  ADD PRIMARY KEY (`Agent_Email`,`Vaccine_card_no`),
  ADD UNIQUE KEY `Agent_Email` (`Agent_Email`),
  ADD UNIQUE KEY `Vaccine_card_no` (`Vaccine_card_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Unq_username`),
  ADD UNIQUE KEY `Unq_username` (`Unq_username`),
  ADD KEY `Has` (`Has`),
  ADD KEY `Managed_by` (`Managed_by`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`Vaccine_card_no`,`Unq_username`),
  ADD UNIQUE KEY `Vaccine_card_no` (`Vaccine_card_no`),
  ADD UNIQUE KEY `Unq_username` (`Unq_username`);

--
-- Indexes for table `vaccine_info`
--
ALTER TABLE `vaccine_info`
  ADD PRIMARY KEY (`Vaccine_card_no`),
  ADD UNIQUE KEY `Vaccine_card_no` (`Vaccine_card_no`),
  ADD UNIQUE KEY `Unq_username` (`Unq_username`),
  ADD UNIQUE KEY `Has` (`Has`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`Appointed_By`) REFERENCES `admin` (`Email`);

--
-- Constraints for table `birth_certificate_table`
--
ALTER TABLE `birth_certificate_table`
  ADD CONSTRAINT `birth_certificate_table_ibfk_1` FOREIGN KEY (`Contains`) REFERENCES `user` (`Unq_username`);

--
-- Constraints for table `nid_table`
--
ALTER TABLE `nid_table`
  ADD CONSTRAINT `nid_table_ibfk_1` FOREIGN KEY (`Contains`) REFERENCES `user` (`Unq_username`);

--
-- Constraints for table `passport_table`
--
ALTER TABLE `passport_table`
  ADD CONSTRAINT `passport_table_ibfk_1` FOREIGN KEY (`Contains`) REFERENCES `user` (`Unq_username`);

--
-- Constraints for table `update_vaccine_info`
--
ALTER TABLE `update_vaccine_info`
  ADD CONSTRAINT `update_vaccine_info_ibfk_1` FOREIGN KEY (`Agent_Email`) REFERENCES `agent` (`Agent_Email`),
  ADD CONSTRAINT `update_vaccine_info_ibfk_2` FOREIGN KEY (`Vaccine_card_no`) REFERENCES `vaccine_info` (`Vaccine_card_no`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Has`) REFERENCES `vaccine_info` (`Vaccine_card_no`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Managed_by`) REFERENCES `admin` (`Email`);

--
-- Constraints for table `user_location`
--
ALTER TABLE `user_location`
  ADD CONSTRAINT `user_location_ibfk_1` FOREIGN KEY (`Vaccine_card_no`) REFERENCES `vaccine_info` (`Vaccine_card_no`),
  ADD CONSTRAINT `user_location_ibfk_2` FOREIGN KEY (`Unq_username`) REFERENCES `vaccine_info` (`Has`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
