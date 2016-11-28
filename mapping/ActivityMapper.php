<?php

class ActivityMapper {

    private function __construct() {
        
    }

    public static function map(Activity $activity, array $properties) {
        if (array_key_exists('activity_id', $properties)) {
            $activity->setActivityId($properties['activity_id']);
        }
        if (array_key_exists('name', $properties)) {
            $activity->setName($properties['name']);
        }
        if (array_key_exists('description', $properties)) {
            $activity->setDescription($properties['description']);
        }
        
        if (array_key_exists('user_id', $properties)) {
            $activity->setUserId($properties['user_id']);
        }
        
          if (array_key_exists('status', $properties)) {
            $activity->setStatus($properties['status']);
        }
        
    }

}
