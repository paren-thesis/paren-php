<?php
$name = "Paren-thesis";
$age = 20;
$schoolName = "Ho Technical University";
$level = 200;
$department = "Computer Science";
$programme = "BTECH ICT";
$loggedIn = false;
$p = "<p></p>"
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

    <!-- Checking declared varable types  -->
    <?php
    // This can be used
    echo gettype($name);
    // Or this
    echo "{$p}";
    var_dump($age);
    echo "{$p}";
    var_dump($schoolName);
    echo "{$p}";
    var_dump($level);
    echo "{$p}";
    var_dump($department);
    echo "{$p}";
    var_dump($programme);
    ?>

    <!-- PHP auto type conversion -->
    <?php 
    $num1 = "12";
    $num2 = 13;
    $num3 = $num1 + $num2;
    echo "$p The result is $num3";
    ?>
</body>

</html>