IF EXISTS tblUserNotification (
	DROP TABLE tblUserNotification
);

CREATE TABLE tblUserNotification (
	email varchar(255) NOT NULL,
	notificationType varchar(255) NOT NULL,
	PRIMARY KEY(email, notificationType)
	FOREIGN KEY(email) REFERENCES tblUsers(email),
	FOREIGN KEY(notificationType) REFERENCES tblNotifications(type)
));