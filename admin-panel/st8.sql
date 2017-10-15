-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 26 2016 г., 15:16
-- Версия сервера: 5.5.47
-- Версия PHP: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `st8`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `passwd`, `hash`) VALUES
(1, 'admin', 'eb2075d261b54ca9ee1009b644343ffe', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE IF NOT EXISTS `Contacts` (
  `Adress` text,
  `phone` int(15) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Contacts`
--

INSERT INTO `Contacts` (`Adress`, `phone`, `mail`, `title`) VALUES
('Некий адрес наш неизвестный', 2147483647, 'nnm@nm.nr', 'название отдела'),
(NULL, 83234321, NULL, 'Случайный номер информации');

-- --------------------------------------------------------

--
-- Структура таблицы `d`
--

DROP TABLE IF EXISTS `d`;
CREATE TABLE IF NOT EXISTS `d` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(3) unsigned NOT NULL,
  `text` text NOT NULL,
  `times` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `d`
--

INSERT INTO `d` (`id`, `user_id`, `text`, `times`) VALUES
(2, 2, 'Ппав', '10.25.16 7:16'),
(3, 2, 'Большой, длинный, хороший комментарий<br/>В нем учитываются всякие там переносы и подобное<br />Так что он хорошо демонстрирует как оно будет выглядеть при нормальных комментариях, а не "ЫЫЫ"', '10.25.16 7:16'),
(5, 2, 'авф', '10.25.16 7:19'),
(6, 2, 'аа', '10.25.16 7:19');

-- --------------------------------------------------------

--
-- Структура таблицы `shattle`
--

DROP TABLE IF EXISTS `shattle`;
CREATE TABLE IF NOT EXISTS `shattle` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(30) NOT NULL,
  `luxe` varchar(30) NOT NULL,
  `econom` varchar(250) NOT NULL,
  `zero` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `shattle`
--

INSERT INTO `shattle` (`id`, `time`, `luxe`, `econom`, `zero`) VALUES
(1, '23.11.5412', '1-2,-,6-1,', '-,42-2,0-2,', '-,3-2,'),
(8, '26.10.2016', '', '', ''),
(6, '26.10.2021', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `mail`, `passwd`, `hash`) VALUES
(2, 'user', 'user@user.ru', 'd6113d4d0052ef5831fc2ccd5740b9e7', 'e2e37cde6c315d0df7ffde1db198bd0b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
