<?php
session_start(); 
require_once "db.php";

// Clear previous errors and store old input
$_SESSION["errors"] = [];
$_SESSION["old"] = [];

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$age = trim($_POST["age"]);
$gender = trim($_POST["gender"]);
$programs = trim($_POST["programs"]);

// Store old values
$_SESSION["old"] = [
    "name" => $name,
    "email" => $email,
    "age" => $age,
    "gender" => $gender,
    "programs" => $programs
];

// Validate inputs
if (empty($name)) {
    $_SESSION["errors"]["name"] = "The name field is empty";
} elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
    $_SESSION["errors"]["name"] = "Please enter a valid name";
}

if (empty($email)) {
    $_SESSION["errors"]["email"] = "The email field is empty";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errors"]["email"] = "Please enter a valid email";
}

if (empty($age)) {
    $_SESSION["errors"]["age"] = "The age field is empty";
} elseif (!preg_match('/^[0-9]+$/', $age)) {
    $_SESSION["errors"]["age"] = "Please enter a number";
}

if (empty($gender)) {
    $_SESSION["errors"]["gender"] = "Please select a gender";
}

if (empty($programs)) {
    $_SESSION["errors"]["programs"] = "Please select a program";
}

// If there are validation errors, go back
if (!empty($_SESSION["errors"])) {
    header("Location: index.php");
    exit;
}

// Save to database
$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "student_record";

// Correct values passed
$db = new Database($hostname, $user, $pass, $dbname);
$db->savedata($name, $age, $gender, $email, $programs);

// Set success message and redirect
$_SESSION["success"] = "Registration successful";
header("Location: index.php");
exit;
?>
