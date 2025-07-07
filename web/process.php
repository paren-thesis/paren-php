<?php
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

echo'<br>';

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
    echo "<span style='color: red'>Contact must contain only digits</span>";
} else {
    echo $contact;
}

echo"<br>";

if (empty($car_comment)) {
    echo "<span style='color: red'>Comment section is empty</span>";
} else {
    echo $car_comment;
}

echo "<br>";

// Repair the logic for checking pickup and return_date fields
// Check if both pickup and return_date are not empty before comparing
if (!empty($pickup) && !empty($return_date)) {
    $pickup_date = strtotime($pickup);
    $return_date_val = strtotime($return_date);
    if ($return_date_val < $pickup_date) {
        echo "<span style='color: red'>Return date cannot be earlier than pickup date</span><br>";
    }
}

if (empty($pickup)) {
    echo "<span style='color: red'>Pickup field is empty</span>";
} else {
    echo $pickup;
}

echo "<br>";

if (empty($return_date)) {
    echo "<span style='color: red'>Return date field is empty</span>";
} else {
    echo $return_date;
}

echo "<br>";

if (!empty($$pickup) && !empty($$return_date)) {
    echo ($return_date);
    echo ($$pickup);
} else {
    echo $car_comment;
}