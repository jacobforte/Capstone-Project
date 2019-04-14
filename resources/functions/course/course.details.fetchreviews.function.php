<?php
session_start();
require("CourseDetails.php");

if(isset($_GET['id']))
    retrieveReviewsFor($_GET['id']);

/** \file */
/**
 * This function is used to retrieve and display reviews for a specific course
 * @param id course to fetch reviews for
 */
function retrieveReviewsFor($id) {
    $courseDetails = new CourseDetails($_GET["id"], "2019-06-10:2019-08-17");
    $courseDetails->outputReviewSection();
}