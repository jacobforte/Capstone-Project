DELIMITER $$
DROP PROCEDURE IF EXISTS spSelectClasses$$

CREATE PROCEDURE spSelectClasses
(
    IN crn varchar(255),
    IN courseID varchar(255),
    IN title varchar(255),
    IN instructor varchar(255),
    IN credits varchar(255),
    IN campus varchar(255),
    IN startDate date,
    IN endDate date,
    IN startTime time,
    IN endTime time
)
BEGIN
    --Set optional parameters
    IF crn IS NULL || crn = "" THEN
        crn = "%";
    END IF
    IF courseID IS NULL || courseID = "" THEN
        courseID = "%";
    END IF
    IF title IS NULL || title = "" THEN
        title = "%";
    END IF
    IF credits IS NULL || credits = "" THEN
        credits = "%";
    END IF
    IF campus IS NULL || campus = "" THEN
        campus = "%";
    END IF
    IF startDate IS NULL || startDate = "" THEN
        startDate = "%";
    END IF
    IF endDate IS NULL || endDate = "" THEN
        endDate = "%";
    END IF
    IF instructor IS NULL || instructor = "" THEN
        instructor = "%";
    END IF
    IF startTime IS NULL || startTime = "" THEN
        startTime = "%";
    END IF
    IF endTime IS NULL || endTime = "" THEN
        crendTimen = "%";
    END IF

    SELECT tblClasses.crn,
        tblClasses.courseID,
        tblClasses.title,
        tblClasses.instructor,
        tblClasses.credits,
        tblClasses.campus,
        tblClasses.location,
        tblClasses.startDate,
        tblClasses.endDate,
        tblClasses.startTime,
        tblClasses.endTime,
        tblClasses.totalSeats,
        tblClasses.seatsRemaining,
        tblClasses.description,
        tblClasses.lastUpdated
    FROM tblClasses
    WHERE tblClasses.crn LIKE crn
        AND tblClasses.courseID LIKE courseID
        AND tblClasses.title LIKE title
        AND tblClasses.instructor LIKE instructor
        AND tblClasses.credits LIKE credits
        AND tblClasses.campus LIKE campus
        AND tblClasses.startDate LIKE startDate
        AND tblClasses.endDate LIKE endDate
        AND tblClasses.startTime LIKE startTime
        AND tblClasses.endTime LIKE endTime;
END$$
DELIMITER ;