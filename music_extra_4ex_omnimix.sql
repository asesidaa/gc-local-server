-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-03-28 06:42:03
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
-- 表的结构 `music_extra`
--

CREATE TABLE IF NOT EXISTS `music_extra` (
  `music_id` int(11) NOT NULL,
  `use_flag` int(11) NOT NULL,
  PRIMARY KEY (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 插入之前先把表清空（truncate） `music_extra`
--

TRUNCATE TABLE `music_extra`;
--
-- 转存表中的数据 `music_extra`
--

INSERT INTO `music_extra` (`music_id`, `use_flag`) VALUES
(1, 1),
(23, 1),
(28, 1),
(33, 1),
(41, 1),
(43, 1),
(45, 1),
(50, 1),
(77, 1),
(85, 1),
(86, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(95, 1),
(101, 1),
(102, 1),
(106, 1),
(124, 1),
(134, 1),
(139, 1),
(140, 1),
(142, 1),
(151, 1),
(152, 1),
(159, 1),
(169, 1),
(184, 1),
(205, 1),
(208, 1),
(209, 1),
(231, 1),
(234, 1),
(238, 1),
(257, 1),
(260, 1),
(265, 1),
(274, 1),
(280, 1),
(281, 1),
(317, 1),
(318, 1),
(319, 1),
(321, 1),
(326, 1),
(336, 1),
(349, 1),
(351, 1),
(353, 1),
(357, 1),
(370, 1),
(374, 1),
(399, 1),
(410, 1),
(426, 1),
(427, 1),
(437, 1),
(440, 1),
(449, 1),
(450, 1),
(451, 1),
(455, 1),
(460, 1),
(465, 1),
(478, 1),
(486, 1),
(488, 1),
(497, 1),
(498, 1),
(502, 1),
(503, 1),
(505, 1),
(506, 1),
(510, 1),
(513, 1),
(515, 1),
(516, 1),
(520, 1),
(539, 1),
(540, 1),
(541, 1),
(544, 1),
(545, 1),
(546, 1),
(552, 1),
(556, 1),
(558, 1),
(561, 1),
(571, 1),
(574, 1),
(588, 1),
(609, 1),
(610, 1),
(612, 1),
(613, 1),
(617, 1),
(619, 1),
(624, 1),
(625, 1),
(627, 1),
(628, 1),
(629, 1),
(631, 1),
(632, 1),
(633, 1),
(634, 1),
(635, 1),
(636, 1),
(637, 1),
(638, 1),
(639, 1),
(640, 1),
(641, 1),
(642, 1),
(643, 1),
(646, 1),
(647, 1),
(648, 1),
(649, 1),
(655, 1),
(658, 1),
(659, 1),
(660, 1),
(661, 1),
(666, 1),
(667, 1),
(668, 1),
(669, 1),
(670, 1),
(671, 1),
(672, 1),
(673, 1),
(676, 1),
(679, 1),
(684, 1),
(685, 1),
(689, 1),
(690, 1),
(707, 1),
(713, 1),
(714, 1),
(723, 1),
(726, 1),
(727, 1),
(731, 1),
(735, 1),
(749, 1),
(754, 1),
(764, 1),
(769, 1),
(771, 1),
(778, 1),
(786, 1),
(787, 1),
(792, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;