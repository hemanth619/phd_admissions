-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2014 at 08:37 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`, `id`, `name`) VALUES
('12345', 0, ''),
('12345', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `user_ex` varchar(50) NOT NULL,
  `org_1` varchar(50) DEFAULT NULL,
  `des_1` varchar(30) DEFAULT NULL,
  `per_1` varchar(10) DEFAULT NULL,
  `work_1` varchar(20) DEFAULT NULL,
  `org_2` varchar(50) DEFAULT NULL,
  `des_2` varchar(30) DEFAULT NULL,
  `per_2` varchar(10) DEFAULT NULL,
  `work_2` varchar(20) DEFAULT NULL,
  `org_3` varchar(50) DEFAULT NULL,
  `des_3` varchar(30) DEFAULT NULL,
  `per_3` varchar(10) DEFAULT NULL,
  `work_3` varchar(20) DEFAULT NULL,
  `org_4` varchar(50) DEFAULT NULL,
  `des_4` varchar(30) DEFAULT NULL,
  `per_4` varchar(10) DEFAULT NULL,
  `work_4` varchar(20) DEFAULT NULL,
  `org_5` varchar(50) DEFAULT NULL,
  `des_5` varchar(30) DEFAULT NULL,
  `per_5` varchar(10) DEFAULT NULL,
  `work_5` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_ex`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`user_ex`, `org_1`, `des_1`, `per_1`, `work_1`, `org_2`, `des_2`, `per_2`, `work_2`, `org_3`, `des_3`, `per_3`, `work_3`, `org_4`, `des_4`, `per_4`, `work_4`, `org_5`, `des_5`, `per_5`, `work_5`) VALUES
