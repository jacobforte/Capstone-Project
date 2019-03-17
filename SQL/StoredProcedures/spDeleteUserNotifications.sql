DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUserNotifications$$

CREATE PROCEDURE spDeleteUserNotifications
(
    IN email varchar(255),
    IN notificationType varchar(255)
)
BEGIN
    DELETE FROM tblUserNotifications
    WHERE tblUserNotifications.email = email
    AND tblUserNotifications.notificationType = notificationType;
END$$
DELIMITER ;