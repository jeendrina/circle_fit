<?php

$headTemplate = new HeadTemplate('Booking details | Circle Fit', 'Booking details');
$dao = new BookingDao();
// data for template
$booking = Utils::getObjByGetId($dao);
$tooLate = $booking->getStatus() == User::STATUS_ACTIVE && $booking->getDueOn() < new DateTime();
