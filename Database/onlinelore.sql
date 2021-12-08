-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 11:23 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinelore`
--

-- --------------------------------------------------------

--
-- Table structure for table `anserstoquez`
--

CREATE TABLE `anserstoquez` (
  `atqid` int(11) NOT NULL,
  `s_an` int(11) NOT NULL DEFAULT '0',
  `q_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `anserstoquez`
--

INSERT INTO `anserstoquez` (`atqid`, `s_an`, `q_id`, `t_id`, `s_id`) VALUES
(14, 2, 16, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `crus_pic`
--

CREATE TABLE `crus_pic` (
  `pic_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `crus_pic`
--

INSERT INTO `crus_pic` (`pic_id`, `name`, `link`, `size`) VALUES
(0, '35640.jpg', 'http://localhost/OnlineLore/assets/myimg/35640.jpg', '0'),
(1, 'wi0kfnr017yz - Copy.jpg', 'http://localhost/OnlineLore/assets/myimg/wi0kfnr017yz - Copy.jpg', '0'),
(2, '452852.jpg', 'http://localhost/OnlineLore/assets/myimg/452852.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `iid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `tozih` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `reade_s` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`iid`, `did`, `name`, `type`, `title`, `tozih`, `color`, `reade_s`, `date`, `link`) VALUES
(1, 1, '03.pdf', 'application/pdf', 'کتاب آموزشی انگولار', 'بخش اول', '0', 0, '2018-09-04 06:08:21', 'http://localhost/OnlineLore/uploads/files/03.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `fid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `tozih` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `type` varchar(244) COLLATE utf8_persian_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `reade_s` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`fid`, `did`, `name`, `title`, `tozih`, `type`, `color`, `reade_s`, `date`, `link`) VALUES
(1, 1, '001 Welcome.mp4', 'بخش اول', 'آموزش انگولار', 'video/mp4', '0', 0, '2018-09-04 06:07:41', 'http://localhost/OnlineLore/uploads/films/001 Welcome.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `did` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `did`, `date`, `user`) VALUES
(4, 'غلام نژاد', 'سلام', 1, '2018-12-16 01:47:36', 'pezhman');

-- --------------------------------------------------------

--
-- Table structure for table `notifs`
--

CREATE TABLE `notifs` (
  `nid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `tozih` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `reade_s` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `notifs`
--

INSERT INTO `notifs` (`nid`, `did`, `title`, `tozih`, `color`, `reade_s`, `date`) VALUES
(17, 1, 'امتحان برگزار نمی شود', 'امتحان روز سه شنبه برگزار نمی‌شود', '0', 0, '2018-08-07 09:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `ol_dars`
--

CREATE TABLE `ol_dars` (
  `did` int(11) NOT NULL,
  `dname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `o_id` int(11) NOT NULL,
  `dyear` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `dkynde` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ol_dars`
--

INSERT INTO `ol_dars` (`did`, `dname`, `o_id`, `dyear`, `dkynde`, `status`) VALUES
(1, 'آموزش انگولار', 32, '1374', 'وب', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ol_ostad`
--

CREATE TABLE `ol_ostad` (
  `oid` int(11) NOT NULL,
  `opercode` int(255) NOT NULL,
  `oname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ofamily` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ofather` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `obrdate` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `aid` int(11) NOT NULL DEFAULT '1',
  `ouser` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `opass` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `opic` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `ophone` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `obio` varchar(255) COLLATE utf8_persian_ci DEFAULT '0',
  `onoff` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ol_ostad`
--

INSERT INTO `ol_ostad` (`oid`, `opercode`, `oname`, `ofamily`, `ofather`, `obrdate`, `aid`, `ouser`, `opass`, `status`, `opic`, `ophone`, `obio`, `onoff`) VALUES
(32, 2147483647, 'پژمان', 'غلام نژاد', 'نمیدانم', '1360/5/5', 1, 'pezhman', '12345', 1, 'avatar3.png', '02345555566', 'خالی از سکنه', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ol_student`
--

CREATE TABLE `ol_student` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sfamily` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sfather` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sbrdate` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sncode` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `suser` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `spass` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `spic` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `onoff` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `ol_student`
--

INSERT INTO `ol_student` (`sid`, `sname`, `sfamily`, `sfather`, `sbrdate`, `sncode`, `suser`, `spass`, `status`, `spic`, `onoff`) VALUES
(3, 'حسین', 'خسروی', 'رضا', '1374104', '5635355440', 'hosain', '12345', 1, 'avatar2.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `poid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `textt` text COLLATE utf8_persian_ci NOT NULL,
  `datee` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vieww` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`poid`, `title`, `textt`, `datee`, `vieww`) VALUES
(8, 'متن اول', 'تویی جونم توی عشقم تازگی داره قلبم واسه اون آمادگی داره سادگی رو در عین سادگی داره خوبیش اینه', '2018-08-11 09:46:16', 1),
(22, 'متن دوم', 'تویی جونم توی عشقم تازگی داره قلبم واسه اون آمادگی داره سادگی رو در عین سادگی داره خوبیش اینه', '2018-08-11 09:47:29', 1),
(24, 'متن سوم', 'تویی جونم توی عشقم تازگی داره قلبم واسه اون آمادگی داره سادگی رو در عین سادگی داره خوبیش اینه', '2018-08-11 09:47:30', 1),
(25, 'متن چهارم', 'تویی جونم توی عشقم تازگی داره قلبم واسه اون آمادگی داره سادگی رو در عین سادگی داره خوبیش اینه', '2018-08-11 09:47:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `problemreport`
--

CREATE TABLE `problemreport` (
  `rpid` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `kynde` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `qu` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `datee` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `problemreport`
--

INSERT INTO `problemreport` (`rpid`, `email`, `name`, `kynde`, `qu`, `datee`) VALUES
(3, 'khaledjamal5946@gmail.com', 'سسسسس', 'مشکل سرویس ها', 'سسسسس', '2018-08-05 12:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `qusan`
--

CREATE TABLE `qusan` (
  `qaid` int(11) NOT NULL,
  `qu` varchar(233) COLLATE utf8_persian_ci NOT NULL,
  `an` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `datee` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vieww` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `qusan`
--

INSERT INTO `qusan` (`qaid`, `qu`, `an`, `datee`, `vieww`) VALUES
(1, 'لینک صفحه اصلی چیه؟', 'لینک صفحه اصلی : http://localhost/OnlineLore/home', '2018-08-16 09:02:12', 1),
(3, 'چرا وقتی صفحه رو تازه سازی میکنم همه چی بهم میریزه ؟', 'دوست عزیز این وب سایت با تکنولوژی صفحات تک صفحه ای انگولار نوشته شده است. پس از تازه سازی صفحه خودداری کنید و اگر میخواهید این کار را انجام دهید به صفحه اصلی هر پنلی بروید و این کار را انجام دهید.', '2018-08-18 09:02:12', 4),
(7, 'چرا قسمتی نداره که پست هامونو ببینیم.', 'این یک اپ شبکه اجتماعی نیست', '2018-08-05 10:24:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seennotif`
--

CREATE TABLE `seennotif` (
  `snid` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `n_id` int(11) NOT NULL DEFAULT '0',
  `seen` int(11) NOT NULL DEFAULT '0',
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `seennotif`
--

INSERT INTO `seennotif` (`snid`, `s_id`, `n_id`, `seen`, `d_id`) VALUES
(3, 3, 0, 0, 2),
(4, 2, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `takhsis`
--

CREATE TABLE `takhsis` (
  `tid` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `takhsis`
--

INSERT INTO `takhsis` (`tid`, `s_id`, `d_id`, `o_id`) VALUES
(6, 3, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `qid` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `point` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(11) NOT NULL DEFAULT '1',
  `quest` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `an_1` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `an_2` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `an_3` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `an_4` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `right_an` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`qid`, `d_id`, `title`, `point`, `date`, `state`, `quest`, `an_1`, `an_2`, `an_3`, `an_4`, `right_an`) VALUES
(16, 1, 'سن', 20, '2018-12-16 09:44:13', 0, 'چند سال دارید ؟', '10', '23', '30', '40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `pic` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `s_phone` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `bio` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `family`, `email`, `status`, `pic`, `phone`, `s_phone`, `bio`) VALUES
(1, 'admin', '12345', 'ادمین', 'ادمینی', 'khaledjamal@gmail.com', 1, 'admin.png', '09152625946', '05630066560', 'من از اهالی استان خراسان جنوبی ام');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anserstoquez`
--
ALTER TABLE `anserstoquez`
  ADD PRIMARY KEY (`atqid`),
  ADD UNIQUE KEY `atqid` (`atqid`);

--
-- Indexes for table `crus_pic`
--
ALTER TABLE `crus_pic`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifs`
--
ALTER TABLE `notifs`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `ol_dars`
--
ALTER TABLE `ol_dars`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `ol_ostad`
--
ALTER TABLE `ol_ostad`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `ol_student`
--
ALTER TABLE `ol_student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `problemreport`
--
ALTER TABLE `problemreport`
  ADD PRIMARY KEY (`rpid`);

--
-- Indexes for table `qusan`
--
ALTER TABLE `qusan`
  ADD PRIMARY KEY (`qaid`);

--
-- Indexes for table `seennotif`
--
ALTER TABLE `seennotif`
  ADD PRIMARY KEY (`snid`);

--
-- Indexes for table `takhsis`
--
ALTER TABLE `takhsis`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anserstoquez`
--
ALTER TABLE `anserstoquez`
  MODIFY `atqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `crus_pic`
--
ALTER TABLE `crus_pic`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notifs`
--
ALTER TABLE `notifs`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ol_dars`
--
ALTER TABLE `ol_dars`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ol_ostad`
--
ALTER TABLE `ol_ostad`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ol_student`
--
ALTER TABLE `ol_student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `problemreport`
--
ALTER TABLE `problemreport`
  MODIFY `rpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qusan`
--
ALTER TABLE `qusan`
  MODIFY `qaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `seennotif`
--
ALTER TABLE `seennotif`
  MODIFY `snid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `takhsis`
--
ALTER TABLE `takhsis`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
