<?php
$name = "Paren-thesis";
$age = 20;
$schoolName = "Ho Technical University";
$level = 200;
$department = "Computer Science";
$programme = "BTECH ICT";
$loggedIn = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable declaration and usage</title>
</head>

<body>
    <?php 
    echo "<p>My name is {$name}, and I am {$age}+ years of age.</p>";
    echo "<p>I am a student of {$schoolName} and I am in the {$department} department</p>";
    echo "<p>I am a level {$level} student and I am reading {$programme}</p>";

    if ($loggedIn) {
        echo "<p>I am logged in</p>";
    } else {
        echo "<p> I am not logged in</p>";
    }
    ?>

    <!--  -->
</body>

</html>