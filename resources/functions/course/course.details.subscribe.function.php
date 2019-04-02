<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    subscribeUserTo($_POST['id'], $_POST['email']);
}

function subscribeUserTo($crn, $email) {
    dbconnection("spNewUserRegisteredClass(" . $email . ", " . $crn . ")");
}