DROP TABLE IF EXISTS user;
CREATE TABLE user (
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	user_name VARCHAR(10) NOT NULL DEFAULT '',
	user_tel CHAR(11) NOT NULL DEFAULT '',
	user_email VARCHAR(30) NOT NULL DEFAULT '',
	user_birthday VARCHAR(11) NOT NULL DEFAULT '',
	user_academy VARCHAR(20) NOT NULL DEFAULT '',
	user_major VARCHAR(30) NOT NULL DEFAULT '',
	user_organization VARCHAR(20) NOT NULL DEFAULT '',
	user_department VARCHAR(20) NOT NULL DEFAULT '',
	user_introduction TEXT NOT NULL,
	user_reason TEXT NOT NULL,
	status INT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS organization;
CREATE TABLE organization  (
organization_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
organization_name VARCHAR(20) NOT NULL DEFAULT '',
PRIMARY KEY(organization_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS department;
CREATE TABLE department (
department_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
department_name VARCHAR(20) NOT NULL DEFAULT '',
organization_id INT UNSIGNED NOT NULL,
PRIMARY KEY(department_id),
FOREIGN KEY(organization_id) references organization(organization_id) 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO organization (organization_name) values ('校团委');
INSERT INTO organization (organization_name) values ('学生会');

INSERT INTO department (department_name,organization_id) values ('宣传部',1);
INSERT INTO department (department_name,organization_id) values ('网络中心',1);
INSERT INTO department (department_name,organization_id) values ('科技部',1);
INSERT INTO department (department_name,organization_id) values ('学术科技部',2);
INSERT INTO department (department_name,organization_id) values ('纪检部',2);

DROP TABLE IF EXISTS academy;
CREATE TABLE academy (
academy_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
academy_name VARCHAR(20) NOT NULL DEFAULT '',
PRIMARY KEY(academy_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO academy (academy_name) values ('信息工程学院');
INSERT INTO academy (academy_name) values ('外国语学院');
INSERT INTO academy (academy_name) values ('药科学院');


DROP TABLE IF EXISTS superadmin;
CREATE TABLE superadmin (
superadmin_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
superadmin_username VARCHAR(20) NOT NULL DEFAULT '',
superadmin_password VARCHAR(32) NOT NULL DEFAULT '',
PRIMARY KEY(superadmin_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS organization_user;
CREATE TABLE organization_user (
organization_user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
organization_user_username VARCHAR(20) NOT NULL DEFAULT '',
organization_user_password VARCHAR(32) NOT NULL DEFAULT '',
organization_id INT UNSIGNED NOT NULL,
PRIMARY KEY(organization_user_id),
FOREIGN KEY(organization_id) REFERENCES organization(organization_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS department_user;
CREATE TABLE department_user (
department_user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
department_user_username VARCHAR(20) NOT NULL DEFAULT '',
department_user_password VARCHAR(32) NOT NULL DEFAULT '',
department_id INT UNSIGNED NOT NULL,
PRIMARY KEY(department_user_id),
FOREIGN KEY(department_id) REFERENCES department(department_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
