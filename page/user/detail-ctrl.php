<?php

$headTemplate = new HeadTemplate('User details | Circle fit', 'Booking details');

// data for template
$user = Utils::getUserByGetId();
$tooLate = $user->getStatus() == User::STATUS_PENDING && $user->getDueOn() < new DateTime();
