IF EXISTS tblNotifications (
	DROP TABLE tblNotifications
);

CREATE TABLE tblNotifications (
	type varchar(255),
	description varchar(255),
	PRIMARY KEY (type)
);