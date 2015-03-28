-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 27 2015 г., 14:18
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `masters`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL COMMENT 'Идентификатор',
  `title` varchar(255) NOT NULL COMMENT 'Название',
  `description` varchar(255) DEFAULT NULL COMMENT 'Описание',
  `link` varchar(255) NOT NULL DEFAULT '#' COMMENT 'Ссылка',
  `parent` int(11) DEFAULT NULL COMMENT 'Родитель',
  `active` tinyint(1) NOT NULL COMMENT 'Признак отображения',
  `navigator` tinyint(1) NOT NULL COMMENT 'Признак отображения в навигаторе'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='Категории товаров';

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `link`, `parent`, `active`, `navigator`) VALUES
(1, 'Подарки', 'Подарки', '#', NULL, 1, 1),
(2, 'Ювелирные изделия', 'Ювелирные изделия', '#', NULL, 1, 1),
(3, 'Дом и Сад', 'Дом и Сад', '#', NULL, 1, 1),
(4, 'Мебель', 'Мебель', '#', NULL, 1, 1),
(5, 'Авто и Мото', 'Авто и Мото', '#', NULL, 1, 1),
(6, 'Игрушки и Игры', 'Игрушки и Игры', '#', NULL, 1, 1),
(7, 'Искусство и Музыка', 'Искусство и Музыка', '#', NULL, 1, 1),
(8, 'Одежда, Обувь и Аксессуары', 'Одежда, Обувь и Аксессуары', '#', NULL, 1, 0),
(9, 'Свадьба и Особый Повод', 'Свадьба и Особый Повод', '#', NULL, 1, 0),
(10, 'Спорт и Хобби', 'Спорт и Хобби', '#', NULL, 1, 0),
(11, 'Специальные Коллекции', 'Специальные Коллекции', '#', NULL, 1, 0),
(12, 'Для нее', 'Для нее', '#', 1, 1, 0),
(13, 'Для него', 'Для него', '#', 1, 1, 0),
(14, 'Для мамы', 'Для мамы', '#', 1, 1, 0),
(15, 'Для папы', 'Для папы', '#', 1, 1, 0),
(16, 'Для ребенка', 'Для ребенка', '#', 1, 1, 0),
(17, 'Подарок до 1500 р.', 'Подарок до 1500 р.', '#', 1, 1, 0),
(18, 'Подарок до 3000 р.', 'Подарок до 3000 р.', '#', 1, 1, 0),
(19, 'Для модниц', 'Для модниц', '#', 1, 1, 0),
(20, 'Индивидуальный подарок', 'Индивидуальный подарок', '#', 1, 1, 0),
(21, 'Для гурмана', 'Для гурмана', '#', 1, 1, 0),
(22, 'Ювелирные', 'Ювелирные', '#', 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL COMMENT 'Идентификатор',
  `username` varchar(255) NOT NULL COMMENT 'Логин',
  `email` varchar(255) NOT NULL COMMENT 'Почта',
  `password` varchar(255) NOT NULL COMMENT 'Пароль',
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `cityId` int(11) NOT NULL COMMENT 'Идентификатор города',
  `isMaster` tinyint(1) NOT NULL COMMENT 'Признак, является ли пользователь мастером'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `cityId`, `isMaster`) VALUES
(1, 'ilya', 'bugsbunni@yandex.ru', 'gfhjkm', 'test1key', '1-token', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
