<?php

/**
 * Description of UserValidator
 *
 * @author Free User
 */
final class UserValidator {

    private function __construct() {
    }

    /**
     * Validate the given {@link Todo} instance.
     * @param User $user {@link Todo} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(User $user) {
        $errors = array();
        if (!$user->getFirstName()) {
            $errors[] = new Error('firstName', 'Empty or invalid first name.');
        }
      
        
        if (!$user->getLastName()) {
            $errors[] = new Error('lastName', 'Empty or invalid last name.'); 
                }
        
        
//        if (!trim($user->getTitle())) {
//            $errors[] = new Error('title', 'Title cannot be empty.');
//        }
//        if (!$user->getDueOn()) {
//            $errors[] = new Error('dueOn', 'Empty or invalid Due On.');
//        }
//        if (!trim($user->getPriority())) {
//            $errors[] = new Error('priority', 'Priority cannot be empty.');
//        } elseif (!self::isValidPriority($user->getPriority())) {
//            $errors[] = new Error('priority', 'Invalid Priority set.');
//        }
//        if (!trim($user->getStatus())) {
//            $errors[] = new Error('status', 'Status cannot be empty.');
//        } elseif (!self::isValidStatus($user->getStatus())) {
//            $errors[] = new Error('status', 'Invalid Status set.');
//        }
        return $errors;
    }

    /**
     * Validate the given status.
     * @param string $status status to be validated
     * @throws Exception if the status is not known
     */
    public static function validateStatus($status) {
        if (!self::isValidStatus($status)) {
            throw new Exception('Unknown status: ' . $status);
        }
    }

    /**
     * Validate the given priority.
     * @param int $priority priority to be validated
     * @throws Exception if the priority is not known
     */
    public static function validatePriority($priority) {
        if (!self::isValidPriority($priority)) {
            throw new Exception('Unknown priority: ' . $priority);
        }
    }

    private static function isValidStatus($status) {
        return in_array($status, User::allStatuses());
    }

    private static function isValidPriority($priority) {
        return in_array($priority, User::allPriorities());
    }

}
