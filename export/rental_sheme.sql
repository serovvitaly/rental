-- ������ ������������ Devart dbForge Studio for MySQL, ������ 6.0.315.0
-- �������� �������� ��������: http://www.devart.com/ru/dbforge/mysql/studio
-- ���� �������: 14.07.2013 1:12:17
-- ������ �������: 5.1.68-community-log
-- ������ �������: 4.1

USE rental;

CREATE TABLE IF NOT EXISTS building_types (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 9
AVG_ROW_LENGTH = 2048
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '���� ��������';

CREATE TABLE IF NOT EXISTS collection (
  id int(11) NOT NULL AUTO_INCREMENT,
  introtext varchar(500) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS estate_types (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '���� �������� ��� ������';

CREATE TABLE IF NOT EXISTS housing_options (
  bit int(11) NOT NULL,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (bit)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 1092
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '����� �����';

CREATE TABLE IF NOT EXISTS users (,
  PRIMARY KEY (id)
  UNIQUE INDEX email (email)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS announcements (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id),
  CONSTRAINT FK_announcements_users_id FOREIGN KEY (user_id)
  REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '����������';

CREATE TABLE IF NOT EXISTS estates (
  id int(11) NOT NULL AUTO_INCREMENT,
  _token varchar(40) NOT NULL,
  user_id int(11) NOT NULL COMMENT 'ID ���������',
  title varchar(255) DEFAULT NULL COMMENT '���������� ���������',
  introtext varchar(500) DEFAULT NULL COMMENT '������� ��������',
  estate_type int(11) NOT NULL COMMENT '��� ������� (��������, ���, ������� � �.�.)',
  building_type int(11) DEFAULT NULL COMMENT '��� ���������',
  bathroom_type varchar(255) DEFAULT NULL,
  housing_options int(11) DEFAULT NULL COMMENT '����� (�������, ���������, �������� � �.�.)',
  full_rules varchar(3000) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  is_rough tinyint(1) DEFAULT 1 COMMENT '���� ���������',
  PRIMARY KEY (id),
  UNIQUE INDEX _token (_token),
  CONSTRAINT FK_estates_users_id FOREIGN KEY (user_id)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '������� ������������';

CREATE TABLE IF NOT EXISTS pf_contacts (
  user_id int(11) NOT NULL,
  receiver_id int(11) NOT NULL,
  UNIQUE INDEX UK_pf_contacts (user_id, receiver_id),
  CONSTRAINT FK_pf_contacts_receiver_id FOREIGN KEY (receiver_id)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_pf_contacts_users_id FOREIGN KEY (user_id)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '������ ���������';

CREATE TABLE IF NOT EXISTS pf_messages (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL COMMENT 'ID ����������� (������������ ���������� ���������)',
  title varchar(255) DEFAULT NULL COMMENT '��������� ���������',
  content varchar(1200) DEFAULT NULL COMMENT '����� ���������',
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '����� ��������',
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '����� ���������� ����������',
  reading_at timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT '����� ��������� ����������� (����� ����������� � ��������� ������� �����������)',
  parent_id int(11) DEFAULT 0 COMMENT 'ID ��������� �� ������� ������ �������� - ������� (������� ���������)',
  is_favorite tinyint(1) DEFAULT 0 COMMENT '���� "���������"',
  is_spam tinyint(1) DEFAULT 0 COMMENT '���� "����"',
  is_removed tinyint(1) DEFAULT 0 COMMENT '���� "������� ��������"',
  in_basket tinyint(1) DEFAULT 0 COMMENT '���� "���������� � �������"',
  PRIMARY KEY (id),
  CONSTRAINT FK_pf_messages_users_id FOREIGN KEY (user_id)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '��������� �������������';

CREATE TABLE IF NOT EXISTS pf_messages_users (
  CONSTRAINT FK_pf_messages_users_pf_messages_id FOREIGN KEY (message_id)
    REFERENCES pf_messages(id) ON DELETE CASCADE ON UPDATE CASCADE
  CONSTRAINT FK_pf_messages_users_users_id FOREIGN KEY (user_id)
    REFERENCES users(id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = '������ ����������� ���������';