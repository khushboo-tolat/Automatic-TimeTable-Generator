-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 01:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `c_username` varchar(20) NOT NULL,
  `c_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`c_username`, `c_password`) VALUES
('asim_banerjee', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `c_classroomid` varchar(10) NOT NULL,
  `i_classcapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`c_classroomid`, `i_classcapacity`) VALUES
('CEP103', 110),
('CEP104', 48),
('CEP105', 48),
('CEP106', 120),
('CEP107', 36),
('CEP108', 120),
('CEP110', 182),
('CEP202', 80),
('CEP203', 80),
('CEP207', 120),
('CEP209', 120),
('CEP210', 30),
('CEP211', 40),
('CEP212', 40),
('LT1', 300),
('LT2', 300),
('LT3', 300);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_courseid` varchar(10) NOT NULL,
  `c_coursename` varchar(100) NOT NULL,
  `i_coursecredit` int(11) NOT NULL,
  `i_programid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_courseid`, `c_coursename`, `i_coursecredit`, `i_programid`) VALUES
('CS201', 'Introductory Computational Physics', 3, 5),
('CS301', 'High Performance Computing', 3, 1),
('CS302', 'Modeling and Simulation\r\n', 3, 1),
('CS306', 'Data Analysis and Visualization\r\n', 3, 1),
('CS401', 'Computational Finance\r\n\r\n', 3, 1),
('CT111', 'Introduction to Communication Systems\r\n', 3, 1),
('CT215', 'Analog communication and Transmission Line Theory\r\n', 3, 5),
('CT321', 'Digital Signal Processing\r\n', 3, 6),
('CT474', 'Satelitte Communication\r\n', 3, 6),
('CT478', 'Speech Technology\r\n', 3, 3),
('CT533', 'Wireless system designn', 3, 3),
('EL114', 'Digital Logic Design\r\n', 3, 1),
('EL213', 'Analog Circuits\r\n', 3, 5),
('EL321', 'CMOS Digital Design\r\n', 3, 6),
('EL454', 'CAD of VLSI\r\n', 3, 6),
('HM106', 'Approaches to Indian Society\r\n', 3, 1),
('HM320', 'Indian cities in literature\r\n', 3, 6),
('HM327', 'Culture, Politics, Identity \r\n', 3, 6),
('HM432', 'Organisational Behaviour\r\n', 3, 6),
('HM663', 'Systems, Policies and Implications\r\n', 3, 6),
('IT205', 'Data Structures\r\n', 3, 1),
('IT206', 'Data Structures LAB\r\n', 0, 1),
('IT215', 'Systems Software\r\n', 3, 5),
('IT308', 'Operating System\r\n', 3, 6),
('IT314', 'Software Engineering\r\n', 3, 6),
('IT422', 'Models of Computation \r\n', 3, 6),
('IT424', 'Logic for Computer Science\r\n', 3, 6),
('IT441', 'Computer Graphics\r\n', 3, 6),
('IT542', 'Pattern Recognition and Machine Learning', 3, 3),
('IT602', 'OOP', 3, 2),
('IT628', 'SP', 3, 2),
('IT629', 'WP', 3, 2),
('IT632', 'SE', 3, 2),
('IT694', 'CN', 3, 2),
('SC205', 'Discrete Mathematics\r\n', 3, 1),
('SC209', 'Environmental Studies\r\n', 2, 5),
('SC221', 'Engineered Materials\r\n', 3, 5),
('SC222', 'Probability Statistics and Information Theory\r\n', 3, 5),
('SC332', 'Introduction to Quantum Mechanics\r\n', 3, 6),
('SC482', 'Approximation Algorithm\r\n', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `course_faculty`
--

CREATE TABLE `course_faculty` (
  `c_courseid` varchar(10) NOT NULL,
  `c_facultyid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_faculty`
--

INSERT INTO `course_faculty` (`c_courseid`, `c_facultyid`) VALUES
('CS201', 'AR'),
('CS301', 'BC'),
('CS302', 'MT'),
('CS306', 'PK'),
('CS401', 'JM'),
('CT111', 'YV'),
('CT215', 'DKG'),
('CT321', 'HP'),
('CT474', 'DKG'),
('CT478', 'HP'),
('CT533', 'SG'),
('EL114', 'YA'),
('EL213', 'RP'),
('EL321', 'RP'),
('EL454', 'YA'),
('HM106', 'BK'),
('HM320', 'AM'),
('HM327', 'MM'),
('HM663', 'AP'),
('IT205', 'RM'),
('IT206', 'BG'),
('IT215', 'JP'),
('IT308', 'AMM'),
('IT314', 'ST'),
('IT422', 'PB'),
('IT424', 'MKR'),
('IT441', 'NDJ'),
('IT542', 'SKM'),
('IT602', 'LS'),
('IT628', 'AKM'),
('IT629', 'LS'),
('IT632', 'AB'),
('IT694', 'PKS'),
('SC205', 'MKG'),
('SC209', 'RG'),
('SC221', 'AKR'),
('SC222', 'GG'),
('SC332', 'GD'),
('SC482', 'RM');

-- --------------------------------------------------------

--
-- Table structure for table `course_lab`
--

CREATE TABLE `course_lab` (
  `c_courseid` varchar(10) NOT NULL,
  `i_labid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `i_dayid` int(11) NOT NULL,
  `c_day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`i_dayid`, `c_day`) VALUES
(1, 'monday'),
(2, 'tuesday'),
(3, 'wednesday'),
(4, 'thursday'),
(5, 'friday');

-- --------------------------------------------------------

--
-- Table structure for table `day_time_classroom`
--

CREATE TABLE `day_time_classroom` (
  `i_dayid` int(11) NOT NULL,
  `i_timeid` int(11) NOT NULL,
  `c_classroomid` varchar(10) NOT NULL,
  `c_courseid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_time_classroom`
--

INSERT INTO `day_time_classroom` (`i_dayid`, `i_timeid`, `c_classroomid`, `c_courseid`) VALUES
(1, 4, 'LT1', 'CT111'),
(2, 5, 'LT1', 'CT111'),
(3, 2, 'LT1', 'CT111'),
(1, 4, 'LT2', 'CT215'),
(2, 5, 'LT2', 'CT215'),
(3, 2, 'LT2', 'CT215'),
(1, 4, 'CEP105', 'CT321'),
(2, 5, 'CEP105', 'CT321'),
(3, 2, 'CEP105', 'CT321'),
(1, 5, 'LT3', 'CT474'),
(2, 3, 'LT3', 'CT474'),
(4, 5, 'LT3', 'CT474'),
(1, 2, 'CEP104', 'CT478'),
(1, 5, 'CEP104', 'CT478'),
(2, 3, 'CEP104', 'CT478'),
(4, 3, 'CEP104', 'CT478'),
(4, 5, 'CEP104', 'CT478'),
(5, 3, 'CEP104', 'CT478'),
(1, 2, 'CEP105', 'CT533'),
(4, 3, 'CEP105', 'CT533'),
(5, 3, 'CEP105', 'CT533'),
(1, 2, 'LT1', 'EL114'),
(4, 3, 'LT1', 'EL114'),
(5, 3, 'LT1', 'EL114'),
(1, 2, 'LT2', 'EL213'),
(4, 3, 'LT2', 'EL213'),
(5, 3, 'LT2', 'EL213'),
(1, 5, 'CEP108', 'EL321'),
(2, 3, 'CEP108', 'EL321'),
(4, 5, 'CEP108', 'EL321'),
(1, 5, 'CEP105', 'EL454'),
(2, 3, 'CEP105', 'EL454'),
(4, 5, 'CEP105', 'EL454'),
(1, 5, 'LT1', 'HM106'),
(2, 3, 'LT1', 'HM106'),
(4, 5, 'LT1', 'HM106'),
(2, 4, 'LT1', 'IT205'),
(3, 1, 'LT1', 'IT205'),
(5, 2, 'LT1', 'IT205'),
(1, 5, 'LT2', 'IT215'),
(2, 3, 'LT2', 'IT215'),
(4, 5, 'LT2', 'IT215'),
(1, 4, 'LT3', 'IT314'),
(2, 5, 'LT3', 'IT314'),
(3, 2, 'LT3', 'IT314'),
(1, 4, 'CEP104', 'IT542'),
(2, 5, 'CEP104', 'IT542'),
(3, 2, 'CEP104', 'IT542'),
(1, 2, 'CEP207', 'IT602'),
(4, 3, 'CEP207', 'IT602'),
(5, 3, 'CEP207', 'IT602'),
(2, 4, 'CEP207', 'IT628'),
(3, 1, 'CEP207', 'IT628'),
(5, 2, 'CEP207', 'IT628'),
(1, 1, 'CEP207', 'IT629'),
(2, 1, 'CEP207', 'IT629'),
(5, 5, 'CEP207', 'IT629'),
(1, 5, 'CEP207', 'IT632'),
(2, 3, 'CEP207', 'IT632'),
(4, 5, 'CEP207', 'IT632'),
(1, 4, 'CEP207', 'IT694'),
(2, 5, 'CEP207', 'IT694'),
(3, 2, 'CEP207', 'IT694'),
(1, 1, 'LT1', 'SC205'),
(2, 1, 'LT1', 'SC205'),
(5, 5, 'LT1', 'SC205'),
(3, 1, 'LT2', 'SC209'),
(5, 2, 'LT2', 'SC209'),
(1, 1, 'LT2', 'SC221'),
(2, 1, 'LT2', 'SC221'),
(5, 5, 'LT2', 'SC221');

-- --------------------------------------------------------

--
-- Table structure for table `day_time_course`
--

CREATE TABLE `day_time_course` (
  `i_dayid` int(11) NOT NULL,
  `i_timeid` int(11) NOT NULL,
  `c_courseid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_time_course`
--

INSERT INTO `day_time_course` (`i_dayid`, `i_timeid`, `c_courseid`) VALUES
(1, 1, 'IT629'),
(1, 1, 'SC205'),
(1, 1, 'SC221'),
(1, 2, 'CT478'),
(1, 2, 'CT533'),
(1, 2, 'EL114'),
(1, 2, 'EL213'),
(1, 2, 'IT602'),
(1, 4, 'CT111'),
(1, 4, 'CT215'),
(1, 4, 'CT321'),
(1, 4, 'IT314'),
(1, 4, 'IT542'),
(1, 4, 'IT694'),
(1, 5, 'CT474'),
(1, 5, 'CT478'),
(1, 5, 'EL321'),
(1, 5, 'EL454'),
(1, 5, 'HM106'),
(1, 5, 'IT215'),
(1, 5, 'IT632'),
(2, 1, 'IT629'),
(2, 1, 'SC205'),
(2, 1, 'SC221'),
(2, 3, 'CT474'),
(2, 3, 'CT478'),
(2, 3, 'EL321'),
(2, 3, 'EL454'),
(2, 3, 'HM106'),
(2, 3, 'IT215'),
(2, 3, 'IT632'),
(2, 4, 'IT205'),
(2, 4, 'IT628'),
(2, 5, 'CT111'),
(2, 5, 'CT215'),
(2, 5, 'CT321'),
(2, 5, 'IT314'),
(2, 5, 'IT542'),
(2, 5, 'IT694'),
(3, 1, 'IT205'),
(3, 1, 'IT628'),
(3, 1, 'SC209'),
(3, 2, 'CT111'),
(3, 2, 'CT215'),
(3, 2, 'CT321'),
(3, 2, 'IT314'),
(3, 2, 'IT542'),
(3, 2, 'IT694'),
(4, 3, 'CT478'),
(4, 3, 'CT533'),
(4, 3, 'EL114'),
(4, 3, 'EL213'),
(4, 3, 'IT602'),
(4, 5, 'CT474'),
(4, 5, 'CT478'),
(4, 5, 'EL321'),
(4, 5, 'EL454'),
(4, 5, 'HM106'),
(4, 5, 'IT215'),
(4, 5, 'IT632'),
(5, 2, 'IT205'),
(5, 2, 'IT628'),
(5, 2, 'SC209'),
(5, 3, 'CT478'),
(5, 3, 'CT533'),
(5, 3, 'EL114'),
(5, 3, 'EL213'),
(5, 3, 'IT602'),
(5, 5, 'IT629'),
(5, 5, 'SC205'),
(5, 5, 'SC221');

-- --------------------------------------------------------

--
-- Table structure for table `day_time_lab`
--

CREATE TABLE `day_time_lab` (
  `i_dayid` int(11) NOT NULL,
  `i_timeid` int(11) NOT NULL,
  `i_labid` int(11) NOT NULL,
  `b_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `c_facultyid` varchar(10) NOT NULL,
  `c_facultyname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`c_facultyid`, `c_facultyname`) VALUES
('AB', 'Asim Banerjee'),
('AG', 'A Ghosh'),
('AKM', 'Amit Mankodi'),
('AKR', 'A K Roy'),
('AM', 'Anish Mathuriya'),
('AMM', 'Amisha Modi'),
('AP', 'A Parikh'),
('AR', 'A Ray'),
('ARB', 'A R Bhatt'),
('AT', 'A Tatu'),
('BC', 'Bhaskar Chaudhury'),
('BD', 'B Desai'),
('BG', 'Bakul Gohel'),
('BK', 'Bharani Kollipara'),
('BM', 'Biswajit Mishra'),
('DKG', 'DK Ghodgaonkar'),
('DNC', 'D Nag Chaudhury'),
('GD', 'G Dutta'),
('GG', 'Gagan Garg'),
('HP', 'H Patil'),
('JM', 'Jaydeep Mulherkar'),
('JP', 'Jay Prakash'),
('LS', 'Lavneet Singh'),
('MB', 'M Bhise'),
('MK', 'Manish Khare'),
('MKG', 'MK Gupta'),
('MKR', 'MK Raut'),
('MLD', 'ML Das'),
('MM', 'M Mazumdar'),
('MT', 'M. Tiwari'),
('MVJ', 'MV Joshi'),
('NDJ', 'Naresh D Jotwani'),
('NKS', 'N K Sahu'),
('PB', 'Puneet Bhateja'),
('PK', 'Pankaj Kumar'),
('PKS', 'P S Kalyan Sasidhar'),
('PM', 'P Majumder'),
('PMJ', 'PM Jat'),
('RG', 'R Ghosh'),
('RLD', 'R L Das'),
('RM', 'Rahul Muthu'),
('RP', 'Rutu Parekh'),
('SG', 'S Gupta'),
('SKM', 'SK Mitra'),
('SM', 'Srimanta Mandal'),
('SRG', 'Shweta R Garg'),
('SS', 'S Srivastava'),
('ST', 'S Tiwari'),
('VP', 'V Pandya'),
('VS', 'V Sunitha'),
('YA', 'Y Agrawal'),
('YV', 'Y Vasavada');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `i_labid` int(11) NOT NULL,
  `i_labcapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `i_programid` int(11) NOT NULL,
  `c_programname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`i_programid`, `c_programname`) VALUES
(1, 'B. Tech(1st)'),
(2, 'M.Sc.IT(1st)'),
(3, 'M.TECH(1st)'),
(5, 'B. Tech(2nd)'),
(6, 'B.Tech(3rd)'),
(7, 'M.Sc.IT(2nd)'),
(8, 'B.Tech(4th)'),
(9, 'M.TECH(2nd)');

-- --------------------------------------------------------

--
-- Table structure for table `program_classroom`
--

CREATE TABLE `program_classroom` (
  `i_pcid` int(11) NOT NULL,
  `i_programid` int(11) NOT NULL,
  `c_classroomid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_classroom`
--

INSERT INTO `program_classroom` (`i_pcid`, `i_programid`, `c_classroomid`) VALUES
(1, 1, 'LT1'),
(2, 1, 'LT2'),
(3, 1, 'LT3'),
(4, 2, 'CEP207'),
(5, 2, 'CEP110'),
(6, 7, 'CEP209'),
(7, 5, 'LT1'),
(8, 5, 'LT2'),
(9, 5, 'LT3'),
(10, 6, 'LT1'),
(11, 6, 'LT2'),
(12, 6, 'LT3'),
(13, 6, 'CEP105'),
(14, 6, 'CEP108'),
(15, 6, 'CEP103'),
(16, 6, 'CEP104'),
(17, 6, 'CEP107'),
(18, 6, 'CEP106'),
(19, 6, 'CEP110'),
(20, 6, 'CEP202'),
(21, 3, 'CEP104'),
(22, 3, 'CEP105'),
(23, 3, 'CEP106'),
(24, 3, 'CEP107'),
(25, 3, 'CEP108'),
(26, 3, 'CEP103'),
(27, 3, 'CEP202'),
(28, 3, 'CEP203'),
(29, 3, 'LT1');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `i_slotid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slot_course`
--

CREATE TABLE `slot_course` (
  `i_slotid` int(11) NOT NULL,
  `c_courseid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot_course`
--

INSERT INTO `slot_course` (`i_slotid`, `c_courseid`) VALUES
(1, 'CT111'),
(1, 'CT215'),
(1, 'CT321'),
(1, 'IT314'),
(1, 'IT542'),
(1, 'IT694'),
(2, 'CT478'),
(2, 'CT533'),
(2, 'EL114'),
(2, 'EL213'),
(2, 'IT602'),
(3, 'CT474'),
(3, 'CT478'),
(3, 'EL321'),
(3, 'EL454'),
(3, 'HM106'),
(3, 'IT215'),
(3, 'IT632'),
(4, 'IT205'),
(4, 'IT628'),
(4, 'SC209'),
(5, 'IT629'),
(5, 'SC205'),
(5, 'SC221');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `i_timeid` int(11) NOT NULL,
  `i_timeslot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`i_timeid`, `i_timeslot`) VALUES
