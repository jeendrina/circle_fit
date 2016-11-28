<?php

$activityDao = new BookingDao();
$activity = Utils::getObjByGetId($activityDao);
//var_dump($booking);
//die();

$activityDao->delete($activity->getId());
Flash::addFlash('Booking deleted successfully.');

Utils::redirect('list', array('module' => 'booking'));
