<?php
require_once("resources/functions/dbconnection.function.php");

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
                <div class='col-sm-auto'>
                    <span class='ml-auto'>{$class["seatsRemaining"]} Seats Available</span><br>
                    <span class='ml-auto'>Updated {$class["lastUpdated"]}</span>
                </div>
            </div>";
        }
    }
}
?>