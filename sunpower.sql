-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 06:59 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunpower`
--

-- --------------------------------------------------------

--
-- Table structure for table `manholeplacing`
--

CREATE TABLE `manholeplacing` (
  `mhId` int(255) NOT NULL,
  `siteId` int(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `wId` int(255) NOT NULL,
  `date` date NOT NULL,
  `mhType` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `resource` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pipelaying`
--

CREATE TABLE `pipelaying` (
  `pipeId` int(255) NOT NULL,
  `siteId` int(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `wId` int(255) NOT NULL,
  `date` date NOT NULL,
  `pipeSerialNo` varchar(255) NOT NULL,
  `pipeType` varchar(255) NOT NULL,
  `pipeLength` int(255) NOT NULL,
  `startGL` int(255) NOT NULL,
  `startIL` int(255) NOT NULL,
  `EndGL` int(255) NOT NULL,
  `EndIL` int(11) NOT NULL,
  `bedType` varchar(255) NOT NULL,
  `backfillType` varchar(255) NOT NULL,
  `tempRainType` varchar(255) NOT NULL,
  `prmtReinstType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pipelaying`
--

INSERT INTO `pipelaying` (`pipeId`, `siteId`, `areaName`, `wId`, `date`, `pipeSerialNo`, `pipeType`, `pipeLength`, `startGL`, `startIL`, `EndGL`, `EndIL`, `bedType`, `backfillType`, `tempRainType`, `prmtReinstType`) VALUES
(1, 5, 'Kirulapone Project', 1, '2019-09-01', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(2, 5, 'Kirulapone Project', 2, '2019-09-02', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(3, 5, 'Kirulapone Project', 3, '2019-10-02', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(4, 5, 'Kirulapone Project', 4, '2019-10-15', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(5, 4, 'Kirulapone Project', 5, '2019-09-06', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(6, 4, 'Kirulapone Project', 6, '2019-09-07', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(7, 5, 'Kirulapone Project', 7, '2019-09-09', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(8, 5, 'Kirulapone Project', 8, '2019-10-08', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(9, 5, 'Kirulapone Project', 1, '2019-09-01', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(10, 4, 'Kirulapone Project', 2, '2019-09-01', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(11, 5, 'Kirulapone Project', 3, '2019-09-02', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(12, 5, 'Kirulapone Project', 4, '2019-09-03', '', '', 0, 0, 0, 0, 0, '', '', '', ''),
(13, 4, 'Kirulapone Project', 5, '2019-09-08', 'E11', '', 89, 15, 8, 78, 5, '', '', '', ''),
(14, 4, 'Kirulapone Project', 5, '2019-09-08', 'e12', '', 48, 56, 8, 48, 26, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `recordId` int(255) NOT NULL,
  `wId` int(255) NOT NULL,
  `date` date NOT NULL,
  `siteId` varchar(255) NOT NULL,
  `areaReference` varchar(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `roadReference` varchar(255) NOT NULL,
  `siteReference` varchar(255) NOT NULL,
  `pavingType` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `resource` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`recordId`, `wId`, `date`, `siteId`, `areaReference`, `areaName`, `roadReference`, `siteReference`, `pavingType`, `type`, `resource`, `qty`) VALUES
(1, 1, '2019-09-01', '5', 'i', 'Kirulapone Project', 'ux', 'u', 'uu', 'suppliedBySubContractor', 'ABC', 9),
(2, 1, '2019-09-01', '5', 'u', 'Kirulapone Project', 'u', 'i', 'uu', 'keyActivity', 'test4', 5),
(3, 1, '2019-09-01', '5', 'u', 'Kirulapone Project', 'u', 'u', 'uu', 'keyActivity', 'test5', 6),
(4, 2, '2019-09-01', '4', 'Area-01', 'Kirulapone Project', 'KL-02', 'k3-16', 'Asphalt Road', 'keyActivity', 'test4', 66),
(5, 2, '2019-09-01', '4', 'Area-01', 'Kirulapone Project', 'KL-02', 'k3-16', 'Asphalt Road', 'keyActivity', 'test5', 77),
(6, 3, '2019-09-02', '5', 'u', 'Kirulapone Project', 'o', 'u', 'uu', 'keyActivity', 'test4', 9),
(7, 3, '2019-09-02', '5', 'u', 'Kirulapone Project', 'u', 'u', 'uu', 'keyActivity', 'test5', 9),
(8, 4, '2019-09-03', '5', 'u', 'Kirulapone Project', 'u', 'u', 'uu', 'keyActivity', 'test5', 8);

-- --------------------------------------------------------

--
-- Table structure for table `resourcemaster`
--

CREATE TABLE `resourcemaster` (
  `rId` int(255) NOT NULL,
  `siteId` int(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `resource` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourcemaster`
--

INSERT INTO `resourcemaster` (`rId`, `siteId`, `areaName`, `type`, `resource`, `unit`) VALUES
(1, 1, 'maligawatta pumping staiton', 'staff', 'QA/QC Engineer', 'Nos'),
(2, 4, 'Kirulapone Project', 'suppliedBySubContractor', 'ABC', 'Nos'),
(3, 4, 'Kirulapone Project', 'keyActivity', 'test4', 'Nos'),
(4, 5, 'Kirulapone Project', 'machine', 'test', 'Nos'),
(5, 5, 'Kirulapone Project', 'specialTools&Equipment', 'test2', 'Nos'),
(8, 6, 'test', 'keyActivity', 'jn', 'Nos'),
(9, 14, 'Kirulapone Project', 'keyActivity', 'jnjn', 'Nos');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `siteId` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `areaReference` varchar(255) NOT NULL,
  `roadReference` varchar(255) NOT NULL,
  `siteReference` varchar(255) NOT NULL,
  `pavingType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`siteId`, `userId`, `areaName`, `location`, `areaReference`, `roadReference`, `siteReference`, `pavingType`) VALUES
(1, 8, 'maligawatta pumping staiton', 'maligawatta', 'no', 'no', 'no', 'no'),
(2, 0, 'pump', 'pump', '', '', '', ''),
(3, 0, 'test', 'test', 'test', 'test', 'test', 'test'),
(4, 8, 'Kirulapone Project', 'Kirulapone', 'Area-01', 'KL-02', 'k3-16', 'Asphalt Road'),
(5, 8, 'Kirulapone Project', 'test', 'u', 'u', 'u', 'uu'),
(6, 0, 'test', 'p', 'p', 'p', 'p', 'p'),
(7, 0, 't4', 't3', 't4', 't5', '', ''),
(8, 0, 't4', 'yugyuu', 'ug', 'ugu', 'gug', 'ug'),
(9, 0, 'Kirulapone Project', 'gy', 'hu', 'j', 'lkn', 'on'),
(10, 0, 'Kirulapone Project', 'kjnkj', 'kjn', 'kj ', 'kn ', ' kjnj'),
(11, 0, 'Kirulapone Project', 'kjnkj', 'kjn', 'kj ', 'kn ', ' kjnj'),
(12, 0, 'Kirulapone Project', 'billa', 'bila', 'b\\innv', 'jo', 'tham'),
(13, 8, 'Kirulapone Project', 'billa2', 'knjnjo', 'jn', 'jn', 'j'),
(14, 8, 'Kirulapone Project', '', 'billakj', 'kjn', 'ijn', 'ij'),
(15, 0, 'Kirulapone Project', 'jkjjn', 'njkn', 'n ', '', ''),
(16, 0, 'Kirulapone Project', 'test4', 'test4', 'test4', 'test4', 'test4'),
(17, 0, 'p4', 'p4', 'p4', 'p4', 'p4', 'p4'),
(18, 0, 'p4', 'p4', 'p4', 'p4', 'p4', 'p4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `status`, `areaName`, `userName`, `email`, `password`) VALUES
(1, 'root', '', 'root', 'root@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785'),
(8, 'user', '', 'user', 'user@gmail.com', '12dea96fec20593566ab75692c9949596833adc9');

-- --------------------------------------------------------

--
-- Table structure for table `workactivities`
--

CREATE TABLE `workactivities` (
  `WA` int(255) NOT NULL,
  `date` date NOT NULL,
  `BillingItemNo` varchar(255) NOT NULL,
  `DescriptionOfWork` varchar(255) NOT NULL,
  `Remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workingcondition`
--

CREATE TABLE `workingcondition` (
  `wId` int(255) NOT NULL,
  `siteId` int(255) NOT NULL,
  `areaName` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `TimeFrom` time NOT NULL,
  `TimeTo` time NOT NULL,
  `rainFall` varchar(255) NOT NULL,
  `Temp` varchar(255) NOT NULL,
  `Traffic` varchar(255) NOT NULL,
  `Humidity` varchar(255) NOT NULL,
  `PublicObligation` varchar(255) NOT NULL,
  `Legend` varchar(255) NOT NULL,
  `groundCondition` varchar(255) NOT NULL,
  `waterTable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workingcondition`
--

INSERT INTO `workingcondition` (`wId`, `siteId`, `areaName`, `Date`, `TimeFrom`, `TimeTo`, `rainFall`, `Temp`, `Traffic`, `Humidity`, `PublicObligation`, `Legend`, `groundCondition`, `waterTable`) VALUES
(1, 5, 'Kirulapone Project', '2019-09-01', '00:00:00', '00:00:00', 'Yes', '', '', '', '', '', 'Rocky', ''),
(2, 4, 'Kirulapone Project', '2019-09-01', '00:00:00', '00:00:00', 'Yes', '', '', '', '', '', 'Rocky', ''),
(3, 5, 'Kirulapone Project', '2019-09-02', '00:00:00', '00:00:00', 'Yes', '', '', '', '', '', 'Rocky', ''),
(4, 5, 'Kirulapone Project', '2019-09-03', '00:00:00', '00:00:00', 'Yes', '', '', '', '', '', 'Rocky', ''),
(5, 4, 'Kirulapone Project', '2019-09-08', '00:00:00', '00:00:00', 'Yes', '', '', '', '', '', 'Rocky', '');

-- --------------------------------------------------------

--
-- Table structure for table `workingprogressvalue`
--

CREATE TABLE `workingprogressvalue` (
  `wpvId` int(255) NOT NULL,
  `keyActivities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manholeplacing`
--
ALTER TABLE `manholeplacing`
  ADD PRIMARY KEY (`mhId`);

--
-- Indexes for table `pipelaying`
--
ALTER TABLE `pipelaying`
  ADD PRIMARY KEY (`pipeId`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`recordId`);

--
-- Indexes for table `resourcemaster`
--
ALTER TABLE `resourcemaster`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`siteId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `workactivities`
--
ALTER TABLE `workactivities`
  ADD PRIMARY KEY (`WA`);

--
-- Indexes for table `workingcondition`
--
ALTER TABLE `workingcondition`
  ADD PRIMARY KEY (`wId`);

--
-- Indexes for table `workingprogressvalue`
--
ALTER TABLE `workingprogressvalue`
  ADD PRIMARY KEY (`wpvId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manholeplacing`
--
ALTER TABLE `manholeplacing`
  MODIFY `mhId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pipelaying`
--
ALTER TABLE `pipelaying`
  MODIFY `pipeId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `recordId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resourcemaster`
--
ALTER TABLE `resourcemaster`
  MODIFY `rId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `siteId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workactivities`
--
ALTER TABLE `workactivities`
  MODIFY `WA` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workingcondition`
--
ALTER TABLE `workingcondition`
  MODIFY `wId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workingprogressvalue`
--
ALTER TABLE `workingprogressvalue`
  MODIFY `wpvId` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
