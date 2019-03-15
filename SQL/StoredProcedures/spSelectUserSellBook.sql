DELIMITER $$
DROP PROCEDURE IF EXISTS spUserSellBook$$

CREATE PROCEDURE spUserSellBook
(
    IN id integer,
    IN email varchar(255),
    IN bookISBN varchar(255),
    IN bookCondition varchar(255),
    IN minPrice double,
    IN maxPrice double
)
BEGIN
    -- Set optional parameters
    IF id IS NULL || id = "" THEN
        SET id = "%";
    ELSE
        SET courseID = "%" + courseID + "%";
    END IF;
    IF email IS NULL || email = "" THEN
        SET email = "%";
    ELSE
        SET courseID = "%" + courseID + "%";
    END IF;
    IF bookISBN IS NULL || bookISBN = "" THEN
        SET bookISBN = "%";
    ELSE
        SET courseID = "%" + courseID + "%";
    END IF;
    IF bookCondition IS NULL || bookCondition = "" THEN
        SET bookCondition = "%";
    ELSE
        SET courseID = "%" + courseID + "%";
    END IF;
    IF minPrice IS NULL THEN
        SET minPrice = 0;
    END IF;
    IF maxPrice IS NULL THEN
        SET maxPrice = 9999999;
    END IF;

    SELECT tblUserSellBook.id,
        tblUserSellBook.email,
        tblUserSellBook.bookISBN,
        tblUserSellBook.shortDescription,
        tblUserSellBook.longDescription,
        tblUserSellBook.bookCondition,
        tblUserSellBook.price,
        tblUserSellBook.postDate
    FROM tblUserSellBook
    LEFT OUTER JOIN tblBooks ON tblBooks.isbn = tblUserSellBook.bookISBN
    WHERE tblUserSellBook.id LIKE id
        AND tblUserSellBook.email LIKE email
        AND tblUserSellBook.bookISBN LIKE bookISBN
        AND tblUserSellBook.bookCondition LIKE bookCondition
        AND tblUserSellBook.price >= minPrice
        AND tblUserSellBook.price <= maxPrice;
END$$
DELIMITER ;