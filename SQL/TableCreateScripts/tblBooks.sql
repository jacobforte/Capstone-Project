USE 'Capstone';

DROP TABLE IF EXISTS 'Books';

CREATE TABLE 'Books' (
    'BookID' INTEGER NOT NULL,
    'BookName' VARCHAR(255),
    INDEX('BookID'),
    PRIMARY KEY ('BookID')
    ) Engine=innodb DEFAULT CHARSET=utf8;

INSERT INTO 'Books' ('BookID', 'BookName')
VALUES (123, 'Web Programing 1');