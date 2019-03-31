<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    removeUserListing($_POST['id']);
}

function removeUserListing($id) {
    dbconnection("spDeleteUserSellBook(" . $id . ")");
}
