<?php

require("../dbconnection.function.php");

if(isset($_POST['id'])) {
    removeUserListing($_POST['id'], $_POST['user']);
}

/** \file */
/**
 * @brief Remove an active book listing
 *
 * Removes an active book listing.
 * Returns the active book listings count after removing the listing.
 *
 * @param $id
 *  The book listing ID to remove
 * @param $email
 *  The email address of the user removing a listing
 */

function removeUserListing($id, $email) {
    dbconnection("spDeleteUserSellBook(" . $id . ")");
    echo count(dbconnection("spSelectUserSellBook(null, \"" . $email . "\", null, null, null, null)"));
}
