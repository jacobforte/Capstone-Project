DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectUserClassComment$$

CREATE PROCEDURE spSelectUserClassComment
(
    IN courseID varchar(255)
)
BEGIN
	SET courseID = CONCAT(courseID, "%");

    SELECT tblUserClassComment.email,
        tblUserClassComment.classCRN,
        tblUserClassComment.shortDescription,
        tblUserClassComment.rating,
        tblUserClassComment.reviewDate,
        tblUserClassComment.instructor,
        tblUserClassComment.semester,
        tblUserClassComment.campus
    FROM tblUserClassComment
    LEFT OUTER JOIN tblClasses ON tblClasses.crn = tblUserClassComment.classCrn
    WHERE tblClasses.courseID LIKE courseID;
END$$
DELIMITER ;
