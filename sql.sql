DROP TABLE IF EXISTS user;
CREATE TABLE user (
	user_id INT NOT NULL UNSIGNED AUTO_INCREMENT,
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
	status INT NOT NULL UNSIGNED DEFAULT 0,
	PRIMARY KEY(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;