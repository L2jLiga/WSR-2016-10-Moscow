SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE IF NOT EXISTS `Contacts` (
  `Adress` text,
  `phone` int(15) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `Contacts` (`Adress`, `phone`, `mail`, `title`) VALUES
('Некий адрес наш неизвестный', 2147483647, 'nnm@nm.nr', 'название отдела'),
(NULL, 83234321, NULL, 'Случайный номер информации');

DROP TABLE IF EXISTS `d`;
CREATE TABLE IF NOT EXISTS `d` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(3) unsigned NOT NULL,
  `text` text NOT NULL,
  `times` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `d` (`id`, `user_id`, `text`, `times`) VALUES
(2, 2, 'Ппав', '10.25.16 7:16'),
(3, 2, 'ыы', '10.25.16 7:16'),
(4, 2, 'Еще одна проверка', '10.25.16 7:18'),
(5, 2, 'авф', '10.25.16 7:19'),
(6, 2, 'аа', '10.25.16 7:19');

DROP TABLE IF EXISTS `shattle`;
CREATE TABLE IF NOT EXISTS `shattle` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `time` varchar(30) NOT NULL,
  `luxe` varchar(30) NOT NULL,
  `econom` varchar(250) NOT NULL,
  `zero` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `shattle` (`id`, `time`, `luxe`, `econom`, `zero`) VALUES
(1, '26.12.2020', '1-2,9-3,', '1-3,2-2,0-2,', '1-2,1-2,1-3,');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`,`mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `users` (`id`, `login`, `mail`, `passwd`, `hash`) VALUES
(1, 'user', 'user@user.ru', 'd6113d4d0052ef5831fc2ccd5740b9e7', '933b3021182d1cf69be7950ffce4bc8a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
