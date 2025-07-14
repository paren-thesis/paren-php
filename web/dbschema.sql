CREATE DATABASE car_rentals;

USE car_rentals;

CREATE TABLE booking (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(50),
    offer VARCHAR(20),
    contact VARCHAR(10),
    pickup DATE,
    return_date DATE,
    car_comment VARCHAR(255)
);