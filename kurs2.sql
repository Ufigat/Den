-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2020 г., 21:40
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kurs2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `competition`
--

CREATE TABLE `competition` (
  `id` int NOT NULL,
  `people` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `competition`
--

INSERT INTO `competition` (`id`, `people`) VALUES
(7, 3),
(8, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `competition_id`
--

CREATE TABLE `competition_id` (
  `id_name` int NOT NULL,
  `id_competition` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `competition_id`
--

INSERT INTO `competition_id` (`id_name`, `id_competition`) VALUES
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `competition_name`
--

CREATE TABLE `competition_name` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `competition_name`
--

INSERT INTO `competition_name` (`id`, `name`) VALUES
(1, 'Чемпионат клуба'),
(2, 'Чемпионат области');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `fourth`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `fourth` (
`place` varchar(100)
,`name` varchar(100)
,`date` date
,`time` time
,`hour` int
,`full_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Структура таблицы `hike`
--

CREATE TABLE `hike` (
  `id` int NOT NULL,
  `route` int NOT NULL,
  `days` int NOT NULL,
  `trainer` int NOT NULL,
  `diary` varchar(300) NOT NULL,
  `type` enum('Пеший','Водный','Горный','Конный') NOT NULL,
  `party` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `hike`
--

INSERT INTO `hike` (`id`, `route`, `days`, `trainer`, `diary`, `type`, `party`) VALUES
(1, 2, 1, 1, 'Все идет по плану.....', 'Пеший', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `leaders`
--

CREATE TABLE `leaders` (
  `id` int NOT NULL,
  `people` int NOT NULL,
  `wage` int NOT NULL,
  `begin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `leaders`
--

INSERT INTO `leaders` (`id`, `people`, `wage`, `begin`) VALUES
(2, 5, 15000, '2020-11-20');

-- --------------------------------------------------------

--
-- Структура таблицы `party`
--

CREATE TABLE `party` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `section` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `party`
--

INSERT INTO `party` (`id`, `name`, `section`) VALUES
(1, 'Секция первая походная', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `id` int NOT NULL,
  `type` enum('Турист','Тренер','Руководитель') NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `year_of_birth` date NOT NULL,
  `gender` enum('М','Ж') NOT NULL,
  `category` enum('Первая','Вторая','Третья','нет') CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`id`, `type`, `full_name`, `year_of_birth`, `gender`, `category`) VALUES
(3, 'Турист', 'Иванов Иван Иванович', '2020-11-11', 'М', 'Первая'),
(4, 'Тренер', 'Петров Петр Петрович', '2020-11-16', 'М', 'Третья'),
(5, 'Руководитель', 'Николаев Николай Николаевич', '2020-11-03', 'М', 'нет'),
(6, 'Турист', 'Максимов Виктор Константинович', '2020-11-02', 'М', 'Первая');

-- --------------------------------------------------------

--
-- Структура таблицы `route`
--

CREATE TABLE `route` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `distance` int NOT NULL,
  `complexity` enum('Первая','Вторая','Третья') NOT NULL,
  `points` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `route`
--

INSERT INTO `route` (`id`, `name`, `distance`, `complexity`, `points`) VALUES
(2, 'Дорога по лесу', 40, 'Третья', 'Кпп - Лесная - Прут - Черное дерево');

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `party` int NOT NULL,
  `trainer` int NOT NULL,
  `count` int NOT NULL,
  `place` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `hour` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `party`, `trainer`, `count`, `place`, `date`, `time`, `hour`) VALUES
(2, 1, 1, 10, 'Под старым дубом', '2020-12-08', '20:02:14', 4),
(3, 1, 1, 5, 'Голубое озеро', '2020-12-16', '20:02:14', 5);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `second`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `second` (
`full_name` varchar(255)
,`year_of_birth` date
,`gender` enum('М','Ж')
,`wage` int
,`specialization` enum('Походы','Сплав','Скалолазанье')
);

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `leader` int NOT NULL,
  `trainer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `leader`, `trainer`) VALUES
(1, 'Походное дело', 2, 1);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `sixth`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `sixth` (
`full_name` varchar(255)
,`year_of_birth` date
,`gender` enum('М','Ж')
,`wage` int
,`begin` date
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `third`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `third` (
`competition` varchar(100)
,`people` varchar(255)
,`section` varchar(100)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `thirteenth`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `thirteenth` (
`full_name` varchar(255)
,`type` enum('Турист','Тренер','Руководитель')
,`party` varchar(100)
,`section` varchar(100)
,`name` varchar(200)
);

-- --------------------------------------------------------

--
-- Структура таблицы `tourists`
--

CREATE TABLE `tourists` (
  `id` int NOT NULL,
  `people` int NOT NULL,
  `party` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `tourists`
--

INSERT INTO `tourists` (`id`, `people`, `party`) VALUES
(5, 3, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `trainers`
--

CREATE TABLE `trainers` (
  `id` int NOT NULL,
  `people` int NOT NULL,
  `wage` int NOT NULL,
  `specialization` enum('Походы','Сплав','Скалолазанье') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `trainers`
--

INSERT INTO `trainers` (`id`, `people`, `wage`, `specialization`) VALUES
(1, 4, 150, 'Походы');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `twelfth`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `twelfth` (
`full_name` varchar(255)
,`type` enum('Турист','Тренер','Руководитель')
,`party` varchar(100)
,`section` varchar(100)
,`name` varchar(200)
);

-- --------------------------------------------------------

--
-- Структура таблицы `unscheduled_hike`
--

CREATE TABLE `unscheduled_hike` (
  `id` int NOT NULL,
  `route` int NOT NULL,
  `days` int NOT NULL,
  `trainer` int NOT NULL,
  `type` enum('Пеший','Водный','Горный','Конный') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Структура для представления `fourth`
--
DROP TABLE IF EXISTS `fourth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `fourth`  AS  select `schedule`.`place` AS `place`,`party`.`name` AS `name`,`schedule`.`date` AS `date`,`schedule`.`time` AS `time`,`schedule`.`hour` AS `hour`,`people`.`full_name` AS `full_name` from (((`schedule` join `party` on((`schedule`.`party` = `party`.`id`))) join `trainers` on((`schedule`.`trainer` = `trainers`.`id`))) join `people` on((`trainers`.`people` = `people`.`id`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `second`
--
DROP TABLE IF EXISTS `second`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `second`  AS  select `people`.`full_name` AS `full_name`,`people`.`year_of_birth` AS `year_of_birth`,`people`.`gender` AS `gender`,`trainers`.`wage` AS `wage`,`trainers`.`specialization` AS `specialization` from ((`trainers` join `people` on((`trainers`.`people` = `people`.`id`))) join `section` on((`trainers`.`id` = `section`.`trainer`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `sixth`
--
DROP TABLE IF EXISTS `sixth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `sixth`  AS  select `people`.`full_name` AS `full_name`,`people`.`year_of_birth` AS `year_of_birth`,`people`.`gender` AS `gender`,`leaders`.`wage` AS `wage`,`leaders`.`begin` AS `begin` from (`leaders` join `people` on((`leaders`.`people` = `people`.`id`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `third`
--
DROP TABLE IF EXISTS `third`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `third`  AS  select `competition_name`.`name` AS `competition`,`people`.`full_name` AS `people`,`section`.`name` AS `section` from ((((((`competition_name` join `competition_id` on((`competition_name`.`id` = `competition_id`.`id_name`))) join `competition` on((`competition_id`.`id_competition` = `competition`.`id`))) join `people` on((`competition`.`people` = `people`.`id`))) join `tourists` on((`people`.`id` = `tourists`.`people`))) join `party` on((`tourists`.`party` = `party`.`id`))) join `section` on((`party`.`section` = `section`.`id`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `thirteenth`
--
DROP TABLE IF EXISTS `thirteenth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `thirteenth`  AS  select `people`.`full_name` AS `full_name`,`people`.`type` AS `type`,`party`.`name` AS `party`,`section`.`name` AS `section`,`route`.`name` AS `name` from ((`hike` left join ((((`tourists` join `party` on((`tourists`.`party` = `party`.`id`))) join `people` on((`tourists`.`people` = `people`.`id`))) join `section` on((`party`.`section` = `section`.`id`))) join `trainers` on((`section`.`trainer` = `trainers`.`id`))) on((`trainers`.`id` = `hike`.`trainer`))) join `route` on((`hike`.`route` = `route`.`id`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `twelfth`
--
DROP TABLE IF EXISTS `twelfth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `twelfth`  AS  select `people`.`full_name` AS `full_name`,`people`.`type` AS `type`,`party`.`name` AS `party`,`section`.`name` AS `section`,`route`.`name` AS `name` from ((`hike` left join ((((`tourists` join `party` on((`tourists`.`party` = `party`.`id`))) join `people` on((`tourists`.`people` = `people`.`id`))) join `section` on((`party`.`section` = `section`.`id`))) join `trainers` on((`section`.`trainer` = `trainers`.`id`))) on((`trainers`.`id` = `hike`.`trainer`))) join `route` on((`hike`.`route` = `route`.`id`))) where (`section`.`trainer` = `hike`.`trainer`) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people` (`people`);

--
-- Индексы таблицы `competition_id`
--
ALTER TABLE `competition_id`
  ADD PRIMARY KEY (`id_name`,`id_competition`),
  ADD KEY `id_name` (`id_name`,`id_competition`),
  ADD KEY `id_competition` (`id_competition`);

--
-- Индексы таблицы `competition_name`
--
ALTER TABLE `competition_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hike`
--
ALTER TABLE `hike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route` (`route`,`trainer`,`type`),
  ADD KEY `trainer` (`trainer`),
  ADD KEY `party` (`party`);

--
-- Индексы таблицы `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people` (`people`);

--
-- Индексы таблицы `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `section` (`section`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`,`type`);

--
-- Индексы таблицы `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `section` (`party`),
  ADD KEY `trainer` (`trainer`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `leader` (`leader`),
  ADD KEY `trainer` (`trainer`);

--
-- Индексы таблицы `tourists`
--
ALTER TABLE `tourists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `party` (`party`),
  ADD KEY `people` (`people`);

--
-- Индексы таблицы `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainers_ibfk_1` (`people`);

--
-- Индексы таблицы `unscheduled_hike`
--
ALTER TABLE `unscheduled_hike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hike` (`route`,`trainer`,`type`),
  ADD KEY `trainer` (`trainer`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `competition_name`
--
ALTER TABLE `competition_name`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `hike`
--
ALTER TABLE `hike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `leaders`
--
ALTER TABLE `leaders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `party`
--
ALTER TABLE `party`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `route`
--
ALTER TABLE `route`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tourists`
--
ALTER TABLE `tourists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `unscheduled_hike`
--
ALTER TABLE `unscheduled_hike`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `competition_id`
--
ALTER TABLE `competition_id`
  ADD CONSTRAINT `competition_id_ibfk_1` FOREIGN KEY (`id_competition`) REFERENCES `competition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competition_id_ibfk_2` FOREIGN KEY (`id_name`) REFERENCES `competition_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hike`
--
ALTER TABLE `hike`
  ADD CONSTRAINT `hike_ibfk_1` FOREIGN KEY (`trainer`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hike_ibfk_2` FOREIGN KEY (`route`) REFERENCES `route` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `leaders`
--
ALTER TABLE `leaders`
  ADD CONSTRAINT `leaders_ibfk_1` FOREIGN KEY (`people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `party`
--
ALTER TABLE `party`
  ADD CONSTRAINT `party_ibfk_1` FOREIGN KEY (`section`) REFERENCES `section` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`party`) REFERENCES `party` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`trainer`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`leader`) REFERENCES `leaders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`trainer`) REFERENCES `trainers` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tourists`
--
ALTER TABLE `tourists`
  ADD CONSTRAINT `tourists_ibfk_1` FOREIGN KEY (`party`) REFERENCES `party` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tourists_ibfk_2` FOREIGN KEY (`people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `trainers`
--
ALTER TABLE `trainers`
  ADD CONSTRAINT `trainers_ibfk_1` FOREIGN KEY (`people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `unscheduled_hike`
--
ALTER TABLE `unscheduled_hike`
  ADD CONSTRAINT `unscheduled_hike_ibfk_1` FOREIGN KEY (`trainer`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unscheduled_hike_ibfk_2` FOREIGN KEY (`route`) REFERENCES `route` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
