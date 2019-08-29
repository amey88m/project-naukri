-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 05:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naukri`
--

-- --------------------------------------------------------

--
-- Table structure for table `candsignup`
--

CREATE TABLE `candsignup` (
  `canId` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `useremail` varchar(500) DEFAULT NULL,
  `IsEmailValide` tinyint(4) DEFAULT '0',
  `userpassword` varchar(500) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `otherqualification` varchar(200) DEFAULT NULL,
  `coursecertified` varchar(200) DEFAULT NULL,
  `selfdescription` varchar(1000) DEFAULT NULL,
  `tokenEmail` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL,
  `skills` varchar(500) NOT NULL DEFAULT 'html',
  `c_reg_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candsignup`
--

INSERT INTO `candsignup` (`canId`, `name`, `fname`, `lname`, `username`, `useremail`, `IsEmailValide`, `userpassword`, `qualification`, `otherqualification`, `coursecertified`, `selfdescription`, `tokenEmail`, `date`, `skills`, `c_reg_id`) VALUES
(47, 'shraddha', 'shraddha', 's', 'shraddha', 'shraddha@gmail.com', 1, '12345', 'M.com', 'master in commerce', 'commerce', 'Hello. I am tester.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, iste tempora! Amet ab, deleniti, fugit tempora quo porro reiciendis quisquam eos fugiat mollitia molestiae itaque. Adipisci illum, neque velit tempora?', '1234567890', '2018-04-23 08:03:23', 'design,photoshop', 0),
(89, 'yojana', 'y', 'y', 'yojana', 'yojana@example.com', 0, '909090', 'B.Tech', 'commerce', 'C.A', 'Hello, I am yojana Y Y. I have done my graduation with C.A. I also have work experience as C.A into \r\nabcd pvt ltd. Now , I am looking for next career in next firm to get better experience for long term.\r\nI would like to here from you as possible as you can.\r\nThank you.', '24E52EO942', '2018-05-14 19:50:53', 'html', 0),
(90, 'Aska', 'a', 'k', 'aska', 'aska@example.com', 1, '123', 'B.com', 'b.com', 'auditing,tax', 'hi, I am aska did commerce from maharashatra.', '9c4eefa0ca6f9ca1dd68ec85074766549dc786e3d94dfa', '2019-07-26 20:39:17', 'commerce,account,audit,tax', 5),
(91, 'Aska', 'k', 'k', 'aska', 'aska12@example.com', 0, '123', 'B.com', 'b.com', 'commerce', 'hi, I am aska did commerce from maharashatra.', '83201d63580380446beed8cb893b46cda2d89fccea4c57', '2019-07-26 20:42:44', 'commerce,account,audit,tax', 5),
(93, 'amey', 'a', 'a', 'amey', 'amdotdeveloper@gmail.com', 1, '123', 'B.com', 'commerce', 'm tech', 'hello, this is testing page', '2eb97c8fdf30feff2f5ecbb3a51d2327fd2395e0d88650', '2019-08-03 18:01:51', 'skill1,skill2,skill3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `companysignup`
--

CREATE TABLE `companysignup` (
  `compId` smallint(6) NOT NULL,
  `compName` varchar(100) DEFAULT NULL,
  `compLocation` varchar(400) DEFAULT NULL,
  `compHRName` varchar(100) DEFAULT NULL,
  `compHREmail` varchar(500) DEFAULT NULL,
  `compHRPass` varchar(500) DEFAULT NULL,
  `compHRPhone` bigint(20) DEFAULT NULL,
  `cofirmHRPhone` tinyint(1) UNSIGNED DEFAULT '0',
  `signupDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `compsclientIp` varchar(50) DEFAULT NULL,
  `regtoken` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companysignup`
--

INSERT INTO `companysignup` (`compId`, `compName`, `compLocation`, `compHRName`, `compHREmail`, `compHRPass`, `compHRPhone`, `cofirmHRPhone`, `signupDate`, `compsclientIp`, `regtoken`) VALUES
(1, 'sql ltd', 'mumbai', 'varun', 'varun@example.com', 'varun123', 1234567890, 1, '2019-07-12 03:59:04', 'MzEzMjM3MmUzMDJlMzAyZTMx', '5d280588ca2bc5.219244221562903944EWOE1284401FLSD9381947582XRHZQPODU'),
(2, 'vrutha pvt ltd', 'other', 'vrutha s v', 'vrutha@example.com', 'vrutha789', 980980980, 1, '2019-07-26 14:45:08', 'MzEzMjM3MmUzMDJlMzAyZTMx', '5d3b11f4618d39.185852191564152308EWOE1284401FLSD9381947582XRHZQPODU'),
(3, 'square pvt ltd', 'other', 's v jain', 'sv@example.com', 'test123.', 9090909090, 1, '2019-07-29 15:16:19', 'MzEzMjM3MmUzMDJlMzAyZTMx', '5d3f0dc31255b8.461365861564413379EWOE1284401FLSD9381947582XRHZQPODU'),
(4, 'earth pvt ltd', 'pune', 'ethina ev', 'ethina@gmail.com', '123456', 9090909090, 1, '2019-07-29 15:24:44', 'MzEzMjM3MmUzMDJlMzAyZTMx', '5d3f0fbcb9c109.139478581564413884EWOE1284401FLSD9381947582XRHZQPODU'),
(5, 'ppl pvt ltd', 'other', 'karuna k', 'karuna@example.com', '123', 9809809809, 1, '2019-07-29 15:26:30', 'MzEzMjM3MmUzMDJlMzAyZTMx', '5d3f10268ef5a2.530444891564413990EWOE1284401FLSD9381947582XRHZQPODU'),
(7, 'pqr', 'mumbai', 'pranita', 'pranita@example.com', '123456', 9900990099, 1, '2019-08-03 06:40:07', 'MzEzMjM3MmUzMDJlMzAyZTMx', '5d452c47947bf7.400523891564814407EWOE1284401FLSD9381947582XRHZQPODU');

-- --------------------------------------------------------

--
-- Table structure for table `hrlogin`
--

CREATE TABLE `hrlogin` (
  `HRId` smallint(5) UNSIGNED NOT NULL,
  `HRName` varchar(100) DEFAULT NULL,
  `HREmail` varchar(500) DEFAULT NULL,
  `HRPass` varchar(500) DEFAULT NULL,
  `HRPic` varchar(300) DEFAULT NULL,
  `HRDOB` int(100) DEFAULT NULL,
  `compId` smallint(100) DEFAULT NULL,
  `Rg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsValidEmail` tinyint(4) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `hr_rg_token` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrlogin`
