<?php

$booking = Utils::getBookingByGetId();
$booking->setStatus(Utils::getUrlParam('status'));
if (array_key_exists('comment', $_POST)) {
    $booking->setComment($_POST['comment']);
}

$dao = new BookingDao();
$dao->save($booking);
Flash::addFlash('BOOKING status changed successfully.');

Utils::redirect('detail', array('id' => $booking->getBookingId()));
