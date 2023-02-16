<?php 

abstract class AbstractModel {

    protected $data = array();
    private $host = "localhost";
    private $username = "root";
    private $password = "password";
    private $dbname = "MVCDelegado";
    private $conn; 

    public function __construct()
    {
        
    }

    function openConn(){

        $this -> conn = mysqli_connect($this -> host, $this -> username, $this -> password, $this -> dbname);

    }

    function closeConn(){

        mysqli_close($this -> conn);

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