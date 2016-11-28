<?php

$activityDao = new ActivityDao();
$activity = Utils::getObjByGetId($activityDao);

//var_dump($activity); die();

$activityDao->delete($activity->getActivityId());
Flash::addFlash('Activity deleted successfully.');

Utils::redirect('list', array('module' => 'activity'));
