IF EXISTS tblUserSellBookPhoto (
	DROP TABLE tblUserSellBookPhoto
);

CREATE TABLE tblUserSellBookPhoto (
	id integer NOT NULL AUTO_INCREMENT,
	photoName varchar(255) NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY id REFERENCES tblUserSellBook(id)
);