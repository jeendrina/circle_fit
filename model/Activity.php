<?php


class Activity {
    private $activityId;
    private $name;
    private $description;
    private $userId;
    private $status;
    
    function getActivityId() {
        return $this->activityId;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getUserId() {
        return $this->userId;
    }

    function getStatus() {
        return $this->status;
    }

    function setActivityId($activityId) {
        $this->activityId = $activityId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}