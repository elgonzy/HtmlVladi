<?php 

require_once '../assets/php/controller/MainController.php';

class AlumnoController extends MainController{
    
        
    public function index(){

    }
    
    public function addVote($alumno, $votedAlumno){

        $votedAlumno -> __set("voteCount", $votedAlumno -> __get("voteCount") + 1);
        $alumno -> __set("hasVoted", 1);
        $alumno -> __set("lastVoteDate", $_POST['dateTime']);
        $alumno -> __set("ip", $_SERVER['HTTP_CLIENT_IP']);
        
    }

}