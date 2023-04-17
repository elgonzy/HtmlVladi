CREATE DATABASE MVCDelegado;
USE MVCDelegat;
CREATE TABLE alumnos (
   id_alumno INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   name VARCHAR(20),
   surname VARCHAR(50),
   password VARCHAR(20),
   delegate BIT NOT NULL DEFAULT 0,
   has_voted BIT NOT NULL DEFAULT 0,
   vote_count INT NOT NULL DEFAULT 0,
   last_vote_date DATETIME,
   ip VARCHAR(20) NOT NULL DEFAULT 0
);
