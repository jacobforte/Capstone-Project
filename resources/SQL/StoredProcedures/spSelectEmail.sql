DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectEmail$$

CREATE PROCEDURE spSelectEmail
(
    IN email varchar(255)
)
BEGIN
    SELECT tblUsers.email
    FROM tblUsers
    WHERE tblUsers.email = email;
END$$
DELIMITER ;