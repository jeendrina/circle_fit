<?php

$user = Utils::getUserByGetId();
$user->setStatus(Utils::getUrlParam('status'));
if (array_key_exists('comment', $_POST)) {
    $user->setComment($_POST['comment']);
}

$dao = new UserDao();
$dao->save($user);
Flash::addFlash('USER status changed successfully.');

Utils::redirect('detail', array('id' => $user->getUserId()));
