<?php
$username = "Paren";
$password = "1234";
$storedPassword = "1234";
$isActive = true;

$login_success = ($username = "Paren") && ($password = $storedPassword) && $isActive;
// Returns true
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operators</title>
</head>

<body>
    <?php
    if ($login_success) {
        echo "
        <p> Login success with username {$username} </p>
        <p> And user activity is set to {$isActive} </p>
        ";
    }
    ?>
</body>

</html>

<?php
$a = 5;
$b = 10;
$c = "5";

if ($a == $c) {
    echo "$a is equal to $c since they have the same value";
}

if ($a === $c) {
    echo "This is will not show because a and c does not have the same datatype";
}

if ($a !== $c) {
    echo "<p>This would print because a and c are not of the same datatype</p>";
}

if ($a > $c) {
    echo "True";
} else {
    echo "False";
}

$age = 18;
$isAdult = $age >= 18;
if ($isAdult) {
    echo "You are eligible to travel";
}
?>