<?php

if (isset($_POST['submit'])) {
    
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
$activityDao = new UserDao();
    $activity = $activityDao->findByCredentials($email, $password);

    if ($email === $activity['email'] && $password === $activity['password']) {
        $_SESSION['user_email'] = $email;
        header('Location: index.php');
    } else {
        $errors = 'These credentials are not recognised.';
    }
}else if(isset($_GET['logout'])){
    //destry session
    session_destroy();
    //echo "All session variables are now removed, and the session is distroyed."; 
    
    //redirect to home
    header('Location: index.php');
}

