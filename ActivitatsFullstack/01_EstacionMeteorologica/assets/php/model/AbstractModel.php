<?php

use assets\PHP\utils\Base;

require_once "../utils/Base.php";

abstract class AbstractModel {

    protected $data = array();
    private $base = new Base();

    public function __construct()
    {
        
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {

        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
                
        return null;

    }

    abstract public function getVariables();



}