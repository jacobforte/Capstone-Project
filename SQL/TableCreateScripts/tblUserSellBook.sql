DROP TABLE IF EXISTS tblUserSellBook;

CREATE TABLE tblUserSellBook (
	id integer NOT NULL AUTO_INCREMENT,
	email varchar(255) NOT NULL,
	classCRN varchar(255) NOT NULL,
	shortDescription varchar(255),
	longDescription varchar(2550),
	condition varchar(255),
	price double NOT NULL,
	postDate datetime,
	PRIMARY KEY(id)
	FOREIGN KEY email REFERENCES tblUsers(email),
	FOREIGN KEY classCRN REFERENCES tblClasses(crn)
);