<?php

abstract class Model {

    /**
     * @var array
     */
    public static $collection = array();

    /**
     * @return array
     */
    public static function getAll() {
        return array(
            get_class(self::$collection[0]) => self::$collection
        );
    }

    /**
     * @param Model $model
     * @internal param \Page $page
     */
    public static function addToCollection(Model $model) {
        self::$collection[] = $model;
    }

    /**
     * @var array
     */
    public $data = array();

    /**
     * Save a model instance to the collection
     */
    public function save() {
        self::addToCollection($this);
    }

   public function __construct($data = null) {
       if(!empty($data)) {
           $this->data = $data;
       }
   }
}