-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 17 2017 г., 20:42
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `slon2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `price` float NOT NULL,
  `owner` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `storeys` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `area` float NOT NULL,
  `description` text NOT NULL,
  `source` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advert`
--

INSERT INTO `advert` (`id`, `address`, `name`, `phone`, `status`, `type`, `price`, `owner`, `floor`, `storeys`, `rooms`, `area`, `description`, `source`) VALUES
(1, 'Восстания 3', 'Тест 1', '89178588925', -1, 0, 100, 0, 1, 2, 3, 40.5, 'Апартаменты от агентства.', 'Агентство 1'),
(2, 'sdf', 'sdfsd', '123123', 1, 0, 123, 0, 2, 3, 23, 34, '234dsfsdf', 'sdfsdfd');

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rule` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `advert_id`, `status`, `created_at`, `rule`, `comment`) VALUES
(12, 1, 1, '2017-04-17 17:11:47', '', ''),
(13, 2, 1, '2017-04-17 17:35:33', '', ''),
(14, 1, 1, '2017-04-17 17:37:38', '', ''),
(15, 2, 1, '2017-04-17 17:37:38', '', ''),
(16, 1, -1, '2017-04-17 17:38:09', 'rules\\Blacklist', 'Номер телефона собственника находится в “черном списке”'),
(17, 2, 1, '2017-04-17 17:38:09', '', ''),
(18, 1, -1, '2017-04-17 17:40:28', 'rules\\Blacklist', 'Номер телефона собственника находится в “черном списке”'),
(19, 2, 1, '2017-04-17 17:40:28', '', ''),
(20, 1, -1, '2017-04-17 17:41:00', 'rules\\Blacklist', 'Номер телефона собственника находится в “черном списке”'),
(21, 1, -1, '2017-04-17 17:41:27', 'rules\\Blacklist', 'Номер телефона собственника находится в “черном списке”'),
(22, 2, 1, '2017-04-17 17:41:27', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
