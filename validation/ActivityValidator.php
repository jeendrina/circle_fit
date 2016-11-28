<?php

/**
 * Description of ActivityValidator
 *
 * @author Jemarve Endrina
 */
final class ActivityValidator {

    private function __construct() {
        
    }

    public static function validate(Activity $activity) {
        $errors = array();
        if (!$activity->getName()) {
            $errors[] = new Error('Name', 'Empty or invalid activity name.');
        }

        if (!$activity->getDescription()) {
            $errors[] = new Error('Description', 'Empty or invalid activity description.');
        }

        return $errors;
    }


    public static function validateStatus($status) {
        if (!self::isValidStatus($status)) {
            throw new Exception('Unknown status: ' . $status);
        }
    }

    public static function validatePriority($priority) {
        if (!self::isValidPriority($priority)) {
            throw new Exception('Unknown priority: ' . $priority);
        }
    }

    private static function isValidStatus($status) {
        return in_array($status, Activity::allStatuses());
    }

    private static function isValidPriority($priority) {
        return in_array($priority, Activity::allPriorities());
    }

}
