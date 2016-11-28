
<?php

function initDB() {
    global $db;

    $dsn = "mysql:host=localhost;dbname=circle_fit;charset=utf8";
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (Exception $ex) {
        throw new Exception('DB connection error: ' . $ex->getMessage());
    }
}

function getUserDetails($email, $password) {
    global $db;
    $stmt = $db->query('SELECT email, password FROM users WHERE email = "' . $email . '"' .
            ' AND password = "' . $password . '"');
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}


initDB();