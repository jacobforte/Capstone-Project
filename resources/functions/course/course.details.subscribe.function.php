<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    subscribeUserTo($_POST['id'], $_POST['email']);
}

/** \file */
/**
 * This function is used to subscribe a user to an individual course.
 * @param crn of section to subscribe user to
 * @param email of user to subscribe a section to
 */

function subscribeUserTo($crn, $email) {
    dbconnection("spNewUserRegisteredClass(\"" . $email . "\", \"" . $crn . "\")");
}