(1, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(6, 2),
(7, 3),
(8, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`c_username`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`c_classroomid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_courseid`),
  ADD KEY `i_programid` (`i_programid`);

--
-- Indexes for table `course_faculty`
--
ALTER TABLE `course_faculty`
  ADD PRIMARY KEY (`c_courseid`,`c_facultyid`),
  ADD KEY `c_courseid` (`c_courseid`),
  ADD KEY `c_facultyid` (`c_facultyid`);

--
-- Indexes for table `course_lab`
--
ALTER TABLE `course_lab`
  ADD PRIMARY KEY (`c_courseid`,`i_labid`),
  ADD KEY `c_courseid` (`c_courseid`),
  ADD KEY `i_labid` (`i_labid`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`i_dayid`);

--
-- Indexes for table `day_time_classroom`
--
ALTER TABLE `day_time_classroom`
  ADD PRIMARY KEY (`i_dayid`,`i_timeid`,`c_classroomid`),
  ADD KEY `i_dayid` (`i_dayid`),
  ADD KEY `i_timeid` (`i_timeid`),
  ADD KEY `c_classroomid` (`c_classroomid`),
  ADD KEY `c_courseid` (`c_courseid`);

--
-- Indexes for table `day_time_course`
--
ALTER TABLE `day_time_course`
  ADD PRIMARY KEY (`i_dayid`,`i_timeid`,`c_courseid`),
  ADD KEY `i_dayid` (`i_dayid`),
  ADD KEY `i_timeid` (`i_timeid`),
  ADD KEY `c_courseid` (`c_courseid`);

--
-- Indexes for table `day_time_lab`
--
ALTER TABLE `day_time_lab`
  ADD PRIMARY KEY (`i_dayid`,`i_timeid`,`i_labid`),
  ADD KEY `i_dayid` (`i_dayid`),
  ADD KEY `i_timeid` (`i_timeid`),
  ADD KEY `i_labid` (`i_labid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`c_facultyid`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`i_labid`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`i_programid`);

--
-- Indexes for table `program_classroom`
--
ALTER TABLE `program_classroom`
  ADD PRIMARY KEY (`i_pcid`),
  ADD KEY `i_programid` (`i_programid`),
  ADD KEY `c_classroomid` (`c_classroomid`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`i_slotid`);

--
-- Indexes for table `slot_course`
--
ALTER TABLE `slot_course`
  ADD PRIMARY KEY (`i_slotid`,`c_courseid`),
  ADD KEY `c_courseid` (`c_courseid`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`i_timeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `i_programid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `program_classroom`
--
ALTER TABLE `program_classroom`
  MODIFY `i_pcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`i_programid`) REFERENCES `program` (`i_programid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_faculty`
--
ALTER TABLE `course_faculty`
  ADD CONSTRAINT `course_faculty_ibfk_1` FOREIGN KEY (`c_courseid`) REFERENCES `course` (`c_courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_faculty_ibfk_2` FOREIGN KEY (`c_facultyid`) REFERENCES `faculty` (`c_facultyid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_lab`
--
ALTER TABLE `course_lab`
  ADD CONSTRAINT `course_lab_ibfk_1` FOREIGN KEY (`c_courseid`) REFERENCES `course` (`c_courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_lab_ibfk_2` FOREIGN KEY (`i_labid`) REFERENCES `lab` (`i_labid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `day_time_classroom`
--
ALTER TABLE `day_time_classroom`
  ADD CONSTRAINT `day_time_classroom_ibfk_1` FOREIGN KEY (`i_dayid`) REFERENCES `day` (`i_dayid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_classroom_ibfk_2` FOREIGN KEY (`i_timeid`) REFERENCES `timeslot` (`i_timeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_classroom_ibfk_3` FOREIGN KEY (`c_classroomid`) REFERENCES `classroom` (`c_classroomid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_classroom_ibfk_4` FOREIGN KEY (`c_courseid`) REFERENCES `course` (`c_courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `day_time_course`
--
ALTER TABLE `day_time_course`
  ADD CONSTRAINT `day_time_course_ibfk_1` FOREIGN KEY (`i_dayid`) REFERENCES `day` (`i_dayid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_course_ibfk_2` FOREIGN KEY (`i_timeid`) REFERENCES `timeslot` (`i_timeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_course_ibfk_3` FOREIGN KEY (`c_courseid`) REFERENCES `course` (`c_courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `day_time_lab`
--
ALTER TABLE `day_time_lab`
  ADD CONSTRAINT `day_time_lab_ibfk_1` FOREIGN KEY (`i_dayid`) REFERENCES `day` (`i_dayid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_lab_ibfk_2` FOREIGN KEY (`i_timeid`) REFERENCES `timeslot` (`i_timeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `day_time_lab_ibfk_3` FOREIGN KEY (`i_labid`) REFERENCES `lab` (`i_labid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_classroom`
--
ALTER TABLE `program_classroom`
  ADD CONSTRAINT `program_classroom_ibfk_1` FOREIGN KEY (`i_programid`) REFERENCES `program` (`i_programid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_classroom_ibfk_2` FOREIGN KEY (`c_classroomid`) REFERENCES `classroom` (`c_classroomid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slot_course`
--
ALTER TABLE `slot_course`
  ADD CONSTRAINT `slot_course_ibfk_1` FOREIGN KEY (`c_courseid`) REFERENCES `course` (`c_courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
