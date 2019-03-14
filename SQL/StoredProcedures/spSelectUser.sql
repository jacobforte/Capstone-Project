DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectUser$$

CREATE PROCEDURE spSelectUser
(
    IN email varchar(255),
    IN password varchar(255)
)
BEGIN
    SELECT tblUsers.email,
        tblUsers.name,
        tblUsers.id
    FROM tblUsers
    WHERE tblUsers.email = email
        AND tblUsers.password = password;
END$$
DELIMITER ;