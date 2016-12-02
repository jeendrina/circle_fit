<?php

class booking {

    private $bookingId;
    private $bookingDate;
    private $status;
//    private $imageUrl;
    private $userId;
    private $activityId;
    private $user;

    function getBookingId() {
        return $this->bookingId;
    }

    function getBookingDate() {
        return $this->bookingDate;
    }

    function getStatus() {
        return $this->status;
    }

//    function getImageUrl() {
//        return $this->imageUrl;
//    }

    function getUserId() {
        return $this->userId;
    }

    function getActivityId() {
        return $this->activityId;
    }

    function setBookingId($bookingId) {
        $this->bookingId = $bookingId;
    }

    function setBookingDate($bookingDate) {
        $this->bookingDate = $bookingDate;
    }

    function setStatus($status) {
        $this->status = $status;
    }

//    function setImageUrl($imageUrl) {
//        $this->imageUrl = $imageUrl;
//    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setActivityId($activityId) {
        $this->activityId = $activityId;
    }
    
    function getUser() {
        return $this->user;
    }

    function setUser(User $user) {
        $this->user = $user;
    }


}