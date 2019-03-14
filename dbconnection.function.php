<?php
//The string should contain the stored procedure name along with any input parameters in parenthesis
//Example "spSelectUser(someemail@email, somepassword)"
function dbconnection($spString) {
    $dbuser = 'webuser';
    $dbpass = '123456';
    $dbconnstring = 'mysql:host=webdev-stark.cs.kent.edu;dbname=Capstone;';

    try {
        //Establish the connection.
        $pdo = new PDO($dbconnstring, $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Set the sql command and execute it.
        $sql = 'CALL ' . $spString;
        $query = $pdo->query($sql);

        //Fetch the data
        $result = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        //Terminate the connection and return the results
        $pdo = null;
        return $result;
    }
    catch (PDOException $e) {
        $pdo = null;
        die("Error occured: " . $e->getMessage());
    }
}
?>