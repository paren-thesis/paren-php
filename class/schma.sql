DROP DATABASE IF EXISTS student_record;

CREATE DATABASE student_record;

USE student_record;

CREATE TABLE student (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    age INT,
    gender VARCHAR(255),
    email VARCHAR(255),
    program VARCHAR(255)
);