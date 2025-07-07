CREATE DATABASE car_rentals;

USE car_rentals;

CREATE TABLE booking (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(50),
    offer VARCHAR(20),
    contact VARCHAR(11),
    pickup DATETIME,
    return_date DATETIME,
    car_comment VARCHAR(255)
);