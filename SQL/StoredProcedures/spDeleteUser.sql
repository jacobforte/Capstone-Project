DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUser$$

CREATE PROCEDURE spDeleteUser
(
    IN email varchar(255)
)
BEGIN
    START TRANSACTION;
    DELETE FROM tblUserNotifications WHERE email = email;
    DELETE FROM tblUserRegisteredClasses WHERE email = email;
    DELETE FROM tblUserClassComment WHERE email = email;

    DELETE FROM tblUserSellBookPhoto
    LEFT OUTER JOIN tblUserSellBook ON tblUserSellBookPhoto.id = tblUserSellBook.id
    WHERE tblUserSellBook.email = email;

    DELETE FROM tblUserSellBook WHERE email = email;
    DELETE FROM tblUsers WHERE email = email;
    COMMIT TRANSACTION;
END$$
DELIMITER ;