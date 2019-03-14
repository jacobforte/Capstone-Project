DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectBooks$$

CREATE PROCEDURE spSelectBooks
(
    IN isbn varchar(255),
    IN title varchar(255),
    IN author varchar(255),
    IN edition varchar(255),
    IN publisher varchar(255)
)
BEGIN
    --Set optional parameters
    IF isbn IS NULL || isbn = "" THEN
        isbn = "%";
    END IF
    IF title IS NULL || title = "" THEN
        title = "%";
    END IF
    IF author IS NULL || author = "" THEN
        author = "%";
    END IF
    IF edition IS NULL || edition = "" THEN
        edition = "%";
    END IF
    IF publisher IS NULL || publisher = "" THEN
        publisher = "%";
    END IF

    SELECT tblBooks.isbn,
        tblBooks.title,
        tblBooks.author,
        tblBooks.edition,
        tblBooks.publisher,
        tblBooks.photoName
    FROM tblBooks
    WHERE tblBooks.isbn LIKE isbn
        AND tblBooks.title LIKE title
        AND tblBooks.author LIKE author
        AND tblBooks.edition LIKE edition
        AND tblBooks.publisher LIKE publisher;
END$$
DELIMITER ;