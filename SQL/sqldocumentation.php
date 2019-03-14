<?php

/**
 * \file spNewUser.sql
 * Adds a user to the database.
 * IN email varchar(255),\n
 * IN name varchar(255),\n
 * IN password varchar(255)\n
 * Returns: None
 */

/**
 * \file spNewUserClassComment.sql
 * Creates a new comment under the display name of a user.
 * IN email varchar(255),\n
 * IN classCRN varchar(255),\n
 * IN shortDescription varchar(2550),\n
 * IN rating varchar(255),\n
 * IN reviewDate date,\n
 * IN instructor varchar(255),\n
 * IN semester varchar(255),\n
 * IN campus varchar(255)\n
 * Returns: None
 */

/**
 * \file spNewUserNotification.sql
 * Subscribes the user to a specified notification.
 * To remove this notification, use spDeleteUserNotification.sql\n
 * IN email varchar(255),\n
 * IN notificationType varchar(255)\n
 * Returns: None
 */

/**
 * \file spNewUserRegisteredClass.sql
 * Subscribes the user to a particular class.
 * IN email varchar(255),\n
 * IN classCRN varchar(255)\n
 * Returns: None
 */

/**
 * \file spNewUserSellBook.sql
 * Allows a user to post a book they might want to sell.
 * This procedure returns the auto-generated id number. This will be need when using spNewUserSellBookPhoto.sql.\n
 * IN email varchar(255),\n
 * IN bookISBN varchar(255),\n
 * IN shortDescription varchar(255),\n
 * IN longDescription varchar(2550),\n
 * IN bookCondition varchar(255),\n
 * IN price double,\n
 * IN postDate datetime\n
 * Returns: id
 */

/**
 * \file spNewUserSellBookPhoto.sql
 * Use this in a loop when uploading multiple photos for for a particular book posting.
 * The id input is the id of the book posting. You will need to run spNewUserSellBook.sql before using this stored procedure. The actual photo will need to be uploaded to the server.\n
 * IN id integer,\n
 * IN photoName varchar(255)\n
 * Returns: None
 */

