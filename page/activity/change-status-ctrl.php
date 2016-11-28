<?php


$activity = Utils::getByGetActivityId();
$activity->setStatus(Utils::getUrlParam('status'));
if (array_key_exists('comment', $_POST)) {
    $activity->setComment($_POST['comment']);
}

$dao = new ActivityDao();
$dao->save($activity);
Flash::addFlash('ACTIVITY status changed successfully.');

Utils::redirect('detail', array('id' => $activity->getActivityId()));
