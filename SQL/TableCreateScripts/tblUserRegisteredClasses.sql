IF EXISTS tblUserRegisteredClasses (
	DROP TABLE tblUserRegisteredClasses
);

CREATE TABLE tblUserRegisteredClasses (
	email varchar(255) NOT NULL,
	classCRN varchar(255) NOT NULL,
	PRIMARY KEY(email, classCRN),
	FOREIGN KEY(email) REFERENCES tblUsers(email),
	FOREIGN KEY(classCRN) REFERENCES tblClasses(crn)
);