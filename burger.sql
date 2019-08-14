-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2019 г., 19:56
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `address` tinytext NOT NULL,
  `details` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_mail`, `address`, `details`) VALUES
(1, 'test@mail.ru', '123 123 213 123 123 213123 on on', '213123'),
(2, 'test@mail.ru', '123 123 213 123 123 213123 on', '213123'),
(3, 'test@mail.ru', '123 123 213 123 123', '213123'),
(4, 'test@mail.ru', '123 123 213 123 123 213123', '213123'),
(5, 'test@mail.ru', '123 123 213 123 123 213123', '213123'),
(6, 'test@mail.ru', '123 123 213 123 123 213123', '213123'),
(7, 'test@mail.ru', '123 123 213 123 123 213123', '213123'),
(8, 'test@mail.ru', '123 12312 123 213', ''),
(33, 'kek@mail.ru', 'Lol 1 2 3 4 Kek lol arbidol', 'Kek lol arbidol'),
(34, 'kek@mail.ru', 'Lol 1 2 3 4 Kek lol arbidol on on', 'Kek lol arbidol'),
(35, 'kek@mail.ru', 'Lol 1 2 3 4 Kek lol arbidol on on', 'Kek lol arbidol'),
(36, 'kek@mail.ru', 'Lol 1 2 3 4 Kek lol arbidol on on', 'Kek lol arbidol'),
(37, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(38, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(39, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(40, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(41, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(42, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(43, 'kek@mail.ru', 'Array', 'Kek lol arbidol'),
(44, 'kek@mail.ru', 'Lol 1 2 3 4', 'Kek lol arbidol'),
(45, 'mishana@kek.ru', 'Kekolol 1 2 3 4', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` tinytext NOT NULL,
  `number_of_oreder` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`email`, `name`, `phone`, `number_of_oreder`) VALUES
('kek@mail.ru', 'Tester', '+7 (123) 456 78 90', 12),
('mishana@kek.ru', 'Мишаня', '+7 (123) 123 12 31', 1),
('test@mail.ru', 'Test', '+7 (111) 232 13 11', 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_mail` (`user_mail`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_mail`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
