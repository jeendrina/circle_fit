<?php

class User {

    private $id;
    private $bookingDate;
    private $bookingTime;
    private $status;
    private $userId;
    private $activityId;

    function getId() {
        return $this->id;
    }

    function getBookingTime() {
        return $this->bookingTime;
    }

    function getBookingDate() {
        return $this->bookingDate;
    }

    function getUserId() {
        return $this->userId;
    }

    function getActivityId() {
        return $this->activityId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBookingtime($bookingTime) {
        $this->flightName = $bookingTime;
    }

    function setBookingDate($bookingDate) {
        $this->bookingDate = $bookingDate;
    }

    function setUserId($user_id) {
        $this->userId = $user_id;
    }

    function setactivity($activity_id) {
        $this->activityId = $activity_id;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

}
