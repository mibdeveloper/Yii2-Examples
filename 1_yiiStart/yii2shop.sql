-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 08 2015 г., 18:32
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii2shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL,
  `parentid` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`id`, `parentid`, `title`, `description`) VALUES
(10, NULL, 'Main 2', 'kjhgjhg'),
(13, NULL, 'Chil1', ';''lk;l;');

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `age` int(11) NOT NULL,
  `languages` set('uk','ru','en') NOT NULL DEFAULT 'uk'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `login`, `password`, `email`, `phone`, `gender`, `age`, `languages`) VALUES
(6, 'asdfgh', '123', 'jhgjgjhgj@dfgd.ty', '4567457465', 'male', 324, 'uk,en'),
(7, 'asdfgh', '213', 'jhgjgjhgj@dfgd.ty', '54674567', 'male', 234, 'uk,ru,en'),
(8, 'asdfgh'';lkj;lkj', 'ghf', 'jhgjgjhgj@dfgd.ty', '567', 'male', 12, 'uk'),
(9, 'дшгрш', 'длорлдор', 'jhgjgjhgj@dfgd.ty', '7865', 'female', 234, 'uk,ru,en'),
(10, 'asdfgh'';lkj;lkj', 'длор', 'jhgjgjhgj@dfgd.ty', '987', 'male', 78, 'uk'),
(11, 'asdfgh'';lkj;lkj', 'рпарп', 'jhgjgjhgj@dfgd.ty', '987', 'male', 78, 'uk'),
(12, 'asdfgh'';lkj;lkj', 'hgjgjhgj', 'jhgjgjhgj@dfgd.ty', '987', 'male', 78, 'uk'),
(13, 'jhgj', 'kjhkjhkj', 'jhgjgjhgj@dfgd.ty', '675', 'male', 54, 'uk,ru,en'),
(14, 'шгнегшнег', 'шгегшнешг', 'jhgjgjhgj@dfgd.ty', '987987987', 'female', 786, 'uk'),
(15, '123343454563465', '123', '123@123.we', '56', 'male', 45, 'uk'),
(16, '1234567890', '134567890', '123@123.we', '123456789', 'male', 1234, 'ru,en'),
(17, 'test1', 'test1', 'mibdeveloper@gmail.com', '322223', 'male', 13, 'uk,ru,en'),
(18, 'test3', 'test3', 'jhgjgjhgj@dfgd.ty', '675', 'male', 23, 'uk,en'),
(19, 'radchenko_vv', '123', 'mibdeveloper@gmail.com', '32223', 'male', 13, 'uk,ru,en');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`), ADD KEY `parentid` (`parentid`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Category`
--
ALTER TABLE `Category`
ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentid`) REFERENCES `Category` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