/**
 * \file spDeleteUser.sql
 * Deletes a user from a database.
 * This also deletes all UserNotifications, UserRegisteredClasses, posted books (along with the list of photos), and comments that are related to the user.
 * The actual photo will need to be removed from the server.\n
 * IN email varchar(255)\n
 * Returns: None
 */

 /**
 * \file spDeleteUserClassComment.sql
 * Deletes a comment given the users email and class crn.
 * IN email varchar(255),\n
 * IN classCRN varchar(255)\n
 * Returns: None
 */

 /**
 * \file spDeleteUserNotification.sql
 * Unsubscribes a user from a notification.
 * IN email varchar(255),\n
 * IN notificationType varchar(255)\n
 * Returns: None
 */

 /**
 * \file spDeleteUserRegisteredClass.sql
 * Unsubscribes a user from a class.
 * IN email varchar(255),\n
 * IN classCRN(255)\n
 * Returns: None
 */

 /**
 * \file spDeleteUserSellBook.sql
 * Removes a book from the book postings.
 * This also delete all photos related to the book posting. the actual photos will need to be removed manually.\n
 * The id comes from the book posting id.\n
 * IN id integer\n
 * Returns: None
 */

 /**
 * \file spDeleteUserSellBookPhoto.sql
 * Removes a photo from a book posting.
 * The actual photo will need to be removed from the server.\n
 * IN id integer,\n
 * IN photoName varchar(255)\n
 * Returns: None
 */

 /**
 * \file spUpdateUser.sql
 * Updates the information of a user.
 * The ID is autogenerated in the tblUsers table. it is needed in case the email changes.\n
 * IN id integer,\n
 * IN email varchar(255),\n
 * IN name varchar(255),\n
 * IN password varchar(255)\n
 * Returns: None
 */

 /**
 * \file spUpdateUserClassComment.sql
 * Updates a users comment.
 * IN email varchar(255),\n
 * IN classCRN varchar(255),\n
 * IN shortDescription varchar(2550),\n
 * IN rating varchar(255),\n
 * IN reviewDate date,\n
 * IN instructor varchar(255),\n
 * IN semester varchar(255),\n
 * IN campus varchar(255)\n
 * Returns: None
 */

 /**
 * \file spUpdateUserSellBook.sql
 * Updates a users book posting.
 * To add or remove photos, you need to user spNewUserSellBookPhoto.sql and spDeleteUserSellBookPhoto.sql respectively.\n
 * IN id integer,\n
 * IN bookISBN varchar(255),\n
 * IN shortDescription varchar(255),\n
 * IN longDescription varchar(2550),\n
 * IN bookCondition varchar(255),\n
 * IN price double\n
 * Returns: None
 */

 /**
 * \file spSelectUser.sql
 * Used to login a user.
 * This returns the auto-generated id.
 * IN email varchar(255),\n
 * IN password varchar(255)\n
 * Returns:\n
 * email,\n
 * name,\n
 * id
 */

 /**
 * \file spSelectUserNotifications.sql
 * Returns a list of notifications a user is subscribed to.
 * IN email varchar(255)\n
 * Returns:\n
 * notificationType,\n
 * description
 */

 /**
 * \file spSelectNotifications.sql
 * Returns a list of all notifications
 * IN none\n
 * Returns:\n
 * type,\n
 * description
 */

 /**
 * \file spSelectClasses.sql
 * Returns a list of all classes.
 * Can be optionally be filtered.\n
 * IN crn varchar(255), (OPTIONAL)\n
 * IN courseID varchar(255), (OPTIONAL)\n
 * IN title varchar(255), (OPTIONAL)\n
 * IN instructor varchar(255), (OPTIONAL)\n
 * IN credits varchar(255), (OPTIONAL)\n
 * IN campus varchar(255), (OPTIONAL)\n
 * IN startDate varchar(255), (OPTIONAL)\n
 * IN endDate varchar(255), (OPTIONAL)\n
 * IN startTime varchar(255), (OPTIONAL)\n
 * IN endTime varchar(255) (OPTIONAL)\n
 * Returns:\n
 * crn,\n
 * courseID,\n
 * title,\n
 * instructor,\n
 * credits,\n
 * campus,\n
 * location,\n
 * startDate,\n
 * endDate,\n
 * startTime,\n
 * endTime,\n
 * totalSeats,\n
 * seatsRemaining,\n
 * description,\n
 * lastUpdated
 */

 /**
 * \file spSelectBooks.sql
 * Returns a list of all books.
 * Can optionally be filtered.\n
 * IN isbn varchar(255), (OPTIONAL)\n
 * IN title varchar(255), (OPTIONAL)\n
 * IN author varchar(255), (OPTIONAL)\n
 * IN edition varchar(255), (OPTIONAL)\n
 * IN publisher varchar(255) (OPTIONAL)\n
 * Returns:\n
 * isbn,\n
 * title,\n
 * author,\n
 * edition,\n
 * publisher,\n
 * photoName
 */

 /**
 * \file spSelectClassRequiresBook.sql
 * Returns a list of all books related to a class
 * IN classCRN varchar(255)\n
 * Returns:\n
 * isbn,\n
 * title,\n
 * author,\n
 * edition,\n
 * publisher,\n
 * photoName,\n
 * isRequired
 */

 /**
 * \file spSelectUserRegisteredClasses.sql
 * Returns a list of all classes related to a user.
 * IN email varchar(255)\n
 * Returns:\n
 * crn,\n
 * courseID,\n
 * title,\n
 * instructor,\n
 * credits,\n
 * campus,\n
 * location,\n
 * startDate,\n
 * endDate,\n
 * startTime,\n
 * endTime,\n
 * totalSeats,\n
 * seatsRemaining,\n
 * description,\n
 * lastUpdated
 */

 /**
 * \file spUserClassComment.sql
 * Returns a list of all comments related to a class.
 * Note that this uses the course ID, not an individual section's class CRN
 * IN courseID varchar(255)\n
 * Returns:\n
 * email,\n
 * classCRN,\n
 * shortDescription,\n
 * rating,\n
 * reviewDate,\n
 * instructor,\n
 * semester,\n
 * campus
 */

 /**
 * \file spSelectUserSellBook.sql
 * Returns a list of all books being sold by users.
 * Can be optionally filtered.\n
 * IN id integer, (OPTIONAL)\n
 * IN email varchar(255), (OPTIONAL)\n
 * IN bookISBN varchar(255), (OPTIONAL)\n
 * IN bookCondition varchar(255), (OPTIONAL)\n
 * IN minPrice double, (OPTIONAL)\n
 * IN maxPrice double (OPTIONAL)\n
 * Returns:\n
 * id,\n
 * email,\n
 * bookISBN,\n
 * shortDescription,\n
 * longDescription,\n
 * bookCondition,\n
 * price,\n
 * postDate
 */

 /**
 * \file spSelectUserSellBookPhoto.sql
 * Returns a list of image paths related to a single book listing
 * The id is the id of the book listing.\n
 * IN id integer\n
 * Returns:\n
 * photoName\n
 */
?>