--

INSERT INTO `hrlogin` (`HRId`, `HRName`, `HREmail`, `HRPass`, `HRPic`, `HRDOB`, `compId`, `Rg_date`, `IsValidEmail`, `phone`, `hr_rg_token`) VALUES
(1, 'vrushali', 'vrushali@example.com', '89008900', 'avatar-girl.png', 19900201, 4, '2018-05-03 12:57:10', 1, 919191929, NULL),
(2, 'varsha', 'varsha@example.com', '555555', 'avatar-girl.png', 1996, 4, '2018-05-07 14:46:55', 1, 989800989, NULL),
(5, 'krishna', 'krishna@example.com', 'krishna', 'avatar-boy.jpg', 2017, 4, '2018-05-08 02:34:46', 1, 847384228, NULL),
(8, 'vrushali', 'vrushali123@example.com', '123456', 'avatar-girl.png', 2019, 7, '2019-08-03 13:03:47', 1, 2147483647, '03-08-19 18:33:47:pm'),
(12, 'seeta', 'seeta@example.com', 'seeta123', 'avatar-girl.png', 2019, 4, '2019-08-06 12:23:17', 1, 1234512345, '06-08-19 17:53:17:pm'),
(13, 'seeta', 'bseeta@example.comb', '123456', 'avatar-girl.png', 2019, 4, '2019-08-06 13:38:12', 1, 1234512345, '06-08-19 19:08:12:pm'),
(14, 'kristina', 'kristina@example.com', 'kristi123', 'avatar-girl.png', 2019, 4, '2019-08-06 13:54:35', 1, 1234512345, '06-08-19 19:24:35:pm'),
(15, 'kristina', 'kristina1@example.com', 'kristi123', 'avatar-girl.png', 2019, 4, '2019-08-06 13:55:23', 1, 1234512345, '06-08-19 19:25:23:pm'),
(16, 'kristina', 'kristina12@example.com', 'kristi123', 'avatar-girl.png', 2019, 4, '2019-08-06 13:56:23', 1, 1234512345, '06-08-19 19:26:23:pm'),
(18, 'camaliana', 'camaliana@example.com', '123456', 'avatar-girl.png', 2019, 4, '2019-08-06 14:31:16', 1, 1234512345, '92f0238b28e277f8aa2cd9bb7ec7c21e4e41fa2393eadd663d29db39b95b1a9e35643439386633343165653337352e3334323132343133'),
(31, 'amey', 'amdotdeveloper@gmail.com', '123456', 'avatar-girl.png', 2019, 4, '2019-08-09 04:26:12', 1, 1234512345, '748fce78171afcd4bb7e5eee828756e3f24c3d74d3cbb914f91543fcdc0b8c5f35643463663565343365336138362e3831383835393333');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `applyId` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `canId` smallint(5) UNSIGNED DEFAULT NULL,
  `jobId` smallint(100) UNSIGNED DEFAULT NULL,
  `HRId` smallint(5) UNSIGNED NOT NULL,
  `applydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_posted_by_hr`
