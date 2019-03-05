DROP TABLE IF EXISTS 'tblUsersClassComment';

CREATE TABLE tblUsersClassComment (
	email varchar(255) NOT NULL,
	classCRN varchar(255) NOT NULL,
	shortDescription varchar(255),
	longDescription varchar(2550),
	rating integer NOT NULL,
	PRIMARY KEY(email, classCRN),
	FOREIGN KEY(email) REFERENCES tblUsers(email),
	FOREIGN KEY(classCRN) REFERENCES tblUsers(crn)
);

//Should we allow multiple comments? Perhaps allow replying to other comments?