<?php

session_start();
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Only reset errors here if not already set
    if (!isset($_SESSION["errors"])) {
        $_SESSION["errors"] = [];
    }

    $name = trim($_POST['name']);
    $offer = $_POST['offer'];
    $pickup = $_POST['pickup'];
    $return_date = $_POST['return_date'];
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $car_comment = trim($_POST['car_comment']);

    // Validation
    if (empty($name)) {
        $_SESSION["errors"]["name"] = "Name field is empty";
    } else if (!preg_match('/^[a-zA-Z]+$/', $name)) {
        $_SESSION["errors"]["name"] = "Name must be letters only";
    }

    if(empty($offer)){
        $_SESSION["errors"]["offer"] = "You have to select an offer";
    }

    if (empty($email)) {
        $_SESSION["errors"]["email"] = "Email field is empty";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"]["email"] = "Invalid email";
    }

    if (empty($contact)) {
        $_SESSION["errors"]["contact"] = "Contact field is empty";
    } else if (!preg_match('/^\d{10,11}$/', $contact)) {
        $_SESSION["errors"]["contact"] = "Contact must contain 10 or 11 digits";
    }

    if (!empty($pickup) && !empty($return_date)) {
        $pickup_date = strtotime($pickup);
        $return_date_val = strtotime($return_date);
        if ($return_date_val < $pickup_date) {
            $_SESSION["errors"]["date"] = "Return date cannot be earlier than pickup date<br>";
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
        $_SESSION["errors"]["car_comment"] = "Comment section is empty";
    }

    // If no errors, store data and redirect
    if (empty($_SESSION["errors"])) {
        $db = new Database("localhost", "root", "" ,"car_rentals");
        $db->storeCarRentalData($name, $email, $offer, $contact, $pickup, $return_date, $car_comment);
        // Clear errors after successful submission
        unset($_SESSION["errors"]);
        header("Location: index.php");
        exit;
    } else {
        // Redirect back to form to display errors
        header("Location: index.php");
        exit;
    }
}