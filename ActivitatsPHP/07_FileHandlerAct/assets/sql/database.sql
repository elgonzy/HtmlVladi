CREATE DATABASE filehandler; 
USE filehandler;
CREATE TABLE users (
    id serial PRIMARY KEY NOT NULL,
    username varchar(255),
    usersurname varchar(255),
    birthdate date,
    number_phone varchar(255),
    cp varchar(255),
    photoURL varchar(255),
    cvURL varchar(255)
);
