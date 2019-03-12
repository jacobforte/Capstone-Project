DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUser$$

CREATE PROCEDURE spDeleteUser
(
    IN email varchar(255)
)
BEGIN
    BEGIN TRANSACTION;
    DELETE FROM tblUserNotifications n WHERE n.email = email;
    DELETE FROM tblUserRegisteredClasses r WHERE r.email = email;
    DELETE FROM tblUserClassComment co WHERE co.email = email;

    DELETE FROM tblUserSellBookPhoto p
    WHERE (p.id) IN
        (
            SELECT b.id
            FROM tblUserSellBook
            Where b.email = email
        );

    DELETE FROM tblUserSellBook b WHERE b.email = email;
    DELETE FROM tblUsers u WHERE u.email = email;
    COMMIT TRANSACTION;
END$$
DELIMITER ;