<?php

$headTemplate = new HeadTemplate('Activity details | Circle Fit', 'Activity details');

$activity = Utils::getByActivityGetId();

$tooLate = $activity->getStatus() == User::STATUS_ACTIVE && $activity->getDueOn() < new NameDescription();
//var_dump($activities);die();