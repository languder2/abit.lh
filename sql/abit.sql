-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 20 2024 г., 15:31
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `abit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `edForms`
--

CREATE TABLE `edForms` (
  `code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sort` int NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `edForms`
--

INSERT INTO `edForms` (`code`, `name`, `sort`) VALUES
('Full', 'Очная', 1),
('FullPart', 'Очно-заочная', 3),
('Part', 'Заочная', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `edLevels`
--

CREATE TABLE `edLevels` (
  `code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sort` int NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `edLevels`
--

INSERT INTO `edLevels` (`code`, `name`, `sort`) VALUES
('bachelor', 'Бакалавриат', 2),
('magistracy', 'Магистратура', 4),
('postgraduate', 'Аспирантура', 5),
('specialty', 'Специалитет', 3),
('сolleges', 'Колледжи', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `edProfiles`
--

CREATE TABLE `edProfiles` (
  `id` int NOT NULL,
  `code` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `forms` json DEFAULT NULL,
  `type` int DEFAULT NULL,
  `places` json DEFAULT NULL,
  `prices` json DEFAULT NULL,
  `duration` json DEFAULT NULL,
  `display` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `edProfiles`
--

INSERT INTO `edProfiles` (`id`, `code`, `name`, `level`, `forms`, `type`, `places`, `prices`, `duration`, `display`) VALUES
(1, '35.02.01', 'Агрономия', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"90900\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(2, '15.02.17', 'Монтаж, техническое обслуживание, эксплуатация и ремонт промышленного оборудования (по отраслям)', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"95790\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(3, '19.02.11', 'Технология продуктов питания из растительного сырья', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"71200\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(4, '21.02.19', 'Землеустройство', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"128300\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(5, '25.02.08', 'Эксплуатация беспилотных авиационных систем', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"78100\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(6, '35.02.16', 'Эксплуатация и ремонт сельскохозяйственной техники и оборудования', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"73500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(7, '36.02.01', 'Ветеринария', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"79500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(8, '38.02.01', 'Экономика и бухгалтерский учет (по отраслям)', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"81500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(9, '38.02.06', 'Финансы', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"80000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(10, '39.02.01', 'Социальная работа', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"46000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(11, '40.02.04', 'Юриспруденция', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"63000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(12, '43.02.16', 'Туризм и гостеприимство', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"74500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(13, '44.02.01', 'Дошкольное образование', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"62500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(14, '44.02.02', 'Преподавание в начальных классах', 'сolleges', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"56000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(15, '02.03.02', 'Фундаментальная информатика и информационные Технологии (Профиль: Программирование и информационные технологии)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"40\", \"Part\": null, \"FullPart\": \"20\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"109000\", \"Part\": null, \"FullPart\": \"47000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(16, '04.03.01', 'Химия (Профиль: Химическая экспертиза и химический анализ в криминалистике)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"82600\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(17, '05.03.06', 'Экология и природопользование (Профиль: Экология и природопользование)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"87500\", \"Part\": \"31000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(18, '06.03.01', 'Биология (Профиль: Биомедицина с основами физической реабилитации)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"35\", \"Part\": null, \"FullPart\": \"20\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"108500\", \"Part\": null, \"FullPart\": \"38000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(19, '10.03.01', 'Информационная безопасность (Профиль: Безопасность компьютерных систем)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"106500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(20, '13.03.02', 'Электроэнергетика и электротехника (Профиль: Электроэнергетика, электротехника и электромеханика', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"50\", \"Part\": \"80\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"96500\", \"Part\": \"49000\", \"FullPart\": \"47000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(21, '15.03.02', 'Технологические машины и оборудование (Профиль: Компьютерный инжиниринг пищевых производств)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"18\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"81600\", \"Part\": \"16900\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(22, '15.03.03', 'Прикладная механика (Профиль: Компьютерное проектирование и дизайн)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"42\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"99800\", \"Part\": \"28000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(23, '15.03.03', 'Прикладная механика (Профиль: Проектно конструкторское обеспечение в машиностроении)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"18\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"82000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(24, '15.03.03', 'Прикладная механика (Профиль: Цифровые двойники изделий)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"103230\", \"Part\": \"32000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(25, '15.03.06', 'Мехатроника и робототехника (Профиль: Мехатронные и роботизированные технологические системы и комплексы)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"102000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(26, '19.03.01', 'Биотехнологии (Профиль: Биохимия и биотехнологии)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"82000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(27, '19.03.02', 'Продукты питания из растительного сырья (Профиль: Технология пищевых продуктов общего и специального назначения)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(28, '19.03.04', 'Технология продукции и организация общественного питания (Профиль: Технология продукции и управление деятельностью гостиниц и ресторанов)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"96000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(29, '20.03.01', 'Техносферная безопасность (Профиль: Безопасность труда)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"30\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"119000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(30, '23.03.03', 'Эксплуатация транспортно - технологических машин и комплексов (Профиль: Эксплуатация транспортно -технологических машин и комплексов)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"118000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(31, '34.03.01', 'Сестринское дело (Профиль: Медико - организационная и педагогическая деятельность в сфере здравоохранения)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"108500\", \"Part\": null, \"FullPart\": \"38000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(32, '35.03.01', 'Лесное дело (Профиль: Лесное и лесопарковое хозяйство)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"82000\", \"Part\": \"14300\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(33, '35.03.03', 'Агрохимия и агропочвоведение (Профиль: Агрохимия и агропочвоведение)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"119000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(34, '35.03.04', 'Агрономия (Профиль: Агрономия)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"119000\", \"Part\": \"30000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(35, '35.03.04', 'Садоводство (Профиль: Плодоводство, овощеводство, виноградарство )', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"119000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(36, '35.03.04', 'Агроинженерия (Профиль: Технические системы в агробизнесе', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"43\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"119000\", \"Part\": \"14300\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(37, '35.03.08', 'Водные ресурсы и аквакультура (Профиль: Водные ресурсы и Аквакультура)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"82000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(38, '35.03.10', 'Ландшафтная архитектура (Профиль: Ландшафтное проектирование)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"109000\", \"Part\": \"14300\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(39, '37.03.01', 'Психология (Профиль: Психология)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"40\", \"Part\": \"25\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"111000\", \"Part\": null, \"FullPart\": \"50000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(40, '38.03.01', 'Экономика (Профиль: Учет, анализ и аудит)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": \"15\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"112000\", \"Part\": null, \"FullPart\": \"51000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(41, '38.03.01', 'Экономика (Профиль: Финансы и кредит)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": \"15\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"112000\", \"Part\": null, \"FullPart\": \"51000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(42, '38.03.01', 'Экономика (Профиль: Цифровая экономика)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": null, \"FullPart\": \"10\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"112000\", \"Part\": null, \"FullPart\": \"57000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(43, '38.03.01', 'Экономика (Профиль: Экономика агропромышленного комплекса)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": null, \"FullPart\": \"10\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"112000\", \"Part\": null, \"FullPart\": \"51000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(44, '38.03.01', 'Экономика (Профиль: Экономика предприятий и организаций)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": null, \"FullPart\": \"10\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"112000\", \"Part\": null, \"FullPart\": \"51000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(45, '38.03.02', 'Менеджмент (Профиль: Менеджмент предприятий и организаций)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"30\", \"Part\": null, \"FullPart\": \"35\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"112000\", \"Part\": null, \"FullPart\": \"62000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(46, '38.03.04', 'Государственное и муниципальное управление (Профиль: Государственное и муниципальное управление)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"35\", \"Part\": null, \"FullPart\": \"40\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"116000\", \"Part\": null, \"FullPart\": \"62000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(47, '38.03.06', 'Торговое дело (Профиль: Маркетинг)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"40\", \"Part\": null, \"FullPart\": \"20\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"102000\", \"Part\": null, \"FullPart\": \"35000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(48, '39.03.02', 'Социальная работа (Профиль: Социальная работа и социальное предпринимательство)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"35\", \"Part\": null, \"FullPart\": \"15\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"82000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(49, '39.03.03', 'Организация работы с молодежью (Профиль: Организация работы с молодежью)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"88000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(50, '40.03.01', 'Юриспруденция (Государственно -правовой профиль', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": \"15\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"106000\", \"Part\": null, \"FullPart\": \"42000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(51, '40.03.01', 'Юриспруденция (Гражданско -правовой профиль)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": \"20\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"106000\", \"Part\": null, \"FullPart\": \"42000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(52, '40.03.01', 'Юриспруденция (Уголовно -правовой профиль)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": \"15\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"106000\", \"Part\": null, \"FullPart\": \"42000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(53, '42.03.05', 'Медиакоммуникации (Профиль: Медиакоммуникации в коммерческой и социальной сфере)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"75000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(54, '43.03.02', 'Туризм (Профиль: Технология и организация услуг на предприятиях индустрии туризма)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"104000\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(55, '44.03.01', 'Педагогическое образование (Профиль: Дошкольное образование)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": null, \"FullPart\": \"35000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(56, '44.03.01', 'Педагогическое образование (Профиль: Начальное образование)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(57, '44.03.01', 'Педагогическое образование (Профиль: Музыка)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"30000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(58, '44.03.01', 'Педагогическое образование (Профиль: Дополнительное образование в области хореографического искусства)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"30000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(59, '44.03.01', 'Педагогическое образование (Профиль: Физическая культура)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"45\", \"Part\": \"26\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(60, '44.03.02', 'Психолого -педагогическое образование (Профиль: Психология и социальная педагогика)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"30\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"91000\", \"Part\": \"23000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(61, '44.03.03', 'Специальное (дефектологическое) образование (Профиль: Логопедия)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"91000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(62, '44.03.04', 'Профессиональное обучение (по отраслям). Профиль: Информатика и вычислительная техника', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"91000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(63, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Дошкольное образование. Логопедия)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"35000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(64, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Дошкольное образование. Начальное образование)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": \"35000\", \"FullPart\": \"47000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(65, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Начальное образование. Иностранный язык )', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"93000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(66, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: История и обществознание)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(67, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Физика и математика)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": null, \"FullPart\": \"25000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(68, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Математика и информатика)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": null, \"FullPart\": \"20000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(69, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Иностранный язык (английский). Иностранный язык (немецкий))', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(70, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Иностранный язык (английский). Информатика)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(71, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Русский язык и литература)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(72, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Русский язык и иностранный язык)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(73, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Биология. Безопасность жизнедеятельности)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"20000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(74, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Химия. Биология)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"16\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"80000\", \"Part\": \"20000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(75, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: Биология. Психология)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"20000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(76, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: География. Физическая культура)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"30\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"20000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(77, '44.03.05', 'Педагогическое образование (с двумя профилями подготовки) (Профили: География. Экология)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"84500\", \"Part\": \"20000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(78, '45.03.02', 'Лингвистика (Профиль: Перевод и переводоведение)', 'bachelor', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"78000\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(79, '46.03.01', 'История (Профиль: История и археология)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"72000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(80, '52.03.01', 'Хореографическое искусство (Профиль: Искусство балетмейстера)', 'bachelor', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"17\", \"Part\": \"5\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"100000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.5\", \"FullPart\": \"4.5\"}', '1'),
(81, '38.05.01', 'Экономическая безопасность (Профиль: Экономико -правовое обеспечение экономической безопасности', 'specialty', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": \"25\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"97000\", \"Part\": \"68000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(82, '40.05.01', 'Правовое обеспечение национальной безопасности (Профиль: Гражданско -правовая специализация)', 'specialty', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"97000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(83, '02.04.02', 'Фундаментальная информатика и информационные Технологии (Профиль: Программирование и информационные технологии)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": \"12\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"110000\", \"Part\": null, \"FullPart\": \"42000\"}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(84, '04.04.01', 'Химия (Профиль: Химическая экспертиза и химический анализ в криминалистике)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"122000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(85, '05.04.06', 'Экология и природопользование (Профиль: Экология и природопользование)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"100000\", \"Part\": \"32000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(86, '06.04.01', 'Биология (Профиль: Биологические основы физической реабилитации)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"126000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(87, '06.04.01', 'Биология (Профиль: Организационно управленческая деятельность в сфере здравоохранения)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"126000\", \"Part\": null, \"FullPart\": \"32000\"}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(88, '10.04.01', 'Информационная безопасность (Профиль: Безопасность компьютерных систем)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": \"18\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"133000\", \"Part\": null, \"FullPart\": \"44000\"}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(89, '13.04.02', 'Электроэнергетика и электротехника (Профиль: Электроэнергетика, электротехника и электромеханика', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"25\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"140000\", \"Part\": \"52000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(90, '15.04.02', 'Технологические машины и оборудование (Профиль: Компьютерный инжиниринг пищевых производств)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"90000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(91, '15.04.03', 'Прикладная механика (Профиль: Компьютерный инжиниринг и вычислительная механика)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"140000\", \"Part\": \"30000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(92, '19.04.01', 'Биотехнологии (Профиль: Биохимия и биотехнологии)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"85000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(93, '19.04.02', 'Продукты питания из растительного сырья (Профиль: Организация, ведение и проектирование технологий пищевых продуктов)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"106000\", \"Part\": \"43000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(94, '19.04.04', 'Технология продукции и организация общественного питания (Профиль: Стратегическое управление предприятиями сферы гостеприимства и общественного питания', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"110000\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(95, '20.04.01', 'Техносферная безопасность (Профиль: Управление безопасностью труда)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"121000\", \"Part\": \"45000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(96, '35.04.01', 'Лесное дело (Профиль: Лесное и лесопарковое хозяйство)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"80000\", \"Part\": \"27000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(97, '35.04.04', 'Агрономия (Профиль: Агрономия)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"125000\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(98, '35.04.06', 'Агроинженерия (Профиль: Технические системы в агробизнесе)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": \"25\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"124000\", \"Part\": \"34000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(99, '35.04.09', 'Ландшафтная архитектура (Профиль: Ландшафтное проектирование )', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"80000\", \"Part\": \"38000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(100, '37.04.01', 'Психология (Профиль: Практическая психология)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": null, \"FullPart\": \"15\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"125000\", \"Part\": null, \"FullPart\": \"60000\"}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(101, '38.04.01', 'Экономика (Профиль: Учет, анализ и аудит)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"101500\", \"Part\": \"41000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(102, '38.04.01', 'Экономика (Профиль: Экономика предприятий и организаций)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"101500\", \"Part\": \"51000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(103, '38.04.02', 'Менеджмент (Профиль: Менеджмент предприятий и организаций)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"113500\", \"Part\": \"61000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(104, '38.04.04', 'Государственное и муниципальное управление (Профиль: Государственное и муниципальное управление)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"25\", \"Part\": \"50\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"130500\", \"Part\": \"85000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(105, '38.04.06', 'Торговое дело (Профиль: Маркетинг)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"101500\", \"Part\": \"51000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(106, '38.04.08', 'Финансы и кредит (Профиль: Финансы и кредит)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"10\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"114000\", \"Part\": \"61000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(107, '39.04.02', 'Социальная работа (Профиль: Менеджмент в социальной сфере)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"102000\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(108, '30.04.03', 'Организация работы с молодежью (Профиль: Межнациональные отношения и профилактика экстремизма в молодежной среде)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": null, \"Part\": \"5\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"114000\", \"Part\": \"40000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(109, '40.04.01', 'Юриспруденция (Профиль: Юриспруденция)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"50\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"114000\", \"Part\": \"61000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(110, '43.04.02', 'Туризм (Профиль: Организация стратегического управления предприятиями туристической сферы)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"101500\", \"Part\": \"46000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(111, '44.04.01', 'Педагогическое образование (Профиль: Дошкольное образование', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": \"18\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(112, '44.04.01', 'Педагогическое образование (Профиль: Начальное образование)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"20\", \"Part\": \"19\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(113, '44.04.01', 'Педагогическое образование (Профиль: Музыкальное образование)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(114, '44.04.01', 'Педагогическое образование (Профиль: Управление образовательной организацией)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"104000\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(115, '44.04.01', 'Педагогическое образование (Профиль: История)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"50000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(116, '44.04.01', 'Педагогическое образование (Профиль: Теория спорта и технологии спортивной подготовки)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"28\", \"Part\": \"25\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"90000\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1');
INSERT INTO `edProfiles` (`id`, `code`, `name`, `level`, `forms`, `type`, `places`, `prices`, `duration`, `display`) VALUES
(117, '44.04.01', 'Педагогическое образование (Профиль: Технологии обучения в физико -математическом образовании )', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(118, '44.04.01', 'Педагогическое образование (Профиль: Инновационные технологии подготовки учителя в образовательной области «Математика и информатика»)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(119, '44.04.01', 'Педагогическое образовании (Профиль: Преподавание иностранных языков и проектирование в иноязычном образовании)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(120, '44.04.01', 'Педагогическое образование (Профиль: Биология и психология в системе образования)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"10\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(121, '44.04.01', 'Педагогическое образование (Профиль: Проектирование педагогических систем в биологическом и химическом образовании)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(122, '44.04.01', 'Педагогическое образование (Профиль: Теория и практика географического образования и экологического просвещения)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(123, '44.04.01', 'Педагогическое образование (Профиль: Географическое образование и физическая культура)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"15\", \"Part\": \"15\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(124, '44.04.01', 'Педагогическое образование (Профиль: Русский язык и литература)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"20\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"86500\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(125, '44.04.02', 'Психолого -педагогическое образование (Профиль: Психология и социальная педагогика)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"90000\", \"Part\": \"48000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(126, '44.04.03', 'Специальное (дефектологическое) образование (Профиль: Логопедия)', 'magistracy', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"90000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(127, '45.04.02', 'Лингвистика (Профиль: Перевод и переводоведение)', 'magistracy', '{\"Full\": 1, \"Part\": 1, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"12\", \"Part\": \"12\", \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"101500\", \"Part\": \"55000\", \"FullPart\": null}', '{\"Full\": \"2.0\", \"Part\": \"2.5\", \"FullPart\": \"2.5\"}', '1'),
(128, '1.5.9', 'Ботаника', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"2\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(129, '1.5.15 ', 'Экология', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(130, '2.4.4', 'Электротехнология и электрофизика', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"2\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"130000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(131, '4.1.1', 'Общее земледелие и растениеводство', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 1}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": \"0\"}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": \"47000\"}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(132, '2.5.21', 'Машины, агрегаты и технологические процессы', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"2\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"130000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(133, '5.1.1', 'Теоретико-исторические правовые науки', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(134, '5.1.2', 'Публично-правовые (государственно-правовые) науки', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(135, '5.1.3', 'Частноправовые (цивилистические) науки', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(136, '5.1.4', 'Уголовно-правовые науки', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"1\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(137, '5.2.3', 'Региональная и отраслевая экономика', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"4\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(138, '5.2.4', 'Финансы', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"2\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(139, '5.6.1', 'Отечественная история', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"5\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(140, '5.6.5', 'Историография, источниковедение, методы исторического исследования', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(141, '5.6.7', 'История международных отношений и внешней политики', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"0\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(142, '5.8.1', 'Общая педагогика, история педагогики и образования', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"2\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(143, '5.8.2', 'Теория и методика обучения и воспитания (по областям и уровням образования)', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"5\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(144, '5.8.3', 'Коррекционная педагогика', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"2\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1'),
(145, '5.8.7', 'Методология и технология профессионального образования', 'postgraduate', '{\"Full\": 1, \"Part\": 0, \"FullPart\": 0}', 1, '{\"budget\": {\"Full\": \"3\", \"Part\": null, \"FullPart\": null}, \"contract\": {\"Full\": null, \"Part\": null, \"FullPart\": null}}', '{\"Full\": \"141000\", \"Part\": null, \"FullPart\": null}', '{\"Full\": \"4.0\", \"Part\": \"4.0\", \"FullPart\": \"4.0\"}', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `edTypes`
--

CREATE TABLE `edTypes` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `edTypes`
--

INSERT INTO `edTypes` (`id`, `name`) VALUES
(1, 'Направление подготовки'),
(2, 'Специальность');

-- --------------------------------------------------------

--
-- Структура таблицы `examSubjects`
--

CREATE TABLE `examSubjects` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `examSubjects`
--

INSERT INTO `examSubjects` (`id`, `name`) VALUES
(1, 'exam1'),
(2, 'exam2'),
(3, 'exam3'),
(4, 'exam4'),
(5, 'exam5'),
(6, 'exam6'),
(7, 'exam7'),
(8, 'exam8'),
(9, 'exam9'),
(10, 'exam10');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `parent` int NOT NULL DEFAULT '0',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `section` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sort` int NOT NULL,
  `newTab` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'false',
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `display` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `parent`, `name`, `link`, `section`, `sort`, `newTab`, `comment`, `display`) VALUES
(1, 0, 'Выход', 'admin/exit/', 'admin', 100, 'false', '', '1'),
(2, 0, 'Профили обучения', 'admin/profiles/', 'admin', 20, 'false', '', '1'),
(7, 0, 'Экзаменационные предметы', 'admin/exam-subjects/', 'admin', 30, 'false', '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `perm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `perm`, `status`) VALUES
(1, 'admin', '$2y$10$G7I7Gh9yEznkixKYierDTeslq0cVkFeSi89VbEjc5YW8warI.BzKq', 'Султан Сергей Викторович', 'admin', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `edForms`
--
ALTER TABLE `edForms`
  ADD PRIMARY KEY (`code`);

--
-- Индексы таблицы `edLevels`
--
ALTER TABLE `edLevels`
  ADD PRIMARY KEY (`code`);

--
-- Индексы таблицы `edProfiles`
--
ALTER TABLE `edProfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edprofiles_type` (`type`),
  ADD KEY `level` (`level`);

--
-- Индексы таблицы `edTypes`
--
ALTER TABLE `edTypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `examSubjects`
--
ALTER TABLE `examSubjects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT для таблицы `edProfiles`
--
ALTER TABLE `edProfiles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT для таблицы `edTypes`
--
ALTER TABLE `edTypes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `examSubjects`
--
ALTER TABLE `examSubjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `edProfiles`
--
ALTER TABLE `edProfiles`
  ADD CONSTRAINT `edprofiles_ibfk_1` FOREIGN KEY (`level`) REFERENCES `edLevels` (`code`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `edprofiles_type` FOREIGN KEY (`type`) REFERENCES `edTypes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
