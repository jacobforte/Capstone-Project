DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectUserNotifications$$

CREATE PROCEDURE spSelectUserNotifications
(
    IN email varchar(255)
)
BEGIN
    SELECT tblUserNotifications.notificationType,
    tblNotifications.description
    FROM tblUserNotifications
    LEFT OUTER JOIN tblNotifications ON tblNotifications.type = tblUserNotifications.notificationType
    WHERE tblUserNotifications.email = email;
END$$
DELIMITER ;