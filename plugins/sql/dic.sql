-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-01-10 16:35:57
-- 服务器版本： 5.7.31-log
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `dic`
--

-- --------------------------------------------------------

--
-- 表的结构 `dic`
--

CREATE TABLE `dic` (
  `q` varchar(128) NOT NULL,
  `a` varchar(1280) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `dic`
--

INSERT INTO `dic` (`q`, `a`, `reg_date`) VALUES
('1', '2', '2020-10-24 23:43:26'),
('2', '3', '2021-02-13 12:02:46'),
('233', '233', '2021-02-13 12:15:42'),
('awa', 'awa', '2021-02-13 12:10:32'),
('啊这', '啊这', '2021-01-10 08:34:40'),
('啊這', '啊這', '2021-02-13 12:25:51'),
('問題', '這是回答', '2021-02-13 12:26:05'),
('您好', '您好呀', '2021-02-13 12:22:58'),
('问题', '这是回答', '2020-08-14 17:27:36');

--
-- 转储表的索引
--

--
-- 表的索引 `dic`
--
ALTER TABLE `dic`
  ADD PRIMARY KEY (`q`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
