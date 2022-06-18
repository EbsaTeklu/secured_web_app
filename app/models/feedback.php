<?php

require '../../database.php';

class Feedback {
    public $title;
    public $comment;
    public $type; //this is type variable of feedback mentioned in the requirement doc
    public $file;
    private $db;
    public function __construct() {
    }

    public function addFeedback($title, $comment,$type,$file) {
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $comment = filter_var($comment, FILTER_SANITIZE_STRING);
        $type = filter_var($type, FILTER_SANITIZE_STRING);
        $file = filter_var($file, FILTER_SANITIZE_STRING);

        $db = new DatabaseTranscations();
        $inserted = $db->insertFeed($title, $comment,$type,$file);
        if ($inserted) {
            return "Successfully inserted";
        } else {
            return "Something went wrong insertion did not happen";
        }
    }

    public function viewFeedbacks() {
        $db = new DatabaseTranscations();
        $result = $db->selectFeed();
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function viewFeedback($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->select($id);
        if ($result) {
            return $result;
        } else {
            return "No results returned";
        }
    }

    public function editFeedback($id, $title, $comment,$type,$file) {
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $comment = filter_var($comment, FILTER_SANITIZE_STRING);
        $type = filter_var($type, FILTER_SANITIZE_STRING);
        $file = filter_var($file, FILTER_SANITIZE_STRING);

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $db = new DatabaseTranscations();
        $result = $db->updateFeed($title, $comment,$type,$file, $id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteFeedback($id) {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $db = new DatabaseTranscations();
        $result = $db->deleteFeed($id);
        if ($result) {
            return "feedback deleted";
        } else {
            return "Something happened feedback not deleted";
        }
    }
}
?>