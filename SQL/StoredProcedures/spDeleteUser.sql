DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUser$$

CREATE PROCEDURE spDeleteUser
(
    IN email varchar(255)
)
BEGIN
    START TRANSACTION;
    SET @email = email;
    
    DELETE FROM tblUserNotification WHERE email = @email;
    DELETE FROM tblUserRegisteredClasses WHERE email = @email;
    DELETE FROM tblUserClassComment WHERE email = @email;

    DELETE FROM tblUserSellBookPhoto
    WHERE tblUserSellBookPhoto.id IN 
    (
        SELECT tblUserSellBook.id FROM tblUserSellBook
        WHERE tblUserSellBook.email = @email
    );

    DELETE FROM tblUserSellBook WHERE email = @email;
    DELETE FROM tblUsers WHERE email = @email;
    COMMIT;
END$$
DELIMITER ;