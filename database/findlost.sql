-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-12-27 01:27:12
-- 服务器版本： 5.5.56-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findlost`
--

-- --------------------------------------------------------

--
-- 表的结构 `findpeople`
--

CREATE TABLE `findpeople` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `attribute` varchar(30) NOT NULL,
  `describes` varchar(100) NOT NULL,
  `findaddress` varchar(30) NOT NULL,
  `sendtime` datetime NOT NULL,
  `phone` varchar(11) NOT NULL,
  `finder` varchar(20) NOT NULL,
  `photo` varchar(30) CHARACTER SET ucs2 NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `findpeople`
--

INSERT INTO `findpeople` (`id`, `name`, `attribute`, `describes`, `findaddress`, `sendtime`, `phone`, `finder`, `photo`, `class`) VALUES
(16, '数据结构课本', '书籍', '一个数据结构课本', '宿舍', '2017-12-27 01:25:33', '10086', '2016014302', 'user.png', 0),
(15, '数据结构老师', '教授', '我们的数据结构老师', '主教', '2017-12-27 01:24:49', '15801209263', '2016014302', 'user.png', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `account`, `password`) VALUES
(4, '2016014302', '19970329');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `findpeople`
--
ALTER TABLE `findpeople`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `findpeople`
--
ALTER TABLE `findpeople`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
