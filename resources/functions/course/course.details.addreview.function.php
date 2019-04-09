<?php

require("../dbconnection.function.php");

if(isset($_POST['email'])) {
    addReviewFor($_POST["email"], $_POST["crn"], $_POST["review"], $_POST["rating"], $_POST["instructor"], $_POST["semester"], $_POST["campus"]);
}

function addReviewFor($email, $crn, $review, $rating, $instructor, $semester, $campus) {
    dbconnection("spNewUserClassComment(\"" . $email . "\", \"" . $crn . "\", \"" . $review . "\", \"" . $rating . "\", null, \"" . $instructor . "\", \"" . $semester . "\", \"" . $campus . "\")");
}