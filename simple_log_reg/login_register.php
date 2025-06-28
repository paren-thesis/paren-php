<?php

session_start(); // This function is used to start a php session
require_once "config.php"; // This imports the config.php file to coonect to the database

if (isset($_POST['register'])) { // Check whether the register button has been clicked 
    $name = $_POST['name']; // Retrieve the name from post
    $email = $_POST['email']; // Retrieve the email from the post
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // This stores the passowrd in a hash
    $role = $_POST['role']; // Retrieve the role from the post

    $checkEmail= $conn->query("SELECT email FROM users WHERE email = '$email'"); // fetch email from the db

    if ($checkEmail->num_rows > 0) { // If the email exists
        $_SESSION['register_error'] = "Email already exists"; // Store this error message in this session
        $_SESSION['active-form'] = 'register';
    } else {
        // If user does not exists, create a new user
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ($name, $email, $password, $role)");
    }

    header("Location: index.php"); 
    exit();
}