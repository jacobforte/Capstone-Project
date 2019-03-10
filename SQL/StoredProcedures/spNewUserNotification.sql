DELIMITER $$
DROP PROCEDURE IF EXISTS spNewUserNotification$$

CREATE PROCEDURE spNewUserNotification
(
    IN email varchar(255),
    IN notificationType varchar(255)
)
BEGIN
    INSERT INTO tblUserNotifications(email, notificationType)
    VALUES (email, notificationType);
END$$
DELIMITER ;