DROP TABLE IF EXISTS tblUserClassComment;

CREATE TABLE tblUserClassComment (
	email varchar(255) NOT NULL,
	classCRN varchar(255) NOT NULL,
	shortDescription varchar(255),
	longDescription varchar(2550),
	rating integer NOT NULL,
	PRIMARY KEY(email, classCRN),
	FOREIGN KEY(email) REFERENCES tblUsers(email),
	FOREIGN KEY(classCRN) REFERENCES tblClasses(crn)
);