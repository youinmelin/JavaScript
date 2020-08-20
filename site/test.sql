-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2020-08-19 07:55:51
-- 服务器版本: 5.6.48
-- PHP 版本: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `log_record`
--

CREATE TABLE IF NOT EXISTS `log_record` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `count` varchar(100) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `address` text,
  `client` text,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `other` text,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `log_record`
--

INSERT INTO `log_record` (`rid`, `count`, `ip`, `address`, `client`, `date`, `time`, `other`) VALUES
(1, '1121', '123.112.20.253', '北京市北京', 'NT6.1;Win64;x64;', '2020-08-18', '07:25:41', ''),
(2, '1122', '123.112.20.253', '北京市北京', 'NT6.1;Win64;x64;', '2020-08-18', '07:32:11', ''),
(3, '1123', '123.112.20.253', '北京市北京', 'NT6.1;Win64;x64;', '2020-08-18', '07:34:23', ''),
(4, '1124', '123.112.20.253', '北京市北京', 'NT6.1;Win64;x64;', '2020-08-18', '07:54:27', ''),
(5, '1125', '123.112.20.253', '北京市北京', 'NT6.1;Win64;x64;', '2020-08-18', '08:13:18', ''),
(6, '1126', '172.69.33.253', '加利福尼亚州洛杉矶', 'NT6.1;Win64;x64;', '2020-08-18', '11:41:40', ''),
(7, '1127', '108.162.215.154', '加利福尼亚州洛杉矶', 'NT6.1;Win64;x64;', '2020-08-18', '11:44:06', ''),
(8, '1128', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-18', '13:32:29', ''),
(9, '1129', '111.7.100.19', '河南郑州市', 'NT10.0;Win64;x64)', '2020-08-18', '21:20:52', ''),
(10, '1130', '111.7.100.19', '河南郑州市', 'NT10.0;Win64;x64)', '2020-08-18', '21:21:18', ''),
(11, '1131', '36.99.136.135', '河南颍川', 'NT10.0;Win64;x64)', '2020-08-18', '21:41:43', ''),
(12, '1132', '36.99.136.133', '河南颍川', 'NT10.0;Win64;x64)', '2020-08-18', '21:42:14', ''),
(13, '1133', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-18', '22:31:40', ''),
(14, '1134', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-18', '22:36:32', ''),
(15, '1135', '111.7.100.20', '河南郑州市', 'NT10.0;Win64;x64)', '2020-08-18', '23:08:25', ''),
(16, '1136', '47.103.83.107', '浙江省西湖', 'NT10.0;Win64;x64)', '2020-08-19', '00:46:52', ''),
(17, '1137', '47.103.83.107', '浙江省西湖', 'NT10.0;Win64;x64)', '2020-08-19', '00:46:53', ''),
(18, '1138', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-19', '01:25:01', ''),
(19, '1139', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-19', '01:25:06', ''),
(20, '1140', '111.7.100.18', '河南郑州市', 'NT10.0;Win64;x64)', '2020-08-19', '02:23:20', ''),
(21, '1141', '111.7.100.18', '河南郑州市', 'NT10.0;Win64;x64)', '2020-08-19', '02:23:49', ''),
(22, '1142', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-19', '05:35:03', ''),
(23, '1143', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-19', '05:35:04', ''),
(24, '1144', '47.103.86.249', '浙江省西湖', 'NT10.0;Win64;x64)', '2020-08-19', '06:50:54', ''),
(25, '1145', '47.103.86.249', '浙江省西湖', 'NT10.0;Win64;x64)', '2020-08-19', '06:50:54', ''),
(26, '1146', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-19', '06:56:39', ''),
(27, '1147', '120.244.152.49', '北京市北京', 'CPUiPhoneOS13_3_1', '2020-08-19', '07:02:07', ''),
(28, '1148', '123.112.20.253', '北京市北京', 'NT6.1;Win64;x64;', '2020-08-19', '07:53:45', '');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `message` text,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mid`, `ip`, `uname`, `message`, `date`, `time`) VALUES
(1, '1', '1', '你好', '2020-08-05', '11:15:04');

-- --------------------------------------------------------

--
-- 表的结构 `weather`
--

CREATE TABLE IF NOT EXISTS `weather` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `today` text,
  `tomorrow` text,
  `date` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `weather`
--

INSERT INTO `weather` (`wid`, `today`, `tomorrow`, `date`) VALUES
(1, '今天天气：多云,最高气温30,最低气温22,风力<3级', '明日天气：多云转阴,最高气温29,最低气温20,风力<3级', '2020-08-18'),
(2, '今天天气：阴,最高气温26,最低气温22,风力3-4级转<3级', '明日天气：小雨转多云,最高气温28,最低气温20,风力<3级', '2020-08-19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
