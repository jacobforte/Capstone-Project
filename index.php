<!doctype html>
<html lang="en">
    <head>
        <?php include("resources/includes/head.inc.php"); ?>
    </head>
    <body>
        <?php include("resources/includes/header.inc.php"); ?>
        
        <main>
            <h1>Welcome</h1>
            <p>This site is under maintenance.</p>
            <?php
                require("resources/functions/dbconnection.function.php");
                $test = dbconnection("spSelectClasses('', '', '', '', '', '', '', '', '', '', '')");
                foreach($test as $line) {
                    echo "{$line['title']} <br>";
                }
            ?>
        </main>

        <?php include("resources/includes/footer.inc.php"); ?>
    </body>
</html>