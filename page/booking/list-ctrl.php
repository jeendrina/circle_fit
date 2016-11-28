<?php


$headTemplate = new HeadTemplate('Booking list | Fly to the Limit', 'List of bookings');

$dao = new BookingDao();

$sql = 'SELECT * FROM bookings WHERE status != "deleted"';
$activities = $dao->find($sql);

