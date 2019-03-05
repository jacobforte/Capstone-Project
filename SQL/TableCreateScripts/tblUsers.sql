DROP TABLE IF EXISTS tblUsers;

CREATE TABLE tblUsers (
	email varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	PRIMARY KEY (email)
);