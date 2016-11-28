<?php


$activity = Utils::getTodoByGetId();
$activity->setStatus(Utils::getUrlParam('status'));
if (array_key_exists('comment', $_POST)) {
    $activity->setComment($_POST['comment']);
}

$dao = new TodoDao();
$dao->save($activity);
Flash::addFlash('TODO status changed successfully.');

Utils::redirect('detail', array('id' => $activity->getId()));
