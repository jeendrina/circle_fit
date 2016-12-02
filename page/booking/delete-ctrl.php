<?php

$bookingDao = new BookingDao();
$booking = Utils::getObjByGetId($bookingDao);


$bookingDao->delete($booking->getBookingId());
Flash::addFlash('Booking deleted successfully.');

Utils::redirect('list', array('module' => 'booking'));
