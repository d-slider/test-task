-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 30 2022 г., 20:14
-- Версия сервера: 5.7.35-38
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cd79867_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Отзыв'),
(2, 'Предложение'),
(3, 'Жалоба'),
(4, 'Рекламация');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(10) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `feedback_text` varchar(255) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `feedback_FK_1` (`category_id`),
  KEY `feedback_FK_2` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_FK_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `feedback_FK_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
