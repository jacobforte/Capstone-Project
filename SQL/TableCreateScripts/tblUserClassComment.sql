DROP TABLE IF EXISTS tblUserClassComment;

CREATE TABLE tblUserClassComment (
	email varchar(255) NOT NULL,
	classCRN varchar(255) NOT NULL,
	shortDescription varchar(255),
	rating integer NOT NULL,
	reviewDate date,
	instructor varchar(255),
	semester varchar(255),
	campus varchar(255),
	PRIMARY KEY(email, classCRN),
	FOREIGN KEY(email) REFERENCES tblUsers(email),
	FOREIGN KEY(classCRN) REFERENCES tblClasses(crn)
);