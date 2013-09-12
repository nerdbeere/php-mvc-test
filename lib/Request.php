<?php

class Request {

    public static function sanitize($data) {
        // @TODO
        return $data;
    }

    private $isPost = false;
    public $data = array();

    public function __construct() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->isPost = true;
            if(!empty($_POST['data'])) {
                $this->data = self::sanitize(['data']);
            }
        }
    }

    public function isPost() {
        return $this->isPost;
    }

}