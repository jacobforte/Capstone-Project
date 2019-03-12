DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUser$$

CREATE PROCEDURE spDeleteUser
(
    IN useremail varchar(255)
)
BEGIN
    START TRANSACTION;
    DELETE FROM tblUserNotifications WHERE email = useremail;
    DELETE FROM tblUserRegisteredClasses WHERE email = useremail;
    DELETE FROM tblUserClassComment WHERE email = useremail;

    DELETE FROM tblUserSellBookPhoto
    LEFT OUTER JOIN tblUserSellBook ON tblUserSellBookPhoto.id = tblUserSellBook.id AND tblUserSellBook.email = useremail;

    DELETE FROM tblUserSellBook WHERE email = useremail;
    DELETE FROM tblUsers WHERE email = useremail;
    COMMIT TRANSACTION;
END$$
DELIMITER ;