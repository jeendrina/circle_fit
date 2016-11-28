<?php

$userDao = new UserDao();
$user = Utils::getObjByGetId($userDao);


$userDao->delete($user->getId());
Flash::addFlash('User deleted successfully.');

Utils::redirect('list', array('module' => 'user'));
