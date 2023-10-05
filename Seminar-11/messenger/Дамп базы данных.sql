-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 05 2023 г., 22:38
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `messenger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `to_user_id`, `text`, `datetime`) VALUES
(1, 4, 1, 'Иван Андреевич, скажите, пожалуйста, вы когда родились?', '2023-10-01 10:00:00'),
(2, 1, 4, '13 февраля 1769 года', '2023-10-01 10:01:00'),
(3, 4, 1, 'Извините, пожалуйста, за нетактичный вопрос ) А когда вы умерли?', '2023-10-01 10:02:00'),
(4, 1, 4, 'Да ничего, нормальный вопрос. 21 ноября 1844 г. Мне было 75 лет.', '2023-10-01 10:03:00'),
(5, 4, 2, 'Антон Павлович, скажите, пожалуйста, когда вы родились?', '2023-10-01 10:05:00'),
(6, 2, 4, '29 января 1860 года. В Таганроге.', '2023-10-01 10:06:00'),
(7, 4, 2, 'Вы женаты?', '2023-10-01 10:07:00'),
(8, 2, 4, 'Да, я был в браке с Ольгой Книппер-Чеховой.', '2023-10-01 10:08:00'),
(9, 4, 3, 'Фёдор Михайлович, я собираюсь осилить ваше великое пятикнижие: \"Преступление и наказание\", \"Идиот\", \"Бесы\", \"Подросток\" и \"Братья Карамазовы\". Как вы на это смотрите?', '2023-10-02 11:00:00'),
(10, 3, 4, 'Ну что ж, давно нужно было, вам ведь уже сколько лет. Читайте на здоровье.', '2023-10-02 11:01:00'),
(11, 4, 3, 'Скажите, пожалуйста, какую-нибудь вашу крылатую фразу.', '2023-10-02 11:10:00'),
(12, 3, 4, 'Влюбиться, еще не значит любить… Влюбиться можно и ненавидя.', '2023-10-02 11:11:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Иван Крылов'),
(2, 'Антон Павлович Чехов'),
(3, 'Фёдор Достоевский'),
(4, 'Максим Бобков');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
