<?php
session_start();
require("CourseDetails.php");

if(isset($_GET['id']))
    retrieveReviewsFor($_GET['id']);

function retrieveReviewsFor($id) {
    $courseDetails = new CourseDetails($_GET["id"], "2019-06-10:2019-08-17");
    $courseDetails->outputReviewSection();
}