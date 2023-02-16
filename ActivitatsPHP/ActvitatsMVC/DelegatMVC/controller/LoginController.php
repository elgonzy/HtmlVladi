<?php 

require_once '../assets/php/controller/MainController.php';

class LoginController extends MainController{
    
    public function index(){

    }

    public function credVerification($alumno,$login){

        $alumno -> getElemenyByNameSurname($login -> __get("inName"), $login -> __get("inSurname"));

        if($alumno -> __get("name") == $login -> __get("inName") && $alumno -> __get("surname") == $login -> __get("inSurname") && $alumno  -> __get("password") == $login -> __get("inPassword")){

            return true;

        }

        return false;
        
    }

}