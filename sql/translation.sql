-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-07-02 15:36:45
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `translation`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `name` varchar(80) NOT NULL,
  `content` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`name`, `content`) VALUES
('', 0x504850b2a2b2bbcac7cac0bde7c9cfd7eebac3b5c4d3efd1d4),
('', 0x504850b2a2b2bbcac7cac0bde7c9cfd7eebac3b5c4d3efd1d4),
('', 0x504850b2a2b2bbcac7cac0bde7c9cfd7eebac3b5c4d3efd1d4),
('', 0x504850b2a2b2bbcac7cac0bde7c9cfd7eebac3b5c4d3efd1d4),
('什么.txt', 0x504850b2a2b2bbcac7cac0bde7c9cfd7eebac3b5c4d3efd1d4),
('什么.txt', 0x504850b2a2b2bbcac7cac0bde7c9cfd7eebac3b5c4d3efd1d4);

-- --------------------------------------------------------

--
-- 表的结构 `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `word` varchar(30) NOT NULL,
  `chara` char(5) NOT NULL,
  `interpretation` varchar(50) NOT NULL,
  `pronounction` varchar(20) DEFAULT NULL,
  `difficulty` varchar(20) DEFAULT NULL,
  `engexpl` varchar(1000) DEFAULT NULL,
  `chsexpl` varchar(500) DEFAULT NULL,
  `picture` varbinary(4096) DEFAULT NULL,
  PRIMARY KEY (`word`,`chara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `note`
--

INSERT INTO `note` (`word`, `chara`, `interpretation`, `pronounction`, `difficulty`, `engexpl`, `chsexpl`, `picture`) VALUES
('analyze', 'v.', '分析', '[‘ænə,laɪz]', 'middle', 'How do you analyze this change?', '你该如何分析这种变化？', ''),
('apple', 'n.', '苹果', '[‘æp(ə)l]', 'easy', 'I have an apple.', '我有一颗苹果。', ''),
('Marvel', 'n.', '漫威', '[‘mɑːv(ə)l]', 'middle', 'Marvel Studios has assembled the Avengers.', '漫威召集了众多复仇者。', 0xe5beaee4bfa1e59bbee789875f32303139303632383136313031372e706e67);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(18) NOT NULL,
  `password` varchar(18) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('max', '123456789'),
('agnes', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `vocabulary`
--

DROP TABLE IF EXISTS `vocabulary`;
CREATE TABLE IF NOT EXISTS `vocabulary` (
  `word` varchar(30) NOT NULL,
  `chara` char(5) NOT NULL,
  `interpretation` varchar(50) NOT NULL,
  `pronounction` varchar(20) DEFAULT NULL,
  `difficulty` varchar(20) DEFAULT NULL,
  `engexpl` varchar(1000) DEFAULT NULL,
  `chsexpl` varchar(500) DEFAULT NULL,
  `picture` varbinary(4096) DEFAULT NULL,
  PRIMARY KEY (`word`,`chara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vocabulary`
--

INSERT INTO `vocabulary` (`word`, `chara`, `interpretation`, `pronounction`, `difficulty`, `engexpl`, `chsexpl`, `picture`) VALUES
('Marvel', 'n.', '漫威', '[‘mɑːv(ə)l]', 'middle', 'Marvel Studios has assembled the Avengers.', '漫威召集了众多复仇者。', 0xe5beaee4bfa1e59bbee789875f32303139303632383136313031372e706e67),
('analyze', 'v.', '分析', '[‘ænə,laɪz]', 'middle', 'How do you analyze this change?', '你该如何分析这种变化？', ''),
('spider', 'n.', '蜘蛛', '[‘spaɪdɚ]', 'easy', 'Peter Parker is spider man.(Is it something wrong?)', 'Peter Parker 是蜘蛛侠。（我是不是说错话了？）', ''),
('apple', 'n.', '苹果', '[‘æp(ə)l]', 'easy', 'I have an apple.', '我有一颗苹果。', ''),
('Spider Man', 'n.', '蜘蛛侠', '[‘spaɪdɚmæn]', 'middle', 'Peter Parker is Spider Man.(Is it something wrong?)', 'Peter Parker 是蜘蛛侠。（我是不是说错话了？）', ''),
('damn', 'adj.', '***(粗口)', '[dæm]', 'easy', 'Damn it！', '该死！', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
