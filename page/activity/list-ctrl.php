<?php


$headTemplate = new HeadTemplate('Activity list | Circle Fit', 'List of activities');

$dao = new ActivityDao();

$sql = 'SELECT * FROM activities WHERE status != "deleted"';
$activities = $dao->find($sql);
//var_dump($activities);die();
