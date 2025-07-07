<?php
$name = trim($_POST['name']);
$offer = $_POST['offer'];
$pickup = $_POST['pickup'];
$return_date = $_POST['return_date'];
$email = trim($_POST['email']);
$contact = trim($_POST['contact']);
$car_comment = trim($_POST['car_comment']);


if (empty($name)) {
    echo 'Name field is empty';
} else if (!preg_match('/^[a-zA-Z]+$/', $name)) {
    echo 'Name must be letters only';
} else {
    echo $name;
}

echo'<br>';

if (empty($email)) {
    echo 'Email field is empty';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
    echo 'Invalid email';
} else {
    echo $email;
}

echo '<br>';

if (empty($contact)) {
    echo 'Contact field is empty';
} else if (!preg_match('/^\d{10}+$/', $contact)) {
    echo 'Contact must contain only digits';
} else {
    echo $contact;
}



// echo $name;
// echo '<br>';
// echo $offer;
// echo '<br>';
// echo $pickup;
// echo '<br>';
// echo $return_date;
// echo '<br>';
// echo $email;
// echo '<br>';
// echo $contact;
// echo '<br>';
// echo $car_comment;
// Valication Rule
// Not Empty
// Correet Email format
// Phone Should be only numbeis
// and 10 digits.
// Name should be Only
// letters
