<?php

$headTemplate = new HeadTemplate('Add/Edit | Activity List', 'Edit or add a user');
$errors = array();
$activity = null;
$names = ['Pilates', ' Weight Lifting', 'Aerobics'];
$edit = array_key_exists('id', $_GET);
if ($edit) {
  
    $dao = new ActivityDao();
    $activity = Utils::getObjByGetId($dao);
} else {
    // set defaults 
    $activity = new Activity('');
    $activity->setName('');
    $activity->setDescription('');
    $activity->setStatus('active');
    $userId = 1; //hard-coded because we don't have a logged in user yet
    $activity->setUserId('$userId');
}

    if (array_key_exists('save', $_POST)) {
        // for security reasons, do not map the whole $_POST['']
        $data = array(
            'name' => $_POST['activity']['name'],
            'description' => $_POST['activity']['description'],
        );

        // map
        ActivityMapper::map($activity, $data);
        // validate
        $errors = ActivityValidator::validate($activity);
        // validate

        if (empty($errors)) {
            // save
            $dao = new ActivityDao();
            $activity = $dao->save($activity);
            Flash::addFlash('Activity saved successfully.');
            // redirect
            Utils::redirect('list', array('module' => 'activity'));
        }
    }
