/**
 * \file
 * This Stored Procedure deletes a user from the database.
 * This also deletes all UserNotifications, UserRegisteredClasses, posted books (along with the list of photos), and comments.
 * The actual photo will need to be removed.
 * IN email varchar(255)
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUser$$

CREATE PROCEDURE spDeleteUser
(
    IN email varchar(255)
)
BEGIN
    BEGIN TRANSACTION;
    DELETE FROM tblUserNotifications WHERE email = email;
    DELETE FROM tblUserRegisteredClasses WHERE email = email;
    DELETE FROM tblUserClassComment WHERE email = email;

    DELETE FROM tblUserSellBookPhoto p
    WHERE (p.id) IN
        (
            SELECT b.id
            FROM tblUserSellBook
            Where b.email = email
        );

    DELETE FROM tblUserSellBook WHERE email = email;
    DELETE FROM tblUsers WHERE email = email;
    COMMIT TRANSACTION;
END$$
DELIMITER ;