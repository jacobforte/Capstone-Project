<?php
    /**
     * This class will never be called directly, see BookResults instead.
     * This class holds data for a single row.
     */
    class SingleBookResult {
        private $isbn;
        private $title;
        private $author;
        private $edition;
        private $publisher;
        
        private $minPrice;
        private $maxPrice;
        private $numberOfListings;

        public function __construct($dbArrayRow) {
            $this->isbn = $dbArrayRow["isbn"];
            $this->title = $dbArrayRow["title"];
            $this->author = $dbArrayRow["author"];
            $this->edition = $dbArrayRow["edition"];
            $this->publisher = $dbArrayRow["publisher"];
            getMinMaxPrice($this->isbn);
        }

        public function print() {
            echo "<div class='row mt-2'>
                    <div class='col'>
                        <a class='text-primary' href='bookListings.php?isbn={$this->isbn}'>{$this->title} {$this->edition}</a><br>
                        Author: {$this->author} Publisher: {$this->Publisher}
                    </div>
                    <div class='col-sm-auto text-right'>
                        There are {$this->numberOfListings} listings.
                        Price range: ${$this->minPrice} - ${$this->maxPrice}
                    </div>
                </div>\n";
        }

        private function getMinMaxPrice($bookISBN) {
            require_once("resources/functions/dbconnection.function.php");

            $dbResult = dbconnection("spSelectUserSellBook(NULL, NULL, \"{$bookISBN}\", NULL, NULL, NULL)");
            if (count($dbResult) == 0) {
                $this->minPrice = "NULL";
                $this->maxPrice = "NULL";
                $this->numberOfListings = "0";
            }
            else {
                $count = 0;
                foreach($dbResult as $row) {
                    if ($count == 0) {
                        $this->minPrice = $row['price'];
                        $this->maxPrice = $row['price'];
                    }
                    else {
                        if ($row['price'] < $this->minPrice) {$this->minPrice = $row['price'];}
                        elseif ($row['price'] > $this->maxPrice) {$this->maxPrice = $row['price'];}
                    }
                    $count = $count + 1;
                }
                $this->numberOfListings = $count;
            }
        }
    }
?>