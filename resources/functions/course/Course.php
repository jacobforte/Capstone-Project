<?php

class Course
{
    private $crn;
    private $course;
    private $campus;
    private $credits;
    private $title;
    private $enrolled;
    private $remainOpen;
    private $instructor;
    private $startDate;
    private $endDate;
    private $location;
    private $startTime;
    private $endTime;
    private $meetDays;

    /**
     * Course constructor.
     * @param $crn
     * @param $course
     * @param $campus
     * @param $credits
     * @param $title
     * @param $enrolled
     * @param $remainOpen
     * @param $instructor
     * @param $startDate
     * @param $endDate
     * @param $location
     * @param $startTime
     * @param $endTime
     * @param $meetDays
     */
    public function __construct($crn, $course, $campus, $credits, $title, $enrolled, $remainOpen, $instructor, $startDate, $endDate, $location, $startTime, $endTime, $meetDays)
    {
        $this->crn = $crn;
        $this->course = $course;
        $this->campus = $campus;
        $this->credits = $credits;
        $this->title = $title;
        $this->enrolled = $enrolled;
        $this->remainOpen = $remainOpen;
        $this->instructor = $instructor;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->location = $location;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->meetDays = $meetDays;
    }

    /**
     * @return mixed
     */
    public function getCrn()
    {
        return $this->crn;
    }

    /**
     * @param mixed $crn
     */
    public function setCrn($crn)
    {
        $this->crn = $crn;
    }

    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return mixed
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * @param mixed $campus
     */
    public function setCampus($campus)
    {
        $this->campus = $campus;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param mixed $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getEnrolled()
    {
        return $this->enrolled;
    }

    /**
     * @param mixed $enrolled
     */
    public function setEnrolled($enrolled)
    {
        $this->enrolled = $enrolled;
    }

    /**
     * @return mixed
     */
    public function getRemainOpen()
    {
        return $this->remainOpen;
    }

    /**
     * @param mixed $remainOpen
     */
    public function setRemainOpen($remainOpen)
    {
        $this->remainOpen = $remainOpen;
    }

    /**
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @param mixed $instructor
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getMeetDays()
    {
        return $this->meetDays;
    }

    /**
     * @param mixed $meetDays
     */
    public function setMeetDays($meetDays)
    {
        $this->meetDays = $meetDays;
    }

}