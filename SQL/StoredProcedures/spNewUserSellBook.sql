DELIMITER $$
DROP PROCEDURE IF EXISTS spNewUserSellBook$$

CREATE PROCEDURE spNewUserSellBook
(
    IN email varchar(255),
    IN bookISBN varchar(255),
    IN shortDescription varchar(255),
    IN longDescription varchar(255),
    IN bookCondition varchar(255),
    IN price double,
    IN postDate datetime
)
BEGIN
    INSERT INTO tblUserSellBook
    (
        email,
        bookISBN,
        shortDescription,
        longDescription,
        condition,
        price,
        postDate
    )
    VALUES
    (
        email,
        bookISBN,
        shortDescription,
        longDescription,
        condition,
        price,
        postDate
    );
END$$
DELIMITER ;