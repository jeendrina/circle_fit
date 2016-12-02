<?php

class BookingMapper {

    private function __construct() {
        
    }

    /**
     * Maps an array to a booking object.
     * @param Booking $booking
     * @param array $properties
     */
    public static function map(Booking $booking, array $properties) {
        if (array_key_exists('booking_id', $properties)) {
            $booking->setBookingId($properties['booking_id']);
        }
       
        if (array_key_exists('booking_date', $properties)) {
            $bookingDate = self::createDateTime($properties['booking_date']);
          
            if ($bookingDate) {
                $booking->setBookingDate($bookingDate);
            }
    
        }
        if (array_key_exists('status', $properties)) {
            $booking->setStatus($properties['status']);
        }
//        if (array_key_exists('image_url', $properties)) {
//            $booking->setImageUrl($properties['image_url']);
//        }
        //map User 
        if (array_key_exists('user_id', $properties)) {
            $booking->setUserId($properties['user_id']);
            $user = new User();
            $user->setId($properties['user_id']);
            if (array_key_exists('first_name', $properties)) {
                $user->setFirstName($properties['first_name']);
            }
            if (array_key_exists('last_name', $properties)) {
                $user->setLastName($properties['last_name']);
            }
            $booking->setUser($user);
        }
        //map Activity 
//        if (array_key_exists('activity_id', $properties)) {
//            $activity = new Activity();
//           $activity->setActivityId($properties['activity_id']);
//            if (array_key_exists('activity_name', $properties)) {
//                $activity->setActivityName($properties['activity_name']);
//            }
//            if (array_key_exists('description', $properties)) {
//                $activity->setDescription($properties['description']);
//            }
//            $booking->setActivityId($activity);
//        }
    }

    private static function createDateTime($input) {
        return DateTime::createFromFormat('Y-n-j H:i:s', $input);
    }

}
