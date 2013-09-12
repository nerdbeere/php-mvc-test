<?php


class Loader {

    private static $controller;

    public static function init() {
        self::loadController();
        self::callAction();
    }

    public static function load($type, $name = null) {
        switch($type) {
            case 'model':
                self::loadModel($name);
        }
    }

    private static function loadController() {
        $name = Inflector::capitalize($_GET['controller']);
        $fullName = $name . 'Controller';
        require_once('app/controller/' . $fullName . '.php');
        self::$controller = new $fullName();
        self::$controller->name = $fullName;
        self::$controller->request = new Request();

        // load the according model
        self::load('model', $name);
    }

    private static function callAction() {
        $name = $_GET['action'];
        self::$controller->$name();
    }

    private static function loadModel($name) {
        $name = Inflector::capitalize($name);
        require_once('app/models/' . $name . '.php');
    }

} 