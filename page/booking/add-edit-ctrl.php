<?php

$headTemplate = new HeadTemplate('Add/Edit | Booking', 'Edit or add a booking');
$errors = array();
$activity = null;
$flightNames = ['Helocopter Sightseeing','Glider'];
$edit = array_key_exists('id', $_GET);
if ($edit) {
    $dao = new BookingDao();
    $activity = Utils::getObjByGetId($dao);
} else {
    // set defaults 
    $activity = new User();
    $activity->setFlightName('');
    $flightDate = new DateTime("+1 day");
    $flightDate->setTime(0, 0, 0);
    $activity->setFlightDate($flightDate);
    $activity->setStatus('pending');
    $userId = 1;//hard-coded because we don't have a logged in user yet
    $activity->setUserId($userId);
}
//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $booking->getId()));
//} 
//else
    if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'flight_name' => $_POST['booking']['flight_name'],
        'flight_date' => $_POST['booking']['flight_date'] . '00:00:00'
    );
    

    // map
    BookingMapper::map($activity, $data);
    // validate
    $errors = BookingValidator::validate($activity);
    // validate

    if (empty($errors)) {
        // save
        $dao = new BookingDao();
        $activity = $dao->save($activity);
        Flash::addFlash('Booking saved successfully.');
        // redirect
        Utils::redirect('list', array('module' => 'booking'));
    }
}
