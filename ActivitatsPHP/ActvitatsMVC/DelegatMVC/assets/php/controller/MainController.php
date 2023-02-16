<?php 

abstract class MainController {

    public function __construct()
    {
        
    }

    //esto realmente lo mantengo por estructura por que en tu actividad es completamente innecesario
    abstract public function index();

    protected function redirect($location) {
        header("Location: $location");
        exit;
    }
}
