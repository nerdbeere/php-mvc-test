<?php

/**
 * Class Controller
 */
class Controller {

    /**
     * @var array
     */
    public $response = array();
    private $dataSent = false;

    public function __destruct() {
        $this->send();
    }

    public function send() {
        if($this->dataSent) {
            return false;
        }
        $this->dataSent = true;
        header('Content-Type: application/json');
        print json_encode(array(
            'error' => array(),
            'data' => $this->response
        ));
    }

} 