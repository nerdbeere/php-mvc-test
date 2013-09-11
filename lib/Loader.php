<?php


class Loader {

    private static $controller;
    private static $models = array();

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

        // load the according model
        self::load('model', $name);
    }

    private static function callAction() {
        $name = $_GET['action'];
        self::$controller->$name();
    }

    private static function loadModel($name) {
        $name = Inflector::capitalize($name);

        // don't load models multiple times
        if(!empty(self::$models[$name]))
           return false;

        require_once('app/models/' . $name . '.php');
    }

} 