<?php

$headTemplate = new HeadTemplate('Booking list | Circle Fit', 'List of bookings');

$dao = new BookingDao();
$sql = 'SELECT b.booking_id, u.id as user_id, u.first_name, u.last_name, b.booking_date FROM bookings b, users u WHERE u.id = b.user_id;';
$bookings = $dao->find($sql);

