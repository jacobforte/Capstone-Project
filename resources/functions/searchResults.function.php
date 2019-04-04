<?php
/** \file */
require_once("resources/functions/dbconnection.function.php");

/**
 * This function outputs data for the search results page when searching for a Course ID.
 * The string should contain the Course ID or be empty.
 */
function outputClasses($search) {
    $classes = dbconnection("spSelectClasses(NULL, \"{$search}\", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

    if (count($classes) == 0) {
        echo "<div class='row mt-2'>
            <div class='col'>
                <h5><strong>No Results for \"{$search}\"</strong></h5>
            </div>
        </div>";
    }
    else {
        echo "<div class='row mt-2'>
            <div class='col'>
                <h5><strong>Showing Results for \"{$search}\"</strong></h5>
                <p>ReplaceMe results</p>
            </div>
        </div>";

        foreach($classes as $class) {
            echo "<div class='row mt-2'>
                <div class='col'>
                    {$class["title"]}<br>
                    {$class["courseID"]}
                </div>
                <div class='col-sm-auto text-right'>
                    {$class["seatsRemaining"]} Seats Available<br>
                    Updated {$class["lastUpdated"]}
                </div>
            </div>";
        }
    }
}
?>