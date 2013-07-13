-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.0.315.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 14.07.2013 1:23:43
-- Версия сервера: 5.1.68-community-log
-- Версия клиента: 4.1

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE rental;

--
-- Описание для таблицы building_types
--
DROP TABLE IF EXISTS building_types;
CREATE TABLE IF NOT EXISTS building_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 2048
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Типы строений';

--
-- Описание для таблицы collection
--
DROP TABLE IF EXISTS collection;
CREATE TABLE IF NOT EXISTS collection (
  id INT(11) NOT NULL AUTO_INCREMENT,
  introtext VARCHAR(500) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы estate_types
--
DROP TABLE IF EXISTS estate_types;
CREATE TABLE IF NOT EXISTS estate_types (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Типы объектов для аренды';

--
-- Описание для таблицы housing_options
--
DROP TABLE IF EXISTS housing_options;
CREATE TABLE IF NOT EXISTS housing_options (
  bit INT(11) NOT NULL,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (bit)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 1092
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Опции жилья';

--
-- Описание для таблицы users
--
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(100) NOT NULL COMMENT 'Email, является логином',
  password varchar(255) DEFAULT NULL,
  surname varchar(255) DEFAULT NULL COMMENT 'Фамилия',
  name varchar(50) DEFAULT NULL COMMENT 'Имя',
  patronymic varchar(255) DEFAULT NULL COMMENT 'Отчество',
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  confirmed_at timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Время подтверждения регистриции',
  is_confirmed tinyint(1) DEFAULT 0 COMMENT 'Подтверждена ли регистрация',
  last_visit timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Время последнего действия (посещения)',
  PRIMARY KEY (id),
  UNIQUE INDEX email (email)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;
-- Таблица не содержит столбцов, типы которых поддерживаются экспортом схемы.
-- Невозможно сгенерировать команды INSERT для этой таблицы.

--
-- Описание для таблицы announcements
--
DROP TABLE IF EXISTS announcements;
CREATE TABLE IF NOT EXISTS announcements (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id),
  CONSTRAINT FK_announcements_users_id FOREIGN KEY (user_id)
    REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Объявления';

--
-- Описание для таблицы estates
--
DROP TABLE IF EXISTS estates;
CREATE TABLE IF NOT EXISTS estates (
  id INT(11) NOT NULL AUTO_INCREMENT,
  _token VARCHAR(40) NOT NULL,
  user_id INT(11) NOT NULL COMMENT 'ID владельца',
  title VARCHAR(255) DEFAULT NULL COMMENT 'Внутренний заголовок',
  introtext VARCHAR(500) DEFAULT NULL COMMENT 'Краткое описание',
  estate_type INT(11) NOT NULL COMMENT 'Тип объекта (квартира, дом, комната и т.д.)',
  building_type INT(11) DEFAULT NULL COMMENT 'Тип постройки',
  bathroom_type VARCHAR(255) DEFAULT NULL,
  housing_options INT(11) DEFAULT NULL COMMENT 'Опции (телефон, телевизор, интернет и т.д.)',
  full_rules VARCHAR(3000) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  is_rough TINYINT(1) DEFAULT 1 COMMENT 'Флаг черновика',
  PRIMARY KEY (id),
  UNIQUE INDEX _token (_token),
  CONSTRAINT FK_estates_users_id FOREIGN KEY (user_id)
    REFERENCES users(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Объекты недвижимости';

--
-- Описание для таблицы pf_contacts
--
DROP TABLE IF EXISTS pf_contacts;
CREATE TABLE IF NOT EXISTS pf_contacts (
  user_id INT(11) NOT NULL,
  receiver_id INT(11) NOT NULL,
  UNIQUE INDEX UK_pf_contacts (user_id, receiver_id),
  CONSTRAINT FK_pf_contacts_receiver_id FOREIGN KEY (receiver_id)
    REFERENCES users(id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_pf_contacts_users_id FOREIGN KEY (user_id)
    REFERENCES users(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Список контактов';

--
-- Описание для таблицы pf_messages
--
DROP TABLE IF EXISTS pf_messages;
CREATE TABLE IF NOT EXISTS pf_messages (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(11) NOT NULL COMMENT 'ID отправителя (пользователя создавшего сообщение)',
  title VARCHAR(255) DEFAULT NULL COMMENT 'Заголовок сообщения',
  content VARCHAR(1200) DEFAULT NULL COMMENT 'Текст сообщения',
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Время создания',
  updated_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Время последнего обновления',
  reading_at TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Время прочтения получателем (нужно переместить в связующую таблицу получателей)',
  parent_id INT(11) DEFAULT 0 COMMENT 'ID сообщения на который данное является - ответом (цепочка сообщений)',
  is_favorite TINYINT(1) DEFAULT 0 COMMENT 'Флаг "Избранное"',
  is_spam TINYINT(1) DEFAULT 0 COMMENT 'Флаг "Спам"',
  is_removed TINYINT(1) DEFAULT 0 COMMENT 'Флаг "Удалено навсегда"',
  in_basket TINYINT(1) DEFAULT 0 COMMENT 'Флаг "Перемещено в корзину"',
  PRIMARY KEY (id),
  CONSTRAINT FK_pf_messages_users_id FOREIGN KEY (user_id)
    REFERENCES users(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Сообщения пользователей';

--
-- Описание для таблицы pf_messages_users
--
DROP TABLE IF EXISTS pf_messages_users;
CREATE TABLE IF NOT EXISTS pf_messages_users (
  message_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  CONSTRAINT FK_pf_messages_users_pf_messages_id FOREIGN KEY (message_id)
  REFERENCES rental.pf_messages (id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_pf_messages_users_users_id FOREIGN KEY (user_id)
  REFERENCES rental.users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Список получателей сообщений';

-- Таблица не содержит столбцов, типы которых поддерживаются экспортом схемы.
-- Невозможно сгенерировать команды INSERT для этой таблицы.

-- 
-- Вывод данных для таблицы building_types
--
INSERT INTO building_types VALUES
(1, 'Блочный'),
(2, 'Панельный'),
(3, 'Монолит'),
(4, 'Таунхаус'),
(5, 'Сталинский'),
(6, 'Кирпичный'),
(7, 'Кирпично-монолитный'),
(8, 'Элитный');

-- 
-- Вывод данных для таблицы collection
--
INSERT INTO collection VALUES
(1, NULL, '2013-07-09 05:18:28', '0000-00-00 00:00:00'),
(2, NULL, '2013-07-09 05:18:30', '0000-00-00 00:00:00'),
(3, NULL, '2013-07-09 05:22:58', '0000-00-00 00:00:00');

-- 
-- Вывод данных для таблицы estate_types
--
INSERT INTO estate_types VALUES
(1, 'Квартира целиком'),
(2, 'Квартира покомнатно'),
(3, 'Дом целиком'),
(4, 'Дом покомнатно');

-- 
-- Вывод данных для таблицы housing_options
--
INSERT INTO housing_options VALUES
(1, 'Телефон'),
(2, 'Мебель'),
(4, 'Балкон'),
(8, 'Лоджия'),
(16, 'Лифт'),
(32, 'Мусоропровод'),
(64, 'Парковка'),
(128, 'Кондиционер'),
(256, 'Холодильник'),
(512, 'Телевизор'),
(1024, 'Стиральная машина'),
(2048, 'Интернет'),
(4096, 'Домофон'),
(8192, 'Бытовые приборы'),
(16384, 'Охрана');

-- 
-- Вывод данных для таблицы announcements
--

-- Таблица rental.announcements не содержит данных

-- 
-- Вывод данных для таблицы estates
--
INSERT INTO estates VALUES
(1, '11373697134529', 1, 'сомнения прочь', NULL, 0, NULL, NULL, NULL, NULL, '2013-07-13 06:47:45', '2013-07-13 06:49:05', 1),
(3, '11373698525312', 1, 'прикрас', NULL, 0, NULL, NULL, NULL, NULL, '2013-07-13 06:55:30', '2013-07-13 06:55:37', 1),
(4, '11373698560084', 1, 'погода прекрасная', NULL, 0, NULL, NULL, NULL, NULL, '2013-07-13 06:56:03', '2013-07-13 06:56:25', 1),
(5, '11373698650828', 1, 'не нужно думать что все так просто', NULL, 2, 2, 'separated', 1, NULL, '2013-07-13 06:57:34', '2013-07-13 07:01:53', 1);

-- 
-- Вывод данных для таблицы pf_contacts
--
INSERT INTO pf_contacts VALUES
(2, 1),
(3, 1),
(1, 2),
(3, 2),
(1, 3),
(2, 3);

-- 
-- Вывод данных для таблицы pf_messages
--
INSERT INTO pf_messages VALUES
(1, 2, 'первое сообщение от тараса', 'привет, это тарас', '2013-07-12 00:44:48', '2013-07-12 00:44:48', '0000-00-00 00:00:00', 0, 0, 0, 0, 0),
(2, 1, 'сообщение от Серова', 'привет, это Серов', '2013-07-12 00:46:33', '2013-07-12 00:46:33', '0000-00-00 00:00:00', 0, 0, 0, 0, 0),
(3, 3, 'привет', 'нужна помощь', '2013-07-12 01:24:33', '2013-07-12 01:24:33', '0000-00-00 00:00:00', 0, 0, 0, 0, 0),
(4, 1, 'привте, как дела', 'нужно', '2013-07-12 01:25:02', '2013-07-12 01:25:02', '0000-00-00 00:00:00', 0, 0, 0, 0, 0);

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;