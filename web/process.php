<?php

session_start();
require_once("database.php");


$error[] = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
$name = trim($_POST['name']);
$offer = $_POST['offer'];
$pickup = $_POST['pickup'];
$return_date = $_POST['return_date'];
$email = trim($_POST['email']);
$contact = trim($_POST['contact']);
$car_comment = trim($_POST['car_comment']);


if (empty($name)) {
    echo "<span style='color: red'>Name field is empty</span>";
} else if (!preg_match('/^[a-zA-Z]+$/', $name)) {
    echo "<span style='color: red'>Name must be letters only</span>";
} else {
    echo $name;
}

echo '<br>';

echo $offer;

echo '<br>';

if (empty($email)) {
    echo "<span style='color: red'>Email field is empty</span>";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<span style='color: red'>Invalid email</span>";
} else {
    echo $email;
}

echo '<br>';

if (empty($contact)) {
    echo "<span style='color: red'>Contact field is empty</span>";
} else if (!preg_match('/^\d{10}+$/', $contact)) {
    echo "<span style='color: red'>Contact must contain only 10 digits</span>";
} else {
    echo $contact;
}

echo "<br>";


if (!empty($pickup) && !empty($return_date)) {
    $pickup_date = strtotime($pickup);
    $return_date_val = strtotime($return_date);
    if ($return_date_val < $pickup_date) {
        echo "<span style='color: red'>Return date cannot be earlier than pickup date</span><br>";
    } else {
        echo $pickup;
        echo "<br>";
        echo $return_date;
    }
} else {
    if (empty($return_date)) {
        echo "Return date is empty";
    }

    if (empty($pickup)) {
        echo "Pickup Date is empty";
    }
}

echo "<br>";

if (empty($car_comment)) {
    echo "<span style='color: red'>Comment section is empty</span>";
} else {
    echo $car_comment;
}


$db = new Database("localhost", "root", "" ,"car_rentals");
}