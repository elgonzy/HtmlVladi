<?php 

require_once '../assets/php/model/AbstractModel.php';

class LoginModel extends AbstractModel{
    
    public function getVariables() {
        return array("inName","inSurname","inPassword");
    }

}