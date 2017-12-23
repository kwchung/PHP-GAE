-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-12-23 07:17:59
-- 伺服器版本: 10.1.29-MariaDB
-- PHP 版本： 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db_students`
--
CREATE DATABASE IF NOT EXISTS `db_students` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_students`;

-- --------------------------------------------------------

--
-- 資料表結構 `tb_1310534034`
--

CREATE TABLE `tb_1310534034` (
  `sno` varchar(5) NOT NULL,
  `name` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tb_1310534034`
--

INSERT INTO `tb_1310534034` (`sno`, `name`, `address`, `birth`, `username`, `password`) VALUES
('00001', 'manager', 'address#1', '1996-05-21', 'manager', '1qaz'),
('00002', 'name#2', 'address#2', '1996-01-02', 'username#2', 'password#2'),
('00003', 'name#3', 'address#3', '1996-01-03', 'username#3', 'password#3'),
('00004', 'name#4', 'address#4', '1996-01-04', 'username#4', 'password#4'),
('00005', 'name#5', 'address#5', '1996-01-05', 'username#5', 'password#5'),
('00006', 'name#6', 'address#6', '1996-01-06', 'username#6', 'password#6'),
('00007', 'name#7', 'address#7', '1996-01-07', 'username#7', 'password#7'),
('00008', 'name#8', 'address#8', '1996-01-08', 'username#8', 'password#8'),
('00009', 'name#9', 'address#9', '1996-01-09', 'username#9', 'password#9'),
('00010', 'name#10', 'address#10', '1996-01-10', 'username#10', 'password#10');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `tb_1310534034`
--
ALTER TABLE `tb_1310534034`
  ADD PRIMARY KEY (`sno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
