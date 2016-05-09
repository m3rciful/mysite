-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 27 2016 г., 01:36
-- Версия сервера: 5.5.47-0+deb8u1
-- Версия PHP: 5.6.19-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mysite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`id` int(11) NOT NULL,
  `street` varchar(40) NOT NULL,
  `house` varchar(10) NOT NULL,
  `room` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `address`
--

REPLACE INTO `address` (`id`, `street`, `house`, `room`, `city_id`) VALUES
(1, 'Jaama', '4', 12, 1),
(2, 'Soo', '2', 5, 1),
(3, 'Kutse', '13', 245, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

REPLACE INTO `city` (`id`, `name`, `country_id`) VALUES
(1, 'Narva', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

REPLACE INTO `country` (`id`, `name`) VALUES
(1, 'Estonia');

-- --------------------------------------------------------

--
-- Структура таблицы `curator`
--

CREATE TABLE IF NOT EXISTS `curator` (
`id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `curator`
--

REPLACE INTO `curator` (`id`, `teacher_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 1, 2),
(4, 0, 1),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE IF NOT EXISTS `group` (
`id` int(11) NOT NULL,
  `abbreviation` varchar(7) NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `begin_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL,
  `begin_month` int(11) NOT NULL,
  `end_month` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group`
--

REPLACE INTO `group` (`id`, `abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month`) VALUES
(1, 'PTVR', 'Tarkvaraarendaja', 2015, 2018, 9, 6),
(2, 'KTVR', 'Tarkvaraarendaja', 2015, 2017, 9, 6),
(3, 'PTAR', 'Andmebaaside haldus', 2014, 2016, 9, 6),
(4, 'KTAR', 'Tarkvaraandmebaaside haldus', 2010, 2013, 9, 6),
(6, 'PASR', 'Automaatika', 2013, 2016, 9, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `author` varchar(40) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `pages`
--

REPLACE INTO `pages` (`id`, `date`, `author`, `title`, `content`) VALUES
(2, '2015-12-15 22:03:54', '', 'Первая', 'текст текст'),
(7, '2015-12-15 23:19:37', 'Админ', 'Вторая статья', 'Текст второй статьи'),
(9, '2015-12-16 00:00:07', 'Дюдя', 'Третья запись', 'Текст третьей статьи'),
(11, '2015-12-16 01:21:00', 'Dew', 'Четвертая запись', 'Текст четвертой записи (обновленный)');

-- --------------------------------------------------------

--
-- Структура таблицы `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
`id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `code` varchar(11) NOT NULL,
  `eban` varchar(40) NOT NULL,
  `bankname` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `person`
--

REPLACE INTO `person` (`id`, `name`, `surname`, `code`, `eban`, `bankname`) VALUES
(1, 'Juri', 'Melnikov', '37012122234', 'EE22409348539045304', 'Swedpank'),
(2, 'Aleksandr', 'Saas', '37905232212', 'EE224850373649298384', 'Swedpank'),
(3, 'Sergei', 'Novitskov', '38011031132', 'EE2249503945345927', 'SEB'),
(4, 'Oleg', 'Dubobtsky', '37012132214', 'EE2343456754675645', 'Nordipank');

-- --------------------------------------------------------

--
-- Структура таблицы `person_address`
--

CREATE TABLE IF NOT EXISTS `person_address` (
`id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `person_address`
--

REPLACE INTO `person_address` (`id`, `person_id`, `address_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `person_telephones`
--

CREATE TABLE IF NOT EXISTS `person_telephones` (
`id` int(11) NOT NULL,
  `telephone_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `registry` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `student`
--

REPLACE INTO `student` (`id`, `registry`, `group_id`, `person_id`, `address_id`) VALUES
(1, 1234, 1, 2, 1),
(2, 1235, 1, 4, 2),
(3, 1236, 3, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `student_parents`
--

CREATE TABLE IF NOT EXISTS `student_parents` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher`
--

REPLACE INTO `teacher` (`id`, `person_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `telefon`
--

CREATE TABLE IF NOT EXISTS `telefon` (
`id` int(11) NOT NULL,
  `telephone_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`id`), ADD KEY `city_id` (`city_id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`), ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `curator`
--
ALTER TABLE `curator`
 ADD PRIMARY KEY (`id`), ADD KEY `id_teacher` (`teacher_id`), ADD KEY `id_group` (`group_id`), ADD KEY `id_teacher_2` (`teacher_id`), ADD KEY `id_group_2` (`group_id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
 ADD PRIMARY KEY (`id`), ADD KEY `groupname` (`groupname`);

--
-- Индексы таблицы `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `parent`
--
ALTER TABLE `parent`
 ADD PRIMARY KEY (`id`), ADD KEY `person_id` (`person_id`,`address_id`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `person_address`
--
ALTER TABLE `person_address`
 ADD PRIMARY KEY (`id`), ADD KEY `person_id` (`person_id`,`address_id`);

--
-- Индексы таблицы `person_telephones`
--
ALTER TABLE `person_telephones`
 ADD PRIMARY KEY (`id`), ADD KEY `telephone_id` (`telephone_id`), ADD KEY `person_id` (`person_id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`), ADD KEY `groupname` (`group_id`), ADD KEY `group_id` (`group_id`), ADD KEY `group_id_2` (`group_id`), ADD KEY `person_id` (`person_id`), ADD KEY `address_id` (`address_id`);

--
-- Индексы таблицы `student_parents`
--
ALTER TABLE `student_parents`
 ADD PRIMARY KEY (`id`), ADD KEY `student_id` (`student_id`,`parent_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`id`), ADD KEY `person_id` (`person_id`), ADD KEY `person_id_2` (`person_id`);

--
-- Индексы таблицы `telefon`
--
ALTER TABLE `telefon`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `curator`
--
ALTER TABLE `curator`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `modul`
--
ALTER TABLE `modul`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `parent`
--
ALTER TABLE `parent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `person_address`
--
ALTER TABLE `person_address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `person_telephones`
--
ALTER TABLE `person_telephones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `student_parents`
--
ALTER TABLE `student_parents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `telefon`
--
ALTER TABLE `telefon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `curator`
--
ALTER TABLE `curator`
ADD CONSTRAINT `curator_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);

--
-- Ограничения внешнего ключа таблицы `person_telephones`
--
ALTER TABLE `person_telephones`
ADD CONSTRAINT `person_telephones_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
ADD CONSTRAINT `person_telephones_ibfk_2` FOREIGN KEY (`telephone_id`) REFERENCES `telefon` (`id`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);

--
-- Ограничения внешнего ключа таблицы `teacher`
--
ALTER TABLE `teacher`
ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
