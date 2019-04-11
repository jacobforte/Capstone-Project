<?php

require("../dbconnection.function.php");

if(isset($_POST['email']) && isset($_POST['crn']) && isset($_POST['review']) && isset($_POST['rating'])
    && isset($_POST['instructor']) && isset($_POST['semester']) && isset($_POST['campus'])) {
    addReviewFor($_POST["email"], $_POST["crn"], $_POST["review"], $_POST["rating"], $_POST["instructor"], $_POST["semester"], $_POST["campus"]);
}
else {
    $response_array['status'] = 'error';
    $response_array['error'] = 'Please enter all fields.';
    header('Content-type: application/json');
    echo json_encode($response_array);
}

function addReviewFor($email, $crn, $review, $rating, $instructor, $semester, $campus) {
    dbconnection("spNewUserClassComment(\"" . $email . "\", \"" . $crn . "\", \"" . $review . "\", \"" . $rating . "\", null, \"" . $instructor . "\", \"" . $semester . "\", \"" . $campus . "\")");
}