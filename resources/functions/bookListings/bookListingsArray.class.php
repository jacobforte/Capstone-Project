<?php
    require_once("resources/functions/dbconnection.function.php");
    require_once("resources/functions/bookListings/bookListings.class.php");

    /**
     * This class will be used by the book listings page.
     * It will hold data for multiple rows of data
     */
    class BookListingsArray {
        private $bookListingsArray;

        /**
         * Use this to fetch the data for multiple rows of book listings
         * @param isbn - The isbn that we will fetch results for.
         */
        public function __construct($isbn) {
            $this->bookListingsArray = array();
            $dbResult = dbconnection("spSelectUserSellBook(NULL, NULL, \"{$isbn}\", NULL, NULL, NULL)");

            foreach($dbResult as $row) {
                $this->bookListingsArray[] = new SingleClassResult($row);
            }
        }

        /**
         * Use this function to print the formatted string for each row of data.
         */
        public function print() {
            foreach ($this->bookListingsArray as $row) {
                $row->print();
            }
        }
    }
?>