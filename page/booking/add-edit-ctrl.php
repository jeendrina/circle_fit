<?php

$headTemplate = new HeadTemplate('Add/Edit | Booking List', 'Edit or add a booking');

$errors = array();
$booking = null;
$names = ['Pilates', ' Weight Lifting', 'Aerobics'];
$edit = array_key_exists('id', $_GET);

//function resize($image) {
//    try {
//        if ($image->resize()) {
//            return true;
//        } else {
//            $data['image_url'] = false; //Image upload failed
//        }
//    } catch (Exception $ex) {
//        //set placeholder for validator to recognise as an error
//        $data['image_url'] = false; //Image upload failed
//    }
//}

if ($edit) {
    $dao = new BookingDao();
    $booking = Utils::getObjByGetId($dao);
} else {
    // set defaults
    $booking = new Booking('');
    $bookingDate = new DateTime("+1 day");
    $bookingDate->setTime(0, 0, 0);
    $booking->setBookingDate($bookingDate);
    $booking->setStatus('pending');
    $userId = 1; //hard-coded because we don't have a logged in user yet
    $booking->setUserId('$userId');
    $booking->setActivityId('$activityId');
}

if (array_key_exists('save', $_POST)) {

    $data = filter_input(INPUT_POST, 'booking', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $data['booking_date'] .= ' 00:00:00';
    $data['user_id'] = $_SESSION['user_id'];

    //image upload and resize
    // If the file name is available first upload it
//    if (!empty($_FILES)) {
//        if ($_FILES['myfile1']['name']) {
//            $name = $_FILES['myfile1']['name'];
//            $upload = new Uploader('myfile1');
//            $filePath = $upload->upload();
//            $pathPrefix = 'img/upload';
//            $data['image_url'] = $filePath ? $filePath : '-1';
//            
//            if ($filePath && $upload->getType() != Uploader::PDF_TYPE) {
//                // Successfully uploaded so resize now.
//                $image = new ImageResizer($filePath, 100, $pathPrefix, "thumb");
//                $data['image_url'] = resize($image) === true ? $name : '-1';
//            } else {
//                echo "Unable to upload file - SEE the ERROR ABOVE?<br />";
//            }
//        }
//    }

    // map
    BookingMapper::map($booking, $data);
    // validate
    $errors = BookingValidator::validate($booking);
    // validate
    if (empty($errors)) {
        // save
        $dao = new BookingDao();
        $booking = $dao->save($booking);
        Flash::addFlash('Booking saved successfully.');
        // redirect
        Utils::redirect('list', array('module' => 'booking'));
    }
}
