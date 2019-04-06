<?php
    require_once("resources/functions/dbconnection.function.php");
    require_once("resources/functions/searchResults/singleClassResult.class.php");

    /**
     * This class will be used by the search results page.
     * It will hold data for multiple many rows of data
     */
    class ClassResults {
        private $singleClassResultArray;

        /**
         * Use this to fetch the data for multiple rows of class results
         * @param searchString - The string the user entered in the search bar.
         */
         public function __construct($searchString) {
            $singleClassResultArray = array();
            $dbResult = dbconnection("spSelectClasses(NULL, \"{$searchString}\", NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $count = 0;
            foreach ($dbResult as $row) {
                //If the current row has a different title as the previous row, create a new SingleClassResult
                if ($count == 0) {
                    $singleClassResultArray[] = new SingleClassResult($row);
                    $count = $count + 1;
                }
                elseif ($row["title"] != $singleClassResultArray[$count]->getTitle()) {
                    $singleClassResultArray[] = new SingleClassResult($row);
                    $count = $count + 1;
                }
                else {
                    $singleClassResultArray[$count]->add(new SingleClassResult($row));
                }
            }
        }

        /**
         * Use this function to print the formatted string for each row of data.
         */
        public function print() {
            foreach ($singleClassResultArray as $row) {
                $row->print();
            }
        }
    }
?>