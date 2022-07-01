-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 01 2022 г., 16:35
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
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(0, 'Отзыв'),
(1, 'Предложение'),
(2, 'Жалоба'),
(3, 'Рекламация');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `feedback_text` text NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `feedback_FK_1` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `fio`, `email`, `category_id`, `feedback_text`) VALUES
(6, 'Иванов Иван Иванович', 'ivanov@yandex.ru', 1, 'Так держать!'),
(7, 'Петров Пётр Петрович', 'зуекщм@yandex.ru', 2, 'Плохо работаете!'),
(8, 'Сидоров Сидор Сидровоич', 'sidorov@yandex.ru', 3, 'Верните деньги!'),
(9, 'Акакий Акакиевич', 'akayevich@gmail.com', 0, 'Хорошая у вас компания.');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_FK_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
