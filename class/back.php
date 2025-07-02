<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once 'db.php';

// Debug: Show POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>POST DATA: ' . print_r($_POST, true) . '</pre>';
}

// Check if POST data exists
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index3.php');
    exit;
}

// CSRF protection should be added here in production

// Sanitize and trim input
$name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
$email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
$age = isset($_POST["age"]) ? trim($_POST["age"]) : '';
$program = isset($_POST["program"]) ? trim($_POST["program"]) : '';
$gender = isset($_POST["gender"]) ? trim($_POST["gender"]) : '';

// Name validation
if (empty($name)) {
    $_SESSION["nameErr"] =  "Name is empty";
    header("Location: index3.php");
    exit;
} else {
    if (!preg_match('/^[a-zA-Z ]+$/', $name)) {
        $_SESSION["nameErr"] =  "Name is not valid";
        header("Location: index3.php");
        exit;
    }
}

// Email validation
if (empty($email)) {
    $_SESSION["emailErr"] =  "Email is empty";
    header("Location: index3.php");
    exit;
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["emailErr"] =  "Email is not valid";
        header("Location: index3.php");
        exit;
    }
}

// Age validation
if (empty($age)) {
    $_SESSION["ageErr"] =  "Age is empty";
    header("Location: index3.php");
    exit;
} else {
    if (!preg_match('/^\d+$/', $age)) {
        $_SESSION["ageErr"] =  "Age is not valid";
        header("Location: index3.php");
        exit;
    }
}

// Program validation
if (empty($program)) {
    $_SESSION["programErr"] =  "Program is empty";
    header("Location: index3.php");
    exit;
} else {
    if (!preg_match('/^[a-zA-Z0-9 ]+$/', $program)) {
        $_SESSION["programErr"] =  "Program is not valid";
        header("Location: index3.php");
        exit;
    }
}

// Gender validation
if (empty($gender)) {
    $_SESSION["genderErr"] =  "Gender is empty";
    header("Location: index3.php");
    exit;
} else {
    if (!preg_match('/^[a-zA-Z]+$/', $gender)) {
        $_SESSION["genderErr"] =  "Gender is not valid";
        header("Location: index3.php");
        exit;
    }
}

$username = "root";
$password = "";
$db_name = "student_record";
$hostname = "localhost";

// Debug: Indicate before saving
echo '<p>Calling savedata with: ' . htmlspecialchars($name) . ', ' . htmlspecialchars($age) . ', ' . htmlspecialchars($gender) . ', ' . htmlspecialchars($email) . ', ' . htmlspecialchars($program) . '</p>';

$db = new Database($hostname, $username, $password, $db_name);
$result = $db->savedata($name, $age, $gender, $email, $program);

// Debug: Show result of savedata
if ($result) {
    echo '<p>savedata returned TRUE</p>';
} else {
    echo '<p>savedata returned FALSE</p>';
}

$_SESSION["success"] =  "Registration successful";
header("Location: index3.php");
exit;
