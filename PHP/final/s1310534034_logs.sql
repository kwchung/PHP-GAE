-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-01-20 05:01:05
-- 伺服器版本: 10.1.26-MariaDB
-- PHP 版本： 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myschool`
--

-- --------------------------------------------------------

--
-- 資料表結構 `s1310534034_logs`
--

CREATE TABLE `s1310534034_logs` (
  `sid` int(11) NOT NULL,
  `events` varchar(64) NOT NULL,
  `username` varchar(12) NOT NULL,
  `createtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `s1310534034_logs`
--

INSERT INTO `s1310534034_logs` (`sid`, `events`, `username`, `createtime`) VALUES
(115, '編輯 S000 資料', 'admin', '2018-01-20 11:58:50'),
(116, '編輯 S000 資料', 'admin000', '2018-01-20 11:59:55');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `s1310534034_logs`
--
ALTER TABLE `s1310534034_logs`
  ADD PRIMARY KEY (`sid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `s1310534034_logs`
--
ALTER TABLE `s1310534034_logs`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
