<?php

class BookingMapper {
    
    private function __construct() {
    }

    /**
     * Maps an array to a booking object.
     * @param User $booking
     * @param array $properties
     */
    public static function map(Booking $booking, array $properties) {
        if (array_key_exists('booking_id', $properties)) {
            $booking->setId($properties['booking_id']);
        }
        if (array_key_exists('booking_date', $properties)) {
            $booking->setBookingDate($properties['booking_date']);
        }
        if (array_key_exists('booking_time', $properties)) {
            $bookingTime = self::createDateTime($properties['booking_time']);
            if ($bookingTime) {
                $booking->setBookingTime($bookingTime);
            }
        }
        if (array_key_exists('date_created', $properties)) {
            $dateCreated = self::createDateTime($properties['date_created']);
            if ($dateCreated) {
                $booking->setDateCreated($dateCreated);
            }
        }
        if (array_key_exists('status', $properties)) {
            $booking->setStatus($properties['status']);
        }
        if (array_key_exists('booking_id', $properties)) {
            $booking->setBookingId($properties['booking_id']);
        }
    }

    private static function createDateTime($input) {
        return DateTime::createFromFormat('Y-n-j H:i:s', $input);
    }
}
