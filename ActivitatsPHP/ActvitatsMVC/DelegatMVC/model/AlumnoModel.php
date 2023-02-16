<?php 

require_once '../assets/php/model/AbstractModel.php';

class AlumnoModel extends AbstractModel{
    
    
    public function getVariables() {
        return array("idAlumno","name","surname","password","delegate","hasVoted","voteCount","lastVoteDate","ip");
    }
    
    public function getElementById($id){

        $this -> openConn();
        
        $sql = " SELECT * FROM alumnos WHERE id_alumno = " . $id . ";";

        $result = $this -> conn -> query($sql);
        
        $this -> closeConn();
        
        $row = $result->fetch_array();
    
        $this -> __set("idAlumno",$row["id_alumno"]);
        $this -> __set("name",$row["name"]);
        $this -> __set("surname",$row["surname"]);
        $this -> __set("password",$row["password"]);
        $this -> __set("delegate",$row["delegate"]);
        $this -> __set("hasVoted",$row["has_voted"]);
        $this -> __set("voteCount",$row["vote_count"]);
        $this -> __set("lastVoteDate",$row["last_vote_date"]);
        $this -> __set("ip",$row["ip"]);
    }

    public function getElementByNameSurname($name,$surname){

        $this -> openConn();
        
        $sql = " SELECT * FROM alumnos WHERE name = " . $name . "AND surname = " . $surname . ";";

        $result = $this -> conn -> query($sql);
        
        $this -> closeConn();
        
        $row = $result->fetch_array();
        
        $this -> __set("idAlumno",$row["id_alumno"]);
        $this -> __set("name",$row["name"]);
        $this -> __set("surname",$row["surname"]);
        $this -> __set("password",$row["password"]);
        $this -> __set("delegate",$row["delegate"]);
        $this -> __set("hasVoted",$row["has_voted"]);
        $this -> __set("voteCount",$row["vote_count"]);
        $this -> __set("lastVoteDate",$row["last_vote_date"]);
        $this -> __set("ip",$row["ip"]);
    }

    public function save(){

        $this -> openConn();
        
        $sql = "UPDATE alumno SET name='" . $this -> __get("name") . "', surname='" . $this -> __get("surname") . "', password='" . $this -> __get("password") . "', delegate='" . $this -> __get("delegate") . "', has_voted='" . $this -> __get("hasVoted") . "', vote_count ='" . $this -> __get("voteCount") . "', last_vote_date='" . $this -> __get("lastVoteDate") . "', ip='" . $this -> __get("ip") . "' WHERE id_alumno =" . $this -> __get("idAlumno") .";";

        $this -> conn -> query($sql);
        
        $this -> closeConn();
        
    }

}