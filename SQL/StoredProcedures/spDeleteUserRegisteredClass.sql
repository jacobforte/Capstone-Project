DELIMITER $$
DROP PROCEDURE IF EXISTS spDeleteUserRegisteredClass$$

CREATE PROCEDURE spDeleteUserRegisteredClass
(
    IN email varchar(255),
    IN classCRN(255)
)
BEGIN
    DELETE FROM tblUserRegisteredClasses
    WHERE tblUserRegisteredClasses.email = email
    AND tblUserRegisteredClasses.classCRN = classCRN;
END$$
DELIMITER ;