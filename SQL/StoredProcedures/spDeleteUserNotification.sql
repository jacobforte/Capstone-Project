DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUserNotification$$

CREATE PROCEDURE spDeleteUserNotification
(
    IN email varchar(255),
    IN notificationType varchar(255)
)
BEGIN
    DELETE FROM tblUserNotification
    WHERE tblUserNotification.email = email
    AND tblUserNotification.notificationType = notificationType;
END$$
DELIMITER ;