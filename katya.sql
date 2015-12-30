-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 30 2015 г., 10:08
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `katya`
--

-- --------------------------------------------------------

--
-- Структура таблицы `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `header` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `entry`
--

INSERT INTO `entry` (`id`, `header`, `data`, `content`) VALUES
(1, 'Название 1', '2015-12-29', 'Какой-то текст описывающий событие, которое произошло с Катериной 29-12-2015. '),
(2, 'Название 2', '2015-12-28', 'Какой-то текст описывающий событие, которое произошло с Катериной 28-12-2015. '),
(3, 'Название 3', '2015-12-27', 'Некоторый текст, описывающий событие 27-12-2015'),
(4, 'Название 4', '2015-12-26', 'Некоторый текст, описывающий событие 26-12-2015');

-- --------------------------------------------------------

--
-- Структура таблицы `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `thumbs` varchar(150) NOT NULL,
  `photos` varchar(150) NOT NULL,
  `entry_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
