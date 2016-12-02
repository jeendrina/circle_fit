<?php


$headTemplate = new HeadTemplate('Activity list | Circle Fit', 'List of activities');

$dao = new ActivityDao();

$currentUser = $_SESSION['user_id'];

$sql = 'SELECT * FROM activities WHERE status != "deleted";';
//var_dump($sql);die();
$activities = $dao->find($sql);
//var_dump($activities);die();
