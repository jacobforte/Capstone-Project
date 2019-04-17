DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectUserNotifications$$

CREATE PROCEDURE spSelectUserNotifications
(
    IN email varchar(255)
)
BEGIN
    SELECT tblUserNotification.notificationType,
    tblNotifications.description
    FROM tblUserNotifications
    LEFT OUTER JOIN tblNotifications ON tblNotifications.type = tblUserNotification.notificationType
    WHERE tblUserNotification.email = email;
END$$
DELIMITER ;
