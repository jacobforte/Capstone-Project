<?php

require("resources/functions/dbconnection.function.php");

/** \file */
/**
 * @brief List active book listings for a user
 *
 * Fetches and outputs all active book listings for a user
 *
 * @param $email
 *  The email address of user to retrieve listings for
 *
 */

function outputUserListings($email) {
    $listings = dbconnection("spSelectUserSellBook(null, \"" . $email . "\", null, null, null, null)");

    if (count($listings) == 0) {
        echo '<div class="col-12">
            <div class="row">
                <h5>No active book listings.</h5>
            </div>
        </div>';
    }

    foreach($listings as $listing) {
        echo '<div class="mb-3" id="' . $listing["id"] . '">
            <div class="row">
                <div class="col-12">
                    <h5 class="font-weight-bold"><a href="singleBookListing.php?id=' . $listing['id'] .'">' . $listing['title'] . '</a></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-md-3 col-lg-3">
                            <h6 class="font-weight-bold">Condition</h6>
                            <p>' . $listing['bookCondition'] . '</p>
                        </div>
                        <div class="col-12 col-md-3 col-lg-3">
                            <h6 class="font-weight-bold">Price</h6>
                            <p>$' . $listing['price'] . '</p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h6 class="font-weight-bold">ISBN</h6>
                            <p>' . $listing['bookISBN'] . '</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="font-weight-bold">Listing Description</h6>
                </div>
                <div class="col-12">
                    <p>' . $listing['longDescription'] . '</p>
                </div>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-warning" onclick="removeById(' . $listing["id"] . ', \'' . $email .  '\')">Remove</button>
                    </div>
                </div>
            </form>
        </div>';
    }
}

