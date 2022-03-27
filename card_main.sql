-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-03-27 10:24:41
-- 服务器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `2110_card`
--

-- --------------------------------------------------------

--
-- 表的结构 `card_main`
--

CREATE TABLE IF NOT EXISTS `card_main` (
  `card_id` varchar(16) NOT NULL,
  `player_name` text NOT NULL,
  `score_i1` int(11) NOT NULL,
  `fcol1` int(11) NOT NULL,
  `fcol2` int(11) NOT NULL,
  `fcol3` int(11) NOT NULL,
  `achieve_status` text NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY `card_id` (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 插入之前先把表清空（truncate） `card_main`
--

TRUNCATE TABLE `card_main`;
--
-- 转存表中的数据 `card_main`
--

INSERT INTO `card_main` (`card_id`, `player_name`, `score_i1`, `fcol1`, `fcol2`, `fcol3`, `achieve_status`, `created`, `updated`) VALUES
('7020392000147361', 'test2', 0, 0, 0, 45200, '0', 0, 0),
('7020392010281502', 'test0', 0, 0, 0, 45200, '0', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
