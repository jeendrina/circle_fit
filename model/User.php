<?php


class User {

    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $status;

    function getId() {
        return $this->id;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }
      function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }
     function setStatus($status) {
        $this->status = $status;
    }


}
