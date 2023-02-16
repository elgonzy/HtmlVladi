<?php 

use \LoginController;
use \LoginModel;
use \AlumnoModel;


class LoginView {

    private $html = "<div>
                        <h2>Login</h2>
                        <form  method='post'>

                            <input type='text' name='name' id='name' placeholder='name'>
                            <input type='text' name='surname' id='surname' placeholder='surname'>
                            <input type='text' name='password' id='password' placeholder='password'>

                        </form>
                    </div>";


    private $loginController;
    private $loginModel;
    private $alumnoModel;

    public function __construct(){
        $this -> loginController = new LoginController();
        $this -> loginModel = new LoginModel();
        $this -> alumnoModel = new AlumnoModel();
    }

    public function getHtml(){
        return $this -> html;
    }

    public function getForm(){
        if(isset($_POST['name'])){
            $this -> loginModel -> __set("inName",$_POST["name"]);
        }
        if(isset($_POST['surname'])){
            $this -> loginModel -> __set("inSurname",$_POST["surname"]);
        }
        if(isset($_POST['password'])){
            $this -> loginModel -> __set("inPassword",$_POST["password"]);
        }
        return $this -> html;
    }

}