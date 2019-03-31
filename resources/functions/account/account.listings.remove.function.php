<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    removeUserListing($_POST['id']);
}

/** \file */
/**
 * This function is used to remove a specific book listing.
 * @param ID of book listing to be removed
 *
 */

function removeUserListing($id) {
    dbconnection("spDeleteUserSellBook(" . $id . ")");
}