--

CREATE TABLE `job_posted_by_hr` (
  `jobId` smallint(100) UNSIGNED NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `job_des` varchar(1000) DEFAULT NULL,
  `job_status` varchar(100) DEFAULT NULL,
  `no_of_open` tinyint(4) DEFAULT '1',
  `job_location` varchar(100) DEFAULT NULL,
  `job_city` varchar(100) DEFAULT NULL,
  `HRId` smallint(100) UNSIGNED DEFAULT NULL,
  `job_posted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `skills` varchar(100) NOT NULL DEFAULT 'skill 1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_posted_by_hr`
--

INSERT INTO `job_posted_by_hr` (`jobId`, `company`, `designation`, `job_des`, `job_status`, `no_of_open`, `job_location`, `job_city`, `HRId`, `job_posted_on`, `skills`) VALUES
(1, 'ABC', 'HR Executive', 'We are looking for candidate who are freshers and looking to do career in HR.\r\nWe glad to inform you, if you are stared then this will be the best start to your career. \r\nSalary : 6,000 pm\r\ncontract : No\r\nTarget : Yes\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum iste magnam veritatis nisi expedita, placeat ratione praesentium! Quasi in reprehenderit mollitia dignissimos qui adipisci, sint doloremque distinctio eveniet eos tempore.\r\nQuis est iste alias numquam incidunt vero eligendi, sed aspernatur labore hic assumenda ipsam illum voluptatem saepe in! Ipsam odio sunt omnis iure alias? Neque voluptate at porro accusantium laborum?\r\nVoluptate ipsam libero obcaecati magnam, quibusdam fuga consequuntur repudiandae quod excepturi ab eveniet, natus saepe labore deserunt adipisci non facilis. Nostrum excepturi aliquid impedit voluptatem ducimus vitae illo iure aut.', 'urgent', 2, 'Mumbai', 'Mumbai', 1, '2018-05-03 18:47:44', 'headhunting,\'team coordination\',target'),
(2, 'ABC', 'Hr Team Leader', 'We are looking experience person for HR Team leader. We are looking for \r\nminimum 1 year of experience in same profile.\r\nIf you think you are the fit for the position. Just click to apply button. \r\n<u>Note : No walk in drives</u>\r\n\r\nSalary : 20000 - 30000\r\ncontract : Yes\r\ncontract period : 1 year\r\n\r\n\r\n', 'open', 1, 'Mumbai', 'Mumbai', 1, '2018-05-03 18:52:48', 'html,css,javascript'),
(7, 'XYZ LTD', 'hr representative', 'hello, I am representative of abc company and we are hiring for the xyz ltd company.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquid ullam, repudiandae consectetur deserunt temporibus animi vitae fuga? Facere modi accusamus inventore dolorum maiores! Commodi molestias impedit doloribus quo rerum!', 'open', 10, 'mumbai', 'mumbai', 2, '2018-05-09 21:47:19', 'html,sass,bootstrap,javascript,'),
(8, 'XYZ LTD', 'hr representative', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquid ullam, repudiandae consectetur deserunt temporibus animi vitae fuga? Facere modi accusamus inventore dolorum maiores! Commodi molestias impedit doloribus quo rerum!company.', 'open', 10, 'mumbai', 'mumbai', 2, '2018-05-09 21:48:54', 'html,sass,css'),
(10, 'XYZ LTD', 'hr corodinator', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquid ullam, repudiandae consectetur deserunt temporibus animi vitae fuga? Facere modi accusamus inventore dolorum maiores! Commodi molestias impedit doloribus quo rerum!Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem aliquid ullam, repudiandae consectetur deserunt temporibus animi vitae fuga? Facere modi accusamus inventore dolorum maiores! Commodi molestias impedit doloribus quo rerum!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum iste magnam veritatis nisi expedita, placeat ratione praesentium! Quasi in reprehenderit mollitia dignissimos qui adipisci, sint doloremque distinctio eveniet eos tempore.\r\nQuis est iste alias numquam incidunt vero eligendi, sed aspernatur labore hic assumenda ipsam illum voluptatem saepe in! Ipsam odio sunt omnis iure alias? Neque voluptate at porro accusantium laborum?\r\nVoluptate ipsam libero obcaecati magnam, quibusdam fuga consequuntur repudiandae quo', 'open', 4, 'mumbai', 'mumbai', 2, '2018-05-09 22:16:13', '\'head hunting\',\'fluent english\''),
(11, 'PQR LTD', 'sales', 'Hello, I we are having job opening for the sales coordinator. \r\nPlease check the below details.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum iste magnam veritatis nisi expedita, placeat ratione praesentium! Quasi in reprehenderit mollitia dignissimos qui adipisci, sint doloremque distinctio eveniet eos tempore.\r\nQuis est iste alias numquam incidunt vero eligendi, sed aspernatur labore hic assumenda ipsam illum voluptatem saepe in! Ipsam odio sunt omnis iure alias? Neque voluptate at porro accusantium laborum?\r\nVoluptate ipsam libero obcaecati magnam, quibusdam fuga consequuntur repudiandae quod excepturi ab eveniet, natus saepe labore deserunt adipisci non facilis. Nostrum excepturi aliquid impedit voluptatem ducimus vitae illo iure aut.', 'closed', 15, 'U.S', 'Florida', 2, '2018-05-09 22:21:30', '\'fluent english\', enthusiasm, \'smart work\''),
(12, 'ABC', 'sales', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum iste magnam veritatis nisi expedita, placeat ratione praesentium! Quasi in reprehenderit mollitia dignissimos qui adipisci, sint doloremque distinctio eveniet eos tempore.\r\nQuis est iste alias numquam incidunt vero eligendi, sed aspernatur labore hic assumenda ipsam illum voluptatem saepe in! Ipsam odio sunt omnis iure alias? Neque voluptate at porro accusantium laborum?\r\nVoluptate ipsam libero obcaecati magnam, quibusdam fuga consequuntur repudiandae quod excepturi ab eveniet, natus saepe labore deserunt adipisci non facilis. Nostrum excepturi aliquid impedit voluptatem ducimus vitae illo iure aut.', 'open', 1, 'U.S.A', 'U.S.A', 1, '2018-05-09 22:23:16', '\'fluent english communication must\',enthusiasm,\'smart work\''),
(13, 'KPT', 'hr corodinator', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum iste magnam veritatis nisi expedita, placeat ratione praesentium! Quasi in reprehenderit mollitia dignissimos qui adipisci, sint doloremque distinctio eveniet eos tempore.\r\nQuis est iste alias numquam incidunt vero eligendi, sed aspernatur labore hic assumenda ipsam illum voluptatem saepe in! Ipsam odio sunt omnis iure alias? Neque voluptate at porro accusantium laborum?\r\nVoluptate ipsam libero obcaecati magnam, quibusdam fuga consequuntur repudiandae quod excepturi ab eveniet, natus saepe labore deserunt adipisci non facilis. Nostrum excepturi aliquid impedit voluptatem ducimus vitae illo iure aut.', 'closed', 2, 'U.S', 'Florida', 1, '2018-05-10 07:16:01', '\'fluent english communication must\',\r\nenthusiasm, \'smart work\''),
(14, 'ABC LTD', 'Full Stack Web developer, Front End Web developer', 'Hello, We have an urgent opening for the post of \'Front End Developer\' and \'Full Stack Web developer\'. We have requirement as follow.\r\nQualification : B.Tech, M.C.A, B.C.A, B.com\r\nNo of position : 3.\r\n(2 - Front End Web developer and 1 - Full Stack Web developer)\r\nWe are looking for an candidate who have good understanding of code. Hands on Experience will be advantage.\r\nWe can handle individual activity.\r\nSalary : discuss letter.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Harum iste magnam veritatis nisi expedita, placeat ratione praesentium! Quasi in reprehenderit mollitia dignissimos qui adipisci, sint doloremque distinctio eveniet eos tempore.\r\nQuis est iste alias numquam incidunt vero eligendi, sed aspernatur labore hic assumenda ipsam illum voluptatem saepe in! Ipsam odio sunt omnis iure alias? Neque voluptate at porro accusantium laborum?\r\nVoluptate ipsam libero obcaecati magnam, quibusdam fuga consequuntur repudiandae quod excepturi ab eveniet, natus saepe labore', 'urgent', 3, 'U.S, mumbai', 'mumbai', 1, '2018-05-12 18:32:43', 'html,css,sass,js,php,sql,\'server side scripting\',\'security with php\',nosql');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resume`
--

CREATE TABLE `tbl_resume` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `canId` smallint(5) UNSIGNED DEFAULT NULL,
  `resume_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candsignup`
--
ALTER TABLE `candsignup`
  ADD PRIMARY KEY (`canId`);

--
-- Indexes for table `companysignup`
--
ALTER TABLE `companysignup`
  ADD PRIMARY KEY (`compId`);

--
-- Indexes for table `hrlogin`
--
ALTER TABLE `hrlogin`
  ADD PRIMARY KEY (`HRId`),
  ADD KEY `fk_comid` (`compId`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`applyId`),
  ADD KEY `fk_canid` (`canId`),
  ADD KEY `fk_jobid` (`jobId`);

--
-- Indexes for table `job_posted_by_hr`
--
ALTER TABLE `job_posted_by_hr`
  ADD PRIMARY KEY (`jobId`),
  ADD KEY `fk_hrid` (`HRId`);

--
-- Indexes for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_key` (`canId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candsignup`
--
ALTER TABLE `candsignup`
  MODIFY `canId` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `companysignup`
--
ALTER TABLE `companysignup`
  MODIFY `compId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hrlogin`
--
ALTER TABLE `hrlogin`
  MODIFY `HRId` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `applyId` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posted_by_hr`
--
ALTER TABLE `job_posted_by_hr`
  MODIFY `jobId` smallint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hrlogin`
--
ALTER TABLE `hrlogin`
  ADD CONSTRAINT `fk_comid` FOREIGN KEY (`compId`) REFERENCES `companysignup` (`compId`);

--
-- Constraints for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD CONSTRAINT `fk_canid` FOREIGN KEY (`canId`) REFERENCES `candsignup` (`canId`),
  ADD CONSTRAINT `fk_jobid` FOREIGN KEY (`jobId`) REFERENCES `job_posted_by_hr` (`jobId`);

--
-- Constraints for table `job_posted_by_hr`
--
ALTER TABLE `job_posted_by_hr`
  ADD CONSTRAINT `fk_hrid` FOREIGN KEY (`HRId`) REFERENCES `hrlogin` (`HRId`);

--
-- Constraints for table `tbl_resume`
--
ALTER TABLE `tbl_resume`
  ADD CONSTRAINT `fk_key` FOREIGN KEY (`canId`) REFERENCES `candsignup` (`canId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
