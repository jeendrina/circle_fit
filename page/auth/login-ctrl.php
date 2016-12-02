<?php
$headTemplate = new HeadTemplate('Home | Circle Fit', 'Personal Trainer.');

if (isset($_POST['submit'])) {

    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $userDao = new UserDao();
    $user = $userDao->findByCredentials($email, $password);
    if ($user) {
        $_SESSION['user_email'] = $user->getEmail() ;
        $_SESSION['user_id'] = $user->getId() ;

        header('Location: index.php');
    } else {
        $errors = 'These credentials are not recognised.';
    }
}



