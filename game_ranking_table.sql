-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 10 月 31 日 20:01
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db50`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `game_ranking_table`
--

CREATE TABLE IF NOT EXISTS `game_ranking_table` (
`id` int(12) NOT NULL,
  `number` int(12) NOT NULL,
  `mode` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ranking` int(12) NOT NULL,
  `score` int(12) NOT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `game_ranking_table`
--

INSERT INTO `game_ranking_table` (`id`, `number`, `mode`, `ranking`, `score`, `url`, `indate`) VALUES
(1, 1, 'normal', 14434, 606383, '', '2017-11-01 00:34:05'),
(2, 1, 'normal', 14434, 606383, '', '2017-11-01 00:34:44'),
(3, 6, 'normal', 14400, 606345, '', '2017-11-01 00:36:14'),
(4, 7, 'death', 3000, 890890, 'https://play.lobi.co/video/81ac7881a7f7410cf3424793f02d07b1b84bedfc', '2017-11-01 03:21:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_ranking_table`
--
ALTER TABLE `game_ranking_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_ranking_table`
--
ALTER TABLE `game_ranking_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
