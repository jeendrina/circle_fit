<?php

$headTemplate = new HeadTemplate('Booking details | Fly to the Limit', 'Booking details');

// data for template
$activity = Utils::getBookingByGetId();
$tooLate = $activity->getStatus() == Booking::STATUS_PENDING && $activity->getDueOn() < new DateTime();
