<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    removeUserListing($_POST['id'], $_POST['user']);
}

/** \file */
/**
 * This function is used to remove a specific book listing.
 * @param ID of book listing to be removed
 *
 */

function removeUserListing($id, $user) {
    dbconnection("spDeleteUserSellBook(" . $id . ")");
    echo count(dbconnection("spSelectUserSellBook(null, \"" . $user . "\", null, null, null, null)"));
}
