<?php
    /**
     * This class will never be called directly, see ClassResults instead.
     * This class holds data for a single row.
     */
    class SingleClassResult {
        private $courseID;
        private $title;
        private $lastUpdated;
        private $seatsRemaining;
        /* This variable is used for filtering */
        private $campus;

        public function __construct($dbArrayRow) {
            $this->courseID = preg_replace("/-[0-9]\*$/", "" ,$dbArrayRow["courseID"]);
            $this->title = $dbArrayRow["title"];
            $this->lastUpdated = timeSinceDate(date("Y-m-d h:i:s", $dbArrayRow["lastUpdated"]));
            $this->seatsRemaining = $dbArrayRow["seatsRemaining"];
            $this->campus = array();
            $this->campus[] = $dbArrayRow["campus"];
        }

        public function add($object2) {
            $this->seatsRemaining = $this->seatsRemaining + $object2->getSeatsRemaining();
            if (!(in_array($object2->getCampus(), $this->campus))) {
                $this->campus[] = $object2->getCampus();
                sort($this->campus);
            }
        }

        public function print() {
            echo "<div class='row mt-2'>
                    <div class='col'>
                        <a href='courseDetails.php?id={$this->getCourseID()}'>{$this->getTitle()}</a><br>
                        {$this->getCourseID()}
                    </div>
                    <div class='col-sm-auto text-right'>
                        {$this->getSeatsRemaining()} Seats Available<br>
                        Updated {$this->getLastUpdated()} ago.
                    </div>
                </div>/n";
        }

        public function getCourseID() {return $this->courseID;}
        public function getTitle() {return $this->title;}
        public function getLastUpdated() {return $this->lastUpdated;}
        public function getSeatsRemaining() {return $this->seatsRemaining;}
        public function getCampus() {return $this->campus;}

        private function timeSinceDate($time)
        {
            $time = time() - $time;
            $time = ($time<1)? 1 : $time;
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );
        
            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }
        }
    }
?>