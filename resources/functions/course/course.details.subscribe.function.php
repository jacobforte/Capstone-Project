<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    subscribeUserTo($_POST['id']);
}

function subscribeUserTo($crn) {
    dbconnection("spNewUserRegisteredClass('" . $_SESSION['user']['email'] . "', " . $crn . ")");
}