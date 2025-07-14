<?php

session_start();
require_once("database.php");
$_SESSION["errors"] = [];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
$name = trim($_POST['name']);
$offer = $_POST['offer'];
$pickup = $_POST['pickup'];
$return_date = $_POST['return_date'];
$email = trim($_POST['email']);
$contact = trim($_POST['contact']);
$car_comment = trim($_POST['car_comment']);


if (empty($name)) {
    $_SESSION["errors"]["name"] = "Name field is empty</span>";
} else if (!preg_match('/^[a-zA-Z]+$/', $name)) {
    $_SESSION["errors"]["name"] = "Name must be letters only</span>";
}


if (empty($email)) {
    $_SESSION["errors"]["email"] = "Email field is empty</span>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errors"]["email"] = "Invalid email</span>";
}

if (empty($contact)) {
    $_SESSION["errors"]["contact"] = "Contact field is empty</span>";
} else if (!preg_match('/^\d{10}+$/', $contact)) {
    $_SESSION["errors"]["contact"] = "Contact must contain only 10 digits</span>";
}


if (!empty($pickup) && !empty($return_date)) {
    $pickup_date = strtotime($pickup);
    $return_date_val = strtotime($return_date);
    if ($return_date_val < $pickup_date) {
        $_SESSION["errors"]["date"] = "Return date cannot be earlier than pickup date</span><br>";
    }
} else {
    if (empty($return_date)) {
        $_SESSION["errors"]["date"] = "Return date is empty";
    }

    if (empty($pickup)) {
        $_SESSION["errors"]["date"] = "Pickup Date is empty";
    }
}

if (empty($car_comment)) {
    $_SESSION["errors"]["name"] = "Comment section is empty</span>";
}

$db = new Database("localhost", "root", "" ,"car_rentals");
$db->storeCarRentalData($name, $email, $offer, $contact, $pickup, $return_date, $car_comment);
header("Location: index.php");
exit;
}