DROP TABLE IF EXISTS tblClassRequiresBook;

CREATE TABLE tblClassRequiresBook (
	classCRN varchar(255),
	bookISBN varchar(255),
	isRequired boolean,
	PRIMARY KEY(classCRN, bookISBN),
	FOREIGN KEY classCRN REFERENCES tblClasses(crn),
	FOREIGN KEY bookISBN REFERENCES tblBooks(isbn)
);