('varunjammula', 'Bally Technologies', 'Internship', '2 months', 'UX Team', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fgusers3`
--

CREATE TABLE IF NOT EXISTS `fgusers3` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  `discipline` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fgusers3`
--

INSERT INTO `fgusers3` (`id_user`, `email`, `phone_number`, `username`, `password`, `name`, `confirmcode`, `discipline`, `mode`) VALUES
(1, 'varunjammula@gmail.com', '', 'varunjammula', '4908ecea8e236c8a45583d8a6b80e217', 'Varun Chandra Jammula', 'y', 'coe', 'httra');

-- --------------------------------------------------------

--
-- Stand-in structure for view `list`
--
CREATE TABLE IF NOT EXISTS `list` (
`id` int(11)
,`name` varchar(50)
,`email` varchar(50)
,`password` varchar(50)
,`discipline` varchar(50)
,`mode` varchar(50)
,`user_name` varchar(20)
,`App_no` varchar(10)
,`Full_Name` varchar(50)
,`gender` varchar(6)
,`dob` date
,`fname` varchar(50)
,`Nationality` varchar(20)
,`Marital_status` varchar(50)
,`Physically_challenged` varchar(50)
,`community` varchar(50)
,`Minority` varchar(50)
,`pemail` varchar(50)
,`aemail` varchar(50)
,`Temp_Address` varchar(250)
,`T_District` varchar(50)
,`T_state` varchar(50)
,`T_pincode` int(11)
,`T_phone_number` varchar(50)
,`T_mobile_number` varchar(50)
,`perm_Address` varchar(250)
,`P_District` varchar(50)
,`P_state` varchar(50)
,`P_pincode` int(11)
,`P_phone_number` varchar(50)
,`P_mobile_number` varchar(50)
,`user_key` varchar(50)
,`10_univ` varchar(100)
,`10_degree` varchar(100)
,`10_marks` float
,`10_grade` varchar(50)
,`10_year` int(11)
,`12_univ` varchar(100)
,`12_degree` varchar(100)
,`12_marks` float
,`12_grade` varchar(50)
,`12_year` int(11)
,`bd_univ` varchar(100)
,`bd_degree` varchar(100)
,`bd_marks` float
,`bd_grade` varchar(50)
,`bd_year` int(11)
,`pg_univ` varchar(100)
,`pg_degree` varchar(100)
,`pg_marks` float
,`pg_grade` varchar(50)
,`pg_year` int(11)
,`o_univ` varchar(100)
,`o_degree` varchar(100)
,`o_marks` float
,`o_grade` varchar(50)
,`o_year` int(11)
,`bd_1` float
,`bd_2` float
,`bd_3` float
,`bd_4` float
,`bd_5` float
,`bd_6` float
,`bd_7` float
,`bd_8` float
,`bd_9` float
,`bd_10` float
,`bd_agr` float
,`bd_class` varchar(10)
,`md_1` float
,`md_2` float
,`md_3` float
,`md_4` float
,`md_agr` float
,`md_class` varchar(10)
,`user_ex` varchar(50)
,`org_1` varchar(50)
,`des_1` varchar(30)
,`per_1` varchar(10)
,`work_1` varchar(20)
,`org_2` varchar(50)
,`des_2` varchar(30)
,`per_2` varchar(10)
,`work_2` varchar(20)
,`org_3` varchar(50)
,`des_3` varchar(30)
,`per_3` varchar(10)
,`work_3` varchar(20)
,`org_4` varchar(50)
,`des_4` varchar(30)
,`per_4` varchar(10)
,`work_4` varchar(20)
,`org_5` varchar(50)
,`des_5` varchar(30)
,`per_5` varchar(10)
,`work_5` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE IF NOT EXISTS `personal_info` (
  `user_name` varchar(20) NOT NULL,
  `App_no` varchar(10) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `fname` varchar(50) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Marital_status` varchar(50) NOT NULL,
  `Physically_challenged` varchar(50) NOT NULL,
  `community` varchar(50) NOT NULL,
  `Minority` varchar(50) NOT NULL,
  `pemail` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `Temp_Address` varchar(250) NOT NULL,
  `T_District` varchar(50) NOT NULL,
  `T_state` varchar(50) NOT NULL,
  `T_pincode` int(11) NOT NULL,
  `T_phone_number` varchar(50) NOT NULL,
  `T_mobile_number` varchar(50) NOT NULL,
  `perm_Address` varchar(250) NOT NULL,
  `P_District` varchar(50) NOT NULL,
  `P_state` varchar(50) NOT NULL,
  `P_pincode` int(11) NOT NULL,
  `P_phone_number` varchar(50) NOT NULL,
  `P_mobile_number` varchar(50) NOT NULL,
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`user_name`, `App_no`, `Full_Name`, `gender`, `dob`, `fname`, `Nationality`, `Marital_status`, `Physically_challenged`, `community`, `Minority`, `pemail`, `aemail`, `Temp_Address`, `T_District`, `T_state`, `T_pincode`, `T_phone_number`, `T_mobile_number`, `perm_Address`, `P_District`, `P_state`, `P_pincode`, `P_phone_number`, `P_mobile_number`) VALUES
('varunjammula', 'DM14D001', 'Varun Chandra Jammula', 'Male', '1970-01-01', 'Madhava Rao Jammula', 'Indian', 'Unmarried', 'No', 'General', 'No', 'varunjammula@gmail.com', 'coe10b019@iiitdm.ac.in', 'Jubilee Hills', 'HYDERABAD', '2', 500033, '', '7299417906', 'Jubilee Hills', 'HYDERABAD', '2', 500033, '', '7299417906');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE IF NOT EXISTS `qualifications` (
  `user_key` varchar(50) NOT NULL,
  `10_univ` varchar(100) NOT NULL,
  `10_degree` varchar(100) NOT NULL,
  `10_marks` float NOT NULL,
  `10_grade` varchar(50) NOT NULL,
  `10_year` int(11) NOT NULL,
  `12_univ` varchar(100) NOT NULL,
  `12_degree` varchar(100) NOT NULL,
  `12_marks` float NOT NULL,
  `12_grade` varchar(50) NOT NULL,
  `12_year` int(11) NOT NULL,
  `bd_univ` varchar(100) NOT NULL,
  `bd_degree` varchar(100) NOT NULL,
  `bd_marks` float NOT NULL,
  `bd_grade` varchar(50) NOT NULL,
  `bd_year` int(11) NOT NULL,
  `pg_univ` varchar(100) NOT NULL,
  `pg_degree` varchar(100) NOT NULL,
  `pg_marks` float NOT NULL,
  `pg_grade` varchar(50) NOT NULL,
  `pg_year` int(11) NOT NULL,
  `o_univ` varchar(100) NOT NULL,
  `o_degree` varchar(100) NOT NULL,
  `o_marks` float NOT NULL,
  `o_grade` varchar(50) NOT NULL,
  `o_year` int(11) NOT NULL,
  `bd_1` float NOT NULL,
  `bd_2` float NOT NULL,
  `bd_3` float NOT NULL,
  `bd_4` float NOT NULL,
  `bd_5` float NOT NULL,
  `bd_6` float NOT NULL,
  `bd_7` float NOT NULL,
  `bd_8` float NOT NULL,
  `bd_9` float DEFAULT NULL,
  `bd_10` float DEFAULT NULL,
  `bd_agr` float NOT NULL,
  `bd_class` varchar(10) NOT NULL,
  `md_1` float NOT NULL,
  `md_2` float NOT NULL,
  `md_3` float NOT NULL,
  `md_4` float NOT NULL,
  `md_agr` float NOT NULL,
  `md_class` varchar(10) NOT NULL,
  PRIMARY KEY (`user_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`user_key`, `10_univ`, `10_degree`, `10_marks`, `10_grade`, `10_year`, `12_univ`, `12_degree`, `12_marks`, `12_grade`, `12_year`, `bd_univ`, `bd_degree`, `bd_marks`, `bd_grade`, `bd_year`, `pg_univ`, `pg_degree`, `pg_marks`, `pg_grade`, `pg_year`, `o_univ`, `o_degree`, `o_marks`, `o_grade`, `o_year`, `bd_1`, `bd_2`, `bd_3`, `bd_4`, `bd_5`, `bd_6`, `bd_7`, `bd_8`, `bd_9`, `bd_10`, `bd_agr`, `bd_class`, `md_1`, `md_2`, `md_3`, `md_4`, `md_agr`, `md_class`) VALUES
('varunjammula', 'Gowtham Concept School', 'Class 10th OR Equi.', 90.83, 'MAR-100', 2008, 'Sri Chaitanya Junior Kalasala', 'Class 12th OR Equi.', 93.7, 'MAR-100', 2010, 'IIIT D&M Kancheepuram', 'B.Tech CS', 8.02, 'CGP-10', 2014, '', '', 0, '0', 0, '', '', 0, '0', 0, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 'A', 8, 8, 8, 8, 8, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `selected`
--

CREATE TABLE IF NOT EXISTS `selected` (
  `Appl` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `ug_agr` float NOT NULL,
  `pg_agr` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `discipline` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `discipline`, `mode`) VALUES
(3, 'vpky', 'pavan.vpky@gmail.com', 'zaq', 'coe', 'httra'),
(4, 'varunjammula', 'varunjammula@gmail.com', 'zaq', 'mdm', 'internal'),
(6, 'vjammula', 'coe10b019@iiitdm.ac.in', 'zse', 'coe', 'httra'),
(7, 'myself', 'pulsid.agarwal@gmail.com', 'test123', 'coe', 'httra'),
(8, 'noone', 'coe10b010@iiitdm.ac.in', 'chinni', 'coe', 'httra'),
(9, 'Kuladeep', 'coe11b026@iiitdm.ac.in', 'kuladeep', 'coe', 'httra'),
(10, 'robertkiran', 'robertkiran.d@gmail.com', 'nani_keys', 'coe', 'httra'),
(11, 'Kavya', 'coe11b015@iiitdm.ac.in', 'algorithms', 'coe', 'httra'),
(15, 'ram', 'coe11b017@iiitdm.ac.in', 'sher', 'coe', 'httra'),
(18, 'sunilkumar', 'sunilkumardsk152@gmail.com', '558925152', 'coe', 'httra'),
(20, 'vijay', 'coe11b002@iiitdm.ac.in', 'vijay', 'coe', 'httra'),
(21, 'sudheerbabu', 'sudheerpendyala7@gmail.com', '7cskwon7', 'coe', 'httra'),
(22, 'sandeep', 'coe11b004@iiitdm.ac.in', 'asdfasd', 'coe', 'httra'),
(26, 'krishnadude', 'coe11b014@iiitdm.ac.in', 'KRISHNA', 'physics', 'internal'),
(27, 'sakthi', 'coe11b018@iiitdm.ac.in', 'sakthi', 'edm', 'httra'),
(30, 'coe11b024', 'coe11b024@iiitdm.ac.in', 'asdf', 'coe', 'httra'),
(31, 'Ashish', 'coe11b003@iiitdm.ac.in', 'pass', 'coe', 'internal'),
(32, 'kamlesh', 'ac.p', '123', 'coe', 'httra'),
(34, 'babydoll', 'ranjith.coe@gmail.com', 'sonedi', 'maths', 'internal'),
(36, 'ajaytej', 'coe11b011@iiitdm.ac.in', 'kn0logic', 'coe', 'httra'),
(37, 'Monika', 'coe11b001@iiitdm.ac.in', 'Monika', 'edm', 'internal'),
(38, 'mano', 'coe11b027@iiitdm.ac.in', 'manovenna', 'coe', 'internal'),
(44, 'Madhu', 'imadhulahari@gmail.com', 'madhu', 'coe', 'httra'),
(47, 'bmw', 'coe11b005@iiitdm.ac.in', 'kumar', 'mdm', 'httra'),
(50, 'bmw3', 'coe11b006@iiitdm.ac.in', 'kumar', 'mdm', 'httra');

-- --------------------------------------------------------

--
-- Structure for view `list`
--
DROP TABLE IF EXISTS `list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list` AS select `u`.`id` AS `id`,`u`.`name` AS `name`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`discipline` AS `discipline`,`u`.`mode` AS `mode`,`p`.`user_name` AS `user_name`,`p`.`App_no` AS `App_no`,`p`.`Full_Name` AS `Full_Name`,`p`.`gender` AS `gender`,`p`.`dob` AS `dob`,`p`.`fname` AS `fname`,`p`.`Nationality` AS `Nationality`,`p`.`Marital_status` AS `Marital_status`,`p`.`Physically_challenged` AS `Physically_challenged`,`p`.`community` AS `community`,`p`.`Minority` AS `Minority`,`p`.`pemail` AS `pemail`,`p`.`aemail` AS `aemail`,`p`.`Temp_Address` AS `Temp_Address`,`p`.`T_District` AS `T_District`,`p`.`T_state` AS `T_state`,`p`.`T_pincode` AS `T_pincode`,`p`.`T_phone_number` AS `T_phone_number`,`p`.`T_mobile_number` AS `T_mobile_number`,`p`.`perm_Address` AS `perm_Address`,`p`.`P_District` AS `P_District`,`p`.`P_state` AS `P_state`,`p`.`P_pincode` AS `P_pincode`,`p`.`P_phone_number` AS `P_phone_number`,`p`.`P_mobile_number` AS `P_mobile_number`,`q`.`user_key` AS `user_key`,`q`.`10_univ` AS `10_univ`,`q`.`10_degree` AS `10_degree`,`q`.`10_marks` AS `10_marks`,`q`.`10_grade` AS `10_grade`,`q`.`10_year` AS `10_year`,`q`.`12_univ` AS `12_univ`,`q`.`12_degree` AS `12_degree`,`q`.`12_marks` AS `12_marks`,`q`.`12_grade` AS `12_grade`,`q`.`12_year` AS `12_year`,`q`.`bd_univ` AS `bd_univ`,`q`.`bd_degree` AS `bd_degree`,`q`.`bd_marks` AS `bd_marks`,`q`.`bd_grade` AS `bd_grade`,`q`.`bd_year` AS `bd_year`,`q`.`pg_univ` AS `pg_univ`,`q`.`pg_degree` AS `pg_degree`,`q`.`pg_marks` AS `pg_marks`,`q`.`pg_grade` AS `pg_grade`,`q`.`pg_year` AS `pg_year`,`q`.`o_univ` AS `o_univ`,`q`.`o_degree` AS `o_degree`,`q`.`o_marks` AS `o_marks`,`q`.`o_grade` AS `o_grade`,`q`.`o_year` AS `o_year`,`q`.`bd_1` AS `bd_1`,`q`.`bd_2` AS `bd_2`,`q`.`bd_3` AS `bd_3`,`q`.`bd_4` AS `bd_4`,`q`.`bd_5` AS `bd_5`,`q`.`bd_6` AS `bd_6`,`q`.`bd_7` AS `bd_7`,`q`.`bd_8` AS `bd_8`,`q`.`bd_9` AS `bd_9`,`q`.`bd_10` AS `bd_10`,`q`.`bd_agr` AS `bd_agr`,`q`.`bd_class` AS `bd_class`,`q`.`md_1` AS `md_1`,`q`.`md_2` AS `md_2`,`q`.`md_3` AS `md_3`,`q`.`md_4` AS `md_4`,`q`.`md_agr` AS `md_agr`,`q`.`md_class` AS `md_class`,`e`.`user_ex` AS `user_ex`,`e`.`org_1` AS `org_1`,`e`.`des_1` AS `des_1`,`e`.`per_1` AS `per_1`,`e`.`work_1` AS `work_1`,`e`.`org_2` AS `org_2`,`e`.`des_2` AS `des_2`,`e`.`per_2` AS `per_2`,`e`.`work_2` AS `work_2`,`e`.`org_3` AS `org_3`,`e`.`des_3` AS `des_3`,`e`.`per_3` AS `per_3`,`e`.`work_3` AS `work_3`,`e`.`org_4` AS `org_4`,`e`.`des_4` AS `des_4`,`e`.`per_4` AS `per_4`,`e`.`work_4` AS `work_4`,`e`.`org_5` AS `org_5`,`e`.`des_5` AS `des_5`,`e`.`per_5` AS `per_5`,`e`.`work_5` AS `work_5` from (((`users` `u` join `personal_info` `p` on((`u`.`name` = `p`.`user_name`))) join `qualifications` `q` on((`p`.`user_name` = `q`.`user_key`))) join `experience` `e` on((`q`.`user_key` = `e`.`user_ex`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
