<?php
require("resources/functions/dbconnection.function.php");

function outputUserNotifications($email) {
    $notifications = dbconnection("spSelectNotifications");
    $userNotifications = dbconnection("spSelectUserNotifications(\"" . $email . "\")");

    foreach ($notifications as $notification) {
        echo '<div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="' . $notification["type"] . '"';

        if (in_array($notification, $userNotifications))
            echo 'checked';

            echo '><label class="custom-control-label" for="' . $notification["type"] . '">' . $notification["description"]. '</label>
          </div>';
    }
}