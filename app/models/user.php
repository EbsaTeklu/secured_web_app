<?php

require '../../database.php';

class User {
    public $name;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $active;
    // public $type;

    private $db;
    public function __construct() {
    }

    public function addUser($name, $username,$email,$phone,$password) {

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $email=filter_var($email,FILTER_VALIDATE_EMAIL);
        $phone=filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
        $password=filter_var($password,FILTER_SANITIZE_STRING);

        $db = new DatabaseTranscations();
        $inserted = $db->insert($name,$username,$email,$phone,$password);
        if ($inserted) {
            return "Successfully inserted";
        } else {
            return "Something went wrong insertion did not happen";
        }
    }

    public function viewUsers() {
        $db = new DatabaseTranscations();
        $result = $db->select();
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function viewUser($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->select($id);
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function editUser($id,$name, $email,$phone,$password) {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email=filter_var($email,FILTER_VALIDATE_EMAIL);
        $phone=filter_var($phone,FILTER_SANITIZE_NUMBER_INT);
        $password=filter_var($password,FILTER_SANITIZE_STRING);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->update($name,$email,$phone,$password,$id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function disableUser($active,$id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $db = new DatabaseTranscations();
        $result = $db->disableToggle($active,$id);
        if ($result) {
            return "user disabled";
        } else {
            return "Something happened user not disabled";
        }
    }
}
?>