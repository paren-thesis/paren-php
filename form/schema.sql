CREATE DATABASE student_records;

USE student_records;

CREATE TABLE student (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    age INT,
    gender VARCHAR(10),
    programme VARCHAR(255)
);
